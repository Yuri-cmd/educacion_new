<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '1': // CONSULTA PRINCIPAL
    $instid = $_POST['instid'];
    $sql="SELECT  CONCAT(perf.primer_nombre,' ',perf.segundo_nombre) AS nombres, CONCAT(perf.apellido_paterno,' ',perf.apellido_materno) AS apellidos,
DATE_FORMAT(perf.fecha_nacimiento,'%d/%m/%Y') AS fnac, perf.doc_numero, perf.telefono_pricipal as telefono, perf.direccion,
doc.docente_id, doc.especialidad,perfil_id,docente_id
    FROM perfiles AS perf  INNER JOIN docentes AS doc
    ON perf.perfil_id = doc.id_perfil
    WHERE doc.id_insti = '$instid'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '2': // AGREGAR PROFESOR
    $ptdoc = $_POST['ptdoc'];
    $pnumd =  $_POST['pnumd'];
    $pnomb1 = $_POST['pnomb1'];
    $pnomb2 = $_POST['pnomb2'];
    $pape1 = $_POST['pape1'];
    $pape2 = $_POST['pape2'];
    $pfnac = $_POST['pfnac'];
    $pemail = $_POST['pemail'];
    $ptele = $_POST['ptele'];
    $pespe = $_POST['pespe'];
    $instid = $_POST['instid'];
    $fecfac2 = date("Y-m-d H:i:s");
    $fecreg = date("Y-m-d");
    $pgene = $_POST['pgene'];
    $pdirec = $_POST['pdirec'];
    $psico = $_POST['psico'];
    //
    $sql2="INSERT INTO usuarios VALUES ('0','$instid','$pnumd','$pnumd','$pemail','$fecfac2','6','1','$psico','')";
    if (!mysqli_query ($con,$sql2)) { echo("Error description1: " . mysqli_error($con)); } else {
      //
      $sql0="SELECT usuario_id FROM usuarios WHERE usuario ='$pnumd'";
      $res0 = mysqli_query($con,$sql0);
      $arr0 = mysqli_fetch_array($res0,MYSQLI_ASSOC);
      $idu = $arr0['usuario_id'];
      if ($idu !='') {
        $sqlp = "INSERT INTO perfiles VALUES ('0','$idu','6',UPPER('$pgene'),UPPER('$pnomb1'),UPPER('$pnomb2'),
        UPPER('$pape1'),UPPER('$pape2'),'$ptdoc','$pnumd','$pfnac','$fecreg',UPPER('$pdirec'),'$ptele','1','')";
          if (!mysqli_query ($con,$sqlp)) { echo("Error description2: " . mysqli_error($con)); } else {
            //
            $sqlpe="SELECT perfil_id FROM perfiles WHERE id_usuario ='$idu'";
            $respe = mysqli_query($con,$sqlpe);
            $arrpe = mysqli_fetch_array($respe,MYSQLI_ASSOC);
            $pidd = $arrpe['perfil_id'];
            //
            $sql1 = "INSERT INTO docentes VALUES ('0','$instid','$pidd','$idu',UPPER('$pespe'))";
            if (!mysqli_query ($con,$sql1)) { echo("Error description3: " . mysqli_error($con)); }
      }
    }
  }
    //
    //JSON
    $sql="SELECT * FROM perfiles WHERE id_rol='6'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '3': // VALIDAR
    $idpro = $_POST['idpro'];
    $sql="SELECT p.primer_nombre, p.segundo_nombre, p.apellido_paterno, p.apellido_materno, u.email, p.fecha_nacimiento, p.id_usuario
    FROM perfiles p, usuarios u WHERE p.perfil_id ='$idpro'
	  AND u.usuario_id = p.id_usuario";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '4': // ACTULIZAR PROFESOR
    $idpro = $_POST['idpro'];
    $busid = $_POST['busid'];
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
    $bpespe = $_POST['bpespe'];
    $bpdirec = $_POST['bpdirec'];
    $bpsico = $_POST['bpsico'];
    //////////////////
    $sql0 = "UPDATE perfiles SET genero ='$bpgene', primer_nombre =UPPER('$bpnomb1'), segundo_nombre =UPPER('$bpnomb2'), apellido_paterno =UPPER('$bpape1'), apellido_materno=UPPER('$bpape2'),
    doc_numero = '$bpnumd', fecha_nacimiento ='$bpfnac', telefono_pricipal =UPPER('$bptele'), direccion =UPPER('$bpdirec')
    WHERE perfil_id='$idpro' AND id_usuario='$busid'";
    if (!mysqli_query ($con,$sql0)) { echo("Error description1: " . mysqli_error($con)); } else {
      //
        $sql1 = "UPDATE usuarios SET usuario='$bpnumd', clave ='$bpnumd', email ='$bpemail', psicologo='$bpsico' WHERE usuario_id ='$busid'";
        if (!mysqli_query ($con,$sql1)) { echo("Error description2: " . mysqli_error($con)); } else {
            //
            $sql2 = "UPDATE docentes SET especialidad=UPPER('$bpespe') WHERE id_perfil ='$idpro' AND id_usuario='$busid'";
            $res2 = mysqli_query($con,$sql2);
        }
    }
    break;
  case '5':
    $proid = $_POST['proid'];
    $sql="SELECT  * FROM curso_docente WHERE docente_id='$proid' AND estatus='1'";
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
  case '6':
    $proid = $_POST['proid'];
    $sql="SELECT c.curso_doce_id,n.nombre_nivel, g.nombre_grado, m.descripcion, s.nombre FROM niveles_educativos n, curso_docente c,
          grados g, cursos m, secciones s WHERE c.nivel = n.nivel_id AND g.grado_id = c.grado
          AND m.curso_id = c.curso_id AND s.seccion_id = c.seccion AND c.docente_id ='$proid' AND c.estatus='1'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '7':
    $proid = $_POST['proid'];
    $selnivel = $_POST['selnivel'];
    $selgrado = $_POST['selgrado'];
    $selcurso = $_POST['selcurso'];
    $selsecci = $_POST['selsecci'];
    //APERTURA HABILITADA
    $sql0 = "SELECT * FROM matricula_aperturas WHERE estado='1' ORDER BY anio DESC LIMIT 1";
    $res0 = mysqli_query($con,$sql0);
    $arr0 = mysqli_fetch_array($res0,MYSQLI_ASSOC);
    $apid = $arr0['matr_id'];
    //
    $sql1 = "INSERT INTO curso_docente set id_apertura='$apid',
  docente_id='$proid',
  curso_id='$selcurso',
  descripcion='',
  logo='',
  nivel='$selnivel',
  grado='$selgrado',
  seccion='$selsecci',
  estatus='1'";
    if (!mysqli_query ($con,$sql1)) { echo("Error description3: " . mysqli_error($con)); }
    //
    $sql ="SELECT * FROM curso_docente WHERE docente_id='$proid'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '8': //ELIMINAR CURSO
    $idcurss = $_POST['idcurss'];
    $sql0 = "UPDATE curso_docente SET estatus='0' WHERE curso_doce_id ='$idcurss'";
    $res0 = mysqli_query($con,$sql0);
    //
    $sql ="SELECT * FROM curso_docente WHERE curso_doce_id ='$idcurss'";
    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;
  case '9': // VALIDAR
    $instid = $_POST['instid'];
    $sql="SELECT  perf.*, doc.docente_id, doc.especialidad
    FROM perfiles AS perf  INNER JOIN docentes AS doc
    ON perf.perfil_id = doc.id_perfil
    WHERE doc.id_insti = '$instid'";
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
    case '10': //
    $proid = $_POST['proid'];
    $sql="SELECT * FROM docente_horario WHERE docente_id ='$proid' AND doh_estado='1'";
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
    case '11': //
      $proid = $_POST['proid'];
      $sql="SELECT *, DATE_FORMAT(doh_fecha,'%d/%m/%Y') fecha2 FROM docente_horario WHERE docente_id ='$proid' AND doh_estado='1'";
      $result=mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result))
      { $data[] = $row; }
      break;
    case '12': //
    if ($_POST["action"] == "upload")
        {
          $archivo = $_FILES["file"]["name"];
          $tamano = $_FILES["file"]["size"];
          $tipo = $_FILES["file"]["type"];
          $extension = pathinfo($_FILES["file"]["name"]);
          $extension = ".".$extension["extension"];
          $proid = $_POST['proid'];
          $fecreg = date("Y-m-d");
          //NOMBRE DEL BANNER
          $nomfoto = 'HORARIO_'.$proid.$extension;
          // si el archivo es vacio
          if ($archivo != "" )
              {
                // guardamos el archivo a la carpeta ficheros
                $destino =  "../../../images/Institucion/Horarios/".$nomfoto;
                if (move_uploaded_file($_FILES['file']['tmp_name'],$destino))
                  {

                      $sql2="INSERT INTO docente_horario VALUES ('0','$nomfoto','$fecreg','$proid','1')";
                      if (!mysqli_query ($con,$sql2)) { echo("Error description: " . mysqli_error($con)); }

                  }
            }
            $sql = "SELECT * FROM docente_horario WHERE docente_id='$proid'";
            $result =mysqli_query($con,$sql);
            while($row = mysqli_fetch_assoc($result))
            { $data[] = $row; }
        }
      break;
      case '13':
        $idhora = $_POST['idhora'];
        $proid = $_POST['proid'];
        $barchi = $_POST['barchi'];
        //
        $sql0 = "UPDATE docente_horario SET doh_estado ='0' WHERE doh_id='$idhora'";
        $res0 = mysqli_query($con,$sql0);
        ///
        unlink("../../../images/Institucion/Horarios/".$barchi);
        ///
        $sql = "SELECT * FROM docente_horario WHERE docente_id='$proid'";
        $result =mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($result))
        { $data[] = $row; }
        break;




}
  print json_encode($data);





 ?>
