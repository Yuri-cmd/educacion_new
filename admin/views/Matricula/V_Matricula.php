<?php
include "views/Matricula/M_Apertura.php";
include "views/Matricula/E_Apertura.php";

 ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <div class="col-lg-6">
                <h2 ><i class="fa fa-thumb-tack"></i>&nbsp;Matricula</h2>
              </div>
              <div class="col-lg-6 text-right" >
                <a style="margin-top: 25px;" class="btn btn-success" id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>
              </div>
              <div class="col-lg-12"><hr /></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive col-lg-12">
              <table id="tablematri" class="table table-bordered table-hover">
                <thead>
                <tr class="bg-green-gradient">
                  <th class="text-center">#</th>
                  <th class="text-center">INSTITUCION</th>
                  <th class="text-center">FECHA INICIO</th>
                  <th class="text-center">FECHA FIN</th>
                  <th class="text-center">PERIODO</th>
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
<script type="text/javascript" src="functions/Matricula/Matricula.js"></script>
