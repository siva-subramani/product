{*
* Amazon Advanced Payment APIs Modul
* for Support please visit www.patworx.de
*
*  @author patworx multimedia GmbH <service@patworx.de>
*  In collaboration with alkim media
*  @copyright  2013-2016 patworx multimedia GmbH
*  @license    Released under the GNU General Public License
*}

{if isset($postSuccess)}
	{foreach from=$postSuccess item=ps}
		<div class="alert alert-success">{$ps}</div>
	{/foreach}
{/if}

{if isset($postErrors)}
	{foreach from=$postErrors item=pe}
		<div class="alert alert-warning">{$pe}</div>
	{/foreach}
{/if}

<div class="panel" id="amzIntroduction">
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<img src="{$smarty.const._PS_BASE_URL_}{$smarty.const.__PS_BASE_URI__}modules/{$module_name}/views/img/amazon-payments.jpg" alt="amazon payments" class="img-responsive" />
		
			<h2>{l s='Make Amazon customers your customers' mod='amzpayments'}</h2>
			
			<h4>{l s='That\'s how it works:' mod='amzpayments'}</h4>
			
			<ol>
				<li><span>{l s='Register for Amazon Payments and complete your account setup by upload your verification documents on Seller Central.*' mod='amzpayments'}
					<br />
					{if $use_simple_path}
						<form method="POST" action="https://sellercentral-europe.amazon.com/hz/me/sp/redirect" target="_blank" id="amazonRegForm"> 
							<input type="hidden" value="{$simple_path.locale}" name="locale" />  
							<input type="hidden" value="{$simple_path.spId}" name="spId" />  
							<input type="hidden" value="{$simple_path.uniqueId}" name="uniqueId" />  
							<input type="hidden" value="{$simple_path.allowedLoginDomains}" name="allowedLoginDomains[]" />
							{foreach from=$simple_path.loginRedirectURLs_1 item=splr}
								<input type="hidden" value="{$splr}" name="loginRedirectURLs[]" />
							{/foreach}
							{foreach from=$simple_path.loginRedirectURLs_2 item=splr}
								<input type="hidden" value="{$splr}" name="loginRedirectURLs[]" />
							{/foreach}
							<input type="hidden" value="{$simple_path.storeDescription}" name="storeDescription" />  
							<input type="hidden" value="{$simple_path.language}" name="language" />  
							<input type="hidden" value="{$simple_path.returnMethod}" name="returnMethod" />
							<input type="hidden" value="{$simple_path.Source}" name="Source" />
							<input type="hidden" value="{$simple_path.sandboxMerchantIPNURL}" name="sandboxMerchantIPNURL" />
							<input type="hidden" value="{$simple_path.productionMerchantIPNURL}" name="productionMerchantIPNURL" />
							<a href="JavaScript:void(0)" onclick="jQuery('#amazonRegForm').submit();" class="registerButton">{l s='Start Registration Now' mod='amzpayments'}</a>  
						</form>  						
					{else}
						<a href="{$register_link}" class="registerButton" target="_blank">{l s='Start Registration Now' mod='amzpayments'}</a>
					{/if}	
					</span></li>
						
				<li><span>{l s='Wait for an email of Amazon Payments that will inform you about successful account verification.' mod='amzpayments'}</span></li>
				<li><span><a href="{$let_customer_know_link}" target="_blank">{l s='Let your customers know' mod='amzpayments'}</a> {l s='that they now can use Amazon Payments on your website.' mod='amzpayments'}</span></li>
			</ol>
			
			{if $youtube_video_link}
				<p>
					{l s='See our video-guide about the integration with PrestaShop:' mod='amzpayments'}
					<br />
					<a href="{$youtube_video_link}" target="_blank">{$youtube_video_link}</a>
				</p>
			{/if}
			
			<p>
				{if $lang_iso_code == 'es'}
					{capture assign=direct_dl_link}<a href="{$integration_guide_link}" target="_blank">{l s='here' mod='amzpayments'}</a>{/capture}
					{capture assign=stringcomplete}{l s='Download the Amazon Payments Integration Guide' mod='amzpayments' sprintf=$direct_dl_link}{/capture}
					{$stringcomplete|html_entity_decode}
				{else}
					{l s='Download the Amazon Payments Integration Guide' mod='amzpayments'} <a href="{$integration_guide_link}" target="_blank">{l s='here' mod='amzpayments'}</a>.
				{/if}
			</p>
			
			<p>
				* {l s='Note: Please use an email address you didn\'t use for any Amazon account yet.' mod='amzpayments'}
			</p>
		</div>
		<div class="col-xs-12 col-md-6">
			<p>
				<span class="amzTick"></span> <strong>{l s='Customer Loyalty' mod='amzpayments'}</strong><br />
				{l s='Offer an easy way for customers to login on your site.' mod='amzpayments'}
			</p>
			<p>
				<span class="amzTick"></span> <strong>{l s='Mobile-Friendly' mod='amzpayments'}</strong><br />
				{l s='Buttons and widgets are optimized across desktop, tablet and mobile.' mod='amzpayments'}
			</p>
			<p>
				<span class="amzTick"></span> <strong>{l s='Fraud Protection' mod='amzpayments'}</strong><br />
				{l s='You are covered by Amazon\'s fraud protection, provided at no additional cost.' mod='amzpayments'}
			</p>
			{if $lang_iso_code == 'de' || $lang_iso_code == 'en' || $lang_iso_code == 'us'}
				<p>
					<span class="amzTick"></span> <strong>{l s='Higher conversion, higher revenues' mod='amzpayments'}</strong><br />
					{l s='It can help you capture sales you might otherwise miss. Additionally, you benefit from the Amazon Payments fraud protection.' mod='amzpayments'}
				</p>
				<p>
					<span class="amzTick"></span> <strong>{l s='True payment processing' mod='amzpayments'}</strong><br />
					{l s='"Pay with Amazon" offers true payment processing. As a merchant, you will only forward the transaction amount.' mod='amzpayments'}
				</p>
			{/if}
			
			{if $youtube_video_embed_link}
				<iframe class="amz_integration_video_yt" width="80%" height="315" src="{$youtube_video_embed_link}" frameborder="0" allowfullscreen></iframe>
			{/if}
		</div>
	</div>
