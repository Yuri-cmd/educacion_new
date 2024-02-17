<?php
require 'utils/phpqrcode/qrlib.php'; 

// Configura los parámetros del código QR
$tamaño = 10; // Tamaño del código QR (en píxeles)
$level = 'M'; // Nivel de corrección de errores (L - bajo, M - medio, Q - alto, H - más alto)

// Genera el código QR
ob_start(); // Inicia el almacenamiento en el búfer de salida
QRcode::png($_SESSION['estudiante_id'], null, $level, $tamaño); // Genera el código QR y lo envía al búfer de salida
$imageData = ob_get_clean(); // Obtiene el contenido del búfer de salida y lo limpia

?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= URL::to('images/fotos_perfil/' . $_SESSION['foto_usuario']) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $_SESSION['nombre_completo'] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header" style="color:white;">Menu de Navegación</li>
            <li class="treeview">
                <a href="index.php">
                    <i class="fa fa-envelope-open-o"></i> <span>QR</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= URL::to('alumno/mensajes') ?>">
                            <?= '<img src="data:image/png;base64,' . base64_encode($imageData) . '" style="width: 100%;" alt="Código QR">'; ?>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= URL::to('alumno') ?>">
                    <i class="fa fa-dashboard"></i> <span>Inicio</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i> <span>INFORMACION ACADEMICA</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-folder-open-o"></i> CALENDARIO</a></li>
                    <li><a href="#"><i class="fa fa-envelope-open-o"></i> HORARIO DE CLASES</a></li>
                    <li><a href="#"><i class="fa fa-envelope-open-o"></i> ROL DE EXAMENTES</a></li>

                </ul>
            </li>
            <li>
                <a href="<?= URL::to('alumno/cursos') ?>">
                    <i class="fa fa-dashboard"></i> <span>Cursos</span>
                </a>
            </li>
            <li class="treeview">
                <a href="index.php">
                    <i class="fa fa-envelope-open-o"></i> <span>Notificaciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= URL::to('alumno/mensajes') ?>"><i class="fa fa-bars"></i>Imbox</a></li>
                </ul>
            </li>
            <li class="header" style="color:white;">Información Académica</li>

            <li>
                <a href="<?= URL::to('alumno/profesores') ?>">
                    <i class="fa fa-money"></i> <span>Profesores</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-plus"></i> <span>Mis Medios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= URL::to('alumno/noticias') ?>"><i class="fa fa-bars"></i>NOTICIAS</a></li>
                    <li><a href="<?= URL::to('alumno/galeria') ?>"><i class="fa fa-exchange"></i> GALERIA </a></li>
                    <li><a href="#"><i class="fa fa-exchange"></i> ARCHIVOS DEL COLEGIO</a></li>
                </ul>
            </li>


            <li class="header" style="color:white;">Información de Usuarios</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Configuración</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" data-toggle="modal"><i class="fa fa-cog"></i> Usuarios</a></li>
                    <li><a href="#" data-toggle="modal"><i class="fa fa-user"></i> Pefil</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= URL::to('auth/logout.php') ?>">
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