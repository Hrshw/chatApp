<?php 
session_start();
include_once "configfile.php";

// fetch data from db-
$sql = mysqli_query($conn, "SELECT * FROM users");

if(mysqli_num_rows($sql) == 1){
    $output = "No users are available to chat";
}elseif (mysqli_num_rows($sql) > 0 ) {
   include "data.php";
}


?>