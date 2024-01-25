<?php

session_start();

require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();

$tipo = $_POST['tipo'];

$respuesta = ["res" => false];

switch ($tipo) {
    case "consulHistoUser2":

        $sql = "SELECT * FROM estudiantes where estu_id = '{$_POST['user']}'";
        //echo $sql;
        $row = $conexion->query($sql)->fetch_assoc();


        $sql = "SELECT *, date_format(fecha, '%Y-%m-%d') fechaa,
       DATE_FORMAT(fecha, '%H:%i') hoaa
       FROM historial_usuario where id_usuario={$row['usuario_id']}";
        //echo $sql;
        $resps = $conexion->query($sql);
        $respuesta = [];
        foreach ($resps as $res) {
            $respuesta[] = $res;
        }
        break;
    case "consulHistoUser":
        $sql = "SELECT *, date_format(fecha, '%Y-%m-%d') fechaa,
       DATE_FORMAT(fecha, '%H:%i') hoaa
       FROM historial_usuario where id_usuario={$_POST['user']}";
        $resps = $conexion->query($sql);
        $respuesta = [];
        foreach ($resps as $res) {
            $respuesta[] = $res;
        }
        break;
    case "desabiliteuseralumno":
        $sql = "UPDATE usuarios
            SET 
              estado = '{$_POST['est']}'
            WHERE usuario_id = '{$_POST['user']}';";
        if ($conexion->query($sql)) {
            $respuesta["res"] = true;
        }
        break;
    case "delfilfilclasf":
        $sql = "DELETE FROM archivos_clase WHERE archivo_clase_id = '{$_POST['file']}';";
        if ($conexion->query($sql)) {
            $respuesta["res"] = true;
        }
        break;
    case "delfilfilalundof":
        $sql = "DELETE FROM archivos_actividad WHERE archiv_actividad_id = '{$_POST['file']}';";
        if ($conexion->query($sql)) {
            $respuesta["res"] = true;
        }
        break;
    case "delestumatri":
        $sql = "update estudiantes set  estado=0 where estu_id = '{$_POST['estu']}'";
        if ($conexion->query($sql)) {
            $respuesta["res"] = true;
        }
        break;
    case "resetuseradmudt":
        $sql = "UPDATE usuarios SET  usuario = '{$_POST['user']}', clave = '{$_POST['pass']}' WHERE usuario_id = '{$_POST['usri']}';";
        if ($row = $conexion->query($sql)) {
            $respuesta["res"] = true;
        }
        break;
    case "info-user-admalu":
        $sql = "SELECT * FROM usuarios WHERE usuario_id ='{$_POST['user']}'";
        if ($row = $conexion->query($sql)->fetch_assoc()) {
            $respuesta["res"] = true;
            $respuesta["data"] = $row;
        }
        break;

    case 'dataestmrtrudt':
        $infor = json_decode($_POST['data'], true);
        $dA = $infor['alumnoD'];
        $fecha_n = strlen($dA['fecha_n']) > 5 ? "'" . $dA['fecha_n'] . "'" : 'null';
        $sql = "update perfiles set
  genero='{$dA['genero']}',
  primer_nombre='{$dA['primer_nombre']}',
  segundo_nombre='{$dA['segundo_nombre']}',
  apellido_paterno='{$dA['apellido_paterno']}',
  apellido_materno='{$dA['apellido_materno']}',
  doc_numero='{$dA['doc']}',
  fecha_nacimiento={$fecha_n},
  direccion='{$dA['direccion']}',
  telefono_pricipal='{$dA['telefono']}'
where perfil_id='{$dA['perfil_id']}'
";
        $resp = $conexion->query($sql);

        if ($resp) {
            $respuesta["res"] = true;

            if ($infor['reP']['con_id'] > 0) {
                $fecha_n = strlen($infor['reP']['fecha_na']) > 5 ? "'" . $infor['reP']['fecha_na'] . "'" : 'null';

                //$nacio = strlen($infor['reP']['nacio'])>0?
                $sql = "update padre_apoderado set  
                  nombres='{$infor['reP']['nombre']}',
                  apellidos='{$infor['reP']['apellido']}',
                  direccion='{$infor['reP']['direccion']}',
                  departamento_id='{$infor['reP']['departament']}',
                  provincia_id='{$infor['reP']['provincia']}',
                  distrito_id='{$infor['reP']['distrito']}',
                  telefono_1='{$infor['reP']['telefono1']}',
                  telefono_2='{$infor['reP']['telefono2']}',
                  numero_doc='{$infor['reP']['num_doc']}',
                  genero='{$infor['reP']['genero']}',
                  fecha_nacimiento={$fecha_n},
                  nacionalidad='{$infor['reP']['nacio']}',
                  estado_civil='{$infor['reP']['estado_ci']}',
                  es_pagador='{$infor['reP']['pagador']}',
                  email_concto='{$infor['reP']['email']}'
                where id_contacto='{$infor['reP']['con_id']}'
                ";
                // echo $sql;
                $conexion->query($sql);
                //echo $conexion->error;
            } else {
                $fecha_n = strlen($infor['reP']['fecha_na']) > 5 ? "'" . $infor['reP']['fecha_na'] . "'" : 'null';
                if (strlen($infor['reP']['nombre']) > 3 && strlen($infor['reP']['apellido']) > 3) {
                    $uduarioid = 'null';
                    if (strlen($infor['reP']['num_doc'] . "") > 5) {
                        $sql = "insert into usuarios set 
                              insti_id='8',
                              usuario='{$infor['reP']['num_doc']}',
                              clave='{$infor['reP']['num_doc']}',
                              email='{$infor['reP']['email']}',
                              id_rol='3',
                              estado='1' ";
                        $resp3 = $conexion->query($sql);
                        if ($resp3) {
                            $uduarioid = $conexion->insert_id;
                        }

                    }
                    $sql = "
                    insert into padre_apoderado set
                    id_usuario={$uduarioid},
                    id_rol='3',
                    id_insti='8',
                     nombres='{$infor['reP']['nombre']}',
                      apellidos='{$infor['reP']['apellido']}',
                      direccion='{$infor['reP']['direccion']}',
                      departamento_id='{$infor['reP']['departament']}',
                      provincia_id='{$infor['reP']['provincia']}',
                      distrito_id='{$infor['reP']['distrito']}',
                      telefono_1='{$infor['reP']['telefono1']}',
                      telefono_2='{$infor['reP']['telefono2']}',
                      numero_doc='{$infor['reP']['num_doc']}',
                      genero='{$infor['reP']['genero']}',
                      fecha_nacimiento={$fecha_n},
                      nacionalidad='{$infor['reP']['nacio']}',
                      estado_civil='{$infor['reP']['estado_ci']}',
                      es_pagador='{$infor['reP']['pagador']}',
                      email_concto='{$infor['reP']['email']}',
                    estado='1',
                    foto_perfil=''
                             ";
                    $rsp23 = $conexion->query($sql);
                    //echo $conexion->error;
                    if ($rsp23) {
                        $idlast = $conexion->insert_id;
                        $sql = "insert into estudiante_contacto set   id_estuddiante='{$dA['estu']}',id_contacto='$idlast'";

                        $conexion->query($sql);

                    }

                }
            }

            if ($infor['reM']['con_id'] > 0) {
                $fecha_n = strlen($infor['reM']['fecha_na']) > 5 ? "'" . $infor['reM']['fecha_na'] . "'" : 'null';
                $sql = "update padre_apoderado set  
                  nombres='{$infor['reM']['nombre']}',
                  apellidos='{$infor['reM']['apellido']}',
                  direccion='{$infor['reM']['direccion']}',
                  departamento_id='{$infor['reM']['departament']}',
                  provincia_id='{$infor['reM']['provincia']}',
                  distrito_id='{$infor['reM']['distrito']}',
                  telefono_1='{$infor['reM']['telefono1']}',
                  telefono_2='{$infor['reM']['telefono2']}',
                  numero_doc='{$infor['reM']['num_doc']}',
                  genero='{$infor['reM']['genero']}',
                  fecha_nacimiento={$fecha_n},
                  nacionalidad='{$infor['reM']['nacio']}',
                  estado_civil='{$infor['reM']['estado_ci']}',
                  es_pagador='{$infor['reM']['pagador']}',
                  email_concto='{$infor['reM']['email']}'
                where id_contacto='{$infor['reM']['con_id']}'
                ";
                $conexion->query($sql);
            } else {
                $fecha_n = strlen($infor['reM']['fecha_na']) > 5 ? "'" . $infor['reM']['fecha_na'] . "'" : 'null';
                if (strlen($infor['reM']['nombre']) > 3 && strlen($infor['reM']['apellido']) > 3) {
                    $uduarioid = 'null';
                    if (strlen($infor['reM']['num_doc'] . "") > 5) {
                        $sql = "insert into usuarios set 
                              insti_id='8',
                              usuario='{$infor['reM']['num_doc']}',
                              clave='{$infor['reM']['num_doc']}',
                              email='{$infor['reM']['email']}',
                              id_rol='5',
                              estado='1' ";
                        $resp3 = $conexion->query($sql);
                        if ($resp3) {
                            $uduarioid = $conexion->insert_id;
                        }

                    }
                    $sql = "
                    insert into padre_apoderado set
                    id_usuario={$uduarioid},
                    id_rol='5',
                    id_insti='8',
                     nombres='{$infor['reM']['nombre']}',
                      apellidos='{$infor['reM']['apellido']}',
                      direccion='{$infor['reM']['direccion']}',
                      departamento_id='{$infor['reM']['departament']}',
                      provincia_id='{$infor['reM']['provincia']}',
                      distrito_id='{$infor['reM']['distrito']}',
                      telefono_1='{$infor['reM']['telefono1']}',
                      telefono_2='{$infor['reM']['telefono2']}',
                      numero_doc='{$infor['reM']['num_doc']}',
                      genero='{$infor['reM']['genero']}',
                      fecha_nacimiento={$fecha_n},
                      nacionalidad='{$infor['reM']['nacio']}',
                      estado_civil='{$infor['reM']['estado_ci']}',
                      es_pagador='{$infor['reM']['pagador']}',
                      email_concto='{$infor['reM']['email']}',
                    estado='1',
                    foto_perfil=''
                             ";
                    $rsp23 = $conexion->query($sql);

                    if ($rsp23) {
                        $idlast = $conexion->insert_id;
                        $sql = "insert into estudiante_contacto set   id_estuddiante='{$dA['estu']}',id_contacto='$idlast'";
                        $conexion->query($sql);

                    }
                }
            }

            if ($infor['reA']['con_id'] > 0) {
                $fecha_n = strlen($infor['reA']['fecha_na']) > 5 ? "'" . $infor['reA']['fecha_na'] . "'" : 'null';
                $sql = "update padre_apoderado set  
                  nombres='{$infor['reA']['nombre']}',
                  apellidos='{$infor['reA']['apellido']}',
                  direccion='{$infor['reA']['direccion']}',
                  departamento_id='{$infor['reA']['departament']}',
                  provincia_id='{$infor['reA']['provincia']}',
                  distrito_id='{$infor['reA']['distrito']}',
                  telefono_1='{$infor['reA']['telefono1']}',
                  telefono_2='{$infor['reA']['telefono2']}',
                  numero_doc='{$infor['reA']['num_doc']}',
                  genero='{$infor['reA']['genero']}',
                  fecha_nacimiento={$fecha_n},
                  nacionalidad='{$infor['reA']['nacio']}',
                  estado_civil='{$infor['reA']['estado_ci']}',
                  es_pagador='{$infor['reA']['pagador']}',
                  email_concto='{$infor['reA']['email']}'
                where id_contacto='{$infor['reA']['con_id']}'
                ";
                $conexion->query($sql);
            } else {
                $fecha_n = strlen($infor['reA']['fecha_na']) > 5 ? "'" . $infor['reA']['fecha_na'] . "'" : 'null';
                if (strlen($infor['reA']['nombre']) > 3 && strlen($infor['reA']['apellido']) > 3) {
                    $uduarioid = 'null';
                    if (strlen($infor['reA']['num_doc'] . "") > 5) {
                        $sql = "insert into usuarios set 
                              insti_id='8',
                              usuario='{$infor['reA']['num_doc']}',
                              clave='{$infor['reA']['num_doc']}',
                              email='{$infor['reA']['email']}',
                              id_rol='4',
                              estado='1' ";
                        $resp3 = $conexion->query($sql);
                        if ($resp3) {
                            $uduarioid = $conexion->insert_id;
                        }

                    }
                    $sql = "
                    insert into padre_apoderado set
                    id_usuario={$uduarioid},
                    id_rol='4',
                    id_insti='8',
                     nombres='{$infor['reA']['nombre']}',
                      apellidos='{$infor['reA']['apellido']}',
                      direccion='{$infor['reA']['direccion']}',
                      departamento_id='{$infor['reA']['departament']}',
                      provincia_id='{$infor['reA']['provincia']}',
                      distrito_id='{$infor['reA']['distrito']}',
                      telefono_1='{$infor['reA']['telefono1']}',
                      telefono_2='{$infor['reA']['telefono2']}',
                      numero_doc='{$infor['reA']['num_doc']}',
                      genero='{$infor['reA']['genero']}',
                      fecha_nacimiento={$fecha_n},
                      nacionalidad='{$infor['reA']['nacio']}',
                      estado_civil='{$infor['reA']['estado_ci']}',
                      es_pagador='{$infor['reA']['pagador']}',
                      email_concto='{$infor['reA']['email']}',
                    estado='1',
                    foto_perfil=''
                             ";
                    $rsp23 = $conexion->query($sql);
                    if ($rsp23) {
                        $idlast = $conexion->insert_id;
                        $sql = "insert into estudiante_contacto set   id_estuddiante='{$dA['estu']}',id_contacto='$idlast'";
                        //echo $sql;
                        $conexion->query($sql);
                        //echo $conexion->error;

                    }
                }
            }

        }

        break;
    case 'dataestmrtr':
        $sql = "SELECT * FROM view_estudiantes_matriculados WHERE estu_id=" . $_POST['estud'];
        $resp = $conexion->query($sql);
        $data = $resp->fetch_assoc();
        $sql = "SELECT 
              pa_ap.* 
            FROM
              estudiante_contacto estu 
              JOIN padre_apoderado pa_ap 
                ON estu.id_contacto = pa_ap.id_contacto 
            WHERE estu.id_estuddiante = " . $_POST['estud'];

        $resp2 = $conexion->query($sql);
        $padop = ["padre" => ["res" => false], "madre" => ["res" => false], "apoderado" => ["res" => false]];
        foreach ($resp2 as $row) {
            switch ($row['id_rol']) {
                case 3:
                    $padop["padre"]["res"] = true;
                    $padop["padre"]["data"] = $row;
                    break;
                case 5:
                    $padop["madre"]["res"] = true;
                    $padop["madre"]["data"] = $row;
                    break;
                case 4:
                    $padop["apoderado"]["res"] = true;
                    $padop["apoderado"]["data"] = $row;
                    break;
            }
        }
        $data["extra"] = $padop;
        $respuesta = $data;
        break;
    case 'recu_pass':
        $usuario = Tools::decrypt($_POST['usuaio']);
        $claver = $_POST['clav'];

        $sql = "UPDATE usuarios
                SET 
                  clave = '$claver'
                WHERE usuario_id = '$usuario';";

        if ($conexion->query($sql)) {
            $sql = "DELETE
                FROM recuperacion_usuario
                WHERE id_usuario = '$usuario';";
            $conexion->query($sql);
            $respuesta['res'] = true;
        }

        break;
    case 'romp_terminado':

        $acti = Tools::decrypt($_POST['actividad']);

        $sql = "INSERT INTO alumno_rompecabeza
                            (id_activiidad,
                             id_alumno,
                             fecha_realizada,
                             tiempo)
                VALUES ('$acti',
                        '{$_SESSION['estudiante_id']}',
                        now(),
                        '{$_POST['time']}');";
        if ($conexion->query($sql)) {
            $respuesta['res'] = true;
        }
        break;
    case 'entr-ex':
        $quiz = Tools::decrypt($_POST['quiz']);
        $listaRes = json_decode($_POST['res'], true);
        $respuesta['res'] = true;
        $sql = "UPDATE examen_iniciado
SET 
  estado = '1'
WHERE iniciado_id = '{$_SESSION['intento_quiz']}';";
        $conexion->query($sql);
        foreach ($listaRes as $res_) {
            $pregunta = Tools::decrypt($res_['pregunta']);
            $contenido = $res_['tipo'] == 't' ? $res_['cont'] : '';
            $sql = "INSERT INTO pregunta_resp
            (resp_id,
             exan_ini,
             pregunta_id,
             tipo,
             contenido)
        VALUES (null,
                '{$_SESSION['intento_quiz']}',
                '$pregunta',
                '{$res_['tipo']}',
                ?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $contenido);

            if ($stmt->execute()) {
                if ($res_['tipo'] == 'c') {
                    foreach ($res_['selecciones'] as $row_item) {
                        $sql = "INSERT INTO respuesta_alterna
                                        (respuesta_id,
                                         id_pregunta,
                                         id_respuesta,
                                         estado)
                            VALUES (null,
                                    '{$stmt->insert_id}',
                                    '$row_item',
                                    '1');";
                        $conexion->query($sql);
                    }

                }
                if ($res_['tipo'] == 'r') {
                    $sql = "INSERT INTO respuesta_alterna
                                        (respuesta_id,
                                         id_pregunta,
                                         id_respuesta,
                                         estado)
                            VALUES (null,
                                    '{$stmt->insert_id}',
                                    '{$res_['select']}',
                                    '1');";
                    $conexion->query($sql);
                }
            }

        }

        recalcularNota($quiz,$_SESSION['intento_quiz']);

        break;
    case 'medio-del':
        $medio_id = Tools::decrypt($_POST['medio']);
        $sql = "SELECT * FROM mis_medios WHERE  id_medio = '$medio_id'";
        echo $sql;
        if ($row = $conexion->query($sql)->fetch_assoc()) {
            $ruta = "datos/medios/" . $_SESSION['usuario'] . "/" . $row['ruta'];
            echo $ruta;
            $sql = "DELETE  FROM mis_medios WHERE id_medio = '$medio_id';";
            if ($conexion->query($sql)) {
                if (unlink($ruta)) {
                    $respuesta['res'] = true;
                }
            }


        }


        break;
    case 'consulta-bloq':
        $sql = "SELECT * FROM usuarios WHERE usuario_id = '{$_SESSION['usuario']}'";
        $temp = $conexion->query($sql)->fetch_assoc();
        if ($temp['estado'] == 0) {
            $respuesta['res'] = true;
        }
        break;
    case 'g-a-clase-new':
        $clase = Tools::decrypt($_POST['clase']);

        $sql = "INSERT INTO asistencia_actividad
            (asistecia_actividad_id,
             id_actividad,
             fecha,
             estado)
VALUES (NULL,
        '$clase',
        now(),
        '0');";

        if ($conexion->query($sql)) {
            $respuesta['res'] = true;
        }

        break;
    case 'g-a-clase':
        $lista = json_decode($_POST['lista'], true);
        $respuesta['res'] = true;

        foreach ($lista as $item) {
            $estado = $item['estado'] ? '1' : '0';
            if ($item['asis_est'] != 0) {

                $sql = "UPDATE asistencia_alumno
                        SET 
                          estado = '$estado'
                        WHERE alumno_asiste_id = '{$item['asis_est']}';";
                // echo $sql;
                if (!$conexion->query($sql)) {
                    $respuesta['res'] = false;
                }
            } else {
                $sql = "INSERT INTO asistencia_alumno
                                    (alumno_asiste_id,
                                     id_asistencia,
                                     id_alumno,
                                     fecha_marcado,
                                     estado)
                        VALUES (null,
                                '{$item['asis']}',
                                '{$item['estu']}',
                                now(),
                                '$estado');";
                //echo $sql;
                if (!$conexion->query($sql)) {
                    $respuesta['res'] = false;
                }
            }
        }

        break;
    case 'data-g':
        $sql = "SELECT * FROM grados WHERE nivel_id = '{$_POST['nivel']}';";
        $lista = $conexion->query($sql);

        $respuesta = [];

        foreach ($lista as $row) {
            $respuesta[] = $row;
        }

        break;
    case 'data-s':
        $sql = "SELECT * FROM secciones WHERE id_grado='{$_POST['grado']}';";
        $lista = $conexion->query($sql);
        $respuesta = [];
        foreach ($lista as $row) {
            $respuesta[] = $row;
        }
        break;
    case 'not_ru':
        $nota = $_POST['nota'];
        $estu = Tools::decrypt($_POST['est']);
        $acti = Tools::decrypt($_POST['activ']);

        $sql = "SELECT * FROM nota_actividad_estudiante WHERE id_estudiante = '$estu' AND id_actividad='$acti'";

        if ($row = $conexion->query($sql)->fetch_assoc()) {
            $sql = "UPDATE nota_actividad_estudiante
                    SET 
                      nota = '$nota'
                    WHERE nota_actividad_id = '{$row['nota_actividad_id']}';";
            if ($conexion->query($sql)) {
                $respuesta['res'] = true;
            }
        } else {
            $sql = "INSERT INTO nota_actividad_estudiante
                                (nota_actividad_id,
                                 id_estudiante,
                                 id_actividad,
                                 nota)
                    VALUES (NULL,
                            '$estu',
                            '$acti',
                            '$nota');";
            //echo $sql;
            if ($conexion->query($sql)) {
                $respuesta['res'] = true;
            }
        }

        break;
    case 'ver-exa':
        $actividad = Tools::decrypt($_POST['actividad']);

        $sql = "SELECT * FROM cuestionario WHERE id_actividad = '$actividad'";
        //echo $sql;
        if ($row = $conexion->query($sql)->fetch_assoc()) {
            $respuesta['res'] = true;
            $respuesta['questinario'] = Tools::encrypt($row['cuestionario_id']);
        }

        break;
    case 'expl-ex':
        $actividad = Tools::decrypt($_POST['actividad']);
        $sql = "SELECT * FROM cuestionario WHERE id_actividad = '$actividad'";

        if ($row = $conexion->query($sql)->fetch_assoc()) {
            $respuesta['res'] = true;
            $respuesta['questinario'] = Tools::encrypt($row['cuestionario_id']);
        } else {
            $sql = " INSERT INTO cuestionario
            (cuestionario_id,
             id_actividad)
VALUES (null,
        '$actividad');";
            //echo $sql;
            if ($conexion->query($sql)) {
                $respuesta['res'] = true;
                $respuesta['questinario'] = Tools::encrypt($conexion->insert_id);
            }

            //echo $conexion->error;
        }

        break;

    case 'reg-doc':
        $datos = json_decode($_POST['data'], true);


        $sql = "INSERT INTO usuarios
            (usuario_id,
             insti_id,
             usuario,
             clave,
             email,
             fecha_creacion,
             id_rol,
             estado)
VALUES (NULL,
        '{$_SESSION['institucion']}',
        '{$datos['doc_numero']}',
        '{$datos['doc_numero']}',
        '{$datos['email']}',
        now(),
        '6',
        '1');";
        if ($conexion->query($sql)) {
            $usuario_id = $conexion->insert_id;
            $sql = "INSERT INTO perfiles
            (perfil_id,
             id_usuario,
             id_rol,
             genero,
             primer_nombre,
             segundo_nombre,
             apellido_paterno,
             apellido_materno,
             doc_id,
             doc_numero,
             fecha_nacimiento,
             fecha_registro,
             direccion,
             telefono_pricipal,
             ciudad_id,
             foto_perfil)
VALUES (null,
        '$usuario_id',
        '6',
        '{$datos['genero']}',
        '{$datos['primer_nombre']}',
        '{$datos['segundo_nombre']}',
        '{$datos['apellido_paterno']}',
        '{$datos['apellido_materno']}',
        '{$datos['doc_id']}',
        '{$datos['doc_numero']}',
        '{$datos['fecha_nacimiento']}',
        now(),
        '',
        '{$datos['telefono_pricipal']}',
        null,
        '');";
            if ($conexion->query($sql)) {
                $id_perfil = $conexion->insert_id;
                $sql = "INSERT INTO docentes
            (docente_id,
             id_insti,
             id_perfil,
             id_usuario,
             especialidad)
            VALUES (null,
                    '{$_SESSION['institucion']}',
                    '$id_perfil',
                    '$usuario_id',
                    '{$datos['especialidad']}');";

                if ($conexion->query($sql)) {
                    $respuesta['res'] = true;
                }
            }
        }


        break;

    case 'departa':
        $cod = $_POST['value'];
        $sql = "SELECT * FROM dir_provincia WHERE dep_codigo = '$cod'";
        //echo $sql;
        $resp = $conexion->query($sql);
        $respuesta = [];
        foreach ($resp as $row) {
            $respuesta[] = $row;
        }
        break;
    case 'provin':
        $cod = $_POST['value'];
        $cod2 = $_POST['value2'];
        $sql = "SELECT * FROM dir_distrito WHERE dep_codigo = '$cod' AND pro_codigo = '$cod2'";
        //echo $sql;
        $resp = $conexion->query($sql);
        $respuesta = [];
        foreach ($resp as $row) {
            $respuesta[] = $row;
        }
        break;
    case 'dataMatricula':

        $sql = "SELECT 
              pa_apo.*, us.email
            FROM
              grupo_matricula_padres AS gru_mat 
              INNER JOIN padre_apoderado AS pa_apo 
                ON gru_mat.id_padre_apoderado = pa_apo.id_contacto LEFT JOIN usuarios AS us ON pa_apo.id_usuario = us.usuario_id WHERE gru_mat.id_matricula = '" . Tools::decrypt($_POST['martr']) . "'";
        $resp = $conexion->query($sql);
        $respuesta = [];
        foreach ($resp as $row) {
            $respuesta[] = $row;
        }

        break;

    case 'datestumat':

        $sql = "SELECT 
  hi_ma.*,
  perf.*,
  usua.email 
FROM
  hijos_matriculados AS hi_ma 
  LEFT JOIN estudiantes AS est 
    ON hi_ma.hijos_matri_id = est.estu_id 
  LEFT JOIN perfiles AS perf 
    ON est.perfil_id = perf.perfil_id 
  LEFT JOIN usuarios AS usua 
    ON perf.id_usuario = usua.usuario_id 
                    WHERE hi_ma.id_matricula_padres = '" . Tools::decrypt($_POST['martr']) . "'";
        $resp = $conexion->query($sql);
        $respuesta = [];
        foreach ($resp as $row) {
            $respuesta[] = $row;
        }

        break;
}


