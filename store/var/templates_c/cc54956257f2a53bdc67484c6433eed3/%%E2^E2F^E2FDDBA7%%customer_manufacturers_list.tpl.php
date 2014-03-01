<?php /* Smarty version 2.6.28, created on 2014-03-01 09:29:31
         compiled from modules/Manufacturers/customer_manufacturers_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'modules/Manufacturers/customer_manufacturers_list.tpl', 14, false),array('modifier', 'escape', 'modules/Manufacturers/customer_manufacturers_list.tpl', 14, false),)), $this); ?>
<?php func_load_lang($this, "modules/Manufacturers/customer_manufacturers_list.tpl","lbl_manufacturers,lbl_manufacturers"); ?>
<h1><?php echo $this->_tpl_vars['lng']['lbl_manufacturers']; ?>
</h1>

<?php ob_start(); ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <ul class="manufacturers-list list-item">
    <?php $_from = $this->_tpl_vars['manufacturers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
      <li><a href="manufacturers.php?manufacturerid=<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['manufacturerid'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['manufacturer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
    <?php endforeach; endif; unset($_from); ?>
  </ul>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_manufacturers'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>