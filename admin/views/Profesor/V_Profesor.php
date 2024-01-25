<?php
 include "views/Profesor/M_Profesor.php";
 include "views/Profesor/E_Profesor.php";
 ?>

<div class="row" id="principal">
  <input type="hidden" id="instid" value="<?=$idinst; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-group"></i>&nbsp;Profesor</h2>
        </div>
        <div class="col-lg-6 text-right" >
          <a style="margin-top: 25px;" class="btn btn-success"  id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="col-lg-12 table-responsive">
        <table class="table table-bordered table-hover" id="tableprofe">
          <thead>
          <tr class="bg-green-gradient">
            <th class="text-center">#</th>
            <th class="text-center">DNI</th>
            <th class="text-center">NOMBRES</th>
            <th class="text-center">APELLIDOS</th>
            <th class="text-center">F. NACIMIENTO</th>
            <th class="text-center">TELEFONO</th>
            <th class="text-center">DIRECCION</th>
            <th class="text-center">ESPECIALIDAD</th>
            <th class="text-center">EDITAR</th>
            <th class="text-center">ASIGNAR</th>
            <th class="text-center">HORARIO</th>
          </tr>
          </thead>
          <tbody class="text-center"></tbody>
        </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<div id="opciones"></div>
<script type="text/javascript" src="functions/Profesor/Profesor.js"></script>
