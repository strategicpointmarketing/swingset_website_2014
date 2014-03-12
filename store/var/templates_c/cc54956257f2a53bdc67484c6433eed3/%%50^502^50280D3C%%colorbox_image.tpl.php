<?php /* Smarty version 2.6.28, created on 2014-03-01 09:29:46
         compiled from modules/Detailed_Product_Images/colorbox_image.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'load_defer', 'modules/Detailed_Product_Images/colorbox_image.tpl', 5, false),array('modifier', 'wm_remove', 'modules/Detailed_Product_Images/colorbox_image.tpl', 8, false),array('modifier', 'substitute', 'modules/Detailed_Product_Images/colorbox_image.tpl', 71, false),array('modifier', 'amp', 'modules/Detailed_Product_Images/colorbox_image.tpl', 77, false),array('modifier', 'escape', 'modules/Detailed_Product_Images/colorbox_image.tpl', 77, false),)), $this); ?>
<?php func_load_lang($this, "modules/Detailed_Product_Images/colorbox_image.tpl","lbl_previous,lbl_next,lbl_close,lbl_cb_start_slideshow,lbl_cb_stop_slideshow,lbl_cb_current_format,lbl_view_detailed_images"); ?><?php echo smarty_function_load_defer(array('file' => "lib/colorbox/jquery.colorbox-min.js",'type' => 'js'), $this);?>

<script type="text/javascript">
//<![CDATA[
var lbl_previous = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_previous'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp, 'escape', 'javascript') : smarty_modifier_wm_remove($_tmp, 'escape', 'javascript')); ?>
';
var lbl_next = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_next'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp, 'escape', 'javascript') : smarty_modifier_wm_remove($_tmp, 'escape', 'javascript')); ?>
';
var lbl_close = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_close'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp, 'escape', 'javascript') : smarty_modifier_wm_remove($_tmp, 'escape', 'javascript')); ?>
';
var lbl_cb_start_slideshow = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_cb_start_slideshow'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp, 'escape', 'javascript') : smarty_modifier_wm_remove($_tmp, 'escape', 'javascript')); ?>
';
var lbl_cb_stop_slideshow = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_cb_stop_slideshow'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp, 'escape', 'javascript') : smarty_modifier_wm_remove($_tmp, 'escape', 'javascript')); ?>
';
var lbl_cb_current_format = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_cb_current_format'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp, 'escape', 'javascript') : smarty_modifier_wm_remove($_tmp, 'escape', 'javascript')); ?>
';

<?php echo '
$(document).ready(function(){
  var dpOpts = {
    transition: "fade", // Can be set to "elastic", "fade", or "none".
    speed: 350,
    href: false,
    title: false,
    rel: false,
    width: false,
    height: false,
    innerWidth: false,
    innerHeight: false,
    initialWidth: 100,
    initialHeight: 100,
    maxWidth: false,
    maxHeight: false,
    scalePhotos: true,
    scrolling: true,
    iframe: false,
    inline: false,
    html: false,
    photo: false,
    opacity: 0.3,
    open: false,
    preloading: true,
    overlayClose: true,
    slideshow: true,
    slideshowSpeed: 2500,
    slideshowAuto: false,
    slideshowStart: lbl_cb_start_slideshow,
    slideshowStop: lbl_cb_stop_slideshow,
    current: lbl_cb_current_format,
    previous: lbl_previous,
    next: lbl_next,
    close: lbl_close,
    onOpen: false,
    onLoad: false,
    onComplete: false,
    onCleanup: false,
    onClosed: false
  };
  $("a[rel=dpimages]").colorbox(dpOpts);
});
'; ?>

//]]>
</script>

<div class="image-box" style="<?php if ($this->_tpl_vars['max_image_width'] > 0): ?>width: <?php echo $this->_tpl_vars['max_image_width']; ?>
px;<?php endif; ?> <?php if ($this->_tpl_vars['max_image_height'] > 0): ?>height: <?php echo $this->_tpl_vars['max_image_height']; ?>
px;<?php endif; ?>">
  <?php if ($this->_tpl_vars['active_modules']['On_Sale']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/On_Sale/on_sale_icon.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'],'module' => 'product')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php else: ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_thumbnail.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['image_id'],'image_x' => $this->_tpl_vars['product']['image_x'],'image_y' => $this->_tpl_vars['product']['image_y'],'product' => $this->_tpl_vars['product']['product'],'tmbn_url' => $this->_tpl_vars['product']['image_url'],'id' => 'product_thumbnail','type' => $this->_tpl_vars['product']['image_type'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
</div>

<div class="dpimages-popup-link">
  <a href="javascript:void(0);" onclick="javascript: $('a[rel=dpimages]').colorbox({open: true}); return false;"><?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_view_detailed_images'])) ? $this->_run_mod_handler('substitute', true, $_tmp, 'counter', $this->_tpl_vars['images_counter']) : smarty_modifier_substitute($_tmp, 'counter', $this->_tpl_vars['images_counter'])); ?>
</a>
</div>

<?php if ($this->_tpl_vars['config']['Detailed_Product_Images']['det_image_icons_box'] == 'Y'): ?>
  <div class="dpimages-icons-box">
    <?php $_from = $this->_tpl_vars['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['images'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['images']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i']):
        $this->_foreach['images']['iteration']++;
?>
      <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['i']['image_url'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" class="lightbox"<?php if ($this->_tpl_vars['config']['Detailed_Product_Images']['det_image_icons_limit'] > 0 && $this->_tpl_vars['config']['Detailed_Product_Images']['det_image_icons_limit'] <= ($this->_foreach['images']['iteration']-1)): ?> style="display:none;"<?php endif; ?> rel="dpimages" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['i']['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['i']['icon_url'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['i']['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['i']['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" width="<?php echo $this->_tpl_vars['i']['icon_image_x']; ?>
" height="<?php echo $this->_tpl_vars['i']['icon_image_y']; ?>
" /></a>
    <?php endforeach; endif; unset($_from); ?>
    <div class="clearing"></div>
  </div>
<?php else: ?>
  <?php $_from = $this->_tpl_vars['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['images'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['images']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i']):
        $this->_foreach['images']['iteration']++;
?>
    <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['i']['image_url'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" class="lightbox" style="display:none;" rel="dpimages" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['i']['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></a>
  <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>