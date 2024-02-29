<?php include 'funcionalidades/fragment/head.php' ?>
<?php
$conexion = (new Conexion())->getConexion();
$data = $conexion->query("SELECT * FROM matriculas WHERE id_contacto = '{$_SESSION['usuario_padre_apoderado']}'");
$id = "";
foreach ($data as $d) {
    $id = $d["id_estudiante"];
}
?>
<link rel="stylesheet" href="<?= URL::to('public/css/matricula_register.css') ?>">
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link rel="stylesheet" href="<?= URL::to('public/plugins/jquery-ui-1.12.1/jquery-ui.css') ?>">
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css' rel='stylesheet' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js'></script>
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
</style>
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <?php include 'funcionalidades/fragment/header.php' ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include 'funcionalidades/fragment/nav_bar_aside_supervisor.php' ?>
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
                    <li class="active">mis asistencias</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div id='calendario'></div>
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
        <script src="<?= URL::to('public/plugins/jquery-ui-1.12.1/jquery-ui.js') ?>"></script>
</body>
<script>
    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }

    $(document).ready(function() {
        $.ajax({
            url: '<?= URL::base() ?>/ajax/get_asistencia',
            method: 'POST',
            data: {
                id: <?= $id ?>,
                'opcion': 'get_asistencia'
            },
            success: function(response) {
                var data = JSON.parse(response);
                var eventos = [];
                data.forEach(function(asistencia) {
                    let asistio = asistencia.estado ? 'Asistio' : 'Falto';
                    eventos.push({
                        title: 'Asistencia: ' + asistio,
                        start: asistencia.fecha
                    });
                });
                $('#calendario').fullCalendar({
                    defaultView: 'month',
                    events: eventos
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los datos de asistencia:', error);
            }
        });
    });
</script>

</html>