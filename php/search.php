<?php
include_once "configfile.php";
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$Output = "";

$sql = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' or lname LIKE '%{$searchTerm}%'");
if(mysqli_num_rows($sql) > 0){
    include "data.php";
}else {
    $Output .= "No user found related to your search term";
}
echo $Output;
?> 