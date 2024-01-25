<style>
  .dalto {
    height: 90px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="E_Grado"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-edit"></i>&nbsp;Editar Grado</h3>
          </div>
          <form  id="formEGrado" >
            <input type="hidden" id="idgrad" value="">
          <div class="modal-body dalto">
              <div class="form-group col-xs-12 col-md-12 col-lg-8">
                 <label>NOMBRE:</label>
                 <input class="form-control text-uppercase" name="bannom" id="granomb"   pattern="[A-z-0-9 ].{1,}" title="Ingrese solo letras" required>
               </div>
               <div class="form-group col-xs-12 col-md-12 col-lg-4">
                  <label>ABREVIATURA:</label>
                  <input class="form-control text-uppercase" name="bannom" id="graabreb"  pattern="[A-z-0-9 ].{1,}" title="Ingrese solo letras" required>
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
