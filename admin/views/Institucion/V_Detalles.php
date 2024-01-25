<?php
  $form = $_POST['form'];
  if ($form =='nuevo') {
    $tituf = "Nueva Instituci&oacute;n";
  } else{
    $idinst = $_POST['idinst'];
    $tituf = "Actualizar Instituci&oacute;n";
  }
 ?>
 <style type="text/css">
 .bordegreen{
   border: 2px solid  #00a65a;
   border-radius: 5px;
   margin: 5px 0 2px 0px;
 }
 </style>
<div class="row" id="detalle">
  <input type="hidden" id="idinst" value="<?=$idinst; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-building-o"></i>&nbsp;<?=$tituf;?> <small class='tituven'></small></h2>
        </div>
        <div class="col-lg-6 text-right">
            <a style="margin-top: 25px;" class="btn btn-warning"  id="btnRegre"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
      <form  id="formInsti" >
         <input name="action" id="action" type="hidden" value="upload" />
      <div class="box-body">
                <div class="form-group col-md-12 col-xs-12 col-lg-3">
                 <img id="uploadPreview1" class="bordeazul bordegreen" width="100%" height="180" src="../images/Institucion/noimage.png" />
                 <input height="20" class="form-control btn btn-success cargaim" title="AGREGAR FOTO" accept="image/png, image/jpeg, image/gif" id="uploadImage1" type="file" name="uploadImage1" onchange="previewImage(1);" />
                </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-2">
               <label>RUC:</label>
               <input class="form-control" placeholder="000000000" name="txtruc" id="iruc" pattern="[0-9+].{6,}" title="Ingrese numeros" required>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-5">
               <label>RAZ&Oacute;N SOCIAL:</label>
               <input class="form-control text-uppercase" name="txtnom" id="inombre"  pattern="[A-z0-9 ].{1,}" title="Ingrese solo letras" required>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-2">
               <label>TELEFONO: <small>Local</small></label>
               <input class="form-control" placeholder="+00-000000" id="itele" name="txttlocal" pattern="[0-9+].{6,}">
             </div>

             <div class="form-group col-xs-12 col-md-12 col-lg-3">
               <label>EMAIL: </label>
               <input class="form-control" name="cmail" id="iemail"  title="Ingrese correo electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="ejemplo@gmail.com">
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-2">
               <label>DNI : <small>Director</small></label>
               <input class="form-control text-uppercase" name="txtrespon" id="idni"  pattern="[A-z0-9 ].{1,}" title="Ingrese solo letras" required>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-4">
               <label>DIRECTOR: </label>
               <input class="form-control text-uppercase" name="txtrespon" id="irespo"  pattern="[A-z0-9 ].{1,}" title="Ingrese solo letras" required>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-9">
               <label>DIRECCI&Oacute;N:</label>
               <textarea class="form-control text-uppercase" rows="3" name="txtdirec" id="idirec" placeholder="Ingrese Direccion" pattern="^([a-zA-Z ])[a-zA-Z0-9-_–\. ]+{1,60}$" required></textarea>
             </div>
             <div class="col-lg-12 text-right">
               <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-floppy-saved"></i> Guardar </button>

             </div>

      </div> <!-- /.box-body -->
      </form>
    </div><!-- /.box -->
  </div>
</div>
<script type="text/javascript">
function previewImage(nb) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);
    reader.onload = function (e) {
        document.getElementById('uploadPreview'+nb).src = e.target.result;
    };
}
$(document).ready(function() {
  var idinst, opcion;
  $('input[type=file]').bootstrapFileInput();
  idinst = $.trim($('#idinst').val());
  //ENVIAR DATOS
  $('#formInsti').submit(function(e){
    opcion =2;
     e.preventDefault();
    var formData = new FormData();
    var iruc = $.trim($('#iruc').val());
    var inombre = $.trim($('#inombre').val());
    var itele = $.trim($('#itele').val());
    var iemail = $.trim($('#iemail').val());
    var idni = $.trim($('#idni').val());
    var irespo = $.trim($('#irespo').val());
    var idirec = $.trim($('#idirec').val());
    var action = $.trim($('#action').val());
    var files = $('#uploadImage1')[0].files[0];
    formData.append('file',files);
    formData.append('iruc',iruc);
    formData.append('inombre',inombre);
    formData.append('itele',itele);
    formData.append('iemail',iemail);
    formData.append('idni',idni);
    formData.append('irespo',irespo);
    formData.append('idirec',idirec);
    formData.append('opcion',opcion);
    formData.append('action',action);
    formData.append('idinst',idinst);
    //AJAX: PASO DE DATOS AL PHP
    $.ajax({
          url: "functions/Institucion/Institucion.php",
          type: "POST",
          datatype:"json",
          data:  formData,
          contentType: false,
          processData: false,
          success: function(data) {
            //actualizar datatables
            //listar();
            toastr.success('Se han procesado los datos correctamente','EXITO');
            refresh();
          }
        });
    //$('#M_Alumno').modal('hide');
  });
  Cargadatos(idinst);
  function Cargadatos (id){
    opcion = 3;
    if (idinst !='0') {
      $.ajax({
           url: "functions/Institucion/Institucion.php",
           type: "POST",
           datatype:"json",
           data:  {opcion:opcion,idinst:idinst},
           success: function(data) {
             //RECORRER OBJETO JS
               let ObjetoJSS = JSON.parse(data);
               for (let itemm of ObjetoJSS)
                {
                  var iruc = itemm.insti_ruc;
                  var inombre = itemm.insti_razon_social;
                  var itele = itemm.insti_telefono1;
                  var iemail =  itemm.insti_email;
                  var idni = itemm.insti_ndni;
                  var irespo = itemm.insti_director;
                  var idirec = itemm.insti_direccion;
                  var logo = itemm.insti_logo;
                }
             $("#iruc").val(iruc);
             $("#inombre").val(inombre);

             $("#itele").val(itele);
             $("#iemail").val(iemail);
             $("#idni").val(idni);
             $("#irespo").val(irespo);
             $("#idirec").val(idirec);
             if (logo !='') {
               $("#uploadPreview1").attr("src", "../images/Institucion/"+logo);
             } else {
                 $("#uploadPreview1").attr("src", "../images/Institucion/noimage.png");
             }
           }
         });
    }
  }

  //Cerrar Formulario
   $("#btnRegre").click(function(){
       opcion = 1;
       refresh();
   });
   //
   function refresh() {
   setTimeout(function () {
       location.reload()
   }, 1500);
 }

});
</script>
