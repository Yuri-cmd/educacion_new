<?php

require_once "funcionalidades/config/Conexion.php";

$views=new View();
$filename = $_FILES['file']['name'];

$conexion = (new Conexion())->getConexion();

$path_parts = pathinfo($filename, PATHINFO_EXTENSION);
$newName =Tools::getToken(30);
/* Location */
$location = "datos/archivo_matricula/" . $newName .'.'. $path_parts;
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

/* Upload file */
$arr = array( 'res' => false);
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    $arr['res']=true;

    $archivo = $newName .'.'. $path_parts;
    $matricula = Tools::decrypt($_POST['matr']);

    $sql = "UPDATE matricula_padres
SET 
  estado_verifica = '1',
  archivo = '$archivo'
WHERE matri_padre_id = '$matricula';";
    $conexion->query($sql);
    $arr['dom']=$views->render("funcionalidades/fragment/partes/estado_espera2.php",
        []);

    // echo "INSERT INTO producto_foto VALUES (NULL, '{$_POST['produc']}', '{$arr['dstos']}', '{$_POST['posicion']}');" ;
    echo json_encode($arr);
} else {
    echo json_encode($arr);
}
