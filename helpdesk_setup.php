<?php
/**
 * Helpdesk plugin — install / uninstall / upgrade hooks
 *
 * Convention: e107 looks up a function named `<plugin_folder>_setup` in this
 * file after install/uninstall/upgrade. The hook name is the second argument
 * ('install_post', 'upgrade_post', etc.). See e107 core docs and the pattern
 * described in GUIA_DESARROLLO_PLUGINS_E107.md § "Roadmap de Desarrollo".
 *
 * F2.1 (2026-08-16) — introduced primarily to support the `hdunit` →
 * `hdu_tickets` table rename. Fresh installs get the new name straight from
 * helpdesk_sql.php; upgrades from <= v2.1.x get an idempotent ALTER.
 */
if (!defined('e107_INIT'))
{
    exit;
}

class helpdesk_setup
{
    /**
     * upgrade_post — runs after e107 has re-imported plugin.xml and refreshed
     * prefs. Idempotent: safe to run multiple times.
     */
    public function upgrade_post($var)
    {
        $mes = e107::getMessage();
        $sql = e107::getDb();

        $this->renameTicketsTable($sql, $mes);

        return true;
    }

    /**
     * Renames the historical `hdunit` table (Father Barry 2004 legacy) to the
     * `hdu_tickets` naming that matches every other table in the plugin
     * (`hdu_*`, plural, snake_case).
     *
     * Idempotent contract:
     *   - if `hdu_tickets` already exists            → no-op
     *   - if `hdunit` exists and `hdu_tickets` does  → RENAME
     *   - if neither exists                          → no-op (fresh install
     *                                                  handled by helpdesk_sql.php)
     */
    protected function renameTicketsTable($sql, $mes): void
    {
        $prefix = MPREFIX;

        $oldExists = (bool) $sql->gen(
            "SHOW TABLES LIKE '{$prefix}hdunit'"
        );
        $newExists = (bool) $sql->gen(
            "SHOW TABLES LIKE '{$prefix}hdu_tickets'"
        );

        if ($newExists)
        {
            // Already migrated (or fresh install with the new schema).
            return;
        }

        if (!$oldExists)
        {
            // Nothing to rename — first install will create hdu_tickets
            // straight away via helpdesk_sql.php.
            return;
        }

        if ($sql->gen("RENAME TABLE `{$prefix}hdunit` TO `{$prefix}hdu_tickets`"))
        {
            $mes->addSuccess(
                "Helpdesk: renamed legacy table <code>{$prefix}hdunit</code> " .
                "→ <code>{$prefix}hdu_tickets</code>."
            );
        }
        else
        {
            $mes->addError(
                "Helpdesk: could not rename <code>{$prefix}hdunit</code> to " .
                "<code>{$prefix}hdu_tickets</code>. Please rename manually or " .
                "grant ALTER privileges to the DB user."
            );
        }
    }
}
