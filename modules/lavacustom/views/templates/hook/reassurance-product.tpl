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

<div id="block-reassurance">
  <ul>
    {section name=loop loop=$data['number']}
      <li>
        <div class="block-reassurance-item">
          {if $data['type'] == 'icon'}
            <i class="material-icons">{$data['icon'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}</i>
          {else}
            <img class="img-fluid img-responsive" src="{$data['image'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}" alt="" />
          {/if}
            <span class="h6">{$data['title'][$smarty.section.loop.index|escape:'htmlall':'UTF-8']}</span>
        </div>
      </li>
    {/section}
  </ul>
</div>
