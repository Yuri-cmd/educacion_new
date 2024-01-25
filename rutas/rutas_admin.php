<?php



Route::addRuta("matriculas/registro","modulos/views/apertura_matricula.php");
Route::addRuta('maestros','modulos/views/lista_profesores.php');

Route::addRuta("alumnos/registro","modulos/views/lista_estudiantes.php");


/**
 * serverSide
*/
Route::addRuta("alumnos/sever/data_list","funcionalidades/ServerSide/serversideAlumnos.php");
Route::addRuta("admin/sever_matri/data_list","funcionalidades/ServerSide/serversidematriculaabiertas.php");



