<?php /* Smarty version Smarty-3.1.19, created on 2017-02-03 01:44:55
         compiled from "/var/www/html/modules/amzpayments/views/templates/admin/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1556863510589426e75daf76-56934781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1f88a425234539c45ce37c64f4c27ac1ded55d5' => 
    array (
      0 => '/var/www/html/modules/amzpayments/views/templates/admin/configuration.tpl',
      1 => 1486104292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1556863510589426e75daf76-56934781',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'postSuccess' => 0,
    'ps' => 0,
    'postErrors' => 0,
    'pe' => 0,
    'module_name' => 0,
    'use_simple_path' => 0,
    'simple_path' => 0,
    'splr' => 0,
    'register_link' => 0,
    'let_customer_know_link' => 0,
    'youtube_video_link' => 0,
    'lang_iso_code' => 0,
    'integration_guide_link' => 0,
    'direct_dl_link' => 0,
    'stringcomplete' => 0,
    'youtube_video_embed_link' => 0,
    'configform' => 0,
    'allowed_return_url_1' => 0,
    'aru' => 0,
    'allowed_return_url_2' => 0,
    'allowed_js_origins' => 0,
    'current_version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_589426e7610b58_28635989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589426e7610b58_28635989')) {function content_589426e7610b58_28635989($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['postSuccess']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['ps'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ps']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['postSuccess']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ps']->key => $_smarty_tpl->tpl_vars['ps']->value) {
$_smarty_tpl->tpl_vars['ps']->_loop = true;
?>
		<div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['ps']->value;?>
</div>
	<?php } ?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['postErrors']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['pe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['postErrors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pe']->key => $_smarty_tpl->tpl_vars['pe']->value) {
$_smarty_tpl->tpl_vars['pe']->_loop = true;
?>
		<div class="alert alert-warning"><?php echo $_smarty_tpl->tpl_vars['pe']->value;?>
</div>
	<?php } ?>
<?php }?>

<div class="panel" id="amzIntroduction">
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<img src="<?php echo @constant('_PS_BASE_URL_');?>
<?php echo @constant('__PS_BASE_URI__');?>
modules/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
/views/img/amazon-payments.jpg" alt="amazon payments" class="img-responsive" />
		
			<h2><?php echo smartyTranslate(array('s'=>'Make Amazon customers your customers','mod'=>'amzpayments'),$_smarty_tpl);?>
</h2>
			
			<h4><?php echo smartyTranslate(array('s'=>'That\'s how it works:','mod'=>'amzpayments'),$_smarty_tpl);?>
</h4>
			
			<ol>
				<li><span><?php echo smartyTranslate(array('s'=>'Register for Amazon Payments and complete your account setup by upload your verification documents on Seller Central.*','mod'=>'amzpayments'),$_smarty_tpl);?>

					<br />
					<?php if ($_smarty_tpl->tpl_vars['use_simple_path']->value) {?>
						<form method="POST" action="https://sellercentral-europe.amazon.com/hz/me/sp/redirect" target="_blank" id="amazonRegForm"> 
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['locale'];?>
" name="locale" />  
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['spId'];?>
" name="spId" />  
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['uniqueId'];?>
" name="uniqueId" />  
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['allowedLoginDomains'];?>
" name="allowedLoginDomains[]" />
							<?php  $_smarty_tpl->tpl_vars['splr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['splr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['simple_path']->value['loginRedirectURLs_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['splr']->key => $_smarty_tpl->tpl_vars['splr']->value) {
$_smarty_tpl->tpl_vars['splr']->_loop = true;
?>
								<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['splr']->value;?>
" name="loginRedirectURLs[]" />
							<?php } ?>
							<?php  $_smarty_tpl->tpl_vars['splr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['splr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['simple_path']->value['loginRedirectURLs_2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['splr']->key => $_smarty_tpl->tpl_vars['splr']->value) {
$_smarty_tpl->tpl_vars['splr']->_loop = true;
?>
								<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['splr']->value;?>
" name="loginRedirectURLs[]" />
							<?php } ?>
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['storeDescription'];?>
" name="storeDescription" />  
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['language'];?>
" name="language" />  
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['returnMethod'];?>
" name="returnMethod" />
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['Source'];?>
" name="Source" />
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['sandboxMerchantIPNURL'];?>
" name="sandboxMerchantIPNURL" />
							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['simple_path']->value['productionMerchantIPNURL'];?>
" name="productionMerchantIPNURL" />
							<a href="JavaScript:void(0)" onclick="jQuery('#amazonRegForm').submit();" class="registerButton"><?php echo smartyTranslate(array('s'=>'Start Registration Now','mod'=>'amzpayments'),$_smarty_tpl);?>
</a>  
						</form>  						
					<?php } else { ?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['register_link']->value;?>
" class="registerButton" target="_blank"><?php echo smartyTranslate(array('s'=>'Start Registration Now','mod'=>'amzpayments'),$_smarty_tpl);?>
</a>
					<?php }?>	
					</span></li>
						
				<li><span><?php echo smartyTranslate(array('s'=>'Wait for an email of Amazon Payments that will inform you about successful account verification.','mod'=>'amzpayments'),$_smarty_tpl);?>
</span></li>
				<li><span><a href="<?php echo $_smarty_tpl->tpl_vars['let_customer_know_link']->value;?>
" target="_blank"><?php echo smartyTranslate(array('s'=>'Let your customers know','mod'=>'amzpayments'),$_smarty_tpl);?>
</a> <?php echo smartyTranslate(array('s'=>'that they now can use Amazon Payments on your website.','mod'=>'amzpayments'),$_smarty_tpl);?>
</span></li>
			</ol>
			
			<?php if ($_smarty_tpl->tpl_vars['youtube_video_link']->value) {?>
				<p>
					<?php echo smartyTranslate(array('s'=>'See our video-guide about the integration with PrestaShop:','mod'=>'amzpayments'),$_smarty_tpl);?>

					<br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['youtube_video_link']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['youtube_video_link']->value;?>
</a>
				</p>
			<?php }?>
			
			<p>
				<?php if ($_smarty_tpl->tpl_vars['lang_iso_code']->value=='es') {?>
					<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'direct_dl_link', null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['integration_guide_link']->value;?>
" target="_blank"><?php echo smartyTranslate(array('s'=>'here','mod'=>'amzpayments'),$_smarty_tpl);?>
</a><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
					<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'stringcomplete', null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Download the Amazon Payments Integration Guide','mod'=>'amzpayments','sprintf'=>$_smarty_tpl->tpl_vars['direct_dl_link']->value),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
					<?php echo html_entity_decode($_smarty_tpl->tpl_vars['stringcomplete']->value);?>

				<?php } else { ?>
					<?php echo smartyTranslate(array('s'=>'Download the Amazon Payments Integration Guide','mod'=>'amzpayments'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['integration_guide_link']->value;?>
" target="_blank"><?php echo smartyTranslate(array('s'=>'here','mod'=>'amzpayments'),$_smarty_tpl);?>
</a>.
				<?php }?>
			</p>
			
			<p>
				* <?php echo smartyTranslate(array('s'=>'Note: Please use an email address you didn\'t use for any Amazon account yet.','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
		</div>
		<div class="col-xs-12 col-md-6">
			<p>
				<span class="amzTick"></span> <strong><?php echo smartyTranslate(array('s'=>'Customer Loyalty','mod'=>'amzpayments'),$_smarty_tpl);?>
</strong><br />
				<?php echo smartyTranslate(array('s'=>'Offer an easy way for customers to login on your site.','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
			<p>
				<span class="amzTick"></span> <strong><?php echo smartyTranslate(array('s'=>'Mobile-Friendly','mod'=>'amzpayments'),$_smarty_tpl);?>
</strong><br />
				<?php echo smartyTranslate(array('s'=>'Buttons and widgets are optimized across desktop, tablet and mobile.','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
			<p>
				<span class="amzTick"></span> <strong><?php echo smartyTranslate(array('s'=>'Fraud Protection','mod'=>'amzpayments'),$_smarty_tpl);?>
</strong><br />
				<?php echo smartyTranslate(array('s'=>'You are covered by Amazon\'s fraud protection, provided at no additional cost.','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
			<?php if ($_smarty_tpl->tpl_vars['lang_iso_code']->value=='de'||$_smarty_tpl->tpl_vars['lang_iso_code']->value=='en'||$_smarty_tpl->tpl_vars['lang_iso_code']->value=='us') {?>
				<p>
					<span class="amzTick"></span> <strong><?php echo smartyTranslate(array('s'=>'Higher conversion, higher revenues','mod'=>'amzpayments'),$_smarty_tpl);?>
</strong><br />
					<?php echo smartyTranslate(array('s'=>'It can help you capture sales you might otherwise miss. Additionally, you benefit from the Amazon Payments fraud protection.','mod'=>'amzpayments'),$_smarty_tpl);?>

				</p>
				<p>
					<span class="amzTick"></span> <strong><?php echo smartyTranslate(array('s'=>'True payment processing','mod'=>'amzpayments'),$_smarty_tpl);?>
</strong><br />
					<?php echo smartyTranslate(array('s'=>'"Pay with Amazon" offers true payment processing. As a merchant, you will only forward the transaction amount.','mod'=>'amzpayments'),$_smarty_tpl);?>

				</p>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['youtube_video_embed_link']->value) {?>
				<iframe class="amz_integration_video_yt" width="80%" height="315" src="<?php echo $_smarty_tpl->tpl_vars['youtube_video_embed_link']->value;?>
" frameborder="0" allowfullscreen></iframe>
			<?php }?>
		</div>
	</div>
</div>

<div class="panel" id="amzSimplePath">
	<div class="panel-heading">
		<i class="icon-cogs"></i>
		<?php echo smartyTranslate(array('s'=>'Quick configuration','mod'=>'amzpayments'),$_smarty_tpl);?>

	</div>
	<div class="row">
		<div class="col-xs-12">
			<p>
				<?php echo smartyTranslate(array('s'=>'Just use copy and paste to configure the module with your Amazon Payments credentials, directly out of the Seller Central.','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
			<textarea name="simple_path" id="simple_path"></textarea>
			<input type="button" name="simple_path_parse" id="simple_path_parse" value="<?php echo smartyTranslate(array('s'=>'Parse data','mod'=>'amzpayments'),$_smarty_tpl);?>
" />
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->tpl_vars['configform']->value;?>


<div class="panel">
	<div class="panel-heading">
		<i class="icon-info"></i>
		<?php echo smartyTranslate(array('s'=>'URL and Configuration Infos','mod'=>'amzpayments'),$_smarty_tpl);?>

	</div>
	<div class="row">
		<div class="col-xs-12">
			<p>
				<?php echo smartyTranslate(array('s'=>'Allowed Return URLs - Enter these URLs in your Amazon SellerCentral Configuration-Panel!','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
			<ul>
				<?php  $_smarty_tpl->tpl_vars['aru'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aru']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allowed_return_url_1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aru']->key => $_smarty_tpl->tpl_vars['aru']->value) {
$_smarty_tpl->tpl_vars['aru']->_loop = true;
?>
					<li><?php echo $_smarty_tpl->tpl_vars['aru']->value;?>
</li>
				<?php } ?>
				<?php  $_smarty_tpl->tpl_vars['aru'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aru']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allowed_return_url_2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aru']->key => $_smarty_tpl->tpl_vars['aru']->value) {
$_smarty_tpl->tpl_vars['aru']->_loop = true;
?>
					<li><?php echo $_smarty_tpl->tpl_vars['aru']->value;?>
</li>
				<?php } ?>
			</ul>
			<p>
				<?php echo smartyTranslate(array('s'=>'Allowed JavaScript Origins - Enter these URLs in your Amazon SellerCentral Configuration-Panel!','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
			<ul>
				<li><?php echo $_smarty_tpl->tpl_vars['allowed_js_origins']->value;?>
</li>
			</ul>
			<p>
				<?php echo smartyTranslate(array('s'=>'You can integrate the "Login with Amazon"-Button at any part of your template. Just use the following HTML-Code, but be aware to always (!) use a unique value for the attribute "id":','mod'=>'amzpayments'),$_smarty_tpl);?>

			</p>
			<code> &lt;div id=&quot;&quot; class=&quot;amazonLoginWr&quot;&gt;&lt;/div&gt; </code>
		</div>
	</div>
</div>


<div class="panel" id="amzVersionChecker">
	<div class="panel-heading">
		<i class="icon-cogs"></i>
		<?php echo smartyTranslate(array('s'=>'Version-Checker','mod'=>'amzpayments'),$_smarty_tpl);?>

	</div>
	<div class="row">
		<div class="col-xs-12">
			<p style="text-align: center" id="versionCheck">
				<img src="<?php echo @constant('_PS_BASE_URL_');?>
<?php echo @constant('__PS_BASE_URI__');?>
modules/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
/views/img/loading_indicator.gif" />
				<br /><br />
				<?php echo smartyTranslate(array('s'=>'We check if there is a new version of the plugin available.','mod'=>'amzpayments'),$_smarty_tpl);?>

				<br /><br />
			</p>
			<p style="text-align: center" id="versionCheckResult">
				<?php echo smartyTranslate(array('s'=>'Your version: ','mod'=>'amzpayments'),$_smarty_tpl);?>
 <strong><?php echo $_smarty_tpl->tpl_vars['current_version']->value;?>
</strong>
				<br /><br />
			</p>			
		</div>
	</div>
</div>

<script language="javascript">
	
	$(document).ready(function() {
		$.post("../modules/amzpayments/ajax.php",
		{
			action: "versionCheck",
			asv: "<?php echo $_smarty_tpl->tpl_vars['current_version']->value;?>
",
			psv: "<?php echo @constant('_PS_VERSION_');?>
",
			ref: location.host
		}, 
		function(data) {	
			if (data.newversion == 1) {
				$("#versionCheckResult").append("<?php echo smartyTranslate(array('s'=>'There is a new version available: ','mod'=>'amzpayments'),$_smarty_tpl);?>
<strong>" + data.newversion_number + "</strong><br /><br /><a href=\"http://www.patworx.de/Amazon-Advanced-Payment-APIs/PrestaShop\" target=\"_blank\">&gt; Download</a>");
			} else {
				$("#versionCheckResult").append("<?php echo smartyTranslate(array('s'=>'Everything is fine - you are using the latest version','mod'=>'amzpayments'),$_smarty_tpl);?>
");
			}
			$("#versionCheck").hide();
		}, "json"
		);
	});
	
</script><?php }} ?>
