<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_contactus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:919843289588ff54dad6d02-93758801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec507579735baaa7108bfaac3c879b99d8ece80d' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_contactus.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '919843289588ff54dad6d02-93758801',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54db446b6_86247031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54db446b6_86247031')) {function content_588ff54db446b6_86247031($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['data']->value['owlslider']=='yes'&&$_smarty_tpl->tpl_vars['data']->value['items_number']>1) {?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['owlid'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').owlCarousel({
			loop: true,
			autoplay: false,
			margin: 30,
			responsiveClass: true,
			nav: false,
			dots: true,
			responsive: {
			0: 	{
					items: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['responsive0'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
,
				},
			768: {
					items: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['responsive1'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
,
				},
			992: {
					items: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['responsive2'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
,
				},
			1200: {
					items: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['responsive3'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
,
				}
			}
		})
	});
</script>
<?php }?>
<div id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['tplid'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="contactus news cols marginb">
	<?php if (isset($_smarty_tpl->tpl_vars['data']->value['block_title'])&&$_smarty_tpl->tpl_vars['data']->value['block_title']) {?>
	<div class="title_content">
		<h2 class="title_block"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['block_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h2><span></span>
	</div>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['data']->value['block_info'])&&$_smarty_tpl->tpl_vars['data']->value['block_info']) {?>
	<h5 class="block_info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['block_info'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h5>
	<?php }?>
	<div class="news_content">
		<div class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['owlid'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['items_number']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
			<div class="block_content">
			<?php if ($_smarty_tpl->tpl_vars['data']->value['logo'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?>
				<div class="logo">
					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['loop']['index']])&&$_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
					<img class="img-responsive wow animated slideInUp" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['imgurl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" alt="" />
					<?php if (isset($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['loop']['index']])&&$_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?></a><?php }?>
				</div>
			<?php }?>
				<div class="info">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['subtitle'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?><h5 class="sub_title wow animated fadeInDown"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['subtitle'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h5><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['title'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?><h4 class="title_news wow animated fadeInDown">
				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['loop']['index']])&&$_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
				<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['title'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>

				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['loop']['index']])&&$_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?></a><?php }?>
				</h4><?php }?>
				<?php  $_smarty_tpl->tpl_vars['text'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['text']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['texts'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['text']->key => $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['text']->value!='') {?><p class="infos wow animated lightSpeedIn"><?php echo htmlspecialchars(nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['text']->value,'html','UTF-8')), ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
				<?php } ?>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['ftitle'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?><h4 class="title wow animated fadeInDown">
				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['loop']['index']])&&$_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
				<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['ftitle'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>

				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['loop']['index']])&&$_smarty_tpl->tpl_vars['data']->value['link'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?></a><?php }?>
				</h4><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['fsubtitle'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]!='') {?><h5 class="subtitle wow animated fadeInDown"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['fsubtitle'][$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h5><?php }?>
				</div>
			</div>
		<?php endfor; endif; ?>
		</div>
	</div>
</div><?php }} ?>
