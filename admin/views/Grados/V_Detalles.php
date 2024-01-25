<?php
  include "../../functions/BD.php";
  $form = $_POST['form'];
  $tituldet = $_POST['granom'];


  $graid = $_POST['graid'];
  $granom = $_POST['granom'];
  $nilnom = $_POST['nilnom'];

  include "M_Curso.php";
  include "R_Curso.php";

 ?>

<div class="row" id="detalle">
  <input type="hidden" name="graid" id="graid" value="<?=$graid; ?>">
  <input type="hidden" name="ntipo" id="ntipo" value="<?=$form; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-mortar-board"></i>&nbsp;<?=$tituldet; ?> <small>Cursos</small> </h2>
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
                    <th class="text-center">CURSO</th>
                    <th class="text-center">DESCRIPCION</th>
                    <th class="text-center">EDITAR</th>
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
  var idniv, opcion, ntipo;
   graid = $.trim($('#graid').val());
   ntipo = $.trim($('#ntipo').val());
   //NUEVO
   $("#btnNuev").click(function(){
     if (ntipo=='cursos') {
       $("#formCurso").trigger("reset");
       $('.select2').select2();
       $('#M_Curso').modal('show');
     }
   });
   //
  function lista_grado(){
  opcion =3;
  $('#tablecurso').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Grados/Grados.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,graid:graid,ntipo:ntipo},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablecurso = $('#tablecurso').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null,null]
             });
         } else {
           opcion =4;
           tablecurso = $('#tablecurso').DataTable({
                 "ajax":{
                     "url": "functions/Grados/Grados.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion,graid:graid,ntipo:ntipo}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "grac_id"},
                   {"data": "nombre"},
                   {"data": "descripcion"},
                   {"defaultContent": "<button class='btn btn-danger btn-sm glyphicon glyphicon-remove btnElim'></button>"}
               ]
             });
            }
       }
     });
  }
  lista_grado();


  //ENVIAR DATOS
  $('#formCurso').submit(function(e){
  opcion =5;
  cur_id = $.trim($('#cur_id').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Grados/Grados.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,cur_id:cur_id,graid:graid},
         success: function(data) {
           lista_grado();
           toastr.success('Se han procesado los datos correctamente','EXITO');
         }
       });
   //CERRAR MODAL
   $('#M_Curso').modal('hide');
  });


//
  $(document).on("click", ".btnElim", function(){
      fila = $(this).closest("tr");
      idgrad = fila.find('td:eq(0)').text(); //capturo el ID
      $("#ebid").val(idgrad);
      //DESPLEGAR EL MODAL CON LOS DATOS
      $('#R_Curso').modal('show');
  });


  //ENVIAR DATOS
  $('#formRcurso').submit(function(e){
  opcion =7;
  ebid = $.trim($('#ebid').val());
  e.preventDefault();
  $.ajax({
         url: "functions/Grados/Grados.php",
         type: "POST",
         datatype:"json",
         data:  {opcion:opcion,ebid:ebid},
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
