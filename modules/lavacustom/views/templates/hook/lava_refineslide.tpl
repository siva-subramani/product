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

<!-- MODULE Block uhuslider -->
<div id="uhuslider" class="cols marginb">
	<div class="block_content">
		<div class="loading" style="background-image: url({$data['loading_icon']|escape:'htmlall':'UTF-8'});"></div>
		<ul id="uhu_slider" style="display: none;" class="cycle-slideshow">
		{section name=loop loop=$data['slider_number']} 
		
			<li class="slide{$smarty.section.loop.index|escape:'htmlall':'UTF-8'} group">
				{if $data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}<a href="{$data['slider_url'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">{/if}
				<img class="slider img-fluid" src="" />
				{if $data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}</a>{/if}

				{if $data['slider_texteffect'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] == 'yes'}
				<div class="slide_content" style="display: none;">
					{if $data['slider_h2'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h2 class="sd2 animated slide-h2">{$data['slider_h2'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>
					{/if}

					{if $data['slider_h3'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h3 class="sd3 animated slide-h3">{$data['slider_h3'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>
					{/if}

					{if $data['slider_h4'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h4 class="sd4 animated slide-h4">{$data['slider_h4'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}</h4>
					{/if}

					{if $data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<h6 class="sd6 animated slide-link slidelink">
						<a class="btn lnk_view" href="{$data['slider_url'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}">
						<span>{$data['slider_link'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|stripslashes}</span>
						</a>
					</h6>
					{/if}
				</div>

					{if $data['slider_logo'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<img class="{if $data['slider_texteffect'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}] == 'yes'}animated{/if} logo slide-logo" src="{$data['slider_logo'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}"  />
					{/if}
				{else}
				<div class="slide_content" style="display: none;">
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
					</div>

					{if $data['slider_logo'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]}
					<img class="slidelogo logo" src="{$data['slider_logo'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}"  />
					{/if}
				{/if}
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
	imgPreLoaded();
	$('.loading').hide();
	$('#uhu_slider').css('display', 'block');
}

function imgPreLoaded(){
	body = $('#index').width();

	if (body < 768)
	{
		{section name=loop loop=$data['slider_number']}
			$('#uhu_slider li.slide{$smarty.section.loop.index|escape:'htmlall':'UTF-8'} img.slider').attr('src', '{$data['slider_image_s'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}');
		{/section}
	}
	else if (body < 1030)
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
	$('#uhu_slider').refineSlide({
		maxWidth: {$data['max_width']|escape:'htmlall':'UTF-8'},
		delay: {$data['slider_delay']|escape:'htmlall':'UTF-8'},
		transitionDuration: {$data['slider_duration']|escape:'htmlall':'UTF-8'},
		autoPlay: true,
		transition: '{$data['slider_transition']|escape:'htmlall':'UTF-8'}',
		fallback3d: '{$data['slider_easing']|escape:'htmlall':'UTF-8'}',
		useThumbs: false,
		useArrows: true,
		arrowTemplate: '<div class="rs-arrows bx-control"><span class="rs-prev cycle-prev"><i class="material-icons">{$data['awesome_prev']|escape:'htmlall':'UTF-8'}</i></span><span class="rs-next cycle-next"><i class="material-icons">{$data['awesome_next']|escape:'htmlall':'UTF-8'}</i></span></div>',
		onInit: function(){
			$('.sd2').hide();
			$('.sd3').hide();
			$('.sd4').hide();
			$('.sd6').hide();
			$('.slide-logo').hide();
			$('.slide_content').css('display', 'block');
			$('.slide-h2').addClass('{$data['h2_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['h2_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-h3').addClass('{$data['h3_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['h3_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-h4').addClass('{$data['h4_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['h4_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-link').addClass('{$data['link_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['link_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-logo').addClass('{$data['logo_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['logo_time_in']|escape:'htmlall':'UTF-8'});
			$('.sd2').show(20);
			$('.sd3').show(20);
			$('.sd4').show(20);
			$('.sd6').show(20);
			$('.slide-logo').show(20);
		},
		afterChange: function(){
			$('.slide-h2').addClass('{$data['h2_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['h2_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-h3').addClass('{$data['h3_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['h3_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-h4').addClass('{$data['h4_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['h4_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-link').addClass('{$data['link_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['link_time_in']|escape:'htmlall':'UTF-8'});
			$('.slide-logo').addClass('{$data['logo_animate_in']|escape:'htmlall':'UTF-8'}').delay({$data['logo_time_in']|escape:'htmlall':'UTF-8'});
			$('.sd2').show(20);
			$('.sd3').show(20);
			$('.sd4').show(20);
			$('.sd6').show(20);
			$('.slide-logo').show(20);
			$('.slide_content').css('display', 'block');
		},
		onChange: function(){
			$('.sd2').hide();
			$('.sd3').hide();
			$('.sd4').hide();
			$('.sd6').hide();
			$('.slide-logo').hide();
		},
	});
});
</script>
<!-- /MODULE Block uhuslider -->
