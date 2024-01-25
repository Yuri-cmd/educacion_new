<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<?php

$idActividad = Tools::decrypt(actividad_id);

$conexion = (new Conexion())->getConexion();
$sql="SELECT 
  act_c.*,
  tip_act.nombre AS 'actividad_tipo' 
FROM
  actividad_curso AS act_c 
  INNER JOIN tipo_actividad AS tip_act 
    ON act_c.id_tipo_activada = tip_act.tipo_id 
WHERE act_c.actividad_id = '$idActividad'";

$contenidoActividad = null;
if ($contenidoActividad = $conexion->query($sql)->fetch_assoc()){

}

$sql = "SELECT * FROM archivos_actividad WHERE id_actividad = '$idActividad'  and origen = 'd'";

$res_archivos = $conexion->query($sql);


$sql ="SELECT * FROM imagen_rompecabeza_actividad WHERE id_actividad = '$idActividad'";
$ruta_rompecabeza = '';
$piezas = 0;
$ayuda = 0;
if($row_rop = $conexion->query($sql)->fetch_assoc()){
    $ruta_rompecabeza = $row_rop['ruta'];
    $piezas = $row_rop['piezas'];
    $ayuda = $row_rop['ayuda'];
}

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
<input type="hidden" value="<?= actividad_id ?>" id="actividad_cod">
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
                            <a href="<?=URL::to('profesores/cursos/'.$contenidoActividad['id_curso'])?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="padding: 10px;min-height: 527px;height: 70vh;overflow: auto;">
                        <div class="col-md-12 text-center" style="margin-bottom: 40px">
                            <h2 style="font-weight: bold;"><?=$contenidoActividad['nombre_activid']?></h2>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="" style="margin-bottom: 10px">
                                    <h3>Descripcion de la actividad</h3>
                                    <button id="editar-descripcion" class="btn btn-primary">Editar</button>
                                    <button id="guardar-descripcion" style="display: none" class="btn btn-success">Guardar</button>
                                </div>
                                <div id="descripcion-larga">
                                    <?=strlen($contenidoActividad['descripcion_larga'])>0?$contenidoActividad['descripcion_larga']:'Sin Descripción'?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-left">
                            <div class="col-md-8 col-md-offset-2">
                                <h2> </h2>
                            </div>
                            <div class="col-md-6 col-md-offset-2">
                                <div style="display: none" class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="box box-solid" style="border: 1px solid #00a65a;">
                                    <input type="file" style="display: none" id="archivo-acti">
                                    <div class="box-header with-border" style="color: white;background-color: #00a65a;">
                                        <h3 class="box-title">Archivos del Docente</h3>
                                        <div class="box-tools">
                                            <button onclick="$('#archivo-acti').click()" type="button" class="btn btn-primary"><i class="fa fa-plus"> Agregar</i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding" style="">
                                        <ul class="nav nav-pills nav-stacked" id="conte_files">
                                            <?php
                                            foreach ($res_archivos as $res_arc) {
                                               echo '<li style="overflow: hidden">
                                                        <a style="float: left" href="'.URL::to("datos/archivos_actividades/".date('Y')."/".$contenidoActividad['id_curso'].'/'.$res_arc['archivo'] ).'" target="_blank"><i class="fa fa-circle-o text-red"></i>' .$res_arc['nombre_archivo'] .'</a>
                                                        <span onclick="eliminarFilActCur('.$res_arc['archiv_actividad_id'].')" class="btn btn-danger" style="float: right"><i class="fa fa-times"></i></span>
                                                        </li>';
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12" style="margin-top: 20px;">
                            <div class="col-md-6 col-md-offset-3" >
                                <div class="contenedor-actividad">
                                    <div class="col-md-12 text-center" style="background-color: #00a65a;color: white;">
                                        <h3><?=$contenidoActividad['actividad_tipo']?></h3>
                                    </div>
                                    <div class="col-md-12 text-center" style="padding: 10px;">
                                        <?php
                                        if ($contenidoActividad['id_tipo_activada']==2){
                                            echo ' <span onclick="iniciarContruirExamne()" class="btn btn-info">Construir examen</span>';
                                        }else{
                                            if($contenidoActividad['id_tipo_activada']==6){

                                                echo ' <span data-toggle="modal" data-target="#modal_imagen_rompe" class="btn btn-primary">Configurar</span>';
                                            }
                                            ?>
                                            <a class="btn btn-info" href="<?=URL::to('profesores/calificar/'.actividad_id)?>">Ir  a calificar</a>
                                        <?php    }
                                        ?>

                                    </div>
                                    <div class="col-md-12 text-center" style="    border-top: 1px solid #0000001c;">
                                        <?php
                                        if ($contenidoActividad['id_tipo_activada']==2){

                                            ?>
                                            <h4><strong>Calificacion</strong> <a href="<?=URL::to('profesores/examen/'.actividad_id)?>"> Ir aCalificar</a></h4>
                                        <?php
                                        }else{
                                           // echo '<h4><strong>Calificacion</strong> <a href="#"> Calificar</a></h4>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>



                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_imagen_rompe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Configuracion</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Imagen</label>
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <?php
                                                if (strlen($ruta_rompecabeza)>0){
                                                    echo '<a href="'.URL::to($ruta_rompecabeza).'" id="img-rompe-temp"  class="btn btn-warning" target="_blank" >Ver Imagen</a><br>';
                                                }else{
                                                    echo '<a id="img-rompe-temp" style="display: none" class="btn btn-warning" target="_blank" >Ver Imagen</a><br>';

                                                }

                                                ?>
                                            </div>
                                            <div class="col-md-7">
                                                  <input  accept="image/jpeg"  type="file" id="imagen-rompeca" >
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Numero piezas</label>
                                        <select id="piezas" class="form-control">
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option selected value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                            <option value="60">60</option>
                                            <option value="70">70</option>
                                            <option value="80">80</option>
                                            <option value="90">90</option>
                                            <option value="100">100</option>
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">¿Mostrar Ayuda Visual?</label>
                                        <select id="ayuda" class="form-control">
                                            <option selected value="1">SI</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button onclick="guardarRompecabeza()" type="button" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="modal-registro-actividad" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-green-gradient text-center">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Nueva Actividad</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form v-on:submit.prevent="guardarActividad()">
                                    <div class="modal-body">
                                        <div class="form-group text-center">
                                            <label>Para agregar contenido de la clase, como archivos o una descripción
                                                más grande, cree la clase y después entre para agregar el contenido de
                                                la clase</label>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="inputfechaterminoA">Tipo </label>
                                                <select v-model="dataRActividad.tipoa_" class="form-control">
                                                    <?php
                                                    foreach ($listaTipoActividad as $tipo) {
                                                        echo "<option value='{$tipo['tipo_id']}'>{$tipo['nombre']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputnombreunidadA">Nombre de la Clase</label>
                                                <input required v-model="dataRActividad.nombre" type="text"
                                                       class="form-control" id="inputnombreunidadA"
                                                       placeholder="Unidad....">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputfechainicioA">Fecha de Inicio</label>
                                                <input required v-model="dataRActividad.fecha_inicio" type="date"
                                                       class="form-control" id="inputfechainicioA">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputfechaterminoA">Fecha de Termino</label>
                                                <input required v-model="dataRActividad.fecha_termino" type="date"
                                                       class="form-control" id="inputfechaterminoA">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label>
                                                    <input type="checkbox" v-model="dataRActividad.calificable"> ¿Es calificado?
                                                </label>
                                            </div>

                                            <div class="form-group  col-md-6">
                                                <label>
                                                    <input type="checkbox" v-model="dataRActividad.visible"> ¿Sera visible
                                                    antes de la fecha de inicio?
                                                </label>
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label>
                                                    <input type="checkbox" v-model="dataRActividad.visible_nota"> ¿Sera visible la nota?
                                                </label>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Descripcion Corta</label>
                                                <div id="descripcion-corta-acti">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                    </div>
                                </form>
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
    function eliminarFilActCur(fil) {
        $.ajax({
            type: "POST",
            url: URL+'/ajax/consulta',
            data: {tipo:'delfilfilalundof',file:fil},
            success: function (resp) {
                location.reload();

            }
        });
    }
    <?php
    if (strlen($ruta_rompecabeza)>0){ ?>

        $(document).ready(function () {
            $( "#piezas" ).val(<?=$piezas?>);
            $( "#ayuda" ).val(<?=$ayuda?>);
        })


    <?php   }
    ?>

    function iniciarContruirExamne() {
        $.ajax({
            type: "POST",
            url: URL+'/ajax/consulta',
            data: {tipo:'expl-ex',actividad:$("#actividad_cod").val()},
            success: function (resp) {
                console.log(resp);
                resp=JSON.parse(resp);
                if (resp.res){
                    window.location.href = URL+"/profesores/actividad/quiz/"+resp.questinario;
                }

            }
        });
    }

    function eliminarFile(){
        $.ajax({
            type: "POST",
            url: URL+'/',
            data: data,
            success: function (resp) {
                console.log(resp);
            }
        });

    }
    function guardarRompecabeza(){
        if ($("#imagen-rompeca").val().length>0){
            var fd = new FormData();

            fd.append('file',$("#imagen-rompeca")[0].files[0]);
            fd.append('actividadcurso',$("#actividad_cod").val());
            fd.append('curso',$("#curso_cod").val());
            fd.append('piezas',$("#piezas").val());
            fd.append('ayuda',$("#ayuda").val());
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $('.progress-bar').css('width', percentComplete+'%').attr('aria-valuenow', percentComplete);
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: URL+'/ajax/upload_file_rompeca',
                data: fd,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    console.log('inicio');
                    $(".progress").show();
                    $('.progress-bar').css('width', 0+'%').attr('aria-valuenow', 0);
                },
                error:function(err){
                    swal("Error","No se pudo subir el archivo", 'error');
                    console.log(err);
                },
                success: function(resp){
                    console.log(resp);
                    resp = JSON.parse(resp);
                    if (resp.res){
                        $("#img-rompe-temp").show();
                        $("#img-rompe-temp").attr("href",URL+'/'+resp.ruta);
                        $(".progress").hide();
                        $('#modal_imagen_rompe').modal('hide')
                    }else{
                        swal('Error')
                    }

                }
            });
        }
    }
    $(document).ready(function () {



        $("#imagen-rompeca").change(function() {

        });

        $("#archivo-acti").change(function(){
            if (this.files && this.files[0]){
                var fd = new FormData();

                fd.append('file',$("#archivo-acti")[0].files[0]);
                fd.append('actividadcurso',$("#actividad_cod").val());
                fd.append('curso',$("#curso_cod").val());
                fd.append('org','d');
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                $('.progress-bar').css('width', percentComplete+'%').attr('aria-valuenow', percentComplete);
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: URL+'/ajax/upload_file_activ',
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        console.log('inicio');
                        $(".progress").show();
                        $('.progress-bar').css('width', 0+'%').attr('aria-valuenow', 0);
                    },
                    error:function(err){
                        swal("Error","No se pudo subir el archivo", 'error');
                        console.log(err);
                    },
                    success: function(resp){
                        console.log(resp);
                        resp = JSON.parse(resp);
                        if (resp.res){
                            location.reload();
                            $("#conte_files").append('<li>' +
                                '<a href="'+URL+'/'+resp.ruta+'" target="_blank"><i class="fa fa-circle-o text-red"></i>'+resp.nombre+'</a></li>');
                            $(".progress").hide();
                        }else{
                            swal('Error')
                        }

                    }
                });
                $("#archivo-acti").val("");
            }

        });

        const max = 400;

        $("#editar-descripcion").click(function () {
            $("#editar-descripcion").hide();
            $("#guardar-descripcion").show();
            $("#descripcion-larga").summernote({
                height: 200
            });
        });

        $("#guardar-descripcion").click(function () {
            $("#editar-descripcion").show();
            $("#guardar-descripcion").hide();
            const descripcion = $("#descripcion-larga").summernote('code');
            $("#descripcion-larga").summernote('destroy');
            $.ajax({
                type: "POST",
                url: URL+'/ajax/actividadcurso',
                data: {tipo:'udt-descp',actividad:$("#actividad_cod").val(),descripcion},
                success: function (resp) {
                    console.log(resp)
                    APP.getdata();
                }
            });
        });

        $("#descripcion-corta-acti").summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['math']],
            ],
            placeholder: 'Escriba su mensaje',
            height: 100,
            callbacks: {
                onKeydown: function (e) {
                    var t = e.currentTarget.innerText;
                    if (t.length >= max) {
                        //delete key
                        if (e.keyCode != 8)
                            e.preventDefault();
                        // add other keys ...
                    }
                },
                onKeyup: function (e) {
                    var t = e.currentTarget.innerText;
                    if (typeof callbackMax == 'function') {
                        callbackMax(max - t.length);
                    }
                },
                onPaste: function (e) {
                    var t = e.currentTarget.innerText;
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    var all = t + bufferText;
                    document.execCommand('insertText', false, all.trim().substring(0, 400));
                    if (typeof callbackMax == 'function') {
                        callbackMax(max - t.length);
                    }
                }
            }
        });
    })

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>