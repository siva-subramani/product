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

{if $data['pos'] != 'top'}</div>{/if}<div class="menu">
		<ul class="nav_item umenu">
			<li class="nav_li logo"><a href="{$urls.base_url|escape:'htmlall':'UTF-8'}">
				{if $data['logo_type'] == 'text'}
					<span>{$data['logo_text']|escape:'htmlall':'UTF-8'}{if $data['logo_subtitle'] <> ''}<span class="info">{$data['logo_subtitle']|escape:'htmlall':'UTF-8'}</span>{/if}</span>
				{else}
					<img class="logo img-responsive" src="{$data['logo_image']|escape:'htmlall':'UTF-8'}" />
				{/if}
				</a>
			</li>

			{if isset($data['topmenu_hom'])}
			<li class="nav_li home"><a class="label {$data['topmenu_hom']['roll']|escape:'htmlall':'UTF-8'}" href="{$data['topmenu_hom']['link']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['topmenu_hom']['menu_title']|escape:'htmlall':'UTF-8'}">{$data['topmenu_hom']['menu_title']|escape:'htmlall':'UTF-8'}</span></a></li>
			{/if}

			{section name=loop loop=$data['total_lnk']}
			{if isset($data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}])}
			<li class="nav_li lnk{if $data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['width'] == 'no'} relative{/if}">
				<a class="label nav_a {$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['roll']|escape:'htmlall':'UTF-8'}" href="{$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['menu_link']|escape:'htmlall':'UTF-8'}">
					<span data-title="{$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['menu_title']|escape:'htmlall':'UTF-8'}">
						{$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['menu_title']|escape:'htmlall':'UTF-8'}
					</span>
				</a>
			{if $data['popup'] == 'yes' && isset($data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}])}
				<div class="nav_pop{if $data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['width'] == 'no'} minwidth{/if}  tr_all_hover">
					<dl class="pop_content">
					{section name=loop2 loop=$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['total']|escape:'htmlall':'UTF-8'}
                        <dd>
							{if $data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['image'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}] <> ''}<a href="{$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['link'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" class="lnk_image"><img class="img-responsive" src="{$data['imgurl']|escape:'htmlall':'UTF-8'}{$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['cmstitle'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" /></a>{/if}
							<p><a href="{$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['link'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_lnk'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['label'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></p>
						</dd>
                    {/section}
					</dl>
				</div>
			{/if}
			</li>
			{/if}
			{/section}

			{if isset($data['topmenu_all'])}
			<li class="nav_li catall"><a class="label nav_a {$data['topmenu_all']['roll']|escape:'htmlall':'UTF-8'}" href="{$data['topmenu_all']['link']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['topmenu_all']['menu_title']|escape:'htmlall':'UTF-8'}">{$data['topmenu_all']['menu_title']|escape:'htmlall':'UTF-8'}</span></a>
			{if $data['popup'] == 'yes'}
				<div class="nav_pop tr_all_hover">
				{if $data['topmenu_all']['display12'] == 'yes'}
					<dl class="pop_content products_block">
					{section name=loop loop=$data['topmenu_all']['allcats']['catcount1']|escape:'htmlall':'UTF-8'}
                        <dd>
							<span class="s_title_block"><a href="{$data['topmenu_all']['allcats']['catlink1'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_all']['allcats']['catname1'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></span>
							{section name=loop2 loop=$data['topmenu_all']['allcats']['catcount2'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}
                            <p><a href="{$data['topmenu_all']['allcats']['catlink2'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_all']['allcats']['catname2'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></p>
							{/section}
                        </dd>
                    {/section}
					</dl>
				{/if}

				{if $data['topmenu_all']['display11'] == 'yes'}
					<dl class="pop_adver">
					{section name=loop loop=$data['topmenu_all']['cates_count']|escape:'htmlall':'UTF-8'}
						<dd>
							<a href="{$data['topmenu_all']['cates'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['link']|escape:'htmlall':'UTF-8'}" class="product_image"><img class="img-responsive img-fluid" src="{$data['topmenu_all']['cates'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['image']|escape:'htmlall':'UTF-8'}" /></a>
							<h5 class="s_title_block"><a href="{$data['topmenu_all']['cates'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['link']|escape:'htmlall':'UTF-8'}">{$data['topmenu_all']['cates'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['name']|escape:'htmlall':'UTF-8'}</a></h5>
							<div class="product_desc">{$data['topmenu_all']['cates'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['desc']|escape:'htmlall':'UTF-8'}</div>
                        </dd>
                    {/section}
					</dl>
				{/if}
				</div>
			{/if}
			</li>
			{/if}

			{section name=loop loop=$data['total_cus']|escape:'htmlall':'UTF-8'}
			{if isset($data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}])}
			<li class="nav_li cat"><a class="label nav_a {$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['roll']|escape:'htmlall':'UTF-8'}" href="{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['category_link']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['category_name']|escape:'htmlall':'UTF-8'}">{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['category_name']|escape:'htmlall':'UTF-8'}</span></a>
			{if $data['popup'] == 'yes'}
				<div class="nav_pop tr_all_hover">
				{if $data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['display40'] == 'yes'}
					<dl class="pop_content products_block">
					{if $data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['type'] == 'Custom category'}
						{section name=loop2 loop=$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['cates_count']|escape:'htmlall':'UTF-8'}
						<dd>
							<span class="s_title_block">
								<a href="{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['cates_link'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['cates_name'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a>
							</span>
                        </dd>
						{/section}
					{else}
						{section name=loop3 loop=$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['allcats']['catcount1']|escape:'htmlall':'UTF-8'}
                        <dd>
							<span class="s_title_block"><a href="{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['allcats']['catlink1'][{$smarty.section.loop3.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['allcats']['catname1'][{$smarty.section.loop3.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></span>
							{section name=loop2 loop=$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['allcats']['catcount2'][{$smarty.section.loop3.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}
                            <p><a href="{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['allcats']['catlink2'][{$smarty.section.loop3.index|escape:'htmlall':'UTF-8'}][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['allcats']['catname2'][{$smarty.section.loop3.index|escape:'htmlall':'UTF-8'}][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></p>
							{/section}
                        </dd>
						{/section}
					{/if}
					</dl>
				{/if}

				{if $data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['display41'] == 'yes'}
					<dl class="pop_adver"><dd>
					{if $data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['adv_img'] <> ''}
						{if $data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['adv_lnk'] <> ''}<a href="{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['adv_lnk']|escape:'htmlall':'UTF-8'}">{/if}
						<img class="img-responsive img-fluid" src="{$data['imgurl']|escape:'htmlall':'UTF-8'}{$data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['adv_img']|escape:'htmlall':'UTF-8'}" />';
						{if $data['topmenu_cus'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['adv_lnk'] <> ''}</a>{/if}
					{/if}
					</dd></dl>
				{/if}
				</div>
			{/if}
			</li>
			{/if}
			{/section}
			
			{if isset($data['topmenu_pro'])}
			<li class="nav_li prd"><a class="label nav_a {$data['topmenu_pro']['roll']|escape:'htmlall':'UTF-8'}" href="{$data['topmenu_pro']['link']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['topmenu_pro']['menu_title']|escape:'htmlall':'UTF-8'}">{$data['topmenu_pro']['menu_title']|escape:'htmlall':'UTF-8'}</span></a>
			{if $data['popup'] == 'yes'}
				<div class="nav_pop tr_all_hover">
				{if $data['topmenu_pro']['display13'] == 'yes'}
					<dl class="pop_content products_block">
					{section name=loop loop=$data['topmenu_pro']['count']|escape:'htmlall':'UTF-8'}
					<dd>
						<a href="{$data['topmenu_pro']['productlink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" class="product_image"><img class="img-responsive img-fluid" src="{$data['topmenu_pro']['productimage'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" /></a>
                        <h5 class="s_title_block"><a href="{$data['topmenu_pro']['productlink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_pro']['productname'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></h5>
                        <div class="product_desc">{$data['topmenu_pro']['productdesc'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</div>
					</dd>
					{/section}
					</dl>
				{/if}

				{if $data['topmenu_pro']['display14'] == 'yes'}
					<dl class="pop_adver"><dd>
					{if $data['topmenu_pro']['adv_img'] <> ''}
						{if $data['topmenu_pro']['adv_lnk'] <> ''}<a href="{$data['topmenu_pro']['adv_lnk']|escape:'htmlall':'UTF-8'}">{/if}
						<img class="img-responsive img-fluid" src="{$data['imgurl']|escape:'htmlall':'UTF-8'}{$data['topmenu_pro']['adv_img']|escape:'htmlall':'UTF-8'}" />
						{if $data['topmenu_pro']['adv_lnk'] <> ''}</a>{/if}
					{/if}
					</dd></dl>
				{/if}
				</div>
			{/if}
			</li>
			{/if}
			
			{if isset($data['topmenu_bra'])}
			<li class="nav_li bra"><a class="label nav_a {$data['topmenu_bra']['roll']|escape:'htmlall':'UTF-8'}" href="{$data['topmenu_bra']['link']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['topmenu_bra']['menu_title']|escape:'htmlall':'UTF-8'}">{$data['topmenu_bra']['menu_title']|escape:'htmlall':'UTF-8'}</span></a>
			{if $data['popup'] == 'yes'}
				<div class="nav_pop tr_all_hover">
				{if $data['topmenu_bra']['display15'] == 'yes'}
					<dl class="pop_content products_block">
					{section name=loop loop=$data['topmenu_bra']['brands']|escape:'htmlall':'UTF-8'}
					<dd>
						<a href="{$data['topmenu_bra']['links'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" class="product_image"><img class="img-responsive img-fluid" src="{$data['topmenu_bra']['images'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}" /></a>
                        <h5 class="s_title_block"><a href="{$data['topmenu_bra']['links'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_bra']['names'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></h5>
					</dd>
					{/section}
					</dl>
				{/if}

				{if $data['topmenu_bra']['display16'] == 'yes'}
					<dl class="pop_adver"><dd>
					{section name=loop loop=$data['topmenu_bra']['bcount']|escape:'htmlall':'UTF-8'}
                        <p><a href="{$data['topmenu_bra']['url'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_bra']['name'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></p>
                    {/section}
					</dd></dl>
				{/if}
				</div>
			{/if}
			</li>
			{/if}

			{if isset($data['topmenu_new'])}
			<li class="nav_li news"><a class="label nav_a {$data['topmenu_new']['roll']|escape:'htmlall':'UTF-8'}" href="{$data['topmenu_new']['link']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['topmenu_new']['menu_title']|escape:'htmlall':'UTF-8'}">{$data['topmenu_new']['menu_title']|escape:'htmlall':'UTF-8'}</span></a>
			{if $data['popup'] == 'yes'}
				<div class="nav_pop tr_all_hover">
				{if $data['topmenu_new']['display_news'] == 'yes'}
					<dl class="pop_content products_block"><dd>
					{if $data['topmenu_new']['news_img'] <> ''}
						<div class="image"><img class="img-responsive img-fluid" src="{$data['imgurl']|escape:'htmlall':'UTF-8'}{$data['topmenu_new']['news_img']|escape:'htmlall':'UTF-8'}" /></div>
					{/if}
						<div class="content">
							<h5 class="s_title_block">{$data['topmenu_new']['news_block_title']|escape:'htmlall':'UTF-8'}</h5>
							{section name=loop loop=3}
							<p>{$data['topmenu_new']['news_title'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</p>
							<div class="product_desc">{$data['topmenu_new']['news_text'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</div>
							{/section}
						</div>
					</dd></dl>
				{/if}

				{if $data['topmenu_new']['display_cms'] == 'yes'}
					<dl class="pop_adver"><dd>
					<h5 class="s_title_block">{$data['topmenu_new']['news_cms_title']|escape:'htmlall':'UTF-8'}</h5>
					{section name=loop loop=$data['topmenu_new']['news_cms_count']|escape:'htmlall':'UTF-8'}
                        <p><a href="{$data['topmenu_new']['news_cmslink'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_new']['news_cmstitle'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></p>
                    {/section}
					</dd></dl>
				{/if}
				</div>
			{/if}
			</li>
			{/if}

			{section name=loop loop=5}
			{if isset($data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['label'])}
			<li class="nav_li cms{if $data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['width'] == 'no'} relative{/if}"><a href="label {$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['link']|escape:'htmlall':'UTF-8'}" class="label nav_a {$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['nav']|escape:'htmlall':'UTF-8'} {$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['roll']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['label']|escape:'htmlall':'UTF-8'}">{$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['label']|escape:'htmlall':'UTF-8'}</span></a>
			{if $data['popup'] == 'yes' && {$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['nav']|escape:'htmlall':'UTF-8'} == 'nav_a'}
				<div class="nav_pop{if $data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['width'] == 'no'} minwidth{/if} tr_all_hover">
					<dl class="pop_content"><dd>
					{section name=loop2 loop=$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['cms_count']|escape:'htmlall':'UTF-8'}
                        <p><a href="{$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['cmslink'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{$data['topmenu_cms'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]['cmstitle'][{$smarty.section.loop2.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</a></p>
                    {/section}
					</dd></dl>
				</div>
			{/if}
			</li>
			{/if}
			{/section}

			{if $data['logged']}
            <li class="myaccount"><a class="label" href="{$data['my_account_url']|escape:'htmlall':'UTF-8'}" title="{$data['menu_myaccount']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['menu_myaccount']|escape:'htmlall':'UTF-8'}">{$data['menu_myaccount']|escape:'htmlall':'UTF-8'}</span></a></li>
            <li class="signout"><a class="label" href="{$data['logout_url']|escape:'htmlall':'UTF-8'}" title="{$data['menu_signout']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['menu_signout']|escape:'htmlall':'UTF-8'}">{$data['menu_signout']|escape:'htmlall':'UTF-8'}</span></a></li>
            {else}
            <li class="signin"><a class="label" href="{$data['my_account_url']|escape:'htmlall':'UTF-8'}" title="{$data['menu_signin']|escape:'htmlall':'UTF-8'}"><span data-title="{$data['menu_signin']|escape:'htmlall':'UTF-8'}">{$data['menu_signin']|escape:'htmlall':'UTF-8'}</span></a></li>
			{/if}

			<li class="search"><span id="search-icon"><i class="material-icons">&#xe8b6;</i></span></li>
			<li class="sf-search">
				<form id="searchbox" action="{$link->getPageLink('search')|escape:'htmlall':'UTF-8'}" method="get">
					<input type="hidden" name="controller" value="search" />
					<input type="text" name="s" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|escape:'html':'UTF-8'}{/if}" />
					<button type="submit"><i class="material-icons">&#xe8b6;</i></button>
				</form>
			</li>
		</ul>


{if $data['pos'] == 'top'}
	</div>
{/if}
<script type="text/javascript">
	$('#header .menu ul.nav_item li.catall').click(function(){
		$('div.nav_pop').slideToggle();
	});
		
	$(document).ready(function(){
		$('.nav_item > li').mouseover(function(){
			$(this).addClass('active');
		});				
		$('.nav_item > li').mouseleave(function(){
			$(this).removeClass('active');
		});
	});
</script>