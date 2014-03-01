<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:54
         compiled from partner/main/register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'partner/main/register.tpl', 62, false),array('modifier', 'default', 'partner/main/register.tpl', 63, false),array('modifier', 'substitute', 'partner/main/register.tpl', 90, false),array('modifier', 'wm_remove', 'partner/main/register.tpl', 160, false),array('modifier', 'strip_tags', 'partner/main/register.tpl', 171, false),)), $this); ?>
<?php func_load_lang($this, "partner/main/register.tpl","lbl_account_details,lbl_create_profile,lbl_create_partner_profile,lbl_modify_partner_profile,txt_create_partner_profile,txt_modify_partner_profile,txt_create_profile_msg_partner,txt_fields_are_mandatory,lbl_go_to_users_list,txt_terms_and_conditions_newbie_note,lbl_delete,lbl_update,lbl_register,txt_newbie_registration_bottom,txt_profile_modified,txt_partner_created,txt_profile_created,lbl_profile_details,lbl_approve,lbl_decline,txt_decline_reason,txt_decline_reason,lbl_apply,lbl_approve_or_decline_partner_profile"); ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_email_script.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_password_script.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_zipcode_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_required_fields_js.tpl", 'smarty_include_vars' => array('fillerror' => $this->_tpl_vars['reg_error'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "change_states_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_registerform_fields_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['newbie'] == 'Y'): ?>
<?php if ($this->_tpl_vars['login'] != ""): ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_account_details']); ?>
<?php else: ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_create_profile']); ?>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['main'] == 'user_add'): ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_create_partner_profile']); ?>
<?php else: ?>
<?php $this->assign('title', $this->_tpl_vars['lng']['lbl_modify_partner_profile']); ?>
<?php endif; ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_title.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['title'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<font class="Text">

<?php if ($this->_tpl_vars['usertype'] != 'B'): ?>
<br />
<?php if ($this->_tpl_vars['main'] == 'user_add'): ?>
<?php echo $this->_tpl_vars['lng']['txt_create_partner_profile']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['lng']['txt_modify_partner_profile']; ?>

<?php endif; ?>
<?php else: ?>
<?php echo $this->_tpl_vars['lng']['txt_create_profile_msg_partner']; ?>

<?php endif; ?>
<br /><br />

<?php echo $this->_tpl_vars['lng']['txt_fields_are_mandatory']; ?>


</font>

<br /><br />

<?php ob_start(); ?>

<?php if ($this->_tpl_vars['newbie'] != 'Y' && $this->_tpl_vars['main'] != 'user_add' && $this->_tpl_vars['is_admin_user']): ?>
<div align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_go_to_users_list'],'href' => "users.php?mode=search")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['registered'] == ""): ?>

<?php if ($this->_tpl_vars['reg_error']): ?>
<font class="Star"><?php echo $this->_tpl_vars['reg_error']['errdesc']; ?>
</font>
<br />
<?php endif; ?>

<form action="<?php echo $this->_tpl_vars['register_script_name']; ?>
?<?php echo ((is_array($_tmp=$this->_tpl_vars['php_url']['query_string'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post" name="registerform" onsubmit="javascript: return checkRegFormFields(this);" >
<input type="hidden" name="parent" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['parent'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['userinfo']['parent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['userinfo']['parent'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<table cellspacing="1" cellpadding="2" width="100%">
<tbody>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_personal_info.tpl", 'smarty_include_vars' => array('userinfo' => $this->_tpl_vars['userinfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_address_book.tpl", 'smarty_include_vars' => array('addresses' => $this->_tpl_vars['userinfo']['addresses'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_additional_info.tpl", 'smarty_include_vars' => array('section' => 'A')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "partner/main/register_plan.tpl", 'smarty_include_vars' => array('userinfo' => $this->_tpl_vars['userinfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_account.tpl", 'smarty_include_vars' => array('userinfo' => $this->_tpl_vars['userinfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['active_modules']['News_Management'] && $this->_tpl_vars['newslists']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/News_Management/register_newslists.tpl", 'smarty_include_vars' => array('userinfo' => $this->_tpl_vars['userinfo'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['active_modules']['Image_Verification'] && $this->_tpl_vars['show_antibot']['on_registration'] == 'Y' && $this->_tpl_vars['display_antibot'] && $this->_tpl_vars['newbie'] == 'Y'): ?>
<?php $this->assign('antibot_err', $this->_tpl_vars['reg_antibot_err']); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Image_Verification/spambot_arrest.tpl", 'smarty_include_vars' => array('mode' => "data-table",'id' => $this->_tpl_vars['antibot_sections']['on_registration'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<tr>
<td colspan="3" align="center">
<br /><br />
<?php if ($this->_tpl_vars['newbie'] == 'Y'): ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['txt_terms_and_conditions_newbie_note'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'terms_url', ($this->_tpl_vars['xcart_web_dir'])."/pages.php?alias=conditions") : smarty_modifier_substitute($_tmp, 'terms_url', ($this->_tpl_vars['xcart_web_dir'])."/pages.php?alias=conditions")); ?>

<?php endif; ?>
</td>
</tr>

<tr>
<td colspan="2">
  <br />
  <?php if ($this->_tpl_vars['newbie'] == 'Y' && $this->_tpl_vars['login'] != ""): ?>
  <a href="register.php?mode=delete" class="delete-profile-link"><?php echo $this->_tpl_vars['lng']['lbl_delete']; ?>
</a>
  <?php endif; ?>
</td>
<td>

<?php if ($_GET['mode'] == 'update'): ?>
<input type="hidden" name="mode" value="update" />
<?php endif; ?>

  <br />
  <input type="submit" value="<?php if ($this->_tpl_vars['userinfo']['id'] > 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_update'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_register'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?> " />

</td>
</tr>

</tbody>
</table>
<input type="hidden" name="usertype" value="<?php if ($_GET['usertype'] != ""): ?><?php echo ((is_array($_tmp=$_GET['usertype'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php else: ?><?php echo $this->_tpl_vars['usertype']; ?>
<?php endif; ?>" />
</form>

<br /><br />

<?php echo $this->_tpl_vars['lng']['txt_newbie_registration_bottom']; ?>


<br />

<?php else: ?>

<?php if ($_POST['mode'] == 'update' || $_GET['mode'] == 'update'): ?>
<?php echo $this->_tpl_vars['lng']['txt_profile_modified']; ?>

<?php elseif ($_GET['usertype'] == 'B' || $this->_tpl_vars['usertype'] == 'B'): ?>
<?php echo $this->_tpl_vars['lng']['txt_partner_created']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['lng']['txt_profile_created']; ?>

<?php endif; ?>
<?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_profile_details'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['userinfo']['status'] == 'Q' && $this->_tpl_vars['usertype'] != 'B'): ?>

<br />

<?php ob_start(); ?>

<form action="<?php echo $this->_tpl_vars['register_script_name']; ?>
?<?php echo ((is_array($_tmp=$this->_tpl_vars['php_url']['query_string'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post" name="decisionform">

  <div id="decision">
    <input type="radio" id="opt_approved" name="mode" value="approved" onclick="javascript: this.form.submit();" />
    <label for="opt_approved">
      <?php echo $this->_tpl_vars['lng']['lbl_approve']; ?>

    </label>
    <input type="radio" id="opt_declined" name="mode" value="declined" onclick="javascript: $('#decline_reason').show(); $('#apply_reason').show();" />
    <label for="opt_declined">
      <?php echo $this->_tpl_vars['lng']['lbl_decline']; ?>

    </label>
  
  </div>

  <br />
  <textarea id="decline_reason" style="display:none" name="reason" cols="40" rows="5" onfocus="javascript:if (this.value == '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_decline_reason'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
') this.value='';"><?php echo $this->_tpl_vars['lng']['txt_decline_reason']; ?>
</textarea>

<script type="text/javascript">
//<![CDATA[
  $(function() {
    $("#decision").buttonset();
  });
//]]>
</script>

  <br /><br />
  <input type="submit" id="apply_reason" style="display:none" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_apply'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

</form>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_approve_or_decline_partner_profile'],'content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>
