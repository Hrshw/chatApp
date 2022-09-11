<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Chat Anywhere</title>
</head>
<body>
    <div class="waraper">
        <section class="form signup">
            <header>ChatSkoot</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-text">This is an error messagae</div>
                <div class="user-deatils">
                    <div class="field input">
                        <label for="First-Name">First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="Last Name">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    </div>
                    <div class="field input">
                        <label for="Email">Email Address</label>
                        <input type="email" name="email" placeholder="Enter your Email" required="a\/da@">
                    </div>
                    <div class="field input">
                        <label for="Password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="Select Image"> Select Image</label>
                        <button type="button" class="btn">Upload your Image</button>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" id="submit" value="Continue to Chat">
                    </div>
            </form>
            <div class="link">Already a user? <a href="login.php">Login now</a></div>
        </section>
    </div>
    <script src="javascript/hide-show-pass.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>