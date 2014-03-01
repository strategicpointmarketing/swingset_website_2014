{*
9476728b1caf2570accd8112cd087e3bf603e8b2, v6 (xcart_4_5_5), 2012-11-16 18:33:54, ps_paypal_pro.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
<table class="paypal-method-settings">

  {if $xpc_dp_processors and $xpc_dp_processors.pro}
    {include file="modules/XPayments_Connector/paypal_section.tpl" xpc_data=$xpc_dp_processors.pro}
  {/if}

  <tr{if not ($xpc_dp_processors and $xpc_dp_processors.pro)} class="first"{/if}>
    <td class="setting-name">{$lng.lbl_paypal_api_access_username}:</td>
    <td><input type="text" name="{$conf_prefix}[param01]" size="42" value="{$module_data.param01|escape}" /></td>
  </tr>

  <tr>
    <td class="setting-name">{$lng.lbl_paypal_api_access_password}:</td>
    <td><input type="password" name="{$conf_prefix}[param02]" size="42" value="{$module_data.param02|escape}" /></td>
  </tr>

  <tr>
    <td valign="top">{$lng.lbl_paypal_api_use_method}:</td>
    <td>
      <table>
        <tr>
          <td><input type="radio" id="APISP" name="{$conf_prefix}[param07]" value="S"{if $module_data.param07 ne 'C'} checked="checked"{/if} /></td>
          <td><label for="APISP">{$lng.lbl_paypal_api_signature_type}</label></td>
        </tr>
        <tr>
          <td><input type="radio" id="APICP" name="{$conf_prefix}[param07]" value="C"{if $module_data.param07 eq 'C'} checked="checked"{/if} /></td>
          <td><label for="APICP">{$lng.lbl_paypal_api_certificate_type}</label></td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td class="setting-name">{$lng.lbl_paypal_api_certificate_file}:</td>
    <td>
      xcart_dir/payment/certs/<input type="text" name="{$conf_prefix}[param04]" size="42" value="{$module_data.param04|escape}" />
    </td>
  </tr>

  <tr>
    <td class="setting-name">{$lng.lbl_paypal_api_access_signature}:</td>
    <td><input type="text" name="{$conf_prefix}[param05]" size="70" value="{$module_data.param05|escape}" /></td>
  </tr>

  <tr>
    <td class="setting-name">{$lng.lbl_cc_currency}:</td>
    <td>
      <select name="{$conf_prefix}[param03]">
        <option value="AUD"{if $module_data.param03 eq "AUD"} selected="selected"{/if}>Australian Dollar</option>
        <option value="BRL"{if $module_data.param03 eq "BRL"} selected="selected"{/if}>Brazilian Real</option>
        <option value="CAD"{if $module_data.param03 eq "CAD"} selected="selected"{/if}>Canadian Dollar</option>
        <option value="CHF"{if $module_data.param03 eq "CHF"} selected="selected"{/if}>Swiss Franc</option>
        <option value="CZK"{if $module_data.param03 eq "CZK"} selected="selected"{/if}>Czech Koruna</option>
        <option value="DKK"{if $module_data.param03 eq "DKK"} selected="selected"{/if}>Danish Krone</option>
        <option value="EUR"{if $module_data.param03 eq "EUR"} selected="selected"{/if}>Euro</option>
        <option value="GBP"{if $module_data.param03 eq "GBP"} selected="selected"{/if}>Pound Sterling</option>
        <option value="HKD"{if $module_data.param03 eq "HKD"} selected="selected"{/if}>Hong Kong Dollar</option>
        <option value="HUF"{if $module_data.param03 eq "HUF"} selected="selected"{/if}>Hungarian Forint</option>
        <option value="ILS"{if $module_data.param03 eq "ILS"} selected="selected"{/if}>Israeli New Sheqel</option>
        <option value="JPY"{if $module_data.param03 eq "JPY"} selected="selected"{/if}>Japanese Yen</option>
        <option value="MYR"{if $module_data.param03 eq "MYR"} selected="selected"{/if}>Malaysian Ringgit</option>
        <option value="MXN"{if $module_data.param03 eq "MXN"} selected="selected"{/if}>Mexican Peso</option>
        <option value="NOK"{if $module_data.param03 eq "NOK"} selected="selected"{/if}>Norwegian Krone</option>
        <option value="NZD"{if $module_data.param03 eq "NZD"} selected="selected"{/if}>New Zealand Dollar</option>
        <option value="PHP"{if $module_data.param03 eq "PHP"} selected="selected"{/if}>Philippine Peso</option>
        <option value="PLN"{if $module_data.param03 eq "PLN"} selected="selected"{/if}>Polish Zloty</option>
        <option value="SEK"{if $module_data.param03 eq "SEK"} selected="selected"{/if}>Swedish Krona</option>
        <option value="SGD"{if $module_data.param03 eq "SGD"} selected="selected"{/if}>Singapore Dollar</option>
        <option value="TWD"{if $module_data.param03 eq "TWD"} selected="selected"{/if}>Taiwan New Dollar</option>
        <option value="THB"{if $module_data.param03 eq "THB"} selected="selected"{/if}>Thai Baht</option>
        <option value="USD"{if $module_data.param03 eq "USD"} selected="selected"{/if}>U.S. Dollar</option>
      </select>
    </td>
  </tr>

  <tr>
    <td class="setting-name">{$lng.lbl_cc_testlive_mode}:</td>
    <td>
      <select name="{$conf_prefix}[testmode]">
        <option value="Y"{if $module_data.testmode eq "Y"} selected="selected"{/if}>{$lng.lbl_cc_testlive_test}</option>
        <option value="N"{if $module_data.testmode eq "N"} selected="selected"{/if}>{$lng.lbl_cc_testlive_live}</option>
      </select>
    </td>
  </tr>

  <tr class="comment">
    <td>&nbsp;</td>
    <td>{$lng.lbl_paypal_test_mode_note}</td>
  </tr>

  <tr class="last">
    <td class="setting-name">{$lng.lbl_use_preauth_method}:</td>
    <td>
      <select name="{$conf_prefix}[use_preauth]">
        <option value="">{$lng.lbl_auth_and_capture_method}</option>
        <option value="Y"{if $module_data.use_preauth eq 'Y'} selected="selected"{/if}>{$lng.lbl_auth_method}</option>
      </select>
    </td>
  </tr>

  <tr class="optional header">
    <td colspan="2">{$lng.lbl_optional_settings}</td>
  </tr>

  <tr class="optional first">
    <td class="setting-name">{$lng.lbl_cc_order_prefix}:</td>
    <td>
      <input type="text" name="{$conf_prefix}[param06]" size="36" value="{$module_data.param06|escape}" />
    </td>
  </tr>

  <tr class="optional comment">
    <td>&nbsp;</td>
    <td>{$lng.txt_order_prefix_descr}</td>
  </tr>

  <tr class="optional">
    <td class="setting-name">{$lng.txt_paypal_uk_payflowcolor}:</td>
    <td>
      <input type="text" name="{$conf_prefix}[param08]" size="24" maxlength="30" value="{$module_data.param08|escape}" />
    </td>
  </tr>

  <tr class="optional comment">
    <td>&nbsp;</td>
    <td>{$lng.lbl_paypal_api_rgb_color}</td>
  </tr>

  <tr class="optional">
    <td class="setting-name">{$lng.txt_paypal_uk_header_image_url}:</td>
    <td>
      <input type="text" name="{$conf_prefix}[param09]" size="24" maxlength="127" value="{$module_data.param09|escape}" />
    </td>
  </tr>

  <tr class="optional comment last">
    <td>&nbsp;</td>
    <td>{$lng.txt_paypal_hdrimage_descr}</td>
  </tr>

</table>
