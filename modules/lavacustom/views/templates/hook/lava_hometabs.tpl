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

<div id="home-page-tab" class="cols marginb">
  <ul id="home-page-tabs" class="nav nav-tabs title_content">
    {$id = 0}
    {if isset($data['feature_display']) && $data['feature_display'] == 'yes'}<li class="nav-item {$data['effect']|escape:'htmlall':'UTF-8'}"><a class="title_block{if $id++ == 0} active{/if}" data-toggle="tab" href="#uhufeatured" class="uhufeatured">{$data['feature_title']|escape:'htmlall':'UTF-8'}</a></li>{/if}
    {if isset($data['new_display']) && $data['new_display'] == 'yes'}<li class="nav-item {$data['effect']|escape:'htmlall':'UTF-8'}"><a class="title_block{if $id++ == 0} active{/if}" data-toggle="tab" href="#uhunewproducts" class="uhunewproducts">{$data['new_title']|escape:'htmlall':'UTF-8'}</a></li>{/if}
    {if isset($data['best_display']) && $data['best_display'] == 'yes'}<li class="nav-item {$data['effect']|escape:'htmlall':'UTF-8'}"><a class="title_block{if $id++ == 0} active{/if}" data-toggle="tab" href="#uhubestsellers" class="uhubestsellers">{$data['best_title']|escape:'htmlall':'UTF-8'}</a></li>{/if}
    {if isset($data['special_display']) && $data['special_display'] == 'yes'}<li class="nav-item {$data['effect']|escape:'htmlall':'UTF-8'}"><a class="title_block{if $id++ == 0} active{/if}" data-toggle="tab" href="#uhuspecials" class="uhuspecials">{$data['special_title']|escape:'htmlall':'UTF-8'}</a></li>{/if}
  </ul>

  {$id = 0}
  {if isset($data['ps_version']) && $data['ps_version'] == '1.6'}
	  <div id="home-page-contents" class="tab-content">
		{if isset($data['feature_display']) && $data['feature_display'] == 'yes'}
		  {if isset($data['features_products']) && $data['features_products'] <> ''}
			{include file="$tpl_dir./product-list.tpl" products=$data['features_products'] class='product_list uhufeatured tab-pane{if $id++ == 0} active{/if}' id="uhufeatured"}
		  {else}
			<ul id="uhufeatured" class="product_list uhufeatured tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}

		{if isset($data['new_display']) && $data['new_display'] == 'yes'}
		  {if isset($data['new_products']) && $data['new_products'] <> ''}
			{include file="$tpl_dir./product-list.tpl" products=$data['new_products'] class='product_list uhunewproducts tab-pane{if $id++ == 0} active{/if}' id="uhunewproducts"}
		  {else}
			<ul id="uhunewproducts" class="product_list uhunewproducts tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}

		{if isset($data['best_display']) && $data['best_display'] == 'yes'}
		  {if isset($data['best_products']) && $data['best_products'] <> ''}
			{include file="$tpl_dir./product-list.tpl" products=$data['best_products'] class='product_list uhubestsellers tab-pane{if $id++ == 0} active{/if}' id="uhubestsellers"}
		  {else}
			<ul id="uhubestsellers" class="product_list uhubestsellers tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}

		{if isset($data['special_display']) && $data['special_display'] == 'yes'}
		  {if isset($data['special_products']) && $data['special_products'] <> ''}
			{include file="$tpl_dir./product-list.tpl" products=$data['special_products'] class='product_list uhuspecials tab-pane{if $id++ == 0} active{/if}' id="uhuspecials"}
		  {else}
			<ul id="uhuspecials" class="product_list uhuspecials tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}
	  </div>
	</div>
  {else}
	  <div id="home-page-contents" class="tab-content">
		{if isset($data['feature_display']) && $data['feature_display'] == 'yes'}
		  {if isset($data['features_products']) && $data['features_products'] <> ''}
			<ul id="uhufeatured" class="product_list uhufeatured tab-pane{if $id++ == 0} active{/if}">
			  {foreach from=$data['features_products'] item="product" name=myLoop}
				{if isset($data['stamp'][$product.id_product]) && $data['stamp'][$product.id_product]}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider'] stamp=$data['stamp'][$product.id_product]}
				{else}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider']}
				{/if}
			  {/foreach}
			</ul>
		  {else}
			<ul id="uhufeatured" class="product_list uhufeatured tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}

		{if isset($data['new_display']) && $data['new_display'] == 'yes'}
		  {if isset($data['new_products']) && $data['new_products'] <> ''}
			<ul id="uhunewproducts" class="product_list uhunewproducts tab-pane{if $id++ == 0} active{/if}">
			  {foreach from=$data['new_products'] item="product" name=myLoop}
				{if isset($data['stamp'][$product.id_product]) && $data['stamp'][$product.id_product]}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider'] stamp=$data['stamp'][$product.id_product]}
				{else}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider']}
				{/if}
			  {/foreach}
			</ul>
		  {else}
			<ul id="uhunewproducts" class="product_list uhunewproducts tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}

		{if isset($data['best_display']) && $data['best_display'] == 'yes'}
		  {if isset($data['best_products']) && $data['best_products'] <> ''}
			<ul id="uhubestsellers" class="product_list uhubestsellers tab-pane{if $id++ == 0} active{/if}">
			  {foreach from=$data['best_products'] item="product" name=myLoop}
				{if isset($data['stamp'][$product.id_product]) && $data['stamp'][$product.id_product]}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider'] stamp=$data['stamp'][$product.id_product]}
				{else}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider']}
				{/if}
			  {/foreach}
			</ul>
		  {else}
			<ul id="uhubestsellers" class="product_list uhubestsellers tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}

		{if isset($data['special_display']) && $data['special_display'] == 'yes'}
		  {if isset($data['special_products']) && $data['special_products'] <> ''}
			<ul id="uhuspecials" class="product_list uhuspecials tab-pane{if $id++ == 0} active{/if}">
			  {foreach from=$data['special_products'] item="product" name=myLoop}
				{if isset($data['stamp'][$product.id_product]) && $data['stamp'][$product.id_product]}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider'] stamp=$data['stamp'][$product.id_product]}
				{else}
				  {include file="catalog/_partials/miniatures/product.tpl" product=$product bid=$smarty.foreach.myLoop.iteration slider=$data['slider']}
				{/if}
			  {/foreach}
			</ul>
		  {else}
			<ul id="uhuspecials" class="product_list uhuspecials tab-pane{if $id++ == 0} active{/if}">
			  <p class="alert alert-info">{$data['msg']|escape:'htmlall':'UTF-8'}</p>
			</ul>
		  {/if}
		{/if}
	  </div>
	</div>
{/if}

