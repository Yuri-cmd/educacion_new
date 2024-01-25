<?php

use http\Exception\BadConversionException;

session_start();

require_once "funcionalidades/models/UnidadCurso.php";
require_once "funcionalidades/dataacces/UnidadCursoAcces.php";
require_once "funcionalidades/config/Conexion.php";

$unidadCursoAcces = new UnidadCursoAcces();

$tipo = $_POST['tipo'];
$respuesta =["res"=>false];
switch ($tipo){
    case 'udt-unid':

        $unidad = Tools::decrypt($_POST['unidad']);

        $sql="UPDATE unidad_curso
        SET 
          nombre_unidad = '{$_POST['nombre']}',
          fecha_inicio = '{$_POST['fecha_inicio']}',
          fecha_final = '{$_POST['fecha_termino']}'
        WHERE unidad_id = '$unidad';";

        if ($unidadCursoAcces->exeSql($sql)){
            $respuesta ['res']=true;
        }

        break;
    case 'del-unid':
        $unidad = Tools::decrypt($_POST['unidad']);

        $sql ="DELETE FROM unidad_curso WHERE unidad_id = '$unidad'";
        echo $sql;
        if ($unidadCursoAcces->exeSql($sql)){
            $respuesta ['res']=true;
        }

        break;
    case 'miasistecia2':
        //var_dump($_POST);
        $curso = $_POST['curso'];
        $sql ="SELECT 
  asis_act.* 
FROM
  curso_docente AS cur 
  JOIN clase_cursos AS cls_cur 
    ON cur.curso_doce_id = cls_cur.id_curso 
  JOIN asistencia_actividad AS asis_act 
    ON cls_cur.clase_id = asis_act.id_actividad 
    WHERE asis_act.estado=1 AND cur.curso_doce_id='$curso';";
        //  echo $sql;
        $resp = $unidadCursoAcces->exeSql($sql);
        if ($row = $resp->fetch_assoc()){
            $respuesta ['res']=true;
            $respuesta ['asitencia']=$row['asistecia_actividad_id'];
        }
        break;
    case 'regmiasistecia':
            $sql="INSERT INTO asistencia_alumno
            (alumno_asiste_id,
             id_asistencia,
             id_alumno)
VALUES (NULL,
        '{$_POST['asistencia']}',
        '{$_SESSION['estudiante_id']}');";
           // echo $sql;
           if ($unidadCursoAcces->exeSql($sql)){
               $respuesta ['res']=true;
           }
        break;
    case 'miasistecia':
        //var_dump($_POST);
        $curso = $_POST['curso'];
        $sql ="SELECT 
  asis_act.* 
FROM
  curso_docente AS cur 
  JOIN clase_cursos AS cls_cur 
    ON cur.curso_doce_id = cls_cur.id_curso 
  JOIN asistencia_actividad AS asis_act 
    ON cls_cur.clase_id = asis_act.id_actividad 
    WHERE asis_act.estado=1 AND cur.curso_doce_id='$curso';";
      //  echo $sql;
        $resp = $unidadCursoAcces->exeSql($sql);
        if ($row = $resp->fetch_assoc()){
            $sql = " SELECT * FROM asistencia_alumno WHERE id_asistencia= '{$row['asistecia_actividad_id']}'  AND id_alumno = '{$_SESSION['estudiante_id']}'";
            if ($rops = $unidadCursoAcces->exeSql($sql)->fetch_assoc()){

            }else{
                $respuesta ['res']=true;
                $respuesta ['asitencia']=$row['asistecia_actividad_id'];
            }


        }
        break;
    case 'asistencDet':
        $asis = $_POST['asistencia'];
        $sql = "UPDATE asistencia_actividad
SET 
  estado = '0'
WHERE asistecia_actividad_id = '$asis';";
        if ($unidadCursoAcces->exeSql($sql)){
            $respuesta['res']=true;
        }
        break;
    case 'asistenc':
        $acti = Tools::decrypt($_POST['acti']);


        //$sql="SELECT * FROM asistencia_actividad WHERE id_actividad = '$curso'";

        $sql="INSERT INTO asistencia_actividad
                            (asistecia_actividad_id,
                             id_actividad,
                             estado)
                VALUES (NULL,
                        '$acti',
                        '1');";
        //echo $sql;
        if ($unidadCursoAcces->exeSqlGetId($sql)){
            $respuesta['res']=true;
            $respuesta['acist']=$unidadCursoAcces->getExtra();

        }

        break;
    case 'datos':
        $sql=" SELECT * FROM unidad_curso WHERE id_docente_curso = '{$_POST['curso']}'";
        //echo $sql;
        $resp_unidad = $unidadCursoAcces->exeSql($sql);
        $respuesta=[];
        foreach ($resp_unidad as $row_u){
            $sql =" SELECT * FROM clase_cursos WHERE id_unidad = '{$row_u['unidad_id']}'";
            $row_u['unidad_id'] = Tools::encrypt($row_u['unidad_id']);
            $resp_clase = $unidadCursoAcces->exeSql($sql);
            $row_u['clases'] = [];
            foreach ($resp_clase as $row_c){

                $sql ="SELECT act_c.*, tip_act.nombre AS 'actividad_tipo' FROM actividad_curso AS act_c INNER JOIN tipo_actividad AS tip_act ON act_c.id_tipo_activada = tip_act.tipo_id WHERE act_c.id_clase_curso = '{$row_c['clase_id']}'";

                $row_c['clase_id'] = Tools::encrypt($row_c['clase_id']);
                $row_u['clases'] [] = array('tipo_l'=>0,"fecha"=>$row_c['fecha_inicio']);
                $row_u['clases'] [] = array('tipo_l'=>1,"nombre"=>$row_c['nombre_clase'],'descripcion'=>$row_c['descripcion_corta'],"clase_cod"=>$row_c['clase_id']);

                $resp_acti = $unidadCursoAcces->exeSql($sql);
                foreach ($resp_acti as $row_act){
                    $row_u['clases'] [] = array('tipo_l'=>2,'actividad_tipo'=>$row_act['actividad_tipo'],"tipo_act"=>$row_act['id_tipo_activada'],"nombre"=>$row_act['nombre_activid'],'descripcion'=>$row_act['descripcion_corta'],"acti_cod"=>Tools::encrypt($row_act['actividad_id']));
                }

            }
            $respuesta[]=$row_u;
        }
        break;
    case 're-unidad':
        $unidadCursoAcces->setIdCurso($_POST['curso']);
        $unidadCursoAcces->setNombreUnidad($_POST['nombre']);
        $unidadCursoAcces->setFechaInicio($_POST['fecha_inicio']);
        $unidadCursoAcces->setFechaFinal($_POST['fecha_termino']);
        if ($unidadCursoAcces->insertar()){
            $respuesta['res']=true;
            $respuesta['unidad']=  Tools::encrypt($unidadCursoAcces->getUnidadId());
        }
        break;
}


echo json_encode($respuesta);