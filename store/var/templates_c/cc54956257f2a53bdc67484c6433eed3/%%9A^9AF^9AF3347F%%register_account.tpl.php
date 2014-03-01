<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:54
         compiled from main/register_account.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'main/register_account.tpl', 15, false),array('modifier', 'default', 'main/register_account.tpl', 51, false),)), $this); ?>
<?php func_load_lang($this, "main/register_account.tpl","lbl_account_information,lbl_email,txt_email_note,lbl_username,lbl_password,lbl_keep_pass_unchanged,txt_password_strength,lbl_confirm_password,lbl_password,lbl_chpass,lbl_account_status,lbl_account_status_suspended,lbl_account_status_enabled,lbl_account_status_not_approved,lbl_account_status_declined,lbl_account_activity,lbl_account_activity_enabled,lbl_account_activity_disabled,lbl_reg_chpass,lbl_trusted_providers"); ?><?php if ($this->_tpl_vars['hide_header'] == ""): ?>
<tr>
<td colspan="3" class="RegSectionTitle"><?php echo $this->_tpl_vars['lng']['lbl_account_information']; ?>
<hr size="1" noshade="noshade" /></td>
</tr>
<?php endif; ?>

<tr>
<td class="data-name" align="right"><label for="email"><?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
</label></td>
<td class="data-required">*</td>
<td nowrap="nowrap">
<input type="text" id="email" name="email" size="32" class="input-email" maxlength="128" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onblur="javascript: $('#email_note').hide();" onfocus="javascript: showNote('email_note', this);" />
<div id="email_note" class="NoteBox" style="display: none;"><?php echo $this->_tpl_vars['lng']['txt_email_note']; ?>
<br /></div>
</td>
</tr>

<?php if ($this->_tpl_vars['userinfo']['id'] == $this->_tpl_vars['logged_userid'] && $this->_tpl_vars['logged_userid'] > 0 && $this->_tpl_vars['userinfo']['usertype'] != 'C'): ?>


<tr style="display: none;">
<td>
<input type="hidden" name="membershipid" value="<?php echo $this->_tpl_vars['userinfo']['membershipid']; ?>
" />
<input type="hidden" name="pending_membershipid" value="<?php echo $this->_tpl_vars['userinfo']['pending_membershipid']; ?>
" />
</td>
</tr>

<?php else: ?>

<?php if ($this->_tpl_vars['config']['General']['membership_signup'] == 'Y' && ( $this->_tpl_vars['usertype'] == 'C' || $this->_tpl_vars['is_admin_user'] || $this->_tpl_vars['usertype'] == 'B' ) && $this->_tpl_vars['membership_levels']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/main/membership_signup.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['usertype'] == 'A' || ( $this->_tpl_vars['usertype'] == 'P' && $this->_tpl_vars['active_modules']['Simple_Mode'] != "" ) && $this->_tpl_vars['membership_levels']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/main/membership.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>


<?php endif; ?>

<?php if ($this->_tpl_vars['config']['email_as_login'] != 'Y'): ?>
<tr>
<td align="right" class="data-name"><label for="uname"><?php echo $this->_tpl_vars['lng']['lbl_username']; ?>
</label></td>
<?php if ($this->_tpl_vars['userinfo']['login'] != '' && $this->_tpl_vars['config']['General']['allow_change_login'] != 'Y'): ?>
<td></td>
<td nowrap="nowrap">
<b><?php echo ((is_array($_tmp=@$this->_tpl_vars['userinfo']['login'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['userinfo']['uname']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['userinfo']['uname'])); ?>
</b>
<input type="hidden" name="uname" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['userinfo']['login'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['userinfo']['uname']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['userinfo']['uname'])); ?>
" />
<?php else: ?>
<td class="data-required">*</td>
<td nowrap="nowrap">
<input type="text" id="uname" name="uname" size="32" maxlength="128" value="<?php if ($this->_tpl_vars['userinfo']['uname']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['uname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" />
<?php endif; ?>
</td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['allow_pwd_modify'] == 'Y'): ?>
<tr style="display:none;"><td><input type="hidden" name="password_is_modified" value="N" /></td></tr>
<tr>
<td align="right" class="data-name"><label for="passwd1"><?php echo $this->_tpl_vars['lng']['lbl_password']; ?>
</label></td>
<?php if ($this->_tpl_vars['is_admin_user'] && $this->_tpl_vars['main'] != 'user_add'): ?>
<td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/tooltip_js.tpl", 'smarty_include_vars' => array('type' => 'img','id' => 'keep_it_unchanged','text' => $this->_tpl_vars['lng']['lbl_keep_pass_unchanged'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
<?php else: ?>
<td class="data-required">*</td>
<?php endif; ?>
<td nowrap="nowrap"><input type="password" id="passwd1" name="passwd1" size="32" maxlength="64" value="" onchange="javascript: this.form.elements.namedItem('password_is_modified').value = 'Y';"<?php if ($this->_tpl_vars['config']['Security']['use_complex_pwd'] == 'Y'): ?>  onblur="javascript: $('#passwd_note').hide();" onfocus="javascript: showNote('passwd_note', this);"<?php endif; ?> autocomplete="off" />
<?php if ($this->_tpl_vars['config']['Security']['use_complex_pwd'] == 'Y'): ?><div id="passwd_note" class="NoteBox" style="display: none;"><?php echo $this->_tpl_vars['lng']['txt_password_strength']; ?>
<br /></div><?php endif; ?>
</td>
</tr>

<tr>
<td align="right" class="data-name"><label for="passwd2"><?php echo $this->_tpl_vars['lng']['lbl_confirm_password']; ?>
</label></td>
<?php if ($this->_tpl_vars['is_admin_user'] && $this->_tpl_vars['main'] != 'user_add'): ?>
<td>&nbsp;</td>
<?php else: ?>
<td class="data-required">*</td>
<?php endif; ?>
<td nowrap="nowrap"><input type="password" id="passwd2" name="passwd2" size="32" maxlength="64" value="" onchange="javascript: this.form.elements.namedItem('password_is_modified').value = 'Y';"<?php if ($this->_tpl_vars['config']['Security']['use_complex_pwd'] == 'Y'): ?>  onblur="javascript: $('#passwd_note').hide();" onfocus="javascript: showNote('passwd_note', this.form.elements.namedItem('passwd1'));"<?php endif; ?> autocomplete="off" />
</td>
</tr>
<?php else: ?>
<tr>
<td align="right" class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_password']; ?>
</td>
<td></td>
<td><a href="change_password.php"><?php echo $this->_tpl_vars['lng']['lbl_chpass']; ?>
</a></td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['is_admin_user'] && $this->_tpl_vars['userinfo']['id'] != $this->_tpl_vars['logged_userid']): ?>

