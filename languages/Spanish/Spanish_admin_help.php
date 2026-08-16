<?php
/**
 * Helpdesk plugin — Cadenas en español para la pestaña Guía de usuario (Fase 3b).
 */
if (!defined('e107_INIT')) { exit; }

// ---- Títulos de las pestañas ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_TITLE', 'Introducción');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_TITLE', 'Roles y permisos');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_TITLE', 'Ciclo del ticket');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_TITLE', 'Categorías');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_TITLE', 'Resoluciones');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TITLE', 'Notificaciones');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_TITLE', 'Preguntas frecuentes');

// ---- Pestaña 0: Introducción ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_HEADING', 'Qué hace este plugin');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_LEAD', 'Un sistema de tickets / mesa de ayuda ligero integrado con tu sitio e107.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_BODY', 'Los miembros abren tickets, un equipo técnico los clasifica y resuelve, y el plugin registra cada paso (comentarios, cambios de estado, notificaciones) para auditoría. Todos los permisos se controlan mediante clases de usuario de e107.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_TIP', 'Consejo: antes de poner el plugin en producción, define al menos una Categoría y una Resolución — los tickets nuevos necesitan categoría y para cerrar uno hace falta una resolución.');

// ---- Pestaña 1: Roles ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_HEADING', 'Quién puede hacer qué');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_INTRO', 'El acceso se otorga mediante clases de usuario de e107 configuradas en las preferencias del plugin. Cada visitante recibe exactamente el rol que sus clases permiten.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_ROLE', 'Rol');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_PREF', 'Preferencia / columna');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_CAN', 'Qué puede hacer');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_SUPER', 'Supervisor');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_SUPER_CAN', 'Ve todos los tickets, recibe notificaciones al crear o actualizar, puede reasignar o cerrar forzosamente.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_TECH', 'Técnico');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_TECH_CAN', 'Ve los tickets de las mesas cuya clase coincida. Puede añadir actualizaciones, cambiar el estado y elegir resolución.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_POST', 'Publicador');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_POST_CAN', 'Puede abrir tickets nuevos y comentar sobre los suyos.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_READ', 'Lector');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_READ_CAN', 'Puede ver los tickets propios; sin edición.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_SECURITY_NOTE', 'Seguridad: dejar cualquier clase en Público (0) se considera un error — el plugin caerá a un valor seguro (Miembros / Nadie). Asigna siempre una clase real a Publicador y Supervisor.');

// ---- Pestaña 2: Ciclo ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_HEADING', 'Ciclo de vida de un ticket');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP1', 'Un miembro abre un ticket, elige categoría y prioridad.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP2', 'El plugin lo asigna a la mesa dueña de la categoría, lo marca <em>Abierto</em> y avisa al buzón y a los técnicos.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP3', 'Un técnico lo toma, lo pasa a <em>En curso</em> y añade un comentario; se avisa al autor.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP4', 'El autor puede seguir comentando hasta que el técnico lo pase a <em>Esperando autor</em> o <em>Resuelto</em>.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP5', 'Al elegir una resolución el ticket pasa a <em>Cerrado</em>. Sigue consultable pero de sólo lectura.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP6', 'Los supervisores pueden reabrir un ticket cerrado quitándole la resolución.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_AUTOCLOSE', 'Auto-cierre: si está configurado, los tickets resueltos pasan a Cerrado tras N días sin actividad.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_ESCALATE', 'Escalado: la prioridad puede subirse en cualquier momento. Los supervisores siempre reciben aviso al cambiar la prioridad.');

// ---- Pestaña 3: Categorías ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_HEADING', 'Gestión de categorías');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_INTRO', 'Las categorías describen <em>de qué</em> trata un ticket (p. ej. "Facturación", "Error de la web", "Consulta general"). Cada ticket pertenece a exactamente una categoría.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_AUTOASSIGN', 'Cada categoría apunta a una mesa. Al crearse el ticket, el plugin lo asigna automáticamente a esa mesa, que define qué clase de técnico puede trabajarlo.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_LINK', 'Edita las categorías desde la pestaña <strong>Categorías</strong> del menú de la izquierda.');

// ---- Pestaña 4: Resoluciones ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_HEADING', 'Gestión de resoluciones');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_INTRO', 'Las resoluciones describen <em>cómo</em> terminó un ticket (p. ej. "Resuelto", "Duplicado", "No se solucionará", "Cancelado por el usuario").');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_CLOSING', 'Un ticket no puede cerrarse sin elegir una resolución; así los informes son limpios y las estadísticas por resolución son útiles.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_LINK', 'Edita la lista en la pestaña <strong>Resoluciones</strong> del menú de la izquierda.');

// ---- Pestaña 5: Notificaciones ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_HEADING', 'Notificaciones');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_INTRO', 'Por defecto hay tres canales de notificación:');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_USER', 'El autor: recibe aviso al actualizarse el ticket, al añadir un comentario o al cerrarse.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_HELPDESK', 'El buzón de la mesa: recibe todos los tickets asignados a ella.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TECH', 'Técnicos: reciben copia cuando llega un ticket a su mesa.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_PMNOTE', 'Si el plugin de Mensajes Privados está instalado, las notificaciones pueden enviarse como MP internos en lugar de email.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TEMPLATES', 'Puedes personalizar cada mensaje desde la pestaña <strong>Correo</strong>.');

// ---- Pestaña 6: FAQ ----
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_HEADING', 'Preguntas frecuentes');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q1', '¿Por qué un técnico ve tickets que no le corresponden?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A1', 'Revisa <code>hdudesk_class</code> de la mesa: si está en Todos / Público, cualquier miembro de la clase publicadora los verá. Asigna una clase técnica real.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q2', '¿Por qué los miembros no reciben notificaciones por email?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A2', 'Comprueba la configuración de correo del sitio, después que las preferencias "Notificar al crear/actualizar" estén activas y que la dirección del buzón sea válida.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q3', '¿Puedo exportar tickets?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A3', 'Sí: desde la vista pública del ticket usa el botón "PDF" (basado en TCPDF). La exportación CSV está en el roadmap.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q4', '¿Cómo actualizo el plugin?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A4', 'Copia los archivos nuevos sobre la carpeta del plugin y ejecuta la actualización desde el <em>Gestor de plugins</em>. Las migraciones de tablas corren idempotentemente en <code>helpdesk_setup.php::upgrade_post()</code>.');
