<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua animate__animated animate__fadeInDown">
      <div class="inner">
        <h3><?='1';?></h3>
        <p><h4><strong>Instituci&oacute;n</strong><h4></p>
      </div>
      <div class="icon">
        <i class="fa fa-building-o" style="color:white"></i>
      </div>
      <a href="index.php?menu=1" class="small-box-footer">M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-purple animate__animated animate__fadeInDown">
      <div class="inner">
        <h3><?=$nprof; ?></h3>
        <p><h4><strong>Profesores</strong><h4></p>
      </div>
      <div class="icon">
        <i class="fa fa-group" style="color:white"></i>
      </div>
      <a href="index.php?menu=10" class="small-box-footer">M&aacute;s informaci&oacute;n  <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow animate__animated animate__fadeInDown">
      <div class="inner">
        <h3><?=$nestu; ?></h3>
        <p><h4><strong>Alumnos</strong><h4></p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add" style="color:white"></i>
      </div>
      <a href="index.php?menu=6" class="small-box-footer">M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red animate__animated animate__fadeInDown">
      <div class="inner">
        <h3><?=$nnil ; ?></h3>
          <p><h4><strong>Niveles Academicos</strong><h4></p>
      </div>
      <div class="icon">
        <i class="fa fa-folder-open-o" style="color:white"></i>
      </div>
      <a href="index.php?menu=2" class="small-box-footer">M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-9 connectedSortable">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2><i class="fa fa-envelope-open-o"></i>&nbsp;Notificaciones <small>Pendientes</small></h2>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-lg-12 table-responsive">
              <table id="tablevdirecta" class="table table-bordered table-hover">
                <thead>
                <tr class="bg-green-gradient">
                  <th class="text-center">FECHA</th>
                  <th class="text-center">REPRESENTANTE</th>
                  <th class="text-center">TELEFONO</th>
                  <th class="text-center">ALUMNO</th>
                  <th class="text-center">ASUNTO</th>
                  <th class="text-center">DETALLES</th>
                </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
              </table>
            </div></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

  </section>
        <section class="col-lg-3 connectedSortable">



           <!-- Calendar -->
         <div class="box box-solid bg-green-gradient animate__animated animate__fadeInUp">
           <div class="box-header">
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
             <div id="calendar" style="width: 100%"></div>
           </div>
         </div>
         <!-- /.box -->
       </section>
  <!-- /.Left col -->
</div>
<!-- /.row (main row) -->
<script type="text/javascript">
$(document).ready(function () {
  $('#tablevdirecta').dataTable();
});

</script>
