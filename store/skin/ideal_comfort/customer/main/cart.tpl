{*
99f49a017eeaa96cf5c4060c7785548523d6ad12, v17 (xcart_4_6_2), 2014-01-15 17:46:03, cart.tpl, mixon
vim: set ts=2 sw=2 sts=2 et:
*}
<h1>{$lng.lbl_your_shopping_cart}</h1>

{if $cart ne "" and $active_modules.Gift_Certificates}
  <p class="text-block" style="width: 67%;">{$lng.txt_cart_note}</p>
{/if}

{capture name=dialog}

  {if $products ne ""}

    <script type="text/javascript" src="{$SkinDir}/js/cart.js"></script>

    <div class="products cart">

      <form action="cart.php" method="post" name="cartform">

        <input type="hidden" name="action" id="action" value="update" />
        <input type="hidden" name="mode" value="" />
        <input type="hidden" name="productid" id="productid" value="" />
        <input type="hidden" name="pindex" id="pindex" value="" />

        <table cellspacing="0" class="width-100 item" summary="{$product.product|escape}">

          <tr>
          <th colspan="3" class="first" style="text-align: left;">{$lng.lbl_item}</th>
          <th>{$lng.lbl_price}</th>
          <th class="last">{$lng.lbl_subtotal}</th>
          <th class="delete"></th>
          </tr>

        {foreach from=$products item=product name=cart_products}
          {if $product.hidden eq ""}

              <tr class="separator top">
                <td colspan="5" class="first"><div class="clearing"></div></td>
                <td class="delete"></td>
              </tr>

              <tr id="tr_cartitem{$smarty.foreach.cart_products.index}">
                <td class="sep"><div class="clearing"></div></td>
                <td class="image">
                    {if $active_modules.On_Sale}
                      {include file="modules/On_Sale/on_sale_icon.tpl" product=$product current_skin="ideal_comfort" module="cart"}
                    {else}
                    <a href="product.php?productid={$product.productid}">{include file="product_thumbnail.tpl" productid=$product.display_imageid product=$product.product tmbn_url=$product.pimage_url type=$product.is_pimage image_x=$product.tmbn_x}</a>
                    {/if}
                  {if $active_modules.Special_Offers ne "" and $product.have_offers}
                    {include file="modules/Special_Offers/customer/product_offer_thumb.tpl"}
                  {/if}

                </td>
                <td class="details">
                  <a href="product.php?productid={$product.productid}" class="product-title">{$product.product|amp}</a>
                  <div class="descr">{$product.descr}</div>

                  {if $product.product_options ne ""}
                    <p class="poptions-title">{$lng.lbl_selected_options}:</p>
                    <div class="poptions-list">
                      {include file="modules/Product_Options/display_options.tpl" options=$product.product_options}
                      {include file="customer/buttons/edit_product_options.tpl" id=$product.cartid additional_button_class="light-button edit-options" style=" "}
                    </div>
                  {/if}

                  {if $active_modules.Wishlist ne '' && ($login || $config.Wishlist.add2wl_unlogged_user_cart eq 'Y')}
                    {include file="customer/buttons/button.tpl" button_title=$lng.lbl_move_to_wl href="javascript: move_to_wl('`$product.productid`','`$product.cartid`');" additional_button_class="light-button wl-button"}
                  {/if}

                  {if $active_modules.XPayments_Subscriptions and $product.subscription}
                    {include file="modules/XPayments_Subscriptions/customer/cart_product.tpl" next_date=$product.subscription.next_date}
                  {/if}

                  {if $active_modules.XAuth}
                    {include file="modules/XAuth/rpx_ss_cart_item.tpl"}
                  {/if}
                  <div class="clearing"></div>

                </td>

                <td class="price">

                  {assign var="price" value=$product.display_price}
                  {if $active_modules.Product_Configurator and $product.product_type eq "C"}
                    {include file="modules/Product_Configurator/pconf_customer_cart.tpl" main_product=$product}
                    {assign var="price" value=$product.pconf_display_price}
                  {/if}

                  {if $active_modules.Special_Offers}
                    {include file="modules/Special_Offers/customer/cart_price_special.tpl"}
                  {/if}

                  <div class="qty-wrapper">
                    <div class="qty-wrapper1">
                      <span class="product-price-text">
                        {currency value=$price} x {if $active_modules.Egoods and $product.distribution}1<input type="hidden"{else}<input type="text" size="3"{/if} name="productindexes[{$product.cartid}]" id="productindexes_{$product.cartid}" value="{$product.amount}" /></span>
                      {if !($active_modules.Egoods and $product.distribution)}
                      <div class="qty-arrows">
                        {include file="customer/buttons/button.tpl" button_title=$lng.lbl_increase href="javascript: change_quantity_input_box('productindexes_`$product.cartid`', '+1')" style="image" additional_button_class="plus-button"}
                        {include file="customer/buttons/button.tpl" button_title=$lng.lbl_decrease href="javascript: change_quantity_input_box('productindexes_`$product.cartid`', '-1')" style="image" additional_button_class="minus-button"}
                      </div>
                      {/if}  
                    </div>
                  </div>  
                  <div class="clearing"></div>
                  {if $config.Taxes.display_taxed_order_totals eq "Y" and $product.taxes}
                    <div class="taxes">
                      {include file="customer/main/taxed_price.tpl" taxes=$product.taxes is_subtax=true}
                    </div>
                  {/if}

                  {if $active_modules.Gift_Registry}
                    {include file="modules/Gift_Registry/product_event_cart.tpl"}
                  {/if}

                  {if $active_modules.Special_Offers}
                    {include file="modules/Special_Offers/customer/cart_free.tpl"}
                  {/if}

                  <div class="button-row">
                   {include file="customer/buttons/button.tpl" button_title=$lng.lbl_apply href="javascript: return updateCartItem(`$product.cartid`);" additional_button_class="light-button small-button"}
                  </div>
                </td>

                <td class="subtotal last">
                

                    <span class="price">
                      {multi x=$price y=$product.amount assign=unformatted}{currency value=$unformatted}
                    </span>
                    <span class="market-price">
                      {alter_currency value=$unformatted}
                    </span>

                </td>
                
                <td class="delete">

                  <div class="delete-wrapper">
                    {include file="customer/buttons/delete_item.tpl" href="cart.php?mode=delete&amp;productindex=`$product.cartid`" style="image" additional_button_class="simple-delete-button"}
                  </div>

                </td>

              </tr>

              <tr class="separator">
                <td colspan="5" class="first"><div class="clearing"></div></td>
                <td class="delete"></td>
              </tr>

          {/if}
        {/foreach}

        {if $active_modules.Gift_Certificates}
          {include file="modules/Gift_Certificates/gc_cart_page.tpl" giftcerts_data=$cart.giftcerts}
        {/if}

        </table>
        
        {if $active_modules.Special_Offers}
          {include file="modules/Special_Offers/customer/free_offers.tpl"}
        {/if}

        
        {include file="customer/main/cart_subtotal.tpl"}
        
        {include file="modules/Gift_Registry/gift_wrapping_cart.tpl"}

        {include file="customer/main/shipping_estimator.tpl"}

        <div class="buttons">

          <div class="left-buttons-row buttons-row">
            {include file="customer/buttons/button.tpl" type="input" button_title=$lng.lbl_update_cart additional_button_class="light-button"}
            <div class="button-separator"></div>
            {include file="customer/buttons/button.tpl" additional_button_class="light-button clear-cart-button" button_title=$lng.lbl_clear_cart href="javascript: if (confirm(txt_are_you_sure)) self.location='cart.php?mode=clear_cart'; return false;"}
          </div>

          <div class="right-buttons-row buttons-row">

            {if not $std_checkout_disabled}
            <div class="checkout-button">
              {include file="customer/buttons/button.tpl" button_title=$lng.lbl_checkout  href="cart.php?mode=checkout" additional_button_class="main-button"}
            </div>
            {/if}

            {if $active_modules.Special_Offers}
            <div class="button-separator"></div>
            {include file="modules/Special_Offers/customer/cart_checkout_buttons.tpl"}
          {/if}

          </div>

          <div class="clearing"></div>
        </div>

      </form>

      {if $paypal_express_active}
        {include file="payments/ps_paypal_pro_express_checkout.tpl" paypal_express_link="button"}

        {if $active_modules.Bill_Me_Later}
          {if $config.Bill_Me_Later.bml_enable_banners eq 'Y' and $config.Bill_Me_Later.bml_banner_on_cart eq 'inline'}
            {include file="modules/Bill_Me_Later/banner.tpl" bml_page="cart"}
          {/if}
          {include file="payments/ps_paypal_bml_button.tpl" paypal_link="button"}
        {/if}

      {/if}

      {if $amazon_enabled}
        <div class="right-box">
          {include file="modules/Amazon_Checkout/checkout_btn.tpl"}
        </div>
      {/if}

    </div>

  {else}

    {$lng.txt_your_shopping_cart_is_empty}

  {/if}

{/capture}
{include file="customer/dialog.tpl" title=$lng.lbl_items_in_cart content=$smarty.capture.dialog noborder=true}

{if $active_modules.Special_Offers and $cart ne ""}
  {include file="modules/Special_Offers/customer/cart_offers.tpl"}
  {include file="modules/Special_Offers/customer/promo_offers.tpl"}
{/if}

{if $cart.coupon_discount eq 0 and $products and $active_modules.Discount_Coupons}
  {include file="modules/Discount_Coupons/add_coupon.tpl"}
{/if}

{getvar func='func_tpl_is_jcarousel_is_needed'}
{if $active_modules.Wishlist ne '' and $func_tpl_is_jcarousel_is_needed}
{if !$products}
  {assign var=additional_class value="empty-cart"}
{/if}
  {capture name=dialog}
    {include file="modules/Wishlist/wl_carousel.tpl" products=$wl_products giftcerts=$wl_giftcerts}
  {/capture}
  {include file="customer/dialog.tpl" title=$lng.lbl_wl_products content=$smarty.capture.dialog additional_class="wl-dialog $additional_class"}
{/if}
