<style>
    .boton-pago {
        padding: 15px 30px;
        font-size: 18px;
        background-color: #4CAF50;
        /* Color de fondo */
        color: #fff;
        /* Color del texto */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .boton-pago:hover {
        background-color: #45a049;
        /* Cambio de color al pasar el ratón sobre el botón */
    }
</style>
<input id="matricula_aper" type="hidden" value="4">
<input id="fecha-reg-alm" type="hidden" value="<?= date('Y-m-d') ?>">
<div class="box-header with-border">
    <div class="col-md-7">
        <h3 style="font-weight: bold;" class="box-title">Matricula</h3>
    </div>

    <div class="col-md-5 text-right">
        <button onclick="$('#evento-reg').click()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Guardar</button>
        <button id="irAtras" onclick="getlistaMatriculados(<?= $nivel_id ?>)" type="button" class="btn btn-warning"><i class="fa fa-arrow-left"></i></button>
    </div>
</div>
<div class="box-body" id="contenedo-reg">
    <div class="col-md-12 text-center">
        <h2>Ficha de matricula</h2>

    </div>
    <input type="hidden" id="nivel-id" value="<?= $nivel_id ?>">
    <div class="col-md-12">
        <div class="form-group ">
            <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                    Datos del alumno<!--Padding is optional-->
                </span>

            </div>
        </div>

        <button style="display: none" id="evento-reg" v-on:click="registrar()"></button>
        <div class="form-group col-md-4">
            <label>Nro. DNI</label>
            <div class="input-group">

                <input v-model="alumno.doc" @keypress="onlyNumber" type="text" class="form-control">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-search"></i></button>
                </span>

            </div>
        </div>
        <div class="form-group col-md-4">
            <label>Primer Nombre</label>
            <input v-model="alumno.primer_nombre" type="text" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Segundo Nombre</label>
            <input v-model="alumno.segundo_nombre" type="text" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Apellido Patermo</label>
            <input v-model="alumno.apellido_paterno" type="text" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Apellido Materno</label>
            <input v-model="alumno.apellido_materno" type="text" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Fecha Nacimiento</label>
            <input v-model="alumno.fecha_n" type="date" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Genero</label>
            <select v-model="alumno.genero" class="form-control">
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Grado</label>
            <select @change="onChangeGrados($event)" v-model="alumno.grado" type="text" class="form-control">
                <option v-for="(item, index) in grados" :value="item.grado_id">{{item.nombre_grado}}</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Seccion</label>
            <select v-model="alumno.seccion" type="text" class="form-control">
                <option v-for="(item, index) in secciones" :value="item.seccion_id">{{item.nombre}}</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Telefono</label>
            <input v-model="alumno.telefono" type="text" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Direccion</label>
            <input v-model="alumno.direccion" type="text" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Email</label>
            <input v-model="alumno.email" type="email" class="form-control">
        </div>

    </div>
    <div class="col-md-12">
        <div class="form-group ">
            <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                    Datos del familiar<!--Padding is optional-->
                </span>

            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="padre-tab" data-toggle="tab" href="#padre" role="tab" aria-controls="padre" aria-selected="true">Padre</a>
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
                        <input v-model="dataRP.pagador" type="checkbox">
                    </div>
                </div>
                <div class="form-group ">
                    <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                        <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                            Datos Personales del Padre<!--Padding is optional-->
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre completo</label>
                        <input autocomplete="off" v-model="dataRP.nombre" type="text" class="form-control" placeholder="Nombre.....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Apellidos</label>
                        <input autocomplete="off" v-model="dataRP.apellido" type="text" class="form-control" placeholder="apellidos....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Email</label>
                        <input autocomplete="off" v-model="dataRP.email" type="email" class="form-control" placeholder="email.....">
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Genero</label>
                        <select v-model="dataRP.genero" class="form-control">
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 1</label>
                        <input autocomplete="off" v-model="dataRP.telefono1" type="text" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 2</label>
                        <input autocomplete="off" v-model="dataRP.telefono2" type="text" class="form-control" placeholder="000....">
                    </div>

                    <div class="form-group col-md-4   col-lg-2">
                        <label for="">Tipo Documento</label>
                        <select v-model="dataRP.tipo_doc" type="text" class="form-control">
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nro. Documento</label>
                        <input autocomplete="off" @keypress="onlyNumber" v-model="dataRP.num_doc" type="text" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Fecha de nacimiento</label>
                        <input autocomplete="off" v-model="dataRP.fecha_na" type="date" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Estado civil</label>
                        <select v-model="dataRP.estado_ci" class="form-control">
                            <option value="Soltero">Soltero (a)</option>
                            <option value="Casado">Casado (a)</option>
                            <option value="Divorciodo">Divorciodo (a)</option>
                            <option value="Viudo">Viudo (a)</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nacionalidad</label>
                        <input autocomplete="off" v-model="dataRP.nacio" type="text" class="form-control" placeholder="Perua....">
                    </div>

                </div>
                <br>
                <div class="form-group ">
                    <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                        <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                            Datos del Hogar<!--Padding is optional-->
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Direccion</label>
                        <input autocomplete="off" v-model="dataRP.direccion" type="email" class="form-control" placeholder="Direccion.....">
                    </div>

                    <div class="form-group col-md-4   col-lg-3">
                        <label for="">Departamento</label>
                        <select id="depa" @change="onChangeDepar('p')" v-model="dataRP.departament" type="text" class="form-control">
                            <?php
                            foreach ($listas_dep as $depa) {
                                echo "<option value='" . $depa['dep_cod'] . "'>" . $depa['dep_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                        <label for="">Provincia</label>
                        <select @change="onChangeProv('p')" v-model="dataRP.provincia" type="text" class="form-control">
                            <option v-for="(item, index) in list_provi_p" v-bind:value="item.pro_cod">{{item.pro_nombre}}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Distrito</label>
                        <select v-model="dataRP.distrito" type="text" class="form-control">
                            <option v-for="(item, index) in list_distri_p" v-bind:value="item.dis_codigo">{{item.dis_nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="madre" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Responsable de pago</label>
                        <input autocomplete="off" v-model="dataRM.pagador" type="checkbox">
                    </div>
                </div>
                <div class="form-group ">
                    <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                        <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                            Datos Personales de la Madre<!--Padding is optional-->
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre completo</label>
                        <input autocomplete="off" v-model="dataRM.nombre" type="text" class="form-control" placeholder="Nombre.....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Apellidos</label>
                        <input autocomplete="off" v-model="dataRM.apellido" type="text" class="form-control" placeholder="apellidos....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Email</label>
                        <input autocomplete="off" v-model="dataRM.email" type="email" class="form-control" placeholder="email.....">
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Genero</label>
                        <select v-model="dataRM.genero" class="form-control">
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 1</label>
                        <input autocomplete="off" v-model="dataRM.telefono1" type="text" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 2</label>
                        <input autocomplete="off" v-model="dataRM.telefono2" type="text" class="form-control" placeholder="000....">
                    </div>

                    <div class="form-group col-md-4   col-lg-2">
                        <label for="">Tipo Documento</label>
                        <select v-model="dataRM.tipo_doc" type="text" class="form-control">
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nro. Documento</label>
                        <input autocomplete="off" @keypress="onlyNumber" v-model="dataRM.num_doc" type="text" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Fecha de nacimiento</label>
                        <input autocomplete="off" v-model="dataRM.fecha_na" type="date" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Estado civil</label>
                        <select v-model="dataRM.estado_ci" class="form-control">
                            <option value="Soltero">Soltero (a)</option>
                            <option value="Casado">Casado (a)</option>
                            <option value="Divorciodo">Divorciodo (a)</option>
                            <option value="Viudo">Viudo (a)</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nacionalidad</label>
                        <input autocomplete="off" v-model="dataRM.nacio" type="text" class="form-control" placeholder="Perua....">
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                        <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                            Datos del Hogar<!--Padding is optional-->
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Direccion</label>
                        <input autocomplete="off" v-model="dataRM.direccion" type="email" class="form-control" placeholder="Direccion.....">
                    </div>

                    <div class="form-group col-md-4   col-lg-3">
                        <label for="">Departamento</label>
                        <select @change="onChangeDepar('m')" v-model="dataRM.departament" type="text" class="form-control">
                            <?php
                            foreach ($listas_dep as $depa) {
                                echo "<option value='" . $depa['dep_cod'] . "'>" . $depa['dep_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                        <label for="">Provincia</label>
                        <select @change="onChangeProv('m')" v-model="dataRM.provincia" type="text" class="form-control">
                            <option v-for="(item, index) in list_provi_m" v-bind:value="item.pro_cod">{{item.pro_nombre}}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Distrito</label>
                        <select v-model="dataRM.distrito" type="text" class="form-control">
                            <option v-for="(item, index) in list_distri_m" v-bind:value="item.dis_codigo">{{item.dis_nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="apoderado" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Responsable de pago</label>
                        <input autocomplete="off" v-model="dataRA.pagador" type="checkbox">
                    </div>
                </div>
                <div class="form-group ">
                    <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                        <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                            Datos Personales del Apoderado<!--Padding is optional-->
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre completo</label>
                        <input autocomplete="off" v-model="dataRA.nombre" type="text" class="form-control" placeholder="Nombre.....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Apellidos</label>
                        <input autocomplete="off" v-model="dataRA.apellido" type="text" class="form-control" placeholder="apellidos....">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="">Email</label>
                        <input autocomplete="off" v-model="dataRA.email" type="email" class="form-control" placeholder="email.....">
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Genero</label>
                        <select v-model="dataRA.genero" class="form-control">
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 1</label>
                        <input autocomplete="off" v-model="dataRA.telefono1" type="text" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-2">
                        <label for="">Telefono 2</label>
                        <input autocomplete="off" v-model="dataRA.telefono2" type="text" class="form-control" placeholder="000....">
                    </div>

                    <div class="form-group col-md-4   col-lg-2">
                        <label for="">Tipo Documento</label>
                        <select v-model="dataRA.tipo_doc" type="text" class="form-control">
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nro. Documento</label>
                        <input autocomplete="off" @keypress="onlyNumber" v-model="dataRA.num_doc" type="text" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Fecha de nacimiento</label>
                        <input autocomplete="off" v-model="dataRA.fecha_na" type="date" class="form-control" placeholder="000....">
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Estado civil</label>
                        <select v-model="dataRA.estado_ci" class="form-control">
                            <option value="Soltero">Soltero (a)</option>
                            <option value="Casado">Casado (a)</option>
                            <option value="Divorciodo">Divorciodo (a)</option>
                            <option value="Viudo">Viudo (a)</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Nacionalidad</label>
                        <input autocomplete="off" v-model="dataRA.nacio" type="text" class="form-control" placeholder="Perua....">
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                        <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                            Datos del Hogar<!--Padding is optional-->
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-md-4  col-lg-4">
                        <label for="">Direccion</label>
                        <input autocomplete="off" v-model="dataRA.direccion" type="email" class="form-control" placeholder="Direccion.....">
                    </div>

                    <div class="form-group col-md-4   col-lg-3">
                        <label for="">Departamento</label>
                        <select @change="onChangeDepar('a')" v-model="dataRA.departament" type="text" class="form-control">
                            <?php
                            foreach ($listas as $depa) {
                                echo "<option value='" . $depa['dep_cod'] . "'>" . $depa['dep_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-lg-3">
                        <label for="">Provincia</label>
                        <select @change="onChangeProv('a')" v-model="dataRA.provincia" type="text" class="form-control">
                            <option v-for="(item, index) in list_provi_a" v-bind:value="item.pro_cod">{{item.pro_nombre}}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4  col-lg-2">
                        <label for="">Distrito</label>
                        <select v-model="dataRA.distrito" type="text" class="form-control">
                            <option v-for="(item, index) in list_distri_a" v-bind:value="item.dis_codigo">{{item.dis_nombre}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group ">
            <div style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                    Datos del pago<!--Padding is optional-->
                </span>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Aplicar IGV Venta</label>
                <select :disabled="!apli_igv_is" v-model="pago.apli_igv" class="form-control">
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Documento</label>
                <select @change="onChangeTiDoc($event)" v-model="pago.tipo_documento_V" class="form-control">
                    <option value="1">BOLETA DE VENTA</option>
                    <option value="2">FACTURA</option>
                    <option value="6">NOTA DE VENTA</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Tipo Pago</label>
                <select v-model="pago.tipo_pago" class="form-control">
                    <option value="1">Contado</option>
                    <option value="2">Crédito</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Método de Pago</label>
                <select class="form-control" v-model='pago.metodo'>
                    <?php foreach ($metodos_pagos as $metodo) : ?>
                        <option value="<?= $metodo['id_metodo_pago'] ?>"><?php echo $metodo['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group  col-md-4  col-lg-2">
                <label for="">Ser</label>
                <input v-model="pago.serie" type="text" class="form-control text-center" readonly="">
            </div>
            <div class="form-group  col-md-4  col-lg-2">
                <label for="">Num</label>
                <input v-model="pago.numero" type="text" class="form-control text-center" readonly="">
            </div>
            <div class="form-group col-md-4">
                <label>Moneda</label>
                <select v-model="pago.moneda" class="form-control">
                    <option value="1">SOLES</option>
                    <option value="2">DOLARES</option>
                </select>
            </div>
            <div class="form-group  col-md-4">
                <label for="">Tasa de cambio</label>
                <input v-model="pago.tc" @keypress="onlyNumber" type="text" class="form-control">
            </div>
            <div class="form-group col-md-4  col-lg-2">
                <label for="">Fecha Emisión</label>
                <input v-model="pago.fecha" type="date" placeholder="dd/mm/aaaa" name="input_fecha" class="form-control text-center" value="2021-10-16">
            </div>

            <div class="form-group  col-md-4  col-lg-2">
                <label for="">Fecha Vencimiento</label>
                <input disabled v-model="pago.fechaVen" type="date" placeholder="dd/mm/aaaa" name="input_fecha" class="form-control text-center" value="2021-10-16">
            </div>
            <div v-if="pago.tipo_pago=='2'" class="form-group  col-md-4">
                <label for="">Días de pago</label>
                <input @focus="focusDiasPagos" v-model="pago.dias_pago" type="text" class="form-control text-center">
            </div>
            <div class="form-group  col-md-4">
                <label>Nro. documento</label>
                <div class="input-group">
                    <input v-model="pago.doc" @keypress="onlyNumber" type="text" class="form-control">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" v-on:click="buscar()">
                            <i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
            <div class="form-group  col-md-4  col-lg-4">
                <label for="">Nombre Cliente</label>
                <input autocomplete="off" v-model="pago.cliente" type="text" class="form-control" placeholder="Nombre Cliente">
            </div>
            <div class="form-group  col-md-4  col-lg-4">
                <label for="">Direccion</label>
                <input autocomplete="off" v-model="pago.dir_cli" type="text" class="form-control" placeholder="Direccion.....">
            </div>
            <div class="form-group  col-md-4  col-lg-4">
                <label for="">Observaciones</label>
                <input v-model="pago.observ" type="text" placeholder="" class="form-control ui-autocomplete-input" autocomplete="off">
            </div>
            <div class="form-group  col-md-4  col-lg-2">
                <label for="">Paga con</label>
                <input v-model="pago.pagacon" @keypress="onlyNumber" type="text" placeholder="" class="form-control text-center">
            </div>
            <div class="form-group  col-md-4  col-lg-2">
                <label for="">Vuelto</label>
                <input :value="vuelDelPago" disabled type="text" class="form-control text-center">
            </div>
            <div v-if="pago.metodo=='7' || pago.metodo=='8' || pago.metodo=='9'" class="form-group  col-md-4">
                <label for="">Botón de pago</label>
                <button class="boton-pago form-control" onclick="abrirPasarela()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-dias-pagos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dias de Pagos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="">
                            <label class="form-label">Fecha Emisión</label>
                            <input v-model="venta.fecha" disabled type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label class="form-label">Monto Total Venta</label>
                            <input :value="'S/ '+venta.total" disabled type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Días de pagos</label>
                    <input placeholder="10,20,30,........" v-model="venta.dias_pago" @keypress="onlyNumberComas" type="text" class="form-control">
                    <div class="form-text">Separar por comas los días de pagos</div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="text-center table-sm table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in venta.dias_lista">
                                    <td></td>
                                    <td>{{visualFechaSee(item.fecha)}}</td>
                                    <td>S/ {{formatoDecimal(item.monto)}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th>{{totalValorListaDias}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">

</div>

<script>
    $(document).ready(function() {
        const APP_R = new Vue({
            el: '#contenedo-reg',
            apli_igv_is: true,
            data: {
                alumno: {
                    estu: 0,
                    perfil_id: 0,
                    doc: '',
                    primer_nombre: '',
                    segundo_nombre: '',
                    apellido_paterno: '',
                    apellido_materno: '',
                    grado: '',
                    seccion: '',
                    fecha_n: $("#fecha-reg-alm").val(),
                    genero: '',
                    telefono: '',
                    direccion: '',
                    email: ''
                },
                grados: [],
                secciones: [],

                dataRP: {
                    pagador: <?= $_SESSION['usuario_rol'] == '3' ? 'true' : 'false' ?>,
                    maprei: '',
                    nombre: '',
                    apellido: '',
                    email: '',
                    genero: '',
                    telefono1: '',
                    telefono2: '',
                    tipo_doc: '',
                    num_doc: '',
                    fecha_na: '',
                    direccion: '',
                    departament: '',
                    provincia: '',
                    distrito: '',
                    estado_ci: '',
                    nacio: ''
                },
                dataRM: {
                    pagador: <?= $_SESSION['usuario_rol'] == '5' ? 'true' : 'false' ?>,
                    maprei: '',
                    nombre: '',
                    apellido: '',
                    email: '',
                    genero: '',
                    telefono1: '',
                    telefono2: '',
                    tipo_doc: '',
                    num_doc: '',
                    fecha_na: '',
                    direccion: '',
                    departament: '',
                    provincia: '',
                    distrito: '',
                    estado_ci: '',
                    nacio: ''
                },
                dataRA: {
                    pagador: <?= $_SESSION['usuario_rol'] == '4' ? 'true' : 'false' ?>,
                    maprei: '',
                    nombre: '',
                    apellido: '',
                    email: '',
                    genero: '',
                    telefono1: '',
                    telefono2: '',
                    tipo_doc: '',
                    num_doc: '',
                    fecha_na: '',
                    direccion: '',
                    departament: '',
                    provincia: '',
                    distrito: '',
                    estado_ci: '',
                    nacio: ''
                },
                pago: {
                    doc: '',
                    apli_igv: 1,
                    tipo_documento_V: '6',
                    serie: '',
                    numero: '',
                    metodo: 12,
                    tipo_pago: '1',
                    fecha: $("#fecha-app").val(),
                    fechaVen: $("#fecha-app").val(),
                    moneda: 1,
                    tc: '',
                    cliente: "",
                    dir_cli: "",
                    pagacon: '',
                    observ: '',
                },
                list_distri_p: [],
                list_provi_p: [],
                list_distri_m: [],
                list_provi_m: [],
                list_distri_a: [],
                list_provi_a: [],
            },
            watch: {
                'pago.dias_pago'(newValue) {
                    const listD = (newValue + "").split(",");
                    this.dias_lista = [];
                    if (listD.length > 0) {

                        var listaTemp = listD.filter(ite => ite.length > 0)
                        const palorInicial = (parseFloat(this.venta.total + "") / listaTemp.length).toFixed(0)
                        var totalValos = parseFloat(this.venta.total + "");
                        listaTemp = listaTemp.map((num, index) => {
                            var fecha_ = new Date(this.venta.fecha)
                            const dias_ = parseInt(num + "")
                            fecha_.setDate(fecha_.getDate() + dias_);
                            var value = 0;
                            if (index + 1 == listaTemp.length) {
                                value = totalValos;
                                this.venta.fechaVen = this.formatDate(fecha_)
                            } else {
                                value = palorInicial;
                                totalValos -= palorInicial;
                            }
                            return {
                                fecha: this.formatDate(fecha_),
                                monto: value
                            }
                        });
                        //console.log(palorInicial+"<<<<<<<<<<<<<")
                        this.venta.dias_lista = listaTemp
                        //console.log(listaTemp);
                    }

                }
            },
            methods: {
                registrar() {
                    $("#loader-menor").show();
                    var contePreData = [];
                    if (this.dataRA.num_doc.length > 1) {
                        contePreData.push(this.dataRA)
                    }
                    if (this.dataRP.num_doc.length > 1) {
                        contePreData.push(this.dataRP)
                    }
                    if (this.dataRM.num_doc.length > 1) {
                        contePreData.push(this.dataRM)
                    }
                    var dataAlum = {
                        ...this.alumno
                    };
                    dataAlum.nivel_edu = $("#nivel-id").val();
                    dataAlum.matricula_apr = $("#apertura").val();
                    if (true) {
                        $.ajax({
                            type: "POST",
                            url: URL + '/ajax/matricula',
                            data: {
                                tipo: 'datre_2',
                                alumno: JSON.stringify(dataAlum),
                                dtaos: JSON.stringify(contePreData)
                            },
                            success: function(rest) {

                                //console.log(rest);
                                rest = JSON.parse(rest);
                                if (rest.res) {
                                    $("#irAtras").click();
                                }
                                $("#loader-menor").hide();
                            }
                        });

                    } else {
                        swal('Deve aceptar los terminos');
                    }
                },
                onChangeProv(op) {
                    $("#loader-menor").show();
                    //console.log(op)
                    var dep = '';
                    var pro = '';

                    if (op == 'p') {
                        pro = this.dataRP.provincia;
                        dep = this.dataRP.departament;
                    } else if (op == 'm') {
                        pro = this.dataRM.provincia;
                        dep = this.dataRM.departament;
                    } else if (op == 'a') {
                        pro = this.dataRA.provincia;
                        dep = this.dataRA.departament;
                    }
                    // console.log(op =='p');
                    $.ajax({
                        type: "POST",
                        url: URL + '/ajax/consulta',
                        data: {
                            tipo: 'provin',
                            value: dep,
                            value2: pro
                        },
                        success: function(resp) {
                            resp = JSON.parse(resp);

                            if (op == 'p') {
                                APP_R._data.list_distri_p = resp;
                            } else if (op == 'm') {
                                APP_R._data.list_distri_m = resp;
                            } else if (op == 'a') {
                                APP_R._data.list_distri_a = resp;
                            }
                            //console.log(resp);
                            $("#loader-menor").hide();
                        }
                    });

                },
                onChangeDepar(op) {
                    $("#loader-menor").show();
                    //console.log(op)
                    var dep = '';

                    if (op == 'p') {
                        console.log()
                        dep = this.dataRP.departament;
                    } else if (op == 'm') {
                        dep = this.dataRM.departament;
                    } else if (op == 'a') {
                        dep = this.dataRA.departament;
                    }
                    //console.log(op =='p');
                    $.ajax({
                        type: "POST",
                        url: URL + '/ajax/consulta',
                        data: {
                            tipo: 'departa',
                            value: dep
                        },
                        success: function(resp) {
                            //console.log(resp);
                            resp = JSON.parse(resp);
                            if (op == 'p') {
                                APP_R._data.list_provi_p = resp;
                            } else if (op == 'm') {
                                APP_R._data.list_provi_m = resp;
                            } else if (op == 'a') {
                                APP_R._data.list_provi_a = resp;
                            }
                            $("#loader-menor").hide();
                        }
                    });

                },
                onChangeGrados(event) {
                    $.ajax({
                        type: "POST",
                        url: URL + "/ajax/consulta",
                        data: {
                            tipo: 'data-s',
                            grado: event.target.value
                        },
                        success: function(resp) {
                            console.log(resp);
                            APP_R._data.secciones = JSON.parse(resp);
                        }
                    });
                },
                getInfoGradp() {
                    $.ajax({
                        type: "POST",
                        url: URL + "/ajax/consulta",
                        data: {
                            tipo: 'data-g',
                            nivel: $("#nivel-id").val()
                        },
                        success: function(resp) {
                            console.log(resp);
                            APP_R._data.grados = JSON.parse(resp);
                        }
                    });

                },
                onlyNumber($event) {
                    //console.log($event.keyCode); //keyCodes value
                    let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                    if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                        $event.preventDefault();
                    }
                },
                buscar() {
                    let documento = this.pago.doc;
                    $.ajax({
                        type: "POST",
                        url: URL + "/ajax/consulta_doc",
                        data: {
                            tipo: 'get_datos_doc',
                            doc: documento
                        },
                        success: function(resp) {
                            var jsonData = JSON.parse(resp);
                            console.log(jsonData);
                            if (documento.length > 8) {
                                APP_R.pago.cliente = jsonData.razonSocial;
                                APP_R.pago.dir_cli = jsonData.direccion;
                            } else {
                                APP_R.pago.cliente = jsonData.nombres + ' ' + jsonData.apellidoPaterno + ' ' + jsonData.apellidoMaterno;
                                APP_R.pago.dir_cli = '';
                            }
                        }
                    });
                },
                buscarSNdoc() {
                    $.ajax({
                        type: "POST",
                        url: URL + "/ajax/consulta/sn",
                        data: {
                            tipo: 'sn',
                            doc: this.pago.tipo_documento_V
                        },
                        success: function(resp) {
                            var jsonData = JSON.parse(resp);
                            APP_R.pago.serie = jsonData.serie
                            APP_R.pago.numero = jsonData.numero
                        }
                    });
                },
                onChangeTiDoc(event) {
                    this.buscarSNdoc();
                    if (this.pago.tipo_documento_V == 6) {
                        this.apli_igv_is = false
                        this.pago.apli_igv = 1
                    } else {
                        this.apli_igv_is = true;
                    }
                },
                changeTipoPago(event) {
                    this.pago.fechaVen = this.pago.fecha;
                    this.pago.dias_lista = []
                    this.pago.dias_pago = ''
                },
                focusDiasPagos() {
                    //console.log("1000000000000000000")
                    $("#modal-dias-pagos").modal("show")
                },
            },
            computed: {
                vuelDelPago() {
                    if (this.pago.pagacon.length > 0) {
                        let pagacon = parseFloat(this.pago.pagacon)
                        if (this.pago.segundoPago) {
                            pagacon = pagacon + (isNaN(parseFloat(this.pago.pagacon2)) ? 0 : parseFloat(this.pago.pagacon2))
                        }
                        return pagacon - parseFloat(this.totalProdustos)
                    } else {
                        return ''
                    }
                },
            }
        });
        APP_R.getInfoGradp();

        $("#padre-tab").click();
    })
</script>