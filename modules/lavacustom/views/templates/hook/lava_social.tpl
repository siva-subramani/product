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

<div id="uhu_social" class="social cols marginb">
	{if $data['so_title']}<h3 class="h3">{$data['so_title']|escape:'htmlall':'UTF-8'}</h3>{/if}
	<ul class="{$data['so_effect']|escape:'htmlall':'UTF-8'}">
		{section name=loop loop=$data['so_number']}
		{if $data['so_link'][$smarty.section.loop.index|escape:'htmlall':'UTF-8'] != ''}
		<li><a class="_blank" href="{$data['so_link'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}">
			{if $data['so_type'] == 'image'}
			<span class="s{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}" style="background-image:url({$data['so_image'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']})"></span>
			{else}
			<i class="{$data['so_icon'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}"></i>
			{/if}
		</a></li>
		{/if}
		{/section}
	</ul>
</div>
