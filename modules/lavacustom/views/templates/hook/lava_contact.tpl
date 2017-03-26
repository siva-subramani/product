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

<div id="uhu_contactus_foot" class="contactus cols marginb" data-stellar-background-ratio="0.1">
	<div class="block_content">
	{if $data['logo'] <> ''}
		<div class="image cols">
			{if $data['link'] <> ''}<a href="{$data['link']|escape:'htmlall':'UTF-8'}">{/if}
			<img class="img-responsive wow animated slideInUp" src="{$data['imgurl']|escape:'htmlall':'UTF-8'}{$data['logo']|escape:'htmlall':'UTF-8'}" alt="" />
			{if $data['link'] <> ''}</a>{/if}
		</div>
	{/if}
		<div class="info-content cols">
		{if $data['subtitle'] <> ''}<h4 class="h4 wow animated fadeInDown">{$data['subtitle']|escape:'htmlall':'UTF-8'}</h4>{/if}
		{if $data['title'] <> ''}<h3 class="h3 wow animated fadeInDown">{$data['title']|escape:'htmlall':'UTF-8'}</h3>{/if}
		{if $data['text'] <> ''}<p class="wow animated lightSpeedIn">{$data['text']|escape:'html':'UTF-8'|nl2br}</p>{/if}
		</div>
		<div class="address-content cols">
			<ul>
			{if $data['phone'] != ''}<li class="phone wow animated lightSpeedIn"><i class="material-icons">contact_phone</i>{foreach from=$data['phone'] item=phone name=myLoop}{if $smarty.foreach.myLoop.first}{$phone|escape:'htmlall':'UTF-8'}{else}<br>{$phone|escape:'htmlall':'UTF-8'}{/if}{/foreach}</li>{/if}
			{if $data['company'] != ''}<li class="company wow animated lightSpeedIn"><i class="material-icons">business</i>{foreach from=$data['company'] item=company name=myLoop}{if $smarty.foreach.myLoop.first}{$company|escape:'htmlall':'UTF-8'}{else}<br>{$company|escape:'htmlall':'UTF-8'}{/if}{/foreach}</li>{/if}
			{if $data['address'] != ''}<li class="address wow animated lightSpeedIn"><i class="material-icons">location_on</i>{foreach from=$data['address'] item=address name=myLoop}{if $smarty.foreach.myLoop.first}{$address|escape:'htmlall':'UTF-8'}{else}<br>{$address|escape:'htmlall':'UTF-8'}{/if}{/foreach}</li>{/if}
			{if $data['email'] != ''}<li class="email wow animated lightSpeedIn"><i class="material-icons">mail</i>{foreach from=$data['email'] item=mail name=myLoop}{if $smarty.foreach.myLoop.first}{mailto address=$mail encode="hex"}{else}<br>{mailto address=$mail encode="hex"}{/if}{/foreach}</li>{/if}
			</ul>
		</div>
	</div>
</div>
