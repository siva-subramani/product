<div class="images-container">
  {block name='product_cover'}
    <div class="product-images-wrap">
      {foreach from=$product.images item=image}
        <div class="product-cover">
          <img class="js-qv-product-cover" src="{$image.bySize.large_default.url}" alt="{$image.legend}" title="{$image.legend}" style="width:100%;" itemprop="image">
          <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
            <i class="material-icons zoom-in">&#xE8FF;</i>
          </div>
        </div>
      {/foreach}
    </div>
  {/block}

  {block name='product_images'}
    <!-- div class="js-qv-mask mask" -->
      <div class="product-images product-thumbnails-wrap">
        {foreach from=$product.images item=image}
          <div class="thumbs-container">
            <img
              class="thumbnail {if $image.id_image == $product.cover.id_image} selected {/if}"
              data-image-large-src="{$image.bySize.medium_default.url}"
              src="{$image.bySize.home_default.url}"
              alt="{$image.legend}"
              title="{$image.legend}"
              itemprop="image"
            >
          </div>
        {/foreach}
      </div>
    <!-- /div -->
  {/block}
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
  {foreach from=$product.images item=image name=foo}
    $('.product-thumbnails-wrap .owl-item:eq({$smarty.foreach.foo.index})').click(function() {
        owlImages.trigger('to.owl.carousel', [{$smarty.foreach.foo.index}, 300, true]);
    })
  {/foreach}
});
</script>