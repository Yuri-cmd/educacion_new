<?php

$sql ="SELECT cursos.* FROM curso_docente JOIN cursos  ON curso_docente.curso_id = cursos.curso_id WHERE curso_docente.curso_doce_id =  '{$_POST['curso']}'";
$data_curso = $conexion->query($sql)->fetch_assoc();


$sql ="SELECT 
  un_cur.* 
FROM
  unidad_curso AS un_cur  
WHERE un_cur.id_docente_curso = '{$_POST['curso']}' ";
$lista_Uni = $conexion->query($sql);
?>

<?php
$tem_table ="";

$contador_unid = 0;
$suma_unid = 0;

foreach ($lista_Uni as $uni){
    $contador_unid++;
    $unidad_nom ='';
    $clases_="";
    $not_temp ="";

    $sql ="SELECT 
                                      cls_cur.* 
                                    FROM  clase_cursos AS cls_cur 
                                    WHERE cls_cur.id_unidad = '{$uni['unidad_id']}' ";
    //echo $sql.'<br>';
    $lisClase  = $conexion->query($sql);
    $contador_r=1;
    $suma_pre_und_F =0;
    foreach ($lisClase as $uni_cl){

        $clases_ = $clases_. '<tr>
                    <th  class="color-pri2">Clase: '.$uni_cl['nombre_clase'].'</th>
                    <td></td>
                    <td style="background-color: #00a65a;color: white;" class="text-center"><strong>NOTA</strong></td>
                </tr>';

        $sql ="SELECT 
  tip_act.nombre,
  act_cl.id_tipo_activada,
  act_cl.nombre_activid,
  not_est.nota 
FROM
  actividad_curso AS act_cl 
  JOIN tipo_actividad AS tip_act 
    ON act_cl.id_tipo_activada = tip_act.tipo_id 
    LEFT JOIN nota_actividad_estudiante AS not_est 
    ON act_cl.actividad_id = not_est.nota_actividad_id AND not_est.id_estudiante = '{$_POST['hijo']}'
WHERE act_cl.id_clase_curso = '{$uni_cl['clase_id']}' ";

        $lista_not_ac = $conexion->query($sql);

        $contador_pro = 0;
        $suma_tem_ac=0;
        foreach ($lista_not_ac as $item_n_a){
            $nota_tem = is_null($item_n_a['nota'])?0:$item_n_a['nota'];
            $clases_ = $clases_. '<tr>
                    <th></th>
                    <td><strong>'.$item_n_a['nombre'].':</strong> '.$item_n_a['nombre_activid'].'</td>
                    <td class="text-center">'.$nota_tem.'</td>
                </tr>';
            $suma_tem_ac += $nota_tem;
            $contador_pro++;
        }
        $sum_tem_dn = $suma_tem_ac>0?$suma_tem_ac/$contador_pro:0;
        $clases_ = $clases_. '<tr>
                    <th></th>
                    <td style="font-weight: bold;color: white;background-color: #f39c12;" class="text-right">Promedio</td>
                    <td class="text-center"><strong>'.number_format($sum_tem_dn, 2, '.', '').'</strong> </td>
                </tr><tr> <th></th> <th></th> <th></th></tr>';

        $suma_pre_und_F += $sum_tem_dn;

            // $clases_= $clases_ . '<th>'.$uni_cl['nombre_clase'].'</th>';
        $contador_r++;
    }
    $temp_udn_sum = ($suma_pre_und_F>0?($suma_pre_und_F/($contador_r-1)):0);
    $clases_ = $clases_.'<tr style="background-color: #afd3f3"> <th colspan="2"  class="text-center"><strong>Promedio De Unidad</strong></th> <th class="text-center">'.number_format($temp_udn_sum, 2, '.', '').'</th></tr></tr><tr> <th></th> <th></th> <th></th></tr>';
    $suma_unid += $temp_udn_sum;
    $unidad_nom = '<th colspan="3">'.$uni['nombre_unidad'].'</th>';

    $tem_table = $tem_table . ' <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr class="color-pri">
                       '.$unidad_nom.'
                    </tr>

                    </thead>

                    '. $clases_.'
                </table>
            </div>';
}


$temp_sum_f = ($suma_unid>0)?$suma_unid/$contador_unid:0;
//echo $temp_sum_f."<<<<<<<<<<<<<<<<<<<";
$tablPromeFi = '<table class="table table-bordered">
<tr style="background-color: #00a65a;color: white;font-weight: bold;">
<td class="text-center">Promedio Final</td>
<td class="text-center"><strong>'.number_format($temp_sum_f, 2, '.', '').'</strong></td>
</tr>
</table>';
?>

<div class="box box-success">
    <div class="box-header ">
        <div class="col-lg-6">
            <h2><i class="fa fa-edit"></i>&nbsp;Hijos</h2>
        </div>
        <div class="col-lg-6 text-right">
            <button onclick="getLibretaCurso(<?=$_POST['curso']?>)" class="btn btn-info"><i class="fa fa-refresh"></i></button>
            <button onclick="verNotaHijo(<?=$_POST['hijo']?>)" class="btn btn-warning"><i class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-lg-12"><hr></div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-bottom: 34px;font-weight: bold;">
                <h2>Libreta de Nota de <?=$data_curso['nombre']?></h2>
            </div>
            <br>
            <br>
            <div class="col-md-8 col-md-offset-2">
                <?=$tem_table?>
                <?=$tablPromeFi?>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

