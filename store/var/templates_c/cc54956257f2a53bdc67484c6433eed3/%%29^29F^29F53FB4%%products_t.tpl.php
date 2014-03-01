<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/main/products_t.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'interline', 'customer/main/products_t.tpl', 6, false),array('function', 'currency', 'customer/main/products_t.tpl', 75, false),array('function', 'alter_currency', 'customer/main/products_t.tpl', 76, false),array('function', 'include_cache', 'customer/main/products_t.tpl', 130, false),array('modifier', 'cat', 'customer/main/products_t.tpl', 20, false),array('modifier', 'default', 'customer/main/products_t.tpl', 25, false),array('modifier', 'amp', 'customer/main/products_t.tpl', 44, false),array('modifier', 'escape', 'customer/main/products_t.tpl', 55, false),)), $this); ?>
<?php func_load_lang($this, "customer/main/products_t.tpl","lbl_sku,lbl_market_price,lbl_save_price,lbl_enter_your_price,lbl_enter_your_price_note"); ?><div class="products products-list products-div">
  <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?><div<?php echo smarty_function_interline(array('name' => 'products','additional_class' => 'item'), $this);?>
>
    <div class="item-box">

<script type="text/javascript">
//<![CDATA[
  products_data[<?php echo $this->_tpl_vars['product']['productid']; ?>
] = {};
//]]>
</script>

    <?php if ($this->_tpl_vars['active_modules']['Product_Configurator'] && $this->_tpl_vars['is_pconf'] && $this->_tpl_vars['current_product']): ?>
      <?php $this->assign('url', "product.php?productid=".($this->_tpl_vars['product']['productid'])."&amp;pconf=".($this->_tpl_vars['current_product']['productid'])."&amp;slot=".($this->_tpl_vars['slot'])); ?>
    <?php else: ?>
      <?php $this->assign('url', "product.php?productid=".($this->_tpl_vars['product']['productid'])."&amp;cat=".($this->_tpl_vars['cat'])."&amp;page=".($this->_tpl_vars['navigation_page'])); ?>
      <?php if ($this->_tpl_vars['featured'] == 'Y'): ?>
        <?php $this->assign('url', ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;featured=Y") : smarty_modifier_cat($_tmp, "&amp;featured=Y"))); ?>
      <?php endif; ?>
    <?php endif; ?>
    
      <div class="image">
        <div class="image-wrapper"<?php if ($this->_tpl_vars['config']['Appearance']['thumbnail_height'] > 0 || $this->_tpl_vars['product']['tmbn_y'] > 0 || $this->_tpl_vars['max_images_height'] > 0): ?> style="height: <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['max_images_height'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['Appearance']['thumbnail_height']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['Appearance']['thumbnail_height'])))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['tmbn_y']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['tmbn_y'])); ?>
px;line-height: <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['max_images_height'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['Appearance']['thumbnail_height']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['Appearance']['thumbnail_height'])))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['tmbn_y']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['tmbn_y'])); ?>
px;"<?php endif; ?>>
          <?php if ($this->_tpl_vars['active_modules']['On_Sale']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/On_Sale/on_sale_icon.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'],'module' => 'products_t','href' => $this->_tpl_vars['url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['url']; ?>
"<?php if ($this->_tpl_vars['config']['Appearance']['thumbnail_height'] > 0 || $this->_tpl_vars['product']['tmbn_y'] > 0 || $this->_tpl_vars['max_images_height'] > 0): ?> style="height: <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['max_images_height'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['Appearance']['thumbnail_height']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['Appearance']['thumbnail_height'])))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['tmbn_y']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['tmbn_y'])); ?>
px;"<?php endif; ?>><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['productid'],'image_x' => $this->_tpl_vars['product']['tmbn_x'],'image_y' => $this->_tpl_vars['product']['tmbn_y'],'product' => $this->_tpl_vars['product']['product'],'tmbn_url' => $this->_tpl_vars['product']['tmbn_url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></a>
          <?php endif; ?>

          <?php if ($this->_tpl_vars['active_modules']['Special_Offers'] && $this->_tpl_vars['product']['have_offers']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/product_offer_thumb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php endif; ?>
		    </div>

        <?php if ($this->_tpl_vars['product']['rating_data']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Customer_Reviews/vote_bar.tpl", 'smarty_include_vars' => array('rating' => $this->_tpl_vars['product']['rating_data'],'productid' => $this->_tpl_vars['product']['productid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
      </div>

      <div class="details">

        <a href="<?php echo $this->_tpl_vars['url']; ?>
" class="product-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>

        <?php if ($this->_tpl_vars['active_modules']['New_Arrivals']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/New_Arrivals/new_arrivals_show_date.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['active_modules']['Advanced_Customer_Reviews']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Advanced_Customer_Reviews/acr_products_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['config']['Appearance']['display_productcode_in_list'] == 'Y' && $this->_tpl_vars['product']['productcode'] != ""): ?>
          <div class="sku"><?php echo $this->_tpl_vars['lng']['lbl_sku']; ?>
: <span class="sku-value"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['productcode'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span></div>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['product']['product_type'] == 'C'): ?>

          <div class="separator">&nbsp;</div>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/details.tpl", 'smarty_include_vars' => array('href' => $this->_tpl_vars['url'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php else: ?>

          <div class="price-cell">

            <?php if (! $this->_tpl_vars['product']['appearance']['is_auction']): ?>

              <?php if ($this->_tpl_vars['product']['appearance']['has_price']): ?>

                <div class="price-row<?php if ($this->_tpl_vars['active_modules']['Special_Offers'] != "" && $this->_tpl_vars['product']['use_special_price'] != ""): ?> special-price-row<?php endif; ?>">
                  <?php if ($this->_tpl_vars['active_modules']['XPayments_Subscriptions'] && $this->_tpl_vars['product']['subscription']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/XPayments_Subscriptions/customer/setup_fee.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php else: ?>
                  <span class="price-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['product']['taxed_price']), $this);?>
</span>
                  <span class="market-price"><?php echo smarty_function_alter_currency(array('value' => $this->_tpl_vars['product']['taxed_price']), $this);?>
</span>
                  <?php endif; ?>
                  <?php if ($this->_tpl_vars['active_modules']['Klarna_Payments']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Klarna_Payments/monthly_cost.tpl", 'smarty_include_vars' => array('elementid' => "pp_conditions".($this->_tpl_vars['product']['productid']),'monthly_cost' => $this->_tpl_vars['product']['monthly_cost'],'products_list' => 'Y')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>

                  <?php if ($this->_tpl_vars['active_modules']['Product_Notifications'] != '' && $this->_tpl_vars['config']['Product_Notifications']['prod_notif_enabled_P'] == 'Y' && $this->_tpl_vars['config']['Product_Notifications']['prod_notif_show_in_list_P'] == 'Y'): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Notifications/product_notification_request_button.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['productid'],'type' => 'P')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>
                </div>
                <?php if ($this->_tpl_vars['active_modules']['XPayments_Subscriptions'] && $this->_tpl_vars['product']['subscription']): ?>
                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/XPayments_Subscriptions/customer/subscription_fee.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['active_modules']['Product_Notifications'] != '' && $this->_tpl_vars['config']['Product_Notifications']['prod_notif_enabled_P'] == 'Y' && $this->_tpl_vars['config']['Product_Notifications']['prod_notif_show_in_list_P'] == 'Y'): ?>
                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Notifications/product_notification_request_form.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['productid'],'variantid' => ((is_array($_tmp=@$this->_tpl_vars['product']['variantid'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'type' => 'P')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['product']['appearance']['has_market_price'] && $this->_tpl_vars['product']['appearance']['market_price_discount'] > 0): ?>
                  <div class="market-price">
                    <?php echo $this->_tpl_vars['lng']['lbl_market_price']; ?>
: <span class="market-price-value"><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['product']['list_price']), $this);?>
</span>

                    <?php if ($this->_tpl_vars['config']['General']['alter_currency_symbol'] != ""): ?>, <?php endif; ?>
                    <span class="price-save"><?php echo $this->_tpl_vars['lng']['lbl_save_price']; ?>
 <?php echo $this->_tpl_vars['product']['appearance']['market_price_discount']; ?>
%</span>

                  </div>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['product']['taxes']): ?>
                  <div class="taxes">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/taxed_price.tpl", 'smarty_include_vars' => array('taxes' => $this->_tpl_vars['product']['taxes'],'is_subtax' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  </div>
                <?php endif; ?>

              <?php endif; ?>

              <?php if ($this->_tpl_vars['active_modules']['Special_Offers'] != "" && $this->_tpl_vars['product']['use_special_price'] != ""): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/product_special_price.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
              <?php endif; ?>

            <?php else: ?>

              <span class="price"><?php echo $this->_tpl_vars['lng']['lbl_enter_your_price']; ?>
</span><br />
              <?php echo $this->_tpl_vars['lng']['lbl_enter_your_price_note']; ?>


            <?php endif; ?>

          </div>

          <div class="buttons-cell">
            <?php if ($this->_tpl_vars['active_modules']['Product_Configurator'] && $this->_tpl_vars['is_pconf'] && $this->_tpl_vars['current_product']): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Configurator/pconf_add_form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php elseif ($this->_tpl_vars['product']['appearance']['buy_now_enabled'] && $this->_tpl_vars['product']['product_type'] != 'C'): ?>
              <?php if ($this->_tpl_vars['login'] != ""): ?>
                <?php echo smarty_function_include_cache(array('file' => "customer/main/buy_now.tpl",'product' => $this->_tpl_vars['product'],'cat' => $this->_tpl_vars['cat'],'featured' => $this->_tpl_vars['featured'],'is_matrix_view' => $this->_tpl_vars['is_matrix_view'],'login' => '1','smarty_get_cat' => $_GET['cat'],'smarty_get_page' => $_GET['page'],'smarty_get_quantity' => $_GET['quantity']), $this);?>

              <?php else: ?>
                <?php echo smarty_function_include_cache(array('file' => "customer/main/buy_now.tpl",'product' => $this->_tpl_vars['product'],'cat' => $this->_tpl_vars['cat'],'featured' => $this->_tpl_vars['featured'],'is_matrix_view' => $this->_tpl_vars['is_matrix_view'],'login' => "",'smarty_get_cat' => $_GET['cat'],'smarty_get_page' => $_GET['page'],'smarty_get_quantity' => $_GET['quantity']), $this);?>

              <?php endif; ?>
            <?php endif; ?>
          </div>

          <div class="clearing"></div>
		 
        <?php endif; ?>

      </div>

      <?php if ($this->_tpl_vars['active_modules']['Feature_Comparison']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Feature_Comparison/compare_checkbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>

    </div>

    <div class="clearing"></div>

    <?php if (! ( $this->_tpl_vars['active_modules']['Product_Configurator'] && $this->_tpl_vars['is_pconf'] && $this->_tpl_vars['current_product'] ) && ( $this->_tpl_vars['product']['appearance']['buy_now_enabled'] && $this->_tpl_vars['product']['product_type'] != 'C' )): ?>
      <?php if ($this->_tpl_vars['active_modules']['Socialize']): ?>
        <div class="item-box list-soc-buttons">
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Socialize/buttons_row.tpl", 'smarty_include_vars' => array('matrix' => $this->_tpl_vars['is_matrix_view'],'href' => $this->_tpl_vars['product']['productid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div class="clearing"></div>
      <?php endif; ?>
    <?php endif; ?>
  </div><?php endforeach; endif; unset($_from); ?>
</div>
<div class="clearing"></div>