{*
99f49a017eeaa96cf5c4060c7785548523d6ad12, v5 (xcart_4_6_2), 2014-01-15 17:46:03, add_coupon.tpl, mixon
vim: set ts=2 sw=2 sts=2 et:
*}

{capture name=dialog}
  <p class="text-block">{$lng.txt_add_coupon_header}</p>

  <a name='check_coupon'></a>
  <form action="cart.php" name="couponform">
    <input type="hidden" name="mode" value="add_coupon" />

    <table cellspacing="0" class="data-table" summary="{$lng.lbl_redeem_discount_coupon|escape}">
      <tr>
        <td class="data-name">{$lng.lbl_coupon_code}</td>
        <td><input type="text" size="32" name="coupon" /></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td class="button-row">{include file="customer/buttons/submit.tpl" type="input"}</td>
      </tr>
    </table>

  </form>

{/capture}
{include file="customer/dialog.tpl" title=$lng.lbl_redeem_discount_coupon content=$smarty.capture.dialog additional_class='small_title'}
