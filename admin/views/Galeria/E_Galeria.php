<style type="text/css">
  .bordeazul{
    border: 2px solid  #0866C6;
    border-radius: 5px;
    margin: 5px 0 2px 0px;
 }

   .dalto {
     height: 350px;
   }
   .tban {
     color:#fff;
   }
 </style>
 <div class="modal fade" id="E_Galeria"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header bg-green-gradient">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span></button>
               <h3 align="center" id="myModalLabel"><i class="fa fa-image"></i>&nbsp;Editar Imagen</h3>
           </div>
           <div class="modal-body dalto">
             <form  id="formEBanner" >
                 <input name="action" id="action2" type="hidden" value="upload" />
                 <input type="hidden" id="idbann" value="">
                 <input type="hidden" id="bimagen" value="">
             <div class="form-group col-xs-12 col-md-12 col-lg-6">
               <label>NOMBRE:</label>
                <input class="form-control text-uppercase" name="bcatban" id="bcatban" disabled>
              </div>
              <div class="form-group col-xs-12 col-md-12 col-lg-6">
               <label>POSICI&Oacute;N:</label>
                <input class="form-control text-uppercase" name="bposban" id="bposban" disabled>
              </div>
              <div class="form-group col-md-12 col-xs-12 col-lg-12">
                <img id="uploadPreview2" class="bordeazul cargaim" width="100%" height="180" src="" />
                <input height="20" class="form-control btn btn-info inputimg" title="AGREGAR IMAGEN" accept="image/png, image/jpeg, image/gif" id="uploadImage2" type="file" name="uploadImage2" onchange="previewImage(2);" />
               </div>
           </div>
           <div class="modal-footer">
            <div class="col-lg-12">
             <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-floppy-saved"></i> Actualizar </button>
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
