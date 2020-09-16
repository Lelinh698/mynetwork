<?php
    ob_start();
    session_start();

    require_once 'functions.php';

    echo "<!DOCTYPE html>\n<html><head><meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>";
    
    $userstr = ' (Guest)';
    
    if (isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr = " ($user)";
    }
    else $loggedin = FALSE;
?>
    <!-- echo "<title>$appname$userstr</title><link rel='stylesheet' " .
        "href='styles.css' type='text/css'>" . "<link rel='stylesheet' " .
        "href='css/adminlte.min.css' type='text/css'>" . "<link rel='stylesheet' " .
        "href='css/all.min.css' type='text/css'>" .
        "</head><body><center><canvas id='logo' width='624' " .
        "height='96'>$appname</canvas></center>" .
        "<div class='appname'>$appname$userstr</div>" .
        "<script src='javascript.js'></script>"; -->

    <title>AdminLTE 3 | Top Navigation</title>

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
    <body class="hold-transition layout-top-nav">
    <div class="wrapper">
<?php
    if ($loggedin)
        // echo "<br ><ul class='menu'>" .
        //     "<li><a href='members.php?view=$user'>Home</a></li>" .
        //     "<li><a href='members.php'>Members</a></li>" .
        //     "<li><a href='friends.php'>Friends</a></li>" .
        //     "<li><a href='messages.php'>Messages</a></li>" .
        //     "<li><a href='profile.php'>Edit Profile</a></li>" .
        //     "<li><a href='logout.php'>Log out</a></li></ul><br>";
        readfile('menu.html');
    else
        // echo ("<br><ul class='menu'>" .
        //     "<li><a href='index.php'>Home</a></li>" .
        //     "<li><a href='signup.php'>Sign up</a></li>" .
        //     "<li><a href='login.php'>Log in</a></li></ul><br>" .
        //     "<span class='info'>&#8658; You must be logged in to " .
        //     "view this page.</span><br><br>");
        readfile('menu2.html');