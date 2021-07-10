<?php
session_start();

if(isset($_SESSION['logedInUserId'])) {}else{echo '<script>window.location.href = "login.php";</script>';}
?>
<?php

$con = mysqli_connect('localhost','root', '', 'ipadzmoh_cloud');



if(isset($_GET['delete'])){
$delId = $_GET['delete'];
$query = "DELETE FROM users WHERE id='$delId'";
$result = mysqli_query($con, $query);
if($result){
echo "Deleted succesful";
}else{
echo"something wrong";
}
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- load custom font -->
<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
<!-- load MUI -->
<link href="http://cdn.muicss.com/mui-0.10.3/css/mui.min.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
<!-- custom font css -->
<style>
body {
font-family: "Roboto", "Helvetica Neue", Helvetica, Arial;
}

</style>
</head>
<body>
<div class="mui-container">

<div class="mui-panel">
<table width="100%">
<tr style="vertical-align:middle;">
<td class="mui--appbar-height"><h1>Add credit</h1></td>
<td class="mui--appbar-height" align="right"><a href="index.php">Refresh </a><a href="logout.php"> || logout.php</a></td>
</tr>
</table>
<?php 
if(isset($_GET['addcredit'])){


$id = $_GET['addcredit'];
    if(isset($_POST['submit'])){
        $credit = $_POST['credit'];

        $query = "SELECT * FROM credit WHERE userId =$id";
        $result = mysqli_query($con, $query);
        if($result){
        if(mysqli_num_rows($result) > 0){
            
            $query = "UPDATE credit SET credit = '$credit' WHERE userId = $id";
        }else{
            $query = "INSERT INTO credit (credit,userId) VALUE('$credit','$id')";
        }}
        
        

        if(!empty($credit)){
        $insert = mysqli_query($con, $query);
        if($insert){
        echo "inserted";
        }else{
        echo 'something wrong';
        }
        }else{
        echo "Filds must not be empty";
        }
        }
       
    ?>
<form class="mui-form" action="" method="POST">
<legend>Credit edit</legend>
<div class="mui-textfield mui-textfield--float-label">
<input type="text" name="credit">
<label>Add Credit ammount</label>
</div>
<button type="submit" name="submit" class="mui-btn mui-btn--raised">Submit</button>
</form>
<?php
}
?>
</div>


<table class="mui-table mui-table--bordered">
<tr class="mui-panel">
<td>Id</td>
<td>Username</td>
<td>Email</td>
<td>Credit</td>
<td>Action</td>
</tr>
<?php
$query = "SELECT * FROM users ";
$result = mysqli_query($con, $query);
if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
echo "<tr class=' mui-panel'>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
 $id = $row['id'] ;
$querys = "SELECT * FROM credit WHERE userId =$id";
$results = mysqli_query($con, $querys);
if($results){
if(mysqli_num_rows($results) > 0){
while($roww = mysqli_fetch_array($results)){
    echo "<td>".$roww['credit']."</td>";
}}else{echo "<td>0</td>";}}
;
echo '
<td style="padding:0">
<div class="mui-dropdown">
<button class="mui-btn mui-btn--primary" data-mui-toggle="dropdown">
Action
<span class="mui-caret"></span>
</button>
<ul class="mui-dropdown__menu">
<li><a href="?delete=' . $row['id'] . '">Delete</a></li>
<li><a href="?addcredit=' . $row['id'] . '">Add credit</a></li>
</ul>
</div>
</td>
';
echo "</tr> ";
}
}
}
?>
</table>
</div>
</body>
</html>