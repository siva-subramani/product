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

{if $data['owlslider'] == 'yes' && $data['items_number'] > 1}
<script type="text/javascript">
	$(document).ready(function() {
		$('.{$data['owlid']|escape:'htmlall':'UTF-8'}').owlCarousel({
			loop: true,
			autoplay: false,
			margin: 30,
			responsiveClass: true,
			nav: false,
			dots: true,
			responsive: {
			0: 	{
					items: {$data['responsive0']|escape:'html':'UTF-8'},
				},
			768: {
					items: {$data['responsive1']|escape:'html':'UTF-8'},
				},
			992: {
					items: {$data['responsive2']|escape:'html':'UTF-8'},
				},
			1200: {
					items: {$data['responsive3']|escape:'html':'UTF-8'},
				}
			}
		})
	});
</script>
{/if}
<div id="{$data['tplid']|escape:'htmlall':'UTF-8'}" class="cols marginb">
	{if isset($data['block_title']) && $data['block_title']}
	<div class="title_content">
		<h4 class="title_block">{$data['block_title']|escape:'htmlall':'UTF-8'}</h4><span></span>
	</div>
	{/if}
	{if isset($data['block_info']) && $data['block_info']}
	<h5 class="block_info">{$data['block_info']|escape:'htmlall':'UTF-8'}</h5>
	{/if}
	<div class="block_content">
		<ul class="{$data['owlid']|escape:'htmlall':'UTF-8'}">
		{section name=loop loop=$data['items_number']}
		{if $data['title'][$smarty.section.loop.index] <> '' || $data['logo'][$smarty.section.loop.index] <> '' || $data['texts'][$smarty.section.loop.index] <> ''}
			<li class="{if $data['owlslider'] != 'yes'}cols{/if} wow slideInUp {if $smarty.section.loop.first}first_item{/if} {if $smarty.section.loop.last}last_item{/if}" data-wow-delay="">
				<div class="list-container">

						{if $data['logo'][$smarty.section.loop.index] <> ''}
							{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}<a class="logo" href="{$data['link'][$smarty.section.loop.index]|escape:'html':'UTF-8'}">{/if}
							<img class="img-fluid img-responsive" src="{$data['imgurl'][$smarty.section.loop.index]|escape:'html':'UTF-8'}{$data['logo'][$smarty.section.loop.index]|escape:'html':'UTF-8'}" alt="" />
							{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}</a>{/if}
						{/if}
						<div class="type-text">
							{if isset($data['title'][$smarty.section.loop.index]) && $data['title'][$smarty.section.loop.index] <> ''}
							<span class="title_news">
								<a href="{$data['link'][$smarty.section.loop.index]|escape:'html':'UTF-8'}" data-hover="{$data['title'][$smarty.section.loop.index]|escape:'html':'UTF-8'}">{$data['title'][$smarty.section.loop.index]|escape:'html':'UTF-8'}</a>
							</span>
							{/if}

							{if isset($data['subtitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['subtitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
								<span class="sub_title">{$data['subtitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</span>
							{/if}

							{if isset($data['texts'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['texts'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
							<p class="desc">{foreach from=$data['texts'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] item=text name=myLoop}{if $smarty.foreach.myLoop.first}{$text|escape:'htmlall':'UTF-8'}{else}<br>{$text|escape:'htmlall':'UTF-8'}{/if}{/foreach}</p>
							{/if}

							{if isset($data['ftitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['ftitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
							<span class="foot_title title">
								{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}
								<a href="{$link_{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}}">
								{/if}
									{$data['ftitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}
								{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}
								</a>
								{/if}
							</span>
							{/if}

							{if isset($data['fsubtitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]) && $data['fsubtitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] <> ''}
								<span class="foot_subtitle subtitle">{$data['fsubtitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</span>
							{/if}
						</div>

				</div>
			</li>
		{/if}
		{/section}
		</ul>
	</div>
</div>

