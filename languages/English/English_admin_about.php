<?php
/**
 * Helpdesk plugin — English strings for the admin About tab (Fase 3b).
 *
 * Lazy-loaded from `helpdesk_about_ui::renderPage()`. Static strings
 * are resolved by `helpdesk_about_shortcodes::__call()`; dynamic
 * values (version, date, links) are provided by real methods on the
 * shortcode class.
 */
if (!defined('e107_INIT')) { exit; }

define('LAN_PLUGIN_HELPDESK_ABOUT_TITLE', 'Father Barry Helpdesk');
define('LAN_PLUGIN_HELPDESK_ABOUT_TAGLINE', 'A lightweight ticketing system for e107 CMS.');
define('LAN_PLUGIN_HELPDESK_ABOUT_DESCRIPTION', 'This plugin lets members open, track and resolve support tickets through your e107 site. It integrates with e107 user classes, mail queue, Private Messages and admin UI, and ships with a printable PDF view of every ticket.');

// Credits card
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_CREDITS', 'Credits');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_AUTHOR', 'Original author');
define('LAN_PLUGIN_HELPDESK_ABOUT_AUTHOR', 'Barry Keal');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_MAINTAINER', 'Current maintainer');
define('LAN_PLUGIN_HELPDESK_ABOUT_MAINTAINER', 'Kanonimpresor');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_LICENSE', 'License');
define('LAN_PLUGIN_HELPDESK_ABOUT_LICENSE', 'GPL v3 or later');

// Highlights
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_HIGHLIGHTS', 'Highlights of this release');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHTS_INTRO', 'What changed in the modern maintenance line:');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_1', 'PHP 8.x compatibility across all entry points and admin CRUDs.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_2', 'SQL sanitisation refactor + rename of the ticket table to <code>hdu_tickets</code> with an idempotent upgrade path.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_3', 'Authorisation hardened: fail-closed role defaults, per-action ownership checks, anonymous redirect to login.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_4', 'Full admin UI migrated to <code>e_admin_ui</code>, with a native User Guide and About page (this one).');

// Version card
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_VERSION', 'Build info');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_VERSION', 'Version');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_DATE', 'Released');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_PHP', 'PHP');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_E107', 'e107');

// Links card
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_LINKS', 'Links');
define('LAN_PLUGIN_HELPDESK_ABOUT_LINK_ISSUES_TEXT', 'Report an issue');
