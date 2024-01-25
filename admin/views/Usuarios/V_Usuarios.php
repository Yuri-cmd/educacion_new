<?php
  include "views/Usuarios/M_Usuario.php";
  include "views/Usuarios/E_Usuario.php";
  include "views/Usuarios/M_Bloquea.php";
 ?>
    <div class="row">
       <input type="hidden" id="instid" value="<?=$idinst; ?>">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header ">
              <div class="col-lg-6">
                <h2 ><i class="fa fa-group"></i>&nbsp;Usuarios</h2>
              </div>
              <div class="col-lg-6 text-right" >
                <a style="margin-top: 25px;" class="btn btn-success"  id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>
              </div>
              <div class="col-lg-12"><hr /></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-lg-12 table-responsive">
              <table class="table table-bordered table-hover" id="tableusuarios">
                <thead>
                <tr class="bg-green-gradient">
                  <th class="text-center">#</th>
                  <th class="text-center">DNI / RUC</th>
                  <th class="text-center">NOMBRES Y APELLIDOS</th>
                  <th class="text-center">EMAIL</th>
                  <th class="text-center">USUARIO</th>
                  <th class="text-center">TIPO</th>
                    <th class="text-center"></th>
                  <th class="text-center">EDITAR</th>

                <!--   <th class="text-center">BLOQUEAR</th>-->
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
<script type="text/javascript" src="functions/Usuarios/Usuarios.js?v=2"></script>
