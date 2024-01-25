<style>
  .ualto1 {
    height: 90px;
  }
  .bordeazul{
    border: 2px solid  #00a65a;
    border-radius: 5px;
    margin: 5px 0 2px 0px;
 }
</style>
<div class="modal fade" id="M_Curso" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Agregar Curso</h3>
          </div>
            <form  id="formCurso" >
              <div class="modal-body ualto1">
                <div class="form-group col-xs-12 col-md-12 col-lg-6">
                   <label>NIVEL ACADEMICO:</label>
                   <input class="form-control text-uppercase" value="<?=$nilnom; ?>" disabled>
                 </div>
              <div class="form-group col-xs-12 col-md-12 col-lg-6">
                 <label>CURSO:</label>
                 <select class="form-control select2" style="width:100%;" name="cur_id" id="cur_id" required>
                   <?php
                      $sqlcat="SELECT n.nivel_id,n.nombre_nivel,c.curso_id,c.nombre FROM niveles_educativos n, cursos c
	                     WHERE c.nivel_academico_id = n.nivel_id AND n.nombre_nivel ='$nilnom'";
                      $rcat=mysqli_query($con,$sqlcat);
                      echo "<option value=''>--</option>";
                      if( $rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC)     ){
                      do{
                         echo '<option value="'.$rowcat['curso_id'].'">'.$rowcat['nombre'].'</option>';
                         } while($rowcat=mysqli_fetch_array($rcat,MYSQLI_ASSOC));
                      }
                    ?>
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
<script type="text/javascript">
function previewImage(nb) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);
    reader.onload = function (e) {
        document.getElementById('uploadPreview'+nb).src = e.target.result;
    };
}
</script>
