<?php
require_once '../vendor/autoload.php';
echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';

//Conexión a la base de datos
$conexion = new mysqli("localhost","root","","notas_master", 3308);
$conexion->query("SET NAMES 'utf8'");

//Consulta a paginar de la bd
$consulta = $conexion->query("SELECT * FROM notas");
$nmelementos = $consulta->num_rows;
$nmelemp = 2;

//Hacer paginación
$pagination = new Zebra_Pagination();

//Número total de elementos a paginar
$pagination->records($nmelementos);

//Número de elementos por página
$pagination->records_per_page($nmelemp);

$page = $pagination->get_page(); //Obtener número de página
$li = ($page-1)*$nmelemp;   //Limite inferior de la consulta
$sql = "SELECT * FROM notas LIMIT $li,$nmelemp";    //Consulta a la db
$notas = $conexion->query($sql);    //Guardar resultado de la consulta en la variable notas

while($nota = $notas->fetch_object()) {     //fetch_object captura los elementos del objeto.
    echo "<h1>{$nota->titulo}</h1>";
    echo "<h3>{$nota->descripcion}</h3>";
}

//Crear los enlaces de las páginas
$pagination->render();