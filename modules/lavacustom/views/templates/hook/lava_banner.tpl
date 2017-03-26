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

{if $data['countdown'] == 'yes'}
<script type="text/javascript">
$(document).ready(function(){
  $('#banner_counter{if isset($data['pos']) && $data['pos']}_top{/if}').countdown({
    timestamp : {$data['countdown_stamp']|escape:'htmlall':'UTF-8'} - (new Date()).getTime()
  });

  $('.banner .Days').html('{$data['text_days']|escape:'htmlall':'UTF-8'}');
  $('.banner .Hours').html('{$data['text_hours']|escape:'htmlall':'UTF-8'}');
  $('.banner .Minutes').html('{$data['text_minutes']|escape:'htmlall':'UTF-8'}');
  $('.banner .Seconds').html('{$data['text_seconds']|escape:'htmlall':'UTF-8'}');

  {if isset($data['pos']) && $data['pos']}
    if(getCookie('uhuTopbanner') != 1){
      $("#uhu_topbanner").removeClass('hidden');
    }
	$('#close-banner').on('click',function(){
      $('#uhu_topbanner .image-container').stop(true,true).slideUp('400');
      setCookie('uhuTopbanner', 1, {$data['days']|escape:'htmlall':'UTF-8'});
    })
  {/if}
});
</script>
{else}
<script type="text/javascript">
$(document).ready(function(){
  {if isset($data['pos']) && $data['pos']}
    if(getCookie('uhuTopbanner') != 1){
      $("#uhu_topbanner").removeClass('hidden');
    }
	$('#close-banner').on('click',function(){
      $('#uhu_topbanner .image-container').stop(true,true).slideUp('400');
      setCookie('uhuTopbanner', 1, {$data['days']|escape:'htmlall':'UTF-8'});
    })
  {/if}
});
</script>
{/if}
<div id="{$data['id']|escape:'htmlall':'UTF-8'}" class="banner cols marginb{if isset($data['pos']) && $data['pos']} hidden{/if}">
    <div class="image-container">
        <a href="{$data['link']|escape:'htmlall':'UTF-8'}">
          <img class="img-fluid img-responsive" src="{$data['image']|escape:'htmlall':'UTF-8'}"  />
          <div class="content">
            <h3 class="item-title">{$data['title']|escape:'htmlall':'UTF-8'}</h3>
            <div class="item-html">{$data['text']|escape:'htmlall':'UTF-8'|nl2br}</div>
            {if $data['countdown'] == 'yes'}<div id="banner_counter{if isset($data['pos']) && $data['pos']}_top{/if}" class="banner-counter"></div>{/if}
          </div>
        </a>
    </div>
	{if isset($data['pos']) && $data['pos']}<span id="close-banner"><i class="material-icons">clear</i></span>{/if}
</div>
