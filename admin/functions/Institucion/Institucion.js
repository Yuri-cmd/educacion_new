$(document).ready(function() {
  var opcion;
  function listar(){
  opcion =9;
  $('#tableinsti').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Institucion/Institucion.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tableinsti = $('#tableinsti').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null,null,null]
             });
         } else {
           opcion =1;
           tableinsti = $('#tableinsti').DataTable({
                 "ajax":{
                     "url": "functions/Institucion/Institucion.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "insti_id"},
                   {"data": "insti_ruc"},
                   {"data": "insti_razon_social"},
                   {"data": "insti_direccion"},
                   {"data": "insti_telefono1"},
                   {"data": "insti_director"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();


  $("#btnNuevo").attr("disabled", true);
  //NUEVO
  $("#btnNuevo").click(function(){
    //$("#principal").hide();
    //$(".cargaim").attr("src", "../images/Institucion/noimage.png");
    //$('#opciones').load('views/Institucion/V_Detalles.php',{ "form": "nuevo", "idinst": "0"});
  });


  $(document).on("click", ".btnEdit", function(){
      //opcion = 2;//filtar
      fila = $(this).closest("tr");
      idinst = fila.find('td:eq(0)').text(); //capturo el ID
      $("#principal").hide();
      $('#opciones').load('views/Institucion/V_Detalles.php',{ "form": "edita", "idinst": idinst});
  });


});
