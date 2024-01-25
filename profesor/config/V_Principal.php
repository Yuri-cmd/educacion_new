<?php

$img_horario="";
$sql="SELECT * FROM  docente_horario WHERE docente_id='{$_SESSION['docente_id']}' AND doh_estado=1 ORDER BY doh_id DESC LIMIT 1";
$result=mysqli_query($con,$sql);

if ($row = mysqli_fetch_assoc($result)){
    $img_horario=$row['doh_archivo'];
}

?>
<!-- Small boxes (Stat box) -->

<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-9 ">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2><i class="fa fa-envelope-open-o"></i>&nbsp;Horario de Clases</h2>
        </div>

      </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (strlen($img_horario)>0){
                    ?>
                    <img src="../images/Institucion/Horarios/<?=$img_horario?>" width="100%" alt="" />

                    <?php
                }
                ?>

              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

  </section>
        <section class="col-lg-3 ">
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
