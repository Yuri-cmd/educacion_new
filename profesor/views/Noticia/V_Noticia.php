<div class="row">
  <input type="hidden" id="instid" value="<?=$idinst; ?>">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header ">
        <div class="col-lg-6">
          <h2 ><i class="fa fa-edit"></i>&nbsp;Noticias</h2>
        </div>

        <div class="col-lg-12"><hr /></div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="col-lg-12 table-responsive">
        <table class="table table-bordered table-hover" id="tablegaleria">
          <thead>
          <tr class="bg-green-gradient">
            <th class="text-center">#</th>
            <th class="text-center">TITULO</th>
            <th class="text-center">CONTENIDO</th>
            <th class="text-center">FECHA</th>

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
<script type="text/javascript" src="functions/Noticia/Noticia.js"></script>
