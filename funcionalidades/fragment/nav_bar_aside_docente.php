<?php
require 'utils/phpqrcode/qrlib.php';

// Configura los parámetros del código QR
$tamaño = 10; // Tamaño del código QR (en píxeles)
$level = 'M'; // Nivel de corrección de errores (L - bajo, M - medio, Q - alto, H - más alto)

// Genera el código QR
ob_start(); // Inicia el almacenamiento en el búfer de salida
QRcode::png($_SESSION['docente_id'], null, $level, $tamaño); // Genera el código QR y lo envía al búfer de salida
$imageData = ob_get_clean(); // Obtiene el contenido del búfer de salida y lo limpia

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= URL::to('assets2/dist/img/avatar3.png') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Profesor(a)</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header" style="color:white;">Formación Académica</li>
            <li class="treeview">
                <a href="index.php">
                    <i class="fa fa-envelope-open-o"></i> <span>QR</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#" onclick="abrirModal()">
                            <?= '<img src="data:image/png;base64,' . base64_encode($imageData) . '" style="width: 100%;" alt="Código QR">'; ?>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="index.php">
                    <i class="fa fa-desktop"></i> <span>Clases</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= URL::to('profesores/cursos') ?>"><i class="fa fa-bars"></i>Contenido del Curso</a></li>
                </ul>
            </li>

            <li class="header" style="color:white;">Gestión del Alumno</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-plus"></i> <span>Alumnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= URL::to('index.php?menu=') ?>"><i class="fa fa-vcard-o"></i>Secciones / Grados</a></li>
                </ul>
            </li>
            <li class="header" style="color:white;">Información del Colegio</li>
            <li class="treeview">
                <a href="<?= URL::to('profesor/index.php?menu=1') ?>">
                    <i class="fa fa-edit"></i> <span>Noticias</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="treeview menu-open">
                <a href="#">
                    <i class="fa fa-envelope-open-o"></i> <span>Notificaciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="../profesores/mensajes"><i class="fa fa-bars"></i>Inbox</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= URL::to('profesor/index.php?menu=2') ?>">
                    <i class="fa fa-edit"></i> <span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
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
                    <li><a href="<?= URL::to('index.php?menu=19') ?>" data-toggle="modal"><i class="fa fa-user"></i> Pefil</a></li>
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
<div id="qrModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Código QR </h4>
            </div>
            <div class="modal-body">
                <?= '<img id="qrImage" src="data:image/png;base64,' . base64_encode($imageData) . '" style="width: 100%;" alt="Código QR">'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="imprimirQR()">Imprimir</button>
            </div>
        </div>
    </div>
</div>
<script>
    function abrirModal() {
        $('#qrModal').modal('show');
    }

    function imprimirQR() {
        // Calcula el centro de la pantalla
        var left = (screen.width / 2) - (400 / 2);
        var top = (screen.height / 2) - (400 / 2);

        // Crea una ventana emergente con la imagen del código QR
        var ventanaQR = window.open('', '_blank', 'width=400,height=400,left=' + left + ',top=' + top);
        ventanaQR.document.write('<img src="data:image/png;base64,' + '<?= base64_encode($imageData) ?>' + '">');
        // Imprime la ventana emergente
        ventanaQR.print();
    }
</script>