<?php

$sqlu="SELECT u.usuario_id,u.usuario, r.nombre, u.email, u.usuario FROM usuarios u, usuario_rol r
WHERE u.id_rol = r.rol_id AND u.usuario_id='$idusua'";
$resu = mysqli_query($con,$sqlu);
$arru = mysqli_fetch_array($resu,MYSQLI_ASSOC);
$grupo = $arru['nombre'];
$usuario = $arru['usuario'];
 ?>
<style>
  .ualto {
    height: 125px;
  }
</style>
<div class="modal fade" id="M_Perfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" ><i class="fa fa-user"></i>&nbsp;Actualizar Usuario </h3>
          </div>
          <form  id="frmajax1" >
          <div class="modal-body ualto">
              <input type="hidden" name="perid" value="<?=$idusua;?>" id="perid">
              <div class="form-group col-xs-12 col-md-12 col-lg-4">
                <label>USUARIO:</label>
               <input class="form-control" name="txtusuario" value="<?=$usuario; ?>" id="pnomup" disabled>
              </div>
               <div class="form-group col-xs-12 col-md-12 col-lg-4">
               <label>GRUPO:</label>
               <input class="form-control text-uppercase" name="txtgrup" value="<?=$grupo; ?>" disabled>
             </div>
             <div class="form-group col-xs-12 col-md-12 col-lg-4">
               <label>CONTRASEÑA:</label>
               <input type="password" class="form-control" name="txtclave" id="ppass"  pattern="[A-z0-9 ].{1,}" title="Ingrese solo letras" required>
             </div>
          </div>
          <div class="modal-footer">
           <div class="col-lg-12">
            <button type="submit" class="btn btn-sm btn-success" name="Submit" value="Save"><i class="glyphicon glyphicon-floppy-saved"></i> Guardar </button>
            <button type="button" class="btn btn-danger btn-sm pull-right" id="btnLimpio" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Cerrar</button></form>
          </div></div>
      </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
  $("#btnLimpio").click(function(){
      $("#frmajax1").trigger("reset");
  });
  //Autofocus Modal
  $(".modal").on('shown.bs.modal', function(){
      $(this).find('#ppass').focus();
  });

  //
  $('#frmajax1').submit(function(e){
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      perid= $.trim($('#perid').val());
      opcion = 8;
      ppass = $.trim($('#ppass').val());
      pnomup = $.trim($('#pnomup').val());
      $.ajax({
            url:"functions/Usuarios/Usuarios.php",
            type: "POST",
            datatype:"json",
            data:  {perid:perid,ppass:ppass,pnomup:pnomup,opcion:opcion},
            success: function(data) {
              toastr.success('Se han procesado los datos correctamente','EXITO');
            }
          });
      $('#M_Perfil').modal('hide');
      $("#frmajax1").trigger("reset");
    });
	});
</script>
