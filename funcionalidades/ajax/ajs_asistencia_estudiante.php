<?php
session_start();
require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();

switch ($_POST['opcion']) {
    case 'save_asistencia':
        $selectEstudiante = "SELECT * FROM estudiantes WHERE estu_id = {$_POST['id']}";
        $resultadoConsulta = $conexion->query($selectEstudiante);

        if ($resultadoConsulta) {
            if ($resultadoConsulta->num_rows > 0) {
                $sql = "INSERT INTO asistencia
                    (id_estudiante,
                    fecha)
                    VALUES ('{$_POST["id"]}',NOW());";
                $stmt = $conexion->query($sql);
                echo json_encode(["status" => true, "resp" => "Codigo QR escaneado y procesado con exito."]);
            } else {
                echo json_encode(["status" => false, "resp" => "QR invalido"]);
            }
        } else {
            echo json_encode(["status" => false, "resp" => "Ocurrio un error al procesar el codigo QR."]);
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
}
