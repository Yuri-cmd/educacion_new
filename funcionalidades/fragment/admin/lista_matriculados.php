<?php
$conexion = (new Conexion())->getConexion();

?>
<div class="box-header with-border">
    <div class="col-md-7">
        <h3 style="font-weight: bold;" class="box-title">Matricula</h3>
    </div>
    <div class="col-md-5 text-right">
        <button onclick="getFormulario()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</button>
        <button onclick="getListaNiveles()"  type="button" class="btn btn-warning"><i class="fa fa-arrow-left"></i></button>
    </div>
</div>
<div class="box-body">
    <div class="col-md-12 text-center">
        <h2>Lista de Matriculados para <?=$nivel?> del <?=$periodo?></h2>
    </div>
    <input type="hidden" id="nivel-id" value="<?=$nivel_id?>">
    <div class="col-md-12" >
        <table id="tabla-matriculados" style="" class="table table-bordered table-hover no-footer dataTable">
            <thead>
                <tr class="bg-green-gradient">
                    <th class="text-center">#</th>
                    <th class="text-center">Seccion y Grado</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">DNI</th>
                    <th class="text-center">Matriculado</th>
                    <th class="text-center">Bloquear</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            foreach ($lista as $item){
                //Tools::prettyPrint($item);
                ?>
                <tr>
                    <td class="text-center"><?=$item['estu_id']?></td>
                    <td class="text-center"><?=$item['nombre_grado'] .' - '.$item['seccion_nombre'] ?></td>
                    <td class="text-center"><?= $item['primer_nombre'].' '. $item['segundo_nombre']?></td>
                    <td class="text-center"><?= $item['apellido_paterno'].' '. $item['apellido_materno']?></td>
                    <td class="text-center"><?= $item['doc_numero']?></td>
                    <td class="text-center"><?= $item['fehca_matricula']?></td>
                    <?php

                    if ($item['estado_user']==5){  ?>
                        <td class="text-center"><input class="item-blq-user" checked data-stud="<?=$item['id_usuario']?>" type="checkbox"></td>
                    <?php  }else{  ?>
                        <td class="text-center"><input class="item-blq-user" data-stud="<?=$item['id_usuario']?>" type="checkbox"></td>
                    <?php
                    }
                    ?>
                    <td class="text-center"><button onclick="infUserHisto(<?=$item["id_usuario"]?>)" data-toggle="modal" data-target="#modal-histo-user" class="btn btn-success"><i class="fa fa-history" aria-hidden="true"></i></button></td>
                    <td class="text-center"><button onclick="getEditarEstudiate(<?=$item['estu_id']?>)" class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                    <td class="text-center">
                        <?php
                        
                       
                        if($item["id_usuario"]>0){
                            echo '<button data-toggle="modal" data-target="#mds-udt-uder" onclick="udtUser(\''.$item["id_usuario"].'\')" class="btn btn-primary"><i class="fa fa-user"></i></button>';
                        }

                        ?>
                         
                    </td>
                    <td><button onclick="eiminarEstuDessd('<?=$item["estu_id"]?>')" class="btn btn-danger"><i class="fa fa-times"></i></button></td>
                </tr>
            <?php }
            ?>
            </tbody>


        </table>
    </div>
</div>

<div class="modal fade" id="modal-histo-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Ultimos ingresos al Sistema</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <table style="width: 100%;" id="table-hist-list" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td></td>
                            <td>Fecha</td>
                            <td>Hora</td>
                            <td>Tipo</td>
                            <td>Ip</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mds-udt-uder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Usuario</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" id="user-edt-adm" >
      <div class="modal-body">
        <div class="form-group">
            <label for="usuerudtadmedt">Usuario</label>
            <input type="text" class="form-control" id="usuerudtadmedt" aria-describedby="emailHelp" placeholder="">
        </div>
        <div class="form-group">
            <label for="paserudtadmedt">Contaseña</label>
            <input type="text" class="form-control" id="paserudtadmedt" placeholder="">
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="udtUserSel()" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">

</div>

<script>
    function  infUserHisto(user) {
        tableHistoUser.rows().remove().draw();
        $.ajax({
            url: URL+"/ajax/consulta",
            type:"POST",
            data:{"tipo":"consulHistoUser",user},
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
    function udtUserSel(){
        const data={
            tipo:"resetuseradmudt",
            usri:$("#user-edt-adm").val(),
            user:$("#usuerudtadmedt").val(),
            pass:$("#paserudtadmedt").val()
        }
        $.ajax({
            type: "POST",
            url: URL+"/ajax/adm/alumn/resetusd",
            data: data,
            success: function(result){
                console.log(result);
                swal("Actualizado")
                $("#mds-udt-uder").modal("hide")

            }
        });

    }
    function udtUser(user){
        $.ajax({
            type: "POST",
            url: URL+"/ajax/abm/almun/usdalu",
            data: {user,tipo:"info-user-admalu"},
            success: function (result){
                var rest = JSON.parse(result);
                if(rest.res){
                    const data=rest.data
                    $("#user-edt-adm").val(data.usuario_id);
                    $("#usuerudtadmedt").val(data.usuario)
                    $("#paserudtadmedt").val(data.clave)
                }
            }
        });

    }
    var tableHistoUser;
    $(document).ready(function () {
        tableHistoUser = $("#table-hist-list").DataTable({
            "order": [[ 0, "desc" ]]
        })
        $("#tabla-matriculados").DataTable();
        $("#tabla-matriculados").on("click",".item-blq-user",function (evt){
            //console.log($(evt.currentTarget).attr('data-stud'))
            var etsd=1;
            if($(evt.currentTarget).is(':checked')) {
                etsd=5;
            }
            $.ajax({
                type: "POST",
                url: URL+"/ajax/consulta",
                data: {tipo:'desabiliteuseralumno',
                    user:$(evt.currentTarget).attr('data-stud'),
                    est:etsd
                },
                success: function (result){
                    console.log(result);
                    var rest = JSON.parse(result);

                }
            });
        })
    })
</script>