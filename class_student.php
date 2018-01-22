<?php 

	class student {
      /* Member variables */
      var $price;
      var $title;
      
    
      // function setPrice($par){
      //    $this->price = $par;
      // }
      
      // function getPrice(){
      //    echo $this->price ."<br/>";
      // }
      
      // function setTitle($par){
      //    $this->title = $par;
      // }
      
      // function getTitle(){
      //    echo $this->title ." <br/>";
      // }

      public function student_login($conn,$mobile , $password){

    $qry="SELECT * from addStudent where Smobile='$mobile' and Spassword='$password'";
    echo "hey";

    $res=mysqli_query($conn,$qry) or die("not fire1");

    if (mysqli_affected_rows($conn)>=1){

      $row=mysqli_fetch_array($res) or die("not fire2");

      $_SESSION['name']=$row[0];

      $_SESSION['email']=$row[1];

      $_SESSION['mobile']=$row[2];

      $_SESSION['roll']=$row[3];

      $_SESSION['guard_name']=$row[4];

      $_SESSION['guard_email']=$row[5];

      $_SESSION['guard_mobile']=$row[6];

      $_SESSION['password']=$row[7];

      $_SESSION['date']=$row[8];

      $_SESSION['semester']=$row[9];

      $_SESSION['gender']=$row[10];

      $_SESSION['login_stud']=true;
      if (strcmp($password, $_SESSION['password'])==0){

      header("location:student1.php");

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


      //----------------------------------------------------------------------------------------------------------
      
      public function student_view_attendance($conn,$x,$y,$qryy,$result1,$var){

          echo "<td class='second'>$x</td><td>$y</td>";

                          

                         

              $qryy4= mysqli_query($conn,$qryy) or die("not fire");

              $array_of_attendance = array();

              $total_class=0;

              while($result1=mysqli_fetch_array($qryy4)){

                array_push($array_of_attendance, $result1[$y]);

                $total_class++;



              }



              for($j=0;$j<$total_class;$j++){

                if($array_of_attendance[$j]==1)

                  echo "<td>P</td>";

                //echo "<td>$array_of_attendance[$j]</td>";

                else

                  echo "<td><font color='#fa1414'><b>A</b></font></td>";

              }



              echo "<td>$total_class</td>";



              $count=0;

              for($j=0;$j<$total_class;$j++){

                $count=$count+$array_of_attendance[$j];

              }

              echo "<td>$count</td>";
                $total_absent=$total_class-$count;
              echo "<td>$total_absent</td>";



              if($total_class>0){

              $Percentage=($count/$total_class)*100;

              $per=round($Percentage,2);
              if($per>=85.00)

              echo "<td>$per</td>";


            else
              echo "<td bgcolor='#fa1414'><b>$per</b></td>";

              }

              else{

                echo "<td>0</td>";

              }



              if($per==100.00){

                echo "<td>Excellent</td>";

              }

              else if ($per>=92.00) {

                echo "<td>Very Good</td>";

              }



              else if ($per>=85.00) {

                echo "<td>Good</td>";

              }



              else 

                echo "<td bgcolor='#fa1414'><b>Bad</b></td>";


      }
     
   }

?>