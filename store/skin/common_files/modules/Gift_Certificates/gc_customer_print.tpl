{*
4eb1aaf1d647943990792fe0ae233b77c6b06383, v7 (xcart_4_6_1), 2013-06-27 17:47:34, gc_customer_print.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>{$lng.lbl_preview|wm_remove|escape}</title>
{if $css_file ne ""}
<link rel="stylesheet" type="text/css" href="{$SkinDir}/modules/Gift_Certificates/{$css_file}" />
{/if}
<meta http-equiv="Content-Type" content="text/html; charset={$default_charset|default:"utf-8"}" />
<meta http-equiv="X-UA-Compatible" content="{$smarty.config.XUACompatible}" />
</head>
<body{$reading_direction_tag}>
{if $config.Gift_Certificates.print_giftcerts_separated eq "Y"}
{assign var="separator" value="<div style='page-break-after: always;'></div>"}
{else}
{assign var="separator" value="<br /><hr size='1' noshade="noshade" /><br />"}
{/if}
{foreach name=giftcerts from=$giftcerts key=key item=giftcert}
{include file="modules/Gift_Certificates/`$giftcert.tpl_file`"}
{if not $smarty.foreach.giftcerts.last}
{$separator}
{/if}
{/foreach}
{load_defer_code type="css"}
{load_defer_code type="js"}
</body>
</html>
