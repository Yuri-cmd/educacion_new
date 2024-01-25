<?php
  include "config/head.php";
 ?>
<div class="d-flex align-items-center"
     style="min-height: 100vh">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto"
         style="min-width: 300px;">
        <div class="text-center mt-5 mb-1">
            <div class="avatar avatar-lg">
                <img src="<?=URL::to('assets/images/logo/primary.svg')?>"
                     class="avatar-img rounded-circle"
                     alt="LearnPlus"/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-5 navbar-light">
            <a href="<?=URL::base()?>"
               class="navbar-brand m-0">SIGEP V.1</a>
        </div>
        <div class="card navbar-shadow text-center">
           <h1>Error 404 <i class="fas fa-traffic-cone"></i></h1>
            <h3>Pagina no encontrada</h3>
        </div>
    </div>
</div>

<?php include "config/Footer.php"; ?>
