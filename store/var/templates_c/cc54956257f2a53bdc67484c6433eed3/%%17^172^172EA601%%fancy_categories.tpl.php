<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from modules/Flyout_Menus/Icons/fancy_categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'load_defer', 'modules/Flyout_Menus/Icons/fancy_categories.tpl', 7, false),array('function', 'fancycat_get_cache', 'modules/Flyout_Menus/Icons/fancy_categories.tpl', 10, false),array('modifier', 'default', 'modules/Flyout_Menus/Icons/fancy_categories.tpl', 21, false),)), $this); ?>
<?php if ($this->_tpl_vars['fc_skin_path']): ?>

  <?php echo smarty_function_load_defer(array('file' => ($this->_tpl_vars['fc_skin_path'])."/func.js",'type' => 'js'), $this);?>

  <div id="<?php echo $this->_tpl_vars['fancy_cat_prefix']; ?>
rootmenu" class="fancycat-icons-scheme <?php if ($this->_tpl_vars['config']['Flyout_Menus']['icons_mode'] == 'C'): ?>fancycat-icons-c<?php else: ?>fancycat-icons-e<?php endif; ?>">
    <?php if ($this->_tpl_vars['fancy_use_cache']): ?>
      <?php echo smarty_function_fancycat_get_cache(array(), $this);?>


    <?php elseif ($this->_tpl_vars['config']['Flyout_Menus']['icons_mode'] == 'C'): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['fc_skin_path'])."/fancy_subcategories_exp.tpl", 'smarty_include_vars' => array('level' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php else: ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['fc_skin_path'])."/fancy_subcategories.tpl", 'smarty_include_vars' => array('level' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['catexp']): ?>
<script type="text/javascript">
//<![CDATA[
var catexp = <?php echo ((is_array($_tmp=@$this->_tpl_vars['catexp'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
//]]>
</script>
    <?php endif; ?>
    <div class="clearing"></div>
  </div>
<?php endif; ?>