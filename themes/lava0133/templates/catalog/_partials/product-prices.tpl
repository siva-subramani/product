{if $product.show_price}
  <div class="product-prices">
    {block name='product_discount'}
      {if $product.has_discount}
        <div class="product-discount">
          {hook h='displayProductPriceBlock' product=$product type="old_price"}
          <span class="regular-price">{$product.regular_price}</span>
        </div>
      {/if}
    {/block}

    {block name='product_price'}
      <div
        class="product-price h5 {if $product.has_discount}has-discount{/if}"
        itemprop="offers"
        itemscope
        itemtype="https://schema.org/Offer"
      >
        <link itemprop="availability" href="https://schema.org/InStock"/>
        <meta itemprop="priceCurrency" content="{$currency.iso_code}">

        <div class="current-price">
          <span itemprop="price" content="{$product.price_amount}">{$product.price}</span>

          {if $product.has_discount}
            {if $product.discount_type === 'percentage'}
              <span class="discount discount-percentage">{l s='Save %percentage%' d='Shop.Theme.Catalog' sprintf=['%percentage%' => $product.discount_percentage_absolute]}</span>
            {else}
              <span class="discount discount-amount">{l s='Save %amount%' d='Shop.Theme.Catalog' sprintf=['%amount%' => $product.discount_amount]}</span>
            {/if}
          {/if}
        </div>

        {block name='product_unit_price'}
          {if $displayUnitPrice}
            <p class="product-unit-price sub">{l s='(%unit_price%)' d='Shop.Theme.Catalog' sprintf=['%unit_price%' => $product.unit_price_full]}</p>
          {/if}
        {/block}
      </div>
    {/block}

    {block name='product_without_taxes'}
      {if $priceDisplay == 2}
        <p class="product-without-taxes">{l s='%price% tax excl.' d='Shop.Theme.Catalog' sprintf=['%price%' => $product.price_tax_exc]}</p>
      {/if}
    {/block}

    {block name='product_pack_price'}
      {if $displayPackPrice}
        <p class="product-pack-price"><span>{l s='Instead of %price%' d='Shop.Theme.Catalog' sprintf=['%price%' => $noPackPrice]}</span></p>
      {/if}
    {/block}

    {block name='product_ecotax'}
      {if $product.ecotax.amount > 0}
        <p class="price-ecotax">{l s='Including %amount% for ecotax' d='Shop.Theme.Catalog' sprintf=['%amount%' => $product.ecotax.value]}
          {if $product.has_discount}
            {l s='(not impacted by the discount)' d='Shop.Theme.Catalog'}
          {/if}
        </p>
      {/if}
    {/block}

    {hook h='displayProductPriceBlock' product=$product type="weight" hook_origin='product_sheet'}

    <div class="tax-shipping-delivery-label">
      {if $configuration.display_taxes_label}
        {$product.labels.tax_long}
      {/if}
      {hook h='displayProductPriceBlock' product=$product type="price"}
      {hook h='displayProductPriceBlock' product=$product type="after_price"}
    </div>
  </div>
{/if}
