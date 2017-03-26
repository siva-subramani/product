<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "module:amzpayments/views/templates/front/amzpayments_bs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105163203358942b982eb5a7-35590022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d318cd0e27efc3630d659c18b239b7c30241d49' => 
    array (
      0 => 'module:amzpayments/views/templates/front/amzpayments_bs.tpl',
      1 => 1486104292,
      2 => 'module',
    ),
    'bfba1ad2ec7692df1b87e0f3782690342b22feb9' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/page.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    'f703e867109f904d7f603f45b35620689a54279a' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/layouts/layout-full-width.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    'ce49bac9f1cae0809923106b83be3fb270be41d6' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/layouts/layout-both-columns.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    '5315046dd6f88518da888fae1add13a5e51bbcd9' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/_partials/stylesheets.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    'eed91c3e3d347460ec4a4d13ff33d1f63b12bc80' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/_partials/javascript.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    '3b31d8d24d0e9913e2cd90512cde52626d77c24f' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/_partials/head.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    '0c0d36058aa080b04255003f776a75940d95e489' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/catalog/_partials/product-activation.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    '0c6096b0d49d7b6b50b86e67f3bfea40aac941d7' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/_partials/header.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    'c48cbd861aa6bc97362514777214789096be5749' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/_partials/notifications.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    'a825837777ee123ccbb170578b5d8f4805c921a6' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/_partials/breadcrumb.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
    'de8a977d0166f012ff1efdf14fa253ea1699229e' => 
    array (
      0 => 'module:amzpayments/views/templates/front/_coupon.tpl',
      1 => 1486104292,
      2 => 'module',
    ),
    'd1fed8d8773d9d4af25863b5ec6f4ad49eaeae16' => 
    array (
      0 => 'module:amzpayments/views/templates/front/_carriers.tpl',
      1 => 1486104292,
      2 => 'module',
    ),
    '42367355acfc466149e3a6847f9f9b8cafc9f43c' => 
    array (
      0 => 'module:amzpayments/views/templates/front/_conditions.tpl',
      1 => 1486104292,
      2 => 'module',
    ),
    '22f168e978290a7f77b3d05f791d7bef9f44c633' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/_partials/footer.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105163203358942b982eb5a7-35590022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout' => 0,
    'language' => 0,
    'page' => 0,
    'javascript' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58942b9838b3b9_47236791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58942b9838b3b9_47236791')) {function content_58942b9838b3b9_47236791($_smarty_tpl) {?><!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
    
      <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b982fdea5_19359327($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/head.tpl" */?>
    
  </head>

  <body id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames($_smarty_tpl->tpl_vars['page']->value['body_classes']), ENT_QUOTES, 'UTF-8');?>
">

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAfterBodyOpeningTag'),$_smarty_tpl);?>


    <main id="page">
      
        <?php /*  Call merged included template "catalog/_partials/product-activation.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b98319220_78161717($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-activation.tpl" */?>
      
      <header id="header" class="header-container">
        
          <?php /*  Call merged included template "_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b9831caa4_03081231($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/header.tpl" */?>
        
      </header>
      
        <?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b98320ca2_04927076($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/notifications.tpl" */?>
      
      
        <?php /*  Call merged included template "_partials/breadcrumb.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b9832a219_29316675($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/breadcrumb.tpl" */?>
      
      <section id="wrapper">
        <div id="columns" class="container">
          <section id="main">
          <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name']=='index') {?>
			  <section id="slider" class="page-content">
				<div id="slider_row">
				  
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayTopColumn'),$_smarty_tpl);?>

				  
				</div>
			  </section>
          <?php }?>
          <div id="content" class="page-content">
          

          
  <div id="content-wrapper">
    

  

    
      
    

    
      
        
        
<div id="amzOverlay"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amz_module_path']->value, ENT_QUOTES, 'UTF-8');?>
views/img/loading_indicator.gif" /></div>

<section id="main">
	<header class="page-header">
		<h1><?php echo smartyTranslate(array('s'=>'Pay with Amazon','mod'=>'amzpayments'),$_smarty_tpl);?>