<tr valign="middle">
<td align="right" class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_account_status']; ?>
:</td>
<td>&nbsp;</td>
<td nowrap="nowrap">
<select name="status">
<option value="N"<?php if ($this->_tpl_vars['userinfo']['status'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_account_status_suspended']; ?>
</option>
<option value="Y"<?php if ($this->_tpl_vars['userinfo']['status'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_account_status_enabled']; ?>
</option>
<?php if (( $this->_tpl_vars['active_modules']['XAffiliate'] != "" && ( $this->_tpl_vars['userinfo']['usertype'] == 'B' || $_GET['usertype'] == 'B' ) ) || ( $this->_tpl_vars['userinfo']['usertype'] == 'P' || $_GET['usertype'] == 'P' )): ?>
<option value="Q"<?php if ($this->_tpl_vars['userinfo']['status'] == 'Q'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_account_status_not_approved']; ?>
</option>
<option value="D"<?php if ($this->_tpl_vars['userinfo']['status'] == 'D'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_account_status_declined']; ?>
</option>
<?php endif; ?>
</select>
</td>
</tr>

<?php if ($this->_tpl_vars['display_activity_box'] == 'Y'): ?>
<tr valign="middle">
<td align="right" class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_account_activity']; ?>
:</td>
<td>&nbsp;</td>
<td nowrap="nowrap">
<select name="activity">
<option value="Y"<?php if ($this->_tpl_vars['userinfo']['activity'] == 'Y'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_account_activity_enabled']; ?>
</option>
<option value="N"<?php if ($this->_tpl_vars['userinfo']['activity'] == 'N'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_account_activity_disabled']; ?>
</option>
</select>
</td>
</tr>
<?php endif; ?>

<tr valign="middle">
  <td colspan="2">&nbsp;</td>
  <td nowrap="nowrap">

<table>
<tr>
  <td><input type="checkbox" id="change_password" name="change_password" value="Y"<?php if ($this->_tpl_vars['userinfo']['change_password'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
  <td><label for="change_password"><?php echo $this->_tpl_vars['lng']['lbl_reg_chpass']; ?>
</label></td>
</tr>
</table>

  </td>
</tr>

<?php if (( $this->_tpl_vars['userinfo']['usertype'] == 'P' || $_GET['usertype'] == 'P' ) && $this->_tpl_vars['usertype'] == 'A' && $this->_tpl_vars['active_modules']['Simple_Mode'] == ""): ?>
<tr valign="middle">
  <td colspan="2">&nbsp;</td>
  <td nowrap="nowrap">

<table>
<tr>
  <td><input type="checkbox" id="trusted_provider" name="trusted_provider" value="Y"<?php if ($this->_tpl_vars['userinfo']['trusted_provider'] == 'Y'): ?> checked="checked"<?php endif; ?> /></td>
  <td><label for="trusted_provider"><?php echo $this->_tpl_vars['lng']['lbl_trusted_providers']; ?>
</label></td>
</tr>
</table>

  </td>
</tr>
<?php endif; ?>

<?php endif; ?>