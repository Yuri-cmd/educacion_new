<?= include "modulos/fragment/head.php" ?>
    </head>

    <body class=" layout-fluid">

        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>

            <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div>

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->

            <?= include "modulos/fragment/nav_bar.php" ?>

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content">
                <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                    <div class="mdk-drawer-layout__content page ">

                        <div class="container-fluid ">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <h1 class="h2">Dashboard</h1>
                            <div class="card">
                                <div class="card-body">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Primero Nombre</th>
                                                    <th>Segundo Nombre</th>
                                                    <th>Apellido Paterno</th>
                                                    <th>Apellido Materno</th>
                                                    <th>ID</th>
                                                </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>

                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="mdk-drawer js-mdk-drawer"
                         id="default-drawer">
                        <div class="mdk-drawer__content ">
                            <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden"
                                 data-perfect-scrollbar>
                                <div class="sidebar-p-y">
                                    <div class="sidebar-heading">APPLICATIONS</div>
                                    <ul class="sidebar-menu sm-active-button-bg">
                                        <li class="sidebar-menu-item active">
                                            <a class="sidebar-menu-button"
                                               href="student-dashboard.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Student
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="instructor-dashboard.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> Instructor
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Account menu -->
                                    <div class="sidebar-heading">Account</div>
                                    <ul class="sidebar-menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button sidebar-js-collapse"
                                               data-toggle="collapse"
                                               href="#account_menu">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person_outline</i>
                                                Account
                                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                            </a>
                                            <ul class="sidebar-submenu sm-indent collapse"
                                                id="account_menu">
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="guest-login.html">
                                                        <span class="sidebar-menu-text">Login</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="guest-signup.html">
                                                        <span class="sidebar-menu-text">Sign Up</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="guest-forgot-password.html">
                                                        <span class="sidebar-menu-text">Forgot Password</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-account-edit.html">
                                                        <span class="sidebar-menu-text">Edit Account</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-account-edit-basic.html">
                                                        <span class="sidebar-menu-text">Basic Information</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-account-edit-profile.html">
                                                        <span class="sidebar-menu-text">Profile &amp; Privacy</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-account-billing-subscription.html">
                                                        <span class="sidebar-menu-text">Subscription</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-account-billing-upgrade.html">
                                                        <span class="sidebar-menu-text">Upgrade Account</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-account-billing-payment-information.html">
                                                        <span class="sidebar-menu-text">Payment Information</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-billing.html">
                                                        <span class="sidebar-menu-text">Payment History</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-invoice.html">
                                                        <span class="sidebar-menu-text">Student Invoice</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="instructor-invoice.html">
                                                        <span class="sidebar-menu-text">Instructor Invoice</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="instructor-edit-invoice.html">
                                                        <span class="sidebar-menu-text">Edit Invoice</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               data-toggle="collapse"
                                               href="#messages_menu">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">comment</i> Messages
                                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                            </a>
                                            <ul class="sidebar-submenu sm-indent collapse"
                                                id="messages_menu">
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-messages.html">
                                                        <span class="sidebar-menu-text">Conversation</span>
                                                        <span class="sidebar-menu-badge badge badge-primary badge-notifications ml-auto">2</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-messages-2.html">
                                                        <span class="sidebar-menu-text">Conversation - 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="sidebar-heading">Student</div>
                                    <ul class="sidebar-menu sm-active-button-bg">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="student-browse-courses.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Browse Courses
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="student-view-course.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> View Course
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="student-take-course.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Take Course
                                                <span class="sidebar-menu-badge badge badge-primary ml-auto">PRO</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="student-take-quiz.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Take a Quiz
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="student-quiz-results.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> Quiz Results
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="student-my-courses.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> My Courses
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               data-toggle="collapse"
                                               href="#forum_menu">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i>
                                                Community
                                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                            </a>
                                            <ul class="sidebar-submenu sm-indent collapse"
                                                id="forum_menu">
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-forum.html">
                                                        <span class="sidebar-menu-text">Forum</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-forum-thread.html">
                                                        <span class="sidebar-menu-text">Discussion</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-forum-ask.html">
                                                        <span class="sidebar-menu-text">Ask Question</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-profile.html">
                                                        <span class="sidebar-menu-text">Student Profile - Courses</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="student-profile-posts.html">
                                                        <span class="sidebar-menu-text">Student Profile - Posts</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="instructor-profile.html">
                                                        <span class="sidebar-menu-text">Instructor Profile</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="student-help-center.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Get Help
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="guest-login.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Components menu -->
                                    <div class="sidebar-heading">Components</div>
                                    <ul class="sidebar-menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button sidebar-js-collapse"
                                               data-toggle="collapse"
                                               href="#components_menu">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tune</i>
                                                Components
                                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                            </a>
                                            <ul class="sidebar-submenu sm-indent collapse"
                                                id="components_menu">
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-avatars.html">
                                                        <span class="sidebar-menu-text">Avatars</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-forms.html">
                                                        <span class="sidebar-menu-text">Forms</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-loaders.html">
                                                        <span class="sidebar-menu-text">Loaders</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-tables.html">
                                                        <span class="sidebar-menu-text">Tables</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-cards.html">
                                                        <span class="sidebar-menu-text">Cards</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-tabs.html">
                                                        <span class="sidebar-menu-text">Tabs</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-icons.html">
                                                        <span class="sidebar-menu-text">Icons</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-buttons.html">
                                                        <span class="sidebar-menu-text">Buttons</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-alerts.html">
                                                        <span class="sidebar-menu-text">Alerts</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-badges.html">
                                                        <span class="sidebar-menu-text">Badges</span>
                                                    </a>
                                                </li>
                                                <!-- <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="ui-modals.html">
          <span class="sidebar-menu-text">- Modals</span>
        </a>
      </li> -->
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-progress.html">
                                                        <span class="sidebar-menu-text">Progress Bars</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-pagination.html">
                                                        <span class="sidebar-menu-text">Pagination</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button sidebar-js-collapse"
                                               data-toggle="collapse"
                                               href="#plugins_menu">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">folder</i>
                                                Plugins
                                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                            </a>
                                            <ul class="sidebar-submenu sm-indent collapse"
                                                id="plugins_menu">
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-charts.html">
                                                        <span class="sidebar-menu-text">Charts</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-drag.html">
                                                        <span class="sidebar-menu-text">Drag &amp; Drop</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-calendar.html">
                                                        <span class="sidebar-menu-text">Calendar</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-nestable.html">
                                                        <span class="sidebar-menu-text">Nestable</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-tree.html">
                                                        <span class="sidebar-menu-text">Tree</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-maps-vector.html">
                                                        <span class="sidebar-menu-text">Vector Maps</span>
                                                    </a>
                                                </li>
                                                <li class="sidebar-menu-item">
                                                    <a class="sidebar-menu-button"
                                                       href="ui-sweet-alert.html">
                                                        <span class="sidebar-menu-text">Sweet Alert</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!-- // END Components Menu -->

                                    <div class="sidebar-heading">Layout</div>
                                    <ul class="sidebar-menu">
                                        <li class="sidebar-menu-item active">
                                            <a class="sidebar-menu-button"
                                               href="student-dashboard.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i> Fluid Layout
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="fixed-student-dashboard.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i> Fixed Layout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- App Settings FAB -->
                <div id="app-settings">
                    <app-settings layout-active="default"
                                  :layout-location="{
      'fixed': 'fixed-student-dashboard.html',
      'default': 'student-dashboard.html'
    }"
                                  sidebar-variant="bg-transparent border-0"></app-settings>
                </div>

            </div>
        </div>

