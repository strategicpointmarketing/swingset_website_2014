{*
99f49a017eeaa96cf5c4060c7785548523d6ad12, v13 (xcart_4_6_2), 2014-01-15 17:46:03, checkout_3_place.tpl, mixon
vim: set ts=2 sw=2 sts=2 et:
*}
<h1 class="tertiary-heading canon-text mtn">Place Order</h1>

{capture name=dialog}




{include file="customer/main/cart_totals.tpl" link_shipping="Y" no_form_fields=true}

{if $active_modules.TaxCloud}
  {include file="modules/TaxCloud/cart_totals.tpl"}
{/if}




{if $cart.coupon_discount eq 0 and $products and $active_modules.Discount_Coupons}
  {include file="modules/Discount_Coupons/add_coupon.tpl" page='place_order'}
{/if}

<form action="{$payment_data.payment_script_url}" method="post" name="checkout_form" onsubmit="return window.xpc_iframe_method ? checkCheckoutFormXP() : checkCheckoutForm();">
  <input type="hidden" name="paymentid" value="{$payment_data.paymentid}" />
  <input type="hidden" name="action" value="place_order" />
  <input type="hidden" name="payment_method" value="{$payment_data.payment_method_orig}" />

    {*
  {include file="customer/subheader.tpl" title=$lng.lbl_personal_information}
    *}



    {include file="modules/Fast_Lane_Checkout/customer_details_html.tpl" paymentid=$payment_data.paymentid}

<div class = "gd-full gt-full gm-full">
  {include file="customer/subheader.tpl" title="Payment Method: `$payment_data.payment_method`"}
</div>

{*
{if $ignore_payment_method_selection eq ""}
  <div class="right-box">
    {include file="customer/buttons/button.tpl" button_title=$lng.lbl_change_payment_method href="cart.php?mode=checkout" style="link"}
  </div>
{/if}
*}

<script type="text/javascript">
//<![CDATA[
requiredFields = [];
//]]>
</script>

{include file="check_required_fields_js.tpl" use_email_validation="N"}



{if $payment_cc_data.background eq "I"}

  <noscript>
    <font class="error-message">{$lng.txt_payment_js_required_warn}</font>
    <br /><br />
  </noscript>

{elseif $payment_data.payment_template ne ""}

    {*
  {capture name=payment_template_output}
    {include file=$payment_data.payment_template hide_header="Y"}
  {/capture}
    *}

  {if $smarty.capture.payment_template_output ne ""}

    {include file="customer/subheader.tpl" title=$lng.lbl_payment_details class="grey"}



      {$smarty.capture.payment_template_output}



  {/if}

{/if}



{if $payment_cc_data.cmpi eq 'Y' and $config.CMPI.cmpi_enabled eq 'Y'}
    {include file="main/cmpi.tpl"}
{/if}

      {if $config.Appearance.show_cart_details eq "Y"}

          {include file="customer/main/cart_details.tpl" link_qty="Y"}

      {else}
          {include file="customer/main/cart_contents.tpl" link_qty="Y"}
      {/if}


      {include file="customer/main/checkout_notes.tpl"}




  {* <div class="terms_n_conditions center">
    <label for="accept_terms">
      <input type="checkbox" name="accept_terms" id="accept_terms" value="Y" />
      {$lng.txt_terms_and_conditions_note|substitute:"terms_url":"`$xcart_web_dir`/pages.php?alias=conditions":"privacy_url":"`$xcart_web_dir`/pages.php?alias=business"}
    </label>
  </div> *}

  <div class="mvl">
    <input class="inline-selector" type="checkbox" id="accept_terms" name="accept_terms" value="Y"><span class="semibold secondary-font minion-text">I accept the <a href="pages.php?alias=conditions" target = "_blank">"Terms &amp; Conditions"</a> and <a href = "pages.php?alias=business" target = "_blank">"Privacy Statement"</a>.</span>
  </div>

  {include file="modules/Fast_Lane_Checkout/checkout_js.tpl"}

  <div class="button-row center" id="btn_box">
    <div class="halign-center">
      {include file="customer/buttons/button.tpl" button_title=$lng.lbl_submit_order href=$button_href type="input" additional_button_class="main-button"}
    </div>
  </div>

  <div id='msg' style="display: none;" class="order-placed-msg">{$lng.msg_order_is_being_placed}</div>

</form>

{/capture}
{include file="customer/dialog.tpl" title=$lng.lbl_payment_details content=$smarty.capture.dialog additional_class="cart" noborder=true}
