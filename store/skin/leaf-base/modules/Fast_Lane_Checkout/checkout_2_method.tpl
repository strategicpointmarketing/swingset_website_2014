{*
9801da6f17425f50e8047475e08712045e9818fd, v7 (xcart_4_6_1), 2013-08-29 12:26:36, checkout_2_method.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}

    <h1 class = "primary-color paragon-text secondary-font mbs">Shipping &amp; Payment</h1>

{load_defer file="js/popup_open.js" type="js"}
{capture name=dialog}
{if $smarty.get.err eq 'gc_not_enough_money'}
<div class="center error-message">{$lng.txt_gc_not_enough_money}</div>
{/if}

<form action="cart.php" method="post" name="cartform" id="cartform">

  <input type="hidden" name="mode" value="checkout" />
  <input type="hidden" name="cart_operation" value="cart_operation" />
  <input type="hidden" name="action" value="update" />

{assign var=modify_url value="cart.php?mode=checkout&edit_profile&paymentid=`$paymentid`"}
{if $config.Shipping.enable_shipping eq "Y"}

<div class="gd-row gt-row">
<div class="gd-half gd-columns gt-half gt-columns">
  <div class="flc-address">

    {*include file="customer/subheader.tpl" title=$lng.lbl_shipping_address*}

    <h3 class="secondary-font primer-text capitalize">Shipping address</h3>

{if $userinfo}
    <p>
{if $userinfo.default_address_fields.address}{$userinfo.s_address}<br />{/if}
{if $userinfo.default_address_fields.address_2 and $userinfo.s_address_2}
{$userinfo.s_address_2}<br />
{/if}
{if $userinfo.default_address_fields.city}{$userinfo.s_city}<br />{/if}
{if $userinfo.default_address_fields.county and $config.General.use_counties eq "Y" and $userinfo.s_county}{$userinfo.s_countyname}<br />{/if}
{if $userinfo.default_address_fields.state}{$userinfo.s_statename}<br />{/if}
{if $userinfo.default_address_fields.country}{$userinfo.s_countryname}<br />{/if}
{if $userinfo.default_address_fields.zipcode}{include file="main/zipcode.tpl" val=$userinfo.s_zipcode zip4=$userinfo.s_zip4 static=true}{/if}
</p>
{foreach from=$userinfo.additional_fields item=v}
{if $v.section eq 'B' and $v.value.S ne ''}
<br />{$v.title}: {$v.value.S}
{/if}
{/foreach}

{else}
No data
{/if}

{*
{if $userinfo ne ""}
<div class="text-pre-block">
  {if $login ne ''}
    {assign var=modify_url value="javascript: popupOpen('popup_address.php?mode=select&amp;for=cart&amp;type=S');"}
    {assign var=link_href value="popup_address.php?mode=select&for=cart&type=S"}
  {/if}
  {include file="customer/buttons/modify.tpl" href=$modify_url link_href=$link_href|default:$modify_url style="link"}
</div>
{/if}*}

  </div>
  <div class="flc-checkout-options">

    {*include file="customer/subheader.tpl" title=$lng.lbl_delivery*}

    <h3 class="secondary-font primer-text capitalize">Delivery Method</h3>
    {include file="customer/main/checkout_shipping_methods.tpl"}

  </div>

  <div class="clearing"></div>

</div>

{if $display_ups_trademarks and $current_carrier eq "UPS"}
{include file="modules/UPS_OnLine_Tools/ups_notice.tpl"}
{/if}

{/if}

  <div class="gd-half gd-columns gt-half gt-columns">
    <div class="flc-address">

      {*include file="customer/subheader.tpl" title=$lng.lbl_billing_address*}
      <h3 class="secondary-font primer-text capitalize">Billing Address</h3>

{if $userinfo ne ''}
<p>
{if $userinfo.default_address_fields.address}{$userinfo.b_address}<br />{/if}
{if $userinfo.default_address_fields.address_2 and $userinfo.b_address_2}
{$userinfo.b_address_2}<br />
{/if}
{if $userinfo.default_address_fields.city}{$userinfo.b_city}<br />{/if}
{if $userinfo.default_address_fields.county and $config.General.use_counties eq "Y" and $userinfo.b_county}{$userinfo.b_countyname}<br />{/if}
{if $userinfo.default_address_fields.state}{$userinfo.b_statename}<br />{/if}
{if $userinfo.default_address_fields.country}{$userinfo.b_countryname}<br />{/if}
{if $userinfo.default_address_fields.zipcode}{include file="main/zipcode.tpl" val=$userinfo.b_zipcode zip4=$userinfo.b_zip4 static=true}{/if}
</p>
{foreach from=$userinfo.additional_fields item=v}
{if $v.section eq 'B' and $v.value.B ne ''}
<br />{$v.title}: {$v.value.B}
{/if}
{/foreach}

{else} 

No data 

{/if} 

        {*
{if $userinfo}

{if $login ne ''}
  {assign var=modify_url value="javascript: popupOpen('popup_address.php?mode=select&amp;for=cart&amp;type=B');"}
  {assign var=link_href value="popup_address.php?mode=select&for=cart&type=B"}
{/if}
{include file="customer/buttons/modify.tpl" href=$modify_url link_href=$link_href|default:$modify_url style="link"}
{/if}
*}

    </div>
    <div class="flc-checkout-options">

      {*include file="customer/subheader.tpl" title=$lng.lbl_payment_method*}
      <h3 class="secondary-font primer-text capitalize">Payment Method</h3>
      {include file="customer/main/checkout_payment_methods.tpl"}

    </div>



  </div>



    <div class="gd-half gd-columns gt-half gt-columns mts">
      {include file="customer/buttons/continue.tpl" type="input" additional_button_class="main-button"}
    </div>

</div>
</form>

{/capture}
{include file="customer/dialog.tpl" title=$lng.lbl_shipping_and_payment content=$smarty.capture.dialog noborder=true}
