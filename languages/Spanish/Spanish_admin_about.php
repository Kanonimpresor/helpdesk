<?php
/**
 * Helpdesk plugin — Cadenas en español para la pestaña Acerca de (Fase 3b).
 */
if (!defined('e107_INIT')) { exit; }

define('LAN_PLUGIN_HELPDESK_ABOUT_TITLE', 'Father Barry Helpdesk');
define('LAN_PLUGIN_HELPDESK_ABOUT_TAGLINE', 'Un sistema de tickets ligero para e107 CMS.');
define('LAN_PLUGIN_HELPDESK_ABOUT_DESCRIPTION', 'Este plugin permite a los miembros abrir, seguir y resolver tickets de soporte desde tu sitio e107. Se integra con las clases de usuario, la cola de correo, los Mensajes Privados y la UI de administración, e incluye una vista PDF imprimible de cada ticket.');

// Créditos
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_CREDITS', 'Créditos');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_AUTHOR', 'Autor original');
define('LAN_PLUGIN_HELPDESK_ABOUT_AUTHOR', 'Barry Keal');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_MAINTAINER', 'Mantenedor actual');
define('LAN_PLUGIN_HELPDESK_ABOUT_MAINTAINER', 'Kanonimpresor');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_LICENSE', 'Licencia');
define('LAN_PLUGIN_HELPDESK_ABOUT_LICENSE', 'GPL v3 o posterior');

// Novedades
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_HIGHLIGHTS', 'Novedades de esta línea');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHTS_INTRO', 'Lo que cambió en la línea moderna de mantenimiento:');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_1', 'Compatibilidad con PHP 8.x en todos los puntos de entrada y CRUDs de administración.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_2', 'Refactor de sanitización SQL + renombrado de la tabla de tickets a <code>hdu_tickets</code> con una ruta de upgrade idempotente.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_3', 'Autorización endurecida: roles por defecto fail-closed, comprobaciones de propiedad por acción, redirección anónima al login.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_4', 'UI de administración migrada por completo a <code>e_admin_ui</code>, con Guía de usuario y página Acerca de nativas (ésta).');

// Versión
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_VERSION', 'Información de la versión');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_VERSION', 'Versión');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_DATE', 'Publicada');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_PHP', 'PHP');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_E107', 'e107');

// Enlaces
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_LINKS', 'Enlaces');
define('LAN_PLUGIN_HELPDESK_ABOUT_LINK_ISSUES_TEXT', 'Reportar un problema');
