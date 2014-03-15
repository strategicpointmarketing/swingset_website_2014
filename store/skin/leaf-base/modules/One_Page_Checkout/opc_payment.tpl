{*
71ae8da1574e2d17ed36dafb837750799af54781, v5 (xcart_4_6_0), 2013-04-05 15:51:07, opc_payment.tpl, random 
vim: set ts=2 sw=2 sts=2 et:
*}
<div id="opc_payment">
  <h2>{$lng.lbl_payment_method}</h2>
  {if $active_modules.Klarna_Payments}  
  <script type="text/javascript" src="{$SkinDir}/modules/Klarna_Payments/klarna_popup_address.js"></script>
  <script type="text/javascript">
    //<![CDATA[
      var klarna_user_country = '{$config.Klarna_Payments.user_country}';
        payments = [];
      {foreach from=$payment_methods item=p name=pt}
        payments[{$p.paymentid}] = {ldelim}url: '{$p.payment_script_url}', name: '{$p.payment_method|wm_remove|escape:"javascript"}', surcharge: '{$p.surcharge}{$p.surcharge_type}'{rdelim};
      {/foreach}
    {literal}
      function changeSSN(value) {
        $('#place_user_ssn').val(value);
      }

      function changePClass() {
        $('#place_selected_pclass').val($('input[name=pclass]:checked').val());
      }

      function changeGender(value) {
        $('#place_user_gender').val(value);
      }

      function changeHouseNum(value) {
        $('#place_user_house_number').val(value);
      }

      function changeHouseNumExt(value) {
        $('#place_user_house_number_ext').val(value);
      }

      function change_de_policy(value) {
        
        if (value) {
          $("input[name=de_terms]").attr('checked', 'checked');
          $('#place_de_policy').val('Y');
        } else {
          $("input[name=de_terms]").attr('checked', false);
          $('#place_de_policy').val('N');
        }
      }
    {/literal}  

    //]]>
  </script>
  {/if}
  <form action="cart.php" method="post" name="paymentform">
    <input type="hidden" name="mode" value="checkout" />
    <input type="hidden" name="cart_operation" value="cart_operation" />
    <input type="hidden" name="action" value="update" />

    <div class="opc-section-container opc-payment-options">
      {include file="customer/main/checkout_payment_methods.tpl"}
      <div class="clearing"></div>
    </div>
  </form>
</div>
