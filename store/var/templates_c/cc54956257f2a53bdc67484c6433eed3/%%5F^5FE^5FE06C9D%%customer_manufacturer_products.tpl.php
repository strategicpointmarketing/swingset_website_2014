<?php /* Smarty version 2.6.28, created on 2014-03-01 09:25:01
         compiled from modules/Manufacturers/customer_manufacturer_products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/Manufacturers/customer_manufacturer_products.tpl', 6, false),array('modifier', 'amp', 'modules/Manufacturers/customer_manufacturer_products.tpl', 14, false),)), $this); ?>
<?php func_load_lang($this, "modules/Manufacturers/customer_manufacturer_products.tpl","lbl_url,txt_no_products_in_man,lbl_products"); ?>
<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['manufacturer']['manufacturer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php if ($this->_tpl_vars['manufacturer']['is_image'] == 'Y' || $this->_tpl_vars['manufacturer']['descr'] != '' || $this->_tpl_vars['manufacturer']['url'] != ''): ?>

  <?php if ($this->_tpl_vars['manufacturer']['is_image'] == 'Y'): ?>
    <?php if ($this->_tpl_vars['manufacturer']['url'] != ''): ?>
      <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['manufacturer']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
">
    <?php endif; ?>
    <img src="<?php if ($this->_tpl_vars['manufacturer']['image_url'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['manufacturer']['image_url'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['xcart_web_dir']; ?>
/image.php?id=<?php echo $this->_tpl_vars['manufacturer']['manufacturerid']; ?>
&amp;type=M<?php endif; ?>" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['manufacturer']['manufacturer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['manufacturer']['image_x']): ?> width="<?php echo $this->_tpl_vars['manufacturer']['image_x']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['manufacturer']['image_y']): ?> height="<?php echo $this->_tpl_vars['manufacturer']['image_y']; ?>
"<?php endif; ?> />
    <?php if ($this->_tpl_vars['manufacturer']['url'] != ''): ?>
      </a>
    <?php endif; ?>

  <?php elseif ($this->_tpl_vars['manufacturer']['url'] != ''): ?>
    <div class="man-url">
    <?php echo $this->_tpl_vars['lng']['lbl_url']; ?>
:
    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['manufacturer']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['manufacturer']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
    </div>
  <?php endif; ?>

  <div class="text-block"><?php echo ((is_array($_tmp=$this->_tpl_vars['manufacturer']['descr'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</div>

<?php endif; ?>

<?php ob_start(); ?>

  <?php if ($this->_tpl_vars['products'] != ''): ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/products.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php else: ?>

    <?php echo $this->_tpl_vars['lng']['txt_no_products_in_man']; ?>


  <?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_products'],'content' => $this->_smarty_vars['capture']['dialog'],'selected' => $this->_tpl_vars['sort'],'direction' => $this->_tpl_vars['sort_direction'],'products_sort_url' => "manufacturers.php?manufacturerid=".($this->_tpl_vars['manufacturer']['manufacturerid']),'sort' => true,'additional_class' => "products-dialog")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>