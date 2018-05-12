<?php
	//Start session
    session_id("login");
	session_start();	
	//Unset the variables stored in session
	$_SESSION['SESS_MEMBER_ID'];
	$_SESSION['SESS_FIRST_NAME'];
    $_SESSION['SESS_LAST_NAME'];
?> 
<!DOCTYPE html>
<html>
<head>
<title>Restaurant Details</title>
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
						<li><a href="#">Welcome <?php echo $_SESSION['SESS_FIRST_NAME']; ?></a></li>|
                        <li><a href="logout.php">Logout</a>  </li> 
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<!-- content-section-starts -->
	<div class="content">
	<div class="main">
	   <div class="container">
		  <div class="register">
		  	  <form name="restaurantForm" action="rest_exec.php" method="post"> 
				 <div class="register-top-grid">
                     <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
					<h3>RESTAURANT INFORMATION</h3>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Restaurant Name<label>*</label></span>
						<input type="text" name="rest_name"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Restaurant URL<label>*</label></span>
						<input type="text" name="rest_url"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Restaurant Open Time<label>*</label></span>
						 <input type="text" name = "rest_opentime"> 
					 </div>
                      <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Restaurant Close Time<label>*</label></span>
						<input type="text" name = "rest_closetime"> 
					 </div>
						    <h3> ADDRESS</h3>
							  <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Restaurant Shop No<label>*</label></span>
						<input type="text" name="rest_shopNo"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Restaurant Street<label>*</label></span>
						<input type="text" name="rest_street"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Restaurant City<label>*</label></span>
						 <input type="text" name = "rest_city"> 
					 </div>
                      <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Restaurant State<label>*</label></span>
						<input type="text" name = "rest_state"> 
					 </div>
                     <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Restaurant ZipCode<label>*</label></span>
						<input type="text" name="rest_zip"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Restaurant Phone<label>*</label></span>
						<input type="text" name="rest_phone"> 
					 </div>
                     <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Restaurant Description</span>
						<input type="text" name="rest_description"> 
					 </div>
                     <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Restaurant Cuisine<label>*</label></span>
						<input type="text"  name="cuisine" /> 
                    </div>
                     <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Restaurant ID</span>
						<input type="text" name="user_id" value="<?php echo $_SESSION['SESS_MEMBER_ID']?>"> 
					 </div>
                     <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Restaurant Map Link<label>*</label></span>
						<input type="text"  name="rest_map" /> 
                    </div>
                     
				<div class="clearfix"> </div>
				<div class="register-but">
					   <input type="submit" name="rest_submit" />
					   <div class="clearfix"> </div>
		    </form>
                 
				</div>
		   </div>
	     </div>
	    </div>
<div class="clearfix"></div>
		<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
					<div class="col-md-3 contact-section-grid">
						<h4>Site Links</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">About Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Contact Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Privacy Policy</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Terms of Use</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid">
						<h4>Site Links</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">About Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Contact Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Privacy Policy</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Terms of Use</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid">
						<h4>Follow Us On...</h4>
						<ul>
							<li><i class="fb"></i></li>
							<li class="data"> <a href="#">  Facebook</a></li>
						</ul>
						<ul>
							<li><i class="tw"></i></li>
							<li class="data"> <a href="#">Twitter</a></li>
						</ul>
						<ul>
							<li><i class="in"></i></li>
							<li class="data"><a href="#"> Linkedin</a></li>
						</ul>
						<ul>
							<li><i class="gp"></i></li>
							<li class="data"><a href="#">Google Plus</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid nth-grid">
						<h4>Subscribe Newsletter</h4>
						<p>To get latest updates and food deals every week</p>
						<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						<input type="submit" value="submit">
						</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-section-ends -->
	<!-- footer-section-starts -->

	<!-- footer-section-ends -->
	  <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>
</html>