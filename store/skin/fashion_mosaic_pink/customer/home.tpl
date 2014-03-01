{*
cd2402877146f8f0a3dd69df0079c47b4dd1ae81, v12 (xcart_4_6_2), 2014-01-14 16:43:51, home.tpl, mixon
vim: set ts=2 sw=2 sts=2 et:
*}
<?xml version="1.0" encoding="{$default_charset|default:"utf-8"}"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
{config_load file="$skin_config"}
<html xmlns="http://www.w3.org/1999/xhtml"{if $active_modules.Socialize} xmlns:g="http://base.google.com/ns/1.0" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#"{/if}>
<head>
  {include file="customer/service_head.tpl"}
</head>
<body{if $body_onload ne ''} onload="javascript: {$body_onload}"{/if} class="{if $main ne "catalog" or $current_category.category ne ""}normal-page{else}welcome-page{/if}{foreach from=$container_classes item=c} {$c}{/foreach}">
{if $active_modules.EU_Cookie_Law}
{include file="modules/EU_Cookie_Law/info_panel.tpl"}
{/if}
{if $main eq 'product' and $is_admin_preview}
  {include file="customer/main/product_admin_preview_top.tpl"}
{/if}
<div id="page-container"{if $page_container_class} class="{$page_container_class}"{/if}>
  <div id="page-container2">
    <div id="content-container">
      <div id="content-container2">

        {if $active_modules.Socialize
            and ($config.Socialize.soc_fb_like_enabled eq "Y" or $config.Socialize.soc_fb_send_enabled eq "Y")
        }
          <div id="fb-root"></div>
        {/if}

        {include file="customer/content.tpl"}

      </div>
    </div>

    <div class="clearing">&nbsp;</div>

    <div id="header">
      {include file="customer/head.tpl"}
    </div>

    <div id="footer">

      {if $active_modules.Users_online}
        {include file="modules/Users_online/menu_users_online.tpl"}
      {/if}

      {include file="customer/bottom.tpl"}

    </div>

    {if $active_modules.Google_Analytics and $config.Google_Analytics.ganalytics_version eq 'Traditional'}
      {include file="modules/Google_Analytics/ga_code.tpl"}
    {/if}

  </div>
</div>
{load_defer_code type="js"}
{load_defer_code type="css"}
</body>
</html>
