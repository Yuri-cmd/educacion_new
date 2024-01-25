<?php
require_once '../config/Conexion.php';
require_once "../../utils/Tools.php";
$conexion = (new Conexion())->getConexion();
$email = $_POST['email'];

$sql ="SELECT * FROM usuarios WHERE email = '$email'";
$respuesta = ['res'=>false];
if ($row = $conexion->query($sql)->fetch_assoc()){

    $token = Tools::getToken(85);
    $sql = " INSERT INTO recuperacion_usuario
            (id_usuario,
             token)
VALUES ('{$row['usuario_id']}',
        '$token');";
    $conexion->query($sql);
    $to = "$email";
    $subject = "Recuperacion de Contraseña";

    $headers = "From: informes@colegioalfrednobelate.edu.pe" . "\r\n" .
        "CC: $email";
    $txt = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>colegio alfred nobelate</title>
    <style>
        .boton {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            padding: .375rem .75rem;
            font-size: 1rem;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
</head>
<body>

    <div style="width: 100%">
        <img src="http://colegioalfrednobelate.edu.pe/public/images/demo4.png">
        NSTITUCIÓN EDUCATIVA
        ALFRED NOBEL
    </div>
    <div style="width: 100%;padding-top: 20px;text-align: center">
        Recuperación de contraseña, usted ha solicitado la recuperación de su contraseña, haga click en el siguiente botón.<br><br>
        <a class="boton" href="'.$token.'" target="_blank">Click Aqui</a>
    </div>
</body>
</html>';

    if(mail($to, $subject, $txt, $headers)){

    }else{
        $respuesta['msg']="No se pudo enviar el mensaje a su Email.";
    }
}else{
    $respuesta['msg']="No se encontró este email registrado";
}



