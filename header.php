<?php
    ob_start();
    session_start();

    require_once 'functions.php';
    
    $userstr = ' (Guest)';
    
    if (isset($_SESSION['username']))
    { 
        $username = $_SESSION['username'];
        $loggedin = TRUE;
        $userstr = " ($username)";
    }
    else $loggedin = FALSE;
?>
     
    <nav class="main-header navbar navbar-expand navbar-light navbar-blue">
        <div class="container">
            <a href="index3.html" class="navbar-brand">
            <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
            <span class="brand-text font-weight-light">Mynetwork</span>
            </a>

            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="friends.php" class="nav-link">Friends</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="messages.php" class="nav-link">Messages</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    User
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">User's posts</a>
                    <a class="dropdown-item" href=<?php echo "profile.php?uname=" . $username ?>>User's profile</a>
                </div>
            </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?php 
                    // $messages = getThreeMessages($username);
                    // foreach($messages as $message): 
                ?>
                <a href="#" class="dropdown-item" id=<?php //echo $message['friend']?>>
                    <!-- Message Start -->
                    <div class="media">
                    <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        <?php// echo $message['friend'] ?>
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm"><?php //echo $message['content'] ?></p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php// echo date('M jS \'y g:ia:', $message['time']) ?></p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <?php// endforeach ?>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </li>
            </ul>
        </div>
    </nav>