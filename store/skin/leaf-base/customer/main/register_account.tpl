{*
c864285ca2f65a336bddfc6bebad1cb9be317ec4, v5 (UNKNOWN), 2014-01-27 13:43:54, register_account.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}


<!-- Begin skin/leaf-base/customer/main/register_account.tpl -->

{if $config.Security.use_complex_pwd eq 'Y' and $userinfo.login|default:$userinfo.uname eq ''}
    {assign var='show_passwd_note' value='Y'}
{/if}

{if $hide_header eq ""}
    {*<tr>
      <td colspan="3" class="class9834">
        <div>
          <label>*}<h4 class="primer-text secondary-font black capitalize">Account Information</h4>{*</label>
        </div>
      </td>
    </tr>*}
{/if}

<ul class="gd-row gt-row unstyled mbm">

    <li class="gd-half gd-columns gt-half gt-columns">
        <label class="form-label" for="email">{$lng.lbl_email}<span class="data-required">*</span></label>
        <input class="form-input gd-10of12 gt-8of9 gm-full" type="text" id="email" name="email" class="input-required input-email" size="32" maxlength="128" value="{$userinfo.email|escape}" autocomplete="off" />
        <div id="email_note" class="note-box" style="display: none;">{$lng.txt_email_note}</div>
    </li>

    {if $anonymous and $config.General.enable_anonymous_checkout eq "Y"}
    <li class="gd-half gd-columns gt-half gt-columns">
        <label class="pointer" for="create_account">{$lng.txt_opc_create_account|substitute:"login_field":$login_field_name}</label>
        <input class="form-input gd-10of12 gt-8of9 gm-full" type="checkbox" id="create_account" name="create_account" value="Y"{if $reg_error and $userinfo.create_account} checked="checked"{/if} />
    </li>

    </tbody>
    <tbody id="create_account_box">

    <tr>
        <td colspan="3">{$lng.txt_anonymous_account_msg}</td>
    </tr>
    {/if}

    {if $userinfo.id eq $logged_userid and $logged_userid gt 0 and $userinfo.usertype ne "C"}

        <tr style="display: none;">
            <td>
                <input type="hidden" name="membershipid" value="{$userinfo.membershipid}" />
                <input type="hidden" name="pending_membershipid" value="{$userinfo.pending_membershipid}" />
            </td>
        </tr>

    {else}

        {if $config.General.membership_signup eq "Y" and ($usertype eq "C" or $is_admin_user or $usertype eq "B") and $membership_levels}
            {include file="customer/main/membership_signup.tpl"}
        {/if}

    {/if}

    {if $config.email_as_login ne 'Y'}
        <tr>
            <td class="data-name"><label for="uname">{$lng.lbl_username}</label></td>
            {if $login ne '' and $config.General.allow_change_login ne 'Y'}
            <td></td>
            <td>
                <b>{$userinfo.login|default:$userinfo.uname}</b>
                <input type="hidden" name="uname" value="{$userinfo.login|default:$userinfo.uname|escape}" />
                {else}
            <td class="data-required">*</td>
            <td>
                <input type="text" id="uname" name="uname" class="input-required" size="32" maxlength="32" value="{if $userinfo.uname}{$userinfo.uname|escape}{else}{$userinfo.login|escape}{/if}" autocomplete="off" />
                {/if}
            </td>
        </tr>
    {/if}

    {if $active_modules.XAuth eq '' || $is_from_xauth ne 'Y'}
        {if $allow_pwd_modify eq 'Y'}
            <li class="gd-half gd-columns gt-half gt-columns">
                <label class="form-label" for="passwd1">{$lng.lbl_password}<span class="data-required">*</span></label>
                <input class="form-input gd-10of12 gt-8of9 gm-full" type="password" id="passwd1" name="passwd1" class="input-required" size="32" maxlength="64" value="{$userinfo.passwd1|escape}" autocomplete="off" />
                {if $show_passwd_note eq 'Y'}<div id="passwd_note" class="note-box" style="display: none;">{$lng.txt_password_strength}</div>{/if}
            </li>

            <li class="gd-half gd-columns gt-half gt-columns">
                <label class="form-label" for="passwd2">{$lng.lbl_confirm_password}<span class="data-required">*</span></label>
                <input class="form-input gd-10of12 gt-8of9 gm-full" type="password" id="passwd2" name="passwd2" class="input-required" size="32" maxlength="64" value="{$userinfo.passwd2|escape}" autocomplete="off" />
                {*<span class="validate-mark"><img src="{$ImagesDir}/spacer.gif" width="15" height="15" alt="" /></span>*}

            </li>
        {else}
            <li class="gd-half gd-columns gt-half gt-columns">
                {*<td class="data-name">{$lng.lbl_password}</td>
                <td></td>*}
                <p>
                    <a class="form-link capitalize" href="change_password.php">{$lng.lbl_chpass}</a><br>

                    <a class="form-link capitalize" href="register.php?mode=delete">{$lng.lbl_delete_profile}</a>
                </p>
            </li>
        {/if}
    {/if}

    {if $anonymous and $config.General.enable_anonymous_checkout eq "Y"}

    {/if}

    {if $is_admin_user and $userinfo.id ne $logged_userid}

        <tr>
            <td class="data-name"><label for="status">{$lng.lbl_account_status}:</label></td>
            <td>&nbsp;</td>
            <td>

                <select name="status">
                    <option value="N"{if $userinfo.status eq "N"} selected="selected"{/if}>{$lng.lbl_account_status_suspended}</option>
                    <option value="Y"{if $userinfo.status eq "Y"} selected="selected"{/if}>{$lng.lbl_account_status_enabled}</option>
                    {if $active_modules.XAffiliate ne "" and ($userinfo.usertype eq "B" or $smarty.get.usertype eq "B")}
                        <option value="Q"{if $userinfo.status eq "Q"} selected="selected"{/if}>{$lng.lbl_account_status_not_approved}</option>
                        <option value="D"{if $userinfo.status eq "D"} selected="selected"{/if}>{$lng.lbl_account_status_declined}</option>
                    {/if}
                </select>
            </td>
        </tr>

        {if $display_activity_box eq "Y"}
            <tr>
                <td class="data-name"><label for="activity">{$lng.lbl_account_activity}:</label></td>
                <td>&nbsp;</td>
                <td>

                    <select name="activity">
                        <option value="Y"{if $userinfo.activity eq "Y"} selected="selected"{/if}>{$lng.lbl_account_activity_enabled}</option>
                        <option value="N"{if $userinfo.activity eq "N"} selected="selected"{/if}>{$lng.lbl_account_activity_disabled}</option>
                    </select>

                </td>
            </tr>
        {/if}

        <tr>
            <td colspan="2">&nbsp;</td>
            <td>

                <label>
                    <input type="checkbox" id="change_password" name="change_password" value="Y"{if $userinfo.change_password eq "Y"} checked="checked"{/if} />
                    {$lng.lbl_reg_chpass}
                </label>

            </td>
        </tr>

        {if ($userinfo.usertype eq "P" or $smarty.get.usertype eq "P") and $usertype eq "A" and $active_modules.Simple_Mode eq ""}
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>

                    <label>
                        <input type="checkbox" id="trusted_provider" name="trusted_provider" value="Y"{if $userinfo.trusted_provider eq "Y"} checked="checked"{/if} />
                        {$lng.lbl_trusted_providers}
                    </label>

                </td>
            </tr>
        {/if}

    {/if}
</ul>
<!-- End skin/leaf-base/customer/main/register_account.tpl -->

