<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '0':
    $profid = $_POST['profid'];
    $sql="SELECT *, DATE_FORMAT(blo_fecha,'%d/%m/%Y') as blo_fecha1 FROM institucion_blog WHERE usuario_id ='$profid' AND blo_estatus='1'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '1': // AGREGAR
  if ($_POST["action"] == "upload")
			{
				$archivo = $_FILES["file"]["name"];
				$tamano = $_FILES["file"]["size"];
				$tipo = $_FILES["file"]["type"];
				$extension = pathinfo($_FILES["file"]["name"]);
				$extension = ".".$extension["extension"];
        $vtitu = $_POST['vtitu'];
        $vfecha = date("Y-m-d");
        $vmensaje = $_POST['vmensaje'];
        $instid = $_POST['instid'];
        $profid = $_POST['profid'];
        //NOMBRE DEL BANNER
				$nomfoto = trim('blog_'.$profid.'_'.$vtitu).$extension;
				// si el archivo es vacio
				if ($archivo != "" and  (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano  < 50000000))))
						{
							// guardamos el archivo a la carpeta ficheros
              $destino =  "../../../images/Blog/".$nomfoto;
        		if (move_uploaded_file($_FILES['file']['tmp_name'],$destino))
								{
                    $sql2="INSERT INTO institucion_blog VALUES ('0',UPPER('$vtitu'),UPPER('$vmensaje'),'$nomfoto','$vfecha','$instid','$profid','1')";
                    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
								}
					} else {
            $sql2="INSERT INTO institucion_blog VALUES ('0',UPPER('$vtitu'),UPPER('$vmensaje'),'','$vfecha','$instid','$profid','1')";
            if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
					}
					$sql = "SELECT * FROM institucion_blog ORDER BY blo_id DESC LIMIT 1";
	        $result =mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($result))
					{ $data[] = $row; }
			}
    break;
    case '2': //ELIMINAR IMAGEN
      $ebid = $_POST['ebid'];
      $sql0 ="UPDATE institucion_blog set blo_estatus ='0' WHERE blo_id='$ebid'";
      $res0 = mysqli_query($con,$sql0);
      //
      $sql1 ="UPDATE institucion_blog set blo_estatus ='0' WHERE blo_id='$ebid'";
      $res1 = mysqli_query($con,$sql1);
      $arr1 =mysqli_fetch_array($res1,MYSQLI_ASSOC);
      $imgo = $arr1['blo_imagen'];
      //
      unlink("../../../images/Blog/".$imgo);
      //
      $sql = "SELECT * FROM institucion_blog ORDER BY blo_id DESC LIMIT 1";
      $result =mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      { $data[] = $row; }
     break;

    case '9':
    $profid = $_POST['profid'];
    $sql="SELECT * FROM institucion_blog WHERE usuario_id ='$profid' AND blo_estatus='1'";
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
