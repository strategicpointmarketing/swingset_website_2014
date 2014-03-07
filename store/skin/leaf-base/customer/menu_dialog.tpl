{*
8ec8b858917c921a726e2197071ce74d020e5ead, v1 (xcart_4_6_0), 2013-04-02 16:43:59, menu_dialog.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
<!-- begin store/skin/leaf-base/customer/menu_dialog.tpl -->
<nav>
  <h5 class = "tertiary-heading uppercase mtn mbs">
    {strip}

      {if $link_href}
        <span class="title-link">
          <a href="{$link_href}" class="title-link"><img src="{$ImagesDir}/spacer.gif" alt=""  /></a>
        </span>
      {/if}
	  {if $minicart}
		  <img class="icon ajax-minicart-icon" src="{$ImagesDir}/spacer.gif" alt="" />
	  {else}
	      {$title}
	  {/if}

    {/strip}
  </h5>

    {$content}

  {if $minicart}
	<div class="clearing"></div>
	<div class="t-l"></div><div class="t-r"></div>
	<div class="b-l"></div><div class="b-r"></div>
  {/if}
</nav>

<!-- end store/skin/leaf-base/customer/menu_dialog.tpl -->
