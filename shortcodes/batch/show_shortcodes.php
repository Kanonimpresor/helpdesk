<?php
//include_once(e_HANDLER . 'shortcode_handler.php');
//$hdu_shortcodes = $tp->e_sc->parse_scbatch(__FILE__);
if (!defined('e107_INIT')) { exit; }

class plugin_helpdesk_show_shortcodes extends e_shortcode
{

	private $sql;
  private $tp;

  function __construct()
  {

//  $this->pluginPrefs = e107::pref('helpdesk');
  $this->tp = e107::getParser();

  $this->sql = e107::getDB();

  }


  function sc_hdu_show_action()
  {
global $helpdesk_obj;
if ($helpdesk_obj->hdu_new)
{
	return "New Ticket";
}
else
{
	return "Edit ticket";
}
}

	function sc_hdu_show_updir()
  {
//global $id, $R1,$from;
global $id, $from;
//return "<a href='".e_PLUGIN.HELPDESK_FOLDER . "/helpdesk.php?$from.list.$id'><img src='./images/updir.png' alt='" . HDU_73 . "' title='" . HDU_73 . "' style='border:0;' /></a>";
return "<a class='btn' href='" . e_PLUGIN . HELPDESK_FOLDER . "/helpdesk.php?{$from}.list.{$id}'>".LAN_BACK."</a>";
}

	function sc_hdu_show_print()
  {
//global $helpdesk_obj, $id, $R1,$from;
global $helpdesk_obj, $id;
//var_dump(defined("IMODE")?IMODE:"");
if (!$helpdesk_obj->hdu_new)
{
//    return "<a href='../../print.php?plugin:helpdesk_menu.$id'><img src='" . HELPDESK_IMAGES_PATH . "generic/" . (defined("IMODE")?IMODE."/":"lite/") . "printer.png' alt='" . HDU_104 . "' title='" . HDU_104 . "' style='border:0;' /></a>";
    return "<a class='btn' href='../../print.php?plugin:helpdesk_menu.$id'>".HDU_104."</a>";
}
return null;
}

	function sc_hdu_show_emaillink()
  {
global $helpdesk_obj, $id;
if (!$helpdesk_obj->hdu_new && (!$helpdesk_obj->hduprefs_posteronly || $helpdesk_obj->hdu_super))
{
//    return "<a href='../../email.php?plugin:helpdesk_menu.$id'><img src='" . HELPDESK_IMAGES_PATH . "generic/" . (defined("IMODE")?IMODE."/":"lite/") . "email.png' alt='" . HDU_255 . "' title='" . HDU_255 . "' style='border:0;' /></a>";
    return "<a class='btn' href='../../email.php?plugin:helpdesk_menu.$id'>".HDU_255."</a>";
}
//else
//{
//	return "";
  return null;
//}
}

