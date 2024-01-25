
<input id="matricula_aper" type="hidden" value="4">
<input id="estudiante" type="hidden" value="<?=$_POST['estud']?>">
<div class="box-header with-border">
    <div class="col-md-7">
        <h3 style="font-weight: bold;" class="box-title">Matricula</h3>
    </div>

    <div class="col-md-5 text-right">
        <button onclick="$('#evento-reg').click()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Guardar</button>
        <button id="irAtras" onclick="getlistaMatriculados(<?=$nivel_id?>)"  type="button" class="btn btn-warning"><i class="fa fa-arrow-left"></i></button>
    </div>
</div>
<div class="box-body" id="contenedo-reg">
    <div class="col-md-12 text-center">
        <h2>Ficha de matricula</h2>

    </div>
    <input type="hidden" id="nivel-id" value="<?=$nivel_id?>">
    <div class="col-md-12" >
        <div class="form-group ">
            <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                Datos del alumno<!--Padding is optional-->
                </span>

            </div>
        </div>

        <button style="display: none" id="evento-reg" v-on:click="actualizarData()"></button>
        <div class="form-group col-md-4">
            <label >Nro. DNI</label>
            <div class="input-group">

                <input v-model="alumno.doc" @keypress="onlyNumber" type="text" class="form-control">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-search"></i></button>
                </span>

            </div>
        </div>
        <div class="form-group col-md-4">
            <label >Primer Nombre</label>
            <input v-model="alumno.primer_nombre" type="text" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label >Segundo Nombre</label>
            <input v-model="alumno.segundo_nombre" type="text" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label >Apellido Patermo</label>
            <input v-model="alumno.apellido_paterno" type="text" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label >Apellido Materno</label>
            <input v-model="alumno.apellido_materno" type="text" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label >Fecha Nacimiento</label>
            <input v-model="alumno.fecha_n"  type="date" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label >Genero</label>
            <select v-model="alumno.genero" class="form-control" >
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label >Grado</label>
            <select  @change="onChangeGrados($event)" v-model="alumno.grado" type="text" class="form-control" >
                <option v-for="(item, index) in grados" :value="item.grado_id">{{item.nombre_grado}}</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label >Seccion</label>
            <select v-model="alumno.seccion" type="text" class="form-control" >
                <option v-for="(item, index) in secciones" :value="item.seccion_id">{{item.nombre}}</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label >Telefono</label>
            <input v-model="alumno.telefono"  type="text" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label >Direccion</label>
            <input v-model="alumno.direccion"  type="text" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label>Email</label>
            <input v-model="alumno.email"  type="email" class="form-control" >
        </div>

    </div>
    <div class="col-md-12">
        <div class="form-group ">
            <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                Datos del familiar<!--Padding is optional-->
                </span>

            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li  class="nav-item">
                <a class="nav-link active"  id="padre-tab" data-toggle="tab" href="#padre" role="tab" aria-controls="padre" aria-selected="true">Padre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="madre-tab" data-toggle="tab" href="#madre" role="tab" aria-controls="madre" aria-selected="false">Madre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="apoderado-tab" data-toggle="tab" href="#apoderado" role="tab" aria-controls="apoderado" aria-selected="false">Apoderado</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" style="padding-top: 20px">
            <div class="tab-pane fade" id="padre" role="tabpanel" aria-labelledby="home-tab">

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Responsable de pago</label>
                        <input  v-model="dataRP.pagador" type="checkbox" >
                    </div>
                </div>
                <div class="form-group ">
                    <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                              <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                Datos Personales del Padre<!--Padding is optional-->
                              </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre completo</label>
                        <input  autocomplete="off"  v-model="dataRP.nombre" type="text" class="form-control"  placeholder="Nombre.....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Apellidos</label>
                        <input autocomplete="off" v-model="dataRP.apellido" type="text" class="form-control"  placeholder="apellidos....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Email</label>
                        <input autocomplete="off" v-model="dataRP.email" type="email" class="form-control" placeholder="email.....">
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Genero</label>
                        <select v-model="dataRP.genero"  class="form-control" >
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 1</label>
                        <input autocomplete="off" v-model="dataRP.telefono1" type="text" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 2</label>
                        <input autocomplete="off" v-model="dataRP.telefono2" type="text" class="form-control"  placeholder="000....">
                    </div>

                    <div class="form-group col-md-4   col-lg-2">
                        <label for="">Tipo Documento</label>
                        <select v-model="dataRP.tipo_doc" type="text" class="form-control" >
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nro. Documento</label>
                        <input autocomplete="off"  @keypress="onlyNumber" v-model="dataRP.num_doc" type="text" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Fecha de nacimiento</label>
                        <input autocomplete="off" v-model="dataRP.fecha_na" type="date" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Estado civil</label>
                        <select v-model="dataRP.estado_ci"  class="form-control" >
                            <option value="Soltero">Soltero (a)</option>
                            <option value="Casado">Casado (a)</option>
                            <option value="Divorciodo">Divorciodo (a)</option>
                            <option value="Viudo">Viudo (a)</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nacionalidad</label>
                        <input autocomplete="off" v-model="dataRP.nacio" type="text" class="form-control"  placeholder="Perua....">
                    </div>

                </div>
                <br>
                <div class="form-group ">
                    <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                                  <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                    Datos del Hogar<!--Padding is optional-->
                                  </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Direccion</label>
                        <input autocomplete="off"  v-model="dataRP.direccion" type="email" class="form-control" placeholder="Direccion.....">
                    </div>

                    <div class="form-group col-md-4   col-lg-3">
                        <label for="">Departamento</label>
                        <select id="depa" @change="onChangeDepar('p')"  v-model="dataRP.departament" type="text" class="form-control" >
                            <?php
                            foreach ($listas_dep as $depa){
                                echo "<option value='".$depa['dep_cod']."'>".$depa['dep_nombre']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                        <label for="">Provincia</label>
                        <select @change="onChangeProv('p')" v-model="dataRP.provincia" type="text" class="form-control" >
                            <option v-for="(item, index) in list_provi_p" v-bind:value="item.pro_cod">{{item.pro_nombre}}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Distrito</label>
                        <select v-model="dataRP.distrito" type="text" class="form-control" >
                            <option v-for="(item, index) in list_distri_p" v-bind:value="item.dis_codigo">{{item.dis_nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="madre" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Responsable de pago</label>
                        <input  autocomplete="off" v-model="dataRM.pagador" type="checkbox" >
                    </div>
                </div>
                <div class="form-group ">
                    <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                              <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                Datos Personales de la Madre<!--Padding is optional-->
                              </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre completo</label>
                        <input  autocomplete="off" v-model="dataRM.nombre" type="text" class="form-control"  placeholder="Nombre.....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Apellidos</label>
                        <input  autocomplete="off" v-model="dataRM.apellido" type="text" class="form-control"  placeholder="apellidos....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Email</label>
                        <input  autocomplete="off" v-model="dataRM.email" type="email" class="form-control" placeholder="email.....">
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Genero</label>
                        <select v-model="dataRM.genero"  class="form-control" >
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 1</label>
                        <input  autocomplete="off" v-model="dataRM.telefono1" type="text" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 2</label>
                        <input  autocomplete="off" v-model="dataRM.telefono2" type="text" class="form-control"  placeholder="000....">
                    </div>

                    <div class="form-group col-md-4   col-lg-2">
                        <label for="">Tipo Documento</label>
                        <select v-model="dataRM.tipo_doc" type="text" class="form-control" >
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nro. Documento</label>
                        <input  autocomplete="off"   @keypress="onlyNumber" v-model="dataRM.num_doc" type="text" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Fecha de nacimiento</label>
                        <input  autocomplete="off" v-model="dataRM.fecha_na" type="date" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Estado civil</label>
                        <select v-model="dataRM.estado_ci"  class="form-control" >
                            <option value="Soltero">Soltero (a)</option>
                            <option value="Casado">Casado (a)</option>
                            <option value="Divorciodo">Divorciodo (a)</option>
                            <option value="Viudo">Viudo (a)</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nacionalidad</label>
                        <input  autocomplete="off" v-model="dataRM.nacio" type="text" class="form-control"  placeholder="Perua....">
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                                  <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                    Datos del Hogar<!--Padding is optional-->
                                  </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Direccion</label>
                        <input  autocomplete="off"  v-model="dataRM.direccion" type="email" class="form-control" placeholder="Direccion.....">
                    </div>

                    <div class="form-group col-md-4   col-lg-3">
                        <label for="">Departamento</label>
                        <select  @change="onChangeDepar('m')" v-model="dataRM.departament" type="text" class="form-control" >
                            <?php
                            foreach ($listas_dep as $depa){
                                echo "<option value='".$depa['dep_cod']."'>".$depa['dep_nombre']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                        <label for="">Provincia</label>
                        <select @change="onChangeProv('m')" v-model="dataRM.provincia" type="text" class="form-control" >
                            <option v-for="(item, index) in list_provi_m" v-bind:value="item.pro_cod">{{item.pro_nombre}}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Distrito</label>
                        <select v-model="dataRM.distrito" type="text" class="form-control" >
                            <option v-for="(item, index) in list_distri_m" v-bind:value="item.dis_codigo">{{item.dis_nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="apoderado" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Responsable de pago</label>
                        <input  autocomplete="off"  v-model="dataRA.pagador" type="checkbox" >
                    </div>
                </div>
                <div class="form-group ">
                    <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                              <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                Datos Personales del Apoderado<!--Padding is optional-->
                              </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre completo</label>
                        <input  autocomplete="off" v-model="dataRA.nombre" type="text" class="form-control"  placeholder="Nombre.....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Apellidos</label>
                        <input  autocomplete="off" v-model="dataRA.apellido" type="text" class="form-control"  placeholder="apellidos....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Email</label>
                        <input autocomplete="off" v-model="dataRA.email" type="email" class="form-control" placeholder="email.....">
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Genero</label>
                        <select v-model="dataRA.genero"  class="form-control" >
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 1</label>
                        <input autocomplete="off" v-model="dataRA.telefono1" type="text" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 2</label>
                        <input  autocomplete="off" v-model="dataRA.telefono2" type="text" class="form-control"  placeholder="000....">
                    </div>

                    <div class="form-group col-md-4   col-lg-2">
                        <label for="">Tipo Documento</label>
                        <select v-model="dataRA.tipo_doc" type="text" class="form-control" >
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nro. Documento</label>
                        <input autocomplete="off"  @keypress="onlyNumber" v-model="dataRA.num_doc" type="text" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Fecha de nacimiento</label>
                        <input autocomplete="off" v-model="dataRA.fecha_na" type="date" class="form-control"  placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Estado civil</label>
                        <select v-model="dataRA.estado_ci"  class="form-control" >
                            <option value="Soltero">Soltero (a)</option>
                            <option value="Casado">Casado (a)</option>
                            <option value="Divorciodo">Divorciodo (a)</option>
                            <option value="Viudo">Viudo (a)</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nacionalidad</label>
                        <input autocomplete="off" v-model="dataRA.nacio" type="text" class="form-control"  placeholder="Perua....">
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                                  <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                    Datos del Hogar<!--Padding is optional-->
                                  </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Direccion</label>
                        <input  autocomplete="off" v-model="dataRA.direccion" type="email" class="form-control" placeholder="Direccion.....">
                    </div>

                    <div class="form-group col-md-4   col-lg-3">
                        <label for="">Departamento</label>
                        <select @change="onChangeDepar('a')" v-model="dataRA.departament" type="text" class="form-control" >
                            <?php
                            foreach ($listas as $depa){
                                echo "<option value='".$depa['dep_cod']."'>".$depa['dep_nombre']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                        <label for="">Provincia</label>
                        <select @change="onChangeProv('a')" v-model="dataRA.provincia" type="text" class="form-control" >
                            <option v-for="(item, index) in list_provi_a" v-bind:value="item.pro_cod">{{item.pro_nombre}}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Distrito</label>
                        <select v-model="dataRA.distrito" type="text" class="form-control" >
                            <option v-for="(item, index) in list_distri_a" v-bind:value="item.dis_codigo">{{item.dis_nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.box-body -->
<div class="box-footer">

</div>

<script>

    $(document).ready(function () {
        const APP_R = new Vue({
        el:'#contenedo-reg',
        data:{
            alumno:{
                estu:0,
                perfil_id:0,
                doc:'',
                primer_nombre:'',
                segundo_nombre:'',
                apellido_paterno:'',
                apellido_materno:'',
                grado:'',
                seccion:'',
                fecha_n:'',
                genero:'',
                telefono:'',
                direccion:'',
                email:''
            },
            grados:[],
            secciones:[],

            dataRP:{
                pagador:false,
                con_id:0,
                maprei:'',
                nombre:'',
                apellido:'',
                email:'',
                genero:'',
                telefono1:'',
                telefono2:'',
                tipo_doc:'',
                num_doc:'',
                fecha_na:'',
                direccion:'',
                departament:'',
                provincia:'',
                distrito:'',
                estado_ci:'',
                nacio:''
            },
            dataRM:{
                pagador:false,
                con_id:0,
                maprei:'',
                nombre:'',
                apellido:'',
                email:'',
                genero:'',
                telefono1:'',
                telefono2:'',
                tipo_doc:'',
                num_doc:'',
                fecha_na:'',
                direccion:'',
                departament:'',
                provincia:'',
                distrito:'',
                estado_ci:'',
                nacio:''
            },
            dataRA:{
                pagador:false,
                con_id:0,
                maprei:'',
                nombre:'',
                apellido:'',
                email:'',
                genero:'',
                telefono1:'',
                telefono2:'',
                tipo_doc:'',
                num_doc:'',
                fecha_na:'',
                direccion:'',
                departament:'',
                provincia:'',
                distrito:'',
                estado_ci:'',
                nacio:''
            },
            list_distri_p:[],
            list_provi_p:[],
            list_distri_m:[],
            list_provi_m:[],
            list_distri_a:[],
            list_provi_a:[],
        },
        methods:{
            registrar(){
                $("#loader-menor").show();
                var contePreData = [];
                if (this.dataRA.num_doc.length>1){
                    contePreData.push(this.dataRA)
                }
                if (this.dataRP.num_doc.length>1){
                    contePreData.push(this.dataRP)
                }
                if (this.dataRM.num_doc.length>1){
                    contePreData.push(this.dataRM)
                }
                var dataAlum = {... this.alumno};
                dataAlum.nivel_edu = $("#nivel-id").val();
                dataAlum.matricula_apr = $("#apertura").val();
                if (true){
                    $.ajax({
                        type: "POST",
                        url: URL+'/ajax/matricula',
                        data: {tipo:'datre_2',alumno:JSON.stringify(dataAlum),dtaos:JSON.stringify(contePreData)},
                        success: function (rest) {

                            console.log(rest);
                            rest=JSON.parse(rest);
                            if (rest.res){
                                $("#irAtras").click();
                            }
                            $("#loader-menor").hide();
                        }
                    });

                }else{
                    swal('Deve aceptar los terminos');
                }
            },
            onChangeProv(op){
                $("#loader-menor").show();
                //console.log(op)
                var dep='';
                var pro='';

                if (op =='p'){
                    pro= this.dataRP.provincia;
                    dep= this.dataRP.departament;
                }else if(op=='m'){
                    pro= this.dataRM.provincia;
                    dep= this.dataRM.departament;
                }else if(op=='a'){
                    pro= this.dataRA.provincia;
                    dep= this.dataRA.departament;
                }
                // console.log(op =='p');
                $.ajax({
                    type: "POST",
                    url: URL+'/ajax/consulta',
                    data: {tipo:'provin',value:dep,value2:pro},
                    success: function (resp) {
                        resp = JSON.parse(resp);

                        if (op =='p'){
                            APP_R._data.list_distri_p = resp;
                        }else if(op=='m'){
                            APP_R._data.list_distri_m = resp;
                        }else if(op=='a'){
                            APP_R._data.list_distri_a = resp;
                        }
                        //console.log(resp);
                        $("#loader-menor").hide();
                    }
                });

            },
            onChangeDepar(op){
                $("#loader-menor").show();
                //console.log(op)
                var dep='';

                if (op =='p'){
                    console.log()
                    dep= this.dataRP.departament;
                }else if(op=='m'){
                    dep= this.dataRM.departament;
                }else if(op=='a'){
                    dep= this.dataRA.departament;
                }
                //console.log(op =='p');
                $.ajax({
                    type: "POST",
                    url: URL+'/ajax/consulta',
                    data: {tipo:'departa',value:dep},
                    success: function (resp) {
                        //console.log(resp);
                        resp = JSON.parse(resp);
                        if (op =='p'){
                            APP_R._data.list_provi_p = resp;
                        }else if(op=='m'){
                            APP_R._data.list_provi_m = resp;
                        }else if(op=='a'){
                            APP_R._data.list_provi_a = resp;
                        }
                        $("#loader-menor").hide();
                    }
                });

            },
            onChangeGrados(event) {
                $.ajax({
                    type: "POST",
                    url: URL+"/ajax/consulta",
                    data:{tipo:'data-s',grado:event.target.value},
                    success: function (resp) {
                        console.log(resp);
                        APP_R._data.secciones = JSON.parse(resp);
                    }
                });
            },
            getInfoGradp(){
                $.ajax({
                    type: "POST",
                    url: URL+"/ajax/consulta",
                    data:{tipo:'data-g',nivel:$("#nivel-id").val()},
                    success: function (resp) {
                        console.log(resp);
                        APP_R._data.grados = JSON.parse(resp);
                    }
                });

            },
            onlyNumber ($event) {
                //console.log($event.keyCode); //keyCodes value
                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                    $event.preventDefault();
                }
            },
            getDataEstu(){
                $.ajax({
                    type: "POST",
                    data:{tipo:'dataestmrtr',estud:$("#estudiante").val()},
                    url:URL+"/ajax/info/estu/matr",
                    success:function (resp){
                        console.log(resp);
                        const data = JSON.parse(resp)
                        APP_R.seterDataEstu(data)
                    }
                })
            },
            seterDataEstu(data){
                console.log(data);
                this.alumno.estu=data.estu_id;
                this.alumno.perfil_id=data.perfil_id;
                this.alumno.doc=data.doc_numero;
                this.alumno.primer_nombre=data.primer_nombre;
                this.alumno.segundo_nombre=data.segundo_nombre;
                this.alumno.apellido_paterno=data.apellido_paterno;
                this.alumno.apellido_materno=data.apellido_materno;
                this.alumno.grado=data.grado;
                this.alumno.seccion=data.seccion;
                this.alumno.fecha_n=data.fecha_nacimiento;
                this.alumno.genero=data.genero;
                this.alumno.telefono=data.telefono_pricipal;
                this.alumno.direccion=data.direccion;

                $.ajax({
                    type: "POST",
                    url: URL+"/ajax/consulta",
                    data:{tipo:'data-s',grado:data.grado},
                    success: function (resp) {
                        APP_R._data.secciones = JSON.parse(resp);
                    }
                });

                if (data.extra.padre.res){
                    const predad= data.extra.padre.data
                    this.dataRP.pagador=predad.es_pagador;
                    this.dataRP.con_id=predad.id_contacto;
                    this.dataRP.nombre=predad.nombres;
                    this.dataRP.apellido=predad.apellidos;
                    this.dataRP.email=predad.email_concto;
                    this.dataRP.genero=predad.genero;
                    this.dataRP.telefono1=predad.telefono_1;
                    this.dataRP.telefono2=predad.telefono_2;
                    this.dataRP.num_doc=predad.numero_doc;
                    this.dataRP.fecha_na=predad.fecha_nacimiento;
                    this.dataRP.direccion=predad.direccion;
                    this.dataRP.departament=predad.departamento_id;
                    this.dataRP.provincia=predad.provincia_id;
                    this.dataRP.distrito=predad.distrito_id;
                    this.dataRP.estado_ci=predad.estado_civil;
                    this.dataRP.nacio=predad.nacionalidad;
                }
                if (data.extra.madre.res){
                    const predad= data.extra.madre.data
                    this.dataRM.con_id=predad.id_contacto;
                    this.dataRM.pagador=predad.es_pagador;
                    this.dataRM.nombre=predad.nombres;
                    this.dataRM.apellido=predad.apellidos;
                    this.dataRM.email=predad.email_concto;
                    this.dataRM.genero=predad.genero;
                    this.dataRM.telefono1=predad.telefono_1;
                    this.dataRM.telefono2=predad.telefono_2;
                    this.dataRM.num_doc=predad.numero_doc;
                    this.dataRM.fecha_na=predad.fecha_nacimiento;
                    this.dataRM.direccion=predad.direccion;
                    this.dataRM.departament=predad.departamento_id;
                    this.dataRM.provincia=predad.provincia_id;
                    this.dataRM.distrito=predad.distrito_id;
                    this.dataRM.estado_ci=predad.estado_civil;
                    this.dataRM.nacio=predad.nacionalidad;
                }
                if (data.extra.apoderado.res){
                    const predad= data.extra.apoderado.data
                    this.dataRA.con_id=predad.id_contacto;
                    this.dataRA.pagador=predad.es_pagador;
                    this.dataRA.nombre=predad.nombres;
                    this.dataRA.apellido=predad.apellidos;
                    this.dataRA.email=predad.email_concto;
                    this.dataRA.genero=predad.genero;
                    this.dataRA.telefono1=predad.telefono_1;
                    this.dataRA.telefono2=predad.telefono_2;
                    this.dataRA.num_doc=predad.numero_doc;
                    this.dataRA.fecha_na=predad.fecha_nacimiento;
                    this.dataRA.direccion=predad.direccion;
                    this.dataRA.departament=predad.departamento_id;
                    this.dataRA.provincia=predad.provincia_id;
                    this.dataRA.distrito=predad.distrito_id;
                    this.dataRA.estado_ci=predad.estado_civil;
                    this.dataRA.nacio=predad.nacionalidad;
                }

            },
            actualizarData(){
                const predata ={
                    alumnoD:{...this.alumno},
                    reP:{...this.dataRP},
                    reM:{...this.dataRM},
                    reA:{...this.dataRA},
                }
                $.ajax({
                    type: "POST",
                    data:{tipo:'dataestmrtrudt',data:JSON.stringify(predata)},
                    url:URL+"/ajax/udt/estu/matr",
                    success:function (resp){
                        console.log(resp);
                        $("#irAtras").click()
                    }
                })
            }
        }
    });
        APP_R.getInfoGradp();
        $("#padre-tab").click();
        APP_R.getDataEstu();
    })
</script>
