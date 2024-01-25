<?php
  include "views/Galeria/M_Galeria.php";
  include "views/Galeria/E_Galeria.php";
 ?>

<div class="row">
  <input type="hidden" id="instid" value="<?=$idinst; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-image"></i>&nbsp;Galeria de Imagenes</h2>
        </div>
        <div class="col-lg-6 text-right" >
          <a style="margin-top: 25px;" class="btn btn-success"  id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->

      <div class="box-body">
        <div class="col-lg-12 table-responsive">
        <!--  <div class="alert alert-info bg-blue-gradient">
            <strong>NOTA:</strong> La resoluci&oacute;n de los Banner es de 1920 px de ancho y 390 px de alto.
          </div> -->
        <table class="table table-bordered table-hover" id="tablebanner">
          <thead>
          <tr class="bg-green-gradient">
            <th class="text-center">#</th>
            <th class="text-center">NOMBRE</th>
            <th class="text-center">POSICION</th>
            <th class="text-center">EDITAR</th>
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
<script type="text/javascript" src="functions/Galeria/Galeria.js"></script>