	function sc_hdu_show_pdf()
  {
global $helpdesk_obj, $id, $R1,$from;
if (!$helpdesk_obj->hdu_new )
{
//    return "<a href='".e_PLUGIN.HELPDESK_FOLDER . "/helpdesk.php?$from.print.$id'><img src='" . e_PLUGIN.HELPDESK_FOLDER . "/images/pdf_16.png' alt='" . HDU_229 . "' title='" . HDU_229 . "' style='border:0;' /></a>";
    return "<a class='btn' href='".e_PLUGIN.HELPDESK_FOLDER . "/helpdesk.php?$from.print.$id'>".HDU_229."</a>";
}
//else
//{
//	return "";
return null;
//}
}

// Should tabs be hard rendered in the shortcode like this or leave it for the template designer to do it freely like in euser plugin???
	function sc_hdu_show_tablist() 
  {
global $helpdesk_obj,$hdu_posterid;

$hdu_show=($helpdesk_obj->hduprefs_showfinance?1:0);
$hdu_comm=(!$helpdesk_obj->hdu_new && (USERID==$hdu_posterid || $helpdesk_obj->hduprefs_allread || $helpdesk_obj->hdu_super || $helpdesk_obj->hdu_technician)?1:0);
$retval = '<ul class="nav nav-tabs" role="tablist" id="HDU_tabs">';
//$retval = "<input type='button' disabled='disabled' class='button' onclick=\"hdu_show('ticket',$hdu_show,$hdu_comm);\" value='".HDU_247."' id='hdu_t' name='hdu_t' />&nbsp;";
$retval .= '<li class="nav-item" role="presentation">
<button class="nav-link active" id="hdu_tab0" data-bs-toggle="tab" data-bs-target="#tab0" type="button" role="tab" aria-controls="tab0" aria-selected="true">'.HDU_247.'</button>
</li>';
if(!$helpdesk_obj->hdu_new || $helpdesk_obj->hdu_super || $helpdesk_obj->hdu_technician)
{
//	$retval .= "<input type='button' class='button' onclick=\"hdu_show('details',$hdu_show,$hdu_comm);\" value='".HDU_246."' name='hdu_d' id='hdu_d'/>&nbsp;";
	$retval .= '<li class="nav-item" role="presentation">
<button class="nav-link" id="hdu_tab1" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="false">'.HDU_246.'</button>
</li>';
}
if ((!$helpdesk_obj->hdu_new || $helpdesk_obj->hdu_super || $helpdesk_obj->hdu_technician)&& $helpdesk_obj->hduprefs_showfinance)
{
//	$retval.="<input type='button' class='button' onclick=\"hdu_show('finance',$hdu_show,$hdu_comm);\" value='".HDU_245."' id='hdu_f' name='hdu_f' />&nbsp;";
$retval .= '<li class="nav-item" role="presentation">
<button class="nav-link" id="hdu_tab2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">'.HDU_245.'</button>
</li>';
}
if (!$helpdesk_obj->hdu_new && (USERID==$hdu_posterid || $helpdesk_obj->hduprefs_allread || $helpdesk_obj->hdu_super || $helpdesk_obj->hdu_technician))
{
//	$retval .= "<input type='button' class='button' onclick=\"hdu_show('comment',$hdu_show,$hdu_comm);\" value='".HDU_244."' name='hdu_c' id='hdu_c' />";
$retval .= '<li class="nav-item" role="presentation">
<button class="nav-link" id="hdu_tab3" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">'.HDU_244.'</button>
</li>';
}
$retval .= '</ul>';
return $retval;
}

	function sc_hdu_show_user()
  {
global $helpdesk_obj, $hdu_sel_users, $hdupostername;

if ($helpdesk_obj->hdu_new && ($helpdesk_obj->hdu_super || $helpdesk_obj->hdu_technician))
{
    return $hdu_sel_users;
}
else
{
    return $this->tp->toHTML($hdupostername);
}

}

	function sc_hdu_show_dateposted()
  {
global   $hdu_datestamp;
if ($hdu_datestamp>0)
{
	return e107::getDate()->convert_date($hdu_datestamp);
}
else
{
	return "";
}
}

