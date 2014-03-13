{*
c863034063dde05a16bb4f2a2984f56cd779cc10, v7 (xcart_4_5_5), 2013-01-28 14:29:28, service_head.tpl, random
vim: set ts=2 sw=2 sts=2 et:
*}
{get_title page_type=$meta_page_type page_id=$meta_page_id}

{* Main CSS commented out
{include file="customer/service_css.tpl"}*}

        <link rel="shortcut icon" type="image/png" href="{$current_location}/favicon.ico" />

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        {meta type='description' page_type=$meta_page_type page_id=$meta_page_id}
        {meta type='keywords' page_type=$meta_page_type page_id=$meta_page_id}

        <!-- Styles -->
        <!--[if lt IE 9]><link href="/store/skin/leaf-base/css/global-fixed.css" rel="stylesheet"><![endif]-->
        <!--[if gt IE 8]><!--><link href="/store/skin/leaf-base/css/global.css" rel="stylesheet"><!--<![endif]-->
        <!-- End Styles -->


        <!--Typekit-->
        <script type="text/javascript" src="//use.typekit.net/fgh0sbx.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <!--End Typekit-->
