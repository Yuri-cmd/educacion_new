<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= URL::to('images/fotos_perfil/' . $_SESSION['foto_usuario']) ?>" class="img-circle" alt="User Image">
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
                <a href="<?= URL::to('admin/index.php') ?>">
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
                    <li><a href="<?= URL::to('admin/admin/index.php?menu=1') ?>"><i class="fa fa-bars"></i>Datos Básicos</a></li>
                    <li><a href="<?= URL::to('admin/admin/index.php?menu=3') ?>"><i class="fa fa-image"></i>Galeria</a></li>
                    <li><a href="<?= URL::to('admin/admin/index.php?menu=5') ?>"><i class="fa fa-edit"></i>Noticias</a></li>
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
                    <li><a href="<?= URL::to('admin/mensajes') ?>"><i class="fa fa-bars"></i>Inbox</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= URL::to('admin/index.php?menu=6') ?>">
                    <i class="fa fa-money"></i> <span>Pagos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
            <!--<li>
              <a href="index.php?menu=6">
                <i class="fa fa-money"></i> <span>Pagos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
            </li>-->
            <li class="header" style="color:white;">Informaci&oacute;n Acad&eacute;mica</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i> <span>Niveles Acad&eacute;micos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= URL::to('admin/index.php?menu=2') ?>"><i class="fa fa-bars"></i>Niveles / Grados</a></li>
                    <li><a href="<?= URL::to('admin/index.php?menu=9') ?>"><i class="fa fa-bars"></i>Grados / Cursos</a></li>
                    <li><a href="<?= URL::to('admin/index.php?menu=7') ?>"><i class="fa fa-bars"></i>Grados / Secciones</a></li>

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
                    <li><a href="<?= URL::to('admin/index.php?menu=10') ?>"><i class="fa fa-vcard-o"> </i> Agregar / Listar</a></li>
                    <!--<li><a  href="index.php?menu="><i class="fa fa-calendar"></i> Horarios </a></li>-->
                </ul>
            </li>
            <li>
                <a href="asistencia">
                    <i class="fa fa-money"></i> <span>Asistencia</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
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
                    <li><a href="<?= URL::to('admin/index.php?menu=8') ?>"><i class="fa fa-vcard-o"></i>Apertura / Cierre</a></li>
                    <li><a href="<?= URL::to('admin/matriculas') ?>"><i class="fa fa-tasks"></i>Nuevos Ingresos</a></li>
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
                    <li><a href="<?= URL::to('admin/index.php?menu=11') ?>"><i class="fa fa-cog"></i> Usuarios</a></li>
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