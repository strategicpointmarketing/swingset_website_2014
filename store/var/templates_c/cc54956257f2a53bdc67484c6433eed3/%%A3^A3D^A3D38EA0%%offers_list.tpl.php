<?php /* Smarty version 2.6.28, created on 2014-03-01 09:20:03
         compiled from modules/Special_Offers/customer/offers_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'amp', 'modules/Special_Offers/customer/offers_list.tpl', 22, false),array('modifier', 'escape', 'modules/Special_Offers/customer/offers_list.tpl', 24, false),)), $this); ?>
<?php func_load_lang($this, "modules/Special_Offers/customer/offers_list.tpl","lbl_sp_offers_of_shop,lbl_sp_offers_not_avail,lbl_sp_promo_not_avail,lbl_sp_show_all_offers,lbl_sp_show_offers_for_cart,lbl_checkout,lbl_continue_shopping,lbl_sp_offers_of_shop"); ?>
<h1><?php echo $this->_tpl_vars['lng']['lbl_sp_offers_of_shop']; ?>
</h1>

<?php ob_start(); ?>

  <?php if ($this->_tpl_vars['offers'] == ""): ?>

    <p class="text-pre-block"><?php echo $this->_tpl_vars['lng']['lbl_sp_offers_not_avail']; ?>
</p>

  <?php else: ?>

    <?php $_from = $this->_tpl_vars['offers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['offers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['offers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['offer']):
        $this->_foreach['offers']['iteration']++;
?>

      <div class="text-block">
        <?php if ($this->_tpl_vars['offer']['promo_long'] != ""): ?>

          <?php if ($this->_tpl_vars['offer']['html_long']): ?>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['promo_long'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>

          <?php else: ?>
            <tt><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['promo_long'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</tt>
          <?php endif; ?>

        <?php elseif ($this->_tpl_vars['offer']['promo_short'] != ""): ?>

          <?php if ($this->_tpl_vars['offer']['html_short']): ?>
            <?php echo $this->_tpl_vars['offer']['promo_short']; ?>

          <?php else: ?>
            <tt><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['promo_short'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</tt>
          <?php endif; ?>

        <?php elseif ($this->_tpl_vars['offer']['offer_name'] != ""): ?>

            <tt><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['offer_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</tt>

        <?php else: ?>

          <?php echo $this->_tpl_vars['lng']['lbl_sp_promo_not_avail']; ?>


        <?php endif; ?>

        <div class="clearing"></div>
      </div>

      <div><img src="<?php echo $this->_tpl_vars['ImagesDir']; ?>
/spacer.gif" width="1" height="<?php if (($this->_foreach['offers']['iteration'] == $this->_foreach['offers']['total'])): ?>5<?php else: ?>20<?php endif; ?>" alt="" /></div>

    <?php endforeach; endif; unset($_from); ?>

    <?php if ($this->_tpl_vars['action'] != 'popup'): ?>

      <div class="buttons-row">
        <?php if ($this->_tpl_vars['mode'] != ""): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_sp_show_all_offers'],'href' => "offers.php?offers_return_url=".($this->_tpl_vars['offers_return_url']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <div class="button-separator"></div>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['mode'] != 'cart' && $this->_tpl_vars['cart_offers']): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_sp_show_offers_for_cart'],'href' => "offers.php?mode=cart&amp;offers_return_url=".($this->_tpl_vars['offers_return_url']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <div class="button-separator"></div>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['offers_return_url']): ?>

          <?php if ($this->_tpl_vars['offers_return_checkout']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_checkout'],'href' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offers_return_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php else: ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_continue_shopping'],'href' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offers_return_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php endif; ?>

        <?php endif; ?>
      </div>
      <div class="clearing"></div>

    <?php endif; ?>

  <?php endif; ?>
<?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>

<?php if ($this->_tpl_vars['action'] == 'popup'): ?>
  <?php echo $this->_smarty_vars['capture']['dialog']; ?>

<?php else: ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_sp_offers_of_shop'],'content' => $this->_smarty_vars['capture']['dialog'],'noborder' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>