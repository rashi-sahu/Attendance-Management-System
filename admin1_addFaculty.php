<?php

  session_start();

  include_once('class_admin.php');

   $conn=mysqli_connect("localhost","root","","attendance") or die;



  if(!isset($_SESSION['login']) || $_SESSION['login']==false){

    header("location:admin.php");

  }

    if(isset($_POST['ireg'])){

      $name=$_POST['iname'];

      $email=$_POST['iemail'];

      $mobile=$_POST['imob'];

      $id=$_POST['iid'];

      $password=$_POST['ipass'];

      $date=$_POST['idate'];;

      $gender=$_POST['igen'];

      $courses = $_POST['xcourses'];

      $temp=array();

      for($i=0;$i<sizeof($courses); $i++){

        array_push($temp, $courses[$i]);

      }

      //$courses="";

    //foreach ($_POST['xcourses'] as $selectedOption)

       // $courses=$courses.$selectedOption.",";



      $object = new admin();

      $object->admin_add_instructor($name, $email, $mobile, $date, $gender, $id, $password, $temp);



      



      

        

      

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





      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">



  <!-- Compiled and minified JavaScript -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>



      <!--Import jQuery before materialize.js-->

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

      <script type="text/javascript" src="js/materialize.min.js"></script>



<script>

$(document).ready(function() {

    $('select').material_select();

  });



$('.datepicker').pickadate({

    selectMonths: true, // Creates a dropdown to control month

    selectYears: 15 // Creates a dropdown of 15 years to control year

  });

 </script>

      



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







  <h4><font color="red">All Fields are Required </font></h4>

   <form name="form2" action="" method="post" onsubmit="return funValidate2()">
    <div class="row">
    <div class="col l2"></div>
    <div class="col l6">
    <table >

    <tr><td>Name</td><td><input type="text" name="iname"></td></tr>

    <tr><td>Email</td><td><input type="text" name="iemail"></td></tr>

    <tr><td>Mobile</td><td><input type="text" name="imob"></td></tr>

    <tr><td>ID</td><td><input type="text" name="iid"></td></tr>

    <tr><td>Password</td><td><input type="password" name="ipass"></td></tr>





    <tr><td>Date Of Birth</td>

          <td><input type="date" class="datepicker" name="idate"></td></tr>



        <tr><td>Gender</td>

          <td><p>

      <input name="igen" type="radio" id="test1" value="Male"/>

      <label for="test1">Male</label>

    </p>

    <p>

      <input name="igen" type="radio" id="test2" value="Female"/>

      <label for="test2">Female</label>

    </p></td></tr>

    <tr>

      <td>



      <div class="input-field col s12">

        <select name="xcourses[ ]" multiple required="required">

           <?php

        $qry1 = "select * from add_course";

        $res= mysqli_query($conn,$qry1);

        while($arr=mysqli_fetch_array($res)){

          $var1=$arr['Cid'];

          $var2=$arr['Ccourse_name'];

          echo "<option value='".$var1."'>".$var2."</option>";

        }

        

      ?>

        </select>

        </div>

        

      </td>

    </tr>

    <tr><td><input type="submit" value="SUBMIT" name="ireg"></td></tr>

    </table>
    </div>

  </form>







  <script type="">

    function funValidate2(){

      var a=document.forms["form2"]["iname"].value;

      var b=document.forms["form2"]["iemail"].value;

      var c=document.forms["form2"]["imob"].value;

      var d=document.forms["form2"]["iid"].value;

      var e=document.forms["form2"]["ipass"].value;

      var f=document.forms["form2"]["idate"].value;

      var g=document.forms["form2"]["igen"].value;

      

      



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

        alert("ID must be filled out");

        return false;

      }

      else if (e=="") {

        alert("Password must be filled out");

        return false;

      }

      else if (f=="") {

        alert("Date of Birth must be filled out");

        return false;

      }

      else if (g=="") {

        alert("gender must be filled out");

        return false;

      }


      return;

    }

  </script>

</body>


</html>