<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:54
         compiled from main/register_address_book.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'main/register_address_book.tpl', 24, false),)), $this); ?>
<?php func_load_lang($this, "main/register_address_book.tpl","lbl_address_book,lbl_add_new_address,lbl_set_address_as_default,lbl_billing,lbl_shipping,lbl_delete"); ?><?php if ($this->_tpl_vars['userinfo']['id'] > 0 && $this->_tpl_vars['is_areas']['B'] != ''): ?>

<?php if ($this->_tpl_vars['hide_header'] == ""): ?>
<tr>
  <td colspan="3" class="RegSectionTitle">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/visiblebox_link.tpl", 'smarty_include_vars' => array('no_use_class' => 'Y','mark' => 'ab','title' => $this->_tpl_vars['lng']['lbl_address_book'],'extra' => ' width="100%"')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <hr size="1" noshade="noshade" />
  </td>
</tr>
<?php endif; ?>

<tr id="boxab"<?php if ($this->_tpl_vars['reg_error']['address'] == ''): ?> style="display:none;"<?php endif; ?>>
  <td colspan="3" width="100%" align="center">
    <table class="address-book-container" cellpadding="3" cellspacing="1" width="100%">
      <tr>
        <th width="70%">
          <span style="float:left;"><a href="javascript:void(0);" onclick="$('.address-row-0').toggle();"><?php echo $this->_tpl_vars['lng']['lbl_add_new_address']; ?>
</a></span>
          <span style="float:right;"><?php echo $this->_tpl_vars['lng']['lbl_set_address_as_default']; ?>
:</span>
        </th>
        <th width="10%" class="hl" align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_billing'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
</th>
        <th width="10%" class="hl" align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_shipping'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
</th>
        <th width="10%" align="center"><?php echo $this->_tpl_vars['lng']['lbl_delete']; ?>
</th>
      </tr>
      <?php if ($this->_tpl_vars['address_book'] != ''): ?>
        <?php $this->assign('hide_new', 'Y'); ?>
      <?php endif; ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/address_fields.tpl", 'smarty_include_vars' => array('address' => $this->_tpl_vars['address'],'hide' => $this->_tpl_vars['hide_new'],'id' => 0,'reg_error' => $this->_tpl_vars['reg_error']['address']['0'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php if ($this->_tpl_vars['address_book'] != ''): ?>
      <?php $_from = $this->_tpl_vars['address_book']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['address']):
?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/address_fields.tpl", 'smarty_include_vars' => array('address' => $this->_tpl_vars['address'],'id' => $this->_tpl_vars['id'],'reg_error' => $this->_tpl_vars['reg_error']['address'][$this->_tpl_vars['id']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endforeach; endif; unset($_from); ?>
      <?php endif; ?>
    </table>
  </td>
</tr>

<tr>
  <td colspan="3">&nbsp;</td>
</tr>
<?php endif; ?>