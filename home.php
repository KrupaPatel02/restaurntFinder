<?php
	//Start session
session_id("login");
	session_start();	
	//Unset the variables stored in session
	        $_SESSION['SESS_MEMBER_ID'];
			$_SESSION['SESS_FIRST_NAME'];
			$_SESSION['SESS_LAST_NAME'];
            $_SESSION['SESS_EMAIL_ID'];
            $_SESSION['SESS_DOB'];
            $_SESSION['SESS_ROLE'];
?> 
<!DOCTYPE html>
<html>
<head>
<title>Restaurant Finder</title>
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
<script src="js/simpleCart.min.js"> </script>	
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
</head>
<body>
	

    <!-- header-section-starts -->
	<div class="header">
		<div class="container">
			<div class="top-header">
				<div class="logo">
					<a href=""><img src="images/restlogo.png" class="img-responsive" alt="" /></a>
				</div>

				
				<dv class="clearfix"></div>
	  </div>
</div>
			<div class="menu-bar">
			<div class="container">
				<div class="top-menu">
					<ul>
						<li><a href="home.php" class="scroll">Home</a></li>|
						<li><a href="restaurants.php">Popular Restaurants</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="login-section">
					<ul>
						<li><a href="#">Welcome <?php echo $_SESSION['SESS_FIRST_NAME']; ?></a></li>|
                        <li><a href="updateProfile.php">Update Profile</a></li>|
                        <li><a href="logout.php">Logout</a>  </li> 
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<div class="banner wow fadeInUp" data-wow-delay="0.4s" id="Home">
		    <div class="container">
				<div class="banner-info">
					<div class="banner-info-head text-center wow fadeInLeft" data-wow-delay="0.5s">
						<h1>Network of over 76+ Restaurants</h1>
						<div class="line">
							<h2> Find Restaurant</h2>
						</div>
					</div>
					<div class="form-list wow fadeInRight" data-wow-delay="0.5s">
						<form name="rest_find" action="searchlist_log.php" method="post">
						  <ul class="navmain">
							<li><span>Location Name</span>
							 <input type="text" name="location" class="text" value="" />
							</li>
							<li><span>Restaurant Name</span>
							 <input type="text" name="restaurant" class="text" value="" />
							</li>
							<li><span>Cuisine Name</span>
							 <input type="text" name="cuisine" class="text" value="" />
						    </li>
                              <li>
                              <span style="padding-left: 500px; padding-top: 60px">  <input  type="submit" style="background-color:green" value="search" name="rest_list"/></span>
                              </li>
						  </ul>
	 </form>		
				</div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<!-- content-section-starts -->
