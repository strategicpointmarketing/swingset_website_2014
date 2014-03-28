{*
bf15cce5059a34540b0fcbb863066b79caa54bf7, v5 (xcart_4_5_5), 2012-11-02 15:53:09, Password_Recovery.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}

<h1 class="primary-color paragon-text secondary-font mbs mtn">{$lng.lbl_forgot_password}</h1>

<p class="mbs">{$lng.txt_password_recover}</p>

{capture name=dialog}

    {if $smarty.get.section eq 'Password_Recovery_error' and $smarty.get.err_type eq 'antibot'}
        {assign var='antibot_err' value=true}
    {/if}

    <form action="help.php" method="post" name="processform">
        <input type="hidden" name="action" value="recover_password" />

        {*<label class="form-label" for="username">{$recover_field_name}<span class="data-required">*</span></label>*}
        <input class="form-input gm-full" placeholder="Enter Email" type="text" name="username" id="username" size="30" value="{$username|escape:"html"}" />
                    {if $smarty.get.section eq 'Password_Recovery_error' and not $antibot_err}
                        <div class="error-message">{$lng.txt_email_not_match|substitute:"login_field":$recover_field_name}</div>
                    {/if}


            {include file="customer/buttons/submit.tpl" type="input" assign="submit_button"}

            {if $active_modules.Image_Verification and $show_antibot.on_pwd_recovery eq 'Y'}
                {include file="modules/Image_Verification/spambot_arrest.tpl" mode="data-table" id=$antibot_sections.on_pwd_recovery antibot_err=$antibot_err button_code=$submit_button}
            {else}

                   <div class="mvs">
                       {$submit_button}
                   </div>

            {/if}

        </table>

    </form>
{/capture}
{include file="customer/dialog.tpl" title=$lng.lbl_forgot_password content=$smarty.capture.dialog noborder=true}
