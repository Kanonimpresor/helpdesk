<?php
 
// Old $HDU_SHOWTICKET_HEADER
if (!isset($HELPDESK_SHOW_TEMPLATE["header"]))
{
    $HELPDESK_SHOW_TEMPLATE["header"] = "";
}
// Old $HDU_SHOWTICKET
if (!isset($HELPDESK_SHOW_TEMPLATE["main"]))
{
    $HELPDESK_SHOW_TEMPLATE["main"] = "
<table style='" . USER_WIDTH . "' class='fborder'>
	<tr>
		<td class='fcaption' >" . HDU_1 . " {HDU_SHOW_ACTION}</td>
	</tr>
	<tr>
		<td style='vertical-align:top;' class='forumheader3'>{HDU_SHOW_UPDIR}&nbsp;{HDU_SHOW_PRINT}&nbsp;{HDU_SHOW_EMAILLINK}&nbsp;{HDU_SHOW_PDF}&nbsp;{HDU_SHOW_DELETE}</td>
	</tr>
	<tr>
		<td>{HDU_SHOW_TABLIST}";
}

    $HELPDESK_SHOW_TEMPLATE["edit_main"] = "
<table style='" . USER_WIDTH . "' class='fborder'>
	<tr>
		<td class='fcaption' >" . HDU_1 . " {HDU_SHOW_ACTION}</td>
	</tr>
	<tr>
		<td style='vertical-align:top;' class='forumheader3'>{HDU_SHOW_UPDIR}&nbsp;{HDU_SHOW_PRINT}&nbsp;{HDU_SHOW_EMAILLINK}&nbsp;{HDU_SHOW_PDF}&nbsp;{HDU_SHOW_DELETE}</td>
	</tr>
	<tr>
		<td>";


// Old $HDU_SHOWTICKET_TICKET
if (!isset($HELPDESK_SHOW_TEMPLATE["ticket"]))
{
    $HELPDESK_SHOW_TEMPLATE["ticket"] = "
<table style='width:100%;' id='hduTableTicket'>
	<tr>
		<td style='width:30%; vertical-align:top;'  class='forumheader3'>" . HDU_3 . "</td>
		<td style='width:70%; vertical-align:top;'  class='forumheader3'>{HDU_SHOW_USER}&nbsp;</td>
	</tr>
	<tr>
		<td style='width:30%; vertical-align:top;'  class='forumheader3'>" . HDU_36 . "</td>
		<td  style='width:70%; vertical-align:top;' class='forumheader3'>{HDU_SHOW_DATEPOSTED}</td>
	</tr>
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3'>" . HDU_6 . "</td>
		<td style='width:70%; vertical-align:top;' class='forumheader3'>{HDU_SHOW_PRIORITY}</td>
	</tr>
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3'>" . HDU_31 . " *</td>
		<td style='width:70%; vertical-align:top;' class='forumheader3'>{HDU_SHOW_SUMMARY}</td>
	</tr>
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3' > " . HDU_10 . " *</td>
		<td style='width:70%; vertical-align:top;' class='forumheader3' >{HDU_SHOW_CATEGORY}</td>
	</tr>";
    if ($HELPDESK_SHOW_obj->hduprefs_showassettag)
    {
        $HELPDESK_SHOW_TEMPLATE["ticket"] .= "
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3' > " . HDU_39 . " </td>
		<td style='width:70%; vertical-align:top;' class='forumheader3' >{HDU_SHOW_ASSET}</td>
	</tr>";
        // If we show the asset tag
    }
    $HELPDESK_SHOW_TEMPLATE["ticket"] .= "
	<tr>
		<td style='width:30%;vertical-align:top;'  class='forumheader3'>" . HDU_12 . " *</td>
		<td style='width:70%;vertical-align:top;'  class='forumheader3'>{HDU_SHOW_DESCRIPTION}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;vertical-align:top' class='forumheader3'>" . HDU_28 . "</td>
		<td style='width:70%;vertical-align:top;'  class='forumheader3'>{HDU_SHOW_EMAIL}</td>
	</tr>
</table>";
}
//Old $HDU_SHOWTICKET_DETAILS
if (!isset($HELPDESK_SHOW_TEMPLATE["details"]))
{
    $HELPDESK_SHOW_TEMPLATE["details"] = "
<table style='width:100%;' id='hduTableDetails' >
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3' > " . HDU_154 . " </td>
		<td style='width:70%; vertical-align:top;' class='forumheader3' >{HDU_SHOW_STATUS}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_25 . "</td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_ASSIGNEDTO}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_26 . "</td>
		<td style='width:70%;vertical-align:top;'  class='forumheader3'>{HDU_SHOW_ALLOCATE_TIME}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_37 . "</td>
		<td style='width:70%;vertical-align:top;'  class='forumheader3'>{HDU_SHOW_CLOSED}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_143 . "</td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_FIX}</td>
	</tr>
</table>";
}

    $HELPDESK_SHOW_TEMPLATE["edit"] = "
