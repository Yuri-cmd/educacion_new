<?php
session_start();

require_once "funcionalidades/models/ClaseCurso.php";
require_once "funcionalidades/dataacces/ClaseCursoAcces.php";
require_once "funcionalidades/config/Conexion.php";

$claseCursoAcces = new ClaseCursoAcces();

$tipo = $_POST['tipo'];
$respuesta = ["res" => false];
switch ($tipo) {
    case 'delete':
        $clase_id = Tools::decrypt($_POST['clase']);

        $sql="DELETE
FROM archivos_clase
WHERE  id_clase = '$clase_id';";
        $claseCursoAcces->exeSql($sql);

        $sql="DELETE
FROM asistencia_actividad
WHERE id_actividad = '$clase_id';";
        $claseCursoAcces->exeSql($sql);

        /*$sql="select * FROM actividad_curso
            WHERE id_clase_curso = '$clase_id';";
        echo $sql;
        $respwww = $claseCursoAcces->exeSql($sql);
        foreach ($respwww as $item){
            $sql="DELETE
FROM asistencia_actividad
WHERE id_actividad = '{$item['actividad_id']}';";
            $claseCursoAcces->exeSql($sql);
        }*/

        $sql = "DELETE
            FROM actividad_curso
            WHERE id_clase_curso = '$clase_id';";
        if ($claseCursoAcces->exeSql($sql)) {
            $sql = " DELETE
                    FROM  clase_cursos
                    WHERE clase_id = '$clase_id';";

            if ($claseCursoAcces->exeSql($sql)) {
                $respuesta['res'] = true;
            }
        }


        break;
    case 're-clase':

        $claseCursoAcces->setIdCurso($_POST['curso']);
        $claseCursoAcces->setDescripcionCorta($_POST['descripcionCorta']);
        $claseCursoAcces->setFechaTermino($_POST['fecha_termino']);
        $claseCursoAcces->setFechaInicio($_POST['fecha_inicio']);
        $claseCursoAcces->setIdUnidad(Tools::decrypt($_POST['unidad']));
        $claseCursoAcces->setNombreClase($_POST['nombre']);
        $claseCursoAcces->setVisible($_POST['visible']);
        if ($claseCursoAcces->insertar()) {
            $respuesta['res'] = true;
            $respuesta['unidad'] = Tools::encrypt($claseCursoAcces->getClaseId());
        }
        break;
}


echo json_encode($respuesta);