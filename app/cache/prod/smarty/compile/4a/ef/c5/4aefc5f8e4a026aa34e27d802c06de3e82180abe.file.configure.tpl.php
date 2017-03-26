<?php /* Smarty version Smarty-3.1.19, created on 2017-02-04 12:45:54
         compiled from "/var/www/html/modules/googleshopping/views/templates/admin/configure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7049074589613523520b6-97250783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4aefc5f8e4a026aa34e27d802c06de3e82180abe' => 
    array (
      0 => '/var/www/html/modules/googleshopping/views/templates/admin/configure.tpl',
      1 => 1486230178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7049074589613523520b6-97250783',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_589613523618c4_07913347',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589613523618c4_07913347')) {function content_589613523618c4_07913347($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>

<div class="panel">
  <div>
    <img src="https://www.gstatic.com/shopping-platforms/google-shopping-logo.svg" alt="Google Shopping" id="shopping-logo" />
  </div>

  <div id="left-column">
      <?php $_smarty_tpl->_capture_stack[0][] = array("string_one", null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'{link_start}Google Shopping{link_end} helps businesses tap into the power of customer intent to reach the right people with relevant products ads when it matters the most. Use this module to upload your store and product data to Google Merchant Center and make it available to Google Shopping and other Google services, allowing you to reach millions of new customers searching for what you sell.','mod'=>'googleshopping'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
      <p><?php echo smarty_modifier_replace(smarty_modifier_replace(Smarty::$_smarty_vars['capture']['string_one'],'{link_start}','<a href="https://www.youtube.com/watch?v=xIil1YlBMOw" target="_blank">'),'{link_end}','</a>');?>
</p>

      <p><?php echo smartyTranslate(array('s'=>'Connect your PrestaShop account to Merchant Center to begin importing your product data through the store API. After you’ve linked your PrestaShop and Merchant Center accounts, any store information that’s updated in your PrestaShop store will also be updated in Merchant Center.','mod'=>'googleshopping'),$_smarty_tpl);?>
</p>

      <?php $_smarty_tpl->_capture_stack[0][] = array("string_two", null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Get started by clicking "Sign Up" below. A new PrestaShop API account will be automatically generated and your store information and credentials will be submitted to Merchant Center through a secure connection. Follow the sign up prompts to create a Merchant Center account -- if you don’t create a new account, your API information will be deleted after 60 days. {link_start}Learn more{link_end}','mod'=>'googleshopping'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
      <p><?php echo smarty_modifier_replace(smarty_modifier_replace(Smarty::$_smarty_vars['capture']['string_two'],'{link_start}','<a href="https://support.google.com/merchants/answer/6351218" target="_blank">'),'{link_end}','</a>');?>
</p>

      <p>
        <a class="signup-button" href="launch-button-signup-link" target="_blank"><?php echo smartyTranslate(array('s'=>'Launch','mod'=>'googleshopping'),$_smarty_tpl);?>
</a>
      </p>
  </div>

  <div id="right-column">
    <img src="https://www.gstatic.com/shopping-platforms/shopping-ads.png" alt="Google Shopping Ads" id="shopping-ads" /> 
  </div>
  <br/>
<?php }} ?>
