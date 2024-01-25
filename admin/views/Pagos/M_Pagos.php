<?php
  $perid = date("Y");

 ?>
<style>
  .dalto {
    height: 90px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="M_Pagos"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Agregar Pago</h3>
          </div>
          <form  id="formPagos" >
          <div class="modal-body dalto">
              <div class="form-group col-xs-12 col-md-12 col-lg-3">
                 <label>A&Ntilde;O:</label>
                 <input class="form-control text-uppercase" name="paganual" id="paganual" value="<?=$perid; ?>" disabled>
               </div>
               <div class="form-group col-xs-12 col-md-12 col-lg-6">
                  <label>MES: </label>
                  <select class="form-control select2" style="width:100%;" name="pagmes" id="pagmes" required>
                    <option value="">--</option>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>
                  </select>
                </div>
                <div class="form-group col-xs-12 col-md-12 col-lg-3">
                   <label>PAGO: </label>
                   <select class="form-control select2" style="width:100%;" name="pagnot" id="pagnot" required>
                     <option value="">--</option>
                     <option value="SI">SI</option>
                     <option value="NO">NO</option>
                   </select>
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
