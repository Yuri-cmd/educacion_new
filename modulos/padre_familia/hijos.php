<?php include 'funcionalidades/fragment/head.php' ?>
<?php
    $conexion = (new Conexion())->getConexion();





?>
<link rel="stylesheet" href="<?=URL::to('public/css/matricula_register.css')?>">
<style>
    .contenedor-curso{
        border-radius: 10px;
        border: 1px solid rgba(4, 133, 34, 0.76);
        overflow: hidden;
        padding: 5px;
        background-color: #00a65a;
    }
    .contenedor-curso:hover{
        cursor: pointer;

        -webkit-box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
        box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
    }
    .widget-user:hover{
        cursor: pointer;

        -webkit-box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
        box-shadow: 3px 1px 25px 0px rgba(0,0,0,0.75);
    }
    .content-box-curso{
        height: 200px;
        background-color: beige;
        border-radius: 5px;
    }
    .color-pri{
        background-color: #00a65a;
        color: white;
    }
    .color-pri2{
        background-color: #00c0ef;
        color: white;
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
    <div class="content-wrapper" style="min-height: 850px;min-height: 850px;height: 93vh;overflow: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cursos
                <small></small>       </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Hijos</a></li>
                <li class="active">mis cursos</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12" id="contenenn">

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
var hijo_sl=0;
    $(document).ready(function () {
        getHijos();
    })
    function getLibretaCurso(curso) {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/ajax/frag_all",
            data: {part:'libreta_nota_curso',curso,hijo:hijo_sl},
            success: function (resp) {
                $("#contenenn").html(resp);
                $("#loader-menor").hide();
            }
        });

    }

    function verNotaHijo(hijo) {
        hijo_sl = hijo;
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/ajax/consulta",
            data: {tipo:'consulta-bloq'},
            success: function (resp) {
                resp = JSON.parse(resp);
                if (resp.res){
                    swal("Alerta","Acceso no permitido comuniquese con la Institucion","warning");
                    $("#loader-menor").hide();
                }else{
                    $.ajax({
                        type: "POST",
                        url: URL+"/ajax/frag_all",
                        data: {part:'nota_libreta',hijo},
                        success: function (dom) {
                            $("#contenenn").html(dom);
                            $("#loader-menor").hide();
                        }
                    });


                }

            }
        });
    }

    function getHijos() {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/ajax/frag_all",
            data: {part:'hijos'},
            success: function (resp) {
                $("#contenenn").html(resp);
                $("#loader-menor").hide();
            }
        });

    }
    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>