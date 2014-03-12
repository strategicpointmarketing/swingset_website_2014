<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from customer/simple_products_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'customer/simple_products_list.tpl', 20, false),array('modifier', 'amp', 'customer/simple_products_list.tpl', 42, false),array('function', 'interline', 'customer/simple_products_list.tpl', 24, false),array('function', 'currency', 'customer/simple_products_list.tpl', 55, false),)), $this); ?>
<?php func_load_lang($this, "customer/simple_products_list.tpl","lbl_enter_your_price,lbl_enter_your_price_note"); ?><?php $this->assign('simple_length', $this->_tpl_vars['config']['Appearance']['simple_length']); ?>
<?php if ($this->_tpl_vars['simple_length'] > 6): ?>
  <?php $this->assign('simple_length', 6); ?>
<?php endif; ?>

<?php $this->assign('is_matrix_view', true); ?>

<div class="products-div simple-products-div l<?php echo $this->_tpl_vars['simple_length']; ?>
" id="responsive-products-list">

<?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?>

  <?php $this->assign('item_class', "item simple-product"); ?>

  <?php unset($this->_sections['cell_count']);
$this->_sections['cell_count']['name'] = 'cell_count';
$this->_sections['cell_count']['loop'] = is_array($_loop=$this->_tpl_vars['simple_length']+2) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cell_count']['start'] = (int)1;
$this->_sections['cell_count']['show'] = true;
$this->_sections['cell_count']['max'] = $this->_sections['cell_count']['loop'];
$this->_sections['cell_count']['step'] = 1;
if ($this->_sections['cell_count']['start'] < 0)
    $this->_sections['cell_count']['start'] = max($this->_sections['cell_count']['step'] > 0 ? 0 : -1, $this->_sections['cell_count']['loop'] + $this->_sections['cell_count']['start']);
else
    $this->_sections['cell_count']['start'] = min($this->_sections['cell_count']['start'], $this->_sections['cell_count']['step'] > 0 ? $this->_sections['cell_count']['loop'] : $this->_sections['cell_count']['loop']-1);
if ($this->_sections['cell_count']['show']) {
    $this->_sections['cell_count']['total'] = min(ceil(($this->_sections['cell_count']['step'] > 0 ? $this->_sections['cell_count']['loop'] - $this->_sections['cell_count']['start'] : $this->_sections['cell_count']['start']+1)/abs($this->_sections['cell_count']['step'])), $this->_sections['cell_count']['max']);
    if ($this->_sections['cell_count']['total'] == 0)
        $this->_sections['cell_count']['show'] = false;
} else
    $this->_sections['cell_count']['total'] = 0;
if ($this->_sections['cell_count']['show']):

            for ($this->_sections['cell_count']['index'] = $this->_sections['cell_count']['start'], $this->_sections['cell_count']['iteration'] = 1;
                 $this->_sections['cell_count']['iteration'] <= $this->_sections['cell_count']['total'];
                 $this->_sections['cell_count']['index'] += $this->_sections['cell_count']['step'], $this->_sections['cell_count']['iteration']++):
$this->_sections['cell_count']['rownum'] = $this->_sections['cell_count']['iteration'];
$this->_sections['cell_count']['index_prev'] = $this->_sections['cell_count']['index'] - $this->_sections['cell_count']['step'];
$this->_sections['cell_count']['index_next'] = $this->_sections['cell_count']['index'] + $this->_sections['cell_count']['step'];
$this->_sections['cell_count']['first']      = ($this->_sections['cell_count']['iteration'] == 1);
$this->_sections['cell_count']['last']       = ($this->_sections['cell_count']['iteration'] == $this->_sections['cell_count']['total']);
?>
    <?php if (!(( $this->_foreach['products']['iteration'] - 1 ) % $this->_sections['cell_count']['index'])): ?>
      <?php $this->assign('item_class', ((is_array($_tmp=$this->_tpl_vars['item_class'])) ? $this->_run_mod_handler('cat', true, $_tmp, " l".($this->_sections['cell_count']['index'])."-first") : smarty_modifier_cat($_tmp, " l".($this->_sections['cell_count']['index'])."-first"))); ?>
    <?php endif; ?>
  <?php endfor; endif; ?>

  <div<?php echo smarty_function_interline(array('name' => 'products','additional_class' => $this->_tpl_vars['item_class']), $this);?>
>
    <div class="item-box">
  
      <div class="image">
        <div class="image-wrapper"<?php if ($this->_tpl_vars['config']['Appearance']['simple_thumbnail_height'] != ''): ?> style="height:<?php echo $this->_tpl_vars['config']['Appearance']['simple_thumbnail_height']; ?>
px;"<?php endif; ?>>
            <?php if ($this->_tpl_vars['active_modules']['On_Sale']): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/On_Sale/on_sale_icon.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'],'current_skin' => 'ideal_responsive','module' => 'simple_products_list')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
              <a href="product.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
"<?php if ($this->_tpl_vars['open_new_window'] == 'Y'): ?> target="_blank"<?php endif; ?><?php if ($this->_tpl_vars['config']['Appearance']['simple_thumbnail_height'] != ''): ?> style="height:<?php echo $this->_tpl_vars['config']['Appearance']['simple_thumbnail_height']; ?>
px;<?php if ($this->_tpl_vars['config']['Appearance']['simple_thumbnail_width'] != ''): ?> max-width:<?php echo $this->_tpl_vars['config']['Appearance']['simple_thumbnail_width']*1.5; ?>
px;<?php endif; ?>"<?php endif; ?>><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['productid'],'image_x' => $this->_tpl_vars['product']['tmbn_x'],'image_y' => $this->_tpl_vars['product']['tmbn_y'],'product' => $this->_tpl_vars['product']['product'],'tmbn_url' => $this->_tpl_vars['product']['tmbn_url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></a>
            <?php endif; ?>
        </div>
      </div>
      <div class="product-title">
        <script type="text/javascript">
          //<![CDATA[
          products_data[<?php echo $this->_tpl_vars['product']['productid']; ?>
] = {};
          //]]>
        </script>
        <a href="product.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
" class="product-title"<?php if ($this->_tpl_vars['open_new_window'] == 'Y'): ?> target="_blank"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>
      </div>
      <div class="product-cell-price">
        <?php if ($this->_tpl_vars['product']['product_type'] != 'C'): ?>
          <?php if ($this->_tpl_vars['product']['appearance']['is_auction']): ?>
            <span class="price"><?php echo $this->_tpl_vars['lng']['lbl_enter_your_price']; ?>
</span><br />
            <?php echo $this->_tpl_vars['lng']['lbl_enter_your_price_note']; ?>

          <?php else: ?>
            <?php if ($this->_tpl_vars['product']['taxed_price'] > 0): ?>
              <?php if ($this->_tpl_vars['active_modules']['XPayments_Subscriptions'] && $this->_tpl_vars['product']['subscription']): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/XPayments_Subscriptions/customer/simple_products_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
              <?php else: ?>
              <div class="price-row">
                <span class="price-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['product']['taxed_price']), $this);?>
</span>
              </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
        <?php else: ?>
          &nbsp;
        <?php endif; ?>
      </div>

    </div>
  </div>
  
<?php endforeach; endif; unset($_from); ?>

</div>
<div class="clearing"></div>