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
    <title>iDevices | Dashboard</title>
	<link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<?php
 
// menghubungkan dengan koneksi database
include 'connect.php';


$userId =  $_SESSION['userId'];
// mengambil data barang
$data_credit = mysqli_query($db,"SELECT * FROM  credit WHERE userId='$userId'");
$data_sn = mysqli_query($db,"SELECT * FROM sercheck WHERE userId='$userId'");
// menghitung data barang
 $jumlah_credit = 0;
if(mysqli_num_rows($data_credit) > 0){
    while($row = $data_credit->fetch_assoc()) {
		$jumlah_credit = $row['credit'];
  }
}



$jumlah_sn = mysqli_num_rows($data_sn);
?>

<body>
    <div id="app">
        <?php include"header.php";?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
							<div style="width: 50%;" class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Credit</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $jumlah_credit;?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div style="width: 50%;" class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Serial Number</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $jumlah_sn; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<div style="width: 100%;" class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
												<h2>iCloud™ Activation Lock explained</h2>
												<p>Find my Phone includes a feature called 'Activation Lock' which is designed to prevent anyone else using the device if it's ever lost or stolen. This feature stops anyone else using the device whether its an iDevices by requiring the owner's account and password prior to activating the device, even if the device is reset. Activation Lock is enabled automatically when you turn find my phone on a device using ios 7 or later.</p>
												<p>One-click iCloud Bypass process. No need to install some other tools to your PC. After bypass, you will be able to use new Apple ID, Apple Store ID on your device </p>
												<p>The device needs to be jailbroken using the newest Checkra1n jailbreak tool that's already built-in into iCloud Bypass Software. </p>
												<br />
												<h2>iPhone Supported</h2>
												<p>iPhone 5S, iPhone SE, iPhone 6, iPhone 6 Plus, iPhone 6S, iPhone 6S Plus, iPhone 7, iPhone 7 Plus, iPhone 8, iPhone 8 Plus, iPhone X </p>
												<br />
												<h2>iPad Supported</h2>
												<p>iPad 2, iPad Mini (1st generation), iPad (3rd generation), iPad (4th generation), iPad Air, iPad Mini 2, iPad Mini 3, iPad mini 4, iPad Pro (9.7 in.), iPad (2018, 6th generation), iPad (2019, 7th generation), iPad Pro 10.5" (2017), iPad Pro 12.9" 2nd Gen (2017) </p>
                                        </div>
                                    </div>
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
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>