<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/buttons/add_to_wishlist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'customer/buttons/add_to_wishlist.tpl', 5, false),)), $this); ?>
<?php func_load_lang($this, "customer/buttons/add_to_wishlist.tpl","lbl_add_to_wl"); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => ($this->_tpl_vars['lng']['lbl_add_to_wl'])."<span class='icon'></span>",'additional_button_class' => ((is_array($_tmp=$this->_tpl_vars['additional_button_class'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' button-type2 button-wl') : smarty_modifier_cat($_tmp, ' button-type2 button-wl')))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>