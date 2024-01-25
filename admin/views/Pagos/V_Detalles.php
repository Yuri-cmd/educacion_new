<?php
  include "../../functions/BD.php";
  $tituldet = $_POST['conape'].' '.$_POST['connom'];
  $perfild = $_POST['perfild'];
  include "M_Pagos.php";
 ?>

<div class="row" id="detalle">
  <input type="hidden" id="idper" value="<?=$perfild;?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-calendar"></i>&nbsp;<?=$tituldet; ?> <small>Pagos</small> </h2>
        </div>
        <div class="col-lg-6 text-right">
          <a style="margin-top: 25px;" class="btn btn-success"  id="btnNuevo"><i class="fa fa-plus"></i> Agregar / Editar</a>
          <a style="margin-top: 25px;" class="btn btn-warning"  id="btnRegre"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
         <div class="box-body">
           <div class="table-responsive col-lg-12">
              <table id="tabledetalle" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-green-gradient">
                    <th class="text-center">#</th>
                    <th class="text-center">A&Ntilde;O</th>
                    <th class="text-center">ENERO</th>
                    <th class="text-center">FEBRERO</th>
                    <th class="text-center">MARZO</th>
                    <th class="text-center">ABRIL</th>
                    <th class="text-center">MAYO</th>
                    <th class="text-center">JUNIO</th>
                    <th class="text-center">JULIO</th>
                    <th class="text-center">AGOSTO</th>
                    <th class="text-center">SEPTIEMBRE</th>
                    <th class="text-center">OCTUBRE</th>
                    <th class="text-center">NOVIEMBRE</th>
                    <th class="text-center">DICIEMBRE</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
              </table>
            </div>
         </div> <!-- /.box-body -->
      </div><!-- /.box -->
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  var idper, opcion;
   idper = $.trim($('#idper').val());
   //
  function lista_pago(){
  opcion =8;
  $('#tabledetalle').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Pagos/Pagos.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,idper:idper},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tabledetalle = $('#tabledetalle').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]
             });
         } else {
           opcion =7;
           tabledetalle = $('#tabledetalle').DataTable({
                 "ajax":{
                     "url": "functions/Pagos/Pagos.php",
                     "method": 'POST', //usamos el metodo POST
                     "data": {opcion:opcion,idper:idper},
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "pag_id"},
                   {"data": "pag_anual"},
                   {"data": "pag_enero"},{"data": "pag_febrero"},{"data": "pag_marzo"},{"data": "pag_abril"},{"data": "pag_mayo"},
                   {"data": "pag_junio"},{"data": "pag_julio"},{"data": "pag_agosto"},{"data": "pag_septiembre"},{"data": "pag_octubre"},
                   {"data": "pag_noviembre"},{"data": "pag_diciembre"}
               ]
             });
            }
       }
     });
  }
  lista_pago();

  $('.select2').select2();
  //NUEVO
  $("#btnNuevo").click(function(){
    $("#formPagos").trigger("reset");
    $('#M_Pagos').modal('show');
    //$('.select2').select2();
  });

  $('#formPagos').submit(function(e){
    opcion =1;
    paganual = $.trim($('#paganual').val());
    pagmes = $.trim($('#pagmes').val());
    pagnot = $.trim($('#pagnot').val());
    e.preventDefault();
    $.ajax({
       url: "functions/Pagos/Pagos.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,paganual:paganual,pagmes:pagmes,pagnot:pagnot,idper:idper},
       success: function(data) {
         lista_pago();
         toastr.success('Se han procesado los datos correctamente','EXITO');
       }
     });
 //CERRAR MODAL
 $('#M_Pagos').modal('hide');
});




  //Cerrar Formulario
   $("#btnRegre").click(function(){
       $('#detalle').hide();
       $('#principal').show();
   });
   //


});
</script>
