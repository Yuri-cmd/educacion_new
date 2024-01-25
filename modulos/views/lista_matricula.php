<?= include "modulos/fragment/head.php" ?>
</head>

<body class=" layout-fluid">

<div class="preloader">
    <div class="sk-chase">
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
    </div>

    <!-- <div class="sk-bounce">
<div class="sk-bounce-dot"></div>
<div class="sk-bounce-dot"></div>
</div> -->

    <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
</div>

<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">

    <!-- Header -->

    <?= include "modulos/fragment/nav_bar.php" ?>

    <!-- // END Header -->

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push
             data-responsive-width="992px"
             class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <h1 class="h2">Dashboard</h1>


                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 text-right">
                                <a href="<?=URL::to('matriculas/registro')?>" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
                            </div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center text-negrita">COD</th>
                                    <th class="text-center text-negrita">Institucion Educativa</th>
                                    <th class="text-center text-negrita">Periodo</th>
                                    <th class="text-center text-negrita">Fecha Inicio</th>
                                    <th class="text-center text-negrita">Fecha de Cierre</th>
                                    <th class="text-center text-negrita">Estado</th>
                                    <th class="text-center text-negrita">Opciones</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>


                </div>

            </div>


            <?= include "modulos/fragment/nav_bar_aside.php" ?>

        </div>



    </div>
</div>

<?= include "modulos/fragment/footer.php" ?>

</body>
<script>

    console.log(URL+'utils/Spanish.json');
    $(document).ready(function() {

        $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "sAjaxSource": URL+"/admin/sever_matri/data_list?insti="+$("#institucion").val(),
            order: [[ 0, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel'
            ],
             columnDefs: [
                 {
                     "targets": 0,
                     "data": "",
                     "render": function (data, type, row, meta) {

                         return '<span style="display: block;margin: auto;text-align: center;">'+row[0]+'</span>';

                     }
                 },
                 {
                     "targets": 1,
                     "data": "",
                     "render": function (data, type, row, meta) {

                         return '<span style="display: block;margin: auto;text-align: center;">'+row[1]+'</span>';

                     }
                 },
                 {
                     "targets": 2,
                     "data": "",
                     "render": function (data, type, row, meta) {

                         return '<span style="display: block;margin: auto;text-align: center;">'+row[2]+'</span>';

                     }
                 },
                 {
                     "targets": 3,
                     "data": "",
                     "render": function (data, type, row, meta) {

                         return '<span style="display: block;margin: auto;text-align: center;">'+formatoFechaView(row[3])+'</span>';

                     }
                 },
                 {
                     "targets": 4,
                     "data": "",
                     "render": function (data, type, row, meta) {
                         return '<span style="display: block;margin: auto;text-align: center;">'+formatoFechaView(row[4])+'</span>';

                     }
                 },
                 {
                     "targets": 5,
                     "data": "",
                     "render": function (data, type, row, meta) {
                         var etiqueta ='';
                         if (row[5]==1){
                             etiqueta = '<span style="display: block;margin: auto;text-align: center;" class="badge badge-pill badge-primary">ABIERTO</span>';
                         }else{
                             etiqueta = '<span style="display: block;margin: auto;text-align: center;" class="badge badge-pill badge-danger">CERRADO</span>';
                         }

                         return etiqueta;
                        // return '<span style="display: block;margin: auto;text-align: center;">'+row[6]+'</span>';

                     }
                 },{
                     "targets": 6,
                     "data": "",
                     "render": function (data, type, row, meta) {

                         return '<button style="display: block;margin: auto;text-align: center;" type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>';
                         // return '<span style="display: block;margin: auto;text-align: center;">'+row[6]+'</span>';

                     }
                 },
             ],
            language: {
                url: URL+'/utils/Spanish.json'
            }
        });

    } );
</script>
</html>
