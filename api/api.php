<?php

include "config.php";



$serialNumber = "";

$found = "NOT_AUTHORIZED";

if(isset($_GET['serialNumber'])){

	

	$serialNumber = mysqli_escape_string($con,$_GET['serialNumber']);

	// Check username

	$result = mysqli_query($con,"select * from sercheck WHERE serialNumber='".$serialNumber."'");



	if(mysqli_num_rows($result) > 0){

		$found = "AUTHORIZED";	

	}

}



echo $found;