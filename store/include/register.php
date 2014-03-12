<?php
/* vim: set ts=4 sw=4 sts=4 et: */
/*****************************************************************************\
+-----------------------------------------------------------------------------+
| X-Cart Software license agreement                                           |
| Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>            |
| All rights reserved.                                                        |
+-----------------------------------------------------------------------------+
| PLEASE READ  THE FULL TEXT OF SOFTWARE LICENSE AGREEMENT IN THE "COPYRIGHT" |
| FILE PROVIDED WITH THIS DISTRIBUTION. THE AGREEMENT TEXT IS ALSO AVAILABLE  |
| AT THE FOLLOWING URL: http://www.x-cart.com/license.php                     |
|                                                                             |
| THIS AGREEMENT EXPRESSES THE TERMS AND CONDITIONS ON WHICH YOU MAY USE THIS |
| SOFTWARE PROGRAM AND ASSOCIATED DOCUMENTATION THAT QUALITEAM SOFTWARE LTD   |
| (hereinafter referred to as "THE AUTHOR") OF REPUBLIC OF CYPRUS IS          |
| FURNISHING OR MAKING AVAILABLE TO YOU WITH THIS AGREEMENT (COLLECTIVELY,    |
| THE "SOFTWARE"). PLEASE REVIEW THE FOLLOWING TERMS AND CONDITIONS OF THIS   |
| LICENSE AGREEMENT CAREFULLY BEFORE INSTALLING OR USING THE SOFTWARE. BY     |
| INSTALLING, COPYING OR OTHERWISE USING THE SOFTWARE, YOU AND YOUR COMPANY   |
| (COLLECTIVELY, "YOU") ARE ACCEPTING AND AGREEING TO THE TERMS OF THIS       |
| LICENSE AGREEMENT. IF YOU ARE NOT WILLING TO BE BOUND BY THIS AGREEMENT, DO |
| NOT INSTALL OR USE THE SOFTWARE. VARIOUS COPYRIGHTS AND OTHER INTELLECTUAL  |
| PROPERTY RIGHTS PROTECT THE SOFTWARE. THIS AGREEMENT IS A LICENSE AGREEMENT |
| THAT GIVES YOU LIMITED RIGHTS TO USE THE SOFTWARE AND NOT AN AGREEMENT FOR  |
| SALE OR FOR TRANSFER OF TITLE. THE AUTHOR RETAINS ALL RIGHTS NOT EXPRESSLY  |
| GRANTED BY THIS AGREEMENT.                                                  |
+-----------------------------------------------------------------------------+
\*****************************************************************************/

