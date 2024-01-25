<?php
  include "../../functions/BD.php";
  //
  $pronom = $_POST['pronom'];
  $proape = $_POST['proape'];
  $proid = $_POST['proid'];
/*
  $graid = $_POST['graid'];
  $granom = $_POST['granom'];
  $nilnom = $_POST['nilnom'];
*/
 include "M_Gcurso.php";
 include "R_Curso.php";

 ?>

<div class="row" id="detalle">
  <input type="hidden" name="proid" id="proid" value="<?=$proid; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-mortar-board"></i>&nbsp;<?=$pronom.' '.$proape; ?> <small>Grados / Cursos / Secciones</small> </h2>
        </div>
        <div class="col-lg-6 text-right">
          <a style="margin-top: 25px;" class="btn btn-success" id="btnNuev"><i class="fa fa-plus"></i> Agregar</a>
            <a style="margin-top: 25px;" class="btn btn-warning"  id="btnRegre"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
         <div class="box-body">
           <div class="table-responsive col-lg-12">
              <table id="tablecurso" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-green-gradient">
                    <th class="text-center">#</th>
                    <th class="text-center">NIVEL</th>
                    <th class="text-center">GRADO</th>
                    <th class="text-center">CURSO</th>
                    <th class="text-center">SECCION</th>
                    <th class="text-center">ELIMINAR</th>
                  </tr>
                </thead>
                <tbody class="text-center"></tbody>
              </table>
            </div>
         </div> <!-- /.box-body -->
      </div><!-- /.box -->
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  var proid, opcion;
   proid = $.trim($('#proid').val());
   //NUEVO
   $("#btnNuev").click(function(){
       $("#formGcurso").trigger("reset");
       $('.select2').select2();
       $('#M_Gcurso').modal('show');
   });

   //CARGAR GRADO
   $("#selnivel").on('change', function () {
    $("#selnivel option:selected").each(function () {
        var id_nil = $(this).val();
        var tipo = 'G';
        $.post("views/Profesor/Opciones.php", { id_nil: id_nil, tipo:tipo }, function(data) {
            $("#selgrado").html(data);
        });
        $('#selcurso').empty().trigger('change');
    });
  });
  // CARGAR CURSO
  $("#selgrado").on('change', function () {
   $("#selgrado option:selected").each(function () {
       var id_grad = $(this).val();
       var tipo = 'C';
       var tip = 'S';
       $.post("views/Profesor/Opciones.php", { id_grad: id_grad, tipo:tipo }, function(data) {
           $("#selcurso").html(data);
       });
       $.post("views/Profesor/Opciones.php", { id_grad: id_grad, tip:tip }, function(data) {
           $("#selsecci").html(data);
       });
   });
 });

 //
 //ENVIAR DATOS
 $('#formGcurso').submit(function(e){
 opcion =7;
 selnivel = $.trim($('#selnivel').val());
 selgrado = $.trim($('#selgrado').val());
 selcurso = $.trim($('#selcurso').val());
 selsecci = $.trim($('#selsecci').val());
 e.preventDefault();
 $.ajax({
        url: "functions/Profesor/Profesor.php",
        type: "POST",
        datatype:"json",
        data:  {opcion:opcion,selnivel:selnivel,selgrado:selgrado,selcurso:selcurso,selsecci:selsecci,proid:proid},
        success: function(data) {
          lista_grado();
          toastr.success('Se han procesado los datos correctamente','EXITO');
        }
      });
  //CERRAR MODAL
  $('#M_Gcurso').modal('hide');
 });


   //
  function lista_grado(){
  opcion =5;
  $('#tablecurso').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Profesor/Profesor.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,proid:proid},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablecurso = $('#tablecurso').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null,null,null]
             });
         } else {
           opcion =6;
           tablecurso = $('#tablecurso').DataTable({
                 "ajax":{
                     "url": "functions/Profesor/Profesor.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion,proid:proid}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "curso_doce_id"},
                   {"data": "nombre_nivel"},
                   {"data": "nombre_grado"},
                   {"data": "descripcion"},
                   {"data": "nombre"},
                   {"defaultContent": "<button class='btn btn-danger btn-sm glyphicon glyphicon-remove btnElim'></button>"}
               ]
             });
            }
       }
     });
  }
  lista_grado();

  $(document).on("click", ".btnElim", function(){
      fila = $(this).closest("tr");
      idcurss = fila.find('td:eq(0)').text(); //capturo el ID
      $("#idcurss").val(idcurss);
      //DESPLEGAR EL MODAL CON LOS DATOS
      $('#R_Curso').modal('show');
  });


  //ENVIAR DATOS
  $('#formRcurso').submit(function(e){
  opcion =8;
  idcurss = $.trim($('#idcurss').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Profesor/Profesor.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,idcurss:idcurss},
         success: function(data) {
           lista_grado();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#R_Curso').modal('hide');
  });




  //Cerrar Formulario
   $("#btnRegre").click(function(){
       $('#detalle').hide();
       $('#principal').show();
   });
   //

});
</script>
