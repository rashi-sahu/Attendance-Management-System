<?php

include_once("class_admin.php");

  session_start();

  $conn=mysqli_connect("localhost","root","","attendance") or die;

if(!isset($_SESSION['login']) || $_SESSION['login']==false){
    header("location:admin.php");
  }



  $y = $_SESSION['d'];

  $sel_item = "SELECT * from addInstructor where Iid='$y'";

  $done_item = mysqli_query($conn,$sel_item);

  if (mysqli_affected_rows($conn)>=1){

    $get_item = mysqli_fetch_array($done_item) or die ("no fire");

  }

  

  if ($get_item['Igender']=='Male') $flag=0;

  else $flag=1;



  



  if(isset($_POST['Ireg'])){

    $name=$_POST['Iname'];

    $email=$_POST['Iemail'];

    $mobile=$_POST['Imob'];

    $date=$_POST['Idate'];

    $gender=$_POST['Igen'];

    $id=$_POST['Iid'];

    $password=$_POST['Ipass'];

    

    



    $update=new admin;

    $update->update_instructor_profile($conn,$y,$name, $email, $mobile, $date, $gender,$password);

  //unset($_SESSION['d']);



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









      







       

    </head>



    <body>

     




<nav style="background-color: #540c94">

  <div class="nav-wrapper">

    <a href="#!" class="brand-logo">ATTENADNCE</a>

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

    <h4>Sign Up</h4>

    <table class="table table-responsive">

      <form name="form2" action="" method="post" action="#" >

        <tr><td><label>Name</label></td>

          <td><input type="text" name="Iname" value="<?php echo $get_item['Iname'];?>"></td></tr>

        <tr><td><label>E-Mail</label></td>

          <td><input type="text" name="Iemail" value="<?php echo $get_item['Iemail'];?>"></td></tr>

        <tr><td><label>Mobile</label></td>

          <td><input type="text" name="Imob" value="<?php echo $get_item['Imobile'];?>"></td></tr>

          <!-- <tr><td><label>ID</label></td>

          <td><input type="text" name="Imob" value="<?php echo $get_item['Iid'];?>"></td></tr>
 -->
       <!--  <tr><td><label>Password</label></td>

          <td><input type="password" name="Ipass" value="<?php echo $get_item['Ipassword'];?>"></td></tr> -->

        <tr><td><label>Date Of Birth</label></td>

          <td><input type="date" class="datepicker" name="Idate" value="<?php echo $get_item['Idate'];?>"></td></tr>

        <tr><td><label>Gender</label></td>

          <td>

           

    

    

    <p>

      <input class="with-gap" name="Igen" type="radio" id="test3" value="Male" <?php echo($flag==0?'checked="checked"':''); ?>/>

      <label for="test3">Male</label>

    </p>

      <p>

        <input class="with-gap" name="Igen" type="radio" id="test4" value="Female" <?php echo($flag==1?'checked="checked"':''); ?> />

        <label for="test4">Female</label>

    </p>

  

    </td></tr>



    

    

        <tr><td></td><td><button class = "btn btn-primary"  type="submit" name="Ireg">Register Me</button></td></tr>

      </form>

    </table>

  </div>



    </body>



    



</html>