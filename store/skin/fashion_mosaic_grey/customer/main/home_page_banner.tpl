{*
7444c8361511898722b7c23f21c7044f72221cc6, v2 (xcart_4_5_3), 2012-09-14 12:53:04, home_page_banner.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}

{if $active_modules.Banner_System and $top_banners ne ''}
  {include file="modules/Banner_System/banner_rotator.tpl" banners=$top_banners banner_location='T'}
{elseif $active_modules.Demo_Mode and $active_modules.Banner_System}
  {include file="modules/Demo_Mode/banners.tpl"}
{else}
 <img src="{$AltImagesDir}/fashion_mosaic/welcome.jpg" class="welcome" alt="" />
{/if}