<div class="content">
		<div class="ordering-section" id="Order">
			<div class="container">
				<div class="ordering-section-head text-center wow bounceInRight" data-wow-delay="0.4s">
					<h3>Finding food was never so easy</h3>
					<div class="dotted-line">
						<h4>Top Restaurants</h4>
					</div>
				</div>
				<div class="special-offers-section-grids">
				 <div class="m_3"><span class="middle-dotted-line"> </span> </div>
				   <div class="container">
					  <ul id="flexiselDemo3">
						<li>
							<div class="offer">
								<div class="offer-image">	
									<img src="images/p1.jpg" class="img-responsive" alt=""/>
								</div>
								<div class="offer-text">
                                    <h4><a href="http://www.motherbearspizza.com/" target="_blank">Mother's Bear Pizza</h4>
									<p>Deep-dish pizzas & American snacks, plus beer & wine, at a local landmark resembling a rustic cabin. </a></p>
									<span></span>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<li>
							<div class="offer">
								<div class="offer-image">	
									<img src="images/p2.jpg" class="img-responsive" alt=""/>
								</div>
								<div class="offer-text">
									<h4><a href="http://www.feastcateringonline.com/" target="_blank">Feast Bakery Cafe</h4>
									<p>Quality organic baked goods, lunch, and dinner. Plus Sunday brunch!</p></a>
									<span></span>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<li>
							<div class="offer">
								<div class="offer-image">	
									<img src="images/p1.jpg" class="img-responsive" alt=""/>
								</div>
								<div class="offer-text">
									<h4><a href="https://bloomingtonmeat.com/" target="_blank">Butcher's Smokehouse</h4>
									<p>Hot slow-smoked meats, sides and desserts. </p></a>
									<span></span>
								</div>
								
								<div class="clearfix"></div>
						  </div>
						</li>
						<li>
							<div class="offer">
								<div class="offer-image">	
									<img src="images/p2.jpg" class="img-responsive" alt=""/>
								</div>
								<div class="offer-text">
									<h4><a href="http://www.cafepizzaria.com/" target="_blank">Cafe Pizzaria</h4>
									<p>Bloomington's first pizzeria with pizza, stromboli, and hot submarines.</p></a>
									<span></span>
								</div>
								
								<div class="clearfix"></div>
						  </div>
					    </li>
					 </ul>
				 <script type="text/javascript">
					$(window).load(function() {
						
						$("#flexiselDemo3").flexisel({
							visibleItems: 3,
							animationSpeed: 1000,
							autoPlay: false,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems: 2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
				    </script>
				    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
				</div>
			</div>					<div class="clearfix"></div>
		  </div>
  </div>
		</div>
	<div class="popular-restaurents" id="Popular-Restaurants">
		<div class="container">
				<div class="col-md-4 top-restaurents">
					<div class="top-restaurent-head">
						<h3>Top Restaurants</h3>
					</div>
					<div class="top-restaurent-grids">
						<div class="top-restaurent-logos">
						  <div class="res-img-1 wow bounceIn" data-wow-delay="0.4s">
                               <img  src="images/restaurent-logo1.jpg" class="img-responsive" alt="" />
							</div>
							<div class="res-img-2 wow bounceIn" data-wow-delay="0.4s">
						      <img src="images/restaurent-logo2.jpg" class="img-responsive" alt="" />
							</div>
							<div class="res-img-1 wow bounceIn" data-wow-delay="0.4s">
						      <img src="images/starbucks.jpeg" class="img-responsive" alt="" />
							</div>
						  <div class="res-img-2 wow bounceIn" data-wow-delay="0.4s">
						      <img src="images/restaurent-logo4.jpg" class="img-responsive" alt="" />
							</div>
							<div class="res-img-1 nth-grid1 wow bounceIn" data-wow-delay="0.4s">
						      <img src="images/restaurent-logo5.jpg" class="img-responsive" alt="" />
							</div>
						  <div class="res-img-2 nth-grid1 wow bounceIn" data-wow-delay="0.4s">
						      <img src="images/restaurent-logo6.jpg" class="img-responsive" alt="" />
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-md-8 top-cuisines">
					<div class="top-cuisine-head">
						<h3>Top Cuisines</h3>
					</div>
                    <form name="cuisine" action="cuisine_exec.php" method="get">
					<div class="top-cuisine-grids">
						<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
                 <a href="cuisine_exec.php?cuisine=american" name="american"><img src="images/american_cuisine.jpeg" class="img-responsive" alt="" /> </a>
							<label>American Cuisine</label> </a>
					    </div>
						<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
						    <a href="cuisine_exec.php?cuisine=italian" name="italian"><img src="images/italian_cuisine.jpeg" class="img-responsive" alt="" /> </a>
							<label>Italian Cuisine</label>
					    </div>
						<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
						    <a href="cuisine_exec.php?cuisine=indian" name="indian"><img src="images/indian_cuisine.jpeg" class="img-responsive" alt="" /> </a>
							<label>Indian Cuisine</label>
					    </div>
						<div class="top-cuisine-grid nth-grid wow bounceIn" data-wow-delay="0.4s">
						    <a href="cuisine_exec.php?cuisine=chinese" name="chinese"><img src="images/chinese_cuisine.jpeg" class="img-responsive" alt="" /> </a>
							<label>Chinese Cuisine</label>
					    </div>
						<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
				  <a href="cuisine_exec.php?cuisine=mexican" name="mexican"><img src="images/mexican_cuisine.jpeg" class="img-responsive" alt="" /> </a>
							<label>Mexican Cuisine</label>
					    </div>
						<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
						    <a href="cuisine_exec.php?cuisine=korean" name="korean"><img src="images/korean_cuisine.jpeg" class="img-responsive" alt="" /> </a>
							<label>Korean Cuisine</label>
					    </div>
						<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
						  <a href="cuisine_exec.php?cuisine=fast" name="fast food"><img src="images/fastfood_cuisine.jpeg" class="img-responsive" alt="" /> </a>
							<label>Fast Food Restaurants</label>
					    </div>
						<div class="top-cuisine-grid nth-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
				<a href="cuisine_exec.php?cuisine=japanese" name="japanese"><img src="images/veg_cuisine.jpeg" class="img-responsive" alt="" /> </a> <label>Japanese Cuisine</label>
					    </div>
						</form>	
						
						
			      </div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
	  </div>
</div>
		
		</div>
		<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
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
					<div class="col-md-3 contact-section-grid wow fadeInRight" data-wow-delay="0.4s">
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
					<div class="col-md-3 contact-section-grid wow fadeInRight" data-wow-delay="0.4s"></div>
					<div class="col-md-3 contact-section-grid nth-grid wow fadeInRight" data-wow-delay="0.4s">
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
<!--
	<div class="footer">
		<div class="container">
			<p class="wow fadeInLeft" data-wow-delay="0.4s">&copy; 2014  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com" target="target_blank">W3Layouts</a></p>
		</div>
	</div>
-->
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