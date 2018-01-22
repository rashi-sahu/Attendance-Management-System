<?php



  session_start();

  $conn=mysqli_connect("localhost","root","","attendance") or die;
if(!isset($_SESSION['login_inst']) || $_SESSION['login_inst']==false){

    header("location:instructor.php");

  }





$mob2=$_SESSION['mobile'];

//echo $mob2;

$sql="SELECT * FROM addInstructor WHERE Imobile='$mob2'";

$res= mysqli_query($conn,$sql) or die("qry not fired!");

  

  //if (mysqli_affected_rows($conn)>=1){

    $arry_of_courses = array();

    while($result1=mysqli_fetch_array($res)){

    $course_name=$result1[7];

      //echo $course_name;

      array_push($arry_of_courses, $course_name);



    }

    // for($j=0; $j<sizeof($arry_of_courses);$j++){

    //   $var=$arry_of_courses[$j];

    //   //echo $_GET['$var'];

    //   if(isset($_GET['$var'])){

    //     $_SESSION['courseID']=$_GET['$var'];

    //     echo $_SESSION['courseID'];

    //     header("location:markAttendance.php");

    //   }

    // }

?>





<html>

    <head>

      <!--Import Google Icon Font-->

      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->

      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>



      <!--Let browser know website is optimized for mobile-->

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>





      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">



  <!-- Compiled and minified JavaScript -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>



      <!--Import jQuery before materialize.js-->

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

      <script type="text/javascript" src="js/materialize.min.js"></script>

  </head>



    <body>



      

<nav style="background-color: #540c94">

  <div class="nav-wrapper">

    <a href="#!" class="brand-logo">ATTENDANCE MANAGMENT SYSTEM</a>

    <ul class="right hide-on-med-and-down">

      <li><a href="instructor1.php">Profile</a></li>
      <li><a href="add_attendance.php">Add Attendance</a></li>
      <li><a href="view_all_attendance.php">View Attendance</a></li>
      <li><a href="update.php">Update Attendance</a></li>

      

      <!-- Dropdown Trigger -->

      

    </ul>

  </div>

</nav>







<?php

   echo "<form action='update_attendance.php' method='GET'>";

    for($j=0; $j<sizeof($arry_of_courses);$j++){

      $var=$arry_of_courses[$j];

    echo "<div class='row'><input type='submit' class='waves-effect waves-light btn' value='$var' name='course'></div>";

    }

    echo "</form>";        

?>

  </body>

</html>