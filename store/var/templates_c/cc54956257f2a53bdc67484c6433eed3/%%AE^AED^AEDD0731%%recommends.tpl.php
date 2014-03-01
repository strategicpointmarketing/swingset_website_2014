<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from modules/Recommended_Products/recommends.tpl */ ?>
<?php func_load_lang($this, "modules/Recommended_Products/recommends.tpl","txt_recommends_comment,txt_recommends_comment"); ?><?php if ($this->_tpl_vars['printable'] != 'Y' && $this->_tpl_vars['recommends']): ?>

  <?php ob_start(); ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/simple_products_list.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['txt_recommends_comment'],'products' => $this->_tpl_vars['recommends'],'class' => 'rproducts')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>

  <?php if ($this->_tpl_vars['nodialog']): ?>
    <?php echo $this->_smarty_vars['capture']['dialog']; ?>

  <?php else: ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['dialog'],'title' => $this->_tpl_vars['lng']['txt_recommends_comment'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>

<?php endif; ?>