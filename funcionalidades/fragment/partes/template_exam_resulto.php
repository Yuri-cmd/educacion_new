<style>
    .extra-re{
        border-radius: 20px;
        background-color: #aed2f5;
        padding: 10px;
        margin: 14px;
    }
</style>
<?php
//Tools::prettyPrint($respuestas);

$contador = 1;
foreach ($lista as $iten) {
    $is_res=false;
    $contenidorR =null;

    if (isset($respuestas[$iten['pregunta_id'].'_'])){
        $is_res=true;
        $contenidorR = $respuestas[$iten['pregunta_id'].'_'];
    }
    ?>
    <div class="col-md-12" style="padding: 10px">

        <div class="contene-quiz col-md-10 order-1"  style="padding: 0;">
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
                $respuestas_corecc =[];
                $select_correc_check =[] ;
                $tipoRes=-1;
                $respuesta_escrita_temp_text = '';
                if ($iten['tipo_respuesta']==3){
                    $contenido = '';
                    if ($is_res){
                        $contenido = $contenidorR['contenido'];
                    }
                    echo '<div class="contenedor-respuessta-escrito">'.$contenido.'</div>';
                    /*$resp_con = $actividadCursoAccses->exeSql(
                            " SELECT * FROM contenido_escrito WHERE id_pregunta='{$iten['pregunta_id']}'");
                    if ($row_co = $resp_con->fetch_assoc()){
                        echo '<div class="contenedor-respuessta-escrito">'.$row_co['respuesta'].'</div>';
                    }*/
                }elseif($iten['tipo_respuesta']==4||$iten['tipo_respuesta']==6){
                    $sql ="SELECT * FROM contenido_escrito WHERE id_pregunta = '{$iten['pregunta_id']}'";
                    $resp_tex = $actividadCursoAccses->exeSql($sql);

                    $contenido = '';
                    if ($is_res){
                        $contenido = $contenidorR['contenido'];
                    }
                    $is_corextor = false;
                    $is_corextor_reps = false;
                    if ($row_tex = $resp_tex->fetch_assoc()){
                        $respuesta_escrita_temp_text = $row_tex['respuesta'];
                        $is_corextor = true;
                        if (trim($row_tex['respuesta'])==trim($contenido)){
                            $is_corextor_reps = true;
                        }
                    }
                    if ($is_corextor){

                        $select_correc_check[] = $is_corextor_reps;
                        if ($is_corextor_reps){
                            echo '<i class="fa fa-check" style="color: green"></i>';
                        }else{
                            echo '<i class="fa fa-times" style="color: red"></i>';
                        }
                    }


                    echo '<input disabled type="text" class="form-control"  value="'.$contenido.'">';
                }else{
                    $resp_alt = $actividadCursoAccses->exeSql(
                        " SELECT * FROM alternativas_pregunta WHERE id_pregunta = '{$iten['pregunta_id']}'");



                    if ($iten['tipo_respuesta']==2){
                        $tipoRes=2;
                        foreach ($resp_alt as $item){


                            $is_resccc=false;
                            if ($is_res){
                                $is_resccc=isset($contenidorR['alter'][$item['alternativa_id'].'_']);
                            }
                            $is_correct___=false;
                            if ($item['estado_res']==1){
                                $respuestas_corecc[]=$item;
                                $is_correct___=$is_resccc;
                            }
                            $contee_val_temp = '';

                            if ($is_resccc){
                                $select_correc_check[] = $is_correct___;
                                if ($is_correct___){
                                    $contee_val_temp = '<i class="fa fa-check" style="color: green"></i>';
                                }else{
                                    $contee_val_temp = '<i class="fa fa-times" style="color: red"></i>';
                                }
                            }

                            echo '<label> 
                                    <input disabled type="radio" '.($is_resccc?'checked':'').' value="'.$item['alternativa_id'].'">  '.$item['contenido'].'
                                   '.$contee_val_temp.' </label><br>';
                        }
                    }else{
                        $tipoRes=1;
                        foreach ($resp_alt as $item){


                            $is_resccc=false;
                            if ($is_res){
                                $is_resccc=isset($contenidorR['alter'][$item['alternativa_id'].'_']);
                            }

                            $is_correct___=false;
                            if ($item['estado_res']==1){
                                $respuestas_corecc[]=$item;
                                $is_correct___=$is_resccc;
                            }
                            $contee_val_temp = '';

                            if ($is_resccc){
                                $select_correc_check[] = $is_correct___;
                                if ($is_correct___){
                                    $contee_val_temp = '<i class="fa fa-check" style="color: green"></i>';
                                }else{
                                    $contee_val_temp = '<i class="fa fa-times" style="color: red"></i>';
                                }
                            }


                            echo '<label>
                                    <input disabled '.($is_resccc?'checked':'').' type="checkbox">   '.$item['contenido'].'
                                 '.$contee_val_temp.'</label><br>';
                        }
                    }

                }
                ?>
                </div>
            </div><?php
            if (count($respuestas_corecc)>0||strlen($respuesta_escrita_temp_text)>0){ ?>

                <div class="extra-re">
                    <h4><strong>Correccion</strong></h4><br>
                    <?php
                    if (strlen($respuesta_escrita_temp_text)>0){
                        echo '<div style=" padding: 10px; background-color: #fff4e5; border-radius: 10px;"> '.$respuesta_escrita_temp_text.'</div>';
                    }

                    foreach ($respuestas_corecc as $respppp){
                        if ($tipoRes ==2){
                            echo '<label> 
                                    <input disabled type="radio" checked value="'.$respppp['alternativa_id'].'">  '.$respppp['contenido'].'
                                </label><br>';
                        }
                        if ($tipoRes ==1){
                            echo '<label> 
                                    <input disabled type="checkbox" checked value="'.$respppp['alternativa_id'].'">  '.$respppp['contenido'].'
                                </label><br>';
                        }
                    }
                    ?>
                </div>
            <?php   }

            ?>

        </div>
        <?php
        $check_miral_fin = Tools::validarListaBool($select_correc_check)?'checked':'';
        ?>
        <div style="padding: 5px" class="col-md-2 order-2">
            <div class="con-extra-data">
                <div class="col-md-12 text-center" style="background-color: #00a65a;color: white;">
                    <strong><h2>Nro. <?=$contador?></h2></strong>
                </div>
                <div class="col-md-12 ">
                    <strong><span style="font-size: 14px">Puntaje: </span></strong> <?=$iten['valor_nota']?>
                </div>
                <div class="col-md-12 text-center" style="padding-top: 18px;">
                    <div class="form-group">

                        <label>
                            <input <?=$check_miral_fin?> data-puntaje="<?=$iten['valor_nota']?>"  type="checkbox" class="check-nota" >
                            respuesta correcta
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $contador++;
}
    ?>


<script>
    $(document).ready(function () {
        $('.check-nota').change(function(){
            //console.log(this);
            const elemt = $(this);
            if(elemt.is(':checked')){
                nota_final += parseInt(elemt.attr('data-puntaje'))

            } else {
                nota_final -= parseInt(elemt.attr('data-puntaje'))
            }
        });
    })
</script>
