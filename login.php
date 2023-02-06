<?php
session_start();
 include_once('database/db.php');
 $empmsg_name= $empmsg_pass ="";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email)){
        $empmsg_name = "Enter Your Email Address.";
       
    }
    if(empty($password)){
        $empmsg_pass = "Enter Your password.";
       
    }
    $login_error='';
    if(!empty($email) && !empty($password)){
        $sql = "SELECT * FROM users WHERE email = '$email' AND password= '$password'";
        $query = $conn->query($sql);
        if($query->num_rows>0){
            $_SESSION['logn']= 'login seccess';
           header('location:index.php');
        }else{
            $login_error ='email and password are not mucth';
        }
    }
}


 include_once('include/head.php');
 ?>
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <form action="login.php" method="POST" autocomplete="off">

                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="email" placeholder="Enter your email address" name="email"
                                        value="<?php if(isset($_POST['submit'])){echo $email;}?>" autocomplete="off">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                    <?php if(isset($_POST['submit'])){echo '<span class="text-danger">'.$empmsg_name.'</span>';} ?>
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password"
                                        name="password" autocomplete="off">
                                    <?php if(isset($_POST['submit'])){echo '<span class="text-danger">'.$empmsg_pass.'</span>';} ?>
                                    <?php if(isset($_POST['submit'])){echo '<span class="text-danger">'.$login_error.'</span>';} ?>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>



                            <div class="form-login">
                                <button class="btn btn-login" name="submit">Sign In</button>
                                <!-- <a class="btn btn-login" href="index.html">Sign In</a> -->
                            </div>
                        </form>
                        <!-- <div class="signinform text-center">
                            <h4>Don’t have an account? <a href="signup.html" class="hover-a">Sign Up</a></h4>
                        </div> -->
                        <!-- <div class="form-setlogin">
                            <h4>Or sign up with</h4>
                        </div> -->
                        <div class="form-sociallink">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="assets/img/icons/google.png" class="me-2" alt="google">
                                        Sign Up using Google
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="assets/img/icons/facebook.png" class="me-2" alt="google">
                                        Sign Up using Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>