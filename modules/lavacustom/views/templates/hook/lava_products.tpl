{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. 
*
*  @author    uhuPage <support@uhupage.com>
*  @copyright 2007-2016 uhuPage
*  @license   GNU General Public License version 2
*}

{if $data['slider'] == 'yes'}
<script type="text/javascript">
	$(document).ready(function() {
		$('#products_{$data['tpl_id']|escape:'htmlall':'UTF-8'}').owlCarousel({
			loop: false,
			autoplay: false,
			margin: 30,
			responsiveClass: true,
			nav: false,
			dots: true,
			responsive: {
			0: 	{
					items: {$data['responsive'][0]|escape:'html':'UTF-8'},
				},
			768: {
					items: {$data['responsive'][1]|escape:'html':'UTF-8'},
				},
			992: {
					items: {$data['responsive'][2]|escape:'html':'UTF-8'},
				},
			1200: {
					items: {$data['responsive'][3]|escape:'html':'UTF-8'},
				}
			}
		})
	});
</script>
{/if}
<div id="{$data['tpl_id']|escape:'htmlall':'UTF-8'}" class="cols marginb">
	<div class="title_content">
		<h4 class="title_block list wow fadeInUp">{$data['title']|escape:'htmlall':'UTF-8'}</h4><span></span>
	</div>
	<div class="block_content">
		{if isset($data['ps_version']) && $data['ps_version'] == '1.6'}
			{if isset($data['products']) && $data['products']}
				{if isset($data['slider']) && $data['slider'] == 'no'}
					{include file="$tpl_dir./product-list.tpl" products=$data['products'] class='noslider' id="products_{$data['tpl_id']|escape:'htmlall':'UTF-8'}" effects="{$data['effect']|escape:'htmlall':'UTF-8'}" cols="cols" popular="{$data['popular']|escape:'htmlall':'UTF-8'}"}
				{else}
					{include file="$tpl_dir./product-list.tpl" products=$data['products'] class='' id="products_{$data['tpl_id']|escape:'htmlall':'UTF-8'}" effects="{$data['effect']|escape:'htmlall':'UTF-8'}" popular="{$data['popular']|escape:'htmlall':'UTF-8'}"}
				{/if}
			{else}
				<ul id="blocknewproducts" class="product_list">
					<li class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</li>
				</ul>
			{/if}
		{else}
			{if isset($data['products']) && $data['products']}
				<ul id="products_{$data['tpl_id']|escape:'htmlall':'UTF-8'}" class="product_list">
				{foreach from=$data['products'] item="product" name=myLoop}
				  {if isset($data['stamp'][$product.id_product]) && $data['stamp'][$product.id_product]}
					{include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider'] stamp=$data['stamp'][$product.id_product]}
				  {else}
					{include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider']}
				  {/if}
				{/foreach}
				</ul>
			{else}
				<div id="blocknewproducts" class="product_list">
					<li class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</li>
				</div>
			{/if}
		{/if}
	</div>
</div>
