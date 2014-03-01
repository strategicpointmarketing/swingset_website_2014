{*
04fde8f686ed0be7315b88835142e1a07fc30925, v18 (xcart_4_6_2), 2014-01-04 06:59:41, products_t.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
{list2matrix assign="products_matrix" assign_width="cell_width" list=$products row_length=$config.Appearance.products_per_row}
{assign var="is_matrix_view" value=true}

{if $products_matrix}

  <table cellspacing="3" class="products products-table width-100" summary="{$lng.lbl_products_list|escape}">

    {foreach from=$products_matrix item=row name=products_matrix}

      <tr{interline name=products_matrix additional_class="product-name-row"}>

        {*Display product_thumbnail product_offer_thumb*}
        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell"}>
              <div class="image">
                {if $active_modules.On_Sale}
                  {include file="modules/On_Sale/on_sale_icon.tpl" product=$product module="products_t" href=$product.alt_url|default:$product.page_url|amp}
                {else}
                <a href="{$product.alt_url|default:$product.page_url|amp}">{include file="product_thumbnail.tpl" productid=$product.productid image_x=$product.tmbn_x image_y=$product.tmbn_y product=$product.product tmbn_url=$product.tmbn_url}</a>
                {/if}

                {if $active_modules.Special_Offers and $product.have_offers}
                  {include file="modules/Special_Offers/customer/product_offer_thumb.tpl"}
                {/if}
              </div>
            </td>

          {/if}
        {/foreach}

      </tr>

      <tr{interline name=products_matrix}>

        {*Display product name*}
        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell"} style="width: {$cell_width}%;">
<script type="text/javascript">
//<![CDATA[
products_data[{$product.productid}] = {ldelim}{rdelim};
//]]>
</script>
              <a href="{$product.alt_url|default:$product.page_url|amp}" class="product-title">{$product.product|amp}</a>
              {if $active_modules.New_Arrivals}
                {include file="modules/New_Arrivals/new_arrivals_show_date.tpl" product=$product}
              {/if} 
            </td>

          {/if}
        {/foreach}

      </tr>

      {*Display product code*}
      {if $config.Appearance.display_productcode_in_list eq "Y"}
        <tr{interline name=products_matrix}>

          {foreach from=$row item=product name=products}
            {if $product}

              <td{interline name=products additional_class="product-cell"}>
                {if $product.productcode}
                  <div class="sku">{$lng.lbl_sku}: {$product.productcode|escape}</div>
                {else}
                    &nbsp;
                {/if}
              </td>

            {/if}
          {/foreach}

        </tr>
      {/if}

      {if $active_modules.Advanced_Customer_Reviews}
        {include file="modules/Advanced_Customer_Reviews/acr_products_t.tpl"}
      {/if}


      {*Display product ratings*}
      {if $active_modules.Customer_Reviews and $rating_data_exists}
      <tr{interline name=products_matrix}>

        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell"}>

              {if $product.rating_data}
                {include file="modules/Customer_Reviews/vote_bar.tpl" rating=$product.rating_data productid=$product.productid}
              {/if}

            </td>
  
          {/if}
        {/foreach}
      </tr>
      {/if}

      <tr{interline name=products_matrix}>

        {*Display price/market_price/taxes*}
        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell product-cell-price"}>
              {if $product.product_type ne "C"}

                {if $product.appearance.is_auction}

                  <span class="price">{$lng.lbl_enter_your_price}</span><br />
                  {$lng.lbl_enter_your_price_note}

                {else}

                  {if $product.appearance.has_price}

                    <div class="price-row">
                      {if $active_modules.XPayments_Subscriptions and $product.subscription}
                        {include file="modules/XPayments_Subscriptions/customer/setup_fee.tpl"}
                      {else}
                      <span class="price">{$lng.lbl_our_price}:</span> <span class="price-value">{currency value=$product.taxed_price}</span>
                      <span class="market-price">{alter_currency value=$product.taxed_price}</span>
                      {/if}
                      {if $active_modules.Klarna_Payments}
                        {include file="modules/Klarna_Payments/monthly_cost.tpl" elementid="pp_conditions`$product.productid`" monthly_cost=$product.monthly_cost products_list='Y'}
                      {/if}
                      {if $active_modules.Product_Notifications ne '' and $config.Product_Notifications.prod_notif_enabled_P eq 'Y' and $config.Product_Notifications.prod_notif_show_in_list_P eq 'Y'}
                        {include file='modules/Product_Notifications/product_notification_request_button.tpl' productid=$product.productid type='P'}
                      {/if}
                    </div>
                    {if $active_modules.XPayments_Subscriptions and $product.subscription}
                      {include file="modules/XPayments_Subscriptions/customer/subscription_fee.tpl"}
                    {/if}

                    {if $active_modules.Product_Notifications ne '' and $config.Product_Notifications.prod_notif_enabled_P eq 'Y' and $config.Product_Notifications.prod_notif_show_in_list_P eq 'Y'}
                      {include file='modules/Product_Notifications/product_notification_request_form.tpl' productid=$product.productid variantid=$product.variantid|default:0 type='P'}
                    {/if}

                    {if $product.appearance.has_market_price and $product.appearance.market_price_discount gt 0}
                      <div class="market-price">
                        {$lng.lbl_market_price}: <span class="market-price-value">{currency value=$product.list_price}</span>

                        {if $config.General.alter_currency_symbol ne ""}, {/if}
                        <span class="price-save">{$lng.lbl_save_price} {$product.appearance.market_price_discount}%</span>

                      </div>
                    {/if}

                    {if $product.taxes}
                      <div class="taxes">{include file="customer/main/taxed_price.tpl" taxes=$product.taxes is_subtax=true}</div>
                    {/if}

                  {/if}

                  {if $active_modules.Special_Offers and $product.use_special_price}
                    {include file="modules/Special_Offers/customer/product_special_price.tpl"}
                  {/if}

                {/if}

              {elseif $product.product_type ne "C"}

                &nbsp;

              {/if}

            </td>

          {/if}
        {/foreach}

      </tr>
      <tr{interline name=products_matrix}>

        {*Display buy_now/details/pconf_add_form buttons*}
        {foreach from=$row item=product name=products}
          {if $product}

            <td{interline name=products additional_class="product-cell product-cell-buynow"}>

                {if $active_modules.Product_Configurator and $is_pconf and $current_product}
                  {include file="modules/Product_Configurator/pconf_add_form.tpl"}
                {elseif $active_modules.Product_Configurator and $product.product_type eq "C"}
                  {assign var="url" value="product.php?productid=`$product.productid`&amp;cat=`$cat`&amp;page=`$navigation_page`"}
                  {if $featured eq 'Y'}
                    {assign var="url" value=$url|cat:"&amp;featured=Y"}
                  {/if}
                  {include file="customer/buttons/details.tpl" href=$url}
                {elseif $config.Appearance.buynow_button_enabled eq "Y" and $product.product_type ne "C"}

                  {if $login ne ""}
                    {include_cache file="customer/main/buy_now.tpl" product=$product cat=$cat featured=$featured is_matrix_view=$is_matrix_view login="1" smarty_get_cat=$smarty.get.cat smarty_get_page=$smarty.get.page smarty_get_quantity=$smarty.get.quantity}
                  {else}
                    {include_cache file="customer/main/buy_now.tpl" product=$product cat=$cat featured=$featured is_matrix_view=$is_matrix_view login="" smarty_get_cat=$smarty.get.cat smarty_get_page=$smarty.get.page smarty_get_quantity=$smarty.get.quantity}
                  {/if}

                {else}
                  &nbsp;
                {/if}

            </td>

          {/if}
        {/foreach}
      </tr>

      {if $active_modules.Feature_Comparison}
        <tr{interline name=products_matrix}>

          {*Display compare_checkbox for Feature_Comparison module*}
          {foreach from=$row item=product}
            {if $product}

              <td class="product-cell product-cell-fccheckbox">

                {if $product.fclassid gt 0}
                  {include file="modules/Feature_Comparison/compare_checkbox.tpl" id=$product.productid}
                {else}
                  &nbsp;
                {/if}

              </td>

            {/if}
          {/foreach}

        </tr>
      {/if}

      {if not $smarty.foreach.products_matrix.last}
        <tr class="separator">
          <td colspan="{$config.Appearance.products_per_row|default:1}">&nbsp;</td>
        </tr>
      {/if}

    {/foreach}

  </table>

{/if}
