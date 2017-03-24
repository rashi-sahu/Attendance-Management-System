<?php
session_start();
$_SESSION['login']=false;
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['mobile']);
header("location:attendance.php");

?>