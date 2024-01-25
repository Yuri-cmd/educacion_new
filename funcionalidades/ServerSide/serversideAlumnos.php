<?php

require 'modulos/ServerSide/serverside.php';

$table_data->setCampoInstId('insti_id');

$table_data->get('view_lista_estudiantes','estu_id',array(
    'primer_nombre',
    'segundo_nombre',
    'apellido_paterno',
    'apellido_materno',
    'estu_id',
));
