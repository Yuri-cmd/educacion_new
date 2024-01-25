<?php

/**
 *Rutas Ajax
 */
Route::addRuta("ajax/matricula","funcionalidades/ajax/ajs_matricula.php");
Route::addRuta("ajax/consulta","funcionalidades/ajax/ajs_consultas.php");
Route::addRuta("ajax/unidadcurso","funcionalidades/ajax/ajs_unidad_curso.php");
Route::addRuta("ajax/clasecurso","funcionalidades/ajax/ajs_clase_curso.php");
Route::addRuta("ajax/actividadcurso","funcionalidades/ajax/ajs_actividad_curso.php");

Route::addRuta("ajax/buscarusuario","funcionalidades/ajax/ajs_buacr_usuario.php");

Route::addRuta("ajax/mensaje","funcionalidades/ajax/ajs_mensajes.php");
Route::addRuta("ajax/adm_frag","funcionalidades/ajax/frag_admin.php");

Route::addRuta("ajax/frag_all","funcionalidades/ajax/ajs_frag.php");



Route::addRuta("ajax/upload_file_curso","funcionalidades/ajax/upload_files_curso.php");
Route::addRuta("ajax/upload_file","funcionalidades/ajax/upload_files.php");
Route::addRuta("ajax/upload_file_medios","funcionalidades/ajax/upload_files_medios.php");
Route::addRuta("ajax/upload_file_activ","funcionalidades/ajax/upload_files_actividad.php");
Route::addRuta("ajax/upload_file_rompeca","funcionalidades/ajax/upload_files_rompecabeza.php");

Route::addRuta("ajax/upload_file_mi_activ","funcionalidades/ajax/upload_files_actividad_alumno.php");
Route::addRuta("ajax/upload_file_clas","funcionalidades/ajax/upload_files_clase.php");
Route::addRuta("ajax/upload_img_paint","funcionalidades/ajax/upload_img_paint.php");


Route::addRuta("ajax/info/estu/matr","funcionalidades/ajax/ajs_consultas.php");
Route::addRuta("ajax/udt/estu/matr","funcionalidades/ajax/ajs_consultas.php");

Route::addRuta("ajax/abm/almun/usdalu","funcionalidades/ajax/ajs_consultas.php");
Route::addRuta("ajax/adm/alumn/resetusd","funcionalidades/ajax/ajs_consultas.php");