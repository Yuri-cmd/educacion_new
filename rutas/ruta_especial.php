<?php
Route::addRuta("admin/profesores",'modulos/especial/profesores.php');







Route::addRuta("profesores/asistencia","modulos/profesor/asistencia_alumnos.php");

Route::addRuta("profesores/asistencia/:clase","modulos/profesor/asictencia_clase.php");
Route::addRuta("profesores/clase/:clase","modulos/profesor/clase_curso.php");
Route::addRuta("profesores/cursos/:curso_id","modulos/profesor/cursos_contenido.php");
Route::addRuta("profesores/cursos",'modulos/profesor/cursos.php');
Route::addRuta("profesores/prueba2",'modulos/profesor/prueba2.php');
Route::addRuta("profesores/paint",'modulos/profesor/prueba_pain.php');
Route::addRuta("profesores/calificar/:actividad",'modulos/profesor/calificar_tareas.php');
Route::addRuta("profesores/examen/:actividad",'modulos/profesor/calificar_examen.php');
Route::addRuta("profesores/verexamen/:questionario",'modulos/profesor/quiz_corre.php');
Route::addRuta("profesores/actividad/:actividad_id",'modulos/profesor/actividad.php');
Route::addRuta("profesores/actividad/quiz/:questionario",'modulos/profesor/quiz_crear.php');
Route::addRuta("profesores/mensajes",'modulos/profesor/mensaje.php');


Route::addRuta("fragmento",'funcionalidades/ajax/ajs_frag.php');