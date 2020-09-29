<!DOCTYPE html>
<?php
    require_once 'functions.php';
    
    $user = $pass = "";
    
    if (isset($_POST['login']))
    {
        $username = sanitizeString($_POST['username']);
        $pass = sanitizeString($_POST['password']);
        
        $result = queryMySQL("SELECT user_id ,username, password FROM user
        WHERE username='$username' AND password='$pass'");
        
        if ($result->num_rows == 0)
        {
          echo "<script>alert('Account was not found.')</script>";
        }
        else
        {
            ob_start();
            session_start();

            $row = $result->fetch_array(MYSQLI_ASSOC);
            
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $pass;
            
            // header("Location: http://localhost/mynetwork/members.php?view=$user");
            // die();
            echo "<script>window.open('home.php', '_self')</script>";
        }
    }

?>

<html>
<head>
		<title>My network</title>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta http-equiv='x-ua-compatible' content='ie=edge'>
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.bundle.min.js'></script>
		<script src='js/adminlte.min.js'></script>
	</head>
  
  <body>
    <div class="wrapper">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>My network</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="login.php" method="post">
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
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    </div>
  </body>
</html>