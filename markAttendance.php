
<?php

 session_start();
 include_once('class_instructor.php');
  $conn=mysqli_connect("localhost","root","","attendance") or die;

if(!isset($_SESSION['login_inst']) || $_SESSION['login_inst']==false){

    header("location:instructor.php");

  }

  $var= $_GET['course'];

  $object = new instructor();

  $object->inst_add_attendance($conn,$var);


?>





<html>

    <head>

 </head>

    <style>


body{background-image: url("back7.jpg") ;

 height: 100%; 


    background-repeat: no-repeat;

    background-size: cover;}

.wrapper{

  

    margin: 0 auto;

}

header h1{list-style-type:none;

padding:0;margin-left:95px;

color:white;

float: left}

header table{width: 100%;

border:none;

background-color:#540c94  }

header li a:hover{

background-color:gray;}

header ul{

list-style-type:none;

padding:0;margin-right:95px;}

header li a{

float:left;}

header li a{

  color:white;

  padding:10px;

  text-align:center;

  

  font-size:15px;

  text-decoration:none;

}



    

</style>

<body>

<header>

<div class="wrapper">

<table >

<tr>

<td width="50%"><h1>

Welcome Instructor

</h1></td>

<td width="50%"><ul>

  

  

      <li><a href="instructor1.php">Profile</a></li>
      <li><a href="add_attendance.php">Add Attendance</a></li>
      <li><a href="view_all_attendance.php">View Attendance</a></li>
      <li><a href="update.php">Update Attendance</a></li>

  

  

   </ul>

   </td>

   </tr>

   </table>

   </div>

</header>

    

    

 

        <form method="post" >

          <table class="striped" style="margin-top: 50px;" width=100% border="1px" >

                  <thead>

                    <tr align="center">

                        <th data-field="id">Name</th>

                        <th data-field="roll">Roll No</th>

                        <th data-field="Attenadnce">Present</th>

                        <th data-field="Attenadnce">Absent</th>

                    </tr>

                  </thead>



                  <tbody>

                    <?php

                    $a=$_GET['course'];

                      $qry1 = "SELECT * FROM addStudent WHERE Scourses='$a' ";

                      $qry2= mysqli_query($conn,$qry1);

                      while($result=mysqli_fetch_array($qry2)){

                        $x=$result['Sname'];

                        $y=$result['Sroll_no'];



                        $z="<p><input name='$y' value='1' type='radio' checked required/>

                            <label for='test1'>P</label></p>";

                        $w="<p><input name='$y' value='0' type='radio' required/>

                            <label for='test1'>A</label></p>";

                        echo "<tr align='center'><td>$x</td><td>$y</td><td>$z</td><td>$w</td></tr>";

                      }

                      ?>

                  </tbody>

              </table>



          <input type="submit" name="xsave" value="Mark Attendance" style="margin-top:50px; margin-left:500px;" >

                

          </form> 

</body>

</html>