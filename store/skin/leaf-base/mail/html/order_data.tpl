{*
0d5c6400ae56c175f749cbeea02e94076e3ecd2d, v4 (xcart_4_6_2), 2014-01-22 17:42:39, order_data.tpl, mixon
vim: set ts=2 sw=2 sts=2 et:
*}
{if $is_nomail ne 'Y'}
<table class="order-data-container">
<tr>
  <td class="order-data-container">
{/if}

{if $is_nomail eq 'Y'}
<p class="invoice-products-title">{$lng.lbl_products_ordered}</p>
{else}
<center><font style="font-size: 14px; font-weight: bold; text-align: center">{$lng.lbl_products_ordered}</font></center>
{/if}

<table {if $is_nomail eq 'Y'}cellspacing="1"{else}cellspacing="0" width="100%" border="1"{/if} class="invoice-products" summary="{$lng.lbl_products|escape}">

  <tr>
    <th {if $is_nomail eq 'Y'}class="invoice-sku-column"{else}style="max-width: 60px; background: #ccc;"{/if}>{$lng.lbl_sku}</th>
    <th{if $is_nomail ne 'Y'} style="min-width: 30%; background: #ccc;"{/if}>{$lng.lbl_product}</th>
    {if $order.extra.tax_info.display_cart_products_tax_rates eq "Y" and $_userinfo.tax_exempt ne "Y"}
      <th {if $is_nomail eq 'Y'}class="invoice-tax-column"{else}style="max-width: 100px; background: #ccc;"{/if}>
        {if $order.extra.tax_info.product_tax_name ne ""}
          {$order.extra.tax_info.product_tax_name}
        {else}
          {$lng.lbl_tax}
        {/if}
      </th>
    {/if}
    <th {if $is_nomail eq 'Y'}class="invoice-price-column"{else}style="max-width: 100px; background: #ccc;"{/if}>{$lng.lbl_item_price}</th>
    <th {if $is_nomail eq 'Y'}class="invoice-quantity-column"{else}style="max-width: 60px; background: #ccc;"{/if}>{$lng.lbl_quantity}</th>
    <th {if $is_nomail eq 'Y'}class="invoice-total-column"{else}style="max-width: 60px; background: #ccc;"{/if}>{$lng.lbl_total}</th>
  </tr>

  {foreach from=$products item=product}

    <tr>
      <td class="invoice-price-column">{$product.productcode}</td>
      <td class="invoice-product-column">
        <span{if $is_nomail ne 'Y'} style="font-size: 11px;"{/if}>{$product.product}</span>
        {if $product.product_type eq "C" and $product.display_price lt 0}
        <span{if $is_nomail eq 'Y'} class="pconf-negative-price"{else} style="color:#b51800"{/if}> {$lng.lbl_pconf_discounted}</span>
        {/if}
        {if $active_modules.Gift_Registry}
          {include file="modules/Gift_Registry/product_event_invoice.tpl"}
        {/if}
        {if $product.product_options ne '' and $active_modules.Product_Options}
          <div class="invoice-product-options">
            <strong>{$lng.lbl_options}:</strong><br />
            {include file="modules/Product_Options/display_options.tpl" options=$product.product_options options_txt=$product.product_options_txt force_product_options_txt=$product.force_product_options_txt}
          </div>
        {/if}
        {if $active_modules.Egoods and $product.download_key and ($order.status eq "P" or $order.status eq "C")}
          <br />
            <a href="{$catalogs.customer}/download.php?id={$product.download_key}" target="_blank">{$lng.lbl_download}</a>
        {/if}
      </td>
      {if $order.extra.tax_info.display_cart_products_tax_rates eq "Y" and $_userinfo.tax_exempt ne "Y"}
        <td {if $is_nomail eq 'Y'}class="invoice-tax-column"{else}align="center"{/if}>
          {foreach from=$product.extra_data.taxes key=tax_name item=tax}
            {if $tax.tax_value gt 0}
              <div>
                {if $order.extra.tax_info.product_tax_name eq ""}
                  {$tax.tax_display_name}
                {/if}
                {if $tax.rate_type eq "%"}
                  {$tax.rate_value}%
                {else}
                  {currency value=$tax.rate_value}
                {/if}
               </div>
            {/if}
          {/foreach}
        </td>
      {/if}
      <td class="invoice-price-column">{currency value=$product.display_price display_sign=$product.price_show_sign}&nbsp;&nbsp;</td>
      <td class="invoice-quantity-column">{$product.amount}</td>
      <td class="invoice-total-column">
        {multi assign="total" x=$product.amount y=$product.display_price|default:$product.price|default:0}
        {currency value=$total display_sign=$product.price_show_sign}
      </td>
    </tr>

  {/foreach}

  {if $giftcerts ne ''}
    {foreach from=$giftcerts item=gc}
      <tr>
        <td>&nbsp;</td>
        <td{if $is_nomail eq 'Y'} class="invoice-product-column"{/if}>
          <div{if $is_nomail ne 'Y'} class="nowrap"{/if}>{$lng.lbl_gift_certificate}: {$gc.gcid}</div>
          <div{if $is_nomail ne 'Y'} style="padding-left: 10px; white-space: nowrap;"{/if}>
            {if $gc.send_via eq "P"}
              {$lng.lbl_gc_send_via_postal_mail}<br />
              {$lng.lbl_mail_address}: {$gc.recipient_firstname} {$gc.recipient_lastname}<br />
              {$gc.recipient_address}, {$gc.recipient_city},<br />
              {if $gc.recipient_countyname ne ''}
                {$gc.recipient_countyname}
              {/if}
              {$gc.recipient_state} {$gc.recipient_country}, {include file="main/zipcode.tpl" val=$gc.recipient_zipcode zip4=$gc.recipient_zip4 static=true}<br />
              {$lng.lbl_phone}: {$gc.recipient_phone}
            {else}
              {$lng.lbl_recipient_email}: {$gc.recipient_email}
            {/if}
          </div>
        </td>
        {if $order.extra.tax_info.display_cart_products_tax_rates eq "Y" and $_userinfo.tax_exempt ne "Y"}
          <td {if $is_nomail eq 'Y'}class="invoice-tax-column"{else}align="center"{/if}>&nbsp;-&nbsp;</td>
        {/if}
        <td {if $is_nomail eq 'Y'}class="invoice-price-column"{else}align="right" nowrap="nowrap"{/if}>{currency value=$gc.amount}&nbsp;&nbsp;</td>
        <td {if $is_nomail eq 'Y'}class="invoice-quantity-column"{else}align="center"{/if}>1</td>
        <td {if $is_nomail eq 'Y'}class="invoice-total-column"{else}align="right" nowrap="nowrap" style="padding-right: 5px;"{/if}>{currency value=$gc.amount}</td>
      </tr>
    {/foreach}
  {/if}

