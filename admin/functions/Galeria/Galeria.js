$(document).ready(function() {
  var opcion, instid;
  instid = $.trim($('#instid').val());
  function listar(){
  opcion =9;
  $('#tablebanner').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Galeria/Galeria.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablebanner = $('#tablebanner').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null]
             });
         } else {
           opcion =1;
           tablebanner = $('#tablebanner').DataTable({
                 "ajax":{
                     "url": "functions/Galeria/Galeria.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "gal_id"},
                   {"data": "gal_nombre"},
                   {"data": "gal_posicion"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();


  $('input[type=file]').bootstrapFileInput();
  //Autofocus Modal
  $(".modal").on('shown.bs.modal', function(){
      $(this).find('#catban').focus();
  });

  //NUEVO CUPON
 $("#btnNuevo").click(function(){
   $("#formBanner").trigger("reset");
   $(".cargaim").attr("src", "../images/Institucion/noimage.png");
   $("#uploadImage1").val("");
   $('#M_Galeria').modal('show');

 });

 //FORMULARIO BANNER
 $("#formBanner").submit(function(e){
   e.preventDefault();
   opcion =2;
   var formData = new FormData();
   var catban = $.trim($('#catban').val());
   var posban = $.trim($('#posban').val());
   var action = $.trim($('#action').val());
   var files = $('#uploadImage1')[0].files[0];
   formData.append('file',files);
   formData.append('catban',catban);
   formData.append('posban',posban);
   formData.append('opcion',opcion);
   formData.append('instid',instid);
   formData.append('action',action);
   $.ajax({
         url: "functions/Galeria/Galeria.php",
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
   $('#M_Galeria').modal('hide');
  });

  //filtrar
  $(document).on("click", ".btnEdit", function(){
      fila = $(this).closest("tr");
      idbann = fila.find('td:eq(0)').text(); //capturo el ID
      bcatban = fila.find('td:eq(1)').text();
      bposban = fila.find('td:eq(2)').text();
      //bimagen = fila.find('td:eq(2)').text();
      $("#idbann").val(idbann);
      $("#bcatban").val(bcatban);
      $("#bposban").val(bposban);
      //$("#bimagen").val(bimagen);
      //IMAGENES
      if (bimagen !='') {
        $("#uploadPreview2").attr("src", "../images/Institucion/Galeria/"+bcatban);
      } else {
        $("#uploadPreview2").attr("src", "../images/Institucion/noimage.png");
      }
      //DESPLEGAR EL MODAL CON LOS DATOS
      $('#E_Galeria').modal('show');
  });

  $("#formEBanner").submit(function(e){
    e.preventDefault();
    opcion =3;
    var formData = new FormData();
    var idbann = $.trim($('#idbann').val());
    var bcatban = $.trim($('#bcatban').val());
    var bposban = $.trim($('#bposban').val());
    var bimagen = $.trim($('#bimagen').val());
    var action2 = $.trim($('#action2').val());
    var files = $('#uploadImage2')[0].files[0];
    formData.append('file',files);
    formData.append('idbann',idbann);
    formData.append('action2',action2);
    formData.append('bcatban',bcatban);
    formData.append('bposban',bposban);
    formData.append('instid',instid);
    formData.append('bimagen',bimagen);
    formData.append('opcion',opcion);
    $.ajax({
          url: "functions/Galeria/Galeria.php",
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
    $('#E_Galeria').modal('hide');

   });







});
