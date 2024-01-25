<?php include 'funcionalidades/fragment/head.php' ?>
<?php
$conexion = (new Conexion())->getConexion();

$usuario = $_SESSION['usuario'];

$sql ="SELECT count(*) as 'cnt_msg' FROM mensaje_usuarion WHERE id_usuario = '$usuario' AND estado = '0'";

$contador_newMen = 0;

if ($row_s = $conexion->query($sql)->fetch_assoc()){
    $contador_newMen = $row_s['cnt_msg'];
}

$sql ="SELECT * FROM mensaje_usuarion WHERE id_usuario = '$usuario' AND estado = '0'";
$listamensajes = $conexion->query($sql);

$sql ="SELECT * FROM institucion_blog where insti_id='{$_SESSION['institucion']}'  ORDER BY blo_fecha DESC";

$lista_post = $conexion->query($sql);
?>
<link rel="stylesheet" href="<?=URL::to('public/css/matricula_register.css')?>">
<style>
    .info-box{
        border: 1px solid  #00000033;
    }
</style>
<style>
    .info-box{
        border: 1px solid  #00000033;
    }
    .box-post-edu{
        padding: 10px;
        border: 1px solid #C9C9C9;
    }
    .box-post-body{
        height: 99px;
        text-align: justify;
    }
    .box-post-edu:hover{
        cursor: pointer;
        -webkit-box-shadow: 0px -1px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px -1px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px -1px 5px 0px rgba(0,0,0,0.75);
    }
    .truncate-overflow {
        --max-lines: 3;
        position: relative;
        overflow: hidden;
        padding-right: 1rem; /* space for ellipsis */
    }
    .truncate-overflow::before {
        position: absolute;
        content: "...";
        inset-block-end: 0; /* "bottom" */
        inset-inline-end: 0; /* "right" */
    }
    .truncate-overflow::after {
        content: "";
        position: absolute;
        inset-inline-end: 0; /* "right" */
        width: 1rem;
        height: 1rem;
        background: white;
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
    <div class="content-wrapper" style="min-height: 572px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Panel de control</small>       </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Principal</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua animate__animated animate__fadeInDown">
                        <div class="inner">
                            <h3><?=$contador_newMen?></h3>
                            <p></p><h4><strong>Notificaciones</strong></h4><h4><p></p>
                            </h4></div>
                        <div class="icon">
                            <i class="fa fa-flag-o" style="color:white"></i>
                        </div>
                        <a href="<?=URL::to('supervisor/mensajes')?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple animate__animated animate__fadeInDown">
                        <div class="inner">
                            <h3>0</h3>
                            <p></p><h4><strong>Familiares</strong></h4><h4><p></p>
                            </h4></div>
                        <div class="icon">
                            <i class="fa fa-group" style="color:white"></i>
                        </div>
                        <a href="<?=URL::to('supervisor/familiar')?>" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow animate__animated animate__fadeInDown">
                        <div class="inner">
                            <h3>2</h3>
                            <p></p><h4><strong>Hijos</strong></h4><h4><p></p>
                            </h4></div>
                        <div class="icon">
                            <i class="ion ion-person-add" style="color:white"></i>
                        </div>
                        <a href="<?=URL::to('supervisor/hijos')?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red animate__animated animate__fadeInDown">
                        <div class="inner">
                            <h3>3</h3>
                            <p></p><h4><strong>Niveles Academicos</strong></h4><h4><p></p>
                            </h4></div>
                        <div class="icon">
                            <i class="fa fa-folder-open-o" style="color:white"></i>
                        </div>
                        <a href="javascript:void(0)" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-9 connectedSortable ui-sortable">
                    <div class="box box-success">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <div class="col-lg-6">
                                <h2><i class="fa fa-envelope-open-o"></i>&nbsp;Notificaciones <small> </small></h2>
                            </div>
                            <div class="col-lg-12"><hr></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="overflow: auto;max-height: 250px;">
                            <?php
                            foreach ($listamensajes as $mens){ ?>
                                <a href="<?=URL::to('alumno/mensajes')?>"><div class="callout callout-success">
                                        <h4><?=$mens['asunto']?></h4>

                                        <p style="height: 57px;" class="truncate-overflow"><?=Tools::onlyTextNoHtml($mens['mensaje'])?></p>
                                    </div></a>
                            <?php   }
                            ?>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </section>
                <section class="col-lg-3 connectedSortable ui-sortable">



                    <!-- Calendar -->
                    <div class="box box-solid bg-green-gradient animate__animated animate__fadeInUp">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="fa fa-calendar"></i>
                            <h3 class="box-title">Calendario</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn bg-green btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- tools box -->
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style=""><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">February 2021</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1612051200000">31</td><td class="day" data-date="1612137600000">1</td><td class="day" data-date="1612224000000">2</td><td class="day" data-date="1612310400000">3</td><td class="day" data-date="1612396800000">4</td><td class="day" data-date="1612483200000">5</td><td class="day" data-date="1612569600000">6</td></tr><tr><td class="day" data-date="1612656000000">7</td><td class="day" data-date="1612742400000">8</td><td class="day" data-date="1612828800000">9</td><td class="day" data-date="1612915200000">10</td><td class="day" data-date="1613001600000">11</td><td class="day" data-date="1613088000000">12</td><td class="day" data-date="1613174400000">13</td></tr><tr><td class="day" data-date="1613260800000">14</td><td class="day" data-date="1613347200000">15</td><td class="day" data-date="1613433600000">16</td><td class="day" data-date="1613520000000">17</td><td class="day" data-date="1613606400000">18</td><td class="day" data-date="1613692800000">19</td><td class="day" data-date="1613779200000">20</td></tr><tr><td class="day" data-date="1613865600000">21</td><td class="day" data-date="1613952000000">22</td><td class="day" data-date="1614038400000">23</td><td class="day" data-date="1614124800000">24</td><td class="day" data-date="1614211200000">25</td><td class="day" data-date="1614297600000">26</td><td class="day" data-date="1614384000000">27</td></tr><tr><td class="day" data-date="1614470400000">28</td><td class="new day" data-date="1614556800000">1</td><td class="new day" data-date="1614643200000">2</td><td class="new day" data-date="1614729600000">3</td><td class="new day" data-date="1614816000000">4</td><td class="new day" data-date="1614902400000">5</td><td class="new day" data-date="1614988800000">6</td></tr><tr><td class="new day" data-date="1615075200000">7</td><td class="new day" data-date="1615161600000">8</td><td class="new day" data-date="1615248000000">9</td><td class="new day" data-date="1615334400000">10</td><td class="new day" data-date="1615420800000">11</td><td class="new day" data-date="1615507200000">12</td><td class="new day" data-date="1615593600000">13</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2021</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month focused">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2020-2029</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2019</span><span class="year">2020</span><span class="year focused">2021</span><span class="year">2022</span><span class="year">2023</span><span class="year">2024</span><span class="year">2025</span><span class="year">2026</span><span class="year">2027</span><span class="year">2028</span><span class="year">2029</span><span class="year new">2030</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade">2010</span><span class="decade focused">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
                        </div>
                    </div>
                    <!-- /.box -->
                </section>
                <section id="blog-psicologia" class="col-lg-12 connectedSortable ui-sortable">
                    <div class="box box-success">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <div class="col-lg-6">
                                <h2><i class="fa fa-envelope-open-o"></i>&nbsp;Blog Psicologico <small> </small></h2>
                            </div>
                            <div class="col-lg-12"><hr></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            foreach ($lista_post as $post){  ?>
                                <div class="col-md-6">
                                    <div class="box-post-edu" onclick="view_post('<?=Tools::encrypt($post['blo_id'])?>')">
                                        <div class="box-post-img">
                                            <img style="max-height: 198px;display: block;margin: auto" src="https://ichef.bbci.co.uk/news/640/cpsprodpb/420E/production/_108101961_gettyimages-1050228748.jpg">
                                        </div>
                                        <div class="box-post-title">
                                            <h3><strong><?=$post['blo_titulo']?></strong></h3>
                                        </div>
                                        <div class="box-post-info">
                                            <span style="font-weight: bold;color: #8e8e8e;">Publicado el: <?=Tools::formatoFechaVisual($post['blo_fecha'])?></span>
                                        </div>
                                        <div class="box-post-body truncate-overflow">
                                            <?=Tools::onlyTextNoHtml($post['blo_contenido'])?>
                                        </div>
                                        <span style="    color: #100ad8;">Click para leer mas</span>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
            <script type="text/javascript">
                function view_post(post){
                    location.href =URL+"/supervisor/post/"+post
                }

                $(document).ready(function () {
                    $('#tablevdirecta').dataTable();
                });

            </script>
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