<?= include "modulos/fragment/footer.php" ?>

    </body>
        <script>

            console.log(URL+'utils/Spanish.json');
            $(document).ready(function() {
                $('#example').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "sAjaxSource": URL+"/alumnos/sever/data_list?insti="+$("#institucion").val(),
                    order: [[ 0, "desc" ]],
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel'
                    ],
                   /* columnDefs: [
                        {
                            "targets": 0,
                            "data": "coti_id",
                            "render": function (data, type, row, meta) {

                                return '<span style="display: block;margin: auto;text-align: center;color: white">'+row[0]+'</span>';

                            }
                        },
                        {
                            "targets": 1,
                            "data": "cli_tdoc",
                            "render": function (data, type, row, meta) {

                                return '<span style="display: block;margin: auto;text-align: center;">'+row[1]+' - '+lleganar0(row[2]+"",6)+'</span>';

                            }
                        },
                        {
                            "targets": 2,
                            "data": "",
                            "render": function (data, type, row, meta) {

                                return '<span style="display: block;margin: auto;text-align: center;">'+row[3]+'</span>';

                            }
                        },
                        {
                            "targets": 3,
                            "data": "",
                            "render": function (data, type, row, meta) {

                                return '<span style="display: block;margin: auto;text-align: center;">'+row[4]+'</span>';

                            }
                        },
                        {
                            "targets": 4,
                            "data": "",
                            "render": function (data, type, row, meta) {
                                const totalmon = row[5].split('-');
                                return '<span style="display: block;margin: auto;text-align: center;">'+(totalmon[0]==1?'S/. ':'$ ')+totalmon[1]+'</span>';

                            }
                        },
                        {
                            "targets": 5,
                            "data": "",
                            "render": function (data, type, row, meta) {

                                return '<span style="display: block;margin: auto;text-align: center;">'+row[6]+'</span>';

                            }
                        },
                        {
                            "targets": 6,
                            "data": "",
                            "render": function (data, type, row, meta) {

                                return '<span style="display: block;margin: auto;text-align: center;">'+row[7]+'</span>';

                            }
                        },

                        {
                            "targets": 7,
                            "data": "",
                            "render": function (data, type, row, meta) {

                                return '<span style="display: block;margin: auto;text-align: center;">'+row[8]+'</span>';

                            }
                        },

                        {
                            "targets": 8,
                            "data": "",
                            "render": function (data, type, row, meta) {
                                return '<div style="text-align: center"><a title="Ver Cotizacion" href="venta_procesada.php?view='+row[0]+'" class="btn btn-warning"> <i class="fa fa-eye"></i> </a></div>';

                            }
                        },
                    ],*/
                    language: {
                        url: URL+'/utils/Spanish.json'
                    }
                });

            } );
        </script>
</html>
