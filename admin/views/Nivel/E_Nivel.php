<style>
  .dalt11o {
    height: 90px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="E_Nivel"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-edit"></i>&nbsp;Editar Nivel</h3>
          </div>

          <div class="modal-body dalt11o">
            <form  id="formeNivel" >
              <input type="hidden" id="idnil" value="">
              <div class="form-group col-xs-12 col-md-12 col-lg-12">
                 <label>NOMBRE:</label>
                 <input class="form-control text-uppercase" name="nilnom" id="nilnomb"  pattern="[A-z ].{1,}" title="Ingrese solo letras" required>
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
