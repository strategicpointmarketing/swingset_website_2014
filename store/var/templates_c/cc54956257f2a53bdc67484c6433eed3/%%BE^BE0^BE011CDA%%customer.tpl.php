<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:43
         compiled from modules/Products_Map/customer.tpl */ ?>
<?php func_load_lang($this, "modules/Products_Map/customer.tpl","pmap_location,lbl_no_items_available,pmap_location"); ?><h1><?php echo $this->_tpl_vars['lng']['pmap_location']; ?>
</h1>

<div class="pmap_letters">
<p align="center">
  <?php $_from = $this->_tpl_vars['pmap']['symbols']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['symb'] => $this->_tpl_vars['display']):
?>
    <?php if ($this->_tpl_vars['display'] == false): ?>
      <?php $this->assign('span_class', 'class="pmap_disabled"'); ?>
    <?php elseif ($this->_tpl_vars['symb'] == $this->_tpl_vars['pmap']['current'] && $this->_tpl_vars['pmap']['products']): ?>
      <?php $this->assign('span_class', 'class="pmap_current"'); ?>
    <?php else: ?>
      <?php $this->assign('span_class', ''); ?>
    <?php endif; ?>

    <?php echo ''; ?><?php if ($this->_tpl_vars['span_class'] != ""): ?><?php echo '<span '; ?><?php echo $this->_tpl_vars['span_class']; ?><?php echo '>'; ?><?php else: ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['pmap']['navigation']; ?><?php echo '='; ?><?php echo $this->_tpl_vars['symb']; ?><?php echo '" title="Products #'; ?><?php echo $this->_tpl_vars['symb']; ?><?php echo '">'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['symb'] == "0-9"): ?><?php echo '#'; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['symb']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['span_class'] != ""): ?><?php echo '</span>'; ?><?php else: ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?>


  <?php endforeach; endif; unset($_from); ?>
</p>
</div>

<br clear="left" />

<?php ob_start(); ?>

<?php if ($this->_tpl_vars['pmap']['products']): ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/products.tpl", 'smarty_include_vars' => array('products' => $this->_tpl_vars['pmap']['products'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php else: ?>

  <?php echo $this->_tpl_vars['lng']['lbl_no_items_available']; ?>


<?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['pmap_location'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>