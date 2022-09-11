<?php include_once "php/header.php" ?>
<body>
    <div class="waraper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-text"></div>
                    <div class="field input">
                        <label for="Email">Email Address</label>
                        <input type="email" name="email" placeholder="Enter your Email" required="a\/da@">
                    </div>
                    <div class="field input">
                        <label for="Password">Password</label>
                        <input type="password" name="password" placeholder="Enter your Password">
                        <i class="fas fa-eye"></i>
                    </div>
                   
                    <div class="field button">
                        <input type="submit" name="submit" id="submit" value="Continue to Chat">
                    </div>
            </form>
            <div class="link">Not Yet signed up?  <a href="signupform.php">Signup now</a></div>
        </section>
    </div>
    <script src="javascript/hide-show-pass.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>