<?php session_start();
    


$_SESSION['username'] = NULL;
$_SESSION['email'] = NULL;
$_SESSION['role'] = NULL;
 session_destroy();
header("Location: index.php");


?>