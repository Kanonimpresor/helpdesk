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

class hdu_categories_ui extends e_admin_ui
{

	protected $pluginTitle		= 'Help Desk';
	protected $pluginName		= 'helpdesk';
	//	protected $eventName		= 'helpdesk-hdu_categories'; // remove comment to enable event triggers in admin. 		
	protected $table			= 'hdu_categories';
	protected $pid				= 'hducat_id';
	protected $perPage			= 10;
	protected $batchDelete		= true;
	protected $batchExport     = true;
	protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('tab1'=>'Tab 1', 'tab2'=>'Tab 2'); // Use 'tab'=>'tab1'  OR 'tab'=>'tab2' in the $fields below to enable. 

	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.

	protected $listOrder		= 'hducat_id DESC';

	protected $fields 		= array(
		'checkboxes'              => array('title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => 'value', 'class' => 'center', 'toggle' => 'e-multiselect', 'readParms' => [], 'writeParms' => [],),
		'hducat_id'               => array('title' => LAN_ID, 'type' => 'number', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'hducat_category'         => array('title' => LAN_CATEGORY, 'type' => 'text', 'data' => 'safestr', 'width' => 'auto', 'batch' => false, 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
	//	'hducat_order'            => array('title' => LAN_ORDER, 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'hducat_helpdesk'         => array('title' => HDU_A172, 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'filter' => true, 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left', 'batch' => false,),
	//	'hducat_lastupdate'       => array('title' => 'Lastupdate', 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'options'                 => array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => 'value', 'readParms' => [], 'writeParms' => [],),
	);

	protected $fieldpref = array('hducat_category', 'hducat_order', 'hducat_helpdesk');

	//	protected $filterSort = ['field_key_5', 'field_key_7']; // Display these fields first in the filter drop-down. 

	//	protected $batchSort = ['field_key_5', 'field_key_7'];; // Display these fields first in the batch drop-down.


	//	protected $preftabs        = array('General', 'Other' );
	protected $prefs = array();
	protected $helpdesk_obj;

	public function init()
	{
		$this->getRequest()->setMode('cat');

		$this->fields['hducat_category']['writeParms']['size'] = 'xlarge';
		$this->fields['hducat_helpdesk']['help'] = HDU_A330;
		$this->postFilterMarkup = $this->AddButton();

		// Set drop-down values (if any). 
 		$cats = e107::getDb()->retrieve('hdu_helpdesk', "hdudesk_id, hdudesk_name", true,  true,  'hdudesk_id');

		$this->helpdesk_obj = e107::getSingleton('helpdesk', e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
 
		// Check if the PHP version is 7.4 or newer
		if (version_compare(PHP_VERSION, '7.4.0', '>='))
		{
			// Use arrow function for PHP 7.4+
			$result = array_map(fn($cats) => $cats['hdudesk_name'], $cats);
		}
		else
		{
			// Use anonymous function for older PHP versions
			$result = array_map(function ($cat)
			{
				return $cat['hdudesk_name'];
			}, $cats);
		}
		$result[0] = HDU_A171;
		$this->fields['hducat_helpdesk']['writeParms']['optArray'] = $result; // Example Drop-down array. 

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

	// ------- Customize Create --------

	public function beforeCreate($new_data, $old_data)
	{
		$new_data['hducat_lastupdate'] = time();
		return $new_data;
	}

	public function beforeUpdate($new_data, $old_data, $id)
	{
		$new_data['hducat_lastupdate'] = time();
		return $new_data;
	}

	// // left-panel help menu area. (replaces e_help.php used in old plugins)
	// public function renderHelp()
	// {
	// 	$caption = LAN_HELP;
	// 	$text = 'Some help text';

	// 	return array('caption' => $caption, 'text' => $text);
	// }

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



class hdu_categories_form_ui extends e_admin_form_ui
{
}


new helpdesk_adminArea();

require_once(e_ADMIN . "auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN . "footer.php");
exit;
