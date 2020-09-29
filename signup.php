<?php
    require_once 'header.php';

    $error = $user = $pass = "";
    if (isset($_SESSION['user'])) destroySession();

    if (isset($_POST['signup']))
    {
        $username = sanitizeString($_POST['username']);
        $password = sanitizeString($_POST['password']);
        $email = sanitizeString($_POST['email']);
        $gender = sanitizeString($_POST['gender']);
        $birthdate = sanitizeString($_POST['birthdate']);

        // $user_id = 
        
        $check_email = "SELECT * FROM user WHERE email='$email'";
        $run_email = queryMysql($check_email);
        
        if($run_email->num_rows) {
            echo "<script>alert('Email already exists. Please try using another email.')</script>";
            echo "<script>window.open('signup.php', '_self')</script>";
            exit();
        }

        $result = queryMysql("SELECT * FROM user WHERE username='$user'");
        
        if ($result->num_rows){
            echo "<script>alert('Username already exists. Please try using another username.')</script>";
            echo "<script>window.open('signup.php', '_self')</script>";
            exit();
        } else {
            queryMysql("INSERT INTO user VALUES(NULL, '$username', '$password', '$email', '$gender', '$birthdate', NULL)");
            // die("<h4>Account created</h4>Please Log in.<br><br>");
            echo "<script>alert('Account has been created.')</script>";
            echo "<script>window.open('login.php', '_self')</scritp>";
        }
    }
?>

        <div class="register-box">
            <div class="register-logo">
                <a href="../../index2.html"><b>My network</b></a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="signup.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder='Username' required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder='Password' required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder='Email' required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select name="gender" class="form-control" required>
                            <option disable>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-angle-down"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="birthdate" placeholder='Birthdate' required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" name="signup">Sign Up</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </body>
</html>