<?php
session_start();
date_default_timezone_set('America/Lima');

require_once "funcionalidades/config/Conexion.php";

?><!DOCTYPE html>
<html lang="es"
      dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGEP | Dashboard</title>
    <link rel="stylesheet" href="<?=URL::to('public/css/loader.css')?>">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=URL::to('assets2/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=URL::to('assets2/bower_components/font-awesome/css/font-awesome.min.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=URL::to('assets2/bower_components/Ionicons/css/ionicons.min.css')?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=URL::to('assets2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=URL::to('assets2/dist/css/AdminLTE.min.css')?>">
    <link rel="stylesheet" href="<?=URL::to('assets2/dist/css/animate.min.css')?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=URL::to('assets2/dist/css/skins/skin-green.css')?>">
    <!-- alert toast -->
    <link href="<?=URL::to('assets2/bower_components/toast/toastr.css')?>" rel="stylesheet" type="text/css" />
    <!-- inputfile -->
    <link href="<?=URL::to('assets2/bower_components/inputfile/bootstrap-iso.css')?>" rel="stylesheet" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=URL::to('assets2/bower_components/select2/select2.min.css')?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=URL::to('assets2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=URL::to('assets2/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
    <link rel="stylesheet" href="<?=URL::to('public/plugins/sweetalert2/sweetalert2.min.css')?>">
    <!-- jQuery 3 -->
    <script src="<?=URL::to('assets2/bower_components/jquery/dist/jquery.min.js')?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=URL::to('assets2/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="<?=URL::to('assets2/dist/css/italic.css')?>">

    <link rel="stylesheet" href="<?=URL::to('public/css/loader_menor.css')?>">
        <script>
            var  URL = "<?=URL::base()?>";
        </script>