/**
 * Process registration and profile update actions
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v464 (xcart_4_6_2), 2014-02-03 17:25:33, register.php, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_SESSION_START') ) { header("Location: ../"); die("Access denied"); }

x_load(
    'cart',
    'category',
    'crypt',
    'mail',
    'user'
);

x_session_register ('intershipper_recalc');
x_session_register ('av_error', false);
x_session_unregister('secure_oid');
x_session_register('saved_address_book', array());
x_session_register('saved_userinfo');

$country_where = (isset($submode) && ($submode == 'seller_address'))
    ? " AND $sql_tbl[countries].code='" . $config["Company"]["location_country"] . "'"
    : '';

require $xcart_dir . '/include/countries.php';
require $xcart_dir . '/include/states.php';

if ($config['General']['use_counties'] == 'Y') {
    include $xcart_dir . '/include/counties.php';
}

if (!empty($active_modules['XAuth'])) {

    list($passwd1, $passwd2) = func_xauth_register_php_hook($login);
}

x_session_register('reg_error', array());

// Process UPS suggestion
if (
    $REQUEST_METHOD == 'POST'
    && !empty($active_modules['UPS_OnLine_Tools'])
    && !empty($av_suggest)
) {

    // Shipping Address Validation by UPS OnLine Tools module
    $av_data = func_ups_av_process_suggestion($av_suggest, $rank);

    if ($av_suggest == 'R') {

        // Restore saved data to re-enter
        $reg_error['saved_data'] = $_POST;
        $REQUEST_METHOD = 'GET';

    } elseif ($av_suggest == 'K') {

        // Restore and process saved data

    } elseif (
        $av_suggest == 'Y'
        && !empty($av_data)
    ) {
        // Apply suggestion
        foreach ($av_data as $f => $val) {
            $_POST['address_book']['S'][$f] = addslashes($val);
            if (!$_POST['ship2diff']) {
                $_POST['address_book']['B'][$f] = addslashes($val);
            }
        }
    }

    if (func_is_ajax_request()) {

        func_register_ajax_message(
            'popupDialogCall',
            array(
                'action' => 'close'
            )
        );
    }

    extract($_POST);
    extract($_GET);

    $mode = 'update';
}

$user = (isset($user)) ? intval($user) : 0;

if (
    isset($newbie)
    && $newbie == 'Y'
    && !isset($edit_profile)
) {

    // Register/Modify own profile

    $location[] = array(func_get_langvar_by_name('lbl_profile_details'), '');
}

$mode = !empty($mode) ? $mode : '';
$main = !empty($main) ? $main : '';

$is_admin_editor = false;

if (
    $current_area == 'C'
    && (
        isset($edit_profile)
        || $main == 'checkout'
    )
) {

    $fields_area = 'H';

} elseif ($current_area == 'C') {

    $fields_area = 'C';

} elseif (
    defined('IS_ADMIN_USER')
    && (
        defined('USER_MODIFY')
        || defined('USER_ADD')
    )

) {
    $fields_area = isset($usertype) ? $usertype : $current_area;

    $is_admin_editor = true;
    $smarty->assign('is_admin_editor', true);

} else {

    $fields_area = !empty($active_modules['Simple_Mode']) && $current_area == 'A'
        ? 'P'
        : $current_area;

}

$additional_fields  = func_get_additional_fields($fields_area, $logged_userid);
$default_fields     = func_get_default_fields($fields_area);
$address_fields     = func_get_default_fields($fields_area, 'address_book');

$name_fields = array();

$is_areas = func_get_profile_areas($fields_area);

$allow_pwd_modify =
    empty($login)
    || (
        defined('IS_ADMIN_USER')
        && (
            $REQUEST_METHOD == 'GET'
            || (
                $REQUEST_METHOD == 'POST'
                && $password_is_modified == 'Y'
                && ( !empty($passwd1) || !empty($passwd2) )
            )
        )
    );

$_anonymous_userinfo = func_get_anonymous_userinfo();

if (
    $REQUEST_METHOD == 'POST'
    && isset($_POST['usertype'])
) {

    /**
     * Process the POST request and create/update profile
     * or collect errors if any
     */

    if (isset($cart_operation))
        return;

    // Assign email to username if Email as login option is enabled
    if (
        !empty($login)
        || (
            !empty($passwd1)
            && !empty($passwd2)
        )
    ) {
        $uname = $config['email_as_login'] == 'Y'
            ? $email
            : $uname;
    }

    $uname = isset($uname) ? trim($uname) : '';

    // Adjust mode for anonymous customers
    if (
        $mode == 'update'
        && !empty($uname)
        && empty($login)
    ) {
        $mode = 'register';
    }

    /**
     *  Anonymous registration/update
     */
    $is_anonymous = false;

    if (
        $current_area == 'C'
        && $config['General']['enable_anonymous_checkout'] == 'Y'
        && !defined('USER_MODIFY')
        && !defined('USER_ADD')
        && (
            (
                $mode != 'update'
                && empty($login)
                && empty($uname)
            ) || (
                $mode == 'update'
                && empty($login)
            )
        )
    ) {
        $is_anonymous = true;
    }

    /**
     * Check if user have permissions to update/create profile
     */
    $allowed_registration = (
        $usertype == 'C'
        || (
            $usertype == 'B' 
            && $config['XAffiliate']['partner_register'] == 'Y'
        )
        || (
            $usertype == 'P' 
            && $config['General']['provider_register'] == 'Y'
        )
        || defined('IS_ADMIN_USER')
    );

    $allowed_update = (
        (
            $usertype == $current_area
            && !empty($login)
            && !empty($uname)
            && (
                $login == $uname
                || $config['General']['allow_change_login'] == 'Y'
                || $config['email_as_login'] == 'Y'
            )
        ) || defined('IS_ADMIN_USER')
        || $is_anonymous
    );

    $allow_set_login = (
        $mode != 'update'
        || $config['General']['allow_change_login'] == 'Y'
        || $config['email_as_login'] == 'Y'
    );

    if (
        (
            $mode != 'update'
            && !$allowed_registration
        ) || (
            $mode == 'update'
            && !$allowed_update
        )
    ) {
        func_403(36);
    }

    /**
     * User registration info passed to register.php via POST method
     * Errors check
     */

    $errors = array();

    if (
        $mode == 'update'
    ) {
        $old_userinfo = func_userinfo($logged_userid, $login_type, false, false, $fields_area, false, SKIP_CACHE);

        // Make checksum of the previous shipping address
        if (
            $current_area == 'C'
            && $main == 'checkout'
        ) {
            $shipping_checksum_fields = array(
                'city',
                'state',
                'country',
                'county',
                'zipcode',
                'zip4',
            );

            $_used_s_address = func_get_cart_address('s');

            $_tmp = @is_array($_used_s_address) 
                ? $_used_s_address 
                : $old_userinfo['address']['S'];
            $shipping_checksum_init = func_generate_checksum($_tmp, $shipping_checksum_fields);
        }

        if (
            !empty($old_userinfo)
            && !$allow_set_login
            && !$is_anonymous
        ) {
            $uname = addslashes($old_userinfo['login']);
        }
    }

    // Check if user already exists on register / change login

    if (!empty($uname)) {

        $existing_user = (func_query_first_cell("SELECT COUNT(id) FROM $sql_tbl[customers] WHERE login='$uname' AND usertype='$usertype'") > 0);

        if (
            $existing_user
            && (
                $mode != 'update'
                || $uname != $login
            )
        ) {
            if (!empty($active_modules['XAuth'])) {

                $errors = func_xauth_process_login_error($errors);

            } else {

                $errors[] = func_reg_error(1);
            }
        }

        // Check login
        if (
            !preg_match('/^' . func_login_validation_regexp() . '$/is', stripslashes($uname))
            || strlen($uname) > 127
        ) {
            $errors[] = func_reg_error(6);
        }

    }

    x_session_register('antibot_reg_err');

    if (
        !empty($login)
        || !empty($_anonymous_userinfo)
        || in_array($current_area, array('A'))
        || (
            $current_area == 'B'
            && !empty($login)
        )
    ) {

        $antibot_reg_err = false;

    } else {

        $antibot_reg_err = (
            !defined('USER_MODIFY')
            && !defined('USER_ADD')
            && !empty($active_modules['Image_Verification'])
            && func_validate_image('on_registration', $antibot_input_str)
        );

    }

    if ($antibot_reg_err) {
        $errors[] = func_reg_error(3);
    }

    if (
        !$is_anonymous
        && (
            $allow_pwd_modify
            && $passwd1 != $passwd2
            || strlen($passwd1) > 64
            || strlen($passwd2) > 64
        )
    ) {
        $errors[] = func_reg_error(15);
    }

    $fillerror = (
        !$is_anonymous
        && (
            empty($uname)
            || (
                $allow_pwd_modify
                && (
                    empty($passwd1)
                    || empty($passwd2)
                )
            )
        )
    );

    if (
        !$is_anonymous
        && !$fillerror
        && $allow_pwd_modify
    ) {

        if (preg_match('/demo.*@x-cart.com/s', $uname))
            require $xcart_dir . '/include/safe_mode.php';

        if (
                (
                    $config['Security']['use_complex_pwd'] == 'Y'
                    || in_array($login_type, array('A', 'P')) 
                )
            && 
                (
                func_is_password_weak($passwd1)
                || $passwd1 == $uname
                || $passwd1 == $login
            )
        ) {
            $errors[] = func_reg_error(5);
        }

        if (!empty($old_userinfo)) {

            if (
                $config['Security']['check_old_passwords'] == 'Y'
                || in_array($login_type, array('A','P'))
            ) {

                if (
                    text_verify($passwd1, text_decrypt($old_userinfo['password']))
                    || func_has_same_old_passwords($old_userinfo['id'], $passwd1)
                ) {
                    $errors[] = func_reg_error(4);
                } 
            }

        }

    }

    // Check required fields
    if (
        !$fillerror
        && is_array($default_fields)
    ) {
        foreach ($default_fields as $k => $v) {
            if (
                $v['required'] == 'Y'
                && empty(${$k})
            ) {
                $fillerror = ($k == 'state' || ($k == 'county' && $config['General']['use_counties'] == 'Y'))
                    ? func_is_display_states($country)
                    : true;
            }
        }
    }

    // Check additional fields
    if (
        !$fillerror
        && $additional_fields
        && !$is_admin_editor
    ) {
        foreach ($additional_fields as $v) {
            if (
                $v['required'] == 'Y'
                && $v['section'] != 'B'
                && empty($additional_values[$v['fieldid']])
                && $v['avail'] == 'Y'
            ) {
                $fillerror = true;
                break;
            }
        }
    }

    // Check email
    if (!func_check_email($email)) {
        $errors[] = func_reg_error(2);
    }

    // Some of required fields are empty
    if (
        $fillerror
        && !$is_admin_editor
    ) {
        $errors[] = func_reg_error(14);
    }

    // Check address book
    if (isset($address_book)) {

        $addr_errors = array();

        foreach ($address_book as $addrid => $data) {

            if (
                $current_area == 'C'
                && $addrid == 'S'
                && empty($ship2diff)
            ) {
                continue;
            }

            if (
                $current_area != 'C'
                && isset($delete_address)
                && isset($delete_address[$addrid])
            ) {
                continue;
            }

            $_result = func_check_address($data, $fields_area, true);
            
            if (isset($_result['not_filled'])) {

                // All fields are empty
                func_unset($address_book, $addrid);
                continue;
            }

            if (!empty($_result['errors'])) {
                $addr_errors[$addrid] = $_result['errors'];
            }
        }

        if (
            empty($addr_errors)
            && (!empty($additional_fields) && is_array($additional_fields))
            && !$is_admin_editor
        ) {

            $found_additional_error = false;

            foreach ($additional_fields as $v) {
                if (
                    $v['section'] == 'B'
                    && $v['required'] == 'Y'
                    && $v['avail'] == 'Y'
                ) {

                    if (empty($additional_values[$v['fieldid']]) || !is_array($additional_values[$v['fieldid']])) {

                        $errors[] = func_reg_error(14); // Wrong data value, addrid is unknown so report to $errors
                        $found_additional_error = true;

                    } else {
                        foreach ($additional_values[$v['fieldid']] as $addrid => $data) {

                            if (
                                $current_area == 'C'
                                && $addrid == 'S'
                                && empty($ship2diff)
                            ) {
                                continue;
                            }

                            $found_additional_error = empty($data);

                            if ($found_additional_error) {
                                $addr_errors[$addrid] = array(func_reg_error(14));
                                break;
                            }
                        }
                    }

                    if ($found_additional_error) {
                        break;
                    }

                }
            }
        }
    }
    
    if (
        empty($errors) 
        && empty($addr_errors)
    ) {

        // Fields filled without errors. User registered successfully

        if ($allow_pwd_modify) {
            $crypted = addslashes(text_crypt(text_hash(stripslashes($passwd1))));
        }

        // Add new member to Mailchimp newsletter list
        if ($current_area == 'C' && !empty($active_modules['Adv_Mailchimp_Subscription'])) {
            func_mailchimp_resubscribe();
        }

        // Add new member to newsletter list

        $cur_subs = array();

        if (
            !empty($old_userinfo)
            && isset($old_userinfo["email"])
        ) {

            $tmp = func_query("SELECT DISTINCT($sql_tbl[newslist_subscription].listid) FROM $sql_tbl[newslist_subscription], $sql_tbl[newslists] WHERE $sql_tbl[newslist_subscription].email='".addslashes($old_userinfo["email"])."' AND $sql_tbl[newslist_subscription].listid=$sql_tbl[newslists].listid AND $sql_tbl[newslists].lngcode='$shop_language'");

            if (is_array($tmp)) {
                foreach ($tmp as $v)
                    $cur_subs[] = $v['listid'];
            }
        }

        $ext_subs = array();

        $tmp = func_query("SELECT DISTINCT($sql_tbl[newslist_subscription].listid) FROM $sql_tbl[newslist_subscription], $sql_tbl[newslists] WHERE $sql_tbl[newslist_subscription].email='$email' AND $sql_tbl[newslist_subscription].listid=$sql_tbl[newslists].listid AND $sql_tbl[newslists].lngcode='$shop_language'");
        if (is_array($tmp)) {
            foreach ($tmp as $v)
                $ext_subs[] = $v['listid'];
        }

        $subs_keys = array();
        if (@is_array($subscription)) {
            $subs_keys = array_keys($subscription);
        }            

        $delid = array_diff($cur_subs,$subs_keys);
        $insid = array_diff($subs_keys,$cur_subs,$ext_subs);
        $updid = array_intersect($cur_subs, $subs_keys);
        $updid = array_diff($updid, $ext_subs);

        if (count($delid) > 0) {
            db_query("DELETE FROM $sql_tbl[newslist_subscription] WHERE email='$old_userinfo[email]' AND listid IN ('".implode("','",$delid)."')");
        }

        if (
            count($updid)>0
            && $old_userinfo['email'] != stripslashes($email)
        ) {
            db_query("UPDATE $sql_tbl[newslist_subscription] SET email='$email' WHERE email='$old_userinfo[email]' AND listid IN ('".implode("','",$updid)."')");
        }

        foreach ($insid as $id) {
            db_query("INSERT INTO $sql_tbl[newslist_subscription] (listid, email, since_date) VALUES ('$id','$email', '".XC_TIME."')");
        }

        // URL normalization
        if (!empty($url)) {
            if(strpos($url, 'http') !== 0) {
                $url = "http://".$url;
            }
        }

        if ($uname == $parent) {
            $parent = 0;
        } else {
            $parent = intval(func_query_first_cell("SELECT id FROM $sql_tbl[customers] WHERE id='$parent' AND usertype = 'B'"));
        }

        // Fill customer's name from address book entry
        // during registration at checkout
        if (
            $current_area == 'C'
            && $main == 'checkout'
            && isset($address_book)
            && isset($address_book['B'])
        ) {
            
            $name_fields = array(
                'title',
                'firstname',
                'lastname',
            );

            foreach($name_fields as $k => $f) {
                if (
                    (
                        !isset(${$f})
                        || empty(${$f})
                    )
                    && isset($address_book['B'][$f])
                ) {
                    ${$f} = $address_book['B'][$f];
                } else {
                    unset($name_fields[$k]);
                }
            }
        }

        // Update/Insert user info

        $pending_membershipid = isset($pending_membershipid) ? intval($pending_membershipid) : null;
        $common_profile_fields = array(
            'title',
            'firstname',
            'lastname',
            'company',
            'email',
            'url',
            'pending_membershipid',
            'ssn',
            'parent',
        );

        $profile_values = array();

        foreach ($common_profile_fields as $field) {

            if (isset(${$field}))
                $profile_values[$field] = ${$field};

        }

        // Store new password

        if ($allow_pwd_modify) {

            $old_passwords_ids = func_query_column("SELECT id FROM $sql_tbl[old_passwords] WHERE userid='$logged_userid' ORDER BY id DESC LIMIT 2");

            if (!func_array_empty($old_passwords_ids)) {
                $old_passwords_ids = implode("', '",$old_passwords_ids);

                db_query("DELETE FROM $sql_tbl[old_passwords] WHERE id NOT IN ('$old_passwords_ids') AND userid='$logged_userid'");
            }

            if (!empty($old_userinfo['password'])) {
                db_query("REPLACE INTO $sql_tbl[old_passwords] (userid, password) VALUES ('$logged_userid','".addslashes($old_userinfo["password"])."')");
            }

            $profile_values['password'] = $crypted;
            $profile_values['change_password_date'] = XC_TIME;
        }

        if (
            $current_area == 'C'
            || $current_area == 'B'
        ) {

            $fields = array_keys($profile_values);

            foreach ($default_fields as $_field => $_avail) {
                if (
                    $_avail['avail'] != 'Y'
                    && in_array($_field, $fields)
                    && !in_array($_field, $name_fields)
                ) {
                    unset($profile_values[$_field]);
                }
            }

            unset($fields);

            if (
                $config['Taxes']['allow_user_modify_tax_number'] == 'Y'
                || empty($existing_user)
                || func_query_first_cell("SELECT tax_exempt FROM $sql_tbl[customers] WHERE id='$logged_userid'") != "Y"
            ) {
                // Existing customer cannot edit 'tax_number' if
                // 'tax_exempt' == 'Y' and
                // 'allow_user_modify_tax_number' option == 'N'
                if (isset($tax_number))
                    $profile_values['tax_number'] = $tax_number;
            }

        } elseif (defined('IS_ADMIN_USER')) {

            // Administrator can edit 'tax_number' and 'tax_exempt'

            if (isset($tax_number)) {
                $profile_values['tax_number']           = $tax_number;
            }

            if (isset($tax_exempt)) {
                $profile_values['tax_exempt']           = ($tax_exempt == 'Y' ? 'Y' : 'N');
            }

            settype($trusted_provider, 'string');
            $profile_values['trusted_provider']     = ($login_type == 'P' && empty($active_modules["Simple_Mode"])) ? $trusted_provider : 'Y';
        }

        $activity_changed = false;

        if (
            defined('USER_MODIFY')
            || defined('USER_ADD')
        ) {

            $profile_values['change_password'] = empty($change_password) ? 'N' : 'Y';

            $profile_values['status']          = empty($status) ? 'N' : $status;
            $profile_values['suspend_date']    = (empty($old_userinfo) || $old_userinfo['status'] != $status) ? XC_TIME : 0;

            if ($profile_values['status'] != 'N')
                $profile_values['activation_key'] = '';

            $profile_values['activity'] = empty($activity) ? 'N' : $activity;

            $activity_changed = (!empty($old_userinfo) && $profile_values['activity'] != $old_userinfo['activity']);
        }

        if ($is_anonymous) {
            /**
             * Store anonymous profile in session
             */

            $_anonymous_userinfo = $profile_values;
            $_anonymous_userinfo['additional_fields'] = $additional_fields;

            if (isset($additional_values))
                $_anonymous_userinfo['additional_values'] = $additional_values;

            func_set_anonymous_userinfo($_anonymous_userinfo, 'run_save');

        } elseif ($mode == 'update') {

            /**
             * Update existing profile
             */

            $intershipper_recalc = 'Y';

            if ($allow_pwd_modify) {
                x_log_flag('log_activity', 'ACTIVITY', defined('USER_MODIFY') ? "'$login_' has changed password to '$login' user" : "'$login' has changed password");
            }

            if ($old_userinfo['login'] != stripslashes($uname)) {
                // Change login
                $profile_values['login'] = $uname;
                if (
                    !empty($identifiers[$login_type]['userid'])
                    && $identifiers[$login_type]['userid'] == $logged_userid
                ) {
                    $identifiers[$login_type]['login'] = stripslashes($uname);
                }
            }

            if (defined('IS_ADMIN_USER')) {

                $profile_values['membershipid'] = $membershipid;

            }

            $profile_values = func_array_map('trim', $profile_values);

            if (!empty($profile_values)) {
                func_array2update(
                    'customers',
                    $profile_values,
                    "id='$logged_userid' AND usertype='$login_type'"
                );
            }

            if (in_array($login_type, array('P', 'A'))) {
                x_log_flag(
                    'log_activity',
                    'ACTIVITY',
                    defined('USER_MODIFY')
                        ? "'$login_' user has updated '$login' profile"
                        : "'$login' user has updated '$login' profile"
                );
            }

            db_query("DELETE FROM $sql_tbl[register_field_values] WHERE userid = '$logged_userid'");

            if (!empty($additional_values)) {
                foreach ($additional_values as $k => $v) {
                    // array values to be saved in include/address_book.php
                    if (!is_array($v)) {
                        func_array2insert(
                            'register_field_values',
                            array(
                                'fieldid'     => $k,
                                'userid'    => $logged_userid,
                                'value'        => $v,
                            )
                        );
                    }
                }
            }

            if (
                !empty($active_modules['XAffiliate'])
                && $login_type == 'B'
            ) {
                func_set_partner_plan($plan_id, $pending_plan_id, $logged_userid);
                func_set_partner_pending_plan($pending_plan_id, $logged_userid);
            }

            $registered = 'Y';

            // Send mail notifications to customer department and signed customer

            $newuser_info = func_userinfo($logged_userid, $login_type, false, NULL, $fields_area, false);

            $mail_smarty->assign('userinfo', $newuser_info);

            // Send mail to registered user

            $to_customer = $newuser_info['language'];

            if($config['Email_Note']['eml_profile_modified_customer'] == 'Y') {

                func_send_mail(
                    $newuser_info['email'],
                    'mail/profile_modified_subj.tpl',
                    'mail/profile_modified.tpl',
                    $config['Company']['users_department'],
                    false
                );

            }

            // Send mail to customers department

            if($config['Email_Note']['eml_profile_modified_admin'] == 'Y') {

                func_send_mail(
                    $config['Company']['users_department'],
                    'mail/profile_admin_modified_subj.tpl',
                    'mail/profile_admin_modified.tpl',
                    $newuser_info['email'],
                    true
                );

            }

            if (
                !empty($active_modules['Greet_Visitor'])
                && $login_type == 'C'
                && $current_area == 'C'
            ) {
                func_store_greeting($profile_values);
            }

            global $xcart_dir;
            require_once $xcart_dir . '/include/classes/class.XCSignature.php';
            $obj_user = new XCUserSignature($old_userinfo);
            if ($obj_user->checkSignature()) {

                $obj_user = new XCUserSignature($newuser_info);
                $obj_user->updateSignature();
            }

        } else { // } elseif ($mode == 'update')

            /**
             * Add new person to customers table
             * or store anonymous profile in session
             */

            $intershipper_recalc = 'Y';

            $profile_values['login']    = $profile_values['username'] = $uname;
            $profile_values['usertype'] = $usertype;
            $profile_values['status']   = 'Y';

            if (
                !defined('USER_MODIFY')
                && !defined('USER_ADD')
            ) {
                $profile_values['change_password'] = 'N';
                $profile_values['activity']        = 'Y';
            }

            if (
                (
                    (
                        $usertype == 'B' 
                        && $config['XAffiliate']['partner_register_moderated'] == 'Y'
                    )
                    || (
                        $usertype == 'P' 
                        && $config['General']['provider_register_moderated'] == 'Y'
                    )
                )
                && !defined('USER_MODIFY')
                && !defined('USER_ADD')
            ) {
                $profile_values['status']    = 'Q';
            }

            if (defined('IS_ADMIN_USER')) {

                $profile_values['membershipid'] = $membershipid;
                $profile_values['status']       = $status;

            }

            if (!isset($profile_values['cart'])) {

                $profile_values['cart'] = '';

            }

            if (
                defined('AREA_TYPE')
                && in_array(constant('AREA_TYPE'), array('C', 'B'))
                && isset($_COOKIE['RefererCookie'])
            ) {
                $profile_values['referer'] = $_COOKIE["RefererCookie"];
            }

            // Set prefered language for new customer
            $_user_lngcode = 'en';

            if (defined('USER_ADD')) {

                $_user_lngcode = $usertype == 'C'
                    ? $config['default_customer_language']
                    : $config['default_admin_language'];

            } elseif ($store_language) {

                $_user_lngcode = $store_language;

            }

            $profile_values['language'] = $_user_lngcode;

            // Auto log-in
            $isAutoLogin = (
                $usertype == 'C'
                || (
                    $usertype == 'B'
                    && $login == ''
                )
                || (
                    $usertype == 'P'
                    && $login == '' 
                )
            );

            if (!empty($active_modules['Email_Activation'])) {
                $isAutoLogin = $isAutoLogin && !func_email_activation_is_required($usertype);
            }

            if ($isAutoLogin) {

                $profile_values['last_login'] = $profile_values['first_login'] = XC_TIME;

            }

            $profile_values = func_array_map('trim', $profile_values);

            $newuserid = func_array2insert(
                'customers',
                $profile_values
            );

            func_call_event('user.register.aftersave', $newuserid);

            $saved_userinfo = array();
            func_set_anonymous_userinfo(array());

            if (in_array($usertype, array('A', 'P'))) {
                x_log_flag(
                    'log_activity',
                    'ACTIVITY',
                    defined('USER_ADD')
                        ? "'$login_' user has added '$login' user, '$usertype' usertype"
                        : "'$login' user has added '$login' user, '$usertype' usertype"
                );
            }

            $new_user_flag = true;

            db_query("DELETE FROM $sql_tbl[register_field_values] WHERE userid = '$newuserid'");

            if (!empty($additional_values)) {

                foreach ($additional_values as $k => $v) {
                    // array values to be saved in include/address_book.php
                    if (!is_array($v)) {
                        func_array2insert(
                            'register_field_values',
                            array(
                                'fieldid' => $k,
                                'userid'  => $newuserid,
                                'value'   => $v,
                            )
                        );
                    }
                }
            }

            if (
                !empty($active_modules['XAffiliate'])
                && $usertype == 'B'
            ) {
                func_set_partner_plan($plan_id, $pending_plan_id, $newuserid);
                func_set_partner_pending_plan($pending_plan_id, $newuserid);
            }

            $registered = 'Y';

            // Send mail notifications to customer department and signed customer

            $newuser_info = func_userinfo($newuserid, $usertype, false, NULL, $fields_area, false);

            $need_to_send_signin_notif_to_user = true;

            if (!empty($active_modules['Email_Activation'])) {
                $need_to_send_signin_notif_to_user = func_email_activation_can_send_signin_notif($newuserid);
            }

            if ($need_to_send_signin_notif_to_user) {
                // Check for config and send notification to signed in customer
                func_do_signin_email_notification($newuser_info);
            }

            // Check for config and send notification to customer department
            func_do_signin_email_notification_cust_dept($newuser_info);

            // Auto-log in

            if ($isAutoLogin) {

                func_store_login_action($newuserid, $usertype, 'login', 'success');

                $login         = $uname;
                $login_type    = $usertype;
                $logged_userid = $newuserid;

                x_session_register('identifiers',array());

                $identifiers[$usertype] = array (
                    'login'      => $login,
                    'login_type' => $login_type,
                    'userid'     => $logged_userid,
                );
            }

            global $xcart_dir;
            require_once $xcart_dir . '/include/classes/class.XCSignature.php';
            $obj_user = new XCUserSignature($newuser_info);
            $obj_user->updateSignature();
        }

        if (
            !empty($active_modules['Special_Offers'])
            && $usertype == 'C'
            && (
                defined('USER_MODIFY')
                || defined('USER_ADD')
            )
        ) {
            include $xcart_dir.'/modules/Special_Offers/register_customer.php';
        }

        // Save address book
        include $xcart_dir . '/include/address_book.php';

    } else {

        // Fill $userinfo array if error occured
        $userinfo = $_POST;

        if (
            !empty($_POST['additional_values'])
            && !empty($additional_fields)
        ) {
            foreach ($additional_fields as $k => $v) {

                if (
                    is_array($additional_values[$v['fieldid']])
                    && $current_area == 'C'
                    && $main == 'checkout'
                    && !$ship2diff
                ) {
                    $additional_values[$v['fieldid']]['S'] = $additional_values[$v['fieldid']]['B'];
                }

                $additional_fields[$k]['value'] = $additional_values[$v['fieldid']];
            }
        }

        // Do not save POST data for One_Page_Checkout module.
        // One_Page_Checkout module handles registration errors via AJAX, without page reloading
        if (!func_is_ajax_request()) {
            $saved_userinfo[$user]                      = func_stripslashes($userinfo);
            $saved_userinfo[$user]['additional_fields'] = $additional_fields;
        }

        func_call_event('user.register.filluserinfo');

        if (isset($address_book)) {

            if (
                $current_area == 'C'
                && $main == 'checkout'
                && !$ship2diff
            ) {
                $address_book['S'] = $address_book['B'];
            }

            if (!func_is_ajax_request()) 
                $saved_userinfo[$user]['address'] = $address_book;
        }

        if (
            !empty($active_modules['News_Management'])
            && !empty($subscription)
            && is_array($subscription)
            && !func_is_ajax_request()
        ) {
            $saved_userinfo[$user]['subscription'] = $subscription;
        }

        if (
            !empty($active_modules['Adv_Mailchimp_Subscription'])
        ) { 
            func_mailchimp_save_subscription($mailchimp_subscription);
        }

    }

    if (!empty($av_error)) {
        $errors = array();
        $errors[] = func_reg_error(13);
    }

    if (
        !empty($errors) 
        || !empty($addr_errors)
    ) {

        $reg_errors = (!empty($errors) ? $errors : array());

        if (!empty($addr_errors)) {
            foreach ($addr_errors as $id => $err) {
                $reg_errors = array_merge($reg_errors, $err);
            }
        }

        if (!empty($reg_errors)) {

            $reg_error = func_prepare_error($reg_errors);

            $error_text = func_get_langvar_by_name('txt_registration_errors', FALSE, FALSE, TRUE);
            foreach ($reg_errors as $err) {
                $error_text .= $err['error'] . '<br />';
            }

            // Prepare errors data
            $top_message = array(
                'content' => $error_text,
                'type'    => 'E',
            );

        }

        unset($reg_errors);

    } else {

        if (
            isset($new_user_flag)
            && true == $new_user_flag
        ) {

            // Profile is created
            $top_message['content'] = func_get_langvar_by_name('msg_profile_add', false, false, true);

            if (!empty($active_modules['Email_Activation']) && func_email_activation_is_required($usertype)) {
                $top_message = func_email_activation_get_register_top_message($top_message);
            }

        } else {

            if ($is_anonymous) {

                // Anonymous profile is updated
                $top_message['content'] = func_get_langvar_by_name('msg_anonymous_profile_upd', false, false, true);

            } else {

                // Profile is updated
                $top_message['content'] = func_get_langvar_by_name('msg_profile_upd', false, false, true);

            }

        }

        $saved_userinfo = array();

        // Create provider directory
        if (
            !$single_mode 
            && $usertype == 'P'
        ) {
            if (
                $mode != 'update'
                && $config['General']['provider_register_moderated'] == 'N'
            ) {
                
                func_mkdir(func_get_files_location($newuserid, $usertype));

            } elseif (
                defined('USER_MODIFY') 
                || defined('USER_ADD')
            ) {
                
                func_mkdir(func_get_files_location($user, $usertype));

            }
        }    
    }

    if (
        !empty($active_modules['Abandoned_Cart_Reminder'])
        && !empty($logged_userid)
        && !empty($login_type)
        && $login_type == 'C'
    ) {
        func_abcr_save_abandoned_cart($logged_userid, $cart);
    }

    $script = basename($PHP_SELF) . '?' . $QUERY_STRING;
    settype($new_user_flag, 'bool');
    if (
        $new_user_flag
        && !defined('USER_ADD')
        && $current_area == 'C'
        && !isset($edit_profile)
        && $main != 'checkout'
    ) {
        // Redirect just registered customer
        if ($isAutoLogin) {
            $script = 'address_book.php';
        } else {
            $script = 'home.php';
        }
    }

    if (
        defined('USER_MODIFY')
        || defined('USER_ADD')
    ) {
        $id_of_changed_user = $logged_userid;
        $login          = $login_;
        $logged_userid  = $logged_userid_;
        $login_type     = $login_type_;

        if (
            defined('USER_ADD')
            && !$reg_error
        ) {
            $script = 'user_modify.php?' . $QUERY_STRING . '&user=' . $newuserid;
        }

        if (
            $usertype == 'P'
            && $activity_changed
            && !$single_mode
        ) {
            $p_categories = db_query("SELECT $sql_tbl[products_categories].categoryid FROM $sql_tbl[products], $sql_tbl[products_categories] WHERE $sql_tbl[products].productid = $sql_tbl[products_categories].productid AND $sql_tbl[products].provider='$id_of_changed_user' GROUP BY $sql_tbl[products_categories].categoryid ORDER BY NULL");

            if ($p_categories) {

                $cats = array();

                while ($row = db_fetch_array($p_categories)) {

                    $cats[] = $row['categoryid'];

                    if (count($cats) >= 100) {
                        func_recalc_product_count(func_array_merge($cats, func_get_category_parents($cats)));
                        $cats = array();
                        $need_fc_rebuild_categories = TRUE;


                    }

                }

                if (!empty($cats)) {
                    func_recalc_product_count(func_array_merge($cats, func_get_category_parents($cats)));
                    func_data_cache_clear('getRangeProductIds');
                    $need_fc_rebuild_categories = TRUE;
                }


                db_free_result($p_categories);

                // Update categories data cache for Fancy categories module
                // Must be run after func_recalc_product_count/func_cat_tree_rebuild/func_recalc_subcat_count
                if (!empty($active_modules['Flyout_Menus']) && func_fc_use_cache() && !empty($need_fc_rebuild_categories)) {
                    func_fc_build_categories(1);
                }
            }
        }

    } elseif (isset($edit_profile)) {

        $script = 'cart.php?mode=checkout';

        if (!empty($paymentid)) {
            $script .= '&paymentid=' . intval($paymentid);
        }

        if (!empty($reg_error) || !empty($av_error)) {
            $script .= '&edit_profile';
        }

    } elseif (
        $current_area == 'C'
        && !empty($cart)
    ) {

        $userinfo = func_userinfo($logged_userid, $login_type, false, false, $fields_area);
        $shippingid = func_cart_get_shippingid($cart, $userinfo);
        $cart = func_cart_set_shippingid($cart, $shippingid);
        
        list($cart, $products) = func_generate_products_n_recalculate_cart(@$paymentid);

        // And again, because shippingid is not saved after func_calculate
        $cart = func_cart_set_shippingid($cart, $shippingid);

    } elseif (
        $current_area == 'B'
        && $login_type == 'B'
        && $newuser_info['status'] == 'Q'
    ) {

        $script = $xcart_catalogs['partner'] . "/home.php?mode=profile_created";

    } elseif (
        $current_area == 'P'
        && $login_type == 'P'
        && $newuser_info['status'] == 'Q'
    ) {
        $script = $xcart_catalogs['provider'] . '/home.php?mode=profile_created';
    }

    if (
        $current_area == 'C'
        && $main == 'checkout'
    ) {

        $_tmp = $address_book[!empty($ship2diff) ? 'S' : 'B'];

        $shipping_checksum = func_generate_checksum($_tmp, $shipping_checksum_fields);

        func_register_ajax_message(
            'opcUpdateCall',
            array(
                'action'    => 'profileUpdate',
                'status'    => empty($reg_error) ? 1 : 0,
                'error'     => $reg_error,
                'av_error'  => !empty($av_error) ? 1 : 0,
                'content'   => $top_message['content'],
                'new_user'  => $new_user_flag ? 1 : 0,
                'autologin' => !empty($isAutoLogin) ? 1 : 0,
                's_changed' => $shipping_checksum != $shipping_checksum_init ? 1 : 0
            )
        );

        if (func_is_ajax_request()) {
            $reg_error = array();
            if (
                empty($active_modules['Email_Activation'])
                || !func_email_activation_need_to_show_top_message($isAutoLogin, $new_user_flag)
            ) {
                $top_message = array();
            }
        }

    }

    func_header_location($script);

} else {

    /**
     * Process GET-request
     */

    if ($mode == 'update') {

        if (
            !empty($logged_userid)
            || $main == 'checkout'
        ) {

            $userinfo = func_userinfo($logged_userid, $login_type, false, false, $fields_area, false);

            if (!empty($userinfo['additional_fields'])) {
                $additional_fields = $userinfo['additional_fields'];
            }

        } elseif (!defined('USER_MODIFY')) {

            func_header_location('register.php');

        }

    } elseif (
        'delete' === $mode
        && 'POST' === $REQUEST_METHOD
        && 'Y' === $confirmed
        && !empty($logged_userid)
    ) {
        require $xcart_dir . '/include/safe_mode.php';

        $olduser_info = func_userinfo($logged_userid, $login_type, false, false, null, false);

        $to_customer = $olduser_info['language'];

        // Clear last working URL to avoid automatic profile deletion within current session.
        func_url_unset_last_working_url($login_type);

        // Remove profile from db
        func_delete_profile($logged_userid, $login_type, true, true, (isset($next_provider) ? $next_provider : false));

        if (in_array($login_type, array('P', 'A')))
            x_log_flag('log_activity', 'ACTIVITY', "'$login' user has deleted '$login' profile");

        $login = $login_type = $logged_userid = '';

        $smarty->clear_assign('login');
        $smarty->clear_assign('logged_userid');

        // Send mail notifications to customer department and signed customer
        $mail_smarty->assign('userinfo',$olduser_info);

        if ($config['Email_Note']['eml_profile_deleted'] == 'Y') {
            func_send_mail(
                $olduser_info['email'],
                'mail/profile_deleted_subj.tpl',
                'mail/profile_deleted.tpl',
                $config['Company']['users_department'],
                false
            );
        }

        // Send mail to customers department

        if ($config['Email_Note']['eml_profile_deleted_admin'] == 'Y') {
            func_send_mail(
                $config['Company']['users_department'],
                'mail/profile_admin_deleted_subj.tpl',
                'mail/profile_admin_deleted.tpl',
                $olduser_info['email'],
                true
            );
        }

        $top_message = array(
            'content' => func_get_langvar_by_name('txt_profile_deleted')
        );

        func_header_location('home.php');

    } // mode delete, confirmed

} // Request GET

