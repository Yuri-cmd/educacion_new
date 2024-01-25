<?php include 'funcionalidades/fragment/head.php' ?>
<?php
$conexion = (new Conexion())->getConexion();
$sql = "SELECT mat.* FROM matriculas AS mat JOIN matricula_aperturas AS mat_apr ON mat.id_apertura_mtr = mat_apr.matr_id WHERE mat_apr.anio = '".date('Y')."' AND  mat.id_estudiante = '{$_SESSION['estudiante_id']}'";
$dataMt = $conexion->query($sql);
$listaMisCursos=[];
if ($temp = $dataMt->fetch_assoc()){
    $sql = "SELECT 
  curs_doc.*,
  cur.nombre
FROM
  curso_docente AS curs_doc 
  INNER JOIN cursos AS cur 
    ON curs_doc.curso_id = cur.curso_id WHERE curs_doc.nivel = '{$temp['nivel_educativo']}' AND curs_doc.grado= '{$temp['grado']}' AND curs_doc.seccion = '{$temp['seccion']}' and curs_doc.estatus <> 0";
//echo $sql;
    $listaMisCursos = $conexion->query($sql);
}
?>
<link rel="stylesheet" href="<?=URL::to('public/css/matricula_register.css')?>">
<style>
    .contenedor-curso{
        border-radius: 10px;
        border: 1px solid rgba(4, 133, 34, 0.76);
        overflow: hidden;
    }
    .contenedor-curso:hover{
        cursor: pointer;

        -webkit-box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
        box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
    }
    .content-box-curso{
        height: 200px;
        background-color: beige;
        border-radius: 5px;
    }
</style>
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
   <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_alumnos.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cursos
                <small></small>       </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>cursos</a></li>
                <li class="active">mis cursos</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <input type="hidden" id="matricula" value="<?=Tools::encrypt('1')?>">
            <!-- Default box  visited -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                </div>
                <div class="box-body">
                    <div class="row" style="padding: 10px;min-height: 527px;">
                        <div class="col-md-12 text-center" style="margin-bottom: 40px">
                            <h2 style="font-weight: bold;">MIS CURSOS PERIODO <?=date('Y')?></h2>
                        </div>
                        <div class="col-md-12">

                            <?php
                            foreach ($listaMisCursos as $curs){  ?>
                                <div class="col-md-4" style="padding: 10px">
                                    <a href="<?=URL::to('alumno/cursos/'.$curs['curso_doce_id'])?>">
                                        <div class="contenedor-curso">
                                            <div class="col-md-12" style="background-color: #00a65a;color: white">
                                                <strong> <h3><?=$curs['nombre']?></h3></strong>
                                            </div>
                                            <div style="height: 195px;overflow: hidden;" class="col-md-12">
                                                <img style="max-width: 100%;max-height: 200px;display: block;margin: auto;" src="<?=URL::to('datos/iconos/'.$curs['logo'])?>">
                                            </div>

                                        </div>
                                    </a>

                                </div>
                            <?php  }
                            ?>


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
</body>
<script>

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>