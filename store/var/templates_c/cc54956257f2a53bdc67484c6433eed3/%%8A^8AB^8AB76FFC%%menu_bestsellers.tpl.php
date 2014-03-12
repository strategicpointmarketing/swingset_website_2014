<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from modules/Bestsellers/menu_bestsellers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getvar', 'modules/Bestsellers/menu_bestsellers.tpl', 6, false),array('function', 'interline', 'modules/Bestsellers/menu_bestsellers.tpl', 14, false),array('function', 'currency', 'modules/Bestsellers/menu_bestsellers.tpl', 24, false),array('function', 'alter_currency', 'modules/Bestsellers/menu_bestsellers.tpl', 25, false),array('modifier', 'amp', 'modules/Bestsellers/menu_bestsellers.tpl', 22, false),)), $this); ?>
<?php func_load_lang($this, "modules/Bestsellers/menu_bestsellers.tpl","lbl_bestsellers"); ?><?php if ($this->_tpl_vars['config']['Bestsellers']['bestsellers_menu'] == 'Y'): ?>
<?php echo smarty_function_getvar(array('var' => 'bestsellers','func' => 'func_tpl_get_bestsellers'), $this);?>

<?php if ($this->_tpl_vars['bestsellers']): ?>


  <?php ob_start(); ?>
    <ul>

      <?php $_from = $this->_tpl_vars['bestsellers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bestsellers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bestsellers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['b']):
        $this->_foreach['bestsellers']['iteration']++;
?>
        <li<?php echo smarty_function_interline(array('name' => 'bestsellers'), $this);?>
>
			<div class="image">
          <?php if ($this->_tpl_vars['active_modules']['On_Sale']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/On_Sale/on_sale_icon.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['b'],'current_skin' => 'ideal_responsive','module' => 'bestsellers','href' => "product.php?productid=".($this->_tpl_vars['b']['productid'])."&amp;cat=".($this->_tpl_vars['cat'])."&amp;bestseller=Y")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php else: ?>
          <a href="product.php?productid=<?php echo $this->_tpl_vars['b']['productid']; ?>
&amp;cat=<?php echo $this->_tpl_vars['cat']; ?>
&amp;bestseller=Y"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('tmbn_url' => $this->_tpl_vars['b']['tmbn_url'],'productid' => $this->_tpl_vars['b']['productid'],'image_x' => $this->_tpl_vars['b']['tmbn_x'],'class' => 'image','product' => $this->_tpl_vars['b']['product'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></a>
          <?php endif; ?>
			</div>
			<a href="product.php?productid=<?php echo $this->_tpl_vars['b']['productid']; ?>
&amp;cat=<?php echo $this->_tpl_vars['cat']; ?>
&amp;bestseller=Y"><?php echo ((is_array($_tmp=$this->_tpl_vars['b']['product'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>
			<div class="price-row">
				<span class="price-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['b']['taxed_price']), $this);?>
</span>
				<span class="market-price"><?php echo smarty_function_alter_currency(array('value' => $this->_tpl_vars['b']['taxed_price']), $this);?>
</span>
			</div>
        </li>
      <?php endforeach; endif; unset($_from); ?>

    </ul>
  <?php $this->_smarty_vars['capture']['menu'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu_dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_bestsellers'],'content' => $this->_smarty_vars['capture']['menu'],'additional_class' => "menu-bestsellers")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>
<?php endif; ?>