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
		$('.{$data['owlid']|escape:'html':'UTF-8'}').owlCarousel({
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
<div id="{$data['tplid']|escape:'htmlall':'UTF-8'}" class="contactus news cols marginb">
	{if isset($data['block_title']) && $data['block_title']}
	<div class="title_content">
		<h2 class="title_block">{$data['block_title']|escape:'htmlall':'UTF-8'}</h2><span></span>
	</div>
	{/if}
	{if isset($data['block_info']) && $data['block_info']}
	<h5 class="block_info">{$data['block_info']|escape:'htmlall':'UTF-8'}</h5>
	{/if}
	<div class="news_content">
		<div class="{$data['owlid']|escape:'html':'UTF-8'}">
		{section name=loop loop=$data['items_number']}
			<div class="block_content">
			{if $data['logo'][$smarty.section.loop.index] <> ''}
				<div class="logo">
					{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}<a href="{$data['link'][$smarty.section.loop.index]|escape:'html':'UTF-8'}">{/if}
					<img class="img-responsive wow animated slideInUp" src="{$data['imgurl']|escape:'htmlall':'UTF-8'}{$data['logo'][$smarty.section.loop.index]|escape:'html':'UTF-8'}" alt="" />
					{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}</a>{/if}
				</div>
			{/if}
				<div class="info">
				{if $data['subtitle'][$smarty.section.loop.index] <> ''}<h5 class="sub_title wow animated fadeInDown">{$data['subtitle'][$smarty.section.loop.index]|escape:'html':'UTF-8'}</h5>{/if}
				{if $data['title'][$smarty.section.loop.index] <> ''}<h4 class="title_news wow animated fadeInDown">
				{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}<a href="{$data['link'][$smarty.section.loop.index]|escape:'html':'UTF-8'}">{/if}
				{$data['title'][$smarty.section.loop.index]|escape:'html':'UTF-8'}
				{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}</a>{/if}
				</h4>{/if}
				{foreach from=$data['texts'][$smarty.section.loop.index] item=text name=myLoop}
				{if $text <> ''}<p class="infos wow animated lightSpeedIn">{$text|escape:'html':'UTF-8'|nl2br}</p>{/if}
				{/foreach}
				{if $data['ftitle'][$smarty.section.loop.index] <> ''}<h4 class="title wow animated fadeInDown">
				{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}<a href="{$data['link'][$smarty.section.loop.index]|escape:'html':'UTF-8'}">{/if}
				{$data['ftitle'][$smarty.section.loop.index]|escape:'html':'UTF-8'}
				{if isset($data['link'][$smarty.section.loop.index]) && $data['link'][$smarty.section.loop.index] <> ''}</a>{/if}
				</h4>{/if}
				{if $data['fsubtitle'][$smarty.section.loop.index] <> ''}<h5 class="subtitle wow animated fadeInDown">{$data['fsubtitle'][$smarty.section.loop.index]|escape:'html':'UTF-8'}</h5>{/if}
				</div>
			</div>
		{/section}
		</div>
	</div>
</div>