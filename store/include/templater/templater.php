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
 * Templater extension
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Smarty class descendant
 * @author     Ruslan R. Fazlyev <rrf@x-cart.com>
 * @copyright  Copyright (c) 2001-2014 Qualiteam software Ltd <info@x-cart.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @version    58ab7bdc89b3d4cd894ef7d853bcc6f0c4dcca6b, v56 (xcart_4_6_2), 2014-02-03 17:25:33, templater.php, aim
 * @link       http://www.x-cart.com/
 * @see        ____file_see____
 */

if (!defined('XCART_START')) { header("Location: ../../"); die("Access denied"); }

require_once $xcart_dir . '/include/lib/smarty/Smarty.class.php';

class Templater extends Smarty {
    /**
     * The name of the directory where templates are located.
     *
     * @var string
     */
    var $template_dir = array();

    /**
     * The class used for compiling templates.
     *
     * @var string
     */
    var $compiler_class = 'Template_Compiler';

    /**
     * This is the path to the debug console template.
     *
     * @var string
     */
    var $debug_tpl = 'file:debug_templates.tpl';

    /**
     * Enable/disable the md5 checksum verification mechanism for compiled templates.
     * See description of COMPILED_TPL_CHECK_MD5 constant in config.php file
     *
     * @var boolean
     */
    var $compile_check_md5 = FALSE;

    var $strict_resources = array();

    var $_tpls_index = array();

    var $security = true;

    var $security_settings = array(
        'PHP_HANDLING'        => false,
        'IF_FUNCS'            => array(
                'array', 'list',
                'isset', 'empty',
                'count', 'sizeof',
                'in_array', 'is_array',
                'true', 'false', 'null'
            ),
        'INCLUDE_ANY'         => false,
        'PHP_TAGS'            => false,
        'MODIFIER_FUNCS'      => array(
                'count',
                'doubleval',
                'trim',
                'stripslashes',
                'mt_rand',
                'urlencode',
                'is_array',
            ),
        'ALLOW_CONSTANTS'     => true,
        'ALLOW_SUPER_GLOBALS' => true
       );

    function Templater() {

        if (defined('DEVELOPMENT_MODE')) {
            array_push($this->security_settings['MODIFIER_FUNCS'], 'print_r');
            array_push($this->security_settings['MODIFIER_FUNCS'], 'func_print_r');
        }

        array_unshift($this->plugins_dir, dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugins');
        $this->compiler_file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Templater_Compiler.class.php';

        $exec_mode = func_get_php_execution_mode();
        if ($exec_mode == 'privileged') {
            $this->_dir_perms  = 0711;
            $this->_file_perms = 0600;
        }

        return parent::Smarty();
    }

    function fetch($resource_name, $cache_id = null, $compile_id = null, $display = FALSE) {
        $this->current_resource_name = $resource_name;
        return parent::fetch($resource_name, $cache_id, $compile_id, $display);
    }

    function _is_compiled($resource_name, $compile_path) {
        if (!empty($this->strict_resources)) {
            foreach ($this->strict_resources as $rule) {
                if (preg_match($rule, $resource_name)) {
                    return FALSE;
                }
            }
        }

        $result = parent::_is_compiled($resource_name, $compile_path);
        if ($result && $this->compile_check_md5)
            return $this->_check_compiled_md5($compile_path);

        return $result;
    }

    // Test if compiled resource was changed by third party

    function _check_compiled_md5($compiled_file) {

        if (!mt_rand(0,30)) return TRUE;

        $control_file = $compiled_file.'.md5';

        $compiled_data = $this->_read_file($compiled_file);
        if ($compiled_data === FALSE)
            return FALSE;

        $control_data = $this->_read_file($control_file);
        if ($control_data === FALSE) {
            $res = FALSE;
        } else {
            $res = TRUE;
        }

        if ($res) {
            $md5 = md5($compiled_file.$compiled_data);
            $res = !strcmp($md5,$control_data);
        }

        if (!$res) {
            x_log_flag(
                'log_xss_attempts',
                'XSS_PHP',
                'Unauthorized modification of compiled templates in the var/templates_c directory has been detected. You can disable MD5 verification for compiled templates by adjusting the value of the constant COMPILED_TPL_CHECK_MD5 in config.php. The malicious code has been removed. The affected compiled template' . "\n" . print_r($compiled_file, true)
            );
        }

        return $res;
    }

    function _compile_resource($resource_name, $compile_path) {
        $result = parent::_compile_resource($resource_name, $compile_path);

        if ($result && $this->compile_check_md5) {
            $tpl_source = $this->_read_file($compile_path);
            if ($tpl_source !== FALSE) {
                $_params = array(
                    'filename' => $compile_path.'.md5',
                    'contents' => md5($compile_path.$tpl_source),
                    'create_dirs' => TRUE,
                );
                smarty_core_write_file($_params, $this);
            }
        }

        return $result;
    }

    function _smarty_include($params) {
        static $vars;

        $this->_tpls_index[$params['smarty_include_tpl_file']] = TRUE;

        if (empty($params['smarty_include_tpl_file']))
            return '';

        if (isset($params['smarty_include_vars']['_include_once']) && $params['smarty_include_vars']['_include_once'] == 1) {
            if (isset($vars[$params['smarty_include_tpl_file']]))
                return '';
            $vars[$params['smarty_include_tpl_file']] = TRUE;
        }
        parent::_smarty_include($params);
    }

    // use X-Cart internal function instead of the default one
    function clear_cache($tpl_file = null, $cache_id = null, $compile_id = null, $exp_time = null) {
        assert('func_has_caller_function("func_remove_xcart_caches") /* '.__METHOD__.' check if func_remove_xcart_caches function should be used*/');

        return func_rm_dir($this->cache_dir, TRUE);
    }

    // use X-Cart internal function instead of the default one
    function clear_compiled_tpl($tpl_file = null, $compile_id = null, $exp_time = null) {
        if (empty($tpl_file)) {
            assert('func_has_caller_function("func_remove_xcart_caches") /* '.__METHOD__.' check if func_remove_xcart_caches function should be used*/');
            return func_rm_dir($this->compile_dir, TRUE);
        } else {
            return parent::clear_compiled_tpl($tpl_file, $compile_id, $exp_time);
        }
    }

    function apply_configuration_settings($config) { // {{{
        $this->compile_check = empty($config['General']['skip_check_compile']) || $config['General']['skip_check_compile'] != 'Y'; 
        $this->compile_check_md5 = XCSecurity::COMPILED_TPL_CHECK_MD5; 
    } // }}}

    // Wrapper for smarty {alter_currency } plugin to call from PHP
    function formatAlterCurrency($params) { // {{{
        global $xcart_dir;

        require_once $xcart_dir . '/include/templater/plugins/function.alter_currency.php';
        return smarty_function_alter_currency($params, $this);
    } // }}}

    // Wrapper for smarty {currency } plugin to call from PHP
    function formatCurrency($params) { // {{{
        global $xcart_dir;

        require_once $xcart_dir . '/include/templater/plugins/function.currency.php';
        return smarty_function_currency($params, $this);
    } // }}}
}

?>
