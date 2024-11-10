<!-- taken from category add.php -->

<?php
session_start();
if (isset($_SESSION['email']) and isset($_SESSION['user_type']) and isset($_SESSION['key']))
    echo " ";
else {
    header("location:index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


     // Get form data
     $code = $_POST['code'];
     $name = $_POST['name'];
     $bos = $_POST['bos'];
     $sak = $_POST['sak'];
     $qty = $_POST['qty'];
     $rate = $_POST['rate'];
     $tax = $_POST['tax'];
 
     // Calculate total before tax
     $subtotal = $qty * $rate;
 
     // Calculate tax amount
     $taxAmount = ($subtotal * $tax) / 100;
 
     // Calculate total after tax
     $total = $subtotal + $taxAmount;        

    include('db_connect.php');

    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
 
    $result = mysqli_query($con, "INSERT INTO order_new (`code`,`name`,`bos`,`sak`, `qty`,`rate`,`tax`) VALUE ('$code','$name','$bos','$sak','$qty','$rate','$tax')");
    if($result){
        echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire("Order Successfully Added!","Done!","success");';
            echo '}, 500);</script>';

    } else { // display the error message
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire("ERROR!","Something Wrong!""error");';
        echo '}, 500);</script>';
    }
     // Use prepared statement to insert data
   
   
   
     //  $stmt = $con->prepare("INSERT INTO order_new (code, name, bos, sak, qty, rate, tax,) VALUES (?, ?, ?, ?, ?, ?, ?)");
    // if (!$stmt) {
    //     die("SQL error: " . $con->error);
    // }
    //  $stmt->bind_param("ssssdddi", $code, $name, $bos, $sak, $qty, $rate, $tax);
 
    //  if ($stmt->execute()) {
    //      echo '<script type="text/javascript">';
    //      echo 'setTimeout(function () { swal.fire("Order Successfully Added!", "Done!", "success"); }, 500);';
    //      echo '</script>';
    //  } else {
    //      echo '<script type="text/javascript">';
    //      echo 'setTimeout(function () { swal.fire("ERROR!", "Something went wrong: ' . $stmt->error . '", "error"); }, 500);';
    //      echo '</script>';
    //  }
 
    //  // Close statement and connection
    //  $stmt->close();
    //  $con->close();
 }
 ?>




<!DOCTYPE html>
<html lang="en">

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

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">

                                <h3 class="card-title"> New Order</h3>

                            </div>


                            <form role="form" id="quickForm" method="post" action="new_order.php">
                                <div class="card-body">
                                <button type="button" onclick="calculateTotal()">Calculate Total</button>
                                    <label> Total </label><span id='total_cal'></span>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                    <table class="table table-striped  table-bordered table-hover"  >
                                        <thead class='Primary'>
                                            <tr class="bg-primary">
                                                <th scope="col" style="width: 15.66%">#</th>
                                                <th scope="col" style="width: 15.66%">Code</th>
                                                <th scope="col" style="width: 15.66%">Name</th>
                                                <th scope="col" style="width: 15.66%">BOS</th>
                                                <th scope="col" style="width: 15.66%">SAK</th>
                                                <th scope="col" style="width: 15.66%"> QTY</th>
                                                <th scope="col" style="width: 15.66%">Rate</th>
                                                <th scope="col" style="width: 15.66%">Tax</th>
                                                <th scope="col" style="width: 15.66%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td> <input type="text" name="code" required></td>
                                                <td><input type="text" name="name" required></td>
                                                <td> <input type="text" name="bos" required></td>
                                                <td><input type="text" name="sak" required></td>
                                                <td><input type="number" name="qty"   id="qty" required></td>
                                                <td><input type="number" name="rate"  id="rate"  required></td>
                                                <td><input type="number" name="tax"  id="tax" required></td>
                                                <td><span id='result'></span></td>

                                            </tr>
                                           
                                        </tbody>
                                    </table>


                                
                                        <button type="reset" class="btn btn-dark"><i class="fa fa-times-circle"></i> Reset
                                        </button>
                                        <button type="submit" id="add_order" class="btn btn-primary"><i
                                                class="fa fa-check-circle"></i> Add Order 
                                        </button>
                                        <button type="submit" id="add_category" class="btn btn-primary"><i
                                                class="fa fa-check-circle"></i> Order print
                                        </button>
                                    </div>
                            </form>


                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>

    <script type="text/javascript">
        $(document).on('click', '#add_order', function(e) {


            $('#quickForm').validate({
                rules: {
                    code:{required:true},
                   name: {
                        required: true
                    },
                    bos:{required:true},
                    sak:{required:true},
                    qty:{required:true},
                    rate:{required:true},
                   tax :{required:true},
                },
                messages: {
                    code : {  required: "Please enter code " },
                    name: {  required: "Please enter  name" },
                    bos: {  required: "Please enter bos " },,
                    sak: {  required: "Please enter sak " },
                    qty: {  required: "Please enter qty " },
                    rate: {  required: "Please enter rate " },
                    tax: {  required: "Please enter tax " },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


        });
    </script>


    <script type="text/javascript">
        $(document).on('click', '#add_order', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Want to add ?',
                text: 'Are you sure?',
                icon: 'warning',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {

                    $('#quickForm').submit();

                }
            })

        });
    </script>
<script>
        function calculateTotal() {
            // Get values from input fields
            const qty = parseFloat(document.getElementById('qty').value);
            const rate = parseFloat(document.getElementById('rate').value);
            const tax = parseFloat(document.getElementById('tax').value);

            // Calculate subtotal and total
            const subtotal = qty * rate;
            const total = subtotal + tax;

            // Display result
            document.getElementById('result').innerHTML = `
                Rs ${total.toFixed(2)}
            `;
        }
    </script>

</body>

</html>