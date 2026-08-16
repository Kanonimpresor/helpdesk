# Helpdesk — Developer Notes

> Última actualización: **2026-08-16** (rama de trabajo hacia v2.1.0).
>
> Este archivo es la **memoria arquitectónica** del plugin `helpdesk`. Los
> README explican *qué hace*; este documento explica *por qué está hecho como
> está*, qué decisiones se tomaron y en qué convenciones nos apoyamos.

Referencias obligatorias antes de contribuir:

- `GUIA_DESARROLLO_PLUGINS_E107.md` — guía canónica de plugins e107 (estructura,
  hooks `e_*.php`, patrones 4-capas, i18n, SEO).
- `MIGRATION_PLAN.md` — fases numeradas para modernizar el plugin.
- `CHANGELOG.md` — historia efectiva release por release.
- `docs/architecture/` — decisiones específicas (a poblar durante Fase 3).

---

## 1. Origen y estado

- **Autor original**: Father Barry (2004-2009), plugin `helpdesk` v1.x para
  e107 0.7 → 1.0.
- **Adoptado en este fork**: abril 2025, versión `plugin.xml` = `2.0` con
  `compatibility = 2.3`.
- **Estado actual (2026-08)**: funciona sobre e107 2.3.x + PHP 8.0+ tras el
  fix de dependencia y warnings (release `2.0.1`). El backend admin sigue
  siendo predominantemente **legacy** (formularios a mano, sin `e_admin_ui`).

## 2. Objetivos del rewrite (2.x → 2.4.x)

Cuatro ejes paralelos — **nunca mezclarlos en el mismo PR**:

1. **Compatibilidad PHP 8.x** limpia (sin warnings dinámicos, sin `var`,
   accesos defensivos a superglobales, sin `mysql_*`).
2. **Seguridad**: 100 % del SQL vía `e107::getDb()` con placeholders + CSRF en
   todo formulario que muta datos.
3. **Modernización de admin** a `e_admin_ui` con arrays `$fields` estándar
   (paginación / filtros / batch delete "gratis").
4. **Adopción del patrón de 4 capas** para User Guide + About descrito en
   `GUIA_DESARROLLO_PLUGINS_E107.md` §12. Objetivo: paridad documental con
   `sitedown_styles` y `booking`, para que un contribuidor que salte entre los
   3 repos encuentre la misma estructura.

## 3. Layout objetivo

```
helpdesk/
├── plugin.xml                   ← manifiesto (prefs, dependencies, adminLinks)
├── helpdesk.php                 ← front controller público
├── helpdesk_defines.php         ← constantes (HELPDESK_FOLDER, paths)
├── helpdesk_sql.php             ← DDL (usado por plugin manager en install)
├── helpdesk_menu.php            ← menú lateral público
├── helpdesk_setup.php           ← install / uninstall / upgrade hooks (NUEVO Fase 1)
│
├── admin/
│   ├── admin_config.php         ← e_admin_ui (settings + About + Guide)
│   ├── admin_cat.php            ← CRUD categorías → migrar a e_admin_ui (Fase 3)
│   ├── admin_desk.php           ← CRUD helpdesks
│   ├── admin_res.php            ← CRUD resoluciones/estados
│   ├── admin_fixes.php          ← CRUD fixes / costes
│   └── left_menu.php            ← sidebar admin
│
├── includes/
│   ├── helpdesk_class.php       ← lógica de dominio (~1854 LOC, refactor Fase 1)
│   ├── helpdesk.js
│   └── plain/                   ← tooltip popups (CSS + JS)
│
├── templates/
│   ├── helpdesk_template.php            ← lista tickets (a portar a BS5)
│   ├── helpdesk_show_template.php       ← detalle ticket
│   ├── helpdesk_print_template.php      ← versión imprimir
│   ├── helpdesk_delete_template.php     ← confirmación borrar
│   ├── helpdesk_guide_template.php      ← NUEVO Fase 3b
│   └── helpdesk_about_template.php      ← NUEVO Fase 3b
│
├── shortcodes/
│   └── batch/
│       ├── helpdesk_shortcodes.php      ← shortcodes de ticket ({TICKET_ID}, …)
│       ├── helpdesk_guide_shortcodes.php    ← NUEVO Fase 3b
│       └── helpdesk_about_shortcodes.php    ← NUEVO Fase 3b
│
├── languages/
│   ├── English/
│   │   ├── English_global.php          ← LAN_* compartidos (existente)
│   │   ├── English_admin.php           ← LAN_* admin (a extraer del legacy)
│   │   ├── English_front.php           ← LAN_* frontend
│   │   ├── English_admin_help.php      ← LAZY, Guide (Fase 3b)
│   │   └── English_admin_about.php     ← LAZY, About  (Fase 3b)
│   ├── Portuguese/  (existente, misma estructura tras split)
│   └── Spanish/     (a añadir en Fase 3b)
│
├── docs/
│   ├── MANUAL_UTILIZADOR_PT.md         ← manual usuario final (PT, ya existe)
│   ├── architecture/                   ← decisiones ADR (a poblar)
│   └── images/                         ← capturas
│
├── e_menu.php · e_shortcode.php · e_search.php · e_help.php · e_module.php ·
│   e_latest.php · e_dashboard.php · e_emailprint.php  (existentes)
│
├── e_url.php        ← Fase 5 (SEO URLs)
├── e_notify.php     ← Fase 6 (eventos suscriptibles)
├── e_event.php      ← Fase 6 (triggers internos)
├── e_cron.php       ← Fase 6 (auto-close / escalado)
│
├── README.md · README.es-ES.md · README.pt-PT.md
├── CHANGELOG.md · MIGRATION_PLAN.md · DEV_NOTES.md
└── GUIA_DESARROLLO_PLUGINS_E107.md   ← referencia embebida
```

