<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1412953319588ff54dd9ba16-04917887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd998d9d2d191703190b8e8e337b3ea45623c5d9c' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_contact.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1412953319588ff54dd9ba16-04917887',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'phone' => 0,
    'company' => 0,
    'address' => 0,
    'mail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54ddbb394_79137625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54ddbb394_79137625')) {function content_588ff54ddbb394_79137625($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mailto')) include '/var/www/html/vendor/prestashop/smarty/plugins/function.mailto.php';
?>

<div id="uhu_contactus_foot" class="contactus cols marginb" data-stellar-background-ratio="0.1">
	<div class="block_content">
	<?php if ($_smarty_tpl->tpl_vars['data']->value['logo']!='') {?>
		<div class="image cols">
			<?php if ($_smarty_tpl->tpl_vars['data']->value['link']!='') {?><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
			<img class="img-responsive wow animated slideInUp" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['imgurl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" alt="" />
			<?php if ($_smarty_tpl->tpl_vars['data']->value['link']!='') {?></a><?php }?>
		</div>
	<?php }?>
		<div class="info-content cols">
		<?php if ($_smarty_tpl->tpl_vars['data']->value['subtitle']!='') {?><h4 class="h4 wow animated fadeInDown"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['subtitle'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h4><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['title']!='') {?><h3 class="h3 wow animated fadeInDown"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h3><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['text']!='') {?><p class="wow animated lightSpeedIn"><?php echo htmlspecialchars(nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['text'],'html','UTF-8')), ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
		</div>
		<div class="address-content cols">
			<ul>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['phone']!='') {?><li class="phone wow animated lightSpeedIn"><i class="material-icons">contact_phone</i><?php  $_smarty_tpl->tpl_vars['phone'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['phone']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['phone']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['phone']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['phone']->key => $_smarty_tpl->tpl_vars['phone']->value) {
$_smarty_tpl->tpl_vars['phone']->_loop = true;
 $_smarty_tpl->tpl_vars['phone']->index++;
 $_smarty_tpl->tpl_vars['phone']->first = $_smarty_tpl->tpl_vars['phone']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['phone']->first;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['phone']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><br><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['phone']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php } ?></li><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['company']!='') {?><li class="company wow animated lightSpeedIn"><i class="material-icons">business</i><?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['company']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['company']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['company']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value) {
$_smarty_tpl->tpl_vars['company']->_loop = true;
 $_smarty_tpl->tpl_vars['company']->index++;
 $_smarty_tpl->tpl_vars['company']->first = $_smarty_tpl->tpl_vars['company']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['company']->first;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['company']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><br><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['company']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php } ?></li><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['address']!='') {?><li class="address wow animated lightSpeedIn"><i class="material-icons">location_on</i><?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['address']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['address']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
 $_smarty_tpl->tpl_vars['address']->index++;
 $_smarty_tpl->tpl_vars['address']->first = $_smarty_tpl->tpl_vars['address']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['address']->first;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['address']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><br><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['address']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php } ?></li><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['email']!='') {?><li class="email wow animated lightSpeedIn"><i class="material-icons">mail</i><?php  $_smarty_tpl->tpl_vars['mail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['mail']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['mail']->key => $_smarty_tpl->tpl_vars['mail']->value) {
$_smarty_tpl->tpl_vars['mail']->_loop = true;
 $_smarty_tpl->tpl_vars['mail']->index++;
 $_smarty_tpl->tpl_vars['mail']->first = $_smarty_tpl->tpl_vars['mail']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['mail']->first;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?><?php echo smarty_function_mailto(array('address'=>$_smarty_tpl->tpl_vars['mail']->value,'encode'=>"hex"),$_smarty_tpl);?>
<?php } else { ?><br><?php echo smarty_function_mailto(array('address'=>$_smarty_tpl->tpl_vars['mail']->value,'encode'=>"hex"),$_smarty_tpl);?>
<?php }?><?php } ?></li><?php }?>
			</ul>
		</div>
	</div>
</div>
<?php }} ?>
