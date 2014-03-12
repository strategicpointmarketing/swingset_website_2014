<?php /* Smarty version 2.6.28, created on 2014-03-01 09:19:57
         compiled from customer/buttons/submit.tpl */ ?>
<?php func_load_lang($this, "customer/buttons/submit.tpl","lbl_submit"); ?><?php if ($this->_tpl_vars['button_title'] == ''): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_submit'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['button_title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>