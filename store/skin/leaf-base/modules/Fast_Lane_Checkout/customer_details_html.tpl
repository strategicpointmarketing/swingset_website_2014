{*
e647c24b6f9fb71bf5d22e9ef3a1193045197b64, v4 (xcart_4_5_4), 2012-10-13 08:15:32, customer_details_html.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
{if $login eq ''}
  {assign var=modify_url value="cart.php?mode=checkout&edit_profile&paymentid=`$paymentid`"}
{/if}




  {*{include file="customer/subheader.tpl" title=$lng.lbl_contact_information class="grey"}*}
    <h3 class="black secondary-font semibold primer-text mbs">{$lng.lbl_contact_information}</h3>

  <table cellspacing="0" class="flc-checkout-address" summary="{$lng.lbl_contact_information|escape}">
  <tr class="is-hidden"><td colspan="2">&nbsp;</td></tr>

  <tr>
    <td class = "gd-half gt-half gm-half">{$lng.lbl_email}:</td>
    <td class = "gd-half gt-half gm-half">{$userinfo.email}</td>
  </tr>

{if $userinfo.default_fields.title}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_title}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.title}</td>
    </tr>
{/if}

{if $userinfo.default_fields.firstname}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_first_name}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.firstname}</td>
    </tr>
{/if}

{if $userinfo.default_fields.lastname}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_last_name}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.lastname}</td>
    </tr>
{/if}

{if $userinfo.default_fields.company}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_company}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.company}</td>
    </tr>
{/if}

{if $userinfo.default_fields.tax_number}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_tax_number}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.tax_number}</td>
    </tr>
{/if}

{if $userinfo.default_fields.phone}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_phone}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.phone}</td>
    </tr>
{/if}

{if $userinfo.default_fields.fax}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_fax}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.fax}</td>
    </tr>
{/if}

{if $userinfo.default_fields.url}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_web_site}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.url}</td>
    </tr>
{/if}

{foreach from=$userinfo.additional_fields item=v}
{if ($v.section eq 'C' or $v.section eq 'P') and $v.value ne ''}
    <tr>
      <td class = "gd-half gt-half gm-half">{$v.title}:</td>
      <td class = "gd-half gt-half gm-half">{$v.value}</td>
    </tr>
{/if}
{/foreach}

  </table>



<div class = "gd-row gt-row gm-row">
<div class="gd-half gd-columns gt-half gt-columns gm-full gm-columns">
  {*{include file="customer/subheader.tpl" title=$lng.lbl_billing_address class="grey"} *}



    <h3 class="black secondary-font semibold primer-text mbs">{$lng.lbl_billing_address}</h3>

  <table cellspacing="0" class="gd-full gt-full gm-full" summary="{$lng.lbl_billing_address|escape}">
  <tr class="is-hidden"><td colspan="2">&nbsp;</td></tr>
{if $userinfo.default_address_fields.title}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_title}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.b_title}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.firstname}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_first_name}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.b_firstname}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.lastname}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_last_name}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.b_lastname}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.address}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_address}:</td>
      <td class = "gd-half gt-half gm-half">
        {$userinfo.b_address}
{if $userinfo.b_address_2}
        <br />{$userinfo.b_address_2}
{/if}
      </td>
    </tr>
{/if}

{if $userinfo.default_address_fields.city}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_city}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.b_city}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.state}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_state}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.b_statename}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.country}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_country}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.b_countryname}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.zipcode}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_zip_code}:</td>
      <td class = "gd-half gt-half gm-half">{include file="main/zipcode.tpl" val=$userinfo.b_zipcode zip4=$userinfo.b_zip4 static=true}</td>
    </tr>
{/if}

{foreach from=$userinfo.additional_fields item=v}
{if $v.section eq 'B' and $v.value.B ne ''}
    <tr>
      <td class = "gd-half gt-half gm-half">{$v.title}:</td>
      <td class = "gd-half gt-half gm-half">{$v.value.B}</td>
    </tr>
{/if}
{/foreach}

{if $login ne ''}
    {assign var=modify_url value="javascript: popupOpen('popup_address.php?mode=select&amp;for=cart&amp;type=B');"}
    {assign var=link_href value="popup_address.php?mode=select&for=cart&type=B"}
{/if}
    {* <tr><td colspan="2">{include file="customer/buttons/modify.tpl" href=$modify_url link_href=$link_href|default:$modify_url style="link"}</td></tr> *}

  </table>
</div>



<div class="gd-half gd-columns gt-half gt-columns gm-full gm-columns">
  {*{include file="customer/subheader.tpl" title=$lng.lbl_shipping_address class="grey"} *}
    <h3 class="black secondary-font semibold primer-text mbs">{$lng.lbl_shipping_address}</h3>

  <table cellspacing="0" class="gd-full gt-full gm-full" summary="{$lng.lbl_shipping_address|escape}">
  <tr class="is-hidden"><td colspan="2">&nbsp;</td></tr>
{if $userinfo.default_address_fields.title}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_title}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.s_title}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.firstname}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_first_name}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.s_firstname}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.lastname}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_last_name}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.s_lastname}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.address}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_address}:</td>
      <td class = "gd-half gt-half gm-half">
        {$userinfo.s_address}
{if $userinfo.s_address_2}
        <br />{$userinfo.s_address_2}
{/if}
      </td>
    </tr>
{/if}

{if $userinfo.default_address_fields.city}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_city}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.s_city}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.state}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_state}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.s_statename}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.country}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_country}:</td>
      <td class = "gd-half gt-half gm-half">{$userinfo.s_countryname}</td>
    </tr>
{/if}

{if $userinfo.default_address_fields.zipcode}
    <tr>
      <td class = "gd-half gt-half gm-half">{$lng.lbl_zip_code}:</td>
      <td class = "gd-half gt-half gm-half">{include file="main/zipcode.tpl" val=$userinfo.s_zipcode zip4=$userinfo.s_zip4 static=true}</td>
    </tr>
{/if}

{foreach from=$userinfo.additional_fields item=v}
{if $v.section eq 'B' and $v.value.S ne ''}
    <tr>
      <td class = "gd-half gt-half gm-half">{$v.title}:</td>
      <td class = "gd-half gt-half gm-half">{$v.value.S}</td>
    </tr>
{/if}
{/foreach}

{if $login ne ''}
    {assign var=modify_url value="javascript: popupOpen('popup_address.php?mode=select&amp;for=cart&amp;type=S');"}
    {assign var=link_href value="popup_address.php?mode=select&for=cart&type=S"}
{/if}
    {*<tr><td colspan="2">{include file="customer/buttons/modify.tpl" href=$modify_url link_href=$link_href|default:$modify_url style="link"}</td></tr>*}

  </table>

</div>

</div>


{capture name=addfields}
{foreach from=$userinfo.additional_fields item=v}
{if $v.section eq 'A' and $v.value ne ''}
    <tr>
      <td class = "gd-half gt-half gm-half">{$v.title}:</td>
      <td class = "gd-half gt-half gm-half">{$v.value}</td>
    </tr>
{/if}
{/foreach}
{/capture}

{if $smarty.capture.addfields ne ""}


  {include file="customer/subheader.tpl" title=$lng.lbl_additional_information class="grey"}

  <table cellspacing="0" class="flc-checkout-address" summary="{$lng.lbl_additional_information|escape}">
    {$smarty.capture.addfields}
  </table>



{/if}


