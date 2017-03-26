<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 22:20:19
         compiled from "/var/www/html/admin497v4911x/themes/default/template/helpers/tree/tree_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9374131258900273617507-45475009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21da2da4905eb9563c327d9179d588d5f6c4cd90' => 
    array (
      0 => '/var/www/html/admin497v4911x/themes/default/template/helpers/tree/tree_header.tpl',
      1 => 1483462346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9374131258900273617507-45475009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'toolbar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5890027361a172_78883862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5890027361a172_78883862')) {function content_5890027361a172_78883862($_smarty_tpl) {?>
<div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl);?>
<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {?><?php echo $_smarty_tpl->tpl_vars['toolbar']->value;?>
<?php }?>
</div><?php }} ?>
