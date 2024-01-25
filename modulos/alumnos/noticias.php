<?php include 'funcionalidades/fragment/head.php' ?>
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
    .content-box-curso{
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
    <?php include 'funcionalidades/fragment/nav_bar_aside_alumnos.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cursos
                <small></small>       </h1>
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
                                <h2><i class="fa fa-edit"></i>&nbsp;Noticias</h2>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a style="margin-top: 25px;" class="btn btn-success" id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>
                            </div>
                            <div class="col-lg-12"><hr></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-lg-12 table-responsive">
                                <div id="tablegaleria_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="tablegaleria_length"><label>Show <select name="tablegaleria_length" aria-controls="tablegaleria" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="tablegaleria_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="tablegaleria"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered table-hover no-footer dataTable" id="tablegaleria" role="grid" aria-describedby="tablegaleria_info" style="">
                                                <thead>
                                                <tr class="bg-green-gradient" role="row"><th class="text-center sorting_asc" tabindex="0" aria-controls="tablegaleria" rowspan="1" colspan="1" aria-label="#: activate to sort column descending" style="width: 127px;" aria-sort="ascending">#</th><th class="text-center sorting" tabindex="0" aria-controls="tablegaleria" rowspan="1" colspan="1" aria-label="TITULO: activate to sort column ascending" style="width: 279px;">TITULO</th><th class="text-center sorting" tabindex="0" aria-controls="tablegaleria" rowspan="1" colspan="1" aria-label="CONTENIDO: activate to sort column ascending" style="width: 397px;">CONTENIDO</th><th class="text-center sorting" tabindex="0" aria-controls="tablegaleria" rowspan="1" colspan="1" aria-label="FECHA: activate to sort column ascending" style="width: 273px;">FECHA</th><th class="text-center sorting" tabindex="0" aria-controls="tablegaleria" rowspan="1" colspan="1" aria-label="ELIMINAR: activate to sort column ascending" style="width: 338px;">ELIMINAR</th></tr>
                                                </thead>
                                                <tbody class="text-center"><tr role="row" class="odd"><td class="sorting_1">2</td><td>PRUEBA DE NOTICIA</td><td>DETALLE DE LA NOTICIA</td><td>17/02/2021</td><td><button class="btn btn-danger btn-sm glyphicon glyphicon-remove btnElim"></button></td></tr></tbody>
                                            </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="tablegaleria_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="tablegaleria_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="tablegaleria_previous"><a href="#" aria-controls="tablegaleria" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="tablegaleria" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="tablegaleria_next"><a href="#" aria-controls="tablegaleria" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div></div>
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

    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>