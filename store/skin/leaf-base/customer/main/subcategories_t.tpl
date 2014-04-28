{*
84c061f9b848b8c99182e31c0d58ddf1d39b5ac2, v3 (xcart_4_4_2), 2010-11-16 12:04:30, subcategories_t.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}

<ul class = "gd-row gt-row media-grid unstyled product-listing">
    {foreach from=$categories item=subcategory}
        <li class = "gd-third gd-columns gt-half gt-columns product-listing object">
            <div class="item-box">

                <a href="home.php?cat={$subcategory.categoryid}">
                    <img class="gd-full gt-full gm-full" src="{get_category_image_url category=$subcategory}" alt="{$subcategory.category|escape}"  /></a>
                <!--Product Details-->

                <h3 class="primer-text"><a href="home.php?cat={$subcategory.categoryid}" class="item-title">{$subcategory.category|escape}</a></h3>

                <!--View More-->
                <a href="home.php?cat={$subcategory.categoryid}" class="button secondary small mts">View Category</a>
                <!--End View More-->

                <div class="clearing"></div>

            </div>

        </li>
    {/foreach}
</ul>

    {*{foreach from=$categories item=subcategory}



    <span class="subcategories" style="min-width: {$subcat_div_width}px; width: {$subcat_div_width}px; min-height: {$subcat_div_height}px;">
    {if $subcategory.is_icon}
      <a href="home.php?cat={$subcategory.categoryid}"><img src="{get_category_image_url category=$subcategory}" alt="{$subcategory.category|escape}" width="{$subcategory.image_x}" height="{$subcategory.image_y}" /></a>
    {else}
      <img src="{$ImagesDir}/spacer.gif" alt="" width="1" height="{$subcat_img_height}" />
    {/if}
    <br />
    <a href="home.php?cat={$subcategory.categoryid}">{$subcategory.category|escape}</a><br />
    {if $config.Appearance.count_products eq "Y"}
      {if $subcategory.product_count}
        {$lng.lbl_N_products|substitute:products:$subcategory.product_count}
      {elseif $subcategory.subcategory_count}
        {$lng.lbl_N_categories|substitute:count:$subcategory.subcategory_count}
      {/if}
    {/if}
  </span>

{/foreach}*}



<div class="clearing"></div>
<br />
