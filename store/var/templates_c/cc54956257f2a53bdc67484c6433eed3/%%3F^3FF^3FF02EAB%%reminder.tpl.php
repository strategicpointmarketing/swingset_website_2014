<?php /* Smarty version 2.6.28, created on 2014-02-28 16:12:57
         compiled from modules/Cloud_Search/reminder.tpl */ ?>

<?php if ($this->_tpl_vars['cloud_search_reminder']): ?>

  <?php ob_start(); ?>
    <?php echo $this->_tpl_vars['cloud_search_reminder']; ?>

  <?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "location.tpl", 'smarty_include_vars' => array('location' => "",'alt_content' => $this->_smarty_vars['capture']['dialog'],'extra' => 'width="100%"','newid' => "cloud-search-dialog-message",'alt_type' => 'I')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>