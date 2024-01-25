function eliminarCurNow(cur) {
    $.ajax({
        url: "functions/Grados/Grados.php",
        type: "POST",
        data:{opcion:94,cur},
        success:function (resp) {
            console.log(resp);
            location.reload();
        }
    })
}
$(document).ready(function() {
  var opcion;
  function listar(){
  opcion =9;
  $('#tablegrado').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Grados/Grados.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablegrado = $('#tablegrado').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null]
             });
         } else {
           opcion =1;
           tablegrado = $('#tablegrado').DataTable({
                 "ajax":{
                     "url": "functions/Grados/Grados.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "grado_id"},
                   {"data": "nombre_nivel"},
                   {"data": "nombre_grado"},
                   {"data": "abreviatura"},
                     {"data": "grado_id"},
                   {"defaultContent": "<button class='btn btn-info btn-sm glyphicon glyphicon-list btnCur'></button>"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"}
               ],
               columnDefs: [
                   {
                       targets:4,
                       render:function (data, type, row, meta) {
                           return "<button onclick='eliminarCurNow("+data+")' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button>";
                       }
                   }
               ]
             });
         }
       }
     });
  }
  listar();

  $(document).on("click", ".btnEdit", function(){
      fila = $(this).closest("tr");
      idgrad = fila.find('td:eq(0)').text(); //capturo el ID
      gradnomb = fila.find('td:eq(2)').text();
      gradabre = fila.find('td:eq(3)').text();
      $("#granomb").val(gradnomb);
      $("#graabreb").val(gradabre);
      $("#idgrad").val(idgrad);
      //DESPLEGAR EL MODAL CON LOS DATOS
      $('#E_Grado').modal('show');
  });

  //ENVIAR DATOS
  $('#formEGrado').submit(function(e){
  opcion =7;
  granomb = $.trim($('#granomb').val());
  graabreb = $.trim($('#graabreb').val());
  idgrad = $.trim($('#idgrad').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Nivel/Nivel.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,granomb:granomb,graabreb:graabreb,idgrad:idgrad},
         success: function(data) {
           lista_grado();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#E_Grado').modal('hide');
  });

  $(document).on("click", ".btnCur", function(){
    fila = $(this).closest("tr");
    graid = fila.find('td:eq(0)').text(); //capturo el ID
    granom = fila.find('td:eq(2)').text();
    nilnom = fila.find('td:eq(1)').text();
    $("#principal").hide();
    $('#opciones').load('views/Grados/V_Detalles.php',{ "form": "cursos", "graid": graid, "granom" : granom, "nilnom" : nilnom});
  });
  //






});