</div>

<div class="panel" id="amzSimplePath">
	<div class="panel-heading">
		<i class="icon-cogs"></i>
		{l s='Quick configuration' mod='amzpayments'}
	</div>
	<div class="row">
		<div class="col-xs-12">
			<p>
				{l s='Just use copy and paste to configure the module with your Amazon Payments credentials, directly out of the Seller Central.' mod='amzpayments'}
			</p>
			<textarea name="simple_path" id="simple_path"></textarea>
			<input type="button" name="simple_path_parse" id="simple_path_parse" value="{l s='Parse data' mod='amzpayments'}" />
		</div>
	</div>
</div>

{$configform}

<div class="panel">
	<div class="panel-heading">
		<i class="icon-info"></i>
		{l s='URL and Configuration Infos' mod='amzpayments'}
	</div>
	<div class="row">
		<div class="col-xs-12">
			<p>
				{l s='Allowed Return URLs - Enter these URLs in your Amazon SellerCentral Configuration-Panel!' mod='amzpayments'}
			</p>
			<ul>
				{foreach from=$allowed_return_url_1 item=aru}
					<li>{$aru}</li>
				{/foreach}
				{foreach from=$allowed_return_url_2 item=aru}
					<li>{$aru}</li>
				{/foreach}
			</ul>
			<p>
				{l s='Allowed JavaScript Origins - Enter these URLs in your Amazon SellerCentral Configuration-Panel!' mod='amzpayments'}
			</p>
			<ul>
				<li>{$allowed_js_origins}</li>
			</ul>
			<p>
				{l s='You can integrate the "Login with Amazon"-Button at any part of your template. Just use the following HTML-Code, but be aware to always (!) use a unique value for the attribute "id":' mod='amzpayments'}
			</p>
			<code> &lt;div id=&quot;&quot; class=&quot;amazonLoginWr&quot;&gt;&lt;/div&gt; </code>
		</div>
	</div>
</div>


<div class="panel" id="amzVersionChecker">
	<div class="panel-heading">
		<i class="icon-cogs"></i>
		{l s='Version-Checker' mod='amzpayments'}
	</div>
	<div class="row">
		<div class="col-xs-12">
			<p style="text-align: center" id="versionCheck">
				<img src="{$smarty.const._PS_BASE_URL_}{$smarty.const.__PS_BASE_URI__}modules/{$module_name}/views/img/loading_indicator.gif" />
				<br /><br />
				{l s='We check if there is a new version of the plugin available.' mod='amzpayments'}
				<br /><br />
			</p>
			<p style="text-align: center" id="versionCheckResult">
				{l s='Your version: ' mod='amzpayments'} <strong>{$current_version}</strong>
				<br /><br />
			</p>			
		</div>
	</div>
</div>

<script language="javascript">
	{literal}
	$(document).ready(function() {
		$.post("../modules/amzpayments/ajax.php",
		{
			action: "versionCheck",
			asv: "{/literal}{$current_version}{literal}",
			psv: "{/literal}{$smarty.const._PS_VERSION_}{literal}",
			ref: location.host
		}, 
		function(data) {	
			if (data.newversion == 1) {
				$("#versionCheckResult").append("{/literal}{l s='There is a new version available: ' mod='amzpayments'}{literal}<strong>" + data.newversion_number + "</strong><br /><br /><a href=\"http://www.patworx.de/Amazon-Advanced-Payment-APIs/PrestaShop\" target=\"_blank\">&gt; Download</a>");
			} else {
				$("#versionCheckResult").append("{/literal}{l s='Everything is fine - you are using the latest version' mod='amzpayments'}{literal}");
			}
			$("#versionCheck").hide();
		}, "json"
		);
	});
	{/literal}
</script>