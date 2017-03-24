<?php
  session_start();
    $conn=mysqli_connect("localhost","root","","attendance") or die;

  if(!isset($_SESSION['login']) || $_SESSION['login']==false){
    header("location:admin.php");
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
   
    <ul class="right hide-on-med-and-down">
      <li><a href="admin1.php">Profile</a></li>
      <li><a href="admin1_addFaculty.php">Add Instructor</a></li>
      <li><a href="instructor_delete.php">Delete Instructor</a></li>
      <li><a href="view_instructor1.php">View Instructor</a></li>
      <li><a href="admin1_addStudent.php">Add Student</a></li>
      <li><a href="student_delete.php">Delete Student</a></li>
      <li><a href="view_student1.php">View Student</a></li>
      <li><a href="add_courses.php">Courses</a></li>
      <!-- Dropdown Trigger -->
      
    </ul>
  </div>
</nav>



<div class="container" style="margin-top:150px;">
  <div class="col-lg-1"></div>
  <div class="col-lg-5">
    <table class="table striped">
      <tr><td>Name</td><td><?php echo $_SESSION['name'] ?></td></tr>
      <tr><td>Email</td><td><?php echo $_SESSION['email'] ?></td></tr>
      <tr><td>Mobile</td><td><?php echo $_SESSION['mobile'] ?></td></tr>
    </table>
  </div>
  <div class="col-lg-5" style="margin-top:50px;">
    <a href="logout1.php">Logout</a>
  </div>
  <div class="col-lg-1"></div>

</div>

    </body>

</html>



   