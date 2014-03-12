<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from main/prnotice.tpl */ ?>
<?php if ($this->_tpl_vars['main'] == 'catalog' && $this->_tpl_vars['current_category']['category'] == ""): ?>
  Powered by X-Cart <a href="http://www.x-cart.com"><?php echo $this->_tpl_vars['sm_prnotice_txt']; ?>
</a>
<?php else: ?>
  Powered by X-Cart <?php echo $this->_tpl_vars['sm_prnotice_txt']; ?>

<?php endif; ?>