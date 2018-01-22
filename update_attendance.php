<?php

session_start();
  include_once('class_instructor.php');

   $conn=mysqli_connect("localhost","root","","attendance") or die;

 if(!isset($_SESSION['login_inst']) || $_SESSION['login_inst']==false){

    header("location:instructor.php");

  }

$var= $_GET['course'];


$sql=mysqli_query($conn,"select * from addStudent where Scourses='$var'");

 $stud=array();

 $chk=array();

 $name=array();

?>

<!doctype html>

<html>



<style>





 

body{background-image: url("back7.jpg") ;

 height: 100%; 



    /* Center and scale the image nicely */

    

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

#button {
    margin-top: 400px;
}
</style>

<body>



<header>

<div class="wrapper">

<table >

<tr>

<td width="55%"><h1>

WELCOME INSTRUCTOR
</h1></td>

<td width="45%"><ul>

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

<form method="post">

<h4>Enter date in format day-month-year eg. 25-02-2017</h4>

<p>Date: <input type="text"  name="date"></p>

<table width="100%" border="1px">

<tr><th>S.no</th>

<th>Roll no.</th>

<th>Name</th>

<th>Absent</th>

<th>Present</th></tr>

<?php

$i=1;

while($row=mysqli_fetch_array($sql))

{

	$stud[$i]=$row['Sroll_no'];

	$name[$i]=$row['Sname'];

	?>

<tr align="center" width="100%">

<td><input type="checkbox"  name="chk<?php echo $i ?>" /></td>

<td><?php echo $row['Sroll_no']; ?></td>

<td><?php echo $row['Sname']; ?></td>

<td><input type="radio"  name="value<?php echo $i ?>" value="0"/></td>

<td><input type="radio"  name="value<?php echo $i ?>" value="1" /></td>



</tr><br/>

<?php

$i=$i+1;

}
?>

</table>

<input type="submit" value="Update Attendance" name="submitattend" style="margin-top:50px; margin-left:500px;"/>

</form>

</body>

</html>

<?php

$c=count($stud);

if(isset($_POST['submitattend']))

{

	$date=$_POST['date'];


    for($i=1;$i<=$c;$i++)

	{

		if(isset($_POST['chk'.$i])!='')

		{

	
			$value=$_POST['value'.$i];

			
			$c1=$stud[$i];

$object = new instructor();

    $object->inst_update_attendance($conn,$var, $c1,$value,$date);


		}


	}

}

?>





