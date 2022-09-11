<?php
     session_start();

    include_once "configfile.php";

    // colllect form-data 
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

   

    if(!empty($fname) && !empty($lname) && !empty($email)){

       //Password validate...
       if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }
    if(! preg_match("@[A-Z]@", $_POST["password"])){
        die("password must contain at least one capital letter");
    }
    if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter");
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number");
    }
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);   



        // email validation
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // checking IF email already exsit
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)> 0){ //if email already exist
                echo "This $email is already exist";
            }else{
                //user uploads files or NOt
                if(isset($_FILES['image'])){ //if file uploaded
                    $img_name = $_FILES['image']['name'];//getting user uploaded img name
                    $tmpname =  $_FILES['image']['tmp_name'];//temporary name is used to save/move file in our folder
                    
                    
                    //let's explode image and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);//here we get the extension of an user upload img file

                    $extension = ['jpeg', 'jpg', 'png']; //these are the some valid img extension and we've store them in array
                    if(in_array($img_ext, $extension)=== true){//if uploaded img ext is matched with any array extensions
                        $time = time(); //this is will return us current time.
                                        //we need this time becouse when we uploading user img to in our folder we rename user fike with current time
                                        //se all the img file will have a unique name



                        //let's move the user upload img to our particular folder
                        $new_image_name = $time.$img_name;
                        $folder = "image/$new_image_name";
                     if(move_uploaded_file($tmpname, $folder)){//if user uploaded file move to our folder successfully
                        $status = "acitve now"; //once the user signed up then his status will be active.
                        $random_id = rand(time(), 10000000);//creating random id for user


                        //insert all user data inside table of db 
                        $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, fname, lname, email, password, img, status)
                                           VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");
                        
                        if($sql2){//if user data is inserted in database
                            $sql3 = mysqli_query($conn, "SELECT * from users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0){
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];//using this seasion we used user unique_id in other php files
                                echo "success";
                            }
                        }else{
                            echo "somthing went wrong!";
                        }
                     }

                    }else{
                        echo "please select an - jpeg, jpg, png. type File!";
                    }
                }else{
                    echo "please upload file!";
                }
            }
        }else{
            echo "$email - This is not a valid email!";
        }
    }else{
        echo "Please check the error!";
    }
    //  mysqli_close();
?>