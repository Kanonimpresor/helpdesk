# User Guide Pattern — 4-Layer Architecture

> **Status:** Adopted in `booking` v2.4.0 · **Origin:** `sitedown_styles` v2.x · **Author:** Martin Costa (Kanonimpresor)
>
> This is the **booking-flavoured** copy of the same pattern. The original
> proposal lives in `e107_plugins/sitedown_styles/docs/architecture/USER_GUIDE_PATTERN.md`
> and is the canonical reference if you find any discrepancy.

---

## 1. Why this document exists

Several e107 plugins ship an **in-admin "User Guide"** (a tab inside the plugin's
admin page that explains install / configuration / troubleshooting without
forcing the user to leave the back-office). The pre-2.4 `booking` Guide tab
suffered the three recurring problems the original proposal calls out:

1. **Indirection without value.** The old `booking_guide_shortcodes.php` had
   224 methods like `sc_xxx() { return defset('LAN_…', 'fallback'); }` — they
   were *not* shortcodes (no logic, no data composition), they were pure
   wrappers around a LAN constant. They doubled the maintenance surface for
   zero gain.
2. **Translatable strings carrying HTML.** Constants stored markup mixed with
   text. Translators ended up touching layout, accessibility audits failed on
   copy-only changes.
3. **Help strings loaded on every admin page.** The Guide tab declares ~231
   LAN constants per locale. e107 loads `<Lang>_admin.php` on **every** admin
   request — users paid the memory/parser cost even when they never opened
   the Guide.

The 4-layer pattern fixes all three at once.

---

## 2. The 4 layers (booking implementation)

```
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 1 — CONTROLLER                                                    │
│   admin_config.php :: guidePage()       (line ~1606)                    │
│   • Lazy-loads the help language file via e107::lan(..., 'admin_help')  │
│   • Resolves dynamic data (paths, install state, version, …)            │
│   • Pre-pass: substitutes {LAN_BOOKING_GUIDE_*} via _resolveLans()      │
│   • Hands the result to e107::getRender() / parseTemplate()             │
└─────────────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 2 — TEMPLATE                                                      │
│   templates/booking_guide_template.php  (623 lines, pure HTML)          │
│   • Array of $TPL[<tab>] HTML chunks. No PHP logic.                     │
│   • References LAN constants directly via {LAN_BOOKING_GUIDE_*}.        │
│   • References shortcodes ONLY when real logic is needed: {BOOKING_*}   │
│   • Theme-overridable in the standard e107 way.                         │
└─────────────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 3 — LANGUAGE FILE  ← LAZY-LOADED                                  │
│   languages/<Lang>/<Lang>_admin_help.php  (~231 constants)              │
│   • Plain text only. Inline <code>/<strong>/<em> allowed for emphasis.  │
│   • No structural HTML (<div>/<ul>/<table>/<button>).                   │
│   • Loaded on demand by guidePage(), not on every admin request.        │
│   • Naming: LAN_BOOKING_GUIDE_<SECTION>_<KEY>                           │
│                                                                         │
│   Sibling: <Lang>_admin_about.php — same pattern for the About tab.     │
└─────────────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 4 — SHORTCODE BATCH                                               │
│   shortcodes/batch/booking_guide_shortcodes.php  (40-line STUB)         │
│   • Currently empty (extends e_shortcode). Kept on disk so theme        │
│     overrides keep resolving.                                           │
│   • If you ever need dynamic Guide data (path, version, status badge),  │
│     add a real sc_* method here. NEVER reintroduce __call() proxies.    │
│                                                                         │
│   Sibling: booking_about_shortcodes.php — populates the About tab with  │
│   metadata read from plugin.xml (version, date, compat, license, …).    │
└─────────────────────────────────────────────────────────────────────────┘
```

---

## 3. ⚠️ Critical footgun: `__call()` does NOT work in e107 shortcode batches

**Discovered the hard way during the v2.4.0 migration.** Our first attempt
collapsed the 224 LAN-proxy methods into a single magic `__call($name, $args)`
that derived the LAN constant name on the fly. **Result: every single Guide
token rendered as an empty string and the Guide tab appeared blank.**

Root cause: `e107_handlers/shortcode_handler.php` line ~1151:

```php
if (method_exists($this->scClass, $methodName)) { … dispatch … }
```

`method_exists()` returns **`false`** for methods resolved through PHP's
magic `__call()`. Cleverly compact, totally broken. (`is_callable()` would
have caught it, but core uses `method_exists()`.)

**Rule:** never use `__call()` in an `e_shortcode` subclass. If you find
yourself proxying many LAN constants, use the **`_resolveLans()` regex
pre-pass on the controller side** instead — that is exactly what `guidePage()`
does — and delete the proxy methods.

---

## 4. The pre-pass that bridges `{LAN_*}` and `parseTemplate()`

