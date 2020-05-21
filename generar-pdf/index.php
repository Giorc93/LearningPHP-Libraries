<?php

require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();     //Creación de objeto 

//$html = "<h1>Hola mundo desde libreria de PHP para hacer PDF</h1>";
//$html .= "<p>Master en PHP</p>";

//Recoger la vista a imprimir

ob_start();     //Inicializa la captura de elementos a imprimir en PDF
require_once 'pdf-para-generar.php';
$html = ob_get_clean();     //Guarda los elementos que se recogen después del ob_start para imprimirlos;

$html2pdf->writeHTML($html);    //Imprime en el PDF los elementos capturados en la variable $html a través del ob_get_clean;
$html2pdf->output('pdf_generado.pdf');      //Genera el PDF;