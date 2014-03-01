<?php /* Smarty version 2.6.28, created on 2014-02-28 16:09:06
         compiled from customer/main/welcome.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getvar', 'customer/main/welcome.tpl', 8, false),)), $this); ?>
<?php func_load_lang($this, "customer/main/welcome.tpl","txt_welcome,lbl_new_arrivals,lbl_on_sale,lbl_featured_products"); ?><div class="welcome-table">

  <?php if ($this->_tpl_vars['active_modules']['Bestsellers']): ?>
    <?php echo smarty_function_getvar(array('var' => 'bestsellers','func' => 'func_tpl_get_bestsellers'), $this);?>

  <?php endif; ?>

	<div class="welcome-cell<?php if ($this->_tpl_vars['active_modules']['Bestsellers'] && $this->_tpl_vars['bestsellers'] && $this->_tpl_vars['config']['Bestsellers']['bestsellers_menu'] == 'Y'): ?> with-bestsellers<?php endif; ?>">
	
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/home_page_banner.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 		<?php echo $this->_tpl_vars['lng']['txt_welcome']; ?>


		<?php if ($this->_tpl_vars['active_modules']['Bestsellers'] && $this->_tpl_vars['config']['Bestsellers']['bestsellers_menu'] != 'Y'): ?>
		  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Bestsellers/bestsellers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br />
		<?php endif; ?>
		<?php if ($this->_tpl_vars['active_modules']['Bestsellers'] && $this->_tpl_vars['bestsellers']): ?>
			<?php $this->assign('row_length', 2); ?>
		<?php else: ?>
			<?php $this->assign('row_length', false); ?>
		<?php endif; ?>

        <script type="text/javascript">
          <?php echo '
          //<![CDATA[
          $(function() {
            if (isLocalStorageSupported()) {
              var _storage_key = \'welcome-tabs\'+xcart_web_dir;
              // Take into account EU cookie law
              var _used_storage = (\'function\' != typeof window.func_is_allowed_cookie || func_is_allowed_cookie(\'welcome-tabs\')) ? localStorage : sessionStorage;
              var myOpts = {
                active   : parseInt(_used_storage[_storage_key]) || 0,
                activate : function( event, ui ){
                    _used_storage[_storage_key] = ui.newTab.index();
                }
              };
            } else {
              var myOpts = {}
            }

            $(\'#welcome-tabs-container\').tabs(myOpts);
          });
          //]]>
          '; ?>

        </script>	
        <div id="welcome-tabs-container">
          <ul>
            <?php if ($this->_tpl_vars['active_modules']['New_Arrivals'] && $this->_tpl_vars['new_arrivals'] && $this->_tpl_vars['config']['New_Arrivals']['new_arrivals_home'] == 'Y'): ?>
              <li><a href="#new-arrivals"><?php echo $this->_tpl_vars['lng']['lbl_new_arrivals']; ?>
</a></li>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['active_modules']['On_Sale'] && $this->_tpl_vars['on_sale_products'] && $this->_tpl_vars['config']['On_Sale']['on_sale_home'] == 'Y'): ?>
              <li><a href="#on-sale"><?php echo $this->_tpl_vars['lng']['lbl_on_sale']; ?>
</a></li>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['f_products']): ?>
              <li><a href="#featured-products"><?php echo $this->_tpl_vars['lng']['lbl_featured_products']; ?>
</a></li>
            <?php endif; ?>
          </ul>
          <?php if ($this->_tpl_vars['active_modules']['New_Arrivals'] && $this->_tpl_vars['new_arrivals'] && $this->_tpl_vars['config']['New_Arrivals']['new_arrivals_home'] == 'Y'): ?>
            <div id="new-arrivals">
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/New_Arrivals/new_arrivals.tpl", 'smarty_include_vars' => array('is_home_page' => 'Y','noborder' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['active_modules']['On_Sale'] && $this->_tpl_vars['on_sale_products'] && $this->_tpl_vars['config']['On_Sale']['on_sale_home'] == 'Y'): ?>
            <div id="on-sale">
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/On_Sale/on_sale.tpl", 'smarty_include_vars' => array('is_home_page' => 'Y','noborder' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['f_products']): ?>
            <div id="featured-products">
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/main/featured.tpl", 'smarty_include_vars' => array('row_length' => $this->_tpl_vars['row_length'],'noborder' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
          <?php endif; ?>
          </div>
	</div>

	<?php if ($this->_tpl_vars['active_modules']['Bestsellers'] && $this->_tpl_vars['bestsellers']): ?>
	<div class="bestsellers-cell">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Bestsellers/menu_bestsellers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<?php endif; ?>
</div>
<div class="clearing"></div>