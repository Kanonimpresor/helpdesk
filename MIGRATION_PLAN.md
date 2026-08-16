# Helpdesk — Plan de Migración

> **Estado**: Borrador vivo · última revisión 2026-08-16.
> **Objetivo**: Llevar `helpdesk` de v2.0 (legacy Father Barry) a v2.4.x
> (moderno, seguro, alineado con `GUIA_DESARROLLO_PLUGINS_E107.md`) sin romper
> instalaciones existentes.

Este plan mapea **1 fase = 1 release SemVer**. Cada fase es un PR
auto-contenido y revisable de forma independiente.

---

## 0. Fase 0 — Puesta en marcha ✅ (release `2.0.1` — 2026-08-16)

Ya aplicada.

- ✅ Composer: `composer install` desde repo root (deps del core).
- ✅ Quitar dependencia obligatoria de `bootstrap_colorpicker` en `plugin.xml`.
- ✅ Inicializar variables y proteger accesos `$_POST` en `helpdesk.php`
  (elimina warnings PHP 8).
- ✅ Fix bug de sesión: `hdu_savemsg` sobreescribía `$R1` (filtro de lista).

**Resultado**: instalación limpia + navegación pública sin warnings.

---

## 1. Fase 1 — Estabilización PHP 8.x → v2.1.0

**Objetivo**: código que corra sin `E_DEPRECATED` en PHP 8.2+ y esté
preparado para 8.3/8.4.

### 1.1 Refactor `includes/helpdesk_class.php`

- Reemplazar todos los `var $x;` por `public ?tipo $x = default;`.
- Añadir `declare(strict_types=1);` en archivos nuevos (no en el legacy para
  evitar cascada de casts).
- Sustituir `intval()` por `(int)`, `strval()` por `(string)`.
- Añadir `?? default` en todo acceso `$_GET/$_POST/$_REQUEST/$_SESSION`.
- Tipar retorno de métodos internos que ya son deterministas (`bool`, `int`,
  `array`).

### 1.2 Fixes puntuales

- `helpdesk_defines.php`: constante `HDU_LOGO ` tiene un espacio final → romper
  `defined()` checks. Corregir a `HDU_LOGO`.
- `plugin.xml`: bump `version="2.1.0"` + `date` actual.
- Eliminar bloques `/* … */` comentados de código muerto (grep `// mysql_`).

### 1.3 Rename tabla `hdunit` → `hdu_tickets`

- Crear `helpdesk_setup.php` con `function helpdesk_setup(...)`:
  - `install_post`: no-op (tabla se crea ya con el nombre nuevo desde
    `helpdesk_sql.php`).
  - `upgrade_post`: `RENAME TABLE #hdunit TO #hdu_tickets` **solo si**
    `#hdu_tickets` no existe y `#hdunit` sí.
- Actualizar `helpdesk_sql.php` con el nombre nuevo.
- Buscar/reemplazar en todo el plugin: `\bhdunit\b` → `hdu_tickets`.

### 1.4 Composer opcional

- Añadir `composer.json` del plugin declarando `php: ">=8.0"`. No añade deps
  todavía; sirve de anclaje para futuras (Fase 7).

**Riesgo**: medio (rename tabla). Mitigación: script `upgrade_post` idempotente
+ backup previo documentado en README.

**Commit sugerido**: `refactor(php8): typed props, safe superglobals, rename hdunit→hdu_tickets`

---

## 2. Fase 2 — Seguridad → v2.2.0

### 2.1 SQL con placeholders

Reemplazar todo `"campo={$var}"` por API estructurada:

```php
// antes
$sql->select('helpdesk', '*', "hd_id={$id}");
// después
$sql->select('hdu_tickets', '*', ['hd_id' => (int)$id]);
// o para queries complejos:
$sql->gen("SELECT * FROM #hdu_tickets WHERE hd_id = :id", [':id' => (int)$id]);
```

Fichero a fichero: `helpdesk.php`, `includes/helpdesk_class.php`,
`admin/admin_*.php`.

### 2.2 CSRF en frontend

- Añadir `e107::getForm()->token()` a todo `<form method="post">` fuera de
  admin (admin ya lo hace vía `e_admin_ui`).
- Verificar en el handler con `e107::getSession()->check(true)`.

### 2.3 Sanitización de salida

- Ecos directos de campos DB → `e107::getParser()->toHTML($v, true, 'BODY')`.
- Emails de usuario: `filter_var($email, FILTER_VALIDATE_EMAIL)`.

### 2.4 Rate-limit alta tickets

