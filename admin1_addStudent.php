<?php

  session_start();

  include_once("class_admin.php");

    $conn=mysqli_connect("localhost","root","","attendance") or die;



  if(!isset($_SESSION['login']) || $_SESSION['login']==false){

    header("location:admin.php");

  }



  if(isset($_POST['Sreg'])){

    $name=$_POST['Sname'];

    $email=$_POST['Semail'];

    $mobile=$_POST['Smob'];

    $date=$_POST['Sdate'];

    $gender=$_POST['Sgen'];

    $password=$_POST['Spass'];

    $roll=$_POST['Sroll'];

    $semester=$_POST['Ssem'];

    $guard_name=$_POST['Sguard1'];

    $guard_mobile=$_POST['Sguard2'];

    $guard_email=$_POST['Sguard3'];

    $Scourses= "";

    

    

    



    //$qry="SELECT * from addInstructor where mobile='$mobile'";

    //$res=mysqli_query($conn,$qry) or die("not fire1");

    

    

      $object = new admin();

      $object->admin_add_student($conn,$name,$email,$mobile,$roll,$guard_name,$guard_email,$guard_mobile,$password,$date,$semester,$gender,$Scourses);

      

  

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







<div class="col-lg-5"style="margin-top:10px;border-left:2px solid black;">
    <div class="row">
    <div class="col l2"></div>
    <h4>Sign Up</h4>
    <div class="col l2"></div>
    <div class="col l10">

    <table class="table table-responsive">

      <form name="form2" action="" method="post" action="#" onsubmit="return funValidate1()">

        <tr><td>Name</td>

          <td><input type="text" name="Sname"></td></tr>

        <tr><td>E-Mail</td>

          <td><input type="text" name="Semail"></td></tr>

        <tr><td>Mobile</td>

          <td><input type="int" name="Smob"></td></tr>

        <tr><td>Password</td>

          <td><input type="password" name="Spass"></td></tr>

          <tr><td>Date Of Birth</td>

          <td><input type="date" class="datepicker" name="Sdate"></td></tr>

        <tr><td>Gardian's Name</td>

          <td><input type="text" name="Sguard1"></td></tr>

        <tr><td>Gardian's Mobile</td>

          <td><input type="int" name="Sguard2"></td></tr>

        <tr><td>Gaurdian's E-Mail</td>

          <td><input type="text" name="Sguard3"></td></tr>

          <tr><td>Roll No</td>

          <td><input type="text" name="Sroll"></td></tr>

          <tr><td>Semester</td>

          <td><input type="int" name="Ssem"></td></tr>

          <tr><td>Gender</td>

          <td><p>

      <input name="Sgen" type="radio" id="test1" value="Male"/>

      <label for="test1">Male</label>

    </p>

    <p>

      <input name="Sgen" type="radio" id="test2" value="Female"/>

      <label for="test2">Female</label>

    </p></td></tr>

        <tr><td></td><td><button class = "btn btn-primary"  type="submit" name="Sreg">Register Me</button></td></tr>

      </form>

    </table>

</div>
  </div>



  <script type="">

    function funValidate1(){

      var a=document.forms["form2"]["Sname"].value;

      var b=document.forms["form2"]["Semail"].value;

      var c=document.forms["form2"]["Smob"].value;

      var d=document.forms["form2"]["Sroll"].value;

      var e=document.forms["form2"]["Spass"].value;

      var f=document.forms["form2"]["Sgen"].value;

      

      



      if (a=="") {

        alert("Name must be filled out");

        return false;

      }

      else if (b=="") {

        alert("Email must be filled out");

        return false;

      }

      else if (c=="") {

        alert("Mobile must be filled out");

        return false;

      }

      else if (d=="") {

        alert("Roll Number must be filled out");

        return false;

      }

      else if (e=="") {

        alert("Password must be filled out");

        return false;

      }

      else if (f=="") {

        alert("Gender must be filled out");

        return false;

      }

     


      return;

    }

  </script>



    </body>



    



</html>







   