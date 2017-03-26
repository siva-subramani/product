{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. 
*
*  @author    uhuPage <support@uhupage.com>
*  @copyright 2007-2016 uhuPage
*}

<div class="myaccount cols marginb">
	{if $data['my_title']}<h3 class="h3">{$data['my_title']|escape:'htmlall':'UTF-8'}</h3>{/if}
	<div class="block_content">
		<ul>
			<li><a href="{$link->getPageLink('addresses', true)|escape:'html'}" title="{$data['my_addresses']|escape:'htmlall':'UTF-8'}" rel="nofollow">{$data['my_addresses']|escape:'htmlall':'UTF-8'}</a></li>
			<li><a href="{$link->getPageLink('history', true)|escape:'html'}" title="{$data['my_orders']|escape:'htmlall':'UTF-8'}" rel="nofollow">{$data['my_orders']|escape:'htmlall':'UTF-8'}</a></li>
			{if $data['my_credit']}<li><a href="{$link->getPageLink('order-slip', true)|escape:'html'}" title="{$data['my_credit']|escape:'htmlall':'UTF-8'}" rel="nofollow">{$data['my_credit']|escape:'htmlall':'UTF-8'}</a></li>{/if}
			{if $data['my_personal']}<li><a href="{$link->getPageLink('identity', true)|escape:'html'}" title="{$data['my_personal']|escape:'htmlall':'UTF-8'}" rel="nofollow">{$data['my_personal']|escape:'htmlall':'UTF-8'}</a></li>{/if}
			{if $data['my_vouchers']}<li><a href="{$link->getPageLink('discount', true)|escape:'html'}" title="{$data['my_vouchers']|escape:'htmlall':'UTF-8'}" rel="nofollow">{$data['my_vouchers']|escape:'htmlall':'UTF-8'}</a></li>{/if}
		</ul>
	</div>
</div>
