<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | SPRS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
  <script type ="text/javascript">
function signup_validation(){

  var bool = true;
  var fstname = document.getElementById('fname').value;
  var lstname = document.getElementById('lname').value;
  var mail = document.getElementById('email').value;
  var NId = document.getElementById('nic').value;
  var pswrd = document.getElementById('pwd').value;
  var cfrmpswrd = document.getElementById('pwd-con').value;
  var lcen = document.getElementById('license').value;

  if((NId.length!=10) || ((NId.charAt(9)!='v')&&(NId.charAt(9)!='V')) || (NId.charAt(0)==0)){
    document.getElementById("nic").style.borderColor="red";
    alert("nic is invalid");
    return false;
  }

  else if((lcen.length!=8 )|| ((lcen.charAt(0)!='B')&&(lcen.charAt(0)!='b'))){
    document.getElementById("license").style.borderColor="red";
    alert("licen no length doesn't match");
    bool=false;
  }

  else if(pswrd.length<4){
    document.getElementById("pwd").style.borderColor="red";
    alert("password length should be atleast 4 chars");
    bool=false;
  }

  else if(pswrd!=cfrmpswrd){
    document.getElementById("pwd-con").style.borderColor="red";
    alert("passwords doesn't match");
    bool=false;
  }
  else if(NId.length==10){
    var temp1 = NId.substring(1,9);
    if(isInt(temp1)==true){
      bool=true;
    }
    else{
      bool=false;
    }
  }
  else if(lcen.length==8){
    var temp2 = lcen.substring(1,8);
    if(isInt(temp2)==true){
      bool=true;
    }
    else{
      bool=false;
    }
  }
  return bool;
}
</script>

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
</head><!--/head-->

<body>
  <?php

  session_start();
  $_SESSION['id']="";


  if(isset($_POST["login"])){
    include('dbase.php');

    if(isset($_POST["login"])){
      $email=$_POST['email'];
      $pwd=$_POST['pwd'];

      $sql = "SELECT email,type FROM user WHERE email ='".$email."' AND password ='".$pwd."'";

      $result = mysqli_query($con,$sql);
      $count = mysqli_fetch_array($result);

      if(mysqli_num_rows($result)>0){
        if($count[1]==1){
          $_SESSION['email']=$email;

          $rel=mysqli_fetch_assoc(mysqli_query($con,"SELECT userID FROM user WHERE email='$email'"));
          $_SESSION['id']=$rel['userID'];


          header("Location: admin/admin-home.php");
          die();
        }

        elseif($count[1]==0){

          $_SESSION['email']=$email;

          $rel=mysqli_fetch_assoc(mysqli_query($con,"SELECT userID FROM user WHERE email='$email'"));
          $_SESSION['id']=$rel['userID'];
          header("Location: customer/home.php");
        }

        elseif($count[1]==2){

          $_SESSION['email']=$email;

          $rel=mysqli_fetch_assoc(mysqli_query($con,"SELECT userID FROM user WHERE email='$email'"));
          $_SESSION['id']=$rel['userID'];
          header("Location: operator/operator-home.php");
        }

        elseif($count[1]==3){

          $_SESSION['email']=$email;

          $rel=mysqli_fetch_assoc(mysqli_query($con,"SELECT userID FROM user WHERE email='$email'"));
          $_SESSION['id']=$rel['userID'];
          header("Location: receptionist/recep-home.php");
        }

        else{
          echo "User not found";
        }
      }
      else{
        echo "<script type='text/javascript'>alert('Invalid combination. Please signup to continue')</script>";
      }
    }
  }

      if(isset($_POST["signup"])){
              $fname = $_POST["fname"];
      		    $lname = $_POST["lname"];
              $email = $_POST["email"];
              $nic = $_POST["nic"];
              $license = $_POST["license"];
              $pwd = $_POST["pwd"];
              $type = 0;

              include('dbase.php');

      		$sql = "insert into user(fname,lname,email,nic,license,password,type) values('$fname','$lname','$email','$nic','$license','$pwd','$type')";


      		if(mysqli_query($con,$sql)){
      			 echo "<script type='text/javascript'>alert('User Insert')</script>";

             $rel=mysqli_fetch_assoc(mysqli_query($con,"SELECT userID FROM user WHERE email='$email'"));
             $_SESSION['id']=$rel['userID'];
      			 header("Location: customer/home.php");
      		}
      		else{
      			 echo "<script type='text/javascript'>alert('Something went wrong')</script>";
      		}
      };



      ?>


	<header id="header">
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.html">
                    	<h1><img src="images/logo.png" alt="logo"></h1>
                    </a>
                </div>
              </div>
          </div>




    </header>
    <!--/#header-->

    <section id="home-slider">
        <div id="myNav5" class="overlay">

          <!-- Button to close the overlay navigation -->
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav5()">&times;</a>

          <div class="col-md-8 col-sm-12">
                    <div id="overlay-form-position">
                <!-- <div style="padding-top: 45%; padding-left: 15%;"> -->
                    <form id="login-form" name="login-form" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pwd" class="form-control" required="required" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-submit" value="Log In">
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div id="myNav4" class="overlay">

          <!-- Button to close the overlay navigation -->
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav4()">&times;</a>

          <div class="col-md-8 col-sm-12">
                <div>
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
                </div>
            </div>

        </div>
      </div>



        <div class="container">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>“Creating a better future<br>
                            Requires creativity in the present.”</h1>
                    <p>― Matthew Goldfinger</p>


                    <a href="#" class="btn btn-common" onclick="openNav4()">SIGN UP</a>
                    <a href="#" class="btn btn-common" onclick="openNav5()">LOG IN</a>
                </div>
                <img src="images/home/slider/slide1/middle.png" class="img-responsive slider-house" alt="slider image">
                <!--
                <img src="images/home/slider/slide1/circle1.png" class="slider-circle1" alt="slider image">
                <img src="images/home/slider/slide1/circle2.png" class="slider-circle2" alt="slider image">
                <img src="images/home/slider/slide1/cloud1.png" class="slider-cloud1" alt="slider image">
                <img src="images/home/slider/slide1/cloud2.png" class="slider-cloud2" alt="slider image">
                <img src="images/home/slider/slide1/cloud3.png" class="slider-cloud3" alt="slider image">
              -->

                <img src="images/home/slider/slide1/title.png" class="slider-sun" alt="slider image">
                <img src="images/home/slider/slide1/car.png" class="slider-cycle" alt="">
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/overlay.js"></script>
</body>
</html>
