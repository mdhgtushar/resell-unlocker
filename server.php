<?php
// initializing variables
session_start();



$username = "";

$email    = "";

$errors = array(); 



// connect to the database
include "connect.php";

// REGISTER USER

if (isset($_POST['reg_user'])) {

  // receive all input values from the form

  $username = mysqli_real_escape_string($db, $_POST['username']);

  $email = mysqli_real_escape_string($db, $_POST['email']);

  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);



  // form validation: ensure that the form is correctly filled ...

  // by adding (array_push()) corresponding error unto $errors array

  if (empty($username)) { array_push($errors, "Username is Required"); }

  if (empty($email)) { array_push($errors, "Email is Required"); }

  if (empty($password_1)) { array_push($errors, "Password is Required"); }

  if ($password_1 != $password_2) {

	array_push($errors, "The Two Passwords Do Not Match");

  }



  // first check the database to make sure 

  // a user does not already exist with the same username and/or email

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

  $result = mysqli_query($db, $user_check_query);

  $user = mysqli_fetch_assoc($result);

  

  if ($user) { // if user exists

    if ($user['username'] === $username) {

      array_push($errors, "Username Already Exists");

    }



    if ($user['email'] === $email) {

      array_push($errors, "Email Already Exists");

    }

  }



  // Finally, register user if there are no errors in the form

  if (count($errors) == 0) {

  	$password = $password_1;//encrypt the password before saving in the database



  	$query = "INSERT INTO users (username, email, password) 

  			  VALUES('$username', '$email', '$password')";

  	mysqli_query($db, $query);

  	array_push($errors, "Registered Success");

  }

}





// LOGIN USER

if (isset($_POST['login_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);

  $password = mysqli_real_escape_string($db, $_POST['password']);



  if (empty($username)) {

  	array_push($errors, "Username is Required");

  }

  if (empty($password)) {

  	array_push($errors, "Password is Required");

  }



  if (count($errors) == 0) {

  	$password = $password;

  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {



      
		session_regenerate_id();

		$_SESSION['loggedin'] = TRUE;

		$_SESSION['username'] = $username;


while($row = $results->fetch_assoc()) {
    
		$_SESSION['userId'] = $row['id'];
  }
		$_SESSION["last_login_time"] = time();

		header('location: dashboard.php');

  	}else {

  		array_push($errors, "Username and Password Doesn't Match");

  	}

  }

}



// REGISTER SN

if (isset($_POST['proccess'])) {

  // receive all input values from the form

  $serialNumber = mysqli_real_escape_string($db, $_POST['serialNumber']);



  // form validation: ensure that the form is correctly filled ...

  // by adding (array_push()) corresponding error unto $errors array

  if (empty($serialNumber)) { array_push($errors, "Please Input Serial Number"); }



  // first check the database to make sure 

  // a user does not already exist with the same username and/or email

  $serial_check_query = "SELECT * FROM serCheck WHERE serialNumber='$serialNumber' LIMIT 1";

  $result = mysqli_query($db, $serial_check_query);

  $serial = mysqli_fetch_assoc($result);

  

  if ($serial) { // if user exists

    if ($serial['serialNumber'] === $serialNumber) {

      array_push($errors, "Serial Number Already Registered");

    }

  }



  // Finally, register user if there are no errors in the form

  if (count($errors) == 0) {

	$name = $_SESSION['username'];

  	$query = "INSERT INTO serCheck (serialNumber, name) 

  			  VALUES('$serialNumber', '$name')";

  	mysqli_query($db, $query);

  	array_push($errors, $serialNumber, "Successfully Registered");

  }

}



?>