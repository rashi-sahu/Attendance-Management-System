<?php



 session_start();
include_once('class_instructor.php');
  $conn=mysqli_connect("localhost","root","","attendance") or die;

if(!isset($_SESSION['login_inst']) || $_SESSION['login_inst']==false){

    header("location:instructor.php");

  }

  $var= $_GET['course'];

  $_SESSION['coursename']=$var;

  $sql="SELECT * FROM addStudent WHERE Scourses='$var'";

  $res= mysqli_query($conn,$sql) or die("qry not fired!");

  

  //if (mysqli_affected_rows($conn)>=1){

    $array_of_students = array();

    while($result1=mysqli_fetch_array($res)){

    $roll=$result1[3];

      //echo $roll;

      array_push($array_of_students, $roll);

    }

    //var_dump($array_of_students);

//echo $myArray[0];
    $inst_mob=$_SESSION['mobile'];
    $qry1 = "select * from addInstructor where Imobile='$inst_mob'";
    $qry2= mysqli_query($conn,$qry1) or die("not fire");
    while($result=mysqli_fetch_array($qry2)){
            
      $instructor_email=$result['Iemail'];
    }


 // echo $instructor_email;





  ?>







<!DOCTYPE html>

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





      <style type="text/css">

        .first{

          position: fixed;

        }



        .second{

          padding-left: 100px;

        }



 /*       .color{

  background-color: #545050;

}*/

      </style>







      <script type="text/javascript" src="jquery-3.1.1.min.js"></script>

  <script type="text/javascript" src="jquery/dist/jquery.table2excel.min.js"></script>



  <script type="text/javascript">

    

    $(document).ready(function(e){



      $("#myButton").click(function(e){



        $(".myTable").table2excel({



          name:"rashi",

          filename:"attendance",

          fileext:".xls"



        });



      });

    });





  </script>

  

</head>

<body>





<div class="navbar-fixed">



<nav class="color" style="background-color: #540c94">

  <div class="nav-wrapper">

   
<a href="#!" class="brand-logo">WELCOME INSTRUCTOR</a>
    <ul class="right hide-on-med-and-down">

      <li><a href="instructor1.php">Profile</a></li>
      <li><a href="add_attendance.php">Add Attendance</a></li>
      <li><a href="view_all_attendance.php">View Attendance</a></li>
      <li><a href="update.php">Update Attendance</a></li>

      

    </ul>

  </div>

</nav>

 </div>

    

 

          

          <table class="highlight myTable" style="margin-top:50px; width:100%; table-layout:fixed">

                  <thead>

                    

                    <tr>

                        <th style="width:  150px" class="first" data-field="id" >S.No.</th>

                        <th style="width: 250px" class="second" data-field="id" >Name</th>

                        <th style="width: 150px" data-field="roll">Roll No</th>



                        <?php

                        $qryy = "select * from $var";

            $qryy2= mysqli_query($conn,$qryy);

            $r=0;

            while($result1=mysqli_fetch_array($qryy2)){

              

            ?>

                        <th style="width: 150px" ><?php echo $result1['xdate'];?></th>



                        <?php 

                        $r++;

                        }?>



                        <th style="width: 150px" >Total Class</th>

                        <th style="width: 150px" data-field="attend">Attend Class</th>

                        <th style="width: 150px" data-field="attend">Total Absent</th>

                        <th style="width: 150px" data-field="percent">Percentage</th>

                        <th style="width: 150px" data-field="feedback">Feedback</th>

                    

                    </tr>



                    



                    

                  </thead>



                  <tbody>

                    <?php

                   

                      $qry1 = "SELECT * FROM addStudent WHERE Scourses='$var' ";

                      $qry2= mysqli_query($conn,$qry1);

                      $s_no=0;

                      while($result=mysqli_fetch_array($qry2)){

                        $s_no++;

                        $mail=$result['Semail'];

                        $x=$result['Sname'];

                        $y=$result['Sroll_no'];

                        //echo $y;

                        echo "<tr><td class='first' >$s_no</td>";

                        $array_of_variables=array();

                        $object1= new instructor();

          $array_of_variables=$object1->inst_view_attendance($conn,$x,$y,$qryy,$result1,$var,$array_of_variables);

                 $per=$array_of_variables[0];
                 $total_class=$array_of_variables[1];    
                 //echo $per;
                 //echo $total_class;

                  if(isset($_POST['Smail'])){

                    $object2 = new instructor();

          $object2->inst_sent_mail($conn,$per,$total_class,$var,$mail,$instructor_email);


                  }

              


              echo "</tr>";

                  }
?>

                  </tbody>

              </table>


<form method="post">
<button id ="myButton1" name="Smail" style="margin-top: 50px; margin-left: 600px;">Sent Mail</button>

</form>
<button id ="myButton" style="margin-top: 50px; margin-left: 510px;">Click Here to download Excel Sheet</button>

</body>

</html>