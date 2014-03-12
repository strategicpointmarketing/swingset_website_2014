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
 * Functions for "Moneybookers (Credit Card)" payment module
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v22 (xcart_4_6_2), 2014-02-03 17:25:33, func.cc_mbookers.php, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if ( !defined('XCART_START') ) { header("Location: ../"); die("Access denied"); }

/**
 * Get currencies list
 */
function func_cc_mbookers_get_currencies()
{
    $currencies = array(
        'EUR' => 'Euro',
        'USD' => 'U.S. Dollar',
        'GBP' => 'British Pound',
        'HKD' => 'Hong Kong Dollar',
        'SGD' => 'Singapore Dollar',
        'JPY' => 'Japanese Yen',
        'CAD' => 'Canadian Dollar',
        'AUD' => 'Australian Dollar',
        'CHF' => 'Swiss Franc',
        'DKK' => 'Danish Krone',
        'SEK' => 'Swedish Krona',
        'NOK' => 'Norwegian Krone',
        'ILS' => 'Israeli Shekel',
        'MYR' => 'Malaysian Ringgit',
        'NZD' => 'New Zealand Dollar',
        'TRY' => 'New Turkish Lira',
        'AED' => 'Utd. Arab Emir. Dirham',
        'MAD' => 'Moroccan Dirham',
        'QAR' => 'Qatari Rial',
        'SAR' => 'Saudi Riyal',
        'TWD' => 'Taiwan Dollar',
        'THB' => 'Thailand Baht',
        'CZK' => 'Czech Koruna',
        'HUF' => 'Hungarian Forint',
        'BGN' => 'Bulgarian Leva',
        'PLN' => 'Polish Zloty',
        'ISK' => 'Iceland Krona',
        'INR' => 'Indian Rupee',
        'KRW' => 'South-Korean Won',
        'ZAR' => 'South-African Rand',
        'RON' => 'Romanian Leu New',
        'HRK' => 'Croatian Kuna',
        'LTL' => 'Lithuanian Litas',
        'JOD' => 'Jordanian Dinar',
        'OMR' => 'Omani Rial',
        'RSD' => 'Serbian dinar',
        'TND' => 'Tunisian Dinar',
        'BHD' => 'Bahraini Dinar',
        'KWD' => 'Kuwaiti dinar',
    );

    return $currencies;
}

?>
