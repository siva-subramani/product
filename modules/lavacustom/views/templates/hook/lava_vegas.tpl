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
<script type="text/javascript">
$(document).ready(function() {
	$('body').vegas({
        slides: [
		{section name=loop loop=$data['slider_number']}
            { src: '{$data['slider_image'][{$smarty.section.loop.index|escape:'htmlall':'UTF-8'}]|escape:'htmlall':'UTF-8'}' },
		{/section}
        ]
    });
});
</script>
<!-- /MODULE Block uhuowlslider -->
