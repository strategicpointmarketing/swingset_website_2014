{*
10d4766a297b130dea8de7e1d6cd01925e213749, v6 (xcart_4_6_0), 2013-04-09 11:07:38, home.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
{config_load file="$skin_config"}
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$lng.txt_site_title}</title>
{include file="meta.tpl"}
{include file="service_css.tpl"}
</head>
<body{$reading_direction_tag}{if $login eq ""} class="not-logged-in"{/if}>
{include file="rectangle_top.tpl"}
{include file="head_admin.tpl" menu="fulfilment"}
<!-- main area -->
<table width="100%" cellpadding="0" cellspacing="0" align="center">
<tr>
<td colspan="2" id="location_and_status">
  {include file="storefront_status.tpl"}
  {include file="location.tpl"}
</td>
</tr>
<tr>
<td valign="top" class="central-space{if $dialog_tools_data} dtools{elseif $banner_tools_data} btools{/if}">
<!-- central space -->
{if $main eq "authentication"}

{include file="main/authentication.tpl" login_title=$lng.lbl_admin_login_title}

{elseif $smarty.get.mode eq "subscribed"}
{include file="main/subscribe_confirmation.tpl"}

{elseif $main eq "ups_import"}
{include file="modules/Order_Tracking/ups_import.tpl"}

{elseif $main eq "order_edit"}
{include file="modules/Advanced_Order_Management/order_edit.tpl"}

{elseif $main eq "statistics"}
{include file="admin/main/statistics.tpl"}

{elseif $smarty.get.mode eq "unsubscribed"}
{include file="main/unsubscribe_confirmation.tpl"}

{elseif $main eq "home" and $login ne ""}
{include file="main/orders.tpl"}

{elseif $main eq "slg"}
{include file="modules/Shipping_Label_Generator/generator.tpl"}

{elseif $main eq "register"}
{include file="admin/main/register.tpl"}

{elseif $main eq "change_mpassword"}
{include file="admin/main/change_mpassword.tpl"}

{elseif $main eq "change_password"}
{include file="main/change_password.tpl"}

{elseif $main eq "import_export"}
{include file="main/import_export.tpl"}

{else}
{include file="common_templates.tpl"}
{/if}

<!-- /central space -->
&nbsp;
</td>

<td valign="top">
  {include file="dialog_tools.tpl"}
</td>

</tr>
</table>
{include file="rectangle_bottom.tpl"}
</body>
</html>
