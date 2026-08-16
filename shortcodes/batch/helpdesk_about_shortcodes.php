<?php
/**
 * Helpdesk plugin — Admin About shortcodes (Fase 3b, capa 4).
 *
 * Mostly LAN proxies via __call() magic (same pattern as
 * helpdesk_guide_shortcodes.php). Real methods override for dynamic
 * values that come from `plugin.xml` metadata (version, date) or from
 * hard-coded infrastructure links (repo, e107 project).
 */
if (!defined('e107_INIT')) { exit; }

class helpdesk_about_shortcodes extends e_shortcode
{
	/** Cached plugin.xml metadata. */
	private ?array $meta = null;

	/** Lazy loader for plugin.xml — one filesystem read per request. */
	private function meta(): array
	{
		if ($this->meta !== null) { return $this->meta; }
		$this->meta = ['version' => '', 'date' => ''];
		$xml = e_PLUGIN . HELPDESK_FOLDER . '/plugin.xml';
		if (is_readable($xml))
		{
			$parser = e107::getXml();
			$data   = $parser->loadXMLfile($xml, true);
			if (!empty($data['@attributes']))
			{
				$this->meta['version'] = (string) ($data['@attributes']['version'] ?? '');
				$this->meta['date']    = (string) ($data['@attributes']['date']    ?? '');
			}
		}
		return $this->meta;
	}

	// ---------------- dynamic values ----------------

	public function sc_helpdesk_about_version(): string
	{
		$m = $this->meta();
		return $m['version'] !== '' ? $m['version'] : 'dev';
	}

	public function sc_helpdesk_about_date(): string
	{
		$m = $this->meta();
		return $m['date'] !== '' ? $m['date'] : '—';
	}

	public function sc_helpdesk_about_php_min(): string
	{
		return '8.0';
	}

	public function sc_helpdesk_about_e107_min(): string
	{
		return '2.3';
	}

	public function sc_helpdesk_about_link_repo(): string
	{
		$url = 'https://github.com/Kanonimpresor/helpdesk';
		return '<a href="' . $url . '" target="_blank" rel="noopener">github.com/Kanonimpresor/helpdesk</a>';
	}

	public function sc_helpdesk_about_link_issues(): string
	{
		$url = 'https://github.com/Kanonimpresor/helpdesk/issues';
		return '<a href="' . $url . '" target="_blank" rel="noopener">' . (defined('LAN_PLUGIN_HELPDESK_ABOUT_LINK_ISSUES_TEXT') ? LAN_PLUGIN_HELPDESK_ABOUT_LINK_ISSUES_TEXT : 'Report an issue') . '</a>';
	}

	public function sc_helpdesk_about_link_e107(): string
	{
		return '<a href="https://e107.org" target="_blank" rel="noopener">e107.org</a>';
	}

	// ---------------- LAN proxy fallback ----------------

	public function __call($name, $args)
	{
		if (strpos($name, 'sc_helpdesk_about_') !== 0)
		{
			return '';
		}
		$key   = substr($name, 3);              // helpdesk_about_title
		$const = 'LAN_PLUGIN_' . strtoupper($key);
		return defined($const) ? constant($const) : '';
	}
}
