{*
e29d845740cfab5b0da2599ff007d046b97b676c, v2 (xcart_4_6_2), 2014-01-09 10:03:17, register_address_info.tpl, random 
vim: set ts=2 sw=2 sts=2 et:
*}
<!-- Begin skin/leaf-base/customer/main/register_address_info.tpl -->
{if $need_address_info}

  {if $hide_header eq ''}
    <tr>
      <td colspan="3" class="register-section-title">
        <div><h3 class = "primer-text secondary-font black capitalize mbs">Billing Address</h3></div>
      </td>
    </tr>
  {/if}
  {include file="customer/main/register_address_fields.tpl" default_fields=$address_fields address=$userinfo.address.B id_prefix='b_' name_prefix="address_book[B]" zip_section="billing" update_address_book='Y' address_type='B' personal_firstname=$userinfo.personal_firstname personal_lastname=$userinfo.personal_lastname}

  {if $config.Shipping.need_shipping_section eq 'Y'}

    {if $hide_header eq ''}

        <td class="register-section-title register-exp-section{if not $ship2diff} register-sec-minimized{/if}" colspan="3">
          <div class="new-line mtxs mbm">

            <input class="inline-block" type="checkbox" id="ship2diff" name="ship2diff" value="Y"{if $ship2diff} checked="checked"{/if} />
              <label class="pointer secondary-font" for="ship2diff">{$lng.lbl_ship_to_different_address}</label>
          </div>
        </td>

    {/if}

    </tbody>

    <tbody id="ship2diff_box">

    {include file="customer/main/register_address_fields.tpl" default_fields=$address_fields address=$userinfo.address.S id_prefix='s_' name_prefix="address_book[S]" zip_section="shipping" update_address_book='Y' address_type='S' personal_firstname=$userinfo.personal_firstname personal_lastname=$userinfo.personal_lastname}

    </tbody>
    <tbody>

  {/if}
{/if}

<!-- End skin/leaf-base/customer/main/register_address_info.tpl -->
