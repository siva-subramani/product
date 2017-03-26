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

<link rel="stylesheet" href="{$data['maintenance_css']|escape:'htmlall':'UTF-8'}" type="text/css" />
<link rel="stylesheet" href="{$data['bgslide_css']|escape:'htmlall':'UTF-8'}" type="text/css" />
<link rel="stylesheet" href="{$data['countdown_css']|escape:'htmlall':'UTF-8'}" type="text/css" />
<link rel="stylesheet" href="{$data['mystyle_css']|escape:'htmlall':'UTF-8'}" type="text/css" />
{if $data['googlefonts']}
<link rel="stylesheet" href="{$data['securemode']|escape:'htmlall':'UTF-8'}fonts.googleapis.com/css?family={$data['googlefonts']|escape:'htmlall':'UTF-8'}" type="text/css">
{/if}
{if $data['countdown'] == 'yes'}
<script type="text/javascript"><!--
$(document).ready(function(){
	//alert(start_time+'\n'+now_time+'\n');
	$('#counter').countdown({
		timestamp : {$data['countdown_stamp']|escape:'htmlall':'UTF-8'} - (new Date()).getTime()
	});
});
//--></script>
{/if}
</head>
<body class="maintenance">
<style>
{if $data['static'] == 'Dynamic'}
	{if $data['slideshow-span']}
		{$data['slideshow-span']|escape:'htmlall':'UTF-8'}
	{/if}
	{section name=loop loop=$data['number']}
		{$data['slideshow-li'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']|escape:'htmlall':'UTF-8'}
	{/section}
{/if}
</style>
{if $data['static'] == 'Dynamic'}
	<ul id="bgimg" class="bg-slideshow">
	{section name=loop loop=$data['number']} 
		<li><span></span></li>
	{/section}
	</ul>
{/if}
	<div class="container">
		<div class="logo"><img src="{$data['logo']|escape:'htmlall':'UTF-8'}" {if $data['logo_width']}width="{$data['logo_width']|escape:'htmlall':'UTF-8'}"{/if} {if $data['logo_height']}height="{$data['logo_height']|escape:'htmlall':'UTF-8'}"{/if} alt="logo" /></div>
		<div class="content">
			<h1 class="maintenance-heading">{$data['title']|escape:'htmlall':'UTF-8'}</h1>
			<h2>{$data['description']|escape:'htmlall':'UTF-8'|nl2br}</h2>
		</div>
		<div id="counter"></div>
		<div class="copy-rights">
		 <p>{$data['copyright']|escape:'htmlall':'UTF-8'}</p>
		</div>
	</div>
</body>
