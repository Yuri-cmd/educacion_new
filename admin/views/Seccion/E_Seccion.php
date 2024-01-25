<style>
  .dalt1o {
    height: 180px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="E_Seccion"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-edit"></i>&nbsp;Editar Seccion</h3>
          </div>
          <form  id="formeSeccion">
          <input type="hidden" id="bsecc" value="">
          <div class="modal-body dalt1o">
            <div class="form-group col-xs-12 col-md-12 col-lg-6">
               <label>NIVEL:</label>
               <input class="form-control text-uppercase" id="bnilaca"  disabled>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-6">
                <label>GRADO:</label>
                <input class="form-control text-uppercase" id="bselgrado" disabled>
              </div>
              <div class="form-group col-xs-12 col-md-12 col-lg-7">
                 <label>SECCION:</label>
                 <input class="form-control text-uppercase" name="bseccnom" id="bseccnom"  pattern="[A-z ].{1,}" title="Ingrese solo letras" required>
             </div>
           <div class="form-group col-xs-12 col-md-12 col-lg-5">
              <label>CNT ALUMNOS:</label>
              <input class="form-control text-uppercase" name="bsecccnt" id="bsecccnt"  pattern="[0-9 ].{1,}" title="Ingrese solo Numeros" required>
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
