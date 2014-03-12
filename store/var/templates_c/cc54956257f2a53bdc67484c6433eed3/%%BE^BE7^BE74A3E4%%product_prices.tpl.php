<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from customer/main/product_prices.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'customer/main/product_prices.tpl', 13, false),array('modifier', 'trim', 'customer/main/product_prices.tpl', 17, false),array('function', 'currency', 'customer/main/product_prices.tpl', 33, false),)), $this); ?>
<?php func_load_lang($this, "customer/main/product_prices.tpl","lbl_wholesale_prices,lbl_quantity,lbl_price,lbl_item,lbl_items,txt_note"); ?><div id="wl-prices"<?php if (! $this->_tpl_vars['product_wholesale']): ?> style="display: none;"<?php endif; ?>>

  <?php if ($this->_tpl_vars['product']['taxes']): ?>
    <?php ob_start(); ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/taxed_price.tpl", 'smarty_include_vars' => array('taxes' => $this->_tpl_vars['product']['taxes'],'display_info' => 'N')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $this->_smarty_vars['capture']['taxdata'] = ob_get_contents(); ob_end_clean(); ?>
  <?php endif; ?>

  <table cellspacing="1" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_wholesale_prices'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

    <tr class="head-row">
      <th><?php echo $this->_tpl_vars['lng']['lbl_quantity']; ?>
</th>
      <th><?php echo $this->_tpl_vars['lng']['lbl_price']; ?>
<?php if (((is_array($_tmp=$this->_smarty_vars['capture']['taxdata'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp))): ?>*<?php endif; ?></th>
    </tr>

    <?php $_from = $this->_tpl_vars['product_wholesale']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['wi'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wi']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['w']):
        $this->_foreach['wi']['iteration']++;
?>
      <tr>
        <td>
          <?php echo ''; ?><?php echo $this->_tpl_vars['w']['quantity']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['w']['next_quantity'] == 0): ?><?php echo '+'; ?><?php elseif ($this->_tpl_vars['w']['next_quantity'] != $this->_tpl_vars['w']['quantity']): ?><?php echo '-'; ?><?php echo $this->_tpl_vars['w']['next_quantity']; ?><?php echo ''; ?><?php endif; ?><?php echo '&nbsp;'; ?><?php if ($this->_tpl_vars['w']['quantity'] == '1'): ?><?php echo ''; ?><?php echo $this->_tpl_vars['lng']['lbl_item']; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['lng']['lbl_items']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>

        </td>
        <td><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['w']['taxed_price'],'tag_id' => "wp".(($this->_foreach['wi']['iteration']-1))), $this);?>
</td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>

  </table>

  <div<?php if (! ((is_array($_tmp=$this->_smarty_vars['capture']['taxdata'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp))): ?> style="display: none;"<?php endif; ?>>
    <strong>*<?php echo $this->_tpl_vars['lng']['txt_note']; ?>
:</strong><?php echo $this->_smarty_vars['capture']['taxdata']; ?>

  </div>

</div>