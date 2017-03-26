<?php /* Smarty version Smarty-3.1.19, created on 2017-02-01 12:53:15
         compiled from "/var/www/html/themes/lava0133/templates/catalog/_partials/product-cover-thumbnails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:230390855892208beef3d8-21682153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '764723c47bce74191de9136c5a639fd52cb5998b' => 
    array (
      0 => '/var/www/html/themes/lava0133/templates/catalog/_partials/product-cover-thumbnails.tpl',
      1 => 1483465723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230390855892208beef3d8-21682153',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5892208befaf54_66535207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5892208befaf54_66535207')) {function content_5892208befaf54_66535207($_smarty_tpl) {?><div class="images-container">
  
    <div class="product-images-wrap">
      <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
        <div class="product-cover">
          <img class="js-qv-product-cover" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;" itemprop="image">
          <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
            <i class="material-icons zoom-in">&#xE8FF;</i>
          </div>
        </div>
      <?php } ?>
    </div>
  

  
    <!-- div class="js-qv-mask mask" -->
      <div class="product-images product-thumbnails-wrap">
        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
          <div class="thumbs-container">
            <img
              class="thumbnail <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
              data-image-large-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['medium_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
              src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
              alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
              title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
              itemprop="image"
            >
          </div>
        <?php } ?>
      </div>
    <!-- /div -->
  
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('.product-images-wrap').owlCarousel({
		loop: false,
		autoplay: false,
		margin: 0,
		responsiveClass: true,
		nav: true,
		navText: ['<i class="material-icons">chevron_left</i>','<i class="material-icons">chevron_right</i>'],
		dots: false,
		items: 1
	})
	$('.product-thumbnails-wrap').owlCarousel({
		loop: false,
		autoplay: false,
		margin: 30,
		responsiveClass: true,
		nav: false,
		dots: false,
		items: 3
	})

    var owlImages = $('.product-images-wrap');
    var owlThumbs = $('.product-thumbnails-wrap');
    owlImages.owlCarousel();
    owlThumbs.owlCarousel();

    $('.product-images-wrap .owl-prev').click(function() {
        owlThumbs.trigger('prev.owl.carousel', [300]);
    })
    $('.product-images-wrap .owl-next').click(function() {
        owlThumbs.trigger('next.owl.carousel');
    })
  <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?>
    $('.product-thumbnails-wrap .owl-item:eq(<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index'], ENT_QUOTES, 'UTF-8');?>
)').click(function() {
        owlImages.trigger('to.owl.carousel', [<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index'], ENT_QUOTES, 'UTF-8');?>
, 300, true]);
    })
  <?php } ?>
});
</script><?php }} ?>
