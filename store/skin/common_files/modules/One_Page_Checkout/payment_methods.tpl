{*
c4876f0dc3c1be77d432d7277a473c36b8ae058c, v16 (xcart_4_6_1), 2013-09-07 11:40:24, payment_methods.tpl, random 
vim: set ts=2 sw=2 sts=2 et:
*}
{if $paypal_express_selected}
  {count assign="payment_methods_count" value=$payment_methods print=false}
  {if $payment_methods_count gt 1}
    <div class="paypal-express-sel-note">
      {$lng.txt_opc_paypal_ex_init_note}
      <br /><br />
      <div align="right">
        <input type="hidden" name="paymentid" value="{$paypal_expressid}" />
        <a href="javascript:void(0);" class="paypal-express-remove">{$lng.lbl_change}</a>
      </div>
    </div>
  {/if}
{/if}

<table cellspacing="0" class="checkout-payments" summary="{$lng.lbl_payment_methods|escape}">

{foreach from=$payment_methods item=payment name=pm}

  <tr{if $payment.is_cod eq "Y"} id="cod_tr{$payment.paymentid}"{/if}{if $payment.processor eq 'ps_paypal_bml.php'} class="paypal-bml-method"{/if}>
    <td>
      <input type="radio" name="paymentid" id="pm{$payment.paymentid}" value="{$payment.paymentid}"{if $payment.is_default eq "1" or $paymentid eq $payment.paymentid} checked="checked"{/if} />
    </td>

    
  {if $payment.processor eq "ps_paypal_pro.php"}
    <td class="checkout-payment-paypal">

      <table cellspacing="0" cellpadding="0">
        <tr>
          <td>{include file="payments/ps_paypal_pro_express_checkout.tpl" paypal_express_link="logo"}</td>
          <td><label for="pm{$payment.paymentid}">{include file="payments/ps_paypal_pro_express_checkout.tpl" paypal_express_link="text"}</label></td>
        </tr>
      </table>

    </td>
  {elseif $payment.processor eq "ps_paypal_bml.php"}
    <td class="checkout-payment-paypal">

      <table cellspacing="0" cellpadding="0">
        <tr>
          <td><label for="pm{$payment.paymentid}">{include file="payments/ps_paypal_bml_button.tpl" paypal_link="logo"}</label></td>
          <td class="terms"><label for="pm{$payment.paymentid}">{include file="payments/ps_paypal_bml_button.tpl" paypal_link="text"}</label></td>
        </tr>
      </table>

    </td>
  {elseif $payment.processor eq "cc_bean_interaco.php"}
    <td class="checkout-payment-name">

      <table cellspacing="0" cellpadding="0">
        <tr>
          <td style="text-align: center;">
            <img src="https://beanstreamsupport.pbworks.com/f/interac_logo.jpg" alt="INTERAC Online service" height="50" /><br />
            <a href="http://www.interaconline.com/learn/" style="font-size: 9px;">{$lng.lbl_cc_beani_learn_more}</a>
          </td>
          <td>
            <label for="pm{$payment.paymentid}">INTERACO<sup>&reg;</sup> Online</label>
            <div class="checkout-payment-descr" style="padding-top: 3px;">
              {$payment.payment_details}
            </div>
          </td>
        </tr>
      </table>
      
      <div class="checkout-payment-descr">
         <span style="font-size: 10px;">
          <sup>&reg;</sup> {$lng.lbl_beani_trademark}
        </span>
 
        {if $payment.background eq "I"}
          <noscript><font class="error-message">{$lng.txt_payment_js_required_warn}</font></noscript>
        {/if}
      </div>
    </td>
  {else}
    <td class="checkout-payment-name">
      <label for="pm{$payment.paymentid}">{$payment.payment_method}
        {if $payment.paymentid eq 14 and $cart.giftcert_discount gt 0}
          <span class="applied-gc">({currency value=$cart.giftcert_discount} {$lng.lbl_applied})</span>
        {/if}
      </label>
      {if $active_modules.Klarna_Payments}
        {include file="modules/Klarna_Payments/opc_payment_methods_logo.tpl"}
      {/if}
      <div class="checkout-payment-descr">
        {$payment.payment_details}
        {if $payment.processor eq "cc_mbookers_wlt.php"}
          {include file="payments/mbookers_checkout_logo.tpl"}
        {/if}
  
        {if $payment.background eq "I"}
          <noscript><font class="error-message">{$lng.txt_payment_js_required_warn}</font></noscript>
        {/if}
      </div>
      {if $active_modules.Klarna_Payments}
        {include file="modules/Klarna_Payments/opc_payment_methods_conditions.tpl"}
      {/if}
    </td>

  {/if}
  </tr>

{capture name="pt" assign=ptpl}{include file=$payment.payment_template payment_cc_data=$payment}{/capture}
<tr class="payment-details{if $ptpl eq '' or ($payment.paymentid eq 14 and $cart.total_cost eq 0)} hidden{/if}" id="pmbox_{$payment.paymentid}"{if $payment.is_default neq "1" and $paymentid neq $payment.paymentid} style="display:none"{/if}>
  <td colspan="3">
    <div class="opc-payment-options">
    <fieldset class="registerform">{$ptpl|trim}</fieldset>
  </div>
  </td>
</tr>

{/foreach}
 
</table>
