<?php

require_once "app/Route.php";
require_once "app/Uri.php";
require_once "app/Uri2.php";
require_once "app/Request.php";
require_once "app/URL.php";
require_once "app/View.php";
require_once "utils/Tools.php";
$rutas = scandir("./rutas/");

foreach ($rutas as $archivo) {
    $rutaArchivo = realpath("./rutas/" . $archivo);
    if (is_file($rutaArchivo)) {
        require $rutaArchivo;
    }
}
Route::submit();