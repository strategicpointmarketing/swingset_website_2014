{*
ca78a76b92423d09f6a85c1c62ea9893d9a20eb6, v33 (xcart_4_6_2), 2014-01-24 09:10:11, service_js.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
{capture name=javascript_code}
    {if $__frame_not_allowed and not $smarty.get.open_in_layer}
        if (top != self)
        top.location = self.location;
    {/if}
    var number_format_dec = '{$number_format_dec}';
    var number_format_th = '{$number_format_th}';
    var number_format_point = '{$number_format_point}';
    var store_language = '{$store_language|escape:javascript}';
    var xcart_web_dir = "{$xcart_web_dir|wm_remove|escape:javascript}";
    var images_dir = "{$ImagesDir|wm_remove|escape:javascript}";
    {if $AltImagesDir}var alt_images_dir = "{$AltImagesDir|wm_remove|escape:javascript}";{/if}
    var lbl_no_items_have_been_selected = '{$lng.lbl_no_items_have_been_selected|wm_remove|escape:javascript}';
    var current_area = '{$usertype}';
    var currency_format = "{$config.General.currency_format|replace:'$':$config.General.currency_symbol}";
    var lbl_product_minquantity_error = "{$lng.lbl_product_minquantity_error|wm_remove|escape:javascript}";
    var lbl_product_maxquantity_error = "{$lng.lbl_product_maxquantity_error|wm_remove|escape:javascript}";
    var lbl_product_quantity_type_error = "{$lng.lbl_product_quantity_type_error|wm_remove|escape:javascript}";
    var is_limit = {if $config.General.unlimited_products eq 'Y'}false{else}true{/if};
    var lbl_required_field_is_empty = "{$lng.lbl_required_field_is_empty|strip_tags|wm_remove|escape:javascript}";
    var lbl_field_required = "{$lng.lbl_field_required|strip_tags|wm_remove|escape:javascript}";
    var lbl_field_format_is_invalid = "{$lng.lbl_field_format_is_invalid|wm_remove|escape:javascript}";
    var txt_required_fields_not_completed = "{$lng.txt_required_fields_not_completed|wm_remove|escape:javascript}";
    var lbl_blockui_default_message = "{$lng.lbl_blockui_default_message|wm_remove|escape:javascript}";
    var lbl_error = '{$lng.lbl_error|wm_remove|escape:javascript}';
    var lbl_warning = '{$lng.lbl_warning|wm_remove|escape:javascript}';
    var lbl_information = '{$lng.lbl_information|wm_remove|escape:javascript}';
    var lbl_ok = '{$lng.lbl_ok|wm_remove|escape:javascript}';
    var lbl_yes = '{$lng.lbl_yes|wm_remove|escape:javascript}';
    var lbl_no = '{$lng.lbl_no|wm_remove|escape:javascript}';
    var txt_minicart_total_note = '{$lng.txt_minicart_total_note|wm_remove|escape:javascript}';
    var txt_ajax_error_note = '{$lng.txt_ajax_error_note|wm_remove|escape:javascript}';
    {if $use_email_validation ne "N"}
        var txt_email_invalid = "{$lng.txt_email_invalid|wm_remove|escape:javascript}";
        var email_validation_regexp = new RegExp("{$email_validation_regexp|wm_remove|escape:javascript}", "gi");
    {/if}
    var is_admin_editor = {if $is_admin_editor}true{else}false{/if};

    var  topMessageDelay = [];
    topMessageDelay['i'] = {$config.Appearance.delay_value|default:10}*1000;
    topMessageDelay['w'] = {$config.Appearance.delay_value_w|default:60}*1000;
    topMessageDelay['e'] = {$config.Appearance.delay_value_e|default:0}*1000;

{/capture}
{load_defer file="javascript_code" direct_info=$smarty.capture.javascript_code type="js"}

{load_defer file="js/common.js" type="js"}
{if $config.Adaptives.is_first_start eq 'Y'}
    {load_defer file="js/browser_identificator.js" type="js"}
{/if}

{if $webmaster_mode eq "editor"}
    {capture name=webmaster_code}
        var catalogs = {ldelim}
        admin: "{$catalogs.admin|wm_remove|escape:javascript}",
        provider: "{$catalogs.provider|wm_remove|escape:javascript}",
        customer: "{$catalogs.customer|wm_remove|escape:javascript}",
        partner: "{$catalogs.partner|wm_remove|escape:javascript}",
        images: "{$ImagesDir|wm_remove|escape:javascript}",
        skin: "{$SkinDir|wm_remove|escape:javascript}"
    {rdelim};
        var lng_labels = [];
        {foreach key=lbl_name item=lbl_val from=$webmaster_lng}
            lng_labels['{$lbl_name}'] = "{$lbl_val|wm_remove|escape:javascript}";
        {/foreach}
        var page_charset = "{$default_charset|default:"utf-8"}";
    {/capture}
    {load_defer file="webmaster_code" direct_info=$smarty.capture.webmaster_code type="js"}
    {load_defer file="js/editor_common.js" type="js"}
    {if $user_agent eq "ns"}
        {load_defer file="js/editorns.js" type="js"}
    {else}
        {load_defer file="js/editor.js" type="js"}
    {/if}
{/if}

{if $active_modules.Magnifier ne ''}
    {load_defer file="lib/swfobject-min.js" type="js"}
{/if}

{getvar func='func_tpl_is_acheckout_button_enabled'}
{if $func_tpl_is_acheckout_button_enabled or $main eq 'order_message_widget'}
    <script type="text/javascript" src="{$amazon_widget_url}"></script>
{/if}

{if $active_modules.PayPalAuth ne ""}
    {load_defer file="modules/PayPalAuth/ppa.js" type="js"}
{/if}

{*eliminating redudancy*}{load_defer file="lib/jquery-min.js" type="js"}{**}
{if $development_mode_enabled}
    {load_defer file="lib/jquery-migrate.development.js" type="js"}
{else}
    {load_defer file="lib/jquery-migrate.production.js" type="js"}
{/if}

{include file="jquery_ui.tpl"}
{load_defer file="js/ajax.js" type="js"}
{load_defer file="lib/cluetip/jquery.cluetip.js" type="js"}
{if $is_admin_preview}
    {capture name=admin_preview_js}
        var txt_this_form_is_for_demo_purposes = '{$lng.txt_this_form_is_for_demo_purposes|wm_remove|escape:javascript}';
        var txt_this_link_is_for_demo_purposes = '{$lng.txt_this_link_is_for_demo_purposes|wm_remove|escape:javascript}';
    {/capture}
    {load_defer file="admin_preview_js" direct_info=$smarty.capture.admin_preview_js type="js"}
    {load_defer file="js/admin_preview.js" type="js"}
{/if}
{load_defer file="js/top_message.js" type="js"}
{load_defer file="js/popup_open.js" type="js"}
{load_defer file="lib/jquery.blockUI.min.js" type="js"}
{load_defer file="lib/jquery.blockUI.defaults.js" type="js"}

{if $active_modules.Banner_System}
    {load_defer file="modules/Banner_System/js/jquery.cycle.all.js" type="js"}
{/if}

{load_defer file="lib/jquery.cookie.js" type="js"}

{if $main eq 'product'}
    {getvar var=det_images_widget}
    {if $det_images_widget eq 'cloudzoom'}
        {load_defer file="lib/cloud_zoom/cloud-zoom.min.js" type="js"}
        {load_defer file="modules/Detailed_Product_Images/cloudzoom_popup.js" type="js"}
    {/if}
{/if}

{if $active_modules.Product_Notifications ne ''}
    {include file="modules/Product_Notifications/product_notification_widget.tpl"}
{/if}

{include file="onload_js.tpl"}

{getvar func='func_tpl_is_jcarousel_is_needed'}
{if $active_modules.Wishlist ne '' and $func_tpl_is_jcarousel_is_needed}
    {load_defer file="lib/jcarousel.js" type="js"}
    {load_defer file="modules/Wishlist/wl_carousel.js" type="js"}
{/if}

{if $active_modules.Google_Analytics and $config.Google_Analytics.ganalytics_version eq 'Asynchronous'}
    {include file="modules/Google_Analytics/ga_code_async.tpl"}
{/if}

{if $active_modules.Add_to_cart_popup ne ''}
    {load_defer file="modules/Add_to_cart_popup/product_added.js" type="js"}
{/if}

{if $active_modules.Klarna_Payments}
    <script src="https:/{**}/cdn.klarna.com/public/kitt/core/v1.0/js/klarna.min.js"></script>
    <script src="https:/{**}/cdn.klarna.com/public/kitt/toc/v1.1/js/klarna.terms.min.js"></script>
{/if}

{if $active_modules.Cloud_Search ne ""}
    {include file="modules/Cloud_Search/customer_js.tpl" _include_once=1}
{/if}
