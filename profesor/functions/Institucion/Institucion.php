<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '1': // CONSULTA PRINCIPAL
    $sql="SELECT * FROM institucion_educativa";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // GUARDAR INSTITUCION
  if ($_POST["action"] == "upload")
    {
      $archivo = $_FILES["file"]["name"];
      $tamano = $_FILES["file"]["size"];
      $tipo = $_FILES["file"]["type"];
      $extension = pathinfo($_FILES["file"]["name"]);
      $extension = ".".$extension["extension"];
      $iruc = $_POST['iruc'];
      $inombre = $_POST['inombre'];
      $itele = $_POST['itele'];
      $iemail = $_POST['iemail'];
      $idni = $_POST['idni'];
      $irespo = $_POST['irespo'];
      $idirec = $_POST['idirec'];
      $idinst = $_POST['idinst'];
      //NOMBRE DEL LOGO
      $nomfoto = $iruc.$extension;
      // si el archivo es vacio
      if ($archivo != "" and  (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano  < 50000000))))
          {

            // guardamos el archivo a la carpeta ficheros
            $destino =  "../../../images/Institucion/".$nomfoto;
            if (move_uploaded_file($_FILES['file']['tmp_name'],$destino))
              {
                if ($idinst !='0') {
                  $sql2 ="UPDATE institucion_educativa SET insti_ruc ='$iruc', insti_razon_social=UPPER('$inombre'), insti_direccion=UPPER('$idirec'), insti_telefono1=('$itele'),
                  insti_email ='$iemail', insti_director=UPPER('$irespo'), insti_ndni ='$idni', insti_logo ='$nomfoto' WHERE insti_id='$idinst'";
                } else {
                  $sql2="INSERT INTO institucion_educativa VALUES ('0','$iruc',UPPER('$inombre'),UPPER('$idirec'),'$itele','','$iemail',UPPER('$irespo'),'$idni','$nomfoto','1')";
                }
                if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }

              }
        } else {
          if ($idinst !='0') {
            $sql2 ="UPDATE institucion_educativa SET insti_ruc ='$iruc', insti_razon_social=UPPER('$inombre'), insti_direccion=UPPER('$idirec'), insti_telefono1=('$itele'),
            insti_email ='$iemail', insti_director=UPPER('$irespo'), insti_ndni ='$idni' WHERE insti_id='$idinst'";
          }else {
          $sql2="INSERT INTO institucion_educativa VALUES ('0','$iruc',UPPER('$inombre'),UPPER('$idirec'),'$itele','','$iemail',UPPER('$irespo'),'$idni','','1')";
          }
          if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
        }
        //JSON RESPONSE
        $sql = "SELECT * FROM institucion_educativa ORDER BY institucion_educativa DESC LIMIT 1";
        $result =mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($result))
        { $data[] = $row; }
    }
    break;
    case '3': //CARGA DATOS
      $idinst = $_POST['idinst'];
      $sql = "SELECT * FROM institucion_educativa WHERE insti_id ='$idinst'";
      $result =mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      { $data[] = $row; }
      break;
    case '9': // VALIDAR
    $sql="SELECT * FROM institucion_educativa";
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
