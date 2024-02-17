<?php

session_start();

require_once "funcionalidades/config/Conexion.php";

$conexion = (new Conexion())->getConexion();

$frag = $_POST['part'];

switch ($frag) {
    case 'libreta_nota_curso':

        include "funcionalidades/fragment/padre/libreta_nota_curso.php";
        break;
    case 'nota_libreta':
        $hijo = $_POST['hijo'];

        include "funcionalidades/fragment/padre/libreta_nota.php";
        break;
    case 'hijos':
        $sql = "SELECT 
  estu.* 
FROM
  estudiante_contacto AS est_cont 
  INNER JOIN view_estudiantes_matriculados AS estu 
    ON est_cont.id_estuddiante = estu.estu_id 
WHERE est_cont.id_contacto = '{$_SESSION['usuario_padre_apoderado']}' AND estu.periodo = '2021'";

        $lista_hijos = $conexion->query($sql);
        include "funcionalidades/fragment/padre/hijos.php";
        break;
    case 'bandeja_entrada':
        include "funcionalidades/fragment/partes/bandeja_entrada.php";
        break;
    case 'bandeja_enviados':
        include "funcionalidades/fragment/partes/bandeja_enviado.php";
        break;
    case 'mensaje_fro':
        $mensaje_cod = $_POST['codmens'];
        $sql = "UPDATE mensaje_usuarion
SET 
  estado = '1'
WHERE mensaje_id = '$mensaje_cod';";
        $conexion->query($sql);
        include "funcionalidades/fragment/partes/mensaje_conte.php";
        break;
}
