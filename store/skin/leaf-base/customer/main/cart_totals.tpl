{*
bcddae0cdfaf35c8170033cb4d363e59ae4c97b9, v12 (xcart_4_6_2), 2013-09-30 13:18:20, cart_totals.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
<!--Begin skin/leaf-base/customer/main/cart_totals.tpl -->

<div class="gd-full gt-full gm-full">


{if $config.Shipping.enable_shipping eq "Y"}

    {if $link_shipping eq "Y" and $cart.shippingid}

        <h3 class="black secondary-font semibold primer-text mbs">Delivery Method:

        {foreach from=$shipping item=s}

            {if $s.shippingid eq $cart.shippingid}

                {if $change_shipping_link eq "Y"}
                    <a href="cart.php?mode=checkout">{$s.shipping|trademark:"use_alt"}</a>
                {else}

                    {$s.shipping|trademark:"use_alt"}
                {/if}

                {if $s.warning ne ''}
                    <div class="error-message">{$s.warning}</div>
                {/if}

            {/if}

        {/foreach}

        </h3>

    {else}

        {if ($userinfo ne '' or $config.General.apply_default_country eq "Y" or $cart.shipping_cost gt 0) and $active_modules.UPS_OnLine_Tools and $config.Shipping.realtime_shipping eq "Y" and $config.Shipping.use_intershipper ne "Y" and $show_carriers_selector eq "Y" and $is_ups_carrier_empty ne "Y" and $is_other_carriers_empty ne "Y"}

            <div class="shipping-method">
                {$lng.lbl_shipping_carrier}:
                {include file="main/select_carrier.tpl" name="selected_carrier" onchange="javascript: document.cartform.submit();"}
            </div>

        {/if}

        {if $shipping_calc_error ne ""}
            {$shipping_calc_service} {$lng.lbl_err_shipping_calc}
            <br />
            <div class="error-message">{$shipping_calc_error}</div>
        {/if}

        {if $shipping eq "" and $need_shipping}
            <div class="error-message">{$lng.lbl_no_shipping_for_location}:</div>

            {if $userinfo ne '' or $config.General.apply_default_country eq "Y" or $cart.shipping_cost gt 0}
                {$userinfo.s_address}<br />
                {if $userinfo.s_address_2}
                    {$userinfo.s_address_2}<br />
                {/if}
                {$userinfo.s_city}<br />
                {$userinfo.s_statename}<br />
                {$userinfo.s_countryname}<br />
                {$userinfo.s_zipcode}
            {else}
                {$lng.lbl_anonymous}
            {/if}

            {if $userinfo ne ""}
                <div>
                    {include file="customer/buttons/modify.tpl" href="cart.php?mode=checkout&edit_profile"}
                </div>
            {/if}
            <div class="clearing"></div>
            <hr class="cart-total-line" />
        {/if}

        {if $shipping ne "" and $need_shipping}

            {if $arb_account_used}
                <p>{$lng.txt_arb_account_checkout_note}</p>
            {/if}

            {if $active_modules.UPS_OnLine_Tools ne "" and $config.Shipping.realtime_shipping eq "Y" and $config.Shipping.use_intershipper ne "Y" and $current_carrier eq "UPS" and $force_delivery_dropdown_box ne "Y"}

                {if $userinfo ne "" or $config.General.apply_default_country eq "Y" or $cart.shipping_cost gt 0}
                    <div class="shipping-method">

                        <table cellspacing="1" summary="{$lng.lbl_delivery|escape}">

                            <tr>
                                <th colspan="2" class="shipping-method">{$lng.lbl_delivery}:</th>
                            </tr>

                            {foreach from=$shipping item=s}
                                <tr{if $s.shippingid eq $cart.shippingid} class="selected"{/if}>
                                    <td>
                                        <input type="radio" name="shippingid" id="shipping_{$s.shippingid}" value="{$s.shippingid}"{if $s.shippingid eq $cart.shippingid} checked="checked"{else} onclick="javascript: this.form.submit();"{/if} />
                                    </td>
                                    <td>
                                        <label for="shipping_{$s.shippingid}">
                                            {$s.shipping|trademark}
                                            {if $s.shipping_time ne ""} - {$s.shipping_time}{/if}
                                            {if $config.Appearance.display_shipping_cost eq "Y" and ($userinfo ne "" or $config.General.apply_default_country eq "Y" or $cart.shipping_cost gt 0)} ({currency value=$s.rate}){/if}
                                        </label>
                                    </td>
                                </tr>
                                {if $s.shippingid eq $cart.shippingid and $s.warning ne ""}
                                    {assign var="warning" value=$s.warning}
                                {/if}

                                {if $s.warning ne ''}
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td class="shipping-warning">{$s.warning}</td>
                                    </tr>
                                {/if}

                            {/foreach}
                        </table>

                    </div>

                    {if $warning ne ""}
                        <p class="right-box error-message">{$warning}</p>
                    {/if}

                {/if}

            {else}

                <div class="shipping-method">
                    {$lng.lbl_delivery}:

                    <script type="text/javascript">
                        //<![CDATA[
                        {literal}
                        function updateShipping(s) {
                            var list = $("input[name^='productindex']", s.form);

                            list.each(function() { this.disabled = true; });

                            var url = 'cart.php?' + $(s.form).serialize();

                            list.each(function() { this.disabled = false; });

                            self.location = url;
                        }
                        {/literal}
                        //]]>
                    </script>
                    <select name="shippingid" onchange="javascript: updateShipping(this);">
                        {foreach from=$shipping item=s}
                            <option value="{$s.shippingid}"{if $s.shippingid eq $cart.shippingid} selected="selected"{/if}>
                                {$s.shipping|trademark:"use_alt"}
                                {if $config.Appearance.display_shipping_cost eq "Y" and ($userinfo ne "" or $config.General.apply_default_country eq "Y" or $cart.shipping_cost gt 0)} ({currency value=$s.rate plain_text_message=1}){/if}
                                {if $s.shipping_time ne ""} - {$s.shipping_time}{/if}
                            </option>

                            {if $s.shippingid eq $cart.shippingid and $s.warning ne ""}
                                {assign var="warning" value=$s.warning}
                            {/if}
                        {/foreach}
                    </select>

                    {if $warning ne ''}
                        <p class="right-box error-message">{$lng.lbl_note}: {$warning}</p>
                    {/if}

                </div>

            {/if}

        {elseif not $no_form_fields}
            <input type="hidden" name="shippingid" value="0" />
        {/if}

        {include file="customer/main/dhl_ext_countries.tpl" onchange=true}

    {/if}

{elseif not $no_form_fields}

    <input type="hidden" name="shippingid" value="0" />

{/if}

{assign var="subtotal" value=$cart.subtotal}
{assign var="discounted_subtotal" value=$cart.discounted_subtotal}
{assign var="shipping_cost" value=$cart.display_shipping_cost}


{*<table cellspacing="0" class="gd-full gt-full gm-full" summary="{$lng.lbl_total|escape}">*}
<section class="gd-row gt-row gm-row">

    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-name">{$lng.lbl_subtotal}:</div>
    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$cart.display_subtotal}</div>
    {* <td class="total-alt-value">{alter_currency value=$cart.display_subtotal}</td>*}


    {if $cart.discount gt 0}

        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-name">{$lng.lbl_discount}:</div>
        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$cart.discount}</div>
        {*<td class="total-alt-value">{alter_currency value=$cart.discount}</td>*}

    {/if}

    {if $cart.coupon_discount ne 0 and $cart.coupon_type ne "free_ship"}

        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns  total-name coupons-clear">
            <span>{$lng.lbl_discount_coupon}:</span>

        </div>
        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value" valign="top">{currency value=$cart.coupon_discount}</div>

    {/if}

    {if $cart.display_discounted_subtotal ne $cart.display_subtotal}

        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-name">{$lng.lbl_discounted_subtotal}:</div>
        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$cart.display_discounted_subtotal}</div>

    {/if}

    {if $config.Shipping.enable_shipping eq "Y"}

    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-name dcoupons-clear">
        {$lng.lbl_shipping_cost}{if $cart.coupon_discount ne 0 and $cart.coupon_type eq "free_ship"} ({$lng.lbl_discounted} <a href="cart.php?mode=unset_coupons" title="{$lng.lbl_unset_coupon|escape}"><img src="{$ImagesDir}/spacer.gif" alt="{$lng.lbl_unset_coupon|escape}" /></a>){/if}:
    </div>

    {if ($shipping ne '' or not $need_shipping) and $userinfo ne "" or $config.General.apply_default_country eq "Y" or $cart.shipping_cost gt 0}
    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$shipping_cost}</div>
    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-alt-value">{alter_currency value=$shipping_cost}</div>
    {else}
    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{$lng.txt_not_available_value}</td>
        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns">&nbsp;</div>

        {if ($shipping ne '' or not $need_shipping)}
            {assign var="not_logged_message" value="1"}
        {/if}

        {/if}

        {/if}

        {if $config.General.enable_gift_wrapping eq "Y" and $cart.need_giftwrap eq "Y"}
            {include file="modules/Gift_Registry/gift_wrapping_cart_contents.tpl" need_alt_currency=true}
        {/if}

        {if $cart.taxes and $config.Taxes.display_taxed_order_totals ne "Y"}
            {foreach key=tax_name item=tax from=$cart.taxes}


                <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-name">{$tax.tax_display_name}{if $tax.rate_type eq "%"} {$tax.rate_value}%{/if}:</div>
                {if $userinfo ne "" or $config.General.apply_default_country eq "Y"}
                    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$tax.tax_cost}</div>
                    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-alt-value">{alter_currency value=$tax.tax_cost}</div>
                {else}
                    <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value" colspan="2">{$lng.txt_not_available_value}</div>
                    {assign var="not_logged_message" value="1"}
                {/if}


            {/foreach}
        {/if}

        {if $cart.payment_surcharge}

            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-name">
                {if $cart.payment_surcharge gt 0}
                    {$lng.lbl_payment_method_surcharge}
                {else}
                    {$lng.lbl_payment_method_discount}
                {/if}:
            </div>
            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$cart.payment_surcharge}</div>

        {/if}

        {if $cart.applied_giftcerts}

            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-name">{$lng.lbl_giftcert_discount}:</div>
            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$cart.giftcert_discount}</div>

        {/if}


        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total">{$lng.lbl_cart_total}:</div>
        <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$cart.total_cost}</div>


        {if $paid_amount}

            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total">{$lng.lbl_paid_amount}:</div>
            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-value">{currency value=$paid_amount}</div>



            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns idk">
                {include file="customer/main/cart_transactions.tpl" transactions=$transaction_query}
            </div>

        {/if}

        {if $cart.taxes and $config.Taxes.display_taxed_order_totals eq "Y"}


            <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-taxes">{$lng.lbl_including}:</div>


            {foreach key=tax_name item=tax from=$cart.taxes}

                <div class="gd-half gd-columns gt-half gt-columns gm-half gm-columns total-tax-name">{$tax.tax_display_name}:</div>
                <div>{currency value=$tax.tax_cost}</div>

            {/foreach}

        {/if}

