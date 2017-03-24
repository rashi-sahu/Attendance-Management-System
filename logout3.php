<?php
session_start();
$_SESSION['login']=false;
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['mobile']);
unset($_SESSION['roll']);
unset($_SESSION['date']);
unset($_SESSION['gender']);
unset($_SESSION['guard_name']);
unset($_SESSION['guard_email']);
unset($_SESSION['guard_mobile']);
unset($_SESSION['semester']);
header("location:attendance.php");

?>