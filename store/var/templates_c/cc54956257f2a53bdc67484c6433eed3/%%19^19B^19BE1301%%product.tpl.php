<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from modules/Extra_Fields/product.tpl */ ?>
<?php $_from = $this->_tpl_vars['extra_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
  <?php if ($this->_tpl_vars['v']['active'] == 'Y' && $this->_tpl_vars['v']['field_value']): ?>
    <div class="property-name"><?php echo $this->_tpl_vars['v']['field']; ?>
</div>
    <div class="property-value" colspan="2"><?php echo $this->_tpl_vars['v']['field_value']; ?>
</div>
    <div class="separator"></div>
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>