<?php
session_start();

if (isset($_SESSION['ruta_usuario'])){
    header("Location: ". URL::to($_SESSION['ruta_usuario']));
}

$body_class = 'desktop';
$divice=0;
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $body_class = "tablet";
    $divice = 2;
}

if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {

    $body_class = "mobile";
    $divice = 1;
}

if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {

    $body_class = "mobile";
    $divice = 1;
}


?><!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=URL::to('views/assets/fonts/icomoon/style.css')?>">
    <link rel="stylesheet" href="<?=URL::to('views/assets/css/owl.carousel.min.css')?>">

    <link rel="stylesheet" href="<?=URL::to('views/assets/css/bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?=URL::to('views/assets/css/style.css')?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="<?=URL::to('public/css/loader.css?v=4')?>">
    <link rel="stylesheet" href="<?=URL::to('public/plugins/sweetalert2/sweetalert2.min.css')?>">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <title>Login</title>
    <style>


        .conten-login{
            background-color: white;
            padding: 23px;
            border-radius: 10px;
            margin: 0;
            width: 390px;
            position: relative;
            top: 42%;
            left: 3%;
            -webkit-box-shadow: 2px 4px 18px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 2px 4px 18px 0px rgba(0,0,0,0.75);
            box-shadow: 2px 4px 18px 0px rgba(0,0,0,0.75);
        }
        @media (min-width: 350px) {
            .conten-login{
                top: 18%;
                left: 5%;
                width: 326px;
            }
        }
        @media (min-width: 400px) {
            .conten-login{
                top: 22%;
                left: 5%;
                width: 390px;
            }
        }

        @media (min-width: 576px) {
            .conten-login{
                top: 28%;
                left: 3%;
                width: 390px;
            }
        }

        @media (min-width: 768px) {
            .conten-login{
                top: 42%;
                left: 2%;
                width: 390px;
            }
        }

        @media (min-width: 992px) {
            .conten-login{
                top: 34%;
                left: 2%;
                width: 390px;
            }
        }

        @media (min-width: 1200px) {
            .conten-login{
                top: 42%;
                left: 2%;
                width: 390px;
            }
        }
        #loader{
            /*background-color: #72067e;*/
        }
        .img-loader{
            max-width: 866px;
            /*position: absolute;
            top: 19%;
            left: 24%;*/
            
        }
        .fondo-animacion{
            background-color: #72067e;
            position: absolute;
            top: 50%;
            height: 1px;
            width: 1px;
            left: 50%;
            border-radius: 50%;
        }
        .animacion-fondo2{
            top: -50%;
            left: -50%;
            height: 193%;
            width: 169%;
            transition: top 1.08s ease, left 1.09s ease, width 1s ease, height 1s ease;
        }
        .degradel-delete{
            opacity: 0;
            transition: opacity 1s ease;
        }
        #loader{
            line-height:100vh;
            text-align:center;
        }
        .img-loader{
            vertical-align:middle;
            position: relative;
        }
        .imagen-fondo-login{
            position: fixed;
            height: 101vh;
            min-width: 100%;
        }
        .logo-esama{
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            position: fixed;
            right: 2%;
            bottom: 0%;
            max-width: 200px;
            -webkit-box-shadow: -2px -3px 26px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px -3px 26px 0px rgba(0,0,0,0.75);
            box-shadow: -2px -3px 26px 0px rgba(0,0,0,0.75);
        }
        .logo-esama:hover{
            max-width: 220px;
            transition: max-width 0.5s ease
        }
        .on-clicke:hover{
            cursor: pointer;
        }

        .logo-movil{
            max-height: 100%;
            max-width: 100%;
            display: block;
            margin: auto;
        }
        .box-icono-movil{
            -webkit-box-shadow: -2px -1px 10px 1px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px -1px 10px 1px rgba(0,0,0,0.75);
            box-shadow: -2px -1px 10px 1px rgba(0,0,0,0.75);
        }
    </style>
