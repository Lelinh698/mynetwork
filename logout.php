<?php
require_once 'functions.php';

// if (isset($_SESSION['username']))
// {
destroySession();

header("Location: login.php");

// }
// else echo "<script>alert('You cannot log out because you are not logged in')</script>";
?>