{*
850e5138e855497e58a9e99e00c2e8e04e3f7234, v1 (xcart_4_4_0_beta_2), 2010-05-21 08:31:50, giftreg_confirmation.tpl, joy
vim: set ts=2 sw=2 sts=2 et:
*}
{config_load file="$skin_config"}
{include file="mail/html/mail_header.tpl"}

<br />{include file="mail/salutation.tpl" salutation=$recipient_data.recipient_name}

<br />{$lng.eml_giftreg_confirmation_msg|substitute:"sender":"`$userinfo.title` `$userinfo.firstname` `$userinfo.lastname`"}

<hr size="1" noshade="noshade" />

<br />{$lng.lbl_event}: <b>{$event_data.title}</b>

<hr size="1" noshade="noshade" />

<br />{$lng.eml_giftreg_click_to_confirm}:  <a href="{$http_customer_location}/giftregs.php?cc={$confirmation_code}">{$http_customer_location}/giftregs.php?cc={$confirmation_code}</a>

<br />{$lng.eml_giftreg_click_to_decline}:  <a href="{$http_customer_location}/giftregs.php?cc={$decline_code}">{$http_customer_location}/giftregs.php?cc={$decline_code}</a>

<br />
{include file="mail/html/signature.tpl"}
