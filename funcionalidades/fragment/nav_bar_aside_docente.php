<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=URL::to('assets2/dist/img/avatar3.png')?>" class="img-circle" alt="User Image">
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
                    <i class="fa fa-desktop"></i> <span>Clases</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=URL::to('profesores/cursos')?>"><i class="fa fa-bars"></i>Contenido del Curso</a></li>
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
                    <li><a href="<?=URL::to('index.php?menu=')?>"><i class="fa fa-vcard-o"></i>Secciones / Grados</a></li>
                </ul>
            </li>
            <li class="header" style="color:white;">Información del Colegio</li>
            <li class="treeview">
                <a href="<?=URL::to('profesor/index.php?menu=1')?>">
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
                <a href="<?=URL::to('profesor/index.php?menu=2')?>">
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
                    <li><a href="<?=URL::to('index.php?menu=19')?>" data-toggle="modal"><i class="fa fa-user"></i> Pefil</a></li>
                </ul>
            </li>
            <li>
                <a href="<?=URL::to('auth/logout.php')?>">
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
