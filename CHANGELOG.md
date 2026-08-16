# Changelog# Changelog# Changelog# Changelog# Changelog# Changelog



Todos los cambios notables del plugin **Helpdesk** para e107 CMS quedan

registrados en este archivo.

Todos los cambios notables del plugin **Helpdesk** para e107 CMS quedan

El formato sigue [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) y el

versionado se rige por [SemVer](https://semver.org/spec/v2.0.0.html).registrados en este archivo.



> **Convención de trabajo**: cada release documenta *Added / Changed / Fixed /Todos los cambios notables del plugin **Helpdesk** para e107 CMS quedan

> Removed / Security / Migration notes*. Las fases del `MIGRATION_PLAN.md`

> mapean 1:1 a una versión de esta lista.El formato sigue [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) y el



---versionado se rige por [SemVer](https://semver.org/spec/v2.0.0.html).registrados en este archivo.



## [Unreleased] — rama de trabajo hacia `2.1.0`



Ver `MIGRATION_PLAN.md` Fase 1.> **Convención de trabajo**: cada release documenta *Added / Changed / Fixed /Todos los cambios notables del plugin **Helpdesk** para e107 CMS quedan



### Added> Removed / Security / Migration notes*. Las fases del `MIGRATION_PLAN.md`

- `plugin.xml`: bump a `2.1.0-dev` como marcador de rama de trabajo Fase 1.

- Repositorio git local inicializado con `main` como rama por defecto y> mapean 1:1 a una versión de esta lista.El formato sigue [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) y el

  `.gitignore` que excluye artefactos (`pdfout/*.pdf`, `vendor/`, IDE files).



### Changed

- **F1.1a** — `includes/helpdesk_class.php`: 55 propiedades `var $x;` (PHP 4)---versionado se rige por [SemVer](https://semver.org/spec/v2.0.0.html).registrados en este archivo.

  migradas a `public <tipo> $x` con tipos declarados. Nullables (`?tipo`)

  para todo lo hidratado desde `e107::pref('helpdesk')` (un pref jamás

  guardado retorna `null`, no el default XML). Agrupadas por dominio.

- **F1.1b** — Saneado accesos a superglobales y variables no inicializadas## [Unreleased] — rama de trabajo hacia `2.1.0`

  en `pdfit.php`, `pdfrep.php`, `helpdesk.php`. Fix firma `pdfit()`

  (deprecado PHP 8.1+: parámetro obligatorio tras opcional). Sustituido

  `$hdu_super` global huérfano por `$helpdesk_obj->hdu_super` y

  `$PLUGINS_DIRECTORY` (var legacy pre-e107 v2) por `e_PLUGIN`.Ver `MIGRATION_PLAN.md` Fase 1.> **Convención de trabajo**: cada release documenta *Added / Changed / Fixed /Todos los cambios notables del plugin **Helpdesk** para e107 CMS quedanAll notable changes to the **Helpdesk** plugin for e107 CMS will be documented in this file.

- **F1.2** — `helpdesk.php`: descomentado y corregido el bloque de definición

  de `HDU_LOGO` (tenía un espacio final `"HDU_LOGO "` — jamás matcheaba).

- **F1.3** — `helpdesk.php`: `require_once("printit.php")` → path absoluto

  vía `e_PLUGIN`. El include relativo rompía cuando `helpdesk.php` se### Added> Removed / Security / Migration notes*. Las fases del `MIGRATION_PLAN.md`

  alcanzaba desde una URL con rewrite (cwd distinto), causando el error

  "Print → File Not Found" reportado en pruebas.- `plugin.xml`: bump a `2.1.0-dev` como marcador de rama de trabajo Fase 1.

- **F1.3** — `pdfit.php`: migrado de **UFPDF** (obsoleto, ya no lo trae el

  plugin `pdf` moderno) a **TCPDF** (bundleado por el plugin `pdf` actual y> mapean 1:1 a una versión de esta lista.El formato sigue [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) y el

  UTF-8 nativo). `HDUPDF extends UFPDF` → `HDUPDF extends TCPDF`. La API

  usada (`Header/Footer/Cell/MultiCell/SetFont/AddPage/AliasNbPages/Output`)### Changed

  es compatible entre ambos. Añadido guard `e107::isInstalled('pdf')` con

  mensaje amable en lugar de fatal `require` si el plugin `pdf` falta.- **F1.1a** — `includes/helpdesk_class.php`: 55 propiedades `var $x;` (sintaxis



### Deferred to Fase 2  PHP 4) migradas a **`public <tipo> $x`** con tipos declarados. Los `?tipo`

- **F1.1c** (rename tabla `hdunit` → `hdu_tickets`): pospuesto. Hay 30

  ocurrencias literales dispersas en 8 archivos. Se hará junto con la  nullables se usan en todo lo hidratado desde `e107::pref('helpdesk')` porque---versionado se rige por [SemVer](https://semver.org/spec/v2.0.0.html).registrados en este archivo.

  migración de queries a placeholders en Fase 2 (v2.2.0).

- Legacy class `DB` en `pdfit.php`/`report0.php`/`report1.php` (líneas  un pref jamás guardado retorna `null`, no el default XML. Bloques comentados

  `new DB;`) — no existe en e107 moderno. Reemplazar por `e107::getDb()`.

  legacy eliminados. Agrupadas por dominio (Access flags · Prefs · UI/action ·

---

  Notification · Financial/SLA).

## [2.0.1] — 2026-08-16

- **F1.1b** — Saneado accesos a superglobales y variables no inicializadas:## [Unreleased] — rama de trabajo hacia `2.1.0`

Release "puente" para desbloquear la instalación limpia sobre e107 2.3.x /

PHP 8.0+. No cambia esquema de BD ni prefs — no requiere migración.  - `pdfit.php`: `$_GET['hdu_id'/'hdu_dest'/'hdu_pagesize']` casteados con



### Fixed    `(int) / (string)` y `?? default`. Además fix de firma



- **Instalación bloqueada por dependencia obligatoria** `bootstrap_colorpicker`.    `function pdfit(..., $hdu_pdf_fname, $hdu_pdf_size = "A4")` (parámetro

  Ya no se exige ese plugin externo para instalar Helpdesk.

- **Warnings PHP 8 al entrar a `helpdesk.php`** (`Undefined variable $R1`,    obligatorio tras opcional → deprecado PHP 8.1+) aVer `MIGRATION_PLAN.md` Fase 1.> **Convención de trabajo**: cada release documenta *Added / Changed / Fixed /The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),

  `$hdu_goto`, `$hdu_aaction`). Inicialización explícita + `?? …`.

- **Bug lógico en el filtro de lista**: `hdu_savemsg` sobreescribía `$R1`.    `$hdu_pdf_fname = ""`.



### Notes  - `pdfrep.php`: `(int) ($_GET['hdu_repselection'] ?? 0)`.



- Verificado con e107 2.3.4 + PHP 8.3 sobre WAMP.  - `helpdesk.php`: inicialización de `$hdu_savemsg`, `$sqlmsg`, `$filter`,



---    `$hdu_text`, `$tp` (todas usadas por el flujo `switch(action)` sin### Added> Removed / Security / Migration notes*. Las fases del `MIGRATION_PLAN.md`



## [2.0.0] — 2025-04-19    declarar). Sustituido `$hdu_super` global huérfano por



Versión heredada de upstream (Father Barry). Reintroducida en este repo como    `$helpdesk_obj->hdu_super`. `$PLUGINS_DIRECTORY` (var legacy pre-e107 v2)- `plugin.xml`: bump a `2.1.0-dev` como marcador de rama de trabajo Fase 1.

línea base tras el fork.

    reemplazado por derivación de `e_PLUGIN`.

### Added

- **F1.2** — `helpdesk.php`: descomentado y corregido el bloque de definición> mapean 1:1 a una versión de esta lista.El formato sigue [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) y eland this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

- Compatibilidad declarada con e107 **2.3** y PHP **8.0.0**.

- Prefs de colores por prioridad (`hduprefs_p1col`..`p5col`), rate/hora,  de `HDU_LOGO` (tenía un espacio final `"HDU_LOGO "` — jamás matcheaba con

  auto-cierre, escalado, notificaciones por email / PM.

  las referencias del template). Ahora el logo del tema se activa si existe### Changed

### Known limitations (pendientes de fases 1–3)

  `THEME/helpdesk.png`, con fallback al PNG del plugin.

- Admin CRUD (categorías, helpdesks, técnicos, resoluciones, fixes) todavía se

  hace con formularios manuales; no usa `e_admin_ui`.- **F1.1a** — `includes/helpdesk_class.php`: 55 propiedades `var $x;` (sintaxis

- **No hay lista de tickets en el admin** (es diseño del legacy): supervisores

  gestionan tickets desde el frontend `helpdesk.php`. Fase 3 añade una lista### Deferred to Fase 2

  admin nativa vía `e_admin_ui` sobre `hdu_tickets`.

- Templates HTML sin Bootstrap 5.- **F1.1c (rename tabla `hdunit` → `hdu_tickets`)**: pospuesto. Hay 30  PHP 4) migradas a **`public <tipo> $x`** con tipos declarados (`bool`,

- Notificaciones no pasan por `e107::getNotify()`.

- Interpolación SQL directa en varios sitios (`"hd_id={$id}"`).  ocurrencias literales dispersas en 8 archivos (`helpdesk.php`,


  `includes/helpdesk_class.php`, `pdfit.php`, `e_dashboard.php`,  `int`, `float`, `string`). Los tipos coinciden con los defaults ya---versionado se rige por [SemVer](https://semver.org/spec/v2.0.0.html).

  `reports/report0.php`, `report1.php`, `search/search.php`). Se hará junto

  con la migración de queries a placeholders en Fase 2 (v2.2.0), donde el  existentes; se conservan los valores por defecto. Bloques comentados

  grep completo es inevitable de todas formas.

  legacy (`// var $hduprefs_colours = …`, `// var $hduprefs_statcloses = …`)

---

  eliminados. Agrupadas por dominio (Access flags · Prefs · UI/action ·

## [2.0.1] — 2026-08-16

  Notification · Financial/SLA) para lectura. `php -l` limpio.## [Unreleased] — rama de trabajo hacia `2.1.0`> **Nota histórica**: las entradas anteriores a `[2.0.1]` provienen de la

Release "puente" para desbloquear la instalación limpia sobre e107 2.3.x /

PHP 8.0+. No cambia esquema de BD ni prefs — no requiere migración.



### Fixed### Fixed



- **Instalación bloqueada por dependencia obligatoria** `bootstrap_colorpicker`.- **F1.1a-hotfix** — `TypeError: Cannot assign null to property

  Ya no se exige ese plugin externo para instalar Helpdesk. Los prefs de color

  de prioridad (`hduprefs_p1col`..`p5col`) siguen funcionando; en Fase 1 se  helpdesk::$hduprefs_helpdeskemail of type string`. Cualquier pref jamásVer `MIGRATION_PLAN.md` Fase 1.> **Convención de trabajo**: cada release documenta *Added / Changed / Fixed /> plantilla del plugin **Booking**, que se está usando como referencia para

  cablearán a `<input type="color">` nativo de HTML5.

  Archivo: `plugin.xml` → bloque `<dependencies>`.  guardado por el admin devuelve `null` desde `e107::pref('helpdesk')`, y el

- **Warnings PHP 8 al entrar a `helpdesk.php`** (`Undefined variable $R1`,

  `$hdu_goto`, `$hdu_aaction`). Inicialización explícita + `$_POST['x'] ?? …`  constructor asigna directamente. Solución mínima: declarar como **nullable**

  en todos los accesos.

- **Bug lógico en el filtro de lista**: `hdu_savemsg` (mensaje flash) se estaba  (`?int`, `?string`, `?float`) todas las propiedades hidratadas desde

  escribiendo sobre `$R1` (filtro activo), por lo que tras cualquier acción la

  lista pasaba a filtrarse por el texto del mensaje.  `$pluginPrefs`. Los `bool` se dejan estrictos porque el constructor ya los### Added> Removed / Security / Migration notes*. Las fases del `MIGRATION_PLAN.md`> aplicar el mismo patrón de 4 capas (User Guide + About + i18n lazy). Se

  Archivo: `helpdesk.php`.

  normaliza con `== 1`. Un comentario en el código explica la decisión.

### Notes

- `plugin.xml`: bump a `2.1.0-dev` como marcador de rama de trabajo Fase 1.

- Verificado con e107 2.3.4 + PHP 8.3 sobre WAMP.

- Próximos pasos: seguir `MIGRATION_PLAN.md` (Fase 1: estabilización PHP 8,### Pending (próximos mini-commits Fase 1)

  Fase 2: seguridad SQL/CSRF, Fase 3+: migración a `e_admin_ui` + patrón 4-capas).

- **F1.1b** — Sanear accesos a `$_GET/$_POST/$_REQUEST` en `report.php`,> mapean 1:1 a una versión de esta lista.> mantienen aquí como material de trabajo del `MIGRATION_PLAN.md`; se

---

  `printit.php`, `pdfit.php`, `pdfrep.php`, `helpdesk_menu.php` y los

## [2.0.0] — 2025-04-19

  `admin/admin_*.php` legacy.### Changed

Versión heredada de upstream (Father Barry). Reintroducida en este repo como

línea base tras el fork.- **F1.1c** — Rename tabla `hdunit` → `hdu_tickets` con `helpdesk_setup.php`



### Added  (`upgrade_post` idempotente).- **F1.1a** — `includes/helpdesk_class.php`: 55 propiedades `var $x;` (sintaxis> reescribirán con el histórico real de Helpdesk en cuanto se cierre la Fase 1.



- Compatibilidad declarada con e107 **2.3** (atributo `compatibility` de- **F1.2** — Fix constante `HDU_LOGO ` (espacio final) en `helpdesk_defines.php`.

  `plugin.xml`) y PHP **8.0.0** (dependencia `<PHP name='core' min_version>`).

- Prefs de colores por prioridad (`hduprefs_p1col`..`p5col`), rate/hora,  PHP 4) migradas a **`public <tipo> $x`** con tipos declarados (`bool`,

  auto-cierre, escalado, notificaciones por email / PM.

---

### Known limitations (pendientes de fases 1–3)

  `int`, `float`, `string`). Los tipos coinciden con los defaults ya---

- Admin CRUD (categorías, helpdesks, técnicos, resoluciones, fixes) todavía se

  hace con formularios manuales; no usa `e_admin_ui`.## [2.0.1] — 2026-08-16

- **No hay lista de tickets en el admin** (es diseño del legacy): supervisores

  gestionan tickets desde el frontend `helpdesk.php`. Fase 3 añade una lista  existentes; se conservan los valores por defecto. Bloques comentados

  admin nativa vía `e_admin_ui` sobre `hdu_tickets`.

- Templates HTML sin Bootstrap 5 — se ven rotos sobre temas modernos.Release "puente" para desbloquear la instalación limpia sobre e107 2.3.x /

- Notificaciones no pasan por `e107::getNotify()` — no aparecen en el panel de

  suscripciones estándar del core.PHP 8.0+. No cambia esquema de BD ni prefs — no requiere migración.  legacy (`// var $hduprefs_colours = …`, `// var $hduprefs_statcloses = …`)## [2.0.1] — 2026-08-16

- Interpolación SQL directa en varios sitios (`"hd_id={$id}"`) — requiere

  sanitización de Fase 2 aunque el `$id` sea `(int)`.


### Fixed  eliminados. Agrupadas por dominio (Access flags · Prefs · UI/action ·



- **Instalación bloqueada por dependencia obligatoria** `bootstrap_colorpicker`.  Notification · Financial/SLA) para lectura. `php -l` limpio.## [Unreleased]

  Ya no se exige ese plugin externo para instalar Helpdesk. Los prefs de color

  de prioridad (`hduprefs_p1col`..`p5col`) siguen funcionando; en Fase 1 se

  cablearán a `<input type="color">` nativo de HTML5.

  Archivo: `plugin.xml` → bloque `<dependencies>`.### Pending (próximos mini-commits Fase 1)### Fixed

- **Warnings PHP 8 al entrar a `helpdesk.php`** (`Undefined variable $R1`,

  `$hdu_goto`, `$hdu_aaction`). Inicialización explícita + `$_POST['x'] ?? …`- **F1.1b** — Sanear accesos a `$_GET/$_POST/$_REQUEST` en `helpdesk.php`,

  en todos los accesos.

- **Bug lógico en el filtro de lista**: `hdu_savemsg` (mensaje flash) se estaba  `report.php`, `printit.php`, `pdfit.php`.En preparación (rama de trabajo). Ver `MIGRATION_PLAN.md` Fases 1–7.- **Instalación bloqueada por dependencia obligatoria** `bootstrap_colorpicker`.

  escribiendo sobre `$R1` (filtro activo), por lo que tras cualquier acción la

  lista pasaba a filtrarse por el texto del mensaje.- **F1.1c** — Rename tabla `hdunit` → `hdu_tickets` con `helpdesk_setup.php`

  Archivo: `helpdesk.php`.

  (`upgrade_post` idempotente).  El plugin ya no exige ese plugin externo para instalarse; los prefs de color

### Notes

- **F1.2** — Fix constante `HDU_LOGO ` (espacio final) en `helpdesk_defines.php`.

- Verificado con e107 2.3.4 + PHP 8.3 sobre WAMP.

- Próximos pasos: seguir `MIGRATION_PLAN.md` (Fase 1: estabilización PHP 8,- Fase 1 — Estabilización PHP 8: `var` → `public` tipados, `intval()` → `(int)`,  de prioridad (`hduprefs_p1col`..`p5col`) siguen funcionando y en Fase 1 se

  Fase 2: seguridad SQL/CSRF, Fase 3+: migración a `e_admin_ui` + patrón 4-capas).

---

---

  eliminación de warnings dinámicos en `includes/helpdesk_class.php`.  cablearán a `<input type="color">` nativo de HTML5.

## [2.0.0] — 2025-04-19

## [2.0.1] — 2026-08-16

Versión heredada de upstream (Father Barry). Reintroducida en este repo como

línea base tras el fork.- Fase 1 — Fix `HDU_LOGO ` (constante con espacio final en `helpdesk_defines.php`).  Archivo: `plugin.xml` — bloque `<dependencies>`.



### AddedRelease "puente" para desbloquear la instalación limpia sobre e107 2.3.x /



- Compatibilidad declarada con e107 **2.3** (atributo `compatibility` dePHP 8.0+. No cambia esquema de BD ni prefs — no requiere migración.- Fase 1 — Renombrado de tabla `hdunit` → `hdu_tickets` con upgrade path en- **Warnings PHP 8 al entrar a `helpdesk.php`** (`Undefined variable $R1`,

  `plugin.xml`) y PHP **8.0.0** (dependencia `<PHP name='core' min_version>`).

- Prefs de colores por prioridad (`hduprefs_p1col`..`p5col`), rate/hora,

  auto-cierre, escalado, notificaciones por email / PM.

### Fixed  `helpdesk_setup.php::upgrade_post()` (respeta datos existentes).  `$hdu_goto`, `$hdu_aaction`). Inicialización explícita + `$_POST['x'] ?? …`

### Known limitations (pendientes de fases 1–3)



- Admin CRUD (categorías, helpdesks, técnicos, resoluciones, fixes) todavía se

  hace con formularios manuales; no usa `e_admin_ui`.- **Instalación bloqueada por dependencia obligatoria** `bootstrap_colorpicker`.- Fase 2 — Seguridad: sustituir interpolación SQL por `e107::getDb()->select()`  en todos los accesos. Se corrige además un bug lógico: `hdu_savemsg` (mensaje

- Templates HTML sin Bootstrap 5 — se ven rotos sobre temas modernos.

- Notificaciones no pasan por `e107::getNotify()` — no aparecen en el panel de  Ya no se exige ese plugin externo para instalar Helpdesk. Los prefs de color

  suscripciones estándar del core.

- Interpolación SQL directa en varios sitios (`"hd_id={$id}"`) — requiere  de prioridad (`hduprefs_p1col`..`p5col`) siguen funcionando; en Fase 1 se  con placeholders + tokens CSRF en formularios frontend (`e107::getForm()->token()`).  flash) se estaba escribiendo sobre `$R1` (filtro de lista), por lo que tras

  sanitización de Fase 2 aunque el `$id` sea `(int)`.

  cablearán a `<input type="color">` nativo de HTML5.

  Archivo: `plugin.xml` → bloque `<dependencies>`.- Fase 3 — Migración de `admin/admin_cat.php`, `admin_res.php`, `admin_fixes.php`,  cualquier acción la lista pasaba a filtrarse por el texto del mensaje.

- **Warnings PHP 8 al entrar a `helpdesk.php`** (`Undefined variable $R1`,

  `$hdu_goto`, `$hdu_aaction`). Inicialización explícita + `$_POST['x'] ?? …`  `admin_desk.php` a `e_admin_ui` con `$fields` (piloto: categorías).  Archivo: `helpdesk.php`.

  en todos los accesos.

- **Bug lógico en el filtro de lista**: `hdu_savemsg` (mensaje flash) se estaba- Fase 3b — Nuevas pestañas **User Guide** y **About** en `admin/admin_config.php`

  escribiendo sobre `$R1` (filtro activo), por lo que tras cualquier acción la

  lista pasaba a filtrarse por el texto del mensaje.  siguiendo el patrón de 4 capas descrito en `GUIA_DESARROLLO_PLUGINS_E107.md`### Notes

  Archivo: `helpdesk.php`.

  §12 (Layer 1 controller · Layer 2 template · Layer 3 LANs lazy · Layer 4- Release "puente" para desbloquear la instalación limpia sobre e107 2.3.x /

### Notes

  shortcodes con lógica).  PHP 8.0+. No cambia esquema de BD ni prefs — no requiere migración.

- Verificado con e107 2.3.4 + PHP 8.3 sobre WAMP.

- Próximos pasos: seguir `MIGRATION_PLAN.md` (Fase 1: estabilización PHP 8,- Siguientes pasos, seguir `MIGRATION_PLAN.md` (Fase 1: estabilización PHP 8,

  Fase 2: seguridad SQL/CSRF, Fase 3+: migración a `e_admin_ui` + patrón 4-capas).

---  Fase 2: seguridad SQL/CSRF, Fase 3+: migración a `e_admin_ui` + 4-layer).

---



## [2.0.0] — 2025-04-19

## [2.0.1] — 2026-08-16## [2.4.1] — 2026-05-18

Versión heredada de upstream (Father Barry). Reintroducida en este repo como

línea base tras el fork.



### AddedRelease "puente" para desbloquear la instalación limpia sobre e107 2.3.x /### Changed



- Compatibilidad declarada con e107 **2.3** (atributo `compatibility` dePHP 8.0+. No cambia esquema de BD ni prefs — no requiere migración.

  `plugin.xml`) y PHP **8.0.0** (dependencia `<PHP name='core' min_version>`).

- Prefs de colores por prioridad (`hduprefs_p1col`..`p5col`), rate/hora,- **Repository layout**: plugin files are now stored under `e107_plugins/booking/`

  auto-cierre, escalado, notificaciones por email / PM.

### Fixed  inside the repository root, mirroring the on-disk path expected by e107's

### Known limitations (pendientes de fases 1–3)

  plugin manager. This matches the convention required by the upstream e107

- Admin CRUD (categorías, helpdesks, técnicos, resoluciones, fixes) todavía se

  hace con formularios manuales; no usa `e_admin_ui`.- **Instalación bloqueada por dependencia obligatoria** `bootstrap_colorpicker`.  Lite plugin pack (see `Jimmi08/e107-2.3.x-Lite#41`) so the repo can be

- Templates HTML sin Bootstrap 5 — se ven rotos sobre temas modernos.

- Notificaciones no pasan por `e107::getNotify()` — no aparecen en el panel de  Ya no se exige ese plugin externo para instalar Helpdesk. Los prefs de color  vendored via `git submodule add` or referenced directly by `pluginpack.xml`.

  suscripciones estándar del core.

- Interpolación SQL directa en varios sitios (`"hd_id={$id}"`) — requiere  de prioridad (`hduprefs_p1col`..`p5col`) siguen funcionando; en Fase 1 se- No functional changes — this release is layout-only and fully backwards

  sanitización de Fase 2 aunque el `$id` sea `(int)`.

  cablearán a `<input type="color">` nativo de HTML5.  compatible with `v2.4.0`. Existing installs do **not** need to reinstall

  Archivo: `plugin.xml` → bloque `<dependencies>`.  or re-run any migration.

- **Warnings PHP 8 al entrar a `helpdesk.php`** (`Undefined variable $R1`,

  `$hdu_goto`, `$hdu_aaction`). Inicialización explícita + `$_POST['x'] ?? …`### Notes for maintainers

  en todos los accesos.

- **Bug lógico en el filtro de lista**: `hdu_savemsg` (mensaje flash) se estaba- Full Git history is preserved through the move (rename detection at 100 %

  escribiendo sobre `$R1` (filtro activo), por lo que tras cualquier acción la  similarity for all files except `plugin.xml` — version bump only, and this

  lista pasaba a filtrarse por el texto del mensaje.  `CHANGELOG.md`).

  Archivo: `helpdesk.php`.

## [2.4.0] - 2026-05-11

### Notes

### Added

- Verificado con e107 2.3.4 + PHP 8.3 sobre WAMP.

- Próximos pasos: seguir `MIGRATION_PLAN.md` (Fase 1: estabilización PHP 8,#### Architecture — User Guide 4-layer pattern (mirrors `sitedown_styles` v2.2)

  Fase 2: seguridad SQL/CSRF, Fase 3+: migración a `e_admin_ui` + patrón 4-capas).- New **About** tab in the admin panel — dedicated `aboutPage()` controller exposing

  identity, version, release date, license, contact, support links and donate / review CTAs.

---- New `templates/booking_about_template.php` (Layer 2) — pure HTML using

  `{LAN_PLUGIN_BOOKING_ABOUT_*}` (i18n) and `{BOOKING_ABOUT_*}` (dynamic) tokens.

## [2.0.0] — 2025-04-19- New `shortcodes/batch/booking_about_shortcodes.php` (Layer 4) — only logic-bearing

  shortcodes (metadata grid, button bar, year). Plugin metadata is injected via

Versión heredada de upstream (Father Barry). Reintroducida en este repo como  `setVars(getPluginInfo())`, never duplicated.

línea base tras el fork.- New `languages/<Lang>/<Lang>_admin_about.php` (Layer 3, **lazy-loaded**) — EN / ES / PT.

- New `languages/<Lang>/<Lang>_admin_help.php` (Layer 3, **lazy-loaded**) — extracted the

### Added  231 `LAN_BOOKING_GUIDE_*` constants per locale from the monolithic `<Lang>_admin.php`.

- New `getPluginInfo()` private method on `booking_admin_ui` — single source of truth for

- Compatibilidad declarada con e107 **2.3** (atributo `compatibility` de  plugin identity. Version + release date are read dynamically from `plugin.xml` via

  `plugin.xml`) y PHP **8.0.0** (dependencia `<PHP name='core' min_version>`).  `e107::getPlug()->load('booking')->getMeta()`, eliminating drift between files.

- Prefs de colores por prioridad (`hduprefs_p1col`..`p5col`), rate/hora,- New `_resolveLans($html, $prefix)` helper — regex pre-pass that substitutes

  auto-cierre, escalado, notificaciones por email / PM.  `{LAN_<PREFIX>_*}` tokens before `parseTemplate()` dispatches the shortcodes

  (parseTemplate does not auto-resolve LAN tokens).

### Known limitations (pendientes de fases 1–3)- Sidebar widget (`renderHelp()`) now links to the new About page via "More info »".



- Admin CRUD (categorías, helpdesks, técnicos, resoluciones, fixes) todavía se### Changed

  hace con formularios manuales; no usa `e_admin_ui`.

- Templates HTML sin Bootstrap 5 — se ven rotos sobre temas modernos.- `guidePage()` now lazy-loads `e107::lan('booking', 'admin_help', true)` — Guide LAN

- Notificaciones no pasan por `e107::getNotify()` — no aparecen en el panel de  constants are no longer paid for on Dashboard, Reservations, Settings, Availability,

  suscripciones estándar del core.  etc. Reduces parsed PHP per non-Guide admin page by ~270 `define()` calls per locale.

- Interpolación SQL directa en varios sitios (`"hd_id={$id}"`) — requiere- `shortcodes/batch/booking_guide_shortcodes.php` rewritten from **1239 lines → 52 lines**

  sanitización de Fase 2 aunque el `$id` sea `(int)`.  (-96%). The 224 LAN-proxy shortcodes (`sc_booking_guide_*` returning `defset()` of a

  matching constant) are now resolved by a single `__call()` magic method that maps
  `sc_booking_guide_<name>` → `LAN_BOOKING_GUIDE_<NAME>`. Any future shortcode that needs
  real logic can be declared explicitly — it will take precedence over `__call()`.
- `<Lang>_admin.php` shrunk from 800 → 527 lines (EN), 791 → 520 lines (ES), 791 → 520
  lines (PT).
- `plugin.xml` `version` → `2.4.0`, `date` → `2026-05-11`.

### Removed

- 224 hand-written LAN-proxy shortcodes from `booking_guide_shortcodes.php`. Replaced by
  the magic `__call()` resolver — same template tokens, same i18n behaviour, zero
  maintenance cost.

### Migration notes

- **No DB schema changes.** This is a pure admin-UI / i18n refactor.
- **No prefs changed.** Existing settings remain valid.
- **No template tokens changed.** Existing theme overrides of
  `templates/booking_guide_template.php` continue to work unchanged.
- **No public API changed.** `e107::getScBatch('booking_guide', 'booking')` returns the
  same class (`plugin_booking_booking_guide_shortcodes`) with the same shortcode names —
  themes that subclass it keep working.
- The `vendor/` directory is still gitignored; users must run `composer install --no-dev
  --optimize-autoloader` after pulling this release (unchanged from prior versions).

## [2.3.0] - 2026-03-25

### Added

#### Google Calendar API Integration
- `includes/booking_google.class.php` — full Google Calendar API v3 integration with OAuth 2.0 flow.
- OAuth2 lifecycle: `getAuthUrl()`, `handleAuthCallback()`, `refreshAccessToken()`, `disconnect()`.
- CRUD operations: `createEvent($reservation)`, `updateEvent($eventId, $data)`, `deleteEvent($eventId)`.
- `getBusyPeriods($dateStart, $dateEnd)` — free/busy sync to avoid conflicts.
- Auto-sync on reservation creation and cancellation via `syncGoogleCalendar()` wrapper.

#### Google Meet Integration
- Automatic Google Meet link generation when `gmeet_enabled` is active.
- Meet link stored in `res_gcal_meet_link` column and displayed in confirmation.
- Conference data passed via Google Calendar API `conferenceData` parameter.

#### Zoom API Integration
- `includes/booking_zoom.class.php` — Zoom Server-to-Server OAuth integration.
- `createMeeting($reservation)` — auto-creates Zoom meeting on booking confirmation.
- `deleteMeeting($meetingId)` — deletes meeting on cancellation.
- Configurable waiting room, auto-recording (none/local/cloud).
- Meeting data stored in `res_zoom_join_url` and `res_zoom_meeting_id` columns.

#### SMS Notifications
- `includes/booking_messaging.class.php` — multi-provider SMS/WhatsApp messaging.
- Twilio SMS integration with E.164 phone normalization.
- seven.io (SMS77) SMS integration as alternative provider.
- Sends confirmation, reminder, and cancellation messages.
- `res_sms_sent` column tracks SMS delivery status.
- Integrated into `sendReminders()` cron task.

#### WhatsApp Notifications
- Twilio WhatsApp API integration.
- Meta WhatsApp Cloud API v18.0 integration (alternative provider).
- Rich-formatted messages with emoji for confirmation/reminder/cancellation.
- `res_whatsapp_sent` column tracks WhatsApp delivery status.
- Configurable provider selection (Twilio or Meta).

#### Schema.org AggregateRating + Review
- `booking_reviews` table — stores customer reviews (rating 1-5, text, active/approved status).
- `buildAggregateRating()` — generates JSON-LD AggregateRating from approved reviews.
- `buildReviews()` — generates individual Review JSON-LD (up to 10 most recent).
- Reviews CRUD mode in admin panel with full list/create/edit functionality.
- Star rating display in admin UI with inline editing.

#### Schema.org Event
- `buildEventSchema()` — generates Schema.org Event JSON-LD for upcoming available slots.
- Configurable maximum events to include (1-50).
- Each slot published as a bookable `Event` for Google rich results.

#### Admin UI: Integrations Tab
- New settings tab 3 "Integrations" with all Google Calendar, Zoom, SMS, WhatsApp prefs.
- Google Calendar: Client ID, Client Secret, Calendar ID fields.
- Zoom: Account ID, Client ID, Client Secret, User ID, Waiting Room toggle, Auto Record dropdown.
- SMS: Provider dropdown (Twilio/seven.io), phone prefix, provider-specific credentials.
- WhatsApp: Provider dropdown (Twilio/Meta), provider-specific credentials.
- SEO tab extended: Reviews Schema toggle, Event Schema toggle, Max Events number.

### Changed
- `booking.class.php` — `createReservation()` now hooks Google Calendar sync and messaging confirmation.
- `booking.class.php` — `updateStatus()` now hooks Zoom creation, Google Calendar sync, and messaging on confirmation; integration cancellation and messaging on cancellation.
- `booking.class.php` — `sendReminders()` now includes SMS/WhatsApp reminder alongside email.
- `booking_schema.class.php` — `render()` now outputs multiple JSON-LD blocks (LocalBusiness + AggregateRating + Review + Event).
- `admin_config.php` — added `reviews` dispatcher mode, Reviews menu items, and 33 new plugin prefs.
- `plugin.xml` — version 2.3.0, 33 new prefs for all integrations.

### Database
- `booking_reservations` — 6 new columns: `res_gcal_event_id`, `res_gcal_meet_link`, `res_zoom_join_url`, `res_zoom_meeting_id`, `res_sms_sent`, `res_whatsapp_sent`.
- `booking_reviews` — new table with columns: `rev_id`, `rev_reservation_id`, `rev_user_id`, `rev_rating`, `rev_text`, `rev_active`, `rev_created`.

### Roadmap
- **100% completion** — all roadmap items from v1.1 through v1.6 are now implemented ✅

## [2.2.0] - 2026-03-24

### Added

#### e107 User System Integration
- `e_user.php` — user profile hook displaying booking history (total/upcoming/cancelled), next appointment, and session credits on user profile pages.
- `getLoggedInUserData()` method — returns logged-in user data (name, lastname, email, phone, userclass) for form auto-fill.
- `getUserReservations($userId, $status, $limit)` method — queries reservations by user ID with optional status filter and limit.
- AJAX `get_options` response now includes `logged_in_user` data for automatic form pre-population.

#### Userclass Restrictions
- `evt_userclass` column on `booking_event_types` — restrict event types to specific e107 userclasses (0 = public/everyone).
- `canUserBookEventType($eventTypeId)` method — checks if current user can book a specific event type based on userclass.
- `filterEventTypesByUserclass($eventTypes)` method — filters event type array by current user's class membership.
- Userclass validation in AJAX `book` action — prevents booking if user lacks permission for the event type.
- `evt_userclass` field in admin Event Types UI — dropdown with public/member/admin/main/custom classes.

#### Session Credits (Bonos)
- `booking_credits` table — stores credit packages with user, event type, total, used, expiry, note, active status.
- `getUserCredits($userId, $eventTypeId)` — returns available credit balance for a user.
- `useCredit($userId, $eventTypeId)` — consumes one credit using FIFO priority (specific type first, then generic, ordered by expiry).
- `addCredits($userId, $total, $eventTypeId, $expires, $note)` — creates a new credit package.
- `getUserCreditPackages($userId, $activeOnly)` — lists all credit packages for a user.
- Credits admin UI (`booking_credits_ui`) — full CRUD with user picker, event type dropdown, total/used tracking, expiry and notes.
- AJAX `get_options` response includes `credits_enabled` flag and `user_credits` balance.
- AJAX `book` action supports `use_credits=1` parameter to consume a credit instead of payment.
- `credits_enabled` preference in Settings › Payments tab.

#### Native e107 Notifications
- `e_notify.php` — notification handler with 4 events: `booking_created`, `booking_confirmed`, `booking_cancelled`, `booking_reminder`.
- `triggerEvent($eventName, $data)` method — fires e107 event system triggers.
- Events triggered automatically from `createReservation()` and `updateStatus()`.
- Notification handlers format subject/message with booking details (name, email, date, time).
- Configurable via Admin › Preferences › Notify.

#### Language Support
- 40+ new constants per admin language file (EN/ES/PT) for credits, userclass, notifications and profile sections.
- 8 new constants per frontend language file (EN/ES/PT) for userclass errors and credit messages.

### Changed
- `plugin.xml` version bumped to 2.2.0 with `credits_enabled` preference.
- `booking_sql.php` updated with `booking_credits` table and `evt_userclass` column.
- `booking_setup.php` upgrade routine handles v2.1 → v2.2 migration.
- `admin_config.php` — added credits dispatcher mode, menu entries, credits_enabled pref, evt_userclass field.
- Database now contains **10 tables** (added `booking_credits`).

## [2.1.0] - 2026-06-14

### Added

#### Self-Service Cancellation
- `booking_cancel.php` — standalone cancellation page with 2-step flow (preview → confirm), past-date protection, already-cancelled detection, invalid token handling.
- `getCancelUrl($reservation)` method — generates full URL with token for cancellation pages.
- `buildCancelLinkHtml($reservation)` method — returns styled "Need to cancel? Click here" link for email bodies.
- `sendAdminCancellationNotification($reservation)` — notifies site admin when a visitor cancels their booking.
- Cancel link automatically included in confirmation emails (`buildEmailBody`) and status-change emails for confirmed bookings (`buildStatusChangeEmailBody`).

#### Automatic Email Reminders
- `e_cron.php` — e107 cron handler with `sendReminders()` task for periodic execution.
- `sendReminders()` method in `booking.class.php` — queries upcoming reservations (status 0 or 1, not yet reminded) within the configurable time window and sends reminder emails.
- `sendReminderEmail($reservation)` — sends individual reminder with appointment details and cancel link.
- `buildReminderEmailBody($reservation)` — professional HTML email template with blue heading, details table, calendar links, and cancellation option.
- `res_reminder_sent` column on `booking_reservations` — tracks whether a reminder has been sent (prevents duplicates).
- Admin settings: `reminder_enabled` (boolean toggle) and `reminder_hours` (1–168h window, default 24h).

#### PDF & Excel Export
- `includes/booking_export.php` — export class with `exportPdf()` and `exportExcel()` methods.
- **PDF export** (DomPDF): A4 landscape, styled HTML table with colour-coded statuses, payment amounts, site branding, and generation timestamp.
- **Excel export** (PhpSpreadsheet): .xlsx with bold white-on-dark headers, auto-size columns, auto-filter, freeze panes, conditional status colours (yellow/green/red), currency formatting.
- Export buttons in admin sidebar (visible on reservation list view): red PDF button + green Excel button.
- Filter support: status (all/pending/confirmed/cancelled), date range (from/to).
- `composer.json` — requires `dompdf/dompdf ^2.0` and `phpoffice/phpspreadsheet ^1.29`.

#### Language Support
- 17 new frontend constants per language (EN/ES/PT) for cancellation page and reminder emails.
- 8 new admin constants per language (EN/ES/PT) for reminder settings and export buttons.

### Changed
- `plugin.xml` version bumped to 2.1.0 with 2 new pluginPrefs (`reminder_enabled`, `reminder_hours`).
- `booking_sql.php` updated with `res_reminder_sent` column definition.
- `booking_setup.php` upgrade routine handles v2.0 → v2.1 migration (ALTER TABLE + new prefs).
- `admin_config.php` — added reminder settings in General tab, export handler in `init()`, export buttons in `renderHelp()`.
- Confirmation emails now include self-service cancellation link.
- Status-change emails (confirmed only) now include cancellation link.
- `.gitignore` updated to exclude `vendor/` directory.

## [1.3.0] - 2026-03-23

### Added

#### Payment Gateway Integration
- Abstract payment gateway architecture (`booking_gateway_base.class.php`) — pluggable gateway system with `createPayment()`, `verifyPayment()`, `handleWebhook()`, `getPublicKey()`.
- **Stripe** gateway (`booking_stripe.class.php`) — Payment Intents API, client-side confirmation via `client_secret`, webhook signature validation.
- **PayPal** gateway (`booking_paypal.class.php`) — Orders API v2, client credentials auth, redirect-based flow with `approve_url`, webhook verification.
- **Eupago** gateway (`booking_eupago.class.php`) — MBWay and Multibanco references for Portuguese payment methods, callback validation.
- Gateway factory method `getPaymentGateway($gateway, $mode)` in `booking.class.php` — auto-loads gateway classes from `includes/gateways/`.
- Webhook endpoint (`includes/booking_webhook.php`) — routes incoming gateway callbacks to the correct handler, updates reservation payment status.
- Payment return/callback endpoint (`includes/booking_payment.php`) — handles success/cancel redirects, verifies payments, sends confirmation emails.

#### Coupon / Discount System
- `booking_coupons` database table — code, type (percent/fixed), value, min amount, max uses, usage counter, date range, active toggle.
- Full coupon CRUD in admin panel via `booking_coupons_ui` class — list, create, edit, delete with inline editing and filters.
- `booking.class.php` methods: `getCoupon()`, `getCouponByCode()`, `getCoupons()`, `validateCoupon()`, `applyCoupon()`, `incrementCouponUsage()`, `createCoupon()`, `updateCoupon()`, `deleteCoupon()`.
- AJAX `validate_coupon` action — validates coupon code and returns discount info in real time.
- AJAX `calculate_price` action — calculates final price for event type with optional coupon.

#### Reservation Payment Tracking
- 5 new columns on `booking_reservations`: `res_payment_status` (0=none, 1=pending, 2=completed, 3=failed), `res_payment_amount`, `res_payment_method`, `res_payment_id`, `res_coupon_id`.
- Payment status badges in admin reservation list with color-coded labels.
- `updatePaymentStatus()`, `calculateBookingPrice()`, `isPaymentRequired()` methods.

#### Event Type Pricing
- `evt_price` (DECIMAL) and `evt_currency` (VARCHAR) columns on `booking_event_types` — per-event-type pricing.
- Price and currency fields in admin Event Types UI with inline editing.
- Price info exposed in `get_options` AJAX response for frontend display.

#### Admin & Settings
- 12 new plugin preferences: `payment_enabled`, `payment_gateway`, `payment_mode`, `payment_currency`, `coupons_enabled`, `stripe_public_key`, `stripe_secret_key`, `paypal_client_id`, `paypal_secret`, `eupago_api_key`, `eupago_method`.
- Payment settings section in admin preferences panel.
- Coupons management section in admin navigation (list + create).

#### Language Support
- 80+ new language constants per language for payment flow, coupon UI, gateway labels, error messages, and admin settings.
- Full translations for English, Spanish, and Portuguese.

### Changed
- `booking_ajax.php` — `book` action now integrates payment flow (price calculation, coupon application, gateway initiation); free events skip payment.
- `get_options` AJAX response now includes `price`, `currency` per event type and payment configuration info.

### Fixed
- `booking_ajax.php` — Fixed unreachable `case 'ical'` that was placed after `default:` in switch statement.

## [1.2.0] - 2026-03-22

### Added

#### Multiple Hosts (Team Members)
- `booking_hosts` table — stores team members who can receive bookings (name, email, phone, bio, color, active status, sort order, linked e107 user).
- Admin CRUD for hosts via `e_admin_ui` pattern — list, create, edit, delete with inline editing.
- `res_host_id` column on `booking_reservations` — links each booking to a specific host.
- `booking.class.php` — `getHost()`, `getHosts()`, `getHostOptions()` methods.
- Default host auto-created from site admin during upgrade.

#### Multiple Event Types
- `booking_event_types` table — different appointment types with individual title, description, duration, color, active status, sort order.
- Admin CRUD for event types via `e_admin_ui` pattern.
- `res_event_type_id` column on `booking_reservations` — links each booking to an event type.
- `booking.class.php` — `getEventType()`, `getEventTypes()`, `getEventTypeOptions()` methods.
- Default event type auto-created from existing config during upgrade.
- Each event type can have its own duration, overriding the global `slot_duration` setting.

#### Per-Day Schedules
- `booking_day_schedules` table — different start/end times for each day of the week, optionally per host.
- Admin page "Day Schedules" — visual grid to enable/disable days and set time ranges.
- `booking.class.php` — `getDaySchedule()`, `getDaySchedules()`, `saveDaySchedules()`, `getDayNames()` methods.
- When enabled, overrides the global `time_start` / `time_end` settings per day.
- Default day schedules auto-seeded from existing `days_available` / `time_start` / `time_end` config during upgrade.

#### Buffer Between Appointments
- New `buffer_minutes` plugin preference — configurable rest time between consecutive slots.
- `getAvailableSlots()` now uses `duration + buffer` as the step between slots.
- Ensures the last slot fits entirely before closing time.

#### Settings (v1.2)
- `buffer_minutes` — minutes of rest between consecutive appointments (default: 0).
- `day_schedules_enabled` — toggle per-day time ranges (default: off).
- `multi_host_enabled` — toggle multiple hosts feature (default: off).
- `multi_event_enabled` — toggle multiple event types feature (default: off).

#### Admin Panel
- New admin menu items: Hosts, Add Host, Event Types, Add Event Type, Day Schedules.
- Reservation fields now include Host and Event Type (filter/batch capable).
- Day Schedules page with 7-day grid, per-host support, and active/inactive toggles.

#### AJAX Endpoint
- `get_slots` now accepts `event_type_id` and `host_id` parameters for type-specific slot generation.
- `book` action now stores `res_host_id` and `res_event_type_id` in the reservation.
- New `get_options` action — returns active event types and hosts for frontend selectors.

#### Multi-language
- 60+ new language constants added to English, Spanish, and Portuguese admin files.
- Covers hosts, event types, day schedules, buffer settings, and day names.

### Changed
- `getAvailableSlots()` signature extended with optional `$eventTypeId` and `$hostId` parameters (backward compatible).
- Slot generation now checks that each slot fits entirely before closing time (previously could generate a partial last slot).
- `createReservation()` now includes `res_host_id` and `res_event_type_id` fields.
- `plugin.xml` version bumped to 1.2.0 with 4 new pluginPrefs.
- `booking_sql.php` updated with 3 new tables and 2 new columns + indexes on reservations.
- `booking_setup.php` upgrade routine handles v1.1 → v1.2 migration (tables, columns, default data, new prefs).

## [1.1.0] - 2026-03-22

### Added
- iCal export (.ics) — visitors can add appointments to Google Calendar, Outlook or download .ics file.
- Calendar links in confirmation emails and status change emails.
- User Guide admin page with tabbed navigation (Overview, Configuration, Reservations, Availability, iCal, Troubleshooting).
- Guide template+shortcodes architecture (54 shortcodes, 6 template keys).
- Admin CSS extracted to `css/booking_admin.css`.

## [1.0.0] - 2026-03-22

### Added

#### Core Structure
- `plugin.xml` — Plugin manifest with metadata, adminLinks, siteLinks, 14 pluginPrefs, userClasses.
- `booking_sql.php` — DDL for 3 InnoDB tables: `booking_config`, `booking_reservations`, `booking_blocked`.
- `booking_setup.php` — Install/uninstall/upgrade hooks with 14 default config rows.

#### Frontend
- `booking.php` — Frontend controller with HEADERF/FOOTERF, i18n JSON injection, breadcrumb.
- `booking_menu.php` — Menu widget for theme menu areas.
- `templates/booking_template.php` — HTML templates with `{BOOKING_*}` shortcode placeholders (3-step flow: calendar → form → confirmation).
- `shortcodes/batch/booking_shortcodes.php` — Shortcode class (`e_shortcode`) with ~30 methods.
- `css/booking.css` — Complete frontend styles extracted from prototype, all selectors prefixed with `.booking-`.
- `js/booking.js` — AJAX-driven calendar, slot selection, form submission with CSRF token support.

#### Business Logic
- `includes/booking.class.php` — Core class (~480 lines): config management, availability checking, slot generation, reservation CRUD, date blocking, email sending, validation.
- `includes/booking_ajax.php` — AJAX endpoint with 3 actions: `get_days`, `get_slots`, `book`.

#### Admin Panel
- `admin_config.php` — Admin dispatcher (`e_admin_dispatcher`) + UI (`e_admin_ui`) for reservations CRUD, plugin settings, and availability management (date/slot blocking).

#### e107 Hooks
- `e_header.php` — Auto-load CSS/JS on frontend pages.
- `e_url.php` — SEF URL route `/booking/`.

#### Multi-language (EN / ES / PT)
- `languages/English/English_global.php` — Plugin metadata, status labels, day/month names.
- `languages/English/English_front.php` — Frontend UI strings (3-step form, validation, confirmation).
- `languages/English/English_admin.php` — Admin panel strings (reservations, settings, availability).
- `languages/Spanish/Spanish_global.php` — Spanish translations.
- `languages/Spanish/Spanish_front.php` — Spanish frontend translations.
- `languages/Spanish/Spanish_admin.php` — Spanish admin translations.
- `languages/Portuguese/Portuguese_global.php` — Portuguese translations.
- `languages/Portuguese/Portuguese_front.php` — Portuguese frontend translations.
- `languages/Portuguese/Portuguese_admin.php` — Portuguese admin translations.

#### Documentation
- `CHANGELOG.md` — This file.
- `booking-app.html` — Standalone HTML/CSS/JS prototype (pre-existing).
