<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/meta.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'customer/meta.tpl', 5, false),array('function', 'meta', 'customer/meta.tpl', 13, false),)), $this); ?>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo ((is_array($_tmp=@$this->_tpl_vars['default_charset'])) ? $this->_run_mod_handler('default', true, $_tmp, "utf-8") : smarty_modifier_default($_tmp, "utf-8")); ?>
" />
  <meta http-equiv="X-UA-Compatible" content="<?php echo $this->_config[0]['vars']['XUACompatible']; ?>
" />
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta http-equiv="Content-Language" content="<?php echo $this->_tpl_vars['shop_language']; ?>
" />
<?php if ($this->_tpl_vars['printable']): ?>
  <meta name="ROBOTS" content="NOINDEX,NOFOLLOW" />
<?php else: ?>
  <?php echo smarty_function_meta(array('type' => 'description','page_type' => $this->_tpl_vars['meta_page_type'],'page_id' => $this->_tpl_vars['meta_page_id']), $this);?>

  <?php echo smarty_function_meta(array('type' => 'keywords','page_type' => $this->_tpl_vars['meta_page_type'],'page_id' => $this->_tpl_vars['meta_page_id']), $this);?>

<?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />