<?php

$join = $_SESSION['usuario_rol'] == 2 ? 'mens_us.id_usuario' : 'mens_us.remitente';

$sql = "SELECT 
  mens_us.*,
  usua.id_rol
FROM
  mensaje_usuarion AS mens_us
  JOIN usuarios AS usua  ON  mens_us.id_usuario = usua.usuario_id WHERE $join = '{$_SESSION['usuario']}'  ORDER BY mens_us.fecha DESC";
$listaMensajes = $conexion->query($sql);

$sql = "SELECT
mens_us.*,
GROUP_CONCAT(
    CONCAT_WS(' ', p.primer_nombre, p.apellido_paterno, p.apellido_materno)
    SEPARATOR ', '
) AS nombres
FROM
mensaje_usuarion AS mens_us
INNER JOIN mensajeria_grupo mg ON mg.id = mens_us.id_usuario
INNER JOIN mensajeria_grupo_alumno ma ON ma.grupo_id = mens_us.id_usuario
INNER JOIN estudiantes e ON e.estu_id = ma.alumno_id
INNER JOIN perfiles p ON p.perfil_id = e.perfil_id 
WHERE
mens_us.remitente = '{$_SESSION['usuario']}' 
AND mens_us.es_grupo = 1 
GROUP BY
mens_us.mensaje_id
ORDER BY
mens_us.fecha DESC 
";
$listaMensajesGrupos = $conexion->query($sql);


?>
<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Bandeja de Entrada</h3>

            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <input type="text" class="form-control input-sm" placeholder="Buscar">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <!-- /.btn-group -->
                <button onclick=" getBandeja()" type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                    1-2/2
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover">
                    <tbody>
                        <?php
                        foreach ($listaMensajes as $row_mens) {
                            $sql = "";
                            if ($row_mens['id_rol'] == 3 || $row_mens['id_rol'] == 5) {
                                $sql = "SELECT *  FROM padre_apoderado WHERE id_usuario = '{$row_mens['remitente']}'";
                                // echo $sql;
                                $nombre = "";
                                if ($rtep = $conexion->query($sql)->fetch_assoc()) {
                                    $nombre = $rtep['nombres'] . " " . $rtep['apellidos'];
                                }
                            } else {
                                $sql = "SELECT * FROM  perfiles WHERE id_usuario = '{$row_mens['remitente']}'";
                                //echo $sql;
                                $nombre = "";
                                if ($rtep = $conexion->query($sql)->fetch_assoc()) {
                                    $nombre = $rtep['primer_nombre'] . " " . $rtep['segundo_nombre'] . " " . $rtep['apellido_paterno'] . " " . $rtep['apellido_materno'];
                                }
                            }
                        ?>
                            <tr class="clickek" style="<?= $row_mens['estado'] == 0 ? 'background-color: #e6e6e6;' : '' ?>" onclick="getMensaje(<?= $row_mens['mensaje_id'] ?>)">
                                <td><input type="checkbox"></td>
                                <td class="mailbox-star"><a hidden href="javascript:void(0)"><i class="fa fa-star text-yellow"></i></a></td>
                                <td class="mailbox-name"><a href="javascript:void(0)"><?= $row_mens['asunto'] ?></a></td>
                                <td class="mailbox-subject"><b><?= $nombre ?></b> - <?php echo $row_mens['mensaje'] ?>
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date"></td>
                            </tr>
                        <?php  }

                        foreach ($listaMensajesGrupos as $row_mens) {
                        ?>
                            <tr class="clickek" style="<?= $row_mens['estado'] == 0 ? 'background-color: #e6e6e6;' : '' ?>" onclick="getMensaje(<?= $row_mens['mensaje_id'] ?>)">
                                <td><input type="checkbox"></td>
                                <td class="mailbox-star"><a hidden href="javascript:void(0)"><i class="fa fa-star text-yellow"></i></a></td>
                                <td class="mailbox-name"><a href="javascript:void(0)"><?= $row_mens['asunto'] ?></a></td>
                                <td class="mailbox-subject"><b><?= $row_mens['nombres'] ?></b> - <?php echo $row_mens['mensaje'] ?>
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date"></td>
                            </tr>
                        <?php  }
                        ?>




                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
    </div>
    <!-- /. box -->
</div>