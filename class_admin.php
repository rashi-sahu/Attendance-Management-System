<?php 
   
	class admin {
      /* Member variables */
     
      private $name;
      private $email;
      private $mobile;
      private $password;
      
     
      // public function admin_setter($a,$b,$c,$d){
      //    $name= $a;
      //    $email=$b;
      //    $mobile=$c;
      //    $password=$d;
      // }
      
      // public function admin_getName(){
      //    return $name;
      // }
      
      // public function admin_getEmail(){
      //    return $email;
      // }
      
      // public function admin_getMobile(){
      //    return $mobile;
      // }

      // public function admin_getPassword(){
      //    return $password;
      // }

//-------------------------------------------------------------------------------------------------------------
      public function admin_login($mobile , $password){
           $conn=mysqli_connect("localhost","root","","attendance") or die;
         $qry="SELECT * from add_admin where amobile='$mobile' ";

         $res=mysqli_query($conn,$qry) or die("not fire1");
         if (mysqli_affected_rows($conn)>=1){
            $row=mysqli_fetch_array($res) or die("not fire2");
               $_SESSION['name']=$row[0];
               $_SESSION['email']=$row[1];
               $_SESSION['mobile']=$row[2];
               $_SESSION['password']=$row[3];
               $_SESSION['login']=true;
               if (strcmp($password, $_SESSION['password'])==0){
               header("location:admin1.php");
             }

             else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Credentital")';
            echo '</script>';
         }
    }
         else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Credentital")';
            echo '</script>';
         }

      }
      



//------------------------------------------------------------------------------------------------------------
      public function admin_add_instructor($name, $email, $mobile, $date, $gender, $id, $password, $courses){
           $conn=mysqli_connect("localhost","root","","attendance") or die;

           
           $date1=date("Y-m-d");
           $date2=date_create($date);
           $date4=date_format($date2,"Y-m-d");
           $date5=new DateTime($date4);
           //$date3=date_create($date1);
           $date3=new DateTime($date1);



         $qry="SELECT * from addInstructor where Imobile='$mobile' or Iemail='$email' or Iid='$id'";
         $res=mysqli_query($conn,$qry) or die("not fire1");

         if (mysqli_affected_rows($conn)>=1){
            echo '<script language="javascript">';
            echo 'alert("User Already Registered")';
            echo '</script>';
         }

         else{
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo '<script language="javascript">';
            echo 'alert("Email Format is not valid")';
            echo '</script>';
       
    }
         else{
          $d=date_diff($date3,$date5);
          $d1=$d->format("%R%a");
          $diff=(int)$d1;

          if(preg_match('/^\d{10}$/',$mobile ) and ($diff<0)){
           for($i=0;$i<sizeof($courses); $i++){
               $qry="INSERT into addInstructor VALUES('$name','$email','$mobile','$date','$gender','$id','$password','$courses[$i]')";
               $result=mysqli_query($conn,$qry) or die;
               $qry2="delete from add_course_delete where cid = '$courses[$i]'";
               $result2=mysqli_query($conn,$qry2) or die;
               if($result){
               echo '<script language="javascript">';
               echo 'alert("Registration Successful")';
               echo '</script>';

               header("Location:admin1_addFaculty.php");
               
               //header("Refresh:0");
               


            
               }
            }
          }
            else{
          
      echo '<script language="javascript">';
            echo 'alert("Enter 10 digit mobile number or vaild date of birth")';
            echo '</script>';
       
    }

        }
         }
      }

//--------------------------------------------------------------------------------------------------------------
      public function admin_delete_instructor($id){
           $conn=mysqli_connect("localhost","root","","attendance") or die;
           $array_of_courses=array();
           

           $d2="select * from addInstructor where Iid = '$id'";
           $result2=mysqli_query($conn,$d2) or die("1");
           while($result3=mysqli_fetch_array($result2)){
            $a=$result3['Icourse'];
            
            array_push($array_of_courses, $a);

           }

           print_r($array_of_courses);


           $array_of_courses1=array();
           for($i=0;$i<sizeof($array_of_courses); $i++){
              $d3="select * from add_course where Cid='$array_of_courses[$i]' ";
              $result4=mysqli_query($conn,$d3) or die("2");
           while($result5=mysqli_fetch_array($result4)){
            $b=$result5['Ccourse_name'];
            
            array_push($array_of_courses1, $b);

           }
         }

         print_r($array_of_courses1);




          for($i=0;$i<sizeof($array_of_courses); $i++){

            $qry7="INSERT into add_course_delete VALUES('$array_of_courses[$i]','$array_of_courses1[$i]')";
               $result7=mysqli_query($conn,$qry7) or die("3");

          }

              







         $d1 = "delete from addInstructor where Iid = '$id'";

         $result=mysqli_query($conn,$d1) or die("4");

         if (mysqli_affected_rows($conn)>=1){
            echo '<script language="javascript">';
            echo 'alert("Successfully Deleted")';
            echo '</script>';
         }
         else{
            echo '<script language="javascript">';
            echo 'alert("No Id is exist")';
            echo '</script>';
         }


      }

