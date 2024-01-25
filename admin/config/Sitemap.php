<?php
  // MENU Principal
  include "functions/BD.php";
  //SITEMAP - MAPA DEL SITIO
  $url=$_GET['menu'];
  if ($url =="") {  $detpant ='Principal'; $titpant="Dashboard
  <small>Panel de control</small>";}
  if ($url =="1") {  $detpant ='Instituci&oacute;n'; $titpant="Dashboard
  <small>Modulo de Instituci&oacute;n Educativa</small>";}
  if ($url =="2") {  $detpant ='Nivel';  $titpant="Dashboard
    <small>Modulo de Instituci&oacute;n Educativa</small>";}
  if ($url =="3") {  $detpant ='Galeria';  $titpant="Dashboard
      <small>Modulo de Instituci&oacute;n Educativa</small>";}
  if ($url =="4") {  $detpant ='Notificaci&oacute;n';  $titpant="Dashboard
     <small>Modulo de Instituci&oacute;n Educativa</small>";}
  if ($url =="5") {  $detpant ='Noticias';  $titpant="Dashboard
    <small>Modulo de Instituci&oacute;n Educativa</small>";}
if ($url =="6") {  $detpant ='Pagos';  $titpant="Dashboard
  <small>Modulo de Instituci&oacute;n Educativa</small>";}
  if ($url =="7") {  $detpant ='Secciones';  $titpant="Dashboard
    <small>Modulo de Instituci&oacute;n Educativa</small>";}
  if ($url =="8") {  $detpant ='Matricula';  $titpant="Dashboard
    <small>Modulo de Instituci&oacute;n Educativa</small>";}
 if ($url =="9") {  $detpant ='Grados';  $titpant="Dashboard
      <small>Modulo de Instituci&oacute;n Educativa</small>";}
 if ($url =="10") {  $detpant ='Profesor';  $titpant="Dashboard
      <small>Modulo de Instituci&oacute;n Educativa</small>";}
 if ($url =="11") {  $detpant ='Usuarios';  $titpant="Dashboard
    <small>Modulo de Usuarios</small>";}




  //CANTIDAD DE NIVELES
  $sqlcmp="SELECT count(nivel_id) as nnil  FROM niveles_educativos WHERE nivel_estatus ='1'";
  $rcmp=mysqli_query($con,$sqlcmp);
  $acmp =mysqli_fetch_array($rcmp,MYSQLI_ASSOC);
  $nnil = $acmp['nnil'];

  //CANTIDAD DE PROFESORES
  $sqlprof = "SELECT COUNT(perfil_id) as nprofe FROM perfiles where id_rol ='6'";
  $resf = mysqli_query($con,$sqlprof);
  $arrf = mysqli_fetch_array($resf,MYSQLI_ASSOC);
  $nprof = $arrf['nprofe'];

  //CANTIDAD DE ESTUDIANTES
  $sqlest = "SELECT COUNT(perfil_id) as nestu FROM perfiles where id_rol ='2'";
  $rest = mysqli_query($con,$sqlest);
  $arrt = mysqli_fetch_array($rest,MYSQLI_ASSOC);
  $nestu = $arrt['nestu'];












 ?>
