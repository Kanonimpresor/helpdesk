# Changelog

Todos los cambios notables del plugin **Helpdesk** para e107 CMS quedan
registrados en este archivo.

El formato sigue [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) y el
versionado se rige por [SemVer](https://semver.org/spec/v2.0.0.html).

> **Convención de trabajo**: cada release documenta *Added / Changed / Fixed /
> Removed / Security / Migration notes*. Las fases del `MIGRATION_PLAN.md`
> mapean 1:1 a una versión de esta lista.

---

## [Unreleased] — rama de trabajo hacia `2.2.0`

Ver `MIGRATION_PLAN.md` Fase 2 (seguridad + consistencia de datos).

### Added
- **F2.1** — `helpdesk_setup.php` nuevo. Clase `helpdesk_setup` con hook
  `upgrade_post($var)` (convención e107) que ejecuta un `RENAME TABLE`
  idempotente de `#hdunit` a `#hdu_tickets` cuando se actualiza desde
  versiones ≤ 2.1.x. Contrato:
  - `hdu_tickets` existe → no-op.
  - `hdunit` existe y `hdu_tickets` no → `RENAME` + mensaje de éxito.
  - Ninguna existe → no-op (instalación nueva).
- `plugin.xml` bump a `2.2.0-dev` como marcador de rama Fase 2.

### Changed
- **F2.1** — Renombrada la tabla `hdunit` → `hdu_tickets` para alinearla
  con el resto del esquema (`hdu_helpdesk`, `hdu_comments`,
  `hdu_categories`, `hdu_fixes`, `hdu_resolve`). Sustituidas 30+
  referencias literales vía `sed` en 9 archivos PHP:
  `helpdesk.php`, `includes/helpdesk_class.php`, `pdfit.php`,
  `e_emailprint.php`, `e_latest.php`, `helpdesk_menu.php`,
  `reports/report0.php`, `reports/report1.php`, `search/search.php`.
  `helpdesk_sql.php` actualizado para que instalaciones nuevas creen la
  tabla con el nombre nuevo.

### Migration notes
- Al actualizar de 2.1.x, e107 invocará `helpdesk_setup::upgrade_post()`
  desde la página de plugins (Admin → Plugin Manager → Upgrade).
  Si por algún motivo no se dispara, se puede renombrar manualmente:
  `RENAME TABLE e107_hdunit TO e107_hdu_tickets;` (ajustar prefijo).

---

## [2.1.0] — 2025-XX-XX — Fase 1 (estabilización PHP 8)

### Added
- Repo git local + remoto `github.com/Kanonimpresor/helpdesk` (rama `main`).

### Changed
- **F1.1a** — `includes/helpdesk_class.php`: 55 propiedades `var $x;` (PHP 4)
  migradas a `public <tipo> $x` con tipos declarados. Nullables (`?tipo`)
  para todo lo hidratado desde `e107::pref('helpdesk')` (un pref jamás
  guardado retorna `null`, no el default XML). Agrupadas por dominio.
- **F1.1b** — Saneado accesos a superglobales y variables no inicializadas
  en `pdfit.php`, `pdfrep.php`, `helpdesk.php`. Fix firma `pdfit()`
  (deprecado PHP 8.1+: parámetro obligatorio tras opcional). Sustituido
  `\$hdu_super` global huérfano por `\$helpdesk_obj->hdu_super` y
  `\$PLUGINS_DIRECTORY` (var legacy pre-e107 v2) por `e_PLUGIN`.
- **F1.2** — `helpdesk.php`: descomentado y corregido el bloque de definición
  de `HDU_LOGO` (tenía un espacio final `"HDU_LOGO "` — jamás matcheaba).
- **F1.3a** — `helpdesk.php`: `require_once("printit.php")` → path absoluto
  vía `e_PLUGIN`. El include relativo rompía cuando `helpdesk.php` se
  alcanzaba con rewrite (cwd distinto), causando "Print → File Not Found".
- **F1.3b** — `pdfit.php`: migrado de UFPDF (obsoleto, ya no lo trae el
  plugin `pdf`) a TCPDF (UTF-8 nativo, superset de FPDF). Añadido guard
  `e107::isInstalled('pdf')` con mensaje amable.
- **F1.4** — `includes/helpdesk_class.php::tablerender()`: DESACTIVADA la
  reescritura legacy de URLs a `.html`. El código reescribía
  `helpdesk.php?X.Y.Z` → `helpdesk-X-Y-Z.html` esperando que Apache lo
  mapease de vuelta vía `.htaccess`, pero: (a) el patrón usaba el global
  huérfano `\$PLUGINS_DIRECTORY`, (b) `regen_htaccess()` opera con paths
  relativos al CWD y no siempre escribe. Resultado: 404 tipo
  `/e107_plugins/helpdesk/helpdesk-0-newticket-0.html`. Las URLs SEO
  correctas llegan en **Fase 5** vía `e_url.php` + `e107_core/url/`. Hasta
  entonces `hduprefs_seo` se ignora y salimos siempre con URLs `?query`.

### Deferred to Fase 2
- **F1.1c** (rename tabla `hdunit` → `hdu_tickets`): 30 ocurrencias en 8
  archivos. Se hará junto con los placeholders SQL de Fase 2.
- Legacy class `DB` en `pdfit.php`/`report0.php`/`report1.php` (`new DB;`).

---

## [2.0.1] — 2026-08-16

Release "puente" para desbloquear la instalación limpia sobre e107 2.3.x /
PHP 8.0+. No cambia esquema de BD ni prefs — no requiere migración.

### Fixed
- **Instalación bloqueada por dependencia obligatoria** `bootstrap_colorpicker`.
- **Warnings PHP 8 al entrar a `helpdesk.php`** (`Undefined variable \$R1`,
  `\$hdu_goto`, `\$hdu_aaction`). Inicialización explícita + `?? …`.
- **Bug lógico en el filtro de lista**: `hdu_savemsg` sobreescribía `\$R1`.

### Notes
- Verificado con e107 2.3.4 + PHP 8.3 sobre WAMP.

---

## [2.0.0] — 2025-04-19

Versión heredada de upstream (Father Barry). Reintroducida en este repo como
línea base tras el fork.

### Added
- Compatibilidad declarada con e107 **2.3** y PHP **8.0.0**.
- Prefs de colores por prioridad (`hduprefs_p1col`..`p5col`), rate/hora,
  auto-cierre, escalado, notificaciones por email / PM.

### Known limitations (pendientes de fases 1–3)
- Admin CRUD todavía se hace con formularios manuales; no usa `e_admin_ui`.
- **No hay lista de tickets en el admin** (es diseño del legacy): supervisores
  gestionan tickets desde el frontend `helpdesk.php`. Fase 3 añade lista
  admin nativa vía `e_admin_ui` sobre `hdu_tickets`.
- Templates HTML sin Bootstrap 5.
- Notificaciones no pasan por `e107::getNotify()`.
- Interpolación SQL directa en varios sitios (`"hd_id={\$id}"`).
