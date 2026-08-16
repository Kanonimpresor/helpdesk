<?php
/**
 * Helpdesk plugin — Admin Guide template (Fase 3b, capa 2).
 *
 * Only HTML + shortcode tokens. All strings come from
 * `helpdesk_guide_shortcodes.php` (which lazy-loads
 * `languages/<lang>/<lang>_admin_help.php` via `__call()` magic).
 *
 * Bootstrap 5 nav-tabs. Seven sections mirror the ticket lifecycle
 * a new admin needs to learn:
 *   0. Overview
 *   1. Roles & permissions
 *   2. Ticket lifecycle
 *   3. Categories
 *   4. Resolutions
 *   5. Notifications
 *   6. FAQ / troubleshooting
 */
if (!defined('e107_INIT')) { exit; }

if (!isset($HELPDESK_GUIDE_TEMPLATE)) { $HELPDESK_GUIDE_TEMPLATE = array(); }

$HELPDESK_GUIDE_TEMPLATE['main'] = <<<HTML
<div class="hdu-guide">
	<ul class="nav nav-tabs" id="hduGuideTabs" role="tablist">
		<li class="nav-item active" role="presentation">
			<a class="nav-link active" data-toggle="tab" href="#hdu-guide-tab0" role="tab">{HELPDESK_GUIDE_TAB0_TITLE}</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" data-toggle="tab" href="#hdu-guide-tab1" role="tab">{HELPDESK_GUIDE_TAB1_TITLE}</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" data-toggle="tab" href="#hdu-guide-tab2" role="tab">{HELPDESK_GUIDE_TAB2_TITLE}</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" data-toggle="tab" href="#hdu-guide-tab3" role="tab">{HELPDESK_GUIDE_TAB3_TITLE}</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" data-toggle="tab" href="#hdu-guide-tab4" role="tab">{HELPDESK_GUIDE_TAB4_TITLE}</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" data-toggle="tab" href="#hdu-guide-tab5" role="tab">{HELPDESK_GUIDE_TAB5_TITLE}</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" data-toggle="tab" href="#hdu-guide-tab6" role="tab">{HELPDESK_GUIDE_TAB6_TITLE}</a>
		</li>
	</ul>

	<div class="tab-content" id="hduGuideTabsContent" style="padding-top:1rem;">

		<div class="tab-pane fade in active" id="hdu-guide-tab0" role="tabpanel">
			<h4>{HELPDESK_GUIDE_TAB0_HEADING}</h4>
			<p class="lead">{HELPDESK_GUIDE_TAB0_LEAD}</p>
			<p>{HELPDESK_GUIDE_TAB0_BODY}</p>
			<div class="alert alert-info">{HELPDESK_GUIDE_TAB0_TIP}</div>
		</div>

		<div class="tab-pane fade" id="hdu-guide-tab1" role="tabpanel">
			<h4>{HELPDESK_GUIDE_TAB1_HEADING}</h4>
			<p>{HELPDESK_GUIDE_TAB1_INTRO}</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>{HELPDESK_GUIDE_TAB1_COL_ROLE}</th>
						<th>{HELPDESK_GUIDE_TAB1_COL_PREF}</th>
						<th>{HELPDESK_GUIDE_TAB1_COL_CAN}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>{HELPDESK_GUIDE_TAB1_ROLE_SUPER}</th>
						<td><code>hduprefs_supervisorclass</code></td>
						<td>{HELPDESK_GUIDE_TAB1_ROLE_SUPER_CAN}</td>
					</tr>
					<tr>
						<th>{HELPDESK_GUIDE_TAB1_ROLE_TECH}</th>
						<td><code>hdu_helpdesk.hdudesk_class</code></td>
						<td>{HELPDESK_GUIDE_TAB1_ROLE_TECH_CAN}</td>
					</tr>
					<tr>
						<th>{HELPDESK_GUIDE_TAB1_ROLE_POST}</th>
						<td><code>hduprefs_postclass</code></td>
						<td>{HELPDESK_GUIDE_TAB1_ROLE_POST_CAN}</td>
					</tr>
					<tr>
						<th>{HELPDESK_GUIDE_TAB1_ROLE_READ}</th>
						<td><code>hduprefs_userclass</code></td>
						<td>{HELPDESK_GUIDE_TAB1_ROLE_READ_CAN}</td>
					</tr>
				</tbody>
			</table>
			<div class="alert alert-warning">{HELPDESK_GUIDE_TAB1_SECURITY_NOTE}</div>
		</div>

		<div class="tab-pane fade" id="hdu-guide-tab2" role="tabpanel">
			<h4>{HELPDESK_GUIDE_TAB2_HEADING}</h4>
			<ol>
				<li>{HELPDESK_GUIDE_TAB2_STEP1}</li>
				<li>{HELPDESK_GUIDE_TAB2_STEP2}</li>
				<li>{HELPDESK_GUIDE_TAB2_STEP3}</li>
				<li>{HELPDESK_GUIDE_TAB2_STEP4}</li>
				<li>{HELPDESK_GUIDE_TAB2_STEP5}</li>
				<li>{HELPDESK_GUIDE_TAB2_STEP6}</li>
			</ol>
			<p>{HELPDESK_GUIDE_TAB2_AUTOCLOSE}</p>
			<p>{HELPDESK_GUIDE_TAB2_ESCALATE}</p>
		</div>

		<div class="tab-pane fade" id="hdu-guide-tab3" role="tabpanel">
			<h4>{HELPDESK_GUIDE_TAB3_HEADING}</h4>
			<p>{HELPDESK_GUIDE_TAB3_INTRO}</p>
			<p>{HELPDESK_GUIDE_TAB3_AUTOASSIGN}</p>
			<p>{HELPDESK_GUIDE_TAB3_LINK}</p>
		</div>

		<div class="tab-pane fade" id="hdu-guide-tab4" role="tabpanel">
			<h4>{HELPDESK_GUIDE_TAB4_HEADING}</h4>
			<p>{HELPDESK_GUIDE_TAB4_INTRO}</p>
			<p>{HELPDESK_GUIDE_TAB4_CLOSING}</p>
			<p>{HELPDESK_GUIDE_TAB4_LINK}</p>
		</div>

		<div class="tab-pane fade" id="hdu-guide-tab5" role="tabpanel">
			<h4>{HELPDESK_GUIDE_TAB5_HEADING}</h4>
			<p>{HELPDESK_GUIDE_TAB5_INTRO}</p>
			<ul>
				<li>{HELPDESK_GUIDE_TAB5_USER}</li>
				<li>{HELPDESK_GUIDE_TAB5_HELPDESK}</li>
				<li>{HELPDESK_GUIDE_TAB5_TECH}</li>
			</ul>
			<div class="alert alert-info">{HELPDESK_GUIDE_TAB5_PMNOTE}</div>
			<p>{HELPDESK_GUIDE_TAB5_TEMPLATES}</p>
		</div>

		<div class="tab-pane fade" id="hdu-guide-tab6" role="tabpanel">
			<h4>{HELPDESK_GUIDE_TAB6_HEADING}</h4>
			<dl>
				<dt>{HELPDESK_GUIDE_TAB6_Q1}</dt>
				<dd>{HELPDESK_GUIDE_TAB6_A1}</dd>
				<dt>{HELPDESK_GUIDE_TAB6_Q2}</dt>
				<dd>{HELPDESK_GUIDE_TAB6_A2}</dd>
				<dt>{HELPDESK_GUIDE_TAB6_Q3}</dt>
				<dd>{HELPDESK_GUIDE_TAB6_A3}</dd>
				<dt>{HELPDESK_GUIDE_TAB6_Q4}</dt>
				<dd>{HELPDESK_GUIDE_TAB6_A4}</dd>
			</dl>
		</div>

	</div>
</div>
HTML;
