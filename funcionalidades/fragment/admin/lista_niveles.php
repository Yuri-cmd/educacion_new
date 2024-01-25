<div class="box-header with-border">
    <div class="col-md-7">
        <h3 style="font-weight: bold;" class="box-title">Matricula</h3>
    </div>
    <div class="col-md-5 text-right">
        <a style="display: none" href="<?=URL::to('alumno/cursos')?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
    </div>
</div>
<div class="box-body">
    <div class="col-md-12 text-center">
        <h2>Matricula <?=$periodo?></h2>
    </div>
    <div class="col-md-12" >
        <table style="" class="table table-bordered table-hover no-footer dataTable">
            <tr class="bg-green-gradient">
                <th class="text-center">#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">CNt. Matri.</th>
                <th class="text-center">Registra</th>
            </tr>
            <?php
            foreach ($lista as $item){

                ?>
                <tr>
                    <td class="text-center"><?=$item['nivel_id']?></td>
                    <td class="text-center"><?=$item['nombre_nivel']?></td>
                    <td class="text-center"><?= $item['cnt_m']?> alumnos</td>
                    <td class="text-center"><button onclick="getlistaMatriculados(<?=$item['nivel_id']?>)" class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                </tr>
            <?php }
            ?>

        </table>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">

</div>

