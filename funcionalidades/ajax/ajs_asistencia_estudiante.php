<?php
session_start();
require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();

// Función para verificar si ya se ha registrado una marca en los últimos 30 minutos
function verificarUltimaMarca($conexion, $id)
{
    date_default_timezone_set('America/Lima');
    $fecha = date('Y-m-d');
    $fechaActual = date('Y-m-d H:i:s');
    $intervalo = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($fechaActual)));
    $consulta = "SELECT fecha FROM asistencia WHERE id_estudiante = $id and DATE(fecha) = '$fecha' ORDER BY fecha DESC LIMIT 1";
    $resultado = $conexion->query($consulta);
    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $ultimaMarca = $fila['fecha'];
        return strtotime($ultimaMarca) <= strtotime($intervalo) ? true : false;
    } else {
        return true;
    }
}


switch ($_POST['opcion']) {
    case 'save_asistencia':

        $data = $_POST['id'];
        $partes = explode(',', $data);
        $id = $partes[0];
        $tipo = $partes[1];

        if ($tipo == 1) {
            // Consulta si el ID corresponde a un estudiante
            $selectEstudiante = "SELECT * FROM estudiantes WHERE estu_id = $id";
            $resultadoEstudiante = $conexion->query($selectEstudiante);
            if ($resultadoEstudiante->num_rows > 0) {
                if (verificarUltimaMarca($conexion, $id)) {
                    $sql = "INSERT INTO asistencia
                                (id_estudiante,
                                tipo,
                                fecha)
                            VALUES ('{$_POST["id"]}', 1,NOW());";
                    $stmt = $conexion->query($sql);
                    echo json_encode(["status" => true, "resp" => "Codigo QR escaneado y procesado con exito."]);
                } else {
                    echo json_encode(["status" => true, "resp" => "Ya se ha registrado una asistencia en los ultimos 30 minutos."]);
                }
            } else {
                echo json_encode(["status" => false, "resp" => "No es un codigo aceptado por el colegio."]);
            }
        }
        if ($tipo == 2) {
            // Consulta si el ID corresponde a un docente
            $selectDocente = "SELECT * FROM docentes WHERE docente_id = $id";
            $resultadoDocente = $conexion->query($selectDocente);
            if (verificarUltimaMarca($conexion, $id)) {
                $sql = "INSERT INTO asistencia
                            (id_estudiante,
                            tipo,
                            fecha)
                        VALUES ('{$_POST["id"]}',2,NOW());";
                $stmt = $conexion->query($sql);
                echo json_encode(["status" => true, "resp" => "Codigo QR escaneado y procesado con exito."]);
            } else {
                echo json_encode(["status" => true, "resp" => "Ya se ha registrado una asistencia en los ultimos 30 minutos."]);
            }
        } else {
            echo json_encode(["status" => false, "resp" => "No es un codigo aceptado por el colegio."]);
        }
        break;
    case 'get_asistencia':
        $lista = [];
        $sql = "SELECT fecha, estado FROM asistencia WHERE id_estudiante = {$_POST['id']}";
        $asistencia = $conexion->query($sql);
        foreach ($asistencia as $row) {
            $lista[] = $row;
        }
        echo json_encode($lista);
        break;
    case 'get_all_asistencia':
        $tipo = $_POST['tipo'];
        $rol =  $_POST['tipo'] == 1 ? 2 : 6;
        $planilla =  $_POST['planilla'];
        $inner = '';
        $where = '';
        if ($planilla) {
            $planilla =  $planilla == 1 ? '1' : '0';
            $inner = "INNER JOIN  docentes d on d.id_usuario = u.usuario_id";
            $where = "and d.planilla = $planilla";
        }


        $sql = "SELECT
                @contador := @contador + 1 AS contador,
                p.doc_numero,
                CONCAT_WS(' ', p.primer_nombre, p.segundo_nombre) AS nombre,
                CONCAT_WS(' ', p.apellido_paterno, p.apellido_materno) AS apellido,
                u.usuario_id as id_usuario
            FROM
                usuarios u
                INNER JOIN perfiles p ON p.id_usuario = u.usuario_id
                $inner,
                (SELECT @contador := 0) AS init
            WHERE
                u.id_rol = $rol
                AND u.estado = 1 $where";
        $usuarios = $conexion->query($sql);
        foreach ($usuarios as $row) {
            $lista[] = $row;
        }
        echo json_encode($lista);
        break;
    case 'get_asistencia_usuario':
        $tipo = $_POST['tipo'];
        $idusuario = $_POST['idusuario'];
        $mes = $_POST['mes'];

        $agrupado_por_dia = [];

        if ($tipo == 1) {
            $sql = "SELECT
                DATE(fecha) as fecha,
                TIME(fecha) as hora,
                a.fecha as fecha_asistencia,
                m.nivel_educativo
            FROM
                usuarios u
                INNER JOIN estudiantes e ON e.usuario_id = u.usuario_id 
                INNER JOIN matriculas m on m.id_estudiante = e.estu_id
                INNER JOIN asistencia a on a.id_estudiante = e.estu_id
            WHERE
                u.usuario_id = $idusuario AND
                MONTH(fecha) = $mes and a.tipo = 1
            ORDER BY fecha ASC";
        } else {
            $sql = "SELECT
                    DATE( fecha ) AS fecha,
                    TIME( fecha ) AS hora,
                    a.fecha AS fecha_asistencia,
                    '' AS nivel_educativo
                FROM
                    usuarios u
                    INNER JOIN docentes d ON d.id_usuario = u.usuario_id
                    INNER JOIN asistencia a ON a.id_estudiante = d.docente_id and a.tipo = 2
                WHERE
                    u.usuario_id = $idusuario 
                    AND MONTH ( a.fecha ) = $mes 
                ORDER BY
                    a.fecha ASC";
        }
        $resultado = $conexion->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            $nivel = '';
            $turno = "";
            $i = 0;
            while ($fila = $resultado->fetch_assoc()) {
                $nivel = $fila['nivel_educativo'];
                if ($tipo == 1) {
                    $sqlHorarios = "SELECT * FROM horarios_asistencia WHERE id_nivel = $nivel AND tipo_usuario = $tipo";
                } else {
                    $sqlHorarios = "SELECT * FROM horarios_asistencia WHERE tipo_usuario = $tipo";
                }
                // Obtener los horarios de asistencia para el nivel y tipo de usuario

                $resultadoHorarios = $conexion->query($sqlHorarios);

                if ($resultadoHorarios && $resultadoHorarios->num_rows > 0) {
                    // Procesar la asistencia y los horarios
                    foreach ($resultadoHorarios as $h) {
                        $row_hora = new DateTime($fila['hora']);
                        $h_ingreso = new DateTime($h['ingreso']);
                        $h_salida = new DateTime($h['salida']);
                        if ($row_hora >= $h_ingreso && $row_hora <= $h_salida) {
                            $turno = $h["turno"];
                        }
                        if (!isset($agrupado_por_dia[$fila["fecha"]])) {
                            $agrupado_por_dia[$fila["fecha"]] = [];
                        }

                        $agrupado_por_dia[$fila["fecha"]][] = ['hora' => $fila["hora"], 'turno' => $turno, 'tipo' => $i % 2 == 0 ? 'entrada' : 'salida'];
                        break;
                    }
                }
                $i++;
            }
        }
        if ($agrupado_por_dia) {
            echo json_encode($agrupado_por_dia);
        } else {
            echo json_encode(null);
        }

        break;
    case 'dw_asistencia_usuario':


        break;
}
