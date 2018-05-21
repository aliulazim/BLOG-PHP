<?php
session_start();

require_once 'db.php';
require_once 'format.php';
$query = "SELECT * FROM post ORDER BY date DESC";
$result = $dbcon->query($query);
$sql1 = "SELECT * FROM category ORDER BY name ASC";
$values = $dbcon->query($sql1);
$query1 = "SELECT COUNT(comment.comment), post.name,post.id,post.image,post.user_id FROM comment, post WHERE post.id = comment.post_id GROUP BY post.name ORDER BY COUNT(comment.comment) DESC LIMIT 3";
$run = $dbcon->query($query1);


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

<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <h1>Our Blog</h1>
        <p>We offer the most complete house renovating services in the country</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="index.html">Home</a> <span><i class="fa fa-angle-double-right"></i>Blog</span>
      </div>
      </div>
    </div>
  </div>
</section>



<!--BLOG SECTION-->
<section id="blog" class="padding">
  <div class="container">
    <h2 class="hidden">Our Blog</h2>
    <div class="row">
    <div class="col-md-9">
      <div class="row" id="test-list">
         <ul class="list">
            <?php
            if(!empty($result)){
                foreach ($result as $row) {
                  $id1 = $row['id'];
                  $query2 = "SELECT COUNT(comment) AS total FROM comment WHERE post_id = '$id1'";
                  $res = $dbcon->query($query2);
                  $res1 = mysqli_fetch_array($res);
                    ?>
                    <article class="blog_item heading_space wow fadeInLeft" data-wow-delay="300ms">
                <div class="col-md-5 col-sm-5 heading_space">
              <div class="image size"><img src="img/<?php echo $row['image']?>" alt="blog" class="border_radius"></div>
            </div>
            <div class="col-md-7 col-sm-7 heading_space">
              <h3><?php echo $row['name']?></h3>
              <ul class="comment margin10">
                <li><a href="#."><?php echo date('l, F j, Y, g:i a', strtotime($row['date']))?></a></li>
                <li><a href="#."><i class="icon-comment"></i><?php echo $res1['total']?></a></li>
              </ul>
              <p class="margin10"><?php echo shortText($row['description'],250)?></p>
              <a class=" btn_common btn_border margin10 border_radius" href="single_post.php?id=<?php echo $row['id']?>">Read More</a>
              
            </div>
            </article>
              <?php
                }
            }
            ?>
            </ul>
            <nav>
        <ul class="pagination">
            
        </ul>
    </nav>
          </div>

        <div class="pager_nav wow fadeIn" data-wow-delay="600ms">
          <ul class="pagination">
            <li class="hidden">
              <a href="#." aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#.">1</a></li>
            <li><a href="#.">2</a></li>
            <li><a href="#.">3</a></li>
            <li>
              <a href="#." aria-label="Next">
              <span aria-hidden="true">Next &nbsp; <i class="fa fa-long-arrow-right"></i></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="col-md-3">
        <aside class="sidebar bg_grey border-radius wow fadeIn" data-wow-delay="300ms">
          <div class="widget heading_space">
            <form class="widget_search border-radius">
              <div class="input-group">
                <input type="search" class="form-control" placeholder="Search Here" required>
                <i class="input-group-addon icon-icons185"></i>
              </div>
            </form>
          </div>
          <div class="widget heading_space">
            <h3 class="bottom20">Featured Posts</h3>


            

            <?php
                if(!empty($run)){
                    foreach ($run as $key) {
                      $userid = $key['user_id'];
                      $sql2 = "SELECT * FROM user WHERE id = $userid";
                      $run1 = $dbcon->query($sql2);
                      $name = mysqli_fetch_array($run1);

                        ?>
            <div class="media">
              <a class="media-left" href="#."><img src="img/<?php echo $key['image']?>" alt="post" style="width: 40px;height: 40px;"></a>
              <div class="media-body">
                <h5 class="bottom5"><?php echo $key['name']?></h5>
                <a href="sungle_blog.php?id=<?php echo $key['id']?>" target="_blank" class="btn-primary border_radius bottom5">Read More</a>
                
                <span class="name"><?php echo $name['username']?></span>
              </div>
            </div>
            <?php
                    
                }
                }

            ?>
          </div>
          <div class="widget heading_space">
            <h3 class="bottom20">Catagories</h3>
            <ul class="tags">

            <?php
                        if(!empty($values)){
                            foreach ($values as $key) {
                                ?>

                                <li><a href="categories.php?catid=<?php echo $key['cat_id']?>"><?php echo $key['name']?></a></li>
                                <?php
                            }

                        }
                      ?>
              
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>
</section>
<!--BLOG SECTION-->



<!--Footer-->
<footer class="padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 footer_panel bottom25">
        <h3 class="heading bottom25">About Us<span class="divider-left"></span></h3>
        <a href="index.html" class="footer_logo bottom25"><img src="images/logo-white.png" alt="Edua"></a>
        <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
        <ul class="social_icon top25">
          <li><a href="#." class="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#." class="twitter"><i class="icon-twitter4"></i></a></li>
          <li><a href="#." class="dribble"><i class="icon-dribbble5"></i></a></li>
          <li><a href="#." class="instagram"><i class="icon-instagram"></i></a></li>
          <li><a href="#." class="vimo"><i class="icon-vimeo4"></i></a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-4 footer_panel bottom25">
        <h3 class="heading bottom25">Quick Links<span class="divider-left"></span></h3>
        <ul class="links">
          
          <li><a href="#."><i class="icon-chevron-small-right"></i>Blog</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Login</a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-4 footer_panel bottom25">
        <h3 class="heading bottom25">Keep in Touch <span class="divider-left"></span></h3>
        <p class=" address"><i class="icon-map-pin"></i>198 West 21th Street Victoria 8007, Australia</p>
        <p class=" address"><i class="icon-phone"></i>(654) 332-112-222</p>
        <p class=" address"><i class="icon-mail"></i><a href="mailto:Edua@info.com">Edua@info.com</a></p>
        <img src="images/footer-map.png" alt="we are here" class="img-responsive">
      </div>
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>Copyright &copy; 2016 <a href="#.">Edua</a>. all rights reserved.</p>
      </div>
    </div>
  </div>
</div>
<!--FOOTER ends-->



<script src="js/jquery-2.2.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootsnav.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery-countTo.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.cubeportfolio.min.js"></script>
<script src="js/jquery.themepunch.tools.min.js"></script>
<script src="js/jquery.themepunch.revolution.min.js"></script>
<script src="js/revolution.extension.layeranimation.min.js"></script>
<script src="js/revolution.extension.navigation.min.js"></script>
<script src="js/revolution.extension.parallax.min.js"></script>
<script src="js/revolution.extension.slideanims.min.js"></script>
<script src="js/revolution.extension.video.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/functions.js"></script>


 
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script type="text/javascript">
        var monkeyList = new List('test-list', {
          valueNames: ['name'],
          page: 3,
          pagination: true
      });
  </script>
</body>
</html>
