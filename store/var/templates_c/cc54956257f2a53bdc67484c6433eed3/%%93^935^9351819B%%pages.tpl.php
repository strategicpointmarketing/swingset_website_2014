<?php /* Smarty version 2.6.28, created on 2014-03-01 09:24:16
         compiled from customer/main/pages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'customer/main/pages.tpl', 6, false),array('function', 'eval', 'customer/main/pages.tpl', 13, false),)), $this); ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_data']['title'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</h1>

<?php ob_start(); ?>

  <?php if ($this->_tpl_vars['page_content'] != ''): ?>

    <?php if ($this->_tpl_vars['config']['General']['parse_smarty_tags'] == 'Y'): ?>
      <?php echo smarty_function_eval(array('var' => $this->_tpl_vars['page_content']), $this);?>

    <?php else: ?>
      <?php echo ((is_array($_tmp=$this->_tpl_vars['page_content'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>

    <?php endif; ?>

  <?php endif; ?>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['page_data']['title'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>