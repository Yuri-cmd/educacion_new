<?php
session_start();
require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();

switch ($_POST['opcion']) {
    case 'save_asistencia':
            $sql = "INSERT INTO asistencia
            (id_estudiante,
            fecha)
            VALUES ('{$_POST["id"]}',NOW());";
            $stmt = $conexion->query($sql);
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