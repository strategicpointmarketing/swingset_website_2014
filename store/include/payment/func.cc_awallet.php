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
 * Functions for "Allied Wallet" payment module
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v4 (xcart_4_6_2), 2014-02-03 17:25:33, func.cc_awallet.php, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header("Location: ../"); die("Access denied"); }

/**
 * Get currencies list
 */
function func_cc_awallet_get_currencies()
{
    $currencies = array(
        'USD' => 'US Dollars',
        'EUR' => 'Euros',
        'GBP' => 'British Pounds',
        'CAD' => 'Canadian Dollars',
    );

    return $currencies;
}

function func_cc_awallet_prepare_post($module_params, $secure_oid, $cart)
{
    global $current_location;

    // Prepare necessary variables
    $merchant_id = $module_params['param01'];
    $site_id = $module_params['param02'];
    $currency = $module_params['param03'];
    $order      = $module_params['param04'] . join('-', $secure_oid);

    // Define URLs
    $qs   = '?result=';
    $url  = $current_location . '/payment/cc_awallet.php';

    $callback_url = $url;
    $return_url   = $url . $qs . 'return';
    $decline_url   = $url . $qs . 'decline';

    // Prepare the array with posted data
    $post = array(
        'MerchantID'         => $merchant_id,
        'SiteID'         => $site_id,
        'AmountShipping'     => '0.00',
        'AmountTotal'         => $cart['total_cost'],
        'CurrencyID'         => $currency,
        'ReturnURL'     => $return_url,
        'DeclineURL'     => $decline_url,
        'ConfirmURL'     => $callback_url,
        'RequireShipping'     => '0', //If this value is > 0, then the customer will be prompted for shipping information.
        'NoMembership'     => '1', // If this value is > 0, the user will NOT be prompted to purchase a subscription.
        'MerchantReference'     => $order,
    );

    $items_total = $ind = 0;

    if (!empty($cart['products']))
    foreach ($cart['products'] as $i => $p) {
        $post["ItemAmount[$ind]"] = $p["display_price"] * $p["amount"];
        $post["ItemDesc[$ind]"] = func_payment_product_description($p, 2048);
        $post["ItemName[$ind]"] = $p["product"];
        $post["ItemQuantity[$ind]"] = $p["amount"];
        $items_total += $p["display_price"] * $p["amount"];
        $ind++;
    }

    if (!empty($cart['giftcerts']))
    foreach ($cart['giftcerts'] as $p) {
        $post["ItemAmount[$ind]"] = $p['amount'];
        $post["ItemDesc[$ind]"] = 'Gift certificate for ' . $p['recipient'];
        $post["ItemName[$ind]"] = 'GIFT CERTIFICATE';
        $post["ItemQuantity[$ind]"] = 1;
        $items_total += $p["amount"];
        $ind++;
    }

    // WA for 'The amounts received are invalid' error
    if (($cart['total_cost'] - $items_total) > 0.00001)
        $post['AmountShipping'] = $cart['total_cost'] - $items_total;

    if (defined('AWALLET_DEBUG')) {
        func_pp_debug_log('awallet', 'I', $post);
    }

    return array($post, $order);
}



?>
