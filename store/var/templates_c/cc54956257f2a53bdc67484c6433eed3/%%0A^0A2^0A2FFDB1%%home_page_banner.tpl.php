<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/main/home_page_banner.tpl */ ?>
<?php if ($this->_tpl_vars['active_modules']['Banner_System'] && $this->_tpl_vars['top_banners'] != ''): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Banner_System/banner_rotator.tpl", 'smarty_include_vars' => array('banners' => $this->_tpl_vars['top_banners'],'banner_location' => 'T')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['active_modules']['Demo_Mode'] && $this->_tpl_vars['active_modules']['Banner_System']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Demo_Mode/banners.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
  <div class="welcome-img">
    <img src="<?php echo $this->_tpl_vars['AltImagesDir']; ?>
/custom/welcome_picture.jpg" alt="" title="" usemap="#xcart" />
    <map id="xcart" name="xcart">
      <area shape="rect" coords="336,33,457,230" href="http://www.x-cart.com" target="_blank" alt="X-Cart" />
    </map>
  </div>
<?php endif; ?>