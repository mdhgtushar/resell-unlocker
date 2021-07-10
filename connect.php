<?php



// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ipadzmoh_cloud');
                                   


// Check connection

if (!$db) {

    die("Connection failed: " . mysqli_connect_error());

}