<?php /* Smarty version 2.6.28, created on 2014-03-01 09:19:47
         compiled from customer/help/general.tpl */ ?>
<?php func_load_lang($this, "customer/help/general.tpl","lbl_help_zone,txt_help_zone_title,lbl_recover_password,lbl_contact_us,lbl_help_zone"); ?>
<h1><?php echo $this->_tpl_vars['lng']['lbl_help_zone']; ?>
</h1>

<p class="text-block"><?php echo $this->_tpl_vars['lng']['txt_help_zone_title']; ?>
</p>

<?php ob_start(); ?>

  <ul class="help-index">

    <?php if ($this->_tpl_vars['login'] == ''): ?>
      <li class="first-item"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_recover_password'],'href' => "help.php?section=Password_Recovery",'style' => 'link')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></li>
    <?php endif; ?>
    <li><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_contact_us'],'href' => "help.php?section=contactus&mode=update",'style' => 'link')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></li>

    <?php $_from = $this->_tpl_vars['pages_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['pages']['iteration']++;
?>
      <li><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['p']['title'],'href' => "pages.php?pageid=".($this->_tpl_vars['p']['pageid']),'style' => 'link')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></li>
    <?php endforeach; endif; unset($_from); ?>

  </ul>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_help_zone'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>