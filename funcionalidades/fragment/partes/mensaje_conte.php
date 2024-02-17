<?php
$sql = "SELECT es_grupo FROM mensaje_usuarion WHERE mensaje_id = '$mensaje_cod'";
$esGrupo = $conexion->query($sql)->fetch_assoc();

$join = $_SESSION['usuario_rol'] == 2 ? 'mens_us.id_usuario' : 'mens_us.remitente';

$sql = "SELECT
CONCAT_WS( ' ', p.primer_nombre, p.apellido_paterno ) as dato, mr.respuesta,
mr.creado_el as fecha
FROM
mensaje_usuarion AS mens_us
INNER JOIN mensajeria_respuestas mr ON mr.id_mensaje = mens_us.mensaje_id
INNER JOIN usuarios u ON u.usuario_id = mr.id_usuario 
INNER JOIN perfiles p ON p.id_usuario = u.usuario_id 
WHERE
$join = '{$_SESSION['usuario']}' 
AND mens_us.es_grupo = {$esGrupo['es_grupo']} 
and mens_us.mensaje_id = '$mensaje_cod'
ORDER BY
mens_us.fecha DESC";
$mensajes = $conexion->query($sql);

?>
<style>
    .chat-container {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .chat-messages {
        max-height: 300px;
        overflow-y: scroll;
        padding: 10px;
    }

    .message {
        margin-bottom: 10px;
    }

    .message-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .sender {
        font-weight: bold;
    }

    .timestamp {
        color: #999;
        font-size: 0.8em;
    }

    .chat-input {
        padding: 10px;
        background-color: #f9f9f9;
    }

    .chat-input input[type="text"] {
        width: 70%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-right: 5px;
    }

    .chat-input button {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .chat-input button:hover {
        background-color: #45a049;
    }
</style>
<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Mensaje</h3>

            <div class="box-tools pull-right">
                <div class="has-feedback">

                </div>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="mailbox-controls">
                <!-- Check all button -->


                <button onclick=" getBandeja()" type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                <div class="pull-right">
                    1-2/2
                    <div class="btn-group">
                    </div>

                </div>

            </div>
            <div class="mailbox-messages" style="padding: 10px;">
                <div class="chat-container">
                    <div class="chat-messages">
                        <?php foreach ($mensajes as $mensaje) : ?>
                            <div class="message">
                                <div class="message-info">
                                    <div class="sender"><?php echo ucwords(strtolower($mensaje['dato'])) ?></div>
                                    <div class="timestamp"><?php echo $mensaje['fecha'] ?></div>
                                </div>
                                <div class="text"><?php echo $mensaje['respuesta'] ?></div>
                            </div>
                        <?php endforeach;  ?>
                    </div>
                    <div class="chat-input">
                        <input type="text" class="respuesta" placeholder="Escribe un mensaje...">
                        <input type="text" class="mensaje_cod" value="<?php echo $mensaje_cod ?>" hidden>
                        <button onclick="saveRespuesta();">Enviar</button>
                    </div>
                </div>
            </div>

            <div class="box-footer no-padding">

            </div>
        </div>
        <!-- /. box -->
    </div>