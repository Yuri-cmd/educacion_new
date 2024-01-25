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

$nota_visible =  $contenidoActividad['nota_visible']==1;

$sql =" SELECT * FROM nota_actividad_estudiante WHERE  id_actividad = '$idActividad' AND id_estudiante = '{$_SESSION['estudiante_id']}'";

$nota = 0;
$calificado_ac = false;
if ($row_nota = $conexion->query($sql)->fetch_assoc()){
    $calificado_ac = true;
    $nota = $row_nota['nota'];
}

$sql = "SELECT * FROM archivos_actividad WHERE id_actividad = '$idActividad' and origen = 'd' ";


$res_archivos = $conexion->query($sql);
//Tools::prettyPrint($contenidoActividad);
$subioArchivo = false;
$miarchivo=[];
$sql = "SELECT * FROM archivos_actividad WHERE id_actividad = '$idActividad' AND estudiante='{$_SESSION['estudiante_id']}'";
foreach ($conexion->query($sql) as $rowcs){
    $miarchivo[]=$rowcs;
    $subioArchivo = true;
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
<input type="hidden" value="<?= $contenidoActividad['id_curso'] ?>" id="curso_cod">
<input type="hidden" value="<?= actividad_id ?>" id="actividad_cod">
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
        <section class="content">

            <!-- Default box  visited -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="<?=URL::to('alumno/cursos/'.$contenidoActividad['id_curso'])?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="">
                        <div class="col-md-12 text-center" style="margin-bottom: 40px">
                            <h2 style="font-weight: bold;"><?=$contenidoActividad['nombre_activid']?></h2>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="" style="margin-bottom: 10px">
                                </div>
                                <div id="descripcion-larga">
                                    <?=$contenidoActividad['descripcion_larga']?>

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
                                    <div class="box-header with-border"  style="color: white;background-color: #00a65a;">
                                        <h3 class="box-title">Archivos del Docente</h3>
                                        <div class="box-tools">
                                        </div>
                                    </div>
                                    <div class="box-body no-padding" style="">
                                        <ul class="nav nav-pills nav-stacked" id="conte_files">
                                            <?php
                                            foreach ($res_archivos as $res_arc) {
                                               echo '<li style="">
                                                        <a style="" href="'.URL::to("datos/archivos_actividades/".date('Y')."/".$contenidoActividad['id_curso'].'/'.$res_arc['archivo'] ).'" target="_blank"><i class="fa fa-circle-o text-red"></i>' .$res_arc['nombre_archivo'] .'</a>
                                                        
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
                                        //echo date("Y-m-d H:i:00",time())."<br>";
                                        //echo $contenidoActividad['fecha_cierre']."<br>";
                                       // var_dump($contenidoActividad);
                                        if ($contenidoActividad['id_tipo_activada']==2){
                                            $sql ="SELECT 
                                                      ex_in.* 
                                                    FROM
                                                      cuestionario AS cues 
                                                      JOIN examen_iniciado AS ex_in 
                                                        ON cues.cuestionario_id = ex_in.id_cuestio 
                                                        WHERE cues.id_actividad = '$idActividad' and id_estudiante='{$_SESSION['estudiante_id']}' ";
                                            //echo $sql;
                                            $estado = false;
                                            if ($ro_res = $conexion->query($sql)->fetch_assoc()){
                                                $estado = $ro_res['estado']==1;
                                            }
                                            if (!$estado){
                                                $a=strtotime(date("Y-m-d H:i:00",time()));
                                                $b=strtotime($contenidoActividad['fecha_cierre']);

                                                if ($a>$b){
                                                    echo '<span class="btn btn-warning">Examen Cerrado</span>';
                                                }else{
                                                    echo '<span onclick="iniciarExamne()" class="btn btn-info">Resolver Examen</span>';
                                                }


                                            }else{
                                                $a=strtotime(date("Y-m-d H:i:00",time()));
                                                $b=strtotime($contenidoActividad['fecha_cierre']);
                                                if ($a>$b){
                                                    echo '<span   class="btn btn-info">Examen Entregado - Tiempo finalizado</span>';
                                                }else{
                                                    echo '<span   class="btn btn-info">Examen Entregado</span>';
                                                }

                                            }

                                        }elseif ($contenidoActividad['id_tipo_activada']==5){
                                        if (!$subioArchivo){
                                            $a=strtotime(date("Y-m-d H:i:00",time()));
                                            $b=strtotime($contenidoActividad['fecha_cierre']);
                                            if ($a>$b){
                                                echo '<button class="btn btn-warning" >Actividad finalizado</button>';
                                            }else{
                                                echo '<a class="btn btn-info" href="'.URL::to('alumno/dibujo/'.actividad_id).'">Ir a Dibujar</a>';
                                            }

                                        }else{

                                        }

                                        }elseif ($contenidoActividad['id_tipo_activada']==6){
                                            $sql = "SELECT * FROM alumno_rompecabeza WHERE id_activiidad = '$idActividad';";
                                            if ($ro_res = $conexion->query($sql)->fetch_assoc()){
                                                echo '<h3>Rompecabeza Armada</h3>';
                                            }else{
                                                echo '<a class="btn btn-info" href="'.URL::to('alumno/rompecabeza/'.actividad_id).'">Armar Rompecabeza</a>';
                                            }

                                        }else{
                                            $a=strtotime(date("Y-m-d H:i:00",time()));
                                            $b=strtotime($contenidoActividad['fecha_cierre']);
                                            if ($a>$b){
                                                ?>
                                               <button class="btn btn-warning" >Actividad finalizado</button>
                                                <?php
                                            }else{
                                                ?>

                                                <input type="file" style="display: none" id="file_tar">
                                                <span onclick="$('#file_tar').click()" class="btn btn-info">Subir Archivo</span>
                                                <?php
                                            }


                                        }
                                        ?>

                                    </div>
                                    <div class="col-md-112 text-center" id="contenedor-mifichero">
                                        <?php


                                        if ($subioArchivo){
                                            //var_dump($miarchivo);
                                            foreach ($miarchivo as $arch){
                                            ?>

                                            <div style="margin-bottom: 10px;margin-top: 10px">
                                                <a target="_blank" href="<?=URL::to('datos/archivos_actividades/'.date('Y').'/'.$contenidoActividad['id_curso'].'/'.$arch['archivo'])?>"><?=$arch['nombre_archivo']?></a>
                                                <button type="button" onclick="deleteFileAlumDesd(<?=$arch['archiv_actividad_id']?>)" class="btn btn-danger btn-xs "><i class="fa fa-times"></i></button>
                                            </div>
                                        <?php   }}


                                        ?>

                                    </div>
                                    <div class="col-md-12 text-center" style="    border-top: 1px solid #0000001c;">
                                        <?php
                                        if ($calificado_ac){
                                            if ($nota_visible){
                                                echo '<h4><strong>Calificacion: </strong> <a href="#">'.$nota.'</a></h4>';
                                            }else{
                                                echo '<h4><strong>Calificacion: </strong> <a href="#">Calificado</a></h4>';
                                            }
                                        }else{
                                           echo '<h4><strong>Calificacion: </strong> <a href="#"> Sin Calificar</a></h4>';
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>



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

        <div style="display: none" class="conte_flota">
            <div style="width: 100%;overflow: hidden;text-align: center;background-color: #00a65a;color: white">
                <strong><h3>Toma de Asistencia</h3></strong>
            </div>
            <div style="width: 100%;text-align: center;padding-top: 20px">
                <p>Por favor verifique su asistencia</p>
                <button onclick="presente()" type="button" class="btn btn-warning"><i class="fa fa-hand"></i> Presente</button>
            </div>
        </div>


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

    function iniciarExamne() {
        $.ajax({
            type: "POST",
            url: URL+'/ajax/consulta',
            data: {tipo:'ver-exa',actividad:$("#actividad_cod").val()},
            success: function (resp) {
                console.log(resp);
                resp=JSON.parse(resp);
                if (resp.res){
                    window.location.href = URL+"/alumno/cuestionario/"+resp.questinario;
                }

            }
        });
    }
    function deleteFileAlumDesd(file){
        console.log(file);
        $.ajax({
            type: "POST",
            url: URL+'/ajax/consulta',
            data: {tipo:"delfilfilalundof",file},
            success: function (resp) {
                console.log(resp);
                location.reload();
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

    var asistencia='';
    var tempo=true;
    function verificarTomaAsistencia() {
        $.ajax({
            type: "POST",
            url: URL + '/ajax/unidadcurso',
            data: {tipo:'miasistecia',curso:$("#curso_cod").val()},
            success: function (resp) {
                console.log(resp);
                resp = JSON.parse(resp);
                if (resp.res){
                    asistencia = resp.asitencia
                    $(".conte_flota").show();

                }else{
                    asistencia = '';
                    $(".conte_flota").hide();
                }
                setTimeout(function () {
                    verificarTomaAsistencia()
                },800);
            }
        });


    }

    function presente() {
        $.ajax({
            type: "POST",
            url: URL + '/ajax/unidadcurso',
            data: {tipo:'regmiasistecia',asistencia},
            success: function (resp) {
                console.log(resp);
                resp = JSON.parse(resp);
                if (resp.res){
                    $(".conte_flota").hide();
                }else{

                }
            }
        });


    }

    $(document).ready(function () {
        setTimeout(function () {
            verificarTomaAsistencia()
        },800);
        $("#file_tar").change(function(){
            if (this.files && this.files[0]){
                var fd = new FormData();

                fd.append('file',$("#file_tar")[0].files[0]);
                fd.append('actividadcurso',$("#actividad_cod").val());
                fd.append('curso',$("#curso_cod").val());
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
                    url: URL+'/ajax/upload_file_mi_activ',
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
                            //$("#contenedor-mifichero").empty();
                            $("#contenedor-mifichero").html($("#contenedor-mifichero").html()+'<div style="margin-bottom: 10px;margin-top: 10px">\n'+
'                                                <a target="_blank" href="'+URL+'/'+resp.ruta+'">'+resp.nombre+'</a> \n'+
'                                            </div>')

                            /*$("#conte_files").append('<li>' +
                                '<a href="'+URL+'/'+resp.ruta+'" target="_blank"><i class="fa fa-circle-o text-red"></i>'+resp.nombre+'</a></li>');*/
                            $(".progress").hide();
                            location.reload();
                        }else{
                            swal('Error')
                        }

                    }
                });
                $("#file_tar").val("");
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