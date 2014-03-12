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
 * Check security for admin area
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v12 (xcart_4_6_2), 2014-02-03 17:25:33, func.security.php, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header("Location: ../"); die("Access denied"); }

function func_check_admin_security_redirect() {
    global $smarty, $active_modules, $current_area, $login, $config, $REMOTE_ADDR, $sql_tbl, $logged_userid, $_session_force_regenerate, $hide_security_warning, $access_status, $merchant_password, $logout_user;

    $_is_admin_user = ($current_area == 'A' || (!empty($active_modules['Simple_Mode']) && $current_area == 'P'));

    // Admin user and Simple mode condition
    if ($_is_admin_user) {
        define('IS_ADMIN_USER', true);
        $smarty->assign('is_admin_user', true);
    }

    if (empty($login)) {
        return;
    }

    // Check integrity of admin account
    if (XCSecurity::CHECK_CUSTOMERS_INTEGRITY) {
        $_user_data = func_query_first("SELECT * FROM $sql_tbl[customers] WHERE id='$logged_userid' AND " . XCUserSignature::getApplicableSqlCondition());

        $obj = new XCUserSignature($_user_data);
        $is_fake_admin_account = (!$obj->checkSignature());
    } else {
        $is_fake_admin_account = FALSE;
    }

    // Check integrity of admin account related to xauth_user_ids table
    if (
        XCSecurity::CHECK_XAUTH_USER_IDS_INTEGRITY
        && !empty($active_modules['XAuth'])
    ) {
        $is_fake_admin_account_xauth = FALSE;
        $_users = func_query("SELECT " . XCUserXauthIdsSignature::getSignedFields() . " FROM $sql_tbl[customers] INNER JOIN $sql_tbl[xauth_user_ids] ON $sql_tbl[customers].id=$sql_tbl[xauth_user_ids].id AND " . XCUserXauthIdsSignature::getApplicableSqlCondition());
        if (!empty($_users)) 
        foreach($_users as $_user_data) {
            $obj = new XCUserXauthIdsSignature($_user_data);
            if (!$obj->checkSignature()) {
                $is_fake_admin_account_xauth = TRUE;
                break;
            }
        }

    } else {
        $is_fake_admin_account_xauth = FALSE;
    }

    // Check integrity of critical config values
    if (XCSecurity::CHECK_CONFIG_INTEGRITY) {
        $has_fake_config_values = func_secure_has_fake_config_values();
    } else {
        $has_fake_config_values = FALSE;
    }

    $is_unallowed_ip = FALSE;
    if (
        $_is_admin_user
        && !$has_fake_config_values
        && !$is_fake_admin_account
        && !$is_fake_admin_account_xauth
    ) {

        // Check IP registration codes expiration date
        func_delete_expired_ip_register_codes();

        if (
            !isset($config['allowed_ips'])
            || empty($config['allowed_ips'])
        ) {
            func_register_admin_ip($REMOTE_ADDR);
        } else {

            // Check IP address for Admin area
            $is_unallowed_ip = XCSecurity::BLOCK_UNKNOWN_ADMIN_IP 
                && !func_check_allow_admin_ip();
        }
    }

    // Log out admin on errors
    if (
        $is_unallowed_ip
        || $is_fake_admin_account
        || $is_fake_admin_account_xauth
        || $has_fake_config_values
    ) {

        $utype = $current_area;

        if (
            !empty($active_modules['Simple_Mode'])
            && $utype == 'A'
        ) {
            $utype = 'P';
        }

        $store_login_action = func_get_store_login_action($is_unallowed_ip, $is_fake_admin_account, $is_fake_admin_account_xauth ,$has_fake_config_values);

        func_store_login_action($logged_userid, $utype, $store_login_action, 'restricted');
        if (
            $is_unallowed_ip
            && !$has_fake_config_values
            && !$is_fake_admin_account
            && !$is_fake_admin_account_xauth
        ) {
            func_send_admin_ip_reg();
        }

        func_end_user_session();

        $access_status     = '';
        $merchant_password = '';
        $logout_user       = true;

        func_ge_erase();

        func_secure_prepare_reason_top_message($is_unallowed_ip, $is_fake_admin_account, $is_fake_admin_account_xauth, $has_fake_config_values);

        x_session_unregister('hide_security_warning');
        x_session_register('_session_force_regenerate');
        $_session_force_regenerate = true;

        func_header_location('home.php');
    }
}

