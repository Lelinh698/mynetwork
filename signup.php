<?php
    require_once 'header.php';

    echo <<<_END
        <script>
            function checkUser(user)
            {
                if (user.value == '')
                {
                    O('info').innerHTML = ''
                    return
                }
                params = "user=" + user.value
                request = new ajaxRequest()
                request.open("POST", "checkuser.php", true)
                request.setRequestHeader("Content-type",
                "application/x-www-form-urlencoded")
                request.setRequestHeader("Content-length", params.length)
                request.setRequestHeader("Connection", "close")
                request.onreadystatechange = function()
                {
                    if (this.readyState == 4)
                        if (this.status == 200)
                            if (this.responseText != null)
                                O('info').innerHTML = this.responseText
                }
                request.send(params)
            }
            function ajaxRequest()
            {
                try { var request = new XMLHttpRequest() }
                catch(e1) {
                    try { request = new ActiveXObject("Msxml2.XMLHTTP") }
                    catch(e2) {
                        try { request = new ActiveXObject("Microsoft.XMLHTTP") }
                        catch(e3) {
                            request = false
                } } }
                return request
            }
        </script>
_END;

    $error = $user = $pass = "";
    if (isset($_SESSION['user'])) destroySession();

    if (isset($_POST['user']))
    {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);
        
        if ($user == "" || $pass == "")
            $error = "Not all fields were entered<br><br>";
        else
        {
            $result = queryMysql("SELECT * FROM user WHERE username='$user'");
            
            if ($result->num_rows)
                $error = "That username already exists<br><br>";
            else
            {
                queryMysql("INSERT INTO user VALUES(NULL, '$user', '$pass', NULL, NULL, NULL, NULL)");
                die("<h4>Account created</h4>Please Log in.<br><br>");
            }
        }
    }

//     echo <<<_END
//         <form method='post' action='signup.php'>$error
//         <span class='fieldname'>Username</span>
//         <input type='text' maxlength='16' name='user' value='$user'
//         onBlur='checkUser(this)'><span id='info'></span><br>
//         <span class='fieldname'>Password</span>
//         <input type='text' maxlength='16' name='pass'
//         value='$pass'><br>
// _END;
?>

        <div class="register-box">
            <div class="register-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="signup.php" method="post">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name='user' autocomplete='off'>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div> -->
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name='pass'>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div> -->
                    <!-- <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                        </label>
                        </div>
                    </div> -->
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" value='Sign up'>Register</button>
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