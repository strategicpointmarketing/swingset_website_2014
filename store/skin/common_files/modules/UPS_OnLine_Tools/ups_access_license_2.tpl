{*
6f49656773fb506ba318057018fb5676fa887f18, v2 (xcart_4_6_1), 2013-08-27 11:29:53, ups_access_license_2.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
{capture name=dialog}
<!-- ACCESS LICENSE AGREEMENT SCREEN START -->
<br />

<form action="ups.php" method="post" name="upsstep2form">
<input type="hidden" name="current_step" value="{$ups_reg_step}" />

<table cellpadding="2" cellspacing="2" width="100%">

<tr>
  <td colspan="2">&nbsp;</td>
  <td>
{if $message eq "need_to_agree"}
<font class="ErrorMessage">{$lng.txt_need_to_agree_license}</font>
<br /><br />
{elseif $message eq "no_agreement"}
<font class="ErrorMessage">{$lng.txt_ups_license_not_received}</font>
<br /><br />
{/if}
  </td>
</tr>

<tr>
  <td width="95" align="center" valign="top">{include file="modules/UPS_OnLine_Tools/ups_logo.tpl"}</td>
  <td>&nbsp;</td>
  <td width="100%">
<iframe src="ups.php?mode=showlicense&amp;raw=1" width="100%" height="400" scrolling="auto" frameborder="1" align="middle" name="license" id="license_iframe"></iframe>

<br /><br />

<table>

<tr>
  <td><input type="radio" name="confirmed" value="Y" /></td>
  <td>{$lng.lbl_yes_agree}</td>
</tr>

<tr>
  <td><input type="radio" name="confirmed" value="N" /></td>
  <td>{$lng.lbl_no_not_agree}</td>
</tr>

</table>

<br />

<div align="right">

<table>

<tr>
  <td>{include file="buttons/button.tpl" button_title=$lng.lbl_print title='' style="button" href="javascript: window.open('ups.php?mode=showlicense','printable');"}</td>
  <td><img src="{$ImagesDir}/spacer.gif" width="50" height="1" alt="" /></td>
  <td>{include file="buttons/button.tpl" button_title=$lng.lbl_next title=$lng.lbl_next style="button" href="javascript: document.upsstep2form.submit();"}</td>
  <td><img src="{$ImagesDir}/spacer.gif" width="50" height="1" alt="" /></td>
  <td>{include file="buttons/button.tpl" button_title=$lng.lbl_cancel title='' style="button" href="ups.php?mode=cancel"}</td>
  <td><img src="{$ImagesDir}/spacer.gif" width="50" height="1" alt="" /></td>
</tr>

</table>

</div>

  </td>
</tr>

</table>
</form>

<br />
<hr />

<div align="center">
{$lng.txt_ups_trademark_text}
</div>
<!-- ACCESS LICENSE AGREEMENT SCREEN END -->
{/capture}
{include file="modules/UPS_OnLine_Tools/dialog.tpl" title=$title content=$smarty.capture.dialog extra='width="100%"'}

