<?php

e107::lan("helpdesk", true, true );


class helpdesk_adminArea extends e_admin_dispatcher
{
	protected $modes = array(

		'main'	=> array(
			'controller' 	=> 'helpdesk_prefs_ui',
			'path' 			=> null,
			'ui' 			=> 'helpdesk_prefs_form_ui',
			'uipath' 		=> null
		),
		'mail'	=> array(
			'controller' 	=> 'helpdesk_mail_ui',
			'path' 			=> null,
			'ui' 			=> 'helpdesk_prefs_form_ui',
			'uipath' 		=> null
		),
		'colors'	=> array(
			'controller' 	=> 'helpdesk_colors_ui',
			'path' 			=> null,
			'ui' 			=> 'helpdesk_prefs_form_ui',
			'uipath' 		=> null
		),

		'desk'	=> array(
			'controller' 	=> 'hdu_helpdesk_ui',
			'path' 			=> null,
			'ui' 			=> 'hdu_helpdesk_form_ui',
			'uipath' 		=> null
		),
		'cat'	=> array(
			'controller' 	=> 'hdu_categories_ui',
			'path' 			=> null,
			'ui' 			=> 'hdu_categories_form_ui',
			'uipath' 		=> null
		),

		'res'	=> array(
			'controller' 	=> 'hdu_resolve_ui',
			'path' 			=> null,
			'ui' 			=> 'hdu_resolve_form_ui',
			'uipath' 		=> null
		),
		'fix'	=> array(
			'controller' 	=> 'hdu_fixes_ui',
			'path' 			=> null,
			'ui' 			=> 'hdu_fixes_form_ui',
			'uipath' 		=> null
		),
	);


	protected $adminMenu = array(

		'main/prefs'		=> array('caption' => HDU_A30, 'perm' => 'P', 'url' => "admin_config.php?mode=main&action=prefs"),

		'mail/prefs'		=> array('caption' => HDU_A106, 'perm' => 'P', 'url' => "admin_config.php?mode=mail&action=prefs"),

		'colors/prefs'		=> array('caption' => HDU_A34 , 'perm' => 'P', 'url' => "admin_config.php?mode=colors&action=prefs"),

		'desk/list'			=> array('caption' => HDU_A140, 'perm' => 'P', 'url' => "admin_desk.php?mode=desk&action=list"),
 
		'cat/list'			=> array('caption' => HDU_A31, 'perm' => 'P', 'url' => "admin_cat.php?mode=cat&action=list"),
 
		'res/list'			=> array('caption' => HDU_A43, 'perm' => 'P', 'url' => "admin_res.php?mode=res&action=list"),

		'fix/list'			=> array('caption' => HDU_A44, 'perm' => 'P', 'url' => "admin_fixes.php?mode=fix&action=list"),
	);

	protected $adminMenuAliases = array(
		'desk/edit'	=> 'desk/list'
	);

	protected $menuTitle = HDU_A33;

 
}
