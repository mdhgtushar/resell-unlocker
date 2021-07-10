<?php



// initializing variables

$username = "";

$email    = "";

$errors = array(); 


$userId =  $_SESSION['userId'];

// connect to the database
                       // hot        username             pw            dbanme .?
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

  if (empty($username)) { array_push($errors, "Username is required"); }

  if (empty($email)) { array_push($errors, "Email is required"); }

  if (empty($password_1)) { array_push($errors, "Password is required"); }

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

  	array_push($errors, "Register Successfully");

  }

}





// LOGIN USER

if (isset($_POST['login_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);

  $password = mysqli_real_escape_string($db, $_POST['password']);



  if (empty($username)) {

  	array_push($errors, "Username is required");

  }

  if (empty($password)) {

  	array_push($errors, "Password is required");

  }



  if (count($errors) == 0) {

  	$password = $password;

  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {

  	  $_SESSION['username'] = $username;

  	  $_SESSION["last_login_time"] = time();

	  header('Location: ../log/dist/home.php');

  	}else {

  		array_push($errors, "Username or Password Do Not Match!");

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
  
  if (strlen($serialNumber) < 12 ) { array_push($errors, "Please Input Serial Number Greter then 12 Letter"); }
  if (strlen($serialNumber) > 12 ) { array_push($errors, "Please Input Serial Number Less then 12 Letter"); }


  // first check the database to make sure 

  // a user does not already exist with the same username and/or email

  $serial_check_query = "SELECT * FROM sercheck WHERE serialNumber='$serialNumber' LIMIT 1";

  $result = mysqli_query($db, $serial_check_query);

  $serial = mysqli_fetch_assoc($result);

  

  if ($serial) { // if user exists

    if ($serial['serialNumber'] === $serialNumber) {

      array_push($errors, "Serial Number Already Registered");

    }

  }



$data_credit = mysqli_query($db,"SELECT * FROM  credit WHERE userId='$userId'");
if(mysqli_num_rows($data_credit) > 0){
    


  while($row = $data_credit->fetch_assoc()) {
		$jumlah_credit = $row['credit'];
  }
  if($jumlah_credit > 0){
    $jumlah_credit = $jumlah_credit - 1;




  // Finally, register user if there are no errors in the form

  if (count($errors) == 0) {

    $userId =  $_SESSION['userId'];
    $serialNumber = strtoupper($serialNumber);
    
  	$query = "INSERT INTO sercheck (serialNumber,userId) VALUES('$serialNumber','$userId')";
    $qurey_credit = "UPDATE credit SET credit = $jumlah_credit  WHERE userId='$userId'";

  	mysqli_query($db, $query);
  	mysqli_query($db, $qurey_credit);

  	array_push($errors, $serialNumber, "Successfully Registered");

  }
    
  }else{
  
  	array_push($errors, $serialNumber, "Not registered! please add credit");
}





}else{
  
  	array_push($errors, $serialNumber, "Not registered! please add credit");
}


}



?>