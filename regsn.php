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
<?php
	include ('server1.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDevices | Serial Number</title>
	<link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

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

                        <li class="sidebar-item">
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

                        <li class="sidebar-item active ">
                            <a href="regsn.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Register Serial</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
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
                            <h3>iCloud Bypass GSM & MEID</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Register SN</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts" >
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Register Your Serial Number</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Serial Number</label>
                                                    </div>
													
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="serialNumber" style="text-transform:uppercase;" class="form-control"
                                                                    placeholder="Enter Serial Number" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<br />
													<br />
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="proccess"
                                                            class="btn btn-primary me-6 mb-1">Submit</button>
                                                    </div>
													<center>
													<?php include('errors.php'); ?>
													</center>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
												<h2>Important</h2>
												<p>iPhone must be restore to the latest iOS. Before you activate, iPhone must be connected to wifi and must be on activation lock.</p>
												<h2>iPhone Supported</h2>
												<p>iPhone 5S, iPhone SE, iPhone 6, iPhone 6 Plus, iPhone 6S, iPhone 6S Plus, iPhone 7, iPhone 7 Plus, iPhone 8, iPhone 8 Plus, iPhone X </p>
												<br />
												<h2>iPad Supported</h2>
												<p>iPad 2, iPad Mini (1st generation), iPad (3rd generation), iPad (4th generation), iPad Air, iPad Mini 2, iPad Mini 3, iPad mini 4, iPad Pro (9.7 in.), iPad (2018, 6th generation), iPad (2019, 7th generation), iPad Pro 10.5" (2017), iPad Pro 12.9" 2nd Gen (2017) </p>  
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
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
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>
</html>