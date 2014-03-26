{*
d0281825a4310136b7724f59461636faceeb5036, v21 (xcart_4_6_2), 2013-11-12 13:52:37, register.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}


<!--Begin skin/leaf-base/customer/main/register.tpl -->

{if $main ne 'checkout'}
  {if $login}
    <h1 class ="primary-color paragon-text secondary-font mbs">Personal Details</h1>
  {else}
    {if $anonymous and $config.General.enable_anonymous_checkout eq "Y"}
        <h1 class ="primary-color paragon-text secondary-font mbs">Personal Details</h1>
    {else}
      <h1 class ="primary-color paragon-text secondary-font mbs mtn">{$lng.lbl_create_profile}</h1>
    {/if}
  {/if}
{/if}



{if $av_error}

  {include file="modules/UPS_OnLine_Tools/register.tpl" address=$av_error.params}

{else}

  {include file="check_email_script.tpl"}
  {include file="check_password_script.tpl"}
  {include file="check_zipcode_js.tpl"}
  {include file="check_required_fields_js.tpl" fillerror=$reg_error}
  {include file="change_states_js.tpl"}

  {include file="check_registerform_fields_js.tpl"}

  <p >

    {if $newbie eq "Y" and $registered eq ""}
      {if $mode eq "update"}
        {$lng.txt_modify_profile_msg}
      {else}
        {if $anonymous and $config.General.enable_anonymous_checkout eq "Y"}
          {$lng.txt_anonymous_profile_msg}
        {else}
          {$lng.txt_create_profile_msg}
        {/if}
      {/if}
      <br />
      <br />
    {/if}
      <p>The fields marked with * are mandatory.</p>

  </p>

  {capture name=dialog}

    {if $newbie ne "Y" and $main ne "user_add" and $is_admin_user}
      <p class="right-box">
        {include file="customer/buttons/button.tpl" button_title=$lng.lbl_go_to_users_list href="users.php?mode=search"}
      </p>
    {/if}

    {if $reg_error}
      <p class="error-message">{$reg_error.errdesc}</p>
    {/if}

    {if $registered eq ""}

      <form action="{$register_script_name}?{$php_url.query_string|escape}" method="post" name="registerform" onsubmit="javascript: return checkRegFormFields(this);">
        <input type="hidden" name="usertype" value="{if $smarty.get.usertype ne ""}{$smarty.get.usertype|escape:"html"}{else}{$usertype}{/if}" />
        <input type="hidden" name="anonymous" value="{$anonymous}" />
        {if $smarty.get.mode eq "update"}
          <input type="hidden" name="mode" value="update" />
        {/if}

        {if $active_modules.XAuth}
          {include file="modules/XAuth/register_link.tpl"}
        {/if}

          <!--Still in skin/leaf-base/customer/main/register.tpl -->
        <table cellspacing="1"  summary="{$lng.lbl_register|escape}">
          <tbody>

            {include file="customer/main/register_personal_info.tpl"}

            {include file="customer/main/register_additional_info.tpl" section='A'}

            {include file="customer/main/register_address_info.tpl"}

            {include file="customer/main/register_account.tpl"}

            {if $active_modules.News_Management and $newslists}
              {include file="modules/News_Management/customer/register_newslists.tpl"}
            {/if}

            {if $active_modules.Adv_Mailchimp_Subscription and $mc_newslists}
              {include file="modules/Adv_Mailchimp_Subscription/customer/register_newslists.tpl"}
            {/if}

            {if $active_modules.Image_Verification and $show_antibot.on_registration eq 'Y' and $display_antibot}
            <tr>
              <td colspan="3">
                <div class="center">
                  {include file="modules/Image_Verification/spambot_arrest.tpl" mode="simple_column" id=$antibot_sections.on_registration antibot_err=$reg_antibot_err}
                </div>
              </td>
            </tr>
            {/if}

            {if $newbie eq "Y"}
            <tr>
              <td colspan="3" class="register-newbie-note">
                  {$lng.txt_terms_and_conditions_newbie_note|substitute:"terms_url":"`$xcart_web_dir`/pages.php?alias=conditions"}
              </td>
            </tr>
            {/if}

            <tr>

              {if $login ne "" && $main eq "register"}

                <td class="button-row"><a href="register.php?mode=delete">{$lng.lbl_delete_profile}</a></td>
                <td colspan="2" class="button-row">
                  {if $smarty.get.action eq "cart"}
                    {include file="customer/buttons/submit.tpl" type="input" additional_button_class="main-button" button_title=$lng.lbl_submit_n_checkout}
                  {else}
                    {include file="customer/buttons/submit.tpl" type="input" additional_button_class="main-button"}
                  {/if}
                </td>

              {else}

                <td colspan="3" class="button-row center">
                  <div class="center">
                    {if $smarty.get.action eq "cart"}
                      {include file="customer/buttons/submit.tpl" type="input" additional_button_class="main-button" button_title=$lng.lbl_submit_n_checkout}
                    {else}
                      {include file="customer/buttons/submit.tpl" type="input" additional_button_class="main-button"}
                    {/if}
                  </div>
                </td>

              {/if}

            </tr>

          </tbody>

        </table>




      </form>

      {if ($is_areas.S eq 'Y' or $is_areas.B eq 'Y') and $active_modules.UPS_OnLine_Tools and $av_enabled eq "Y"}
        <div class="register-ups-box">
          {include file="modules/UPS_OnLine_Tools/ups_av_notice.tpl" postoffice=1}
          {include file="modules/UPS_OnLine_Tools/ups_av_notice.tpl"}
        </div>
      {/if}

    {else}

      {if $smarty.post.mode eq "update" or $smarty.get.mode eq "update"}
        {$lng.txt_profile_modified}

      {elseif $smarty.get.usertype eq "B" or $usertype eq "B"}
        {$lng.txt_partner_created}

      {else}
        {$lng.txt_profile_created}
      {/if}

    {/if}

    {if $newbie eq 'Y'}
      {$lng.txt_newbie_registration_bottom}
    {/if}

  {/capture}
  {include file="customer/dialog.tpl" title=$lng.lbl_profile_details content=$smarty.capture.dialog noborder=true}

{/if}

<!--End skin/leaf-base/customer/main/register.tpl -->