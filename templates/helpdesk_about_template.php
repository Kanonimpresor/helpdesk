<?php
/**
 * Helpdesk plugin - Admin About page template (Fase 3b, capa 2).
 * Panel-based Bootstrap 3 markup mirroring the booking plugin.
 * Tokens are resolved by helpdesk_prefs_ui::hdu_expandTokens().
 */
if (!defined('e107_INIT')) { exit; }
if (!isset($HELPDESK_ABOUT_TEMPLATE)) { $HELPDESK_ABOUT_TEMPLATE = array(); }
$HELPDESK_ABOUT_TEMPLATE['main'] = <<<'HTML'
<!-- 1. Header card -->
<div class="panel panel-primary">
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-8">
				<h3 style="margin-top:0">
					<i class="fa fa-life-ring"></i>
					{HELPDESK_ABOUT_NAME}
					<span class="label label-primary" style="vertical-align:middle">v{HELPDESK_ABOUT_VERSION}</span>
				</h3>
				<p class="text-muted" style="margin-bottom:0">{LAN_PLUGIN_HELPDESK_ABOUT_TAGLINE}</p>
			</div>
			<div class="col-sm-4 text-right">
				<p class="text-muted small" style="margin:0">
					<i class="fa fa-calendar"></i> {LAN_PLUGIN_HELPDESK_ABOUT_LABEL_DATE}: <strong>{HELPDESK_ABOUT_DATE}</strong><br>
					<i class="fa fa-cube"></i> e107 v{HELPDESK_ABOUT_E107_MIN}+ / PHP {HELPDESK_ABOUT_PHP_MIN}+
				</p>
			</div>
		</div>
	</div>
</div>

<!-- 2. Metadata grid -->
<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-id-card"></i> {LAN_PLUGIN_HELPDESK_ABOUT_HEADING_CREDITS}</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6" style="margin-bottom:15px">
				<div class="media">
					<div class="media-left media-middle">
						<span class="text-primary" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="media-body">
						<small class="text-muted text-uppercase">{LAN_PLUGIN_HELPDESK_ABOUT_LABEL_AUTHOR}</small><br>
						<strong>{LAN_PLUGIN_HELPDESK_ABOUT_AUTHOR}</strong>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="margin-bottom:15px">
				<div class="media">
					<div class="media-left media-middle">
						<span class="text-primary" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
							<i class="fa fa-wrench"></i>
						</span>
					</div>
					<div class="media-body">
						<small class="text-muted text-uppercase">{LAN_PLUGIN_HELPDESK_ABOUT_LABEL_MAINTAINER}</small><br>
						<strong>{LAN_PLUGIN_HELPDESK_ABOUT_MAINTAINER}</strong>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="margin-bottom:15px">
				<div class="media">
					<div class="media-left media-middle">
						<span class="text-primary" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
							<i class="fa fa-code-fork"></i>
						</span>
					</div>
					<div class="media-body">
						<small class="text-muted text-uppercase">{LAN_PLUGIN_HELPDESK_ABOUT_HEADING_LINKS}</small><br>
						<strong>{HELPDESK_ABOUT_LINK_REPO}</strong>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="margin-bottom:15px">
				<div class="media">
					<div class="media-left media-middle">
						<span class="text-primary" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
							<i class="fa fa-balance-scale"></i>
						</span>
					</div>
					<div class="media-body">
						<small class="text-muted text-uppercase">{LAN_PLUGIN_HELPDESK_ABOUT_LABEL_LICENSE}</small><br>
						<strong>{LAN_PLUGIN_HELPDESK_ABOUT_LICENSE}</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 3. Description card -->
<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-info-circle"></i> {LAN_PLUGIN_HELPDESK_ABOUT_TITLE}</div>
	<div class="panel-body">
		<p>{LAN_PLUGIN_HELPDESK_ABOUT_DESCRIPTION}</p>
		<hr>
		<h5><i class="fa fa-star"></i> {LAN_PLUGIN_HELPDESK_ABOUT_HEADING_HIGHLIGHTS}</h5>
		<p class="text-muted">{LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHTS_INTRO}</p>
		<ul>
			<li>{LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_1}</li>
			<li>{LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_2}</li>
			<li>{LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_3}</li>
			<li>{LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_4}</li>
		</ul>
	</div>
</div>

<!-- 4. Support card -->
<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-life-ring"></i> {LAN_PLUGIN_HELPDESK_ABOUT_HEADING_LINKS}</div>
	<div class="panel-body">
		<p>
			<a href="{HELPDESK_ABOUT_URL_REPO}" target="_blank" rel="noopener" class="btn btn-info" style="margin-right:6px;margin-bottom:6px"><i class="fa fa-book"></i> Documentation</a>
			<a href="{HELPDESK_ABOUT_URL_ISSUES}" target="_blank" rel="noopener" class="btn btn-warning" style="margin-right:6px;margin-bottom:6px"><i class="fa fa-bug"></i> {LAN_PLUGIN_HELPDESK_ABOUT_LINK_ISSUES_TEXT}</a>
			<a href="{HELPDESK_ABOUT_URL_REPO}" target="_blank" rel="noopener" class="btn btn-default" style="margin-right:6px;margin-bottom:6px"><i class="fa fa-github"></i> GitHub repository</a>
			<a href="https://e107.org" target="_blank" rel="noopener" class="btn btn-default" style="margin-right:6px;margin-bottom:6px"><i class="fa fa-globe"></i> e107.org</a>
		</p>
	</div>
</div>

<!-- 5. Footer -->
<div class="text-center text-muted small" style="margin-top:20px;padding-top:10px;border-top:1px solid #eee">
	&copy; {HELPDESK_ABOUT_YEAR} {LAN_PLUGIN_HELPDESK_ABOUT_MAINTAINER} &middot; {LAN_PLUGIN_HELPDESK_ABOUT_LICENSE}
</div>
HTML;