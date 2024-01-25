<?php
include "views/Seccion/M_Seccion.php";
include "views/Seccion/E_Seccion.php";

 ?>
      <div class="row"  id="principal">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <div class="col-lg-6">
                <h2 ><i class="fa fa-sitemap"></i>&nbsp;Secciones</h2>
              </div>
              <div class="col-lg-6 text-right" >
                <a style="margin-top: 25px;" class="btn btn-success" id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>
              </div>
              <div class="col-lg-12"><hr /></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive col-lg-12">
              <table id="tablesecci" class="table table-bordered table-hover">
                <thead>
                <tr class="bg-green-gradient">
                  <th class="text-center">#</th>
                  <th class="text-center">NIVEL EDUCATIVO</th>
                  <th class="text-center">GRADO</th>
                  <th class="text-center">SECCION</th>
                  <th class="text-center">CANT. ALUMNOS</th>
                  <th class="text-center"></th>
                  <th class="text-center">EDITAR</th>
                  <th class="text-center">HORARIOS</th>
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
<script type="text/javascript" src="functions/Seccion/Seccion.js"></script>
