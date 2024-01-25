<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<?php
$conexion = (new Conexion())->getConexion();

$sql = "SELECT * FROM matricula_aperturas WHERE id_inst = '{$_SESSION['institucion']}'  ORDER BY anio DESC";

$lista_aper = $conexion->query($sql);
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
<input type="hidden" value="" id="curso_cod">
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_admin.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;height: 93vh;overflow: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cursos
                <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Matricula</a></li>
                <li class="active">mis cursos</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="container-fluid">
            <div class="box" style="overflow: hidden;
    padding: 5px;">
                <label class="col-md-2">Periodo de matricula</label>
                <div class=" col-md-4">
                    <select class="form-control" id="sel-op-perio">
                        <?php
                        $isRec=true;
                        $anio='';
                        $aper='';
                        foreach ($lista_aper as $item){
                            if ($isRec){
                                $anio=$item['anio'];
                                $aper=$item['matr_id'];
                            }
                            $isRec= false;
                            echo '<option value="'.$item['matr_id'].'-'.$item['anio'].'">Periodo '.$item['anio'].'</option>';
                        }
                        ?>

                    </select>
                    <input type="hidden" value="<?=$anio?>" id="periodo">
                    <input type="hidden" value="<?=$aper?>" id="apertura">
                </div>
            </div>
        </section>
        <section class="content">

            <!-- Default box  visited -->
            <div class="box">

                <div id="cont-reg-adm">

                </div>
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

    $(document).ready(function () {

        getListaNiveles();
        $( "#sel-op-perio" ).change(function() {
            const sw = $( this ).val().split('-');
            console.log(sw)
            $("#periodo").val(sw[1])
            $("#apertura").val(sw[0])
            getListaNiveles();
        });
    });
    function eiminarEstuDessd(estu) {
        console.log(estu);
        $.ajax({
            type: "POST",
            url: URL+"/ajax/consulta",
            data: {tipo:'delestumatri',estu},
            success: function (resp){
                console.log(resp);
                getlistaMatriculados($("#nivel-id").val())
            }
        });
    }

    function getFormulario() {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/ajax/adm_frag",
            data: {cont:'from-matr',nvl:$("#nivel-id").val()},
            success: function (resp){
                console.log(resp);
                $("#cont-reg-adm").html(resp);
                $("#loader-menor").hide();
            }
        });
    }
    function getEditarEstudiate(estu){
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url:URL+"/ajax/adm_frag",
            data:{cont:'from-matr-edt',estud:estu,nvl:$("#nivel-id").val()},
            success:function (resp){
                console.log(resp);
                $("#loader-menor").hide();
                $("#cont-reg-adm").html(resp);
            }
        })
    }
    function getlistaMatriculados(nivel) {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/ajax/adm_frag",
            data: {cont:'matriculados',nvl:nivel,periodo:$("#periodo").val()},
            success: function (resp){
                console.log(resp);
                $("#cont-reg-adm").html(resp);
                $("#loader-menor").hide();
            }
        });
    }

    function getListaNiveles() {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/ajax/adm_frag",
            data: {cont:'niveles',periodo:$("#periodo").val()},
            success: function (resp){
                console.log(resp);
                $("#cont-reg-adm").html(resp);
                $("#loader-menor").hide();
            }
        });
    }



</script>
</html>