if (
    !empty($active_modules['Special_Offers'])
    && @$usertype == 'C'
    && (
        defined('USER_MODIFY')
        || defined('USER_ADD')
    )
) {
    include $xcart_dir.'/modules/Special_Offers/register_customer.php';
}

if (
    $current_area == 'C'
    && !empty($active_modules['UPS_OnLine_Tools'])
) {

    /**
     * Get the UPS OnLine Tools module settings
     */
    $params = func_query_first ("SELECT * FROM $sql_tbl[shipping_options] WHERE carrier='UPS'");

    $ups_parameters = unserialize($params['param00']);

    if (!is_array($ups_parameters)) {
        $ups_parameters['av_status'] = 'N';
    }

    $smarty->assign('av_enabled', $ups_parameters['av_status']);
}

if ($REQUEST_METHOD == 'GET') {

    /**
     * Restore user info from the $saved_userinfo session variable
     */

    if (
        is_numeric($user)
        && !empty($saved_userinfo)
        && !empty($saved_userinfo[$user])
    ) {
        $userinfo          = func_array_merge($userinfo, $saved_userinfo[$user]);
        $userinfo['restored_after_error'] = true;
        $additional_fields = $saved_userinfo[$user]['additional_fields'];
        $saved_userinfo[$user] = array();

        if (
            defined('USER_MODIFY')
            && !empty($_GET['user'])
            && defined('IS_ADMIN_USER')
        ) {
            $user_exists = func_query_first_cell("SELECT COUNT(*) FROM $sql_tbl[customers] WHERE id = '" . $_GET["user"] . "'");

            if ($user_exists > 0) {
                $userinfo['login'] = $userinfo['uname'];
            }
        }
    }

    if (!empty($reg_error)) {
        $smarty->assign('reg_error', $reg_error);
        $reg_error = array();
    }

}

