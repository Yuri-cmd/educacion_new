<?php include 'funcionalidades/fragment/head.php' ?>
<?php
require_once "funcionalidades/models/MatriculaPadres.php";
require_once "funcionalidades/dataacces/MatriculaPadreAcces.php";

$matriculaPadreAcces = new MatriculaPadreAcces();

$conexion = (new Conexion())->getConexion();
$periodo = date('Y');
$sql ="SELECT 
  mat_padr.* 
FROM
  matricula_padres AS mat_padr 
  INNER JOIN grupo_matricula_padres AS grup_matri 
    ON mat_padr.matri_padre_id = grup_matri.id_matricula  
  WHERE  grup_matri.id_padre_apoderado = '{$_SESSION['usuario_padre_apoderado']}'  AND periodo = '$periodo'";

$idmatricula = 0;
$hay_matricula=false;
if ($row = $conexion->query($sql)->fetch_assoc()){
    $hay_matricula=true;
    $idmatricula = $row['matri_padre_id'];
}


?>
<link rel="stylesheet" href="<?=URL::to('public/css/matricula_register.css')?>">

</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
   <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_supervisor.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Matrícula
                <small></small>       </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Matrícula</a></li>
                <li class="active">registro</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <input type="hidden" id="matricula" value="<?=Tools::encrypt($idmatricula)?>">
            <!-- Default box  visited -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Proceso de matricula</h3>
                </div>
                <div class="box-body">
                    <div class="row" style="padding: 10px">
                        <div style="overflow: hidden" class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                            <div class="checkout-wrap col-md-12 col-sm-12 col-xs-12">
                                <?php
                                if ($hay_matricula){
                                ?>
                                <ul class="checkout-bar">
                                    <li class="active"><a href="javascript:void(0)" >Terminos</a></li>
                                    <li class=""><a href="javascript:void(0)" >Padres</a></li>
                                    <li class=""><a href="javascript:void(0)">Hijos</a></li>
                                    <li class=""><a href="javascript:void(0)">Verificacion</a></li>
                                    <li class=""><a href="javascript:void(0)">Confirmación</a></li>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div id="push"></div>

                    <div class="row" id="conte-primary"   >

                            <?php

                            if ($hay_matricula){
                                $matriculaPadreAcces->setMatriPadreId($_SESSION['usuario']);
                                $respu = $matriculaPadreAcces->getMatriculaData()->fetch_assoc();

                                if ($respu['termino']=='0'){
                                    include 'funcionalidades/fragment/partes/terminos_matricula.php';
                                }elseif ($respu['datos_padres']=='0'){
                                    global  $listas;
                                    $listas = $matriculaPadreAcces->exeSql("SELECT * FROM dir_departamento ");
                                    include 'funcionalidades/fragment/partes/form_padres_matricula.php';
                                }elseif($respu['datos_alumnos']=='0'){
                                    include 'funcionalidades/fragment/partes/form_alumnos_matricula.php';
                                }elseif($respu['estado_verifica']=='0'){
                                    include 'funcionalidades/fragment/partes/estado_espera.php';
                                   // include 'funcionalidades/fragment/partes/estado_espera.php';
                                }elseif($respu['confirmado']=='0'){
                                    include 'funcionalidades/fragment/partes/estado_espera2.php';
                                    // include 'funcionalidades/fragment/partes/estado_espera.php';
                                }

                            }else{ ?>

                                <div class="col-md-12 text-center" style="min-height: 300px">
                                    <h1>Sin matricula asignada para registrarse</h1>
                                </div>
                            <?php  }



                            ?>

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

    <?php

    include 'funcionalidades/fragment/footer.php';


    ?>
</body>
<script>

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>