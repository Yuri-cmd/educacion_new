<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<link  rel="stylesheet"  href="<?= URL::to('public/plugins/Toast/build/jquery.toast.min.css') ?>">

<?php
$conexion = (new Conexion())->getConexion();


$listaAlumnos=[];
?>
<link rel="stylesheet" href="<?= URL::to('public/css/matricula_register.css') ?>">
<style>

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
    <?php include 'funcionalidades/fragment/nav_bar_aside_docente.php' ?>
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
                    <div class="col-md-7">
                        <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                    </div>
                    <div class="col-md-5 text-right">
                        <a href="<?=URL::to('profesores/actividad/'.actividad)?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="padding: 10px;min-height: 527px;">
                        <div class="col-md-12 text-center" style="margin-bottom: 40px">
                            <h2 style="font-weight: bold;">Calificar Tareas</h2>
                            <p>Lista de alumnos matriculados</p>
                        </div>

                        <div class="col-md-12" >



                            <table class="table table-striped table-hover">
                                <thead style="background-color: #00a65a;color: white;">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col"  class="text-center">Nombres</th>
                                    <th scope="col" class="text-center">Apellidos</th>
                                    <th scope="col" class="text-center">Archivo</th>
                                    <th scope="col" class="text-center">Nota</th>
                                    <th scope="col" class="text-center">Guardar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 1;
                                foreach ($listaAlumnos as $item){ ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?=$contador?></th>
                                        <td class="text-center"><?=$item['primer_nombre']." ".$item['segundo_nombre']?></td>
                                        <td class="text-center"><?=$item['apellido_paterno']." ".$item['apellido_materno']?></td>
                                        <td class="text-center">
                                            <?=is_null($item['archivo'])?'<span class="label label-danger">Sin subir archivo</span>':'<a target="_blank" href="'.URL::to('datos/archivos_actividades/'.date('Y').'/'.$contenido['curso_doce_id'].'/'.$item['archivo']).'" >'.$item['nombre_archivo'].'</a>' ?></td>
                                        <td class="text-center"><input id="nota_<?=$contador?>" class="form-control text-center" value="<?=$item['nota']?>" style="max-width: 100px; display: block;margin: auto"></td>
                                        <td class="text-center"><button onclick="guardarNota('<?=Tools::encrypt($item['estu_id'])?>',<?=$contador?>)" class="btn btn-info"><i class="fa fa-save"></i></button></td>
                                    </tr>
                                <?php
                                    $contador++;
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="modal-edit-unidad" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog   modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-green-gradient text-center">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Editar Unidad</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form v-on:submit.prevent="udtUnidad()">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="inputnombreunidad">Nombre Unidad</label>
                                            <input required v-model="dataEUnidad.nombre" type="text"
                                                   class="form-control" id="inputnombreunidad" placeholder="Unidad....">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputfechainicio">Fecha de Inicio</label>
                                            <input required v-model="dataEUnidad.fecha_inicio" type="date"
                                                   class="form-control" id="inputfechainicio">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputfechatermino">Fecha de Termino</label>
                                            <input required v-model="dataEUnidad.fecha_termino" type="date"
                                                   class="form-control" id="inputfechatermino">
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar
                                        </button>
                                    </div>
                                </form>
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


        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

    <div style="display: none" class="conte_flota">
        <div style="width: 100%;overflow: hidden;text-align: center;background-color: #00a65a;color: white">
            <strong><h3>Asistencia en proceso</h3></strong>
        </div>
        <div style="width: 100%;text-align: center;padding-top: 20px">
<p>Detenga la toma de asistencia cuando usted desee</p>
            <button onclick="detenerAsistencia()" type="button" class="btn btn-warning">Detener</button>
        </div>
    </div>
    <!-- ./wrapper -->

    <?php include 'funcionalidades/fragment/footer.php' ?>
    <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
            integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
            crossorigin="anonymous"></script>
    <script src="<?= URL::to('public/plugins/summernote/summernote-lite.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.js"></script>
    <script src="<?= URL::to('public/plugins/Toast/build/jquery.toast.min.js') ?>"></script>
</body>

<script>
    function guardarNota(est,cth){
        const nota = $("#nota_"+cth).val();
        if (nota.length>0){
            $.ajax({
                type: "POST",
                url: URL+"/ajax/consulta",
                data: {tipo:'not_ru',nota,est,activ:$("#curso_cod").val()},
                success: function (resp) {
                    console.log(resp);
                    resp = JSON.parse(resp)
                    if (resp.res){
                        $.toast({
                            heading: 'BIEN',
                            text: 'Guardado',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: '2500',
                        });
                    }else{
                        $.toast({
                            heading: 'ERROR',
                            text: 'No se pudo guardar',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: '2500',
                        });
                    }
                }
            });

        }else{
            swal("Escriva una nota para guardar");
        }
    }
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
            dataEUnidad: {
                unidad: '',
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
            udtUnidad(){
                var dataE = {...this.dataEUnidad};
                dataE.tipo = 'udt-unid';

                $.ajax({
                    type: "POST",
                    url: URL + '/ajax/unidadcurso',
                    data: dataE,
                    success: function (resp) {
                        console.log(resp);
                        $('#modal-edit-unidad').modal('toggle');
                        APP.getdata();
                    }
                });
            },
            editarUnidad(unidad){
                const und = this.unidades[unidad];
                this.dataEUnidad= {
                    unidad: und.unidad_id,
                        nombre: und.nombre_unidad,
                        fecha_inicio: und.fecha_inicio,
                        fecha_termino: und.fecha_final
                }
            },
            eliminarUnidad(unidad){
                $.ajax({
                    type: "POST",
                    url: URL + '/ajax/unidadcurso',
                    data: {tipo: 'del-unid',  unidad},
                    success: function (resp) {
                        console.log(resp);
                        APP.getdata();
                    }
                });

            },
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
                $.ajax({
                    type: "POST",
                    url: URL + '/ajax/unidadcurso',
                    data: {tipo: 'datos', curso: $("#curso_cod").val()},
                    success: function (resp) {
                        console.log(resp);
                        resp = JSON.parse(resp)
                        console.log(resp);
                        APP._data.unidades = resp
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


    });
    var asistencia=-1;
    function verificarTomaAsistencia() {
        $.ajax({
            type: "POST",
            url: URL + '/ajax/unidadcurso',
            data: {tipo:'miasistecia2',curso:$("#curso_cod").val()},
            success: function (resp) {
                console.log(resp);
                resp = JSON.parse(resp);
                if (resp.res){
                    asistencia  = resp.asitencia
                    $(".conte_flota").show();
                }
            }
        });


    }

    function tomarAsistencia(acti) {
        $.ajax({
            type: "POST",
            url: URL + '/ajax/unidadcurso',
            data: {tipo:'asistenc',acti},
            success: function (resp) {
                console.log(resp);
                resp=JSON.parse(resp);
                asistencia = resp.acist
                $(".conte_flota").show();
            }
        });

    }
    function detenerAsistencia() {
        $.ajax({
            type: "POST",
            url: URL + '/ajax/unidadcurso',
            data: {tipo:'asistencDet',asistencia},
            success: function (resp) {
                console.log(resp);
                asistencia = -1
                $(".conte_flota").hide();
            }
        });

    }
    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>