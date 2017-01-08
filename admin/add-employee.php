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

      if(isset($_POST["signup"])){
              $fname = $_POST["fname"];
      		    $lname = $_POST["lname"];
              $email = $_POST["email"];
              $nic = $_POST["nic"];
              $license = $_POST["license"];
              $pwd = $_POST["pwd"];
              $type = 1;

              include('../dbase.php');

      		$sql = "insert into user(fname,lname,email,nic,license,password,type) values('$fname','$lname','$email','$nic','$license','$pwd','$type')";


      		if(mysqli_query($con,$sql)){
      			 echo "<script type='text/javascript'>alert('User Insert')</script>";
      		}
      		else{
      			 echo "<script type='text/javascript'>alert('Something went wrong')</script>";
      		}
      };

 ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View-User | SPRS</title>
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
                      <li><a href="map.php">Parking Lot</a></li>
                      <li><a href="view-reservation.php">View Reservations</a></li>
                      <li><a href="view-user.php">View Users</a></li>
                      <li><a href="send-post.php">Post</a></li>
                      <li class="active"><a href="#">Add Employee</a></li>
                      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </header>

  <div class="container">
  <div class="row profile">
  <div class="col-md-3" style= "border-radius:10px;">
    <div class="profile-sidebar" style="background-color: #e6e6ff;">
      <!-- SIDEBAR USERPIC -->
      <center>
      <div class="profile-userpic">
          <?php
            include('../dbase.php');
            $sql2 = "SELECT * FROM user WHERE userID=$uid";
            $res2 = mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_array($res2);
            echo "<a onclick='openNav2'><img src='".$row2['pic']."' class='img-responsice' alt=''></a>";
           ?>
      </div>
    </center>

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

        <center>
        <div class="">
          <a href="#" class="btn btn-common" style="width:100%;" onclick="openNav1()">Edit Profile</a>
        </div>
      </center>
      <center>
      <div class="" style="margin-top:5px;">
        <a href="#" class="btn btn-common" style="width:100%;" onclick="openNav2()">Update Profile Picture</a>
      </div>

      </center>
      </div>
      <!-- END MENU -->
    </div>



  </div>

  <div class="sub sec">
          <section id='blog' class='padding-top'>
            <div class='container'>
              <div class='row'>
                  <div class='sub-sec col-sm-7'>
                      <div class='row'>
                           <div class='col-sm-12 col-md-12'>
                             <div class="view-reserve" style="margin:2%;">
                             <center>
                               <form id="signup-form" name="signup-form" method="post" autocomplete="off">
                                   <div class="form-group">
                                       <input type="text" name="fname" class="form-control" id="fname" required="required" placeholder="First Name"><br>
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="lname" class="form-control" id="lname" required="required" placeholder="Last Name"><br>
                                   </div>
                                   <div class="form-group">
                                       <input type="email" name="email" class="form-control" id="email" required="required" placeholder="Email" style="background-color:white; "><br>
                                   </div>
                                   <div class="form-group">
                                       <input type="text" name="nic" class="form-control" id="nic" required="required" placeholder="NIC"><br>
                                   <div class="form-group">
                                       <input type="text" name="license" class="form-control" id="license" placeholder="License"><br>
                                   </div>
                                   <div class="form-group">
                                       <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password"><br>
                                   </div>
                                   <div class="form-group">
                                       <input type="password" class="form-control" id="pwd-con" placeholder="Confirm Password"><br>
                                   </div>

                                   <div class="form-group">
                                       <input type="submit" name="signup" class="btn btn-submit" value="Sign Up" onclick="return signup_validation()">
                                   </div>
                               </form>
                             </center>
                            </div>

                            <div>
                              <?php

                                  include('../dbase.php');

                                  if(isset($_POST["search"])){
                                          $uid = $_POST["uid"];

                                    $sql1 = "select * from user where userID=$uid";
                                    $res1 = mysqli_query($con,$sql1);
                                    $row1 = mysqli_fetch_array($res1);

                                    if(mysqli_num_rows($res1)>0){
                                      echo "<table class='table';'>
                                              <tr><td class='table-stuff'>User ID: </td><td class='table-stuff2'>".$row1['userID']."</td></tr>
                                              <tr><td class='table-stuff'>First Name: </td><td class='table-stuff2'>".$row1['fname']."</td></tr>
                                              <tr><td class='table-stuff'>Last Name: </td><td class='table-stuff2'>".$row1['lname']."</td></tr>
                                              <tr><td class='table-stuff'>Email: </td><td class='table-stuff2'>".$row1['email']."</td></tr>
                                              <tr><td class='table-stuff'>NIC: </td><td class='table-stuff2'>".$row1['nic']."</td></tr>
                                              <tr><td class='table-stuff'>License: </td><td class='table-stuff2'>".$row1['license']."</td></tr>
                                              <tr><td class='table-stuff'>First Name: </td><td class='table-stuff2'>".$row1['password']."</td></tr>";
                                      echo "</table>";
                                    }
                                    else{
                                      echo "User not found";
                                    }
                                }



                                  if(isset($_POST["selectall"])){

                                  $sql2 = "select * from user where type=0";
                                  $res2 = mysqli_query($con,$sql2);

                                  echo "<table class='table'>
                                          <tr>
                                            <th>User ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>NIC</th>
                                            <th>License</th>
                                            <th>Password</th>
                                          <tr>";

                                        while($row2 = mysqli_fetch_array($res2)){
                                          echo "<tr><td>".$row2['userID']."</td>
                                                    <td>".$row2['fname']."</td>
                                                    <td>".$row2['lname']."</td>
                                                    <td>".$row2['email']."</td>
                                                    <td>".$row2['nic']."</td>
                                                    <td>".$row2['license']."</td>
                                                    <td>".$row2['password']."</td></tr>";

                                        }
                                      echo "</table>";
                                      }
                               ?>
                             </div>
                           </div>
                      </div>
                  </div>
              </div>
            </div>
        </section>
  </div>
  </div>



  <div id="myNav2" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
    <div style="padding-top: 20%; padding-left: 39%; width: 60%">
      <form action="upload.php"  method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-submit">
        <input type="submit" value="Upload Image" name="submit" class="btn btn-submit">
      </form>

  </div>
</div>



<div id="myNav1" class="overlay">


<a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>

<div class="form-input">
      <div style="padding-top: 5%; padding-left: 39%; width: 60%">
          <form id="edit-profile" name="edit-profile" method="post" autocomplete="off">
              <div class="form-group">
                  <input type="text" name="fname" class="form-control" id="fname" required="required" placeholder="First Name"><br>
              </div>
              <div class="form-group">
                  <input type="text" name="lname" class="form-control" id="lname" required="required" placeholder="Last Name"><br>
              </div>
              <div class="form-group">
                  <input type="email" name="email" class="form-control" id="email" required="required" placeholder="Email" style="background-color:white; "><br>
              </div>
              <div class="form-group">
                  <input type="text" name="nic" class="form-control" id="nic" required="required" placeholder="NIC"><br>
              <div class="form-group">
                  <input type="text" name="license" class="form-control" id="license" placeholder="License"><br>
              </div>
              <div class="form-group">
                  <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password"><br>
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="pwd-con" placeholder="Confirm Password"><br>
              </div>

              <div class="form-group">
                  <input type="submit" name="edit-profile" class="btn btn-submit" value="Update" onclick="return signup_validation()">
              </div>
          </form>
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
