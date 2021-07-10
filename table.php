<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
    if(isset($_SESSION["loggedin"])){
        if((time() - $_SESSION["last_login_time"]) > 900){
            header('location: logout.php');
        }
		else {
            $_SESSION['last_login_time'] = time();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDevices | Data Table</title>
	<link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="dashboard.php">Resell Unlocker</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="https://t.me/rufmioff_bot" class='sidebar-link' target="_blank">
                                <i class="bi bi-stack"></i>
                                <span>FMI-OFF BOT</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="https://mega.nz/folder/tN5XBapA#cOazpV_TRyf0VMjNhYHo8Q" class='sidebar-link' target="_blank">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                                <span>Downloads</span>
                            </a>
                        </li>

                        <li class="sidebar-title">iCloud Bypass</li>

                        <li class="sidebar-item  ">
                            <a href="regsn.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Register Serial</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
                            <a href="table.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Check Serial</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Serial Number Registered</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Check Serial Number
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Time</th>
                                        <th>Serial Number</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
								<?php
			
								include 'connect.php';
								$no = 1;
                                $userId =  $_SESSION['userId'];
								$getdata = mysqli_query($db,"select * from sercheck WHERE userId='$userId'");
								while ($data = mysqli_fetch_array($getdata)) {
								echo "
									<tr>
										<td>$no</td>
										<td>$data[time]</td>
										<td>$data[serialNumber]</td>
										<td>✅ $data[status]</td>
									</tr>";
				
								$no++;
				
								}
								?>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; iDevices</p>
                    </div>
                    <div class="float-end">
                        <p>Create With <span class="text-danger"><i class="bi bi-heart"></i></span> By <a
                                href="http://https://t.me/Asm0d3usX">Asm0d3usX</a></p>
                    </div>
                </div>
            </footer>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>