</h1>
	</header>
	<section id="content" class="page-content">

		<div class="row">
			<div class="col-xs-12 col-sm-6" id="addressBookWidgetDivBs">
			</div>
			<div class="col-xs-12 col-sm-6" id="walletWidgetDivBs">
			</div>	
		</div>
		
		<div class="row">
			<div class="col-xs-12 amz_cart_coupon">
				<div id="amz_coupon">
					<?php /*  Call merged included template "module:amzpayments/views/templates/front/_coupon.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("module:amzpayments/views/templates/front/_coupon.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b9833ea57_64077966($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:amzpayments/views/templates/front/_coupon.tpl" */?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 amz_cart_widgets_bs">
				<div id="amz_carriers" style="display: none;">
					<?php /*  Call merged included template "module:amzpayments/views/templates/front/_carriers.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("module:amzpayments/views/templates/front/_carriers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b98345bd7_74829189($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:amzpayments/views/templates/front/_carriers.tpl" */?>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" id="amz_terms" style="display: none;">
				<?php /*  Call merged included template "module:amzpayments/views/templates/front/_conditions.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("module:amzpayments/views/templates/front/_conditions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b98356f91_81760117($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:amzpayments/views/templates/front/_conditions.tpl" */?>
			</div>
		</div>
				
		<?php if ($_smarty_tpl->tpl_vars['show_amazon_account_creation_allowed']->value) {?>
			<?php if ($_smarty_tpl->tpl_vars['force_account_creation']->value) {?>
				<input type="hidden" id="connect_amz_account" value="1" name="connect_amz_account" />
			<?php } else { ?>
				<div class="row">
					<div class="col-xs-12" id="amz_connect_accounts_div" style="display: none;">
  			          <div class="pull-xs-left">
            			  <span class="custom-checkbox">
			                <input id="connect_amz_account" name="connect_amz_account" type="checkbox" value = "1" />
            			    <span><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
              			  </span>
            		  </div>
            		  <div class="condition-label">
              			<label for="connect_amz_account">
                			<?php echo smartyTranslate(array('s'=>'Create customer account.','mod'=>'amzpayments'),$_smarty_tpl);?>

							<br />
							<span style="font-size: 10px;"><?php echo smartyTranslate(array('s'=>'You don\'t need to do anything. We create the account with the data of your current order.','mod'=>'amzpayments'),$_smarty_tpl);?>
</span>
              			</label>
            		  </div>
					</div>
				</div>
			<?php }?>
		<?php }?>
		
		<div class="row">
			<div class="col-xs-12 amz_cart_widgets_summary amz_cart_widgets_summary_bs" id="amz_cart_widgets_summary"  style="display: none;"></div>
		</div>

		<div class="row">
			<div class="col-xs-12 text-right" id="amz_execute_order_div" style="display: none;">
				<input type="button" id="amz_execute_order" class="btn btn-primary disabled" value="<?php echo smartyTranslate(array('s'=>'Order with an obligation to pay','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
" name="Submit" disabled="disabled">
			</div>
		</div>
		<div style="clear:both"></div>

  		<div class="modal fade" id="modal">
    		<div class="modal-dialog" role="document">
      			<div class="modal-content">
      			</div>
    		</div>
  		</div>

	</section>
	<footer class="page-footer"></footer>
</section>


<?php if ($_smarty_tpl->tpl_vars['sandboxMode']->value) {?>

<?php }?>


