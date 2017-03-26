<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "modules/lavacustom/views/templates/hook/lava_hometabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1419772394588ff54d9d64d2-50753108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0e093397d18806944b8dbfbd20910bf566a8e2c' => 
    array (
      0 => 'modules/lavacustom/views/templates/hook/lava_hometabs.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1419772394588ff54d9d64d2-50753108',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'id' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54daa2753_84283996',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54daa2753_84283996')) {function content_588ff54daa2753_84283996($_smarty_tpl) {?>

<div id="home-page-tab" class="cols marginb">
  <ul id="home-page-tabs" class="nav nav-tabs title_content">
    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable(0, null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['feature_display'])&&$_smarty_tpl->tpl_vars['data']->value['feature_display']=='yes') {?><li class="nav-item <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['effect'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><a class="title_block<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>" data-toggle="tab" href="#uhufeatured" class="uhufeatured"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['feature_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['new_display'])&&$_smarty_tpl->tpl_vars['data']->value['new_display']=='yes') {?><li class="nav-item <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['effect'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><a class="title_block<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>" data-toggle="tab" href="#uhunewproducts" class="uhunewproducts"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['new_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['best_display'])&&$_smarty_tpl->tpl_vars['data']->value['best_display']=='yes') {?><li class="nav-item <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['effect'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><a class="title_block<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>" data-toggle="tab" href="#uhubestsellers" class="uhubestsellers"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['best_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['data']->value['special_display'])&&$_smarty_tpl->tpl_vars['data']->value['special_display']=='yes') {?><li class="nav-item <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['effect'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><a class="title_block<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>" data-toggle="tab" href="#uhuspecials" class="uhuspecials"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['special_title'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php }?>
  </ul>

  <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable(0, null, 0);?>
  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['ps_version'])&&$_smarty_tpl->tpl_vars['data']->value['ps_version']=='1.6') {?>
	  <div id="home-page-contents" class="tab-content">
		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['feature_display'])&&$_smarty_tpl->tpl_vars['data']->value['feature_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['features_products'])&&$_smarty_tpl->tpl_vars['data']->value['features_products']!='') {?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['data']->value['features_products'],'class'=>'product_list uhufeatured tab-pane{if $id++ == 0} active{/if}','id'=>"uhufeatured"), 0);?>

		  <?php } else { ?>
			<ul id="uhufeatured" class="product_list uhufeatured tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['new_display'])&&$_smarty_tpl->tpl_vars['data']->value['new_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['new_products'])&&$_smarty_tpl->tpl_vars['data']->value['new_products']!='') {?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['data']->value['new_products'],'class'=>'product_list uhunewproducts tab-pane{if $id++ == 0} active{/if}','id'=>"uhunewproducts"), 0);?>

		  <?php } else { ?>
			<ul id="uhunewproducts" class="product_list uhunewproducts tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['best_display'])&&$_smarty_tpl->tpl_vars['data']->value['best_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['best_products'])&&$_smarty_tpl->tpl_vars['data']->value['best_products']!='') {?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['data']->value['best_products'],'class'=>'product_list uhubestsellers tab-pane{if $id++ == 0} active{/if}','id'=>"uhubestsellers"), 0);?>

		  <?php } else { ?>
			<ul id="uhubestsellers" class="product_list uhubestsellers tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['special_display'])&&$_smarty_tpl->tpl_vars['data']->value['special_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['special_products'])&&$_smarty_tpl->tpl_vars['data']->value['special_products']!='') {?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['data']->value['special_products'],'class'=>'product_list uhuspecials tab-pane{if $id++ == 0} active{/if}','id'=>"uhuspecials"), 0);?>

		  <?php } else { ?>
			<ul id="uhuspecials" class="product_list uhuspecials tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>
	  </div>
	</div>
  <?php } else { ?>
	  <div id="home-page-contents" class="tab-content">
		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['feature_display'])&&$_smarty_tpl->tpl_vars['data']->value['feature_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['features_products'])&&$_smarty_tpl->tpl_vars['data']->value['features_products']!='') {?>
			<ul id="uhufeatured" class="product_list uhufeatured tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['features_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']++;
?>
				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']])&&$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]) {?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider'],'stamp'=>$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]), 0);?>

				<?php } else { ?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider']), 0);?>

				<?php }?>
			  <?php } ?>
			</ul>
		  <?php } else { ?>
			<ul id="uhufeatured" class="product_list uhufeatured tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['new_display'])&&$_smarty_tpl->tpl_vars['data']->value['new_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['new_products'])&&$_smarty_tpl->tpl_vars['data']->value['new_products']!='') {?>
			<ul id="uhunewproducts" class="product_list uhunewproducts tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['new_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']++;
?>
				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']])&&$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]) {?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider'],'stamp'=>$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]), 0);?>

				<?php } else { ?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider']), 0);?>

				<?php }?>
			  <?php } ?>
			</ul>
		  <?php } else { ?>
			<ul id="uhunewproducts" class="product_list uhunewproducts tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['best_display'])&&$_smarty_tpl->tpl_vars['data']->value['best_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['best_products'])&&$_smarty_tpl->tpl_vars['data']->value['best_products']!='') {?>
			<ul id="uhubestsellers" class="product_list uhubestsellers tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['best_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']++;
?>
				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']])&&$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]) {?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider'],'stamp'=>$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]), 0);?>

				<?php } else { ?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider']), 0);?>

				<?php }?>
			  <?php } ?>
			</ul>
		  <?php } else { ?>
			<ul id="uhubestsellers" class="product_list uhubestsellers tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['data']->value['special_display'])&&$_smarty_tpl->tpl_vars['data']->value['special_display']=='yes') {?>
		  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['special_products'])&&$_smarty_tpl->tpl_vars['data']->value['special_products']!='') {?>
			<ul id="uhuspecials" class="product_list uhuspecials tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['special_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['iteration']++;
?>
				<?php if (isset($_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']])&&$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]) {?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider'],'stamp'=>$_smarty_tpl->tpl_vars['data']->value['stamp'][$_smarty_tpl->tpl_vars['product']->value['id_product']]), 0);?>

				<?php } else { ?>
				  <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'bid'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['iteration'],'slider'=>$_smarty_tpl->tpl_vars['data']->value['slider']), 0);?>

				<?php }?>
			  <?php } ?>
			</ul>
		  <?php } else { ?>
			<ul id="uhuspecials" class="product_list uhuspecials tab-pane<?php if ($_smarty_tpl->tpl_vars['id']->value++==0) {?> active<?php }?>">
			  <p class="alert alert-info"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['data']->value['msg'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
			</ul>
		  <?php }?>
		<?php }?>
	  </div>
	</div>
<?php }?>

<?php }} ?>
