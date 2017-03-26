<li class="{if isset($slider) AND $slider == 'no'}cols {/if}product-layout js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
  <div class="product-container thumbnail-container">
    {block name='product_thumbnail'}
	<div class="left-block">
	<div class="product-image-container">
      <a href="{$product.url}" class="thumbnail product-thumbnail">
        <img
          class = "img-fluid{if isset($product.images) && count($product.images) > 1} image-cover{/if}"
          src = "{$product.cover.bySize.home_default.url}"
          alt = "{$product.cover.legend}"
          data-full-size-image-url = "{$product.cover.large.url}"
        >
        {foreach from=$product.images item=image}
        {if $image.id_image != $product.cover.id_image}
        <img
          class = "img-fluid image-hover"
          src = "{$image.bySize.home_default.url}"
          alt = "{$image.legend}"
          data-full-size-image-url = "{$product.cover.large.url}"
        >
        {break}
        {/if}
        {/foreach}
      </a>
	</div>
	</div>
    {/block}

    <div class="right-block product-description">
      {block name='product_name'}
        <h1 class="h3 product-title" itemprop="name"><a href="{$product.url}">{$product.name|truncate:30:'...'}</a></h1>
      {/block}

      {block name='product_description_short'}
        <div class="product-description-short" itemprop="description">{$product.description_short|escape:'html':'UTF-8' nofilter}</div>
      {/block}

      {block name='product_list_actions'}
        <div class="product-list-actions">
		  <a
			href="#"
			class="quick-view up"
			data-link-action="quickview"
		  >
			<i class="material-icons search">&#xE8B6;</i> {l s='Quick view' d='Shop.Theme.Actions'}
		  </a>
          {* if $product.add_to_cart_url}
              <a
                class = "add-to-cart"
                href  = "{$product.add_to_cart_url}"
                rel   = "nofollow"
                data-id-product="{$product.id_product}"
                data-id-product-attribute="{$product.id_product_attribute}"
                data-link-action="add-to-cart"
                title = "{l s='Add to cart' d='Shop.Theme.Actions'}"
              >{l s='Add to cart' d='Shop.Theme.Actions'}</a>
          {/if *}
        </div>
      {/block}

      {block name='product_price_and_shipping'}
        {if $product.show_price}
          <div class="product-price-and-shipping">
            {if $product.has_discount}
              {hook h='displayProductPriceBlock' product=$product type="old_price"}

              <span class="regular-price">{$product.regular_price}</span>
              {if $product.discount_type === 'percentage'}
                <span class="discount-percentage">{$product.discount_percentage}</span>
              {/if}
            {/if}

            {hook h='displayProductPriceBlock' product=$product type="before_price"}

            <span itemprop="price" class="price">{$product.price}</span>

            {hook h='displayProductPriceBlock' product=$product type='unit_price'}

            {hook h='displayProductPriceBlock' product=$product type='weight'}

          {if isset($stamp) && $stamp}
            <script type="text/javascript">
            $(document).ready(function(){
                $('#countdown{$product.id_product}').countdown({
                    timestamp : {$stamp} - (new Date()).getTime()
                });
                $('.countdown-content .Days').html('{$data['text_days']}');
                $('.countdown-content .Hours').html('{$data['text_hours']}');
                $('.countdown-content .Minutes').html('{$data['text_minutes']}');
                $('.countdown-content .Seconds').html('{$data['text_seconds']}');
            });
            </script>
            <div id="countdown{$product.id_product}" class="countdown-content"></div>
          {/if}

          </div>
        {/if}
      {/block}
    </div>
    {block name='product_flags'}
      <ul class="product-flags">
        {foreach from=$product.flags item=flag}
          <li class="{$flag.type}">{$flag.label}</li>
        {/foreach}
      </ul>
    {/block}
    <div class="highlighted-informations{if !$product.main_variants} no-variants{/if} hidden-sm-down">
      {block name='product_variants'}
        {if $product.main_variants}
          {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
        {/if}
      {/block}
    </div>

  </div>
</li>
