{*
383d2dea4353152140ed71e4737b9e0b9bb511e9, v4 (xcart_4_6_2), 2013-10-15 11:22:32, top_links.tpl, aim 
vim: set ts=2 sw=2 sts=2 et:
*}
{*
<div id="top-links" class="ui-tabs ui-widget ui-corner-all">
  <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-corner-all">
  {foreach from=$tabs item=tab key=ind}
    {inc value=$ind assign="ti"}
    <li class="ui-corner-top ui-state-default{if $tab.selected} ui-tabs-active ui-state-active{/if}">
      <a href="{if $tab.url}{$tab.url|amp}{else}#{$prefix}{$ti}{/if}">{$tab.title|wm_remove|escape}</a>
    </li>
  {/foreach}
  </ul>
  <div class="ui-tabs-panel ui-widget-content"></div>
</div>*}


<ul class="account-nav mtn mbm">
    <li><a href="/register.php">My Account</a></li>
    <li><a href="/address_book.php">Address Book</a></li>
    {*<li><a href="/orders.php">Order History</a></li>*}
</ul>