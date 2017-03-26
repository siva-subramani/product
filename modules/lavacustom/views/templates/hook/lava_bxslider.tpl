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

<!-- MODULE Block uhubxslider -->
<div id="uhuslider">
	<div class="block_content">
		<div class="loading" style="background-image: url({$data['loading_icon']|escape:'htmlall':'UTF-8'});"></div>
		<ul id="uhu_slider" style="visibility: hidden;" >
		{section name=loop loop=$data['slider_number']}
			<li class="slide{$smarty.section.loop.index|escape:'htmlall':'UTF-8'} group">
				{if $data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}<a href="{$data['slider_url'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{/if}
				<img class="slider" src="">
				{if $data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}</a>{/if}
				<div class="slide_content" style="">
					{if $data['slider_h2'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h2 class="sd2">{$data['slider_h2'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>
					{/if}

					{if $data['slider_h3'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h3 class="sd3">{$data['slider_h3'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>
					{/if}

					{if $data['slider_h4'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h4 class="sd4">{$data['slider_h4'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>
					{/if}

					{if $data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h6 class="sd6 slidelink">
						<a class="btn lnk_view" href="{$data['slider_url'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">
						<span>{$data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|stripslashes}</span>
						</a>
					</h6>
					{/if}
					{if $data['slider_logo'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<img class="slidelogo logo" src="{$data['slider_logo'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}"  />
					{/if}
				</div>
			</li>			
		{/section}
		</ul>
	</div>
</div>
<script type="text/javascript">
function loadImage(url, callback) {
    var img = new Image();
     img.src = url;

    if (img.complete) {
		callback.call(img);
    } else {
        img.onload = function () {
			callback.call(img);
            img.onload = null;
        };
    };
};
function imgLoading(){
	$('.loading').css('background-image', 'url({$data['loading_icon']|escape:'htmlall':'UTF-8'})');
	$('#uhu_slider').css('height', 0);
	imgPreLoaded();
}

function imgPreLoaded(){
	body = $('#index').width();

	if (body < 768)
	{
		{section name=loop loop=$data['slider_number']}
			$('#uhu_slider li.slide{$smarty.section.loop.index|escape:'htmlall':'UTF-8'} img.slider').attr('src', '{$data['slider_image_s'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}');
		{/section}
	}
	else if (body < 960)
	{
		{section name=loop loop=$data['slider_number']} 
			$('#uhu_slider li.slide{$smarty.section.loop.index|escape:'htmlall':'UTF-8'} img.slider').attr('src', '{$data['slider_image_m'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}');
		{/section}
	}
	else
	{
		{section name=loop loop=$data['slider_number']}
			$('#uhu_slider li.slide{$smarty.section.loop.index|escape:'htmlall':'UTF-8'} img.slider').attr('src', '{$data['slider_image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}');
		{/section}
	}
}

$(document).ready(function(){
	loadImage('{$data['loading_icon']|escape:'htmlall':'UTF-8'}',imgLoading);
	$('#uhu_slider').bxSlider({
		auto: true,
		autoHover: true,
		mode: 'horizontal',
		prevText: '<i class="{$data['awesome_prev']|escape:'htmlall':'UTF-8'}"></i>', 
		nextText: '<i class="{$data['awesome_next']|escape:'htmlall':'UTF-8'}"></i>',
		onSliderLoad: function(){
			$('.loading').css('display', 'none');
			$('#uhu_slider').css('visibility', 'visible');
		},
	});
});
</script>
<!-- /MODULE Block uhubxslider -->