	function sc_hdu_show_priority()
  {
global $helpdesk_obj, $hdu_priority;
if (!$helpdesk_obj->hdu_print &&( $helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_new || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
    // If edit rights
    $retval .= "
    <select name='hdu_priority' class='tbox form-control' onchange=\"changed()\">" .
    ($hdu_priority == "1"?"<option selected='selected' value='1'>" . HDU_137 . "</option>":"<option value='1'>" . HDU_137 . "</option>") .
    ($hdu_priority == "2"?"<option selected='selected' value='2'>" . HDU_138 . "</option>":"<option value='2'>" . HDU_138 . "</option>") .
    ($hdu_priority == "3"?"<option selected='selected' value='3'>" . HDU_139 . "</option>":"<option value='3'>" . HDU_139 . "</option>") .
    ($hdu_priority == "4"?"<option selected='selected' value='4'>" . HDU_140 . "</option>":"<option value='4'>" . HDU_140 . "</option>") .
    ($hdu_priority == "5"?"<option selected='selected' value='5'>" . HDU_141 . "</option>":"<option value='5'>" . HDU_141 . "</option>") . "</select>";
}
else
{
    // Not editing so just show the priority
    $retval .=
    ($hdu_priority == "1"?HDU_137:"") .
    ($hdu_priority == "2"?HDU_138:"") .
    ($hdu_priority == "3"?HDU_139:"") .
    ($hdu_priority == "4"?HDU_140:"") .
    ($hdu_priority == "5"?HDU_141:"") ;
}
return $retval;
}

	function sc_hdu_show_summary()
  {
global $helpdesk_obj, $hdu_summary;
if (!$helpdesk_obj->hdu_print &&( $helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_new || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
    $retval = "<input type='text'  onkeyup=\"changed()\" name='hdu_summary' class='tbox form-control' value=\"" . $this->tp->toFORM($hdu_summary) . "\"   maxlength='50' />";
}
else
{
    $retval = $this->tp->toHTML($hdu_summary, false);
}
return $retval;
}

	function sc_hdu_show_category()
  {
global $helpdesk_obj, $hdu_category;
if (!$helpdesk_obj->hdu_print &&( $helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_new || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
    // If editing display select
    $retval = "<select class='tbox form-control'  onchange=\"changed()\" name='hdu_category'><option value='0'>" . HDU_136 . "</option>";
    if ($this->sql->select("hdu_categories", "hducat_id,hducat_category", " order by hducat_category", true))
    {
        while ($hdu_catrow = $this->sql->fetch())
        {
            extract($hdu_catrow);
            $retval .= "<option value='$hducat_id' " .
            ($hducat_id == $hdu_category?"selected='selected'":"") . ">" . $this->tp->toFORM($hducat_category) . "</option>";
        } // while
    }
    $retval .= "</select>";
}
else
{
    // otherwise just show the category (if any)
    if ($this->sql->select("hdu_categories", "hducat_id,hducat_category", "hducat_id='hdu_category'"))
    {
        $hdu_catrow = $this->sql->fetch();
        {
            extract($hdu_catrow);
            $retval = $hducat_category;
        } // while
    }
    else
    {
        // no categories to show
        $retval = HDU_136;
    }
}
return $retval;
}

	function sc_hdu_show_asset()
  { 
global $hdu_tagno, $helpdesk_obj;
if (!$helpdesk_obj->hdu_print &&( $helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_new || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
    $retval = "<input type='text'  onkeyup=\"changed()\" name='hdu_tagno' class='tbox form-control' size='20' maxlength='20' value='" . $this->tp->toFORM($hdu_tagno) . "' />";
}
else
{
    $retval = $this->tp->toHTML($hdu_tagno, false);
}
return $retval;
}

	function sc_hdu_show_description()
  {
global $hdu_description, $helpdesk_obj;
if (!$helpdesk_obj->hdu_print &&($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_new || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
    $retval = "<textarea rows='7'  onkeyup=\"changed()\" cols='40'    class='tbox form-control' name='hdu_description'>" . $this->tp->toFORM($hdu_description) . "</textarea>";
}
else
{
    $retval = $this->tp->toHTML($hdu_description, false);
}
return $retval;
}

	function sc_hdu_show_email()
  {
global $helpdesk_obj, $hdu_email;

    if ($helpdesk_obj->hdu_showemail)
    {
        // If the user wants to hide their email address - respect this
        $retval = HDU_159;
    }
    else
    {
        // otherwise show it using javascript to minimise spam bots
        // Put the java in some time
        $retval = $this->tp->toHTML($hdu_email, false);
    }
return $retval;
}

	function sc_hdu_show_delete()
  {
global $helpdesk_obj,$id,$from;
if (!$helpdesk_obj->hdu_new && $helpdesk_obj->hdu_super)
{
	return "<a href='".e_PLUGIN.HELPDESK_FOLDER . "/helpdesk.php?$from.delete.$id' ><img src='".HELPDESK_IMAGES_PATH."admin_images/delete_16.png' style='border:0px;' alt='".HDU_228."' title='".HDU_228."' /></a>";
}
else
{
	return "";
}
}

	function sc_hdu_show_status()
  {
global $hdures_resolution, $hdu_resolution, $helpdesk_obj;

if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super))
{
    $retval = $helpdesk_obj->hdu_getstatussel($hdu_resolution);
}
else
{
    if (empty($hdures_resolution))
    {
        $hdures_resolution = HDU_136;
    }
    $retval = $this->tp->toHTML($hdures_resolution, false);
}
return $retval;
}

	function sc_hdu_show_assignedto()
  { 
global $hdu_tech, $helpdesk_obj;
if (!$helpdesk_obj->hdu_print && $helpdesk_obj->hdu_super)
{
    $retval = HDU_25 . " " . HDU_175;
    $hdu_techsel = "<select name='hdu_tech' class='tbox' onchange=\"changed()\">";
    if ($this->sql->select("hdu_helpdesk", "hdudesk_id,hdudesk_name", "order by hdudesk_name", true))
    {
        $hdu_techsel .= "<option value='0'" .
        ($hdu_tech == 0?" selected='selected'":"") . ">" . HDU_41 . "</option>";
        while ($hdu_techrow = $this->sql->fetch())
        {
            extract($hdu_techrow);
            $hdu_techsel .= "<option value='$hdudesk_id'" .
            ($hdu_tech == $hdudesk_id?" selected='selected'":"") . ">" . $this->tp->toFORM($hdudesk_name) . "</option>";
        } // while
    }
    else
    {
        $hdu_techsel .= "	<option value='0'>" . HDU_157 . "</option>";
    }
    $hdu_techsel .= "</select>";
    $retval = $hdu_techsel ;
}
else
{
    // get the name of the help desk
    $this->sql->select("hdu_helpdesk", "hdudesk_id, hdudesk_name", "hdudesk_id='$hdu_tech'");
    $hdu_row = $this->sql->fetch();
//    var_dump ($hdu_row);
//    extract($hdu_row);
    $retval = $this->tp->toHTML($hdu_row["hdudesk_name"], false);
}
return $retval;
}

	function sc_hdu_show_allocate_time()
  { 
    global $hdu_allocated ;
if ($hdu_allocated == 0)
{
    // Not yet allocated so can't display assigned date
    $retval = HDU_41;
}
else
{
    $retval = e107::getDate()->convert_date($hdu_allocated);
}
return $retval;
}

	function sc_hdu_show_closed()
  { 

global $hdu_closed;
if ($hdu_closed == 0)
{
    // Not closed
    $retval = HDU_38;
}
else
{
    // Display date ticket was closed
    $retval = e107::getDate()->convert_date($hdu_closed);
}
return $retval;
}

	function sc_hdu_show_fix()
  { 
global $helpdesk_obj, $hdu_fix,$hdu_fixother;
if ($helpdesk_obj->hduprefs_showfixes)
{
    if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
    {
        $retval = "<select class='tbox' name='hdu_fix' onchange=\"changed()\"><option value='0'>" . HDU_153 . "</option>";
        if ($this->sql->select("hdu_fixes", "hdufix_id,hdufix_fix", "order by hdufix_fix", true))
        {
            while ($hdu_fixrow = $this->sql->fetch())
            {
                extract($hdu_fixrow);
                $retval .= "<option value='$hdufix_id' " .
                ($hdufix_id == $hdu_fix?"selected='selected' ":"") . ">" . $this->tp->toFORM($hdufix_fix) . "</option>";
            }
        }
        else
        {
            $retval .= "<option value='0'>" . HDU_136 . "</option>";
        }
        $retval .= "</select><br />
        <br />
		<textarea name='hdu_fixother' onkeyup=\"changed()\" class='tbox' rows='6' cols='50' style='width:95%'>".$this->tp->toFORM($hdu_fixother)."</textarea>";
    }
    else
    {
        if ($this->sql->select("hdu_fixes", "hdufix_id,hdufix_fix", "hdufix_id='$hdu_fix'"))
        {
            while ($hdu_fixrow = $this->sql->fetch())
            {
                extract($hdu_fixrow);
                $hdu_fixname = $this->tp->toHTML($hdufix_fix);
            }
        }
        $retval = $this->tp->toHTML($hdu_fixname, false) ;
    }
}
else
{
    if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
    {
        $retval .= "<textarea name='hdu_fixother'  onkeyup=\"changed()\" class='tbox' rows='4' style='width:97%;'  cols='35'>" . $this->tp->toFORM($hdu_fixother) . "</textarea>";
    }
    else
    {
        $retval .= $this->tp->toHTML($hdu_fixother, false);
    }
}
return $retval;
}

	function sc_hdu_show_fixcost()
  { 
global $hdu_fixcost,$helpdesk_obj;
if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
	return "<input type='text' size='15'  onkeyup=\"changed()\" maxlength='10' name='hdu_fixcost' class='tbox' value='$hdu_fixcost' />";
}
else
{
	return $hdu_fixcost;
}
}

	function sc_hdu_show_hours()
  {
global $hdu_hours,$helpdesk_obj;
if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
	return "<input type='text' size='15'  onkeyup=\"changed()\" maxlength='10' name='hdu_hours' class='tbox' value='$hdu_hours' />";
}
else
{
	return $hdu_hours;
}
}

	function sc_hdu_show_rate()
  { 
global $hdu_hrate,$helpdesk_obj;
if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super))
{
	return "<input type='text' size='15' onkeyup=\"changed()\" maxlength='10' name='hdu_hrate' class='tbox' value='$hdu_hrate' />";
}
else
{
	return $hdu_hrate;
}
}

	function sc_hdu_show_cost()
  { 
global $hdu_hcost;
return $hdu_hcost;
}

	function sc_hdu_show_travel()
  { 
global $hdu_distance,$helpdesk_obj;
if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
	return "<input type='text' size='15' onkeyup=\"changed()\" maxlength='10' name='hdu_distance' class='tbox' value='$hdu_distance' />";
}
else
{
	return $hdu_distance;
}
}

	function sc_hdu_show_distancerate()
  { 
global $hdu_drate,$helpdesk_obj;
if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
	return "<input type='text' size='15' onkeyup=\"changed()\" maxlength='10' name='hdu_drate' class='tbox' value='$hdu_drate' />";
}
else
{
	return $hdu_drate;
}
}

	function sc_hdu_show_distancecost()
  { 
global $hdu_dcost;
return $hdu_dcost;
}

	function sc_hdu_show_equptcost()
  { 
global $hdu_eqptcost,$helpdesk_obj;
if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
	return "<input type='text' size='15' onkeyup=\"changed()\"  maxlength='10' name='hdu_eqptcost' class='tbox' value='$hdu_eqptcost' />";
}
else
{
	return $hdu_eqptcost;
}
}

	function sc_hdu_show_callout()
  { 
global $helpdesk_obj,$hdu_callout;
if (!$helpdesk_obj->hdu_print && ($helpdesk_obj->hdu_technician || $helpdesk_obj->hdu_super || $helpdesk_obj->quick))
{
	return "<input type='text' size='15' onkeyup=\"changed()\"  maxlength='10' name='hdu_callout' class='tbox' value='$hdu_callout' />";
}
else
{
	return $hdu_callout;
}
}

	function sc_hdu_show_totalcost()
  { 
global $hdu_totalcost;
return $hdu_totalcost;
}

	function sc_hdu_show_submit()
  { 
global $helpdesk_obj,$hdu_closed,$hdu_posterid;
if ($hdu_closed == 0 || ($helpdesk_obj->hdu_super || $helpdesk_obj->hdu_technician || (USERID == $hdu_posterid && $helpdesk_obj->hduprefs_reopen)))
{
    // Submit button
    $retval = "<input type='submit' disabled='disabled' class='button' id='formok' name='formok' value='" . HDU_210 . "' />";
}
else
{
    $retval= "";
}
return $retval;
}

	function sc_hdu_show_commentdate()
  {
global $hduc_date;
return  e107::getDate()->convert_date($hduc_date, "short");
}

	function sc_hdu_show_commentposter()
  { 
global $hduc_postername;
return $this->tp->toHTML($hduc_postername,false);
}

	function sc_hdu_show_comment()
  { 
global $hduc_comment;
return $this->tp->toHTML($hduc_comment,false);
}

	function sc_hdu_show_newcomment()
  { 
global $helpdesk_obj,$hdu_closed,$hdu_posterid;

if ($hdu_closed == 0 || ($helpdesk_obj->hdu_super || $helpdesk_obj->hdu_technician || (USERID == $hdu_posterid && $helpdesk_obj->hduprefs_reopen)))
{
	return "<textarea cols='40' onkeyup=\"changed()\"  rows='4' style='width:99%' name='hduc_comment'></textarea>";
}

}

}
