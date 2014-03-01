<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:09
         compiled from modules/Sitemap/item_manufacturers_header.tpl */ ?>
<?php func_load_lang($this, "modules/Sitemap/item_manufacturers_header.tpl","sitemap_item_manufacturers"); ?><ul id="Sitemap_Manufacturers" class="sitemap_section">
  <li><h2><?php echo $this->_tpl_vars['lng']['sitemap_item_manufacturers']; ?>
</h2>
    <ul class="<?php if ($this->_tpl_vars['config']['Sitemap']['sitemap_display_products_manufac'] == 'Y'): ?>sitemap_manufacturers<?php else: ?>sitemap_item<?php endif; ?>">