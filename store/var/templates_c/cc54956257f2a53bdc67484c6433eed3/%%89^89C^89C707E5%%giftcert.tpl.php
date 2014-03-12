<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:14
         compiled from modules/Gift_Certificates/customer/giftcert.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wm_remove', 'modules/Gift_Certificates/customer/giftcert.tpl', 14, false),array('modifier', 'escape', 'modules/Gift_Certificates/customer/giftcert.tpl', 14, false),array('modifier', 'strip_tags', 'modules/Gift_Certificates/customer/giftcert.tpl', 14, false),array('modifier', 'default', 'modules/Gift_Certificates/customer/giftcert.tpl', 21, false),array('modifier', 'formatprice', 'modules/Gift_Certificates/customer/giftcert.tpl', 170, false),array('function', 'currency', 'modules/Gift_Certificates/customer/giftcert.tpl', 73, false),)), $this); ?>
<?php func_load_lang($this, "modules/Gift_Certificates/customer/giftcert.tpl","lbl_gift_certificate,txt_recipient_invalid,txt_amount_invalid,txt_gc_enter_mail_address,lbl_giftcertid_is_empty,txt_gc_header,txt_gift_certificate_checking_msg,err_gc_not_found,lbl_gift_certificate,lbl_gift_certificate_checking,lbl_gc_id,lbl_amount,lbl_remain,lbl_status,lbl_pending,lbl_active,lbl_blocked,lbl_disabled,lbl_expired,lbl_used,lbl_gift_certificate_checking,txt_amount_invalid,txt_ups_reg_error,lbl_gift_certificate_details,lbl_gc_whom_sending,lbl_gc_whom_sending_subtitle,lbl_from,lbl_to,lbl_gc_add_message,lbl_gc_add_message_subtitle,lbl_message,lbl_gc_choose_amount,lbl_gc_choose_amount_subtitle,lbl_gc_amount_msg,lbl_gc_from,lbl_gc_through,lbl_gc_choose_delivery_method,lbl_gc_send_via_email,lbl_gc_enter_email,lbl_email,lbl_gc_send_via_postal_mail,txt_gc_enter_postal_mail,lbl_first_name,lbl_last_name,lbl_address,lbl_city,lbl_county,lbl_state,lbl_country,lbl_zip_code,lbl_phone,lbl_gc_template,lbl_preview,lbl_gc_add_to_cart,lbl_gift_certificate_details"); ?>
<h1><?php echo $this->_tpl_vars['lng']['lbl_gift_certificate']; ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_email_script.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "check_zipcode_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SkinDir']; ?>
/modules/Gift_Certificates/func.js"></script>

<script type="text/javascript">
//<![CDATA[
var txt_recipient_invalid = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_recipient_invalid'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
";
var txt_amount_invalid = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_amount_invalid'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
";
var txt_gc_enter_mail_address = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_gc_enter_mail_address'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
";
var lbl_giftcertid_is_empty = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_giftcertid_is_empty'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';

var orig_mode = "gc2cart";

