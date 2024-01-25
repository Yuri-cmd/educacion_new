<?php
session_start();

if (isset($_SESSION['ruta_usuario'])){
    header("Location: ". URL::to($_SESSION['ruta_usuario']));
}

?><!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=URL::to('views/assets/fonts/icomoon/style.css')?>">
    <link rel="stylesheet" href="<?=URL::to('views/assets/css/owl.carousel.min.css')?>">

    <link rel="stylesheet" href="<?=URL::to('views/assets/css/bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?=URL::to('views/assets/css/style.css')?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="<?=URL::to('public/css/loader.css')?>">
    <link rel="stylesheet" href="<?=URL::to('public/plugins/sweetalert2/sweetalert2.min.css')?>">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <title>Login</title>
    <style>
        .spectrum-background {
            /*background: linear-gradient(#e9bb0080, transparent), linear-gradient(to top left, #346c0c82, transparent);
            background-blend-mode: multiply;*/
        }
    </style>

</head>
<body>


<div id="loader" class="spectrum-background" style="overflow: hidden">
    <video width="320" height="240" controls>
        <source src="<?=URL::to('public/img/esama1.mp4')?>" type="video/mp4">
    </video>
    <!--img class="imagen_loager"  src="<?=URL::to('images/logos/Escudo_sin_fondo.png')?>"><br>
    <div-- style="top: 31%;left: 44.5%;;" class="lds-roller">

        <div></div><div></div><div></div><div></div><div></div><div></div><div></div>
    </div-->
</div>


<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?=URL::to('views/assets/images/69290515_2478786875703657_3039147136714276864_o.jpg')?>');"></div>
    <div class="contents order-2 order-md-1">
        <div class="container" id="contenedor">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <div class="mb-4">
                        <h3>Iniciar sesión</h3>
                        <p class="mb-4">Acceder a tu cuenta.</p>
                    </div>
                    <form v-on:submit.prevent="logeaar" >
                        <div class="form-group first">
                            <label for="username">Usuario</label>
                            <input v-model="user" required type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="password">Contraseña</label>
                            <input v-model="pass" required type="password" class="form-control" id="password">
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Recordarme</span>
                                <input type="checkbox" checked="checked"/>
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="#" class="forgot-pass">¿Has olvidado tu contraseña?</a></span>
                        </div>
                        <input type="submit" value=Acceder" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=URL::to('views/assets/js/jquery-3.3.1.min.js')?>"></script>
<script src="<?=URL::to('views/assets/js/popper.min.js')?>"></script>
<script src="<?=URL::to('views/assets/js/bootstrap.min.js')?>"></script>
<script src="<?=URL::to('views/assets/js/main.js')?>"></script>
</body>
<script src="<?=URL::to('public/js/loader.js')?>"></script>
<script src="<?=URL::to('public/plugins/sweetalert2/swal.js')?>"></script>
<script>
    const APP = new Vue({
        el:'#contenedor',
        data:{
            user:'',
            pass:''
        },
        methods:{
            logeaar(){
                $.ajax({
                    type: "POST",
                    url: '<?=URL::base()?>/login',
                    data: {user:this.user,clav:this.pass},
                    success: function (resp) {
                        console.log(resp);
                        resp = JSON.parse(resp);
                        if (resp.res){
                            window.location.href = "<?=URL::base()?>/"+resp.ruta;
                        }else{
                            swal('Error','Usuario o Contraseña, no son correctas','error')
                        }
                    }
                });
            }
        }
    });
</script>
<!-- Mirrored from preview.colorlib.com/theme/bootstrap/login-form-06/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Feb 2021 14:34:20 GMT -->
</html>
