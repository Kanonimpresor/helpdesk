<?php
require_once("../../../class2.php");
if (!defined('e107_INIT'))
{
    exit;
}
if (!getperms("P"))
{
    header("location:" . e_BASE . "index.php");
    exit;
}

include_once(e_PLUGIN .  HELPDESK_FOLDER .  "/admin/left_menu.php");
 
class hdu_fixes_ui extends e_admin_ui
{

	protected $pluginTitle		= 'Help Desk';
	protected $pluginName		= 'helpdesk';
	//	protected $eventName		= 'helpdesk-hdu_fixes'; // remove comment to enable event triggers in admin. 		
	protected $table			= 'hdu_fixes';
	protected $pid				= 'hdufix_id';
	protected $perPage			= 10;
	protected $batchDelete		= true;
	protected $batchExport     = true;
	protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('tab1'=>'Tab 1', 'tab2'=>'Tab 2'); // Use 'tab'=>'tab1'  OR 'tab'=>'tab2' in the $fields below to enable. 

	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.

	protected $listOrder		= 'hdufix_id DESC';

	protected $fields 		= array(
		'checkboxes'              => array('title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => 'value', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		'hdufix_id'               => array('title' => LAN_ID, 'type' => 'number', 'data' => 'int', 'width' => '5%'),
		'hdufix_fix'              => array('title' => HDU_A72, 'type' => 'text', 'data' => 'safestr' ),
		'hdufix_fixcost'          => array('title' =>  HDU_A132, 'type' => 'number', 'data' => 'float' ),
		'hdufix_order'            => array('title' => LAN_ORDER, 'type' => 'number', 'data' => 'int' ),
		'hdufix_lastupdate'       => array( 'type' => false),
		'options'                 => array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => 'value',  ),
	);

	protected $fieldpref = array('hdufix_id', 'hdufix_fix', 'hdufix_fixcost', 'hdufix_order');
 
	protected $prefs = array();

	protected $helpdesk_obj;

	public function init()
	{
		$this->getRequest()->setMode('fix');

		$this->helpdesk_obj = e107::getSingleton('helpdesk', e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
		$this->postFilterMarkup = $this->AddButton();

	}

	function AddButton()
	{
		$mode = $this->getRequest()->getMode();

		$text = "</fieldset>
			</form>
			<div class='e-container'>
      			<table  style='" . ADMIN_WIDTH . "' class='table adminlist table-striped'>
					<tr>
						<td>";
		$text .=			'<a href="' . e_SELF . '?mode=' . $mode . '&action=create" class="btn batch e-hide-if-js btn-success"><span>' . LAN_CREATE . '</span></a>';
		$text .= "		</td>
					</tr>
				</table>
			</div>
			<form>
				<fieldset>";
		return $text;
	}

	public function beforeDelete($new_data, $id)
	{
		$sql = e107::getDb();
		$mes = e107::getMessage();
		$hdu_fix_id = $id;
		$pluginPrefs = e107::pref("helpdesk");
		$hdu_msg = "";

		if (($sql->count("hdunit", "(*)", "where hdu_fix='$hdu_fix_id'") > 0))
		{
			// Record in use
			$hdu_msg .= HDU_A84;
			$mes->addError($hdu_msg);
			return false;
		}
		return true;
	}


	public function afterCreate($new_data, $old_data, $id)
	{

		$this->helpdesk_obj->helpdesk_cache_clear();
		return true;
	}

	public function afterUpdate($new_data, $old_data, $id)
	{

		$this->helpdesk_obj->helpdesk_cache_clear();
		return true;
	}

	public function beforeCreate($new_data, $old_data)
	{
		$new_data['hdufix_lastupdate'] =  time();
		return $new_data;
	}

	public function beforeUpdate($new_data, $old_data, $id)
	{
		$new_data['hdufix_lastupdate'] =  time();
		return $new_data;
	}

 
}



class hdu_fixes_form_ui extends e_admin_form_ui
{
}


// if (!$hdu_ac_edit)
// {
//     // Get the department names to display in combo box
//     // then display actions available
//     $hdu_ac_yes = false;
//     if ($sql->db_Select("hdu_fixes", "hdufix_id,hdufix_fix", " order by hdufix_fix", "nowhere"))
//     {
//         $hdu_ac_yes = true;
//         while ($hdu_ac_row = $sql->db_Fetch())
//         {
//             extract($hdu_ac_row);
//             $hdu_ac_catopt .= "<option value='$hdufix_id' " . ($hdufix_id == $_POST['hdu_ac_selfix']?"selected='selected'":"") . ">" . $tp->toFORM($hdufix_fix) . "</option>";
//         }
//     }
//     else
//     {
//         $hdu_ac_catopt .= "<option value='0'>" . HDU_A135 . "</option>";
//     }
//     $hdu_ac_text .= "
// <form id='hducatform' method='post' action='" . e_SELF . "'>
// 	<div>
// 		<input type='hidden' value='dothings' name='action' />
// 	</div>
// 	<table style='" . ADMIN_WIDTH . "' class='fborder'>
// 		<tr>
// 			<td colspan='2' class='fcaption'>" . HDU_A74 . "</td>
// 		</tr>
// 		<tr>
// 			<td colspan='2' class='forumheader2'><b>" . $hdu_ac_msg . "</b>&nbsp;</td>
// 		</tr>

// 		<tr>
// 			<td style='width:20%;' class='forumheader3'>" . HDU_A44 . "</td>
// 			<td class='forumheader3'><select name='hdu_ac_selfix' class='tbox'>$hdu_ac_catopt</select></td>
// 		</tr>
// 		<tr>
// 			<td style='width:20%;' class='forumheader3'>" . HDU_A59 . "</td><td class='forumheader3'><input type='radio' style='border:0px;' name='hdu_ac_recdel'  class='radio' id='hdu_ac_recdelE'  value='1' " . ($hdu_ac_yes?"checked='checked'":"disabled='disabled'") . " /><label for='hdu_ac_recdelE' > " . HDU_A75 . "</label><br />
// 				<input type='radio' name='hdu_ac_recdel' style='border:0px;' class='radio' id='hdu_ac_recdelN' value='2' " . (!$hdu_ac_yes?"checked='checked'":"") . "/><label for='hdu_ac_recdelN' > " . HDU_A76 . "</label><br />
// 				<input type='radio' name='hdu_ac_recdel' style='border:0px;' class='radio' id='hdu_ac_recdelD' value='3' /><label for='hdu_ac_recdelD' > " . HDU_A77 . "</label>
// 				<input type='checkbox'  style='border:0px;'  name='hdu_ac_okdel' id='hdu_ac_okdel' class='tbox' value='1' /><label for='hdu_ac_okdel' > " . HDU_A78 . "</label>
// 			</td>
// 		</tr>
// 				<tr>
// 			<td colspan='2' class='forumheader2'><input type='submit' name='submits' value='" . HDU_A80 . "' class='button' /></td>
// 		</tr>
// 		<tr>
// 			<td colspan='2' class='fcaption'>&nbsp;</td>
// 		</tr>
// 	</table>
// </form>";
// }


new helpdesk_adminArea();

require_once(e_ADMIN . "auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN . "footer.php");
exit;
