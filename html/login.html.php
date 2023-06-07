<!DOCTYPE html>
<html>
    <head>
        <title>craveins - login</title>
        <link rel="icon" type="image/png" sizes="32x32" href="../images/crave ins icon.png">
        <link rel="stylesheet" href="../css/login-register.css">
        <script>  
            function google(){  
                alert("Sign in with Google");  
            }  
            function forgot_password(){  
                alert("Forgot Password");  
            } 
        </script> 
        <style><?php include '../css/login-register.css'; ?></style>
    </head>
    <body>
        <div class="container">

            <div class="left-banner">
                <img src="../images/IMAGE.png" alt="left-banner">
            </div>

            <div class="form-container">  

                <img id="logoName" class="logo" src="../images/crave ins logo name.png" alt="Crave Ins Logo"> 

                <h2 class="welcome">Welcome back!</h2>

                <div class="line">
                    <span class="line-text">
                      Log In with your Email
                    </span>
                </div>

                <form method="POST" action='../php/login.php'>
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Insert your email"><br>
                  
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Insert your password"><br>

                    <input type="checkbox" id="keep" name="keep">
                    <label for="keep">Keep me logged in</label>
                    <a id="forgot-password" onclick="forgot_password()">Forgot Password?</a><br>
                    <input type="submit" name="submit" value="Log in"><br>

                    <h6 class="login">Don't have an account?</h6>
                    <a href="register.html.php">Register</a>

                    <h2 class="tagline-login">"A place that can satisfy your cravings"</h2>
                </form>

                <a href="home-no-profile.html.php">
                    <button class="guest-login"><< Go back as Guest</button>
                </a>
            </div> 

            <div class="right-banner">
                <img src="../images/Rectangle 3.png" alt="right-banner">
            </div>
        </div>
    </body>
    <script src="../js/register-login.js"></script>
</html>