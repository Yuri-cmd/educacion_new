<?php include 'funcionalidades/fragment/head.php' ?>
<?php require 'vendor/autoload.php'; ?>
<link rel="stylesheet" href="<?= URL::to('public/css/matricula_register.css') ?>">
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link rel="stylesheet" href="<?= URL::to('public/plugins/jquery-ui-1.12.1/jquery-ui.css') ?>">
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

    .clickek:hover {
        cursor: pointer;
    }

    .tableasistencia_wrapper {
        width: 100%;
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
                    Asistencia
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Asistencia</a></li>
                    <li class="active">mis cursos</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row" id="principal">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header ">
                                <div class="col-lg-6">
                                    <h2><i class="fa fa-group"></i>&nbsp;Asistencia</h2>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <!-- <a style="margin-top: 25px;" class="btn btn-success" id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a> -->
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de Usuario</label>
                                    <select class="form-control" name="tipo" id="tipo">
                                        <option value="---">--Elegir--</option>
                                        <option value="1">Alumnos</option>
                                        <option value="2">Docentes</option>
                                    </select>
                                    <label for="staticEmail" class="col-sm-2 col-form-label labelPlanilla">Tipo de Docente</label>
                                    <select class="form-control" name="planilla" id="planilla">
                                        <option value="---">--Elegir--</option>
                                        <option value="1">Planilla</option>
                                        <option value="2">No planilla</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <hr />
                                </div>
                                <div class="col-lg-4">
                                    <form action="<?php echo URL::to('usuarios_asistencia_exc.php') ?>" method="POST" style="display: flex;">
                                        <input type="text" id="tipo_usuario" name="tipo_usuario" hidden>
                                        <input type="text" id="tipo_planilla" name="tipo_planilla" hidden>
                                        <select class="form-control" name="mes_descarga" id="mes_descarga">
                                            <option value="---">--Elegir--</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                        <button type="submit" class="btn btn-success">Descargar Excel</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover" id="tableprofe">
                                        <thead>
                                            <tr class="bg-green-gradient">
                                                <th class="text-center">#</th>
                                                <th class="text-center">DNI</th>
                                                <th class="text-center">NOMBRES</th>
                                                <th class="text-center">APELLIDOS</th>
                                                <th class="text-center">ASISTENCIA</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                        </tbody>
                                    </table>
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
        <div class="modal fade" id="asistenciaUsuarioModal" tabindex="-1" aria-labelledby="asistenciaUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="asistenciaUsuarioModalLabel">Asistencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="idusuario" hidden>
                        <input type="text" id="tipousuario" hidden>
                        <input type="text" id="data" hidden>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div class="col-lg-6">
                                <!-- <a style="margin-top: 25px;" class="btn btn-success" id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a> -->
                                <select class="form-control" name="mesAsistencia" id="mesAsistencia">
                                    <option value="---">--Elegir--</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div style="display: flex; justify-content: end; width: 100%;">
                                <a href="" type="button" id="excel" class="btn btn-success">Descargar Excel</a>
                            </div>
                            <table class="table table-bordered table-hover" id="tableasistencia">
                                <thead>
                                    <tr class="bg-green-gradient">
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Turno</th>
                                        <th class="text-center">Entrada</th>
                                        <th class="text-center">Salida</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'funcionalidades/fragment/footer.php' ?>
        <style>
            #tableasistencia_wrapper {
                width: 100%;
            }
        </style>
        <script src="<?= URL::to('public/plugins/summernote/summernote-lite.js') ?>"></script>
        <script src="<?= URL::to('public/plugins/jquery-ui-1.12.1/jquery-ui.js') ?>"></script>
