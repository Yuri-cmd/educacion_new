$(document).ready(function() {
  var opcion;
  function listar(){
  opcion =9;
  $('#tablematri').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Matricula/Matricula.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablematri = $('#tablematri').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null,null]
             });
         } else {
           opcion =1;
           tablematri = $('#tablematri').DataTable({
                 "ajax":{
                     "url": "functions/Matricula/Matricula.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "matr_id"},
                   {"data": "insti_razon_social"},
                   {"data": "finicio"},
                   {"data": "ffin"},
                   {"data": "periodo"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();
  /////////////
  //NUEVO
$("#btnNuevo").click(function(){
  //$('#selgrado').empty().trigger('change');
  $("#formMatricula").trigger("reset");
  $('.select2').select2();
  $('#M_Apertura').modal('show');
});

//ENVIAR DATOS
$('#formMatricula').submit(function(e){
  opcion =2;
  instid = $.trim($('#instid').val());
  finicio = $.trim($('#finicio').val());
  ffin =   $.trim($('#ffin').val());
  perido = $.trim($('#perido').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Matricula/Matricula.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,instid:instid,finicio:finicio,ffin:ffin,perido:perido},
         success: function(data) {
           listar();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#M_Apertura').modal('hide');
});

$(document).on("click", ".btnEdit", function(){
    fila = $(this).closest("tr");
    bmatri = fila.find('td:eq(0)').text(); //capturo el ID
    binstid = fila.find('td:eq(1)').text();
    bfini1 = fila.find('td:eq(2)').text();
    bfinicio = convertDateFormat(bfini1);
    bffin1 = fila.find('td:eq(3)').text();
    bffin = convertDateFormat(bffin1);
    bperido = fila.find('td:eq(4)').text();
    $("#bmatri").val(bmatri);
 //
    $("#binstid").val(binstid);
    $("#bfinicio").val(bfinicio);
    $("#bffin").val(bffin);
    $("#bperido").val(bperido);
    //DESPLEGAR EL MODAL CON LOS DATOS
    $('#E_Apertura').modal('show');
});

     // @param string (string) : Fecha en formato YYYY-MM-DD
    // @return (string)       : Fecha en formato DD/MM/YYYY
    function convertDateFormat(string) {
      var info = string.split('/');
      return info[2] + '-' + info[1] + '-' + info[0];
    }

    //ENVIAR DATOS
    $('#formeMatricula').submit(function(e){
      opcion =3;
      bmatri = $.trim($('#bmatri').val());
      bfinicio = $.trim($('#bfinicio').val());
      bffin =   $.trim($('#bffin').val());
      bperido = $.trim($('#bperido').val());
      e.preventDefault();
      $.ajax({
             url:"functions/Matricula/Matricula.php",
             type: "POST",
             datatype:"json",
             data:  {opcion:opcion,bmatri:bmatri,bfinicio:bfinicio,bffin:bffin,bperido:bperido},
             success: function(data) {
               listar();
               toastr.success('Se han procesado los datos correctamente','EXITO');
             }
           });
       //CERRAR MODAL
       $('#E_Apertura').modal('hide');
    });











});
