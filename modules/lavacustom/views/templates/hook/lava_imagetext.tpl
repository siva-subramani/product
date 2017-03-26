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

<div id="{$data['id_name']|escape:'htmlall':'UTF-8'}" class="cols marginb advertising {$data['mod']|escape:'htmlall':'UTF-8'}">
	{if $data['title'] <> ''}
	<div class="title_content">
		<h4 class="title_block list wow fadeInUp">{$data['title']|escape:'htmlall':'UTF-8'}</h4><span></span>
	</div>
	{/if}
	<div class="block_content">
		<ul>
		{section name=loop loop=$data['adv_number']}
			{if $data['adv_image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
			<li class="ad{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}{if $smarty.section.loop.index % 4 > 1} alt{/if}{$data['adv_grid'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'} {$data['zoom']|escape:'htmlall':'UTF-8'} {$data['wow']|escape:'htmlall':'UTF-8'} {$data['adv_effect'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" data-wow-delay="{$data['wow_delay']|escape:'htmlall':'UTF-8'}">
				<div class="image-container">
					<a href="{$data['adv_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">
						<img class="img-fluid" src="{$data['adv_image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}"  />
						<div class="text-container">
							<div class="adv-details">
							{if $data['adv_title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
								<h3 class="item-title">{foreach from=$data['adv_title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] item=text name=myLoop}{if $smarty.foreach.myLoop.first}{$text|escape:'htmlall':'UTF-8'}{else}<br>{$text|escape:'htmlall':'UTF-8'}{/if}{/foreach}</h3>
							{/if}
							{if $data['adv_text'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
								<div class="item-html">{foreach from=$data['adv_text'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] item=text name=myLoop}{if $smarty.foreach.myLoop.first}{$text|escape:'htmlall':'UTF-8'}{else}<br>{$text|escape:'htmlall':'UTF-8'}{/if}{/foreach}</div>
							{/if}
							</div>
						</div>
					</a>
				</div>
			</li>
			{/if}
		{/section}	
		</ul>
	</div>	
</div>


