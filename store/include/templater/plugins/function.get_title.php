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
 * Templater plugin
 * -------------------------------------------------------------
 * Type:     function
 * Name:     get_title
 * Input:
 *           page_type
 *           page_id
 * -------------------------------------------------------------
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Lib
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v48 (xcart_4_6_2), 2014-02-03 17:25:33, function.get_title.php, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!defined('XCART_START')) { header("Location: ../../../"); die("Access denied"); }

function smarty_function_get_title($params, &$smarty)
{
    global $active_modules, $sql_tbl, $config, $current_area;

    settype($params['page_type'], 'string');
    settype($params['page_id'], 'int');


    // Get by page type & page id
    $title = false;
    $default_title_entity = trim($config['SEO']['site_title']);
    switch ($params['page_type']) {
        case 'P':
            // Product page
            x_load('product');
            $title = func_get_product_title($params['page_id']);
            break;

        case 'C':
            // Category page
            x_load('category');
            $title = func_get_category_title($params['page_id']);

            if ($params['page_id'] == 0) {
                $title = trim($config['SEO']['home_page_title']);
            }

            if (empty($title))
                $title = $default_title_entity;

            break;

        case 'M':
            // Manufacturer page
            if (empty($active_modules['Manufacturers']))
                break;

            $title = func_query_first_cell("SELECT title_tag FROM $sql_tbl[manufacturers] WHERE manufacturerid = '$params[page_id]'");

            if (empty($title))
                $title = $default_title_entity;
            break;

        case 'E':
            // Static page (embedded)
            $title = func_query_first_cell("SELECT title_tag FROM $sql_tbl[pages] WHERE pageid = '$params[page_id]'");

            if (empty($title))
                $title = $default_title_entity;

            break;

        case 'R':
            // Reviews page
            if ($params['page_id'] == 0) {
                $title = func_get_langvar_by_name('lbl_acr_products_reviews_meta_title');
            } else {
                $title = func_get_langvar_by_name('lbl_acr_product_reviews_meta_title') . ': ' 
                . func_query_first_cell("SELECT product FROM $sql_tbl[products_lng_current] WHERE $sql_tbl[products_lng_current].productid='" . intval($params['page_id']) . "'");
            }
            break;


        default:
            // Do not use "Default site 'Title' tag" for modal windows
            if (
                !empty($default_title_entity) 
                && !$smarty->get_template_vars('is_modal_popup')
            ) {
                $title = $default_title_entity;
            }
    }

    if (is_string($title)) {
        $title = str_replace(array("\n", "\r"), array('', ''), trim($title));
    } else {
        $title = '';
    }

    if (empty($title)) {
        $location = $smarty->get_template_vars('location');
        if (!empty($location) && is_array($location)) {

            // Title based on bread crumbs

            $lbl_site_title = strip_tags(func_get_langvar_by_name('lbl_site_title', NULL, FALSE, TRUE, TRUE));
            if (empty($lbl_site_title)) {
                $lbl_site_title = $config['Company']['company_name'];
            }

            if (strpos($config['SEO']['page_title_format'], 'long') !== FALSE) {
                if ($location[0][1] == 'home.php') {
                    $location[0] = array($lbl_site_title);
                } elseif (!$smarty->get_template_vars('is_modal_popup')) {
                    array_unshift($location, array($lbl_site_title));
                }
            } elseif ($location[0][1] == 'home.php') {
                // Unset Shop name for short title
                unset($location[0]);
            }

            if (strpos($config['SEO']['page_title_format'], 'reverse') !== FALSE) {
                $location = array_reverse($location);
            }

            $title_items = array();
            foreach ($location as $v) {
                $title_items[] = strip_tags($v[0]);
            }

            if (empty($title_items))
                $title_items = array($lbl_site_title);

            $title = str_replace(array("\n", "\r"), array('', ''), trim(implode(' :: ', $title_items)));

        } else {

            // Default title
            $title = strip_tags(func_get_langvar_by_name('txt_site_title', NULL, FALSE, TRUE, TRUE));

        }
    }

    // truncate
    $title = str_replace('&nbsp;', ' ', $title);
    if (
        strlen($title) > $config['SEO']['page_title_limit'] 
        && $config['SEO']['page_title_limit'] > 0
    ) {
        $title = func_truncate($title, $config['SEO']['page_title_limit']);
    }

    // escape
    $charset = $smarty->get_template_vars('default_charset') ? $smarty->get_template_vars('default_charset') : 'UTF-8';
    $title = @htmlspecialchars($title, ENT_QUOTES, $charset);


    // correct the page title with enabled webmaster mode
    if ($smarty->webmaster_mode && !empty($title)) {
        $title = strip_tags(str_replace( array('&lt;', '&gt;'), array('<', '>'), $title ));
    }

    return '<title>' . $title . '</title>';
}
?>
