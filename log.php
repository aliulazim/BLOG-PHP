<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
if($_SESSION['login'] == 'true'){
  if($_SESSION['role'] == 1){
    header("location:admin.php");
  }
  else{
    header("location:user.php");
  }
}


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>Edua | Blog</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/edua-icons.css">
<link rel="stylesheet" type="text/css" href="css/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
<link rel="stylesheet" type="text/css" href="css/settings.css">
<link rel="stylesheet" type="text/css" href="css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/loader.css">
<link rel="icon" href="images/favicon.png">

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
<!--Loader
<div class="loader">
  <div class="bouncybox">
      <div class="bouncy"></div>
    </div>
</div>

-->

<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pull-left">
        <span class="info"><a href="#."> Have any question?</a></span>
        <span class="info"><i class="icon-phone2"></i>(654) 332-112-222</span>
        <span class="info"><i class="icon-mail"></i>support@edua.com</span>
        </div>
        <ul class="social_top pull-right">
          <li><a href="#."><i class="fa fa-facebook"></i></a></li>
          <li><a href="#."><i class="icon-twitter4"></i></a></li>
          <li><a href="#."><i class="icon-google"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!--Header-->
<header>
  <nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container"> 
       <div class="search_btn btn_common"><i class="icon-icons185"></i></div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="index.html">
        <img src="images/logo.png" class="logo logo-scrolled" alt="">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
          
          <li class="active"><a href="index.php">Blog</a></li>
          <li><a href="log.php">Login</a></li>
          <li><a href="sign_up.php">Signup</a></li>
        </ul>
      </div>
    </div>   
  </nav>
</header>

<!--Search-->
<div id="search">
  <button type="button" class="close">×</button>
  <form>
    <input type="search" value="" placeholder="Search here...."  required/>
    <button type="submit" class="btn btn_common blue">Search</button>
  </form>
</div><br>
<div class="container">
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <form class="well form-horizontal" action="login.php" method="post"  id="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend class="text-center">Login !</legend>


              <!-- Email input-->
              <div class="form-group">  
                  <div class="col-md-offset-2 col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" required="">
                    </div>
                </div>
            </div>


            <!-- Passwrod input-->

            <div class="form-group"> 
              <div class="col-md-offset-2 col-md-8 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input name="password" placeholder="password" class="form-control" type="password" required="">
                </div>
            </div>
        </div>

    


    <!-- Button -->
    <div class="form-group">
      <div class="col-md-offset-2 col-md-4">
        <button type="login" class="btn btn-warning" name="login" >Login <span class="glyphicon glyphicon-send"></span></button>
    </div>
</div>

</fieldset>
</form>
    </div>
</div>

        

</div>
</div><!-- /.container -->


</body>
</html>