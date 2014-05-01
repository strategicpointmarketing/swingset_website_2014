{*
9368d3128150483d6d30d5c807740133f3f72f1b, v7 (xcart_4_6_2), 2013-10-31 10:02:50, navigation.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
{if ($total_pages gt 2) or ($per_page eq "Y" and $total_items gte $per_page_values.0)}
    <ul class="unstyled">
        {assign var="navigation_script" value=$navigation_script|amp}
        {if $total_pages gt 1}{*2*}
            <li class="gd-three-quarters gt-three-quarters float-left">

                <div class="results-nav">
                    <!-- max_pages: {$navigation_max_pages} -->
                    <span class="petite-text semibold uppercase primary-heading">{$lng.lbl_result_pages}:</span>

                    {strip}

                        {if $navigation_arrow_left}
                            <a class="left-arrow right-delimiter" href="{$navigation_script}&amp;page={$navigation_arrow_left}"><img src="{$ImagesDir}/spacer.gif" alt="{$lng.lbl_prev_page|escape}" /></a>
                        {/if}

                        {if $start_page gt 1}
                            <a class="nav-page right-delimiter" href="{$navigation_script}&amp;page=1" title="{$lng.lbl_page|escape} #1">1</a>

                            {if $start_page gt 2}
                                <span class="nav-dots right-delimiter">...</span>
                            {/if}

                        {/if}

                        {section name=page loop=$total_pages start=$start_page}

                            {if $smarty.section.page.index eq $navigation_page}
                                <span class="current-page minion-text{if not $smarty.section.page.last or ($total_pages lte $total_super_pages or $navigation_arrow_right)}{/if}" title="{$lng.lbl_current_page|escape}: #{$smarty.section.page.index}">{$smarty.section.page.index}</span>
                            {else}
                                <a class="nav-page minion-text{if not $smarty.section.page.last or ($total_pages lte $total_super_pages or $navigation_arrow_right)}{/if}" href="{$navigation_script}&amp;page={$smarty.section.page.index}" title="{$lng.lbl_page|escape} #{$smarty.section.page.index}">{$smarty.section.page.index}</a>
                            {/if}

                        {/section}

                        {if $total_pages lte $total_super_pages}

                            {if $total_pages lt $total_super_pages}
                                <span class="nav-dots right-delimiter">...</span>
                            {/if}
                            {if !$total_rough_pages}
                                <a class="nav-page{if $navigation_arrow_right} right-delimiter{/if}" href="{$navigation_script}&amp;page={$total_super_pages}" title="{$lng.lbl_page|escape} #{$total_super_pages}">{$total_super_pages}</a>
                            {/if}
                        {/if}



                    {/strip}

                </div>
            </li>
        {/if}
        <li class="gd-quarter gt-quarter float-left align-right">
            {if $per_page eq "Y" and $total_items gte $per_page_values.0}
                {include file="customer/main/per_page.tpl"}
            {/if}
        </li>
    </ul>
    <div class="clear"></div>
{/if}
