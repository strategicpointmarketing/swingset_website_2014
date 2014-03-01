<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/tabs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'customer/tabs.tpl', 8, false),array('function', 'interline', 'customer/tabs.tpl', 11, false),array('modifier', 'count', 'customer/tabs.tpl', 8, false),array('modifier', 'amp', 'customer/tabs.tpl', 12, false),)), $this); ?>
<?php if ($this->_tpl_vars['speed_bar']): ?>
  <div class="tabs<?php if ($this->_tpl_vars['all_languages_cnt'] > 1): ?> with_languages<?php endif; ?> monitor">
    <ul>
      <?php echo smarty_function_math(array('equation' => "round(100/x,2)",'x' => count($this->_tpl_vars['speed_bar']),'assign' => 'cell_width'), $this);?>

      <?php $_from = $this->_tpl_vars['speed_bar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sb']):
        $this->_foreach['tabs']['iteration']++;
?>
         <?php echo '<li'; ?><?php echo smarty_function_interline(array('name' => 'tabs','additional_class' => "hidden-xs"), $this);?><?php echo '><a href="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['sb']['link'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?><?php echo '">'; ?><?php echo $this->_tpl_vars['sb']['title']; ?><?php echo '<img src="'; ?><?php echo $this->_tpl_vars['ImagesDir']; ?><?php echo '/spacer.gif" alt="" /></a><div class="t-l"></div><div class="t-r"></div></li><li'; ?><?php echo smarty_function_interline(array('name' => 'tabs','additional_class' => "visible-xs"), $this);?><?php echo ' style="width: '; ?><?php echo $this->_tpl_vars['cell_width']; ?><?php echo '%"><a href="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['sb']['link'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?><?php echo '">'; ?><?php echo $this->_tpl_vars['sb']['title']; ?><?php echo '<img src="'; ?><?php echo $this->_tpl_vars['ImagesDir']; ?><?php echo '/spacer.gif" alt="" /></a>'; ?><?php if (($this->_foreach['tabs']['iteration'] == $this->_foreach['tabs']['total'])): ?><?php echo '<div class="mobile-tab-delim first"></div><div class="t-l first"></div>'; ?><?php else: ?><?php echo '<div class="t-l"></div>'; ?><?php endif; ?><?php echo '<div class="t-r"></div><div class="mobile-tab-delim"></div></li>'; ?>

      <?php endforeach; endif; unset($_from); ?>

    </ul>
  </div>
<?php endif; ?>