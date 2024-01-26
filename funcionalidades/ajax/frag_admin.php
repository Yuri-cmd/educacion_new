<?php
session_start();
require_once "funcionalidades/config/Conexion.php";
$conexion = (new Conexion())->getConexion();

$view = new View();
$frag =$_POST['cont'];

switch ($frag){
    case 'niveles':
        $periodo = $_POST['periodo'];
        $sql ="SELECT * FROM niveles_educativos WHERE nivel_estatus <> '0' and   insti_id = '{$_SESSION['institucion']}'";
        $lista = $conexion->query($sql);
        $lis =[];
        foreach ($lista as $item){
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM view_estudiantes_matriculados WHERE periodo = '$periodo' AND id_insti = '8' AND nivel_educativo = '{$item['nivel_id']}'";
            $row_n = $conexion->query($sql)->fetch_assoc();
            $item['cnt_m'] = $row_n['cantidad'];
            $lis[] = $item;
        }
        echo $view->render("funcionalidades/fragment/admin/lista_niveles.php",['lista'=>$lis,'periodo'=>$periodo]);
        break;
    case 'matriculados':
        $periodo = $_POST['periodo'];
        $sql ="SELECT *  FROM view_estudiantes_matriculados WHERE periodo = '".$periodo."' AND id_insti = '{$_SESSION['institucion']}' AND nivel_educativo = '{$_POST['nvl']}'";
        $lista = $conexion->query($sql);
        $sql ="SELECT  * FROM niveles_educativos WHERE  nivel_id = '{$_POST['nvl']}'";
        $nombre_nivel = $conexion->query($sql)->fetch_assoc()['nombre_nivel'];
        echo $view->render("funcionalidades/fragment/admin/lista_matriculados.php",
            ['lista'=>$lista,'nivel'=>$nombre_nivel,'nivel_id'=>$_POST['nvl'],'periodo'=>$periodo]);

        break;
    case 'from-matr':
        $id_nivel = $_POST['nvl'];
        $sql="SELECT * FROM dir_departamento;";
        $list_dep = $conexion->query($sql);

        $sqlMP = "SELECT * FROM metodo_pago";
        $metodos_pagos = $conexion->query($sqlMP);

        echo $view->render("funcionalidades/fragment/admin/form_registro.php",
            ['nivel_id'=>$_POST['nvl'],"listas_dep"=>$list_dep,"metodos_pagos"=>$metodos_pagos]);
        break;

    case 'from-matr-edt':
        $estud = $_POST['estud'];
        $sql="SELECT * FROM dir_departamento;";
        $list_dep = $conexion->query($sql);

        echo $view->render("funcionalidades/fragment/admin/form_editar.php",
            ['nivel_id'=>$_POST['nvl'],"estud"=>$_POST['estud'],"listas_dep"=>$list_dep]);
        break;
}