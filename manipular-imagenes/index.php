<?php
require_once '../vendor/autoload.php';

//Seleccionar foto original y guardar en variablei
$photo_or = 'foto.jpeg';

//Crear nombre de nuevo archivo modificado y guardar en variable
$save_to = 'fotoM.jpg';

//Creación de objeto 
$thumb = new PHPThumb\GD($photo_or);

//Función resize para redimensionar
$thumb->resize(550,550);

//Función crop para recortar
$thumb->crop(0, 900, 350, 900);

//Funcion cropFromCenter
$thumb->cropFromCenter(250);

//Función show para mostrar la imagen
$thumb->show();

//Función save para guardar
$thumb->save($save_to, 'png');
