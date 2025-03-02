<?php 
    include 'server/frontend.php';
    $testValue = number_format(0.01, 2);
    include 'server/consumptions.php';
    include 'server/connectDB.php';
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ZeusWatch - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="img/logo.png" rel="icon">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/bill.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../main/">
                <div class="sidebar-brand-icon">
                    <img style="width: 20px; filter: invert()" src="img/logo.png" alt="logo">
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $brand ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../main/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Navigation
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                OmniGuard
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="control.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Control</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="sched.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Schedule</span></a>
            </li>
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts 
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $displayName?></span>
                                    <img class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">The history table in ZeusWatch records detailed 
                                    time-stamped energy events and activities, 
                                    providing a comprehensive archive for trend 
                                    analysis and optimization. The bill component table 
                                    is the sample consumption on how much is the payment and at
                                    the same time provides the formula provided by Negros Power.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="display:flex; align-items: center; justify-content:space-between">
                            <h6 class="m-0 font-weight-bold text-success">Bill Component</h6>
                            <input type="text" id="initialValue" placeholder="Enter value of KWH" onkeyup="showHint(this.value)">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-secondary text-gray-800">
                                            <th>BILL CHARGES</th>
                                            <th>BASE</th>
                                            <th>PRICE</th>
                                            <th>AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-info">NEPC RELATED CHARGES</th>
                                            <th></th> 
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Distribution Charge</th>
                                            <th class="basePrice"></th>
                                            <th>0.2748</th>
                                            <th id="distCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Demand Charge</th>
                                            <th></th>
                                            <th></th>
                                            <th>0.00</th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Supply Charge</th>
                                            <th class="basePrice"></th>
                                            <th>0.4140</th>
                                            <th id="suppCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Metering Charge</th>
                                            <th class="basePrice"></th>
                                            <th>0.3460</th>
                                            <th id="meterCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Retail Metering Charge</th>
                                            <th></th>
                                            <th></th>
                                            <th>5.00</th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">RFSC</th>
                                            <th class="basePrice"></th>
                                            <th>0.1518</th>
                                            <th id="rfsc"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th></th>
                                            <th></th>
                                            <th class="text-primary">Sub Total</th>
                                            <th id="npc" class="text-primary"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-info">SUPPLIER RELATED CHARGES</th>
                                            <th></th> 
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Generation Charge</th>
                                            <th class="basePrice"></th>
                                            <th>7.3141</th>
                                            <th id="genCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">ILP Recover</th>
                                            <th></th>
                                            <th></th>
                                            <th>0.00</th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Power Act Reduction</th>
                                            <th></th>
                                            <th></th>
                                            <th>0.00</th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Transmission Charge</th>
                                            <th class="basePrice"></th>
                                            <th>1.3272</th>
                                            <th id="transCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">System Loss Charge</th>
                                            <th class="basePrice"></th>
                                            <th>0.9543</th>
                                            <th id="sysLossCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th></th>
                                            <th></th>
                                            <th class="text-primary">Sub Total</th>
                                            <th id="src" class="text-primary"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-info">SUBSIDIES</th>
                                            <th></th> 
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Lifeline Rate Charge</th>
                                            <th class="basePrice"></th>
                                            <th>0.0006</th>
                                            <th id="lrc"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Senior Citizen Subsidy</th>
                                            <th></th>
                                            <th>0.0002</th>
                                            <th id="seniorCitSub">0.05</th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th></th>
                                            <th></th>
                                            <th class="text-primary">Sub Total</th>
                                            <th id="subsidies" class="text-primary"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-info">LOCAL GOVERNMENT CHARGES</th>
                                            <th></th> 
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Franchise Tax</th>
                                            <th></th>
                                            <th></th>
                                            <th>0.00</th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">RPT Charge</th>
                                            <th></th>
                                            <th></th>
                                            <th>0.00</th>
                                        </tr>
                                        <tr>
                                            <th class="text-info">GOVERNMENT CHARGES</th>
                                            <th></th> 
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">VAT on Generation</th>
                                            <th class="basePrice"></th>
                                            <th>0.5129</th>
                                            <th id="vatGen"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">VAT on Transmission</th>
                                            <th id="vatOnTrans"></th>
                                            <th>0.1200</th>
                                            <th id="vatTrans"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">VAT on System Loss</th>
                                            <th class="basePrice"></th>
                                            <th>0.0765</th>
                                            <th id="vatSystLoss"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">VAT on DSM and Other Charges</th>
                                            <th id="vatDSM"></th>
                                            <th>0.1200</th>
                                            <th id="vatOtherCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">NPC Stranded Debts</th>
                                            <th class="basePrice"></th>
                                            <th>0.0428</th>
                                            <th id="npcStrandDebts"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Missionary Electrification</th>
                                            <th class="basePrice"></th>
                                            <th>0.1805</th>
                                            <th id="missionaryElect"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">Environmental Change</th>
                                            <th class="basePrice"></th>
                                            <th>0.0017</th>
                                            <th id="enviroCharge"></th>
                                        </tr>
                                        <tr class="mb-4">
                                            <th class="description-charges">FIT - Allowance</th>
                                            <th class="basePrice"></th>
                                            <th>0.0838</th>
                                            <th id="fitAllow"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-info">TOTAL CURRENT BILL AMOUNT</th>
                                            <th></th> 
                                            <th></th>
                                            <th id="totalBill" class="text-info"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Room</th>
                                            <th>State</th>
                                            <th>Occupancy</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Room</th>
                                            <th>State</th>
                                            <th>Occupancy</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php 
                                    $sql = "SELECT * FROM `history`";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                          echo "<tr><th>" .$row["username"]. "</th><th>" . $row["room"]. "</th><th><span ". ($row["state"] == 1 ? 'style="color:green">ON' : 'style="color:red">OFF') . "</span></th><th><span " . ($row["occupancy"] == 1 ? 'style="color:#f6c23e">Room Occupied':'style="color:#4e73df">Not Occupied'). "</span></th><th>". $row["date"]. "</th></tr>";
                                        }
                                      } else {
                                        echo "0 results";
                                    }
                                ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ZeusWatch 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/formula.js"></script>
</body>

</html>