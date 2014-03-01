<?php /* Smarty version 2.6.28, created on 2014-03-01 09:21:06
         compiled from modules/Special_Offers/customer/category_offers_short_list.tpl */ ?>
<?php func_load_lang($this, "modules/Special_Offers/customer/category_offers_short_list.tpl","lbl_sp_category_generic"); ?><?php if ($this->_tpl_vars['category_offers']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/offers_short_list.tpl", 'smarty_include_vars' => array('offers_list' => $this->_tpl_vars['category_offers'],'generic_message' => $this->_tpl_vars['lng']['lbl_sp_category_generic'],'link_href' => "offers.php?mode=cat&amp;cat=".($this->_tpl_vars['cat']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>