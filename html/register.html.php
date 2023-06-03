<!DOCTYPE html>
<html>
    <head>
        <title>craveins - register</title>
        <link rel="icon" href="../images/FINAL LOGO CRAVE INS green 1.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/login-register.css">
        <script>  
            function google(){  
                alert("Sign up with Google");  
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

                <h2 class="join-us">Join Us!</h2>

                <div class="line">
                    <span class="line-text">
                      Sign up with your Email
                    </span>
                </div>

                <form method="POST" action='../php/register.php'>
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Insert your email" required><br>
                  
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Insert your password" required><br>

                    <input type="submit" name="submit" value="Sign up"><br> 

                    <h6 class="register">Already have an account?</h6>
                    <a href="login.html.php">Log In</a>

                    <h2 class="tagline-register">"A place that can satisfy your cravings"</h2>
                </form>

                <a href="home.html">
                    <button class="guest-register"><< Go back as Guest</button>
                </a>
            </div> 

            <div class="right-banner">
                <img src="../images/Rectangle 3.png" alt="right-banner">
            </div>
        </div>
    </body>
    <script src="../js/register-login.js"></script>
</html>