<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_copyright.tpl" */ ?>
<?php /*%%SmartyHeaderCode:979147091588ff54de5ffb4-69080525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ed6cef205a49ce7f04396bfa16bf8e25a60dc43' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_copyright.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '979147091588ff54de5ffb4-69080525',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54de66352_54899794',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54de66352_54899794')) {function content_588ff54de66352_54899794($_smarty_tpl) {?>

<div id="uhu_qt_copyright" class="copyright footer-block">
	<?php if ($_smarty_tpl->tpl_vars['data']->value['company']!='') {?><span><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['company'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
	<span><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['copyright'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['image']!='') {?><span class="logo"><img src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['imgurl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['image'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" alt="" /></span><?php }?>
	<p style="width: 0;height: 0;line-height: 0;padding: 0;margin: 0;overflow: hidden;">Designed by uhuPage</p>
</div>
<?php }} ?>
