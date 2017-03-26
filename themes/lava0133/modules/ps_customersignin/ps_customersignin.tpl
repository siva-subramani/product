<div id="sign_block_top">
  <div class="user-info-selector dropdown js-dropdown">
    <span class="expand-more _gray-darker" data-toggle="dropdown"><i class="material-icons">&#xE7FF;</i></span>
    <ul class="dropdown-menu" aria-labelledby="dLabel">
    {if $logged}
	  <li><a
        class="logout"
        href="{$logout_url}"
        rel="nofollow"
      >
        {l s='Sign out' d='Shop.Theme.Actions'}
      </a></li>
      <li><a
        class="account"
        href="{$my_account_url}"
        title="{l s='View my customer account' d='Shop.Theme.CustomerAccount'}"
        rel="nofollow"
      >
        {$customerName}
      </a></li>
    {else}
      <li><a
        class="login"
        href="{$my_account_url}"
        title="{l s='Log in to your customer account' d='Shop.Theme.CustomerAccount'}"
        rel="nofollow"
      >
        {l s='Sign in' d='Shop.Theme.Actions'}
      </a></li>
    {/if}
    </ul>
  </div>
</div>
{*
<div id="sign_block_top" class="user-info">
    <a
      class="account"
      href="{$my_account_url}"
      title="{l s='View my customer account' d='Shop.Theme.CustomerAccount'}"
      rel="nofollow"
    >
      <i class="material-icons">&#xE7FF;</i>
    </a>
  {if $logged}
	  <a
      class="logout"
      href="{$logout_url}"
      rel="nofollow"
    >
      {l s='Sign out' d='Shop.Theme.Actions'}
    </a>
  {else}
    <a
      class="login"
      href="{$my_account_url}"
      title="{l s='Log in to your customer account' d='Shop.Theme.CustomerAccount'}"
      rel="nofollow"
    >
      {l s='Sign in' d='Shop.Theme.Actions'}
    </a>
  {/if}
</div>
*}