`e_parse::parseTemplate()` only dispatches *shortcodes*; bare `{LAN_*}` tokens
are silently dropped. The 4-layer pattern relies on a tiny pre-pass in the
**Controller layer** to substitute them before `parseTemplate()` runs:

```php
private function _resolveLans($html, $prefix = 'LAN_BOOKING_GUIDE_')
{
    $pattern = '/\{(' . preg_quote($prefix, '/') . '[A-Z0-9_]+)\}/';
    return preg_replace_callback(
        $pattern,
        static function ($m) {
            return defined($m[1]) ? constant($m[1]) : $m[0];
        },
        $html
    );
}
```

Why a pre-pass instead of concatenated PHP strings (`'…'.LAN_FOO.'…'`)?
Because that approach forces raw HTML into language files — exactly what
Layer 3 forbids. The pre-pass keeps the template a single readable HTML
blob *and* keeps LAN constants pure text. Cost is one regex per tab,
only when the user opens the Guide page.

Tokens whose constant is undefined are left intact (`{LAN_BOOKING_GUIDE_…}`)
so missing translations show up loudly during development.

The same helper is reused by `aboutPage()` with the prefix
`LAN_PLUGIN_BOOKING_ABOUT_`.

---

## 5. Decision matrix — what goes where

| Need                                                     | Layer            | Example                                                 |
| -------------------------------------------------------- | ---------------- | ------------------------------------------------------- |
| Static translatable label                                | Language file    | `LAN_BOOKING_GUIDE_OVERVIEW_TITLE`                      |
| Static translatable paragraph (with inline `<code>`)     | Language file    | `LAN_BOOKING_GUIDE_INSTALL_S2`                          |
| HTML layout (panels, grids, tables)                      | Template         | `<div class="panel panel-default">…</div>`              |
| Path computed at runtime (`THEME`, plugin dir)           | Shortcode        | `{BOOKING_GUIDE_THEME_PATH}` (when needed)              |
| State badge (file exists? pref set?)                     | Shortcode        | `{BOOKING_GUIDE_STUB_STATUS}` (when needed)             |
| Number / version pulled from `plugin.xml`                | Shortcode        | `{BOOKING_ABOUT_VERSION}`                               |
| Conditional callout (only show if X)                     | Controller       | `parseTemplate` of a sub-key chosen in PHP              |

**Rule of thumb:** if the only thing your `sc_xxx()` does is `return defset('LAN_X', '…');`,
delete it. Use `{LAN_X}` in the template — and let the controller's
`_resolveLans()` pre-pass substitute it before `parseTemplate()` runs.

---

## 6. The `<Lang>_admin_help.php` and `<Lang>_admin_about.php` convention

### 6.1 File location

```
e107_plugins/booking/languages/<Lang>/<Lang>_admin_help.php
e107_plugins/booking/languages/<Lang>/<Lang>_admin_about.php
```

Mirrors the existing `<Lang>_admin.php` / `<Lang>_front.php` / `<Lang>_log.php`
convention. The `_admin_help` / `_admin_about` suffixes make the intent
explicit: **strings needed only inside the admin Guide / About tab**.

### 6.2 How to load them

```php
// admin_config.php :: guidePage()
e107::lan('booking', 'admin_help', true);

// admin_config.php :: aboutPage()
e107::lan('booking', 'admin_about', true);
```

The third parameter (`true`) is the standard "admin context" flag. Loading
is **lazy** — the file is only parsed when the user opens that specific page.
Other admin requests pay nothing.

### 6.3 What goes inside

```php
<?php
if (!defined('e107_INIT')) { exit; }

// ─────────────────────────────────────────────────────────────────────────
// Tab labels
// ─────────────────────────────────────────────────────────────────────────
define('LAN_BOOKING_GUIDE_TAB_OVERVIEW', 'Overview');
define('LAN_BOOKING_GUIDE_TAB_INSTALL',  'Install');
// …

// ─────────────────────────────────────────────────────────────────────────
// Overview tab — body copy
// ─────────────────────────────────────────────────────────────────────────
define('LAN_BOOKING_GUIDE_OVERVIEW_TITLE', 'Overview');
define('LAN_BOOKING_GUIDE_OVERVIEW_P1',    'Booking lets visitors reserve appointments…');
// …
```

**Allowed inside strings:** plain text, inline `<code>`, `<strong>`, `<em>`,
HTML-encoded examples (`&lt;your_theme&gt;`).
**Forbidden inside strings:** structural HTML (`<div>`, `<ul>`, `<table>`,
`<button>`, `<span class="…">`). If you need structure, put it in the template.

### 6.4 Naming convention

```
LAN_BOOKING_GUIDE_<SECTION>_<KEY>     ← Guide tab
LAN_PLUGIN_BOOKING_ABOUT_<KEY>        ← About tab
```

