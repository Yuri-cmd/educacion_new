<?php
  // MENU Principal
  include "functions/BD.php";
  //SITEMAP - MAPA DEL SITIO
  $url=$_GET['menu'];
  if ($url =="") {  $detpant ='Principal'; $titpant="Dashboard
  <small>Panel de control</small>";}
  if ($url =="1") {  $detpant ='Instituci&oacute;n'; $titpant="Dashboard
  <small>Modulo de Instituci&oacute;n Educativa</small>";}
  if ($url =="2") {  $detpant ='Blog';  $titpant="Dashboard
    <small>Modulo de Instituci&oacute;n Educativa</small>";}
    if ($url =="3") {  $detpant ='Profesor';  $titpant="Dashboard
      <small>Modulo de Alumnos</small>";}



/*  //CANTIDAD DE CLIENTES
  $sqlcc="SELECT count(cli_id) as ncliente  FROM tavl_clientes c";
  $recct=mysqli_query($con,$sqlcc);
  $accr =mysqli_fetch_array($recct,MYSQLI_ASSOC);
  $nclie = $accr['ncliente'];
  //CANTIDAD DE PRODUCTOS
  $sqlpr="SELECT count(prod_id) as nprodu  FROM tavl_producto";
  $repr=mysqli_query($con,$sqlpr);
  $acpr =mysqli_fetch_array($repr,MYSQLI_ASSOC);
  $ncpro = $acpr['nprodu'];
  //CANTIDAD DE SERVICIOS
  $sqlsr="SELECT count(ser_id) as nservi  FROM tavl_servicios WHERE (ser_estatus ='EN REPARACION' OR ser_estatus ='PENDIENTE')";
  $resr=mysqli_query($con,$sqlsr);
  $acsr =mysqli_fetch_array($resr,MYSQLI_ASSOC);
  $ncser = $acsr['nservi'];
  //CANTIDAD DE MENSAJES
  $sqlme="SELECT count(men_id) as nmen  FROM tavl_mensajes";
  $reme=mysqli_query($con,$sqlme);
  $acme =mysqli_fetch_array($reme,MYSQLI_ASSOC);
  $ncmen = $acme['nmen'];
  //CANTIDAD DE VENTAS
  $sqlvnd="SELECT count(fac_id) as nfactu  FROM tavl_facturacion WHERE fac_estatus ='1'";
  $rvnd=mysqli_query($con,$sqlvnd);
  $acvnd =mysqli_fetch_array($rvnd,MYSQLI_ASSOC);
  $ncfactu = $acvnd['nfactu'];

  //CANTIDAD DE COMPRAS
  $sqlcmp="SELECT count(com_id) as ncompr  FROM tavl_compras WHERE com_estatus ='1'";
  $rcmp=mysqli_query($con,$sqlcmp);
  $acmp =mysqli_fetch_array($rcmp,MYSQLI_ASSOC);
  $ncompr = $acmp['ncompr'];
*/









 ?>
