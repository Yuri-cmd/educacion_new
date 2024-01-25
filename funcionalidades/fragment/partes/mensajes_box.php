<?php
$conexion = (new Conexion())->getConexion();
$usuario = $_SESSION['usuario'];
//echo $usuario;
$sql ="SELECT count(*) as 'cnt_msg' FROM mensaje_usuarion WHERE id_usuario = '$usuario' AND estado = '0'";
$contador_newMen = 0;

if ($row_s = $conexion->query($sql)->fetch_assoc()){
    $contador_newMen = $row_s['cnt_msg'];
}

?>
<div class="row">
    <div class="col-md-3">
        <button data-toggle="modal" data-target="#modal-mensaje"  class="btn btn-success btn-block margin-bottom"><i class="fa fa-plus"></i> Nueva Noticación</button>

        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Folders</h3>

                <div class="box-tools">
                    <button onclick="iniciamodal()" type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active" onclick=" getBandeja()"><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Recibidos
                            <?=$contador_newMen != 0?'<span class="label label-primary pull-right">'.$contador_newMen.'</span>':''  ?>

                        </a></li>

                    <li><a href="#"><i class="fa fa-envelope-o"></i> Enviados</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div id="cont-prim">
        <?php include "bandeja_entrada.php"?>
    </div>

</div>

<div style="" class="modal fade" id="modal-mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Mensaje</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="usuario_send">
                    <label for="usurio-para">Para:</label>
                    <input type="text" id="usurio-para"  class="form-control" autocomplete="off"  placeholder="">
                </div>
                <div class="form-group">
                    <label for="asuntoooo">Asunto:</label>
                    <input type="text" class="form-control" id="asuntoooo" placeholder="">
                </div>
                <div class="form-check">
                    <label >Mensaje:</label>
                    <div id="mensaje-con"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="enviarMensaje()" class="btn btn-primary">Enviar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            </div>

        </div>
    </div>
</div>
<style>
    #ui-id-1{
        z-index: 1065;
    }
</style>
<script>
    function  enviarMensaje(){
        if ($("#usuario_send").val().length>0){
            $.ajax({
                type: "POST",
                url: URL+"/ajax/mensaje",
                data: {tipo:'send',user:$("#usuario_send").val(),
                    asunto:$("#asuntoooo").val(),
                    mensaje:$("#mensaje-con").summernote('code')},
                success: function (res) {
                    console.log(res);
                    if (res){
                        $('#modal-mensaje').modal('hide')
                        $("#usuario_send").val('')
                        $("#asuntoooo").val('')
                        $("#mensaje-con").summernote('code','')
                        swal("Exitoso","Mensaje enviado","success")
                    }else{
                        swal("Error","Mensaje no enviado","error")
                    }
                }
            });
        }else{
            swal("Alerta","Busque el usuario","error")
        }
    }
    function iniciamodal(){
        /*$("#mensaje-con").summernote({
            height: 200,
        })*/
    }
    window.onload = function() {
        $("#mensaje-con").summernote({
            height: 200,
        })

        $("#usurio-para").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: URL+"/ajax/buscarusuario",
                    data: {term: request.term},
                    success: function (data) {

                        console.log(data);
                        response(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText)
                    },
                    dataType: 'json'
                });
            },
            minLength: 2,
            select: function (event, ui) {
                console.log(ui.item)
                $("#usuario_send").val(ui.item.id_usuario)

            }
        });
    };
    function getMensaje(mensaje) {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/fragmento",
            data:{part:'mensaje_fro',codmens: mensaje},
            success: function (resp) {
                //console.log(resp)
                $("#cont-prim").html(resp);
                $("#loader-menor").hide();
            }
        });
    }
    function getBandeja() {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL+"/fragmento",
            data:{part:'bandeja_entrada'},
            success: function (resp) {
                //console.log(resp)
                $("#cont-prim").html(resp);
                $("#loader-menor").hide();
            }
        });

    }
</script>
