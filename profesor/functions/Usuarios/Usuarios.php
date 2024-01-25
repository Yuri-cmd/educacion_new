<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '0': //CONSULTA PRINCIPAL
    //JSON RESPONSE
    $sql="SELECT u.usuario_id,p.doc_numero, r.nombre, u.email, u.usuario, u.estado, CONCAT(p.primer_nombre,' ', p.segundo_nombre,' ', p.apellido_paterno,' ', p.apellido_materno) nombrec
	FROM usuarios u, usuario_rol r, perfiles p
	WHERE u.id_rol = r.rol_id
	AND p.id_usuario = u.usuario_id ";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '1': // AGREGAR USUARIOS
  $ptdoc = $_POST['ptdoc'];
  $pnumd =  $_POST['pnumd'];
  $pnomb1 = $_POST['pnomb1'];
  $pnomb2 = $_POST['pnomb2'];
  $pape1 = $_POST['pape1'];
  $pape2 = $_POST['pape2'];
  $pfnac = $_POST['pfnac'];
  $pemail = $_POST['pemail'];
  $ptele = $_POST['ptele'];
  $instid = $_POST['instid'];
  $fecfac2 = date("Y-m-d H:i:s");
  $fecreg = date("Y-m-d");
  $selrol = $_POST['selrol'];
  $pdirec = $_POST['pdirec'];
  $pgene = $_POST['pgene'];
  //
  $sql2="INSERT INTO usuarios VALUES ('0','$instid','$pnumd','$pnumd','$pemail','$fecfac2','$selrol','1')";
  if (!mysqli_query ($con,$sql2)) { echo("Error description1: " . mysqli_error($con)); } else {
    //
    $sql0="SELECT usuario_id FROM usuarios WHERE usuario ='$pnumd'";
    $res0 = mysqli_query($con,$sql0);
    $arr0 = mysqli_fetch_array($res0,MYSQLI_ASSOC);
    $idu = $arr0['usuario_id'];
    if ($idu !='') {
      $sqlp = "INSERT INTO perfiles VALUES ('0','$idu','$selrol',UPPER('$pgene'),UPPER('$pnomb1'),UPPER('$pnomb2'),
      UPPER('$pape1'),UPPER('$pape2'),'$ptdoc','$pnumd','$pfnac','$fecreg',UPPER('$pdirec'),'$ptele','1','')";
        if (!mysqli_query ($con,$sqlp)) { echo("Error description2: " . mysqli_error($con)); } else {
          //
          $sqlpe="SELECT perfil_id FROM perfiles WHERE id_usuario ='$idu'";
          $respe = mysqli_query($con,$sqlpe);
          $arrpe = mysqli_fetch_array($respe,MYSQLI_ASSOC);
          $pidd = $arrpe['perfil_id'];
          //
          if ($selrol =='6') {
            $sql1 = "INSERT INTO docentes VALUES ('0','$instid','$pidd','$idu','')";
            if (!mysqli_query ($con,$sql1)) { echo("Error description3: " . mysqli_error($con)); }
          }

        }
      }
    }
    //JSON
    $sql="SELECT * FROM perfiles WHERE id_usuario='$pidd'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // VALIDAR
    $idusi = $_POST['idusi'];
    $sql="SELECT p.primer_nombre, p.segundo_nombre, p.apellido_paterno, p.apellido_materno, u.email, p.fecha_nacimiento,p.perfil_id,
    p.id_usuario, p.telefono_pricipal, p.direccion FROM perfiles p, usuarios u WHERE u.usuario_id ='$idusi'
    AND u.usuario_id = p.id_usuario";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
   case '3': //ACTUALIZAR DATOS
   $idusi = $_POST['idusi'];
   $bperfi = $_POST['bperfi'];
   $bptdoc = $_POST['bptdoc'];
   $bpnumd =  $_POST['bpnumd'];
   $bpnomb1 = $_POST['bpnomb1'];
   $bpnomb2 = $_POST['bpnomb2'];
   $bpape1 = $_POST['bpape1'];
   $bpape2 = $_POST['bpape2'];
   $bpfnac = $_POST['bpfnac'];
   $bpgene = $_POST['bpgene'];
   $bpemail = $_POST['bpemail'];
   $bptele = $_POST['bptele'];
   $bselrol = $_POST['bselrol'];
   $bpdirec = $_POST['bpdirec'];
   //////////////////
   $sql0 = "UPDATE perfiles SET genero ='$bpgene', primer_nombre =UPPER('$bpnomb1'), segundo_nombre =UPPER('$bpnomb2'), apellido_paterno =UPPER('$bpape1'), apellido_materno=UPPER('$bpape2'),
   doc_numero = '$bpnumd', fecha_nacimiento ='$bpfnac', telefono_pricipal =UPPER('$bptele'), direccion =UPPER('$bpdirec')
   WHERE perfil_id='$bperfi' AND id_usuario='$idusi'";
   if (!mysqli_query ($con,$sql0)) { echo("Error description1: " . mysqli_error($con)); } else {
     //
       $sql1 = "UPDATE usuarios SET usuario='$bpnumd', clave ='$bpnumd', email ='$bpemail' WHERE usuario_id ='$idusi'";
       if (!mysqli_query ($con,$sql1)) { echo("Error description2: " . mysqli_error($con)); }
   }
    break;
  case '4': //BLOQUEAR NOTAS
    $idusib = $_POST['idusib'];
    $sql0 ="UPDATE usuarios SET estado='0' WHERE usuario_id='$idusib'";
    $res0 = mysqli_query($con,$sql0);
    ////////////////////////////////////////////////////////////////////////////
    $sql ="SELECT * FROM usuarios WHERE usuario_id='$idusib'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '8':
    $perid =$_POST['perid'];
    $ppass =$_POST['ppass'];
    $pnomup = $_POST['pnomup'];
    $plink = $_POST['plink'];
    ////////////////////////////////////////////////////////////////////////////
    if ($ppass !='') {
      $sql0 ="UPDATE usuarios SET clave='$ppass' WHERE usuario_id='$perid'";
      $res0= mysqli_query($con,$sql0);
    }

    if ($plink !='') {
      $sql1 ="UPDATE usuarios SET link='$plink' WHERE usuario_id='$perid'";
      $res1= mysqli_query($con,$sql1);
    }

    //
    $sql="SELECT * from usuarios WHERE usuario_id='$perid'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '9': //VALIDAR DATOS
    $sql="SELECT * FROM usuarios";
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
