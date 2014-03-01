{*
5d60b84b8ae181c9bbff34c0d4da94e3cb55901d, v5 (xcart_4_5_5), 2012-11-27 11:59:43, atracking_logins.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
{if $statistics}

<table cellspacing="1" class="DataSheet">
<tr class="DataSheet">
  <th width="10%">{$lng.lbl_date}</th>
  <th width="70%" align="left">{$lng.lbl_login}</th>
  <th width="10%">{$lng.lbl_usertype}</th>
  <th width="10%">{$lng.lbl_action}</th>
  <th width="10%">{$lng.lbl_ip_address}</th>
  <th width="10%">{$lng.lbl_status}</th>
</tr>
{section name=idx loop=$statistics}
<tr>
  <td nowrap="nowrap">{$statistics[idx].date_time|date_format:$config.Appearance.datetime_format}</td>
  <td><a href="{$catalogs.admin}/user_modify.php?user={$statistics[idx].userid}&amp;usertype={$statistics[idx].usertype}">{$statistics[idx].login}</a></td>
  <td>{$statistics[idx].usertype}</td>
  <td>{$statistics[idx].action}</td>
  <td>{$statistics[idx].s_ip}</td>
  <td>{if $statistics[idx].status ne "success"}<font class="Star"><b>{/if}{$statistics[idx].status}{if $statistics[idx].status ne "success"}</b></font>{/if}</td>
</tr>
{/section}
</table>

<br />

<form action="statistics.php{if $php_url.query_string}?{$php_url.query_string|escape}{/if}" method="post" name="delloghistoryform">
<input type="hidden" name="action" value="delete" />

<input type="submit" value="{$lng.lbl_delete_for_selected_dates|strip_tags:false|escape}" />
&nbsp;&nbsp;&nbsp;
<input type="button" value="{$lng.lbl_delete_all|strip_tags:false|escape}" onclick="javascript: document.delloghistoryform.action.value='delete_all'; document.delloghistoryform.submit();" />

</form>

{else}

<br />
<center>{$lng.txt_login_history_empty}</center>

{/if}

