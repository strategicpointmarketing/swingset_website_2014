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
 * fCommerce Go module running file
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Modules
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>. All rights reserved
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v6 (xcart_4_6_2), 2014-02-03 17:25:33, fcommerce.php, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

/**
 * Errors handling. Debug.
 */
if (!empty($_GET['fb_debug'])) {
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}

/**
 * Main code
 */
if (!empty($_POST['locale'])) {
    $_GET['sl'] = $_POST['locale'];
}

/**
 * X-Cart initializations
 */
include './top.inc.php';

define('FB_TAB_START', true);

include $xcart_dir . '/init.php';

if (
        file_exists($xcart_dir . '/include/adaptives.php')
        && is_readable($xcart_dir . '/include/adaptives.php')
) {
    require_once $xcart_dir . '/include/adaptives.php';
}

/**
 * Set own caching directory to prevent cache overlapping
 */
$compile_dir = $var_dirs['templates_c'] . DIRECTORY_SEPARATOR . md5('fcommerce_tpls');

if (!is_dir($compile_dir)) {
    func_mkdir($compile_dir);
}

$smarty->compile_dir = $compile_dir;

/**
 * Setting up the locale code, depends on X-Cart version
 */
if (
        strnatcmp($config['version'], '4.3.0') < 0 && isset($_POST['locale'])
) {
    $_GET['sl'] = strtoupper(($_POST['locale'] == 'en') ? 'US' : $_POST['locale']);
}

if (
        file_exists($xcart_dir . '/include/get_language.php')
        && is_readable($xcart_dir . '/include/get_language.php')
) {
    require_once $xcart_dir . '/include/get_language.php';
}

/**
 * Fatal errors handling
 */
if (function_exists('func_fb_error_shutdown')) {
    register_shutdown_function('func_fb_error_shutdown');
}

/**
 * Third party modules including point
 */
require_once $xcart_dir . '/modules/fCommerce_Go/third_parties.php';


if (isset($is_installed)) {
    /**
     * Print installation info
     */
    $shop_configuration['is_installed'] = func_query_first_cell("SELECT count(moduleid) FROM $sql_tbl[modules] WHERE module_name = 'fCommerce_Go'");

    $shop_configuration['soft'] = 'xc_' . ($single_mode ? 'gold' : 'pro');
    $shop_configuration['version'] = $config['version'];
} else {
    /**
     * Include module's customer side core
     */
    define('AREA_TYPE', 'C');
    $current_area = 'C';

    if ($config['General']['shop_closed'] == 'Y' || empty($active_modules['fCommerce_Go'])) {

        $shop_configuration['shop_closed'] = true;
        $shop_configuration['shop_closed_note'] = '<h1 align="center">' . func_get_langvar_by_name('txt_shop_temporarily_unaccessible', false, false, true) . '</h1>';
    } else {

        include $xcart_dir . '/modules/fCommerce_Go/shop.php';
    }
}

/**
 * Adding debug data to output
 */
if (isset($debug_data)) {
    $shop_configuration['debug'] = $debug_data;
}

/**
 * Prepare output data
 */
$fb_output = serialize($shop_configuration);

/**
 * Compressing output data
 */
if (
        extension_loaded('zlib')
        && strlen($fb_output) > 51200
        && stristr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') != false
) {
    header('Content-Encoding: gzip');
    $fb_output = gzcompress($fb_output, 1);
}

/**
 * Print output
 */
echo $fb_output;

exit();
?>
