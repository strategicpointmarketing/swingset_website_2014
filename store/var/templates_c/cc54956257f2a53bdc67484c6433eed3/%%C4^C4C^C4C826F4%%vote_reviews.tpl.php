<?php /* Smarty version 2.6.28, created on 2014-03-01 09:27:05
         compiled from modules/Customer_Reviews/vote_reviews.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'modules/Customer_Reviews/vote_reviews.tpl', 47, false),array('modifier', 'nl2br', 'modules/Customer_Reviews/vote_reviews.tpl', 48, false),array('modifier', 'amp', 'modules/Customer_Reviews/vote_reviews.tpl', 48, false),array('modifier', 'escape', 'modules/Customer_Reviews/vote_reviews.tpl', 71, false),)), $this); ?>
<?php func_load_lang($this, "modules/Customer_Reviews/vote_reviews.tpl","lbl_customers_rating,lbl_customer_reviews,lbl_customers_rating,lbl_customer_reviews,lbl_author,lbl_unknown,lbl_unknown,txt_no_customer_reviews,lbl_add_your_review,lbl_add_your_review,lbl_your_name,lbl_your_message,lbl_add_review,txt_you_already_voted,lbl_customers_feedback"); ?><?php if ($this->_tpl_vars['printable'] != 'Y' || $this->_tpl_vars['reviews']): ?>

  <?php ob_start(); ?>

    <?php if ($this->_tpl_vars['active_modules']['Socialize'] && $this->_tpl_vars['config']['Socialize']['soc_fb_comments_enabled'] == 'Y'): ?>

      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_customers_rating'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       <script type="text/javascript">
        //<![CDATA[
          document.write('<fb:like href="<?php echo $this->_tpl_vars['current_location']; ?>
/<?php echo $this->_tpl_vars['canonical_url']; ?>
" layout="standard" send="false" width="" show_faces="true" font=""></fb:like>');
        //]]>
      </script>
      <div class="top-margin-15">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_customer_reviews'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <script type="text/javascript">
        //<![CDATA[
          document.write('<fb:comments href="<?php echo $this->_tpl_vars['current_location']; ?>
/<?php echo $this->_tpl_vars['canonical_url']; ?>
" num_posts="5" width=""></fb:comments>');
        //]]>
        </script>
      </div>

    <?php else: ?>

    <?php if ($this->_tpl_vars['product']['rating_data']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_customers_rating'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

      <?php if ($this->_tpl_vars['active_modules']['Customer_Reviews'] && $this->_tpl_vars['config']['Customer_Reviews']['ajax_rating'] == 'Y'): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Customer_Reviews/ajax.rating.tpl", 'smarty_include_vars' => array('_include_once' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>

      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Customer_Reviews/vote_bar.tpl", 'smarty_include_vars' => array('productid' => $this->_tpl_vars['product']['productid'],'rating' => $this->_tpl_vars['product']['rating_data'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['config']['Customer_Reviews']['customer_reviews'] == 'Y'): ?>

      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_customer_reviews'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

      <?php if ($this->_tpl_vars['reviews']): ?>

        <ul class="creviews-reviews-list">
          <?php $_from = $this->_tpl_vars['reviews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['r']):
?>
            <li>
              <?php echo $this->_tpl_vars['lng']['lbl_author']; ?>
: <strong><?php echo ((is_array($_tmp=@$this->_tpl_vars['r']['email'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lng']['lbl_unknown']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lng']['lbl_unknown'])); ?>
</strong><br />
              <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['r']['message'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>

            </li>
          <?php endforeach; endif; unset($_from); ?>
        </ul>

      <?php else: ?>

        <div class="creviews-reviews-list"><?php echo $this->_tpl_vars['lng']['txt_no_customer_reviews']; ?>
</div>

      <?php endif; ?>

    <?php endif; ?>

    <?php if ($this->_tpl_vars['printable'] != 'Y' && $this->_tpl_vars['allow_review']): ?>

      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['lng']['lbl_add_your_review'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

      <?php if ($this->_tpl_vars['allow_add_review']): ?>

        <form method="post" action="product.php">
          <input type="hidden" name="mode" value="add_review" />
          <input type="hidden" name="productid" value='<?php echo $this->_tpl_vars['product']['productid']; ?>
' />

          <table cellspacing="1" class="data-table" summary="<?php echo ((is_array($_tmp=$this->_tpl_vars['lng']['lbl_add_your_review'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">

            <tr>
              <td class="data-name"><label for="review_author"><?php echo $this->_tpl_vars['lng']['lbl_your_name']; ?>
</label>:</td>
              <td class="data-required">*</td>
              <td>
                <input type="text" size="24" maxlength="128" name="review_author" id="review_author" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['review']['author'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
" />
                <?php if ($this->_tpl_vars['review']['author'] == "" && $this->_tpl_vars['review']['error']): ?>
                  <span class="data-required">&lt;&lt;</span>
                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <td class="data-name"><label for="review_message"><?php echo $this->_tpl_vars['lng']['lbl_your_message']; ?>
</label>:</td>
              <td class="data-required">*</td>
              <td>
                <textarea cols="40" rows="4" name="review_message" id="review_message"><?php echo ((is_array($_tmp=$this->_tpl_vars['review']['message'])) ? $this->_run_mod_handler('amp', true, $_tmp) : smarty_modifier_amp($_tmp)); ?>
</textarea>
                <?php if ($this->_tpl_vars['review']['message'] == "" && $this->_tpl_vars['review']['error']): ?>
                  <span class="data-required">&lt;&lt;</span>
                <?php endif; ?>
              </td>
            </tr>

            <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/buttons/button.tpl", 'smarty_include_vars' => array('button_title' => $this->_tpl_vars['lng']['lbl_add_review'],'type' => 'input')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('submit_button', ob_get_contents()); ob_end_clean();
 ?>

            <?php if ($this->_tpl_vars['active_modules']['Image_Verification'] && $this->_tpl_vars['show_antibot']['on_reviews'] == 'Y'): ?>
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Image_Verification/spambot_arrest.tpl", 'smarty_include_vars' => array('mode' => "data-table",'id' => $this->_tpl_vars['antibot_sections']['on_reviews'],'antibot_err' => $this->_tpl_vars['review']['antibot_err'],'button_code' => $this->_tpl_vars['submit_button'],'antibot_name_prefix' => '_on_reviews')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
            <tr>
              <td colspan="2">&nbsp;</td>
              <td class="button-row">
                  <?php echo $this->_tpl_vars['submit_button']; ?>

              </td>
            </tr>
            <?php endif; ?>

          </table>

        </form>

      <?php else: ?>

        <?php echo $this->_tpl_vars['lng']['txt_you_already_voted']; ?>


      <?php endif; ?>

    <?php endif; ?>

    <?php endif; ?>

  <?php $this->_smarty_vars['capture']['dialog'] = ob_get_contents(); ob_end_clean(); ?>

  <?php if ($this->_tpl_vars['nodialog']): ?>
    <?php echo $this->_smarty_vars['capture']['dialog']; ?>

  <?php else: ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/dialog.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['dialog'],'title' => $this->_tpl_vars['lng']['lbl_customers_feedback'],'additional_class' => "creviews-dialog")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>

<?php endif; ?>