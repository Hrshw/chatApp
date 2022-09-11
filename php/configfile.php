<?php
$host = "127.0.0.7";
$dbname = "signupusers";
$username = "root";
$password = "";

$conn = mysqli_connect( $host,
                          $username,
                         $password,
                         $dbname);

if(!$conn){
    echo "connected to database".mysqli_connect_error();
}


?>