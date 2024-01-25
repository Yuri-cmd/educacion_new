<style type="text/css">
  .bordeazul{
    border: 2px solid  #00a65a;
    border-radius: 5px;
    margin: 5px 0 2px 0px;
 }

   .dalto1 {
     height: 450px;
   }
   .tban {
     color:#fff;
   }
 </style>
 <div class="modal fade" id="M_Noticia"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header bg-green-gradient">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span></button>
               <h3 align="center" id="myModalLabel"><i class="fa fa-image"></i>&nbsp;Agregar Noticia</h3>
           </div>
           <div class="modal-body dalto1">
             <form  id="formBanner" >
                 <input name="action" id="action" type="hidden" value="upload" />
             <div class="form-group col-xs-12 col-md-12 col-lg-12">
               <label>TITULO:</label>
               <input class="form-control text-uppercase" name="vtitu" id="vtitu"  pattern="[A-z0-9 ].{1,}" title="Ingrese solo letras" required>
              </div>
              <div class="form-group col-xs-12 col-md-12 col-lg-12">
               <label>CONTENIDO:</label>
                <textarea  class="form-control text-uppercase" id="vmensaje" pattern="^([a-zA-Z ])[a-zA-Z0-9-_–\. ]+{1,60}$" placeholder="Detalle del mensaje" required> </textarea>
              </div>
              <div class="form-group col-md-12 col-xs-12 col-lg-12">
                <img id="uploadPreview1" class="bordeazul cargaim" width="100%" height="180" src="" />
                <input height="20" class="form-control btn btn-success inputimg" title="AGREGAR IMAGEN" accept="image/png, image/jpeg, image/gif" id="uploadImage1" type="file" name="uploadImage1" onchange="previewImage(1);" />
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
