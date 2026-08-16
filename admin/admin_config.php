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

class helpdesk_prefs_ui extends e_admin_ui
{

	protected $pluginTitle		= HDU_A2;
	protected $pluginName		= HELPDESK_FOLDER;


	protected $prefs = array(
		'hduprefs_seo' => array(
			'title'      => HDU_A30,
			'tab'        => 0,
			'type'       => 'radio',
			'data'       => 'int',
			'help'       => HDU_A505,
			'writeParms' => array(
				'optArray' => array(
					1 => HDU_A28, // Label for value 1
					2 => HDU_A29  // Label for value 2
				),
				'inline' => true,
			)
		),

		// Supervisor class
		'hduprefs_supervisorclass' => array(
			'title'      => HDU_A9,
			'type'       => 'userclass',
			'data'       => 'str',
			'help'       => HDU_A301,
		 
		),

		// Post class
		'hduprefs_postclass' => array(
			'title'      => HDU_A203,
			'type'       => 'userclass',
			'data'       => 'str',
			'help'       => HDU_A204,
		 
		),

		// User class
		'hduprefs_userclass' => array(
			'title'      => HDU_A11,
			'type'       => 'userclass',
			'data'       => 'str',
			'help'       => HDU_A302,
			 
		),

		// Message top
		'hduprefs_messagetop' => array(
			'title'      => HDU_A107,
			'type'       => 'textarea',
			'data'       => 'str',
			'help'       => HDU_A303,
			'writeParms' => array('size' => 'block-level')
		),

		// Message bottom
		'hduprefs_messagebottom' => array(
			'title'      => HDU_A108,
			'type'       => 'textarea',
			'data'       => 'str',
			'help'       => HDU_A304,
			'writeParms' => array('size' => 'block-level')
		),

		// Phone
		'hduprefs_phone' => array(
			'title'      => HDU_A20,
			'type'       => 'text',
			'data'       => 'str',
			'help'       => HDU_A305,
			'writeParms' => array('size' => '30', 'maxlength' => 20)
		),

		// FAQ link
		'hduprefs_faq' => array(
			'title'      => HDU_A501,
			'type'       => 'text',
			'data'       => 'str',
			'help'       => HDU_A502,
			'writeParms' => array('size' => 'block-level', 'maxlength' => 200)
		),

		// Rows per page
		'hduprefs_rows' => array(
			'title'      => HDU_A1,
			'type'       => 'number',
			'data'       => 'int',
			'help'       => HDU_A306,
			'writeParms' => array('size' => '5', 'maxlength' => 2)
		),

		// Menu title
		'hduprefs_menutitle' => array(
			'title'      => HDU_A15,
			'type'       => 'text',
			'data'       => 'str',
			'help'       => HDU_A307,
			'writeParms' => array('size' => '30', 'maxlength' => 30)
		),

		// Helpdesk title
		'hduprefs_title' => array(
			'title'      => HDU_A25,
			'type'       => 'text',
			'data'       => 'str',
			'help'       => HDU_A308,
			'writeParms' => array('size' => '30', 'maxlength' => 30)
		),

		// Hourly rate
		'hduprefs_hourlyrate' => array(
			'title'      => HDU_A115,
			'type'       => 'text',
			'data'       => 'str',
			'help'       => HDU_A309,
			'writeParms' => array('size' => '10', 'maxlength' => 10)
		),

		// Distance rate
		'hduprefs_distancerate' => array(
			'title'      => HDU_A116,
			'type'       => 'text',
			'data'       => 'str',
			'help'       => HDU_A310,
			'writeParms' => array('size' => '10', 'maxlength' => 10)
		),

		// Escalate every n days
		'hduprefs_escalatedays' => [
			'title' => HDU_A16,
			'type' => 'number',
			'size' => 'small',
			'writeParms' => ['maxlength' => 3],
			'help' => HDU_A311,
		],

		// Escalate on posted date or last action date
		'hduprefs_escalateon' => [
			'title' => HDU_A23,
			'type' => 'dropdown',
			'writeParms' => [
				'optArray' => [
					'1' => HDU_A21,
					'2' => HDU_A22,
				],
			],
			'help' => HDU_A312,
		],

		// Auto close after n days
		'hduprefs_autoclosedays' => [
			'title' => HDU_A17,
			'type' => 'number',
			'size' => 'small',
			'writeParms' => ['maxlength' => 3],
			'help' => HDU_A313,
		],

		// Resolution for auto close
		'hduprefs_autocloseres' => [
			'title' => HDU_A112,
			'type' => 'dropdown',
			'data' => 'int',
			'writeParms' => [],
			'help' => HDU_A314,
		],

		// Default resolution for new tickets
		'hduprefs_defaultres' => [
			'title' => HDU_A114,
			'type' => 'dropdown',
			'data' => 'int',
			'writeParms' => [],
			'help' => HDU_A315,
		],

		// Default assignment
		'hduprefs_assigned' => [
			'title' => HDU_A198,
			'type' => 'dropdown',
			'data' => 'int',
			'writeParms' => [],
			'help' => HDU_A316,
		],

		// Default status for closed tickets
		'hduprefs_closestat' => [
			'title' => HDU_A199,
			'type' => 'dropdown',
			'data' => 'int',
			'writeParms' => [],
			'help' => HDU_A317,
		],

		// Poster only view restrict list
		'hduprefs_posteronly' => [
			'title' => HDU_A14,
			'type' => 'boolean',
			'help' => HDU_A318,
		],

		// Allow user to reopen tickets
		'hduprefs_reopen' => [
			'title' => HDU_A19,
			'type' => 'boolean',
			'help' => HDU_A319,
		],

		// Comments visible to all
		'hduprefs_allread' => [
			'title' => HDU_A18,
			'type' => 'boolean',
			'help' => HDU_A320,
		],

		// Show asset tag
		'hduprefs_showassettag' => [
			'title' => HDU_A27,
			'type' => 'boolean',
			'help' => HDU_A321,
		],

		// Show fixes
		'hduprefs_showfixes' => [
			'title' => HDU_A110,
			'type' => 'boolean',
			'help' => HDU_A322,
		],

		// Show financials
		'hduprefs_showfinance' => [
			'title' => HDU_A111,
			'type' => 'boolean',
			'help' => HDU_A323,
		],

		'hduprefs_showfinusers' => [
			'title' => HDU_A130,
			'type' => 'boolean',
			'help' => HDU_A324,
		],

		'hduprefs_callout' => [
			'title' => HDU_A129,
			'type' => 'number',
			'data' => 'int',
			'help' => HDU_A325,
		],

		'hduprefs_autoassign' => [
			'title' => HDU_A197,
			'type' => 'boolean',
			'help' => HDU_A327,
		],

	);

