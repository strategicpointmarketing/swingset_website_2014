{*
c864285ca2f65a336bddfc6bebad1cb9be317ec4, v16 (UNKNOWN), 2014-01-27 13:43:54, login_form.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
<form action="{$authform_url}" method="post" name="authform">
    <input type="hidden" name="is_remember" value="{$is_remember}" />
    <input type="hidden" name="mode" value="login" />

    <ul class="gd-row gt-row unstyled mbs" summary="{$lng.lbl_authentication|escape}">
        <li class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="username">{$login_field_name}<span class="data-required">*</span></label>
            <input class="form-input gd-10of12 gt-8of9 gm-full" type="text" id="username" name="username"{if $config.email_as_login eq 'Y'} class="input-email"{/if} size="30" value="{#default_login#|default:$username|escape}" autofocus />
        </li>

        <li class="gd-half gd-columns gt-half gt-columns">
            <label class="form-label" for="password">{$lng.lbl_password}<span class="data-required">*</span></label>
            <input class="form-input gd-10of12 gt-8of9 gm-full" type="password" id="password" name="password" size="30" maxlength="64" value="{#default_password#}" /></td>
        </li>




        {if $active_modules.PayPalAuth}
            <li class="gd-half gd-columns gt-half gt-columns">
                <div class="ppa_login">
                    <p>{$lng.lbl_or_use}</p>
                    {include file="modules/PayPalAuth/login.tpl"}
                </div>
            </li>
        {/if}

    </ul>

    {include file="customer/buttons/submit.tpl" type="input" additional_button_class="main-button" assign="submit_button"}

    {if not $is_modal_popup and $active_modules.Image_Verification and $show_antibot.on_login eq 'Y' and $login_antibot_on and $main ne 'disabled'}

        {include file="modules/Image_Verification/spambot_arrest.tpl" mode="data-table" id=$antibot_sections.on_login button_code=$submit_button}

        {if $antibot_err}
            <li class="gd-half gd-columns gt-half gt-columns">

                <span class="error-message">{$lng.msg_err_antibot}</span>
            </li>
        {/if}

    {else}

        {$submit_button}

    {/if}


    {if not $is_modal_popup}
        <div class="mvs">
        {include file="customer/buttons/button.tpl" href="help.php?section=Password_Recovery" button_title=$lng.lbl_recover_password style="link"}
        </div>
    {else}
        <a href="help.php?section=Password_Recovery" title="{$lng.lbl_forgot_password|wm_remove|escape}" onclick="javascript: self.location='help.php?section=Password_Recovery';">{$lng.lbl_forgot_password|escape}</a>
    {/if}

</form>

