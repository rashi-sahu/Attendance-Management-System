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
         $qry="SELECT * from add_admin where amobile='$mobile' and apassword='$password'";
         $res=mysqli_query($conn,$qry) or die("not fire1");
         if (mysqli_affected_rows($conn)>=1){
            $row=mysqli_fetch_array($res) or die("not fire2");
               $_SESSION['name']=$row[0];
               $_SESSION['email']=$row[1];
               $_SESSION['mobile']=$row[2];
               $_SESSION['password']=$row[3];
               $_SESSION['login']=true;
               header("location:admin1.php");
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

         $qry="SELECT * from addInstructor where Imobile='$mobile' or Iemail='$email' or Iid='$id'";
         $res=mysqli_query($conn,$qry) or die("not fire1");

         if (mysqli_affected_rows($conn)>=1){
            echo '<script language="javascript">';
            echo 'alert("User Already Registered")';
            echo '</script>';
         }

         else{
         
           for($i=0;$i<sizeof($courses); $i++){
               $qry="INSERT into addInstructor VALUES('$name','$email','$mobile','$date','$gender','$id','$password','$courses[$i]')";
               $result=mysqli_query($conn,$qry) or die;
               if($result){
               echo '<script language="javascript">';
               echo 'alert("Registration Successful")';
               echo '</script>';
            
               }
            }
         }
      }

//--------------------------------------------------------------------------------------------------------------
      public function admin_delete_instructor($id){
           $conn=mysqli_connect("localhost","root","","attendance") or die;
         $d1 = "delete from addInstructor where Iid = '$id'";


         if(mysqli_query($conn,$d1)){
            echo '<script language="javascript">';
            echo 'alert("Successfully Deleted")';
            echo '</script>';
         }
         else{
            echo '<script language="javascript">';
            echo 'alert("Not Deleted")';
            echo '</script>';
         }


      }

//---------------------------------------------------------------------------------------------------------------
      public function admin_view_instructor($conn, $myArray ,$var1){
         echo "$var1";
          $qry1 = "select * from addInstructor where Icourse='$var1'";
          $qry2= mysqli_query($conn,$qry1) or die("not fire");
          $i=1;
          $var="";
          while($result=mysqli_fetch_array($qry2)){
              $i++;
              $a=$result['Iname'];
              $b=$result['Iemail'];
              $c=$result['Imobile'];
              $d=$result['Idate'];
              $e=$result['Igender'];
              $f=$result['Iid'];
              //echo $a;
              $temp="<tr><td>$i</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$f</td>";
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
         $qry1="INSERT into addStudent VALUES('$name','$email','$mobile','$roll','$guard_name','$guard_email','$guard_mobile','$password','$date','$semester','$gender','$Scourses')";
         $result=mysqli_query($conn,$qry1) or die("not");

         if($result){
               echo '<script language="javascript">';
               echo 'alert("Registration Successful")';
               echo '</script>';
            
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
    
    
      $qry="INSERT into add_course VALUES('$id','$course')";
      $result1=mysqli_query($conn,$qry) or die;
      if($result1){
        echo '<script language="javascript">';
        echo 'alert("course have Registered")';
        echo '</script>';
      }

      $qry1="CREATE TABLE ".$id." (xdate VARCHAR(40))";
      
      $res1=mysqli_query($conn,$qry1) or die("not fire1");
    }

      }

      //-------------------------------------------------------------------------------------

       public function admin_delete_course($conn,$iid){
         $d2 = "delete from add_course where Cid = '$iid'";
           $result2=mysqli_query($conn,$d2) or die;
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


 