</head>
<body class="contenedor">
<?php
$style = '';
if ($body_class == 'mobile'|| $body_class == 'tablet'){
    $style = 'position: relative;
                    left: 50%;
    transform: translatex(-50%);';
}
?>
<input value="<?=URL::to('public/img/iconos/anima_4.gif')?>" id="imagen-load" type="hidden">
<div id="loader" class="spectrum-background" style="    overflow: hidden;">
    <div id="fondo-animacion" class="fondo-animacion"></div>

    <img id="imagen-loader" style="<?=$style?>" class="img-loader" src="">

</div>

<script>
    if (window.innerWidth <=860){
        if (window.innerHeight <=481){
            document.getElementById('imagen-loader').setAttribute("style", "position: relative;left: 50%;top: 50%;transform: translate(-50%,-50%);");
        }else{
            document.getElementById('imagen-loader').setAttribute("style", "position: relative;left: 50%;transform: translatex(-50%);");
        }

    }else{
        if (window.innerHeight <=481){
            document.getElementById('imagen-loader').setAttribute("style", "position: relative;top: 50%;transform: translateY(-50%);");
        }else{
            document.getElementById('imagen-loader').setAttribute("style", "");
        }
       // document.getElementById('imagen-loader').setAttribute("style", "");
    }
</script>


<div id="contenedor" style="width: 100%;height: 100vh;">
    <?php
    $style_table='';
        if ($body_class == 'desktop'){    ?>
            <img class="imagen-fondo-login" src="<?=URL::to('images/school.png')?>" >

            <img onclick="send_magnus()" id="imagen-logo-login" style="display: none" class="logo-esama on-clicke animate__animated" src="<?=URL::to('images/esama.png')?>" >
        <?php  }elseif ($body_class == 'mobile') { ?>


            <?php
        }elseif ($body_class == 'tablet'){
            $style_table='top: 40%;left: 10%;';

            ?>

            <img class="imagen-fondo-login" src="<?=URL::to('images/school.png')?>" >

            <img onclick="send_magnus()" id="imagen-logo-login" style="display: none; right: 35%;"
                 class="logo-esama on-clicke animate__animated" src="<?= URL::to('images/esama.png') ?>">
        <?php  }
    ?>
    <?php
    if ($body_class == 'mobile') { ?>

       <div class="container-fluid" style="background-color: #ffffff;width: 100%;height: 100%;padding-top: 15px;">
           <div id="imagen-movil-iep" class="col-md-12 animate__animated" style="margin-bottom: 20px;display: none">
               <img class=" " style="max-width: 67%;margin: auto;display: block; " src="<?=URL::to('images/logos/Escudo_sin_fondo.png')?>">
           </div>
           <div class="mb-4 text-center">
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
                   <span onclick="recuperacionClave()" class="ml-auto"><a href="#" class="forgot-pass">¿Has olvidado tu contraseña?</a></span>
               </div>
               <input type="submit" value="Acceder" class="btn btn-block btn-primary">
           </form>


       </div>
        <div id="imagen-logo-login-movi" class="box-icono-movil animate__animated" style="position: absolute;bottom: 0;width: 100%;height: 64px; display: none">
            <img onclick="send_magnus()"style=""
                 class="logo-movil" src="<?= URL::to('images/esama.png') ?>">
        </div>

        <?php  }else{  ?>
        <div id="contenedor-login" class="conten-login" style="<?=$style_table?>">
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
                    <span onclick="recuperacionClave()" class="ml-auto"><a href="#" class="forgot-pass">¿Has olvidado tu contraseña?</a></span>
                </div>
                <input type="submit" value="Acceder" class="btn btn-block btn-primary">
            </form>
        </div>
    <?php   }
    ?>



</div>
<script>
    if (window.innerWidth >=1020){
        <?php
        if ($body_class == 'tablet') {
            echo 'document.getElementById("contenedor-login").style.left =  "2%";' ;
        } ?>
    }
</script>

