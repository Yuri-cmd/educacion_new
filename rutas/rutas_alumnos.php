<?php
Route::addRuta("alumno/","modulos/alumnos/dashboard.php");
Route::addRuta("alumno/cursos","modulos/alumnos/cursos2.php");
Route::addRuta("alumno/cursos/:curso_id","modulos/alumnos/cursos.php");

Route::addRuta("alumno/clase/:clase","modulos/alumnos/clase_curso.php");

Route::addRuta("alumno/cursos/:curso_id","modulos/alumnos/cursos.php");
Route::addRuta("alumno/cuestionario/:quiz","modulos/alumnos/quiz.php");
Route::addRuta("alumno/actividad/:actividad_id",'modulos/alumnos/actividad.php');

Route::addRuta("alumno/galeria","modulos/alumnos/galeria_imagen.php");

Route::addRuta("alumno/noticias","modulos/alumnos/noticias.php");
Route::addRuta("alumno/profesores","modulos/alumnos/profesores.php");
Route::addRuta("alumno/post/:id_post","modulos/alumnos/view_post.php");
Route::addRuta("alumno/dibujo/:actividad_id","modulos/alumnos/dibujo_paint.php");

Route::addRuta("alumno/rompecabeza/:actividad","modulos/alumnos/rompecaveza.php");