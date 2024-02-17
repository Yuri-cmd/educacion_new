<?php

session_start();
require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();
$tipo = $_POST['tipo'];

switch ($tipo) {
    case 'send':
        $user = $_POST['esGrupo'] ? $_POST['grupo'] : $_POST['user'];
        $sql = "INSERT INTO mensaje_usuarion
            (mensaje_id,
             id_usuario,
             es_grupo,
             asunto,
             mensaje,
             remitente,
             fecha,
             tipo,
             estado)
VALUES (null,
        '{$user}',
        '{$_POST['esGrupo']}',
        '{$_POST['asunto']}',
        ?,
        '{$_SESSION['usuario']}',
        now(),
        '1',
        '0');";

        $stmt = $conexion->query($sql);
        $stmt = $conexion->prepare($sql);
        $mensaje = $_POST['mensaje'];
        $stmt->bind_param("s", $mensaje);

        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }

        break;
}
