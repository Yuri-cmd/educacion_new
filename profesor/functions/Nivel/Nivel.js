$(document).ready(function() {
  var opcion;
  function listar(){
  opcion =9;
  $('#tablenivel').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Nivel/Nivel.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablenivel = $('#tablenivel').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null]
             });
         } else {
           opcion =1;
           tablenivel = $('#tablenivel').DataTable({
                 "ajax":{
                     "url": "functions/Nivel/Nivel.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "nivel_id"},
                   {"data": "nombre_nivel"},
                   {"defaultContent": "<button class='btn btn-info btn-sm glyphicon glyphicon-plus btnGrad'></button>"},
                   {"defaultContent": "<button class='btn btn-danger btn-sm glyphicon glyphicon-list btnCur'></button>"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();
  //NUEVO
  $("#btnNuevo").click(function(){
    $("#formNivel").trigger("reset");
    $('.select2').select2();
    $('#M_Nivel').modal('show');
  });
  //
  //Autofocus Modal
  $(".modal").on('shown.bs.modal', function(){
      $(this).find('#nilnom').focus();
  });

  //ENVIAR DATOS
  $('#formNivel').submit(function(e){
  opcion =2;
  instid = $.trim($('#instid').val());
  nilnom = $.trim($('#nilnom').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Nivel/Nivel.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,instid:instid,nilnom:nilnom},
         success: function(data) {
           listar();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#M_Nivel').modal('hide');
  });

  $(document).on("click", ".btnEdit", function(){
      fila = $(this).closest("tr");
      idnil = fila.find('td:eq(0)').text(); //capturo el ID
      nilnomb = fila.find('td:eq(1)').text();
      $("#idnil").val(idnil);
      $("#nilnomb").val(nilnomb);
      //DESPLEGAR EL MODAL CON LOS DATOS
      $('#E_Nivel').modal('show');
  });


  //ENVIAR DATOS
  $('#formeNivel').submit(function(e){
  opcion =3;
  idnil = $.trim($('#idnil').val());
  nilnomb = $.trim($('#nilnomb').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Nivel/Nivel.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,idnil:idnil,nilnomb:nilnomb},
         success: function(data) {
           listar();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#E_Nivel').modal('hide');
  });

//
  $(document).on("click", ".btnGrad", function(){
      //opcion = 2;//filtar
      fila = $(this).closest("tr");
      idniv = fila.find('td:eq(0)').text(); //capturo el ID
      ninom = fila.find('td:eq(1)').text();
      $("#principal").hide();
      $('#opciones').load('views/Nivel/V_Detalles.php',{ "form": "grado", "idniv": idniv, "ninom" : ninom});
  });



  $(document).on("click", ".btnCur", function(){
      //opcion = 2;//filtar
      fila = $(this).closest("tr");
      idniv = fila.find('td:eq(0)').text(); //capturo el ID
      ninom = fila.find('td:eq(1)').text();
      $("#principal").hide();
      $('#opciones').load('views/Nivel/V_Detalles.php',{ "form": "cursos", "idniv": idniv, "ninom" : ninom});
  });




});
