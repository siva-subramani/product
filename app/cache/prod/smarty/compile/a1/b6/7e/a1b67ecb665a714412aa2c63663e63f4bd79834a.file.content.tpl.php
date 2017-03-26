<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:32:16
         compiled from "/var/www/html/admin497v4911x/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1156764288588ff7308020e2-76746841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1b67ecb665a714412aa2c63663e63f4bd79834a' => 
    array (
      0 => '/var/www/html/admin497v4911x/themes/default/template/content.tpl',
      1 => 1483462345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1156764288588ff7308020e2-76746841',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff730803f51_38848771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff730803f51_38848771')) {function content_588ff730803f51_38848771($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
