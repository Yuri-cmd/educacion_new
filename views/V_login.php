<?php
  include "config/head.php";
 ?>
<div class="d-flex align-items-center"
     style="min-height: 100vh">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto"
         style="min-width: 300px;">
        <div class="text-center mt-5 mb-1">
            <div class="avatar avatar-lg">
                <img src="assets/images/logo/primary.svg"
                     class="avatar-img rounded-circle"
                     alt="LearnPlus"/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-5 navbar-light">
            <a href="student-dashboard.html"
               class="navbar-brand m-0">SIGEP V.1</a>
        </div>
        <div class="card navbar-shadow">
            <div class="card-header text-center">
                <h4 class="card-title">Iniciar sesión</h4>
                <p class="card-subtitle">Acceder a tu cuenta</p>
            </div>
            <div class="card-body">
                <form action="#"
                      novalidate
                      method="get">
                    <div class="form-group">
                        <label class="form-label"
                               for="email">Usuario:</label>
                        <div class="input-group input-group-merge">
                            <input id="email" type="text" required="" class="form-control form-control-prepended" placeholder="Usuario......">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label"
                               for="password">Contraseña:</label>
                        <div class="input-group input-group-merge">
                            <input id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Contraseña......">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-edit"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit"
                                class="btn btn-primary btn-block">Acceder
                        </button>
                    </div>
                    <div class="text-center">
                        <a href="guest-forgot-password.html"
                           class="text-black-70"
                           style="text-decoration: underline;">¿Has olvidado tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "config/Footer.php"; ?>
