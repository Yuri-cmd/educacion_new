$(document).ready(function() {
  var opcion, instid;
  instid = $.trim($('#instid').val());
  function listar(){
  opcion =9;
  $('#tablegaleria').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Noticia/Noticia.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablegaleria = $('#tablegaleria').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null]
             });
         } else {
           opcion =0;
           tablegaleria = $('#tablegaleria').DataTable({
                 "ajax":{
                     "url": "functions/Noticia/Noticia.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "not_id"},
                   {"data": "not_titulo"},
                   {"data": "not_contenido"},
                   {"data": "not_fecha1"}
               ]
             });
         }
       }
     });
  }
  listar();

  $('input[type=file]').bootstrapFileInput();

  //NUEVO CUPON
 $("#btnNuevo").click(function(){
   $("#formBanner").trigger("reset");
   $(".cargaim").attr("src", "../images/Institucion/noimage.png");
   $("#uploadImage1").val("");
   $('#M_Noticia').modal('show');

 });

 //FORMULARIO BANNER
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
   formData.append('action',action);
   $.ajax({
         url: "functions/Noticia/Noticia.php",
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
   $('#M_Noticia').modal('hide');
  });

  //ELIMINAR IMAGEN
  $(document).on("click", ".btnElim", function(){
    fila = $(this).closest("tr");
    ebid = fila.find('td:eq(0)').text();
    //DESPLEGAR EL MODAL CON LOS DATOS
     $("#ebid").val(ebid);
     $('#R_Noticia').modal('show');
   });


   //ENVIAR DATOS
   $('#formRGale').submit(function(e){
   opcion=2;
   ebid = $.trim($('#ebid').val());
   e.preventDefault();
   $.ajax({
          url:  "functions/Noticia/Noticia.php",
          type: "POST",
          datatype:"json",
          data:  {opcion:opcion,ebid:ebid},
          success: function(data) {
            listar();
            toastr.success('Se han procesado los datos correctamente','EXITO');
          }
        });
    //CERRAR MODAL
    $('#R_Noticia').modal('hide');
   });




});
