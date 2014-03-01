<?php /* Smarty version 2.6.28, created on 2014-03-01 09:19:42
         compiled from customer/main/cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'interline', 'customer/main/cart.tpl', 33, false),array('function', 'currency', 'customer/main/cart.tpl', 94, false),array('function', 'multi', 'customer/main/cart.tpl', 125, false),array('function', 'alter_currency', 'customer/main/cart.tpl', 128, false),array('function', 'getvar', 'customer/main/cart.tpl', 228, false),array('modifier', 'amp', 'customer/main/cart.tpl', 47, false),)), $this); ?>
<?php func_load_lang($this, "customer/main/cart.tpl","lbl_your_shopping_cart,txt_cart_note,lbl_item,lbl_price,lbl_subtotal,lbl_selected_options,lbl_move_to_wl,lbl_increase,lbl_decrease,lbl_apply,lbl_update_cart,lbl_clear_cart,lbl_checkout,txt_your_shopping_cart_is_empty,lbl_items_in_cart,lbl_wl_products"); ?><h1><?php echo $this->_tpl_vars['lng']['lbl_your_shopping_cart']; ?>
</h1>

<?php if ($this->_tpl_vars['cart'] != "" && $this->_tpl_vars['active_modules']['Gift_Certificates']): ?>
  <p class="text-block cart-note"><?php echo $this->_tpl_vars['lng']['txt_cart_note']; ?>
</p>
<?php endif; ?>

<?php ob_start(); ?>

  <?php if ($this->_tpl_vars['products'] != ""): ?>

    <script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/js/cart.js"></script>

    <div class="products cart">

      <form action="cart.php" method="post" name="cartform">

        <input type="hidden" name="action" id="action" value="update" />
        <input type="hidden" name="mode" value="" />
        <input type="hidden" name="productid" id="productid" value="" />
        <input type="hidden" name="pindex" id="pindex" value="" />
        <div class="width-100 item">
          <div class="responsive-cart-header">
            <div class="responsive-first"><?php echo $this->_tpl_vars['lng']['lbl_item']; ?>
</div>
            <div class="responsive-price"><?php echo $this->_tpl_vars['lng']['lbl_price']; ?>
</div>
            <div class="responsive-subtotal"><?php echo $this->_tpl_vars['lng']['lbl_subtotal']; ?>
</div>
          </div>
          <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?>
            <?php if ($this->_tpl_vars['product']['hidden'] == ""): ?>
            <div <?php echo smarty_function_interline(array('name' => 'products','additional_class' => "responsive-row"), $this);?>
>
              <div class="responsive-item">
                <div class="details">
                  <div class="image">
                      <?php if ($this->_tpl_vars['active_modules']['On_Sale']): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/On_Sale/on_sale_icon.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'],'current_skin' => 'ideal_responsive','module' => 'cart')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                      <?php else: ?>
                      <a href="product.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['display_imageid'],'product' => $this->_tpl_vars['product']['product'],'tmbn_url' => $this->_tpl_vars['product']['pimage_url'],'type' => $this->_tpl_vars['product']['is_pimage'],'image_x' => $this->_tpl_vars['product']['tmbn_x'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></a>
                      <?php endif; ?>
                    <?php if ($this->_tpl_vars['active_modules']['Special_Offers'] != "" && $this->_tpl_vars['product']['have_offers']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/product_offer_thumb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endif; ?>
                  </div>
                 <div class="product-info">
                  <a href="product.php?productid=<?php echo $this->_tpl_vars['product']['productid']; ?>
" class="product-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['product'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a>
                  <div class="descr"><?php echo $this->_tpl_vars['product']['descr']; ?>
</div>

                  <?php if ($this->_tpl_vars['product']['product_options'] != ""): ?>
                    <p class="poptions-title"><?php echo $this->_tpl_vars['lng']['lbl_selected_options']; ?>
:</p>
                    <div class="poptions-list">
                      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Options/display_options.tpl", 'smarty_include_vars' => array('options' => $this->_tpl_vars['product']['product_options'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/edit_product_options.tpl", 'smarty_include_vars' => array('id' => $this->_tpl_vars['product']['cartid'],'additional_button_class' => "light-button edit-options",'style' => ' ')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                  <?php endif; ?>
                  
                  <?php $this->assign('price', $this->_tpl_vars['product']['display_price']); ?>
                  <?php if ($this->_tpl_vars['active_modules']['Product_Configurator'] && $this->_tpl_vars['product']['product_type'] == 'C'): ?>
                    <div class="clearing"></div>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Product_Configurator/pconf_customer_cart.tpl", 'smarty_include_vars' => array('main_product' => $this->_tpl_vars['product'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php $this->assign('price', $this->_tpl_vars['product']['pconf_display_price']); ?>
                  <?php endif; ?>
                  
                  <?php if ($this->_tpl_vars['active_modules']['Wishlist'] != '' && ( $this->_tpl_vars['login'] || $this->_tpl_vars['config']['Wishlist']['add2wl_unlogged_user_cart'] == 'Y' )): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_move_to_wl'],'href' => "javascript: move_to_wl('".($this->_tpl_vars['product']['productid'])."','".($this->_tpl_vars['product']['cartid'])."');",'additional_button_class' => "light-button wl-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>

                  <?php if ($this->_tpl_vars['active_modules']['XPayments_Subscriptions'] && $this->_tpl_vars['product']['subscription']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/XPayments_Subscriptions/customer/cart_product.tpl", 'smarty_include_vars' => array('next_date' => $this->_tpl_vars['product']['subscription']['next_date'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>

                  <?php if ($this->_tpl_vars['active_modules']['XAuth']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/XAuth/rpx_ss_cart_item.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>
                  <div class="clearing"></div>
                 </div>
                </div>
                <div class="price">

                  
                  <?php if ($this->_tpl_vars['active_modules']['Special_Offers']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/cart_price_special.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>

                  <div class="qty-wrapper">
                    <div class="qty-wrapper1">
                      <span class="product-price-text">
                        <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['price']), $this);?>
 x <?php if ($this->_tpl_vars['active_modules']['Egoods'] && $this->_tpl_vars['product']['distribution']): ?>1<input type="hidden"<?php else: ?><input type="text" size="3"<?php endif; ?> name="productindexes[<?php echo $this->_tpl_vars['product']['cartid']; ?>
]" id="productindexes_<?php echo $this->_tpl_vars['product']['cartid']; ?>
" value="<?php echo $this->_tpl_vars['product']['amount']; ?>
" /></span>
                      <?php if (! ( $this->_tpl_vars['active_modules']['Egoods'] && $this->_tpl_vars['product']['distribution'] )): ?>
                      <div class="qty-arrows">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_increase'],'href' => "javascript: change_quantity_input_box('productindexes_".($this->_tpl_vars['product']['cartid'])."', '+1')",'style' => 'image','additional_button_class' => "plus-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_decrease'],'href' => "javascript: change_quantity_input_box('productindexes_".($this->_tpl_vars['product']['cartid'])."', '-1')",'style' => 'image','additional_button_class' => "minus-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                      </div>
                      <?php endif; ?>  
                    </div>
                  </div>  
                  <div class="clearing"></div>
                  <?php if ($this->_tpl_vars['config']['Taxes']['display_taxed_order_totals'] == 'Y' && $this->_tpl_vars['product']['taxes']): ?>
                    <div class="taxes">
                      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/taxed_price.tpl", 'smarty_include_vars' => array('taxes' => $this->_tpl_vars['product']['taxes'],'is_subtax' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($this->_tpl_vars['active_modules']['Gift_Registry']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Gift_Registry/product_event_cart.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>

                  <?php if ($this->_tpl_vars['active_modules']['Special_Offers']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/cart_free.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endif; ?>

                  <div class="button-row">
                   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_apply'],'href' => "javascript: return updateCartItem(".($this->_tpl_vars['product']['cartid']).");",'additional_button_class' => "light-button small-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  </div>
                </div>
                <div class="subtotal last">
                  <div class="subtotal-wrapper">
                    <span class="price">
                      <?php echo smarty_function_multi(array('x' => $this->_tpl_vars['price'],'y' => $this->_tpl_vars['product']['amount'],'assign' => 'unformatted'), $this);?>
<?php echo smarty_function_currency(array('value' => $this->_tpl_vars['unformatted']), $this);?>

                    </span>
                    <span class="market-price">
                      <?php echo smarty_function_alter_currency(array('value' => $this->_tpl_vars['unformatted']), $this);?>

                    </span>
                  </div>
                </div>

              </div><div class="delete">

                <div class="delete-wrapper">
                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/delete_item.tpl", 'smarty_include_vars' => array('href' => "cart.php?mode=delete&amp;productindex=".($this->_tpl_vars['product']['cartid']),'style' => 'image','additional_button_class' => "simple-delete-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>

              </div>
            </div>  
            <div class="clearing"></div>
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>

          <?php if ($this->_tpl_vars['active_modules']['Gift_Certificates']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Gift_Certificates/gc_cart_page.tpl", 'smarty_include_vars' => array('giftcerts_data' => $this->_tpl_vars['cart']['giftcerts'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php endif; ?>

        </div>

        <?php if ($this->_tpl_vars['active_modules']['Special_Offers']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/free_offers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

        
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/cart_subtotal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Gift_Registry/gift_wrapping_cart.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/shipping_estimator.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <div class="buttons">

          <div class="left-buttons-row buttons-row">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('type' => 'input','button_title' => $this->_tpl_vars['lng']['lbl_update_cart'],'additional_button_class' => "light-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div class="button-separator"></div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('additional_button_class' => "light-button clear-cart-button",'button_title' => $this->_tpl_vars['lng']['lbl_clear_cart'],'href' => "javascript: if (confirm(txt_are_you_sure)) self.location='cart.php?mode=clear_cart'; return false;")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </div>

          <div class="right-buttons-row buttons-row">

            <?php if (! $this->_tpl_vars['std_checkout_disabled']): ?>
            <div class="checkout-button">
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_checkout'],'href' => "cart.php?mode=checkout",'additional_button_class' => "main-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['active_modules']['Special_Offers']): ?>
            <div class="button-separator"></div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/cart_checkout_buttons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php endif; ?>

          </div>

          <div class="clearing"></div>
        </div>

      </form>

      <?php if ($this->_tpl_vars['paypal_express_active']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "payments/ps_paypal_pro_express_checkout.tpl", 'smarty_include_vars' => array('paypal_express_link' => 'button')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if ($this->_tpl_vars['active_modules']['Bill_Me_Later']): ?>
          <?php if ($this->_tpl_vars['config']['Bill_Me_Later']['bml_enable_banners'] == 'Y' && $this->_tpl_vars['config']['Bill_Me_Later']['bml_banner_on_cart'] == 'inline'): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Bill_Me_Later/banner.tpl", 'smarty_include_vars' => array('bml_page' => 'cart')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php endif; ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "payments/ps_paypal_bml_button.tpl", 'smarty_include_vars' => array('paypal_link' => 'button')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

      <?php endif; ?>

      <?php if ($this->_tpl_vars['amazon_enabled']): ?>
        <div class="right-box">
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Amazon_Checkout/checkout_btn.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
      <?php endif; ?>

    </div>

  <?php else: ?>

    <?php echo $this->_tpl_vars['lng']['txt_your_shopping_cart_is_empty']; ?>


  <?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_items_in_cart'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['active_modules']['Special_Offers'] && $this->_tpl_vars['cart'] != ""): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/cart_offers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Special_Offers/customer/promo_offers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['cart']['coupon_discount'] == 0 && $this->_tpl_vars['products'] && $this->_tpl_vars['active_modules']['Discount_Coupons']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Discount_Coupons/add_coupon.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php echo smarty_function_getvar(array('func' => 'func_tpl_is_jcarousel_is_needed'), $this);?>

<?php if ($this->_tpl_vars['active_modules']['Wishlist'] != '' && $this->_tpl_vars['func_tpl_is_jcarousel_is_needed']): ?>
<?php if (! $this->_tpl_vars['products']): ?>
  <?php $this->assign('additional_class', "empty-cart"); ?>
<?php endif; ?>
  <?php ob_start(); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Wishlist/wl_carousel.tpl", 'smarty_include_vars' => array('products' => $this->_tpl_vars['wl_products'],'giftcerts' => $this->_tpl_vars['wl_giftcerts'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_wl_products'],'content' => $this->_smarty_vars['capture']['dialog'],'additional_class' => "wl-dialog ".($this->_tpl_vars['additional_class']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>