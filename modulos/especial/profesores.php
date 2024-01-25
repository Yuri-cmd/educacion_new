<?php include 'funcionalidades/fragment/head.php' ?>
<?php
$conexion = (new Conexion())->getConexion();
$listaDocente = $conexion->query("SELECT 
  perf.*,
  doc.docente_id,
  doc.especialidad 
FROM
  perfiles AS perf 
  INNER JOIN docentes AS doc 
    ON perf.perfil_id = doc.id_perfil 
    WHERE doc.id_insti = '{$_SESSION['institucion']}'");

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
</style>
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_admin.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;">
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

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header ">
                            <div class="col-lg-6">
                                <h2><i class="fa fa-edit"></i>Profesores</h2>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="javascript:void(0)" style="margin-top: 25px;" data-toggle="modal" data-target="#agregar-docente" class="btn btn-success" id="btnNuevo"><i
                                            class="fa fa-plus"></i> Agregar</a>
                            </div>
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" id="contenedor">
                            <div class="col-lg-12 table-responsive">
                                <div id="tablegaleria_wrapper"
                                     class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <table class="table table-bordered table-hover no-footer dataTable"
                                           id="tableprofesores" role="grid" aria-describedby="tablegaleria_info"
                                           style="">
                                        <thead>
                                        <tr class="bg-green-gradient" role="row">
                                            <th class="text-center sorting_asc" tabindex="0"
                                                aria-controls="tablegaleria" rowspan="1" colspan="1"
                                                style="width: 127px;" aria-sort="ascending">#
                                            </th>
                                            <th class="text-center sorting" tabindex="0"
                                                aria-controls="tablegaleria" rowspan="1" colspan="1"
                                                style="width: 279px;">NOMBRES
                                            </th>
                                            <th class="text-center sorting" tabindex="0"
                                                aria-controls="tablegaleria" rowspan="1" colspan="1"
                                                style="width: 397px;">APELLIDOS
                                            </th>
                                            <th class="text-center sorting" tabindex="0"
                                                aria-controls="tablegaleria" rowspan="1" colspan="1"
                                                style="width: 273px;">ESPECIALIDAD
                                            </th>
                                            <th class="text-center sorting" tabindex="0"
                                                aria-controls="tablegaleria" rowspan="1" colspan="1"
                                                style="width: 273px;">TELEFONO
                                            </th>
                                            <th class="text-center sorting" tabindex="0"
                                                aria-controls="tablegaleria" rowspan="1" colspan="1"
                                                style="width: 338px;">ELIMINAR
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                        foreach ($listaDocente as $doce){ ?>
                                            <tr>
                                                <td><?=$doce['docente_id']?></td>
                                                <td><?=$doce['primer_nombre']." ".$doce['segundo_nombre']?></td>
                                                <td><?=$doce['apellido_paterno']." ".$doce['apellido_materno']?></td>
                                                <td><?=$doce['especialidad']?></td>
                                                <td><?=$doce['telefono_pricipal']?></td>
                                                <td><button class="btn btn-danger"><i class="fa fa-times"></i></button></td>

                                            </tr>
                                        <?php  }
                                        ?>

                                        </tbody>
                                    </table>


                                </div>
                            </div>

                            <div class="modal fade" id="agregar-docente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center bg-green-gradient">
                                            <h3 class="modal-title" id="exampleModalLongTitle">Datos del Docente</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group ">
                                                <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                              <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                Datos Personales
                              </span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Primer Nombre</label>
                                                    <input  autocomplete="off"  v-model="datar.primer_nombre" type="text" class="form-control"  placeholder="Nombre.....">
                                                </div>
                                                <div class="form-group  col-md-4">
                                                    <label for="">Segundo Nombre</label>
                                                    <input autocomplete="off" v-model="datar.segundo_nombre" type="text" class="form-control"  placeholder="apellidos....">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Apellido Paterno</label>
                                                    <input  autocomplete="off"  v-model="datar.apellido_paterno" type="text" class="form-control"  placeholder="Nombre.....">
                                                </div>
                                                <div class="form-group  col-md-4">
                                                    <label for="">Apellido Materno</label>
                                                    <input autocomplete="off" v-model="datar.apellido_materno" type="text" class="form-control"  placeholder="apellidos....">
                                                </div>
                                                <div class="form-group  col-md-4">
                                                    <label for="">Email</label>
                                                    <input autocomplete="off" v-model="datar.email" type="email" class="form-control" placeholder="email.....">
                                                </div>

                                                <div class="form-group col-md-4  col-lg-2">
                                                    <label for="">Genero</label>
                                                    <select v-model="datar.genero"  class="form-control" >
                                                        <option value="m">Masculino</option>
                                                        <option value="f">Femenino</option>
                                                    </select>
                                                </div>

                                                <div class="form-group  col-md-4  col-lg-2">
                                                    <label for="">Telefono</label>
                                                    <input autocomplete="off" v-model="datar.telefono_pricipal" type="text" class="form-control"  placeholder="000....">
                                                </div>
                                                <div class="form-group  col-md-4">
                                                    <label for="">Especialidad</label>
                                                    <input autocomplete="off" v-model="datar.especialidad" type="text" class="form-control"  placeholder="apellidos....">
                                                </div>

                                                <div class="form-group col-md-4   col-lg-3">
                                                    <label for="">Tipo Documento</label>
                                                    <select v-model="datar.doc_id" type="text" class="form-control" >
                                                        <option value="1">DNI</option>
                                                        <option value="2">Pasaporte</option>
                                                    </select>
                                                </div>
                                                <div class="form-group  col-md-4  col-lg-4">
                                                    <label for="">Nro. Documento</label>
                                                    <input autocomplete="off" v-model="datar.doc_numero" type="text" class="form-control"  placeholder="000....">
                                                </div>
                                                <div class="form-group  col-md-4  col-lg-4">
                                                    <label for="">Fecha de nacimiento</label>
                                                    <input autocomplete="off" v-model="datar.fecha_nacimiento" type="date" class="form-control"  placeholder="000....">
                                                </div>


                                            </div>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button v-on:click="registrarDocente()" type="button" class="btn btn-primary"  data-dismiss="modal">Guardar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

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
<script>
    var tabla ;
        $(document).ready(function () {
        tabla = $("#tableprofesores").dataTable();

        const APP = new Vue({
            el:"#contenedor",
            data:{
                datar:{
                    primer_nombre:'',
                    segundo_nombre:'',
                    apellido_paterno:'',
                    apellido_materno:'',
                    email:'',
                    genero:'',
                    telefono_pricipal:'',
                    doc_id:'',
                    doc_numero:'',
                    fecha_nacimiento:'',
                    especialidad:'',

                }
            },
            methods:{

                registrarDocente(){
                    const data = {
                        tipo:'reg-doc',
                        data:JSON.stringify(APP._data.datar)
                    }
                    $.ajax({
                        type: "POST",
                        url: URL+'/ajax/consulta',
                        data: data,
                        success: function (resp) {
                            console.log(resp)
                            resp= JSON.parse(resp)
                            if (resp.res){
                                location.reload();
                            }
                        }
                    });

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