</body>
<script>
    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
    $("#planilla").hide();
    $(".labelPlanilla").hide();
    $('#tableasistencia').DataTable({
        buttons: [
            'excel'
        ]
    });
    $('#tipo').on('change', function() {
        let tipo = $(this).val();
        $("#tipo_usuario").val(tipo);
        $("#planilla").hide();
        $(".labelPlanilla").hide();
        if (tipo == 2) {
            $("#planilla").show();
            $(".labelPlanilla").show();
        }
        createDatatable(tipo)
    });

    $('#planilla').on('change', function() {
        let planilla = $(this).val();
        $("#tipo_planilla").val(planilla);
        createDatatable(2, planilla)
    });

    function createDatatable(tipo, planilla = null) {
        $.ajax({
            type: "POST",
            url: URL + "/ajax/save_asistencia",
            data: {
                'opcion': 'get_all_asistencia',
                'tipo': tipo,
                'planilla': planilla
            },
            success: function(response) {
                let data = JSON.parse(response);

                // Limpiar la tabla antes de agregar nuevos datos
                $('#tableprofe tbody').empty();

                // Iterar sobre los datos recibidos y agregarlos a la tabla
                $.each(data, function(index, row) {
                    $('#tableprofe tbody').append('<tr><td>' + row.contador + '</td><td>' + row.doc_numero + '</td><td>' + row.nombre + '</td><td>' + row.apellido + '</td><td><button class="btn-open-modal btn btn-success" data-user-id="' + row.id_usuario + '" data-tipo="' + tipo + '"><i class="fa fa-eye"></i></button></td></tr>');
                });

                // Inicializar el DataTable después de haber agregado los datos y los botones
                $('#tableprofe').DataTable({
                    destroy: true, // Destruye cualquier instancia previa de DataTable antes de inicializar una nueva
                    data: data, // Utiliza los datos recibidos del servidor
                    columns: [ // Define las columnas de la tabla
                        {
                            data: 'contador'
                        },
                        {
                            data: 'doc_numero'
                        },
                        {
                            data: 'nombre'
                        },
                        {
                            data: 'apellido'
                        },
                        {
                            data: 'id_usuario'
                        } // Campo de datos correspondiente al ID de usuario
                    ],
                    columnDefs: [ // Personalizar la columna del botón
                        {
                            targets: 4, // Índice de la columna del botón
                            render: function(data, type, row) {
                                return '<button class="btn-open-modal btn btn-success" data-user-id="' + data + '" data-tipo="' + tipo + '"><i class="fa fa-eye"></i></button>';
                            }
                        }
                    ],
                    layout: {
                        topStart: {
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                        }
                    }
                });
            }
        });
    }

    // Manejar el clic en el botón para abrir el modal
    $('#tableprofe').on('click', '.btn-open-modal', function() {
        let userId = $(this).data('user-id');
        let tipo = $(this).data('tipo');
        $("#idusuario").val(userId);
        $("#tipousuario").val(tipo);
        $('#asistenciaUsuarioModal').modal('show')
    });

    $('#mesAsistencia').on('change', function() {
        let idusuario = $("#idusuario").val();
        let tipo = $("#tipousuario").val();
        let mes = $(this).val();
        $.ajax({
            type: "POST",
            url: URL + "/ajax/save_asistencia",
            data: {
                'opcion': 'get_asistencia_usuario',
                'tipo': tipo,
                'idusuario': idusuario,
                'mes': mes
            },
            success: function(response) {
                // Convertir la respuesta JSON a un objeto JavaScript
                let datos = JSON.parse(response);
                if (datos !== null) {
                    $('#excel').attr('href', URL + "/usuario_asistencia_exc.php?data=" + response);
                } else {
                    $('#excel').attr('href', "#");
                }
                // Seleccionar el cuerpo de la tabla
                let tbody = $('#tableasistencia tbody');

                // Limpiar el contenido actual de la tabla
                tbody.empty();

                // Iterar sobre los datos agrupados por día
                $.each(datos, function(fecha, asistencias) {
                    // Crear un array para almacenar las horas de entrada y salida
                    let entradas = [];
                    let salidas = [];

                    // Iterar sobre las asistencias de ese día
                    $.each(asistencias, function(index, asistencia) {
                        // Agregar la hora de asistencia al array correspondiente
                        if (asistencia.tipo === 'entrada') {
                            entradas.push(asistencia.hora);
                        } else {
                            salidas.push(asistencia.hora);
                        }
                    });

                    // Obtener la primera hora de entrada y la última hora de salida
                    let entrada = entradas.length > 0 ? entradas[0] : '';
                    let salida = salidas.length > 0 ? salidas[salidas.length - 1] : '';

                    // Construir la fila de la tabla
                    let fila = $('<tr>').append(
                        $('<td>').text(fecha),
                        $('<td>').text(asistencias[0].turno),
                        $('<td>').text(entrada),
                        $('<td>').text(salida)
                    );
                    // $('#data').val(response);
                    // Agregar la fila al cuerpo de la tabla
                    tbody.append(fila);
                });

            }
        });
    });
</script>

</html>