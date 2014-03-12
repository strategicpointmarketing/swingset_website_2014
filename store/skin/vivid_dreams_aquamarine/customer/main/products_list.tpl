{*
04fde8f686ed0be7315b88835142e1a07fc30925, v16 (xcart_4_6_2), 2014-01-04 06:59:41, products_list.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="products products-list">
  {foreach from=$products item=product name=products}

<script type="text/javascript">
//<![CDATA[
products_data[{$product.productid}] = {ldelim}{rdelim};
//]]>
</script>

    {if $active_modules.Product_Configurator and $is_pconf and $current_product}
      {assign var="url" value="product.php?productid=`$product.productid`&amp;pconf=`$current_product.productid`&amp;slot=`$slot`"}
    {else}
      {assign var="url" value="product.php?productid=`$product.productid`&amp;cat=`$cat`&amp;page=`$navigation_page`"}
      {if $featured eq 'Y'}
        {assign var="url" value=$url|cat:"&amp;featured=Y"}
      {/if}
    {/if}

    <div{interline name=products additional_class=item}>

      <div class="image"{if $config.Appearance.thumbnail_width gt 0 or $product.tmbn_x gt 0} style="width: {$max_images_width|default:$config.Appearance.thumbnail_width|default:$product.tmbn_x}px;"{/if}>
        {if $active_modules.On_Sale}
          {include file="modules/On_Sale/on_sale_icon.tpl" product=$product module="products_list" href=$url}
        {else}
        <a href="{$url}">{include file="product_thumbnail.tpl" productid=$product.productid image_x=$product.tmbn_x image_y=$product.tmbn_y product=$product.product tmbn_url=$product.tmbn_url}</a>
        {/if}

        {if $active_modules.Special_Offers}
          {include file="modules/Special_Offers/customer/product_offer_thumb.tpl"}
        {/if}
        <br />
        <a href="{$url}" class="see-details">{$lng.lbl_see_details}</a>

        {if $active_modules.Feature_Comparison}
          {include file="modules/Feature_Comparison/compare_checkbox.tpl"}
        {/if}

      </div>
      <div class="details"{if $config.Appearance.thumbnail_width gt 0 or $product.tmbn_x gt 0} style="margin-left: {$max_images_width|default:$config.Appearance.thumbnail_width|default:$product.tmbn_x}px;"{/if}>

        <a href="{$url}" class="product-title">{$product.product|amp}</a>

        {if $active_modules.New_Arrivals}
          {include file="modules/New_Arrivals/new_arrivals_show_date.tpl" product=$product}
        {/if}

        {if $config.Appearance.display_productcode_in_list eq "Y" and $product.productcode ne ""}
          <div class="sku">{$lng.lbl_sku}: <span class="sku-value">{$product.productcode|escape}</span></div>
        {/if}

        {if $active_modules.Advanced_Customer_Reviews}
          {include file="modules/Advanced_Customer_Reviews/acr_products_list.tpl"}
        {/if}

        <div class="descr">{$product.descr}</div>

        {if $product.rating_data}
          {include file="modules/Customer_Reviews/vote_bar.tpl" rating=$product.rating_data productid=$product.productid}
        {/if}

        {if $product.product_type eq "C"}

          {include file="customer/buttons/details.tpl" href=$url}

        {else}

          {if not $product.appearance.is_auction}

            {if $product.appearance.has_price and $is_pconf}

              <div class="price-row{if $active_modules.Special_Offers ne "" and $product.use_special_price ne ""} special-price-row{/if}">
                <span class="price">{$lng.lbl_our_price}:</span> <span class="price-value">{currency value=$product.taxed_price}</span>
                <span class="market-price">{alter_currency value=$product.taxed_price}</span>
              </div>

            {/if}

            {if $active_modules.XPayments_Subscriptions and $product.subscription}
            <div class="price-row">
              {include file="modules/XPayments_Subscriptions/customer/setup_fee.tpl"}
            </div>
            {include file="modules/XPayments_Subscriptions/customer/subscription_fee.tpl"}
            {/if}

            {if $active_modules.Special_Offers ne "" and $product.use_special_price ne ""}
              {include file="modules/Special_Offers/customer/product_special_price.tpl"}
            {/if}

          {else}

            <span class="price">{$lng.lbl_enter_your_price}</span><br />
            {$lng.lbl_enter_your_price_note}

          {/if}

          {if $active_modules.Product_Configurator and $is_pconf and $current_product}
            {include file="modules/Product_Configurator/pconf_add_form.tpl"}
          {elseif $product.appearance.buy_now_enabled and $product.product_type ne "C"}
            {if $login ne ""}
              {include_cache file="customer/main/buy_now.tpl" product=$product cat=$cat featured=$featured is_matrix_view=$is_matrix_view login="1" smarty_get_cat=$smarty.get.cat smarty_get_page=$smarty.get.page smarty_get_quantity=$smarty.get.quantity}
            {else}
              {include_cache file="customer/main/buy_now.tpl" product=$product cat=$cat featured=$featured is_matrix_view=$is_matrix_view login="" smarty_get_cat=$smarty.get.cat smarty_get_page=$smarty.get.page smarty_get_quantity=$smarty.get.quantity}
            {/if}

          {else}
            <div class="prices_without_bn">
              <strong>{$lng.lbl_our_price}:</strong>
              <span class="price">{currency value=$product.taxed_price}</span>
              <span class="market-price">{alter_currency value=$product.taxed_price}</span>
              {if $active_modules.Klarna_Payments}
                {include file="modules/Klarna_Payments/monthly_cost.tpl" elementid="pp_conditions`$product.productid`" monthly_cost=$product.monthly_cost products_list='Y'}
              {/if}
            {if $product.appearance.has_market_price and $product.appearance.market_price_discount gt 0}
              <div class="market-price">
                {$lng.lbl_market_price}: <span class="market-price-value">{currency value=$product.list_price}</span>

                {if $product.appearance.market_price_discount gt 0}
                  {if $config.General.alter_currency_symbol ne ""}, {/if}
                  <span class="price-save">{$lng.lbl_save_price} {$product.appearance.market_price_discount}%</span>
                {/if}

              </div>
            {/if}

            {if $product.taxes}
              <div class="taxes">
                {include file="customer/main/taxed_price.tpl" taxes=$product.taxes is_subtax=true}
              </div>
            {/if}

            </div>
          {/if}

        {/if}

      </div>

      <div class="clearing"></div>
    </div>

  {/foreach}

</div>
