<?php 


  
	class instructor {


      /* Member variables */

      //var $price;

      //var $title;

      

      /* Member functions */

      





      public function inst_login($conn,$mobile,$password){



      	$qry="SELECT * from addInstructor where Imobile='$mobile' and Ipassword='$password'";

    	$res=mysqli_query($conn,$qry) or die("not fire1");

    	if (mysqli_affected_rows($conn)>=1){

	      $row=mysqli_fetch_array($res) or die("not fire2");

	      $_SESSION['name']=$row[0];

	      $_SESSION['email']=$row[1];

	      $_SESSION['mobile']=$row[2];

	      $_SESSION['date']=$row[3];

	      $_SESSION['gender']=$row[4];

	      $_SESSION['id']=$row[5];

	      $_SESSION['password']=$row[6];

	      $_SESSION['login_inst']=true;
        if (strcmp($password, $_SESSION['password'])==0){

	      header("location:instructor1.php");
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

//---------------------------------------------------------------------------------------





    public function inst_add_attendance($conn,$var){

    	$sql="SELECT * FROM addStudent WHERE Scourses='$var'";



  $res= mysqli_query($conn,$sql) or die("qry not fired!");





    $array_of_students = array();



    while($result1=mysqli_fetch_array($res)){



    $roll=$result1[3];



      array_push($array_of_students, $roll);



    }



    $date = date('d-m-Y');



    $attendance=array();



  if (isset($_POST['xsave'])){



    for ($j=0; $j<sizeof($array_of_students); $j++){



        $foo=$array_of_students[$j];



        $temp=$_POST[$foo];

        array_push($attendance, $temp);



    }



    $qry="INSERT INTO $var VALUES ('$date', ";



    $length=sizeof($attendance);



    for ($j=0; $j<sizeof($attendance); $j++){



      $qry=$qry."'".$attendance[$length-1-$j]."',";



    }



    $qry= substr($qry, 0, -1);



    $qry=$qry.")";





    $fire=mysqli_query($conn, $qry) or die("Not Fired");



  }



    }





//----------------------------------------------------------------------------------------------

    public function inst_view_attendance($conn,$x,$y,$qryy,$result1,$var,$array_of_variables){



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






              $per=0;
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



              array_push($array_of_variables, $per);

              array_push($array_of_variables, $total_class);

            return $array_of_variables;



   }



     //----------------------------------------------------------------------------------------------

     public function inst_update_attendance($conn,$var, $c1,$value,$date){

     

     $q1=	"update $var set $c1='$value' where xdate='$date' " ;

	$q2=mysqli_query($conn,$q1) or die("Not Fired");





     }



    public function inst_sent_mail($conn,$per,$total_class,$var,$mail,$instructor_email){





              if($per<85.00)



              {



                $to=$mail;



                $subject="Regarding Attendance";



                $message="Your attendance is ".$per." %  in ".$var." which is less than the minimum attendance criteria . Be regular in classes otherwise you will be diregistered from the course .";



                $from=$instructor_email;



                mail($to,$subject,$message,$from);







              }

      

    }






   }



?>