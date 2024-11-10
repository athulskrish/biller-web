
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Add Category</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="plugins/jquery.min/jquery.min.js"></script>

<!--Preloader-->
<link rel="stylesheet" href="dist/css/preloader.css">
<script src="dist/js/preloader.js"></script>

<script src="plugins/jquery.min/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>


<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<!-- Bootstrap core CSS     -->
<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="se-pre-con"></div>
    <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="dist/img/AdminLTELogo.png"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="customers.php" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Customers

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="suppliers.php" class="nav-link">
                                <i class="nav-icon fas fa-people-carry"></i>
                                <p>
                                    Suppliers

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="category.php" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Products Category

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="products.php" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>
                                    Products

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="orders.php" class="nav-link">
                                <i class="nav-icon fas fa-sort-amount-up"></i>
                                <p>
                                    Orders

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="expense.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Expense
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>

                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="sales_report.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sales Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="expense_report.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expense Report</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="sales_chart.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sales Chart </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="expense_chart.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expense Chart</p>
                                    </a>
                                </li>

                            </ul>


                        </li>

                        <li class="nav-item">
                            <a href="products.php" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>

                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="shop_information.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Shop Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="all_users.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Users</p>
                                    </a>
                                </li>
                            </ul>

                        </li>


                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>    

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">


                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>