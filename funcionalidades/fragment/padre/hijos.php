<div class="box box-success">
    <div class="box-header ">
        <div class="col-lg-6">
            <h2><i class="fa fa-edit"></i>&nbsp;Hijos</h2>
        </div>
        <div class="col-lg-6 text-right">

        </div>
        <div class="col-lg-12"><hr></div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <?php
            foreach ($lista_hijos as $hijo){ ?>
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div onclick="verNotaHijo(<?=$hijo['estu_id']?>)" class="box box-widget widget-user" style="    border: 1px solid #cbc2c2;">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username"><?=$hijo['primer_nombre']?> <?=$hijo['segundo_nombre']?></h3>
                            <h5 class="widget-user-desc"><?=$hijo['apellido_paterno']?> <?=$hijo['apellido_materno']?></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="<?=URL::to('images/fotos_perfil/'.(strlen($hijo['foto_perfil'])>0?$hijo['foto_perfil']:'usuario_img.jpg'))?>" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Nivel</h5>
                                        <span class="description-text"><?=$hijo['nombre_nivel']?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Grado</h5>
                                        <span class="description-text"><?=$hijo['nombre_grado']?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Seccion</h5>
                                        <span class="description-text"><?=$hijo['seccion_nombre']?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            <?php }
            ?>

        </div>
    </div>
    <!-- /.box-body -->
</div>