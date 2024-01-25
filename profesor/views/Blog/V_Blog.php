<?php
  include "views/Blog/M_Blog.php";
  include "views/Blog/R_Blog.php";
 ?>

<div class="row">
  <input type="hidden" id="instid" value="<?=$idinst; ?>">
  <input type="hidden" id="profid" value="<?=$idusua; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-edit"></i>&nbsp;BLOG <small>PSICOLOGIA</small> </h2>
        </div>
        <div class="col-lg-6 text-right" >
          <a style="margin-top: 25px;" class="btn btn-success"  id="btnNuevo"><i class="fa fa-plus"></i> Agregar</a>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="col-lg-12 table-responsive">
        <table class="table table-bordered table-hover" id="tableblog">
          <thead>
          <tr class="bg-green-gradient">
            <th class="text-center">#</th>
            <th class="text-center">FECHA</th>
            <th class="text-center">TITULO</th>
            <th class="text-center" width ="70%" >CONTENIDO</th>
            <th class="text-center">ELIMINAR</th>
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
<script type="text/javascript" src="functions/Blog/Blog.js"></script>
