<?php
session_start();
require_once 'db.php';

$id = $_GET['id'];
$u_id = $_SESSION['id'];
$query = "SELECT * FROM post WHERE id='$id'";
$result = $dbcon->query($query);
$result_fatch = mysqli_fetch_array($result);
$query1 ="SELECT * FROM comment WHERE post_id = '$id' ORDER BY date DESC";
$result1 = $dbcon->query($query1);
$sql = "SELECT COUNT(comment) AS total FROM comment WHERE post_id = '$id'";
$value = $dbcon->query($sql);


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
</div>
    <div class="container">
        <br><br><br>


        <?php
        if(!empty($result)){
          foreach ($result as $row) {
              ?>
              <h1><?php echo $row['name']?></h1>
              <p><?php echo date('l, jS, F Y, g:i:a', strtotime($row['date']));?></p>
              <img src="img/<?php echo $row['image']?>" style="width: 600px;height: 600px;" class="img-responsive img-thumbnail">
              <p class="lead"><?php echo $row['description']?></p><br><br>




              <?php
          }
      }
      ?>
      </div>
      <div class="container">
      <?php
        foreach ($value as $key) {
            if($key['total'] == 0){
                echo "<h3>Comments(0)</h3>";
                
            }
            else{
                echo "<h3>Comments(".$key['total'].")</h3>";
            }
        }
      ?>
          

          
      
      <?php
      if(!empty($result1)){
          foreach ($result1 as $row) {
            $name = $row['user_id'];
            $query2 = "SELECT * FROM user WHERE id = '$name'";
            $value = $dbcon->query($query2);
            $for_name = mysqli_fetch_array($value);
              ?>
              <h1><?php echo $for_name['username']?></h1>
              
              <p><?php echo date('l, jS, F Y, g:i:a', strtotime($row['date']));?></p>
              <p class="lead"><?php echo $row['comment']?></p>

              <?php
          }
      }
      ?>
</div>


<div class="container">

<?php
if($_SESSION['login'] !='true'){
    
?>
<h1>Please <a href="log.php">Login</a> Here For Comments</h1>
    <?php

}
else{


?>

    


      <form action="" id="contactForm" method="post" class="form-horizontal">

        <div class="form-group">
            <label>Comments</label>
            <textarea class="form-control" name="comment" required="" rows="5" cols="10"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="submit">Submit</button>
        </div>
    </form>

 
    <?php
    if(isset($_POST['submit'])){
        $comment = mysql_real_escape_string($_POST['comment']);
        $query = "SELECT COUNT(comment) AS total FROM comment WHERE comment = '$comment' AND  user_id='$u_id' AND post_id = '$id'";
        $result = $dbcon->query($query);
        foreach($result as $key){
            if($key['total'] == 1){
                echo "<script>alert('You can not same comment twice!!')</script>";
                echo "<script type = 'text/javascript'> document.location = 'sungle_blog.php?id=".$id."'; </script>";
            }
            else{

                $query2 = "INSERT INTO comment(comment,post_id, user_id) VALUES('$comment','$id', '$u_id')";
                $result2 = $dbcon->query($query2);
                if(!empty($result2)){
                 echo "<script>alert('insert successful')</script>";
                 echo "<script type = 'text/javascript'> document.location = 'sungle_blog.php?id=".$id."'; </script>";
             }
             else{
                echo "<script>alert('insert failed')</script>";
                echo "<script type = 'text/javascript'> document.location = 'sungle_blog.php?id=".$id."'; </script>";
            }
        }
    }

}
}
?>
</div>

</div>
<!-- /.container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>