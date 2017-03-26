{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. 
*
*  @author    uhuPage <support@uhupage.com>
*  @copyright 2007-2016 uhuPage
*}

<div class="extra cols marginb">
	{if $data['title']}<h3 class="h3">{$data['title']|escape:'htmlall':'UTF-8'}</h3>{/if}
	<ul>
		{if $data['show_drop'] == 'yes'}<li class="item"><a href="{$link->getPageLink('prices-drop')|escape:'html':'UTF-8'}">{$data['special']|escape:'htmlall':'UTF-8'}</a></li>{/if}
		{if $data['show_new'] == 'yes'}<li class="item"><a href="{$link->getPageLink('new-products')|escape:'html':'UTF-8'}">{$data['new']|escape:'htmlall':'UTF-8'}</a></li>{/if}
		{if $data['show_best'] == 'yes'}<li class="item"><a href="{$link->getPageLink('best-sales')|escape:'html':'UTF-8'}">{$data['best']|escape:'htmlall':'UTF-8'}</a></li>{/if}
		{if $data['show_brand'] == 'yes'}<li class="item"><a href="{$link->getPageLink('manufacturer')|escape:'html':'UTF-8'}">{$data['brand']|escape:'htmlall':'UTF-8'}</a></li>{/if}
		{foreach from=$data['cmslinks'] item=cmslink}
		{if $cmslink['title'] != ''}
			<li class="item"><a href="{$cmslink['link']|addslashes|escape:'html':'UTF-8'}">{$cmslink['title']|escape:'htmlall':'UTF-8'}</a></li>
		{/if}
		{/foreach}
	</ul>
</div>
