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

{if isset($gfont_logo) AND $gfont_logo}
<link id="link_logo" rel="stylesheet" href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family={$gfont_logo|escape:'htmlall':'UTF-8'}" type="text/css">
{/if}

{if isset($googlefont) AND $googlefont}
<link rel="stylesheet" href="http{if Tools::usingSecureMode()}s{/if}://fonts.googleapis.com/css?family={$googlefont|escape:'htmlall':'UTF-8'}" type="text/css">
{/if}

{if isset($shownewsletter) AND $shownewsletter}
<script type="text/javascript">
	$(document).ready(function() {
		if(getCookie('uhuNewsletter') != 1){
			$('html').append('<a class="fancybox" style="display:none" href=".block_newsletter"></a>');
			setTimeout(function(){
				$('.fancybox').fancybox({
					padding: 0,
					width: {$newsletter_width|escape:'htmlall':'UTF-8'},
					height: {$newsletter_height|escape:'htmlall':'UTF-8'},
					autoSize: true,
					afterClose: function () {
						$('a[href="#newsletter_block_left"]').remove();
					}
				});
				$('a[href="#newsletter_block_left"]').trigger('click');
			}, {$newsletter_time|escape:'htmlall':'UTF-8'});
		}

		$('#dont-show-again').click(function(){
			if($('#dont-show-again').is(":checked")){
				setCookie('uhuNewsletter', 1, {$newsletter_days|escape:'htmlall':'UTF-8'});
			} else {
				delCookie('uhuNewsletter');
			}				
		})
	});
</script>
{/if}

{if isset($slider) AND $slider}
<script type="text/javascript">
	$(document).ready(function() {
		$('#homefeatured').owlCarousel({
			loop: true,
			autoplay: false,
			margin: 30,
			responsiveClass: true,
			nav: false,
			dots: true,
			responsive: {
			0: 	{
					items: {$responsive3|escape:'html':'UTF-8'},
				},
			600: {
					items: {$responsive2|escape:'html':'UTF-8'},
				},
			1000: {
					items: {$responsive1|escape:'html':'UTF-8'},
				}
			}
		})
		$('#blocknewproducts').owlCarousel({
			loop: true,
			autoplay: false,
			margin: 30,
			responsiveClass: true,
			nav: false,
			dots: true,
			responsive: {
			0: 	{
					items: {$responsive3|escape:'html':'UTF-8'},
				},
			600: {
					items: {$responsive2|escape:'html':'UTF-8'},
				},
			1000: {
					items: {$responsive1|escape:'html':'UTF-8'},
				}
			}
		})
		$('#blockbestsellers').owlCarousel({
			loop: true,
			autoplay: false,
			margin: 30,
			responsiveClass: true,
			nav: false,
			dots: true,
			responsive: {
			0: 	{
					items: {$responsive3|escape:'html':'UTF-8'},
				},
			600: {
					items: {$responsive2|escape:'html':'UTF-8'},
				},
			1000: {
					items: {$responsive1|escape:'html':'UTF-8'},
				}
			}
		})
		$('#blockspecials').owlCarousel({
			loop: true,
			autoplay: false,
			margin: 30,
			responsiveClass: true,
			nav: false,
			dots: true,
			responsive: {
			0: 	{
					items: {$responsive3|escape:'html':'UTF-8'},
				},
			600: {
					items: {$responsive2|escape:'html':'UTF-8'},
				},
			1000: {
					items: {$responsive1|escape:'html':'UTF-8'},
				}
			}
		})
	});
</script>
{/if}