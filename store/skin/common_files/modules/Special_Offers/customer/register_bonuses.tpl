{*
850e5138e855497e58a9e99e00c2e8e04e3f7234, v1 (xcart_4_4_0_beta_2), 2010-05-21 08:31:50, register_bonuses.tpl, joy
vim: set ts=2 sw=2 sts=2 et:
*}
{if $smarty.get.usertype eq "C"}

{if $hide_header eq ""}
<tr>
<td colspan="3" class="RegSectionTitle">{$lng.lbl_sp_customer_bonuses}<hr size="1" noshade="noshade" /></td>
</tr>
{/if}

<tr>
  <td align="right">{$lng.lbl_sp_earned_bonus_points}</td>
   <td>&nbsp;</td>
   <td>
    <input type="text" name="bonus_points" size="6" maxlength="10" value="{$bonus.points}" />
   </td>
</tr>

{/if}
