<?php
/*
* Copyright (c) e107 Inc e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* $Id: e_shortcode.php 12438 2011-12-05 15:12:56Z secretr $
*
* Featurebox shortcode batch class - shortcodes available site-wide. ie. equivalent to multiple .sc files.
*/

if(!defined('e107_INIT'))
{
	exit;
}

class helpdesk_shortcodes extends e_shortcode
{
	public $override = false; // when set to true, existing core/plugin shortcodes matching methods below will be overridden. 

	// Example: {_BLANK_CUSTOM} shortcode - available site-wide.
	function sc_hdu_logo()
	{
		// get logo from theme, if not see if there is a default, if not then not using logo
		if (is_readable(THEME . "helpdesk.png"))
		{
		    $src= THEME . "helpdesk.png";
		} elseif (is_readable(e_PLUGIN . HELPDESK_FOLDER . "/images/helpdesk.png"))
		{
		    $src= e_PLUGIN . HELPDESK_FOLDER . "/images/helpdesk.png";
		}
		return $src?e107::getParser()->toImage($src, array('style'=>'border:0;', 'alt'=>'helpdesk logo')):null;
	}

}
