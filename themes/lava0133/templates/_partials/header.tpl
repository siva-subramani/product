{block name='header_banner'}
  <div class="header-banner banner">
    <div class="container">
      <div class="row">
        {hook h='displayBanner'}
      </div>
    </div>
  </div>
{/block}

{block name='header_nav'}
  <nav class="header-nav nav">
    <div class="container">
      <div class="row">
        {hook h='displayNav'}
      </div>
    </div>
  </nav>
{/block}

{block name='header_top'}
  <div class="header-top content">
    <div class="container">
      <div class="row">
        {hook h='displayTop'}
      </div>
    </div>
  </div>
  {hook h='displayNavFullWidth'}
{/block}
