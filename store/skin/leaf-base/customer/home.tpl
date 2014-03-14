{*
cd2402877146f8f0a3dd69df0079c47b4dd1ae81, v5 (xcart_4_6_2), 2014-01-14 16:43:51, home.tpl, mixon
vim: set ts=2 sw=2 sts=2 et:
*}
<?xml version="1.0" encoding="{$default_charset|default:"utf-8"}"?>
{config_load file="$skin_config"}
<html xmlns="http://www.w3.org/1999/xhtml"{if $active_modules.Socialize} xmlns:g="http://base.google.com/ns/1.0" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#"{/if}>
<head>
  {include file="customer/global_head.tpl"}
</head>
<body>
{if $active_modules.EU_Cookie_Law ne ""}
{include file="modules/EU_Cookie_Law/info_panel.tpl"}
{/if}
{if $main eq 'product' and $is_admin_preview}
  {include file="customer/main/product_admin_preview_top.tpl"}
{/if}

<header>
    {include file="customer/global_nav.tpl"}
</header>


{if $main eq "catalog" AND $current_category eq ""}
    {include file="customer/home_only.tpl"}
{else}

    <main role="main">

        <div class="wrapper inner-content">
            <div class="gd-row gt-row">

                    <!--Featured Offers-->
                    {include file="customer/content.tpl"}
                    <!--End Featured Offers-->
            </div>
        </div>

    </main>

{/else}
{/if}

<footer class="main-footer" id="main-footer" role="contentinfo">
    {include file="customer/global_footer.tpl"}
</footer>


{include file="customer/global_footer_scripts.tpl"}
{load_defer_code type="js"}
{*load_defer_code type="css"*}
</body>
</html>
