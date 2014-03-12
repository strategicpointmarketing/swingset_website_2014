{*
99f49a017eeaa96cf5c4060c7785548523d6ad12, v12 (xcart_4_6_2), 2014-01-15 17:46:03, content.tpl, mixon 
vim: set ts=2 sw=2 sts=2 et:
*}
<div id="center">
  <div id="center-main">
    {if $main eq 'cart' or $main eq 'checkout' or $main eq "order_message" or $main eq "order_message_widget"}
      {include file="customer/evaluation.tpl"}
    {/if}
<!-- central space -->

    {if ($main eq 'cart' and not $cart_empty) or $main eq 'checkout'}

      {if $active_modules.Bill_Me_Later and $config.Bill_Me_Later.bml_enable_banners eq 'Y'}
        {include file="modules/Bill_Me_Later/top_banner.tpl"}
      {/if}

      {include file="modules/`$checkout_module`/content.tpl"}

    {else}

      {if $main neq "catalog" or $current_category.category neq ""}
        {include file="customer/bread_crumbs.tpl"}
      {/if}

      {if $active_modules.Bill_Me_Later and $config.Bill_Me_Later.bml_enable_banners eq 'Y'}
        {include file="modules/Bill_Me_Later/top_banner.tpl"}
      {/if}

      {if $main ne "cart" and $main ne "checkout" and $main ne "order_message" and $main ne "order_message_widget"}
        {if $amazon_enabled}
          {include file="modules/Amazon_Checkout/amazon_top_button.tpl"}
        {/if}
      {/if}

      {if $top_message}
        {include file="main/top_message.tpl"}
      {/if}

      {if $active_modules.Banner_System and $top_banners ne '' and not ($main eq 'catalog' and $cat eq '')}
        {include file="modules/Banner_System/banner_rotator.tpl" banners=$top_banners banner_location='T'}
      {/if}

      {if $active_modules.Special_Offers}
        {include file="modules/Special_Offers/customer/new_offers_message.tpl"}
      {/if}

      {if $page_tabs ne ''}
        {include file="customer/main/top_links.tpl" tabs=$page_tabs}
      {/if}

      {if $page_title}
        <h1>{$page_title|escape}</h1>
      {/if}

      {include file="customer/home_main.tpl"}

      {if $active_modules.Banner_System and $bottom_banners ne ''}
        {include file="modules/Banner_System/banner_rotator.tpl" banners=$bottom_banners banner_location='B'}
      {/if}

    {/if}

<!-- /central space -->

  </div><!-- /center -->

  {if $main ne 'checkout' and $main ne 'cart'}
    <div class="block-news-links">
      <div class="block-news-links-2">

        <div class="imgv-box">
          <img src="{$ImagesDir}/spacer.gif" alt="" class="imgv" />
        </div>

        <table cellpadding="0" cellspacing="0" summary="{$lng.lbl_news|escape}">
          <tr>
            {if $active_modules.Adv_Mailchimp_Subscription}
              {include file="modules/Adv_Mailchimp_Subscription/customer/mailchimp_news.tpl"}
            {else}
              {include file="customer/news.tpl"}
            {/if}
            <td>{include file="customer/special.tpl"}</td>
            <td>{include file="customer/help/menu.tpl"}</td>
          </tr>
        </table>

        {if $active_modules.Users_online}
          {include file="modules/Users_online/menu_users_online.tpl"}
        {/if}

      </div>
    </div>
  {/if}

</div><!-- /center-main -->

{if ($main neq 'cart' or $cart_empty) and $main neq 'checkout'}
<div id="left-bar">
  {include file="customer/left_bar.tpl"}
</div>
{/if}
