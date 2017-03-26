{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. 
*
*  @author    uhuPage <support@uhupage.com>
*  @copyright 2007-2016 uhuPage
*}

<div id="block_various_links_footer" class="information cols marginb">
	{if $data['title']}<h3 class="h3">{$data['title']|escape:'htmlall':'UTF-8'}</h3>{/if}
	<ul id="cms">
	{foreach from=$data['cmslinks'] item=cmslink}
	{if $cmslink['title'] != ''}
		<li class="item"><a href="{$cmslink['link']|addslashes|escape:'html':'UTF-8'}">{$cmslink['title']|escape:'htmlall':'UTF-8'}</a></li>
	{/if}
	{/foreach}
	</ul>
</div>
