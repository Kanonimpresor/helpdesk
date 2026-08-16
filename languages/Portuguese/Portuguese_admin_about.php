<?php
/**
 * Helpdesk plugin — Cadeias em português para o separador Sobre (Fase 3b).
 */
if (!defined('e107_INIT')) { exit; }

define('LAN_PLUGIN_HELPDESK_ABOUT_TITLE', 'Father Barry Helpdesk');
define('LAN_PLUGIN_HELPDESK_ABOUT_TAGLINE', 'Um sistema de tickets leve para o e107 CMS.');
define('LAN_PLUGIN_HELPDESK_ABOUT_DESCRIPTION', 'Este plugin permite aos membros abrir, acompanhar e resolver tickets de suporte a partir do seu site e107. Integra-se com as classes de utilizador, a fila de correio, as Mensagens Privadas e a UI de administração, e inclui uma vista PDF imprimível de cada ticket.');

// Créditos
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_CREDITS', 'Créditos');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_AUTHOR', 'Autor original');
define('LAN_PLUGIN_HELPDESK_ABOUT_AUTHOR', 'Barry Keal');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_MAINTAINER', 'Manutenção actual');
define('LAN_PLUGIN_HELPDESK_ABOUT_MAINTAINER', 'Kanonimpresor');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_LICENSE', 'Licença');
define('LAN_PLUGIN_HELPDESK_ABOUT_LICENSE', 'GPL v3 ou posterior');

// Novidades
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_HIGHLIGHTS', 'Novidades desta linha');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHTS_INTRO', 'O que mudou na linha moderna de manutenção:');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_1', 'Compatibilidade com PHP 8.x em todos os pontos de entrada e CRUDs.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_2', 'Refactor de sanitização SQL + renomeação da tabela de tickets para <code>hdu_tickets</code> com um caminho de upgrade idempotente.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_3', 'Autorização endurecida: papéis por omissão fail-closed, verificações de propriedade por acção, redireccionamento anónimo para o login.');
define('LAN_PLUGIN_HELPDESK_ABOUT_HIGHLIGHT_4', 'UI de administração totalmente migrada para <code>e_admin_ui</code>, com Guia e página Sobre nativas (esta).');

// Versão
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_VERSION', 'Informação da versão');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_VERSION', 'Versão');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_DATE', 'Publicada');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_PHP', 'PHP');
define('LAN_PLUGIN_HELPDESK_ABOUT_LABEL_E107', 'e107');

// Ligações
define('LAN_PLUGIN_HELPDESK_ABOUT_HEADING_LINKS', 'Ligações');
define('LAN_PLUGIN_HELPDESK_ABOUT_LINK_ISSUES_TEXT', 'Reportar um problema');
