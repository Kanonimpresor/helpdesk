# 🎫 Helpdesk Plugin para e107 CMS

> **Sistema de tickets de soporte para e107 v2.3+**

![Version](https://img.shields.io/badge/version-2.0.1-blue)
![e107](https://img.shields.io/badge/e107-2.3%2B-green)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple)
![License](https://img.shields.io/badge/license-GPL--2.0%2B-orange)

#### Elija su idioma / Choose your language / Escolha o idioma

[![Language-English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Language-Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Language-Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)

---

## ✨ Novedades en 2.0.1

Release "puente" que **desbloquea la instalación** sobre e107 2.3.x / PHP 8:

- Se retira la dependencia obligatoria de `bootstrap_colorpicker`. El plugin
  instala en un e107 recién instalado sin plugins de terceros.
- Se corrigen los `Undefined variable` warnings de PHP 8 en `helpdesk.php`.
- Se arregla un bug de sesión: el mensaje flash sobreescribía el filtro activo
  de la lista de tickets.

No cambia el esquema de BD ni los prefs — **no requiere migración**.

Ver [`CHANGELOG.md`](CHANGELOG.md) para el detalle y [`MIGRATION_PLAN.md`](MIGRATION_PLAN.md)
para el roadmap hasta 2.4.x.

---

## 📋 Descripción

Helpdesk permite a los usuarios de tu sitio e107 **abrir tickets de soporte**,
seguir su estado, comentarlos y — desde el lado del staff — asignarlos a
técnicos, cambiar prioridad, aplicar fixes con coste, cerrar y exportar
histórico en PDF.

Autor original: **Father Barry** (2004-2009). Fork actual mantenido en este
repo para modernizarlo (PHP 8, seguridad, `e_admin_ui`, Bootstrap 5, patrón
de 4 capas).

---

## 🧩 Requisitos

- **e107** ≥ 2.3.1
- **PHP** ≥ 8.0 (probado con 8.3)
- **MySQL / MariaDB** con soporte InnoDB
- Composer (para las dependencias del core e107, no del propio plugin)

---

## 🚀 Instalación

1. Copia la carpeta `helpdesk/` en `e107_plugins/` de tu instalación.
2. En Admin → **Plugin Manager**, localiza *Help Desk* → **Install**.
   El instalador crea automáticamente las tablas `hdu_tickets` (⚠️ hasta
   v2.0.1 aún se llama `hdunit`; se renombra en v2.1.0), `hdu_helpdesk`,
   `hdu_comments`, `hdu_categories`, `hdu_fixes`, `hdu_resolve` con el prefijo
   configurado (`MPREFIX`).
3. Ve a Admin → **Helpdesk** → **Configure** y ajusta:
   - **Supervisor class** (default `main admin`): puede ver/cerrar todos los
     tickets.
   - **Post class**: quién puede abrir tickets.
   - **User class**: quién puede leer.
   - Prefs de emails, PM, colores de prioridad, escalado y auto-cierre.
4. Crea al menos **1 helpdesk** (mesa), **1 categoría** y **1 resolución** —
   son requeridos por el formulario de alta de tickets.
5. Añade `helpdesk_menu` a la posición de menú deseada desde
   Admin → **Menus**.

---

## 🗄️ Modelo de datos (resumen)

| Tabla | Descripción |
|---|---|
| `hdunit` (→ `hdu_tickets` en 2.1.0) | Tickets (asunto, descripción, prioridad, técnico, costes, estado). |
| `hdu_helpdesk` | Mesas de soporte — cada una con su userclass de técnicos y email. |
| `hdu_categories` | Categorías por helpdesk. |
| `hdu_resolve` | Estados / resoluciones (Abierto, Cerrado, Duplicado, …). |
| `hdu_fixes` | Fixes reutilizables con coste. |
| `hdu_comments` | Hilo de comentarios de cada ticket. |

Definiciones completas en `helpdesk_sql.php`.

---

## 👥 Roles

| Rol | Permiso e107 | Puede |
|---|---|---|
| **Admin** | `getperms("P")` | Todo, incluida configuración. |
| **Supervisor** | userclass `hduprefs_supervisorclass` | Ver todos los tickets, asignar, cerrar, editar. |
| **Técnico** | userclass del helpdesk (`hdudesk_class`) | Ver y actualizar tickets del helpdesk asignado. |
| **Postor** | userclass `hduprefs_postclass` | Abrir tickets. |
| **Lector** | userclass `hduprefs_userclass` | Ver sus propios tickets. |

---

## 🗺️ Roadmap

Sigue las fases numeradas de [`MIGRATION_PLAN.md`](MIGRATION_PLAN.md):

| Fase | Versión | Contenido |
|---|---|---|
| 0 ✅ | 2.0.1 | Puesta en marcha, fix PHP 8, quitar dep `bootstrap_colorpicker`. |
| 1 | 2.1.0 | Estabilización PHP 8 (typed props), rename `hdunit`→`hdu_tickets`. |
| 2 | 2.2.0 | Seguridad: SQL con placeholders, CSRF, sanitización. |
| 3 | 2.3.0 | Admin migrado a `e_admin_ui` (CRUD categorías, resoluciones, fixes, helpdesks). |
| 3b | 2.4.0 | Pestañas **Guide** + **About** con patrón 4-capas, locale ES añadido. |
| 4 | 2.5.0 | Frontend Bootstrap 5. |
| 5 | 2.6.0 | URLs SEO amigables (`/helpdesk/ticket/{id}`). |
| 6 | 2.7.0 | Notificaciones con `e_notify` + `e_cron` para auto-cierre / escalado. |
| 7 | 2.8.0 | Adjuntos, auditoría, SLA, dashboard widget, REST API, FAQ desde tickets. |
| 8 | 2.9.0 | Tests unitarios + Codeception + CI. |

---

## 📚 Documentación

- [`CHANGELOG.md`](CHANGELOG.md) — historial de versiones.
- [`DEV_NOTES.md`](DEV_NOTES.md) — decisiones arquitectónicas.
- [`MIGRATION_PLAN.md`](MIGRATION_PLAN.md) — hoja de ruta detallada.
- [`GUIA_DESARROLLO_PLUGINS_E107.md`](GUIA_DESARROLLO_PLUGINS_E107.md) — guía
  canónica de plugins e107 (referencia embebida).
- [`docs/MANUAL_UTILIZADOR_PT.md`](docs/MANUAL_UTILIZADOR_PT.md) — manual de
  usuario final (PT).

---

## 🙌 Créditos

- **Autor original**: Father Barry (2004-2009).
- **Fork y modernización actual**: mantenedores de este repositorio.
- Basado en las convenciones publicadas por
  [e107inc/e107](https://github.com/e107inc/e107) y en el patrón de 4 capas
  documentado en `GUIA_DESARROLLO_PLUGINS_E107.md`.

---

## 📄 Licencia

GPL v2 o posterior, en línea con e107. Ver cabeceras de los archivos PHP.
