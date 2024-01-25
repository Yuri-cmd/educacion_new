<style>
  .ualto1 {
    height: 300px;
  }
  .bordeazul{
    border: 2px solid  #00a65a;
    border-radius: 5px;
    margin: 5px 0 2px 0px;
 }
</style>
<div class="modal fade" id="E_Curso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Editar Curso</h3>
          </div>
              <form  id="formeCurso" >
          <div class="modal-body ualto1">

               <input name="action" id="action2" type="hidden" value="upload" />
               <input type="hidden" id="idcurb" value="">
               <div class="form-group col-md-12 col-xs-12 col-lg-4">
                 <img id="uploadPreview2" class="bordeazul cargaim" width="100%" height="150" src="" />
                 <input height="20" class="form-control btn btn-success inputimg" title="AGREGAR FOTO" accept="image/png, image/jpeg, image/gif" id="uploadImage2" type="file" name="uploadImage1" onchange="previewImage(2);" />
                </div>
                <div class="form-group col-xs-12 col-md-12 col-lg-8">
                   <label>NIVEL ACADEMICO:</label>
                   <input class="form-control text-uppercase" value="<?=$ninom; ?>" disabled>
                 </div>
              <div class="form-group col-xs-12 col-md-12 col-lg-8">
                 <label>NOMBRE:</label>
                 <input class="form-control text-uppercase" name="usunom" id="bcurnom"  pattern="[A-z0-9 ].{1,}" placeholder="nombre del curso" title="Ingrese solo letras" required>
               </div>

              <div class="form-group col-xs-12 col-md-12 col-lg-8">
                <label>DESCRIPCI&Oacute;N:</label>
                <textarea class="form-control text-uppercase" rows="3" name="txtdirec" id="bcurdesc" placeholder="Ingrese descripcion" pattern="^([a-zA-Z ])[a-zA-Z0-9-_–\. ]+{1,60}$" required></textarea>
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
