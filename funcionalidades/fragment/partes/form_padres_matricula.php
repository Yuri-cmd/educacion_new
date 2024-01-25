<?php

?>
<div id="conte-value">
    <input type="hidden" id="parentesco" value="<?=$_SESSION['usuario_rol']?>">
    <input type="hidden" id="parentescousid" value="<?= Tools::encrypt($_SESSION['usuario_padre_apoderado'])?>">
    <div class="col-md-12 text-center">
        <h2>Registro de datos de los padres o apoderados</h2>
        <p>Complete los campos importantes, los email ingresados se usaran para enviarle correo para que pueda acceder  a la plataforma y puedan visualizar la los estudiantes matriculados.</p>
    </div>
    <div class="container-fluid">
        <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">

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
                            <input autocomplete="off" v-model="dataRP.num_doc" type="text" class="form-control"  placeholder="000....">
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
                                foreach ($listas as $depa){
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
                            <input  autocomplete="off" v-model="dataRM.num_doc" type="text" class="form-control"  placeholder="000....">
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
                                foreach ($listas as $depa){
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
                            <input autocomplete="off" v-model="dataRA.num_doc" type="text" class="form-control"  placeholder="000....">
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
            <br>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">

                <div class="col-md-12  text-center">
                    <button type="button" v-on:click="registrar()" class="btn btn-primary col-md-offset-4 col-md-4">Continuar</button>
                </div>

                </div>
            </div>

        </div>

    </div>
</div>
<script>
    var APP;
    $(document).ready(function () {

       /*$('#depa').on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);
        });*/
        <?php

        if ($_SESSION['usuario_rol'] == 3){
            echo '$("#padre-tab").click();';
        }elseif($_SESSION['usuario_rol'] == 5){
            echo '$("#madre-tab").click();';
        }elseif($_SESSION['usuario_rol'] == 4){
            echo '$("#apoderado-tab").click();';
        }

        ?>

        const lista = $(".checkout-bar > li");
        const limite = 1;
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

       setTimeout(function () {
         //  $('select').select2();
       },1000);
         APP = new Vue({
            el:'#conte-value',
            data:{
                nombre:'Bruno',
                checkboxterm:false,
                compiled:null,
                dataRP:{
                    pagador:<?=$_SESSION['usuario_rol']=='3'?'true':'false'?>,
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
                    pagador:<?=$_SESSION['usuario_rol']=='5'?'true':'false'?>,
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
                    pagador:<?=$_SESSION['usuario_rol']=='4'?'true':'false'?>,
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
                getDatos(){
                    const martr= $("#matricula").val();
                    $.ajax({
                        type: "POST",
                        url: URL+'/ajax/consulta',
                        data: {tipo:'dataMatricula',martr},
                        success: function (resp) {
                            resp = JSON.parse(resp);
                            console.log(resp);
                            for (var i=0; i<resp.length;i++ ){
                                const  temp = {
                                    pagador:resp[0].es_pagador,
                                    maprei:resp[0].id_contacto,
                                    nombre:resp[0].nombres,
                                    apellido:resp[0].apellidos,
                                    email:resp[0].email_concto,
                                    genero:resp[0].genero,
                                    telefono1:resp[0].telefono_1,
                                    telefono2:resp[0].telefono_2,
                                    tipo_doc:resp[0].tipo_doc,
                                    num_doc:resp[0].numero_doc,
                                    fecha_na:resp[0].fecha_nacimiento,
                                    direccion:resp[0].direccion,
                                    departament:resp[0].departamento_id,
                                    provincia:resp[0].provincia_id,
                                    distrito:resp[0].distrito_id,
                                    estado_ci:resp[0].estado_civil,
                                    nacio:resp[0].nacionalidad
                                }
                                if (resp[0].id_rol=='4'){
                                    APP._data.dataRA=temp
                                    setTimeout(function () {
                                        APP. onChangeDepar('a');
                                        APP. onChangeProv('a');
                                    },1000)

                                }else if (resp[0].id_rol=='5'){
                                    APP._data.dataRM=temp

                                    setTimeout(function () {
                                        APP. onChangeDepar('m');
                                        APP. onChangeProv('m');
                                    },1000)

                                }else if (resp[0].id_rol=='3'){
                                    APP._data.dataRP=temp

                                    setTimeout(function () {
                                        APP. onChangeDepar('p');
                                        APP. onChangeProv('p');
                                    },1000)
                                }

                            }
                        }
                    });

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
                                APP._data.list_distri_p = resp;
                            }else if(op=='m'){
                                APP._data.list_distri_m = resp;
                            }else if(op=='a'){
                                APP._data.list_distri_a = resp;
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
                                APP._data.list_provi_p = resp;
                            }else if(op=='m'){
                                APP._data.list_provi_m = resp;
                            }else if(op=='a'){
                                APP._data.list_provi_a = resp;
                            }
                            $("#loader-menor").hide();
                        }
                    });

                },
                registrar(){
                    $("#loader-menor").show();
                   /* if ($("#parentesco")+''=='4'){
                        this.dataRA.maprei= $("#parentescousid").val();
                    }else if ($("#parentesco")+''=='5'){
                        this.dataRM.maprei=$("#parentescousid").val();
                    }else if ($("#parentesco")+''=='3'){
                        this.dataRP.maprei=$("#parentescousid").val();
                    }*/

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
                    if (true){
                        $.ajax({
                            type: "POST",
                            url: URL+'/ajax/matricula',
                            data: {tipo:'datre',matr:$("#matricula").val(),dtaos:JSON.stringify(contePreData)},
                            success: function (rest) {

                                console.log(rest);
                                rest = JSON.parse(rest)

                                if (rest.res){
                                    renderHTML(rest.dom);
                                }
                            }
                        });

                    }else{
                        swal('Deve aceptar los terminos');
                    }
                }
            }
        });


         APP. getDatos();
        $("#loader-menor").hide();
    })
</script>