var min_gc_amount = <?php echo ((is_array($_tmp=@$this->_tpl_vars['min_gc_amount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
var max_gc_amount = <?php echo ((is_array($_tmp=@$this->_tpl_vars['max_gc_amount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
var enablePostMailGC = <?php if ($this->_tpl_vars['config']['Gift_Certificates']['enablePostMailGC'] == 'Y'): ?>true<?php else: ?>false<?php endif; ?>;
//]]>
</script>

<div class="giftcert-header">
  <img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" alt="" />
  <?php echo $this->_tpl_vars['lng']['txt_gc_header']; ?>

</div>
<div class="clearing"></div>

<?php ob_start(); ?>

  <div class="text-block"><?php echo $this->_tpl_vars['lng']['txt_gift_certificate_checking_msg']; ?>
</div>

  <?php if ($_GET['gcid'] && $this->_tpl_vars['gc_array'] == ""): ?>
    <span class="error-message"><?php echo $this->_tpl_vars['lng']['err_gc_not_found']; ?>
</span>
  <?php endif; ?>

  <form action="giftcert.php" method="post" name="registergiftcert" onsubmit="javascript: if (this.gcid.value != '') return true; alert(lbl_giftcertid_is_empty); return false;">

    <div class="valign-middle">
      <label class="input-block">
        <?php echo $this->_tpl_vars['lng']['lbl_gift_certificate']; ?>
:
        <input type="text" size="25" maxlength="16" name="gcid" value="<?php echo ((is_array($_tmp=$_GET['gcid'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
      </label>

      <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/submit.tpl", 'smarty_include_vars' => array('type' => 'input')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('submit_button', ob_get_contents()); ob_end_clean();
 ?>

      <?php if ($this->_tpl_vars['login'] == "" && $this->_tpl_vars['active_modules']['Image_Verification'] && $this->_tpl_vars['show_antibot']['on_giftcert_check'] == 'Y'): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Image_Verification/spambot_arrest.tpl", 'smarty_include_vars' => array('mode' => 'advanced','id' => $this->_tpl_vars['antibot_sections']['on_giftcert_check'],'antibot_err' => $this->_tpl_vars['antibot_giftcert_check_err'],'button_code' => $this->_tpl_vars['submit_button'],'antibot_name_prefix' => '_on_giftcert_check')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php else: ?>
        <?php echo $this->_tpl_vars['submit_button']; ?>

      <?php endif; ?>

    </div>
  </form>

  <?php if ($this->_tpl_vars['gc_array']): ?>

    <hr <?php if ($this->_tpl_vars['login'] == ""): ?>class="giftcert-info"<?php endif; ?>/>

    <table cellspacing="0" class="data-table" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_gift_certificate_checking'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_gc_id']; ?>
:</td>
        <td><?php echo $this->_tpl_vars['gc_array']['gcid']; ?>
</td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_amount']; ?>
:</td>
        <td><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['gc_array']['amount']), $this);?>
</td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_remain']; ?>
:</td>
        <td><?php echo smarty_function_currency(array('value' => $this->_tpl_vars['gc_array']['debit']), $this);?>
</td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_status']; ?>
:</td>
        <td>
          <?php if ($this->_tpl_vars['gc_array']['status'] == 'P'): ?>
            <?php echo $this->_tpl_vars['lng']['lbl_pending']; ?>


          <?php elseif ($this->_tpl_vars['gc_array']['status'] == 'A'): ?>
            <?php echo $this->_tpl_vars['lng']['lbl_active']; ?>


          <?php elseif ($this->_tpl_vars['gc_array']['status'] == 'B'): ?>
            <?php echo $this->_tpl_vars['lng']['lbl_blocked']; ?>


          <?php elseif ($this->_tpl_vars['gc_array']['status'] == 'D'): ?>
            <?php echo $this->_tpl_vars['lng']['lbl_disabled']; ?>


          <?php elseif ($this->_tpl_vars['gc_array']['status'] == 'E'): ?>
            <?php echo $this->_tpl_vars['lng']['lbl_expired']; ?>


          <?php elseif ($this->_tpl_vars['gc_array']['status'] == 'U'): ?>
            <?php echo $this->_tpl_vars['lng']['lbl_used']; ?>


          <?php endif; ?>
        </td>
      </tr>
    </table>

  <?php endif; ?>
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_gift_certificate_checking'],'content' => $this->_smarty_vars['capture']['dialog'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php ob_start(); ?>

  <?php if ($this->_tpl_vars['amount_error']): ?>
    <div class="error-message"><?php echo $this->_tpl_vars['lng']['txt_amount_invalid']; ?>
</div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['fill_error']): ?>
    <div class="error-message"><?php echo $this->_tpl_vars['lng']['txt_ups_reg_error']; ?>
</div>
  <?php endif; ?>

  <form name="gccreate" action="giftcert.php" method="post" onsubmit="javascript: return check_gc_form();">
    <input type="hidden" name="gcindex" value="<?php echo ((is_array($_tmp=$_GET['gcindex'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
    <input type="hidden" name="mode" value="gc2cart" />

    <table cellspacing="1" class="data-table giftcert-table" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_gift_certificate_details'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
      <tr>
        <td colspan="3">
          <div class="giftcert-title">1. <?php echo $this->_tpl_vars['lng']['lbl_gc_whom_sending']; ?>
</div>
          <?php echo $this->_tpl_vars['lng']['lbl_gc_whom_sending_subtitle']; ?>

        </td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_from']; ?>
</td>
        <td class="data-required">*</td>
        <td>
          <input type="text" name="purchaser" size="30" value="<?php if ($this->_tpl_vars['giftcert']['purchaser']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['purchaser'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php else: ?><?php if ($this->_tpl_vars['userinfo']['firstname'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['firstname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['lastname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" />
        </td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_to']; ?>
</td>
        <td class="data-required">*</td>
        <td><input type="text" name="recipient" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['recipient'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" /></td>
      </tr>

      <tr>
        <td colspan="3">
          <div class="giftcert-title">2. <?php echo $this->_tpl_vars['lng']['lbl_gc_add_message']; ?>
</div>
          <?php echo $this->_tpl_vars['lng']['lbl_gc_add_message_subtitle']; ?>

        </td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_message']; ?>
</td>
        <td class="data-required"></td>
        <td><textarea name="message" rows="8" cols="50"><?php echo $this->_tpl_vars['giftcert']['message']; ?>
</textarea></td>
      </tr>

      <tr>
        <td colspan="3">
          <div class="giftcert-title">3. <?php echo $this->_tpl_vars['lng']['lbl_gc_choose_amount']; ?>
</div>
          <?php echo $this->_tpl_vars['lng']['lbl_gc_choose_amount_subtitle']; ?>

        </td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['config']['General']['currency_symbol']; ?>
</td>
        <td class="data-required">*</td>
        <td>
          <input type="text" name="amount" size="10" maxlength="9" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['amount'])) ? $this->_run_mod_handler('formatprice', true, $_tmp) : smarty_modifier_formatprice($_tmp)); ?>
" />
          <?php if ($this->_tpl_vars['min_gc_amount'] > 0 || $this->_tpl_vars['max_gc_amount'] > 0): ?>
            <?php echo $this->_tpl_vars['lng']['lbl_gc_amount_msg']; ?>

            <?php if ($this->_tpl_vars['min_gc_amount'] > 0): ?>
              <?php echo $this->_tpl_vars['lng']['lbl_gc_from']; ?>
 <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['min_gc_amount']), $this);?>

            <?php endif; ?>
            <?php if ($this->_tpl_vars['max_gc_amount'] > 0): ?>
              <?php echo $this->_tpl_vars['lng']['lbl_gc_through']; ?>
 <?php echo smarty_function_currency(array('value' => $this->_tpl_vars['max_gc_amount']), $this);?>

            <?php endif; ?>
          <?php endif; ?>
        </td>
      </tr>

      <tr>
        <td colspan="3"><div class="giftcert-title">4. <?php echo $this->_tpl_vars['lng']['lbl_gc_choose_delivery_method']; ?>
