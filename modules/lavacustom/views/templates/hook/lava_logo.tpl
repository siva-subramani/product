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

<div id="logo" class="">
	<a href="{$urls.base_url|escape:'htmlall':'UTF-8'}" title="{$data['logo_text']|escape:'htmlall':'UTF-8'}">
	{if $data['logo_type'] == 'text'}
		<div class="text">
			<div class="title">{$data['logo_text']|escape:'htmlall':'UTF-8'}{if $data['logo_subtitle'] <> ''}<span class="info">{$data['logo_subtitle']|escape:'htmlall':'UTF-8'}</span></div>
		{/if}
		</div>
	{else}
		<img class="logo img-responsive" src="{$data['logo_image']|escape:'htmlall':'UTF-8'}" />
	{/if}
	</a>
</div>