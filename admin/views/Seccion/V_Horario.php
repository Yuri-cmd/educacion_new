<?php
  include "../../functions/BD.php";
  //
  $seccid = $_POST['seccid'];
  $granom = $_POST['granom'];
  $secnom = $_POST['secnom'];
  //
  include "M_Horario.php";
  include "R_Horario.php";

 ?>

<div class="row" id="detalle">
  <input type="hidden" name="seccid" id="seccid" value="<?=$seccid; ?>">
  <input type="hidden" name="granom" id="granom" value="<?=$granom; ?>">
  <input type="hidden" name="secnom" id="secnom" value="<?=$secnom; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-mortar-board"></i>&nbsp;<?=$granom.' '.$secnom; ?> <small>Horario de Clases</small> </h2>
        </div>
        <div class="col-lg-6 text-right">
          <a style="margin-top: 25px;" class="btn btn-success" id="btnNuev1"><i class="fa fa-plus"></i> Agregar</a>
            <a style="margin-top: 25px;" class="btn btn-warning"  id="btnRegre"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
         <div class="box-body">
           <div class="table-responsive col-lg-12">
              <table id="tablehora" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-green-gradient">
                    <th class="text-center">#</th>
                    <th class="text-center">ARCHIVO</th>
                    <th class="text-center">DESCARGAR</th>
                    <th class="text-center">ELIMINAR</th>
                  </tr>
                </thead>
                <tbody class="text-center"></tbody>
              </table>
            </div>
         </div> <!-- /.box-body -->
      </div><!-- /.box -->
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  var seccid, opcion;
   seccid = $.trim($('#seccid').val());
   granom = $.trim($('#granom').val());
   secnom = $.trim($('#secnom').val());
   /////////////////////////////////////////////////////////////////////////////
   $('input[type=file]').bootstrapFileInput();
   //NUEVO//////////////////////////////////////////////////////////////////////
   $("#btnNuev1").click(function(){
       $("#formBanner").trigger("reset");
       $('#uploadImage1').empty().trigger('change');
       $('#M_Horario').modal('show');
   });
   /////////////////////////////////////////////////////////////////////////////
   function lista_hora(){
   opcion =8;
   $('#tablehora').DataTable().clear().destroy();
   $.ajax({
     url: "functions/Seccion/Seccion.php",
     type: "POST",
     datatype:"json",
     data:  {opcion:opcion,seccid:seccid},
     success: function(data) {
       //RECORRER OBJETO JS
       let ObjetoJSS = JSON.parse(data);
       for (let itemm of ObjetoJSS){ var listar = itemm.data; }
       if (listar==0) {
         tablehora = $('#tablehora').DataTable({
           "autoWidth" : false,
           "columns":[null,null,null,null]
           });
       } else {
         opcion =7;
         tablehora = $('#tablehora').DataTable({
               "ajax":{
                   "url": "functions/Seccion/Seccion.php",
                   "method": 'POST', //usamos el metodo POST
                   "data":{opcion:opcion,seccid:seccid}, //enviamos opcion 4 para que haga un SELECT
                   "dataSrc":""
               },
              "autoWidth"   : false,
               "columns":[
                 {"data": "seccion_id"},
                 {"data": "horario"},
                 {"defaultContent": "<button class='btn btn-success btn-sm glyphicon glyphicon glyphicon-save btnDesca'></button>"},
                 {"defaultContent": "<button class='btn btn-danger btn-sm glyphicon glyphicon-remove btnElim'></button>"}
             ]
           });
          }
     }
   });
}
lista_hora();
////////////////////////////////////////////////////////////////////////////////
//FORMULARIO BANNER
$("#formBanner").submit(function(e){
  e.preventDefault();
  opcion =6;
  var formData = new FormData();
  var action = $.trim($('#action').val());
  var files = $('#uploadImage1')[0].files[0];
  formData.append('file',files);
  formData.append('opcion',opcion);
  formData.append('seccid',seccid);
  formData.append('secnom',secnom);
  formData.append('granom',granom);
  formData.append('action',action);
  $.ajax({
        url: "functions/Seccion/Seccion.php",
        type: "POST",
        datatype:"json",
        data:  formData,
        contentType: false,
        processData: false,
        success: function(data) {
          lista_hora();
          toastr.success('Se han procesado los datos correctamente','EXITO');
        }
      });
  $('#M_Horario').modal('hide');
 });
////////////////////////////////////////////////////////////////////////////////
 $(document).on("click", ".btnDesca", function(){
     fila = $(this).closest("tr");
     archivo = fila.find('td:eq(1)').text(); //capturo el ID
    ruta ='../images/Institucion/Horarios/'+archivo;
    window.open(ruta, '_blank');
 });

 $(document).on("click", ".btnElim", function(){
    fila = $(this).closest("tr");
    idhora = fila.find('td:eq(0)').text(); //capturo el ID
    barchi = fila.find('td:eq(1)').text();
    $("#idhora").val(idhora);
    $("#barchi").val(barchi);
    //DESPLEGAR EL MODAL CON LOS DATOS
    $('#R_Horario').modal('show');
});


//ENVIAR DATOS
$('#formRhora').submit(function(e){
opcion =5;
idhora = $.trim($('#idhora').val());
barchi = $.trim($('#barchi').val());
e.preventDefault();
$.ajax({
       url: "functions/Seccion/Seccion.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,idhora:idhora,seccid:seccid,barchi:barchi},
       success: function(data) {
         lista_hora();
         toastr.success('Se han procesado los datos correctamente','EXITO');
       }
     });
 //CERRAR MODAL
 $('#R_Horario').modal('hide');
});







  //Cerrar Formulario
   $("#btnRegre").click(function(){
       $('#detalle').hide();
       $('#principal').show();
   });
   //

});
</script>
