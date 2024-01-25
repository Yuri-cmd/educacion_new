



<?php
$contador = 1;
//Tools::prettyPrint($lista);
foreach ($lista as $iten) {

    ?>
    <div class="col-md-12" style="padding: 10px">
        <div style="padding: 5px" class="col-md-2">
            <div class="con-extra-data">
                <div class="col-md-12 text-center"  style="background-color: #00a65a;color: white;">
                    <strong><h2>Nro. <?=$contador?></h2></strong>
                </div>
                <div class="col-md-12 ">
                    <strong><span style="font-size: 14px">Puntaje: </span></strong> <?=$iten['valor_nota']?>
                </div>
                <div class="col-md-12 text-center" style="padding-top: 18px;">
                </div>
            </div>
        </div>
        <div class="contene-quiz col-md-10" style="padding: 0;">
            <div class="head-content-quiz"  style="background-color: #00a65a;color: white;">
               <div class="">
                   <strong> <?=$iten['cabecera']?> </strong>
               </div>
            </div>

            <div class="body-content-quiz" >
                <?=$iten['cuerpo']?>
            </div>
            <div class="footer-content-quiz">
                <strong>Respuesta:</strong><br>
                <div style="padding: 5px">


                <?php
                if ($iten['tipo_respuesta']==3){

                        echo '<div   style="background: white;">
                <div data-quiz="'.Tools::encrypt($iten['pregunta_id']).'" id="resp_'.$contador.'" data-type="text-summoner" class="contenedor-respuessta-escrito" ></div></div>';

                }elseif ($iten['tipo_respuesta']==6){
                    echo '<input  data-quiz="'.Tools::encrypt($iten['pregunta_id']).'" id="resp_'.$contador.'" data-type="text-text"  type="text" class="form-control" >';
                }elseif ($iten['tipo_respuesta']==4){
                    echo '<input  data-quiz="'.Tools::encrypt($iten['pregunta_id']).'"  id="resp_'.$contador.'" data-type="text-text" type="text" onkeypress="validate(event)" class="form-control" >';
                }else{
                    $resp_alt = $actividadCursoAccses->exeSql(
                        " SELECT * FROM alternativas_pregunta WHERE id_pregunta = '{$iten['pregunta_id']}'");

                    if ($iten['tipo_respuesta']==2){echo '<div  data-quiz="'.Tools::encrypt($iten['pregunta_id']).'" id="resp_'.$contador.'" data-type="radio">';
                        foreach ($resp_alt as $item){


                            echo '<label>
                                    <input type="radio"  name="'.Tools::encrypt($iten['pregunta_id']).'" value="'.$item['alternativa_id'].'">  '.$item['contenido'].'
                                </label><br>';

                        }echo '</div>';
                    }else{ echo '<div  data-quiz="'.Tools::encrypt($iten['pregunta_id']).'" id="resp_'.$contador.'"  data-type="checkbox">';
                        foreach ($resp_alt as $item){

                            echo '<label>
                                    <input value="'.$item['alternativa_id'].'"  type="checkbox">   '.$item['contenido'].'
                                </label><br>';

                        } echo '</div>';
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
<input type="hidden" value="<?=$contador?>" id="cant_pregun">

<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
