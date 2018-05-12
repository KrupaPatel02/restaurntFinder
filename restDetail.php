<?php
    session_id('restDetail');
     session_start();
 $name=$_SESSION['SESSION_REST_NAME'];
                $_SESSION['SESSION_REST_SHOP'];
               $_SESSION['SESSION_REST_STREET'] ;
               $_SESSION['SESSION_REST_CITY'] ;
               $_SESSION['SESSION_REST_STATE'];
               $_SESSION['SESSION_REST_ZIP'];
               $_SESSION['SESSION_REST_PHONE'] ;
               $_SESSION['SESSION_REST_URL'] ;
                $_SESSION['SESSION_REST_DESCRIPTION'] ;   
                  $_SESSION['SESSION_REST_OPEN'] ;
                   $_SESSION['SESSION_REST_CLOSE'];
                   $_SESSION['SESSION_REST_CUISINE'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--Animation-->
<script src="js/wow.min.js"></script>
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
<script src="js/simpleCart.min.js"> </script>	
</head>
<body>
    <!-- header-section-starts -->
	<div class="header">
		<div class="container">
			<div class="top-header">
				<div class="logo">
					<a href="index.php"><img src="images/restlogo.png" class="img-responsive" alt="" /></a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
			<div class="menu-bar">
			<div class="container">
				<div class="top-menu">
					<ul>
						<li><a href="index.php">Home</a></li>|
						<li><a href="restaurants.php">Popular Restaurants</a></li>|
						<li><a href="searchlist.php">Cuisines</a></li>|
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="login-section">
					<ul>
						<li><a href="login.php">Login</a>  </li> |
						<li><a class="active" href="register.php">Register</a> </li> |
						<li><a href="#">Help</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
    <div class="Popular-Restaurants-content">
		<div class="Popular-Restaurants-grids">
			<div class="container">
				<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">
					<div class="col-md-3 restaurent-logo">
						<img src="images/italian_cuisine.jpeg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-2 restaurent-title">
						<div class="logo-title">
							<h4><a href="restDetail.php"> <?php echo $name;  ?> </a></h4>
						</div>
						<div class="company_ad">
                            
                            <span><?php echo $row["rest_ShopNo"] ." ". $row["rest_Street"]; ?></span>
                            <span><?php echo $row["rest_City"] ."-".$row["rest_zip"]; ?></span>
                            <span><?php echo  $row["open_Time"] ." -". $row["close_Time"]; ?></span>
                            <span><a href="review.php"> Write Review </a></span>
                    
                            
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				</div>
			</div>
		</div>