`SECTION` examples: `OVERVIEW`, `INSTALL`, `CONFIG`, `SERVICES`, `CALENDAR`,
`PAYMENT`, `EMAIL`, `IMPORT`, `EXPORT`, `TROUBLESHOOTING`, `CREDITS`.

`KEY` examples: `TITLE`, `INTRO`, `P1` … `Pn`, `S1` … `Sn`, `NOTE`, `TIP`,
`WARNING`, `LABEL_*`.

---

## 7. Migration recipe — applied in v2.4.0

The migration was executed in 5 phases (see `MIGRATION_PLAN.md`):

1. **Phase 1 — Extract Guide LANs.** Created `<Lang>_admin_help.php` for EN/ES/PT,
   moved 231 `LAN_BOOKING_GUIDE_*` constants out of `<Lang>_admin.php`. Net
   effect: EN admin file shrank from ~800 to ~527 lines.
2. **Phase 2 — Lazy load + rewrite shortcode batch.** First (failed) attempt used
   `__call()` magic — see §3. Final solution: stub batch (40 lines, no `sc_*`),
   `_resolveLans()` pre-pass on the controller.
3. **Phase 3 — Add About tab.** Created `templates/booking_about_template.php`,
   `shortcodes/batch/booking_about_shortcodes.php`, `<Lang>_admin_about.php` ×3,
   wired `aboutPage()` and a `'main/about'` entry in `$adminMenu`.
4. **Phase 4 — Dynamic version.** `getPluginInfo()` reads version + date from
   `e107::getPlug()->load('booking')->getMeta()` so the About tab never goes
   out of sync with `plugin.xml`.
5. **Phase 5 — Bump + docs.** `plugin.xml` → 2.4.0, `CHANGELOG.md` entry, READMEs
   updated, composer-install reminder added.

---

## 8. Sidebar Help widget

`renderHelp($action)` in `admin_config.php` produces a BS3 widget that mirrors
`sitedown_styles`'s sidebar — same skeleton, same button order, same brand
look across every Kanonimpresor plugin:

```
[ caption ]
[ name + version badge ]
[ tagline (small) ]
[ tip (alert-info) ]
[ btn-block btn-default — Documentation ]
[ btn-block btn-default — Support ]
[ btn-block btn-warning — Donate ]
[ contextual export buttons (PDF / Excel) — only on relevant pages ]
[ "More info »" → opens the About tab ]
```

Strings come from a small batch of LAN constants in `<Lang>_admin.php`:
`LAN_BOOKING_HELP_CAPTION`, `_TAGLINE`, `_TIP`, `LAN_BOOKING_BTN_DOCS`,
`_SUPPORT`, `_DONATE`, `LAN_BOOKING_ADMIN_ABOUT`, `LAN_BOOKING_ADMIN_HELP_MORE`.
**Keep the order identical to `sitedown_styles`** — that is the brand convention.

---

## 9. Out of scope (explicit non-goals)

- **Front-end help.** This pattern is for the **admin** Guide / About tabs only.
  Front-end help (e.g. tooltip strings on a public booking form) belongs in
  `<Lang>_front.php`.
- **Inline contextual help on form fields.** e107 already supports `'help'` in
  the `$prefs` array of `e_admin_ui` — that mechanism is unchanged and stays in
  `<Lang>_admin.php`.
- **Auto-generated documentation.** No Markdown-to-HTML pipeline, no build step.
  Plugins remain drop-in.

---

## 10. Anti-patterns this pattern eliminates

```php
// ❌ DO NOT DO THIS — adds indirection, hides missing translations,
//    doubles maintenance surface, loads on every admin request.
public function sc_booking_guide_overview_title()
{
    return defset('LAN_BOOKING_GUIDE_OVERVIEW_TITLE', 'Overview');
}
```

```php
// ❌ DO NOT DO THIS — magic dispatch is silently broken in e107 shortcode
//    batches because shortcode_handler.php uses method_exists() (see §3).
public function __call($name, $args)
{
    $const = strtoupper(str_replace('sc_', 'LAN_', $name));
    return defined($const) ? constant($const) : '';
}
```

```html
<!-- ❌ DO NOT DO THIS — structural HTML inside a translation string. -->
define('LAN_BOOKING_GUIDE_INSTALL_S1', '<div class="alert"><strong>Note:</strong> copy <code>file.php</code></div>');
```

```php
// ✅ DO THIS — template owns the structure, language owns the words,
//    controller's _resolveLans() pre-pass bridges them.
$TPL['install'] = '
<div class="alert alert-info">
    <strong>{LAN_BOOKING_GUIDE_NOTE_LABEL}</strong>
    {LAN_BOOKING_GUIDE_INSTALL_S2}
    {BOOKING_GUIDE_STUB_STATUS}
</div>';
```
