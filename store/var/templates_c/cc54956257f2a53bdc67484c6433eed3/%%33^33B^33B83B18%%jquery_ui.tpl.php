<?php /* Smarty version 2.6.28, created on 2014-02-28 16:12:57
         compiled from jquery_ui.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'load_defer', 'jquery_ui.tpl', 1, false),)), $this); ?>
 <?php if ($this->_tpl_vars['development_mode_enabled']): ?>   <?php echo smarty_function_load_defer(array('file' => "js/jquery_ui_disable_compat.js",'type' => 'js'), $this);?>
 <?php endif; ?> <?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/jquery-ui.custom.min.js",'type' => 'js'), $this);?>
 <?php if ($this->_tpl_vars['usertype'] == 'C'): ?>   <?php echo smarty_function_load_defer(array('file' => "js/jquery_ui_fix.js",'type' => 'js'), $this);?>
   <?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/jquery.ui.theme.css",'type' => 'css'), $this);?>
 <?php else: ?>   <?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/datepicker_i18n/jquery-ui-i18n.js",'type' => 'js'), $this);?>
      <?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/datepicker_i18n/jquery.ui.datepicker-en-GB.js",'type' => 'js'), $this);?>
   <?php echo smarty_function_load_defer(array('file' => "lib/jqueryui/jquery.ui.admin.css",'type' => 'css'), $this);?>
 <?php endif; ?> <?php echo smarty_function_load_defer(array('file' => "css/jquery_ui.css",'type' => 'css'), $this);?>
 <?php if ($this->_tpl_vars['config']['UA']['browser'] == 'MSIE' && $this->_tpl_vars['config']['UA']['version'] < 9): ?> <?php echo smarty_function_load_defer(array('file' => "css/jquery_ui.IE8.css",'type' => 'css'), $this);?>
 <?php endif; ?> 