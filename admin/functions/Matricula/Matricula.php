<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '1': // CONSULTA PRINCIPAL
    $sql="SELECT ma.matr_id,e.insti_razon_social,DATE_FORMAT(fecha_inicio,'%d/%m/%Y') finicio,
	     DATE_FORMAT(fecha_final,'%d/%m/%Y') ffin, ma.anio as periodo
	     FROM matricula_aperturas ma, institucion_educativa e
	     WHERE e.insti_id = ma.id_inst AND estado ='1'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // AGREGAR SECCION
    $instid = $_POST['instid'];
    $finicio = $_POST['finicio'];
    $ffin =   $_POST['ffin'];
    $perido = $_POST['perido'];
    $sql2="INSERT INTO matricula_aperturas VALUES ('0','$instid','$finicio','$ffin','$perido','1')";
    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
    //JSON RESPONSE
    $sql="SELECT * FROM matricula_aperturas ORDER BY matr_id DESC LIMIT 1";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '3': // EDITAR SECCION
    $bmatri = $_POST['bmatri'];
    $bfinicio = $_POST['bfinicio'];
    $bffin =   $_POST['bffin'];
    $bperido = $_POST['bperido'];
    $sql0 = "UPDATE matricula_aperturas set fecha_inicio=UPPER('$bfinicio'), fecha_final='$bffin', anio ='$bperido' WHERE matr_id ='$bmatri'";
    $res0 = mysqli_query($con,$sql0);
    //
    $sql="SELECT * FROM matricula_aperturas WHERE matr_id ='$bmatri'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
 case '9': // VALIDAR
    $sql="SELECT * FROM matricula_aperturas WHERE estado ='1'";
      $result=mysqli_query($con,$sql);
      $nrow = mysqli_num_rows($result);
      if ($nrow>'0') {
        //ENVIAR JSON
        while($row = mysqli_fetch_assoc($result))
        { $data[] = $row; }
      } else {
           $listar = array("data" =>$nrow);
           $data[] = $listar;
      }
      break;
}
  print json_encode($data);





 ?>
