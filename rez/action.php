<?php
session_start();

if(isset($_POST['submitLogin'])){
   $email = $_POST['email'];
    $password = $_POST['password'];


    if($email == "yoyo" && $password == "123"){
        $_SESSION['logedInUserId'] = 'yoyo';
        echo '<script>window.location.href = "index.php";</script>';
            
    }else{
        echo 'incorrect password';
}
}else{
        echo '<script>window.location.href = "login.php";</script>';
}



?>