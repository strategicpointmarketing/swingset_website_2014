{* 10d4766a297b130dea8de7e1d6cd01925e213749, v2 (xcart_4_6_0), 2013-04-09 11:07:38, popup_history.tpl, random 
vim: set ts=2 sw=2 sts=2 et:
*}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
{config_load file="$skin_config"}
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$lng.txt_site_title}</title>
{include file="meta.tpl"}
{if $usertype ne "C"}
{include file="service_css.tpl"}
{else}
{include file="customer/service_css.tpl"}
{/if}
</head>
{if $force_height eq 0}{assign var="force_height" value=460}{/if}
<body{$reading_direction_tag}>
{include file="presets_js.tpl"}
<script type="text/javascript" src="{$SkinDir}/js/common.js"></script>
<table width="100%" cellpadding="0" cellspacing="0" style="height: {dec value=$force_height dec=2};" >
<tr>
  <td class="PopupTitle">{$lng.lbl_aom_show_history|default:"&nbsp;"}</td>
</tr>
<tr>
  <td height="1"><img src="{$ImagesDir}/spacer.gif" class="Spc" alt="" /></td>
</tr>
<tr>
  <td class="PopupBG" height="1"><img src="{$ImagesDir}/spacer.gif" class="Spc" alt="" /></td>
</tr>

<tr>
  <td height="{dec dec=82 value=$force_height}" valign="top">

<!-- MAIN -->
<table id="history-box" width="100%" cellpadding="15" cellspacing="0">
<tr>
  <td>
{foreach from=$history item=rec}
{include file="modules/Advanced_Order_Management/event_message.tpl" record=$rec}
{/foreach}
  </td>
</tr>
</table>
<!-- /MAIN -->
  </td>
</tr>

<tr>
  <td>{include file="popup_bottom.tpl"}</td>
</tr>
</table>
</body>
</html>

