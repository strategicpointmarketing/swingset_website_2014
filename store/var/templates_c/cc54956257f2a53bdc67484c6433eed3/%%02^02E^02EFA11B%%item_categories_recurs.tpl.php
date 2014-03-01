<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:09
         compiled from modules/Sitemap/item_categories_recurs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/Sitemap/item_categories_recurs.tpl', 9, false),array('modifier', 'amp', 'modules/Sitemap/item_categories_recurs.tpl', 9, false),)), $this); ?>
<li><a href="<?php echo $this->_tpl_vars['item']['url']; ?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
  <?php if ($this->_tpl_vars['item']['products'] != false): ?>
    <ul class="sitemap_products">
      <?php $_from = $this->_tpl_vars['item']['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product_num'] => $this->_tpl_vars['product']):
?>
        <li><a href="<?php echo $this->_tpl_vars['product']['url']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['name'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</a></li>
      <?php endforeach; endif; unset($_from); ?>
    </ul>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['item']['subs'] != false): ?>
    <ul class="sitemap_categories_sub">
      <?php $_from = $this->_tpl_vars['item']['subs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub_num'] => $this->_tpl_vars['sub']):
?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Sitemap/item_categories_recurs.tpl", 'smarty_include_vars' => array('item' => $this->_tpl_vars['sub'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endforeach; endif; unset($_from); ?>
    </ul>
  <?php endif; ?>
</li>