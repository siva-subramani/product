<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:305240710588ff54ddeab62-28713670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7fed68af7d39023fc27e209a02243d47df04847' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_extra.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305240710588ff54ddeab62-28713670',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'link' => 0,
    'cmslink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54ddfe298_48185639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54ddfe298_48185639')) {function content_588ff54ddfe298_48185639($_smarty_tpl) {?>

<div class="extra cols marginb">
	<?php if ($_smarty_tpl->tpl_vars['data']->value['title']) {?><h3 class="h3"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h3><?php }?>
	<ul>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['show_drop']=='yes') {?><li class="item"><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('prices-drop'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['special'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['show_new']=='yes') {?><li class="item"><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('new-products'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['new'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['show_best']=='yes') {?><li class="item"><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('best-sales'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['best'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['show_brand']=='yes') {?><li class="item"><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('manufacturer'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['brand'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
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
