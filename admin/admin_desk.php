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
 

include_once(e_PLUGIN . HELPDESK_FOLDER .  "/admin/left_menu.php");

class hdu_helpdesk_ui extends e_admin_ui
{

	protected $pluginTitle		= HDU_A154;
	protected $pluginName		= 'helpdesk';
	//	protected $eventName		= 'helpdesk-'; // remove comment to enable event triggers in admin. 		
	protected $table			= 'hdu_helpdesk';
	protected $pid				= 'hdudesk_id';
	protected $perPage			= 10;
	protected $batchDelete		= true;
	protected $batchExport     = true;
	protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('tab1'=>'Tab 1', 'tab2'=>'Tab 2'); // Use 'tab'=>'tab1'  OR 'tab'=>'tab2' in the $fields below to enable. 

	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.

	protected $listOrder		= 'hdudesk_id DESC';

	protected $fields 		= array(
		'checkboxes'              => array('title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => 'value', 'class' => 'center', 'toggle' => 'e-multiselect', 'readParms' => [], 'writeParms' => [],),
		'hdudesk_id'              => array('title' => LAN_ID, 'type' => 'number', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'hdudesk_name'            => array('title' => HDU_A152, 'type' => 'text', 'data' => 'safestr', 'width' => 'auto', 'inline' => true, 'validate' => true, 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'hdudesk_email'           => array('title' => HDU_A155, 'type' => 'email', 'data' => 'safestr', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'hdudesk_class'           => array('title' => HDU_A192, 'type' => 'userclass', 'data' => 'int', 'width' => 'auto', 'batch' => true, 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		//	'hdudesk_order'           => array('title' => LAN_ORDER, 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		//'hdudesk_lastupdate'      => array('title' => LAN_UPDATE, 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'options'                 => array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => 'value', 'readParms' => [], 'writeParms' => [],),
	);

	protected $fieldpref = array('hdudesk_name', 'hdudesk_class', 'hdudesk_email', 'hdudesk_order');


	//	protected $preftabs        = array('General', 'Other' );
	protected $prefs = array();
	protected $helpdesk_obj;

	//large, xlarge, xxlarge, block-level
	public function init()
	{

		$this->getRequest()->setMode('desk');

		$this->fields['hdudesk_name']['writeParms']['size'] = 'xlarge';

		$this->postFilterMarkup = $this->AddButton();

		$this->helpdesk_obj = e107::getSingleton('helpdesk', e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
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


	// left-panel help menu area. (replaces e_help.php used in old plugins)
	// public function renderHelp()
	// {
	// 	$caption = LAN_HELP;
	// 	$text = 'Some help text';

	// 	return array('caption' => $caption, 'text' => $text);
	// }

	public function beforeCreate($new_data, $old_data)
	{
		$new_data['hdudesk_lastupdate'] = time();
		return $new_data;
	}

	public function beforeUpdate($new_data, $old_data, $id)
	{
		$new_data['hdudesk_lastupdate'] = time();
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



class hdu_helpdesk_form_ui extends e_admin_form_ui
{
}
 
new helpdesk_adminArea();

require_once(e_ADMIN . "auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN . "footer.php");
exit;
