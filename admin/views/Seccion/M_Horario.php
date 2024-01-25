<style type="text/css">
  .bordeazul{
    border: 2px solid   #00a65a;
    border-radius: 5px;
    margin: 5px 0 2px 0px;
 }

   .dalto {
     height: 90px;
   }
   .tban {
     color:#fff;
   }
 </style>
 <div class="modal fade" id="M_Horario"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog ">
       <div class="modal-content">
           <div class="modal-header bg-green-gradient">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span></button>
               <h3 align="center" id="myModalLabel"><i class="fa fa-image"></i>&nbsp;Agregar Imagen / Archivo </h3>
           </div>
          <form  id="formBanner">
           <div class="modal-body dalto">
               <input name="action" id="action" type="hidden" value="upload" />
              <div class="form-group col-md-12 col-xs-12 col-lg-12">
                <input height="20" class="form-control btn btn-success inputimg" title="AGREGAR IMAGEN / ARCHIVO" accept="image/png, image/jpeg, image/gif, .csv,application/vnd.ms-excel" id="uploadImage1" type="file" name="uploadImage1" />
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