//---------------------------------------------------------------------------------------------------------------
      public function admin_view_instructor($conn, $myArray ,$var1){
        
          $qry1 = "select * from addInstructor where Icourse='$var1'";
          $qry2= mysqli_query($conn,$qry1) or die("not fire");
          $i=1;
          $var="";
          while($result=mysqli_fetch_array($qry2)){
              $i++;
              $mm=$i-1;
              $a=$result['Iname'];
              $b=$result['Iemail'];
              $c=$result['Imobile'];
              $d=$result['Idate'];
              $e=$result['Igender'];
              $f=$result['Iid'];
              //echo $a;
              $temp="<tr><td>$mm</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$f</td>";
              echo $temp;
              array_push($myArray, $f);
              $button="<td><input type='submit' value='Update' name='$i'></td></tr>";
              echo $button;
              //$temp=$temp+
              //echo $temp;
              //echo 1001;
              $var+=$temp;
           }
           return $myArray;
      }

//-----------------------------------------------------------------------------------------------------------
      public function admin_add_student($conn,$name,$email,$mobile,$roll,$guard_name,$guard_email,$guard_mobile,$password,$date,$semester,$gender,$Scourses){

         $qry="SELECT * from addStudent where Smobile='$mobile' or Semail='$email' or Sroll_no='$roll'";
         $res=mysqli_query($conn,$qry) or die("not fire1");

         if (mysqli_affected_rows($conn)>=1){
            echo '<script language="javascript">';
            echo 'alert("User Already Registered")';
            echo '</script>';
         }


        else{

          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo '<script language="javascript">';
            echo 'alert("Email Format is not valid")';
            echo '</script>';
       
    }


    else{
        if(preg_match('/^\d{10}$/',$mobile) and substr($roll,0,3)=="B15"){

         $qry1="INSERT into addStudent VALUES('$name','$email','$mobile','$roll','$guard_name','$guard_email','$guard_mobile','$password','$date','$semester','$gender','$Scourses')";
         $result=mysqli_query($conn,$qry1) or die("not");

         if($result){
               echo '<script language="javascript">';
               echo 'alert("Registration Successful")';
               echo '</script>';
               header("Location:admin1_addStudent.php");


            
                    }
        }

        else{
      echo '<script language="javascript">';
            echo 'alert("Enter 10 digit mobile number or enter roll no. in form of B15....")';
            echo '</script>';
    }

      }
          }
    }
      public function admin_delete_student($conn,$roll){
         $d2 = "select * from addStudent where Sroll_no= '$roll'";
         $result2=mysqli_query($conn,$d2) or die("not fire one");
         $array_of_courseId = array();
         while($arr=mysqli_fetch_array($result2)){
            array_push($array_of_courseId, $arr['Scourses']);
         }
         $d1 = "delete from addStudent where Sroll_no='$roll'";

         $result1=mysqli_query($conn,$d1) or die("not fire two");
         


         if (mysqli_affected_rows($conn)>=1)
         {
            echo '<script language="javascript">';
            echo 'alert("Successfully Deleted")';
            echo '</script>';
         }
         else{
            echo '<script language="javascript">';
            echo 'alert("No Such Roll no. is exist")';
            echo '</script>';
         }

        //ALTER TABLE tbl_Country DROP COLUMN IsDeleted;
         $size1=sizeof($array_of_courseId);
         
         if($size1>1){

         for($i=0; $i<$size1; $i++){
         $d3 = "ALTER TABLE $array_of_courseId[$i] DROP COLUMN $roll";
         $result3=mysqli_query($conn,$d3) or die("not fire three");
         }
         } 


      }
      public function admin_view_student($conn,$myArray,$var1){
 
              echo "$var1";
          $qry1 = "select * from addStudent where Scourses='$var1'";
          $qry2= mysqli_query($conn,$qry1) or die("not fire chhakka");
          $k=1;
          $var="";
          while($result=mysqli_fetch_array($qry2)){
              
              $a=$result['Sname'];
              $b=$result['Semail'];
              $c=$result['Smobile'];
              $d=$result['Sroll_no'];
              $e=$result['Ssemester'];
              $f=$result['Sdate'];
              $g=$result['Sgender'];
              $h=$result['Sguard_name'];
              $i=$result['Sguard_email'];
              $j=$result['Sguard_mobile'];
             
              //echo $a;
              $temp="<tr><td>$k</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$f</td><td>$g</td><td>$h</td><td>$i</td><td>$j</td>";
              echo $temp;
               $k++;
              array_push($myArray, $d);
              $button="<td><input type='submit' value='Update' name='$k'></td></tr>";
              echo $button;
              //$temp=$temp+
              //echo $temp;
              //echo 1001;
              $var+=$temp;
           }
           return $myArray;
      }


     