echo json_encode($respuesta);



function recalcularNota($id_cuestionario,$inent){

    $conexion = (new Conexion())->getConexion();

    $sql="select * from examen_iniciado where iniciado_id= '$inent'";
    $resp_examenIni = $conexion->query($sql)->fetch_assoc();

    $idActividadIniciado = $resp_examenIni['id_actividad'];
    $idEstudianteIniciado = $resp_examenIni['id_estudiante'];

    $sql ="SELECT * FROM pregunta_resp WHERE exan_ini= '$inent'";
    $resp_ = $conexion->query($sql);
    $respuestas_=[];
    foreach ($resp_ as $item) {
        $tempo =[];
        if ($item['tipo']=='t'){
            $tempo['tipo']=$item['tipo'];
            $tempo['contenido']=$item['contenido'];
        }else{
            $sql =" SELECT * FROM respuesta_alterna WHERE id_pregunta = '{$item['resp_id']}'";
            $res_alt = $conexion->query($sql);
            $tempo['alter']=[];
            foreach ($res_alt as $row_it){
                $tempo['alter'][$row_it['id_respuesta'].'_']= $row_it['id_respuesta'];
            }
        }
        $respuestas_[$item['pregunta_id'].'_'] = $tempo;
    }

    $sql ="SELECT  * FROM pregunta_cuestionario  WHERE id_cuestionario = '$id_cuestionario'";

    $respuest=[];
    $resp = $conexion->query($sql);
    foreach ($resp as $item) {
        $respuest[] = $item;
    }
    $lista=$respuest;
    $respuestas=$respuestas_;

    $contador = 1;

    $totalNota=0;

    foreach ($lista as $iten) {
        $is_res=false;
        $contenidorR =null;

        if (isset($respuestas[$iten['pregunta_id'].'_'])){
            $is_res=true;
            $contenidorR = $respuestas[$iten['pregunta_id'].'_'];
        }

        $respuestas_corecc =[];
        $select_correc_check =[] ;
        $tipoRes=-1;
        $respuesta_escrita_temp_text = '';
        if ($iten['tipo_respuesta']==3){
            $contenido = '';
            if ($is_res){
                $contenido = $contenidorR['contenido'];
            }
            //echo '<div class="contenedor-respuessta-escrito">'.$contenido.'</div>';
            /*$resp_con = $actividadCursoAccses->exeSql(
                    " SELECT * FROM contenido_escrito WHERE id_pregunta='{$iten['pregunta_id']}'");
            if ($row_co = $resp_con->fetch_assoc()){
                echo '<div class="contenedor-respuessta-escrito">'.$row_co['respuesta'].'</div>';
            }*/
        }elseif($iten['tipo_respuesta']==4||$iten['tipo_respuesta']==6){
            $sql ="SELECT * FROM contenido_escrito WHERE id_pregunta = '{$iten['pregunta_id']}'";
            $resp_tex = $conexion->query($sql);

            $contenido = '';
            if ($is_res){
                $contenido = $contenidorR['contenido'];
            }
            $is_corextor = false;
            $is_corextor_reps = false;
            if ($row_tex = $resp_tex->fetch_assoc()){
                $respuesta_escrita_temp_text = $row_tex['respuesta'];
                $is_corextor = true;
                if (trim($row_tex['respuesta'])==trim($contenido)){
                    $is_corextor_reps = true;
                }
            }
            if ($is_corextor){

                $select_correc_check[] = $is_corextor_reps;

            }


            // echo '<input disabled type="text" class="form-control"  value="'.$contenido.'">';
        }else{
            $resp_alt = $conexion->query(
                " SELECT * FROM alternativas_pregunta WHERE id_pregunta = '{$iten['pregunta_id']}'");



            if ($iten['tipo_respuesta']==2){
                $tipoRes=2;
                foreach ($resp_alt as $item){


                    $is_resccc=false;
                    if ($is_res){
                        $is_resccc=isset($contenidorR['alter'][$item['alternativa_id'].'_']);
                    }
                    $is_correct___=false;
                    if ($item['estado_res']==1){
                        $respuestas_corecc[]=$item;
                        $is_correct___=$is_resccc;
                    }
                    $contee_val_temp = '';

                    if ($is_resccc){
                        $select_correc_check[] = $is_correct___;
                        if ($is_correct___){
                            $contee_val_temp = '<i class="fa fa-check" style="color: green"></i>';
                        }else{
                            $contee_val_temp = '<i class="fa fa-times" style="color: red"></i>';
                        }
                    }


                }
            }else{
                $tipoRes=1;
                foreach ($resp_alt as $item){


                    $is_resccc=false;
                    if ($is_res){
                        $is_resccc=isset($contenidorR['alter'][$item['alternativa_id'].'_']);
                    }

                    $is_correct___=false;
                    if ($item['estado_res']==1){
                        $respuestas_corecc[]=$item;
                        $is_correct___=$is_resccc;
                    }
                    $contee_val_temp = '';

                    if ($is_resccc){
                        $select_correc_check[] = $is_correct___;
                        if ($is_correct___){
                            $contee_val_temp = '<i class="fa fa-check" style="color: green"></i>';
                        }else{
                            $contee_val_temp = '<i class="fa fa-times" style="color: red"></i>';
                        }
                    }



                }
            }

        }
        $check_miral_fin = Tools::validarListaBool($select_correc_check)?'checked':'';

        if (Tools::validarListaBool($select_correc_check)){
            $totalNota+=$iten['valor_nota'];
        }
        //var_dump($check_miral_fin);

        $contador++;
    }



    $activ=$idActividadIniciado;
    $estu= $idEstudianteIniciado;
    $nota = $totalNota;

//var_dump([$activ,$estu,$nota]);

    $sql="SELECT * FROM nota_actividad_estudiante WHERE id_estudiante= '$estu' AND id_actividad='$activ';";
//echo $sql;
    if ($row = $conexion->query($sql)->fetch_assoc()){
        $respuesta['res']=true;
        $sql =" UPDATE nota_actividad_estudiante
                        SET
                          nota = '$nota'
                        WHERE nota_actividad_id = '{$row['nota_actividad_id']}';";
        if ($conexion->query($sql)){
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
        if ($conexion->query($sql)){
            $respuesta['res']=true;
        }
    }
}