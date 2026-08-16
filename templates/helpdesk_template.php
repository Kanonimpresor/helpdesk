<?php
 
// *
// * FAQs list. This part is the front opening screen of the FAQ Plugin
// *
//$HELPDESK_TEMPLATE["caption"] = "{HDU_TITLE}";

if (!isset($HELPDESK_TEMPLATE["header"]))
{
    $HELPDESK_TEMPLATE["header"] = "
<table style ='" . USER_WIDTH . "' class ='fborder'>
";
/*
    if (defined('HDU_LOGO'))
    {
        $HELPDESK_TEMPLATE["header"] .= "
	<tr>
		<td class ='forumheader2' colspan='8' style='text-align:center;' >
			{HDU_LOGO}
			<img src='".HDU_LOGO."' style='border:0;' alt='helpdesk logo' />
		</td>
	</tr>";
    }
*/
$HELPDESK_TEMPLATE["form"] .= "
{HDU_GOTOREC} {HDU_DOFILTER}
";

$HELPDESK_TEMPLATE["header"] .= "
<tr>
	<td class ='forumheader2' colspan='8' style='text-align:center;' >
		{HDU_LOGO}
	</td>
</tr>
	<tr>
		<td style='vertical-align:top;'  colspan='8' class ='forumheader3'><b>{HDU_MESSAGE}</b>&nbsp;</td>
	</tr>";
    //if (!empty($HELPDESKx_PREF['hduprefs_messagetop']))
    //{
        // If there is a message at the top of the helpdesk to display then display it
        $HELPDESK_TEMPLATE["header"] .= "
	<tr>
		<td style='vertical-align:top;'  colspan='8' class ='forumheader3'>{HDU_MESSAGETOP}&nbsp;</td>
	</tr>
	<tr>
		<td colspan ='4' class ='forumheader3'>{HDU_PHONE}&nbsp;</td>
		<td colspan ='4' class ='forumheader3'>{HDU_FAQ}</td>
	</tr>
	<tr>
		<td class ='forumheader2' colspan ='4'>" . HDU_188 . "</td>
		<td class ='forumheader2' colspan ='4'>" . HDU_176 . "</td>
	</tr>
	<tr>
		<td style='text-align:left' colspan ='4' class='forumheader3' >{HDU_NEWTICKET} {HDU_REPORTS}&nbsp;</td>
		<td  class='forumheader3' colspan ='4' style='width:50%; vertical-align:top;' >{HDU_FILTER}<br />
		{HDU_DOFORM}</td>
	</tr>
</table>
<table style ='" . USER_WIDTH . "' class ='fborder' >
	<tr>
		<td style ='width:3%; text-align:center' class ='forumheader'><span class ='defaulttext'>&nbsp;</span></td>
		<td style ='width:5%; text-align:center' class ='forumheader'><span class ='defaulttext'>" . HDU_1 . "</span></td>
		<td style ='width:15%; text-align:center' class ='forumheader'><span class ='defaulttext'>" . HDU_31 . "</span></td>
		<td style ='width:15%; text-align:center' class ='forumheader'><span class ='defaulttext'>" . HDU_248 . "</span></td>
		<td style ='width:15%; text-align:center' class ='forumheader'><span class ='defaulttext'>" . HDU_10 . "</span></td>
		<td style ='width:17%; text-align:center' class ='forumheader'><span class ='defaulttext'>" . HDU_3 . "</span></td>
		<td style ='width:15%; text-align:center' class ='forumheader'><span class ='defaulttext'>" . HDU_4 . "</span></td>
		<td style ='width:15%; text-align:center' class ='forumheader'><span class ='defaulttext'>" . HDU_25 . "</span></td>
	</tr>";
//    }
}

if (!isset($HELPDESK_TEMPLATE["detail"]))
{
    $HELPDESK_TEMPLATE["detail"] = "
	<tr>
		<td style ='padding:3px; width:3%; border: #C3BDBD 1px solid; background-color:{HDU_PRIORITYCOLOUR}; text-align:center'>{HDU_TICKET_STATUS}</td>
		<td class ='forumheader3' style ='text-align:center'><span class='smalltext'>{HDU_TICKET_ID}</span></td>
		<td class ='forumheader3' style ='text-align:center'><span class='smalltext'>{HDU_TICKET_SUMMARY}</span>&nbsp;</td>
		<td class ='forumheader3' style ='text-align:center'><span class='smalltext'>{HDU_TICKET_POSTED=d/m/Y}</span>&nbsp;</td>
		<td class ='forumheader3' style ='text-align:center'><span class='smalltext'>{HDU_TICKET_CATEGORY}&nbsp;</span></td>
		<td class ='forumheader3' style ='text-align:center' ><span class='smalltext'>{HDU_TICKET_POSTER}</span></td>
		<td class ='forumheader3' style ='text-align:center'><span class='smalltext'>{HDU_TICKET_RESOLUTION}&nbsp;</span></td>
		<td class ='forumheader3' style ='text-align:center'><span class='smalltext'>{HDU_TICKET_HELPDESK}&nbsp;</span></td>
	</tr>";
}
if (!isset($HELPDESK_TEMPLATE["notickets"]))
{
    $HELPDESK_TEMPLATE["notickets"] = "
	<tr>
		<td class ='forumheader3' style='vertical-align:top;text-align:center;' colspan ='8'>" . HDU_29 . "</td>
	</tr>";
}
if (!isset($HELPDESK_TEMPLATE["footer"]))
{
    $HELPDESK_TEMPLATE["footer"] = "
	<tr>
		<td style ='vertical-align:top;' colspan ='8' class ='forumheader3' >{HDU_MESSAGEBOTTOM}&nbsp;</td>
	</tr>
	<tr>
		<td style ='vertical-align:top;' colspan ='8' class ='forumheader3' >{HDU_NEXTPREV}&nbsp;<span class='smallblacktext'>{HDU_RIGHTS}</span></td>
	</tr>
</table>";
}

$HELPDESK_TEMPLATE["priority"] = "
<table style='" . USER_WIDTH . "' >
	<tr>
		<td style='text-align:Left;'>" . HDU_190 . "&nbsp;
" . HDU_191 . " <img src='" . e_PLUGIN . HELPDESK_FOLDER . "/images/green.gif' style='border:0;' alt='" . HDU_191 . "' title='" . HDU_191 . "' />&nbsp;
" . HDU_192 . " <img src='" . e_PLUGIN . HELPDESK_FOLDER . "/images/yellow.gif' style='border:0;' alt='" . HDU_192 . "' title='" . HDU_192 . "' />&nbsp;
" . HDU_193 . " <img src='" . e_PLUGIN . HELPDESK_FOLDER . "/images/red.gif' style='border:0;' alt='" . HDU_193 . "' title='" . HDU_193 . "' />
		</td>
		<td style='text-align:right;'>" . HDU_189 . "&nbsp; </td>		
		<td style='text-align:center; width:20px; border: #C3BDBD 1px solid; background-color: {HDU_PREFSCOLOURS=1}'>1</td>
		<td style='text-align:center; width:20px; border: #C3BDBD 1px solid; background-color: {HDU_PREFSCOLOURS=2}'>2</td>
		<td style='text-align:center; width:20px; border: #C3BDBD 1px solid; background-color: {HDU_PREFSCOLOURS=3}'>3</td>
		<td style='text-align:center; width:20px; border: #C3BDBD 1px solid; background-color: {HDU_PREFSCOLOURS=4}'>4</td>
		<td style='text-align:center; width:20px; border: #C3BDBD 1px solid; background-color: {HDU_PREFSCOLOURS=5}'>5</td>
	</tr>
</table>";