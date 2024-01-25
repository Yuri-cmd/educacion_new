<?php include 'funcionalidades/fragment/head.php' ?>



<!-- Roboto Font -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

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

<style>
    main {
        width: 1056px;
        border: 1px solid #8b8b8b;
        margin: 0 auto;
        display: flex;
        flex-grow: 1;
    }
    .left-block {
        width: 160px;
        border-right: 1px solid #e0e0e0;
    }

    .colors {
        background-color: #ece8e8;
        text-align: center;
        padding-bottom: 5px;
        padding-top: 10px;
    }

    .colors button {
        display: inline-block;
        border: 1px solid #00000026;
        border-radius: 0;
        outline: none;
        cursor: pointer;
        width: 20px;
        height: 20px;
        margin-bottom: 5px
    }

    .colors button:nth-of-type(1) {
        background-color: #0000ff;
    }

    .colors button:nth-of-type(2) {
        background-color: #009fff;
    }

    .colors button:nth-of-type(3) {
        background-color: #0fffff;
    }

    .colors button:nth-of-type(4) {
        background-color: #bfffff;
    }

    .colors button:nth-of-type(5) {
        background-color: #000000;
    }

    .colors button:nth-of-type(6) {
        background-color: #333333;
    }

    .colors button:nth-of-type(7) {
        background-color: #666666;
    }

    .colors button:nth-of-type(8) {
        background-color: #999999;
    }

    .colors button:nth-of-type(9) {
        background-color: #ffcc66;
    }

    .colors button:nth-of-type(10) {
        background-color: #ffcc00;
    }

    .colors button:nth-of-type(11) {
        background-color: #ffff00;
    }

    .colors button:nth-of-type(12) {
        background-color: #ffff99;
    }

    .colors button:nth-of-type(13) {
        background-color: #003300;
    }

    .colors button:nth-of-type(14) {
        background-color: #555000;
    }

    .colors button:nth-of-type(15) {
        background-color: #00ff00;
    }

    .colors button:nth-of-type(16) {
        background-color: #99ff99;
    }

    .colors button:nth-of-type(17) {
        background-color: #f00000;
    }

    .colors button:nth-of-type(18) {
        background-color: #ff6600;
    }

    .colors button:nth-of-type(19) {
        background-color: #ff9933;
    }

    .colors button:nth-of-type(20) {
        background-color: #f5deb3;
    }

    .colors button:nth-of-type(21) {
        background-color: #330000;
    }

    .colors button:nth-of-type(22) {
        background-color: #663300;
    }

    .colors button:nth-of-type(23) {
        background-color: #cc6600;
    }

    .colors button:nth-of-type(24) {
        background-color: #deb887;
    }

    .colors button:nth-of-type(25) {
        background-color: #aa0fff;
    }

    .colors button:nth-of-type(26) {
        background-color: #cc66cc;
    }

    .colors button:nth-of-type(27) {
        background-color: #ff66ff;
    }

    .colors button:nth-of-type(28) {
        background-color: #ff99ff;
    }

    .colors button:nth-of-type(29) {
        background-color: #e8c4e8;
    }

    .colors button:nth-of-type(30) {
        background-color: #ffffff;
    }

    .brushes {
    //background-color: purple;
        padding-top: 5px
    }

    .brushes button {
        display: block;
        width: 100%;
        border: 0;
        border-radius: 0;
        background-color: #ece8e8;
        margin-bottom: 5px;
        padding: 5px;
        height: 30px;
        outline: none;
        position: relative;
        cursor: pointer;
    }

    .brushes button:after {
        height: 1px;
        display: block;
        background: #808080;
        content: '';
    }

    .brushes button:nth-of-type(1):after {
        height: 1px;
    }

    .brushes button:nth-of-type(2):after {
        height: 2px;
    }

    .brushes button:nth-of-type(3):after {
        height: 3px;
    }

    .brushes button:nth-of-type(4):after {
        height: 4px;
    }

    .brushes button:nth-of-type(5):after {
        height: 5px;
    }
    .brushes button:nth-of-type(6):after {
        height: 7px;
    }

    .buttons {
        height: 80px;
        padding-top: 10px;
    }

    .buttons button {
        display: block;
        width: 100%;
        border: 0;
        border-radius: 0;
        background-color: #ece8e8;
        margin-bottom: 5px;
        padding: 5px;
        height: 30px;
        outline: none;
        position: relative;
        cursor: pointer;
        font-size: 16px;
    }

    .right-block {
        /*width: 640px;*/
    }

    #paint-canvas {
        cursor:crosshair;
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
                            <button onclick="$('#save').click()" class="btn btn-primary"> <i class="fa fa-save" ></i> Guardar</button>
                            <a href="<?=URL::to('profesores/actividad/'.Tools::encrypt($contenido['id_actividad']))?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary"  style="overflow: auto">
                    <div class="col-md-12 text-center">
                        <h2><strong>Lienzo para dibujar</strong></h2>
                    </div>
