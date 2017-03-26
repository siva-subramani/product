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

<div id="{if isset($data['block_id']) && $data['block_id']}{$data['block_id']|escape:'htmlall':'UTF-8'}{else}uhu_reassure_top{/if}" class="reatop cols marginb">
	<ul class="{$data['slider_id']|escape:'htmlall':'UTF-8'}">
	{section name=loop loop=$data['number']}
		{if $data['title'][$smarty.section.loop.index|escape:'htmlall':'UTF-8'] <> '' || $data['icon'][$smarty.section.loop.index|escape:'htmlall':'UTF-8'] <> ''}
			<li class="cols item {if $smarty.section.loop.first}first_item {/if}wow slideInUp" data-wow-delay="">
				<div class="list-container">
				{if $data['type'] == 'icon'}
					<i class="material-icons">{$data['icon'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}</i>
				{else}
					<img class="img-fluid img-responsive" src="{$data['image'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}" alt="" />
				{/if}
					<div class="type-text">
						<h3>{$data['title'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}</h3>
						{if isset($data['text'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']) && $data['text'][$smarty.section.loop.index|escape:'htmlall':'UTF-8'] <> ''}
							{foreach from=$data['text'][$smarty.section.loop.index|escape:'htmlall':'UTF-8'] item=text name=myLoop}
								{if $text <> ''}<p>{$text|escape:'html':'UTF-8'|nl2br}</p>{/if}
							{/foreach}
						{/if}
					</div>
				</div>
			</li>
		{/if}
		{/section}
	</ul>
</div>
