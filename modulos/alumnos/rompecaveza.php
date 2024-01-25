<?php include 'funcionalidades/fragment/head.php' ?>


<?php
$conexion = (new Conexion())->getConexion();
$actividad = Tools::decrypt(actividad);
$sql ="SELECT * FROM imagen_rompecabeza_actividad WHERE id_actividad = '$actividad'";
$ruta_imagen = '';
$piezas = 0;
$ayuda = 0;
if ($row_rompw = $conexion->query($sql)->fetch_assoc()){
    $ruta_imagen = $row_rompw['ruta'];
    $piezas = $row_rompw['piezas'];
    $ayuda = $row_rompw['ayuda'];
}
?>
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

<link rel="stylesheet" href="<?= URL::to('public/rompecabeza/css/modal.css') ?>" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="<?= URL::to('public/rompecabeza/css/style.css') ?>" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="<?= URL::to('public/rompecabeza/css/buttons.css') ?>" type="text/css" charset="utf-8" />

</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<input type="hidden" value="<?= actividad?>" id="actividad_cod">
<input type="hidden" value="<?= '' ?>" id="curso_id">
<input type="hidden" value="<?= $ruta_imagen ?>" id="ruta_imagen">
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

            <input type="hidden" value="<?=URL::to('alumno/actividad/'.actividad)?>" id="ruta_retorno">
            <!-- Default box  visited -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <button onclick="" class="btn btn-primary"> <i class="fa fa-save" ></i> Guardar</button>
                            <a id="regresar-btn" href="<?=URL::to('alumno/actividad/'.actividad)?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary"  style="overflow: auto">
                    <div class="col-md-12 text-center">
                        <h2><strong>Rompecabezas</strong></h2>
                    </div>

                    <div class="col-md-12" style="height: 100vh;">



                        <!-- JIGSAW CANVAS -->
                        <div id="canvas-wrap">
                            <canvas id="canvas"></canvas>
                            <canvas class="hide" id="image"></canvas>
                            <canvas class="hide" id="image-preview"></canvas>
                        </div>

                        <!-- GAME OPTIONS -->
                        <div id="game-options">
                            <ul>
                                <li><b id="clock" class="button">00:00:00</b></li>
                                <li style="display: none"><a href="#" id="SHOW_EDGE" class="button left" title="Show edge pieces only">Border</a></li>
                                <li style="display: none"><a href="#" id="SHOW_MIDDLE" class="button middle" title="Show middle pieces only">Middle</a></li>
                                <li style="display: none"><a href="#" id="SHOW_ALL" class="button right" title="Show all pieces">All</a></li>
                                <li><a href="#" id="JIGSAW_SHUFFLE" class="button left" title="Shuffle">Iniciar</a></li>
                                <li<?=$ayuda==0?' style="display: none" ':''?>><a href="#" id="SHOW_PREVIEW" class="button middle" title="Preview">Ayuda</a></li>
                                <li style="display: none" ><a href="#" id="SHOW_HELP" class="button help right" title="Help">Help</a></li>
                                <!-- END INSERT CUSTOM BUTTONS -->
                                <li style="display: none"  >
                                    <div class="styled-select">
                                        <select id="set-parts" selected-index="8">
                                        </select>
                                    </div>
                                </li>
                                <!-- Insert custom buttons here -->
                                <li  style="display: none" id="create"><a style="display: none"  href="#" class="button add" id="SHOW_FILEPICKER" title="Create puzzle" ></a></li>
                            </ul>
                            <br class="clear"/>
                        </div>

                        <!-- MODAL WINDOW -->
                        <div class="hide" id="overlay"></div>
                        <div id="modal-window" class="hide">
                            <div id="modal-window-msg"></div>
                            <a href="#" id="modal-window-close" class="button">Close</a>
                        </div>

                        <!-- CONGRATULATION -->
                        <div id="congrat" class="hide">
                            <h1>Congratulations!</h1>
                            <h2>You solved it in</h2>
                            <h3><span id="time"></span></h3>
                            <form method="post" class="hide" action="https://games.novatoz.com/jigsaw-puzzle/score.php" target="save-score" onsubmit="jigsaw.UI.close_lightbox();">
                                <label>
                                    Your Name: <input type="text" name="name" />
                                </label>
                                <input type="submit" value="Save score" />
                                <input type="hidden" id="time-input" name="time"/>
                            </form>
                        </div>

                        <!-- CREATE PUZZLE -->
                        <div class="hide" id="create-puzzle">
                            <h1>Choose an image</h1>
                            <form id="image-form" id="add-image-form">
                                <input type="file" id="image-input">
                                <p id="image-error">that's not an image</p>
                                <p id="dnd"><i>Or drag one from your computer</i></p>
                            </form>
                        </div>

                        <!-- HELP -->
                        <div id="help" class="hide">
                            <h2>How to play</h2>
                            <ul>
                                <li>Change the number of pieces with the selector on the top.<br/>
                                    <img src="images/selector.png"/>
                                </li>

                                <li>Use left/right arrows, or right click to rotate a piece.</li>

                                <li>Toggle between edge or middle pieces:<br>
                                    <img src="images/toggle.png"/>
                                </li>
                            </ul>

                            <h3>Good luck.</h3>
                        </div>

                        <form class="hide" method="post" id="redirect-form">
                            <input type="text" name="time" id="t" />
                            <input type="text" name="parts" id="p" />
                        </form>
                        <iframe class="hide" src="about:blank" id="save-score" name="save-score"></iframe>


                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
            </div>

        </section>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- GAME OPTIONS -->

    <?php include 'funcionalidades/fragment/footer.php' ?>

</body>
<script src="<?=URL::to('public/rompecabeza/js/sound.js')?>"></script>
<script src="<?=URL::to('public/rompecabeza/js/event-emiter.min.js')?>"></script>
<script src="<?=URL::to('public/rompecabeza/js/canvas-event.min.js')?>"></script>
<script src="<?=URL::to('public/rompecabeza/js/canvas-puzzle.min.js')?>"></script>

<script>
    const ruta_retorno =  $("#ruta_retorno").val();
    function guardarDataRompecabeza(tiempo){
        $.ajax({
            type: "POST",
            url: URL+"/ajax/consulta",
            data: {
                tipo:'romp_terminado',
                actividad:$("#actividad_cod").val(),
                time:tiempo
            },
            success: function (resp) {
                console.log(resp);
            }
        });

    }
    $(".sidebar-toggle").click()
    ;(function() {
        var sound = new game.Sound('sound/click', 10);
        var jsaw = new jigsaw.Jigsaw({
            defaultImage: URL+"/"+$("#ruta_imagen").val(),
            piecesNumberTmpl: "%d Pieces",
            numberOfPieces: [2,3,4,6,10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
            defaultPieces: <?=$piezas?>
        });

        jsaw.eventBus.on(jigsaw.Events.PIECES_CONNECTED, function() {
            sound.play();
        });

        if (jigsaw.GET["image"]) { jsaw.set_image(jigsaw.GET["image"]); }
    }());
    window.onload = function () {

        // Definitions

    };

</script>
</html>