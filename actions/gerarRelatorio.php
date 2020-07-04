<?php
include "../models/usuarios.php";
use Dompdf\Dompdf;
require __DIR__."/../vendor/autoload.php";

$dompdf = new Dompdf();
ob_start();
require __DIR__."/../views/relatorioUser.php";
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper("A4");
$dompdf->render();
$dompdf->stream("relatorio.pdf");