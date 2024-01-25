$(document).ready(function() {
  var opcion, instid ,profid ;
  instid = $.trim($('#instid').val());
  profid = $.trim($('#profid').val());
  function listar(){
  opcion =9;
  $('#tableblog').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Blog/Blog.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion, profid:profid},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tableblog = $('#tableblog').DataTable({

             "columns":[null,null,null,null,null]
             });
         } else {
           opcion =0;
           tableblog = $('#tableblog').DataTable({
                 "ajax":{
                     "url": "functions/Blog/Blog.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion, profid:profid}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },

                 "columns":[
                   {"data": "blo_id"},
                   {"data": "blo_fecha1"},
                   {"data": "blo_titulo"},
                   {"data": "blo_contenido"},
                   {"defaultContent": "<button class='btn btn-danger btn-sm glyphicon glyphicon-remove btnElim'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();
////////////////////////////////////////////////////////////////////////////////
  $('input[type=file]').bootstrapFileInput();
////////////////////////////////////////////////////////////////////////////////
//NUEVO CUPON
$("#btnNuevo").click(function(){
  $("#formBanner").trigger("reset");
  $("#uploadImage1").val("");
  $('#M_Blog').modal('show');
});

//FORMULARIO CONTENIDO
$("#formBanner").submit(function(e){
  e.preventDefault();
  opcion =1;
  var formData = new FormData();
  var vtitu = $.trim($('#vtitu').val());
  var vmensaje = $.trim($('#vmensaje').val());
  var action = $.trim($('#action').val());
  var files = $('#uploadImage1')[0].files[0];
  formData.append('file',files);
  formData.append('vtitu',vtitu);
  formData.append('vmensaje',vmensaje);
  formData.append('opcion',opcion);
  formData.append('instid',instid);
  formData.append('profid',profid);
  formData.append('action',action);
  $.ajax({
        url: "functions/Blog/Blog.php",
        type: "POST",
        datatype:"json",
        data:  formData,
        contentType: false,
        processData: false,
        success: function(data) {
          listar();
          toastr.success('Se han procesado los datos correctamente','EXITO');
        }
      });
  $('#M_Blog').modal('hide');
 });
////////////////////////////////////////////////////////////////////////////////
//ELIMINAR CONTENIDO
$(document).on("click", ".btnElim", function(){
  fila = $(this).closest("tr");
  ebid = fila.find('td:eq(0)').text();
  //DESPLEGAR EL MODAL CON LOS DATOS
   $("#ebid").val(ebid);
   $('#R_Blog').modal('show');
 });


 //ENVIAR DATOS
 $('#formRGale').submit(function(e){
 opcion=2;
 ebid = $.trim($('#ebid').val());
 e.preventDefault();
 $.ajax({
        url:  "functions/Blog/Blog.php",
        type: "POST",
        datatype:"json",
        data:  {opcion:opcion,ebid:ebid},
        success: function(data) {
          listar();
          toastr.success('Se han procesado los datos correctamente','EXITO');
        }
      });
  //CERRAR MODAL
  $('#R_Blog').modal('hide');
 });




});