- Nuevo pref `hduprefs_ratelimit` (segundos entre tickets por usuario).
- Check contra `hdu_datestamp` del último ticket del usuario.

**Commit sugerido**: `security(sql,csrf,xss): placeholders + tokens + parser sanitize`

---

## 3. Fase 3 — Admin `e_admin_ui` → v2.3.0

Objetivo: eliminar los formularios legacy de `admin/admin_*.php`.

### 3.1 Piloto — `admin/admin_cat.php` (categorías)

Convertir a `class helpdesk_cat_ui extends e_admin_ui` con `$fields`:

```php
protected $fields = [
    'hducat_id'       => ['type' => 'number', 'primary' => true],
    'hducat_category' => ['title' => HDU_A_CAT,  'type' => 'text',     'inline' => true, 'required' => true],
    'hducat_helpdesk' => ['title' => HDU_A_DESK, 'type' => 'dropdown', 'writeParms' => ['optArray' => $this->getHelpdesks()]],
    'hducat_order'    => ['title' => LAN_ORDER,   'type' => 'number',   'inline' => true],
    'options'         => ['type' => 'method'],
];
```

Se obtiene gratis: paginación, filtro, orden, batch delete, i18n de columnas,
look consistente con el resto del admin core.

### 3.2 Resto de CRUDs

Replicar patrón:

- `admin/admin_res.php` → estados / resoluciones.
- `admin/admin_fixes.php` → fixes con coste.
- `admin/admin_desk.php` → helpdesks (mesas) + userclass técnicos.

### 3.3 Consolidar en un solo `admin_config.php`

Reemplazar `left_menu.php` manual por `$adminMenu` y `$adminMenuAliases` del
dispatcher.

**Commit sugerido (uno por CRUD)**:
`feat(admin): port categories CRUD to e_admin_ui`

---

## 3b. Fase 3b — User Guide + About (patrón 4-capas) → v2.4.0

Aplicar exactamente el patrón descrito en
`GUIA_DESARROLLO_PLUGINS_E107.md` §12 y §9.

### 3b.1 Capa 1 — Controlador

En `admin/admin_config.php`:

- `guidePage()` — 7 tabs (Overview, Roles, Ticket lifecycle, Categories,
  Resolutions, Notifications, FAQ).
- `aboutPage()` — versión (dinámica desde `plugin.xml`), autor, licencia,
  changelog resumido, botones donate/review.

### 3b.2 Capa 2 — Templates

- `templates/helpdesk_guide_template.php` — solo HTML, tokens
  `{HELPDESK_GUIDE_*}` y `{LAN_PLUGIN_HELPDESK_GUIDE_*}`.
- `templates/helpdesk_about_template.php` — idem con prefijo `ABOUT`.

### 3b.3 Capa 3 — LANs lazy

- `languages/<Lang>/<Lang>_admin_help.php` (Guide, ~150 constantes por locale).
- `languages/<Lang>/<Lang>_admin_about.php` (About, ~30 constantes).
- Cargados **on-demand** con `e107::lan('helpdesk', 'admin_help', true)` dentro
  del controller correspondiente.

### 3b.4 Capa 4 — Shortcodes con lógica

- `shortcodes/batch/helpdesk_guide_shortcodes.php` — solo métodos con lógica
  real; los proxies LAN se resuelven con `__call()` magic (`sc_helpdesk_guide_X`
  → `LAN_PLUGIN_HELPDESK_GUIDE_X`).
- `shortcodes/batch/helpdesk_about_shortcodes.php` — versión, año, links.

### 3b.5 `getPluginInfo()` dinámico

Leer versión + fecha desde `plugin.xml`:

```php
$meta = e107::getPlug()->load('helpdesk')->getMeta();
return ['version' => $meta['@attributes']['version'], 'date' => $meta['@attributes']['date']];
```

Elimina drift entre `plugin.xml` / `README` / About tab.

### 3b.6 Añadir locale **Spanish**

Copiar `languages/English/` → `Spanish/`, traducir. Los 3 idiomas quedan
paritarios (EN / ES / PT).

**Commit sugerido**: `feat(admin): 4-layer Guide + About tabs, add Spanish locale`

---

## 4. Fase 4 — Frontend Bootstrap 5 → v2.5.0

- Reescribir `templates/helpdesk_template.php`, `helpdesk_show_template.php`,
  `helpdesk_print_template.php`, `helpdesk_delete_template.php` con `card`,
  `table-responsive`, badges de prioridad con clases utilitarias.
