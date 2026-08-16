<?php
/**
 * Helpdesk plugin — Admin About template (Fase 3b, capa 2).
 *
 * Only HTML + shortcode tokens. All strings + dynamic values (version,
 * date, repo link) come from `helpdesk_about_shortcodes.php`.
 */
if (!defined('e107_INIT')) { exit; }

if (!isset($HELPDESK_ABOUT_TEMPLATE)) { $HELPDESK_ABOUT_TEMPLATE = array(); }

$HELPDESK_ABOUT_TEMPLATE['main'] = <<<HTML
<div class="hdu-about">
	<div class="row">
		<div class="col-md-8">
			<h3>{HELPDESK_ABOUT_TITLE}</h3>
			<p class="lead">{HELPDESK_ABOUT_TAGLINE}</p>
			<p>{HELPDESK_ABOUT_DESCRIPTION}</p>

			<hr />

			<h5>{HELPDESK_ABOUT_HEADING_CREDITS}</h5>
			<ul class="list-unstyled">
				<li><strong>{HELPDESK_ABOUT_LABEL_AUTHOR}:</strong> {HELPDESK_ABOUT_AUTHOR}</li>
				<li><strong>{HELPDESK_ABOUT_LABEL_MAINTAINER}:</strong> {HELPDESK_ABOUT_MAINTAINER}</li>
				<li><strong>{HELPDESK_ABOUT_LABEL_LICENSE}:</strong> {HELPDESK_ABOUT_LICENSE}</li>
			</ul>

			<hr />

			<h5>{HELPDESK_ABOUT_HEADING_HIGHLIGHTS}</h5>
			<p>{HELPDESK_ABOUT_HIGHLIGHTS_INTRO}</p>
			<ul>
				<li>{HELPDESK_ABOUT_HIGHLIGHT_1}</li>
				<li>{HELPDESK_ABOUT_HIGHLIGHT_2}</li>
				<li>{HELPDESK_ABOUT_HIGHLIGHT_3}</li>
				<li>{HELPDESK_ABOUT_HIGHLIGHT_4}</li>
			</ul>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">{HELPDESK_ABOUT_HEADING_VERSION}</h5>
					<p class="mb-1"><strong>{HELPDESK_ABOUT_LABEL_VERSION}:</strong> <code>{HELPDESK_ABOUT_VERSION}</code></p>
					<p class="mb-1"><strong>{HELPDESK_ABOUT_LABEL_DATE}:</strong> {HELPDESK_ABOUT_DATE}</p>
					<p class="mb-1"><strong>{HELPDESK_ABOUT_LABEL_PHP}:</strong> {HELPDESK_ABOUT_PHP_MIN}+</p>
					<p class="mb-0"><strong>{HELPDESK_ABOUT_LABEL_E107}:</strong> {HELPDESK_ABOUT_E107_MIN}+</p>
				</div>
			</div>

			<div class="card mt-3">
				<div class="card-body">
					<h5 class="card-title">{HELPDESK_ABOUT_HEADING_LINKS}</h5>
					<p class="mb-1">{HELPDESK_ABOUT_LINK_REPO}</p>
					<p class="mb-1">{HELPDESK_ABOUT_LINK_ISSUES}</p>
					<p class="mb-0">{HELPDESK_ABOUT_LINK_E107}</p>
				</div>
			</div>
		</div>
	</div>
</div>
HTML;
