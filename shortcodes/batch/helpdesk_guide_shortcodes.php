<?php
/**
 * Helpdesk plugin — Admin Guide shortcodes (Fase 3b, capa 4).
 *
 * All `sc_helpdesk_guide_*` methods resolve via __call() magic to the
 * matching `LAN_PLUGIN_HELPDESK_GUIDE_*` constant defined in
 * `languages/<Lang>/<Lang>_admin_help.php`.
 *
 * The template `helpdesk_guide_template.php` references tokens like
 * `{HELPDESK_GUIDE_TAB0_HEADING}`, which e107 parseTemplate() maps to
 * `sc_helpdesk_guide_tab0_heading()`, caught by __call() below and
 * returned as `LAN_PLUGIN_HELPDESK_GUIDE_TAB0_HEADING`.
 *
 * Add a real method here only when you need logic (counter, dynamic
 * link, per-user text, etc.). Currently the guide is pure LAN.
 */
if (!defined('e107_INIT')) { exit; }

class helpdesk_guide_shortcodes extends e_shortcode
{
	/**
	 * Magic proxy: sc_helpdesk_guide_foo() -> LAN_PLUGIN_HELPDESK_GUIDE_FOO.
	 *
	 * @param string $name  method invoked (e.g. `sc_helpdesk_guide_tab0_heading`)
	 * @param array  $args  unused
	 * @return string  LAN value, or empty string if constant undefined.
	 */
	public function __call($name, $args)
	{
		// Strip the leading `sc_` that parseTemplate adds.
		if (strpos($name, 'sc_helpdesk_guide_') !== 0)
		{
			return '';
		}
		$key   = substr($name, 3);              // helpdesk_guide_tab0_heading
		$const = 'LAN_PLUGIN_' . strtoupper($key);
		return defined($const) ? constant($const) : '';
	}
}
