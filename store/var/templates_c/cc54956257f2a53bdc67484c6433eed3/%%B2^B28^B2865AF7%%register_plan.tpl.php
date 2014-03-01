<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:54
         compiled from partner/main/register_plan.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'partner/main/register_plan.tpl', 21, false),array('modifier', 'default', 'partner/main/register_plan.tpl', 44, false),)), $this); ?>
<?php func_load_lang($this, "partner/main/register_plan.tpl","lbl_affiliate_plans,lbl_affiliate_plan,lbl_none,lbl_affiliate_plan,lbl_none,lbl_signup_for_partner_plan,lbl_none"); ?><?php if ($this->_tpl_vars['plans']): ?>

<tr> 
  <td height="20" colspan="3"><b><?php echo $this->_tpl_vars['lng']['lbl_affiliate_plans']; ?>
</b><hr size="1" noshade="noshade" /></td>
</tr>

<?php if ($this->_tpl_vars['is_admin_user']): ?>

  <tr>
    <td align="right"><?php echo $this->_tpl_vars['lng']['lbl_affiliate_plan']; ?>
</td>
    <td>&nbsp;</td>
    <td nowrap="nowrap">

      <select name="plan_id">
        <option value='0'><?php echo $this->_tpl_vars['lng']['lbl_none']; ?>
</option>
        <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
          <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['plan_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['userinfo']['plan_id'] == $this->_tpl_vars['v']['plan_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']['plan_title']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
      </select>

    </td>
  </tr>

<?php else: ?>

  <tr>
    <td align="right"><?php echo $this->_tpl_vars['lng']['lbl_affiliate_plan']; ?>
</td>
    <td>&nbsp;</td>
    <td nowrap="nowrap">
      <?php if ($this->_tpl_vars['userinfo']['plan_id']): ?>
        <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
          <?php if ($this->_tpl_vars['userinfo']['plan_id'] == $this->_tpl_vars['v']['plan_id']): ?>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['v']['plan_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
      <?php else: ?>
        <?php echo $this->_tpl_vars['lng']['lbl_none']; ?>

      <?php endif; ?>

      <input type="hidden" name="plan_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['userinfo']['plan_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" />

    </td>
  </tr>

<?php endif; ?>

<tr>
  <td align="right"><?php echo $this->_tpl_vars['lng']['lbl_signup_for_partner_plan']; ?>
</td>
  <td>&nbsp;</td>
  <td nowrap="nowrap">

    <select name="pending_plan_id">
      <option value='0'><?php echo $this->_tpl_vars['lng']['lbl_none']; ?>
</option>
      <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
        <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['plan_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['userinfo']['pending_plan_id'] == $this->_tpl_vars['v']['plan_id']): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['plan_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
    </select>

  </td>
</tr>

<?php endif; ?>