<?php


Route::addRuta("supervisor/","modulos/padre_familia/dashboard.php");

Route::addRuta("supervisor/matriculas","modulos/padre_familia/matricula.php");

Route::addRuta("supervisor/cursos","modulos/padre_familia/cursos.php");
Route::addRuta("supervisor/hijos","modulos/padre_familia/hijos.php");
Route::addRuta("supervisor/galeria","modulos/padre_familia/galeria_imagen.php");
Route::addRuta("supervisor/mensajes","modulos/padre_familia/mensaje.php");
Route::addRuta("supervisor/noticias","modulos/padre_familia/noticias.php");
Route::addRuta("supervisor/profesores","modulos/padre_familia/profesores.php");
Route::addRuta("supervisor/familiar","modulos/padre_familia/familiare_encar.php");
Route::addRuta("supervisor/post/:id_post","modulos/padre_familia/view_post.php");

Route::addRuta("supervisor/asistencia", "modulos/padre_familia/asistencia.php");