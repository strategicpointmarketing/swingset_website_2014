<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/help/menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'customer/help/menu.tpl', 15, false),)), $this); ?>
<?php func_load_lang($this, "customer/help/menu.tpl","lbl_help_zone,lbl_contact_us,lbl_need_help,lbl_help_zone,lbl_contact_us"); ?>
<?php if ($this->_tpl_vars['static_pages_list_style'] == 'menu'): ?>

<?php ob_start(); ?>

  <ul>
    <li><a href="help.php"><?php echo $this->_tpl_vars['lng']['lbl_help_zone']; ?>
</a></li>
    <li><a href="help.php?section=contactus&amp;mode=update"><?php echo $this->_tpl_vars['lng']['lbl_contact_us']; ?>
</a></li>
    <?php $_from = $this->_tpl_vars['pages_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
      <?php if ($this->_tpl_vars['p']['show_in_menu'] == 'Y'): ?>
        <li><a href="pages.php?pageid=<?php echo $this->_tpl_vars['p']['pageid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['title'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a></li>
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  </ul>

<?php $this->_smarty_vars['capture']['menu'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu_dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_need_help'],'content' => $this->_smarty_vars['capture']['menu'],'additional_class' => "menu-help")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php else: ?>

<a href="help.php"><?php echo $this->_tpl_vars['lng']['lbl_help_zone']; ?>
</a>
<a href="help.php?section=contactus&amp;mode=update"><?php echo $this->_tpl_vars['lng']['lbl_contact_us']; ?>
</a>
<?php $_from = $this->_tpl_vars['pages_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['static_pages_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['static_pages_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['static_pages_list']['iteration']++;
?>
  <?php if ($this->_foreach['static_pages_list']['iteration'] <= 3): ?>
    <?php if ($this->_tpl_vars['p']['show_in_menu'] == 'Y'): ?>
    	<a href="pages.php?pageid=<?php echo $this->_tpl_vars['p']['pageid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['title'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>
    <?php endif; ?>
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php endif; ?>