$ship2diff = false;

if (!empty($userinfo)) {

    if (!empty($active_modules['Klarna_Payments'])) {
        
        func_klarna_address_merge($userinfo, $cart);
    }

    if ($main == 'checkout') {

        list($cart, $userinfo) = func_adjust_customer_address($cart, $userinfo);
        if (!empty($additional_fields)) {
            if (!$is_anonymous) {
                list($additional_fields, $address_additional_values) = func_adjust_address_additional_values($additional_fields);
            } else {
                $address_additional_values = array();
                foreach ($additional_fields as $_v) {
                    if ($_v['section'] == 'B') {
                        $address_additional_values['B'][$_v['fieldid']] = isset($_v['value']['B']) ? $_v['value']['B'] : '';
                        $address_additional_values['S'][$_v['fieldid']] = isset($_v['value']['S']) ? $_v['value']['S'] : '';
                    }
                }
            }
        }
    }

    // Get address book information
    if (
        $current_area != 'C'
        || $main == 'checkout'
        || defined('USER_MODIFY')
    ) {

        if (!$is_anonymous) {

            $address_book = func_get_address_book($logged_userid);
            if (!empty($saved_address_book)) {

                foreach ($saved_address_book as $_id => $_data) {
                    if ($saved_address_book[$_id]) {
                        $address_book[$_id] = $saved_address_book[$_id];
                    }
                }

                $saved_address_book = array();
            }

            if (defined('USER_MODIFY') && !empty($additional_fields)) {
                $address_book_additional_fields = func_get_address_book_additional_fields($address_book, $additional_fields);
                $smarty->assign('address_book_additional_fields', $address_book_additional_fields);
            }
        }

        if ($main == 'checkout') {
            $need_address_info = $is_anonymous || empty($address_book);

            if (!$need_address_info && $is_areas['B']) {
                $result = func_check_address($userinfo['address']['B'], $userinfo['usertype']);
                $need_address_info = !empty($result['errors']);
            }

            if (!$need_address_info && $is_areas['S']) {
                $result = func_check_address($userinfo['address']['S'], $userinfo['usertype']);
                $need_address_info = !empty($result['errors']);
            }

            if ($need_address_info) {
                $smarty->assign('need_address_info', true);
            }
        }

        // Check if ship2diff section should be expanded

        if (
            !empty($userinfo['address'])
            && @is_array($userinfo['address']['B'])
            && is_array($userinfo['address']['S'])
        ) {

            if (!empty($address_additional_values['B'])) {

                $ship2diff = func_is_addresses_different($userinfo['address']['B'], $userinfo['address']['S'], $fields_area, $address_additional_values['B'], $address_additional_values['S']);

            } else {

                $ship2diff = func_is_addresses_different($userinfo['address']['B'], $userinfo['address']['S'], $fields_area);

            }

            $b_display_states = func_is_display_states(addslashes($userinfo['address']['B']['country']));

            $s_display_states = (!$ship2diff)
                ? $b_display_states :
                func_is_display_states(addslashes($userinfo['address']['S']['country']));

            $userinfo['address']['B']['display_states'] = $b_display_states;
            $userinfo['address']['S']['display_states'] = $s_display_states;
        }

        $smarty->assign('address_fields', $address_fields);
        if (!empty($address_book)) {
            $smarty->assign('address_book', $address_book);
        }
    }

    $smarty->assign('userinfo', $userinfo);

    if (
        $REQUEST_METHOD == 'GET'
        && !empty($active_modules['News_Management'])
    ) {
        if (empty($userinfo['restored_after_error'])) {

            if (isset($userinfo['email'])) {
                // Get subscriptions from db assigned to the customer
                $tmp = func_query("SELECT listid FROM $sql_tbl[newslist_subscription] WHERE email='" . addslashes($userinfo['email']) . "'");

                if (is_array($tmp)) {
                    $subscription = array();
                    foreach ($tmp as $v) {
                        $subscription[$v['listid']] = true;
                    }
                }
            }

        } else {

            // Get subscriptions checked by customer from previous POST
            if (isset($userinfo['subscription'])) {
                $subscription = $userinfo['subscription'];
            }

        }
    }
    if (
        $_SERVER['REQUEST_METHOD'] == 'GET'
        && !empty($active_modules['Adv_Mailchimp_Subscription'])
    ) {
        func_mailchimp_get_subscription($userinfo);
    }
}

