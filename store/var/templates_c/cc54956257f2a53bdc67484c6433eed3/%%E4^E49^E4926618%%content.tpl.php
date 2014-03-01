<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from modules/Recently_Viewed/content.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getvar', 'modules/Recently_Viewed/content.tpl', 5, false),array('function', 'currency', 'modules/Recently_Viewed/content.tpl', 23, false),array('function', 'alter_currency', 'modules/Recently_Viewed/content.tpl', 24, false),array('modifier', 'amp', 'modules/Recently_Viewed/content.tpl', 18, false),)), $this); ?>
<?php func_load_lang($this, "modules/Recently_Viewed/content.tpl","rviewed_section"); ?><?php echo smarty_function_getvar(array('var' => 'recently_viewed_products','func' => 'func_tpl_get_recently_viewed_products'), $this);?>

<?php if ($this->_tpl_vars['recently_viewed_products']): ?>
  <?php ob_start(); ?>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['recently_viewed_products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
      <?php $this->assign('url', "product.php?productid=".($this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['productid'])); ?>
      <div class="item">
        <div class="image">
            <?php if ($this->_tpl_vars['active_modules']['On_Sale']): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/On_Sale/on_sale_icon.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']],'module' => 'recently_viewed','href' => $this->_tpl_vars['url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['url']; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['productid'],'image_x' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['image_x'],'product' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['product'],'tmbn_url' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['tmbn_url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></a>
            <?php endif; ?>
        </div>
        <a href="<?php echo $this->_tpl_vars['url']; ?>
" class="product-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['product'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>
        <?php if ($this->_tpl_vars['active_modules']['XPayments_Subscriptions'] && $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['subscription']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/XPayments_Subscriptions/customer/simple_products_list.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>
        <div class="price-row">
          <span class="price-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['taxed_price']), $this);?>
</span>
          <span class="market-price"><?php echo smarty_function_alter_currency(array('value' => $this->_tpl_vars['recently_viewed_products'][$this->_sections['i']['index']]['taxed_price']), $this);?>
</span>
        </div>
        <?php endif; ?>
        <?php if (! $this->_sections['i']['last']): ?>
          <img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" class="separator" alt="" />
        <?php endif; ?>
      </div>
    <?php endfor; endif; ?>
  <?php $this->_smarty_vars['capture']['menu'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu_dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['rviewed_section'],'content' => $this->_smarty_vars['capture']['menu'],'additional_class' => "menu-rviewed-section")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>