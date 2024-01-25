<?= include "modulos/fragment/head.php" ?>

<!-- Flatpickr -->
<link type="text/css"
      href="<?=URL::to('assets/css/flatpickr.css"')?>
      rel="stylesheet">
<link type="text/css"
      href="<?=URL::to('assets/css/flatpickr-airbnb.css')?>"
      rel="stylesheet">

<!-- Quill Theme -->
<link type="text/css"
      href="<?=URL::to('assets/css/quill.css')?>"
      rel="stylesheet">

<!-- Touchspin -->
<link type="text/css"
      href="<?=URL::to('assets/css/bootstrap-touchspin.css')?>"
      rel="stylesheet">

<script src="<?=URL::to('assets/vendor/vue.min.js')?>"></script>

</head>

<body class=" layout-fluid">

<div class="preloader">
    <div class="sk-chase">
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
    </div>

    <!-- <div class="sk-bounce">
<div class="sk-bounce-dot"></div>
<div class="sk-bounce-dot"></div>
</div> -->

    <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
</div>

<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">

    <!-- Header -->

    <?= include "modulos/fragment/nav_bar.php" ?>

    <!-- // END Header -->

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push
             data-responsive-width="992px"
             class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <h1 class="h2">Dashboard</h1>


                    <div class="card" id="contenedor">
                        <div class="card-body">
                            <div class="col-md-12 text-right">
                                <a href="<?=URL::to('matriculas')?>" type="button" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar</a>
                            </div>
                            <div class="col-lg-12">
                                <hr class="fg-black line-body"/>
                            </div>

                            <form>
                                  <div class="row">
                                      <div class="form-group col-md-4">
                                          <label class="form-label"
                                                 for="flatpickrSample01">Periodo</label>
                                          <input type="text" disabled
                                                 v-model="dataRe.periodo"
                                                 required
                                                 class="form-control"
                                                 value="">
                                      </div>
                                      <div class="form-group col-md-4">
                                          <label class="form-label"
                                                 for="flatpickrSample01">Fecha Apertura</label>
                                          <input id=""
                                                 type="text"
                                                 required
                                                 v-model="dataRe.fecha_apertura"
                                                 class="form-control"
                                                 placeholder="Elija una fecha"
                                                 data-toggle="flatpickr"
                                                 value="today">
                                      </div>
                                      <div class="form-group col-md-4">
                                          <label class="form-label"
                                                 for="flatpickrSample01">Fecha de Cierre</label>
                                          <input id="flatpickrSample01"
                                                 type="text"
                                                 required
                                                 v-model="dataRe.fecha_cierre"
                                                 class="form-control"
                                                 placeholder="Elija una fecha"
                                                 data-toggle="flatpickr"
                                                 value="today">
                                      </div>
                                  </div>

                                <button class="btn btn-primary"
                                        type="submit">Submit</button>
                            </form>

                        </div>
                    </div>


                </div>

            </div>


            <?= include "modulos/fragment/nav_bar_aside.php" ?>
        </div>
        </div>



    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?= include "modulos/fragment/footer.php" ?>

</body>

<!-- Touchspin -->
<script src="<?=URL::to('assets/vendor/jquery.bootstrap-touchspin.js')?>"></script>
<script src="<?=URL::to('assets/js/touchspin.js')?>"></script>

<!-- Flatpickr -->
<script src="<?=URL::to('assets/vendor/flatpickr/flatpickr.min.js')?>"></script>

<!-- jQuery Mask Plugin -->
<script src="<?=URL::to('assets/vendor/jquery.mask.min.js')?>"></script>

<!-- Quill -->
<script src="<?=URL::to('assets/vendor/quill.min.js')?>"></script>
<script src="<?=URL::to('assets/js/quill.js')?>"></script>


<script src="<?=URL::to('public/js/js_matricula_esc.js')?>"></script>
</html>
