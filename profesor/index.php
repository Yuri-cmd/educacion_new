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
  $psicol = $_SESSION['psicologof'];
  /*

    $us_nombre=$_SESSION["usuario_valido"]; $us_nomape=$_SESSION["usu_nombres_apellidos"]; $us_ngrupo=$_SESSION["gru_nombre"];
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
       case '1':  include "views/Noticia/V_Noticia.php"; break;
       case '2':  include "views/Blog/V_Blog.php"; break;
       case '3':  include "views/Alumnos/V_Alumnos.php"; break;


     	}
    ?>
    </section>
    <!-- /.content -->
<?php
//modales principales
include "config/M_Perfil.php";
include "config/Footer.php";

?>
