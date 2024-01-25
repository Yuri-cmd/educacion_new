<?php include 'funcionalidades/fragment/head.php' ?>

<?php

$anio=date('Y');
if(isset($_GET["anio"])){
    $anio=$_GET["anio"];
}

$conexion = (new Conexion())->getConexion();
$sql = "SELECT 
  curs_doc.*,
  cur.nombre,
  nivel.nombre_nivel,
       g.nombre_grado,
       s.nombre nombre_seccion
FROM
  curso_docente AS curs_doc 
  INNER JOIN cursos AS cur 
    ON curs_doc.curso_id = cur.curso_id 
    JOIN niveles_educativos AS nivel ON cur.nivel_academico_id = nivel.nivel_id
    JOIN grados g on curs_doc.grado = g.grado_id
    JOIN secciones s on curs_doc.seccion = s.seccion_id
join matricula_aperturas ma on curs_doc.id_apertura = ma.matr_id
WHERE ma.anio='$anio' and curs_doc.docente_id = '{$_SESSION['docente_id']}' and estatus=1";
//echo $sql;
$cursos_docente = $conexion->query($sql);
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
    <?php include 'funcionalidades/fragment/nav_bar_aside_docente.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;height: 93vh;overflow: auto;">
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
                            <h2 style="font-weight: bold;">MIS CURSOS PERIODO <select id="selanio">
                                    <?php
                                    for($nio=date('Y');$nio>date('Y')-4;$nio--) {
                                        if ($anio==$nio){
                                            echo "<option selected>$nio</option>";
                                        }else{
                                            echo "<option>$nio</option>";
                                        }

                                    }
                                    ?>

                                </select> </h2>
                        </div>
                        <div class="col-md-12">
                            <?php
                            foreach ($cursos_docente as $curs){  ?>
                                <div class="col-md-4" style="padding-bottom: 15px;">
                                    <a href="<?=URL::to('profesores/cursos/'.$curs['curso_doce_id'])?>">
                                        <div class="contenedor-curso">
                                            <div class="col-md-12" style="background-color: #00a65a;color: white">
                                                <strong> <h3><?=$curs['nombre']?></h3></strong>
                                            </div>
                                            <div class="col-md-8">
                                                <img style="max-width: 100%;max-height: 200px;display: block;margin: auto;" src="<?=URL::to('datos/iconos/'.$curs['logo'])?>">
                                            </div>
                                            <div class="col-md-4 content-box-curso text-center">
                                                <strong><h3 style="font-weight: bold;">Nivel</h3></strong>
                                                <h3><?=$curs['nombre_nivel']?></h3>
                                                <h4><?=$curs['nombre_grado']?> - <?=$curs['nombre_seccion']?></h4>
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
<?php
    function getFull(){
        return (isset($_SERVER['HTTPS'])?"https":"http")."://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    }
?>
<script>

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
    $(document).ready(function (){
        const URLLOC=location.href.split("?")[0];
        console.log(URLLOC)
        $("#selanio").change(function (evt) {
            location.href=URLLOC+"?anio="+$(evt.target).val()
        })
    })
</script>
</html>