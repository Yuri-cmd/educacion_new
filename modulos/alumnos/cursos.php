<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<?php
$conexion = (new Conexion())->getConexion();


$sql = "SELECT
  cur.curso_id,
  cur.id_insti,
  cur.nombre,
  cur_do.descripcion,
  cur_do.logo,
  cur.nivel_academico_id,
  cur.grado_academico
FROM cursos AS cur JOIN curso_docente AS cur_do ON cur.curso_id= cur_do.curso_id WHERE cur_do.curso_doce_id = '" . curso_id . "';";

$res_curso = null;
if ($res_curso = $conexion->query($sql)->fetch_assoc()) {
//Tools::prettyPrint($res_curso);
} else {
    header("Location:  " . URL::to($_SESSION['ruta_usuario']));
}
$listaTipoActividad = $conexion->query("SELECT  * FROM tipo_actividad
WHERE estado = '1';");
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
<input type="hidden" value="<?= curso_id ?>" id="curso_cod">
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
                    <div class="col-md-7">
                        <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                    </div>
                    <div class="col-md-5 text-right">
                        <a href="<?=URL::to('alumno/cursos')?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="padding: 10px;min-height: 527px;">
                        <div class="col-md-12 text-center" style="margin-bottom: 40px">
                            <h2 style="font-weight: bold;"><?= $res_curso['nombre'] ?></h2>
                        </div>
                        <div class="col-md-12">
                            <img style="max-width: 100%;max-height: 200px;display: block;margin: auto;"
                                 src="<?= URL::to('datos/iconos/'.$res_curso['logo'])?>">
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <?= $res_curso['descripcion'] ?>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <h2> Contenido del curso</h2>
                        </div>
                        <br>
                        <br>

                        <div class="col-md-12">

                        </div>

                        <div v-for="(item, index) in  unidades" class="col-md-12">
                            <span style="font-size: 30px; font-weight: bold">{{item.nombre_unidad}}: </span><span
                                    style="font-size: 20px">{{getDataformat(item.fecha_inicio,false)}} - {{getDataformat(item.fecha_final,false)}} </span>
                            <div class="col-md-12">

                                <ul class="timeline timeline-inverse">

                                    <li v-for="(item_c, index_c) in item.clases"
                                        :class="item_c.tipo_l==0?'time-label':''">
                                        <span v-if="item_c.tipo_l==0" class="bg-red">
                                          {{getDataformat(item_c.fecha,true)}}
                                        </span>

                                        <i v-if="item_c.tipo_l!=0" :class="item_c.tipo_l==1?'fa fa-envelope bg-blue':getIconoActividad(item_c.tipo_act)"></i>

                                        <div v-if="item_c.tipo_l!=0" class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3  v-if="item_c.tipo_l==1" class="timeline-header"><a href="#">Clase: </a> <strong>{{item_c.nombre}}</strong>
                                            <h3 v-if="item_c.tipo_l==2"  class="timeline-header"><a href="#">{{item_c.actividad_tipo}}: </a> <strong>{{item_c.nombre}}</strong>

                                            </h3>

                                            <div class="timeline-body" v-html="item_c.descripcion">
                                                {{item_c.descripcion}}
                                            </div>
                                            <div v-if="item_c.tipo_l==2" class="timeline-footer">
                                                <a :href="'<?=URL::to('alumno/actividad')?>/'+item_c.acti_cod" class="btn btn-primary btn-xs">Ver {{item_c.actividad_tipo}}</a>
                                            </div>
                                            <div v-if="item_c.tipo_l==3" class="timeline-footer">
                                                <a  :href="'<?= URL::to('alumno/actividad')?>/'+item_c.acti_cod"  class="btn btn-primary btn-xs">Ver {{item_c.actividad_tipo}}</a>
                                            </div>
                                                <div v-if="item_c.tipo_l==4" class="timeline-footer">
                                                    <a  :href="'<?= URL::to('alumno/actividad')?>/'+item_c.acti_cod"  class="btn btn-primary btn-xs">Ver {{item_c.actividad_tipo}}</a>
                                                </div>
                                            <div v-if="item_c.tipo_l==1" class="timeline-footer">
                                                <a :href="'<?= URL::to('alumno/clase/')?>/'+item_c.clase_cod"  class="btn btn-primary btn-xs">Ver Clase</a>
                                            </div>
                                        </div>

                                    </li>


                                    <!-- END timeline item -->
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div id="modal-registro-unidad" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog   modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-green-gradient text-center">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Nueva Unidad</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form v-on:submit.prevent="agregarUnidad()">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="inputnombreunidad">Nombre Unidad</label>
                                            <input required v-model="dataRUnidad.nombre" type="text"
                                                   class="form-control" id="inputnombreunidad" placeholder="Unidad....">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputfechainicio">Fecha de Inicio</label>
                                            <input required v-model="dataRUnidad.fecha_inicio" type="date"
                                                   class="form-control" id="inputfechainicio">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputfechatermino">Fecha de Termino</label>
                                            <input required v-model="dataRUnidad.fecha_termino" type="date"
                                                   class="form-control" id="inputfechatermino">
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
                    <div id="modal-registro-clase" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-green-gradient text-center">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Nueva Clase</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form v-on:submit.prevent="guardarClase()">
                                    <div class="modal-body">
                                        <div class="form-group text-center">
                                            <label>Para agregar contenido de la clase, como archivos o una descripción
                                                más grande, cree la clase y después entre para agregar el contenido de
                                                la clase</label>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputnombreunidadC">Nombre de la Clase</label>
                                            <input required v-model="dataRClase.nombre" type="text" class="form-control"
                                                   id="inputnombreunidadC" placeholder="Unidad....">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputfechainicioC">Fecha de Inicio</label>
                                            <input required v-model="dataRClase.fecha_inicio" type="date"
                                                   class="form-control" id="inputfechainicioC">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputfechaterminoC">Fecha de Termino</label>
                                            <input required v-model="dataRClase.fecha_termino" type="date"
                                                   class="form-control" id="inputfechaterminoC">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputfechaterminoC">
                                                <input type="checkbox" v-model="dataRClase.visible"> Sera visible antes
                                                de la fecha de inicio?
                                            </label>

                                        </div>
                                        <div class="form-group">
                                            <label>Descripcion Corta</label>
                                            <div id="descripcion-corta">

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
    const APP = new Vue({
        el: '#conten-primary',
        data: {
            unidad_actual: '',
            clase_cod: '',
            dataRUnidad: {
                nombre: '',
                fecha_inicio: '',
                fecha_termino: ''
            },
            dataRClase: {
                nombre: '',
                fecha_inicio: '',
                fecha_termino: '',
                visible: false
            },
            dataRActividad: {
                tipoa_:'',
                nombre: '',
                fecha_inicio: '',
                fecha_termino: '',
                visible: false,
                visible_nota: false,
                calificable: false,
            },
            unidades: []
        },
        methods: {
            eliminarClase(clase){
                swal({
                    title: "¿Desea Esta Clase?",
                    text: "Si elimina la clase, se perderá la información de las actividades",
                    icon: "warning",
                    dangerMode: false,
                    buttons: ["NO", "SI"],
                })
                    .then((ressss) => {
                        console.log(ressss);
                        if (ressss){
                            $.ajax({
                                type: "POST",
                                url:  URL + '/ajax/clasecurso',
                                data: {tipo:'delete',clase},
                                success: function (resp) {
                                    console.log(resp)
                                    APP.getdata();
                                }
                            });

                        }})
            },
            eliminarActividad(actividad){
                swal({
                    title: "¿Desea Esta Clase?",
                    text: "Si elimina la clase, se perderá la información de las actividades",
                    icon: "warning",
                    dangerMode: false,
                    buttons: ["NO", "SI"],
                })
                    .then((ressss) => {
                        console.log(ressss);
                        if (ressss){
                            $.ajax({
                                type: "POST",
                                url: URL+'/ajax/actividadcurso',
                                data: {tipo:'delet',actividad},
                                success: function (resp) {
                                    console.log(resp)
                                    APP.getdata();
                                }
                            });
                        }})
            },
            getIconoActividad(tipo){
                if (tipo==1){
                    return "fa fa-tasks bg-aqua";
                }else if (tipo==2){
                    return "fa fa-books bg-yellow";
                }else if (tipo==3){
                    return "fa fa-books bg-yellow";
                }else if (tipo==4){
                    return "fa fa-forumbee bg-green";
                }else{
                    return "";
                }
            },
            guardarActividad(){
                var datos = {...this.dataRActividad}
                datos.visible = datos.visible ? '1' : '0';
                datos.visible_nota = datos.visible_nota ? '1' : '0';
                datos.calificable = datos.calificable ? '1' : '0';
                datos.descripcionCorta = $("#descripcion-corta-acti").summernote('code');
                datos.curso = $("#curso_cod").val();
                datos.clase = this.clase_cod
                datos.tipo = 're-acti'

                $.ajax({
                    type: "POST",
                    url: URL+'/ajax/actividadcurso',
                    data: datos,
                    success: function (resp) {
                        console.log(resp);
                        APP.getdata();
                        $('#modal-registro-actividad').modal('toggle')
                    }
                });

            },
            guardarClase() {
                var datos = {...this.dataRClase}
                datos.visible = datos.visible ? '1' : '0';
                datos.descripcionCorta = $("#descripcion-corta").summernote('code');
                datos.curso = $("#curso_cod").val();
                datos.tipo = 're-clase'
                datos.unidad = this.unidad_actual
                $.ajax({
                    type: "POST",
                    url: URL + '/ajax/clasecurso',
                    data: datos,
                    success: function (resp) {
                        console.log(resp);
                        resp = JSON.parse(resp)
                        if (resp.res) {
                            $('#modal-registro-clase').modal('toggle')
                            APP.getdata();
                        } else {
                            swal("Error", 'No se pudo registrar', 'error');
                        }
                    }
                });
            },
            setClaseR(clase) {
                this.clase_cod = clase;
            },
            renderElemt(dom) {
                return Vue.component(dom);
            },
            setUnidad(unidad) {
                this.unidad_actual = unidad
            },
            getDataformat(fecha, escorta) {
                const date = new Date(fecha);
               // console.log(date.getDate() + " " + formatoFechaView(date.getMonth(), escorta) + " " + date.getFullYear());
                return date.getDate() + " " + formatoFechaMes(date.getMonth(), escorta) + " " + date.getFullYear();
            },
            getdata() {
                $("#loader-menor").show()
                $.ajax({
                    type: "POST",
                    url: URL + '/ajax/unidadcurso',
                    data: {tipo: 'datos', curso: $("#curso_cod").val()},
                    success: function (resp) {
                        console.log(resp);
                        resp = JSON.parse(resp)
                        console.log(resp);
                        APP._data.unidades = resp
                        $("#loader-menor").hide()
                    }
                });
            },
            agregarUnidad() {
                var datos = {...this.dataRUnidad}
                datos.tipo = 're-unidad';
                datos.curso = $("#curso_cod").val();
                $.ajax({
                    type: "POST",
                    url: URL + '/ajax/unidadcurso',
                    data: datos,
                    success: function (resp) {
                        console.log(resp);
                        resp = JSON.parse(resp)
                        if (resp.res) {
                            APP._data.dataRUnidad = {
                                nombre: '',
                                fecha_inicio: '',
                                fecha_termino: ''
                            }
                            APP.getdata();
                            $('#modal-registro-unidad').modal('toggle')
                        } else {
                            swal("Error", 'No se pudo registrar', 'error');
                        }
                    }
                });

            }
        }
    });
    $(document).ready(function () {
        APP.getdata();
        const max = 400;
        $("#descripcion-corta").summernote({
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

    var asistencia='';
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
    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }

    $(document).ready(function () {
        setTimeout(function () {
            verificarTomaAsistencia()
        },800);
    })
</script>
</html>