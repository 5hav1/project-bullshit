<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View-Reservation | SPRS</title>
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
                      <li><a href="admin-home.php">Home</a></li>
                      <li><a href="admin-profile.php">My Profile</a></li>
                      <li><a href="map.php">Parking Lot</a></li>
                      <li class="active"><a href="view-reservstion.php">View Reservations</a></li>
                      <li><a href="view-user.php">View Users</a></li>
                      <li><a href="send-post.php">Post</a></li>
                      <li><a href="add-employee.php">Add Employee</a></li>
                      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </header>

  <div class="container" style="padding-left:25%; padding-bottom: 4%;">
    <form method="post">
    <input type="text" id="input_admin" name="rid" placeholder="Reservation ID" style="color:black; height: 30px; border: 2px solid #005495; text-align:center; border-radius: 5px;">
    <button type="submit" name="search" class="btn btn-default" style="margin-left: 1%;">Search</button>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <button type="submit" class="btn btn-default" name="selectall" value="Select All">Select All</button>
      <br>
    </form>
  </div>

  <div class="container">
    <?php

        include('../dbase.php');

        if(isset($_POST["search"])){
                $rid = $_POST["rid"];

          $sql1 = "select * from reservation where reservationID=$rid";
          $res1 = mysqli_query($con,$sql1);
          $row1 = mysqli_fetch_array($res1);

          if(mysqli_num_rows($res1)>0){
            echo "<table class='table' style='text-align:center;'>
                    <tr><td>User ID: </td><td>".$row1['reservationID']."</td></tr>
                    <tr><td>User ID: </td><td>".$row1['userID']."</td></tr>
                    <tr><td>Driver Name: </td><td>".$row1['dname']."</td></tr>
                    <tr><td>ontact No: </td><td>".$row1['contact']."</td></tr>
                    <tr><td>Vehicle No: </td><td>".$row1['vehicle_no']."</td></tr>
                    <tr><td>Date: </td><td>".$row1['ddate']."</td></tr>
                    <tr><td>Start Time: </td><td>".$row1['start_time']."</td></tr>;
                    <tr><td>End Time: </td><td>".$row1['end_time']."</td></tr>;
                    <tr><td>PIN No: </td><td>".$row1['pin']."</td></tr>";
            echo "</table>";
          }
          else{
            echo "Reservation not found";
          }
      }



        if(isset($_POST["selectall"])){

        $sql2 = "select * from reservation";
        $res2 = mysqli_query($con,$sql2);

        echo "<table class='table'>
                <tr>
                  <th>Reservation ID</th>
                  <th>User ID</th>
                  <th>Driver Name</th>
                  <th>Contact</th>
                  <th>Vehicle No</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>PIN No</th>
                <tr>";

              while($row2 = mysqli_fetch_array($res2)){
                echo "<tr><td>".$row2['reservationID']."</td>
                          <td>".$row2['userID']."</td>
                          <td>".$row2['dname']."</td>
                          <td>".$row2['contact']."</td>
                          <td>".$row2['vehicle_no']."</td>
                          <td>".$row2['ddate']."</td>
                          <td>".$row2['start_time']."</td>
                          <td>".$row2['end_time']."</td>
                          <td>".$row2['pin']."</td></tr>";

              }
            echo "</table>";
            }
     ?>
   </div>

   <script type="text/javascript" src="../js/jquery.js"></script>
   <script type="text/javascript" src="../js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../js/lightbox.min.js"></script>
   <script type="text/javascript" src="../js/wow.min.js"></script>
   <script type="text/javascript" src="../js/main.js"></script>
   <script type="text/javascript" src="../js/overlay.js"></script>
  </body>
  </html>
