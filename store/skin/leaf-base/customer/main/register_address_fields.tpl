{*
e29d845740cfab5b0da2599ff007d046b97b676c, v1 (xcart_4_6_2), 2014-01-09 10:03:17, register_address_fields.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}

<!-- Begin skin/leaf-base/customer/main/register_address_fields.tpl -->

<section class="gd-row gt-row">
    {assign var=use_default_addr value=$config.General.apply_default_country|replace:"N":""}
    {if $default_fields.title.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}title">{$lng.lbl_title}</label>
            <span{if $default_fields.title.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            {include file="main/title_selector.tpl" val=$address.titleid id="`$id_prefix`title" name="`$name_prefix`[title]"}

        </div>
    {/if}

    {if $default_fields.firstname.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}firstname">First Name</label>
            <span{if $default_fields.firstname.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            <input class="form-input gd-full gt-full gm-full" type="text" id="{$id_prefix}firstname" name="{$name_prefix}[firstname]" size="32" maxlength="128" value="{$address.firstname|default:$personal_firstname|escape}" />
        </div>

    {/if}

    {if $default_fields.lastname.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}lastname">Last Name</label>
            <span{if $default_fields.lastname.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            <input class="form-input gd-full gt-full gm-full" type="text" id="{$id_prefix}lastname" name="{$name_prefix}[lastname]" size="32" maxlength="128" value="{$address.lastname|default:$personal_lastname|escape}" />
        </div>

    {/if}

    {if $default_fields.address.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}address">Address</label>
            <span{if $default_fields.address.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            <input class="form-input gd-full gt-full gm-full" type="text" id="{$id_prefix}address" name="{$name_prefix}[address]" size="32" maxlength="255" value="{$address.address|escape}" />
        </div>

    {/if}

    {if $default_fields.address_2.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}address_2">Address (Line 2)</label>
            <span{if $default_fields.address_2.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            <input class="form-input gd-full gt-full gm-full" type="text" id="{$id_prefix}address_2" name="{$name_prefix}[address_2]" size="32" maxlength="128" value="{$address.address_2|escape}" />
        </div>

    {/if}

    {if $default_fields.country.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
        <label class="form-label" for="{$id_prefix}country">Country</label>
        <span{if $default_fields.country.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

    <select class="gd-full gt-full gm-full mvxs" name="{$name_prefix}[country]" id="{$id_prefix}country" onchange="check_zip_code_field(this, $('#{$id_prefix}zipcode').get(0))">
        {foreach from=$countries item=c}
            </div>    <option value="{$c.country_code}"{if $address.country eq $c.country_code or ($c.country_code eq $config.General.default_country and $address.country eq "")} selected="selected"{/if}>{$c.country|amp}</option>
        {/foreach}
        </select>
        </div>


    {/if}

    {if $default_fields.state.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}state">State</label>
            <span{if $default_fields.state.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            {include file="main/states.tpl" states=$states name="`$name_prefix`[state]" default=$address.state|default:$config.General.default_state default_country=$address.country|default:$config.General.default_country id="`$id_prefix`state" country_name="`$id_prefix`country"}
        </div>

    {/if}

    {if $default_fields.county.avail eq 'Y' and $config.General.use_counties eq "Y"}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}county">County</label>
            <span{if $default_fields.county.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            {include file="main/counties.tpl" counties=$counties name="`$name_prefix`[county]" id="`$id_prefix`county" default=$address.county country_name="`$id_prefix`country"}

        </div>
    {/if}

    {if $default_fields.city.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}city">City</label>
            <span{if $default_fields.city.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            <input class="form-input gd-full gt-full gm-full" type="text" id="{$id_prefix}city" name="{$name_prefix}[city]" size="32" maxlength="64" value="{$address.city|default_cond:$config.General.default_city:$use_default_addr|escape}" />
        </div>

    {/if}

    {if $default_fields.state.avail eq 'Y' and $default_fields.country.avail eq 'Y'}
        <div style="display: none;">
      <span{if $default_fields.state.required eq 'Y'} class="data-required"{/if}>
        {include file="main/register_states.tpl" state_name="`$name_prefix`[state]" country_name="`$id_prefix`country" county_name="`$name_prefix`[county]" state_value=$address.state|default:$config.General.default_state county_value=$address.county}
        </div>


    {/if}

    {if $default_fields.zipcode.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}zipcode">Zip/Postal Code</label>
            <span{if $default_fields.zipcode.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            {include file="main/zipcode.tpl" zip_section=$zip_section name="`$name_prefix`[zipcode]" id="`$id_prefix`zipcode" val=$address.zipcode|default_cond:$config.General.default_zipcode:$use_default_addr zip4=$address.zip4}
        </div>

    {/if}

    {if $default_fields.phone.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}phone">Phone</label>
            <span{if $default_fields.phone.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            <input class="form-input gd-full gt-full gm-full" type="text" id="{$id_prefix}phone" name="{$name_prefix}[phone]" size="32" maxlength="32" value="{$address.phone|escape}" />

        </div>
    {/if}

    {if $default_fields.fax.avail eq 'Y'}
        <div class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="{$id_prefix}fax">Fax</label>
            <span{if $default_fields.fax.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

            <input class="form-input gd-full gt-full gm-full" type="text" id="{$id_prefix}fax" name="{$name_prefix}[fax]" size="32" maxlength="32" value="{$address.fax|escape}" />

        </div>
    {/if}

    {if $additional_fields ne ''}

        {foreach from=$additional_fields item=v}

            {if $v.section eq 'B' and $v.avail eq 'Y'}


                class="data-name"><label class="form-label" for="additional_values{if $address_type ne ''}_{$address_type}{/if}_{$v.fieldid}">{$v.title}</label>
                {if $v.required eq 'Y'} class="data-required">*{else}>&nbsp;{/if}</span>

                {if $v.type eq 'T'}
                    <input class="form-input gd-full gt-full gm-full" type="text" name="additional_values[{$v.fieldid}]{if $address_type ne ''}[{$address_type}]{/if}" id="additional_values{if $address_type ne ''}_{$address_type}{/if}_{$v.fieldid}" size="32" value="{if $address_type ne ''}{$v.value.$address_type|escape}{else}{$v.value|escape}{/if}" />

                {elseif $v.type eq 'C'}
                    <input class="form-input gd-full gt-full gm-full" type="checkbox" name="additional_values[{$v.fieldid}]{if $address_type ne ''}[{$address_type}]{/if}" id="additional_values{if $address_type ne ''}_{$address_type}{/if}_{$v.fieldid}" value="Y"{if ($address_type ne '' and $v.value.$address_type eq 'Y') or ($v.value eq 'Y')} checked="checked"{/if} />

                {elseif $v.type eq 'S'}
                    <select name="additional_values[{$v.fieldid}]{if $address_type ne ''}[{$address_type}]{/if}" id="additional_values{if $address_type ne ''}_{$address_type}{/if}_{$v.fieldid}">
                        {foreach from=$v.variants item=o}
                            <option value='{$o|escape}'{if ($address_type ne '' and $v.value.$address_type eq $o) or ($v.value eq $o)} selected="selected"{/if}>{$o|escape}</option>
                        {/foreach}
                    </select>

                {/if}



            {/if}

        {/foreach}

    {/if}
</section>

{if $update_address_book eq 'Y' and $login ne ''}
    <div>
        {include file="modules/One_Page_Checkout/profile/address_book_link.tpl" type=$address_type change_mode='Y' addressid=`$address.id` hide_address_book_link='Y'}
        <input class="form-input gd-full gt-full gm-full" type="hidden" id="{$id_prefix}id" name="{$name_prefix}[id]" size="32" maxlength="32" value="{$address.id|escape}" />
    </div>

{/if}

<!-- End skin/leaf-base/customer/main/register_address_fields.tpl -->

