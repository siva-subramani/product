{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. 
*
*  @author    uhuPage <support@uhupage.com>
*  @copyright 2007-2016 uhuPage
*}

<div class="service cols marginb">
	{if $data['title']}<h3 class="h3">{$data['title']|escape:'htmlall':'UTF-8'}</h3>{/if}
	<div class="block_content">
		<ul>
			{if $data['show_store'] == 'yes'}<li class="item"><a href="{$link->getPageLink('stores')|escape:'html':'UTF-8'}">{$data['store']|escape:'htmlall':'UTF-8'}</a></li>{/if}
			{if $data['show_sitemap'] == 'yes'}<li class="item"><a href="{$link->getPageLink('sitemap')|escape:'html':'UTF-8'}">{$data['sitemap']|escape:'htmlall':'UTF-8'}</a></li>{/if}
			{if $data['show_contact'] == 'yes'}<li class="item"><a href="{$link->getPageLink('contact', true)|escape:'html':'UTF-8'}">{$data['contact']|escape:'htmlall':'UTF-8'}</a></li>{/if}
		{foreach from=$data['cmslinks'] item=cmslink}
		{if $cmslink['title'] != ''}
			<li class="item"><a href="{$cmslink['link']|addslashes|escape:'html':'UTF-8'}">{$cmslink['title']|escape:'htmlall':'UTF-8'}</a></li>
		{/if}
		{/foreach}
		</ul>
	</div>
</div>