## 4. Decisiones de diseño

### 4.1 Nombres de tabla

- Tabla principal: `hdunit` (heredada — histórica, singular, no encaja con el
  resto `hdu_*`). **Plan Fase 1**: renombrar a `hdu_tickets` con `ALTER TABLE`
  ejecutado desde `helpdesk_setup.php::upgrade_post()`.
- Reglas para tablas nuevas: prefijo `hdu_`, plural, snake_case (ej.
  `hdu_attachments`, `hdu_history`, `hdu_sla`).
- **Nunca** interpolar el nombre — usar el nombre sin prefijo en `e107::getDb()`
  (el core aplica `MPREFIX`).

### 4.2 Prefs

- Namespace fijo: `hduprefs_*`.
- Todos los prefs viven en `plugin.xml` `<pluginPrefs>` para que el
  Plugin Manager los cree con default en install.
- Lectura runtime: `e107::getPlugConfig('helpdesk')->get('hduprefs_x')`.
- **No** usar `$pref['hduprefs_x']` (global legacy).

### 4.3 Permisos

- 3 userclasses configurables + 1 permiso admin de core:
  - `getperms("P")` → acceso a `admin/admin_config.php`.
  - `hduprefs_supervisorclass` → puede ver todos los tickets, cerrar,
    reasignar.
  - `hduprefs_postclass` → puede abrir tickets.
  - `hduprefs_userclass` → puede leer sus propios tickets.
- `check_class($classId)` (core) es el único gate — nunca comparar
  `USERCLASS_LIST` a mano.

### 4.4 Notificaciones

- **Estado actual**: `hdu_notify()` en `helpdesk_class.php` envía mails y PM
  directamente. Difícil de configurar por el admin final.
- **Fase 6**: mover a `e_notify.php` declarando eventos:
  - `helpdesk_ticket_created`, `helpdesk_ticket_assigned`,
    `helpdesk_ticket_updated`, `helpdesk_ticket_closed`,
    `helpdesk_comment_added`, `helpdesk_ticket_escalated`.
  - El admin los enruta desde el panel *Notify* estándar del core.
- Plantillas de mail migradas a `mail_template` de core (HTML + placeholders
  reales de `e107::getEmail()`).

### 4.5 i18n

- 3 idiomas objetivo: **English** (canónico), **Portuguese** (existente),
  **Spanish** (a añadir en Fase 3b).
- Constantes con prefijo `HDU_` para strings ligados a UI existente (no romper
  templates). Nuevas strings de Guide/About usan prefijo largo
  `LAN_PLUGIN_HELPDESK_*` como recomienda la guía.
- Split de LAN files: `_global` (siempre) / `_admin` (solo admin_config) /
  `_front` (solo helpdesk.php) / `_admin_help` (lazy en `guidePage`) /
  `_admin_about` (lazy en `aboutPage`).

## 5. Cosas que deliberadamente **no** hacemos

### 4.6 Gestión de tickets desde el admin

**Diseño legacy (Father Barry)**: los tickets **no** se listan en
`e107_admin/`; se gestionan íntegramente desde el frontend `helpdesk.php`.
Un usuario que pertenece a `hduprefs_supervisorclass` ve todos los tickets
(no solo los propios) y accede a las acciones de supervisor (asignar
técnico, cambiar prioridad, cerrar, borrar). El admin panel solo gestiona
**catálogos** (categorías, mesas, resoluciones, fixes) y prefs.

**Plan Fase 3** (v2.3.0): añadir una lista admin nativa con `e_admin_ui`
sobre `hdu_tickets`. No sustituye al frontend — se suma como vista de
back-office con filtros y batch actions estándar de e107. Rationale:

- Los supervisores prefieren un panel dedicado para triage masivo.
- Habilita batch delete / batch assign gratis vía `e_admin_ui`.
- Permite integrar el dashboard widget (`e_dashboard.php`) con enlaces
  clicables a filtros preseleccionados.

- **No** vendorizamos `bootstrap_colorpicker`. `<input type="color">` HTML5
  cubre el caso y evita una dependencia externa.
- **No** tocamos `pdfout/` (TCPDF empotrado) hasta Fase 7. Funciona y su fix es
  aislado.
- **No** rompemos la firma pública de `e107::getScBatch('helpdesk')`. Themes
  que sobrescriben shortcodes deben seguir funcionando.
- **No** convertimos a namespaces PSR-4 en 2.x — se evalúa para 3.x cuando el
  target sea PHP 8.2+.

## 6. Testing

- **Manual**: checklist en `docs/TEST_CHECKLIST.md` (crear en Fase 1) —
  abrir ticket, comentar, asignar técnico, cambiar prioridad, cerrar,
  reabrir, exportar PDF, verificar mails.
- **Unitarios**: `e107_tests/tests/unit/plugins/helpdesk/` (a crear en Fase 8)
  con `e_db_pdo_class` mock.
- **Aceptación**: Codeception scenario `HelpdeskTicketLifecycleCest.php`.
- Ejecutar con: `e107_tests/bin/e107-tests run unit`
  (harness Docker documentado en `e107_tests/README.md`).

## 7. Workspace y flujo de PR

- Rama de trabajo: `wamp64/www/e107_helpdesk3` (local, WAMP).
- Cada fase del `MIGRATION_PLAN.md` = 1 rama Git = 1 PR.
- Cada PR trae: entrada `[Unreleased]` → `[X.Y.Z]` en `CHANGELOG.md`, bump de
  `plugin.xml` `version` + `date`, y `DEV_NOTES.md` si cambia una decisión.
- Antes de commit: `php -l` sobre todos los archivos tocados + smoke test
  manual del flujo alterado.
