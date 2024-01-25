<?php

session_start();
require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();
$tipo = $_POST['tipo'];

switch ($tipo){
    case 'send':
        $sql ="INSERT INTO mensaje_usuarion
            (mensaje_id,
             id_usuario,
             asunto,
             mensaje,
             remitente,
             fecha,
             tipo,
             estado)
VALUES (null,
        '{$_POST['user']}',
        '{$_POST['asunto']}',
        ?,
        '{$_SESSION['usuario']}',
        now(),
        '1',
        '0');";

        $stmt = $conexion->prepare($sql);
        $mensaje = $_POST['mensaje'];
        $stmt->bind_param("s", $mensaje);

        if ($stmt->execute()){
            echo "true";
        }else{
            echo "false";
        }

        break;


}