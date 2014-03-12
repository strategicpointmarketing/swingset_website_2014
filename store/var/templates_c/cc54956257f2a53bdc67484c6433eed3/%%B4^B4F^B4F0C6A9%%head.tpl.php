<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/head.tpl */ ?>
<div class="line1">
  <div class="logo">
    <a href="<?php echo $this->_tpl_vars['catalogs']['customer']; ?>
/home.php"><img src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/logo.png" alt="<?php echo $this->_tpl_vars['config']['Company']['company_name']; ?>
" /></a>
  </div>
  <div class="header-links">
		<div class="wrapper">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/header_links.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
  </div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/tabs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/phones.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>

<div class="line2">
  <?php if (( $this->_tpl_vars['main'] != 'cart' || $this->_tpl_vars['cart_empty'] ) && $this->_tpl_vars['main'] != 'checkout'): ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/language_selector.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/noscript.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>