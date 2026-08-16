<?php
/**
 * Helpdesk plugin — English strings for the admin User Guide tab (Fase 3b).
 *
 * Lazy-loaded from `helpdesk_guide_ui::renderPage()` via
 * `e107::lan('helpdesk', 'admin_help', true)`. Constants are resolved
 * by the `helpdesk_guide_shortcodes::__call()` magic proxy: each token
 * `{HELPDESK_GUIDE_FOO}` in `templates/helpdesk_guide_template.php`
 * maps to `LAN_PLUGIN_HELPDESK_GUIDE_FOO` here.
 */
if (!defined('e107_INIT')) { exit; }

// ---- Tab titles ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_TITLE', 'Overview');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_TITLE', 'Roles &amp; permissions');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_TITLE', 'Ticket lifecycle');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_TITLE', 'Categories');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_TITLE', 'Resolutions');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TITLE', 'Notifications');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_TITLE', 'FAQ');

// ---- Tab 0: Overview ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_HEADING', 'What this plugin does');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_LEAD', 'A lightweight helpdesk / ticketing system integrated with your e107 site.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_BODY', 'Members open tickets, a technician team classifies and resolves them, and the plugin keeps every step (comments, status changes, notifications) audit-friendly. All permissions are driven by e107 user classes.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_TIP', 'Tip: before rolling out the plugin, define at least one Category and one Resolution — new tickets require a category, and closing a ticket requires a resolution.');

// ---- Tab 1: Roles ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_HEADING', 'Who can do what');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_INTRO', 'Access is granted by e107 user classes configured in the plugin preferences. Every visitor is placed in exactly the role their user classes allow.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_ROLE', 'Role');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_PREF', 'Preference / column');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_CAN', 'What they can do');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_SUPER', 'Supervisor');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_SUPER_CAN', 'Sees every ticket, receives notifications when tickets are created or updated, can reassign or force-close.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_TECH', 'Technician');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_TECH_CAN', 'Sees tickets in helpdesks whose class matches. Can post updates, change status and pick a resolution.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_POST', 'Poster');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_POST_CAN', 'Can open new tickets and comment on their own.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_READ', 'Reader');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_READ_CAN', 'Can view tickets they own; no editing.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_SECURITY_NOTE', 'Security: leaving any class set to Public (0) is treated as a mistake — the plugin will fall back to a safe default (Members / Nobody). Always assign a real class to Poster and Supervisor.');

// ---- Tab 2: Lifecycle ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_HEADING', 'Lifecycle of a ticket');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP1', 'A member opens a ticket, picks a category and a priority.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP2', 'The plugin assigns the ticket to the helpdesk that owns the category, sets status to <em>Open</em> and notifies the helpdesk mailbox and technicians.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP3', 'A technician picks up the ticket, sets status to <em>In progress</em> and adds a comment; the reporter is notified.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP4', 'The reporter can reply with additional comments until the technician marks the ticket as <em>Waiting for reporter</em> or <em>Resolved</em>.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP5', 'When a resolution is picked the ticket transitions to <em>Closed</em>. It stays browsable but read-only.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP6', 'Supervisors can reopen a closed ticket by removing its resolution.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_AUTOCLOSE', 'Auto-close: if configured, resolved tickets are moved to Closed after N days without activity.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_ESCALATE', 'Escalation: priority can be bumped at any time. Supervisors always receive a notification when priority changes.');

// ---- Tab 3: Categories ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_HEADING', 'Managing categories');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_INTRO', 'Categories describe <em>what</em> a ticket is about (e.g. "Billing", "Website bug", "General question"). Every ticket must belong to exactly one category.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_AUTOASSIGN', 'Each category points at a helpdesk. When a ticket is created the plugin auto-assigns it to that helpdesk, which in turn defines which technician class can work on it.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_LINK', 'Edit categories from the <strong>Categories</strong> tab on the left menu.');

// ---- Tab 4: Resolutions ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_HEADING', 'Managing resolutions');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_INTRO', 'Resolutions describe <em>how</em> a ticket ended (e.g. "Fixed", "Duplicate", "Won\'t fix", "User cancelled").');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_CLOSING', 'A ticket cannot be marked Closed without picking a resolution; this keeps the reporting clean and enables per-resolution stats.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_LINK', 'Edit the list from the <strong>Resolutions</strong> tab on the left menu.');

// ---- Tab 5: Notifications ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_HEADING', 'Notifications');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_INTRO', 'Three notification channels are wired by default:');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_USER', 'The reporter: notified when the ticket is updated, when a comment is added or when it is closed.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_HELPDESK', 'The helpdesk mailbox: receives every new ticket assigned to it.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TECH', 'Technicians: get a copy when a ticket lands in their helpdesk.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_PMNOTE', 'If the Private Messages plugin is installed, notifications can also be delivered as internal PMs instead of email.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TEMPLATES', 'You can customise every message under the <strong>Mail</strong> tab.');

// ---- Tab 6: FAQ ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_HEADING', 'Frequent questions');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q1', 'Why does a technician see tickets that don\'t belong to them?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A1', 'Check the <code>hdudesk_class</code> of the helpdesk: if it is set to Everyone / Public, any member of the poster class can see those tickets. Assign a proper technician class.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q2', 'Why don\'t members receive email notifications?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A2', 'Verify the site email settings, then check that the "Notify on create / update" preferences are enabled and that the mailbox address is valid.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q3', 'Can I export tickets?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A3', 'Yes: from the front-end ticket view use the "PDF" button (TCPDF-based). CSV export is on the roadmap.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q4', 'How do I upgrade the plugin?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A4', 'Copy the new files over the plugin folder and run the plugin upgrade from <em>Plugin Manager</em>. Table migrations run idempotently in <code>helpdesk_setup.php::upgrade_post()</code>.');
