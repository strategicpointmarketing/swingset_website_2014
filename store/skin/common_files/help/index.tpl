{*
807332542db745203b7cba899b061bf99d18cfdb, v2 (xcart_4_4_3), 2011-04-29 13:01:33, index.tpl, ferz
vim: set ts=2 sw=2 sts=2 et:
*}
{if $section eq "Password_Recovery"}
{include file="help/Password_Recovery.tpl"}

{elseif $section eq "Password_Recovery_message"}
{include file="help/Password_Recovery_message.tpl"}

{elseif $section eq "Password_Recovery_error"}
{include file="help/Password_Recovery.tpl"}

{else}
{include file="page_title.tpl" title=$lng.lbl_help_zone}

{if $section eq "contactus"}
{include file="help/contactus.tpl"}

{elseif $section eq "conditions"}
{include file="help/conditions.tpl"}

{else}
{include file="help/general.tpl"}
{/if}

{/if}
