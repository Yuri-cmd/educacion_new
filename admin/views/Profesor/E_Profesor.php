<style>
  .dalto {
    height: 400px;
  }
  .tban {
    color:#fff;
  }
</style>
<div class="modal fade" id="E_Profesor"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header bg-green-gradient">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3 align="center" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Editar Profesor</h3>
          </div>
          <form  id="formEProfe">
            <input type="hidden" id="idpro" value="">
            <input type="hidden" id="busid" value="">
          <div class="modal-body dalto">
            <div class="form-group col-md-4 col-lg-3">
                <label>TIPO DOCUMENTO:</label>
                <select class="form-control" id="bptdoc" required>
                    <option value="">--</option>
                    <option value="1">DNI</option>
                    <option value="2">Pasaporte</option>
                </select>
            </div>
            <div class="form-group  col-md-4  col-lg-3">
                <label>NRO. DOCUMENTO:</label>
                <input type="text" class="form-control" id="bpnumd" pattern="[0-9 ].{1,}" title="Ingrese solo numeros" placeholder="000...." required>
            </div>
            <div class="form-group col-md-3">
              <label>PRIMER NOMBRE:</label>
              <input type="text" class="form-control text-uppercase" id="bpnomb1" pattern="[A-z ].{1,}" title="Ingrese solo letras"  placeholder="Nombre....." required>
          </div>
          <div class="form-group  col-md-3">
              <label>SEGUNDO NOMBRE:</label>
              <input type="text" class="form-control text-uppercase" id="bpnomb2" pattern="[A-z ].{1,}" title="Ingrese solo letras" placeholder="Nombre....">
          </div>
          <div class="form-group col-md-4">
              <label>APELLIDO PARTERNO:</label>
              <input type="text" class="form-control text-uppercase" id="bpape1" pattern="[A-z ].{1,}" title="Ingrese solo letras" placeholder="Nombre....." required>
          </div>
          <div class="form-group  col-md-4">
              <label for="">APELLIDO MATERNO:</label>
              <input type="text" class="form-control text-uppercase" id="bpape2" pattern="[A-z ].{1,}" title="Ingrese solo letras"  placeholder="APELLIDO....">
          </div>
          <div class="form-group  col-md-4  col-lg-4">
              <label for="">FECHA DE NACIMIENTO:</label>
              <input type="date" class="form-control" id="bpfnac"  placeholder="000...." required>
          </div>
          <div class="form-group col-md-4  col-lg-4">
              <label for="">GENERO:</label>
              <select class="form-control" id="bpgene" required>
                  <option value="">--</option>
                  <option value="m">MASCULINO</option>
                  <option value="f">FEMENINO</option>
              </select>
          </div>
          <div class="form-group  col-md-4">
              <label for="">EMAIL:</label>
              <input type="email" id="bpemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="ejemplo@gmail.com">
          </div>
          <div class="form-group  col-md-4  col-lg-4">
              <label for="">TELEFONO:</label>
              <input type="text" class="form-control" id="bptele"  pattern="[0-9._%+-]{1,25}$" placeholder="+000000" required>
          </div>
          <div class="form-group  col-md-9">
              <label for="">ESPECIALIDAD:</label>
              <input type="text" class="form-control text-uppercase" id="bpespe"  placeholder="especialidad...." pattern="^([a-zA-Z ])[a-zA-Z0-9-_–\. ]+{1,60}$" title="Ingrese solo letras">
          </div>
          <div class="form-group col-md-8 col-xs-12 col-lg-3">
            <label><strong>PSICOLOGO:</strong></label>
            <select class="form-control select2" style="width:100%;" name="bpsico" id="bpsico">
              <option value="">--</option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select>
          </div>
          <div class="form-group col-md-8 col-xs-12 col-lg-12">
            <label><strong>DIRECCION:</strong></label>
            <input class="form-control text-uppercase" name="pdirec" id="bpdirec"  placeholder="Ingrese Direccion" pattern="^([a-zA-Z ])[a-zA-Z0-9-_–\. ]+{1,60}$" title="Ingrese solo letras" >
          </div>
          </div>
          <div class="modal-footer">
           <div class="col-lg-12">
            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-floppy-saved"></i> Guardar </button>
            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Cerrar</button></form>
          </div></div>
      </div>
  </div>
</div>
