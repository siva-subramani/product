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

<div id="uhu_counter" class="">
	{if isset($data['block_title']) && $data['block_title']}
	<div class="title_content">
		<h2 class="title_block">{$data['block_title']|escape:'htmlall':'UTF-8'}</h2><span></span>
	</div>
	{/if}
	{if isset($data['block_info']) && $data['block_info']}
	<p class="title_info">{$data['block_info']|escape:'htmlall':'UTF-8'}</p>
	{/if}
	<div class="block_content">
		<ul>
		{section name=loop loop=$data['number']}
			<li class="{$data['itemgrid']|escape:'htmlall':'UTF-8'} {if $smarty.section.loop.first}first_item {/if}wow slideInUp" data-wow-delay="">
				<div class="list-container">
				{if $data['type'] == 'icon'}
					<i class="{$data['icon'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}"></i>
				{/if}
				{if $data['type'] == 'image'}
					<img class="img-responsive" src="{$data['image'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}" alt="" />
				{/if}
					<div class="type-text">
						<span class="counter" data-from="0" data-to="{$data['count'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}" data-speed="2500" data-refresh-interval="50"></span>
						<h3>{$data['title'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}</h3>
					</div>
				</div>
			</li>
		{/section}
		</ul>
	</div>
</div>
