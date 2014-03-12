<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from modules/Special_Offers/customer/new_offers_message.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xoffers_promo', 'modules/Special_Offers/customer/new_offers_message.tpl', 8, false),)), $this); ?>
<?php if ($this->_tpl_vars['new_offers_message']['content']): ?>
  <?php echo $this->_tpl_vars['new_offers_message']['content']; ?>

<?php else: ?>
  <?php echo smarty_function_xoffers_promo(array('mode' => 'random'), $this);?>

<?php endif; ?>