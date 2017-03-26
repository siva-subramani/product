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
		$('#uhu_tj_9502 .block_content').owlCarousel({
			loop: true,
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
<div id="uhu_tj_9502" class="cols marginb">
	<div class="block_content">
		{section name=loop loop=$data['category_number']}
		<div class="products_block {if $data['slider'] == 'yes'}cols{/if}">
			<h4 class="title_block list wow fadeInUp">{$data['title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>
			<div id="more_info_sheets" class="tabcontent">
				{if isset($data['ps_version']) && $data['ps_version'] == '1.6'}
					{if isset($data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) AND $data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}	
						{include file="$tpl_dir./product-list.tpl" products=$data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] class='pd tabpane' id="products_{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}"}
					{else}
						<ul id="blocknewproducts" class="tabcontent">
							<li class="alert alert-info">{$data['msg_featured']|escape:'htmlall':'UTF-8'}</li>
						</ul>
					{/if}
				{else}
					{if isset($data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) AND $data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}	
						<ul class="product_list grid pd row">
							{foreach from=$data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] item="product"}
								{include file="catalog/_partials/miniatures/product.tpl" product=$product slider=$data['slider']}
							{/foreach}
						</ul>
					{else}
						<ul class="product_list grid pd row">
							<p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
						</ul>
					{/if}
				{/if}
			</div>
		</div>
		{/section}
	</div>
</div>