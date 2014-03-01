<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:32
         compiled from modules/Gift_Registry/giftreg_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/Gift_Registry/giftreg_search.tpl', 11, false),array('modifier', 'date_format', 'modules/Gift_Registry/giftreg_search.tpl', 101, false),array('function', 'inc', 'modules/Gift_Registry/giftreg_search.tpl', 53, false),)), $this); ?>
<?php func_load_lang($this, "modules/Gift_Registry/giftreg_search.tpl","lbl_giftreg_search,lbl_giftreg_search,lbl_giftreg_creator_name,lbl_giftreg_creator_email,lbl_keyword,lbl_search_description,lbl_giftreg_event_status,lbl_all,lbl_private,lbl_public,lbl_giftreg_event_date_from,lbl_giftreg_event_date_through,lbl_giftreg_search,lbl_events_found,lbl_search_results,lbl_private,lbl_public,lbl_disabled,lbl_event_info,lbl_giftreg_creator_name,lbl_wish_list,lbl_products,lbl_search_results"); ?>
<h1><?php echo $this->_tpl_vars['lng']['lbl_giftreg_search']; ?>
</h1>

<?php ob_start(); ?>

  <form name="searchgiftregform" action="giftregs.php" method="post">
    <table cellspacing="0" class="data-name" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_giftreg_search'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_giftreg_creator_name']; ?>
:</td>
        <td class="data-required">&nbsp;</td>
        <td><input type="text" name="post_data[name]" size="35" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" /></td>
      </tr>

      <tr> 
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_giftreg_creator_email']; ?>
:</td>
        <td class="data-required">&nbsp;</td>
        <td><input type="text" name="post_data[email]" size="35" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" /></td>
      </tr>

      <tr>
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_keyword']; ?>
:</td>
        <td class="data-required">&nbsp;</td>
        <td><input type="text" name="post_data[substring]" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search_data']['substring'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" /></td>
      </tr>

      <tr>
        <td colspan="2">&nbsp;</td>
        <td>
          <label>
            <input type="checkbox" name="post_data[inc_description]" value="Y"<?php if ($this->_tpl_vars['search_data']['inc_description'] == 'Y'): ?> checked="checked"<?php endif; ?> />
            <?php echo $this->_tpl_vars['lng']['lbl_search_description']; ?>

          </label>
        </td>
      </tr>

      <tr> 
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_giftreg_event_status']; ?>
:</td>
        <td class="data-required">&nbsp;</td>
        <td>
          <select name="post_data[status]">
            <option value=""><?php echo $this->_tpl_vars['lng']['lbl_all']; ?>
</option>
            <option value="P"<?php if ($this->_tpl_vars['search_data']['status'] == 'P'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_private']; ?>
</option>
            <option value="G"<?php if ($this->_tpl_vars['search_data']['status'] == 'G'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng']['lbl_public']; ?>
</option>
          </select>
        </td>
      </tr>

      <?php echo smarty_function_inc(array('value' => $this->_tpl_vars['config']['Company']['end_year'],'assign' => 'endyear','inc' => 3), $this);?>

      <tr> 
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_giftreg_event_date_from']; ?>
:</td>
        <td class="data-required">&nbsp;</td>
        <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/datepicker.tpl", 'smarty_include_vars' => array('name' => 'start_date','date' => $this->_tpl_vars['search_data']['start_date'],'end_year' => $this->_tpl_vars['endyear'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
      </tr>

      <tr> 
        <td class="data-name"><?php echo $this->_tpl_vars['lng']['lbl_giftreg_event_date_through']; ?>
:</td>
        <td class="data-required">&nbsp;</td>
        <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/datepicker.tpl", 'smarty_include_vars' => array('name' => 'end_date','date' => $this->_tpl_vars['search_data']['end_date'],'end_year' => $this->_tpl_vars['endyear'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
      </tr>

      <tr> 
        <td colspan="2">&nbsp;</td>
        <td class="button-row"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/search.tpl", 'smarty_include_vars' => array('type' => 'input')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
      </tr>

    </table>

  </form>

<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_giftreg_search'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($_GET['mode'] == 'search'): ?>

  <p><?php echo $this->_tpl_vars['items_count']; ?>
 <?php echo $this->_tpl_vars['lng']['lbl_events_found']; ?>
</p>

<?php endif; ?>

<?php if ($this->_tpl_vars['search_result'] != ""): ?>

  <?php ob_start(); ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <table cellspacing="1" cellpadding="3" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_search_results'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
      <?php $_from = $this->_tpl_vars['search_result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>

        <tr>
          <?php if ($this->_tpl_vars['e']['status'] == 'P'): ?>
          <td class="giftreg-private-status"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_private'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
          <?php elseif ($this->_tpl_vars['e']['status'] == 'G'): ?>
          <td class="giftreg-public-status"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_public'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
          <?php else: ?>
          <td class="giftreg-access-denied-status"><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_disabled'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
          <?php endif; ?>
          <td class="giftreg-event-information"><a href="giftregs.php?eventid=<?php echo $this->_tpl_vars['e']['event_id']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_event_info'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['e']['event_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B %e, %Y") : smarty_modifier_date_format($_tmp, "%B %e, %Y")); ?>
 - <?php echo $this->_tpl_vars['e']['title']; ?>
</a></td>
          <td class="giftreg-creator-name" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_giftreg_creator_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['e']['firstname']; ?>
 <?php echo $this->_tpl_vars['e']['lastname']; ?>
</td>
          <td class="giftreg-products-count"><a href="giftregs.php?eventid=<?php echo $this->_tpl_vars['e']['event_id']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_wish_list'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['e']['products']; ?>
 <?php echo $this->_tpl_vars['lng']['lbl_products']; ?>
</a></td>
        </tr>
        <?php if ($this->_tpl_vars['e']['description'] != ""): ?>
          <tr>
            <td colspan="3"><em><?php echo $this->_tpl_vars['e']['description']; ?>
</em></td>
          </tr>
        <?php endif; ?>

        <tr>
          <td colspan="4"><hr /></td>
        </tr>

      <?php endforeach; endif; unset($_from); ?>

    </table>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_search_results'],'content' => $this->_smarty_vars['capture']['dialog'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>