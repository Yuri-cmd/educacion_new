<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '94':
    $sql="DELETE FROM grados WHERE grado_id = '{$_POST['cur']}';";
    echo $sql;
    mysqli_query($con,$sql);
    die("");
  case '1': // CONSULTA PRINCIPAL
    $sql="SELECT g.nombre_grado,g.abreviatura, g.grado_id,n.nivel_id, n.nombre_nivel FROM grados g, niveles_educativos n
		WHERE n.nivel_id = g.nivel_id";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // EDITAR GRADO
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
  case '3': // VALIDAR
    $graid = $_POST['graid'];
    $ntipo = $_POST['ntipo'];
    $sql="SELECT * FROM grados_cursos WHERE id_grado ='$graid' AND grac_estado='1'";
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
  case '4': // GRADOS - CURSOS ASIGNAR
    $graid = $_POST['graid'];
    $ntipo = $_POST['ntipo'];
    $sql="SELECT g.grac_id,g.id_curso, c.nombre, c.descripcion
	     FROM grados_cursos g, cursos c
	     WHERE c.curso_id = g.id_curso AND g.id_grado ='$graid' AND g.grac_estado='1'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '5':
    $cur_id = $_POST['cur_id'];
    $graid = $_POST['graid'];
    $sql2="INSERT INTO grados_cursos VALUES ('0','$graid','$cur_id','1')";
    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
    //
    $sql="SELECT * FROM grados_cursos WHERE id_grado ='$graid'";
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
  case '7': // ELIMINAR CURSO
    $ebid = $_POST['ebid'];
    $sql0 = "UPDATE grados_cursos SET grac_estado='0' WHERE grac_id='$ebid'";
    $res0 = mysqli_query($con,$sql0);
    //
    $sql="SELECT * FROM grados_cursos WHERE grac_id ='$ebid'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;

  case '9': // VALIDAR
    $sql="SELECT g.nombre_grado, g.grado_id,n.nivel_id FROM grados g, niveles_educativos n
		WHERE n.nivel_id = g.nivel_id";
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
