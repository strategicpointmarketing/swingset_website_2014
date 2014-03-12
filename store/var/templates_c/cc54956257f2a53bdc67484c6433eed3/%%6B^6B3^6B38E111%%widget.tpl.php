<?php /* Smarty version 2.6.28, created on 2014-03-01 09:29:46
         compiled from modules/Detailed_Product_Images/widget.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getvar', 'modules/Detailed_Product_Images/widget.tpl', 5, false),)), $this); ?>
<?php echo smarty_function_getvar(array('var' => 'det_images_widget','func' => 'func_tpl_get_det_images_widget'), $this);?>

<?php if ($this->_tpl_vars['det_images_widget'] == 'cloudzoom'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Detailed_Product_Images/cloudzoom_image.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['det_images_widget'] == 'colorbox'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Detailed_Product_Images/colorbox_image.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Detailed_Product_Images/popup_image.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>