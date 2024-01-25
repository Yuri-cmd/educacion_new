<?php
  error_reporting(E_ERROR | E_PARSE);
  session_start();
  //CONEXION A BD
  include "functions/BD.php";
  //MAPA DEL SITIO
  include "config/Sitemap.php";

  //INICION DE SESION (VARIABLES - SESSION)
  $idusua =$_SESSION['usuario'];
  $idinst = $_SESSION['institucion'];

  /*  $us_nombre=$_SESSION["usuario_valido"]; $us_nomape=$_SESSION["usu_nombres_apellidos"]; $us_ngrupo=$_SESSION["gru_nombre"];
    $us_usuid=$_SESSION["usu_iden"]; $us_usuid=$_SESSION["usu_id"]; $us_grupo=$_SESSION["gru_id"]; $us_nomusu = $_SESSION["usu_nomusu"];
   if (isset($_SESSION["usuario_valido"]) AND $_SESSION["gru_id"] == '1') {*/
      include "config/Head.php";
 ?>
 <!-- Main content -->
  <section class="content">
    <?php

    #Validar Menu
     $url=$_GET['menu'];
     	switch ($url){
     	 case '':  include "config/V_Principal.php"; break;
       case '1':  include "views/Institucion/V_Institucion.php"; break;
       case '2':  include "views/Nivel/V_Nivel.php"; break;
       case '3':  include "views/Galeria/V_Galeria.php"; break;
       case '4':  include "views/Notificacion/V_Notifica.php"; break;
       case '5':  include "views/Noticia/V_Noticia.php"; break;
       case '6':  include "views/Pagos/V_Pagos.php"; break;
       case '7':  include "views/Seccion/V_Seccion.php"; break;
       case '8':  include "views/Matricula/V_Matricula.php"; break;
       case '9':  include "views/Grados/V_Grados.php"; break;
       case '10':  include "views/Profesor/V_Profesor.php"; break;
       case '11':  include "views/Usuarios/V_Usuarios.php"; break;


     	}
    ?>
    </section>
    <!-- /.content -->
<?php
//modales principales
include "config/M_Perfil.php";
include "config/Footer.php";

?>
