<?php
//include_once(e_HANDLER . 'shortcode_handler.php');
//$hdu_shortcodes = $tp->e_sc->parse_scbatch(__FILE__);
if (!defined('e107_INIT')) { exit; }

class plugin_helpdesk_delete_shortcodes extends e_shortcode
{

	function sc_hdu_delete_confirm()
  { 
return "<input type='submit' class='button' name='hdu_confirm' value='".HDU_231."' />";
}

	function sc_hdu_delete_cancel()
  { 
return "<input type='submit' class='button' name='hdu_cancel' value='".HDU_232."' />";
}

}