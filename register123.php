<!DOCTYPE html>
<html lang="en">
<head><title>regestration</title>
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
     <div class="container">
        <div class="featurette" id="about">
            <div class="container">
                <div class="card card-container">
                    <form method="post" action="Default.aspx" id="form1">
<div style="max-width: 400px;">
    <h2 class="form-signin-heading">
        Registration</h2>
    <label for="txtUsername">
        Username</label>
    <input name="txtUsername" type="text" id="txtUsername" class="form-control" placeholder="Enter Username"
        required />
    <br />
    <label for="txtPassword">
        Password</label>
    <input name="txtPassword" type="password" id="txtPassword" title="Password must contain: Minimum 8 characters atleast 1 Alphabet and 1 Number"
        class="form-control" placeholder="Enter Password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />
    <br />
    <label for="txtConfirmPassword">
        Confirm Password</label>
    <input name="txtConfirmPassword" type="password" id="txtConfirmPassword" class="form-control"
        placeholder="Confirm Password" />
    <br />
    <label for="txtEmail">
        Email</label>
    <input name="txtEmail" id="txtEmail" class="form-control" placeholder="Enter Email"
        required type="email" />
    <br />
    <input type="submit" name="btnSignup" value="Sign up" id="btnSignup" class="btn btn-primary" />
</div>
</form>

                    <a href="forgotpass.html" class="forgot-password">Forgot the password? </a><br>
                    
                </div>
            </div>
            <script src="http://www.tutorialspoint.com/bootstrap/scripts/jquery.min.js"></script>
            <script src="http://www.tutorialspoint.com/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    window.onload = function () {
        var txtPassword = document.getElementById("txtPassword");
        var txtConfirmPassword = document.getElementById("txtConfirmPassword");
        txtPassword.onchange = ConfirmPassword;
        txtConfirmPassword.onkeyup = ConfirmPassword;
        function ConfirmPassword() {
            txtConfirmPassword.setCustomValidity("");
            if (txtPassword.value != txtConfirmPassword.value) {
                txtConfirmPassword.setCustomValidity("Passwords do not match.");
            }
        }
    }
</script>
    </body>
</html>