$smarty->assign('ship2diff', $ship2diff);

if (isset($subscription)) {
    $smarty->assign('subscription', $subscription);
}

if (!empty($active_modules['Adv_Mailchimp_Subscription'])){
   func_mailchimp_assign_to_smarty();
}

$newslists = func_query("SELECT * FROM $sql_tbl[newslists] WHERE avail='Y' AND subscribe='Y' AND lngcode='$shop_language'");
$smarty->assign('newslists', $newslists);

if ($allow_pwd_modify) {
    $smarty->assign('allow_pwd_modify', 'Y');
}

if (!empty($registered)) {
    $smarty->assign('registered', $registered);
}

if ($mode == 'delete') {

    if (empty($login)) {
        func_header_location('home.php');
    }

    $location[count($location)-1] = array(func_get_langvar_by_name('lbl_delete_profile'), '');

    $smarty->assign('main', 'profile_delete');

    if (in_array($login_type, array('A', 'P'))) {

        $smarty->assign('provider_counters',     func_get_provider_counters($logged_userid));
        $smarty->assign('is_provider_profile',     ($login_type == 'P' && !$single_mode));
        $smarty->assign('move_to_providers',     func_get_next_providers($logged_userid));

    }

} elseif ($mode == 'notdelete') {

    if (!empty($login))
        $top_message['content'] = func_get_langvar_by_name('txt_profile_not_deleted');

    func_header_location('home.php');

} else {

    $smarty->assign('main', 'register');
}

