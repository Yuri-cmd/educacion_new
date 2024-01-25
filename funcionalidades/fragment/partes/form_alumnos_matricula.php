<div id="conte-value">
    <div class="col-md-12 text-center">
        <h2>Datos de los hijos o estudiantes</h2>
    </div>
    <br>
    <div class="col-md-12" style="min-height: 300px">
        <div v-for="(item, index) in listaHijos" class="col-md-4">
            <div >
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-yellow">
                        <div class="widget-user-image">
                            <img class="img-circle" src="https://blog.aulaformativa.com/wp-content/uploads/2016/08/consideraciones-mejorar-primera-experiencia-de-usuario-aplicaciones-web-perfil-usuario.jpg" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 v-if="item.primer_nombre" class="widget-user-username">{{item.primer_nombre}} {{item.segundo_nombre}}</h3>
                        <h3  v-if="!item.primer_nombre" class="widget-user-username">Sin especificar </h3>
                        <h5 class="widget-user-desc"></h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked" style="padding: 3px">
                            <li> <button data-toggle="modal" data-target="#Editar-alumno" v-on:click="verEditar(index)" style="display: block;margin: auto" class="btn btn-info">Ver y Editar</button> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">

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
                    <div class="form-group ">
                        <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                              <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                Datos Personales
                              </span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Primer Nombre</label>
                            <input  autocomplete="off"  v-model="listaHijos[posicion].primer_nombre" type="text" class="form-control"  placeholder="Nombre.....">
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="">Segundo Nombre</label>
                            <input autocomplete="off" v-model="listaHijos[posicion].segundo_nombre" type="text" class="form-control"  placeholder="apellidos....">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Apellido Paterno</label>
                            <input  autocomplete="off"  v-model="listaHijos[posicion].apellido_paterno" type="text" class="form-control"  placeholder="Nombre.....">
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="">Apellido Materno</label>
                            <input autocomplete="off" v-model="listaHijos[posicion].apellido_materno" type="text" class="form-control"  placeholder="apellidos....">
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="">Email</label>
                            <input autocomplete="off" v-model="listaHijos[posicion].email" type="email" class="form-control" placeholder="email.....">
                        </div>

                        <div class="form-group col-md-4  col-lg-2">
                            <label for="">Genero</label>
                            <select v-model="listaHijos[posicion].genero"  class="form-control" >
                                <option value="m">Masculino</option>
                                <option value="f">Femenino</option>
                            </select>
                        </div>

                        <div class="form-group  col-md-4  col-lg-2">
                            <label for="">Telefono</label>
                            <input autocomplete="off" v-model="listaHijos[posicion].telefono_pricipal" type="text" class="form-control"  placeholder="000....">
                        </div>

                        <div class="form-group col-md-4   col-lg-2">
                            <label for="">Tipo Documento</label>
                            <select v-model="listaHijos[posicion].doc_id" type="text" class="form-control" >
                                <option value="1">DNI</option>
                                <option value="2">Pasaporte</option>
                            </select>
                        </div>
                        <div class="form-group  col-md-4  col-lg-4">
                            <label for="">Nro. Documento</label>
                            <input autocomplete="off" v-model="listaHijos[posicion].doc_numero" type="text" class="form-control"  placeholder="000....">
                        </div>
                        <div class="form-group  col-md-4  col-lg-4">
                            <label for="">Fecha de nacimiento</label>
                            <input autocomplete="off" v-model="listaHijos[posicion].fecha_nacimiento" type="date" class="form-control"  placeholder="000....">
                        </div>


                    </div>
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
        const limite = 2;
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
                    $("#loader-menor").show();

                    if (true){
                        $.ajax({
                            type: "POST",
                            url: URL+'/ajax/matricula',
                            data: {tipo:'paso_veri',hijos: JSON.stringify(APP._data.listaHijos),matr:$("#matricula").val()},
                            success: function (rest) {
                                console.log(rest);
                                rest = JSON.parse(rest)
                                renderHTML(rest.dom);
                            }
                        });

                    }else{
                        swal('Deve aceptar los terminos');
                    }
                }
            }
        });

        APP.getDatos();
        $("#loader-menor").hide();
    })
</script>