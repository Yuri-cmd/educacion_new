<?php

$sql ="SELECT * FROM mensaje_usuarion WHERE mensaje_id = '$mensaje_cod'";

$mensaje = $conexion->query($sql)->fetch_assoc();

?>
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
            <div class="mailbox-messages" style="padding: 71px;">
                <?=$mensaje['mensaje']?>
            </div>
        </div>

        <div class="box-footer no-padding">

        </div>
    </div>
    <!-- /. box -->
</div>