<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:32
         compiled from main/datepicker.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'main/datepicker.tpl', 6, false),array('modifier', 'escape', 'main/datepicker.tpl', 6, false),array('modifier', 'date_format', 'main/datepicker.tpl', 6, false),array('modifier', 'lower', 'main/datepicker.tpl', 12, false),)), $this); ?>

<input id="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="datepicker-formatted" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['date'])) ? $this->_run_mod_handler('default', true, $_tmp, XC_TIME) : smarty_modifier_default($_tmp, XC_TIME)))) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['Appearance']['date_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['Appearance']['date_format'])); ?>
" />
<script type="text/javascript">
//<![CDATA[

$(document).ready(function () {

$.datepicker.setDefaults($.datepicker.regional["<?php echo ((is_array($_tmp=$this->_tpl_vars['shop_language'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
"]);

// Original input object
var dp_in = $("#<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
");

// Create a hidden field that will contain timestamp
// generated on-the-fly when setting date
var dp_ts = $(document.createElement('input'))
  .attr('type', 'hidden')
  .attr('name', '<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')
  .attr('id', '<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')
  .val('<?php echo ((is_array($_tmp=@$this->_tpl_vars['date'])) ? $this->_run_mod_handler('default', true, $_tmp, XC_TIME) : smarty_modifier_default($_tmp, XC_TIME)); ?>
');

// Change attributes of an original object
$(dp_in)
  .attr('id',   'f_<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')
  .attr('name', 'f_<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');

$(dp_ts).insertAfter(dp_in);

var opts = {
  yearRange:   '<?php echo ((is_array($_tmp=@$this->_tpl_vars['start_year'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['Company']['start_year']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['Company']['start_year'])); ?>
:<?php echo ((is_array($_tmp=@$this->_tpl_vars['end_year'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['config']['Company']['end_year']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['config']['Company']['end_year'])); ?>
',
  dateFormat:  '<?php echo $this->_tpl_vars['config']['Appearance']['ui_date_format']; ?>
',
  altFormat:   'yy-mm-dd',
  altField:    '#<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
  changeMonth: <?php echo ((is_array($_tmp=@$this->_tpl_vars['changeMonth'])) ? $this->_run_mod_handler('default', true, $_tmp, 'true') : smarty_modifier_default($_tmp, 'true')); ?>
,
  changeYear:  <?php echo ((is_array($_tmp=@$this->_tpl_vars['changeYear'])) ? $this->_run_mod_handler('default', true, $_tmp, 'true') : smarty_modifier_default($_tmp, 'true')); ?>
,
  showOn:      'both',
  buttonImage: '<?php echo $this->_tpl_vars['ImagesDir']; ?>
/calendar.png',
  buttonImageOnly: true

};

$("#f_<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
")
  .datepicker(opts)
  .bind('change', function() {
    var re = new RegExp(/000$/);
    $('#<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').val($('#<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').val().replace(re, ''));
    <?php if ($this->_tpl_vars['dp_onchange'] != ''): ?>
      <?php echo $this->_tpl_vars['dp_onchange']; ?>

    <?php endif; ?>
              
  })

}) // $(document).ready(function () {

//]]>
</script>