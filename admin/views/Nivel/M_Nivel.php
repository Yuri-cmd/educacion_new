<style>
  .dalt1o {
    height: 180px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="M_Nivel"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Agregar Nivel</h3>
          </div>
          <form  id="formNivel" >
          <div class="modal-body dalt1o">
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
              <div class="form-group col-xs-12 col-md-12 col-lg-12">
                 <label>NOMBRE:</label>
                 <input class="form-control text-uppercase" name="nilnom" id="nilnom"  pattern="[A-z ].{1,}" title="Ingrese solo letras" required>
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
