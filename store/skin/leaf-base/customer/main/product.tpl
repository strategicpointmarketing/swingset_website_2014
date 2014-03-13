{*
912a6cbc9fc581899618bcb32d3564a6b794b9f3, v5 (xcart_4_6_2), 2013-10-15 13:34:10, product.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}


{include file="form_validation_js.tpl"}

{*
{if $config.Appearance.display_np_products eq 'Y'}
  {include file="customer/main/np_products.tpl"}
{/if}*}

{if $product.product_type eq "C" and $active_modules.Product_Configurator}

  {include file="modules/Product_Configurator/pconf_customer_product.tpl"}

{else}

  {if $config.General.ajax_add2cart eq 'Y' and $config.General.redirect_to_cart ne 'Y' and not ($smarty.cookies.robot eq 'X-Cart Catalog Generator' and $smarty.cookies.is_robot eq 'Y')}
    {include file="customer/ajax.add2cart.tpl" _include_once=1}

<script type="text/javascript">
//<![CDATA[
{literal}
$(ajax).bind(
  'load',
  function() {
    var elm = $('.product-details').get(0);
    return elm && ajax.widgets.product(elm);
  }
);
{/literal}
//]]>
</script>

  {/if}

  {capture name=dialog}

  <div class="gd-row gt-row mtl product-details">

      <div class="gd-half gd-columns gt-half gt-columns">
          <!--Product Image-->

          {if $active_modules.Detailed_Product_Images and $config.Detailed_Product_Images.det_image_popup eq 'Y' and $images ne ''}

              {include file="modules/Detailed_Product_Images/widget.tpl"}

          {else}

              <div class="image-box">
                  {if $active_modules.On_Sale}
                      {include file="modules/On_Sale/on_sale_icon.tpl" product=$product module="product"}
                  {else}
                      {include file="product_thumbnail.tpl" productid=$product.image_id image_x=$product.image_x image_y=$product.image_y product=$product.product tmbn_url=$product.image_url id="product_thumbnail" type=$product.image_type}
                  {/if}
              </div>

          {/if}

          {if $active_modules.Magnifier and $config.Magnifier.magnifier_image_popup eq 'Y' and $zoomer_images}
              {include file="modules/Magnifier/popup_magnifier.tpl"}
          {/if}
          <!--End Product Image-->

          <!--Social Sharing-->
          <div class="mvm align-center">

              <a class="social twitter pearl-text" href="https://twitter.com/intent/tweet?url={$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}">Tweet</a>
              <a class="social facebook pearl-text" href="https://facebook.com/sharer.php?u={$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}">Like</a>
              <a class="social pinterest pearl-text" href="http://pinterest.com/pin/create/button/?url={$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}">Pin It</a>

          </div>
          <!--End Social Sharing-->

      </div>

    


      <div class="gd-half gd-columns gt-half gt-columns">
          <!--Product Details-->
        {include file="customer/main/product_details.tpl"}
          <!--End Product Details-->
      </div>

  </div>

  {/capture}
  {include file="customer/dialog.tpl" title=$product.producttitle content=$smarty.capture.dialog noborder=true}

{/if}

{include file="customer/leaf_tabs.tpl"}





{*
{if $product_tabs}
  {if $show_as_tabs}
    {include file="customer/main/ui_tabs.tpl" prefix="product-tabs-" default_tab=$config.Appearance.default_product_tab mode="inline" tabs=$product_tabs}
  {else}
    {foreach from=$product_tabs item=tab key=ind}
      {include file=$tab.tpl}
    {/foreach}
  {/if}
{/if}*}

{if $active_modules.Product_Options and ($product_options ne '' or $product_wholesale ne '') and ($product.product_type ne "C" or not $active_modules.Product_Configurator)}
<script type="text/javascript">
//<![CDATA[
check_options();
//]]>
</script>
{/if}
