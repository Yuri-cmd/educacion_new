<?php
session_start();
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
  case '0':
      $sql="SELECT perfil_id,CONCAT(primer_nombre,' ',segundo_nombre) nombrec, CONCAT(apellido_paterno,' ',apellido_materno) apellidos,
      telefono_pricipal, direccion, doc_numero, DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') fnac
      FROM view_estudiantes_matriculados";

    $result=mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result))
    { $data[] = $row; }
    break;


    case '9':
    $sql="SELECT
  `perf`.`perfil_id`         AS `perfil_id`,
  `perf`.`id_usuario`        AS `id_usuario`,
  `perf`.`id_rol`            AS `id_rol`,
  `perf`.`genero`            AS `genero`,
  `perf`.`primer_nombre`     AS `primer_nombre`,
  `perf`.`segundo_nombre`    AS `segundo_nombre`,
  `perf`.`apellido_paterno`  AS `apellido_paterno`,
  `perf`.`apellido_materno`  AS `apellido_materno`,
  `perf`.`doc_id`            AS `doc_id`,
  `perf`.`doc_numero`        AS `doc_numero`,
  `perf`.`fecha_nacimiento`  AS `fecha_nacimiento`,
  `perf`.`fecha_registro`    AS `fecha_registro`,
  `perf`.`direccion`         AS `direccion`,
  `perf`.`telefono_pricipal` AS `telefono_pricipal`,
  `perf`.`ciudad_id`         AS `ciudad_id`,
  `perf`.`foto_perfil`       AS `foto_perfil`,
  `estu`.`estado`            AS `estado`,
  `estu`.`estu_id`           AS `estu_id`,
  `estu`.`usuario_id`        AS `usuario_id`,
  `matr`.`fehca_matricula`   AS `fehca_matricula`,
  `matr_aper`.`anio`         AS `periodo`,
  `matr`.`id_insti`          AS `id_insti`,
  `matr`.`nivel_educativo`   AS `nivel_educativo`,
  `matr`.`seccion`           AS `seccion`,
  `matr`.`grado`             AS `grado`,
  `secc`.`nombre`            AS `seccion_nombre`,
  `grados`.`nombre_grado`    AS `nombre_grado`,
  `nivel`.`nombre_nivel`     AS `nombre_nivel`,
  `secc`.`horario`           AS `horario`
  
FROM `matricula_aperturas` `matr_aper`
        JOIN `matriculas` `matr`
          ON `matr_aper`.`matr_id` = `matr`.`id_apertura_mtr`
       JOIN `estudiantes` `estu`
         ON `matr`.`id_estudiante` = `estu`.`estu_id`
      JOIN `perfiles` `perf`
        ON `estu`.`perfil_id` = `perf`.`perfil_id`
     JOIN `secciones` `secc`
       ON `matr`.`seccion` = `secc`.`seccion_id`
    JOIN `grados`
      ON `matr`.`grado` = `grados`.`grado_id`
   JOIN `niveles_educativos` `nivel`
     ON `matr`.`nivel_educativo` = `nivel`.`nivel_id`
     JOIN curso_docente cur_doc ON matr_aper.matr_id = cur_doc.id_apertura
     
     WHERE cur_doc.docente_id = '{$_SESSION['docente_id']}' GROUP BY estu_id
     ";
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
