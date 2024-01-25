<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '0':
      $sql="SELECT *, DATE_FORMAT(not_fecha,'%d/%m/%Y') as not_fecha1 FROM institucion_noticias  WHERE not_estatus='1'";
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
        //NOMBRE DEL BANNER
				$nomfoto = trim('NOT_'.$vtitu).$extension;
				// si el archivo es vacio
				if ($archivo != "" and  (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano  < 50000000))))
						{
							// guardamos el archivo a la carpeta ficheros
              $destino =  "../../../images/Noticia/".$nomfoto;
        		if (move_uploaded_file($_FILES['file']['tmp_name'],$destino))
								{
                    $sql2="INSERT INTO institucion_noticias VALUES ('0',UPPER('$vtitu'),UPPER('$vmensaje'),'$nomfoto','$vfecha','1','$instid')";
                    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
								}
					} else {
            $sql2="INSERT INTO institucion_noticias VALUES ('0',UPPER('$vtitu'),UPPER('$vmensaje'),'','$vfecha','1','$instid')";
            if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
					}
					$sql = "SELECT * FROM institucion_noticias ORDER BY not_id DESC LIMIT 1";
	        $result =mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($result))
					{ $data[] = $row; }
			}
    break;
    case '2': //ELIMINAR IMAGEN
      $ebid = $_POST['ebid'];

      $sql0 ="UPDATE institucion_noticias set not_estatus ='0' WHERE not_id='$ebid'";
      $res0 = mysqli_query($con,$sql0);
      //
      $sql1 ="SELECT institucion_noticias FROM noticias WHERE not_id='$ebid'";
      $res1 = mysqli_query($con,$sql1);
      $arr1 =mysqli_fetch_array($res1,MYSQLI_ASSOC);
      $imgo = $arr1['not_imagen'];
      //
      unlink("../../../images/Noticia/".$imgo);
      //
      $sql = "SELECT * FROM institucion_noticias ORDER BY not_id DESC LIMIT 1";
      $result =mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      { $data[] = $row; }

     break;

    case '9':
    $sql="SELECT * FROM institucion_noticias  WHERE not_estatus='1'";
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
