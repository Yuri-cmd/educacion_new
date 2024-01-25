<?php


$sql = "select * from view_estudiantes_matriculados where estu_id = '$hijo' and periodo = '2021'";

$res_hijo = $conexion->query($sql)->fetch_assoc();
$sql = "SELECT 
  curs_doc.*,
  cur.nombre,
  nivel.nombre_nivel 
FROM
  curso_docente AS curs_doc 
  INNER JOIN cursos AS cur 
    ON curs_doc.curso_id = cur.curso_id 
    JOIN niveles_educativos AS nivel ON cur.nivel_academico_id = nivel.nivel_id
    INNER JOIN matricula_aperturas AS aper ON curs_doc.id_apertura = aper.matr_id
    WHERE curs_doc.nivel = '{$res_hijo['nivel_educativo']}'  AND curs_doc.grado = '{$res_hijo['grado']}' AND curs_doc.seccion = '{$res_hijo['seccion']}'  AND aper.anio = '2021'";

//echo $sql;
$cursos = $conexion->query($sql);

?>

<div class="box box-success">
    <div class="box-header ">
        <div class="col-lg-6">
            <h2><i class="fa fa-edit"></i>&nbsp;Hijos</h2>
        </div>
        <div class="col-lg-6 text-right">
            <button onclick="verNotaHijo(<?=$hijo?>)" class="btn btn-info"><i class="fa fa-refresh"></i></button>
            <button onclick="getHijos()" class="btn btn-warning"><i class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-lg-12"><hr></div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Cursos de <?=$res_hijo['primer_nombre']?>  <?=$res_hijo['segundo_nombre']?></h2>
            </div>
            <div class="col-md-12">
                <?php
                foreach ($cursos as $curs){  ?>
                    <div class="col-md-4" style="padding: 5px">

                            <div class="contenedor-curso" onclick="getLibretaCurso(<?=$curs['curso_doce_id']?>)">
                                <div class="col-md-12" style="background-color: #00a65a;color: white">
                                    <strong> <h3><?=$curs['nombre']?></h3></strong>
                                </div>
                                <div class="col-md-8">
                                    <img style="max-width: 100%;max-height: 200px;display: block;margin: auto;" src="<?=URL::to('datos/iconos/'.$curs['logo'])?>">
                                </div>
                                <div class="col-md-4 content-box-curso text-center">
                                    <strong><h3 style="font-weight: bold;">Nivel</h3></strong>
                                    <h3><?=$curs['nombre_nivel']?></h3>
                                </div>

                            </div>
                    </div>
                <?php  }
                ?>

            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>