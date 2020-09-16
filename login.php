<?php
    require_once 'header.php';
    
    // echo "<div class='main'><h3>Please enter your details to log in</h3>";
    $error = $user = $pass = "";
    
    if (isset($_POST['user']))
    {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);
        
        if ($user == "" || $pass == "")
            $error = "Not all fields were entered<br>";
        else
        {
            $result = queryMySQL("SELECT username, password FROM user
            WHERE username='$user' AND password='$pass'");
            
            if ($result->num_rows == 0)
            {
                $error = "<span class='error'>Username/Password
                invalid</span><br><br>";
            }
            else
            {
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                
                header("Location: http://localhost/mynetwork/members.php?view=$user");
                die();

                // die("You are now logged in. Please <a href='members.php?view=$user'>" .
                // "click here</a> to continue.<br><br>");
            }
        }
    }

?>

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user" placeholder='Username'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass" placeholder='Password'>
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
            <button type="submit" class="btn btn-primary btn-block btn-flat" value="Login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

</div>
</body>
</html>