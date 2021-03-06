<?php
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
<title>Search List</title>
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
						<li ><a href="home_user.php" class="scroll">Home</a></li>|
						<li><a href="restaurantDetails.php">Restaurant Detail Form</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="login-section">
					<ul>
										<li><a href="#">Welcome <?php echo $_SESSION['SESS_FIRST_NAME']; ?></a></li>|
                        <li><a href="updateProfile.php">Update Profile</a></li>|
                        <li><a href="restList.php">Update Restaurant Details</a></li>|
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
	<!-- checkout -->
<?php
if(isset($_POST['rest_list'])){
    $location = $_POST['location'];
    $rest_Name = $_POST['restaurant'];
    $cuisine = $_POST['cuisine'];
    $db = new mysqli("localhost","root","root","foodfinder");
    // create query
// $query = " Select * from restaurant Where rest_Street LIKE '%".$_POST['location']."%' || rest_Name LIKE '%".$_POST['restaurant']."%' || cuisine='%".$_POST['cuisine']."%'";
   
//       $query = "SELECT * FROM restaurant WHERE rest_Street LIKE '%".$location."%' OR rest_Name LIKE '%".$rest_Name."%' OR cuisine LIKE '%".$cuisine."%'";   
    if( !empty($location)){
     $query = "Select * from restaurant where rest_Street LIKE '%".$location."%'";
    }
    elseif( !empty($rest_Name)){
        $query = "Select * from restaurant where rest_Name LIKE '%".$rest_Name."%'";
    }
    elseif( !empty($cuisine)){
        $query = "Select * from restaurant where cuisine LIKE '%".$cuisine."%'";
    }
    elseif(empty($location)){
        $query = "SELECT * FROM restaurant WHERE rest_Name LIKE '%".$rest_Name."%' OR cuisine LIKE '%".$cuisine."%'"; 
    }
    else{
$query = "SELECT * FROM restaurant WHERE rest_Street LIKE '%".$location."%' OR rest_Name LIKE '%".$rest_Name."%' OR cuisine LIKE '%".$cuisine."%'"; 
    }

    // execute query
		$sql = $db->query($query);
     // num_rows will count the affected rows base on your sql query. so $n will return a number base on your query
		$n = $sql->num_rows;

		if($n > 0) {
             while ($row = $sql->fetch_assoc())      {  
        
                 session_id('restDetail');
                 session_start();
                 $_SESSION['SESSION_REST_NAME'] = $row["rest_Name"];
                $_SESSION['SESSION_REST_SHOP'] = $row["rest_ShopNo"];
               $_SESSION['SESSION_REST_STREET'] = $row["rest_Street"];
                $_SESSION['SESSION_REST_CITY'] = $row["rest_City"];
               $_SESSION['SESSION_REST_STATE'] = $row["rest_State"];
               $_SESSION['SESSION_REST_ZIP'] = $row["rest_zip"];
               $_SESSION['SESSION_REST_PHONE'] = $row["rest_Phone"];
                $_SESSION['SESSION_REST_URL'] = $row["rest_URL"];
                $_SESSION['SESSION_REST_DESCRIPTION'] = $row["rest_Description"];   
                   $_SESSION['SESSION_REST_OPEN'] = $row["open_Time"];
                   $_SESSION['SESSION_REST_CLOSE'] = $row["close_Time"];
                   $_SESSION['SESSION_REST_CUISINE'] = $row["cuisine"];
                 			session_write_close();
                 $id = $row["rest_ID"];

    ?>
        
<div class="Popular-Restaurants-content">
		<div class="Popular-Restaurants-grids">
			<div class="container">
				<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">
					<div class="col-md-3 restaurent-logo">
						<img src="images/italian_cuisine.jpeg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-2 restaurent-title">
						<div class="logo-title">
							<h4><a href="rest_Detail_Admin.php?restid=<?php echo $id; ?>"> <?php echo $row["rest_Name"];  ?> </a></h4>
                        </div>
						<div class="company_ad">
                            <span><?php echo $row["rest_ShopNo"] ." ". $row["rest_Street"]; ?></span><br>
                            <span><?php echo $row["rest_City"] ."-".$row["rest_zip"]; ?></span><br>
                            <span><?php echo  $row["open_Time"] ." -". $row["close_Time"]; ?></span><br>
                            <span><a href="review.php?restname=<?php echo $row["rest_Name"];  ?>&restid=<?php echo $row["rest_ID"];?>"> Write Review </a></span>
                            </div>
                        	</div>
					<div class="clearfix"></div>
				</div>
				</div>
			</div>
		</div>

    
<?php        }     
        }
}
    ?>	


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
</html>