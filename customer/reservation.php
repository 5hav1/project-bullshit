<?php

  session_start();
    //echo $_SESSION["id"];
    $user= $_SESSION["id"];

  if(isset($_POST["reservation"])){
          $dname = $_POST["dname"];
  		    $contact = $_POST["contact"];
          $vehicle = $_POST["vehicle"];
          $stime = $_POST["stime"];
          $etime = $_POST["etime"];
          $status = "Not checked in";

          function GeneratePinCode($chars){
                  $pin="";
                  while ($chars!=0){
                    $pin .=rand(0,9);
                    $chars--;
                  }
                  return $pin;
                }

          $pin= GeneratePinCode(10);
      //reservation validation script
      include("../dbase.php");
      // turning form stime, etime to epoch time
      $slotarray = array(1,2,3);
      $state = "";
      $new_stime = strtotime($stime);
      $new_etime = strtotime($etime);

      foreach ($slotarray as $slotno){
        $count = 0;
        $sql1 = "SELECT * FROM reservation WHERE slotID = $slotno";
        $res1 = mysqli_query($con,$sql1);

        while($row1 = mysqli_fetch_array($res1)){
          $start_time = strtotime($row1['start_time']);
          $end_time = strtotime($row1['end_time']);

          if($start_time<=$new_stime && $end_time>$new_stime){
            $count = $count + 1;
          }
          elseif($start_time<$new_etime && $end_time>$new_etime){
            $count = $count + 1;
          }
          elseif($start_time<$new_etime && $end_time>$new_etime){
            $count = $count + 1;
          }
          else{
            $count = 0;
          }
        }
        if($count == 0){
          echo $count;
          $sql = "insert into reservation(dname,userID,slotID,contact,vehicle_no,start_time,end_time,status,pin)
                  values('$dname','$user','$slotno','$contact','$vehicle','$stime','$etime','$status','$pin')";

          if(mysqli_query($con,$sql)){
            echo "Your PIN number is:".$pin;
            $state = "reserved";
          }
          else{
            echo "Something went wrong";
          }
          break;
        }
        else{
          $state = "nop";
        }
      }

      if($state = "nop"){
        echo "Already reserved!";
      }
      elseif($state = "reserved"){
        echo "Successfully reseved";
      }

  }


      // if($count == 0){
        // $sql = "insert into reservation(dname,userID,contact,vehicle_no,start_time,end_time,status,pin)
        //         values('$dname','$user','$contact','$vehicle','$stime','$etime','$status','$pin')";
        // if(mysqli_query($con,$sql)){
        //   echo "Your PIN number is:".$pin;
      //   }
      //   else{
      //     echo "Something went wrong";
      //   }
      //
      // }
      // else{
      //   echo "The requested slot is already reserved";
      // }


  if(isset($_POST["update"])){
            $pin = $_POST["pin"];
            $dname = $_POST["dname"];
            $contact = $_POST["contact"];
            $vehicle = $_POST["vehicle"];
            $date = $_POST["date"];
            $stime = $_POST["stime"];
            $etime = $_POST["etime"];

            include("../dbase.php");

            $sql="UPDATE reservation SET dname='$dname', contact='$contact', vehicle_no='$vehicle', ddate='$date', start_time='$stime', end_time='$etime' WHERE pin='$pin'";

                   if(mysqli_query($con,$sql)){
                     echo "Updated";
			              }
                    else{
			               echo "Something Went Wrong!";
		                }
    }

    if(isset($_POST["cancellation"])){
          $pin = $_POST["pin-cancel"];

          include("../dbase.php");

          if (mysqli_query($con,"DELETE FROM reservation WHERE pin='$pin'")){
                    // echo "Reservation cancelled"
          }
          else{
    			 echo "Something Went Wrong!";
    		}
  }
	?>
