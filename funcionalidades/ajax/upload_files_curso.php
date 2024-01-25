<?php

require_once "funcionalidades/config/Conexion.php";


$views=new View();
//var_dump($_POST); 
$curso = $_POST['curso'];

$filename = $_FILES['file']['name'];

$conexion = (new Conexion())->getConexion();

$path_parts = pathinfo($filename, PATHINFO_EXTENSION);
$newName =Tools::getToken(40);
/* Location */
$ruta_princial = "datos/iconos/";
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

    $sql ="SELECT * FROM curso_docente WHERE curso_doce_id = '$curso'";
    if ($row_cur = $conexion->query($sql)->fetch_assoc()){
        if ($row_cur['logo']!='no-img.png'){
            unlink('datos/iconos/'.$row_cur['logo']);
        }
    }

    $sql ="UPDATE curso_docente
SET 
  logo = '$archivo'
WHERE curso_doce_id = '$curso';";


    if ($conexion->query($sql)){
        $arr['res']=true;
        $arr['ruta']=$archivo;

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