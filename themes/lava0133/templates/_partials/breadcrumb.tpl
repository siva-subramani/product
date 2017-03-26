<section id="wrapper-header">
    <div class="container">
        <div class="row">
            <div class="page-header-right">
              {foreach from=$breadcrumb.links item=path name=breadcrumb}
                {if $smarty.foreach.breadcrumb.iteration == $breadcrumb.count}
                  <h1 data-depth="{$breadcrumb.count}" class="page-header-title">{$path.title}</h1>
                {/if}
              {/foreach}
            </div>
            <div class="page-header-left">
                <nav data-depth="{$breadcrumb.count}" class="breadcrumb">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    {foreach from=$breadcrumb.links item=path name=breadcrumb}
					  {* if $smarty.foreach.breadcrumb.iteration < $breadcrumb.count *}
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                          <a itemprop="item" href="{$path.url}">
                            <span itemprop="name">{$path.title}</span>
                          </a>
                          <meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration}">
                        </li>
                      {* /if *}
                    {/foreach}
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>