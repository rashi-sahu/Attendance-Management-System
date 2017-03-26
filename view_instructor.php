



<?php

ob_start();

include_once("class_admin.php");

  session_start();

  

  $conn=mysqli_connect("localhost","root","","attendance") or die;

if(!isset($_SESSION['login']) || $_SESSION['login']==false){
    header("location:admin.php");
  }

  $var1= $_GET['course'];

  



$admin=new admin;



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

              <th data-field="sl">Sl.No.</th>

              <th data-field="id">Name</th>

              <th data-field="name">Email</th>

              <th data-field="price">Mobile</th>

              <th data-field="id">Date Of Birth</th>

              <th data-field="price">Gender</th>

              <th data-field="name">ID</th>

              <th data-field="name">Update</th>

          </tr>

        </thead>



        <tbody>

          <?php

           $myArray=array();

          $myArray=$admin->admin_view_instructor($conn, $myArray,$var1);   

          ?>

        </tbody>

      </table>

     </form>       

<?php

  //echo $myArray[0];

  $b=0;

  while($b<50){

    //echo "Hi";

    $c=(string)$b;

    //echo $c;

    if(isset($_POST[$c])){

      //echo "Hi there";

      //print_r($myArray);

      //echo $myArray[$b];

      $_SESSION['d']=$myArray[$b-2];

      //echo $_SESSION['d'];

     header("location:update_instructor.php");

      break;

    }

    $b++;

  }

  ob_end_flush();

  ?>





    </body>



</html>

