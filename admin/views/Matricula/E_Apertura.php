<style>
  .dalto {
    height: 180px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="E_Apertura"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-edit"></i>&nbsp;Editar Apertura</h3>
          </div>
          <form  id="formeMatricula" >
            <input type="hidden" id="bmatri" value="">
          <div class="modal-body dalto">
            <div class="form-group col-xs-12 col-md-12 col-lg-12">
               <label>INSTITUCION:</label>
               <input class="form-control text-uppercase" name="binstid" id="binstid" disabled>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-4">
                <label>F. INICIO:</label>
                <input class="form-control" type="date" style="padding-top:1px;" name="bfinicio" id="bfinicio" required>
              </div>
              <div class="form-group col-xs-12 col-md-12 col-lg-4">
                 <label>F. FIN:</label>
                 <input class="form-control" type="date" style="padding-top:1px;" name="bffin" id="bffin" required>
               </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-4">
                <label>PERIODO:</label>
                 <input class="form-control text-uppercase" name="bperido" id="bperido"  pattern="[0-9 ].{3,}" title="Ingrese solo numeros" required>
              </div>
          </div>
          <div class="modal-footer">
           <div class="col-lg-12">
            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-floppy-saved"></i> Guardar </button>
            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Cerrar</button></form>
          </div></div>
      </div>
  </div>
</div>
