<?php
   session_start();

 require_once "configfile.php";


 // colllect form-data 
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = mysqli_real_escape_string($conn, $_POST['password']);
  

 if(!empty($email) && !empty($password)){
    //let's check users entered email and pass matched to db any table row
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if(mysqli_num_rows($sql)>0){// if users credentials matched
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];//using this seasion we used user unique_id in other php files
         echo "success";

    }else{
        die("Email or Password is incorrect!");
    }
 }elseif(empty($email)){
    die("Please check email filed!");
 }elseif(empty($password)){
    die("please check the password!");
 }else{
    die("please fill the fields!");
 }
?>