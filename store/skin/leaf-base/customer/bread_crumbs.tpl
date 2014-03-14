{*
59b18741a7e0c882b9e5cd007ec33ae63ba56ab6, v1 (xcart_4_5_0), 2012-04-05 11:53:47, bread_crumbs.tpl, ferz
vim: set ts=2 sw=2 sts=2 et:
*}


{if $location}

                    {foreach from=$location item=l name=location}
                        {if $l.1 and not $smarty.foreach.location.last and not $smarty.foreach.location.first}
                            <a href="{$l.1|amp}" class="minion-text secondary-font primary-color semibold bread-crumb{if $smarty.foreach.location.last} last-bread-crumb{/if}{if $smarty.foreach.location.first} first-bread-crumb{/if}">{if $smarty.foreach.location.first}&nbsp;{else}{if $webmaster_mode eq "editor"}{$l.0}{else}{$l.0|escape}{/if}{/if}</a>
                        {else}
                        {if not $smarty.foreach.location.first}

                            <span class="minion-text secondary-font{if $smarty.foreach.location.last} bread-crumb active{/if}">{if $webmaster_mode eq "editor"}{$l.0}{else}{$l.0|escape}{/if}</span>
                            {/if}
                        {/if}

                    {/foreach}

{/if}
