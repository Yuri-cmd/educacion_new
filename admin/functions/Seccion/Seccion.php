<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '89':
    $sql="DELETE FROM secciones WHERE seccion_id = '{$_POST['secc']}';";
    echo $sql;
    mysqli_query($con,$sql);
    die();
    break;
  case '1': // CONSULTA PRINCIPAL
    $sql="SELECT s.seccion_id, s.cnt_alumnos, s.nombre, g.nombre_grado,n.nombre_nivel
      FROM secciones s, grados g, niveles_educativos n WHERE s.id_grado = g.grado_id AND n.nivel_id = g.nivel_id";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // AGREGAR SECCION
    $nilaca = $_POST['nilaca'];
    $selgrado = $_POST['selgrado'];
    $seccnom = $_POST['seccnom'];
    $secccnt = $_POST['secccnt'];
    $sql2="INSERT INTO secciones VALUES ('0',UPPER('$seccnom'),'','$secccnt','$selgrado','')";
    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
    //JSON RESPONSE
    $sql="SELECT * FROM secciones ORDER BY seccion_id DESC LIMIT 1";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '3': // EDITAR SECCION
    $bsecc = $_POST['bsecc'];
    $bseccnom = $_POST['bseccnom'];
    $bsecccnt =   $_POST['bsecccnt'];
    $sql0 = "UPDATE secciones set nombre=UPPER('$bseccnom'), cnt_alumnos='$bsecccnt' WHERE seccion_id ='$bsecc'";
    $res0 = mysqli_query($con,$sql0);
    //
    $sql="SELECT * FROM secciones WHERE seccion_id ='$bsecc'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
    case '5':
      $idhora = $_POST['idhora'];
      $proid = $_POST['proid'];
      $barchi = $_POST['barchi'];
      //
      $sql0 = "UPDATE secciones SET horario ='' WHERE seccion_id='$idhora'";
      $res0 = mysqli_query($con,$sql0);
      ///
      unlink("../../../images/Institucion/Horarios/".$barchi);
      ///
      $sql = "SELECT * FROM secciones WHERE seccion_id='$idhora'";
      $result =mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      { $data[] = $row; }
      break;


    case '6': //
    if ($_POST["action"] == "upload")
        {
          $archivo = $_FILES["file"]["name"];
          $tamano = $_FILES["file"]["size"];
          $tipo = $_FILES["file"]["type"];
          $extension = pathinfo($_FILES["file"]["name"]);
          $extension = ".".$extension["extension"];
          $seccid = $_POST['seccid'];
          $secnom = $_POST['secnom'];
          $granom = $_POST['granom'];
          //NOMBRE DEL BANNER
          $nomfoto = 'HORARIO_'.$granom.'_'.$secnom.$extension;
          // si el archivo es vacio
          if ($archivo != "" )
              {
                // guardamos el archivo a la carpeta ficheros
                $destino =  "../../../images/Institucion/Horarios/".$nomfoto;
                if (move_uploaded_file($_FILES['file']['tmp_name'],$destino))
                  {
                      $sql2="UPDATE secciones SET horario = '$nomfoto' WHERE seccion_id ='$seccid'";
                      if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
                  }
            }
            $sql = "SELECT * FROM secciones WHERE seccion_id='$seccid'";
            $result =mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($result))
            { $data[] = $row; }
        }
      break;
  case '7':
    $seccid = $_POST['seccid'];
    $sql="SELECT * FROM secciones WHERE seccion_id ='$seccid'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '8': // VALIDAR
    $seccid = $_POST['seccid'];
    $sql="SELECT horario FROM secciones WHERE seccion_id='$seccid'";
    $result=mysqli_query($con,$sql);
    $arrho = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $horario = $arrho['horario'];
    if ($horario =='') {
      $listar = array("data" =>'0');
      $data[] = $listar;
    } else {
      $listar = array("data" =>'1');
      $data[] = $listar;
    }
    break;
 case '9': // VALIDAR
    $sql="SELECT * FROM secciones";
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
