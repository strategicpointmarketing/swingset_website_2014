<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from customer/main/ui_tabs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'customer/main/ui_tabs.tpl', 8, false),array('modifier', 'amp', 'customer/main/ui_tabs.tpl', 47, false),array('modifier', 'wm_remove', 'customer/main/ui_tabs.tpl', 47, false),array('modifier', 'escape', 'customer/main/ui_tabs.tpl', 47, false),array('function', 'inc', 'customer/main/ui_tabs.tpl', 46, false),)), $this); ?>
<script type="text/javascript">
//<![CDATA[
$(function() {
  var default_tab = '<?php echo ((is_array($_tmp=@$this->_tpl_vars['default_tab'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
';
  var _storage_key_base = '<?php echo ((is_array($_tmp=@$this->_tpl_vars['prefix'])) ? $this->_run_mod_handler('default', true, $_tmp, "ui-tabs-") : smarty_modifier_default($_tmp, "ui-tabs-")); ?>
';
  var _storage_key = _storage_key_base + xcart_web_dir;
  <?php echo '

  if (
    isLocalStorageSupported()
    && default_tab == \'-1last_used_tab\'
  ) {
    // Take into account EU cookie law
    var _used_storage = (\'function\' != typeof window.func_is_allowed_cookie || func_is_allowed_cookie(_storage_key_base)) ? localStorage : sessionStorage;
    var tOpts = {
      activate : function( event, ui ) {
          _used_storage[_storage_key] = ui.newTab.index();
      }
    };
    default_tab = parseInt(_used_storage[_storage_key]) || 0;
  } else {
    var tOpts = {};
    default_tab = parseInt(default_tab) || 0;
  }

  // Allow choose active tab by adding hash in URL, do not set \'active\' in this way
  if (window.location.hash == \'\') {
    tOpts.active = default_tab;
  }

  '; ?>


  $('#<?php echo $this->_tpl_vars['prefix']; ?>
container').tabs(tOpts);
});
//]]>
</script>

<div id="<?php echo $this->_tpl_vars['prefix']; ?>
container">

  <ul>
  <?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ind'] => $this->_tpl_vars['tab']):
?>
    <?php echo smarty_function_inc(array('value' => $this->_tpl_vars['ind'],'assign' => 'ti'), $this);?>

    <li><a href="<?php if ($this->_tpl_vars['tab']['url']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tab']['url'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
<?php else: ?>#<?php echo $this->_tpl_vars['prefix']; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['tab']['anchor'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['ti']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['ti'])); ?>
<?php endif; ?>"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tab']['title'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
  <?php endforeach; endif; unset($_from); ?>
  </ul>

  <?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ind'] => $this->_tpl_vars['tab']):
?>
    <?php if ($this->_tpl_vars['tab']['tpl']): ?>
      <?php echo smarty_function_inc(array('value' => $this->_tpl_vars['ind'],'assign' => 'ti'), $this);?>

      <div id="<?php echo $this->_tpl_vars['prefix']; ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['tab']['anchor'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['ti']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['ti'])); ?>
">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['tab']['tpl'], 'smarty_include_vars' => array('nodialog' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>

</div>