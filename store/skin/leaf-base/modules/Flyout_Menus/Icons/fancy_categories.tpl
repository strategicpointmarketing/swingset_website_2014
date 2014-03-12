{*
2933c35a1cfb05fcc636843c0b93197c1809402a, v4 (xcart_4_6_2), 2013-11-07 18:53:27, fancy_categories.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
<!--Begin store/skin/leaf-base/modules/Flyout_Menus/Icons/fancy_categories.tpl-->

{if $fc_skin_path}

  {load_defer file="`$fc_skin_path`/func.js" type="js"}


    {if $fancy_use_cache}
      {fancycat_get_cache}

    {elseif $config.Flyout_Menus.icons_mode eq 'C'}
      {include file="`$fc_skin_path`/fancy_subcategories_exp.tpl" level=0}

    {else}
      {include file="`$fc_skin_path`/fancy_subcategories.tpl" level=0}
    {/if}
    {if $catexp}
<script type="text/javascript">
//<![CDATA[
var catexp = {$catexp|default:0};
//]]>
</script>
    {/if}
    <div class="clearing"></div>

{/if}

<!--End store/skin/leaf-base/modules/Flyout_Menus/Icons/fancy_categories.tpl-->
