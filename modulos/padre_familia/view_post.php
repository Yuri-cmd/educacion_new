<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<?php
$conexion = (new Conexion())->getConexion();
$is_post = Tools::decrypt(id_post);
$sql  ="SELECT * FROM institucion_blog  WHERE blo_id = '$is_post'";
$conte = $conexion->query($sql)->fetch_assoc();

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

        -webkit-box-shadow: 3px 1px 25px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 3px 1px 25px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 3px 1px 25px 0px rgba(0, 0, 0, 0.75);
    }

    .content-box-curso {
        height: 200px;
        background-color: beige;
        border-radius: 5px;
    }
    .conte_flota{
        position: absolute;
        bottom: 1px;
        right: 46px;
        height: 180px;
        width: 279px;
        background-color: white;
        border-radius: 10px;
        -webkit-box-shadow: 3px 1px 25px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 3px 1px 25px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 3px 1px 25px 0px rgba(0, 0, 0, 0.75);
    }
</style>
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>
<input type="hidden" value="<?= '' ?>" id="curso_cod">
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_supervisor.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;height: 93vh;overflow: auto;">
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
                    <div class="col-md-7">
                        <h3 style="font-weight: bold;" class="box-title">Post</h3>
                    </div>
                    <div class="col-md-5 text-right">
                        <a href="<?=URL::to($_SESSION['ruta_usuario'])?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="cont">
                            <div class="box-title text-center">
                                <h2><strong><?=$conte['blo_titulo']?></strong></h2>
                            </div>
                            <div class="box-post-info">
                                <span style="font-weight: bold;color: #6f6f6f;">Publicado el: <?=Tools::formatoFechaVisual($conte['blo_fecha'])?></span>
                            </div>
                            <div class="box-body">
                                <?=$conte['blo_contenido']?>
                            </div>
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

    $(document).ready(function () {

    })
</script>
</html>