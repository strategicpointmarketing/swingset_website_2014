<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from modules/Product_Options/check_options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'modules/Product_Options/check_options.tpl', 30, false),array('modifier', 'wm_remove', 'modules/Product_Options/check_options.tpl', 48, false),array('modifier', 'escape', 'modules/Product_Options/check_options.tpl', 48, false),array('modifier', 'strip_tags', 'modules/Product_Options/check_options.tpl', 184, false),array('function', 'currency', 'modules/Product_Options/check_options.tpl', 36, false),array('function', 'dec', 'modules/Product_Options/check_options.tpl', 61, false),)), $this); ?>
<?php func_load_lang($this, "modules/Product_Options/check_options.tpl","txt_exception_warning,txt_exception_warning,txt_out_of_stock,lbl_no_items_available,txt_items_available,lbl_item,lbl_items,lbl_quantity,lbl_price_per_item,txt_note,lbl_including_tax"); ?><script type="text/javascript">
//<![CDATA[

/*
variants array:
  0 - array:
    0 - taxed price
    1 - quantity
    2 - variantid if variant have thumbnail
    3 - weight
    4 - original price (without taxes)
    5 - productcode
  1 - array: variant options as classid => optionid
  2 - array: taxes as taxid => tax amount
  3 - wholesale prices array:
    0 - quantity
    1 - next quantity
    2 - taxed price
    3 - taxes array: as taxid => tax amount
    4 - original price (without taxes)
*/
var variants = [];
<?php if ($this->_tpl_vars['variants'] != ''): ?>
<?php $_from = $this->_tpl_vars['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
<?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?>
  <?php $this->assign('_mc_variant_taxed_price', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['v']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['v']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['v']['price'])))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price'])))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price']))); ?>
  <?php $this->assign('_mc_variant_price', ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['v']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price'])))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))); ?>
<?php endif; ?>
variants[<?php echo $this->_tpl_vars['k']; ?>
] = [<?php echo '['; ?><?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo ''; ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => $this->_tpl_vars['_mc_variant_taxed_price']), $this);?><?php echo ','; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['v']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['v']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['v']['price'])))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price'])))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price'])); ?><?php echo ','; ?><?php endif; ?><?php echo ''; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['avail'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?><?php echo ',new Image(),\''; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['weight'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?><?php echo '\','; ?><?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo ''; ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => $this->_tpl_vars['_mc_variant_price']), $this);?><?php echo ','; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['v']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price'])))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?><?php echo ','; ?><?php endif; ?><?php echo '\''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['v']['productcode'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?><?php echo '\'],'; ?>{<?php echo ''; ?>}<?php echo ','; ?>{<?php echo ''; ?>}<?php echo ',[]'; ?>
];
<?php $_from = $this->_tpl_vars['v']['wholesale']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p'] => $this->_tpl_vars['w']):
?>
<?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?>
  <?php $this->assign('_mc_variant_taxed_wprice', ((is_array($_tmp=@$this->_tpl_vars['w']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price']))); ?>
  <?php $this->assign('_mc_variant_wprice', ((is_array($_tmp=@$this->_tpl_vars['w']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price']))); ?>
<?php endif; ?>  
variants[<?php echo $this->_tpl_vars['k']; ?>
][3][variants[<?php echo $this->_tpl_vars['k']; ?>
][3].length] = [<?php echo ''; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['w']['quantity'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?><?php echo ','; ?><?php if ($this->_tpl_vars['w']['next_quantity']): ?><?php echo ''; ?><?php echo smarty_function_dec(array('value' => $this->_tpl_vars['w']['next_quantity']), $this);?><?php echo ''; ?><?php else: ?><?php echo '0'; ?><?php endif; ?><?php echo ','; ?><?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo ''; ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => $this->_tpl_vars['_mc_variant_taxed_wprice']), $this);?><?php echo ' ,'; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['w']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price'])); ?><?php echo ','; ?><?php endif; ?><?php echo ''; ?>{<?php echo ''; ?>}<?php echo ','; ?><?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo ''; ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => $this->_tpl_vars['_mc_variant_wprice']), $this);?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['w']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price'])); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
];
<?php $_from = $this->_tpl_vars['w']['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kt'] => $this->_tpl_vars['t']):
?>
variants[<?php echo $this->_tpl_vars['k']; ?>
][3][variants[<?php echo $this->_tpl_vars['k']; ?>
][3].length-1][3][<?php echo $this->_tpl_vars['kt']; ?>
] = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php endif; ?>;
<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['v']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
<?php if ($this->_tpl_vars['o'] != ''): ?>
variants[<?php echo $this->_tpl_vars['k']; ?>
][1][<?php echo ((is_array($_tmp=@$this->_tpl_vars['o']['classid'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
] = <?php echo ((is_array($_tmp=@$this->_tpl_vars['o']['optionid'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['v']['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['t']):
?>
variants[<?php echo $this->_tpl_vars['k']; ?>
][2][<?php echo $this->_tpl_vars['id']; ?>
] = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php endif; ?>;
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['v']['is_image']): ?>
variants[<?php echo $this->_tpl_vars['k']; ?>
][0][2].src = "<?php if ($this->_tpl_vars['v']['image_url'] != ''): ?><?php echo $this->_tpl_vars['v']['image_url']; ?>
<?php else: ?><?php if ($this->_tpl_vars['full_url']): ?><?php echo $this->_tpl_vars['http_location']; ?>
<?php else: ?><?php echo $this->_tpl_vars['xcart_web_dir']; ?>
<?php endif; ?>/image.php?id=<?php echo $this->_tpl_vars['k']; ?>
&type=W<?php endif; ?>"; 
variants[<?php echo $this->_tpl_vars['k']; ?>
][0][2]._x = <?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['variant_image_x'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
variants[<?php echo $this->_tpl_vars['k']; ?>
][0][2]._y = <?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['variant_image_y'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

/*
modifiers array: as clasid => array: as optionid => array:
  0 - price_modifier
  1 - modifier_type
  2 - taxes array: as taxid => tax amount
*/
var modifiers = [];
/* names array: as classid => class name */
var names = [];
<?php $_from = $this->_tpl_vars['product_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
names[<?php echo $this->_tpl_vars['v']['classid']; ?>
] = {class_name: "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['v']['class_orig'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['v']['class']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['v']['class'])))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
", options: []};
<?php $_from = $this->_tpl_vars['v']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['opts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['opts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['opts']['iteration']++;
?>
names[<?php echo $this->_tpl_vars['v']['classid']; ?>
]['options'][<?php echo $this->_tpl_vars['o']['optionid']; ?>
] = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['o']['option_name_orig'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['o']['option_name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['o']['option_name'])))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['v']['is_modifier'] == 'Y'): ?>
modifiers[<?php echo $this->_tpl_vars['v']['classid']; ?>
] = {};
<?php $_from = $this->_tpl_vars['v']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['opts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['opts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['opts']['iteration']++;
?>
<?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?>
  <?php if ($this->_tpl_vars['o']['modifier_type'] == "$"): ?>
    <?php echo smarty_function_currency(array('assign' => '_mc_price_modifier','ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['o']['price_modifier'])) ? $this->_run_mod_handler('default', true, $_tmp, "0.00") : smarty_modifier_default($_tmp, "0.00"))), $this);?>

  <?php else: ?>
    <?php $this->assign('_mc_price_modifier', ((is_array($_tmp=@$this->_tpl_vars['o']['price_modifier'])) ? $this->_run_mod_handler('default', true, $_tmp, "0.00") : smarty_modifier_default($_tmp, "0.00"))); ?>
  <?php endif; ?>
<?php endif; ?>
modifiers[<?php echo $this->_tpl_vars['v']['classid']; ?>
][<?php echo $this->_tpl_vars['o']['optionid']; ?>
] = [<?php echo ''; ?><?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['_mc_price_modifier']; ?><?php echo ','; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['o']['price_modifier'])) ? $this->_run_mod_handler('default', true, $_tmp, "0.00") : smarty_modifier_default($_tmp, "0.00")); ?><?php echo ','; ?><?php endif; ?><?php echo '\''; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['o']['modifier_type'])) ? $this->_run_mod_handler('default', true, $_tmp, "$") : smarty_modifier_default($_tmp, "$")); ?><?php echo '\','; ?>{<?php echo ''; ?>}<?php echo ''; ?>
];
<?php $_from = $this->_tpl_vars['o']['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['optt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['optt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['t']):
        $this->_foreach['optt']['iteration']++;
?>
modifiers[<?php echo $this->_tpl_vars['v']['classid']; ?>
][<?php echo $this->_tpl_vars['o']['optionid']; ?>
][2][<?php echo $this->_tpl_vars['id']; ?>
] = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php endif; ?>;
<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

/*
taxes array: as taxid => array()
  0 - calculated tax value for default product price
  1 - tax name
  2 - tax type ($ or %)
  3 - tax value
*/
var taxes = [];
<?php if ($this->_tpl_vars['product']['taxes']): ?>
<?php $_from = $this->_tpl_vars['product']['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tax_name'] => $this->_tpl_vars['tax']):
?>
<?php if ($this->_tpl_vars['tax']['display_including_tax'] == 'Y' && ( $this->_tpl_vars['tax']['display_info'] == 'A' || $this->_tpl_vars['tax']['display_info'] == 'V' )): ?>
taxes[<?php echo $this->_tpl_vars['tax']['taxid']; ?>
] = [<?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['tax']['tax_value'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['tax']['tax_value'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php endif; ?>, "<?php echo $this->_tpl_vars['tax']['tax_display_name']; ?>
", "<?php echo $this->_tpl_vars['tax']['rate_type']; ?>
", "<?php echo $this->_tpl_vars['tax']['rate_value']; ?>
"];
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

/* exceptions array: as exctionid => array: as clasid => optionid */
var exceptions = [];
<?php if ($this->_tpl_vars['product_options_ex'] != ''): ?>
<?php $_from = $this->_tpl_vars['product_options_ex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
exceptions[<?php echo $this->_tpl_vars['k']; ?>
] = [];
<?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
exceptions[<?php echo $this->_tpl_vars['k']; ?>
][<?php echo $this->_tpl_vars['o']['classid']; ?>
] = <?php echo $this->_tpl_vars['o']['optionid']; ?>
;
<?php endforeach; endif; unset($_from); ?> 
<?php endforeach; endif; unset($_from); ?> 
<?php endif; ?>

/*
_product_wholesale array: as id => array:
  0 - quantity
  1 - next quantity
  2 - taxed price
  3 - taxes array: as taxid => tax amount
  4 - original price (without taxes)
*/
var product_wholesale = [];
var _product_wholesale = [];
<?php if ($this->_tpl_vars['product_wholesale'] != ''): ?>
<?php $_from = $this->_tpl_vars['product_wholesale']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
_product_wholesale[<?php echo $this->_tpl_vars['k']; ?>
] = [<?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['quantity'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,<?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['next_quantity'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,<?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['v']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price']))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price'])); ?>
<?php endif; ?>, [], <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['v']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price']))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['price'])); ?>
<?php endif; ?>];
<?php if ($this->_tpl_vars['v']['taxes'] != ''): ?>
<?php $_from = $this->_tpl_vars['v']['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kt'] => $this->_tpl_vars['t']):
?>
_product_wholesale[<?php echo $this->_tpl_vars['k']; ?>
][3][<?php echo $this->_tpl_vars['kt']; ?>
] = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['t'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php endif; ?>;
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

var product_image = new Image();
product_image.src = "<?php if ($this->_tpl_vars['product']['images']['P']['url'] && ( ! $this->_tpl_vars['product']['images']['P']['is_default'] || $this->_tpl_vars['product']['images']['T']['is_default'] )): ?><?php echo $this->_tpl_vars['product']['images']['P']['url']; ?>
<?php elseif ($this->_tpl_vars['product']['images']['T']['url'] && $this->_tpl_vars['product']['images']['P']['is_default'] && ! $this->_tpl_vars['product']['images']['T']['is_default']): ?><?php echo $this->_tpl_vars['product']['images']['T']['url']; ?>
<?php else: ?><?php if ($this->_tpl_vars['full_url']): ?><?php echo $this->_tpl_vars['http_location']; ?>
<?php else: ?><?php echo $this->_tpl_vars['xcart_web_dir']; ?>
<?php endif; ?>/image.php?id=<?php echo $this->_tpl_vars['product']['productid']; ?>
&type=P<?php endif; ?>";
var exception_msg = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_exception_warning'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var exception_msg_html = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_exception_warning'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var txt_out_of_stock = "<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_out_of_stock'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var pconf_price = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['taxed_total_cost'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['taxed_total_cost'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php endif; ?>;
var default_price = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['product']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0'))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['product']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
<?php endif; ?>;
var alter_currency_rate = <?php echo ((is_array($_tmp=@$this->_tpl_vars['config']['General']['alter_currency_rate'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
;
var lbl_no_items_available = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_no_items_available'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var txt_items_available = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_items_available'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var list_price = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['product']['list_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['product']['list_price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
<?php endif; ?>;
var price = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=@$this->_tpl_vars['product']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0'))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['product']['taxed_price'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
<?php endif; ?>;
var orig_price = <?php if ($this->_tpl_vars['active_modules']['XMultiCurrency']): ?><?php echo smarty_function_currency(array('ignore_format' => 'Y','value' => ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['product']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price'])))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0'))), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['product']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['product']['taxed_price']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['product']['taxed_price'])))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
<?php endif; ?>;
var mq = <?php if ($this->_tpl_vars['config']['Appearance']['max_select_quantity'] > $this->_tpl_vars['product']['appearance']['min_quantity']): ?><?php echo $this->_tpl_vars['config']['Appearance']['max_select_quantity']; ?>
<?php else: ?><?php echo $this->_tpl_vars['product']['appearance']['min_quantity']; ?>
<?php endif; ?>;
var dynamic_save_money_enabled = <?php if ($this->_tpl_vars['config']['Product_Options']['dynamic_save_money_enabled'] == 'Y'): ?>true<?php else: ?>false<?php endif; ?>;
var quantity_input_box_enabled = <?php if ($this->_tpl_vars['product']['appearance']['quantity_input_box_enabled']): ?>true<?php else: ?>false<?php endif; ?>;
var max_image_width = <?php echo ((is_array($_tmp=@$this->_tpl_vars['max_image_width'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;
var max_image_height =<?php echo ((is_array($_tmp=@$this->_tpl_vars['max_image_height'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
;

var lbl_item = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_item'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var lbl_items = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_items'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var lbl_quantity = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_quantity'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var lbl_price = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_price_per_item'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var txt_note = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['txt_note'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
var lbl_including_tax = "<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lng']['lbl_including_tax'])) ? $this->_run_mod_handler('wm_remove', true, $_tmp) : smarty_modifier_wm_remove($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";

//]]>
</script>
