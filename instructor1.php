

<?php

  session_start();
include_once('class_instructor.php');
   $conn=mysqli_connect("localhost","root","","attendance") or die;



  if(!isset($_SESSION['login_inst']) || $_SESSION['login_inst']==false){

    header("location:instructor.php");

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

    <a href="#!" class="brand-logo">WELCOME INSTRUCTOR</a>

    <ul class="right hide-on-med-and-down">

      <li><a href="instructor1.php">Profile</a></li>

      <li><a href="add_attendance.php">Add Attendance</a></li>

      <li><a href="view_all_attendance.php">View Attendance</a></li>

      <li><a href="update.php">Update Attendance</a></li>

      

      <!-- Dropdown Trigger -->

      
    </ul>

  </div>

</nav>





<div class="container" style="margin-top:150px;">

  <div class="col-lg-1"></div>

  <div class="col-lg-5">

    <table class="table">

      <tr><td>Name</td><td><?php echo $_SESSION['name']?></td></tr>

      <tr><td>Email</td><td><?php echo $_SESSION['email'] ?></td></tr>

      <tr><td>Mobile</td><td><?php echo $_SESSION['mobile'] ?></td></tr>

      <tr><td>ID</td><td><?php echo $_SESSION['id'] ?></td></tr>

      <tr><td>Date Of Birth</td><td><?php echo $_SESSION['date'] ?></td></tr>

      <tr><td>Gender</td><td><?php echo $_SESSION['gender'] ?></td></tr>

    </table>

  </div>



   <a href="logout2.php">Logout</a>




  

  <div class="col-lg-1"></div>



</div>



    </body>



</html>







   