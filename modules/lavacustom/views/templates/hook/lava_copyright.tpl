{*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. 
*
*  @author    uhuPage <support@uhupage.com>
*  @copyright 2007-2016 uhuPage
*}

<div id="uhu_qt_copyright" class="copyright footer-block">
	{if $data['company'] <> ''}<span>{$data['company']|escape:'htmlall':'UTF-8'}</span>{/if}
	<span>{$data['copyright']|escape:'htmlall':'UTF-8'}</span>
	{if $data['image'] <> ''}<span class="logo"><img src="{$data['imgurl']|escape:'htmlall':'UTF-8'}{$data['image']|escape:'htmlall':'UTF-8'}" alt="" /></span>{/if}
	<p style="width: 0;height: 0;line-height: 0;padding: 0;margin: 0;overflow: hidden;">Designed by uhuPage</p>
</div>
