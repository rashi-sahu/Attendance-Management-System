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

    <style>


body{background-image: url("back7.jpg") ;

 height: 100%; 


    background-repeat: no-repeat;

    background-size: cover;}

.nav-wrapper{

  

    margin: 0 auto;

}



nav h1{list-style-type:none;

padding:0;margin-left:95px;

color:white;

float: left}

nav table{width: 100%;

border:none;

background-color:#540c94  }

table{width:100%; padding-bottom:5px;}

nav li a:hover{

background-color:gray;}

nav ul{

list-style-type:none;

padding:0;margin-right:95px;}

nav li a{

float:left;}

nav li a{

  color:white;

  padding:10px;

  text-align:center;

  

  font-size:15px;

  text-decoration:none;

}



    

</style>

       



      <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  

      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>




      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

      <script type="text/javascript" src="js/materialize.min.js"></script>




<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script> -->




     





       

    </head>



    <body>

      



     
<nav style="background-color: #540c94">

  <div class="nav-wrapper">
  <table >

<tr>

<td width="25%"><h1>

Welcome Admin

</h1></td>

<td width="75%">

  

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
    </td>

   </tr>

   </table>

  </div>

</nav>







<div class="col-lg-5" style="margin-top:10px; margin-left: 400px;margin-right: 330px">
    <div class="row">
    <div class="col l2"></div>
    <h4>Sign Up</h4>
    <div class="col l2"></div>
    <div class="col l10">

    <table class="table-responsive" cellpadding="8">

      <form name="form2" action="" method="post" action="#" onsubmit="return funValidate1()">

        <tr><td>Name</td>

          <td><input type="text" name="Sname" value="<?php if(isset($name)) echo $name ?>"></td></tr>

        <tr><td>E-Mail</td>

          <td><input type="text" name="Semail" value="<?php if(isset($email)) echo $email ?>"></td></tr>

        <tr><td>Mobile</td>

          <td><input type="int" name="Smob" value="<?php if(isset($mobile)) echo $mobile ?>"></td></tr>

        <tr><td>Password</td>

          <td><input type="password" name="Spass" value="<?php if(isset($password)) echo $password ?>"></td></tr>

          <tr><td>Date Of Birth</td>

          <td><input type="date" class="datepicker" name="Sdate" value="<?php if(isset($date)) echo $date ?>"></td></tr>

        <tr><td>Gardian's Name</td>

          <td><input type="text" name="Sguard1" value="<?php if(isset($guard_name)) echo $guard_name ?>"></td></tr>

        <tr><td>Gardian's Mobile</td>

          <td><input type="int" name="Sguard2" value="<?php if(isset($guard_mobile)) echo $guard_mobile ?>"></td></tr>

        <tr><td>Gaurdian's E-Mail</td>

          <td><input type="text" name="Sguard3" value="<?php if(isset($guard_email)) echo $guard_email ?>"></td></tr>

          <tr><td>Roll No</td>

          <td><input type="text" name="Sroll" value="<?php if(isset($roll)) echo $roll ?>"></td></tr>

          <tr><td>Semester</td>

          <td>
            <!-- <div class="input-field col s12"> -->
    <select name="Ssem">
      
      <option value="1" >1</option>
      <option value="2" >2</option>
      <option value="3" >3</option>
      <option value="4" >4</option>
      <option value="5" >5</option>
      <option value="6" >6</option>
      <option value="7" >7</option>
      <option value="8" >8</option>
     
    </select>
    
  <!-- </div> -->
          </td></tr>

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







   