</div></td>
      </tr>

      <tr>
        <td colspan="3" class="giftcert-delivery-method">

          <?php if ($this->_tpl_vars['config']['Gift_Certificates']['enablePostMailGC'] == 'Y'): ?>
            <label>
              <input type="radio" name="send_via" value="E" onclick="javascript: switchPreview();"<?php if ($this->_tpl_vars['giftcert']['send_via'] != 'P'): ?> checked="checked"<?php endif; ?> />
              <?php echo $this->_tpl_vars['lng']['lbl_gc_send_via_email']; ?>

            </label>
          <?php else: ?>
            <input type="hidden" name="send_via" value="E" />
          <?php endif; ?>
        </td>
      </tr>

      <tr>
        <td colspan="3" class="giftcert-subtitle"><?php echo $this->_tpl_vars['lng']['lbl_gc_enter_email']; ?>
</td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_email']; ?>
</td>
        <td class="data-required">*</td>
        <td><input type="text" name="recipient_email" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['recipient_email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
      </tr>

      <?php if ($this->_tpl_vars['config']['Gift_Certificates']['enablePostMailGC'] == 'Y'): ?>

        <tr>
          <td colspan="3" class="giftcert-h-separator"><hr /></td>
        </tr>

        <tr>
          <td colspan="3" class="giftcert-delivery-method">
            <label>
              <input id="gc_send_p" type="radio" name="send_via" value="P" onclick="javascript: switchPreview();"<?php if ($this->_tpl_vars['giftcert']['send_via'] == 'P'): ?> checked="checked"<?php endif; ?> />
              <?php echo $this->_tpl_vars['lng']['lbl_gc_send_via_postal_mail']; ?>

            </label>
          </td>
        </tr>

        <tr>
          <td colspan="3" class="giftcert-subtitle"><?php echo $this->_tpl_vars['lng']['txt_gc_enter_postal_mail']; ?>
</td>
        </tr>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_first_name']; ?>
</td>
          <td class="data-required">*</td>
          <td><input type="text" name="recipient_firstname" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['recipient_firstname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
        </tr>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_last_name']; ?>
</td>
          <td class="data-required">*</td>
          <td><input type="text" name="recipient_lastname" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['recipient_lastname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
        </tr>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_address']; ?>
</td>
          <td class="data-required">*</td>
          <td><input type="text" name="recipient_address" size="40" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['recipient_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
        </tr>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_city']; ?>
</td>
          <td class="data-required">*</td>
          <td><input type="text" name="recipient_city" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['recipient_city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
        </tr>

        <?php if ($this->_tpl_vars['config']['General']['use_counties'] == 'Y'): ?>
          <tr>
            <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_county']; ?>
</td>
            <td class="data-required">*</td>
            <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/counties.tpl", 'smarty_include_vars' => array('counties' => $this->_tpl_vars['counties'],'name' => 'recipient_county','default' => $this->_tpl_vars['giftcert']['recipient_county'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
          </tr>
        <?php endif; ?>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_state']; ?>
</td>
          <td class="data-required">*</td>
          <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/states.tpl", 'smarty_include_vars' => array('states' => $this->_tpl_vars['states'],'name' => 'recipient_state','default' => $this->_tpl_vars['giftcert']['recipient_state'],'default_country' => $this->_tpl_vars['giftcert']['recipient_country'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_country']; ?>
</td>
          <td class="data-required">*</td>
          <td>
            <select id="recipient_country" name="recipient_country" size="1" onchange="javascript: check_zip_code_field(this, this.form.recipient_zipcode);">
              <?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['c']['country_code'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['giftcert']['recipient_country'] == $this->_tpl_vars['c']['country_code'] || ( $this->_tpl_vars['c']['country_code'] == $this->_tpl_vars['config']['General']['default_country'] && $this->_tpl_vars['giftcert']['recipient_country'] == "" ) || ( $this->_tpl_vars['c']['country_code'] == $this->_tpl_vars['userinfo']['b_country'] && $this->_tpl_vars['giftcert']['recipient_country'] == "" )): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['country']; ?>
</option>
              <?php endforeach; endif; unset($_from); ?>
            </select>
          </td>
        </tr>

        <tr style="display: none;">
          <td>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "change_states_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/register_states.tpl", 'smarty_include_vars' => array('state_name' => 'recipient_state','country_name' => 'recipient_country','county_name' => 'recipient_county','state_value' => $this->_tpl_vars['giftcert']['recipient_state'],'county_value' => $this->_tpl_vars['giftcert']['recipient_county'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </td>
        </tr>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_zip_code']; ?>
</td>
          <td class="data-required">*</td>
          <td>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/zipcode.tpl", 'smarty_include_vars' => array('name' => 'recipient_zipcode','id' => 'recipient_zipcode','val' => $this->_tpl_vars['giftcert']['recipient_zipcode'],'zip4' => $this->_tpl_vars['giftcert']['recipient_zip4'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </td>
        </tr>

        <tr>
          <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_phone']; ?>
</td>
          <td class="data-required">&nbsp;</td>
          <td><input type="text" name="recipient_phone" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['giftcert']['recipient_phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
        </tr>

      <?php endif; ?>

      <tr id="preview_template"<?php if ($this->_tpl_vars['giftcert']['send_via'] != 'P'): ?> style="display: none;"<?php endif; ?>>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_gc_template']; ?>
</td>
        <td class="data-required">&nbsp;</td>
        <td>
          <?php if ($this->_tpl_vars['config']['Gift_Certificates']['allow_customer_select_tpl'] == 'Y'): ?>
          <select name="gc_template">
            <?php $_from = $this->_tpl_vars['gc_templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gc_tpl']):
?>
              <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gc_tpl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['gc_tpl'] == $this->_tpl_vars['giftcert']['tpl_file'] || $this->_tpl_vars['giftcert']['tpl_file'] == "" && $this->_tpl_vars['gc_tpl'] == $this->_tpl_vars['config']['Gift_Certificates']['default_giftcert_template']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['gc_tpl']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
          </select>
          <?php else: ?>
          <?php echo $this->_tpl_vars['config']['Gift_Certificates']['default_giftcert_template']; ?>
<input type="hidden" name="gc_template" value="<?php echo $this->_tpl_vars['config']['Gift_Certificates']['default_giftcert_template']; ?>
" />
          <?php endif; ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_preview'],'href' => "javascript: formPreview();",'style' => 'link')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
      </tr>

      <tr>
        <td colspan="2">&nbsp;</td>
        <td class="buttons-row buttons-auto-separator">

          <?php if ($_GET['gcindex'] != ""): ?>

            <?php if ($this->_tpl_vars['active_modules']['Wishlist'] != "" && $this->_tpl_vars['action'] == 'wl'): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/gc_update.tpl", 'smarty_include_vars' => array('href' => "javascript: if (!check_gc_form()) return false; document.gccreate.mode.value='addgc2wl'; document.gccreate.submit();")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/gc_update.tpl", 'smarty_include_vars' => array('type' => 'input','adittional_button_class' => "main-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>

          <?php else: ?>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_gc_add_to_cart'],'type' => 'input','additional_button_class' => "main-button")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <?php if ($this->_tpl_vars['active_modules']['Wishlist'] && $this->_tpl_vars['login']): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/add_to_wishlist.tpl", 'smarty_include_vars' => array('href' => "javascript: if (check_gc_form()) submitForm(document.gccreate, 'addgc2wl'); return false;")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>

          <?php endif; ?>
        </td>
      </tr>

    </table>
  </form>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_gift_certificate_details'],'content' => $this->_smarty_vars['capture']['dialog'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>