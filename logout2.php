<?php
session_start();
$_SESSION['login']=false;
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['mobile']);
unset($_SESSION['id']);
unset($_SESSION['date']);
unset($_SESSION['gender']);
header("location:attendance.php");

?>