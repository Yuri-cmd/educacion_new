<?php
session_start();
require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();
$lista = [];

$bus = $_GET['term'];

$sql ="SELECT
  perfil_id,
  id_usuario,
  id_rol,
  CONCAT(primer_nombre,' ',
  segundo_nombre,' ',
  apellido_paterno,' ',
  apellido_materno) AS nom_pred
FROM  perfiles WHERE !ISNULL(id_usuario) AND CONCAT(primer_nombre,' ',
  segundo_nombre,' ',
  apellido_paterno,' ',
  apellido_materno) LIKE '%$bus%'";
$tempo = $conexion->query($sql);

foreach ($tempo as $row){
    $row['value']= $row['nom_pred'];
    $lista[] = $row;
}

$sql = "SELECT
  id_contacto,
  id_usuario,
  CONCAT(nombres, ' ',apellidos) AS nom_pred
FROM padre_apoderado WHERE CONCAT(nombres, ' ',apellidos) LIKE '%$bus%'";
$tempo = $conexion->query($sql);

foreach ($tempo as $row){
    $row['value']= $row['nom_pred'];
    $lista[] = $row;
}

echo json_encode($lista);