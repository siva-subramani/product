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

<div id="uhu_tj_9502" class="cols marginb">
	<div class="title_content">
		<h4 class="title_block list wow fadeInUp">{$data['blocktitle']|escape:'htmlall':'UTF-8'}</h4><span></span>
	</div>
	<ul id="home-uhu-tabs" class="nav nav-tabs title_content">
		{section name=loop loop=$data['category_number']}
			<li class="nav-item{if $smarty.section.loop.first} active{/if}"><a data-toggle="tab" href="#uhuproducts_{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}" class="uhuproducts title_block">{$data['title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></li>
		{/section}
	</ul>
	<div id="home-uhu-contents" class="tab-content">
		{section name=loop loop=$data['category_number']}
			{if isset($data['ps_version']) && $data['ps_version'] == '1.6'}
				{if isset($data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) AND $data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}	
					{include file="$tpl_dir./product-list.tpl" products=$data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] class='uhufeatured tab-pane{if $smarty.section.loop.first} active{/if}' id="uhuproducts_{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}"}
				{else}
					<ul id="uhuproducts_{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}" class="product_list uhufeatured tab-pane{if $smarty.section.loop.first} active in{/if}">
						<li class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</li>
					</ul>
				{/if}
			{else}
				{if isset($data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) AND $data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}	
					<ul id="uhuproducts_{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}" class="product_list uhufeatured tab-pane{if $smarty.section.loop.first} active in{/if}">
						{foreach from=$data['catprd'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] item="product"}
							{include file="catalog/_partials/miniatures/product.tpl" product=$product slider=$data['slider']}
						{/foreach}
					</ul>
				{else}
					<ul id="uhuproducts_{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}" class="product_list uhufeatured tab-pane{if $smarty.section.loop.first} active in{/if}">
						<p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
					</ul>
				{/if}
			{/if}
		{/section}
	</div>
</div>

