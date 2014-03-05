{foreach from=$categories item=subcategory}
<ul class="product-navigation">
  <li class="subcategories">
    {if $subcategory.is_icon}
      <a href="home.php?cat={$subcategory.categoryid}"><img src="{get_category_image_url category=$subcategory}" alt="{$subcategory.category|escape}" width="{$subcategory.image_x}" height="{$subcategory.image_y}" /></a>
    {else}
    {/if}
    <a href="home.php?cat={$subcategory.categoryid}">{$subcategory.category|escape}</a><br />
    {if $config.Appearance.count_products eq "Y"}
      {if $subcategory.product_count}
        {$lng.lbl_N_products|substitute:products:$subcategory.product_count}
      {elseif $subcategory.subcategory_count}
        {$lng.lbl_N_categories|substitute:count:$subcategory.subcategory_count}
      {/if}
    {/if}
  </li>

{/foreach}
</ul>