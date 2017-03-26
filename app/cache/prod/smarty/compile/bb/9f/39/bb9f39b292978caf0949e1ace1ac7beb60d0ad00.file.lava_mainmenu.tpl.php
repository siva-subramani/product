<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_mainmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243555384588ff54dc0ae77-98952804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb9f39b292978caf0949e1ace1ac7beb60d0ad00' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_mainmenu.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243555384588ff54dc0ae77-98952804',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'urls' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54dd15fa4_90543763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54dd15fa4_90543763')) {function content_588ff54dd15fa4_90543763($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['data']->value['pos']!='top') {?></div><?php }?><div class="menu">
		<ul class="nav_item umenu">
			<li class="nav_li logo"><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['urls']->value['base_url'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['logo_type']=='text') {?>
					<span><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo_text'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['data']->value['logo_subtitle']!='') {?><span class="info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo_subtitle'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span><?php }?></span>
				<?php } else { ?>
					<img class="logo img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo_image'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" />
				<?php }?>
				</a>
			</li>

			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_hom'])) {?>
			<li class="nav_li home"><a class="label <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_hom']['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_hom']['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_hom']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_hom']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a></li>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['total_lnk']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
			<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp1=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp1])) {?>
			<li class="nav_li lnk<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp2=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp2]['width']=='no') {?> relative<?php }?>">
				<a class="label nav_a <?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp3=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp3]['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp4=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp4]['menu_link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
					<span data-title="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp5=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp5]['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
						<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp6=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp6]['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>

					</span>
				</a>
			<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp7=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['popup']=='yes'&&isset($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp7])) {?>
				<div class="nav_pop<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp8=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp8]['width']=='no') {?> minwidth<?php }?>  tr_all_hover">
					<dl class="pop_content">
					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp9=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp9]['total'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                        <dd>
							<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp11=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp10]['image'][$_tmp11]!='') {?><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp12=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp13=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp12]['link'][$_tmp13],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="lnk_image"><img class="img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['imgurl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp14=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp15=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp14]['cmstitle'][$_tmp15],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" /></a><?php }?>
							<p><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp16=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp17=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp16]['link'][$_tmp17],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp18=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp19=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_lnk'][$_tmp18]['label'][$_tmp19],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></p>
						</dd>
                    <?php endfor; endif; ?>
					</dl>
				</div>
			<?php }?>
			</li>
			<?php }?>
			<?php endfor; endif; ?>

			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_all'])) {?>
			<li class="nav_li catall"><a class="label nav_a <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['popup']=='yes') {?>
				<div class="nav_pop tr_all_hover">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['display12']=='yes') {?>
					<dl class="pop_content products_block">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['allcats']['catcount1'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                        <dd>
							<span class="s_title_block"><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp20=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['allcats']['catlink1'][$_tmp20],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp21=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['allcats']['catname1'][$_tmp21],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></span>
							<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp22=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['allcats']['catcount2'][$_tmp22],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                            <p><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp23=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp24=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['allcats']['catlink2'][$_tmp23][$_tmp24],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp25=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp26=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['allcats']['catname2'][$_tmp25][$_tmp26],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></p>
							<?php endfor; endif; ?>
                        </dd>
                    <?php endfor; endif; ?>
					</dl>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['display11']=='yes') {?>
					<dl class="pop_adver">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['cates_count'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
						<dd>
							<a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp27=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['cates'][$_tmp27]['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="product_image"><img class="img-responsive img-fluid" src="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp28=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['cates'][$_tmp28]['image'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" /></a>
							<h5 class="s_title_block"><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp29=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['cates'][$_tmp29]['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp30=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['cates'][$_tmp30]['name'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></h5>
							<div class="product_desc"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp31=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_all']['cates'][$_tmp31]['desc'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</div>
                        </dd>
                    <?php endfor; endif; ?>
					</dl>
				<?php }?>
				</div>
			<?php }?>
			</li>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['total_cus'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
			<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp32=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp32])) {?>
			<li class="nav_li cat"><a class="label nav_a <?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp33=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp33]['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp34=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp34]['category_link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp35=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp35]['category_name'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp36=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp36]['category_name'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['popup']=='yes') {?>
				<div class="nav_pop tr_all_hover">
				<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp37=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp37]['display40']=='yes') {?>
					<dl class="pop_content products_block">
					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp38=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp38]['type']=='Custom category') {?>
						<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp39=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp39]['cates_count'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
						<dd>
							<span class="s_title_block">
								<a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp40=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp41=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp40]['cates_link'][$_tmp41],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp42=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp43=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp42]['cates_name'][$_tmp43],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a>
							</span>
                        </dd>
						<?php endfor; endif; ?>
					<?php } else { ?>
						<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp44=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['name'] = 'loop3';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp44]['allcats']['catcount1'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop3']['total']);
?>
                        <dd>
							<span class="s_title_block"><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp45=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop3']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp46=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp45]['allcats']['catlink1'][$_tmp46],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp47=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop3']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp48=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp47]['allcats']['catname1'][$_tmp48],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></span>
							<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp49=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop3']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp50=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp49]['allcats']['catcount2'][$_tmp50],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                            <p><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp51=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop3']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp52=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp53=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp51]['allcats']['catlink2'][$_tmp52][$_tmp53],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp54=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop3']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp55=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp56=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp54]['allcats']['catname2'][$_tmp55][$_tmp56],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></p>
							<?php endfor; endif; ?>
                        </dd>
						<?php endfor; endif; ?>
					<?php }?>
					</dl>
				<?php }?>

				<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp57=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp57]['display41']=='yes') {?>
					<dl class="pop_adver"><dd>
					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp58=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp58]['adv_img']!='') {?>
						<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp59=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp59]['adv_lnk']!='') {?><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp60=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp60]['adv_lnk'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
						<img class="img-responsive img-fluid" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['imgurl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp61=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp61]['adv_img'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" />';
						<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp62=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cus'][$_tmp62]['adv_lnk']!='') {?></a><?php }?>
					<?php }?>
					</dd></dl>
				<?php }?>
				</div>
			<?php }?>
			</li>
			<?php }?>
			<?php endfor; endif; ?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_pro'])) {?>
			<li class="nav_li prd"><a class="label nav_a <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['popup']=='yes') {?>
				<div class="nav_pop tr_all_hover">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['display13']=='yes') {?>
					<dl class="pop_content products_block">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['count'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
					<dd>
						<a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp63=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['productlink'][$_tmp63],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="product_image"><img class="img-responsive img-fluid" src="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp64=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['productimage'][$_tmp64],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" /></a>
                        <h5 class="s_title_block"><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp65=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['productlink'][$_tmp65],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp66=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['productname'][$_tmp66],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></h5>
                        <div class="product_desc"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp67=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['productdesc'][$_tmp67],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</div>
					</dd>
					<?php endfor; endif; ?>
					</dl>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['display14']=='yes') {?>
					<dl class="pop_adver"><dd>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['adv_img']!='') {?>
						<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['adv_lnk']!='') {?><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['adv_lnk'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
						<img class="img-responsive img-fluid" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['imgurl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['adv_img'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" />
						<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_pro']['adv_lnk']!='') {?></a><?php }?>
					<?php }?>
					</dd></dl>
				<?php }?>
				</div>
			<?php }?>
			</li>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_bra'])) {?>
			<li class="nav_li bra"><a class="label nav_a <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['popup']=='yes') {?>
				<div class="nav_pop tr_all_hover">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['display15']=='yes') {?>
					<dl class="pop_content products_block">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['brands'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
					<dd>
						<a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp68=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['links'][$_tmp68],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="product_image"><img class="img-responsive img-fluid" src="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp69=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['images'][$_tmp69],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" /></a>
                        <h5 class="s_title_block"><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp70=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['links'][$_tmp70],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp71=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['names'][$_tmp71],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></h5>
					</dd>
					<?php endfor; endif; ?>
					</dl>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['display16']=='yes') {?>
					<dl class="pop_adver"><dd>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['bcount'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                        <p><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp72=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['url'][$_tmp72],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp73=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_bra']['name'][$_tmp73],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></p>
                    <?php endfor; endif; ?>
					</dd></dl>
				<?php }?>
				</div>
			<?php }?>
			</li>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_new'])) {?>
			<li class="nav_li news"><a class="label nav_a <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['menu_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a>
			<?php if ($_smarty_tpl->tpl_vars['data']->value['popup']=='yes') {?>
				<div class="nav_pop tr_all_hover">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['display_news']=='yes') {?>
					<dl class="pop_content products_block"><dd>
					<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_img']!='') {?>
						<div class="image"><img class="img-responsive img-fluid" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['imgurl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_img'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" /></div>
					<?php }?>
						<div class="content">
							<h5 class="s_title_block"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_block_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h5>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=3) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
							<p><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp74=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_title'][$_tmp74],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
							<div class="product_desc"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp75=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_text'][$_tmp75],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</div>
							<?php endfor; endif; ?>
						</div>
					</dd></dl>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['display_cms']=='yes') {?>
					<dl class="pop_adver"><dd>
					<h5 class="s_title_block"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_cms_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h5>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_cms_count'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                        <p><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp76=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_cmslink'][$_tmp76],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp77=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_new']['news_cmstitle'][$_tmp77],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></p>
                    <?php endfor; endif; ?>
					</dd></dl>
				<?php }?>
				</div>
			<?php }?>
			</li>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
			<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp78=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp78]['label'])) {?>
			<li class="nav_li cms<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp79=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp79]['width']=='no') {?> relative<?php }?>"><a href="label <?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp80=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp80]['link'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="label nav_a <?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp81=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp81]['nav'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 <?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp82=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp82]['roll'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp83=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp83]['label'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp84=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp84]['label'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a>
			<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp85=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp85]['nav'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp86=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['popup']=='yes'&&$_tmp86=='nav_a') {?>
				<div class="nav_pop<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp87=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp87]['width']=='no') {?> minwidth<?php }?> tr_all_hover">
					<dl class="pop_content"><dd>
					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp88=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp88]['cms_count'],'htmlall','UTF-8')) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                        <p><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp89=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp90=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp89]['cmslink'][$_tmp90],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp91=ob_get_clean();?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp92=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['topmenu_cms'][$_tmp91]['cmstitle'][$_tmp92],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></p>
                    <?php endfor; endif; ?>
					</dd></dl>
				</div>
			<?php }?>
			</li>
			<?php }?>
			<?php endfor; endif; ?>

			<?php if ($_smarty_tpl->tpl_vars['data']->value['logged']) {?>
            <li class="myaccount"><a class="label" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['my_account_url'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_myaccount'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_myaccount'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_myaccount'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a></li>
            <li class="signout"><a class="label" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logout_url'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_signout'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_signout'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_signout'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a></li>
            <?php } else { ?>
            <li class="signin"><a class="label" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['my_account_url'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_signin'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><span data-title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_signin'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['menu_signin'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span></a></li>
			<?php }?>

			<li class="search"><span id="search-icon"><i class="material-icons">&#xe8b6;</i></span></li>
			<li class="sf-search">
				<form id="searchbox" action="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'),'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" method="get">
					<input type="hidden" name="controller" value="search" />
					<input type="text" name="s" value="<?php if (isset($_GET['search_query'])) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['search_query'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?>" />
					<button type="submit"><i class="material-icons">&#xe8b6;</i></button>
				</form>
			</li>
		</ul>


<?php if ($_smarty_tpl->tpl_vars['data']->value['pos']=='top') {?>
	</div>
<?php }?>
<script type="text/javascript">
	$('#header .menu ul.nav_item li.catall').click(function(){
		$('div.nav_pop').slideToggle();
	});
		
	$(document).ready(function(){
		$('.nav_item > li').mouseover(function(){
			$(this).addClass('active');
		});				
		$('.nav_item > li').mouseleave(function(){
			$(this).removeClass('active');
		});
	});
</script><?php }} ?>
