<?php

require_once "funcionalidades/models/ArchivosActividad.php";
require_once "funcionalidades/dataacces/ArchivosActividadAcces.php";
require_once "funcionalidades/config/Conexion.php";

$archivosActividadAcces = new ArchivosActividadAcces();
$views=new View();
$clase = Tools::decrypt($_POST['clase']);

$filename = $_FILES['file']['name'];

$conexion = (new Conexion())->getConexion();

$path_parts = pathinfo($filename, PATHINFO_EXTENSION);
$newName =Tools::getToken(30);
/* Location */
$ruta_princial = "datos/archivos_clases/".date('Y')."/".$clase."/";
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


    $archivo = $newName.".".$path_parts;
    $sql ="INSERT INTO archivos_clase
            (archivo_clase_id,
             id_clase,
             archivo,
             nombre_archivo,
             tipo_archivo)
VALUES (NULL,
        '$clase',
        '$archivo',
        '$filename',
        '$path_parts');";


    if ($conexion->query($sql)){
        $arr['res']=true;
        $arr['ruta']=$location;
        $arr['nombre']=$filename;
        $arr['tipo']=$path_parts;

    }

   /* $archivo = $newName .'.'. $path_parts;
    $matricula = Tools::decrypt($_POST['matr']);


    $arr['dom']=$views->render("funcionalidades/fragment/partes/estado_espera2.php",
        []);
*/
    // echo "INSERT INTO producto_foto VALUES (NULL, '{$_POST['produc']}', '{$arr['dstos']}', '{$_POST['posicion']}');" ;
    //echo json_encode($arr);
}
echo json_encode($arr);