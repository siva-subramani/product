<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_refineslide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:575335667588ff54dd2c2a3-40660243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38484e341655595183e2582ea0a0e146c95bbce0' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_refineslide.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '575335667588ff54dd2c2a3-40660243',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54dd8cd10_50806836',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54dd8cd10_50806836')) {function content_588ff54dd8cd10_50806836($_smarty_tpl) {?>

<!-- MODULE Block uhuslider -->
<div id="uhuslider" class="cols marginb">
	<div class="block_content">
		<div class="loading" style="background-image: url(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['loading_icon'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);"></div>
		<ul id="uhu_slider" style="display: none;" class="cycle-slideshow">
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['slider_number']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
		
			<li class="slide<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 group">
				<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp93=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_link'][$_tmp93]) {?><a href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp94=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_url'][$_tmp94],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
				<img class="slider img-fluid" src="" />
				<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp95=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_link'][$_tmp95]) {?></a><?php }?>

				<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp96=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_texteffect'][$_tmp96]=='yes') {?>
				<div class="slide_content" style="display: none;">
					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp97=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_h2'][$_tmp97]) {?>
					<h2 class="sd2 animated slide-h2"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp98=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_h2'][$_tmp98],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h4>
					<?php }?>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp99=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_h3'][$_tmp99]) {?>
					<h3 class="sd3 animated slide-h3"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp100=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_h3'][$_tmp100],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h4>
					<?php }?>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp101=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_h4'][$_tmp101]) {?>
					<h4 class="sd4 animated slide-h4"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp102=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_h4'][$_tmp102],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h4>
					<?php }?>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp103=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_link'][$_tmp103]) {?>
					<h6 class="sd6 animated slide-link slidelink">
						<a class="btn lnk_view" href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp104=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_url'][$_tmp104],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
						<span><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp105=ob_get_clean();?><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['data']->value['slider_link'][$_tmp105]), ENT_QUOTES, 'UTF-8');?>
</span>
						</a>
					</h6>
					<?php }?>
				</div>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp106=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_logo'][$_tmp106]) {?>
					<img class="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp107=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_texteffect'][$_tmp107]=='yes') {?>animated<?php }?> logo slide-logo" src="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp108=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_logo'][$_tmp108],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"  />
					<?php }?>
				<?php } else { ?>
				<div class="slide_content" style="display: none;">
					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp109=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_h2'][$_tmp109]) {?>
					<h2 class="sd2"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp110=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_h2'][$_tmp110],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h4>
					<?php }?>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp111=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_h3'][$_tmp111]) {?>
					<h3 class="sd3"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp112=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_h3'][$_tmp112],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h4>
					<?php }?>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp113=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_h4'][$_tmp113]) {?>
					<h4 class="sd4"><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp114=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_h4'][$_tmp114],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h4>
					<?php }?>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp115=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_link'][$_tmp115]) {?>
					<h6 class="sd6 slidelink">
						<a class="btn lnk_view" href="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp116=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_url'][$_tmp116],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
						<span><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp117=ob_get_clean();?><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['data']->value['slider_link'][$_tmp117]), ENT_QUOTES, 'UTF-8');?>
</span>
						</a>
					</h6>
					<?php }?>
					</div>

					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp118=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['data']->value['slider_logo'][$_tmp118]) {?>
					<img class="slidelogo logo" src="<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp119=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_logo'][$_tmp119],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"  />
					<?php }?>
				<?php }?>
			</li>
			
		<?php endfor; endif; ?>
		</ul>
	</div>
</div>
<script type="text/javascript">
function loadImage(url, callback) {
    var img = new Image();
     img.src = url;

    if (img.complete) {
		callback.call(img);
    } else {
        img.onload = function () {
			callback.call(img);
            img.onload = null;
        };
    };
};
function imgLoading(){
	$('.loading').css('background-image', 'url(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['loading_icon'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
)');
	imgPreLoaded();
	$('.loading').hide();
	$('#uhu_slider').css('display', 'block');
}

function imgPreLoaded(){
	body = $('#index').width();

	if (body < 768)
	{
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['slider_number']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
			$('#uhu_slider li.slide<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 img.slider').attr('src', '<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp120=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_image_s'][$_tmp120],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
');
		<?php endfor; endif; ?>
	}
	else if (body < 1030)
	{
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['slider_number']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
			$('#uhu_slider li.slide<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 img.slider').attr('src', '<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp121=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_image_m'][$_tmp121],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
');
		<?php endfor; endif; ?>
	}
	else
	{
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['slider_number']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
			$('#uhu_slider li.slide<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 img.slider').attr('src', '<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php $_tmp122=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_image'][$_tmp122],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
');
		<?php endfor; endif; ?>
	}
}

$(document).ready(function(){
	loadImage('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['loading_icon'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
',imgLoading);
	$('#uhu_slider').refineSlide({
		maxWidth: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['max_width'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
,
		delay: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_delay'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
,
		transitionDuration: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_duration'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
,
		autoPlay: true,
		transition: '<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_transition'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
',
		fallback3d: '<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['slider_easing'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
',
		useThumbs: false,
		useArrows: true,
		arrowTemplate: '<div class="rs-arrows bx-control"><span class="rs-prev cycle-prev"><i class="material-icons"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['awesome_prev'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</i></span><span class="rs-next cycle-next"><i class="material-icons"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['awesome_next'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</i></span></div>',
		onInit: function(){
			$('.sd2').hide();
			$('.sd3').hide();
			$('.sd4').hide();
			$('.sd6').hide();
			$('.slide-logo').hide();
			$('.slide_content').css('display', 'block');
			$('.slide-h2').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h2_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h2_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-h3').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h3_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h3_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-h4').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h4_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h4_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-link').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-logo').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.sd2').show(20);
			$('.sd3').show(20);
			$('.sd4').show(20);
			$('.sd6').show(20);
			$('.slide-logo').show(20);
		},
		afterChange: function(){
			$('.slide-h2').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h2_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h2_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-h3').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h3_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h3_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-h4').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h4_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['h4_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-link').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['link_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.slide-logo').addClass('<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo_animate_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
').delay(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['logo_time_in'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
);
			$('.sd2').show(20);
			$('.sd3').show(20);
			$('.sd4').show(20);
			$('.sd6').show(20);
			$('.slide-logo').show(20);
			$('.slide_content').css('display', 'block');
		},
		onChange: function(){
			$('.sd2').hide();
			$('.sd3').hide();
			$('.sd4').hide();
			$('.sd6').hide();
			$('.slide-logo').hide();
		},
	});
});
</script>
<!-- /MODULE Block uhuslider -->
<?php }} ?>
