function eliminarSeccNow(secc) {
    $.ajax({
        type:"POST",
        url: "functions/Seccion/Seccion.php",
        data:{
            opcion:89,
            secc
        },
        success: function(resp) {
            console.log(resp);
             location.reload()
        }
    })
}
$(document).ready(function() {
  var opcion;
  function listar(){
  opcion =9;
  $('#tablesecci').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Seccion/Seccion.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablesecci = $('#tablesecci').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null]
             });
         } else {
           opcion =1;
           tablesecci = $('#tablesecci').DataTable({
                 "ajax":{
                     "url": "functions/Seccion/Seccion.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "seccion_id"},
                   {"data": "nombre_nivel"},
                   {"data": "nombre_grado"},
                   {"data": "nombre"},
                   {"data": "cnt_alumnos"},
                     {"data": "seccion_id"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"},
                   {"defaultContent": "<button class='btn btn-info btn-sm glyphicon glyphicon-list btnHora'></button>"}
               ],
               columnDefs: [
                   {
                       targets:5,
                       render:function (data, type, row, meta) {
                           return "<button onclick='eliminarSeccNow("+data+")' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button>";
                       }
                   }
               ]
             });
         }
       }
     });
  }
  listar();
  //NUEVO
  $("#btnNuevo").click(function(){

    $('#selgrado').empty().trigger('change');
    $("#formSeccion").trigger("reset");
    $('.select2').select2();
    $('#M_Seccion').modal('show');
  });
  //
  //CARGAR GRADO
  $("#nilaca").on('change', function () {
   $("#nilaca option:selected").each(function () {
       var id_nil = $(this).val();
       $.post("views/Seccion/Grado.php", { id_nil: id_nil }, function(data) {
           $("#selgrado").html(data);
           //$('#selmodelo').val("");
       });
   });

 });

 //ENVIAR DATOS
 $('#formSeccion').submit(function(e){
   opcion =2;
   nilaca = $.trim($('#nilaca').val());
   selgrado = $.trim($('#selgrado').val());
   seccnom =   $.trim($('#seccnom').val());
   secccnt =  $.trim($('#secccnt').val());
   e.preventDefault();
   $.ajax({
          url: "functions/Seccion/Seccion.php",
          type: "POST",
          datatype:"json",
          data:  {opcion:opcion,nilaca:nilaca,selgrado:selgrado,seccnom:seccnom,secccnt:secccnt},
          success: function(data) {
            listar();
            toastr.success('Se han procesado los datos correctamente','EXITO');
          }
        });
    //CERRAR MODAL
    $('#M_Seccion').modal('hide');
 });

 $(document).on("click", ".btnEdit", function(){
     fila = $(this).closest("tr");
     bsecc = fila.find('td:eq(0)').text(); //capturo el ID
     bseccnom = fila.find('td:eq(3)').text();
     bsecccnt = fila.find('td:eq(4)').text();
     bnilaca = fila.find('td:eq(1)').text();
     bselgrado =fila.find('td:eq(2)').text();
     $("#bsecc").val(bsecc);
     $("#bseccnom").val(bseccnom);
     $("#bsecccnt").val(bsecccnt);
     $("#bnilaca").val(bnilaca);
     $("#bselgrado").val(bselgrado);

     //DESPLEGAR EL MODAL CON LOS DATOS
     $('#E_Seccion').modal('show');
 });


 //ENVIAR DATOS
 $('#formeSeccion').submit(function(e){
   opcion =3;
   bsecc = $.trim($('#bsecc').val());
   bseccnom = $.trim($('#bseccnom').val());
   bsecccnt =   $.trim($('#bsecccnt').val());
   e.preventDefault();
   $.ajax({
          url: "functions/Seccion/Seccion.php",
          type: "POST",
          datatype:"json",
          data:  {opcion:opcion,bsecc:bsecc,bseccnom:bseccnom,bsecccnt:bsecccnt},
          success: function(data) {
            listar();
            toastr.success('Se han procesado los datos correctamente','EXITO');
          }
        });
    //CERRAR MODAL
    $('#E_Seccion').modal('hide');
 });


 $(document).on("click", ".btnHora", function(){
   fila = $(this).closest("tr");
   seccid = fila.find('td:eq(0)').text(); //capturo el ID
   granom = fila.find('td:eq(2)').text();
   secnom = fila.find('td:eq(3)').text();
   $("#principal").hide();
   $('#opciones').load('views/Seccion/V_Horario.php',{ "seccid": seccid, "granom" : granom, "secnom": secnom});
 });













});
