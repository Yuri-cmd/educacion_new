<?php include 'modulos/fragment/head.php' ?>
<link rel="stylesheet" href="<?=URL::to('public/css/matricula_register.css')?>">

<?php
    $conexion = (new Conexion())->getConexion();
    $listaDocente = $conexion->query("SELECT 
  perf.*,
  doc.especialidad 
FROM
  perfiles AS perf 
  INNER JOIN docentes AS doc 
    ON perf.perfil_id = doc.id_perfil 
    WHERE doc.id_insti = '{$_SESSION['institucion']}'");
?>

</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include 'modulos/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'modulos/fragment/nav_bar_aside.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profesores
                <small></small>       </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Profesores</a></li>
                <li class="active">registro</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="box">

                <div class="box-header">
                    <div class="col-lg-6">
                        <h2><i class="fa fa-building-o  animate__animated animate__slideInRight "></i>&nbsp;Registro de profesores</h2>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button style="margin-top: 25px;" data-toggle="modal" data-target="#agregar-docente"  class="btn btn-success" id="btnNuevo"><i class="fa fa-plus"></i> Agregar</button>
                    </div>
                    <div class="col-lg-12"><hr></div>
                </div>

                <div class="box-body">

                    <table id="tablevdirecta" class="table table-bordered table-hover">
                        <thead>
                        <tr class="bg-green-gradient">
                            <th class="text-center">COD</th>
                            <th class="text-center">NOMBRES</th>
                            <th class="text-center">APELLIDOS</th>
                            <th class="text-center">ESPECIALIDAD</th>
                            <th class="text-center">TELEFONO</th>
                            <th class="text-center">DIRECCION</th>
                            <th class="text-center">EDITAR</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        foreach ($listaDocente as $doce){   ?>
                            <tr>
                                <td><?=$doce['doc_id']?></td>
                                <td><?=$doce['primer_nombre']." ".$doce['segundo_nombre']?></td>
                                <td><?=$doce['apellido_paterno']." ".$doce['apellido_materno']?></td>
                                <td><?=$doce['especialidad']?></td>
                                <td><?=$doce['telefono_pricipal']?></td>
                                <td><?=$doce['direccion']?></td>
                                <td><button data-toggle="modal" data-target="#agregar-docente" class="btn btn-info"><i class="fa fa-edit"></i></button></td>

                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="modal fade" id="agregar-docente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
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
                                    <input  autocomplete="off"  v-model="listaHijos[posicion].primer_nombre" type="text" class="form-control"  placeholder="Nombre.....">
                                </div>
                                <div class="form-group  col-md-4">
                                    <label for="">Segundo Nombre</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].segundo_nombre" type="text" class="form-control"  placeholder="apellidos....">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Apellido Paterno</label>
                                    <input  autocomplete="off"  v-model="listaHijos[posicion].apellido_paterno" type="text" class="form-control"  placeholder="Nombre.....">
                                </div>
                                <div class="form-group  col-md-4">
                                    <label for="">Apellido Materno</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].apellido_materno" type="text" class="form-control"  placeholder="apellidos....">
                                </div>
                                <div class="form-group  col-md-4">
                                    <label for="">Email</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].email" type="email" class="form-control" placeholder="email.....">
                                </div>

                                <div class="form-group col-md-4  col-lg-2">
                                    <label for="">Genero</label>
                                    <select v-model="listaHijos[posicion].genero"  class="form-control" >
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino</option>
                                    </select>
                                </div>

                                <div class="form-group  col-md-4  col-lg-2">
                                    <label for="">Telefono</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].telefono_pricipal" type="text" class="form-control"  placeholder="000....">
                                </div>

                                <div class="form-group col-md-4   col-lg-2">
                                    <label for="">Tipo Documento</label>
                                    <select v-model="listaHijos[posicion].doc_id" type="text" class="form-control" >
                                        <option value="1">DNI</option>
                                        <option value="2">Pasaporte</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-4  col-lg-4">
                                    <label for="">Nro. Documento</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].doc_numero" type="text" class="form-control"  placeholder="000....">
                                </div>
                                <div class="form-group  col-md-4  col-lg-4">
                                    <label for="">Fecha de nacimiento</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].fecha_nacimiento" type="date" class="form-control"  placeholder="000....">
                                </div>


                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"  data-dismiss="modal">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Editar-alumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h3 class="modal-title" id="exampleModalLongTitle">Datos principales</h3>
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
                                    <input  autocomplete="off"  v-model="listaHijos[posicion].primer_nombre" type="text" class="form-control"  placeholder="Nombre.....">
                                </div>
                                <div class="form-group  col-md-4">
                                    <label for="">Segundo Nombre</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].segundo_nombre" type="text" class="form-control"  placeholder="apellidos....">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Apellido Paterno</label>
                                    <input  autocomplete="off"  v-model="listaHijos[posicion].apellido_paterno" type="text" class="form-control"  placeholder="Nombre.....">
                                </div>
                                <div class="form-group  col-md-4">
                                    <label for="">Apellido Materno</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].apellido_materno" type="text" class="form-control"  placeholder="apellidos....">
                                </div>
                                <div class="form-group  col-md-4">
                                    <label for="">Email</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].email" type="email" class="form-control" placeholder="email.....">
                                </div>

                                <div class="form-group col-md-4  col-lg-2">
                                    <label for="">Genero</label>
                                    <select v-model="listaHijos[posicion].genero"  class="form-control" >
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino</option>
                                    </select>
                                </div>

                                <div class="form-group  col-md-4  col-lg-2">
                                    <label for="">Telefono</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].telefono_pricipal" type="text" class="form-control"  placeholder="000....">
                                </div>

                                <div class="form-group col-md-4   col-lg-2">
                                    <label for="">Tipo Documento</label>
                                    <select v-model="listaHijos[posicion].doc_id" type="text" class="form-control" >
                                        <option value="1">DNI</option>
                                        <option value="2">Pasaporte</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-4  col-lg-4">
                                    <label for="">Nro. Documento</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].doc_numero" type="text" class="form-control"  placeholder="000....">
                                </div>
                                <div class="form-group  col-md-4  col-lg-4">
                                    <label for="">Fecha de nacimiento</label>
                                    <input autocomplete="off" v-model="listaHijos[posicion].fecha_nacimiento" type="date" class="form-control"  placeholder="000....">
                                </div>


                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"  data-dismiss="modal">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
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

    <?php include 'modulos/fragment/footer.php' ?>
</body>
<script>

    $(document).ready(function () {

        const APP = new Vue({

        });

        $('#tablevdirecta').dataTable({
            language: {
                url: URL+'/utils/Spanish.json'
            }
        });
    });

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>

