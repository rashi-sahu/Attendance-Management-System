



<?php

ob_start();

include_once("class_admin.php");

  session_start();

  
  $conn=mysqli_connect("localhost","root","","attendance") or die;
if(!isset($_SESSION['login']) || $_SESSION['login']==false){
    header("location:admin.php");
  }

  $var1= $_GET['course'];

  



$viewStudent=new admin;



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

<form action="" method="POST">



<table class="striped">

        <thead>

          <tr>

              <th data-field="s">S.No.</th>

              <th data-field="id">Name</th>

              <th data-field="name">Email</th>

              <th data-field="price">Mobile</th>

              <th data-field="name">Roll No.</th>

              <th data-field="name">Semester</th>

              <th data-field="id">Date Of Birth</th>

              <th data-field="price">Gender</th>

              <th data-field="name">Guard Name</th>

              <th data-field="name">Guard Email</th>

              <th data-field="name">Guard Mobile</th>

              <th data-field="name">Update</th>

          </tr>

        </thead>



        <tbody>

          <?php

           $myArray=array();

            $myArray=$viewStudent->admin_view_student($conn, $myArray,$var1);   

          ?>

        </tbody>

      </table>

     </form>       







    </body>



</html>

