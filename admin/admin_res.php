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

 
class hdu_resolve_ui extends e_admin_ui
{

	protected $pluginTitle		= 'Help Desk';
	protected $pluginName		= 'helpdesk';
	//	protected $eventName		= 'helpdesk-hdu_resolve'; // remove comment to enable event triggers in admin. 		
	protected $table			= 'hdu_resolve';
	protected $pid				= 'hdures_id';
	protected $perPage			= 10;
	protected $batchDelete		= true;
	protected $batchExport     = true;
	protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('tab1'=>'Tab 1', 'tab2'=>'Tab 2'); // Use 'tab'=>'tab1'  OR 'tab'=>'tab2' in the $fields below to enable. 

	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.

	protected $listOrder		= 'hdures_id DESC';

	protected $fields 		= array(
		'checkboxes'              => array('title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => 'value', 'class' => 'center', 'toggle' => 'e-multiselect',  'writeParms' => [],),
		'hdures_id'               => array('title' => LAN_ID, 'type' => 'number', 'data' => 'int', 'width' => '5%', 'help' => '',  'thclass' => 'left',),
		'hdures_resolution'       => array('title' => HDU_A92, 'type' => 'text', 'data' => 'safestr', 'width' => 'auto', 'filter' => true, 'help' => '',  'thclass' => 'left',),
		'hdures_help'             => array('title' => HDU_A105, 'type' => 'text', 'data' => 'safestr', 'width' => 'auto', 'help' => '',  'thclass' => 'left',),
		'hdures_closed'           => array('title' => HDU_A133,  'type' => 'boolean', 'data' => 'int', 'width' => 'auto', 'batch' => true, 'filter' => true, 'help' => '',  'thclass' => 'left',),
		'hdures_lastupdate'       => array( 'type' => false),
		'hdures_order'            => array('title' => LAN_ORDER, 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '',  'thclass' => 'left',),
		'options'                 => array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => 'value',  'writeParms' => [],),
	);

	protected $fieldpref = array('hdures_id', 'hdures_resolution', 'hdures_order', 'hdures_help', 'hdures_closed', 'hdures_lastupdate');

	//	protected $filterSort = ['field_key_5', 'field_key_7']; // Display these fields first in the filter drop-down. 

	//	protected $batchSort = ['field_key_5', 'field_key_7'];; // Display these fields first in the batch drop-down.


	//	protected $preftabs        = array('General', 'Other' );
	protected $prefs = array();

	protected $helpdesk_obj;

	public function init()
	{
		$this->getRequest()->setMode('res');

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
		$hdu_ac_id = $id;
		$pluginPrefs = e107::pref("helpdesk");
		$hdu_msg = "";

		if (($sql->count("hdunit", "(*)", "where hdu_resolution='$hdu_ac_id'") > 0) || $pluginPrefs['hduprefs_defaultres'] == $hdu_ac_id || $pluginPrefs['hduprefs_autocloseres'] == $hdu_ac_id)
		{
			// Record in use
			$hdu_msg .= HDU_A104;
			$mes->addError($hdu_msg);
			return false;
		}
		return true;
	}


	public function beforeCreate($new_data, $old_data)
	{
		$new_data['hdures_lastupdate'] =  time();
		return $new_data;
	}

	public function beforeUpdate($new_data, $old_data, $id)
	{
		$new_data['hdures_lastupdate'] =  time();
		return $new_data;
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

}



class hdu_resolve_form_ui extends e_admin_form_ui
{
}

new helpdesk_adminArea();

require_once(e_ADMIN . "auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN . "footer.php");
exit;

 
