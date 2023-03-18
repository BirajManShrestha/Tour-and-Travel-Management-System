<?php

$con = mysqli_connect('localhost', 'root');

if($con){
    echo "Connection Successful";
} else {
    echo "No Connection";
}

mysqli_select_db($con, 'login');

//Get values pass from form in login.php file
$username = $_POST['username'];
$password = $_POST['password'];

//to prevent mysql injection
$username = stripcslashers("username");
$password = stripcslashers("password");
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// Query the database for user
$query = "insert into login (username, password) values ('$username', '$password') ";
mysqli_query($con, $query);

header('location:login.php')

?>