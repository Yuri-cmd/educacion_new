<?php
//include "views/Grado/M_Nivel.php";
include "views/Grados/E_Grado.php";

 ?>
<div class="row"  id="principal">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-mortar-board"></i>&nbsp;Grados</h2>
        </div>
        <div class="col-lg-6 text-right" >
          <!--<a style="margin-top: 25px;" class="btn btn-success" id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>-->
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive col-lg-12">
        <table id="tablegrado" class="table table-bordered table-hover">
          <thead>
          <tr class="bg-green-gradient">
            <th class="text-center">#</th>
            <th class="text-center">NIVEL ACADEMICO</th>
            <th class="text-center">GRADO</th>
            <th class="text-center">ABREVIATURA</th>
            <th class="text-center"></th>
            <th class="text-center">CURSOS</th>
            <th class="text-center">EDITAR</th>
          </tr>
          </thead>
          <tbody class="text-center"></tbody>
        </table>
      </div></div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<div id="opciones"></div>
<script type="text/javascript" src="functions/Grados/Grados.js?v=2"></script>
