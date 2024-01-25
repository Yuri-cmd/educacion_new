<?php
session_start();

require_once "funcionalidades/models/ActividadCurso.php";
require_once "funcionalidades/dataacces/ActividadCursoAccses.php";
require_once "funcionalidades/config/Conexion.php";

$actividadCursoAccses = new ActividadCursoAccses();
$view = new View();
$tipo = $_POST['tipo'];
$respuesta =["res"=>false];

switch ($tipo){
    case "confirmar_nota":

        $activ= Tools::decrypt($_POST['actividad']);
        $estu= Tools::decrypt($_POST['estud']);
        $nota = $_POST['nota_final'];

        $sql="SELECT * FROM nota_actividad_estudiante WHERE id_estudiante= '$estu' AND id_actividad='$activ';";

        if ($row = $actividadCursoAccses->exeSql($sql)->fetch_assoc()){
            $respuesta['res']=true;
            $sql =" UPDATE nota_actividad_estudiante
                        SET 
                          nota = '$nota'
                        WHERE nota_actividad_id = '{$row['nota_actividad_id']}';";
            if ($actividadCursoAccses->exeSql($sql)){
                $respuesta['res']=true;
            }
        }else{
            $sql =" INSERT INTO nota_actividad_estudiante
            (nota_actividad_id,
             id_estudiante,
             id_actividad,
             nota)
VALUES (null,
        '$estu',
        '$activ',
        '$nota');";
            if ($actividadCursoAccses->exeSql($sql)){
                $respuesta['res']=true;
            }
        }

        break;
    case "udt-descp-curso":
        $curso = $_POST['curso'];

        $sql ="UPDATE curso_docente
                SET 
                  descripcion = ?
                WHERE curso_doce_id = '$curso';";

        $stmt = $actividadCursoAccses->getConexion()->prepare($sql);
        $cuerpo = $_POST['descripcion'];
        $stmt->bind_param("s", $cuerpo);

        $resul = $stmt->execute();

        if ($resul){
            $respuesta['res'] = true;
        }

        break;
    case "udt-descp-clase":
        $clase = Tools::decrypt($_POST['clase']);

        $sql ="UPDATE clase_cursos
SET 
  descripcion_larga = ?
WHERE clase_id = '$clase';";

        $stmt = $actividadCursoAccses->getConexion()->prepare($sql);
        $cuerpo = $_POST['descripcion'];
        $stmt->bind_param("s", $cuerpo);

        $resul = $stmt->execute();

        if ($resul){
            $respuesta['res'] = true;
        }

        break;
    case "udt-info-pri":
        $cuest_cod = Tools::decrypt($_POST['quiz']);
        $sql="UPDATE cuestionario
                SET 
                  duracion = '{$_POST['duracion_minutos']}',
                  nota_visible = '{$_POST['nota_visible']}',
                  mostrar_respusta = '{$_POST['respuesta_visible']}'
                WHERE cuestionario_id = '$cuest_cod';";
        if ($actividadCursoAccses->exeSql($sql)){
            $respuesta['res']=true;
        }
        break;
    case "quiz_dat_p":
        $cuest_cod = Tools::decrypt($_POST['quiz']);
        $sql ="SELECT * FROM cuestionario WHERE cuestionario_id='$cuest_cod'";
        //echo $sql;
        $respuesta = $actividadCursoAccses->exeSql($sql)->fetch_assoc();
        $respuesta['nota_visible']=$respuesta['nota_visible']==1?true:false;
        $respuesta['mostrar_respusta']=$respuesta['mostrar_respusta']==1?true:false;
        break;
    case "reg-updt":
        $listaEliminar = json_decode($_POST['listaElimnar'],true);

        foreach ($listaEliminar as $item) {
            $sql ="DELETE FROM  alternativas_pregunta WHERE alternativa_id = '{$item['cod']}';";
            $actividadCursoAccses->exeSql($sql);
        }

        $cuest = Tools::decrypt($_POST['cod_pr']);
        $cabecera = $_POST['cabecera'];
        $cuerpo = $_POST['cuerpo'];

        $lista_respuesta = json_decode($_POST['alternativas'],true);



        $sql ="UPDATE pregunta_cuestionario
                SET  
                  cabecera = '$cabecera',
                  cuerpo = ?,
                  tipo_respuesta = '{$_POST['tipo_pre']}',
                  valor_nota = '{$_POST['valor_nota']}'
                WHERE pregunta_id = '$cuest';";


        $stmt = $actividadCursoAccses->getConexion()->prepare($sql);

        $stmt->bind_param("s", $cuerpo);

        $resul = $stmt->execute();

        if ($resul){
            if ($_POST['tipo_pre']=='3'){

                $sql="UPDATE contenido_escrito
                    SET
                      respuesta = ?
                    WHERE contenido_id = '{$_POST['cod_contenido']}';";
                $stmt_2 = $actividadCursoAccses->getConexion()->prepare($sql);

                $respuesta = $_POST['resp_cont'] ;
                $stmt_2->bind_param("s", $respuesta);
                $stmt_2->execute();
                $stmt_2->close();

            }else{
                $listaAlter = json_decode($_POST['alternativas'],true);
                foreach ($listaAlter as $roI){
                    if (!isset($roI['cod'])){
                        $sql = "INSERT INTO alternativas_pregunta
                    (alternativa_id,
                     id_pregunta,
                     contenido,
                     estado_res)
                VALUES (null,
                        '$cuest',
                        '{$roI['respu']}',
                        '{$roI['selec']}');";
                        $actividadCursoAccses->exeSql($sql);
                    }
                }
            }
        }
        $stmt->close();
        break;
    case "quiz_dat":
        $preg_id = Tools::decrypt($_POST['pre']);
        $respuesta=[];
        $sql=" SELECT * FROM pregunta_cuestionario WHERE pregunta_id='$preg_id'";

        if ($row_  = $actividadCursoAccses->exeSql($sql)->fetch_assoc()){
            $row_['pregunta_id'] = Tools::encrypt($row_['pregunta_id']);
            $row_['id_cuestionario'] = Tools::encrypt($row_['id_cuestionario']);
            if ($row_['tipo_respuesta']==3){
                $row_['escrito']='';
                $sql ="SELECT * FROM sys_colegio.contenido_escrito WHERE id_pregunta= '$preg_id'";
                if ($row_2  = $actividadCursoAccses->exeSql($sql)->fetch_assoc()){
                    $row_['escrito_cod']=$row_2['contenido_id'];
                    $row_['escrito']=$row_2['respuesta'];
                }
            }else{
                $sql ="SELECT * FROM alternativas_pregunta WHERE id_pregunta= '$preg_id'";
                foreach ($actividadCursoAccses->exeSql($sql) as $altern){
                    $altern['estado_res']=$altern['estado_res']==1?true:false;
                    $row_['alternativas'][]=$altern;
                }
            }

            $respuesta=$row_;
        }

        break;
    case "quiz_del":
        $preg_id = Tools::decrypt($_POST['pre']);
        $sql ="DELETE
FROM contenido_escrito
WHERE id_pregunta = '$preg_id';";

        $actividadCursoAccses->exeSql($sql);

        $sql="DELETE
FROM alternativas_pregunta
WHERE id_pregunta = '$preg_id';";
        $actividadCursoAccses->exeSql($sql);

        $sql = "DELETE
FROM pregunta_cuestionario
WHERE pregunta_id = '$preg_id';";
        if ( $actividadCursoAccses->exeSql($sql)){
            $respuesta['res']=true;
        }
        break;
    case "quiz_data":
        $id_cuestionario = Tools::decrypt($_POST['cod']);
        $sql ="SELECT  * FROM pregunta_cuestionario  WHERE id_cuestionario = '$id_cuestionario'";
        //echo $sql;
        $respuest=[];
        $resp = $actividadCursoAccses->exeSql($sql);
        foreach ($resp as $item) {
            $respuest[] = $item;
        }

        $respuesta['dom']=$view->render("funcionalidades/fragment/partes/template_exam_resol.php",
            ["lista"=>$respuest,'actividadCursoAccses'=>$actividadCursoAccses]);
        $respuesta['res']=true;


        break;
    case "quiz_res_es":
        //var_dump($_POST);
        $id_cuestionario = Tools::decrypt($_POST['cod']);
        $inent = Tools::decrypt($_POST['intent']);
        $sql ="SELECT * FROM pregunta_resp WHERE exan_ini= '$inent'";
        $resp_ = $actividadCursoAccses->exeSql($sql);
        $respuestas_=[];
        foreach ($resp_ as $item) {
            $tempo =[];
            if ($item['tipo']=='t'){
                $tempo['tipo']=$item['tipo'];
                $tempo['contenido']=$item['contenido'];
            }else{
                $sql =" SELECT * FROM respuesta_alterna WHERE id_pregunta = '{$item['resp_id']}'";
                $res_alt = $actividadCursoAccses->exeSql($sql);
                $tempo['alter']=[];
                foreach ($res_alt as $row_it){
                    $tempo['alter'][$row_it['id_respuesta'].'_']= $row_it['id_respuesta'];
                }
            }
            $respuestas_[$item['pregunta_id'].'_'] = $tempo;
        }

        $sql ="SELECT  * FROM pregunta_cuestionario  WHERE id_cuestionario = '$id_cuestionario'";
        //echo $sql;
        $respuest=[];
        $resp = $actividadCursoAccses->exeSql($sql);
        foreach ($resp as $item) {
            $respuest[] = $item;
        }

        $respuesta['dom']=$view->render("funcionalidades/fragment/partes/template_exam_resulto.php",
            ["lista"=>$respuest,'actividadCursoAccses'=>$actividadCursoAccses,
                'respuestas'=>$respuestas_]);
        $respuesta['res']=true;

        break;

        break;
    case "quiz":
        $id_cuestionario = Tools::decrypt($_POST['cod']);
        $sql ="SELECT  * FROM pregunta_cuestionario  WHERE id_cuestionario = '$id_cuestionario'";
        //echo $sql;
        $respuest=[];
        $resp = $actividadCursoAccses->exeSql($sql);
        foreach ($resp as $item) {
            $respuest[] = $item;
        }

        $respuesta['dom']=$view->render("funcionalidades/fragment/partes/template_exam_crea.php",
            ["lista"=>$respuest,'actividadCursoAccses'=>$actividadCursoAccses]);
        $respuesta['res']=true;


        break;

    case 'reg-preg':

        $cuest = Tools::decrypt($_POST['cuestio']);
        $cabecera = $_POST['cabecera'];
        $cuerpo = $_POST['cuerpo'];

        $lista_respuesta = json_decode($_POST['alternativas'],true);

        $sql ="INSERT INTO pregunta_cuestionario
            (pregunta_id,
             id_cuestionario,
             cabecera,
             cuerpo,
             tipo_respuesta,
             valor_nota)
VALUES (null,
        '$cuest',
        '$cabecera',?,
        '{$_POST['tipo_pre']}',
        '{$_POST['valor_nota']}');";

        //echo $sql;

        $stmt = $actividadCursoAccses->getConexion()->prepare($sql);

        $stmt->bind_param("s", $cuerpo);

        $resul = $stmt->execute();
        echo $stmt->error;
        if ($resul){
            $respuesta['res']=true;
           $id_pregunta =  $stmt->insert_id;
            if ($_POST['tipo_pre']==3||$_POST['tipo_pre']==6||$_POST['tipo_pre']==4){
                $desc = trim(strip_tags($_POST['resp_cont']));
                if (strlen($desc)>0){
                    $sql =" INSERT INTO contenido_escrito
                                (contenido_id,
                                 id_pregunta,
                                 respuesta)
                    VALUES (null,
                            '$id_pregunta',?);";
                    $stmt2 = $actividadCursoAccses->getConexion()->prepare($sql);
                    $contenido = $_POST['resp_cont'];
                    $stmt2->bind_param("s", $contenido);
                    $stmt2->execute();
                    $stmt2->close();
                }
            }else{
                foreach ($lista_respuesta as $alter){
                    $sql = "INSERT INTO alternativas_pregunta
                    (alternativa_id,
                     id_pregunta,
                     contenido,
                     estado_res)
                VALUES (null,
                        '$id_pregunta',
                        '{$alter['respu']}',
                        '{$alter['selec']}');";
                    $actividadCursoAccses->exeSql($sql);

                }

            }



        }
        $stmt->close();


        break;
    case 'udt-descp':
        $actividad = Tools::decrypt($_POST['actividad']);
        $actividadCursoAccses->setActividadId($actividad);
        $actividadCursoAccses->setDescripcionLarga($_POST['descripcion']);
        if ($actividadCursoAccses->actualizar_descripcion_larga()){
            $respuesta['res']=true;
        }
        break;
    case 'delet':
        $activ_id = Tools::decrypt($_POST['actividad']);
        $sql ="DELETE
FROM actividad_curso
WHERE actividad_id = '$activ_id';";
        if ($actividadCursoAccses->exeSql($sql)){
            $respuesta['res']=true;
        }
        break;
    case 're-acti':
        $actividadCursoAccses->setFechaInicio($_POST['fecha_inicio']);
        $actividadCursoAccses->setDescripcionCorta($_POST['descripcionCorta']);
        $actividadCursoAccses->setIdCurso($_POST['curso']);
        $actividadCursoAccses->setEstado('1');
        $actividadCursoAccses->setEsCalificado($_POST['calificable']);
        $actividadCursoAccses->setFechaCierre($_POST['fecha_termino']);
        $actividadCursoAccses->setIdClaseCurso(Tools::decrypt($_POST['clase']));
        $actividadCursoAccses->setIdTipoActivada($_POST['tipoa_']);
        $actividadCursoAccses->setNombreActivid($_POST['nombre']);
        $actividadCursoAccses->setNotaActvidad('');
        $actividadCursoAccses->setNotaVisible($_POST['visible_nota']);
        $actividadCursoAccses->setOcultarActividad($_POST['visible']);
        $actividadCursoAccses->setRespuestaVisible('1');
        if ($actividadCursoAccses->insertar()){
            $respuesta['res']=true;
            $respuesta['actividad']=Tools::encrypt($actividadCursoAccses->getActividadId());

        }
        break;
}

echo json_encode($respuesta);