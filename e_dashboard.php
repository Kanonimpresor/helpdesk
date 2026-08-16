<?php
if (!defined('e107_INIT')) { exit; }


class helpdesk_dashboard // include plugin-folder in the name.
{
 
	
	function status() // Status Panel in the admin area
	{

		$total_tickets = e107::getDb()->count('hdunit', '(*)');

		$var[0]['icon'] 	= "<img src='".e_PLUGIN. "helpdesk/images/hdu_16.png' alt='' />";
		$var[0]['title'] 	= HDU_198;
		$var[0]['url']		= e_PLUGIN_ABS."helpdesk/helpdesk.php";
		$var[0]['total'] 	= $total_tickets;

		return $var;
	}	
	
	
	function latest() // Latest panel in the admin area.
	{

		//$hduprefs_defaultres = e107::pref('helpdesk', 'hduprefs_defaultres'); too soon

		$helpdesk_obj  = e107::getSingleton('helpdesk_obj', e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
		$hduprefs_defaultres = $helpdesk_obj->hduprefs_defaultres;
	 
		$open_tickets = e107::getDb()->count('hdunit', '(*)', "WHERE hdu_resolution='$hduprefs_defaultres' and hdu_closed=0");

		$var[0]['icon'] 	= "<img src='".e_PLUGIN. "helpdesk/images/hdu_16.png' alt='' />";
		$var[0]['title'] 	= HDU_197;
		$var[0]['url']		= e_PLUGIN_ABS."helpdesk/helpdesk.php";
		$var[0]['total'] 	= $open_tickets;

		return $var;
	}	
	
	
}
