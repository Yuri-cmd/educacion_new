<?php
session_start();

require_once "funcionalidades/config/Conexion.php";


$views=new View();


$filename = $_FILES['file']['name'];

$conexion = (new Conexion())->getConexion();

$path_parts = pathinfo($filename, PATHINFO_EXTENSION);
$newName =Tools::getToken(30);
/* Location */
$ruta_princial = "datos/medios/".$_SESSION['usuario']."/";
//echo $ruta_princial;
if (!file_exists($ruta_princial)){
    mkdir($ruta_princial, 0777, true);
}
$location = $ruta_princial . $newName .'.'. $path_parts;
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

/* Upload file */
$arr = array( 'res' => false);
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {

    $ruta =$newName .'.'. $path_parts;
    $sql =" INSERT INTO mis_medios
            (id_medio,
             usuario,
             nombre,
             tipo,
             ruta)
VALUES (null,
        '{$_SESSION['usuario']}',
        '$filename',
        '$path_parts',
        '$ruta');";

    if ($conexion->query($sql)){
        $arr['res']=true;
        $arr['ruta']=$location;
        $arr['nombre']=$filename;
        $arr['tipo']=$path_parts;

    }


}
echo json_encode($arr);