</table>

<table cellspacing="0" {if $is_nomail eq 'Y'}class="invoice-totals"{else}cellpadding="0" width="100%" border="0"{/if} id="html_order_info_total" summary="{$lng.lbl_total|escape}">

  <tr>
    <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_subtotal}:</strong></td>
    <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$order.display_subtotal}</td>
  </tr>

  {if $order.discount gt 0}
    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_discount}:</strong></td>
      <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$order.discount}</td>
    </tr>
  {/if}

  {if $order.coupon and $order.coupon_type ne "free_ship"}
    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_coupon_saving} ({$order.coupon}):</strong></td>
      <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$order.coupon_discount}</td>
    </tr>
  {/if}

  {if $order.discounted_subtotal ne $order.subtotal}
    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_discounted_subtotal}:</strong></td>
      <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$order.display_discounted_subtotal}</td>
    </tr>
  {/if}

  {if $config.Shipping.enable_shipping eq 'Y'}
    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_shipping_cost}:</strong></td>
      <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{if $order.coupon and $order.coupon_type eq "free_ship"}{currency value=0}{else}{currency value=$order.display_shipping_cost}{/if}</td>
    </tr>
  {/if}

  {if $order.need_giftwrap eq "Y"}
    {include file="modules/Gift_Registry/gift_wrapping_invoice.tpl" show=totals}
  {/if}

  {if $order.coupon and $order.coupon_type eq "free_ship"}
    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-title"{else}align="right" height="20"{/if} colspan="2"><strong>{$lng.lbl_free_ship_coupon_record|substitute:"code":$order.coupon}</strong></td>
    </tr>
  {/if}

  {if $order.applied_taxes and $order.extra.tax_info.display_taxed_order_totals ne "Y"}
    {foreach key=tax_name item=tax from=$order.applied_taxes}
      <tr>
        <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$tax.tax_display_name}{if $tax.rate_type eq "%"} {$tax.rate_value}%{/if}:</strong></td>
        <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$tax.tax_cost}</td>
      </tr>
    {/foreach}
  {/if}

  {if $order.payment_surcharge ne 0}
    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{if $order.payment_surcharge gt 0}{$lng.lbl_payment_method_surcharge}{else}{$lng.lbl_payment_method_discount}{/if}:</strong></td>
      <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$order.payment_surcharge}</td>
    </tr>
  {/if}

  {if $order.giftcert_discount gt 0}
    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_giftcert_discount}:</strong></td>
      <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$order.giftcert_discount}</td>
    </tr>
  {/if}

  <tr class="invoice-total-row">
    <td {if $is_nomail eq 'Y'}class="invoice-total-name-fin"{else}style="padding-right: 3px; height: 25px; background: #cccccc none; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_total}:</strong></td>
    <td {if $is_nomail eq 'Y'}class="invoice-total-value-fin"{else}style="white-space: nowrap; padding-right: 5px; height: 25px; background: #cccccc none; text-align: right;"{/if}><strong>{currency value=$order.total}</strong></td>
  </tr>

  {if $_userinfo.tax_exempt ne "Y"}

    {if $order.applied_taxes and $order.extra.tax_info.display_taxed_order_totals eq "Y"}
      {foreach key=tax_name item=tax from=$order.applied_taxes}
        <tr>
          <td {if $is_nomail eq 'Y'}class="invoice-total-name"{else}style="padding-right: 3px; height: 20px; width: 100%; text-align: right;"{/if}><strong>{$lng.lbl_including_tax|substitute:"tax":$tax.tax_display_name}{if $tax.rate_type eq "%"} {$tax.rate_value}%{/if}:</strong></td>
          <td {if $is_nomail eq 'Y'}class="invoice-total-value"{else}style="white-space: nowrap; padding-right: 5px; height: 20px; text-align: right;"{/if}>{currency value=$tax.tax_cost}</td>
        </tr>
      {/foreach}
    {/if}

  {else}

    <tr>
      <td {if $is_nomail eq 'Y'}class="invoice-total-title"{else}align="right" width="100%" height="20"{/if} colspan="2">{$lng.txt_tax_exemption_applied}</td>
    </tr>

  {/if}

