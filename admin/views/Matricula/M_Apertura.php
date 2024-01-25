<style>
  .dalto {
    height: 180px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="M_Apertura"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Agregar Apertura</h3>
          </div>
          <form  id="formMatricula" >
          <div class="modal-body dalto">
            <div class="form-group col-xs-12 col-md-12 col-lg-12">
               <label>INSTITUCION:</label>
               <select class="form-control select2" style="width:100%;" name="instid" id="instid" required>
                 <?php
                    $sqlcat="SELECT insti_id, insti_razon_social from institucion_educativa";
                    $rcat=mysqli_query($con,$sqlcat);
                    echo "<option value=''>--</option>";
                    if( $rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC)     ){
                    do{
                       echo '<option value="'.$rowcat['insti_id'].'">'.$rowcat['insti_razon_social'].'</option>';
                       } while($rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC));
                    }
                  ?>
               </select>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-4">
                <label>F. INICIO:</label>
                <input class="form-control" type="date" style="padding-top:1px;" name="finicio" id="finicio" required>
              </div>
              <div class="form-group col-xs-12 col-md-12 col-lg-4">
                 <label>F. FIN:</label>
                 <input class="form-control" type="date" style="padding-top:1px;" name="ffin" id="ffin" required>
               </div>
               <div class="form-group col-xs-12 col-md-12 col-lg-4">
                  <label>PERIODO:</label>
                   <input class="form-control text-uppercase" name="perido" id="perido"  pattern="[0-9 ].{3,}" title="Ingrese solo numeros" required>
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
