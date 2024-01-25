<div class="row">
  <input type="hidden" id="instid" value="<?=$idinst; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-group"></i>&nbsp;Alumnos</h2>
        </div>

        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="col-lg-12 table-responsive">
        <table class="table table-bordered table-hover" id="tablealumnos">
          <thead>
          <tr class="bg-green-gradient">
            <th class="text-center">#</th>
            <th class="text-center">DNI</th>
            <th class="text-center">NOMBRES</th>
            <th class="text-center">APELLIDOS</th>
            <th class="text-center">F. NACIMIENTO</th>
            <th class="text-center">TELEFONO</th>
            <th class="text-center">DIRECCION</th>
            <th class="text-center"></th>
          </tr>
          </thead>
          <tbody class="text-center"></tbody>
        </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

<div class="modal fade" id="modal-histo-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Ultimos ingresos al Sistema</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <table style="width: 100%;" id="table-hist-list" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td></td>
                            <td>Fecha</td>
                            <td>Hora</td>
                            <td>Tipo</td>
                            <td>Ip</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="functions/Alumno/Alumno.js?v=2"></script>
