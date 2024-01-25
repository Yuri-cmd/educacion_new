<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<?php

$idclase = Tools::decrypt(clase);

$conexion = (new Conexion())->getConexion();
$sql = "SELECT * FROM clase_cursos WHERE clase_id = '".$idclase."'";

$contenidoActividad = null;
if ($contenidoActividad = $conexion->query($sql)->fetch_assoc()){

}


$sql ="SELECT cd.*,ma.anio FROM curso_docente cd join matricula_aperturas ma on cd.id_apertura = ma.matr_id WHERE cd.curso_doce_id = '{$contenidoActividad['id_curso']}'";

$contenido = $conexion->query($sql)->fetch_assoc();

$nivel = $contenido['nivel'];
$grado = $contenido['grado'];
$seccion = $contenido['seccion'];

$sql ="SELECT 
  estu_mat.*
FROM
  view_estudiantes_matriculados AS estu_mat 
  
WHERE estu_mat.periodo = '".date('Y')."' AND estu_mat.nivel_educativo = '$nivel' AND estu_mat.seccion = '$seccion' AND estu_mat.grado = '$grado' ;";

//echo $sql;
$listaAlumnos = $conexion->query($sql);

$sql ="SELECT * FROM asistencia_actividad WHERE id_actividad = '$idclase'";
//echo $sql;
$lisAproFA = $conexion->query($sql);


?>
<link rel="stylesheet" href="<?= URL::to('public/css/matricula_register.css') ?>">
<style>
    .contenedor-curso {
        border-radius: 10px;
        border: 1px solid rgba(4, 133, 34, 0.76);
        overflow: hidden;
        padding: 5px;
        background-color: #00a65a;
    }

    .contenedor-curso:hover {
        cursor: pointer;


    }
    .contenedor-actividad{
        overflow: hidden;
        border-radius: 10px;
        -webkit-box-shadow: 0px -1px 7px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px -1px 7px 0px rgba(0,0,0,0.75);
        box-shadow: 0px -1px 7px 0px rgba(0,0,0,0.75);
    }

    .content-box-curso {
        height: 200px;
        background-color: beige;
        border-radius: 5px;
    }
</style>
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>
<input type="hidden" value="<?= $contenidoActividad['id_curso'] ?>" id="curso_cod">
<input type="hidden" value="<?= clase ?>" id="clase_cod">
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_alumnos.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;min-height: 850px;height: 93vh;overflow: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cursos
                <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>cursos</a></li>
                <li class="active">mis cursos</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box  visited -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <button onclick=" agregarToamAsistencia()" class="btn btn-primary">Tomar Anistencia Manual</button>
                            <button onclick="guardarCambio()" class="btn btn-success">Guardar Cambios</button>
                            <span style="color: white">.......</span>
                            <a href="<?=URL::to('profesores/cursos/'.$contenidoActividad['id_curso'])?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="padding: 10px;min-height: 527px;">
                        <div class="col-md-12 text-center" style="margin-bottom: 40px">
                            <h2 style="font-weight: bold;">Asistencia de Clase</h2>
                            <p>Lista de alumnos matriculados</p>
                        </div>

                        <div class="col-md-12" >



                            <table class="table table-striped table-hover table-bordered">
                                <thead style="background-color: #00a65a;color: white;">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col"  class="text-center">Nombres</th>
                                    <th scope="col" class="text-center">Apellidos</th>
                                    <?php
                                    $contador_as =1;
                                    foreach ($lisAproFA as $asis){

                                        echo ' <th scope="col" class="text-center">Asistencia '.$contador_as.' - '.Tools::formatoHora($asis['fecha']).'</th>';

                                        $contador_as++;
                                    }


                                    ?>
                                    <th scope="col" class="text-center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 1;
                                foreach ($listaAlumnos as $item){

                                    $sql = "SELECT asc_ac.asistecia_actividad_id,asi_alum.* FROM asistencia_actividad AS asc_ac LEFT JOIN asistencia_alumno AS asi_alum ON asc_ac.asistecia_actividad_id = asi_alum.id_asistencia 
                                    AND asi_alum.id_alumno = '{$item['estu_id']}' WHERE id_actividad = '$idclase'";
                                    $lista_temp = $conexion->query($sql);
                                    ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?=$contador?></th>
                                        <td class="text-center"><?=$item['primer_nombre']." ".$item['segundo_nombre']?></td>
                                        <td class="text-center"><?=$item['apellido_paterno']." ".$item['apellido_materno']?></td>
                                        <?php
                                        $contador_asis = 0;
                                        foreach ($lista_temp as $ite_asis){
                                            $checket = '';
                                            if (!is_null($ite_asis['estado'])){
                                                if($ite_asis['estado'] == 1){
                                                    $checket = 'checked';
                                                    $contador_asis++;
                                                }
                                            }


                                           echo '<td class="text-center"><input class="asis_clas_check" data-estu="'.$item['estu_id'].'" data-asis="'.$ite_asis['asistecia_actividad_id'].'" data-asis-est="'.(is_null($ite_asis['estado'])?'0':$ite_asis['alumno_asiste_id']).'"  '.$checket.' type="checkbox"></td>';
                                        }
                                        ?>
                                        <th style="background-color: #00A65A;color: white" class="text-center" scope="row"><?=$contador_asis?></th>


                                    </tr>
                                    <?php
                                    $contador++;
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->


        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <?php include 'funcionalidades/fragment/footer.php' ?>
    <script src="<?= URL::to('public/plugins/summernote/summernote-lite.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.js"></script>
</body>

<script>

    var lista_asis = [];
    function agregarToamAsistencia(){
        $("#loader-menor").show();
        $.ajax({
          type: "POST",
          url:  URL+'/ajax/consulta',
          data: {tipo:'g-a-clase-new',clase:$("#clase_cod").val()},
          success: function (resp) {
              console.log(resp);
              location.reload();
              $("#loader-menor").hide();
          }
        });

    }

    function guardarCambio(){
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+'/ajax/consulta',
            data: {tipo:'g-a-clase',lista: JSON.stringify(lista_asis)},
            success: function (resp) {
                console.log(resp);
                location.reload();
                $("#loader-menor").hide();
            }
        });

    }

    $(document).ready(function () {

        $(".asis_clas_check").change(function() {
           var estu =  $(this).attr("data-estu");
           var asis =  $(this).attr("data-asis");
           var asis_est =  $(this).attr("data-asis-est");
           const estado = $(this).is(':checked');

           var index= -1;

           for (var i =0;i<lista_asis.length;i++){
               if (lista_asis[i].estu == estu &&
                   lista_asis[i].asis == asis &&
                   lista_asis[i].asis_est == asis_est){
                   index= i;
                   break;
               }
           }
           if(index != -1){
               lista_asis[index].estado = estado;
           }else{
               lista_asis.push({
                   estu,asis,asis_est,estado
               });
           }




           //console.log(estu+" "+asis+" "+asis_est+""+$(this).is(':checked'))

        });

    })

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>