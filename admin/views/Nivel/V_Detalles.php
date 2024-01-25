<?php
  $form = $_POST['form'];
  if ($form =='grado') {
    $tituldet = "Grados";
  } else {
    $tituldet = "Cursos";
  }


  $idniv = $_POST['idniv'];
  $ninom = $_POST['ninom'];
  ##########################
  include "M_Grado.php";
  include "E_Grado.php";
  ##########################
  include "M_Curso.php";
  include "E_Curso.php";

 ?>

<div class="row" id="detalle">
  <input type="hidden" name="idniv" id="idniv" value="<?=$idniv; ?>">
  <input type="hidden" name="ntipo" id="ntipo" value="<?=$form; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-mortar-board"></i>&nbsp;<?=$tituldet; ?> <small><?=$ninom; ?></small> </h2>
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

              <table id="tablegrado" class="table table-bordered table-hover">
                <thead>
                  <?php if ($form =='grado'): ?>
                <tr class="bg-green-gradient">
                  <th class="text-center">#</th>
                  <th class="text-center">GRADO</th>
                  <th class="text-center">ABREVIATURA</th>
                  <th class="text-center">EDITAR</th>
                </tr>
                <?php else: ?>
                  <tr class="bg-green-gradient">
                    <th class="text-center">#</th>
                    <th class="text-center">CURSO</th>
                    <th class="text-center">DESCRIPCION</th>
                    <th class="text-center">EDITAR</th>
                  </tr>
                <?php endif; ?>
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
   idniv = $.trim($('#idniv').val());
   ntipo = $.trim($('#ntipo').val());
   //Libreria
     $('input[type=file]').bootstrapFileInput();
   //NUEVO
   $("#btnNuev").click(function(){
     if (ntipo=='grado') {
       $("#formGrado").trigger("reset");
       $('#M_Grado').modal('show');
     }
     if (ntipo=='cursos') {
       $("#formCurso").trigger("reset");
       $('#M_Curso').modal('show');
     }
   });
   //
  function lista_grado(){
  opcion =4;
  $('#tablegrado').DataTable().clear().destroy();
  $.ajax({
       url: "functions/Nivel/Nivel.php",
       type: "POST",
       datatype:"json",
       data:  {opcion:opcion,idniv:idniv,ntipo:ntipo},
       success: function(data) {
         //RECORRER OBJETO JS
         let ObjetoJSS = JSON.parse(data);
         for (let itemm of ObjetoJSS){ var listar = itemm.data; }
         if (listar==0) {
           tablegrado = $('#tablegrado').DataTable({
             "autoWidth" : false,
             "columns":[null,null,null]
             });
         } else {
           opcion =5;
            if (ntipo=='cursos') {
           tablegrado = $('#tablegrado').DataTable({
                 "ajax":{
                     "url": "functions/Nivel/Nivel.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion,idniv:idniv,ntipo:ntipo}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "curso_id"},
                   {"data": "nombre"},
                   {"data": "descripcion"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEditg'></button>"}
               ]
             });
            }
            if (ntipo=='grado') {
           tablegrado = $('#tablegrado').DataTable({
                 "ajax":{
                     "url": "functions/Nivel/Nivel.php",
                     "method": 'POST', //usamos el metodo POST
                     "data":{opcion:opcion,idniv:idniv,ntipo:ntipo}, //enviamos opcion 4 para que haga un SELECT
                     "dataSrc":""
                 },
                "autoWidth"   : false,
                 "columns":[
                   {"data": "grado_id"},
                   {"data": "nombre_grado"},
                   {"data": "abreviatura"},
                   {"defaultContent": "<button class='btn btn-warning btn-sm glyphicon glyphicon-edit btnEditg'></button>"}
               ]
             });
            }


         }
       }
     });
  }
  lista_grado();

    //ENVIAR DATOS
    $('#formGrado').submit(function(e){
    opcion =6;
    granom = $.trim($('#granom').val());
    graabre = $.trim($('#graabre').val());
    e.preventDefault();
    $.ajax({
           url: "functions/Nivel/Nivel.php",
           type: "POST",
           datatype:"json",
           data:  {opcion:opcion,granom:granom,graabre:graabre,idniv:idniv},
           success: function(data) {
               lista_grado();
             toastr.success('Se han procesado los datos correctamente','EXITO');
           }
         });
     //CERRAR MODAL
     $('#M_Grado').modal('hide');
    });


    //FORMULARIO CURSO
    $("#formCurso").submit(function(e){
      e.preventDefault();
      opcion =10;
      var formData = new FormData();
      var curnom = $.trim($('#curnom').val());
      var curdesc = $.trim($('#curdesc').val());
      var action = $.trim($('#action').val());
      var files = $('#uploadImage1')[0].files[0];
      formData.append('file',files);
      formData.append('idniv',idniv);
      formData.append('curnom',curnom);
      formData.append('curdesc',curdesc);
      formData.append('opcion',opcion);
      formData.append('action',action);
      $.ajax({
            url: "functions/Nivel/Nivel.php",
            type: "POST",
            datatype:"json",
            data:  formData,
            contentType: false,
            processData: false,
            success: function(data) {
              lista_grado();
              toastr.success('Se han procesado los datos correctamente','EXITO');
            }
          });
      $('#M_Curso').modal('hide');
     });



    $(document).on("click", ".btnEditg", function(){
        fila = $(this).closest("tr");
        if (ntipo=='grado') {
        idgrad = fila.find('td:eq(0)').text(); //capturo el ID
        gradnomb = fila.find('td:eq(1)').text();
        gradabre = fila.find('td:eq(2)').text();
        $("#granomb").val(gradnomb);
        $("#graabreb").val(gradabre);
        $("#idgrad").val(idgrad);
        //DESPLEGAR EL MODAL CON LOS DATOS
        $('#E_Grado').modal('show');
      }
//
      if (ntipo=='cursos') {
        opcion =11;
        idcur = fila.find('td:eq(0)').text();
        curnomb = fila.find('td:eq(1)').text();
        curdesc = fila.find('td:eq(2)').text();
        $("#idcurb").val(idcur);
        $("#bcurnom").val(curnomb);
        $("#bcurdesc").val(curdesc);
        $.ajax({
               url: "functions/Nivel/Nivel.php",
               type: "POST",
               datatype:"json",
               data:  {opcion:opcion,idcur:idcur},
               success: function(data) {
                 let ObjetoJSS = JSON.parse(data);
                 for (let itemm of ObjetoJSS)
                  {
                    var logo = itemm.logo2;

                  }
                if (logo !='0') {
                  $(".cargaim").attr("src", "../images/Institucion/Cursos/"+logo);
                } else {
                   $(".cargaim").attr("src", "../images/Institucion/noimage.png");

                }
               }
             });

        $('#E_Curso').modal('show');
      }
    });

    //FORMULARIO CURSO
    $("#formeCurso").submit(function(e){
      e.preventDefault();
      opcion =8;
      var formData = new FormData();
      var idcurb = $.trim($('#idcurb').val());
      var bcurnom = $.trim($('#bcurnom').val());
      var bcurdesc = $.trim($('#bcurdesc').val());
      var action2 = $.trim($('#action2').val());
      var files = $('#uploadImage2')[0].files[0];
      formData.append('file',files);
      formData.append('idcurb',idcurb);
      formData.append('bcurnom',bcurnom);
      formData.append('bcurdesc',bcurdesc);
      formData.append('opcion',opcion);
      formData.append('idniv',idniv);
      formData.append('action2',action2);
      $.ajax({
            url: "functions/Nivel/Nivel.php",
            type: "POST",
            datatype:"json",
            data:  formData,
            contentType: false,
            processData: false,
            success: function(data) {
              lista_grado();
              toastr.success('Se han procesado los datos correctamente','EXITO');
            }
          });
      $('#E_Curso').modal('hide');
     });




    //ENVIAR DATOS
    $('#formEGrado').submit(function(e){
    opcion =7;
    granomb = $.trim($('#granomb').val());
    graabreb = $.trim($('#graabreb').val());
    idgrad = $.trim($('#idgrad').val());
    e.preventDefault();
    $.ajax({
           url: "functions/Nivel/Nivel.php",
           type: "POST",
           datatype:"json",
           data:  {opcion:opcion,granomb:granomb,graabreb:graabreb,idgrad:idgrad},
           success: function(data) {
             lista_grado();
             toastr.success('Se han procesado los datos correctamente','EXITO');
           }
         });
     //CERRAR MODAL
     $('#E_Grado').modal('hide');
    });

  //Cerrar Formulario
   $("#btnRegre").click(function(){
       $('#detalle').hide();
       $('#principal').show();
   });
   //
   function refresh() {
   setTimeout(function () {
       location.reload()
   }, 1500);
 }

});
</script>
