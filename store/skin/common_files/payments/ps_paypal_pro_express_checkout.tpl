{*
3ab72301751f8e120e7f7c7ba39dc43f13c581f4, v9 (xcart_4_6_2), 2013-12-26 12:41:50, ps_paypal_pro_express_checkout.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
{if $paypal_express_link eq "logo"}

  <a href="javascript:void(0);" onclick="javascript: window.open('https://www.paypal.com/cgi-bin/webscr?cmd=xpt/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','width=400, height=350, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no');"><img src="https://www.paypal.com/en_US/i/logo/PayPal_mark_37x23.gif" alt="{$lng.lbl_paypal_alt_text|escape}" /></a>

{elseif $paypal_express_link eq "text"}

  {$lng.txt_paypal_text2}

{elseif $paypal_express_link eq "return"}

  {assign var="smarty_get_paymentid" value=$smarty.get.paymentid|escape:"html"}
  {include file="customer/buttons/button.tpl" button_title=$lng.lbl_modify href="`$current_location`/payment/ps_paypal_pro.php?mode=express&payment_id=`$smarty_get_paymentid`&do_return=1"}

{elseif $paypal_express_link eq "button"}

  <div class="paypal-cart-button">
    <div>
      {if not $std_checkout_disabled}
        <p>{$lng.lbl_or_use}</p>
      {/if}
      <form action="{$current_location}/payment/ps_paypal_pro.php" method="get" name="paypalexpressbuttonform" id="paypalexpressbuttonform">
        <input type="hidden" name="mode" value="express" />
        <input type="hidden" name="payment_id" value="{$paypal_express_active}" />
        <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" />
      </form>
    </div>
  </div>

{else}

  {capture name=paypal_express_dialog}

    <form action="{$current_location}/payment/ps_paypal_pro.php" method="get" name="paypalexpressform">
      <input type="hidden" name="mode" value="express" />
      <input type="hidden" name="payment_id" value="{$paypal_express_active}" />
      <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" class="paypal-cart-icon" />
      {$lng.txt_paypal_text1}
    </form>

  {/capture}
  {include file="customer/dialog.tpl" title=$lng.lbl_checkout_with_paypal_express content=$smarty.capture.paypal_express_dialog}

{/if}