</table>

{if $order.applied_giftcerts}
  <br />
  <p {if $is_nomail eq 'Y'}class="invoice-products-title"{else}style="font-size: 14px; font-weight: bold; text-align: center"{/if}>{$lng.lbl_applied_giftcerts}</p>

  <table cellspacing="1" {if $is_nomail eq 'Y'}class="invoice-giftcerts"{else}cellpadding="0" width="100%" border="0"{/if} summary="{$lng.lbl_gift_certificates|escape}">

    <tr>
      <th {if $is_nomail eq 'Y'}class="invoice-giftcert-id"{else}width="130" bgcolor="#cccccc"{/if}>{$lng.lbl_giftcert_ID}</th>
      <th{if $is_nomail ne 'Y'} bgcolor="#cccccc"{/if}>{$lng.lbl_giftcert_cost}</th>
    </tr>

    {foreach from=$order.applied_giftcerts item=gc}
      <tr>
        <td {if $is_nomail eq 'Y'}class="invoice-giftcert-id"{else}align="center"{/if}>{$gc.giftcert_id}</td>
        <td {if $is_nomail eq 'Y'}class="invoice-giftcert-cost"{else}style="text-align: right; white-space: nowrapl padding-right: 5px;"{/if}>{currency value=$gc.giftcert_cost}</td>
      </tr>
    {/foreach}

  </table>
{/if}

{if $order.extra.special_bonuses ne ""}
  {include file="mail/html/special_offers_order_bonuses.tpl" bonuses=$order.extra.special_bonuses}
{/if}

{if $email_to_admin}
<br /><br /><br />
{include file="modules/Anti_Fraud/extra_data.tpl" data=$order.extra.Anti_Fraud is_invoice_page=true}
{/if}

{if $order.extra.interaco ne ""}
{include file="payments/cc_bean_interaco_report.tpl"}
{/if}

{if $is_nomail ne 'Y'}
  </td>
</tr>
</table>
{/if}
