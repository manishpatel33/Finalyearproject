<!DOCTYPE html>
<html lang="en">
<head><title>login</title>
    <link href="http://www.tutorialspoint.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link href="css/one-page-wonder.css" rel="stylesheet">
    <style type="text/css">
        h1{color: rgb(0,188,222);}
    </style>
    <script>
        /**
         * function that checks if the browser supports HTML5
         * local storage
         * @returns {boolean}
         */
        function supportsHTML5Storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }
        /**
         * Test data. This data will be safe by the web app
         * in the first successful login of a auth user.
         * To Test the scripts, delete the localstorage data
         * and comment this call.
         * @returns {boolean}
         */
        function testLocalStorageData() {
            if (!supportsHTML5Storage()) {
                return false;
            }
            localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
        }
    </script>

      <?php
                
                if(isset($_POST['submit'])){
                    
                    $fname=$_POST['fname'];
                    $lname=$_POST['lname'];
                    $email=$_POST['emailid'];
                    $username=$_POST['username'];
                    $pass= password_hash($_POST['password'],PASSWORD_DEFAULT);
                                
                    require_once("dbconnection.php");
                    
                    $query = "INSERT INTO login(username,password,firstname,lastname,email) VALUES ('$username','$pass','$fname','$lname','$email')";
                    
                    if($con->query($query)){
                        echo "Registration Successful.";
                    }else{
                        echo "Problem......";
                    }
                    $con->close();
                }
    ?>
        </head>
    <body>

    <h1 align="center">LOGIN</h1>
    <div class="container">
        <div class="featurette" id="about">
            <div class="container">
                <div class="card card-container">
                    <form action="index.php" class="form-signin">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="email" id="emailid" class="form-control" placeholder="Email address" required autofocus>
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                    </form>
                    <a href="forgotpass.html" class="forgot-password">Forgot the password? </a><br><br><br>
                    <a href="sign_up.html" class="forgot-password">Sign up?</a>
                </div>
            </div>
            <script src="http://www.tutorialspoint.com/bootstrap/scripts/jquery.min.js"></script>
            <script src="http://www.tutorialspoint.com/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>