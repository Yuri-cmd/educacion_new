<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<?php

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
    .contene-quiz{
        background-color: #00a65a12;
        border: 1px solid #00a65a;
        border-radius: 5px;
    }
    .head-content-quiz{
        padding: 10px;
        border-bottom: 1px solid #acacac;
        min-height: 20px;
        overflow: hidden;
    }
    .footer-content-quiz{
        padding: 7px;
        border-top: 1px solid #acacac;
        min-height: 20px;
    }
    .body-content-quiz{
        padding: 8px;
    }
    .content-box-curso {
        height: 200px;
        background-color: beige;
        border-radius: 5px;
    }
    .contenedor-respuessta-escrito{
        padding: 5px;
        background-color: #fcf8e3;
        border: 1px solid #d0c89e;
        border-radius: 5px;
    }
    .con-extra-data{
        height: 151px;
        background-color: #ecf0f5;
        border: 1px solid #00000059;
        border-radius: 10px;
    }
</style>
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<input type="hidden" value="<?= ''?>" id="actividad_cod">
<input type="hidden" value="<?= '' ?>" id="quiz_id">
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_alumnos.php' ?>
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
        <section class="content" id="contenedor-primario">

            <!-- Default box  visited -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <button onclick="APP.guardarinformacion()" class="btn btn-primary"> <i class="fa fa-save" ></i> Guardar</button>
                            <a href="<?=URL::to('profesores/actividad/'.Tools::encrypt($contenido['id_actividad']))?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="padding: 10px;min-height: 527px;">

                        <div class="col-md-12" id="conenedor-ex-quiz">

                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Widget: user widget style 1 -->
                                    <div id="panel1" class="box box-widget widget-user-2"  ondragover="onDragOver(event);" ondrop="onDrop(event);">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-yellow">
                                            <h3 class="widget-user-username">Nadia Carmichael</h3>
                                        </div>
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li id="targ-1" ondragstart="onDragStart(event);" draggable="true" ><span href="#">Projects <span class="pull-right badge bg-blue">31</span></span></li>
                                                <li id="targ-2" ondragstart="onDragStart(event);" draggable="true"><span href="#">Tasks <span class="pull-right badge bg-aqua">5</span></span></li>
                                                <li id="targ-3" ondragstart="onDragStart(event);" draggable="true"><span href="#">Completed Projects <span class="pull-right badge bg-green">12</span></span></li>
                                                <li id="targ-4" ondragstart="onDragStart(event);" draggable="true"><span href="#">Followers <span class="pull-right badge bg-red">842</span></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>

                                <div class="col-md-4">
                                    <!-- Widget: user widget style 1 -->
                                    <div  id="panel2" class="box box-widget widget-user-2" ondragover="onDragOver(event);" ondrop="onDrop(event);">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-yellow" >
                                            <h3 class="widget-user-username">Nadia Carmichael</h3>
                                        </div>
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked" id="zone_drop">

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>
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
    var tempo;
    var tempo2;

    function onDrop(event) {
        tempo = event;
        const id = event
            .dataTransfer
            .getData('text');
        console.log(id)
        const draggableElement = document.getElementById(id);
        console.log(draggableElement)
        /*const dropzone = event.target;
        dropzone.appendChild(draggableElement);*/
        document.getElementById('zone_drop').append(draggableElement);
        event
            .dataTransfer
            .clearData();
    }

    function onDragStart(event) {
        tempo2 = event
        event
            .dataTransfer
            .setData('text/plain', event.target.id);

        /*event
            .currentTarget
            .style
            .backgroundColor = 'yellow';*/
    }
    function onDragOver(event) {
        event.preventDefault();
    }
</script>
</html>