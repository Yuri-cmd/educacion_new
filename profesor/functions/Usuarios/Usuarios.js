$(document).ready(function() {
  var opcion, instid;
  instid = $.trim($('#instid').val());
  function listar(){
  opcion =9;
  $('#tableusuarios').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Usuarios/Usuarios.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tableusuarios = $('#tableusuarios').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null,null,null]
             });
         } else {
           opcion =0;
           tableusuarios = $('#tableusuarios').DataTable({
                 "ajax":{
                     "url": "functions/Usuarios/Usuarios.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "usuario_id"},
                   {"data": "doc_numero"},
                   {"data": "nombrec"},
                   {"data": "email"},
                   {"data": "usuario"},
                   {"data": "nombre"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEdit'></button>"},
                   {"defaultContent": "<button class='btn btn-danger btn-sm glyphicon glyphicon-edit btnBloq'></button>"}
               ]
             });
         }
       }
     });
  }
  listar();
  //////////////////////////////////////////////////////////////////////////////
  //Agregar Usuarios
  $("#btnNuevo").click(function(){
      $("#formUsario").trigger("reset");
      $('#M_Usuario').modal('show');
  });
  //////////////////////////////////////////////////////////////////////////////
  //ENVIAR DATOS
  $('#formUsario').submit(function(e){
  opcion =1;
  ptdoc = $.trim($('#ptdoc').val());
  pnumd =  $.trim($('#pnumd').val());
  pnomb1 = $.trim($('#pnomb1').val());
  pnomb2 = $.trim($('#pnomb2').val());
  pape1 = $.trim($('#pape1').val());
  pape2 = $.trim($('#pape2').val());
  pfnac = $.trim($('#pfnac').val());
  pemail = $.trim($('#pemail').val());
  ptele = $.trim($('#ptele').val());
  selrol = $.trim($('#selrol').val());
  pgene = $.trim($('#pgene').val());
  pdirec = $.trim($('#pdirec').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Usuarios/Usuarios.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,instid:instid,ptdoc:ptdoc,pnumd:pnumd,pnomb1:pnomb1,pnomb2:pnomb2,pape1:pape1,pape2:pape2,pfnac:pfnac,pemail:pemail,ptele:ptele,selrol:selrol,pgene:pgene,pdirec:pdirec},
         success: function(data) {
           listar();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#M_Usuario').modal('hide');
  });
  //////////////////////////////////////////////////////////////////////////////
  $(document).on("click", ".btnEdit", function(){
      opcion =2;
      fila = $(this).closest("tr");
      idusi = fila.find('td:eq(0)').text(); //capturo el ID
      bpnumd = fila.find('td:eq(1)').text();
      $.ajax({
        type:"POST",
        url: "functions/Usuarios/Usuarios.php",
        datatype:"json",
        data:{idusi:idusi,opcion:opcion},
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
           var  bptele = item.telefono_pricipal;
           var  bpdirec = item.direccion;
           var  bperfi = item.perfil_id;
        }
      //DATOS FALTANTES
      $("#bpnomb1").val(bpnomb1);
      $("#bpnomb2").val(bpnomb2);
      $("#bpape1").val(bpape1);
      $("#bpape2").val(bpape2);
      $("#bpfnac").val(bpfnac);
      $("#bpemail").val(bpemail);
      $("#bptele").val(bptele);
      $("#bpdirec").val(bpdirec);
      $("#bperfi").val(bperfi);
      }
    });
      $("#idusi").val(idusi);
      $("#bpnumd").val(bpnumd);
      //DESPLEGAR EL MODAL CON LOS DATOS
      $('#E_Usuario').modal('show');
  });
////////////////////////////////////////////////////////////////////////////////
//ENVIAR DATOS
$('#formEusario').submit(function(e){
opcion =3;
idusi = $.trim($('#idusi').val());
bperfi = $.trim($('#bperfi').val());
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
bpdirec = $.trim($('#bpdirec').val());
bselrol = $.trim($('#bselrol').val());
e.preventDefault();
$.ajax({
       url: "functions/Usuarios/Usuarios.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,idusi:idusi,bperfi:bperfi,bptdoc:bptdoc,bpnumd:bpnumd,bpnomb1:bpnomb1,bpnomb2:bpnomb2,bpape1:bpape1,bpape2:bpape2,bpfnac:bpfnac,bpgene:bpgene,bpemail:bpemail,bptele:bptele,bpdirec:bpdirec,bselrol:bselrol},
       success: function(data) {
         listar();
         toastr.success('Se han procesado los datos correctamente','EXITO');
       }
     });
 //CERRAR MODAL
 $('#E_Usuario').modal('hide');
});
////////////////////////////////////////////////////////////////////////////////
$(document).on("click", ".btnBloq", function(){
    fila = $(this).closest("tr");
    idusib = fila.find('td:eq(0)').text(); //capturo el ID
    estatusb = fila.find('td:eq(5)').text();
    $("#idusib").val(idusib);
    //DESPLEGAR EL MODAL CON LOS DATOS
    if (estatusb =='PADRE DE FAMILIA' || estatusb =='MADRE DE FAMILIA' || estatusb =='APODERADO') {
        $('#M_Bloquea').modal('show');
    }

});
////////////////////////////////////////////////////////////////////////////////
//ENVIAR DATOS
$('#formBloquea').submit(function(e){
opcion =4;
idusib = $.trim($('#idusib').val());
e.preventDefault();
$.ajax({
       url: "functions/Usuarios/Usuarios.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,idusib:idusib},
       success: function(data) {
        listar();
        toastr.success('Se han procesado los datos correctamente','EXITO');
       }
     });
 //CERRAR MODAL
 $('#M_Bloquea').modal('hide');
});



});