	public function init()
	{
		$status_array = [];
		$sql = e107::getDb();
		$status_array = array();
		$status_list = $sql->retrieve("SELECT hdures_id, hdures_resolution FROM #hdu_resolve ORDER BY hdures_resolution", true);

		$status_array[0] = HDU_A128;
		foreach ($status_list as $status)
		{

			$status_array[$status['hdures_id']] = $status['hdures_resolution'];
		}

		$this->prefs['hduprefs_assigned']['writeParms']['optArray'] = $status_array;
		$this->prefs['hduprefs_defaultres']['writeParms']['optArray'] = $status_array;
		$this->prefs['hduprefs_autocloseres']['writeParms']['optArray'] = $status_array;
		$this->prefs['hduprefs_closestat']['writeParms']['optArray'] = $status_array;
	}




	// left-panel help menu area. (replaces e_help.php used in old plugins)
	public function renderHelp()
	{
		$caption = LAN_HELP;
		$text = 'Some help text';

		return array('caption' => $caption, 'text' => $text);
	}
}

class helpdesk_mail_ui extends e_admin_ui
{

	protected $pluginTitle		= HDU_A2;
	protected $pluginName		= HELPDESK_FOLDER;

	protected $prefs = array(
		'hduprefs_mailuser' => [
			'title' => HDU_A3,
			'type' => 'dropdown',
			'data' => 'int',
			'help' => HDU_A340,
			'writeParms' => [
				'optArray' => [
					0 => HDU_A468,
					1 => HDU_A469,
					2 => HDU_A470
				],
				'inline' => true,

			]
		],

		'hduprefs_mailhelpdesk' => [
			'title' => HDU_A4,
			'type' => 'dropdown',
			'data' => 'int',
			'help' => HDU_A506,
			'writeParms' => [
				'optArray' => [
					0 => HDU_A468,
					1 => HDU_A469,
					2 => HDU_A470
				],
				'inline' => true,

			]
		],

		'hduprefs_mailtechnician' => [
			'title' => HDU_A5,
			'type' => 'dropdown',
			'data' => 'int',
			'help' => HDU_A341,
			'writeParms' => [
				'optArray' => [
					0 => HDU_A468,
					1 => HDU_A469,
					2 => HDU_A470
				],
				'inline' => true,

			]
		],

		// PM From (Dropdown with user list)
		'hduprefs_pmfrom' => [
			'title' => HDU_A471,
			'type' => 'user',
			'data' => 'int',
			'help' => HDU_A472,
			'writeParms' => [
				'class' => 'admin', // or leave blank for all users
				'inline' => true,
		 
			]
		],

		// Email From (Text input)
		'hduprefs_emailfrom' => [
			'title' => HDU_A121,
			'type' => 'text',
			'data' => 'str',
			'writeParms' => [
				'size' => 'block-level',   
				'maxlength' => 100,
			],
			'help' => HDU_A342,
		 
		],

		// Include PDF with Email (Yes/No radio)
		'hduprefs_mailpdf' => [
			'title' => HDU_A202,
			'type' => 'boolean',
			'data' => 'int',
			'help' => HDU_A331,
			'writeParms' => [
				'inline' => true,
				'label' => [1 => HDU_A28, 0 => HDU_A29],
				 
			]
		],

		// Email subject to user on new ticket
		'hduprefs_usersubject' => [
			'title' => HDU_A118,
			'type' => 'text',
			'data' => 'str',
			'writeParms' => [
				'size' => 'block-level',
				'maxlength' => 100,
			],
			'help' => HDU_A343,
	 
		],

		// Email subject to helpdesk on new ticket
		'hduprefs_helpdesksubject' => [
			'title' => HDU_A120,
			'type' => 'text',
			'data' => 'str',
			'writeParms' => [
				'size' => 'block-level',
				'maxlength' => 100,
			],
			'help' => HDU_A344,
		 
		],

		// Email subject to user on ticket update
		'hduprefs_userupsubject' => [
			'title' => HDU_A137,
			'type' => 'text',
			'data' => 'str',
			'writeParms' => [
				'size' => 'block-level',
				'maxlength' => 100,
			],
			'help' => HDU_A345,
		 
		],

		// Email subject to helpdesk on ticket update
		'hduprefs_helpupsubject' => [
			'title' => HDU_A139,
			'type' => 'text',
			'data' => 'str',
			'writeParms' => [
				'size' => 'block-level',
				'maxlength' => 100,
			],
			'help' => HDU_A346,
	 
		],

		// Message content to user (new ticket)
		'hduprefs_usertext' => [
			'title' => HDU_A122,
			'type' => 'textarea',
			'data' => 'str',
			'help' => HDU_A347,
			'writeParms' => ['rows' => 4, 'cols' => 50],
		 
		],

		// Message content to helpdesk (new ticket)
		'hduprefs_helpdesktext' => [
			'title' => HDU_A124,
			'type' => 'textarea',
			'data' => 'str',
			'help' => HDU_A348,
			'writeParms' => ['rows' => 4, 'cols' => 50],
		 
		],

		// Message content to user (ticket update)
		'hduprefs_updateuser' => [
			'title' => HDU_A125,
			'type' => 'textarea',
			'data' => 'str',
			'help' => HDU_A349,
			'writeParms' => ['rows' => 4, 'cols' => 50],
			 
		],

		// Message content to helpdesk (ticket update)
		'hduprefs_updatehelpdesk' => [
			'title' => HDU_A127,
			'type' => 'textarea',
			'data' => 'str',
			'help' => HDU_A350,
			'writeParms' => ['rows' => 4, 'cols' => 50],
			 
		],

	);
}

