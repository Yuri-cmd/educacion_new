<div id="conte-value">
    <div class="col-md-12 text-center">
        <h2>Estado de verificacion</h2>
    </div>
    <br>
    <div class="col-md-12" style="min-height: 300px">
        <div class="col-md-4 col-md-offset-4" style="padding: 5px;" >
            <div style="border: 1px solid #757575;border-radius: 3px;overflow: hidden; padding: 10px;">
                <div class="col-md-12 text-center">
                    <h3>Archivo para confirmar Matricula</h3>
                </div>
                <div class="col-md-12">
                    <button style="margin: auto;display: block" class="btn btn-info"><i class="fa fa-download"></i> Descargar</button>
                </div>
                <div class="col-md-12 text-center">
                    <p>Descarge el archivo y firmelo para confirmar su matricula</p>
                </div>
            </div>

        </div>

        <div class="col-md-4 col-md-offset-4" style="padding: 5px;margin-top: 26px;" >
            <div class="col-md-12 text-center">
                <h4>Seleccione el archivo en formato PDF y continue</h4>
            </div>
            <input type="file" id="archivo"  accept="application/pdf" >
        </div>
    </div>
    <br>

    <div class="row">

        <div class="col-md-offset-2 col-md-8">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="col-md-12  text-center">
                <button type="button" v-on:click="registrar()" class="btn btn-primary col-md-offset-4 col-md-4">Continuar</button>
            </div>

        </div>
    </div>
    <div class="modal fade" id="Editar-alumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title" id="exampleModalLongTitle">Datos principales</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  data-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var APP;
    $(document).ready(function () {
        $("#loader-menor").hide();
        const lista = $(".checkout-bar > li");
        const limite = 3;
        for (var i = 0; i<lista.length;i++){
            if (i>=limite){
                $(lista[i]).removeClass('visited')
                $(lista[i]).addClass('active')

                break;
            }else{
                $(lista[i]).removeClass('active')
                $(lista[i]).addClass('visited')
            }
        }

        APP = new Vue({
            el:'#conte-value',
            data:{
                posicion:0,
                listaHijos:[]
            },
            methods:{
                verEditar(index){
                    this.posicion = index;
                },
                getDatos(){
                    const martr= $("#matricula").val();
                    $.ajax({
                        type: "POST",
                        url: URL+'/ajax/consulta',
                        data: {tipo:'datestumat',martr},
                        success: function (resp) {

                            resp = JSON.parse(resp);
                            console.log(resp);
                            APP._data.listaHijos = resp;

                        }
                    });

                },
                registrar(){

                    if ($("#archivo").val().length>0){
                        var fd = new FormData();

                        fd.append('file',$("#archivo")[0].files[0]);
                        fd.append('matr',$("#matricula").val());
                        $.ajax({
                            xhr: function() {
                                var xhr = new window.XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function(evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = ((evt.loaded / evt.total) * 100);
                                        $('.progress-bar').css('width', percentComplete+'%').attr('aria-valuenow', percentComplete);
                                    }
                                }, false);
                                return xhr;
                            },
                            type: 'POST',
                            url: URL+'/ajax/upload_file',
                            data: fd,
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function(){
                                console.log('inicio');
                                $('.progress-bar').css('width', 0+'%').attr('aria-valuenow', 0);
                            },
                            error:function(err){
                                swal("Error","No se pudo subir el archivo", 'error');
                                console.log(err);
                            },
                            success: function(resp){
                                console.log(resp);
                                resp = JSON.parse(resp);
                                if (resp.res){
                                    renderHTML(resp.dom)
                                }else{
                                    swal('Error')
                                }

                            }
                        });

                    }else{
                        swal('Seleccione un archivo');
                    }
                }
            }
        });

        $("#loader-menor").hide();
    })
</script>