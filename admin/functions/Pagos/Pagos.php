<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '0':
    $sql="SELECT id_usuario, nombres , apellidos , telefono_1, numero_doc, direccion
						FROM padre_apoderado p, usuarios u WHERE (p.id_rol =3 or p.id_rol =4 or p.id_rol =5)
						AND u.usuario_id = p.id_usuario";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '1':
    $paganual = $_POST['paganual'];
    $pagmes = $_POST['pagmes'];
    $idper = $_POST['idper'];
    $pagnot = $_POST['pagnot'];
    ////////////////////////////////////////////////////////////////////////////
    $sqlbusca = "SELECT count(pag_id) as ncanti FROM pagos_notifica WHERE id_usuario='$idper' AND pag_anual ='$paganual'";
    $rbusca = mysqli_query($con,$sqlbusca);
    $abusca = mysqli_fetch_array($rbusca, MYSQLI_ASSOC);
    $ncanti = $abusca['ncanti'];
    if ($ncanti > 0) {
      if ($pagmes =='1') {  $sql2="UPDATE pagos_notifica SET pag_enero ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='2') {  $sql2="UPDATE pagos_notifica SET pag_febrero ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='3') {  $sql2="UPDATE pagos_notifica SET pag_marzo ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='4') {  $sql2="UPDATE pagos_notifica SET pag_abril ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='5') {  $sql2="UPDATE pagos_notifica SET pag_mayo ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='6') {  $sql2="UPDATE pagos_notifica SET pag_junio ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='7') {  $sql2="UPDATE pagos_notifica SET pag_julio ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='8') {  $sql2="UPDATE pagos_notifica SET pag_agosto ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='9') {  $sql2="UPDATE pagos_notifica SET pag_septiembre ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='10') { $sql2="UPDATE pagos_notifica SET pag_octubre ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='11') { $sql2="UPDATE pagos_notifica SET pag_noviembre ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
      if ($pagmes =='12') { $sql2="UPDATE pagos_notifica SET pag_diciembre ='$pagnot' WHERE pag_anual ='$paganual' AND id_usuario='$idper'"; }
    } else {
      if ($pagmes =='1') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','$pagnot','','','','','','','','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='2') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','$pagnot','','','','','','','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='3') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','$pagnot','','','','','','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='4') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','$pagnot','','','','','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='5') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','$pagnot','','','','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='6') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','','$pagnot','','','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='7') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','','','$pagnot','','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='8') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','','','','$pagnot','','','','','$pagnot','$idper')";
      }
      if ($pagmes =='9') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','','','','','$pagnot','','','','$pagnot','$idper')";
      }
      if ($pagmes =='10') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','','','','','','$pagnot','','','$pagnot','$idper')";
      }
      if ($pagmes =='11') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','','','','','','','$pagnot','','$pagnot','$idper')";
      }
      if ($pagmes =='12') {
        $sql2="INSERT INTO pagos_notifica VALUES ('0','$paganual','','','','','','','','','','','','$pagnot','$pagnot','$idper')";
      }
    }

    //EJECUTAR
    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); } else {
      if ($pagnot !='') {
          if ($pagnot =='NO') {
            $sqlp = "UPDATE usuarios SET estado ='0' WHERE usuario_id='$idper'";
          } else {
            $sqlp = "UPDATE usuarios SET estado ='1' WHERE usuario_id='$idper'";
          }
          $resp = mysqli_query($con,$sqlp);
        }
      }
    //JSON RESPONSE
    $sql="SELECT * FROM pagos_notifica WHERE perfil_id='$idper'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2':
    $idpag = $_POST['idpag'];
    $bpagnom = $_POST['bpagnom'];
    $bpagmon = $_POST['bpagmon'];
    $bsfecha = $_POST['bsfecha'];
    $sql2 = "UPDATE institucion_pagosm SET pag_descripcion =UPPER('$bpagnom'), pag_monto='$bpagmon', pag_fecha ='$bsfecha' WHERE pag_id ='$idpag'";
    $rsql2 = mysqli_query($con,$sql2);
    //JSON RESPONSE
    $sql="SELECT * FROM institucion_pagosm WHERE pag_id = '$idpag'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '7':
  $idper = $_POST['idper'];
  $sql="SELECT * FROM pagos_notifica WHERE id_usuario='$idper'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '8':
  $idper = $_POST['idper'];
  $sql="SELECT * FROM pagos_notifica WHERE id_usuario='$idper'";
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


  case '9': // FILTRAR  CLIENTE
  $sql="SELECT * FROM padre_apoderado WHERE (id_rol =3 or id_rol =4 or id_rol =5)";
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