if (
    !empty($active_modules['XAffiliate'])
    && (
        (
            $mode == 'update'
            && $login_type == 'B'
        )
        || $current_area == 'B'
    )
) {
    $plans = func_query("SELECT * FROM $sql_tbl[partner_plans] WHERE status = 'A' ORDER BY plan_title");

    $smarty->assign('plans', $plans);
}

if (isset($_GET['parent'])) {
    $smarty->assign('parent', $parent);
}

if ($submode == 'seller_address') {

    $default_fields = array(
        'address' => array(
            'title'     => 'address',
            'field'     => 'address',
            'avail'     => 'Y',
            'required'     => 'N',
        ),
        'city' => array(
            'title'        => 'city',
            'field'        => 'city',
            'avail'        => 'Y',
            'required'     => 'Y',
        ),
        'state' => array(
            'title'     => 'state',
            'field'        => 'state',
            'avail'        => 'Y',
            'required'     => 'Y',
        ),
        'country' => array(
            'title'        => 'country',
            'field'        => 'country',
            'avail'        => 'Y',
            'required'     => 'Y',
        ),
        'zipcode' => array(
            'title'        => 'zipcode',
            'field'        => 'zipcode',
            'avail'        => 'Y',
            'required'     => 'Y',
        ),
    );

    func_unset($additional_fields);
}

if (
    !defined('USER_MODIFY')
    && !defined('USER_ADD')
    && !empty($active_modules['Image_Verification'])
) {
    x_session_register('antibot_reg_err');

    if ($antibot_reg_err) {

        $smarty->assign('reg_antibot_err', $antibot_reg_err);

        x_session_unregister('antibot_reg_err');
    }

    $smarty->assign('display_antibot', $display_antibot);
}

$smarty->assign('default_fields',    $default_fields);
$smarty->assign('additional_fields', $additional_fields);
$smarty->assign('is_areas',          $is_areas);

if (!empty($av_error))
    $smarty->assign('av_error',          $av_error);

$m_usertype = empty($_GET['usertype'])
    ? $current_area
    : $_GET['usertype'];

$membership_levels = func_get_memberships($m_usertype);

if (!empty($membership_levels)) {
    $smarty->assign('membership_levels', $membership_levels);
}

$smarty->assign('titles', func_get_titles());

x_session_save();
?>