<table style='width:100%;' id='hduTableTicket'>
	<tr>
		<td style='width:30%; vertical-align:top;'  class='forumheader3'>" . HDU_3 . "</td>
		<td style='width:70%; vertical-align:top;'  class='forumheader3'>{HDU_SHOW_USER}&nbsp;</td>
	</tr>
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3'>" . HDU_6 . "</td>
		<td style='width:70%; vertical-align:top;' class='forumheader3'>{HDU_SHOW_PRIORITY}</td>
	</tr>
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3'>" . HDU_31 . " *</td>
		<td style='width:70%; vertical-align:top;' class='forumheader3'>{HDU_SHOW_SUMMARY}</td>
	</tr>
	<tr>
		<td style='width:30%; vertical-align:top;' class='forumheader3' > " . HDU_10 . " *</td>
		<td style='width:70%; vertical-align:top;' class='forumheader3' >{HDU_SHOW_CATEGORY}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;'  class='forumheader3'>" . HDU_12 . " *</td>
		<td style='width:70%;vertical-align:top;'  class='forumheader3'>{HDU_SHOW_DESCRIPTION}</td>
	</tr>
</table>";

//OLd $HDU_SHOWTICKET_FINANCE
if (!isset($HELPDESK_SHOW_TEMPLATE["finance"]))
{
    $HELPDESK_SHOW_TEMPLATE["finance"] = "
<table style='width:100%;' id='hduTableFinance'>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'><b>" . HDU_144 . "</b></td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_FIXCOST}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_145 . "</td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_HOURS}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_146 . "</td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_RATE}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'><b>" . HDU_147 . "</b></td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_COST}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_148 . "</td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_TRAVEL}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'>" . HDU_149 . "</td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_DISTANCERATE}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'><b>" . HDU_150 . "</b></td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_DISTANCECOST}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'><b>" . HDU_164 . "</b></td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_EQUPTCOST}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'><b>" . HDU_151 . "</b></td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_CALLOUT}</td>
	</tr>
	<tr>
		<td style='width:30%;vertical-align:top;' class='forumheader3'><b>" . HDU_152 . "</b></td>
		<td style='width:70%;vertical-align:top;' class='forumheader3'>{HDU_SHOW_TOTALCOST}</td>
	</tr>
</table>";
}
//Old $HDU_SHOWTICKET_COMMENT_HEADER
if (!isset($HELPDESK_SHOW_TEMPLATE["comment_header"]))
{
    $HELPDESK_SHOW_TEMPLATE["comment_header"] = "
<table  style='width:100%;' id='hduTableComment'>
	<tr>
		<td style='vertical-align:top;' colspan='3' class='forumheader3'>{HDU_SHOW_NEWCOMMENT}</td>
	</tr>
	<tr>
		<td class='forumheader2' style='width:10%; vertical-align:top;' >" . HDU_98 . "</td>
		<td class='forumheader2' style='width:20%; vertical-align:top;' >" . HDU_99 . "</td>
		<td class='forumheader2' style='width:70%; vertical-align:top;' >" . HDU_100 . "</td>
	</tr>";
}
// Old $HDU_SHOWTICKET_COMMENT_DETAIL
if (!isset($HELPDESK_SHOW_TEMPLATE["comment_detail"]))
{
    $HELPDESK_SHOW_TEMPLATE["comment_detail"] = "
	<tr>
		<td class='forumheader3' style='width:10%; vertical-align:top;' >{HDU_SHOW_COMMENTDATE}</td>
		<td class='forumheader3' style='width:20%; vertical-align:top;' >{HDU_SHOW_COMMENTPOSTER}</td>
		<td class='forumheader3' style='width:70%; vertical-align:top;' >{HDU_SHOW_COMMENT}</td>
	</tr>";
}
//Old $HDU_SHOWTICKET_COMMENT_FOOTER
if (!isset($HELPDESK_SHOW_TEMPLATE["comment_footer"]))
{
    $HELPDESK_SHOW_TEMPLATE["comment_footer"] = "
</table>";
}

// Old $HDU_SHOWTICKET_FOOTER
if (!isset($HELPDESK_SHOW_TEMPLATE["footer"]))
{
    $HELPDESK_SHOW_TEMPLATE["footer"] = "
		</td>
	</tr>
	<tr>
		<td  class='forumheader3' >* - ".HDU_250."<br /><br />{HDU_SHOW_SUBMIT}</td>
	</tr>
	<tr>
		<td  class='fcaption' >&nbsp;</td>
	</tr>
</table>";
}
