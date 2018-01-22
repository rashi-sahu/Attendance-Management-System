<?php
  session_start();
  include_once('class_instructor.php');
   $conn=mysqli_connect("localhost","root","","attendance") or die;

if (isset($_POST['ilog'])){
    $mobile=$_POST['imob'];
    $password=$_POST['ipass'];

    $object = new instructor();

    $object->inst_login($conn,$mobile,$password);

  }

  ?>



<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


     
       
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      
<nav style="background-color: #540c94">
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">ATTENDANCE MANAGMENT SYSTEM </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="attendance.php">Home</a></li>
      <li><a href="admin.php">Admin</a></li>
      <li><a href="instructor.php">Instructor</a></li>
      <li><a href="student.php">Student</a></li>
      <!-- Dropdown Trigger -->
      
    </ul>
  </div>
</nav>


  <div class="container" style="margin-top:150px;">
  <div class="col-lg-1"></div>
  <div class="col-lg-5" style="margin-top:10px;">
    <h4>Instructor Login</h4>
    
    <table class="table table-responsive">
      <form name="form1" action="" method="post" onsubmit="funValidate1()">
        <tr><td><label>Mobile</label></td>
        <td><input type="text" name="imob"></td></tr>
        <tr><td><label>Password</label></td>
        <td><input type="password" name="ipass"></td></tr>
        <tr><td></td><td><button class = "btn btn-primary" type="submit" name="ilog" onMouseover("this.style.backgroundColor='red';return true;" )>Login</button></td></tr>
      </form>
    </table>
  </div>

    </body>

</html>



   