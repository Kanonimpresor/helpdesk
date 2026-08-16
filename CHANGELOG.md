# Changelog

Todos los cambios notables del plugin **Helpdesk** para e107 CMS quedan
registrados en este archivo.

El formato sigue [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) y el
versionado se rige por [SemVer](https://semver.org/spec/v2.0.0.html).

> **Convención de trabajo**: cada release documenta *Added / Changed / Fixed /
> Removed / Security / Migration notes*. Las fases del `MIGRATION_PLAN.md`
> mapean 1:1 a una versión de esta lista.

---

## [Unreleased]

Rama de trabajo hacia `2.3.0` (Fase 3b — Guide + About + Spanish locale).
Sin cambios todavía.

---

## [2.2.1] — 2026-08-16 — Fase 2.6 (authorization hardening — SECURITY)

Hotfix urgente en respuesta a prueba de campo del operador el mismo
día del release 2.2.0: como visitante anónimo (sin login), abriendo
directamente `helpdesk.php?0.show.4` en otro navegador, era posible
**ver y editar cualquier ticket** del sitio.

Tres bugs simultáneos de autorización:

1. **Anónimos podían entrar**. El constructor calculaba `hdu_read` como
   `check_class($pluginPrefs['hduprefs_userclass']) || $hdu_poster`.
   En una instalación en la que el seed de `plugin.xml` no había
   propagado el valor a la BD (o el admin lo había vaciado en el
   formulario de prefs), `$pluginPrefs['hduprefs_userclass']` volvía
   como `null` / `""` / `0`, y `check_class(0)` en e107 core equivale
   a `e_UC_PUBLIC` — TRUE para todo el mundo, incluyendo visitantes
   no autenticados.
2. **Ausencia de check por propiedad**. `case "show"` en `helpdesk.php`
   solo comprobaba `$helpdesk_obj->hdu_read` — es decir, si la clase
   del usuario tenía permiso para tocar el plugin. Nunca comprobaba
   que el ticket en cuestión perteneciera al usuario. Con `hdu_read`
   activo (rebote del bug 1) cualquier ID de ticket era enumerable.
3. **`case "updet"` sin gate**. El handler que ejecuta
   `update_ticket()` no comprobaba **nada** antes de mutar la BD.

### Security

- **F2.6 constructor hardening** (`includes/helpdesk_class.php`):
  - Prefs `hduprefs_supervisorclass`, `hduprefs_postclass`, y
    `hduprefs_userclass` ahora se leen con `(int)` cast y `??`
    fallback. Si el valor efectivo es `<= 0` (ausente o `PUBLIC`)
    se sustituye por un default **fail-closed**:
    - supervisor  → `e_UC_NOBODY` (255)
    - poster       → `e_UC_MEMBER` (253)
    - reader       → `e_UC_MEMBER` (253)
  - `hdu_super`, `hdu_technician`, `hdu_poster`, `hdu_read` requieren
    ahora `USERID > 0` incondicionalmente. Anónimos jamás pasan aunque
    la pref sea PUBLIC.
- **F2.6 ownership helper** (`includes/helpdesk_class.php`):
  - Nuevos métodos `can_view_ticket($id)` y `can_edit_ticket($id)`.
  - Staff (super/technician) pasa siempre; el resto solo pasa si
    `hdu_posterid` del ticket coincide con `USERID`. Consulta parametrizada.
- **F2.6 helpdesk.php guards**:
  - `case "show"`  → `can_view_ticket($id)` en vez de `hdu_read`.
  - `case "print"` → `can_view_ticket($id)` (mismo leak vía PDF/print).
  - `case "updet"` → si `id == 0` (creación) exige `hdu_poster`;
    si `id > 0` (edición) exige `can_edit_ticket($id)`.
- **F2.6 entry gate** (`helpdesk.php`):
  - Anónimos (`USERID == 0`) redirigidos a `login.php?redir=…` en el
    tope del archivo, antes de tocar `hdu_read`. Da un mensaje
    accionable en vez del genérico "no tiene permiso".

### Migration notes

- **No hay cambio de esquema** ni de datos.
- Instalaciones existentes donde `hduprefs_userclass` estuviese sin
  valor (o con `0`) pasarán automáticamente a `MEMBER` — es decir,
  visitantes anónimos dejarán de ver el helpdesk. Si un sitio
  **realmente** quiere permitir consulta pública, debe fijar la pref
  a `0` explícitamente y editar `helpdesk.php` para retirar el guard
  `USERID == 0` (no recomendado; ver DEV_NOTES §8.1 para el rediseño
  planificado en Fase 4).
- El pref `hduprefs_allread` **no** se honra en `can_view_ticket()`.
  Si el operador lo tenía activado, sus usuarios normales dejarán de
  ver tickets ajenos. Fase 4 introducirá un modelo de participantes
  explícito para cubrir ese caso legítimamente.

---

## [2.2.0] — 2026-08-16 — Fase 2 (seguridad + consistencia de datos)

Cierra `MIGRATION_PLAN.md` Fase 2. Cinco sub-releases mergeados:
F2.1 (rename), F2.2a-e (SQL sanitize), F2.2c-fix (comment form bug),
F2.5 (privacy hotfix).

### Security

- **F2.5 (privacy leak — CRÍTICO)** — Cualquier miembro registrado veía
  todos los tickets del sitio, no solo los propios. Causa: en
  `helpdesk.php` el filtro `hduprefs_posteronly` era sobreescrito
  incondicionalmente por un segundo `if` que ponía `where hdu_id > 0`
  cuando la pref estaba desactivada (default de fresh install).
  Reescrito como política role-first (`hdu_super` o `hdu_technician` →
  ven todo; resto → solo propios). `hduprefs_posteronly` queda
  efectivamente deprecada hasta el rediseño de visibilidad de Fase 4
  (DEV_NOTES §8.1 documenta el plan completo).
- **F2.2a** — `helpdesk.php`: DELETE queries con guard `$id > 0` para
  bloquear borrados en masa vía POST maliciosos con `id=0`.
- **F2.2c** — `hduc_body !== ''` guard en `post_comment()` — antes se
  podía crear comentarios vacíos.

### Added

- **F2.1** — `helpdesk_setup.php` nuevo. Clase `helpdesk_setup` con hook
  `upgrade_post($var)` que hace un `RENAME TABLE` idempotente de
  `#hdunit` a `#hdu_tickets` cuando se actualiza desde ≤ 2.1.x.
  Contrato: si `hdu_tickets` ya existe, no-op; si solo existe `hdunit`,
  rename + mensaje éxito; si ninguna existe (fresh install), no-op.

### Changed

- **F2.1** — Renombrada tabla `hdunit` → `hdu_tickets` (alinea con
  `hdu_comments`, `hdu_categories`, etc.). 30+ referencias literales
  sustituidas en 9 archivos PHP. `helpdesk_sql.php` actualizado.
- **F2.2b** — `pdfit.php`: reemplazado `new DB` legacy (clase inexistente
  en e107 2.x; probablemente causaba fatal en la sección de comentarios
  del PDF) por `e107::getDb('name')`. 3 instancias convertidas.
- **F2.2b** — Fuentes TCPDF core: `Arial` → `helvetica`, `Times` → `times`
  (mayúsculas fallan; TCPDF solo tiene 5 fuentes core embebidas).
  Aplicado en `pdfit.php`, `reports/report0.php`, `reports/report1.php`.
- **F2.2b** — `reports/report1.php`: heredaba de `UFPDF` (clase de FPDF
  legacy jamás cargada). Migrado a `TCPDF` con `class_exists` guard,
  path absoluto del logo, y sin `AliasNbPages()` (TCPDF autoresuelve
  `{nb}`).
- **F2.2d** — `update_ticket()`: refactor. Antes leía `$_POST[...]` 30+
  veces mezclando `intval()` esparcidos con accesos raw (warnings
  PHP 8 "undefined array key" a montones). Ahora sanea **una vez** al
  entrar (`$p_new`, `$p_category`, `$p_summary`, ...) y todo el resto
  del método consume solo esos locales tipados. Efectos colaterales
  arreglados: mutación de `$_POST['hdu_resolution']` (side effect del
  auto-assign) → asignación a `$p_resolution`; `hdu_email` en UPDATE
  pasa por `$tp->toDB()` (antes se interpolaba raw).
- **F2.2c/d** — Todas las queries de `helpdesk.php`, `pdfit.php`,
  `post_comment()` y el bucle de comentarios de `show()` reescritas
  con enteros casteados sin comillas engañosas (`'$id'` → `. (int) $id`).
- **F2.2e** — `reports/report0.php` + `report1.php`: sanitización de
  `$_GET` (`hdu_rep`, `hdu_pagesize`, `hdu_dest`, `hdu_fromd`, `hdu_tod`)
  con whitelist para enums (`hdu_dest` solo permite `I/D/F/S`,
  `hdu_pagesize` solo `A4/A3/Letter/Legal`). Totales financieros
  inicializados a 0 antes del bucle (antes: warnings undefined var).
- **F2.5** — Fix menor: `case "mine"` tenía `"hdu_posterid=' " . USERID`
  (espacio antes de USERID) que rompía match contra columna int.

### Fixed

- **F2.2c-fix (bug UI reportado por el operador)** — el botón "Guardar
  comentario" no aparecía en tickets existentes. Root cause en
  `helpdesk_class.php::show()`: el bloque `<script>` con `checkform()` +
  `changed()`, el `<form>`, y todos los `<input type='hidden'>` estaban
  gateados por un ternario `$this->hdu_new ? "..." : ""`. En un ticket
  existente, el textarea del comentario y el submit renderizaban
  **fuera** de cualquier `<form>`, y `changed()` no existía para
  habilitar el botón. Fix: emitir siempre el form, hacer `checkform()`
  tolerante a campos ausentes (`if (theform.hdu_summary && ...)`), y
  cerrar `</form>` incondicional.
- **F2.2b/c** — `explode(".", $hduc_poster)` reasignando a la misma
  variable (string → array) → warning PHP 8. Aplicado el fix
  `$parts = explode(...)` en `pdfit.php`, `helpdesk_class.php::show()`
  loop de comentarios, y `reports/report1.php`.

### Migration notes

- Al actualizar desde 2.1.x, e107 invocará `helpdesk_setup::upgrade_post()`
  al pulsar **Upgrade** en Admin → Plugin Manager. Si falla, el rename
  se puede hacer a mano: `RENAME TABLE e107_hdunit TO e107_hdu_tickets;`
  (ajustar prefijo).
- El pref `hduprefs_posteronly` queda **efectivamente ignorado**
  (la política de visibilidad ahora es role-first, ver F2.5). El pref
  seguirá presente en la UI hasta que la Fase 4 introduzca el modelo
  de participantes completo.
- Instalaciones nuevas crean directamente la tabla con el nombre
  `hdu_tickets` desde `helpdesk_sql.php`.

### Backlog registrado en DEV_NOTES §8

Cinco observaciones de lógica de negocio salidas del smoke test
2026-08-16 se documentaron pero **no se implementaron** en 2.2.0:

- §8.1 Visibilidad completa por participante (Fase 4 — F2.5 cierra el
  agujero pero no el modelo).
- §8.2 Widget de perfil con conteo de tickets (Fase 4 / `e_user.php`).
- §8.3 Refactor de notificaciones PM/email a eventos `e_notify.php`
  (Fase 6).
- §8.4 Verificar visibilidad de comentarios post F2.2c-fix (probable
  ya resuelto por rebote).
- §8.5 Decisión pendiente sobre el módulo financiero (opt-in pref,
  sub-plugin o integración externa).

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
