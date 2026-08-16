<?php
// *report*Finance*
// F2.2e — was `extends UFPDF` (Fase 1 TCPDF migration missed this file
// because pdfrep.php only mounts it on demand). Aligned with pdfit.php
// F1.3: extends TCPDF, uses core fonts (`helvetica`, `times`), absolute
// path for the logo, and no AliasNbPages() (TCPDF autoresolves {nb}).
if (!class_exists('TCPDF'))
{
    require(e_PLUGIN . 'pdf/tcpdf.php');
}
class HDU_PDF extends TCPDF
{
    // Page header
    function Header()
    {
        global $hdu_now, $hdu_title, $hdu_siteurl, $hdu_subtitle;
        // Logo
        $hdu_logo = e_PLUGIN . HELPDESK_FOLDER . "/images/logo_hd.png";
        if (file_exists($hdu_logo))
        {
            $this->Image($hdu_logo, 10, 8, 33, '', '', $hdu_siteurl);
        }
        $this->SetFont('helvetica', 'B', 15);
        // Title
        $this->Cell(0, 10, HDU_REPORTTITLE, 0, 1, 'C');
        // Line break
        $this->Line(0, 33, 300, 33);
        $this->SetFont('helvetica', 'bu', 9);
        $hdu_tit = $hdu_title . " " . HDU_121 . " " . $hdu_now;
        $this->Cell(0, 6, $hdu_tit, 0, 1, 'C');
        $this->SetFont('helvetica', 'b', 9);
        $this->Cell(0, 6, $hdu_subtitle ?? '', 0, 1, 'C');
        $this->SetFont('helvetica', 'b', 9);
        $this->Cell(10, 6, HDU_216, 0, 0, "R");
        $this->Cell(25, 6, "Posted by", 0, 0);
        $this->Cell(22, 6, "Posted on", 0, 0);
        $this->Cell(30, 6, HDU_218, 0, 0);
        $this->Cell(30, 6, HDU_221, 0, 0);
        $this->Cell(22, 6, "Closed on", 0, 0);
        $this->Cell(20, 6, "Fix Cost", 0, 0, "R");
        $this->Cell(20, 6, "Time Cost", 0, 0, "R");
        $this->Cell(20, 6, "Travel", 0, 0, "R");
        $this->Cell(20, 6, "Callout", 0, 0, "R");
        $this->Cell(20, 6, "Materials", 0, 0, "R");
        $this->Cell(20, 6, "Total", 0, 1, "R");
        $this->Ln(5);
    }
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
// ####################### get the data ############################

// F2.2e — sanitize $_GET once (same pattern as report0.php).
$g_rep      = (int)    ($_GET['hdu_rep']      ?? 0);
$g_pagesize = (string) ($_GET['hdu_pagesize'] ?? 'A4');
if (!in_array($g_pagesize, ['A4', 'A3', 'Letter', 'Legal'], true))
{
    $g_pagesize = 'A4';
}
$g_dest = (string) ($_GET['hdu_dest'] ?? 'I');
if (!in_array($g_dest, ['I', 'D', 'F', 'S'], true))
{
    $g_dest = 'I';
}

$hdu_now = e107::getDate()->convert_date(time());
$hdu_siteurl = SITEURL . "index.php";

// F2.2e — legacy `new DB` -> service locator.
$hdu_udb = e107::getDb('hdu_udb');

// Running totals (were previously undefined on first iteration -> PHP 8 warnings).
$hdu_tot_fixcost   = 0;
$hdu_tot_hcost     = 0;
$hdu_tot_dcost     = 0;
$hdu_tot_callout   = 0;
$hdu_tot_eqptcost  = 0;
$hdu_tot_totalcost = 0;

switch ($g_rep)
{
    case 1:
        // All open tickets
        $hdu_dbarg = "hdu_closed = '0' order by hdu_id desc";
        $hdu_title = HDU_129;
        break;
    case 2:
        // All closed tickets
        $hdu_dbarg = "hdu_closed > '0' order by hdu_id desc";
        $hdu_title = HDU_130;
        break;
    case 3:
        // All unassigned tickets
        $hdu_dbarg = "hdu_allocated = '0' order by hdu_id desc";
        $hdu_title = HDU_131;
        break;
    case 4:
    default:
        $hdu_dbarg = "hdu_id > '0' order by hdu_id desc";
        $hdu_title = HDU_132;
        break;
}
// Create the pdf documet
$hdu_pdf = new HDU_PDF("l", "mm", $g_pagesize);

$hdu_pdf->SetCompression(true);
// #### DO NOT CHANGE THIS
$hdu_pdf->SetCreator("Created by Barrys e107 Helpdesk plugin from www.keal.me.uk");
// ####
$hdu_pdf->SetTitle("Helpdesk Report");
$hdu_pdf->SetKeywords("Help");
$hdu_pdf->SetSubject(SITENAME . " Helpdesk Report");
$hdu_pdf->SetAuthor(SITENAME);
// F2.2e — TCPDF handles {nb} placeholder automatically; AliasNbPages() removed.
$hdu_pdf->AddPage();

$hdu_udb->db_Select("hdu_tickets", "*", $hdu_dbarg);
$hdu_avg = 0;
$hdu_count = 0;
while ($hdu_row = $hdu_udb->db_Fetch())
{
    extract($hdu_row);
    $hdu_pdf->SetFont('times', '', 8);
    $hdu_pdf->Cell(10, 5, "$hdu_id", 0, 0, "R");
    // F2.2e — split poster to a distinct var; same PHP 8 fix as pdfit.php.
    $hdu_p_parts    = explode(".", (string) $hdu_poster, 2);
    $hdu_postername = (string) ($hdu_p_parts[1] ?? '');
    $hdu_pdf->Cell(25, 5, ucfirst($hdu_postername), 0, 0);
    $hdu_pdf->Cell(22, 5, e107::getDate()->convert_date($hdu_datestamp, "short"), 0, 0);
    $hdu_pdf->Cell(30, 5, $helpdesk_obj->hdu_getcat($hdu_category), 0, 0);

    $hdu_pdf->Cell(30, 5, $helpdesk_obj->hdu_getstat($hdu_resolution), 0, 0);
    if ($hdu_closed > 0)
    {
        $hdu_pdf->Cell(22, 5, e107::getDate()->convert_date($hdu_closed, "short"), 0, 0);
    }
    else
    {
        $hdu_pdf->Cell(22, 5, "", 0, 0);
    }
    $hdu_pdf->Cell(20, 5, number_format($hdu_fixcost, 2), 0, 0, "R");
    $hdu_tot_fixcost = $hdu_tot_fixcost + $hdu_fixcost;
    $hdu_pdf->Cell(20, 5, number_format($hdu_hcost, 2), 0, 0, "R");
    $hdu_tot_hcost = $hdu_tot_hcost + $hdu_hcost;
    $hdu_pdf->Cell(20, 5, number_format($hdu_dcost, 2), 0, 0, "R");
    $hdu_tot_dcost = $hdu_tot_dcost + $hdu_dcost;
    $hdu_pdf->Cell(20, 5, number_format($hdu_callout, 2), 0, 0, "R");
    $hdu_tot_callout = $hdu_tot_callout + $hdu_callout;
    $hdu_pdf->Cell(20, 5, number_format($hdu_eqptcost, 2), 0, 0, "R");
    $hdu_tot_eqptcost = $hdu_tot_eqptcost + $hdu_eqptcost;
    $hdu_pdf->Cell(20, 5, number_format($hdu_totalcost, 2), 0, 1, "R");
    $hdu_tot_totalcost = $hdu_tot_totalcost + $hdu_totalcost;
}

$hdu_y = $hdu_pdf->GetY();
if ($hdu_y > 203)
{
    // If we are more than 203 mm down the page do a new page for the totals
    $hdu_pdf->AddPage();
    $hdu_y = $hdu_pdf->GetY();
}
$hdu_pdf->Line(159, $hdu_y, 268, $hdu_y);
$hdu_pdf->Cell(139, 5, "Totals", 0, 0, "R");
$hdu_pdf->Cell(20, 5, number_format($hdu_tot_fixcost, 2), 0, 0, "R");
$hdu_pdf->Cell(20, 5, number_format($hdu_tot_hcost, 2), 0, 0, "R");
$hdu_pdf->Cell(20, 5, number_format($hdu_tot_dcost, 2), 0, 0, "R");
$hdu_pdf->Cell(20, 5, number_format($hdu_tot_callout, 2), 0, 0, "R");
$hdu_pdf->Cell(20, 5, number_format($hdu_tot_eqptcost, 2), 0, 0, "R");
$hdu_pdf->Cell(20, 5, number_format($hdu_tot_totalcost, 2), 0, 1, "R");
$hdu_y = $hdu_pdf->GetY();
$hdu_pdf->Line(159, $hdu_y, 268, $hdu_y);
// ensure buffer is clean before generating output
// while (@ob_end_clean());
$hdu_pdf->Output("helpdesk.pdf", $g_dest);

?>
