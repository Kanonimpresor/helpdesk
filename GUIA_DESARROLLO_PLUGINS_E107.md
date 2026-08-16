# 🚀 Guía Completa de Desarrollo de Plugins para e107 Bootstrap CMS

> **De Principiante a Experto** - Una guía completa basada en el análisis del plugin `_blank` y la documentación oficial de e107.

## 📋 Tabla de Contenidos

1. [Introducción](#introducción)
2. [Estructura Básica de un Plugin](#estructura-básica-de-un-plugin)
3. [Archivos Clave y su Función](#archivos-clave-y-su-función)
4. [Roadmap de Desarrollo](#roadmap-de-desarrollo)
5. [Ejemplos Prácticos](#ejemplos-prácticos)
6. [Mejores Prácticas](#mejores-prácticas)
7. [SEO — Schema.org JSON-LD](#seo--schemaorg-json-ld-datos-estructurados)
8. [Patrón: Guía de Usuario integrada en Admin](#patrón-guía-de-usuario-integrada-en-admin-user-guide-page)
9. [Patrón: Ayuda lateral + página "Acerca de"](#-patrón-ayuda-lateral--página-acerca-de-plugin-identity)
10. [📚 Documentación del Plugin (README, CHANGELOG, Manual...)](#-documentación-del-plugin-readme-changelog-manual-de-usuario-roadmap)
11. [Recursos Adicionales](#recursos-adicionales)
12. [🧱 Patrón de 4 capas para la "User Guide" en el admin](#-patrón-de-4-capas-para-la-user-guide-en-el-admin)

---

## 🎯 Introducción

e107 Bootstrap CMS es un sistema de gestión de contenidos potente y flexible que permite crear plugins personalizados para extender su funcionalidad. Esta guía te llevará desde los conceptos básicos hasta técnicas avanzadas de desarrollo.

### ¿Por qué desarrollar plugins para e107?

- ✅ **Extensibilidad**: Añade funcionalidades específicas sin modificar el núcleo
- ✅ **Reutilización**: Comparte tus plugins con la comunidad
- ✅ **Mantenibilidad**: Código organizado y estructurado
- ✅ **Escalabilidad**: Arquitectura robusta para proyectos grandes

---

## 📁 Estructura Básica de un Plugin

Basado en el análisis completo del plugin `_blank` (plantilla oficial de e107), aquí tienes la estructura detallada que debe seguir todo plugin profesional:

### 🗂️ Estructura Completa del Plugin _blank

```
e107_plugins/_blank/
├── 📄 plugin.xml                    # ⚙️ Configuración principal del plugin
├── 📄 _blank.php                    # 🏠 Archivo principal (frontend)
├── 📄 _blank_setup.php              # 🔧 Instalación/desinstalación/actualización
├── 📄 _blank_sql.php                # 🗄️ Estructura de base de datos
├── 📄 _blank_menu.php               # 📋 Configuración de menús específicos
├── 📄 _blank_shortcodes.php         # 🔗 Shortcodes del plugin (legacy)
├── 📄 admin_config.php              # 🎛️ Panel de administración principal
├── 📄 e_admin.php                   # 🔌 Extensiones de administración
├── 📄 e_cron.php                    # ⏰ Tareas programadas
├── 📄 e_dashboard.php               # 📊 Widget del dashboard
├── 📄 e_event.php                   # 🎯 Manejo de eventos del sistema
├── 📄 e_frontpage.php               # 🏡 Contenido de página principal
├── 📄 e_header.php                  # 📄 Modificaciones del header
├── 📄 e_library.php                 # 📚 Librerías y funciones auxiliares
├── 📄 e_menu.php                    # 📋 Configuración de menús (v2.x)
├── 📄 e_notify.php                  # 📧 Sistema de notificaciones
├── 📄 e_parse.php                   # 🔄 Parseo personalizado
├── 📄 e_print.php                   # 🖨️ Versión para imprimir
├── 📄 e_related.php                 # 🔗 Contenido relacionado
├── 📄 e_rss.php                     # 📡 Feeds RSS
├── 📄 e_search.php                  # 🔍 Integración con búsqueda
├── 📄 e_shortcode.php               # 🔗 Shortcodes personalizados (v2.x)
├── 📄 e_sitelink.php                # 🌐 Enlaces del sitio
├── 📄 e_url.php                     # 🔗 URLs amigables
├── 📄 e_user.php                    # 👤 Extensiones de usuario
├── 📁 css/
│   └── blank.css                    # 🎨 Estilos del plugin
├── 📁 images/
│   ├── blank_16.png                 # 🖼️ Icono 16x16
│   ├── blank_32.png                 # 🖼️ Icono 32x32
│   ├── icon_128.png                 # 🖼️ Icono 128x128
│   ├── icon_16.png                  # 🖼️ Icono alternativo 16x16
│   └── icon_32.png                  # 🖼️ Icono alternativo 32x32
├── 📁 languages/
│   ├── English/
│   │   └── English_global.php       # 🌍 Idioma inglés
│   └── Portuguese/
│       └── Portuguese_global.php    # 🌍 Idioma portugués
├── 📁 templates/
│   └── _blank_template.php          # 📄 Plantillas del plugin
└── 📁 tests/
    └── unit/
        └── _blank_eventTest.php     # 🧪 Pruebas unitarias
```

### 📋 Categorización de Archivos

#### 🏠 Archivos Principales
- **plugin.xml** - Configuración principal del plugin
- **_blank.php** - Frontend del plugin (lógica principal)
- **_blank_setup.php** - Instalación, actualización y desinstalación
- **_blank_sql.php** - Estructura de base de datos
- **admin_config.php** - Panel de administración

#### 🔌 Archivos de Extensión (e_*.php)
- **e_admin.php** - Extensiones de administración
- **e_shortcode.php** - Shortcodes globales (v2.x)
- **e_menu.php** - Configuración de menús
- **e_cron.php** - Tareas programadas
- **e_dashboard.php** - Widget del dashboard
- **e_event.php** - Manejo de eventos del sistema
- **e_search.php** - Integración con búsqueda
- **e_url.php** - URLs amigables SEO
- **e_rss.php** - Feeds RSS
- **e_notify.php** - Sistema de notificaciones

#### 📁 Recursos y Assets
- **css/blank.css** - Estilos del plugin
- **images/*.png** - Iconos en múltiples tamaños
- **languages/** - Archivos de idioma (multiidioma)
- **templates/** - Plantillas HTML del plugin
- **tests/** - Pruebas unitarias (opcional pero recomendado)

### 🔍 Descripción de Elementos

| Elemento | Obligatorio | Descripción |
|----------|-------------|-------------|
| `plugin.xml` | ✅ | Metadatos, configuración, enlaces de administración |
| `{plugin}.php` | ✅ | Lógica principal del frontend |
| `{plugin}_setup.php` | ⚠️ | Rutinas de instalación (si usa BD) |
| `{plugin}_sql.php` | ⚠️ | Estructura de base de datos (si aplica) |
| `admin_config.php` | ⚠️ | Panel de administración (si necesita configuración) |
| `templates/` | ⚠️ | Plantillas HTML (recomendado) |
| `languages/` | ⚠️ | Archivos de idioma (recomendado) |
| `css/`, `js/`, `images/` | ❌ | Recursos estáticos (según necesidad) |

---

## 🔍 Análisis Detallado de Archivos del Plugin _blank

### 📄 plugin.xml - Configuración Principal
**Función:** Define todos los metadatos, configuraciones y dependencias del plugin.

**Estructura Básica:**
```xml
<?xml version="1.0" encoding="utf-8"?>
<e107Plugin name="_blank" lan="LAN_PLUGIN__BLANK_NAME" version="1.0" date="2024-01-01" compatibility="2.0" installRequired="true">
    <author name="e107 Inc" url="https://e107.org" email="admin@e107.org" />
    <summary lan="LAN_PLUGIN__BLANK_DIZ">Plugin de ejemplo para desarrollo</summary>
    <description lan="LAN_PLUGIN__BLANK_DIZ">Plantilla base para crear nuevos plugins</description>
    <category>misc</category>
    <keywords>
        <word>blank</word>
        <word>template</word>
        <word>example</word>
    </keywords>
    <copyright>Copyright (c) e107 Inc</copyright>
    <adminLinks>
        <link url="admin_config.php" description="Configuración" icon="images/blank_32.png" iconSmall="images/blank_16.png" primary="true" />
    </adminLinks>
    <siteLinks>
        <link url="blank.php" description="Ver Plugin" icon="images/blank_16.png" />
    </siteLinks>
    <pluginPrefs>
        <pref name="blank_setting1">default_value</pref>
        <pref name="blank_setting2">another_value</pref>
    </pluginPrefs>
    <userClasses>
        <class name="blank_access" description="Acceso al plugin blank" />
    </userClasses>
    <extendedFields>
        <field name="blank_field" type="text" />
    </extendedFields>
</e107Plugin>
```

### 🏠 _blank.php - Frontend Principal
**Función:** Contiene la lógica principal del plugin para el frontend.

**Estructura Básica:**
```php
<?php
if (!defined('e107_INIT')) { exit; }

class _blank_front
{
    function __construct()
    {
        // Cargar recursos necesarios
        e107::js('_blank', 'js/blank.js');
        e107::css('_blank', 'css/blank.css');
        e107::lan('_blank', 'English_global');
    }
    
    function run()
    {
        // Lógica principal del plugin
        $tp = e107::getParser();
        $sql = e107::getDb();
        
        // Ejemplo de consulta a base de datos
        if($sql->select('blank', '*', 'ORDER BY blank_id DESC LIMIT 10'))
        {
            while($row = $sql->fetch())
            {
                // Procesar datos
                $data[] = $row;
            }
        }
        
        // Renderizar template
        $template = e107::getTemplate('_blank');
        $sc = e107::getScBatch('_blank');
        
        return $tp->parseTemplate($template['MAIN'], true, $sc);
    }
}

// Inicializar plugin
$_blank = new _blank_front();
echo $_blank->run();
?>
```

### 🔧 _blank_setup.php - Instalación y Configuración
**Función:** Maneja la instalación, actualización y desinstalación del plugin.

**Métodos Principales:**
- `install_pre()` - Ejecutado antes de crear tablas
- `install_post()` - Ejecutado después de crear tablas
- `upgrade()` - Maneja actualizaciones
- `uninstall()` - Limpieza al desinstalar

**Ejemplo de Implementación:**
```php
<?php
if (!defined('e107_INIT')) { exit; }

class _blank_setup
{
    function install_pre($var)
    {
        // Verificaciones previas a la instalación
        return true;
    }
    
    function install_post($var)
    {
        // Insertar datos iniciales
        $sql = e107::getDb();
        
        $data = array(
            'blank_name' => 'Ejemplo',
            'blank_description' => 'Contenido de ejemplo',
            'blank_datestamp' => time()
        );
        
        $sql->insert('blank', $data);
        
        // Configurar preferencias por defecto
        e107::getConfig()->set('_blank_installed', time());
        e107::getConfig()->save();
        
        return true;
    }
    
    function upgrade($var)
    {
        // Lógica de actualización
        $from_version = $var['plugin_version'];
        $to_version = $var['plugin_new_version'];
        
        if(version_compare($from_version, '1.1', '<'))
        {
            // Actualizar a versión 1.1
            // Añadir nuevas columnas, migrar datos, etc.
        }
        
        return true;
    }
    
    function uninstall($var)
    {
        // Limpiar configuraciones
        e107::getConfig()->remove('_blank_installed');
        e107::getConfig()->save();
        
        return true;
    }
}
?>
```

### 🔌 e_admin.php - Extensiones de Administración
**Función:** Extiende la funcionalidad del panel de administración.

**Implementación:**
```php
<?php
if (!defined('e107_INIT')) { exit; }

class _blank_admin implements e_admin_addon_interface
{
    function load($field, $current_value, $attributes)
    {
        // Cargar valores personalizados para campos
        switch($field)
        {
            case 'blank_custom_field':
                return array(
                    'option1' => 'Opción 1',
                    'option2' => 'Opción 2',
                    'option3' => 'Opción 3'
                );
                break;
        }
        
        return $current_value;
    }
    
    function config($field, $current_value, $attributes)
    {
        // Configurar parámetros de campos
        switch($field)
        {
            case 'blank_date_field':
                return array(
                    'type' => 'datepicker',
                    'data' => 'date',
                    'help' => 'Selecciona una fecha'
                );
                break;
        }
        
        return array();
    }
}
?>
```

### 🔗 e_shortcode.php - Shortcodes Personalizados
**Función:** Define shortcodes que pueden usarse en contenido, plantillas y menús.

**Mejores Prácticas:**
- Usar nombres descriptivos con prefijo del plugin
- Validar parámetros de entrada
- Manejar errores graciosamente
- Documentar cada shortcode

**Ejemplo Avanzado:**
```php
<?php
if (!defined('e107_INIT')) { exit; }

class _blank_shortcodes extends e_shortcode
{
    /**
     * Shortcode básico que retorna "Hello World!"
     * Uso: {_BLANK_CUSTOM}
     */
    function sc__blank_custom($parm = '')
    {
        return "Hello World!";
    }
    
    /**
     * Shortcode con parámetros
     * Uso: {_BLANK_USER: name=Juan&age=25}
     */
    function sc__blank_user($parm = '')
    {
        $defaults = array(
            'name' => 'Usuario',
            'age' => '0'
        );
        
        $parms = array_merge($defaults, $parm);
        
        return "Hola {$parms['name']}, tienes {$parms['age']} años.";
    }
    
    /**
     * Shortcode que accede a la base de datos
     * Uso: {_BLANK_LIST: limit=5&order=date}
     */
    function sc__blank_list($parm = '')
    {
        $sql = e107::getDb();
        $tp = e107::getParser();
        
        $limit = (int) vartrue($parm['limit'], 10);
        $order = vartrue($parm['order'], 'blank_id');
        
        $output = "<ul class='blank-list'>";
        
        if($sql->select('blank', '*', "ORDER BY {$order} DESC LIMIT {$limit}"))
        {
            while($row = $sql->fetch())
            {
                $name = $tp->toHTML($row['blank_name']);
                $output .= "<li>{$name}</li>";
            }
        }
        
        $output .= "</ul>";
        
        return $output;
    }
}
?>
```

---

## 📄 Archivos Clave y su Función

### 1. plugin.xml - El Corazón del Plugin

El archivo `plugin.xml` es el descriptor principal que define todos los metadatos y configuraciones del plugin.

#### Versión Básica (Mínima)

```xml
<?xml version="1.0" encoding="utf-8"?>
<e107Plugin name="Mi Plugin" version="1.0.0" date="2024-01-15" compatibility="2.3.0" installRequired="true">
    <author name="Tu Nombre" email="tu@email.com" url="https://tusitio.com" />
    <summary>Descripción breve del plugin</summary>
    <description>Descripción detallada de las funcionalidades del plugin</description>
    <keywords>palabras, clave, del, plugin</keywords>
    <category>content</category>
    <copyright>GPL v3</copyright>
</e107Plugin>
```

#### 🚀 XML Profesional - Elementos Clave Avanzados

```xml
<?xml version="1.0" encoding="utf-8"?>
<e107Plugin name="Mi Plugin Profesional" 
           version="2.1.0" 
           date="2024-01-15" 
           compatibility="2.3.0" 
           installRequired="true"
           plugin_php="true">
    
    <!-- Metadatos del Desarrollador -->
    <author name="Desarrollador Pro" 
            email="dev@empresa.com" 
            url="https://miempresa.com" />
    
    <!-- Información Descriptiva -->
    <summary>Plugin avanzado con funcionalidades completas</summary>
    <description>Este plugin proporciona funcionalidades avanzadas incluyendo gestión de contenido, APIs personalizadas y integración con servicios externos.</description>
    <keywords>avanzado, api, contenido, gestión, profesional</keywords>
    <category>content</category>
    <copyright>Licencia Comercial 2024</copyright>
    
    <!-- Preferencias Categorizadas -->
    <preferences>
        <pref name="enable_api" type="boolean" default="1">Habilitar API</pref>
        <pref name="api_key" type="text" default="">Clave API</pref>
        <pref name="cache_time" type="number" default="3600">Tiempo de caché (segundos)</pref>
        <pref name="theme_style" type="dropdown" default="modern">Estilo del tema</pref>
        <pref name="debug_mode" type="boolean" default="0">Modo debug</pref>
    </preferences>
    
    <!-- Dependencias del Sistema -->
    <dependencies>
        <plugin name="news" version="2.0+" />
        <plugin name="page" version="1.5+" optional="true" />
        <extension name="curl" />
        <extension name="json" />
        <php_version>7.4.0</php_version>
    </dependencies>
    
    <!-- Estructura de Base de Datos -->
    <tables>
        <table name="mi_plugin_data" primary="id">
            <field name="id" type="int" auto_increment="true" />
            <field name="title" type="varchar" length="255" />
            <field name="content" type="text" />
            <field name="created" type="timestamp" />
        </table>
        <table name="mi_plugin_settings" primary="setting_id">
            <field name="setting_id" type="int" auto_increment="true" />
            <field name="setting_name" type="varchar" length="100" />
            <field name="setting_value" type="text" />
        </table>
    </tables>
    
    <!-- Enlaces de Administración -->
    <adminLinks>
        <link url="admin_config.php" description="Configuración Principal" icon="fa-cog" primary="true" />
        <link url="admin_manage.php" description="Gestionar Contenido" icon="fa-list" />
        <link url="admin_stats.php" description="Estadísticas" icon="fa-chart-bar" />
        <link url="admin_import.php" description="Importar Datos" icon="fa-upload" />
    </adminLinks>
    
    <!-- URLs Amigables -->
    <urls>
        <url name="main" path="mi-plugin" file="plugin.php" />
        <url name="view" path="mi-plugin/ver/{id}" file="view.php" />
        <url name="category" path="mi-plugin/categoria/{cat}" file="category.php" />
        <url name="api" path="api/mi-plugin/{action}" file="api.php" />
    </urls>
    
    <!-- Shortcodes Disponibles -->
    <shortcodes>
        <shortcode name="MI_PLUGIN_LIST" description="Lista elementos del plugin" />
        <shortcode name="MI_PLUGIN_FORM" description="Formulario de contacto" />
        <shortcode name="MI_PLUGIN_STATS" description="Estadísticas del plugin" />
    </shortcodes>
    
</e107Plugin>
```

#### 🎯 Beneficios del XML Profesional:

- **🔧 Gestión Avanzada**: Control completo sobre preferencias y configuraciones
- **📦 Dependencias Claras**: Especifica requisitos del sistema y otros plugins
- **🗄️ Base de Datos Estructurada**: Define tablas y campos automáticamente
- **🧭 Navegación Intuitiva**: Enlaces de administración organizados
- **🔍 SEO Optimizado**: URLs amigables para mejor posicionamiento
- **⚡ Funcionalidad Extendida**: Shortcodes personalizados para flexibilidad
    
    <!-- Descripción -->
    <summary>Descripción breve del plugin</summary>
    <description lan="LAN_PLUGIN_MI_PLUGIN_DIZ">Descripción detallada del plugin</description>
    
    <!-- Categoría -->
    <category>misc</category>
    
    <!-- Palabras clave para búsqueda -->
    <keywords>
        <word>mi</word>
        <word>plugin</word>
        <word>personalizado</word>
    </keywords>
    
    <!-- Enlaces en el panel de administración -->
    <adminLinks>
        <link url='admin_config.php' description='Configurar Mi Plugin' 
              icon='images/mi_plugin_32.png' iconSmall='images/mi_plugin_16.png' 
              primary='true'>LAN_CONFIGURE</link>
        <link url="admin_config.php?mode=stats" description="Estadísticas" 
              icon="chart">Estadísticas</link>
    </adminLinks>
    
    <!-- Enlaces públicos del sitio -->
    <siteLinks>
        <link category="1" url="{e_PLUGIN}mi_plugin/mi_plugin.php" 
              perm='everyone' sef='mi-plugin'>Mi Plugin</link>
    </siteLinks>
    
    <!-- Preferencias del plugin -->
    <pluginPrefs>
        <pref name="mi_plugin_habilitado">1</pref>
        <pref name="mi_plugin_limite">10</pref>
        <pref name="mi_plugin_config">[configuración JSON]</pref>
    </pluginPrefs>
    
    <!-- Clases de usuario personalizadas -->
    <userClasses>
        <class name="mi_plugin_usuarios" description="Usuarios del plugin" />
    </userClasses>
    
    <!-- Campos extendidos de usuario -->
    <extendedFields>
        <field name="mi_campo_personalizado" type='EUF_TEXT' default='' active="true" />
    </extendedFields>
    
    <!-- Categorías de medios -->
    <mediaCategories>
        <category type="image">Imágenes Mi Plugin</category>
    </mediaCategories>
    
</e107Plugin>
```

### 2. Archivo Principal del Plugin

El archivo principal controla la lógica del frontend de tu plugin.

```php
<?php
/*
 * Mi Plugin para e107
 * Descripción del plugin
 */

if (!defined('e107_INIT')) {
    require_once(__DIR__.'/../../class2.php');
}

class mi_plugin_front {
    
    function __construct() {
        // Cargar recursos necesarios
        e107::js('mi_plugin','js/mi_plugin.js','jquery');    // JavaScript
        e107::css('mi_plugin','css/mi_plugin.css');          // CSS
        e107::lan('mi_plugin');                              // Idioma
        e107::meta('keywords','mi plugin, personalizado');   // Meta tags
    }
    
    public function run() {
        // Obtener instancias de clases principales
        $sql = e107::getDb();           // Base de datos
        $tp = e107::getParser();        // Parser HTML
        $frm = e107::getForm();         // Formularios
        $ns = e107::getRender();        // Renderizado en tema
        $mes = e107::getMessage();      // Mensajes del sistema
        
        // Configurar breadcrumb
        $this->setBreadcrumb();
        
        // Lógica principal del plugin
        $text = $this->generateContent();
        
        // Renderizar en el tema
        $ns->tablerender('Mi Plugin', $text);
    }
    
    private function setBreadcrumb() {
        $bc = e107::getBreadcrumb();
        $bc->add('Inicio', e107::url('', 'full'));
        $bc->add('Mi Plugin', e107::url('mi_plugin', 'mi_plugin'));
    }
    
    private function generateContent() {
        $sql = e107::getDb();
        $tp = e107::getParser();
        
        // Ejemplo: obtener datos de la base de datos
        if($rows = $sql->retrieve('mi_plugin_data', '*', 'activo=1', true)) {
            $template = e107::getTemplate('mi_plugin', 'mi_plugin', 'default');
            $sc = e107::getScBatch('mi_plugin', true, 'mi_plugin');
            
            $text = $tp->parseTemplate($template['start'], true, $sc);
            
            foreach($rows as $row) {
                $sc->setVars($row);
                $text .= $tp->parseTemplate($template['item'], true, $sc);
            }
            
            $text .= $tp->parseTemplate($template['end'], true, $sc);
            
            return $text;
        }
        
        return '<p>No hay contenido disponible.</p>';
    }
}

// Inicializar y ejecutar el plugin
$plugin = new mi_plugin_front();
$plugin->run();
```

### 3. Setup y Gestión de Base de Datos

#### mi_plugin_sql.php - Estructura de Base de Datos

```sql
/**
 * Estructura de base de datos para Mi Plugin
 * 
 * IMPORTANTE: No incluir prefijo de tabla e107_
 * El sistema lo añadirá automáticamente
 */

CREATE TABLE mi_plugin_data (
    id int(10) NOT NULL AUTO_INCREMENT,
    titulo varchar(255) NOT NULL,
    descripcion text,
    imagen varchar(255),
    fecha_creacion int(10) NOT NULL,
    fecha_modificacion int(10),
    usuario_id int(10) NOT NULL DEFAULT 0,
    activo tinyint(1) NOT NULL DEFAULT 1,
    orden int(5) NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    KEY idx_activo (activo),
    KEY idx_usuario (usuario_id),
    KEY idx_fecha (fecha_creacion)
);

CREATE TABLE mi_plugin_categorias (
    categoria_id int(10) NOT NULL AUTO_INCREMENT,
    categoria_nombre varchar(100) NOT NULL,
    categoria_descripcion text,
    categoria_activa tinyint(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (categoria_id)
);
```

#### mi_plugin_setup.php - Rutinas de Instalación

```php
<?php

if(!class_exists("mi_plugin_setup")) {
    class mi_plugin_setup {
        
        /**
         * Ejecutado ANTES de crear las tablas
         */
        function install_pre($var) {
            // Verificaciones previas
            $mes = e107::getMessage();
            
            // Verificar versión de PHP
            if(version_compare(PHP_VERSION, '7.4.0', '<')) {
                $mes->addError('Este plugin requiere PHP 7.4 o superior');
                return false;
            }
            
            return true;
        }
        
        /**
         * Ejecutado DESPUÉS de crear las tablas
         * Para insertar datos iniciales
         */
        function install_post($var) {
            $sql = e107::getDb();
            $mes = e107::getMessage();
            
            // Insertar categorías por defecto
            $categorias_default = [
                ['categoria_nombre' => 'General', 'categoria_descripcion' => 'Categoría general'],
                ['categoria_nombre' => 'Destacados', 'categoria_descripcion' => 'Elementos destacados']
            ];
            
            foreach($categorias_default as $categoria) {
                $sql->insert('mi_plugin_categorias', $categoria);
            }
            
            // Insertar datos de ejemplo
            $datos_ejemplo = [
                'titulo' => 'Elemento de ejemplo',
                'descripcion' => 'Este es un elemento de ejemplo creado durante la instalación',
                'fecha_creacion' => time(),
                'usuario_id' => 1,
                'activo' => 1
            ];
            
            $sql->insert('mi_plugin_data', $datos_ejemplo);
            
            $mes->addSuccess('Plugin instalado correctamente con datos de ejemplo');
        }
        
        /**
         * Ejecutado durante actualizaciones
         */
        function upgrade_post($var) {
            $sql = e107::getDb();
            $mes = e107::getMessage();
            
            // Lógica de actualización según versión
            $version_actual = $var['plugin_version'];
            $version_nueva = $var['plugin_version_new'];
            
            if(version_compare($version_actual, '1.1', '<')) {
                // Actualización a versión 1.1
                // Añadir nueva columna si no existe
                if(!$sql->field_exists('mi_plugin_data', 'nueva_columna')) {
                    $sql->gen('ALTER TABLE '.MPREFIX.'mi_plugin_data ADD nueva_columna VARCHAR(100) DEFAULT ""');
                }
            }
            
            $mes->addSuccess('Plugin actualizado correctamente');
        }
        
        /**
         * Ejecutado ANTES de desinstalar
         */
        function uninstall_pre($var) {
            // Crear backup de datos importantes si es necesario
            return true;
        }
        
        /**
         * Ejecutado DESPUÉS de desinstalar
         */
        function uninstall_post($var) {
            $mes = e107::getMessage();
            
            // Limpiar archivos subidos, caché, etc.
            $upload_path = e107::getFolder('media').'mi_plugin/';
            if(is_dir($upload_path)) {
                e107::getFile()->rmdir($upload_path, true);
            }
            
            // Limpiar preferencias relacionadas
            e107::getConfig()->remove('mi_plugin_config_extra');
            e107::getConfig()->save();
            
            $mes->addSuccess('Plugin desinstalado completamente');
        }
    }
}
```

### 4. Shortcodes Personalizados

```php
<?php
/**
 * Shortcodes personalizados para Mi Plugin
 * Disponibles en todo el sitio
 */

if(!defined('e107_INIT')) {
    exit;
}

class mi_plugin_shortcodes extends e_shortcode {
    
    public $override = false; // No sobrescribir shortcodes existentes
    
    /**
     * Shortcode: {MI_PLUGIN_LISTA}
     * Muestra una lista de elementos
     */
    function sc_mi_plugin_lista($parm = '') {
        $sql = e107::getDb();
        $tp = e107::getParser();
        
        // Parámetros: limite|categoria|orden
        $params = explode('|', $parm);
        $limite = (int)($params[0] ?? 5);
        $categoria = (int)($params[1] ?? 0);
        $orden = $params[2] ?? 'fecha_creacion DESC';
        
        $where = 'activo=1';
        if($categoria > 0) {
            $where .= ' AND categoria_id='.$categoria;
        }
        
        if($elementos = $sql->retrieve('mi_plugin_data', '*', 
           $where.' ORDER BY '.$orden.' LIMIT '.$limite, true)) {
            
            $html = '<div class="mi-plugin-lista">';
            foreach($elementos as $elemento) {
                $html .= '<div class="mi-plugin-item">';
                $html .= '<h3>'.$tp->toHTML($elemento['titulo']).'</h3>';
                $html .= '<p>'.$tp->toHTML($elemento['descripcion']).'</p>';
                $html .= '<small>'.date('d/m/Y', $elemento['fecha_creacion']).'</small>';
                $html .= '</div>';
            }
            $html .= '</div>';
            
            return $html;
        }
        
        return '<p>No hay elementos disponibles.</p>';
    }
    
    /**
     * Shortcode: {MI_PLUGIN_CONTADOR}
     * Muestra el número total de elementos
     */
    function sc_mi_plugin_contador($parm = '') {
        $sql = e107::getDb();
        
        $activos_solo = ($parm === 'activos');
        $where = $activos_solo ? 'activo=1' : '1';
        
        $count = $sql->count('mi_plugin_data', '(*)', $where);
        
        return '<span class="mi-plugin-contador">'.$count.'</span>';
    }
    
    /**
     * Shortcode: {MI_PLUGIN_DESTACADO}
     * Muestra un elemento aleatorio destacado
     */
    function sc_mi_plugin_destacado($parm = '') {
        $sql = e107::getDb();
        $tp = e107::getParser();
        
        if($elemento = $sql->retrieve('mi_plugin_data', '*', 
           'activo=1 ORDER BY RAND() LIMIT 1')) {
            
            $template = e107::getTemplate('mi_plugin', 'destacado');
            $sc = e107::getScBatch('mi_plugin', true);
            $sc->setVars($elemento);
            
            return $tp->parseTemplate($template, true, $sc);
        }
        
        return '';
    }
}
```

---

## 🗺️ Roadmap de Desarrollo

Sigue este roadmap paso a paso para crear plugins robustos y escalables:

### Fase 1: Planificación y Diseño (1-2 días)

#### ✅ Paso 1: Definir Objetivos
- [ ] **Propósito del plugin**: ¿Qué problema resuelve?
- [ ] **Funcionalidades principales**: Lista de características core
- [ ] **Usuarios objetivo**: ¿Quién lo usará?
- [ ] **Compatibilidad**: Versiones de e107 soportadas

#### ✅ Paso 2: Diseño de Base de Datos
- [ ] **Identificar entidades**: Tablas necesarias
- [ ] **Definir relaciones**: Claves foráneas y vínculos
- [ ] **Campos requeridos**: Estructura de cada tabla
- [ ] **Índices y optimización**: Para consultas eficientes

#### ✅ Paso 3: Arquitectura del Plugin
- [ ] **Flujo de usuario**: Cómo interactuarán con el plugin
- [ ] **Interfaz de administración**: Qué configuraciones necesita
- [ ] **Integración con e107**: Qué hooks y eventos usar
- [ ] **Dependencias**: Otros plugins o librerías necesarias

### Fase 2: Configuración Inicial (1 día)

#### ✅ Paso 4: Preparar Estructura Base
```bash
# Copiar plugin _blank como plantilla
cp -r e107_plugins/_blank e107_plugins/mi_plugin

# Renombrar archivos principales
mv _blank.php mi_plugin.php
mv _blank_setup.php mi_plugin_setup.php
mv _blank_sql.php mi_plugin_sql.php
# ... etc
```

#### ✅ Paso 5: Configurar plugin.xml
- [ ] **Metadatos básicos**: Nombre, versión, autor
- [ ] **Descripción**: Summary y description detallada
- [ ] **Enlaces de administración**: AdminLinks necesarios
- [ ] **Enlaces públicos**: SiteLinks del frontend
- [ ] **Preferencias**: PluginPrefs por defecto

#### ✅ Paso 6: Estructura de Directorios
- [ ] **Crear carpetas**: templates/, css/, js/, images/, languages/
- [ ] **Iconos del plugin**: 16px, 32px, 128px
- [ ] **Archivos base**: Crear archivos vacíos necesarios

### Fase 3: Base de Datos (1-2 días)

#### ✅ Paso 7: Definir Esquema SQL
- [ ] **Crear mi_plugin_sql.php**: Estructura de tablas
- [ ] **Definir campos**: Tipos de datos apropiados
- [ ] **Añadir índices**: Para optimización
- [ ] **Documentar estructura**: Comentarios en SQL

#### ✅ Paso 8: Rutinas de Instalación
- [ ] **install_pre()**: Verificaciones previas
- [ ] **install_post()**: Datos iniciales
- [ ] **upgrade_post()**: Lógica de actualización
- [ ] **uninstall_post()**: Limpieza completa

#### ✅ Paso 9: Pruebas de BD
- [ ] **Instalar plugin**: Verificar creación de tablas
- [ ] **Datos de prueba**: Insertar contenido de ejemplo
- [ ] **Desinstalar**: Verificar limpieza completa
- [ ] **Reinstalar**: Confirmar que funciona correctamente

### Fase 4: Lógica Principal (3-5 días)

#### ✅ Paso 10: Archivo Principal
- [ ] **Clase principal**: mi_plugin_front
- [ ] **Constructor**: Cargar recursos (CSS, JS, idiomas)
- [ ] **Método run()**: Lógica principal del frontend
- [ ] **Métodos auxiliares**: Funciones de soporte

#### ✅ Paso 11: Acceso a Datos
- [ ] **Métodos CRUD**: Create, Read, Update, Delete
- [ ] **Validaciones**: Sanitización de datos
- [ ] **Manejo de errores**: Try-catch y logging
- [ ] **Optimización**: Consultas eficientes

#### ✅ Paso 12: Lógica de Negocio
- [ ] **Funcionalidades core**: Implementar características principales
- [ ] **Validaciones de negocio**: Reglas específicas
- [ ] **Integración con e107**: Usar APIs del sistema
- [ ] **Manejo de permisos**: Verificar accesos

### Fase 5: Panel de Administración (2-3 días)

#### ✅ Paso 13: admin_config.php Base
- [ ] **Clase dispatcher**: plugin_mi_plugin_admin
- [ ] **Modos de operación**: main, config, stats, etc.
- [ ] **Menú de administración**: adminMenu array
- [ ] **Permisos**: Verificar acceso de administrador

#### ✅ Paso 14: Formularios de Configuración
- [ ] **Clase UI**: plugin_mi_plugin_admin_form_ui
- [ ] **Campos de configuración**: Usando e_form
- [ ] **Validación de formularios**: Server-side validation
- [ ] **Mensajes de confirmación**: Success/error feedback

#### ✅ Paso 15: Gestión de Contenido
- [ ] **Listado de elementos**: Tabla con paginación
- [ ] **Formularios CRUD**: Crear, editar, eliminar
- [ ] **Búsqueda y filtros**: Funcionalidad de búsqueda
- [ ] **Acciones en lote**: Operaciones múltiples

### Fase 6: Frontend y Templates (2-3 días)

#### ✅ Paso 16: Plantillas HTML
- [ ] **Template principal**: mi_plugin_template.php
- [ ] **Estructura responsive**: Bootstrap-compatible
- [ ] **Shortcodes de template**: Variables dinámicas
- [ ] **Múltiples layouts**: Diferentes vistas

#### ✅ Paso 17: Estilos CSS
- [ ] **CSS principal**: mi_plugin.css
- [ ] **Responsive design**: Media queries
- [ ] **Integración con tema**: Variables CSS del tema
- [ ] **Optimización**: Minificación para producción

#### ✅ Paso 18: JavaScript (si necesario)
- [ ] **Funcionalidad interactiva**: mi_plugin.js
- [ ] **Integración con jQuery**: Usar framework incluido
- [ ] **AJAX**: Comunicación asíncrona
- [ ] **Validación client-side**: Mejorar UX

### Fase 7: Extensiones del Sistema (1-2 días)

#### ✅ Paso 19: Shortcodes Personalizados
- [ ] **e_shortcode.php**: Clase de shortcodes
- [ ] **Shortcodes útiles**: Lista, contador, destacados
- [ ] **Parámetros flexibles**: Configuración por shortcode
- [ ] **Documentación**: Cómo usar cada shortcode

#### ✅ Paso 20: Integración con Sistema
- [ ] **e_search.php**: Búsqueda del sitio
- [ ] **e_url.php**: URLs amigables
- [ ] **e_event.php**: Eventos y hooks
- [ ] **e_menu.php**: Configuración de menús

### Fase 8: Internacionalización (1 día)

#### ✅ Paso 21: Archivos de Idioma
- [ ] **English_global.php**: Strings principales
- [ ] **English_admin.php**: Textos de administración
- [ ] **Constantes LAN_**: Nomenclatura correcta
- [ ] **Pluralización**: Manejo de singular/plural

#### ✅ Paso 22: Implementar Traducciones
- [ ] **Usar e107::lan()**: Cargar idiomas
- [ ] **Constantes en código**: Reemplazar strings hardcoded
- [ ] **Templates multiidioma**: Soporte en plantillas
- [ ] **Idiomas adicionales**: Traducir a otros idiomas

### Fase 9: Testing y Debugging (2-3 días)

#### ✅ Paso 23: Pruebas Funcionales
- [ ] **Instalación/desinstalación**: Múltiples ciclos
- [ ] **Funcionalidades core**: Cada característica
- [ ] **Panel de administración**: Todos los formularios
- [ ] **Frontend**: Diferentes escenarios de uso

#### ✅ Paso 24: Pruebas de Compatibilidad
- [ ] **Versiones de e107**: 2.3.x compatibility
- [ ] **Versiones de PHP**: 7.4, 8.0, 8.1, 8.2
- [ ] **Diferentes temas**: Verificar renderizado
- [ ] **Navegadores**: Chrome, Firefox, Safari, Edge

#### ✅ Paso 25: Optimización
- [ ] **Rendimiento**: Profiling de consultas
- [ ] **Memoria**: Verificar uso de RAM
- [ ] **Caché**: Implementar donde sea apropiado
- [ ] **Seguridad**: Audit de vulnerabilidades

### Fase 10: Documentación y Distribución (1-2 días)

#### ✅ Paso 26: Documentación
- [ ] **README.md**: Instalación y uso básico
- [ ] **Documentación técnica**: Para desarrolladores
- [ ] **Manual de usuario**: Para administradores
- [ ] **Changelog**: Historial de versiones

#### ✅ Paso 27: Preparar Distribución
- [ ] **Limpiar código**: Remover debug y comentarios
- [ ] **Versión final**: Actualizar plugin.xml
- [ ] **Crear package**: ZIP para distribución
- [ ] **Publicar**: GitHub, e107.org, etc.

---

## 💡 Ejemplos Prácticos

### Ejemplo Completo: Plugin de Testimonios

Vamos a crear un plugin completo paso a paso para gestionar testimonios de clientes.

#### 1. Estructura del Plugin

```
testimonios/
├── plugin.xml
├── testimonios.php
├── testimonios_setup.php
├── testimonios_sql.php
├── admin_config.php
├── e_shortcode.php
├── e_search.php
├── templates/
│   ├── testimonios_template.php
│   └── testimonios_admin_template.php
├── css/
│   └── testimonios.css
├── js/
│   └── testimonios.js
├── images/
│   ├── testimonios_16.png
│   ├── testimonios_32.png
│   └── testimonios_128.png
└── languages/
    └── English/
        ├── English_global.php
        └── English_admin.php
```

#### 2. plugin.xml

```xml
<?xml version="1.0" encoding="utf-8"?>
<e107Plugin name="Testimonios" lan="LAN_PLUGIN_TESTIMONIOS_NAME" 
            version="1.0" date="2024-01-01" compatibility="2.3" 
            installRequired="true">
    
    <author name="Tu Nombre" url="https://tuwebsite.com" />
    <summary>Sistema completo de testimonios para tu sitio web</summary>
    <description lan="LAN_PLUGIN_TESTIMONIOS_DIZ">Permite a los usuarios enviar testimonios y a los administradores gestionarlos con sistema de aprobación.</description>
    <category>content</category>
    
    <keywords>
        <word>testimonios</word>
        <word>reviews</word>
        <word>clientes</word>
        <word>opiniones</word>
    </keywords>
    
    <adminLinks>
        <link url='admin_config.php' description='Gestionar Testimonios' 
              icon='images/testimonios_32.png' iconSmall='images/testimonios_16.png' 
              primary='true'>LAN_PLUGIN_TESTIMONIOS_ADMIN</link>
        <link url="admin_config.php?mode=config" description="Configuración" 
              icon="settings">LAN_PLUGIN_TESTIMONIOS_CONFIG</link>
        <link url="admin_config.php?mode=stats" description="Estadísticas" 
              icon="chart">LAN_PLUGIN_TESTIMONIOS_STATS</link>
    </adminLinks>
    
    <siteLinks>
        <link category="1" url="{e_PLUGIN}testimonios/testimonios.php" 
              perm='everyone' sef='testimonios'>LAN_PLUGIN_TESTIMONIOS_LINK</link>
    </siteLinks>
    
    <pluginPrefs>
        <pref name="testimonios_habilitado">1</pref>
        <pref name="testimonios_aprobacion_requerida">1</pref>
        <pref name="testimonios_por_pagina">10</pref>
        <pref name="testimonios_permitir_anonimos">0</pref>
        <pref name="testimonios_rating_habilitado">1</pref>
        <pref name="testimonios_email_notificacion">admin@sitio.com</pref>
    </pluginPrefs>
    
</e107Plugin>
```

#### 3. Base de Datos (testimonios_sql.php)

```sql
/**
 * Estructura de base de datos para el plugin Testimonios
 */

CREATE TABLE testimonios (
    testimonio_id int(10) NOT NULL AUTO_INCREMENT,
    testimonio_nombre varchar(100) NOT NULL,
    testimonio_email varchar(100) NOT NULL,
    testimonio_empresa varchar(100),
    testimonio_cargo varchar(100),
    testimonio_sitio_web varchar(255),
    testimonio_texto text NOT NULL,
    testimonio_rating int(1) DEFAULT 5,
    testimonio_imagen varchar(255),
    testimonio_fecha int(10) NOT NULL,
    testimonio_ip varchar(45),
    testimonio_usuario_id int(10) DEFAULT 0,
    testimonio_aprobado tinyint(1) DEFAULT 0,
    testimonio_destacado tinyint(1) DEFAULT 0,
    testimonio_activo tinyint(1) DEFAULT 1,
    testimonio_orden int(5) DEFAULT 0,
    PRIMARY KEY (testimonio_id),
    KEY idx_aprobado (testimonio_aprobado),
    KEY idx_destacado (testimonio_destacado),
    KEY idx_fecha (testimonio_fecha),
    KEY idx_usuario (testimonio_usuario_id)
);

CREATE TABLE testimonios_categorias (
    categoria_id int(10) NOT NULL AUTO_INCREMENT,
    categoria_nombre varchar(100) NOT NULL,
    categoria_descripcion text,
    categoria_activa tinyint(1) DEFAULT 1,
    categoria_orden int(5) DEFAULT 0,
    PRIMARY KEY (categoria_id)
);

CREATE TABLE testimonios_config (
    config_nombre varchar(100) NOT NULL,
    config_valor text,
    PRIMARY KEY (config_nombre)
);
```

#### 4. Setup (testimonios_setup.php)

```php
<?php

if(!class_exists("testimonios_setup")) {
    class testimonios_setup {
        
        function install_post($var) {
            $sql = e107::getDb();
            $mes = e107::getMessage();
            
            // Insertar categorías por defecto
            $categorias = [
                ['categoria_nombre' => 'General', 'categoria_descripcion' => 'Testimonios generales', 'categoria_orden' => 1],
                ['categoria_nombre' => 'Servicios', 'categoria_descripcion' => 'Testimonios sobre servicios', 'categoria_orden' => 2],
                ['categoria_nombre' => 'Productos', 'categoria_descripcion' => 'Testimonios sobre productos', 'categoria_orden' => 3]
            ];
            
            foreach($categorias as $categoria) {
                $sql->insert('testimonios_categorias', $categoria);
            }
            
            // Insertar testimonio de ejemplo
            $testimonio_ejemplo = [
                'testimonio_nombre' => 'Juan Pérez',
                'testimonio_email' => 'juan@ejemplo.com',
                'testimonio_empresa' => 'Empresa Ejemplo S.L.',
                'testimonio_cargo' => 'Director General',
                'testimonio_texto' => 'Excelente servicio, muy recomendable. El equipo es profesional y los resultados superaron nuestras expectativas.',
                'testimonio_rating' => 5,
                'testimonio_fecha' => time(),
                'testimonio_aprobado' => 1,
                'testimonio_destacado' => 1,
                'testimonio_activo' => 1
            ];
            
            $sql->insert('testimonios', $testimonio_ejemplo);
            
            // Configuración inicial
            $config_inicial = [
                ['config_nombre' => 'email_template_nuevo', 'config_valor' => 'Nuevo testimonio recibido de {NOMBRE}'],
                ['config_nombre' => 'email_template_aprobado', 'config_valor' => 'Su testimonio ha sido aprobado']
            ];
            
            foreach($config_inicial as $config) {
                $sql->insert('testimonios_config', $config);
            }
            
            $mes->addSuccess('Plugin Testimonios instalado correctamente');
        }
        
        function uninstall_post($var) {
            $mes = e107::getMessage();
            
            // Limpiar archivos de imágenes
            $upload_path = e107::getFolder('media').'testimonios/';
            if(is_dir($upload_path)) {
                e107::getFile()->rmdir($upload_path, true);
            }
            
            $mes->addSuccess('Plugin Testimonios desinstalado completamente');
        }
    }
}
```

#### 5. Shortcodes (e_shortcode.php)

```php
<?php

if(!defined('e107_INIT')) {
    exit;
}

class testimonios_shortcodes extends e_shortcode {
    
    /**
     * Shortcode: {TESTIMONIOS_LISTA=limite|categoria|destacados}
     * Ejemplo: {TESTIMONIOS_LISTA=5|1|1} - 5 testimonios destacados de categoría 1
     */
    function sc_testimonios_lista($parm = '') {
        $sql = e107::getDb();
        $tp = e107::getParser();
        
        // Parsear parámetros
        $params = explode('|', $parm);
        $limite = (int)($params[0] ?? 5);
        $categoria = (int)($params[1] ?? 0);
        $solo_destacados = (int)($params[2] ?? 0);
        
        // Construir WHERE
        $where = 'testimonio_aprobado=1 AND testimonio_activo=1';
        
        if($categoria > 0) {
            $where .= ' AND categoria_id='.$categoria;
        }
        
        if($solo_destacados) {
            $where .= ' AND testimonio_destacado=1';
        }
        
        // Obtener testimonios
        if($testimonios = $sql->retrieve('testimonios', '*', 
           $where.' ORDER BY testimonio_orden ASC, testimonio_fecha DESC LIMIT '.$limite, true)) {
            
            $template = e107::getTemplate('testimonios', 'testimonios', 'lista');
            $html = $tp->parseTemplate($template['start'], true);
            
            foreach($testimonios as $testimonio) {
                $sc = e107::getScBatch('testimonios', true);
                $sc->setVars($testimonio);
                $html .= $tp->parseTemplate($template['item'], true, $sc);
            }
            
            $html .= $tp->parseTemplate($template['end'], true);
            return $html;
        }
        
        return '<div class="alert alert-info">No hay testimonios disponibles.</div>';
    }
    
    /**
     * Shortcode: {TESTIMONIOS_CONTADOR}
     * Muestra el número total de testimonios aprobados
     */
    function sc_testimonios_contador($parm = '') {
        $sql = e107::getDb();
        
        $count = $sql->count('testimonios', '(*)', 'testimonio_aprobado=1 AND testimonio_activo=1');
        
        return '<span class="testimonios-contador badge badge-primary">'.$count.'</span>';
    }
    
    /**
     * Shortcode: {TESTIMONIOS_RATING_PROMEDIO}
     * Calcula y muestra el rating promedio
     */
    function sc_testimonios_rating_promedio($parm = '') {
        $sql = e107::getDb();
        
        if($result = $sql->retrieve('testimonios', 'AVG(testimonio_rating) as promedio', 
           'testimonio_aprobado=1 AND testimonio_activo=1 AND testimonio_rating > 0')) {
            
            $promedio = round($result['promedio'], 1);
            $estrellas = str_repeat('★', floor($promedio)) . str_repeat('☆', 5 - floor($promedio));
            
            return '<span class="testimonios-rating" title="'.$promedio.' de 5">'.$estrellas.' ('.$promedio.')</span>';
        }
        
        return '';
    }
    
    /**
     * Shortcode: {TESTIMONIOS_FORMULARIO}
     * Muestra el formulario para enviar testimonios
     */
    function sc_testimonios_formulario($parm = '') {
        $frm = e107::getForm();
        $tp = e107::getParser();
        
        // Verificar si está habilitado
        if(!e107::pref('testimonios_habilitado')) {
            return '<div class="alert alert-warning">Los testimonios están deshabilitados temporalmente.</div>';
        }
        
        // Verificar permisos
        if(!e107::pref('testimonios_permitir_anonimos') && !USER) {
            return '<div class="alert alert-info">Debe <a href="'.e107::url('login').'">iniciar sesión</a> para enviar un testimonio.</div>';
        }
        
        $template = e107::getTemplate('testimonios', 'testimonios', 'formulario');
        
        // Variables para el template
        $vars = [
            'FORM_OPEN' => $frm->open('testimonio_form', 'post', e107::url('testimonios', 'testimonios')),
            'FORM_CLOSE' => $frm->close(),
            'NOMBRE_INPUT' => $frm->text('testimonio_nombre', '', 100, ['placeholder' => 'Su nombre completo', 'required' => true]),
            'EMAIL_INPUT' => $frm->email('testimonio_email', '', 100, ['placeholder' => 'su@email.com', 'required' => true]),
            'EMPRESA_INPUT' => $frm->text('testimonio_empresa', '', 100, ['placeholder' => 'Nombre de su empresa (opcional)']),
            'CARGO_INPUT' => $frm->text('testimonio_cargo', '', 100, ['placeholder' => 'Su cargo (opcional)']),
            'TEXTO_INPUT' => $frm->textarea('testimonio_texto', '', 5, 80, ['placeholder' => 'Escriba su testimonio aquí...', 'required' => true]),
            'RATING_INPUT' => $this->generateRatingInput(),
            'SUBMIT_BUTTON' => $frm->submit('enviar_testimonio', 'Enviar Testimonio', ['class' => 'btn btn-primary'])
        ];
        
        $sc = e107::getScBatch('testimonios', true);
        $sc->setVars($vars);
        
        return $tp->parseTemplate($template, true, $sc);
    }
    
    private function generateRatingInput() {
        if(!e107::pref('testimonios_rating_habilitado')) {
            return '';
        }
        
        $html = '<div class="rating-input">';
        $html .= '<label>Calificación:</label>';
        for($i = 5; $i >= 1; $i--) {
            $html .= '<input type="radio" name="testimonio_rating" value="'.$i.'" id="rating'.$i.'">';
            $html .= '<label for="rating'.$i.'">★</label>';
        }
        $html .= '</div>';
        
        return $html;
    }
}
```

#### 6. Templates (templates/testimonios_template.php)

```php
<?php
/**
 * Templates para el plugin Testimonios
 */

// Template para lista de testimonios
$TESTIMONIOS_TEMPLATE['lista']['start'] = '
<div class="testimonios-container">
    <div class="row">';

$TESTIMONIOS_TEMPLATE['lista']['item'] = '
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="testimonio-card card h-100">
            <div class="card-body">
                <div class="testimonio-rating mb-2">
                    {TESTIMONIO_RATING_STARS}
                </div>
                <blockquote class="testimonio-texto">
                    "{TESTIMONIO_TEXTO}"
                </blockquote>
                <footer class="testimonio-autor">
                    <strong>{TESTIMONIO_NOMBRE}</strong>
                    {TESTIMONIO_EMPRESA: <br><small class="text-muted">{TESTIMONIO_CARGO}, {TESTIMONIO_EMPRESA}</small>}
                    <small class="text-muted d-block">{TESTIMONIO_FECHA=relative}</small>
                </footer>
            </div>
        </div>
    </div>';

$TESTIMONIOS_TEMPLATE['lista']['end'] = '
    </div>
</div>';

// Template para testimonio destacado
$TESTIMONIOS_TEMPLATE['destacado'] = '
<div class="testimonio-destacado bg-light p-4 rounded">
    <div class="row align-items-center">
        <div class="col-md-8">
            <blockquote class="mb-3">
                <p class="lead">"{TESTIMONIO_TEXTO}"</p>
            </blockquote>
            <footer>
                <strong>{TESTIMONIO_NOMBRE}</strong>
                {TESTIMONIO_EMPRESA: - <em>{TESTIMONIO_CARGO}, {TESTIMONIO_EMPRESA}</em>}
            </footer>
        </div>
        <div class="col-md-4 text-center">
            <div class="testimonio-rating-large">
                {TESTIMONIO_RATING_STARS}
            </div>
        </div>
    </div>
</div>';

// Template para formulario
$TESTIMONIOS_TEMPLATE['formulario'] = '
<div class="testimonio-formulario">
    <h3>Enviar Testimonio</h3>
    {FORM_OPEN}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre *</label>
                    {NOMBRE_INPUT}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email *</label>
                    {EMAIL_INPUT}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Empresa</label>
                    {EMPRESA_INPUT}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cargo</label>
                    {CARGO_INPUT}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Su Testimonio *</label>
            {TEXTO_INPUT}
        </div>
        <div class="form-group">
            {RATING_INPUT}
        </div>
        <div class="form-group">
            {SUBMIT_BUTTON}
        </div>
    {FORM_CLOSE}
</div>';

// Shortcodes específicos para testimonios
class testimonios_template_shortcodes extends e_shortcode {
    
    function sc_testimonio_rating_stars($parm = '') {
        $rating = (int)$this->var['testimonio_rating'];
        if($rating <= 0) return '';
        
        $stars = str_repeat('<i class="fas fa-star text-warning"></i>', $rating);
        $empty = str_repeat('<i class="far fa-star text-muted"></i>', 5 - $rating);
        
        return '<div class="rating-stars">'.$stars.$empty.'</div>';
    }
    
    function sc_testimonio_texto($parm = '') {
        $tp = e107::getParser();
        $texto = $this->var['testimonio_texto'];
        
        // Limitar longitud si se especifica
        if($parm && is_numeric($parm)) {
            $texto = $tp->text_truncate($texto, (int)$parm);
        }
        
        return $tp->toHTML($texto, true);
    }
    
    function sc_testimonio_fecha($parm = 'short') {
        $fecha = (int)$this->var['testimonio_fecha'];
        
        switch($parm) {
            case 'relative':
                return e107::getDate()->computeLapse($fecha);
            case 'long':
                return date('d \d\e F \d\e Y', $fecha);
            default:
                return date('d/m/Y', $fecha);
        }
    }
}
```

---

## ⭐ Mejores Prácticas

### 🔒 Seguridad

#### Validación y Sanitización de Datos

```php
// ✅ CORRECTO: Validar y sanitizar entrada
function procesarTestimonio($datos) {
    $sql = e107::getDb();
    $tp = e107::getParser();
    $mes = e107::getMessage();
    
    // Validar campos requeridos
    if(empty($datos['nombre']) || empty($datos['email']) || empty($datos['texto'])) {
        $mes->addError('Todos los campos marcados con * son obligatorios');
        return false;
    }
    
    // Validar email
    if(!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $mes->addError('El email no tiene un formato válido');
        return false;
    }
    
    // Sanitizar datos
    $testimonio = [
        'testimonio_nombre' => $tp->toDB($datos['nombre']),
        'testimonio_email' => $tp->toDB($datos['email']),
        'testimonio_texto' => $tp->toDB($datos['texto']),
        'testimonio_rating' => (int)$datos['rating'],
        'testimonio_fecha' => time(),
        'testimonio_ip' => e107::getIPHandler()->getIP(),
        'testimonio_usuario_id' => (int)USERID
    ];
    
    // Usar prepared statement
    return $sql->insert('testimonios', $testimonio);
}

// ❌ INCORRECTO: Insertar datos sin validar
function procesarTestimonioMal($datos) {
    $sql = e107::getDb();
    
    // Peligroso: datos sin validar ni sanitizar
    $sql->gen("INSERT INTO testimonios (nombre, email, texto) VALUES 
               ('{$datos['nombre']}', '{$datos['email']}', '{$datos['texto']}')");
}
```

#### Verificación de Permisos

```php
// ✅ CORRECTO: Verificar permisos antes de acciones críticas
class testimonios_admin {
    
    function __construct() {
        // Verificar permisos de administrador
        if(!getperms('P')) {
            e107::redirect('admin');
            exit;
        }
    }
    
    function eliminarTestimonio($id) {
        // Doble verificación
        if(!getperms('P') || !is_numeric($id)) {
            return false;
        }
        
        $sql = e107::getDb();
        return $sql->delete('testimonios', 'testimonio_id='.(int)$id);
    }
}

// Frontend: verificar si el usuario puede enviar testimonios
function puedeEnviarTestimonio() {
    // Si requiere login y no está logueado
    if(!e107::pref('testimonios_permitir_anonimos') && !USER) {
        return false;
    }
    
    // Si está deshabilitado
    if(!e107::pref('testimonios_habilitado')) {
        return false;
    }
    
    // Verificar límite por IP (anti-spam)
    $sql = e107::getDb();
    $ip = e107::getIPHandler()->getIP();
    $hace_24h = time() - (24 * 3600);
    
    $count = $sql->count('testimonios', '(*)', 
        'testimonio_ip="'.$sql->escape($ip).'" AND testimonio_fecha > '.$hace_24h);
    
    return $count < 3; // Máximo 3 por día por IP
}
```

### ⚠️ Errores Comunes a Evitar

#### 1. No usar prefijos de tabla

```php
// ❌ INCORRECTO
$sql->select('testimonios', '*', 'activo=1');

// ✅ CORRECTO - e107 añade el prefijo automáticamente
$sql->select('testimonios', '*', 'testimonio_activo=1');
```

#### 2. Hardcodear rutas

```php
// ❌ INCORRECTO
$imagen_url = '/e107_plugins/testimonios/images/default.jpg';

// ✅ CORRECTO
$imagen_url = e107::getPluginPath('testimonios').'images/default.jpg';
// o mejor aún
$imagen_url = '{e_PLUGIN}testimonios/images/default.jpg';
```

#### 3. No manejar errores de base de datos

```php
// ❌ INCORRECTO
function obtenerTestimonios() {
    $sql = e107::getDb();
    return $sql->retrieve('testimonios', '*', 'activo=1', true);
}

// ✅ CORRECTO
function obtenerTestimonios() {
    $sql = e107::getDb();
    
    try {
        $result = $sql->retrieve('testimonios', '*', 'testimonio_activo=1', true);
        
        if($result === false) {
            e107::getMessage()->addError('Error al obtener testimonios');
            return [];
        }
        
        return $result;
        
    } catch(Exception $e) {
        e107::getMessage()->addError('Error de base de datos: '.$e->getMessage());
        return [];
    }
}
```

#### 4. Ignorar la internacionalización

```php
// ❌ INCORRECTO
echo '<h2>Lista de Testimonios</h2>';
echo '<p>No hay testimonios disponibles</p>';

// ✅ CORRECTO
echo '<h2>'.LAN_PLUGIN_TESTIMONIOS_LISTA_TITULO.'</h2>';
echo '<p>'.LAN_PLUGIN_TESTIMONIOS_NO_DISPONIBLES.'</p>';

// o usando el parser
$tp = e107::getParser();
echo $tp->lanVars('<h2>[LAN=LAN_PLUGIN_TESTIMONIOS_LISTA_TITULO]</h2>');
```

### ✅ Convenciones de Código

#### Nomenclatura de Archivos y Clases

```php
// Estructura de nombres
Plugin: testimonios
Archivo principal: testimonios.php
Clase principal: testimonios_front
Setup: testimonios_setup
Shortcodes: testimonios_shortcodes
Admin: testimonios_admin
Tabla: testimonios (sin prefijo)
Campos: testimonio_id, testimonio_nombre, etc.
```

#### Constantes de Idioma

```php
// languages/English/English_global.php
define('LAN_PLUGIN_TESTIMONIOS_NAME', 'Testimonios');
define('LAN_PLUGIN_TESTIMONIOS_DIZ', 'Sistema de testimonios');
define('LAN_PLUGIN_TESTIMONIOS_LISTA_TITULO', 'Lista de Testimonios');
define('LAN_PLUGIN_TESTIMONIOS_NO_DISPONIBLES', 'No hay testimonios disponibles');
define('LAN_PLUGIN_TESTIMONIOS_ENVIAR', 'Enviar Testimonio');
define('LAN_PLUGIN_TESTIMONIOS_NOMBRE', 'Nombre');
define('LAN_PLUGIN_TESTIMONIOS_EMAIL', 'Email');
define('LAN_PLUGIN_TESTIMONIOS_TEXTO', 'Testimonio');
define('LAN_PLUGIN_TESTIMONIOS_RATING', 'Calificación');

// languages/English/English_admin.php
define('LAN_PLUGIN_TESTIMONIOS_ADMIN', 'Gestionar Testimonios');
define('LAN_PLUGIN_TESTIMONIOS_CONFIG', 'Configuración');
define('LAN_PLUGIN_TESTIMONIOS_STATS', 'Estadísticas');
define('LAN_PLUGIN_TESTIMONIOS_APROBAR', 'Aprobar');
define('LAN_PLUGIN_TESTIMONIOS_RECHAZAR', 'Rechazar');
define('LAN_PLUGIN_TESTIMONIOS_ELIMINAR', 'Eliminar');
```

### 🚀 Optimización y Rendimiento

#### Uso de Caché

```php
// ✅ CORRECTO: Usar caché para consultas pesadas
function obtenerTestimoniosDestacados() {
    $cache_key = 'testimonios_destacados_'.md5('destacados_activos');
    
    // Intentar obtener del caché
    if($cached = e107::getCache()->retrieve($cache_key)) {
        return $cached;
    }
    
    // Si no está en caché, consultar BD
    $sql = e107::getDb();
    $testimonios = $sql->retrieve('testimonios', '*', 
        'testimonio_destacado=1 AND testimonio_aprobado=1 AND testimonio_activo=1 
         ORDER BY testimonio_orden ASC, testimonio_fecha DESC LIMIT 5', true);
    
    // Guardar en caché por 1 hora
    e107::getCache()->set($cache_key, $testimonios, 3600);
    
    return $testimonios;
}

// Limpiar caché cuando se modifiquen testimonios
function actualizarTestimonio($id, $datos) {
    $sql = e107::getDb();
    
    if($sql->update('testimonios', $datos, 'testimonio_id='.(int)$id)) {
        // Limpiar cachés relacionados
        e107::getCache()->clear('testimonios_');
        return true;
    }
    
    return false;
}
```

#### Consultas Optimizadas

```php
// ✅ CORRECTO: Usar índices y limitar resultados
function buscarTestimonios($termino, $limite = 10, $offset = 0) {
    $sql = e107::getDb();
    $tp = e107::getParser();
    
    $termino_seguro = $sql->escape($tp->toDB($termino));
    
    // Usar FULLTEXT si está disponible, sino LIKE optimizado
    $where = "(testimonio_nombre LIKE '%{$termino_seguro}%' 
               OR testimonio_empresa LIKE '%{$termino_seguro}%' 
               OR testimonio_texto LIKE '%{$termino_seguro}%') 
              AND testimonio_aprobado=1 AND testimonio_activo=1";
    
    return $sql->retrieve('testimonios', '*', 
        $where.' ORDER BY testimonio_destacado DESC, testimonio_fecha DESC 
        LIMIT '.(int)$offset.','.(int)$limite, true);
}

// ❌ INCORRECTO: Consulta sin optimizar
function buscarTestimoniosMal($termino) {
    $sql = e107::getDb();
    
    // Sin escape, sin límite, sin índices
    return $sql->gen("SELECT * FROM testimonios WHERE testimonio_texto LIKE '%{$termino}%'");
}
```

### 🌐 SEO — Schema.org JSON-LD (Datos Estructurados)

Una práctica moderna fundamental para cualquier plugin que gestione entidades del mundo real (negocios, eventos, reservas, reseñas) es la **inyección de datos estructurados** usando el formato **JSON-LD** de [Schema.org](https://schema.org/). Esto permite a Google, Bing y otros motores de búsqueda entender el contenido de la página y generar **rich snippets** (estrellas, horarios, dirección, etc.) en los resultados de búsqueda.

#### ¿Por qué es importante?

- **Rich Snippets en Google**: Estrellas de valoración, horarios de apertura, dirección y teléfono aparecen directamente en los resultados de búsqueda.
- **Knowledge Panel**: Google puede mostrar un panel lateral con la información del negocio.
- **Google Maps**: Los datos de `LocalBusiness` alimentan fichas de Google Maps.
- **Mayor CTR**: Las páginas con rich snippets obtienen entre un 20-40% más de clics.
- **Estándar universal**: Schema.org es soportado por Google, Bing, Yahoo, Yandex y Apple.

#### Tipos de Schema relevantes para un plugin de reservas

| Schema Type       | Uso                                                    |
|-------------------|--------------------------------------------------------|
| `LocalBusiness`   | Datos del negocio (nombre, dirección, teléfono, URL)   |
| `Service`         | Servicios que ofrece el negocio (tipo de cita, precio) |
| `Event`           | Cada cita/sesión disponible como evento reservable     |
| `AggregateRating` | Puntuación promedio del negocio basada en reseñas      |
| `Review`          | Reseñas individuales de clientes                       |
| `OpeningHoursSpecification` | Horarios de atención configurados          |
| `Offer`           | Precio del servicio (gratis o de pago)                 |

#### Implementación en e107 — Archivo `e_header.php`

El lugar ideal para inyectar JSON-LD en un plugin de e107 es el archivo `e_header.php`, que se carga automáticamente en el `<head>` de todas las páginas del frontend:

```php
<?php
/**
 * e_header.php — Inyección de CSS, JS y datos estructurados Schema.org
 */
if (!defined('e107_INIT')) { exit; }

// --- CSS y JS del plugin ---
e107::css('booking', 'css/booking.css');
e107::js('booking', 'js/booking.js', 'jquery');

// --- Schema.org JSON-LD (solo en la página del plugin) ---
// Detectar si estamos en la página de booking
$currentUrl = e_REQUEST_URI;
if (strpos($currentUrl, '/booking') !== false)
{
    $pref  = e107::pref('booking');
    $tp    = e107::getParser();
    $siteUrl = SITEURL;

    // ── 1. LocalBusiness ──
    $schema = array(
        '@context'  => 'https://schema.org',
        '@type'     => 'LocalBusiness',
        'name'      => $tp->toText(SITENAME),
        'url'       => $siteUrl,
        'telephone' => $tp->toText(varset($pref['business_phone'], '')),
        'email'     => $tp->toText(varset($pref['business_email'], SITEADMINEMAIL)),
        'image'     => $siteUrl . 'e107_images/logo.png',
    );

    // Dirección (si está configurada)
    if (!empty($pref['business_address']))
    {
        $schema['address'] = array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => $tp->toText($pref['business_address']),
            'addressLocality' => $tp->toText(varset($pref['business_city'], '')),
            'postalCode'      => $tp->toText(varset($pref['business_zip'], '')),
            'addressCountry'  => $tp->toText(varset($pref['business_country'], '')),
        );
    }

    // ── 2. OpeningHoursSpecification ──
    $dayMap = array(
        'mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday',
        'thu' => 'Thursday', 'fri' => 'Friday', 'sat' => 'Saturday', 'sun' => 'Sunday',
    );

    $availDays = !empty($pref['available_days']) ? $pref['available_days'] : array();
    $timeStart = varset($pref['time_start'], '09:00');
    $timeEnd   = varset($pref['time_end'], '18:00');

    $hours = array();
    foreach ($availDays as $day)
    {
        if (isset($dayMap[$day]))
        {
            $hours[] = array(
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => $dayMap[$day],
                'opens'     => $timeStart,
                'closes'    => $timeEnd,
            );
        }
    }

    if (!empty($hours))
    {
        $schema['openingHoursSpecification'] = $hours;
    }

    // ── 3. Service (tipo de cita) ──
    $service = array(
        '@type'       => 'Service',
        'name'        => $tp->toText(varset($pref['event_title'], 'Booking Session')),
        'description' => $tp->toText(varset($pref['event_description'], '')),
        'provider'    => array(
            '@type' => 'LocalBusiness',
            'name'  => $tp->toText(SITENAME),
        ),
        'offers' => array(
            '@type'         => 'Offer',
            'price'         => '0',
            'priceCurrency' => varset($pref['business_currency'], 'EUR'),
            'availability'  => 'https://schema.org/InStock',
        ),
    );

    $schema['makesOffer'] = array($service);

    // ── 4. AggregateRating (si hay sistema de reseñas) ──
    // Esto se activa solo si el plugin tiene reseñas almacenadas
    $db = e107::getDb();
    if ($db->isTable('booking_reviews'))
    {
        $stats = $db->retrieve('booking_reviews',
            'COUNT(*) AS cnt, AVG(review_rating) AS avg_rating',
            'review_active = 1', true);

        if (!empty($stats[0]) && $stats[0]['cnt'] > 0)
        {
            $schema['aggregateRating'] = array(
                '@type'       => 'AggregateRating',
                'ratingValue' => round((float) $stats[0]['avg_rating'], 1),
                'reviewCount' => (int) $stats[0]['cnt'],
                'bestRating'  => 5,
                'worstRating' => 1,
            );
        }
    }

    // ── Inyectar el JSON-LD en el <head> ──
    $jsonLd = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    e107::js('inline', 'var _bookingSchemaLD = true;', 'jquery', 1);
    e107::meta(null, null, array(
        'tag'  => 'script',
        'type' => 'application/ld+json',
        'text' => $jsonLd,
    ));
    // Alternativa si e107::meta no soporta <script>:
    // e107::js('footer_inline', '/* Schema.org */ 
    //   document.head.insertAdjacentHTML("beforeend",
    //     \'<script type="application/ld+json">\' + JSON.stringify(' . $jsonLd . ') + \'</script>\');
    // ');
}
```

#### Ejemplo de salida JSON-LD generada

```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Mi Academia de Idiomas",
  "url": "https://miacademia.com/",
  "telephone": "+34 912 345 678",
  "email": "info@miacademia.com",
  "image": "https://miacademia.com/e107_images/logo.png",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Calle Mayor 10",
    "addressLocality": "Madrid",
    "postalCode": "28001",
    "addressCountry": "ES"
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Monday",
      "opens": "09:00",
      "closes": "18:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Tuesday",
      "opens": "09:00",
      "closes": "18:00"
    }
  ],
  "makesOffer": [
    {
      "@type": "Service",
      "name": "Sesión de Admisión",
      "description": "Sesión gratuita de 30 min para conocer el programa",
      "provider": {
        "@type": "LocalBusiness",
        "name": "Mi Academia de Idiomas"
      },
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "EUR",
        "availability": "https://schema.org/InStock"
      }
    }
  ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": 4.7,
    "reviewCount": 23,
    "bestRating": 5,
    "worstRating": 1
  }
}
```

#### Validación de datos estructurados

Siempre valida tu JSON-LD usando las herramientas oficiales:

| Herramienta | URL | Propósito |
|---|---|---|
| **Google Rich Results Test** | https://search.google.com/test/rich-results | Verifica elegibilidad para rich snippets |
| **Schema.org Validator** | https://validator.schema.org/ | Validación genérica del markup |
| **Google Search Console** | https://search.google.com/search-console | Monitoreo de errores en datos estructurados |

#### Buenas prácticas para Schema.org en plugins e107

1. **Solo inyectar en páginas relevantes** — No añadir Schema en todas las páginas. Usar detección de ruta (`e_REQUEST_URI`).
2. **Datos reales, no ficticios** — Nunca inventar reseñas o ratings. Google penaliza el markup falso.
3. **Mantener sincronizado** — Los datos del JSON-LD deben coincidir con lo que se muestra en la página.
4. **Usar `e107::getParser()->toText()`** — Para limpiar HTML del contenido antes de insertarlo en JSON-LD.
5. **Cachear el JSON-LD** — Si la generación es pesada (consultas DB), usar `e107::getCache()`.
6. **Actualizar al guardar configuración** — Limpiar caché de Schema al cambiar settings del plugin.
7. **Testear después de cada cambio** — Usar el Rich Results Test de Google tras modificar el markup.

---

### 📖 Patrón: Guía de Usuario integrada en Admin (User Guide Page)

Este patrón permite incluir una **página de documentación** dentro del panel de administración del plugin, con **pestañas Bootstrap 5**. Es un modelo reutilizable para todos los plugins.

#### ¿Por qué incluir una Guía de Usuario?

- Reduce las consultas de soporte al ofrecer ayuda contextual.
- Está siempre disponible dentro del admin, sin necesidad de abrir documentación externa.
- Se traduce automáticamente usando el sistema de idiomas de e107.
- Sirve como plantilla estándar para documentar cualquier plugin.

#### Implementación paso a paso

**1. Añadir el menú en el dispatcher (`admin_config.php`)**

```php
protected $adminMenu = array(
    'main/list'   => array('caption' => 'LAN_BOOKING_ADMIN_RESERVATIONS', 'perm' => 'P', 'icon' => 'fa-calendar-check'),
    'main/create' => array('caption' => 'LAN_CREATE',                     'perm' => 'P', 'icon' => 'fa-plus'),
    'main/prefs'  => array('caption' => 'LAN_BOOKING_ADMIN_SETTINGS',     'perm' => '0', 'icon' => 'fa-cog'),
    // ... más entradas ...
    'main/guide'  => array('caption' => 'LAN_BOOKING_ADMIN_GUIDE',        'perm' => 'P', 'icon' => 'fa-book'),
);
```

La clave `main/guide` hace que e107 busque automáticamente el método `guidePage()` en la clase UI.

**2. Crear el método `guidePage()` en la clase `e_admin_ui`**

```php
public function guidePage()
{
    $ns = e107::getRender();
    $tp = e107::getParser();

    // Definir pestañas: id => array(label, icon)
    $tabs = array(
        'overview'      => array('label' => defset('LAN_MYPLUGIN_GUIDE_TAB_OVERVIEW', 'Overview'),       'icon' => 'fa-info-circle'),
        'configuration' => array('label' => defset('LAN_MYPLUGIN_GUIDE_TAB_CONFIG', 'Configuration'),    'icon' => 'fa-cog'),
        'usage'         => array('label' => defset('LAN_MYPLUGIN_GUIDE_TAB_USAGE', 'Usage'),             'icon' => 'fa-play'),
        'troubleshoot'  => array('label' => defset('LAN_MYPLUGIN_GUIDE_TAB_TROUBLESHOOT', 'Troubleshooting'), 'icon' => 'fa-wrench'),
    );

    // Construir nav-tabs
    $text  = '<ul class="nav nav-tabs" id="myPluginGuideTab" role="tablist">';
    $first = true;
    foreach ($tabs as $id => $tab)
    {
        $active = $first ? ' active' : '';
        $sel    = $first ? 'true' : 'false';
        $text  .= '<li class="nav-item" role="presentation">';
        $text  .= '<button class="nav-link' . $active . '" id="guide-' . $id . '-tab" ';
        $text  .= 'data-bs-toggle="tab" data-bs-target="#guide-' . $id . '" ';
        $text  .= 'type="button" role="tab" aria-controls="guide-' . $id . '" ';
        $text  .= 'aria-selected="' . $sel . '">';
        $text  .= '<i class="fa ' . $tab['icon'] . '"></i> ' . $tp->toHTML($tab['label'], false, 'TITLE');
        $text  .= '</button></li>';
        $first  = false;
    }
    $text .= '</ul>';

    // Construir tab-content
    $text .= '<div class="tab-content p-3 border border-top-0 rounded-bottom" id="myPluginGuideTabContent">';
    $first = true;
    foreach ($tabs as $id => $tab)
    {
        $active = $first ? ' show active' : '';
        $text  .= '<div class="tab-pane fade' . $active . '" id="guide-' . $id . '" role="tabpanel">';
        $text  .= $this->_guideContent($id);
        $text  .= '</div>';
        $first  = false;
    }
    $text .= '</div>';

    $ns->tablerender(defset('LAN_MYPLUGIN_ADMIN_GUIDE', 'User Guide') . ' — Mi Plugin', $text);
}
```

**3. Método auxiliar `_guideContent()` con switch**

```php
private function _guideContent($tab)
{
    switch ($tab)
    {
        case 'overview':
            return '<h4>' . defset('LAN_MYPLUGIN_GUIDE_OVERVIEW_TITLE', 'Welcome') . '</h4>'
                . '<p>' . defset('LAN_MYPLUGIN_GUIDE_OVERVIEW_P1', 'Plugin description here...') . '</p>';

        case 'configuration':
            return '<h4>' . defset('LAN_MYPLUGIN_GUIDE_CONFIG_TITLE', 'Configuration') . '</h4>'
                . '<p>' . defset('LAN_MYPLUGIN_GUIDE_CONFIG_P1', 'Settings explanation...') . '</p>';

        // ... más cases ...

        default:
            return '';
    }
}
```

**4. Constantes de idioma**

Cada texto debe ser una constante `LAN_MYPLUGIN_GUIDE_*` definida en los archivos `{Lang}_admin.php`:

```php
// English_admin.php
define('LAN_MYPLUGIN_ADMIN_GUIDE',           'User Guide');
define('LAN_MYPLUGIN_GUIDE_TAB_OVERVIEW',    'Overview');
define('LAN_MYPLUGIN_GUIDE_TAB_CONFIG',      'Configuration');
define('LAN_MYPLUGIN_GUIDE_OVERVIEW_TITLE',  'Welcome to My Plugin');
define('LAN_MYPLUGIN_GUIDE_OVERVIEW_P1',     'This plugin allows you to...');
```

#### Buenas prácticas

- Usar `defset()` como fallback para que la página funcione aunque falte la traducción.
- Emplear tablas `<table class="table table-striped">` para documentar opciones de configuración.
- Incluir alertas `<div class="alert alert-info">` para consejos y `alert-warning` para advertencias.
- Usar definition lists `<dl><dt><dd>` para FAQ/Troubleshooting.
- Cada pestaña debe ser autocontenida (el usuario debe entender esa sección sin leer las demás).
- Limitar el número de pestañas a 4-7 para no sobrecargar la navegación.

---

### 🪪 Patrón: Ayuda lateral + página "Acerca de" (Plugin Identity)

> **Aplica a**: todo plugin destinado a distribución profesional (gratis o de pago).
> **Implementado en**: `sitedown_styles/admin_config.php` (commit v2.0.0).

#### ¿Por qué este patrón?

Un plugin profesional necesita exponer en el panel **dos superficies de identidad**, ambas alimentadas por una **única fuente de verdad** (DRY):

1. **Widget de ayuda lateral** (sidebar) — visible en *todas* las páginas admin del plugin: descripción corta, sugerencia destacada, 3 botones esenciales (docs / soporte / donar).
2. **Página "Acerca de"** (tab dedicado en `$adminMenu`) — ficha completa: identidad, autor, agencia, contacto, licencia, descripción extendida, botones de soporte, footer de copyright.

**Fuente única**: un método privado `getPluginInfo()` devuelve un array con todos los campos (nombre, versión, autor, URLs, etc.). Tanto `renderHelp()` como `aboutPage()` lo consumen — basta cambiar la versión en un sitio.

#### ⚠️ Reglas críticas (descubiertas en producción)

> **Estas dos reglas son obligatorias.** Ignorarlas produce paneles rotos visualmente o markup ilegible para mantenimiento futuro.

##### Regla 1 — Bootstrap **3** únicamente (NO Bootstrap 5)

El admin de e107 v2 carga **Bootstrap 3** (no BS5). Las clases utilitarias modernas (`d-flex`, `gap-*`, `me-*`, `text-end`, `bg-primary`, `mb-3`, `card`, `card-body`, `btn-outline-*`, `btn-dark`, `btn-secondary`, `align-items-center`, `justify-content-between`, `border-*`) **no existen** y la página se renderiza sin estilos.

| Concepto       | ❌ Bootstrap 5 (no usar)                | ✅ Bootstrap 3 / e107 nativo                       |
| -------------- | --------------------------------------- | -------------------------------------------------- |
| Tarjeta        | `card` / `card-body` / `card-header`    | `panel panel-default` / `panel-body` / `panel-heading` |
| Badge          | `badge bg-primary`                      | `label label-primary`                              |
| Flexbox row    | `d-flex align-items-center`             | `media` / `media-left media-middle` / `media-body` |
| Grid de botones| `d-grid gap-2`                          | `btn-block` apilados (uno por línea)               |
| Variantes btn  | `btn-outline-*` / `btn-dark` / `btn-secondary` | `btn-default` / `btn-info` / `btn-warning`     |
| Margen utility | `mb-3` / `mt-3` / `me-2`                | `style="margin:..."` inline o usar `<hr>`          |
| Texto derecha  | `text-end`                              | `text-right` / `pull-right`                        |
| Texto centrado | (igual: `text-center`)                  | `text-center` ✓                                    |
| Texto silencioso| `text-muted` ✓                         | `text-muted` ✓                                     |

**Cómo verificar**: si tu página *Acerca de* se ve sin paneles, sin badges y los botones aparecen apilados sin estilo, es porque estás usando clases BS5. Reescribe con la columna derecha de la tabla.

##### Regla 2 — Separación lógica / marcado / estilo

Sigue **el mismo patrón** que `templatesPage()` y `copyPage()` del plugin: el método del controlador **no debe contener HTML largo**. En su lugar:

```
templates/admin_about_template.php   ← markup HTML con {PLACEHOLDERS}
admin_config.php :: aboutPage()      ← controlador puro: incluye template,
                                       arma datos, hace strtr(), retorna
```

**Ventajas**:
- El diseñador puede tocar el template sin entender PHP.
- Los traductores ven solo el controlador (las cadenas son LANs).
- Se reutiliza el mismo *chunk* (p. ej. `$ADMIN_ABOUT_BUTTON`) para N botones via `foreach + strtr()`.
- Match exacto con la convención existente de e107 (booking, hero, _blank).

**Ejemplo del template** (fragmento):

```php
$ADMIN_ABOUT_HEADER = '
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <h3 style="margin-top:0">
                    <i class="fa fa-cube"></i>
                    {NAME} <span class="label label-primary">v{VERSION}</span>
                </h3>
                <p class="text-muted">{SUMMARY}</p>
            </div>
            <div class="col-sm-4 text-right">
                <p class="text-muted small">
                    <i class="fa fa-calendar"></i> {LBL_RELEASED}: <strong>{RELEASED}</strong>
                </p>
            </div>
        </div>
    </div>
</div>';

$ADMIN_ABOUT_BUTTON = '<a href="{URL}" target="_blank" rel="noopener" class="btn {CLASS}" style="margin-right:6px;margin-bottom:6px">
    <i class="fa {ICON}"></i> {LABEL}
</a>';
```

**Ejemplo del controlador** (fragmento):

```php
public function aboutPage()
{
    $info = $this->getPluginInfo();
    $esc  = function ($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); };

    $tplFile = e_PLUGIN . 'miplugin/templates/admin_about_template.php';
    if (!is_readable($tplFile)) { return '<div class="alert alert-danger">Missing template</div>'; }
    include $tplFile; // define $ADMIN_ABOUT_HEADER, $ADMIN_ABOUT_BUTTON, …

    $header = strtr($ADMIN_ABOUT_HEADER, array(
        '{NAME}'         => $esc($info['name']),
        '{VERSION}'      => $esc($info['version']),
        '{SUMMARY}'      => LAN_MIPLUGIN_SUMMARY,
        '{LBL_RELEASED}' => LAN_MIPLUGIN_ABOUT_RELEASED,
        '{RELEASED}'     => $esc($info['released']),
    ));

    // Botones via foreach (DRY total)
    $buttons = array(
        array($info['docs'],   'fa-book',  'btn-info',    LAN_MIPLUGIN_BTN_DOCS),
        array($info['donate'], 'fa-heart', 'btn-success', LAN_MIPLUGIN_BTN_DONATE),
    );
    $btnHtml = '';
    foreach ($buttons as $b) {
        $btnHtml .= strtr($ADMIN_ABOUT_BUTTON, array(
            '{URL}' => $esc($b[0]), '{ICON}' => $b[1],
            '{CLASS}' => $b[2], '{LABEL}' => $b[3],
        ));
    }

    return $header . /* …otros bloques… */ $btnHtml;
}
```

> **Importante**: el dispatcher de e107 envuelve la salida de páginas custom en su propio panel automáticamente. **No** llames `tablerender()` desde `aboutPage()` o tendrás un panel doble.

#### Estructura mínima

##### 1. Entrada en `$adminMenu`

```php
protected $adminMenu = array(
    // …otras páginas…
    'main/about' => array(
        'caption' => LAN_PLUGIN_MIPLUGIN_ABOUT,
        'perm'    => 'P',
        'icon'    => 'fa-info-circle'
    ),
);
```

##### 2. Helper `getPluginInfo()` (fuente única de verdad)

```php
private function getPluginInfo()
{
    return array(
        'name'        => 'Mi Plugin',
        'version'     => '2.0.0',
        'released'    => '2026-05-02',
        'author'      => 'NombreAutor',
        'agency'      => 'KreativeKey',
        'website'     => 'https://kreativekey.pt',
        'email'       => 'info@kreativekey.pt',
        'license'     => 'GNU General Public License v3.0',
        'license_url' => 'https://www.gnu.org/licenses/gpl-3.0.html',
        'compat'      => 'e107 v2.3+ / PHP 8.0+',
        'docs'        => 'https://github.com/.../wiki',
        'support'     => 'https://github.com/.../issues',
        'repo'        => 'https://github.com/...',
        'changelog'   => 'https://github.com/.../blob/main/CHANGELOG.md',
        'donate'      => 'https://ko-fi.com/...',
        'review'      => 'https://e107.org/marketplace',
    );
}
```

> ⚠ **Nota sobre `plugin.xml`**: el esquema XML del core e107 **no tiene nodos** para `donate`, `support`, `repo`, etc. Estos campos viven exclusivamente en `getPluginInfo()` (lado admin). El XML se queda con `<author url="…" email="…" />`, `<copyright>` y `<screenshots>`.

##### 3. `renderHelp()` — widget lateral (reemplaza `e_help.php`, deprecated)

```php
/**
 * Sidebar help widget. Llamado automáticamente por el dispatcher
 * en CADA página admin del plugin. Devuelve array con caption + text.
 */
public function renderHelp()
{
    $info = $this->getPluginInfo();

    $text = '
    <div class="ss-help-widget">
        <p><strong>' . htmlspecialchars($info['name']) . '</strong>
           <span class="badge bg-secondary">v' . htmlspecialchars($info['version']) . '</span></p>
        <p class="text-muted">' . LAN_MIPLUGIN_HELP_TAGLINE . '</p>
        <div class="alert alert-info py-2 px-2">
            <i class="fa fa-lightbulb"></i> ' . LAN_MIPLUGIN_HELP_TIP . '
        </div>
        <div class="d-grid gap-2">
            <a href="' . htmlspecialchars($info['docs'])    . '" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa fa-book"></i> ' . LAN_MIPLUGIN_BTN_DOCS    . '</a>
            <a href="' . htmlspecialchars($info['support']) . '" target="_blank" class="btn btn-sm btn-outline-warning"><i class="fa fa-life-ring"></i> ' . LAN_MIPLUGIN_BTN_SUPPORT . '</a>
            <a href="' . htmlspecialchars($info['donate'])  . '" target="_blank" class="btn btn-sm btn-outline-success"><i class="fa fa-heart"></i> ' . LAN_MIPLUGIN_BTN_DONATE  . '</a>
            <a href="' . e_SELF . '?mode=main&amp;action=about" class="btn btn-sm btn-link">' . LAN_MIPLUGIN_HELP_MORE . ' &raquo;</a>
        </div>
    </div>';

    return array(
        'caption' => LAN_MIPLUGIN_HELP_CAPTION,
        'text'    => $text,
    );
}
```

##### 4. `aboutPage()` — página completa

Estructura recomendada (4 cards verticales + footer):

| Card | Contenido | Icono |
|------|-----------|-------|
| **Header** | Nombre + versión (badge), summary, fecha + compatibilidad alineadas a la derecha | `fa-paint-brush` (o icono propio) |
| **Metadata** | Grid 2 columnas: Autor / Agencia / Email / Licencia (cada uno con `fa-*` 1.5rem) | `fa-id-card` |
| **Descripción** | `LAN_MIPLUGIN_DESCRIPTION` + nota al pie con link a `CHANGELOG.md` | `fa-info-circle` |
| **Soporte** | Intro corto + botonera (Docs · Bug · GitHub · Changelog · Donar · Review) | `fa-life-ring` |
| **Footer** | `© YEAR Agencia · Released under <license>` (texto centrado, muted, small) | — |

**Patrón de retorno**: `return $html;` — el dispatcher de e107 envuelve automáticamente el output de páginas custom en su panel. **No** llamar `tablerender()` aquí (provocaría doble envoltura).

##### 5. Constantes LAN obligatorias

Agrupar al final del fichero `<Lang>_admin.php` con cabecera de sección:

```php
// ─────────────────────────────────────────────────────────────────────────
// 10. Sidebar Help widget + About page (info / contact / support)
// ─────────────────────────────────────────────────────────────────────────

// Menu / page caption
define('LAN_MIPLUGIN_ABOUT',                  'Acerca de');

// Sidebar help widget
define('LAN_MIPLUGIN_HELP_CAPTION',           'Acerca de este plugin');
define('LAN_MIPLUGIN_HELP_TAGLINE',           'Frase corta de 1 línea');
define('LAN_MIPLUGIN_HELP_TIP',               'Sugerencia de 1 línea');
define('LAN_MIPLUGIN_HELP_MORE',              'Más información y soporte');

// Shared button labels (sidebar + About)
define('LAN_MIPLUGIN_BTN_DOCS',               'Documentación');
define('LAN_MIPLUGIN_BTN_SUPPORT',            'Soporte');
define('LAN_MIPLUGIN_BTN_DONATE',             'Donar');

// About page sections
define('LAN_MIPLUGIN_ABOUT_RELEASED',         'Publicado');
define('LAN_MIPLUGIN_ABOUT_RELEASED_UNDER',   'Publicado bajo');
define('LAN_MIPLUGIN_ABOUT_METADATA',         'Información del plugin');
define('LAN_MIPLUGIN_ABOUT_AUTHOR',           'Autor');
define('LAN_MIPLUGIN_ABOUT_AGENCY',           'Agencia / Sitio web');
define('LAN_MIPLUGIN_ABOUT_CONTACT',          'Email de contacto');
define('LAN_MIPLUGIN_ABOUT_LICENSE',          'Licencia');
define('LAN_MIPLUGIN_ABOUT_DESCRIPTION',      'Descripción');
define('LAN_MIPLUGIN_ABOUT_CHANGELOG_HINT',   'Ver historial completo en');
define('LAN_MIPLUGIN_ABOUT_SUPPORT',          'Ayuda, soporte y contribuciones');
define('LAN_MIPLUGIN_ABOUT_SUPPORT_INTRO',    'Intro de 1 párrafo sobre cómo obtener ayuda…');

// About page action buttons
define('LAN_MIPLUGIN_ABOUT_BTN_BUG',          'Reportar bug');
define('LAN_MIPLUGIN_ABOUT_BTN_REPO',         'Repositorio GitHub');
define('LAN_MIPLUGIN_ABOUT_BTN_CHANGELOG',    'Changelog');
define('LAN_MIPLUGIN_ABOUT_BTN_REVIEW',       'Dejar reseña');
```

#### Información esencial: niveles de completitud

| Nivel | Plugin… | Mínimo en `getPluginInfo()` |
|-------|---------|------------------------------|
| **Mínimo viable** | uso interno | `name`, `version`, `author`, `license` |
| **Distribución / soporte** | open-source público | + `docs`, `support`, `repo`, `email` |
| **Marketplace / venta** | producto comercial | + `website`, `donate`/buy, `review`, `changelog` |

#### Buenas prácticas

- **DRY estricto**: nunca duplicar el número de versión en código + `plugin.xml` + README. Mantenerlo solo en `getPluginInfo()` y referenciarlo desde el resto.
- **`renderHelp()` debe ser compacto** (≤200px de altura visual). Toda la chicha va a `aboutPage()`.
- **Separación visual entre acciones primarias** (botones outline en sidebar) y **secundarias** (botones sólidos en About).
- **Botón de donación visible siempre** si el plugin es gratis — es la forma honesta de pedir apoyo sin recurrir al *upsell* agresivo (ver análisis comparativo con UCSM en `README.md`).
- **`target="_blank" rel="noopener"`** en TODOS los enlaces externos.
- **Escapar todo** con `htmlspecialchars($v, ENT_QUOTES, 'UTF-8')`. Usar un closure `$esc = fn($s) => htmlspecialchars(...)` para no repetir.
- **`renderHelp()` reemplaza `e_help.php`** — el archivo hook `e_help.php` está **deprecated** en e107 v2 (ver comentario en `e_pluginbuilder_class.php` línea 2137).

#### Checklist de adopción para nuevos plugins

- [ ] `$adminMenu` contiene entrada `main/about` con icono `fa-info-circle`
- [ ] Método privado `getPluginInfo()` definido en el controller `e_admin_ui`
- [ ] Método público `renderHelp()` que devuelve `array('caption'=>..., 'text'=>...)`
- [ ] Método público `aboutPage()` que devuelve HTML (sin `tablerender()`)
- [ ] Sección 10 añadida a TODOS los ficheros `<Lang>_admin.php` (paridad de constantes)
- [ ] URLs de `docs`, `support`, `repo` apuntan al repositorio real (no placeholder)
- [ ] Si el plugin es gratis: URL de `donate` configurada (Ko-fi / PayPal / GitHub Sponsors)
- [ ] Versión en `getPluginInfo()` coincide con la de `plugin.xml`

---

## 📚 Recursos Adicionales

### 🔗 Enlaces Oficiales

- **Repositorio Principal**: [https://github.com/e107inc/e107](https://github.com/e107inc/e107)
- **Manual de Desarrollador**: [https://e107.org/developer-manual](https://e107.org/developer-manual)
- **Guía de Desarrollo**: [https://devguide.e107.org/](https://devguide.e107.org/)
- **Foro de Desarrolladores**: [https://e107.org/forum](https://e107.org/forum)
- **Wiki Técnica**: [https://github.com/e107inc/e107/wiki](https://github.com/e107inc/e107/wiki)

### 📖 Documentación Técnica

#### APIs Principales de e107

| Clase | Propósito | Obtener Instancia |
|-------|-----------|-------------------|
| `e107::getDb()` | Base de datos | `$sql = e107::getDb();` |
| `e107::getParser()` | Parsing HTML/texto | `$tp = e107::getParser();` |
| `e107::getForm()` | Formularios | `$frm = e107::getForm();` |
| `e107::getRender()` | Renderizado | `$ns = e107::getRender();` |
| `e107::getMessage()` | Mensajes sistema | `$mes = e107::getMessage();` |
| `e107::getCache()` | Sistema caché | `$cache = e107::getCache();` |
| `e107::getFile()` | Manejo archivos | `$file = e107::getFile();` |
| `e107::getDate()` | Fechas y tiempo | `$date = e107::getDate();` |
| `e107::getConfig()` | Configuración | `$config = e107::getConfig();` |
| `e107::getUser()` | Datos usuario | `$user = e107::getUser();` |

#### Funciones Globales Útiles

```php
// Verificación de permisos
getperms('P')           // Permisos de plugin
getperms('0')           // Administrador principal
check_class($userclass) // Verificar clase de usuario

// URLs y rutas
e107::url('plugin', 'page')     // URL del plugin
e107::getPluginPath('plugin')   // Ruta del plugin
e107::base_path('file.php')     // Ruta base del sitio

// Constantes útiles
USER                    // Datos del usuario actual
USERID                  // ID del usuario
USERNAME               // Nombre del usuario
ADMIN                  // Booleano si es admin
e_PLUGIN               // Ruta a plugins
e_IMAGE                // Ruta a imágenes
e_FILE                 // Ruta a archivos
e_THEME                // Ruta al tema actual
```

### 🛠️ Herramientas de Desarrollo

#### Debug y Logging

```php
// Habilitar debug en e107_config.php
$E107_DEBUG_LEVEL = E107_DEBUG_LEVEL_MAXIMUM;

// Logging personalizado
e107::getLog()->add('MI_PLUGIN', 'Mensaje de debug', E_LOG_INFORMATIVE);
e107::getLog()->add('MI_PLUGIN_ERROR', 'Error crítico', E_LOG_ERROR);

// Debug de consultas SQL
$sql = e107::getDb();
$sql->debug = true; // Mostrar consultas
```

#### Testing

```php
// tests/unit/testimonios_test.php
class TestimoniosTest extends PHPUnit_Framework_TestCase {
    
    public function setUp() {
        // Configurar entorno de prueba
        require_once(__DIR__.'/../../class2.php');
    }
    
    public function testCrearTestimonio() {
        $datos = array(
            'testimonio_nombre' => 'Juan Pérez',
            'testimonio_email' => 'juan@test.com',
            'testimonio_texto' => 'Excelente servicio',
            'testimonio_rating' => 5
        );
        
        $resultado = testimonios_crear($datos);
        $this->assertTrue($resultado);
    }
}
```

---

## 🐛 Debugging y Desarrollo

### Habilitar Debug

```php
// En e107_config.php
$mySQLdefaultdb = "tu_base_datos";
$E107_DEBUG_LEVEL = 9; // Nivel máximo de debug
```

### Logging Personalizado

```php
class MiPlugin_Logger
{
    public static function log($message, $level = 'info')
    {
        if (E107_DEBUG_LEVEL > 0) {
            $log_file = e_LOG . 'mi_plugin.log';
            $timestamp = date('Y-m-d H:i:s');
            $log_entry = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;
            file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
        }
    }
    
    public static function debug($data)
    {
        if (E107_DEBUG_LEVEL > 5) {
            self::log('DEBUG: ' . print_r($data, true), 'debug');
        }
    }
}

// Uso
MiPlugin_Logger::log('Plugin inicializado correctamente');
MiPlugin_Logger::debug($config_array);
```

### Herramientas de Debug

```php
// Mostrar información de debug en pantalla
if (E107_DEBUG_LEVEL > 0) {
    echo "<pre>";
    print_r($debug_data);
    echo "</pre>";
}

// Usar el sistema de mensajes para debug
e107::getMessage()->addDebug('Valor de variable: ' . $variable);

// Logging de consultas SQL
$sql = e107::getDb();
$sql->debug = true; // Habilitar debug SQL
```

---

## 🗺️ Roadmap de Desarrollo Completo

### Fase 1: Planificación (1-2 días)

#### 1. **Definir Objetivos**
- [ ] Identificar funcionalidades principales
- [ ] Definir audiencia objetivo
- [ ] Establecer requisitos técnicos
- [ ] Crear wireframes básicos

#### 2. **Diseño de Arquitectura**
- [ ] Crear diagrama de base de datos
- [ ] Definir estructura de archivos
- [ ] Planificar flujo de usuario
- [ ] Documentar APIs necesarias

#### 3. **Preparación del Entorno**
- [ ] Configurar entorno de desarrollo
- [ ] Instalar herramientas necesarias
- [ ] Crear repositorio de código
- [ ] Configurar sistema de versionado

### Fase 2: Desarrollo Base (3-5 días)

#### 4. **Estructura Inicial**
- [ ] Crear directorio del plugin
- [ ] Configurar `plugin.xml`
- [ ] Implementar `e_module.php`
- [ ] Crear estructura de carpetas

#### 5. **Funcionalidad Core**
- [ ] Desarrollar `plugin.php`
- [ ] Crear panel de administración
- [ ] Implementar base de datos
- [ ] Configurar sistema de permisos

#### 6. **Templates y Vistas**
- [ ] Diseñar templates principales
- [ ] Crear formularios de usuario
- [ ] Implementar shortcodes básicos
- [ ] Añadir estilos CSS básicos

### Fase 3: Funcionalidades Avanzadas (5-7 días)

#### 7. **Características Especiales**
- [ ] Implementar API REST
- [ ] Agregar sistema de caché
- [ ] Desarrollar widgets personalizados
- [ ] Integrar con servicios externos

#### 8. **Integración**
- [ ] Conectar con otros plugins
- [ ] Implementar hooks y filtros
- [ ] Agregar soporte multiidioma
- [ ] Configurar URLs amigables

#### 9. **Optimización**
- [ ] Optimizar consultas de base de datos
- [ ] Implementar lazy loading
- [ ] Comprimir assets (CSS/JS)
- [ ] Configurar CDN si es necesario

### Fase 4: Testing y Refinamiento (2-3 días)

#### 10. **Testing Exhaustivo**
- [ ] Pruebas unitarias
- [ ] Pruebas de integración
- [ ] Testing de rendimiento
- [ ] Pruebas de seguridad

#### 11. **Debugging y Correcciones**
- [ ] Corregir bugs encontrados
- [ ] Optimizar código
- [ ] Validar seguridad
- [ ] Revisar compatibilidad

#### 12. **Documentación**
- [ ] Crear documentación de usuario
- [ ] Documentar API
- [ ] Preparar guía de instalación
- [ ] Crear changelog

### Fase 5: Despliegue y Mantenimiento (1-2 días)

#### 13. **Preparación para Producción**
- [ ] Crear paquete de instalación
- [ ] Validar en entorno de producción
- [ ] Preparar scripts de migración
- [ ] Configurar backups

#### 14. **Lanzamiento**
- [ ] Desplegar en servidor de producción
- [ ] Configurar monitoreo
- [ ] Notificar a usuarios
- [ ] Publicar en repositorio

#### 15. **Post-Lanzamiento**
- [ ] Monitorear rendimiento
- [ ] Recopilar feedback
- [ ] Planificar actualizaciones
- [ ] Mantener documentación actualizada

---

## 📚 Documentación del Plugin (README, CHANGELOG, Manual de Usuario, Roadmap)

> **Una de las diferencias más grandes entre un proyecto hobby y una herramienta profesional adoptada por la comunidad es la documentación.** Esta sección define los entregables de documentación mínimos que todo plugin (o tema) e107 debería incluir.

### 🎯 Por qué importa la documentación

- 🚀 **Adopción**: la gente instala lo que entiende
- 🤝 **Contribuciones**: los proyectos documentados reciben más Pull Requests
- 🐛 **Menos carga de soporte**: una buena FAQ ahorra el 80% de las preguntas repetitivas
- 🌍 **Inclusión**: usuarios no anglohablantes y recién llegados pueden adoptar el plugin
- ⏳ **El tú del futuro**: en 6 meses *tú* serás quien relea tu propia documentación
- 🏆 **Calidad percibida**: un plugin bien documentado transmite madurez y confianza

> **Regla de oro**: la documentación crece con el proyecto. Empieza pequeño, pero **empieza**.

---

### 📂 Estructura de documentación recomendada

Coloca estos archivos en la raíz del plugin (`e107_plugins/tu_plugin/`):

```
tu_plugin/
├── README.md                          ← Portada del proyecto
├── CHANGELOG.md                       ← Historial de versiones
├── ROADMAP.md                         ← Próximos pasos
├── MANUAL_USUARIO.md                  ← Guía para usuario final (multi-idioma opcional)
├── GUIA_DESARROLLO.md                 ← (Opcional) Notas de arquitectura para devs
├── LICENSE                            ← Licencia (GPL v2+ recomendada para e107)
├── docs/                              ← (Opcional) Documentación extendida
│   ├── images/                        ← Capturas de pantalla
│   ├── manual_en.md                   ← Manual en otros idiomas
│   ├── manual_pt.md
│   └── api.md                         ← Documentación de API/hooks
└── plugin.xml                         ← Metadatos (versión, autor, descripción)
```

---

### 📖 1. README.md — La portada del proyecto

El `README.md` es **lo primero** que ve cualquier usuario o desarrollador al entrar al repositorio. Debe responder en menos de 30 segundos: *¿qué hace?* y *¿debería instalarlo?*

#### Plantilla mínima

```markdown
# 🎯 [Nombre del Plugin]

> Descripción breve de una línea — qué resuelve este plugin.

[![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)]()
[![License](https://img.shields.io/badge/license-GPL--2.0-green.svg)]()
[![e107](https://img.shields.io/badge/e107-2.3.1%2B-orange.svg)]()

## 📋 Descripción

Un párrafo explicando qué hace el plugin, para quién es y por qué alguien
querría usarlo. Resuelve el "What's in it for me?" del usuario.

## ✨ Características

- ✅ Característica principal 1
- ✅ Característica principal 2
- ✅ Característica principal 3
- ✅ Multi-idioma (EN/ES/PT)
- ✅ Compatible con Bootstrap 5

## 📸 Capturas de Pantalla

![Frontend](docs/images/frontend.png)
![Admin Panel](docs/images/admin.png)

## 🔧 Requisitos

- e107 CMS ≥ 2.3.1
- PHP ≥ 8.0
- MySQL ≥ 5.7 o MariaDB ≥ 10.3
- Tema compatible con Bootstrap 5 (recomendado)

## 🚀 Instalación

### Vía Admin Panel
1. Descarga el plugin desde [releases](https://github.com/usuario/plugin/releases)
2. Sube la carpeta a `e107_plugins/`
3. Ve a **Admin → Plugin Manager**
4. Busca el plugin y haz clic en **Install**

### Vía Git
\`\`\`bash
cd e107_plugins/
git clone https://github.com/usuario/plugin.git
\`\`\`

## ⚡ Inicio Rápido

1. Activa el plugin en el panel de administración
2. Ve a **Admin → [Tu Plugin] → Configuración**
3. Configura los parámetros básicos (X, Y, Z)
4. Añade el shortcode `{TU_PLUGIN}` o link `/tu_plugin/` en tu menú
5. ¡Listo!

## 📚 Documentación

- 📘 [Manual de Usuario](MANUAL_USUARIO.md) — Guía completa para usuarios finales
- 🛠️ [Guía de Desarrollo](GUIA_DESARROLLO.md) — Arquitectura y API
- 📝 [Changelog](CHANGELOG.md) — Historial de versiones
- 🗺️ [Roadmap](ROADMAP.md) — Próximas funcionalidades

## 🤝 Contribuir

¡Las contribuciones son bienvenidas! Por favor lee [CONTRIBUTING.md](CONTRIBUTING.md).

1. Fork el proyecto
2. Crea una rama (`git checkout -b feature/MiFeature`)
3. Commit tus cambios (`git commit -m 'feat: añadir MiFeature'`)
4. Push a la rama (`git push origin feature/MiFeature`)
5. Abre un Pull Request

## 📄 Licencia

Distribuido bajo licencia GPL v2+. Ver [LICENSE](LICENSE) para más información.

## 👥 Créditos

- **Autor**: Tu Nombre ([@tu_usuario](https://github.com/tu_usuario))
- **Comunidad e107**: [e107.org](https://e107.org)

## 📧 Soporte

- 🐛 **Bugs**: [GitHub Issues](https://github.com/usuario/plugin/issues)
- 💬 **Preguntas**: [e107 Forums](https://e107.org/forum)
- 📧 **Email**: tu@email.com
```

---

### 📘 2. MANUAL_USUARIO.md — Guía para el usuario final

A diferencia del README (técnico), el manual está escrito **para el usuario final**, sin asumir conocimientos de PHP o desarrollo. Debe ser leíble por un cliente, secretaria o admin no técnico.

#### Estructura recomendada

```markdown
# 📘 Manual de Usuario — [Nombre del Plugin]

## Índice
1. [¿Qué es este plugin?](#qué-es-este-plugin)
2. [Primer uso](#primer-uso)
3. [Panel de administración](#panel-de-administración)
4. [Configuración paso a paso](#configuración-paso-a-paso)
5. [Casos de uso comunes](#casos-de-uso-comunes)
6. [Preguntas frecuentes (FAQ)](#preguntas-frecuentes-faq)
7. [Resolución de problemas](#resolución-de-problemas)

## ¿Qué es este plugin?

Explicación en lenguaje simple, sin tecnicismos. Usa analogías.
Ejemplo: "Este plugin convierte tu sitio en un sistema de reservas
similar a Calendly, donde tus clientes eligen un horario y reciben
confirmación automática por email."

## Primer uso

### Paso 1: Activar el plugin
[Captura de pantalla del Plugin Manager]
1. Ve a **Admin → Plugin Manager**
2. Busca "Tu Plugin" en la lista
3. Haz clic en **Install** y luego en **Configure**

### Paso 2: Configuración básica
[Captura de pantalla de la pantalla de config]
...

## Panel de administración

### 🏠 Dashboard
[Captura del dashboard con anotaciones numeradas]
1. **Sección de estadísticas** — Muestra X, Y, Z
2. **Acciones rápidas** — Botones para...
3. **Últimas actividades** — ...

## Configuración paso a paso

### Configuración esencial
- **Campo A**: qué hace y qué valores aceptar
- **Campo B**: ...

### Configuración avanzada (opcional)
...

## Casos de uso comunes

### Caso 1: "Quiero recibir reservas solo los lunes"
1. Ve a Configuración → Disponibilidad
2. Desmarca todos los días excepto Lunes
3. Guarda cambios

### Caso 2: "Quiero enviar un email diferente al cliente"
1. ...

## Preguntas Frecuentes

### ¿Cómo cambio el idioma?
...

### ¿Funciona con mi tema?
...

## Resolución de Problemas

### "No me llegan los emails"
**Causa probable**: Configuración SMTP del servidor.
**Solución**:
1. Verifica que e107 puede enviar emails (Admin → Mail → Test)
2. Revisa la carpeta spam
3. ...

### "El formulario no aparece"
...
```

#### 💡 Consejos para escribir un buen manual

- **📸 Capturas de pantalla**: una imagen vale más que 1000 palabras. Incluye anotaciones (flechas, círculos, números).
- **📝 Lenguaje simple**: evita jerga técnica. Si la usas, defínela.
- **🎯 Casos reales**: en vez de "configura el campo X", explica "para hacer Y, configura X así".
- **🔄 Mantén el orden cronológico**: del primer paso al último.
- **🌍 Multi-idioma**: si tu audiencia es internacional, traduce a EN/ES/PT como mínimo.

---

### 📝 3. CHANGELOG.md — Historial de versiones

Sigue el estándar [Keep a Changelog](https://keepachangelog.com/) y [Semantic Versioning](https://semver.org/).

#### Plantilla

```markdown
# Changelog

Todos los cambios notables de este plugin se documentan en este archivo.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.1.0/),
y este proyecto sigue [Semantic Versioning](https://semver.org/lang/es/).

## [Unreleased]

### Añadido
- Nueva funcionalidad X que llegará en próxima versión

## [2.3.0] - 2026-04-25

### Añadido
- ✨ Soporte para EuPago (Multibanco + MBWay)
- ✨ Sistema de cupones de descuento
- 📚 Manual de usuario en Portugués

### Cambiado
- ⚡ Optimización de consultas en `getAvailableSlots()` (3x más rápido)
- 🎨 Rediseño del Step 3 (confirmación)

### Corregido
- 🐛 Fix: el shortcode no respetaba el timezone del cliente
- 🐛 Fix: error 500 al cancelar una reserva ya pagada

### Eliminado
- 🗑️ Deprecada la API legacy `/booking/old-endpoint` (usar `/booking/v2/`)

### Seguridad
- 🔒 Validación CSRF añadida a todos los endpoints AJAX

## [2.2.0] - 2026-03-15

### Añadido
- Sistema de créditos por usuario
- Cancelación self-service vía token

## [2.1.0] - 2026-02-10
...

## [1.0.0] - 2026-01-01

### Añadido
- 🎉 Versión inicial pública
- Sistema de reservas básico
- Panel de administración
- Multi-idioma EN/ES/PT
```

#### 💡 Reglas de oro para el CHANGELOG

| ✅ Hacer | ❌ Evitar |
|----------|-----------|
| Escribir desde el punto de vista del usuario | "Refactor del método X" |
| Agrupar por categoría (Added/Changed/Fixed) | Mezclar todo en una lista |
| Incluir fecha en formato ISO (YYYY-MM-DD) | "Ayer", "la semana pasada" |
| Marcar **breaking changes** claramente | Cambios silenciosos que rompen instalaciones |
| Mantener entrada `[Unreleased]` activa | Solo actualizar al hacer release |

---

### 🗺️ 4. ROADMAP.md — Hacia dónde va el proyecto

El roadmap muestra que el proyecto **está vivo** y atrae contribuyentes. No tiene que ser perfecto ni cerrado — es una declaración de intenciones.

#### Plantilla

```markdown
# 🗺️ Roadmap

## ✅ Completado

### v2.3 (Abril 2026)
- [x] Integración EuPago
- [x] Sistema de cupones
- [x] Manual en Portugués

## 🔨 En desarrollo (v2.4 — Q2 2026)

- [ ] Integración Stripe Connect (multi-vendor)
- [ ] Notificaciones push web
- [ ] Dashboard de estadísticas
- [ ] Export a CSV/Excel

## 💭 Planeado (v3.0 — Q3 2026)

- [ ] Reescritura del frontend con Web Components
- [ ] App móvil (PWA)
- [ ] Sincronización con Google Calendar
- [ ] API REST pública

## 🤔 En consideración

Funcionalidades que estamos evaluando, sin compromiso de fecha:

- Sistema de membresías
- Integración con Zapier
- Soporte para reservas grupales

## 🚫 Fuera de alcance

Cosas que **no** haremos (para gestionar expectativas):

- App nativa iOS/Android (preferimos PWA)
- Soporte para PHP < 8.0

## 🤝 Cómo proponer features

¿Tienes una idea? Abre un [GitHub Discussion](https://github.com/usuario/plugin/discussions)
con la etiqueta `enhancement`. Las propuestas con más 👍 entran al roadmap.

## 📅 Limitaciones conocidas

- ⚠️ El sistema de pagos aún no soporta múltiples monedas en una misma reserva
- ⚠️ La sincronización con calendarios externos es solo lectura
```

---

### 🏗️ 5. Notas de arquitectura (opcional pero valioso)

Para plugins complejos, una `GUIA_DESARROLLO.md` o `ARCHITECTURE.md` ayuda a contribuyentes y a tu yo del futuro.

```markdown
# 🛠️ Guía de Desarrollo

## Arquitectura general

[Diagrama Mermaid o ASCII art]

## Estructura de la base de datos

### Tabla `#plugin_main`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT(11) PK | Identificador único |
| ... | ... | ... |

## Hooks y eventos

### Eventos disparados
- `plugin_item_created` — al crear un item nuevo
- `plugin_item_deleted` — al borrar un item

### Cómo escuchar eventos en tu propio plugin
\`\`\`php
e107::getEvent()->register('plugin_item_created', 'mi_callback');
\`\`\`

## API interna

### Clase `MiPluginClass`

#### `getItems(array $filters = []): array`
Devuelve los items filtrados.

**Parámetros:**
- `$filters['status']` (string|null) — Filtrar por estado

**Retorna:**
Array de items o array vacío.

## Cómo añadir un nuevo gateway / driver / módulo

1. Crea una clase en `includes/drivers/mi_driver.class.php`
2. Extiende de `base_driver_class`
3. Implementa los métodos abstractos `init()`, `process()`, `cleanup()`
4. Regístralo en `e_url.php`

## Convenciones de código

- Indentación con tabs
- PHPDoc en todos los métodos públicos
- Prefijo `plg_` para constantes globales
- Sufijo `_class.php` para archivos de clase
```

---

### 🎨 6. CONTRIBUTING.md — Cómo aceptar contribuciones

Si tu plugin está en GitHub/GitLab, este archivo invita y guía a contribuyentes.

```markdown
# Contribuir a [Plugin]

¡Gracias por considerar contribuir! 🙌

## Reportar bugs

Antes de abrir un issue:
1. Verifica que no exista ya un issue similar
2. Asegúrate de usar la última versión
3. Incluye:
   - Versión de e107 y PHP
   - Pasos para reproducir
   - Comportamiento esperado vs actual
   - Capturas si aplica

## Proponer features

Abre un issue con la etiqueta `enhancement` y describe:
- Qué problema resuelve
- Cómo te imaginas la solución
- Alternativas consideradas

## Pull Requests

1. Fork del repo
2. Crea una rama desde `develop`: `git checkout -b feature/mi-feature develop`
3. Sigue las convenciones de código (ver `GUIA_DESARROLLO.md`)
4. Añade tests si aplica
5. Actualiza CHANGELOG.md en sección `[Unreleased]`
6. Abre PR contra `develop`

## Convención de commits

Usamos [Conventional Commits](https://www.conventionalcommits.org/):

- `feat:` Nueva funcionalidad
- `fix:` Corrección de bug
- `docs:` Solo cambios en documentación
- `style:` Formato (no afecta código)
- `refactor:` Refactorización
- `perf:` Mejora de rendimiento
- `test:` Tests
- `chore:` Tareas de mantenimiento
```

---

### 📦 7. Caso de estudio: el plugin Booking como modelo

El plugin `booking` (este mismo proyecto) sigue todos estos patrones como modelo de referencia para la comunidad e107:

| Archivo | Propósito | Estado |
|---------|-----------|--------|
| `README.md` | Portada con instalación, features, capturas | ✅ |
| `MANUAL_USUARIO.md` | Manual completo en español para el cliente final | ✅ |
| `MANUAL_USUARIO_PT.md` | Versión portuguesa del manual | ✅ |
| `CHANGELOG.md` | Cada versión documentada con Keep-a-Changelog | ✅ |
| `ROADMAP.md` | Próximas features hasta v3.0 | ✅ |
| `GUIA_DESARROLLO_PLUGINS_E107.md` | Guía 2500+ líneas devuelta a la comunidad | ✅ |
| `LICENSE` | GPL v2+ | ✅ |
| `plugin.xml` | Metadatos completos con descripción multi-idioma | ✅ |
| `languages/{Lang}/*.php` | Archivos de idioma completos EN/ES/PT | ✅ |
| PHPDoc inline | Documentación en cada clase y método público | ✅ |

> **No es perfecto, pero es un punto de partida sólido**. Inspírate en él, mejóralo, y devuelve tu propio modelo a la comunidad.

---

### ✅ Checklist de documentación mínima

Antes de publicar tu plugin, verifica:

- [ ] **README.md** con descripción, requisitos, instalación e inicio rápido
- [ ] **CHANGELOG.md** con al menos la versión inicial documentada
- [ ] **LICENSE** explícita (GPL v2+ recomendado para e107)
- [ ] **plugin.xml** con `<description>` clara y completa
- [ ] **Capturas de pantalla** del frontend y admin (al menos 2-3)
- [ ] **Manual de usuario** básico (puede ser una sección del README al inicio)
- [ ] **Archivos de idioma** completos (sin strings hardcoded)
- [ ] **PHPDoc** en clases y métodos públicos
- [ ] **Roadmap** mínimo (puede ser una sección del README)
- [ ] Información de **contacto/soporte** visible

### ✅ Checklist de documentación profesional (recomendado)

Para plugins que aspiran a adopción amplia:

- [ ] Manual de usuario en archivo separado, multi-idioma
- [ ] CHANGELOG siguiendo Keep-a-Changelog estricto
- [ ] ROADMAP.md con visión a 6-12 meses
- [ ] GUIA_DESARROLLO.md con arquitectura y API interna
- [ ] CONTRIBUTING.md para aceptar PRs
- [ ] Capturas anotadas con flechas y números
- [ ] Vídeo demo de 1-2 minutos (YouTube/Vimeo)
- [ ] Sección FAQ con al menos 10 preguntas comunes
- [ ] Tests unitarios documentados
- [ ] Badges en README (versión, licencia, build status)
- [ ] Política de versionado documentada (SemVer)
- [ ] Notas de migración entre versiones mayores

---

### 🛠️ Herramientas recomendadas

- **Markdown**: editor [Typora](https://typora.io), [Obsidian](https://obsidian.md) o el propio VS Code
- **Capturas anotadas**: [ShareX](https://getsharex.com) (Windows), [Skitch](https://evernote.com/products/skitch) (Mac/Win)
- **Diagramas**: [Mermaid](https://mermaid.js.org) (texto → diagrama, soportado en GitHub), [draw.io](https://draw.io)
- **Generación automática de docs**: [phpDocumentor](https://www.phpdoc.org/) para PHP
- **Sitios de documentación**: [MkDocs](https://mkdocs.org), [Docusaurus](https://docusaurus.io) si necesitas algo más grande
- **Badges**: [shields.io](https://shields.io) para badges del README
- **Optimización imágenes**: [TinyPNG](https://tinypng.com) para reducir capturas

---

### 🌟 Conclusión: documentar es contribuir

> "Code tells you how. Comments tell you why. **Documentation tells the world it exists.**"

Cada plugin bien documentado es una **invitación abierta** a que más usuarios y desarrolladores adopten e107. La documentación no es un extra — es parte del producto.

Si todos en la comunidad e107 adoptamos estos estándares mínimos, transformaremos el ecosistema en un lugar donde **encontrar, entender y contribuir** a un plugin sea tan natural como instalarlo.

**Empieza hoy. Aunque sea solo con un README de 20 líneas. Es mejor que cero.** 💙

---

## 🧱 Patrón de 4 capas para la "User Guide" en el admin

> **Estado**: implementado y probado en `sitedown_styles` v2.1.0.
> **Documento de diseño completo**: `e107_plugins/sitedown_styles/docs/architecture/USER_GUIDE_PATTERN.md`.
> **Adopción recomendada** para cualquier plugin que muestre una pestaña *"Guía / Ayuda / Documentación"* dentro de su panel de admin.

### El problema que resuelve

Tras auditar varios plugins (`vstore`, `estate`, `booking`, `sitedown_styles` v1.x) aparecen tres antipatrones recurrentes:

1. **Shortcodes-proxy sin lógica.** Decenas de métodos del estilo `sc_xxx() { return defset('LAN_…', 'fallback'); }` que duplican mantenimiento sin aportar nada.
2. **HTML dentro de los `define()`.** Los traductores tienen que tocar `<code>`, `<strong>`, etc. La accesibilidad y los cambios de layout se rompen al cambiar copy.
3. **Strings de ayuda cargadas en cada request del admin.** Un Guide tab puede declarar 70-100 constantes que e107 carga en `<Lang>_admin.php` aunque el usuario nunca abra esa pestaña.

### Las 4 capas

```
┌──────────────────────────────────────────────────────────────────────┐
│ CAPA 1 — Controller     admin_config.php :: guidePage()              │
│                          • lazy-load del archivo de ayuda            │
│                          • datos dinámicos (paths, estado, theme…)   │
│                          • pre-pass _resolveHelpLans() [ver abajo]   │
├──────────────────────────────────────────────────────────────────────┤
│ CAPA 2 — Template       templates/<plugin>_guide_template.php        │
│                          • SOLO HTML; sin lógica PHP real            │
│                          • {LAN_PLUGIN_<NS>_HELP_*} para textos      │
│                          • {<NS>_HELP_*} solo para datos dinámicos   │
├──────────────────────────────────────────────────────────────────────┤
│ CAPA 3 — Languages      languages/<Lang>/<Lang>_admin_help.php  ★    
│                          • SOLO `define()` con texto plano           │
│                          • lazy-loaded; cero coste fuera de la guía  │
├──────────────────────────────────────────────────────────────────────┤
│ CAPA 4 — Shortcodes     shortcodes/batch/<plugin>_guide_shortcodes   │
│                          • SOLO métodos con lógica real (estado,     │
│                            paths runtime, badges, scans de disco…)   │
│                          • Prohibidos los proxies de LAN constants   │
└──────────────────────────────────────────────────────────────────────┘
       ★ Convención NUEVA, propuesta para e107 core en Phase B
```

### Convención `<Lang>_admin_help.php`

Espejo de las convenciones existentes (`<Lang>_admin.php`, `<Lang>_log.php`, `<Lang>_front.php`). Se carga así:

```php
e107::lan('mi_plugin', 'admin_help', true);
// → e107_plugins/mi_plugin/languages/<CurrentAdminLanguage>/<Lang>_admin_help.php
```

Llamar a esta línea **dentro de `guidePage()`** garantiza que las 70-100 constantes de ayuda solo entran en memoria cuando el usuario abre la pestaña.

Convención de naming: `LAN_PLUGIN_<NS>_HELP_<SECCIÓN>_<CLAVE>` (donde `<NS>` es un namespace corto del plugin, p.ej. `SS` para `sitedown_styles`).

### El pre-pass `_resolveHelpLans()` (importante)

`e_parse::parseTemplate()` **NO resuelve `{LAN_*}` automáticamente** — solo despacha shortcodes. Para mantener el template como un único bloque HTML legible *y* las LAN como texto puro, el Controller hace una pasada previa:

```php
private function _resolveHelpLans($html)
{
    return preg_replace_callback(
        '/\{(LAN_PLUGIN_<NS>_HELP_[A-Z0-9_]+)\}/',
        static function ($m) {
            return defined($m[1]) ? constant($m[1]) : $m[0];
        },
        $html
    );
}
```

Y en el bucle de tabs:

```php
$chunk   = $this->_resolveHelpLans($template[$id]);
$content = $tp->parseTemplate($chunk, true, $sc);  // shortcodes después
```

> Las constantes no definidas se dejan intactas (`{LAN_PLUGIN_…}`) para que un texto faltante salte a la vista durante desarrollo en lugar de desaparecer en silencio.

### Reglas de oro

| Caso                                                    | Capa             | Ejemplo                                       |
| ------------------------------------------------------- | ---------------- | --------------------------------------------- |
| Texto traducible estático                               | Languages        | `LAN_PLUGIN_SS_HELP_OVERVIEW_TITLE`           |
| Párrafo con `<code>` inline                             | Languages        | `LAN_PLUGIN_SS_HELP_INSTALL_S2`               |
| Layout (paneles, grids, tablas)                         | Template         | `<div class="bg-feature-card">…</div>`        |
| Path en runtime (`THEME`, plugin dir)                   | Shortcode        | `{SS_HELP_THEME_PATH}`                        |
| Badge de estado (¿archivo existe? ¿pref activado?)      | Shortcode        | `{SS_HELP_STUB_STATUS}`                       |
| Lista construida desde scan de disco / DB               | Shortcode        | `{SS_HELP_DETECTED_TEMPLATES}`                |
| Versión leída de `plugin.xml`                           | Shortcode        | `{SS_HELP_VERSION}`                           |

**Si tu `sc_xxx()` solo hace `return defset('LAN_X', '…')`, bórralo.** Usa `{LAN_X}` directamente en el template y deja que el pre-pass lo resuelva.

### Métricas reales de adopción (sitedown_styles v2.0.0 → v2.1.0)

| Componente                         | Antes      | Después    | Δ      |
| ---------------------------------- | ---------- | ---------- | ------ |
| Shortcode batch del Guide          | 263 líneas | 129 líneas | −51 %  |
| `<Lang>_admin.php` (×3 idiomas)    | 442 líneas | 246 líneas | −44 %  |
| Capas conceptuales                 | 2 difusas  | 4 explícitas |       |

Refactor puro, **cero cambios funcionales** para el usuario final.

---

## ✅ Checklist de Calidad

### Antes del Lanzamiento


#### Funcionalidad
- [ ] Todas las características funcionan correctamente
- [ ] Formularios validan datos apropiadamente
- [ ] Mensajes de error son claros y útiles
- [ ] Navegación es intuitiva
- [ ] Shortcodes funcionan en diferentes contextos

#### Seguridad
- [ ] Datos de entrada son validados y sanitizados
- [ ] Permisos de usuario son verificados
- [ ] Consultas SQL usan parámetros preparados
- [ ] Archivos subidos son validados
- [ ] No hay vulnerabilidades XSS o CSRF

#### Rendimiento
- [ ] Consultas de base de datos están optimizadas
- [ ] Sistema de caché está implementado
- [ ] Assets están minificados
- [ ] Imágenes están optimizadas
- [ ] Tiempo de carga es aceptable

#### Compatibilidad
- [ ] Funciona en diferentes navegadores
- [ ] Responsive en dispositivos móviles
- [ ] Compatible con versión mínima de e107
- [ ] No conflictos con otros plugins
- [ ] Funciona con diferentes temas

#### Código
- [ ] Código sigue convenciones de e107
- [ ] Comentarios son claros y útiles
- [ ] No hay código duplicado
- [ ] Manejo de errores está implementado
- [ ] Código está documentado

---

## 🎓 Conclusión

Esta guía completa proporciona todo lo necesario para desarrollar plugins profesionales para e107 Bootstrap CMS. Recuerda siempre:

### 🔑 Principios Fundamentales

1. **🛡️ Seguridad Primero**: Valida, sanitiza y escapa todos los datos
2. **⚡ Rendimiento**: Optimiza consultas y usa caché inteligentemente
3. **📱 Responsive**: Diseña pensando en todos los dispositivos
4. **🌍 Accesibilidad**: Haz tu plugin usable para todos
5. **📚 Documentación**: Documenta tu código y funcionalidades
6. **🧪 Testing**: Prueba exhaustivamente antes del lanzamiento
7. **🔄 Mantenimiento**: Planifica actualizaciones y soporte

### 🚀 Próximos Pasos

1. **Practica** con el plugin `_blank` como base
2. **Estudia** otros plugins existentes en `e107_plugins/`
3. **Participa** en la comunidad de e107
4. **Contribuye** con tus plugins al ecosistema
5. **Mantente actualizado** con las nuevas versiones

### 📞 Soporte y Comunidad

- **Foro Oficial**: [https://e107.org/forum](https://e107.org/forum)
- **Discord**: [https://discord.gg/e107](https://discord.gg/e107)
- **GitHub**: [https://github.com/e107inc/e107](https://github.com/e107inc/e107)
- **Documentación**: [https://e107.org/docs](https://e107.org/docs)

---

**¡Feliz desarrollo!** 🎉

*Última actualización: Enero 2024*  
*Versión de la guía: 2.1.0*  
*Compatible con e107 Bootstrap CMS v2.3.0+*

---

> **💡 Tip Final**: La mejor manera de aprender es practicando. Comienza con un plugin simple y ve añadiendo funcionalidades gradualmente. ¡La comunidad de e107 está aquí para ayudarte!
