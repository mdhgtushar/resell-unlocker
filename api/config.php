<?php



// Try and connect using the info above.

$con = $db = mysqli_connect('localhost', 'root', '', 'ipadzmoh_cloud');



// Check connection

if (!$con) {

    die("Connection failed: " . mysqli_connect_error());

}