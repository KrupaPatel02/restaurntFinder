<?php
	//Start session
  session_id("login");
	session_start();	
	//Unset the variables stored in session
	
?> <!DOCTYPE html>
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
	</div>
	<!-- header-section-ends -->
    <?php

    $db = new mysqli("localhost","root","root","foodfinder");
    
    $restname = $_GET['restname'];
    $restid = $_GET['restid'];
    if($restname){
    $query =  "Select * from restaurant where rest_Name LIKE '%".$restname."%'";
    }
    elseif($restid){
        $query = "Select * from restaurant where rest_ID LIKE '%".$restid."%'";
    }
    else{
        $query = "Select * from restaurant LIMIT 10";
    }
    
    $sql = $db->query($query);
    $n = $sql->num_rows;

		if($n > 0) {
             while ($row = $sql->fetch_assoc())      {  
                 
        
    ?>
	<div class="contact-section-page">
		<div class="contact-head">
		    <div class="container">
				<h3><?php echo $row["rest_Name"]; ?> </h3>
				<p></p>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
					        <div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
					        	<div class="contact-map">
			<iframe src="<?php echo $row["rest_map"]; ?>"> </iframe>
		</div>
      
	  <div class="company-right">
					        	<div class="company_ad">
							     		<h3> <?php echo $row["rest_Name"]; ?></h3>
							     		<span><?php echo $row["rest_Description"]; ?> </span>
			      						<address>
                		 <span><?php echo $row["rest_ShopNo"] ." ". $row["rest_Street"]; ?></span><br>
                            <span><?php echo $row["rest_City"] ."-".$row["rest_zip"]; ?></span><br>
                            <span><?php echo  $row["open_Time"] ." -". $row["close_Time"]; ?></span><br>
                                <span>Website: <a href= "http://<?php echo $row["rest_URL"]; ?>"><?php echo $row["rest_URL"]; ?></a></span>            
                            
							   			</address>
							   		</div>
									</div>	
									<div class="follow-us">
										<h3>follow us on</h3>
										<a href="http://www.facebook.com/<?php echo $row["rest_Name"]; ?>"><i class="facebook"></i></a>
										<a href="http://www.twitter.com/<?php echo $row["rest_Name"]; ?>"><i class="twitter"></i></a>
		 								<a href="http://plus.google.com/+<?php echo $row["rest_Name"]; ?>"><i class="google-pluse"></i></a>
									</div>
        <?php
             }
        }?>
                            </div>
                        				 <div class="company-right">
                                            <div class="company_ad">
							     		<h3> Reviews:</h3><br>
  <?php  
    $query1 = "Select * from review where rest_ID = $restid";
    $sql1 = $db->query($query1);
     $n1 = $sql1->num_rows;
   if($n1 > 0) {
             while ($row1 = $sql1->fetch_assoc())      {  
     ?>
                        <h4><span style="color: orange"><?php echo $row1["user_name"]."    ".$row1["date"];     ?><br></span></h4>
				    <h4><?php echo $row1["comment"]; ?> <br></h4>
				        </div>
         <?php }
        }
    ?>
                        </div>
                         <div class="clearfix"></div>
						</div>
        </div>
	</div>
    

	<!-- footer-section-starts -->
	
	<!-- footer-section-ends -->
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
</body>
</html