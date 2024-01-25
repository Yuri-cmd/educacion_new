<?php include 'funcionalidades/fragment/head.php' ?>

<?php
$conexion =  (new Conexion())->getConexion();

$sql ="SELECT * FROM mis_medios WHERE usuario = '{$_SESSION['usuario']}'";
$listaMedios = $conexion->query($sql);

?>
<link rel="stylesheet" href="<?= URL::to('public/css/matricula_register.css') ?>">
<style>
    .info-box {
        border: 1px solid #00000033;
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
    <?php include 'funcionalidades/fragment/nav_bar_aside_alumnos.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 572px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Panel de control</small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Principal</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header ">
                            <div class="col-lg-6">
                                <h2><i class="fa fa-image"></i>Mis Medios</h2>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button onclick="$('#file_inp').click()" type="button" class="btn btn-success" id="btnNuevo"><i
                                            class="fa fa-plus"></i> Agregar</button>
                                <input type="file" style="display:none;" id="file_inp">
                            </div>
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="progress" style="display: none" id="progress-i">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="col-lg-12 table-responsive">
                                <!--  <div class="alert alert-info bg-blue-gradient">
                                    <strong>NOTA:</strong> La resoluci&oacute;n de los Banner es de 1920 px de ancho y 390 px de alto.
                                  </div> -->
                                <div id="tablebanner_wrapper"
                                     class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="table_" class="table table-bordered table-hover no-footer dataTable" >
                                                <thead  class="text-center">
                                                <tr  >
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">NOMBRE</th>

                                                    <th class="text-center">TIPO</th>
                                                    <th class="text-center" >VER</th>
                                                    <th class="text-center">ELIMINAR</th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                <?php
                                                $contador = 1;
                                                foreach ($listaMedios as $medio){  ?>
                                                    <tr >
                                                        <td><?=$contador?></td>
                                                        <td><a target="_blank" href="<?=URL::to('datos/medios/'.$_SESSION['usuario'].'/'.$medio['ruta']) ?>"><?=$medio['nombre']?></a></td>
                                                        <td><?=$medio['tipo']?></td>
                                                        <td>
                                                            <a  target="_blank" href="<?=URL::to('datos/medios/'.$_SESSION['usuario'].'/'.$medio['ruta']) ?>" class="btn btn-info btn-sm fa fa-eye"></a>
                                                        </td>

                                                        <td>
                                                            <button onclick="eliminar('<?=Tools::encrypt($medio['id_medio'])?>')" class="btn btn-danger btn-sm fa fa-times"></button>
                                                        </td>
                                                    </tr>
                                                <?php $contador++; }
                                                ?>

                                                </tbody>
                                            </table>
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
    function  eliminar(medio){
        $.ajax({
            type: "POST",
            url: URL+"/ajax/consulta",
            data: {tipo:'medio-del',medio},
            success: function (trdp) {
             console.log(trdp)
                location.reload();
            }
        });

    }
    $(document).ready(function () {
        $('#table_').DataTable();

        $("#file_inp").change(function() {
            var fd = new FormData();

            fd.append('file',$("#file_inp")[0].files[0]);
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
                url: URL+'/ajax/upload_file_medios',
                data: fd,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    console.log('inicio');
                    $("#progress-i").show();
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
                    }else{
                        swal('Error')
                    }
                    setTimeout(function () {
                        $("#progress-i").hide();
                    },500)

                }
            });
        });
    })
    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
