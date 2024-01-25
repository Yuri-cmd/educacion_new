$(document).ready(function() {
  var opcion, instid;
  instid = $.trim($('#instid').val());
  function listar(){
  opcion =9;
  $('#tableprofe').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Profesor/Profesor.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,instid:instid},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tableprofe = $('#tableprofe').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null,null,null,null,null,null,null]
             });
         } else {
           opcion =1;
           tableprofe = $('#tableprofe').DataTable({
                 "ajax":{
                     "url": "functions/Profesor/Profesor.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion,instid:instid}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "docente_id"},
                   {"data": "doc_numero"},
                   {"data": "nombres"},
                   {"data": "apellidos"},
                   {"data": "fnac"},
                   {"data": "telefono"},
                   {"data": "direccion"},
                   {"data": "especialidad"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"},
                   {"defaultContent": "<button class='btn btn-info btn-sm glyphicon glyphicon-list btnAsig'></button>"},
                   {"defaultContent": "<button class='btn btn-success btn-sm glyphicon glyphicon glyphicon-list-alt btnHora'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();

  //NUEVO
  $("#btnNuevo").click(function(){
    $("#formProfe").trigger("reset");
    $('#M_Profesor').modal('show');
  });
  //
  //ENVIAR DATOS
  $('#formProfe').submit(function(e){
  opcion =2;
  ptdoc = $.trim($('#ptdoc').val());
  pnumd =  $.trim($('#pnumd').val());
  pnomb1 = $.trim($('#pnomb1').val());
  pnomb2 = $.trim($('#pnomb2').val());
  pape1 = $.trim($('#pape1').val());
  pape2 = $.trim($('#pape2').val());
  pfnac = $.trim($('#pfnac').val());
  pemail = $.trim($('#pemail').val());
  ptele = $.trim($('#ptele').val());
  pespe = $.trim($('#pespe').val());
  pgene = $.trim($('#pgene').val());
  pdirec = $.trim($('#pdirec').val());
  psico = $.trim($('#psico').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Profesor/Profesor.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,instid:instid,ptdoc:ptdoc,pnumd:pnumd,pnomb1:pnomb1,pnomb2:pnomb2,pape1:pape1,pape2:pape2,pfnac:pfnac,pemail:pemail,ptele:ptele,pespe:pespe,pgene:pgene,pdirec:pdirec,psico:psico},
         success: function(data) {
           listar();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#M_Profesor').modal('hide');
  });
 ////////////////////////////////////
 $(document).on("click", ".btnEdit", function(){
     opcion =3;
     fila = $(this).closest("tr");
     idpro = fila.find('td:eq(0)').text(); //capturo el ID
     bptele = fila.find('td:eq(5)').text();
     bpespe =  fila.find('td:eq(7)').text();
     bpdirec =  fila.find('td:eq(6)').text();
     bpnumd = fila.find('td:eq(1)').text();
     $.ajax({
       type:"POST",
       url: "functions/Profesor/Profesor.php",
       datatype:"json",
       data:{idpro:idpro,opcion:opcion},
       success:function(data){
       //CARGAR VALORES
       var cadena = data;
       let ObjetoJS = JSON.parse(cadena);
       //RECORRER OBJETO
       for (let item of ObjetoJS){
           //var biv21 = item.fac_base21;
          var  bpnomb1 = item.primer_nombre;
          var  bpnomb2 = item.segundo_nombre;
          var  bpape1 = item.apellido_paterno;
          var  bpape2 = item.apellido_materno;
          var  bpfnac = item.fecha_nacimiento;
          var  bpemail= item.email;
          var  busid = item.id_usuario;
       }
     //DATOS FALTANTES
     $("#bpnomb1").val(bpnomb1);
     $("#bpnomb2").val(bpnomb2);
     $("#bpape1").val(bpape1);
     $("#bpape2").val(bpape2);
     $("#bpfnac").val(bpfnac);
     $("#bpemail").val(bpemail);
     $("#busid").val(busid);
     }
   });
     $("#idpro").val(idpro);
     $("#bpnumd").val(bpnumd);
     $("#bptele").val(bptele);
     $("#bpespe").val(bpespe);
     $("#bpdirec").val(bpdirec);

     //DESPLEGAR EL MODAL CON LOS DATOS
     $('#E_Profesor').modal('show');
 });
 //////////////////////////////////////////////////////////////////////////////////
 //ENVIAR DATOS
 $('#formEProfe').submit(function(e){
 opcion =4;
 idpro = $.trim($('#idpro').val());
 busid = $.trim($('#busid').val());
 bptdoc = $.trim($('#bptdoc').val());
 bpnumd =  $.trim($('#bpnumd').val());
 bpnomb1 = $.trim($('#bpnomb1').val());
 bpnomb2 = $.trim($('#bpnomb2').val());
 bpape1 = $.trim($('#bpape1').val());
 bpape2 = $.trim($('#bpape2').val());
 bpfnac = $.trim($('#bpfnac').val());
 bpgene = $.trim($('#bpgene').val());
 bpemail = $.trim($('#bpemail').val());
 bptele = $.trim($('#bptele').val());
 bpespe = $.trim($('#bpespe').val());
 bpdirec = $.trim($('#bpdirec').val());
 bpsico = $.trim($('#bpsico').val());
 e.preventDefault();
 $.ajax({
        url: "functions/Profesor/Profesor.php",
        type: "POST",
        datatype:"json",
        data:  {opcion:opcion,idpro:idpro,busid:busid,bptdoc:bptdoc,bpnumd:bpnumd,bpnomb1:bpnomb1,bpnomb2:bpnomb2,bpape1:bpape1,bpape2:bpape2,bpfnac:bpfnac,bpgene:bpgene,bpemail:bpemail,bptele:bptele,bpespe:bpespe,bpdirec:bpdirec,bpsico:bpsico},
        success: function(data) {
          listar();
          toastr.success('Se han procesado los datos correctamente','EXITO');
        }
      });
  //CERRAR MODAL
  $('#E_Profesor').modal('hide');
 });

////////////////////////////////////////////////////////////////////////////////////////////
$(document).on("click", ".btnAsig", function(){
  fila = $(this).closest("tr");
  proid = fila.find('td:eq(0)').text(); //capturo el ID
  pronom = fila.find('td:eq(2)').text();
  proape = fila.find('td:eq(3)').text();
  $("#principal").hide();
  $('#opciones').load('views/Profesor/V_Detalles.php',{ "proid": proid, "pronom" : pronom, "proape" : proape});
});
//////////////////////////////////////////////////////////////////////////////////////////
$(document).on("click", ".btnHora", function(){
  fila = $(this).closest("tr");
  proid = fila.find('td:eq(0)').text(); //capturo el ID
  pronom = fila.find('td:eq(2)').text();
  proape = fila.find('td:eq(3)').text();
  $("#principal").hide();
  $('#opciones').load('views/Profesor/V_Horario.php',{ "proid": proid, "pronom" : pronom, "proape" : proape});
});
/////////////////////////////////////////////////////////////////////////////////////////


});
