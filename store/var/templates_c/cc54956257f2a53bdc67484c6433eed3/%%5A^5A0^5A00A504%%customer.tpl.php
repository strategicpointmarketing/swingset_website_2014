<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:08
         compiled from modules/Sitemap/customer.tpl */ ?>
<?php func_load_lang($this, "modules/Sitemap/customer.tpl","sitemap_location,sitemap_noitems,sitemap_location"); ?><h1><?php echo $this->_tpl_vars['lng']['sitemap_location']; ?>
</h1>

<?php ob_start(); ?>
  <div id="Sitemap">
    <?php if ($this->_tpl_vars['config']['Sitemap']['sitemap_use_cache'] == 'Y'): ?>
      <?php echo $this->_tpl_vars['sitemap_items']; ?>

    <?php else: ?>
      <?php $_from = $this->_tpl_vars['config']['Sitemap']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <?php if ($this->_tpl_vars['sitemap_items'][$this->_tpl_vars['item']] != false): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Sitemap/item_".($this->_tpl_vars['item'])."_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Sitemap/item_".($this->_tpl_vars['item']).".tpl", 'smarty_include_vars' => array('items' => $this->_tpl_vars['sitemap_items'][$this->_tpl_vars['item']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Sitemap/item_".($this->_tpl_vars['item'])."_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
      <?php endforeach; else: ?>
        <?php echo $this->_tpl_vars['lng']['sitemap_noitems']; ?>

      <?php endif; unset($_from); ?>
    <?php endif; ?>
  </div>
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['sitemap_location'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>