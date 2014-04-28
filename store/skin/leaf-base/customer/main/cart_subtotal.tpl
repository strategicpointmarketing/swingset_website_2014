{*
71ae8da1574e2d17ed36dafb837750799af54781, v11 (xcart_4_6_0), 2013-04-05 15:51:07, cart_subtotal.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
<div class="gd-row gt-row gm-row secondary-font">
    {assign var="subtotal" value=$cart.subtotal}
    {assign var="discounted_subtotal" value=$cart.discounted_subtotal}

    <section class="totals" summary="{$lng.lbl_total|escape}" id='table_totals'>

        <div class="gd-two-thirds gd-columns gt-two-thirds gt-columns gm-two-thirds gm-columns total"><span class="capitalize">{$lng.lbl_subtotal}:</span></div>
        <div class="gd-third gd-columns gt-third gt-columns gm-third gm-columns total-value"><span class="semibold">{currency value=$cart.display_subtotal}</span></div>


        {if $cart.discount gt 0}

            <div class="gd-two-thirds gd-columns gt-two-thirds gt-columns gm-two-thirds gm-columns total-name"><span>{$lng.lbl_discount}:</span></div>
            <div class="gd-third gd-columns gt-third gt-columns gm-third gm-columns total-value"><span class="semibold">{currency value=$cart.discount}</span></div>

        {/if}

        {if $cart.coupon_discount ne 0 and $cart.coupon_type ne "free_ship"}

            <div class="gd-two-thirds gd-columns gt-two-thirds gt-columns gm-two-thirds gm-columns total-name dcoupons-clear">
                <span class="capitalize">{$lng.lbl_discount_coupon}:</span>
            </div>
            <div class="gd-third gd-columns gt-third gt-columns gm-third gm-columns total-value"><span class="semibold success-color">{currency value=$cart.coupon_discount}</span></div>

        {elseif $config.Shipping.enable_shipping eq 'Y' and $cart.coupon_type eq 'free_ship'}

            <div class="gd-two-thirds gd-columns gt-two-thirds gt-columns gm-two-thirds gm-columns total-name dcoupons-clear">
                {$lng.lbl_shipping_cost}{if $cart.coupon_discount ne 0 and $cart.coupon_type eq "free_ship"} ({$lng.lbl_discounted} <a href="cart.php?mode=unset_coupons" title="{$lng.lbl_unset_coupon|escape}">x</a>){/if}:
            </div>
            <div class="gd-third gd-columns gt-third gt-columns gm-third gm-columns total-value">{currency value=$cart.display_shipping_cost|default:$zero}</div>

        {/if}

        {if $cart.discounted_subtotal ne $cart.subtotal}



            <div class="gd-two-thirds gd-columns gt-two-thirds gt-columns gm-two-thirds gm-columns total"><div class="capitalize mts">{$lng.lbl_discounted_subtotal}:</div></div>
            <div class="gd-third gd-columns gt-third gt-columns gm-third gm-columns total-value"><div class="semibold mts">{currency value=$cart.display_discounted_subtotal}</div></div>

        {/if}

        {if $cart.taxes and $config.Taxes.display_taxed_order_totals eq "Y"}

            <tr>
                <td colspan="3" class="total-taxes">{$lng.lbl_including}:</td>
            </tr>

            {foreach key=tax_name item=tax from=$cart.taxes}
                <tr class="total-tax-line">
                    <td class="total-tax-name">{$tax.tax_display_name}:</td>
                    <td>{currency value=$tax.tax_cost_no_shipping}</td>
                    <td>{alter_currency value=$tax.tax_cost_no_shipping}</td>
                </tr>
            {/foreach}

        {/if}

        {if $cart.applied_giftcerts}
            <tr>
                <td class="total-name">{$lng.lbl_giftcert_discount}:</td>
                <td class="total-value">{currency value=$cart.giftcert_discount}</td>
                <td class="total-alt-value">{alter_currency value=$cart.giftcert_discount}</td>
            </tr>
        {/if}

        {if $active_modules.Klarna_Payments}
            {include file="modules/Klarna_Payments/monthly_cost.tpl" elementid="pp_conditions" monthly_cost=$cart.monthly_cost}</td>
        {/if}

    </section>

    {if $cart.applied_giftcerts}
        <br />
        <br />
        <div class="form-text">{$lng.lbl_applied_giftcerts}:</div>
        {foreach from=$cart.applied_giftcerts item=gc}
            <div class="dcoupons-clear">
                {$gc.giftcert_id}
                <a href="cart.php?mode=unset_gc&amp;gcid={$gc.giftcert_id}"><img src="{$ImagesDir}/spacer.gif" alt="{$lng.lbl_unset_gc|escape}" /></a>
                : <span class="total-name">{currency value=$gc.giftcert_cost}</span>
            </div>
        {/foreach}
    {/if}

    {if $not_logged_message eq "1"}
        {$lng.txt_order_total_msg}
    {/if}

</div>

<hr />

{if $active_modules.Special_Offers ne ""}
    {include file="modules/Special_Offers/customer/cart_bonuses.tpl"}
{/if}
