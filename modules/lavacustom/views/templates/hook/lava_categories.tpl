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

<div id="{$data['tpl_id']|escape:'htmlall':'UTF-8'}" class="cols marginb">
	{if isset($data['block_title']) && $data['block_title']}
	<div class="title_content">
		<h4 class="title_block">{$data['block_title']|escape:'htmlall':'UTF-8'}</h4><span></span>
	</div>
	{/if}
	{if isset($data['block_info']) && $data['block_info']}
	<h5 class="block_info">{$data['block_info']|escape:'htmlall':'UTF-8'}</h5>
	{/if}
	<div class="block_content">
		<ul>
		{section name=loop loop=$data['number']}
		{* if $data['cat_name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> '' || $data['image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> '' *}
			<li class="li{$smarty.section.loop.index|escape:'htmlall':'UTF-8'} cols wow slideInUp {if $smarty.section.loop.first}first_item{/if} {if $smarty.section.loop.last}last_item{/if}" data-wow-delay="">
				<div class="list-container">
					<div class="image_content">
						<div class="type-image">
							{if isset($data['link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
								<a href="{$data['link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">
							{/if}
								<img class="img-fluid" src="{$data['image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" alt="" />
							{if isset($data['link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
								</a>
							{/if}
						</div>
						{if $data['title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> '' || $data['text'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
						<div class="type-text">
							{if isset($data['title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}<h4>{$data['title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>{/if}
							{if isset($data['text'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['text'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
								{foreach from=$data['text'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] item=text name=myLoop}
								{if $text <> ''}<p>{$text|escape:'html':'UTF-8'|nl2br}</p>{/if}
								{/foreach}
							{/if}
						</div>
						{/if}
					</div>
					<div class="type-category">
						{if isset($data['cat_name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['cat_name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
							<h4>
								<a href="{$data['cat_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" data-hover="{$data['cat_name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['cat_name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a>
							</h4>
						{/if}
						{if $data['subnumber'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] > 0}
							{section name=sloop loop=$data['subnumber'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
								<p>
									<a href="{$data['sub_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}][{$smarty.section.sloop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}"  data-hover="{$data['sub_name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}][{$smarty.section.sloop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['sub_name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}][{$smarty.section.sloop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a>
								</p>
							{/section}
						{/if}
					</div>
					{if isset($data['ftitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['ftitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
					<h4 class="foot_title">
						{if isset($data['flink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['flink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
						<a href="{$data['flink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">
						{/if}
						{$data['ftitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}
						{if isset($data['flink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['flink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
						</a>
						{/if}
					</h4>
					{/if}
				</div>
			</li>
		{* /if *}
		{/section}
		</ul>
	</div>
</div>

