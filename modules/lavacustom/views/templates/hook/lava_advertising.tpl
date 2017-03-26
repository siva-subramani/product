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

<div id="{$data['id_name']|escape:'htmlall':'UTF-8'}" class="advertising {$data['mod']|escape:'htmlall':'UTF-8'}">
	{if $data['title'] <> ''}
	<h4 class="title_block list wow fadeInUp">{$data['title']|escape:'htmlall':'UTF-8'}</h4>
	{/if}
	<div class="block_content">
		<ul>
		{section name=loop loop=$data['adv_number']}
			{if $data['adv_image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
			<li class="ad{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}{$data['adv_grid'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'} {$data['zoom']|escape:'htmlall':'UTF-8'} {$data['wow']|escape:'htmlall':'UTF-8'} {$data['adv_effect'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" data-wow-delay="{$data['wow_delay']|escape:'htmlall':'UTF-8'}">
				<div class="image-container">
					<a href="{$data['adv_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">
						<img class="img-responsive" src="{$data['adv_image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}"  />
					</a>
					{if $data['zoom'] == 'rollimg' || $data['zoom'] == 'circleimg' || $data['zoom'] == 'upimg' || $data['zoom'] == 'downimg' || $data['zoom'] == 'rightimg' || $data['zoom'] == 'leftimg'}
						<a class="img_roll" href="{$data['adv_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" style="background-image:url({$data['adv_image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'})"></a>
					{/if}
				</div>
			</li>
			{/if}
		{/section}	
		</ul>
	</div>	
</div>
