{*
99f49a017eeaa96cf5c4060c7785548523d6ad12, v11 (xcart_4_6_2), 2014-01-15 17:46:03, cart.tpl, mixon
vim: set ts=2 sw=2 sts=2 et:
*}
<<<<<<< HEAD
=======
<h1 class="canon-text tertiary-heading mtn">{$lng.lbl_your_shopping_cart}</h1>
>>>>>>> 6f10f04ae1c8e49f6119a4c6881df382bee26c14


<h1 class="canon-text tertiary-heading">Your Shopping Cart</h1>

{*
{if $cart ne "" and $active_modules.Gift_Certificates}
  <p class="text-block cart-note">{$lng.txt_cart_note}</p>


{/if}

The above commented out code will generate a message saying: Please note: 1) Delivery Method is ignored if you are ordering Gift Certificates or electronically distributed products. 2) Gift Certificates are redeemed during Checkout process.

*}

{capture name=dialog}

  {if $products ne ""}

        <script type="text/javascript" src="{$SkinDir}/js/cart.js"></script>

    <form action="cart.php" method="post" name="cartform">

        <input type="hidden" name="action" id="action" value="update" />
        <input type="hidden" name="mode" value="" />
        <input type="hidden" name="productid" id="productid" value="" />
        <input type="hidden" name="pindex" id="pindex" value="" />

        <div class="gd-row gt-row">
            <div class="gd-two-thirds gd-columns gt-two-thirds gt-columns gm-half gm-columns">
                <!--item heading-->
                <h3 class="primary-color primer-text bold">Item</h3>
            </div>

            <div class="gd-third gd-columns gt-third gt-columns gm-half gm-columns">
                <!--subtotal heading-->

                <h3 class="primary-color primer-text bold">Subtotal</h3>
            </div>
        </div>

        <!-- every item added-->

        {foreach from=$products item=product name=products}
            {if $product.hidden eq ""}
            <div class="gd-row gt-row">
                <div class="gd-two-thirds gd-columns gt-two-thirds gt-columns gm-half gm-columns">
                    <!-- Product name/link -->
                    <p><a href="product.php?productid={$product.productid}" >{$product.product|amp}</a></p>
                    <p>{$product.descr|truncate:100}</p>


                    {*{if $product.product_options ne ""}
                        <p>{$lng.lbl_selected_options}:</p>
                        <div>
                            {include file="modules/Product_Options/display_options.tpl" options=$product.product_options}
                            {include file="customer/buttons/edit_product_options.tpl" id=$product.cartid additional_button_class="light-button edit-options" style=" "}
                        </div>
                    {/if}*}
                </div>
                <div class="gd-third gd-columns gt-third gt-columns gm-half gm-columns">
                    <!-- Begin pricing/quantity info -->
                    {assign var="price" value=$product.display_price}

                        <div class = "float-left">{$price} x </div> <input type="text" size="3" name="productindexes[{$product.cartid}]" id="productindexes_{$product.cartid}" value="{$product.amount}" />



                    {*{if $config.Taxes.display_taxed_order_totals eq "Y" and $product.taxes}
                        <div class="taxes">
                            {include file="customer/main/taxed_price.tpl" taxes=$product.taxes is_subtax=true}
                        </div>
                    {/if}*}



                    <button class="button--secondary capitalize light-button small-button" type="button" title="Apply" onclick="javascript: return updateCartItem({$product.cartid});">
                        Apply
                    </button>

                    <div class="subtotal last">
                        <div class="subtotal-wrapper">
                    <span class="price">
                      {multi x=$price y=$product.amount assign=unformatted}{currency value=$unformatted}
                    </span>
                    <span class="market-price">
                      {alter_currency value=$unformatted}
                    </span>
                        </div>
                    </div>

                    <div class="delete">

                        <div class="delete-wrapper">
                            {include file="customer/buttons/delete_item.tpl" href="cart.php?mode=delete&amp;productindex=`$product.cartid`" style="image" additional_button_class="simple-delete-button"}
                        </div>

                    </div>




                    <!-- End pricing/quantity info -->
                </div>
            </div>
            {/if}
        {/foreach}







    </form>




      <!-- every item added-->
             


     {* <div class="products cart">

      <form action="cart.php" method="post" name="cartform">

        <input type="hidden" name="action" id="action" value="update" />
        <input type="hidden" name="mode" value="" />
        <input type="hidden" name="productid" id="productid" value="" />
        <input type="hidden" name="pindex" id="pindex" value="" />
        <div class="width-100 item">
          <div class="responsive-cart-header">
            <div class="responsive-first">{$lng.lbl_item}</div>
            <div class="responsive-price">{$lng.lbl_price}</div>
            <div class="responsive-subtotal">{$lng.lbl_subtotal}</div>
          </div>

           {foreach from=$products item=product name=products}
            {if $product.hidden eq ""}
            <div {interline name=products additional_class=responsive-row}>
              <div class="responsive-item">
                <div class="details">
                  <div class="image">
                      {if $active_modules.On_Sale}
                        {include file="modules/On_Sale/on_sale_icon.tpl" product=$product current_skin="ideal_responsive" module="cart"}
                      {else}
                      <a href="product.php?productid={$product.productid}">{include file="product_thumbnail.tpl" productid=$product.display_imageid product=$product.product tmbn_url=$product.pimage_url type=$product.is_pimage image_x=$product.tmbn_x}</a>
                      {/if}
                    {if $active_modules.Special_Offers ne "" and $product.have_offers}
                    {include file="modules/Special_Offers/customer/product_offer_thumb.tpl"}
                    {/if}
                  </div>
                 <div class="product-info">
                  <a href="product.php?productid={$product.productid}" class="product-title">{$product.product|amp}</a>
                  <div class="descr">{$product.descr}</div>

                  {if $product.product_options ne ""}
                    <p class="poptions-title">{$lng.lbl_selected_options}:</p>
                    <div class="poptions-list">
                      {include file="modules/Product_Options/display_options.tpl" options=$product.product_options}
                      {include file="customer/buttons/edit_product_options.tpl" id=$product.cartid additional_button_class="light-button edit-options" style=" "}
                    </div>
                  {/if}
                  
                  {assign var="price" value=$product.display_price}
                  {if $active_modules.Product_Configurator and $product.product_type eq "C"}
                    <div class="clearing"></div>
                    {include file="modules/Product_Configurator/pconf_customer_cart.tpl" main_product=$product}
                    {assign var="price" value=$product.pconf_display_price}
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
                 </div>
                </div>
                <div class="price">



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
                </div>
                <div class="subtotal last">
                  <div class="subtotal-wrapper">
                    <span class="price">
                      {multi x=$price y=$product.amount assign=unformatted}{currency value=$unformatted}
                    </span>
                    <span class="market-price">
                      {alter_currency value=$unformatted}
                    </span>
                  </div>
                </div>

              </div><div class="delete">

                <div class="delete-wrapper">
                  {include file="customer/buttons/delete_item.tpl" href="cart.php?mode=delete&amp;productindex=`$product.cartid`" style="image" additional_button_class="simple-delete-button"}
                </div>

              </div>
            </div>  
            <div class="clearing"></div>
            {/if}
          {/foreach}

          {if $active_modules.Gift_Certificates}
            {include file="modules/Gift_Certificates/gc_cart_page.tpl" giftcerts_data=$cart.giftcerts}
          {/if}

        </div>

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

    </div> *}
    <!-- End cart -->
  {else}

    {$lng.txt_your_shopping_cart_is_empty}

  {/if}

{/capture}
{include file="customer/dialog.tpl" title=$lng.lbl_items_in_cart content=$smarty.capture.dialog noborder=true}




    <form action="cart.php" name="couponform">
        <input type="hidden" name="mode" value="add_coupon">
        <div>
            Have a coupon?
            <input type="text"  size="32" name="coupon" value="Coupon code">
        </div>

        <button class="button--secondary" type="submit" title="Submit">
            Submit
        </button>

    </form>


<div class = "mts">
    <a href = "cart.php?mode=checkout" class="button--primary" type="submit" title="Submit">
        Checkout
    </a>
</div>

{*
{getvar func='func_tpl_is_jcarousel_is_needed'}

{if $active_modules.Wishlist ne '' and $func_tpl_is_jcarousel_is_needed}
{if !$products}
  {assign var=additional_class value="empty-cart"}
{/if}
  {capture name=dialog}
    {include file="modules/Wishlist/wl_carousel.tpl" products=$wl_products giftcerts=$wl_giftcerts}
  {/capture}
  {include file="customer/dialog.tpl" title=$lng.lbl_wl_products content=$smarty.capture.dialog additional_class="wl-dialog $additional_class"}
{/if} *}
