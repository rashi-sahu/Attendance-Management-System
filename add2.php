<?php
  session_start();
    $conn=mysqli_connect("localhost","root","","attendance") or die;
    if(isset($_POST['xsub'])){
      $name=$_POST['xname'];
      $email=$_POST['xemail'];
      $mobile=$_POST['xmob'];
      $id=$_POST['xid'];
      $password=$_POST['xpass'];
      $date="10.10.2010";
      $gender="Female";
      $courses="";//"CS211";
      foreach ($_POST['xcourses'] as $selectedOption)
        $courses=$courses.$selectedOption.",";

      
        
      $qry="SELECT * from addInstructor where Imobile='$mobile'";
      $res=mysqli_query($conn,$qry) or die("not fire1");

      if (mysqli_affected_rows($conn)>=1){
        $xlogm="<p style='color:red;'>User Already Registered</p>";
      }

      else{
        $qry="INSERT into addInstructor VALUES('$name','$email','$mobile','$date','$gender','$id','$password','$courses')";
        $result=mysqli_query($conn,$qry) or die;
        if($result){
          $xlogm="<p style='color:green;'>Registration Successfull</p>";
         
        }
      }
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

<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">ATTENADNCE</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="admin1.php">Profile</a></li>
      <li><a href="admin1_addFaculty.php">Add Instructor</a></li>
      <li><a href="instructor_delete.php">Delete Instructor</a></li>
      <li><a href="view_instructor.php">View Instructor</a></li>
      <li><a href="admin1_addStudent.php">Add Student</a></li>
      <li><a href="sass.html">Delete Student</a></li>
      <li><a href="sass.html">View Student</a></li>
      <li><a href="add_courses.php">Add Courses</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>




  <form method="POST">
    <table >
    <tr><td>Name</td><td><input type="text" name="iname"></td></tr>
    <tr><td>Email</td><td><input type="text" name="iemail"></td></tr>
    <tr><td>Mobile</td><td><input type="text" name="imob"></td></tr>
    <tr><td>ID</td><td><input type="text" name="iid"></td></tr>
    <tr><td>Password</td><td><input type="password" name="ipass"></td></tr>


    <tr><td><label>Date Of Birth</label></td>
          <td><input type="date" class="datepicker" name="idate"></td></tr>

        <tr><td><label>Gender</label></td>
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
        <select name="xcourses[ ]" multiple>
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
  </form>
</body>




</html>