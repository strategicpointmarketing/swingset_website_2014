{*
a811b0939b8cb91e1bf67dadfe84826a7a67ff59, v3 (xcart_4_4_4), 2011-07-15 14:32:46, change_password.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}

<h1 class="primary-color paragon-text secondary-font mbs mtn capitalize">{$lng.lbl_chpass}</h1>

{include file="check_password_script.tpl"}

{capture name=dialog}
  <form action="change_password.php{if $password_reset_key ne ''}?password_reset_key={$password_reset_key}&amp;user={$userid}{/if}" method="post" name="change_password"{if $config.Security.use_complex_pwd eq 'Y'} onsubmit="javascript: return checkPasswordStrength(document.change_password.new_password, document.change_password.confirm_password);"{/if}>

    <p class="secondary-font"><span class="semibold">{$login_field_name}:</span>&nbsp;{$username}</p><input type="hidden" name="user" value="{$userid}" />

    <ul class="gd-row gt-row unstyled">
      {if $mode ne 'recover_password'}
        <li class="gd-half gd-columns gt-half gt-columns mtxs">
          <label class="form-label" for="old_password">{$lng.lbl_old_password}<span class="data-required">*</span></label>
          <input class="form-input" type="password" size="30" name="old_password" id="old_password" value="{$old_password}" />
        </li>
      {/if}

        <li class="gd-half gd-columns gt-half gt-columns mtxs">
           <label class="form-label" for="new_password">{$lng.lbl_new_password} <span class="data-required">*</span></label>
           <input class="form-input gd-10of12 gt-8of9 gm-full" type="password" size="30" name="new_password" id="new_password" value="{$new_password}"{if $config.Security.use_complex_pwd eq 'Y'} onblur="javascript: $('#passwd_note').hide();" onfocus="showNote('passwd_note', this);"{/if} />
          {if $config.Security.use_complex_pwd eq 'Y'}<div id="passwd_note" class="note-box" style="display: none; width: 200px;">{$lng.txt_password_strength}</div>{/if}
        </li>

        <li class="gd-half gd-columns gt-half gt-columns mtxs">
            <label class="form-label" for="confirm_password">{$lng.lbl_confirm_password}<span class="data-required">*</span></label>
            <input class="form-input gd-10of12 gt-8of9 gm-full" type="password" size="30" name="confirm_password" id="confirm_password" value="{$confirm_password}"{if $config.Security.use_complex_pwd eq 'Y'} onblur="javascript: $('#passwd_note').hide();" onfocus="showNote('passwd_note', this.form.elements.namedItem('new_password'));"{/if} />
        </li>





    </ul>
        <div class="mvs">{include file="customer/buttons/submit.tpl" type="input"}</div>
  </form>

  {if $config.Security.check_old_passwords eq 'Y'}
  <div>
    {$lng.txt_ch_oldpass_info}
  </div>
  {/if}

{/capture}
{include file="customer/dialog.tpl" title=$lng.lbl_chpass content=$smarty.capture.dialog noborder=true}
