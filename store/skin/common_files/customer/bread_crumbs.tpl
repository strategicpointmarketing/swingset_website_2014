{*
5e8f6f027e43ad9baf5123185777a0ce3103aea3, v7 (xcart_4_6_2), 2013-10-21 10:44:47, bread_crumbs.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
{if $location}
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
  <td valign="top" align="left">
  <div id="location">
      {foreach from=$location item=l name=location}
        {if $l.1 and not $smarty.foreach.location.last}
          <a href="{$l.1|amp}" class="bread-crumb{if $smarty.foreach.location.last} last-bread-crumb{/if}">{if $webmaster_mode eq "editor"}{$l.0}{else}{$l.0|amp}{/if}</a>
        {else}
          <font class="bread-crumb{if $smarty.foreach.location.last} last-bread-crumb{/if}">{if $webmaster_mode eq "editor"}{$l.0}{else}{$l.0|amp}{/if}</font>
        {/if}
        {if not $smarty.foreach.location.last && $config.Appearance.breadcrumbs_separator ne ''}
          <span>{$config.Appearance.breadcrumbs_separator|amp}</span>
        {/if}
      {/foreach}
  </div>
  </td>
  <td class="printable-link-row">
  {include file="customer/printable_link.tpl"}
  </td>
</tr>
</table>
{/if}
