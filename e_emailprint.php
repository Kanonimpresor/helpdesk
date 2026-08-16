<?php
if (!defined('e107_INIT'))
{
    exit;
}
function print_item($id)
{
    global $helpdesk_obj, $hdu_shortcodes,
    $hdupostername, $hdu_datestamp, $hdu_category, $hdu_summary, $hdu_tagno, $hdu_email, $hdu_resolution, $hdures_resolution, $hdu_description,
    $hdu_tech, $hdu_allocated, $hdu_closed, $hdu_hours, $hdu_fixcost, $hdu_hrate, $hdu_hcost, $hdu_distance, $hdu_fixother,
    $hdu_drate, $hdu_dcost, $hdu_eqptcost, $hdu_callout, $hduc_date, $hduc_postername, $hduc_comment, $hdu_priority, $hdu_savemsg, $hdu_totalcost,
    $hdupostername;
    
    $sql = e107::getDb();
    $tp = e107::getParser();

    require_once(e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
    // F1.7 — 'includes/helpdesk_shortcodes.php' was removed in a prior
    // refactor; the shortcodes now live under shortcodes/batch/*_shortcodes.php
    // and are loaded on demand through e107::getScBatch(). Nothing else in
    // this file depends on the old file, so we just drop the require and grab
    // the batch we actually need (the print template only uses show tokens).
    $hdu_shortcodes = e107::getScBatch('show', 'helpdesk');
    if (!is_object($helpdesk_obj))
    {
        $helpdesk_obj = new helpdesk;
    }
    if (!$helpdesk_obj->hdu_read)
    {
        exit();
    }
    $helpdesk_obj->hdu_print = true;
    if (file_exists(e_THEME . "helpdesk_print_template.php"))
    {
        // F1.7 — define() expects a string as first arg; passing the bare
        // constant name would throw in PHP 8 (was silently undefined-const
        // notice in PHP 7).
        define("HDU_TEMPLATE", e_THEME . "helpdesk_print_template.php");
    }
    else
    {
        define("HDU_TEMPLATE", e_PLUGIN . HELPDESK_FOLDER . "/templates/helpdesk_print_template.php");
    }
 
    $hdu_arg = "
select * from #hdu_tickets
		left join #hdu_categories on hdu_category=hducat_id
		left join #hdu_helpdesk on hducat_helpdesk=hdudesk_id
		left join #hdu_resolve on  hdu_resolution=hdures_id
		where hdu_id = " . (int) $id;
    $sql->db_Select_gen($hdu_arg, false);
    extract($sql->db_Fetch());
    $hdu_temp = explode(".", (string) $hdu_poster, 2);
    $hdupostername = $hdu_temp[1] ?? $hdu_temp[0];

    require_once(HDU_TEMPLATE);
    $hdu_text = '';
    $hdu_text .= $tp->parseTemplate($HDU_PRINTTICKET, false, $hdu_shortcodes);
    $sql->db_Select("hdu_comments", "*", "where hduc_ticketid=" . (int) $id . " order by hduc_date", "nowhere", false);
    while ($hdu_comrow = $sql->db_Fetch())
    {
        extract($hdu_comrow);
        $hdu_temp = explode(".", (string) $hduc_poster, 2);
        $hduc_postername = $hdu_temp[1] ?? $hdu_temp[0];
        $hdu_text .= $tp->parseTemplate($HDU_PRINTTICKET_DETAIL, false, $hdu_shortcodes);
    } // while
    $hdu_text .= $tp->parseTemplate($HDU_PRINTTICKET_FOOTER, false, $hdu_shortcodes);
    return $hdu_text;
}

function email_item($id)
{
    global $tp, $sql;
    require_once(e_PLUGIN . HELPDESK_FOLDER . "/includes/helpdesk_class.php");
    if (!is_object($helpdesk_obj))
    {
        $helpdesk_obj = new helpdesk;
    }

    $hdu_arg = "select * from #hdu_tickets
		left join #hdu_categories on hdu_category=hducat_id
		left join #hdu_helpdesk on hducat_helpdesk=hdudesk_id
		left join #hdu_resolve on  hdu_resolution=hdures_id
		where hdu_id = $id";
    $sql->db_Select_gen($hdu_arg, false);
    $row = $sql->db_Fetch();
    $hdu_message = HDU_235 . "<br /><br />" . HDU_238 . " <a href='" . SITEURL . e_PLUGIN . HELPDESK_FOLDER . "/helpdesk.php?0.show.$id'>" . HDU_239 . "</a><br /><br />";
    $hdu_message .= "<br /><br />" . HDU_236 . " <b>" . $tp->toHTML($row['hdu_summary']) . "</b> " . HDU_237 . " <b>$id</b><br />" ;
    return $hdu_message;
}

?>
