<!DOCTYPE html>
<?php

      session_start();
      $uid = $_SESSION['id'];
      include('../dbase.php');
      if(isset($_POST["edit-profile"])){
              $fname = $_POST["fname"];
              $lname = $_POST["lname"];
              $email = $_POST["email"];
              $nic = $_POST["nic"];
              $license = $_POST["license"];
              $pwd = $_POST["pwd"];
      $sql="UPDATE user SET fname='$fname', lname='$lname', email='$email', nic='$nic', license='$license', password='$pwd' WHERE userID='$uid'";

      if(mysqli_query($con,$sql)){
        echo "<script type='text/javascript'>alert('User Insert')</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Something went wrong')</script>";
      }
    }


      $uid = $_SESSION['id'];
      $sql1 = "select * from user where userID=$uid";
      $res1 = mysqli_query($con,$sql1);
      $row1 = mysqli_fetch_array($res1);
    
 ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile | SPRS</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
</head><!--/head-->

<body>
	<header id="header">
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">
                    	<h1><img src="../images/logo.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="admin-home.php">Home</a></li>
                      <li class="active"><a href="#">My Profile</a></li>
                      <li><a href="map.php">Parking Lot</a></li>
                      <li><a href="view-reservation.php">View Reservations</a></li>
                      <li><a href="view-user.php">View Users</a></li>
                      <li><a href="view-user.php">Post</a></li>
                      <li><a href="add-employee.php">Add Employee</a></li>
                      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
    <div class="row profile">
    <div class="col-md-3" style= "background-color:#cce6ff; border-radius:5px;">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="../images/profile.png" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <?php
                if(mysqli_num_rows($res1)>0){
                  echo $row1['fname']." ".$row1['lname']."<br><table class='profile-table'>
                        <tr><td>Email: </td><td>".$row1['email']."</td></tr>
                        <tr><td>NIC: </td><td>".$row1['nic']."</td></tr>
                        <tr><td>License: </td><td>".$row1['license']."</td></tr></table>";
                };
            ?>
          </div>

        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <a href="#">
              <i class="glyphicon glyphicon-user"></i>
              Reservations </a>
            </li>
            <li>
              <a href="#">
              <i class="glyphicon glyphicon-flag"></i>
              Help </a>
            </li>
          </ul>

          <div class="" style="margin-left:25%;">
            <a href="#" class="btn btn-common" onclick="openNav1()">Edit Profile</a>
          </div>
        </div>
        <!-- END MENU -->
      </div>

    </div>
    <div class="col-md-9">
            <div class="profile-content">
              <?php
                $sql2 = "SELECT * FROM reservation WHERE userID = $uid";
                $res2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_array($res2);
                echo "<table class='table'>
                <tr>
                  <th>Reservation ID</th>
                  <th>Driver Name</th>
                  <th>Contact</th>
                  <th>Vehicle No</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>PIN No</th>
                <tr>";

                echo "<tr><td>".$row2['reservationID']."</td>
                          <td>".$row2['dname']."</td>
                          <td>".$row2['contact']."</td>
                          <td>".$row2['vehicle_no']."</td>
                          <td>".$row2['ddate']."</td>
                          <td>".$row2['start_time']."</td>
                          <td>".$row2['end_time']."</td>
                          <td>".$row2['pin']."</td></tr>";
              echo "</table>";
               ?>
            </div>
    </div>
  </div>
  </div>
    </div>

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lightbox.min.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/overlay.js"></script>
</body>
</html>
