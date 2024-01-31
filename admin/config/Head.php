<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ESAMA | Dashboard</title>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets2/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets2/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets2/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets2/dist/css/animate.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets2/dist/css/skins/skin-green.css">
  <!-- alert toast -->
   <link href="../assets2/bower_components/toast/toastr.css" rel="stylesheet" type="text/css" />
  <!-- inputfile -->
   <link href="../assets2/bower_components/inputfile/bootstrap-iso.css" rel="stylesheet" />
   <!-- Select2 -->
  <link rel="stylesheet" href="../assets2/bower_components/select2/select2.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../assets2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets2/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- jQuery 3 -->
  <script src="../assets2/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../assets2/bower_components/jquery-ui/jquery-ui.min.js"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="dist/css/italic.css">
</head>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><i class="fa fa-mortar-board"></i> <b>V.1</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><i class="fa fa-mortar-board"></i> <b>E.S.A.M.A.</b> </span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">

            <a href="#M_Perfil" data-toggle="modal" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i><span class="hidden-xs"><?='Administrador';?></span>
            </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- /.search form -->
        <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets2/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrador</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
       <li class="header" style="color:white;">Menu de Navegaci&oacute;n</li>
       <li>
         <a href="index.php">
           <i class="fa fa-dashboard"></i> <span>Inicio</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-building-o"></i> <span>Instituci&oacute;n</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a  href="index.php?menu=1"><i class="fa fa-bars"></i>Datos B&aacute;sicos</a></li>
           <li><a  href="index.php?menu=3"><i class="fa fa-image"></i>Galeria</a></li>
           <li><a  href="index.php?menu=5"><i class="fa fa-edit"></i>Noticias</a></li>
          </ul>
       </li>
      <li class="treeview">
         <a href="#">
           <i class="fa fa-envelope-open-o"></i> <span>Notificaciones</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
            <li><a  href="mensajes"><i class="fa fa-bars"></i>Inbox</a></li>
          </ul>
       </li>
       <li>
         <a href="index.php?menu=6">
           <i class="fa fa-money"></i> <span>Pagos</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
       </li>
       <li class="header" style="color:white;">Informaci&oacute;n Acad&eacute;mica</li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-folder-open"></i> <span>Niveles Acad&eacute;micos</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a  href="index.php?menu=2"><i class="fa fa-bars"></i>Niveles / Grados</a></li>
           <li><a  href="index.php?menu=9"><i class="fa fa-bars"></i>Grados / Cursos</a></li>
           <li><a  href="index.php?menu=7"><i class="fa fa-bars"></i>Grados / Secciones</a></li>

         </ul>
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-group"></i> <span>Profesores</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a  href="index.php?menu=10"><i class="fa fa-vcard-o"> </i> Agregar / Listar</a></li>
           <!--<li><a  href="index.php?menu="><i class="fa fa-calendar"></i> Horarios </a></li>-->
         </ul>
       </li>
       <!--<li class="treeview">
         <a href="#">
           <i class="fa fa-user-plus"></i> <span>Alumnos</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a  href="index.php?menu="><i class="fa fa-vcard-o"></i>Agregar / Asignar</a></li>
         </ul>
       </li>--->
       <li class="header" style="color:white;">Procedimientos Administrativos</li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-address-card-o"></i> <span>Matricula</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a  href="index.php?menu=8"><i class="fa fa-vcard-o"></i>Apertura / Cierre</a></li>
           <li><a  href="matriculas"><i class="fa fa-tasks"></i>Nuevos Ingresos</a></li>
           <!--<li><a  href="index.php?menu="><i class="fa fa-tasks"></i>Retiro de Alumno</a></li>-->
         </ul>
       </li>
       <li class="header" style="color:white;">Informaci&oacute;n de Usuarios</li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-cogs"></i> <span>Configuraci&oacute;n</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?menu=11"><i class="fa fa-cog"></i> Usuarios</a></li>
           <li><a href="#M_Perfil" data-toggle="modal"><i class="fa fa-user"></i> Pefil</a></li>
         </ul>
       </li>
       <li>
                <a href="http://localhost/kanako/" target="_blank">
                    <i class="fa fa-money"></i> <span>Factura</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
            </li>
       <li>
         <a href="../auth/logout.php">
           <i class="fa fa-sign-out"></i> <span>Salir</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
       </li>
     </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php if ($titpant =='') { echo '&nbsp'; } else{ echo $titpant; }    ?>
       </h1>
       <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
         <li class="active"><?=$detpant;?></li>
       </ol>
      </section>