- Sustituir `<td bgcolor=…>` (colores hardcoded desde prefs) por
  `<span class="badge" style="background: {PRIORITY_COLOR}">`.
- Todos los inputs vía `e107::getForm()->text()/select()/checkbox()`.
- Filtros de lista como parámetros GET semánticos: `?filter=open&priority=5`.

---

## 5. Fase 5 — URLs SEO → v2.6.0

- Crear `e_url.php` con rutas amigables:
  - `/helpdesk` → lista.
  - `/helpdesk/new` → alta.
  - `/helpdesk/ticket/{id}` → detalle.
  - `/helpdesk/list/{filter}` → filtro (`open`, `closed`, `mine`, `escalated`).
- Config en `e107_core/url/` (registro global). El pref `hduprefs_seo` (ya
  existente) pasa a activarlas.
- Meta title/description dinámicas + JSON-LD `Article` para tickets públicos
  (si el admin los expone) según `GUIA_DESARROLLO_PLUGINS_E107.md` §7.

---

## 6. Fase 6 — Notificaciones core + cron → v2.7.0

### 6.1 `e_notify.php`

Registrar eventos:

- `helpdesk_ticket_created`, `helpdesk_ticket_assigned`,
  `helpdesk_ticket_updated`, `helpdesk_ticket_closed`,
  `helpdesk_comment_added`, `helpdesk_ticket_escalated`.

Handler estándar de core → el admin decide destinatarios en Users → Notify.

### 6.2 `e_event.php`

Trigger interno de esos eventos desde `helpdesk_class.php::update_ticket()`,
`::post_comment()`, etc.

### 6.3 `e_cron.php`

- Job diario: auto-cierre según `hduprefs_autoclosedays` +
  `hduprefs_autocloseres`.
- Job diario: escalado según `hduprefs_escalatedays` +
  `hduprefs_escalateon`.
- Reemplaza el `auto_close()` invocado a mano en cada request.

---

## 7. Fase 7 — Data model & features → v2.8.0

- Nueva tabla `hdu_attachments` (mediaselector core).
- Nueva tabla `hdu_history` (audit trail — quién cambió qué, cuándo).
- Nueva tabla `hdu_sla` con reglas por categoría/prioridad.
- Widget en `e_dashboard.php`: contadores por estado, top 5 técnicos.
- `e_search.php`: búsqueda en tickets abiertos + FAQ derivadas.
- Convertir ticket cerrado en FAQ (integración con plugin `faqs`).
- REST API mínima vía `e_module.php` (`/helpdesk/api/tickets`).
- Actualizar TCPDF empotrado en `pdfout/` a versión mantenida o migrar a
  `dompdf` vía Composer.

---

## 8. Fase 8 — Tests + CI → v2.9.0

- Suite `e107_tests/tests/unit/plugins/helpdesk/`:
  - `HelpdeskClassTest.php` (dominio con PDO mock).
  - `NotifyEventsTest.php`.
- Escenario aceptación `HelpdeskTicketLifecycleCest.php`.
- GitHub Actions ejecutando `e107_tests/bin/e107-tests run unit` en cada PR.

---

## 9. Registro de riesgos

| Riesgo | Mitigación |
|---|---|
| Rename `hdunit` rompe queries externas (temas, otros plugins) | Grep exhaustivo + nota grande en CHANGELOG 2.1.0. `upgrade_post` idempotente. |
| CSRF token rompe formularios embebidos por temas custom | Documentar en `docs/UPGRADING.md`. Fase 2 va detrás de Fase 1 estable. |
| `e_admin_ui` rewrite oculta features del legacy | Migrar CRUD a CRUD comparando pantallas paralelas antes de borrar el legacy. |
| Traducciones ES/PT desfasadas del EN canónico | Script `bin/lan-diff.php` (a crear Fase 3b) que reporta constantes faltantes. |
| PHP 8.4 rompe TCPDF empotrado | Fase 7 evalúa migrar a `dompdf` via Composer. |

---

## 10. Validación por fase

Después de cada commit:

1. `php -l` sobre todos los archivos modificados.
2. Instalar plugin desde cero en una base limpia → probar upgrade sobre BD con
   datos de la fase anterior.
3. Smoke test:
   - Abrir ticket, comentar, asignar, escalar, cerrar, reabrir, borrar.
   - Verificar mails y notificaciones.
   - Exportar PDF.
4. `kluster_code_review_auto` (o revisión manual estructurada) sobre los
   archivos tocados.
5. Actualizar `CHANGELOG.md` con entrada versionada.
