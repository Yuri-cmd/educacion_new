<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '1': // CONSULTA PRINCIPAL
    $sql="SELECT * FROM niveles_educativos";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // AGREGAR NIVEL
    $instid = $_POST['instid'];
    $nilnom = $_POST['nilnom'];
    $sql2="INSERT INTO niveles_educativos VALUES ('0',UPPER('$nilnom'),'$instid')";
    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
    //JSON RESPONSE
    $sql="SELECT * FROM niveles_educativos ORDER BY nivel_id DESC LIMIT 1";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '3': // EDITAR NIVEL
    $idnil = $_POST['idnil'];
    $nilnomb = $_POST['nilnomb'];
    $sql0 = "UPDATE niveles_educativos set nombre_nivel=UPPER('$nilnomb') WHERE nivel_id ='$idnil'";
    $res0 = mysqli_query($con,$sql0);
    //
    $sql="SELECT * FROM niveles_educativos ORDER BY nivel_id DESC LIMIT 1";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
    case '4': // VALIDAR
    $idnil = $_POST['idniv']; $ntipo = $_POST['ntipo'];
    if ($ntipo =='grado') {
      $sql="SELECT * FROM grados WHERE nivel_id='$idnil'";
    } if ($ntipo =='cursos') {
      $sql="SELECT * FROM cursos WHERE id_nivel='$idnil'";
    }

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

  case '5': // CONSULTAR
  $idnil = $_POST['idniv'];
  $sql="SELECT * FROM grados ORDER BY nivel_id DESC";
  $result=mysqli_query($con,$sql);
  while($row = mysqli_fetch_assoc($result))
  { $data[] = $row; }
    break;
  case '6': // AGREGAR GRADO
    $granom = $_POST['granom'];
    $graabre = $_POST['graabre'];
    $idniv = $_POST['idniv'];
    //
    $sql2="INSERT INTO grados VALUES ('0',UPPER('$granom'),UPPER('$graabre'),'$idniv')";
    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }

    //JSON
    $sql="SELECT * FROM grados ";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }

    break;
    case '7':
      $granomb = $_POST['granomb'];
      $graabreb = $_POST['graabreb'];
      $idgrad = $_POST['idgrad'];
      //
      $sql0 = "UPDATE grados set nombre_grado =UPPER('$granomb'), abreviatura =UPPER('$graabreb') WHERE grado_id='$idgrad'";
      $res0 = mysqli_query($con,$sql0);

      //JSON
      $sql="SELECT * FROM grados ";
      $result=mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      { $data[] = $row; }


      break;





    case '9': // VALIDAR
    $sql="SELECT * FROM niveles_educativos";
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
