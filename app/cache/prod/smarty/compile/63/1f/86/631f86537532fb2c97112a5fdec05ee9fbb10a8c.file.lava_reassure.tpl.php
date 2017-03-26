<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_reassure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1815025226588ff54de120b3-16255511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '631f86537532fb2c97112a5fdec05ee9fbb10a8c' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_reassure.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1815025226588ff54de120b3-16255511',
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
  'unifunc' => 'content_588ff54de2e505_10553579',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54de2e505_10553579')) {function content_588ff54de2e505_10553579($_smarty_tpl) {?>

<div id="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['block_id'])&&$_smarty_tpl->tpl_vars['data']->value['block_id']) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['block_id'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>uhu_reassure<?php }?>" class="reassure cols marginb">
	<?php if (isset($_smarty_tpl->tpl_vars['data']->value['block_title'])&&$_smarty_tpl->tpl_vars['data']->value['block_title']) {?>
	<div class="title_content">
		<h2 class="title_block"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['block_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h2><span></span>
	</div>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['data']->value['block_info'])&&$_smarty_tpl->tpl_vars['data']->value['block_info']) {?>
	<p class="title_info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['block_info'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
	<?php }?>
	<div class="block_content">
		<ul class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_id'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['number']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
		<?php if ($_smarty_tpl->tpl_vars['data']->value['title'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8')]!=''||$_smarty_tpl->tpl_vars['data']->value['icon'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8')]!='') {?>
			<li class="cols item <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['loop']['first']) {?>first_item <?php }?>wow slideInUp" data-wow-delay="">
				<div class="list-container">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['type']=='icon') {?>
					<i class="material-icons"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['icon'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8')], ENT_QUOTES, 'UTF-8');?>
</i>
				<?php } else { ?>
					<img class="img-fluid img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['image'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8')], ENT_QUOTES, 'UTF-8');?>
" alt="" />
				<?php }?>
					<div class="type-text">
						<h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['title'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8')], ENT_QUOTES, 'UTF-8');?>
</h3>
						<?php if (isset($_smarty_tpl->tpl_vars['data']->value['text'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['loop']['index'],'htmlall','UTF-8')])&&$_smarty_tpl->tpl_vars['data']->value['text'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8')]!='') {?>
							<?php  $_smarty_tpl->tpl_vars['text'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['text']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['text'][$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8')]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['text']->key => $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['text']->value!='') {?><p><?php echo htmlspecialchars(nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['text']->value,'html','UTF-8')), ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
							<?php } ?>
						<?php }?>
					</div>
				</div>
			</li>
		<?php }?>
		<?php endfor; endif; ?>
		</ul>
	</div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['data']->value['scroll'])&&$_smarty_tpl->tpl_vars['data']->value['scroll']=='imageScroll') {?>
	<div class="img-holder-home" data-image="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['scrollimage'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"></div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.img-holder-home').imageScroll({
            	container: $('#uhu_reassure'),
            	speed: 0.1,
				holderMaxHeight: 520
			});
		});
	</script>
<?php }?><?php }} ?>
