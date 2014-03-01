<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/header_links.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'customer/header_links.tpl', 5, false),array('modifier', 'escape', 'customer/header_links.tpl', 5, false),)), $this); ?>
<?php func_load_lang($this, "customer/header_links.tpl","lbl_register,lbl_logoff,lbl_my_account,lbl_wish_list,lbl_orders_history"); ?><?php if ($this->_tpl_vars['login'] == ''): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/login_link.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <a href="register.php"><?php echo $this->_tpl_vars['lng']['lbl_register']; ?>
</a>
<?php else: ?>
  <span><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['fullname'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['login']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['login'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
  <a href="<?php echo $this->_tpl_vars['xcart_web_dir']; ?>
/login.php?mode=logout"><?php echo $this->_tpl_vars['lng']['lbl_logoff']; ?>
</a>
  <a href="register.php?mode=update"><?php echo $this->_tpl_vars['lng']['lbl_my_account']; ?>
</a>
<?php endif; ?>

<?php if ($this->_tpl_vars['active_modules']['Wishlist']): ?>
	<a href="cart.php?mode=wishlist"><?php echo $this->_tpl_vars['lng']['lbl_wish_list']; ?>
</a>
<?php endif; ?>

<?php if ($this->_tpl_vars['login']): ?>
<a href="orders.php"><?php echo $this->_tpl_vars['lng']['lbl_orders_history']; ?>
</a>

<?php if ($this->_tpl_vars['active_modules']['Quick_Reorder']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Quick_Reorder/quick_reorder_link.tpl", 'smarty_include_vars' => array('current_skin' => 'ideal_responsive')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php endif; ?>