function func_get_store_login_action($is_unallowed_ip, $is_fake_admin_account, $is_fake_admin_account_xauth, $has_fake_config_values) {
    $actions = array();
    if ($is_unallowed_ip)
        $actions[] = 'check_admin_ip';

    if ($is_fake_admin_account)
        $actions[] = 'check_admin_account_authenticity';

    if ($is_fake_admin_account_xauth)
        $actions[] = 'check_admin_account_authenticity_social_login';

    if ($has_fake_config_values)
        $actions[] = 'check_critical_config_values_authenticity:' . strip_tags($has_fake_config_values);

    return implode(',', $actions);
}

function func_secure_has_fake_config_values() { // {{{
    global $sql_tbl;

    $config_rows = func_query("SELECT " . XCConfigSignature::getSignedFields() . " FROM $sql_tbl[config] WHERE " . XCConfigSignature::getApplicableSqlCondition());

    if (
        empty($config_rows)
        || count($config_rows) != count(XCConfigSignature::getSignedConfigs())
    ) {

        $deleted_signed_configs = XCConfigSignature::getSignedConfigs();

        if (is_array($config_rows))
        foreach($config_rows as $row) {
            unset($deleted_signed_configs[$row['name']]);
        }

        return '&nbsp;*' . implode('&nbsp;<br />', $deleted_signed_configs);
    }

    $result = array();
    foreach($config_rows as $row) {
        $objConfigSign = new XCConfigSignature($row);

        if (!$objConfigSign->checkSignature()) {
            if (!in_array($row['name'], array('allowed_ips', 'ip_register_codes'))) {
                $conf_comment = func_get_langvar_by_name('opt_' . $row['name'], NULL, false, true);

                if (!$conf_comment) {
                    $conf_comment = func_query_first_cell("SELECT comment FROM $sql_tbl[config] WHERE name='$row[name]'");
                }
            } else {
                $conf_comment = func_get_langvar_by_name('txt_fake_allowed_ips_detected', NULL, false, true);
            }

            $signed_configs = XCConfigSignature::getSignedConfigs();
            $conf_comment = !empty($conf_comment) ? $conf_comment : $signed_configs[$row['name']];
            $result[] = "&nbsp;*" . $conf_comment;
        }
    }

    return implode('<br />', $result);
} // }}}

function func_secure_prepare_reason_top_message($is_unallowed_ip, $is_fake_admin_account, $is_fake_admin_account_xauth, $has_fake_config_values) {
    global $top_message;
    x_session_register('top_message');

    $messages = array();

    if ($is_unallowed_ip)
        $messages[] = func_get_langvar_by_name('lbl_ip_blocked_for_admin_area_note');

    if ($is_fake_admin_account)
        $messages[] = func_get_langvar_by_name('txt_fake_admin_account_blocked');

    if ($is_fake_admin_account_xauth)
        $messages[] = func_get_langvar_by_name('txt_fake_admin_account_blocked_xauth');

    if ($has_fake_config_values) {
        $messages[] = func_get_langvar_by_name('txt_fake_config_values_blocked', array('configs' => $has_fake_config_values));
    }

    $top_message = array(
        'content' => implode('<br /><br />', $messages),
        'type'    => 'W'
    );
}

/*
 Check and updated config signatures
*/
function func_secure_update_config_signatures($old_configs) { // {{{
    global $sql_tbl;

    if (empty($old_configs))
        return FALSE;

    foreach($old_configs as $config_row) {
        $objConfigSign = new XCConfigSignature($config_row);
        if ($objConfigSign->checkSignature()) {
            $updated_config_data = func_query_first("SELECT " . XCConfigSignature::getSignedFields() . " FROM $sql_tbl[config] WHERE name='$config_row[name]'");

            $objConfigSign = new XCConfigSignature($updated_config_data);
            $objConfigSign->updateSignature();
        }
    }

    return TRUE;
} // }}}

?>
