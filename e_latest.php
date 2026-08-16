<?php

e107::lan("helpdesk", true, true);  //fix me 
e107::lan("helpdesk", false, true); //fix me

if (!isset($helpdesk_obj) || !is_object($helpdesk_obj))
{
	require_once(e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
	$helpdesk_obj = new helpdesk;
}

$hduprefs_defaultres = $helpdesk_obj->hduprefs_defaultres;

// $sql->db_Select("hdu_prefs");
// $hdu_row = $sql->db_Fetch();
// extract($hdu_row);

$open_tickets = E107::getDb()->db_Count('hdunit', '(*)', "WHERE hdu_resolution='$hduprefs_defaultres' and hdu_closed=0");
if (empty($open_tickets))
{
    $open_tickets = 0;
}
$text .= "<div style='padding-bottom: 2px;'>
<img src='" . e_PLUGIN . HELPDESK_FOLDER . "/images/hdu_16.png' style='width: 16px; height: 16px; vertical-align: bottom' alt='' /> ";

$text .= HDU_197 . " " . $open_tickets;

$text .= '</div>';
//echo $text;