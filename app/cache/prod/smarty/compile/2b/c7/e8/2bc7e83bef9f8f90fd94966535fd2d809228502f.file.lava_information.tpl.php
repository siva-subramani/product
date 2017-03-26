<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:883311329588ff54de57be0-83867760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bc7e83bef9f8f90fd94966535fd2d809228502f' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_information.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '883311329588ff54de57be0-83867760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'cmslink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54de5de20_67645774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54de5de20_67645774')) {function content_588ff54de5de20_67645774($_smarty_tpl) {?>

<div id="block_various_links_footer" class="information cols marginb">
	<?php if ($_smarty_tpl->tpl_vars['data']->value['title']) {?><h3 class="h3"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h3><?php }?>
	<ul id="cms">
	<?php  $_smarty_tpl->tpl_vars['cmslink'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cmslink']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['cmslinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cmslink']->key => $_smarty_tpl->tpl_vars['cmslink']->value) {
$_smarty_tpl->tpl_vars['cmslink']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['cmslink']->value['title']!='') {?>
		<li class="item"><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(addslashes($_smarty_tpl->tpl_vars['cmslink']->value['link']),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['cmslink']->value['title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li>
	<?php }?>
	<?php } ?>
	</ul>
</div>
<?php }} ?>