</section>


{if $cart.applied_giftcerts}
    <br />
    <br />
    <div class="form-text">{$lng.lbl_applied_giftcerts}:</div>

    {foreach from=$cart.applied_giftcerts item=gc}
        <div class="dcoupons-clear">
            {$gc.giftcert_id}
            <a href="cart.php?mode=unset_gc&amp;gcid={$gc.giftcert_id}{if $smarty.get.paymentid}&amp;paymentid={$smarty.get.paymentid|escape:"html"}{/if}"><img src="{$ImagesDir}/spacer.gif" alt="{$lng.lbl_unset_gc|escape}" /></a>:
        <span class="total-name">{currency value=$gc.giftcert_cost}
        </div>
    {/foreach}

{/if}

{if $not_logged_message eq "1"}
    {$lng.txt_order_total_msg}
{/if}

{if not $no_form_fields}
    <input type="hidden" name="paymentid" value="{$smarty.get.paymentid|escape:"html"}" />
    <input type="hidden" name="mode" value="{$smarty.get.mode|escape:"html"}" />
    <input type="hidden" name="action" value="update" />
{/if}

{if $display_ups_trademarks and $current_carrier eq "UPS"}
    <br />
    {include file="modules/UPS_OnLine_Tools/ups_notice.tpl"}
{/if}

</div>

{if $active_modules.Special_Offers and $cart.bonuses ne ""}
    <hr />
    {include file="modules/Special_Offers/customer/cart_bonuses.tpl"}
{/if}

<!--End skin/leaf-base/customer/main/cart_totals.tpl -->
