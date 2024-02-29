<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- /.search form -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=URL::to('images/fotos_perfil/'.$_SESSION['foto_usuario'])?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?=$_SESSION['nombre_completo']?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header" style="color:white;">Menu de Navegación</li>
            <li>
                <a href="<?=URL::to('supervisor')?>">
                    <i class="fa fa-dashboard"></i> <span>Inicio</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i> <span>GESTION ACADEMICA</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=URL::to('supervisor/hijos')?>"><i class="fa fa-bars"></i>MIS HIJOS</a></li>
                    <!--li><a href="<?=URL::to('supervisor')?>"><i class="fa fa-folder-open-o"></i> CALENDARIO</a></li>
                    <li><a href="<?=URL::to('supervisor')?>"><i class="fa fa-envelope-open-o"></i> ASISTENCIA</a></li>
                    <li><a href="<?=URL::to('supervisor/cursos')?>"><i class="fa fa-envelope-open-o"></i> CURSOS</a></li-->
                    <li><a href="<?=URL::to('supervisor/profesores')?>"><i class="fa fa-envelope-open-o"></i> DOCENTES</a></li>
                </ul>
            </li>
            <li style="display: none" class="treeview">
                <a href="#">
                    <i class="fa fa-building-o"></i> <span>INFORMACION FAMILIAR</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=URL::to('supervisor/familiar')?>" ><i class="fa fa-cog"></i> RESPONSABLE DEL RETIRO</a></li>
                    <li><a href="<?=URL::to('supervisor/familiar')?>" ><i class="fa fa-cog"></i> DATOS DE LA FAMILIA </a></li>
                </ul>
            </li>
            <li>
                <a href="<?= URL::to('supervisor/asistencia') ?>">
                    <i class="fa fa-money"></i> <span>Mi Asistencia</span>
                </a>
            </li>
            <li>
                <a href="<?=URL::to('supervisor/matriculas')?>">
                    <i class="fa fa-cog"></i> MATRICULA
                </a>
            </li>
            <li class="treeview">
                <a href="<?=URL::to('supervisor')?>">
                    <i class="fa fa-envelope-open-o"></i> <span>Notificaciones</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=URL::to('supervisor/mensajes')?>"><i class="fa fa-bars"></i>Inbox</a></li>
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
                    <li><a data-toggle="modal" data-target="#modal_informacion" href="javascript:void(0)" ><i class="fa fa-cog"></i> Usuarios</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= URL::to('auth/logout.php')?>">
                    <i class="fa fa-sign-out"></i> <span>Salir</span>

                </a>
            </li>
        </ul>
    </section>


    <!-- /.sidebar -->
</aside>