class helpdesk_colors_ui extends e_admin_ui
{

	protected $pluginTitle		= HDU_A2;
	protected $pluginName		= HELPDESK_FOLDER;

	protected $prefs = array(
		'hduprefs_p1col' => [
			'title' => HDU_A37,
			'type' => 'text',
			'data' => 'str',
		],
		'hduprefs_p2col' => [
			'title' => HDU_A38,
			'type' => 'text',
			'data' => 'str'
		],
		'hduprefs_p3col' => [
			'title' => HDU_A39,
			'type' => 'text',
			'data' => 'str',

		],
		'hduprefs_p4col' => [
			'title' => HDU_A40,
			'type' => 'text',
			'data' => 'str',
	
		],
		'hduprefs_p5col' => [
			'title' => HDU_A41,
			'type' => 'text',
			'data' => 'str',
	
		],

	);

	function init() {

		$this->prefs['hduprefs_p1col']['writeParms']['pre'] = '<div class="col-md-2 ecp input-group colorpicker-component colorpicker-element">';
		$this->prefs['hduprefs_p2col']['writeParms']['pre'] = '<div class="col-md-2 ecp input-group colorpicker-component colorpicker-element">';
		$this->prefs['hduprefs_p3col']['writeParms']['pre'] = '<div class="col-md-2 ecp input-group colorpicker-component colorpicker-element">';
		$this->prefs['hduprefs_p4col']['writeParms']['pre'] = '<div class="col-md-2 ecp input-group colorpicker-component colorpicker-element">';
		$this->prefs['hduprefs_p5col']['writeParms']['pre'] = '<div class="col-md-2 ecp input-group colorpicker-component colorpicker-element">';

		$this->prefs['hduprefs_p1col']['writeParms']['post'] = '<span class="input-group-addon"><i></i></span></div>';
		$this->prefs['hduprefs_p2col']['writeParms']['post'] = '<span class="input-group-addon"><i></i></span></div>';
		$this->prefs['hduprefs_p3col']['writeParms']['post'] = '<span class="input-group-addon"><i></i></span></div>';
		$this->prefs['hduprefs_p4col']['writeParms']['post'] = '<span class="input-group-addon"><i></i></span></div>';
		$this->prefs['hduprefs_p5col']['writeParms']['post'] = '<span class="input-group-addon"><i></i></span></div>';

		$this->prefs['hduprefs_p1col']['writeParms']['default'] = '#00CC00';
		$this->prefs['hduprefs_p2col']['writeParms']['default'] = '#99CC00';
		$this->prefs['hduprefs_p3col']['writeParms']['default'] = '#FFFF33';
		$this->prefs['hduprefs_p4col']['writeParms']['default'] = '#FF9933';
		$this->prefs['hduprefs_p5col']['writeParms']['default'] = '#FF0000';

	}

		// left-panel help menu area. (replaces e_help.php used in old plugins)
		public function renderHelp()
		{
			$caption = LAN_HELP;
			$text = 'Colors rendering example';
			//			require_once(e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
			//			$helpdesk_obj = new helpdesk;
			//			$text .= $helpdesk_obj->display_priority();
			//e107::lan("helpdesk", true, true);  //fix me   no needed
			//e107::lan("helpdesk", false, true); //fix me   no needed
			$HDU_LISTTICKETS = e107::getTemplate('helpdesk', 'helpdesk');
			$hdu_shortcodes = e107::getScBatch('list', 'helpdesk');
			$text .= e107::getParser()->parseTemplate($HDU_LISTTICKETS["priority"], true, $hdu_shortcodes);

			return array('caption' => $caption, 'text' => $text);
		}
}

class hhelpdesk_prefs_form_ui extends e_admin_form_ui
{
}


new helpdesk_adminArea();

require_once(e_ADMIN . "auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN . "footer.php");
exit;

 