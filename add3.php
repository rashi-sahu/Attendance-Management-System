<?php
  session_start();
  $conn=mysqli_connect("localhost","root","","attendance") or die;


$mob2=$_SESSION['mobile'];
echo $mob2;
$sql="SELECT * FROM addInstructor WHERE Imobile='$mob2'";
$res= mysqli_query($conn,$sql) or die("qry not fired!");
  echo "Hi there";
  //if (mysqli_affected_rows($conn)>=1){
    echo "\nHi Rashi\n";
    while($result1=mysqli_fetch_array($res)){
    $course_name=$result1[7];
      echo $course_name;

    }

//}

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
    <a href="#!" class="brand-logo">ATTENADANCE MANAGMENT SYSTEM</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="instructor1.php">Profile</a></li>
      <li><a href="add_attendance.php">Add Attendance</a></li>
      <li><a href="instructor.php">View Attendance</a></li>
      
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>


<form method="POST">
<div class="input-field col s12">
        <select name="selected_course">
           <?php
        $qry1 = "SELECT * FROM add_course WHERE Ccourse_name='' ";
        $res= mysqli_query($conn,$qry1);
        while($arr=mysqli_fetch_array($res)){
          $var1=$arr['Cid'];
          $var2=$arr['Ccourse_name'];
          echo "<option value='".$var1."'>".$var2."</option>";
        }
        
      ?>
        </select>
        </div>

        <input type="submit" value="Enter" name="course_select">

        </form>


<table class="striped" style="margin-top: 50px;">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Email</th>
              <th data-field="price">Mobile</th>
              <th data-field="price">Gender</th>
              <th data-field="name">ID</th>
              <th data-field="Attenadnce">Attendance</th>
          </tr>
        </thead>

        <tbody>
          <?php

if(isset($_POST['course_select'])){

$course3=$_POST['selected_course'];
$qry1 = "SELECT * FROM addStudent WHERE Scourses='$course3' ";
$qry2= mysqli_query($conn,$qry1);
while($result=mysqli_fetch_array($qry2)){
  
?>

<tr>
<td><?php echo $result['Sname'];?></td>
<td><?php echo $result['Semail'];?></td>
<td><?php echo $result['Smobile'];?></td>
<td><?php echo $result['Sgender'];?></td>
<td><?php echo $result['Sroll_no'];?></td>
<td> <div class="switch">
    <label>
      Off
      <input type="checkbox">
      <span class="lever"></span>
      On
    </label>
  </div></td>
</tr>


<?php }
 }
 ?>
        </tbody>
      </table>


      

    </body>

  

</html>