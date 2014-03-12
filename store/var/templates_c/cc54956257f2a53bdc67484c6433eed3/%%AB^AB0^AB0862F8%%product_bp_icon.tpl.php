<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from modules/Special_Offers/customer/product_bp_icon.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/Special_Offers/customer/product_bp_icon.tpl', 9, false),)), $this); ?>
<?php func_load_lang($this, "modules/Special_Offers/customer/product_bp_icon.tpl","lbl_sp_ttl_bonus_points,lbl_sp_ttl_bonus_points"); ?><?php $this->assign('TplImages', ($this->_tpl_vars['SkinDir'])."/modules/Special_Offers/images"); ?>

<?php if ($this->_tpl_vars['product']['bonus_points'] > 0): ?>
<td align="right" valign="top">
  <table cellspacing="0" cellpadding="0" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_sp_ttl_bonus_points'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
  <tr>
    <td><img src="<?php echo $this->_tpl_vars['TplImages']; ?>
/bp_icon_top_left.gif" alt="" /></td>
    <td class="bp-icon-header">+<?php echo $this->_tpl_vars['product']['bonus_points']; ?>
</td>
    <td><img src="<?php echo $this->_tpl_vars['TplImages']; ?>
/bp_icon_top_right.gif" alt="" /></td>
  </tr>
  <tr>
    <td><img src="<?php echo $this->_tpl_vars['TplImages']; ?>
/bp_icon_bottom_left.gif" alt="" /></td>
    <td class="bp-icon-footer"><?php echo $this->_tpl_vars['lng']['lbl_sp_ttl_bonus_points']; ?>
</td>
    <td><img src="<?php echo $this->_tpl_vars['TplImages']; ?>
/bp_icon_bottom_right.gif" alt="" /></td>
  </tr>
  </table>
</td>
<?php endif; ?>