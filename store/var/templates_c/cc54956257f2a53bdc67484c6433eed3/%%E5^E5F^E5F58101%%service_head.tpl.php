<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/service_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_title', 'customer/service_head.tpl', 5, false),array('function', 'load_defer_code', 'customer/service_head.tpl', 32, false),)), $this); ?>
<?php echo smarty_function_get_title(array('page_type' => $this->_tpl_vars['meta_page_type'],'page_id' => $this->_tpl_vars['meta_page_id']), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/meta.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="shortcut icon" type="image/png" href="<?php echo $this->_tpl_vars['current_location']; ?>
/favicon.ico" />

<?php if ($this->_tpl_vars['config']['SEO']['canonical'] == 'Y'): ?>
  <link rel="canonical" href="<?php echo $this->_tpl_vars['current_location']; ?>
/<?php echo $this->_tpl_vars['canonical_url']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['config']['SEO']['clean_urls_enabled'] == 'Y'): ?>
  <base href="<?php echo $this->_tpl_vars['catalogs']['customer']; ?>
/" />
<?php endif; ?>

<?php if ($this->_tpl_vars['active_modules']['Refine_Filters']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Refine_Filters/service_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['active_modules']['Socialize'] != ""): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Socialize/service_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['active_modules']['Lexity'] != ""): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Lexity/service_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php echo smarty_function_load_defer_code(array('type' => 'css'), $this);?>

<?php echo smarty_function_load_defer_code(array('type' => 'js'), $this);?>
