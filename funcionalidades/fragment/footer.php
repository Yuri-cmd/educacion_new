<div id="modal_informacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index: 1000">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title">Mis Datos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="form-group ">
                        <div   style="width: 100%; height: 20px; border-bottom: 2px solid #869fba; text-align: left">
                              <span style="font-size: 16px; font-weight: bold ; background-color: #ffffff; padding: 0 5px;">
                                Datos Personales<!--Padding is optional-->
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
                                    Datos de Seguridad<!--Padding is optional-->
                                  </span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-4  col-lg-4">
                            <label for="">Contraseña actual</label>
                            <input autocomplete="off"  v-model="" type="password" class="form-control" placeholder="">
                        </div>


                        <div class="form-group col-md-4 col-lg-4">
                            <label for="">Contraseña Nueva</label>
                            <input autocomplete="off"  v-model="" type="password" class="form-control" placeholder="">
                        </div>

                        <div class="form-group col-md-4  col-lg-4">
                            <label for="">Repita la Contraseña</label>
                            <input autocomplete="off"  v-model="" type="password" class="form-control" placeholder="">
                        </div>

                        <div class="col-md-12">
                            <button style="display: block;margin: auto" type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    //$.widget.bridge('uibutton', $.ui.button);
</script>


<!-- Bootstrap 3.3.7 -->
<script src="<?=URL::to('assets2/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=URL::to('assets2/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=URL::to('assets2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!--Alert -->
<script src="<?=URL::to('assets2/bower_components/toast/toastr.js')?>"></script>
<!-- Input file -->
<script src="<?=URL::to('assets2/bower_components/inputfile/bootstrap.file-input.js')?>"></script>
<!-- Select2 -->
<script src="<?=URL::to('assets2/bower_components/select2/select2.full.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?=URL::to('assets2/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?=URL::to('assets2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?=URL::to('assets2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=URL::to('assets2/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?=URL::to('assets2/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?=URL::to('assets2/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?=URL::to('assets2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=URL::to('assets2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?=URL::to('assets2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=URL::to('assets2/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=URL::to('assets2/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="<?=URL::to('assets2/dist/js/pages/dashboard.js')?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?=URL::to('assets2/dist/js/demo.js')?>"></script>
<script src="<?=URL::to('public/plugins/sweetalert2/swal.js')?>"></script>
<script src="<?=URL::to('public/js/utils.js')?>"></script>







<script>
    $(function () {
        $('#example2').DataTable()
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