<script src="<?=URL::to('views/assets/js/jquery-3.3.1.min.js')?>"></script>
<script src="<?=URL::to('views/assets/js/popper.min.js')?>"></script>
<script src="<?=URL::to('views/assets/js/bootstrap.min.js')?>"></script>
<script src="<?=URL::to('views/assets/js/main.js')?>"></script>


<script>

    function reportWindowSize() {
        console.log( window.innerHeight + "<>" + window.innerWidth);
        if (window.innerWidth <=860){
            if (window.innerHeight <=481){
                document.getElementById('imagen-loader').setAttribute("style", "position: relative;left: 50%;top: 50%;transform: translate(-50%,-50%);");
            }else{
                document.getElementById('imagen-loader').setAttribute("style", "position: relative;left: 50%;transform: translatex(-50%);");
            }

        }else{
            if (window.innerHeight <=481){
                document.getElementById('imagen-loader').setAttribute("style", "position: relative;top: 50%;transform: translateY(-50%);");
            }else{
                document.getElementById('imagen-loader').setAttribute("style", "");
            }
            // document.getElementById('imagen-loader').setAttribute("style", "");
        }

        if (window.innerWidth <=1014 && window.innerHeight<=770){
             document.getElementById('contenedor-login').setAttribute('style',"top: 24%; left: 2%;");
        }
        if (window.innerWidth >=1020){
            <?php
            if ($body_class == 'tablet') {
                echo 'document.getElementById("contenedor-login").style.left =  "2%";' ;
            } ?>
        }else{
            <?php
            if ($body_class == 'tablet') {
                echo 'document.getElementById("contenedor-login").style.left =  "10%";' ;
            } ?>
        }
    }
    if (window.innerWidth <=1014 && window.innerHeight<=770){
        document.getElementById('contenedor-login').setAttribute('style',"top: 24%; left: 2%;");
    }
    window.onresize = reportWindowSize;
</script>

</body>
<script src="<?=URL::to('public/js/loader.js?v=5')?>"></script>
<script src="<?=URL::to('public/plugins/sweetalert2/swal.js')?>"></script>
<script>
    function isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
    function recuperacionClave() {
        swal({
            title:'Recuperar Contraseña',
            text: "Ingrese su Email",
            buttons: ["Cancelar", "Continuar"],
            content: {
                element: "input",
                attributes: {
                    placeholder: "Ingrese su Email",
                    type: "email",
                },
            },
        }).then(function (res) {
            if (res){
                console.log(res)
                $.ajax({
                    type: "POST",
                    url: "<?=URL::base()?>/"+"/funcionalidades/email/recuperacion2.php",
                    data: {email:res},
                    success: function (resp) {
                        console.log(resp)
                        if (isJson(resp)){
                            resp = JSON.parse(resp);
                            if (resp.res){
                                swal('Exito','Se envio un mensaje a su Email','success')
                            }else{
                                swal('Error',resp.msg,'error')
                            }
                        }else{
                            swal('Error','Error en el servidor','error')
                        }
                    }
                });

            }

        });
    }
    function send_magnus(){
        window.open("https://magustechnologies.com/", '_blank');
    }
    $(document).ready(function () {
        setTimeout(function () {
            $("#imagen-logo-login-movi").show();
            $("#imagen-movil-iep").show();
            $("#imagen-logo-login-movi").addClass('animate__backInUp');
            $("#imagen-movil-iep").addClass('animate__fadeInDown');
        },3300);

        setTimeout(function () {
         $("#imagen-logo-login").show();
         $("#imagen-logo-login").addClass('animate__backInDown')
        },4000);
    })
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
                            if(resp.bloq){
                                swal('Hubo un problema','Comuníquese por favor con administrador','warning')
                            }else{
                                window.location.href = "<?=URL::base()?>/"+resp.ruta;
                            }
                           //
                           //
                        }else{
                            swal('Error','Usuario o Contraseña, no son correctas','error')
                        }
                    }
                });
            }
        }
    });
</script>
</html>