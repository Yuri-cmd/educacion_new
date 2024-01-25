
<?php
$contador = 1;
foreach ($lista as $iten) {

    ?>
    <div class="col-md-12" style="padding: 10px">
        <div style="padding: 5px" class="col-md-2">
            <div class="con-extra-data">
                <div class="col-md-12 text-center" style="background-color: #00a65a;color: white;">
                    <strong><h2>Nro. <?=$contador?></h2></strong>
                </div>
                <div class="col-md-12 ">
                    <strong><span style="font-size: 14px">Puntaje: </span></strong> <?=$iten['valor_nota']?>
                </div>
                <div class="col-md-12 text-center" style="padding-top: 18px;">
                    <button onclick="setdata('<?=Tools::encrypt($iten['pregunta_id'])?>')" data-toggle="modal" data-target="#modal-registro-pregunta" class="btn btn-info"><i class="fa fa-edit"></i></button>
                    <button onclick="del('<?=Tools::encrypt($iten['pregunta_id'])?>')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="contene-quiz col-md-10" style="padding: 0;">
            <div class="head-content-quiz"  style="background-color: #00a65a;color: white;">
               <div class="">
                   <strong> <?=$iten['cabecera']?> </strong>
               </div>
            </div>

            <div class="body-content-quiz">
                <?=$iten['cuerpo']?>
            </div>
            <div class="footer-content-quiz">
                <strong>Respuesta:</strong><br>
                <div style="padding: 5px">


                <?php
                if ($iten['tipo_respuesta']==3||$iten['tipo_respuesta']==6||$iten['tipo_respuesta']==4){
                    $resp_con = $actividadCursoAccses->exeSql(
                            " SELECT * FROM contenido_escrito WHERE id_pregunta='{$iten['pregunta_id']}'");
                    if ($row_co = $resp_con->fetch_assoc()){
                        echo '<div class="contenedor-respuessta-escrito">'.$row_co['respuesta'].'</div>';
                    }
                }else{
                    $resp_alt = $actividadCursoAccses->exeSql(
                        " SELECT * FROM alternativas_pregunta WHERE id_pregunta = '{$iten['pregunta_id']}'");

                    if ($iten['tipo_respuesta']==2 && $iten['tipo_respuesta']==5){
                        foreach ($resp_alt as $item){
                            echo '<label>
                                    <input disabled type="radio" '.($item['estado_res']==1?'checked':'').' value="'.$item['alternativa_id'].'">  '.$item['contenido'].'
                                </label><br>';
                        }
                    }else{
                        foreach ($resp_alt as $item){
                            echo '<label>
                                    <input disabled '.($item['estado_res']==1?'checked':'').' type="checkbox">   '.$item['contenido'].'
                                </label><br>';
                        }
                    }

                }
                ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    $contador++;
}
    ?>