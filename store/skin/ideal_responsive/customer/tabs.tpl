{*
5e8f6f027e43ad9baf5123185777a0ce3103aea3, v2 (xcart_4_6_2), 2013-10-21 10:44:47, tabs.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
{if $speed_bar}
  <div class="tabs{if $all_languages_cnt gt 1} with_languages{/if} monitor">
    <ul>
      {math equation="round(100/x,2)" x=$speed_bar|@count assign="cell_width"}
      {foreach from=$speed_bar item=sb name=tabs}
         {strip}
			<li{interline name=tabs additional_class="hidden-xs"}>
				<a href="{$sb.link|amp}">
					{$sb.title}
					<img src="{$ImagesDir}/spacer.gif" alt="" />
				</a>
				<div class="t-l"></div><div class="t-r"></div>
			</li>
			<li{interline name=tabs additional_class="visible-xs"} style="width: {$cell_width}%">
				<a href="{$sb.link|amp}">
					{$sb.title}
					<img src="{$ImagesDir}/spacer.gif" alt="" />
				</a>
				{if $smarty.foreach.tabs.last}<div class="mobile-tab-delim first"></div><div class="t-l first"></div>{else}<div class="t-l"></div>{/if}<div class="t-r"></div><div class="mobile-tab-delim"></div>
			</li>
		{/strip}
      {/foreach}

    </ul>
  </div>
{/if}
