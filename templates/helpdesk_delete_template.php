<?php

//Old $HDU_DELETE_OK
if (!isset($HELPDESK_DELETE_TEMPLATE["ok"]))
{
    $HELPDESK_DELETE_TEMPLATE["ok"] = "
<table style='".USER_WIDTH."' class='fborder'>
	<tr>
		<td class ='fcaption'  style='text-align:left;' >{HDU_TITLE}&nbsp;</td>
	</tr>
	<tr>
		<td style='vertical-align:top;' class='forumheader3'  >{HDU_SHOW_UPDIR}</td>
	</tr>
	<tr>
		<td  class='forumheader3' style='text-align:center;' >".HDU_230." {HDU_TICKET_ID}<br /><br />{HDU_DELETE_CONFIRM}&nbsp;&nbsp;{HDU_DELETE_CANCEL}<br />
		</td>
	</tr>
	<tr>
		<td  class='fcaption' >&nbsp;</td>
	</tr>
</table>";
}
//Old $HDU_DELETE_NOTOK
if (!isset($HELPDESK_DELETE_TEMPLATE["notok"]))
{
    $HELPDESK_DELETE_TEMPLATE["notok"] = "
<table style='".USER_WIDTH."' class='fborder'>
	<tr>
		<td class ='fcaption'  style='text-align:left;' >{HDU_TITLE}&nbsp;</td>
	</tr>
	<tr>
		<td style='vertical-align:top;' class='forumheader3'  >{HDU_SHOW_UPDIR}</td>
	</tr>
	<tr>
		<td  class='forumheader3' style='text-align:center;' >".HDU_233."</td>
	</tr>
	<tr>
		<td  class='fcaption' >&nbsp;</td>
	</tr>
</table>";
}