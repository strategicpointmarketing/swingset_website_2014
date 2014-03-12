<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from partner/menu_affiliate.tpl */ ?>
<?php func_load_lang($this, "partner/menu_affiliate.tpl","lbl_partner_click_to_register,lbl_partner_affiliates"); ?><?php ob_start(); ?>
  <ul>
    <!-- begin cut here -->
    <li><a href="<?php if ($this->_tpl_vars['config']['Security']['use_https_login'] == 'Y'): ?><?php echo $this->_tpl_vars['catalogs_secure']['partner']; ?>
<?php else: ?><?php echo $this->_tpl_vars['catalogs']['partner']; ?>
<?php endif; ?>/register.php"><?php echo $this->_tpl_vars['lng']['lbl_partner_click_to_register']; ?>
</a></li>
    <!-- end cut here -->
  </ul>
<?php $this->_smarty_vars['capture']['menu'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu_dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_partner_affiliates'],'content' => $this->_smarty_vars['capture']['menu'],'additional_class' => "menu-affiliate")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>