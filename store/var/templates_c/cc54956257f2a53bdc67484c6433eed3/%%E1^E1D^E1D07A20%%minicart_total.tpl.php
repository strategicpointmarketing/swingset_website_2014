<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/minicart_total.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'customer/minicart_total.tpl', 10, false),array('function', 'currency', 'customer/minicart_total.tpl', 14, false),array('function', 'getvar', 'customer/minicart_total.tpl', 19, false),array('function', 'load_defer_code', 'customer/minicart_total.tpl', 40, false),)), $this); ?>
<?php func_load_lang($this, "customer/minicart_total.tpl","lbl_your_cart,lbl_cart_items,txt_minicart_total_note,lbl_checkout,lbl_cart_is_empty"); ?><div class="minicart">
  <?php if ($this->_tpl_vars['minicart_total_items'] > 0): ?>

    <div class="valign-middle full">

      <table cellspacing="0" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_your_cart'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
        <tr>
          <td class="your-cart"><?php echo $this->_tpl_vars['minicart_total_items']; ?>
 <?php echo $this->_tpl_vars['lng']['lbl_cart_items']; ?>
 <span>/&nbsp;</span>
            <?php ob_start(); ?>
              <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['minicart_total_cost']), $this);?>

            <?php $this->_smarty_vars['capture']['tt'] = ob_get_contents();  $this->assign('val', ob_get_contents());ob_end_clean(); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/tooltip_js.tpl", 'smarty_include_vars' => array('class' => "help-link",'title' => $this->_tpl_vars['val'],'text' => $this->_tpl_vars['lng']['txt_minicart_total_note'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </td>
        </tr>
        <?php echo smarty_function_getvar(array('var' => 'paypal_express_active','func' => 'func_get_paypal_express_active'), $this);?>

        <?php if (! $this->_tpl_vars['paypal_express_active']): ?>
        <tr>
          <td class="state"><a href="cart.php?mode=checkout" class="minicart-checkout-link"><span><?php echo $this->_tpl_vars['lng']['lbl_checkout']; ?>
</span></a></td>
        </tr>
        <?php endif; ?>
      </table>

    </div>

  <?php else: ?>

    <div class="valign-middle empty">

      <strong><?php echo $this->_tpl_vars['lng']['lbl_cart_is_empty']; ?>
</strong>

    </div>

  <?php endif; ?>

<?php if ($this->_tpl_vars['minicart_total_standalone']): ?>
<?php echo smarty_function_load_defer_code(array('type' => 'css'), $this);?>

<?php echo smarty_function_load_defer_code(array('type' => 'js'), $this);?>

<?php endif; ?>
</div>