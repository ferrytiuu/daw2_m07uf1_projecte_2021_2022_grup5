<?php

// Composer's auto-loading functionality
require "vendor/autoload.php";


session_start(); // always call this at top
if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}


use Dompdf\Dompdf;

$html = "<table border='1'>".gzuncompress(base64_decode($_POST["codi"]))."</table>";
$tipus = $_POST["tipus"];
//generate some PDFs!
$dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
$dompdf->set_paper('letter', 'landscape');
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream(" {$tipus}.pdf", array("Attachment"=>0));