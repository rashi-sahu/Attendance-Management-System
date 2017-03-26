

<?php

  session_start();
  $conn=mysqli_connect("localhost","root","","attendance") or die;





  if(!isset($_SESSION['login_stud']) || $_SESSION['login_stud']==false){

    header("location:admin.php");

  }



  

  

  if(isset($_POST['Ssub'])){





      



    $newMobile=$_SESSION['mobile'];

    $qry="SELECT * from addStudent where Smobile='$newMobile'";

    $res=mysqli_query($conn,$qry) or die("not fire1");

    $result1 = mysqli_num_rows($res);

    $courses1 = $_POST['xcourses1'];

     if(sizeof($courses1)!=0) {
    if($result1!=0 ){




      

      
      $newName=$_SESSION['name'];

      $newEmail=$_SESSION['email'];

      

      $newDate= $_SESSION['date'];

      $newGender= $_SESSION['gender'];

      $newRoll= $_SESSION['roll'];

      $newPassword= $_SESSION['password'];

      $newGuard_name= $_SESSION['guard_name'];

      $newGuard_email= $_SESSION['guard_email'];

      $newGuard_mobile= $_SESSION['guard_mobile'];

      $newSemester=$_SESSION['semester'];





      

      $d1 = "delete from addStudent where Smobile = '$newMobile'";

      $d2= mysqli_query($conn,$d1) or die("Error in delete");

      //$qry1="UPDATE addStudent SET Scourses='$courses1' WHERE Smobile='$mob1'";

      //$result2=mysqli_query($conn,$qry1) or die;





      //$courses1="";

      //foreach ($_POST['xcourses1'] as $selectedOption)

       // $courses1=$courses1.$selectedOption.",";



     //  $courses1 = $_POST['xcourses1'];

      for($i=0; $i<sizeof($courses1);$i++){
       



          //echo "Loop Running \n";



          $sql1="INSERT into addStudent VALUES('$newName','$newEmail','$newMobile','$newRoll','$newGuard_name','$newGuard_email','$newGuard_mobile','$newPassword','$newDate','$newSemester','$newGender','$courses1[$i]')";

          $sql2=mysqli_query($conn,$sql1) or die("\nqry1 error");

          //echo "1\n";



          $sql3="ALTER TABLE ".$courses1[$i]." ADD $newRoll VARCHAR(40) after xdate";

          //echo "2\n";

          //echo $sql3;

          $sql2=mysqli_query($conn,$sql3) or die("\nqry2 error");

    }


  

  // else{

  //   echo '<script language="javascript">';
  //              echo 'alert("Select atleast one course")';
  //              echo '</script>';
  // }


  }


}

else{
  echo '<script language="javascript">';
               echo 'alert("Select atleast one course")';
               echo '</script>';
}
}


?>





<html>

    <head>



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

float:right;}

header li a{

  color:white;

  padding:10px;

  text-align:center;

  

  font-size:15px;

  text-decoration:none;

}



    

</style>

       

    </head>



    <body>





    <header>

<div class="wrapper">

<table >

<tr>

<td><h1>

Welcome Student

</h1></td>

<td><ul>

  

  

      
      <li><a href="student_view_attendance.php">View Attendance</a></li>
      <li><a href="student1.php">Profile</a></li>

  

  

   </ul>

   </td>

   </tr>

   </table>

   </div>

</header>



      



<div class="container" style="margin-top:150px; margin-left: 150px;">

  <div class="col-lg-1"></div>

  <div class="col-lg-5">

    <table class="table" border="1px">

      <tr><td style="width: 250px">Name</td><td style="width: 250px"><?php echo $_SESSION['name'] ?></td></tr>

      <tr><td style="width: 250px">Email</td><td style="width: 250px"><?php echo $_SESSION['email'] ?></td></tr>

      <tr><td style="width: 250px">Mobile</td><td style="width: 250px"><?php echo $_SESSION['mobile'] ?></td></tr>

      <tr><td style="width: 250px">Date Of Birth</td><td style="width: 250px"><?php echo $_SESSION['date'] ?></td></tr>

      <tr><td style="width: 250px">Gender</td><td style="width: 250px"><?php echo $_SESSION['gender'] ?></td></tr>

      <tr><td style="width: 250px">ID</td><td style="width: 250px"><?php echo $_SESSION['roll'] ?></td></tr>





    </table>

  </div>

  <div class="col-lg-5" style="margin-top: 50px;">

    <a href="logout3.php">Logout</a>

  </div>

  <div class="col-lg-1"></div>



</div>



<form method="POST">



        <select name="xcourses1[ ]" multiple="multiple" style="margin-top: 50px; margin-left: 150px;">

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

      





        <input type="submit" value="SUBMIT" name="Ssub">



</form>







    </body>



</html>







   