<?php /* Smarty version 2.6.28, created on 2014-02-28 16:12:57
         compiled from main/evaluation.tpl */ ?>
<?php if ($this->_tpl_vars['is_enabled_evaluation_popup']): ?>
<script type="text/javascript">
//<![CDATA[
  <?php if ($this->_tpl_vars['shop_evaluation'] == 'WRONG_DOMAIN'): ?>
    var _popup_sets = {width:700,minHeight:425,closeOnEscape:true};
  <?php else: ?>
    var _popup_sets = {width:700,minHeight:529,closeOnEscape:true};
  <?php endif; ?>
<?php echo '
$(document).ready(function () {
  return popupOpen(\'popup_info.php?action=evaluationPopup\', \'\', _popup_sets);
});
'; ?>

//]]>
</script>
<?php endif; ?>