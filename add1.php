
<?php
  session_start();
  $conn=mysqli_connect("localhost","root","","attendance") or die;
  

  if(isset($_POST['ireg'])){
    $name=$_POST['iname'];
    $email=$_POST['iemail'];
    $mobile=$_POST['imob'];
    $date=$_POST['idate'];
    $gender=$_POST['igen'];
    $id=$_POST['iid'];
    $password=$_POST['ipass'];
    $_SESSION['d']=$id;
    $check=$_POST['xvar'];
    var_dump($check);
    $courses="";
    foreach($_POST['xvar'] as $var){
      $courses=$courses.$var."+";
      echo $var;
    }
    echo $name;
    echo $courses;
    

    $qry="SELECT * from addInstructor where Imobile='$mobile'";
    $res=mysqli_query($conn,$qry) or die("not fire1");
    if (mysqli_affected_rows($conn)>=1){
      $xlogm="<p style='color:red;'>User Already Registered</p>";
    }
    else{
    
      $qry="INSERT into addInstructor VALUES('$name','$email','$mobile','$date','$gender','$id','$password','$courses')";
      $result=mysqli_query($conn,$qry) or die;
      if($result){
        $xlogm="<p style='color:green;''>Registration Successfull</p>";
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




     


       
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">ATTENADNCE </a>
    <ul class="right hide-on-med-and-down">
      <li><a href="admin1.php">Profile</a></li>
      <li><a href="admin1_addFaculty.php">Add Instructor</a></li>
      <li><a href="badges.html">Delete Instructor</a></li>
      <li><a href="badges.html">View Instructor</a></li>
      <li><a href="admin1_addStudent.php">Add Student</a></li>
      <li><a href="sass.html">Delete Student</a></li>
      <li><a href="sass.html">View Student</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>



<div class="col-lg-5"style="margin-top:10px;border-left:2px solid black;">
    <h4>Sign Up</h4>
    <table class="table table-responsive">
      <form name="form2" action="" method="post" action="#" >
        <tr><td><label>Name</label></td>
          <td><input type="text" name="iname"></td></tr>
        <tr><td><label>E-Mail</label></td>
          <td><input type="text" name="iemail"></td></tr>
        <tr><td><label>Mobile</label></td>
          <td><input type="int" name="imob"></td></tr>
        <tr><td><label>ID</label></td>
          <td><input type="text" name="iid"></td></tr>
        <tr><td><label>Password</label></td>
          <td><input type="password" name="ipass"></td></tr>
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

    <tr><td></td>
      <td>
      <div class="input-field col s12"> 
        <select name="xvar[ ]" multiple>
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
   </td> </tr>
        <tr><td></td><td><button class = "btn btn-primary"  type="submit" name="ireg">Register Me</button></td></tr>
      </form>
    </table>
  </div>

    </body>

    <script>
     $(document).ready(function() {
    $('select').material_select();
  });


     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
        

    </script>

</html>



   