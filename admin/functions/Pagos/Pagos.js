$(document).ready(function() {
  var opcion;
  function listar(){
  opcion =9;
  $('#tablepagos').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Pagos/Pagos.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablepagos = $('#tablepagos').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null]
             });
         } else {
           opcion =0;
           tablepagos = $('#tablepagos').DataTable({
                 "ajax":{
                     "url": "functions/Pagos/Pagos.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "id_usuario"},
                   {"data": "numero_doc"},
                   {"data": "nombres"},
                   {"data": "apellidos"},
                   {"data": "direccion"},
                   {"data": "telefono_1"},
                   {"defaultContent": "<button class='btn btn-info btn-sm glyphicon glyphicon-plus btnDet'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();

  $(document).on("click", ".btnDet", function(){
  fila = $(this).closest("tr");
  perfild = fila.find('td:eq(0)').text();
  connom = fila.find('td:eq(2)').text();
  conape = fila.find('td:eq(3)').text();
  $("#principal").hide();
  $('#opciones').load('views/Pagos/V_Detalles.php',{ "connom": connom, "conape": conape, "perfild": perfild});
});




});
