<?php
session_start();
require_once "funcionalidades/models/ArchivosActividad.php";
require_once "funcionalidades/dataacces/ArchivosActividadAcces.php";
require_once "funcionalidades/config/Conexion.php";

$archivosActividadAcces = new ArchivosActividadAcces();

$newName =Tools::getToken(30);
$arr = array( 'res' => false);
$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$ruta_princial = "datos/archivos_actividades/".date('Y')."/".$_POST['curso']."/";
//echo $ruta_princial;
if (!file_exists($ruta_princial)){
    mkdir($ruta_princial, 0777, true);
}
$location = $ruta_princial . $newName .'.png';
if (file_put_contents($location, $data)) {
    $archivosActividadAcces->setOrigen('e');
    $archivosActividadAcces->setArchivo($newName.".png");
    $archivosActividadAcces->setEstudiante($_SESSION['estudiante_id']);
    $archivosActividadAcces->setIdActividad(Tools::decrypt($_POST['actividad']));
    $archivosActividadAcces->setNombreArchivo('mi_dibujo.png');
    $archivosActividadAcces->setTipoArchivo('png');
    if ($archivosActividadAcces->insertar()){
        $arr['res']=true;
        $arr['ruta']=$location;
    }

}
echo json_encode($arr);