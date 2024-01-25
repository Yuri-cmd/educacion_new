<?php

require 'modulos/ServerSide/serverside.php';
$table_data->setCampoInstId('id_inst');
$table_data->get('view_lista_matriculas_institucion','matr_id',array(
    'matr_id',
    'insti_nombre',
    'anio',
    'fecha_inicio',
    'fecha_final',
    'estado',
    'matr_id',
));
