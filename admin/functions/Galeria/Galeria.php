<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '1':
    $sql="SELECT * FROM institucion_galeria";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // AGREGAR
  if ($_POST["action"] == "upload")
			{
				$archivo = $_FILES["file"]["name"];
				$tamano = $_FILES["file"]["size"];
				$tipo = $_FILES["file"]["type"];
				$extension = pathinfo($_FILES["file"]["name"]);
				$extension = ".".$extension["extension"];
        $catban = $_POST['catban'];
        $posban = $_POST['posban'];
        $instid = $_POST['instid'];
        //NOMBRE DEL BANNER
				$nomfoto = 'FOTO_'.$posban.$extension;
				// si el archivo es vacio
				if ($archivo != "" and  (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano  < 50000000))))
						{
							// guardamos el archivo a la carpeta ficheros
              $destino =  "../../../images/Institucion/Galeria/".$nomfoto;
              //validar carga
              $sqlrev = "SELECT * FROM institucion_galeria WHERE gal_posicion ='$posban'";
              $rrev = mysqli_query($con,$sqlrev);
              $nrev = mysqli_num_rows($rrev);

               if ($nrev=='1') {
                  unlink("../../../images/Institucion/Galeria/".$nomfoto);
               }
							if (move_uploaded_file($_FILES['file']['tmp_name'],$destino))
								{
                  if ($nrev =='0') {
                    $sql2="INSERT INTO institucion_galeria VALUES ('0','$nomfoto','$posban','$instid')";
                    if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
                  }
								}
					} else {
						$sql2="INSERT INTO institucion_galeria VALUES ('0','$nomfoto','$posban','$instid')";
						if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
					}
					$sql = "SELECT * FROM institucion_galeria ORDER BY gal_id DESC LIMIT 1";
	        $result =mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($result))
					{ $data[] = $row; }
			}
    break;
  case '3': // EDITAR
  if ($_POST["action2"] == "upload")
      {
        $archivo = $_FILES["file"]["name"];
        $tamano = $_FILES["file"]["size"];
        $tipo = $_FILES["file"]["type"];
        $extension = pathinfo($_FILES["file"]["name"]);
        $extension = ".".$extension["extension"];
        $catban = $_POST['bcatban'];
        $posban = $_POST['bposban']; $idbann = $_POST['idbann'];
        $instid = $_POST['instid'];
        //NOMBRE DEL BANNER
        $nomfoto = 'FOTO_'.$posban.$extension;
        //$bimagen = $_POST['bimagen'];
        // si el archivo es vacio
        if ($archivo != "" and  (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano  < 50000000))))
            {
              // eliminar imagen anterior
                unlink("../../../images/Institucion/Galeria/".$nomfoto);
              // guardamos el archivo a la carpeta ficheros
              $destino =  "../../../images/Institucion/Galeria/".$nomfoto;
              if (move_uploaded_file($_FILES['file']['tmp_name'],$destino))
                {
                  $sql2="UPDATE institucion_galeria SET gal_nombre ='$nomfoto' WHERE gal_id='$idbann'";
                  if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }
                }
          }
          $sql = "SELECT * FROM institucion_galeria ORDER BY gal_id DESC LIMIT 1";
          $result =mysqli_query($con,$sql);
          while($row = mysqli_fetch_assoc($result))
          { $data[] = $row; }
      }
    break;
    case '9': // VALIDAR
    $sql="SELECT * FROM institucion_galeria";
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
