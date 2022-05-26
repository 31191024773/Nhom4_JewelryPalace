<!--php-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JEWELRYxPALACE</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../ds/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../ds/css/style.css">
</head>
<body>

<div class="main">

    <!-- Sign in  Form -->
    <section id="sign_in" class="ddd" style="margin-top: 16px">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image" style="text-align: center">
                    <figure><img src="../ds/images/signin-image.jpg" alt="sing up image"></figure>
                    <button onclick="SwitchSignUp(1)" style="background-color: white;
                        border: none; font-size: 14px; color: black">Create an account
                    </button>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign In</h2>
                    <form method="POST" class="register-form" id="login-form" action="../Controller/Controller.php">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="your_name"
                                   value="<?php if (isset($_COOKIE['username'])) {
                                       echo $_COOKIE['username'];
                                   } ?>" placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass"
                                   value="<?php if (isset($_COOKIE['password'])) {
                                       echo $_COOKIE['password'];
                                   } ?>" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" class="agree-term"
                                <?php if (isset($_COOKIE['username'])) echo "checked" ?>/>
                            <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sign up form -->
    <section id="sign_up" class="hide_form ddd" style="margin-top: 16px">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username"
                                   value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                   value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                            <input type="number" name="phone" id="phone" placeholder="Your Phone"
                                   value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="address"><i class="zmdi zmdi-my-location"></i></label>
                            <input type="text" name="address" id="address" placeholder="Your Address"
                                   value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password"
                                   value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="re_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"
                                   value="<?php echo (isset($_POST['re_pass'])) ? $_POST['re_pass'] : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image" style="text-align: center">
                    <figure><img src="../ds/images/signup-image.jpg" alt="sing up image"></figure>
                    <!--                    <a href="#" class="signup-image-link">I am already member</a>-->
                    <button onclick="SwitchSignUp(2)" style="background-color: white;
                        border: none; font-size: 14px; color: black">Create an account
                    </button>
                </div>
            </div>
        </div>
    </section>


</div>


<!-- JS -->
<script src="../ds/vendor/jquery/jquery.min.js"></script>
<script src="../ds/js/main.js"></script>
<script></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>