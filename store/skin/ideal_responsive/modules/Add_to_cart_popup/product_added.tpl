{*
068e287de35808bddd9e529ce0a5e46e4b197eee, v5 (xcart_4_6_2), 2014-01-10 19:12:15, product_added.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}

<div style="height: 1200px;" id="Add_to_cart_popup_window">

        <div class="thumbnail">
          <a href="{$product_url}">{include file="product_thumbnail.tpl" productid=$product.productid image_x=$product.image_x image_y=$product.image_y product=$product.product tmbn_url=$product.image_url type=$product.image_type}</a>
        </div>



        <div class="details">

          <div class="title">
            {$add_product.amount} x <a href="{$product_url}">{$product.product}</a>
          </div>

          {if $product_options}
            <div class="options">
              {include file="modules/Product_Options/display_options.tpl" options=$product_options}
            </div>
          {/if}

          <div class="price">
            <span class="product-price-value">{currency value=$product.taxed_price}</span>
            <span class="product-alt-price-value">{alter_currency value=$product.taxed_price}</span>
          </div>

        </div>



        <div class="cart-outer">
          <div class="cart">
            <div class="header">{$lng.lbl_your_cart}</div>
            <ul>
              <li>
                <span class="label">{$lng.lbl_items}:</span> {$minicart_total_items}
              </li>
              <li>
                <span class="label">{$lng.lbl_subtotal}:</span> {currency value=$minicart_total_cost}
              </li>
            </ul>
            <a href="cart.php" class="view-cart">{$lng.lbl_view_cart}</a>
          </div>
        </div>


        <hr />
        <div class="added-buttons">
          <a href="#" class="continue-shopping">{$lng.lbl_continue_shopping}</a>
          <div class="checkout-btn-container">
            <a href="cart.php?mode=checkout" class="proceed-to-checkout">{$lng.lbl_proceed_to_checkout}</a>
            {if $paypal_express_active}
              <div id="alternative_checkouts">
               {include file="payments/ps_paypal_pro_express_checkout.tpl" paypal_express_link="button"}
              </div>
            {/if}
          </div>
        </div>
    
    {if $upselling}


        <h1>{$lng.lbl_you_may_also_like}</h1>

        <div class="products products-div">

          {foreach from=$upselling item=p}

            {if $p}
              <div class="upselling details">
                <div class="upselling-image"{if $config.Appearance.thumbnail_height gt 0 or $product.tmbn_y gt 0 or $max_images_height gt 0} style="height: {$max_images_height|default:$config.Appearance.thumbnail_height|default:$product.tmbn_y}px;line-height: {$max_images_height|default:$config.Appearance.thumbnail_height|default:$product.tmbn_y}px;"{/if}>
                  <a href="{$p.product_url}">{include file="product_thumbnail.tpl" productid=$p.productid image_x=$p.tmbn_x image_y=$p.tmbn_y product=$p.product tmbn_url=$p.tmbn_url}</a>
                </div>
                <div class="title">
                  <a href="{$p.product_url}">{$p.product}</a>
                </div>
                <div class="price">
                  <span class="product-price-value">{currency value=$p.taxed_price}</span>
                  <span class="product-alt-price-value">{alter_currency value=$p.taxed_price}</span>
                </div>
                <div class="buy product-input buttons-cell">
                    {include file="modules/Add_to_cart_popup/buy.tpl" is_matrix_view=0}
                </div>
              </div>  
            {/if}

          {/foreach}
      </div>

    {/if}

</div>
