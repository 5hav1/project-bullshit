<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | SPRS</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
	  <link href="../css/main.css" rel="stylesheet">
	  <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css">
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
    bool =false;
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
    include("reservation.php");
   ?>
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
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="customer-profile.php">My Profile</a></li>
                        <li class="dropdown"><a href="#">Abo ut Us<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="vision.html">Vision</a></li>
                                <li><a href="mission.html">Mission</a></li>
                                <li><a href="guidance.html">Our Guidance</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="blog.html">Citations<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="rules.html">Rules & Regulations</a></li>
                                <li><a href="violations.html">Parking Violations</a></li>
                            </ul>
                        </li>
                        <li><a href="Map.php">Map</a></li>
                        <li><a href="charges.html">Charges</a></li>
                        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section id="services">
        <div class="container" style="padding-top: 3%;">
            <div class="row">
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <button class="home-icons" href="reservation.php" onclick="openNav1()">
                    <div class="icon-space">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                          <img src="../images/reserve.png">
                        </div>
                    </div>
                  </button>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                  <button class="home-icons" href="update-reservation.php" onclick="openNav2()">
                    <div class="icon-space">
                      <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="../images/update.png">
                      </div>
                    </div>
                  </button>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                  <button class="home-icons" href="cancel-reservation.php" onclick="openNav3()">
                    <div class="icon-space">
                      <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="../images/cancel.png">
                      </div>
                    </div>
                  </button>
                </div>
            </div>
        </div>
    </section>

    <div id="myNav1" class="overlay">

      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
      <center>
      <div class="form-input">
            <div>
                <form id="reservation-form" name="reservation-form" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="dname" id="fname" required="required" placeholder="Driver Name"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="contact" id="pwd" placeholder="Contact Number" required="required"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="vehicle" id="vehicle" placeholder="Vehicle Number"><br>
                    </div>
                        <div class="form-group">
                                    <input type="text" class="some_class form-control" value="" name="stime" placeholder="Start Time" id="some_class_1"/>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="some_class form-control" value="" name="etime" placeholder="End Time" id="some_class_2"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="reservation" class="btn btn-submit" value="Submit" style="margin-top:2%;">
                    </div>
                </form>
            </div>
        </div>
      </center>
    </div>
  </div>

  <div id="myNav2" class="overlay">

    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
    <center>
    <div class="form-input">
          <div>

              <form id="update-form" name="update-form" method="post">
                  <div class="form-group">
                      <input type="text" class="form-control" name="pin" id="pin" required="required" placeholder="PIN number"><br>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="dname" id="fname" placeholder="Driver Name"><br>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="contact" id="pwd" required="required" placeholder="Contact Number"><br>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="vehicle" id="vehicle" placeholder="Vehicle Number"><br>
                  </div>
                  <div class="form-group">
                        <input type="text" class="some_class form-control" value="" placeholder="Start Time" id="some_class_1"/>
                  </div>
                  <br>
                  <div class="form-group">
                    <input type="text" class="some_class form-control" value="" placeholder="End Time" id="some_class_2"/>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="update" class="btn btn-submit" value="Reserve" style="margin-top:2%;">
                  </div>
              </form>

          </div>
      </div>
      </center>
    </div>
  </div>

  <div id="myNav3" class="overlay">

    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
    <center>
    <div class="form-input">
          <div>

              <form id="cancel-form" name="signup-form" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="pin-cancel" id="pin-cancel" required="required" placeholder="PIN number"><br>
                </div>
                <div class="form-group">
                    <input type="submit" name="cancellation" class="btn btn-submit" value="Cancel Reservation">
                </div>
              </form>

      </div>

    </div>
    </center>
  </div>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.datetimepicker.full.js"></script>
        <script type="text/javascript" src="../js/datepicker.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/lightbox.min.js"></script>
        <script type="text/javascript" src="../js/wow.min.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/overlay.js"></script>

  </body>
</html>
