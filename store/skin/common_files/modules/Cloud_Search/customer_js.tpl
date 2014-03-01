{* vim: set ts=4 sw=4 sts=4 et: *}
{capture name=cloud_search_js}

var Cloud_Search = {ldelim}
  apiKey: '{$config.cloud_search_api_key|escape:'javascript'}',
  price_template: '{currency value=0.0}',
  {if $active_modules.XMultiCurrency and $cloud_search_currency_rate}
  currencyRate: {$cloud_search_currency_rate},
  {/if}
  lang: {ldelim}
    'lbl_showing_results_for': '{$lng.lbl_cloud_search_showing_results_for|escape:'javascript'}',
    'lbl_see_details': '{$lng.lbl_see_details|escape:'javascript'}',
    'lbl_see_more_results_for': '{$lng.lbl_cloud_search_see_more_results_for|escape:'javascript'}',
    'lbl_suggestions': '{$lng.lbl_cloud_search_suggestions|escape:'javascript'}',
    'lbl_products': '{$lng.lbl_products|escape:'javascript'}',
    'lbl_categories': '{$lng.lbl_cloud_search_categories|escape:'javascript'}',
    'lbl_manufacturers': '{$lng.lbl_cloud_search_manufacturers|escape:'javascript'}',
    'lbl_pages': '{$lng.lbl_cloud_search_pages|escape:'javascript'}',
    'lbl_did_you_mean': '{$lng.lbl_cloud_search_did_you_mean|escape:'javascript'}'
  {rdelim}
{rdelim};

{literal}

(function () {
  var cs = document.createElement('script'); cs.type = 'text/javascript'; cs.async = true;
  cs.src = '//cdn-qualiteamsoftwar.netdna-ssl.com/cloud_search_xcart.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(cs, s);
})();

{/literal}

{/capture}
{load_defer file="cloud_search_js" direct_info=$smarty.capture.cloud_search_js type="js"}
{load_defer file="modules/Cloud_Search/js/lib/jquery.hoverIntent.minified.js" type="js"}
{load_defer file="lib/handlebars.min.js" type="js"}
