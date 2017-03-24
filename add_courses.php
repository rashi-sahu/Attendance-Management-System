<?php

  include_once("class_admin.php");

  session_start();

    $conn=mysqli_connect("localhost","root","","attendance") or die;



  if(!isset($_SESSION['login']) || $_SESSION['login']==false){

    header("location:admin.php");

  }

  

  if(isset($_POST['Csub'])){

    $course=$_POST['Ccourse'];

    $id=$_POST['Cid'];

   $add = new admin();

  $add->admin_add_course($conn,$course,$id);

    

   

  

  }





  if(isset($_POST['Cdel'])){

  $iid=$_POST['Ciid'];

  $delete = new admin();

  $delete->admin_delete_course($conn,$iid);



 

  

  }



  $view=new admin;



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





<div class="row">



<div class="col l6"style="margin-top:10px;border-left:2px solid black;">

    <h4>Add Course</h4>

    <table class="table table-responsive">

      <form name="form2" action="" method="post" action="#" >

        <tr><td><label>Course Name</label></td>

          <td><input type="text" name="Ccourse"></td></tr>

        <tr><td><label>COurse Id</label></td>

          <td><input type="text" name="Cid"></td></tr>

        

        <tr><td></td><td><button class = "btn btn-primary"  type="submit" name="Csub">Submit</button></td></tr>

      </form>

    </table>

  </div>



  <div class="col l6"style="margin-top:10px;border-left:2px solid black;">

    <h4>Delete Course</h4>

    <table class="table table-responsive">

      <form name="form2" action="" method="post" action="#" >

        

        <tr><td><label>Course Id</label></td>

          <td><input type="text" name="Ciid"></td></tr>

        

        <tr><td></td><td><button class = "btn btn-primary"  type="submit" name="Cdel">Delete</button></td></tr>

      </form>

    </table>

  </div>

</div>

<table class="striped"   style="margin-top:50px;">

        <thead>

          <tr>

              <th data-field="id">S.No.</th>

              <th data-field="id">Course Id</th>

              <th data-field="name">Course Name</th>

              

          </tr>

        </thead>



        <tbody>

         

        <?php 

        $view->admin_view_course($conn);



        ?>







        </tbody>

      </table>

            





    </body>



</html>