//-----------------------------------------------------------------------------------------
      public function admin_add_course($conn,$course,$id){
          $qry="SELECT * from add_course where Cid='$id'";
    $res=mysqli_query($conn,$qry) or die("not fire1");
    if (mysqli_affected_rows($conn)>=1){
      echo '<script language="javascript">';
      echo 'alert("Course Already Registered")';
      echo '</script>';
    }
    else{

      if(!preg_match('/[^A-Za-z0-9]/', $course)){
    
    
      $qry="INSERT into add_course VALUES('$id','$course')";
      $result1=mysqli_query($conn,$qry) or die;
      $qry8="INSERT into add_course_delete VALUES('$id','$course')";
      $result8=mysqli_query($conn,$qry8) or die;
      if($result1){
        echo '<script language="javascript">';
        echo 'alert("course have Registered")';
        echo '</script>';
      }

      $qry1="CREATE TABLE ".$id." (xdate VARCHAR(40))";
      
      $res1=mysqli_query($conn,$qry1) or die("not connected");
    }

    else{
      echo '<script language="javascript">';
        echo 'alert("Enter vaild course name")';
        echo '</script>';

    }
    }

      }

      //-------------------------------------------------------------------------------------

       public function admin_delete_course($conn,$iid){
         $d2 = "delete from add_course where Cid = '$iid'";
           $result2=mysqli_query($conn,$d2) or die;
           $d6 = "delete from add_course_delete where cid = '$iid'";
           $result6=mysqli_query($conn,$d6) or die;
           if (mysqli_affected_rows($conn)>=1){
           $d3 = "delete from addStudent where Scourses = '$iid'";
           $result3=mysqli_query($conn,$d3) or die;
           $d4 = "delete from addInstructor where Icourse = '$iid'";
           $result4=mysqli_query($conn,$d4) or die;
           $d5 = "DROP TABLE $iid";
           $result5=mysqli_query($conn,$d5) or die("not fire");
           echo '<script language="javascript">';
        echo 'alert("course deleted")';
        echo '</script>';
      }
      else{
         echo '<script language="javascript">';
        echo 'alert("no course exist")';
        echo '</script>';
      }
   }

      //----------------------------------------------------------------------------------
      public function admin_view_course($conn){
         $qry1 = "select * from add_course";
         $qry2= mysqli_query($conn,$qry1);
         $i=0;
         while($result=mysqli_fetch_array($qry2)){
         $i++;
         $a=$result['Cid'];
         $b=$result['Ccourse_name'];
         echo "<tr>";
         echo "<td>$i</td>";
         echo "<td>$a</td>";
         echo "<td>$b</td>";

         echo "</tr>";

      }
   }



//-----------------------------------------------------------------------------------------
  

      public function update_instructor_profile($conn,$y,$name, $email, $mobile, $date, $gender,$password){
        
         $qry="SELECT * from addInstructor where Iid='$y'";
    $res=mysqli_query($conn,$qry) or die("not fire ullu");
    $result1 = mysqli_num_rows($res);
    
    if($result1!=0){
      $qry1="UPDATE addInstructor SET Iname='$name',Iemail='$email',Imobile='$mobile',Idate='$date',Igender='$gender' WHERE Iid='$y'";
      $result2=mysqli_query($conn,$qry1) or die("not fire");
      
        echo '<script language="javascript">';
        echo 'alert("Successfully Updated")';
        echo '</script>';
      
  }
  header("location:update_instructor.php");

      }
      // public function admin_logout($value='');

}


   ?>


 