var tableHistoUser;
function  infUserHisto(user) {
    tableHistoUser.rows().remove().draw();
    $.ajax({
        url: "/ajax/consulta",
        type:"POST",
        data:{"tipo":"consulHistoUser2",user},
        success: function (result){
            result = JSON.parse(result);
            console.log(result);
            result.forEach(function (item) {
                tableHistoUser.row.add([
                    item.historial_id,
                    item.fechaa,
                    item.hoaa,
                    'Ultimo Ingreso',
                    item.ip_user,
                ]).draw(false)
            })
        }
    })
}
$(document).ready(function() {
    tableHistoUser = $("#table-hist-list").DataTable({
        "order": [[ 0, "desc" ]]
    })
  var opcion, instid;
  instid = $.trim($('#instid').val());
  function listar(){
  opcion =9;
  $('#tablealumnos').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Alumno/Alumno.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablealumnos = $('#tablealumnos').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null]
             });
         } else {
           opcion =0;
           tablealumnos = $('#tablealumnos').DataTable({
                 "ajax":{
                     "url": "functions/Alumno/Alumno.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "perfil_id"},
                   {"data": "doc_numero"},
                   {"data": "nombrec"},
                   {"data": "apellidos"},
                   {"data": "fnac"},
                   {"data": "telefono_pricipal"},
                   {"data": "direccion"},
                   {"data": "perfil_id"}
               ],
               columnDefs: [
                   {
                       "targets": 7,
                       "render": function (data, type, row, meta){
                           return "<button data-toggle=\"modal\" data-target=\"#modal-histo-user\" onclick='infUserHisto("+data+")' class='btn btn-success btn-sm'><i class=\"fa fa-history\" aria-hidden=\"true\"></i></button>";
                       }
                   }
               ]
             });
         }
       }
     });
  }
  listar();





});
