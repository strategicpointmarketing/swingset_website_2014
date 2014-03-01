<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from modules/Flyout_Menus/Icons/fancy_subcategories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'interline', 'modules/Flyout_Menus/Icons/fancy_subcategories.tpl', 10, false),array('modifier', 'dec', 'modules/Flyout_Menus/Icons/fancy_subcategories.tpl', 10, false),array('modifier', 'inc', 'modules/Flyout_Menus/Icons/fancy_subcategories.tpl', 10, false),array('modifier', 'amp', 'modules/Flyout_Menus/Icons/fancy_subcategories.tpl', 14, false),)), $this); ?>
<ul class="fancycat-icons-level-<?php echo $this->_tpl_vars['level']; ?>
">

  <?php $this->assign('loop_name', "subcat".($this->_tpl_vars['parentid'])); ?>
  <?php $_from = $this->_tpl_vars['categories_menu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach[$this->_tpl_vars['loop_name']] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach[$this->_tpl_vars['loop_name']]['total'] > 0):
    foreach ($_from as $this->_tpl_vars['catid'] => $this->_tpl_vars['c']):
        $this->_foreach[$this->_tpl_vars['loop_name']]['iteration']++;
?>

    <li<?php echo smarty_function_interline(array('name' => $this->_tpl_vars['loop_name']), $this);?>
 style="z-index: <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_foreach[$this->_tpl_vars['loop_name']]['total'])) ? $this->_run_mod_handler('dec', true, $_tmp, $this->_foreach[$this->_tpl_vars['loop_name']]['iteration']) : smarty_modifier_dec($_tmp, $this->_foreach[$this->_tpl_vars['loop_name']]['iteration'])))) ? $this->_run_mod_handler('inc', true, $_tmp, 1) : smarty_modifier_inc($_tmp, 1)))) ? $this->_run_mod_handler('inc', true, $_tmp, 1001) : smarty_modifier_inc($_tmp, 1001)); ?>
;">
      <?php echo '<a href="home.php?cat='; ?><?php echo $this->_tpl_vars['catid']; ?><?php echo '" class="'; ?><?php if ($this->_tpl_vars['config']['Flyout_Menus']['icons_icons_in_categories'] >= $this->_tpl_vars['level']+1): ?><?php echo 'icon-link'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['Flyout_Menus']['icons_disable_subcat_triangle'] == 'Y' && $this->_tpl_vars['c']['subcategory_count'] > 0): ?><?php echo ' sub-link'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['Flyout_Menus']['icons_empty_category_vis'] == 'Y' && ! $this->_tpl_vars['c']['childs'] && ! $this->_tpl_vars['c']['product_count']): ?><?php echo ' empty-link'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['Flyout_Menus']['icons_nowrap_category'] != 'Y'): ?><?php echo ' nowrap-link'; ?><?php endif; ?><?php echo '">'; ?><?php if ($this->_tpl_vars['config']['Flyout_Menus']['icons_icons_in_categories'] >= $this->_tpl_vars['level']+1 && $this->_tpl_vars['c']['is_icon']): ?><?php echo '<img src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['thumb_url'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?><?php echo '" alt="" width="'; ?><?php echo $this->_tpl_vars['c']['thumb_x']; ?><?php echo '" height="'; ?><?php echo $this->_tpl_vars['c']['thumb_y']; ?><?php echo '" />'; ?><?php else: ?><?php echo '<img src="'; ?><?php echo $this->_tpl_vars['AltImagesDir']; ?><?php echo '/custom/category_bullet.gif" alt="" width="7" height="7" class="category-bullet" />'; ?><?php endif; ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['category'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['Flyout_Menus']['icons_display_products_cnt'] == 'Y' && $this->_tpl_vars['c']['top_product_count'] > 0): ?><?php echo '&#32;('; ?><?php echo $this->_tpl_vars['c']['top_product_count']; ?><?php echo ')'; ?><?php endif; ?><?php echo '</a>'; ?>


      <?php if ($this->_tpl_vars['c']['childs'] && $this->_tpl_vars['c']['subcategory_count'] > 0 && ( $this->_tpl_vars['config']['Flyout_Menus']['icons_levels_limit'] == 0 || $this->_tpl_vars['config']['Flyout_Menus']['icons_levels_limit'] > $this->_tpl_vars['level'] )): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['fc_skin_path'])."/fancy_subcategories.tpl", 'smarty_include_vars' => array('categories_menu_list' => $this->_tpl_vars['c']['childs'],'parentid' => $this->_tpl_vars['catid'],'level' => $this->_tpl_vars['level']+1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>
    </li>

  <?php endforeach; endif; unset($_from); ?>

</ul>