<br>
                    <main>
                        <div class="left-block">
                            <div class="colors">
                                <button type="button" value="#0000ff"></button>
                                <button type="button" value="#009fff"></button>
                                <button type="button" value="#0fffff"></button>
                                <button type="button" value="#bfffff"></button>
                                <button type="button" value="#000000"></button>
                                <button type="button" value="#333333"></button>
                                <button type="button" value="#666666"></button>
                                <button type="button" value="#999999"></button>
                                <button type="button" value="#ffcc66"></button>
                                <button type="button" value="#ffcc00"></button>
                                <button type="button" value="#ffff00"></button>
                                <button type="button" value="#ffff99"></button>
                                <button type="button" value="#003300"></button>
                                <button type="button" value="#555000"></button>
                                <button type="button" value="#00ff00"></button>
                                <button type="button" value="#99ff99"></button>
                                <button type="button" value="#f00000"></button>
                                <button type="button" value="#ff6600"></button>
                                <button type="button" value="#ff9933"></button>
                                <button type="button" value="#f5deb3"></button>
                                <button type="button" value="#330000"></button>
                                <button type="button" value="#663300"></button>
                                <button type="button" value="#cc6600"></button>
                                <button type="button" value="#deb887"></button>
                                <button type="button" value="#aa0fff"></button>
                                <button type="button" value="#cc66cc"></button>
                                <button type="button" value="#ff66ff"></button>
                                <button type="button" value="#ff99ff"></button>
                                <button type="button" value="#e8c4e8"></button>
                                <button type="button" value="#ffffff"></button>
                            </div>
                            <div class="brushes">
                                <button type="button" value="1"></button>
                                <button type="button" value="2"></button>
                                <button type="button" value="3"></button>
                                <button type="button" value="4"></button>
                                <button type="button" value="5"></button>
                                <button type="button" value="7"></button>
                            </div>
                            <div class="buttons">
                                <button id="clear" type="button"><i class="fa fa-eraser"></i> Borrador</button>
                                <button id="clear" type="button"><i class="fa fa-refresh"></i> Limpiar</button>
                                <button style="display: none" id="save" type="button">Save</button>
                            </div>
                        </div>
                        <div class="right-block">
                            <canvas id="paint-canvas" width="900" height="600"></canvas>
                        </div>
                    </main>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
            </div>

        </section>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
<img src="" id="img_te">
    <?php include 'funcionalidades/fragment/footer.php' ?>

</body>
<script>

    window.onload = function () {

        // Definitions
        var canvas = document.getElementById("paint-canvas");
        var context = canvas.getContext("2d");
        var boundings = canvas.getBoundingClientRect();

        var grd = context.createLinearGradient(0,0,200,0);
        grd.addColorStop(0,"white");
        context.fillStyle = grd;
        context.fillRect(0,0,900,600);

        // Specifications
        var mouseX = 0;
        var mouseY = 0;

        var tipo = 'lapiz';

        context.strokeStyle = 'black'; // initial brush color
        context.lineWidth = 1; // initial brush width
        var isDrawing = false;


        // Handle Colors
        var colors = document.getElementsByClassName('colors')[0];

        colors.addEventListener('click', function(event) {
            tipo = 'lapiz';
            context.strokeStyle = event.target.value || 'black';
        });

        // Handle Brushes
        var brushes = document.getElementsByClassName('brushes')[0];

        brushes.addEventListener('click', function(event) {
            tipo = 'lapiz';
            context.lineWidth = event.target.value || 1;
        });

        // Mouse Down Event
        canvas.addEventListener('mousedown', function(event) {
            setMouseCoordinates(event);
            isDrawing = true;

            // Start Drawing
            context.beginPath();
            context.moveTo(mouseX, mouseY);
        });

        // Mouse Move Event
        canvas.addEventListener('mousemove', function(event) {
            setMouseCoordinates(event);


            if(isDrawing){

                context.lineTo(mouseX, mouseY);
                context.stroke();
            }
        });

        // Mouse Up Event
        canvas.addEventListener('mouseup', function(event) {
            setMouseCoordinates(event);
            isDrawing = false;
        });

        // Handle Mouse Coordinates
        function setMouseCoordinates(event) {
            mouseX = event.clientX - boundings.left;
            mouseY = event.clientY - boundings.top;
        }

        // Handle Clear Button
        var clearButton = document.getElementById('clear');

        clearButton.addEventListener('click', function() {
            tipo = 'borrador';
            context.strokeStyle = '#ffffff';
           // context.clearRect(0, 0, canvas.width, canvas.height);
        });

        // Handle Save Button
        var saveButton = document.getElementById('save');

        saveButton.addEventListener('click', function() {

            swal({
                title: "¿Desea guardar?",
                buttons: {
                    cancel: true,
                    confirm: "Guardar",

                },
            }).then(function (reee) {
                console.log(reee);
                if (reee){
                    $("#loader-menor").show();
                    $.ajax({
                        type: "POST",
                        url: URL+"/ajax/upload_img_paint",
                        data: {
                            imgBase64: canvasDataURL,
                            curso:'1'
                        },
                        success: function (res) {
                            console.log(res);
                            $("#loader-menor").hide();
                        }
                    });
                }

            })
        });
    };

</script>
</html>