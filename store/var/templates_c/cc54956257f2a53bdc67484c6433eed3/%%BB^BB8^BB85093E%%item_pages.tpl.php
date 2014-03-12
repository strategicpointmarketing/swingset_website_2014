<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:09
         compiled from modules/Sitemap/item_pages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/Sitemap/item_pages.tpl', 6, false),array('modifier', 'amp', 'modules/Sitemap/item_pages.tpl', 6, false),)), $this); ?>
      <?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['item']):
?>
        <li><a href="<?php echo $this->_tpl_vars['item']['url']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a></li>
      <?php endforeach; endif; unset($_from); ?>