<script> 
var isFirstRun = true;
var amazonOrderReferenceId = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amz_session']->value, ENT_QUOTES, 'UTF-8');?>
';	
jQuery(document).ready(function($) {
	var amzAddressSelectCounter = 0;
	
	new OffAmazonPayments.Widgets.AddressBook({
		sellerId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sellerID']->value, ENT_QUOTES, 'UTF-8');?>
',
		<?php if ($_smarty_tpl->tpl_vars['amz_session']->value=='') {?>
		onOrderReferenceCreate: function(orderReference) {			
			 amazonOrderReferenceId = orderReference.getAmazonOrderReferenceId();
             $.ajax({
                 type: 'GET',
                 url: REDIRECTAMZ,
                 data: 'allow_refresh=1&ajax=true&method=setsession&amazon_id=' + orderReference.getAmazonOrderReferenceId(),
                 success: function(htmlcontent){
                	 
                 }
        	});
		},
        <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['amz_session']->value!='') {?>amazonOrderReferenceId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amz_session']->value, ENT_QUOTES, 'UTF-8');?>
', <?php }?>
		onAddressSelect: function(orderReference) {
			if (isFirstRun) {
				setTimeout(function() { 
					$("#carrier_area").hide();
					updateAddressSelection(amazonOrderReferenceId); 
					isFirstRun = false; 
					setTimeout(function() {
						updateAddressSelection(amazonOrderReferenceId);
						$("#carrier_area").fadeIn();
					}, 1000); 
				}, 1000);
			} else {
				updateAddressSelection(amazonOrderReferenceId);		
			}
		},
		design: {
			designMode: 'responsive'
		},
		onError: function(error) {
			console.log(error.getErrorCode());
			console.log(error.getErrorMessage());
		}
	}).bind("addressBookWidgetDivBs");
	
	new OffAmazonPayments.Widgets.Wallet({
		sellerId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sellerID']->value, ENT_QUOTES, 'UTF-8');?>
',
		<?php if ($_smarty_tpl->tpl_vars['amz_session']->value!='') {?>amazonOrderReferenceId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amz_session']->value, ENT_QUOTES, 'UTF-8');?>
', <?php }?>
		design: {
			designMode: 'responsive'
		},
		onPaymentSelect: function(orderReference) {
		},
		onError: function(error) {
			console.log(error.getErrorMessage());
		}
	}).bind("walletWidgetDivBs");
});

function reCreateWalletWidget() {
	$("#walletWidgetDivBs").html('');
	new OffAmazonPayments.Widgets.Wallet({
		sellerId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sellerID']->value, ENT_QUOTES, 'UTF-8');?>
',
		<?php if ($_smarty_tpl->tpl_vars['amz_session']->value!='') {?>amazonOrderReferenceId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amz_session']->value, ENT_QUOTES, 'UTF-8');?>
', <?php }?>
		design: {
			designMode: 'responsive'
		},
		onPaymentSelect: function(orderReference) {
			$("#cgv").trigger('change');
		},
		onError: function(error) {
			console.log(error.getErrorMessage());
		}
	}).bind("walletWidgetDivBs");		
}
function reCreateAddressBookWidget() {
	$("#addressBookWidgetDivBs").html('');
	new OffAmazonPayments.Widgets.AddressBook({
		sellerId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sellerID']->value, ENT_QUOTES, 'UTF-8');?>
',
		<?php if ($_smarty_tpl->tpl_vars['amz_session']->value!='') {?>amazonOrderReferenceId: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amz_session']->value, ENT_QUOTES, 'UTF-8');?>
', <?php }?>
		onAddressSelect: function(orderReference) {
			updateAddressSelection(amazonOrderReferenceId);			
		},
		design: {
			designMode: 'responsive'
		},
		onError: function(error) {		
			console.log(error.getErrorMessage());
		}
	}).bind("addressBookWidgetDivBs");	
}
</script>



      
    

    
      <footer class="page-footer">
        
          <!-- Footer content -->
        
      </footer>
    

  


  </div>


          
          </div>
          </section>
        </div>
      </section>

      <footer id="footer" class="footer-container">
        
          <?php /*  Call merged included template "_partials/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '105163203358942b982eb5a7-35590022');
content_58942b98387b67_78747840($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer.tpl" */?>
        
      </footer>

    </main>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>


    
      <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '105163203358942b982eb5a7-35590022');
content_58942b9830d8c5_85429434($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    

  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b982fdea5_19359327')) {function content_58942b982fdea5_19359327($_smarty_tpl) {?><meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">


  <title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
</title>
  <meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
">
  <meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['keywords'], ENT_QUOTES, 'UTF-8');?>
">
  <?php if ($_smarty_tpl->tpl_vars['page']->value['meta']['robots']!=='index') {?>
    <meta name="robots" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['robots'], ENT_QUOTES, 'UTF-8');?>
">
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['page']->value['canonical']) {?>
    <link rel="canonical" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['canonical'], ENT_QUOTES, 'UTF-8');?>
">
  <?php }?>


<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon'], ENT_QUOTES, 'UTF-8');?>
?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon_update_time'], ENT_QUOTES, 'UTF-8');?>
">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon'], ENT_QUOTES, 'UTF-8');?>
?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon_update_time'], ENT_QUOTES, 'UTF-8');?>
">


  <?php /*  Call merged included template "_partials/stylesheets.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '105163203358942b982eb5a7-35590022');
content_58942b98307a26_34795765($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>


<script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
js/jquery/jquery-1.11.0.min.js"></script>


  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '105163203358942b982eb5a7-35590022');
content_58942b9830d8c5_85429434($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>



  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b98307a26_34795765')) {function content_58942b98307a26_34795765($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesheets']->value['external']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" type="text/css" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['media'], ENT_QUOTES, 'UTF-8');?>
">
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesheets']->value['inline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
  <style>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['content'], ENT_QUOTES, 'UTF-8');?>

  </style>
<?php } ?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b9830d8c5_85429434')) {function content_58942b9830d8c5_85429434($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['javascript']->value['external']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
  <script type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['attribute'], ENT_QUOTES, 'UTF-8');?>
></script>
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['javascript']->value['inline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
  <script type="text/javascript">
    <?php echo $_smarty_tpl->tpl_vars['js']->value['content'];?>

  </script>
<?php } ?>

<?php if (isset($_smarty_tpl->tpl_vars['vars']->value)&&count($_smarty_tpl->tpl_vars['vars']->value)) {?>
  <script type="text/javascript">
    <?php  $_smarty_tpl->tpl_vars['var_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var_value']->_loop = false;
 $_smarty_tpl->tpl_vars['var_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var_value']->key => $_smarty_tpl->tpl_vars['var_value']->value) {
$_smarty_tpl->tpl_vars['var_value']->_loop = true;
 $_smarty_tpl->tpl_vars['var_name']->value = $_smarty_tpl->tpl_vars['var_value']->key;
?>
    var <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
 = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['var_value']->value);?>
;
    <?php } ?>
  </script>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/catalog/_partials/product-activation.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b98319220_78161717')) {function content_58942b98319220_78161717($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page']->value['admin_notifications']) {?>
  <div class="alert alert-warning row" role="alert">
    <div class="container">
      <div class="row">
        <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value['admin_notifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
          <div class="col-sm-12">
            <i class="material-icons pull-xs-left">&#xE001;</i>
            <p class="alert-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value['message'], ENT_QUOTES, 'UTF-8');?>
</p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b9831caa4_03081231')) {function content_58942b9831caa4_03081231($_smarty_tpl) {?>
  <div class="header-banner banner">
    <div class="container">
      <div class="row">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBanner'),$_smarty_tpl);?>

      </div>
    </div>
  </div>



  <nav class="header-nav nav">
    <div class="container">
      <div class="row">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayNav'),$_smarty_tpl);?>

      </div>
    </div>
  </nav>



  <div class="header-top content">
    <div class="container">
      <div class="row">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayTop'),$_smarty_tpl);?>

      </div>
    </div>
  </div>
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayNavFullWidth'),$_smarty_tpl);?>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b98320ca2_04927076')) {function content_58942b98320ca2_04927076($_smarty_tpl) {?>
<aside id="notifications">
  <div class="container">
    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['error']) {?>
      <article class="alert alert-danger" role="alert" data-alert="danger">
        <ul>
          <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
            <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
          <?php } ?>
        </ul>
      </article>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['warning']) {?>
      <article class="alert alert-warning" role="alert" data-alert="warning">
        <ul>
          <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['warning']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
            <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
          <?php } ?>
        </ul>
      </article>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['success']) {?>
      <article class="alert alert-success" role="alert" data-alert="success">
        <ul>
          <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['success']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
            <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
          <?php } ?>
        </ul>
      </article>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['info']) {?>
      <article class="alert alert-info" role="alert" data-alert="info">
        <ul>
          <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
            <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
          <?php } ?>
        </ul>
      </article>
    <?php }?>
  </div>
</aside>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/_partials/breadcrumb.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b9832a219_29316675')) {function content_58942b9832a219_29316675($_smarty_tpl) {?><section id="wrapper-header">
    <div class="container">
        <div class="row">
            <div class="page-header-right">
              <?php  $_smarty_tpl->tpl_vars['path'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['path']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['path']->key => $_smarty_tpl->tpl_vars['path']->value) {
$_smarty_tpl->tpl_vars['path']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumb']['iteration']==$_smarty_tpl->tpl_vars['breadcrumb']->value['count']) {?>
                  <h1 data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['breadcrumb']->value['count'], ENT_QUOTES, 'UTF-8');?>
" class="page-header-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h1>
                <?php }?>
              <?php } ?>
            </div>
            <div class="page-header-left">
                <nav data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['breadcrumb']->value['count'], ENT_QUOTES, 'UTF-8');?>
" class="breadcrumb">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <?php  $_smarty_tpl->tpl_vars['path'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['path']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['path']->key => $_smarty_tpl->tpl_vars['path']->value) {
$_smarty_tpl->tpl_vars['path']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']++;
?>
					  
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                          <a itemprop="item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
                            <span itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
                          </a>
                          <meta itemprop="position" content="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumb']['iteration'], ENT_QUOTES, 'UTF-8');?>
">
                        </li>
                      
                    <?php } ?>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "module:amzpayments/views/templates/front/_coupon.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b9833ea57_64077966')) {function content_58942b9833ea57_64077966($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['allowed']) {?>
  <div class="block-promo">
    <div class="cart-voucher">
      <?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']) {?>
        <h3>
        	<?php echo smartyTranslate(array('s'=>'Redeemed vouchers','mod'=>'amzpayments'),$_smarty_tpl);?>

        </h3>
        <div class="promo-list">
          <ul class="promo-name card-block">
            <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
              <li class="cart-summary-line">
                <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                <a href="JavaScript:void(0)" data-voucher-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['id_cart_rule'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="remove-voucher" class="remove-voucher-a"><i class="material-icons"><?php echo smartyTranslate(array('s'=>'delete','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</i></a>
                <div class="pull-xs-right">
                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['reduction_formatted'], ENT_QUOTES, 'UTF-8');?>

                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      <?php }?>
      <p>
        <a class="collapse-button promo-code-button" data-toggle="collapse" href="#promo-code" aria-expanded="false" aria-controls="promo-code">
          <?php echo smartyTranslate(array('s'=>'Have a promo code?','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        </a>
      </p>    
      <div class="promo-code collapse" id="promo-code">
        <input id="promo-input" class="promo-input" type="text" name="discount_name" placeholder="<?php echo smartyTranslate(array('s'=>'Promo code','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
">
        <button type="button" class="btn btn-primary" id="promo-input-btn"><span><?php echo smartyTranslate(array('s'=>'Add','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span></button>        
      </div>
    </div>
  </div>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "module:amzpayments/views/templates/front/_carriers.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b98345bd7_74829189')) {function content_58942b98345bd7_74829189($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['delivery_options']->value)) {?>

  <div id="hook-display-before-carrier">
    <?php echo $_smarty_tpl->tpl_vars['hookDisplayBeforeCarrier']->value;?>

  </div>
  
  <?php if (count($_smarty_tpl->tpl_vars['delivery_options']->value)) {?>
    <h3><?php echo smartyTranslate(array('s'=>'Please select your shipping method','mod'=>'amzpayments'),$_smarty_tpl);?>
</h3>
  <?php }?>

  <div class="delivery-options-list">
    <?php if (count($_smarty_tpl->tpl_vars['delivery_options']->value)) {?>
    
        <div class="form-fields">
          
            <div class="delivery-options">
              <?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_smarty_tpl->tpl_vars['carrier_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['delivery_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['carrier_id']->value = $_smarty_tpl->tpl_vars['carrier']->key;
?>
                  <div class="delivery-option row">
                    <div class="col-md-1">
                      <span class="custom-radio pull-xs-left">
                        <input type="radio" name="delivery_option[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address']->value, ENT_QUOTES, 'UTF-8');?>
]" id="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['delivery_option']->value==$_smarty_tpl->tpl_vars['carrier_id']->value) {?> checked<?php }?>>
                        <span></span>
                      </span>
                    </div>
                    <label for="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="col-md-11 delivery-option-2">
                      <div class="row">
                        <div class="col-md-1">
                          <?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?>
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
                            <?php } else { ?>
                            &nbsp;
                          <?php }?>
                        </div>
                        <div class="col-md-4 text-xs-left">
                          <span class="h6 carrier-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                        </div>
                        <div class="col-md-4">
                          <span class="carrier-delay"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['delay'], ENT_QUOTES, 'UTF-8');?>
</span>
                        </div>
                        <div class="col-md-3">
                          <span class="carrier-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
                        </div>
                      </label>
                    </div>
                  </div>
              <?php } ?>
            </div>
          
          <div class="order-options">            
			<?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value) {?>
              <label>
                <input type="checkbox" name="recyclable" value="1" <?php if ($_smarty_tpl->tpl_vars['recyclable']->value) {?> checked <?php }?>>
                <span><?php echo smartyTranslate(array('s'=>'I would like to receive my order in recycled packaging.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</span>
              </label>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['gift']->value['allowed']) {?>
              <label>
                <input type="checkbox" name="gift" value="1" <?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift']) {?> checked <?php }?>>
                <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
              </label>
              <label for="gift_message"><?php echo smartyTranslate(array('s'=>'If you\'d like, you can add a note to the gift:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</label>
              <textarea rows="2" cols="120" id="gift_message" name="gift_message"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['message'], ENT_QUOTES, 'UTF-8');?>
</textarea>
            <?php }?>
          </div>
        </div>
    <?php } else { ?>
      <p class="alert alert-danger"><?php echo smartyTranslate(array('s'=>'Unfortunately, there are no carriers available for your delivery address.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</p>
    <?php }?>
  </div>

  <div id="hook-display-after-carrier">
    <?php echo $_smarty_tpl->tpl_vars['hookDisplayAfterCarrier']->value;?>

  </div>

  <div id="extra_carrier"></div>

<?php } else { ?>
	<p><?php echo smartyTranslate(array('s'=>'Please wait...','mod'=>'amzpayments'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "module:amzpayments/views/templates/front/_conditions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b98356f91_81760117')) {function content_58942b98356f91_81760117($_smarty_tpl) {?>

  <?php if (count($_smarty_tpl->tpl_vars['conditions_to_approve']->value)) {?>
    <form id="conditions-to-approve" method="GET">
      <ul>
        <?php  $_smarty_tpl->tpl_vars["condition"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["condition"]->_loop = false;
 $_smarty_tpl->tpl_vars["condition_name"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['conditions_to_approve']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["condition"]->key => $_smarty_tpl->tpl_vars["condition"]->value) {
$_smarty_tpl->tpl_vars["condition"]->_loop = true;
 $_smarty_tpl->tpl_vars["condition_name"]->value = $_smarty_tpl->tpl_vars["condition"]->key;
?>
          <li>
            <div class="pull-xs-left">
              <span class="custom-checkbox">
                <input  id    = "conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]"
                        name  = "conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]"
                        class = "conditions_to_approve_checkbox" 
                        required
                        type  = "checkbox"
                        value = "1"
                        class = "ps-shown-by-js"
                >
                <span><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
              </span>
            </div>
            <div class="condition-label">
              <label class="js-terms" for="conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]">
                <?php echo $_smarty_tpl->tpl_vars['condition']->value;?>

              </label>
            </div>
          </li>
        <?php } ?>
      </ul>
    </form>
  <?php }?>	<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 02:04:56
         compiled from "/var/www/html/themes/lava0133/templates/_partials/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_58942b98387b67_78747840')) {function content_58942b98387b67_78747840($_smarty_tpl) {?><div class="footer-top footer_nav">
  <div class="container">
    <div class="row">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooterBefore'),$_smarty_tpl);?>

    </div>
  </div>
</div>
<div class="footer-content">
  <div class="container">
    <div class="row">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooter'),$_smarty_tpl);?>

    </div>
  </div>
</div>
<div class="footer-bottom footer_banner">
  <div class="container">
    <div class="row">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooterAfter'),$_smarty_tpl);?>

    </div>
  </div>
</div>
<?php }} ?>
