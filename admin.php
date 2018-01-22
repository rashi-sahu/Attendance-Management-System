<?php
  session_start();
  include_once('class_admin.php');
    $conn=mysqli_connect("localhost","root","","attendance") or die;

  $fla=0;

  if(isset($_POST['xreg'])){
    $name=$_POST['xname'];
    $email=$_POST['xemail'];
    $mobile=$_POST['xmob'];
    $password=$_POST['xpass'];
  

    $qry="SELECT * from add_admin where amobile='$mobile' or aemail='$email'";
    $res=mysqli_query($conn,$qry) or die("not fire1");
    if (mysqli_affected_rows($conn)>=1){
      $xlogm="<p style='color:red;'>User Already Registered</p>";
    }
    else{
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo '<script language="javascript">';
            echo 'alert("Email Format is not valid")';
            echo '</script>';
       
      }
    else{

      if(preg_match('/^\d{10}$/',$mobile)){
      $qry="INSERT into add_admin VALUES('$name','$email','$mobile','$password')";
     // header("Location:admin.php");
      header("Refresh:0");
      $result=mysqli_query($conn,$qry) or die;
      if($result){
        $xlogm="<p style='color:green;''>Registration Successfull</p>";
      }
    }

    else{
      echo '<script language="javascript">';
            echo 'alert("Enter 10 digit mobile number")';
            echo '</script>';
    }



    }
    }
  }

  if (isset($_POST['xlog'])){
    $mobile=$_POST['xmob'];
    $password=$_POST['xpass'];

    $object = new admin();
    $object->admin_login($mobile , $password);
    
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
    <a href="#!" class="brand-logo">ATTENDANCE MANAGEMENT SYSTEM</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="attendance.php">Home</a></li>
      <li><a href="admin.php">Admin</a></li>
      <li><a href="instructor.php">Instructor</a></li>
      <li><a href="student.php">Student</a></li>
      <!-- Dropdown Trigger -->
      
    </ul>
  </div>
</nav>


<p id="date" align="right"></p>
<div class="container" style="margin-top:50px;">
  <div class="row">
  <div class="col l1"></div>
  <div class="col l5" style="margin-top:10px;">
    <h4>Admin Login</h4>
    
    <table class="table table-responsive">
      <form name="form1" action="" method="post" onsubmit="funValidate1()">
        <tr><td><label>Mobile</label></td>
        <td><input type="text" name="xmob" value="<?php if(isset($mobile) and isset($_POST['xlog']) ) echo $mobile ?>" ></td></tr>
        <tr><td><label>Password</label></td>
        <td><input type="password" name="xpass" value="<?php if(isset($password) and isset($_POST['xlog'])) echo $password ?>"></td></tr>
        <tr><td></td><td><button class = "btn btn-primary" type="submit" name="xlog" onMouseover("this.style.backgroundColor='red';return true;" )>Login</button></td></tr>
      </form>
    </table>
  </div>
  <div class="col l5"style="margin-top:10px;border-left:2px solid black;">
    <h4>Sign Up</h4>
    <table class="table table-responsive">
      <?php if(!empty($xlogm)) echo $xlogm;
      ?>

      <form name="form2" action="" method="post" onsubmit="return funValidate2()">
        <tr><td><label>Name</label></td>
          <td><input type="text" name="xname" value="<?php if(isset($name)and isset($_POST['xreg']) ) echo $name ?>"></td></tr>
        <tr><td><label>E-Mail</label></td>
          <td><input type="text" name="xemail" value="<?php if(isset($email) and isset($_POST['xreg'])) echo $email ?>"></td></tr>
        <tr><td><label>Mobile</label></td>
          <td><input type="text" name="xmob" value="<?php if(isset($mobile) and isset($_POST['xreg']) ) echo $mobile ?>"></td></tr>
        <tr><td><label>Password</label></td>
          <td><input type="password" name="xpass" value="<?php if(isset($password) and isset($_POST['xreg'])) echo $password ?>"></td></tr>
        <tr><td></td><td><button class = "btn btn-primary"  type="submit" name="xreg">Register Me</button></td></tr>
      </form>
    </table>
  </div>
  <div class="col l1"></div>
</div>
</div>


<script type="">
    function funValidate2(){
      var x=document.forms["form2"]["xname"].value;
      var y=document.forms["form2"]["xemail"].value;
      var w=document.forms["form2"]["xmob"].value;
      var z=document.forms["form2"]["xpass"].value;

      if (x=="") {
        alert("Name must be filled out");
        return false;
      }
      else if (y=="") {
        alert("Email must be filled out");
        return false;
      }
      else if (w=="") {
        alert("Mobile must be filled out");
        return false;
      }
      else if (z=="") {
        alert("Passoword must be filled out");
        return false;
      }
      return;
    }

  </script>
</body>
</html>






























  