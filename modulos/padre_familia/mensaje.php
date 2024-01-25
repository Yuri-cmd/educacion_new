<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?=URL::to('public/css/matricula_register.css')?>">
<link rel="stylesheet" href="<?=URL::to('public/plugins/summernote/summernote-lite.css')?>">
<style>
    .contenedor-curso{
        border-radius: 10px;
        border: 1px solid rgba(4, 133, 34, 0.76);
        overflow: hidden;
        padding: 5px;
        background-color: #00a65a;
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
    <?php include 'funcionalidades/fragment/nav_bar_aside_supervisor.php' ?>
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

            <?php include 'funcionalidades/fragment/partes/mensajes_box.php' ?>

        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->




        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->



    <?php include 'funcionalidades/fragment/footer.php' ?>
</div>

</body>
<script src="<?=URL::to('public/plugins/summernote/summernote-lite.js')?>"></script>
<script>


    $(document).ready(function () {
        $("#mensaje-contenido").summernote({
            placeholder: 'Escriba su mensaje',
            height: 200
        })
    })

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>