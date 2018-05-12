<?php
	//Start session
	session_start();
    

	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		echo "str: ".$str;
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$rest_name = $_POST['rest_name']; 
    $rest_url = $_POST['rest_url'];
    $rest_opentime  = $_POST['rest_opentime'];
    $rest_closetime = $_POST['rest_closetime']; 
   $rest_shopNo = $_POST['rest_shopNo'];
  $rest_street = $_POST['rest_street'];
$rest_city = $_POST['rest_city']; 
    $rest_state = $_POST['rest_state'];
    $rest_zip  = $_POST['rest_zip'];
    $rest_phone = $_POST['rest_phone']; 
  $rest_description = $_POST['rest_description'];
$cuisine = $_POST['cuisine'];
$id = $_POST['user_id'];
$rest_map = $_POST['rest_map'];

 
	//Input Validations
	if($rest_name == '') {
		$errmsg_arr[] = 'Restaurant Name missing';
		$errflag = true;
	}
	if($rest_url == '') {
		$errmsg_arr[] = 'Restaurant Url missing';
		$errflag = true;
	}
if($rest_shopNo == '') {
		$errmsg_arr[] = 'Restaurant Shop No missing';
		$errflag = true;
	}
if($rest_street == '') {
		$errmsg_arr[] = 'Restaurant Street missing';
		$errflag = true;
	}
if($rest_zip == '') {
		$errmsg_arr[] = ' Restaurant Zip missing';
		$errflag = true;
	} 
if($rest_city == '') {
		$errmsg_arr[] = ' Restaurant City missing';
		$errflag = true;
	}
if($rest_state == '') {
		$errmsg_arr[] = ' Restaurant State missing';
		$errflag = true;
	} 
if($rest_phone == '') {
		$errmsg_arr[] = ' Restaurant Phone missing';
		$errflag = true;
	} 
if($cuisine == '') {
		$errmsg_arr[] = ' Restaurant Cuisine missing';
		$errflag = true;
	} 
if($rest_map == '') {
		$errmsg_arr[] = ' Restaurant Map Link missing';
		$errflag = true;
}
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		include("restaurantDetails.php");
		exit();
	} 
$db = new mysqli("localhost:3306","root","root","foodfinder");
//   $db = mysqli_connect("localhost ","root","root","foodfinder");
if ($db->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
else{
    $query = "INSERT INTO `restaurant` (`rest_Name`, `rest_ShopNo`, `rest_Street`, `rest_City`, `rest_State`, `rest_zip`, `rest_Phone`, `rest_Description`, `open_Time`, `close_Time`, `rest_URL`, `cuisine`, `user_id`,`rest_map`) VALUES ('$rest_name' , '$rest_shopNo' , '$rest_street' , '$rest_city' , '$rest_state' , '$rest_zip' , '$rest_phone' , '$rest_description' , '$rest_opentime' , '$rest_closetime' , '$rest_url' , '$cuisine' , '$id' , '$rest_map')";
    
     $sql = $db->prepare($query);
        $sql->execute();
		
	if($sql->affected_rows > 0) {
			//Login Successful
			$errmsg_arr[] = 'Registration Successfull.';
            include("home_user.php");
		}else {
			//Login failed
			$errmsg_arr[] = "Registration unsuccessful";
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("restaurantDetails.php");
				exit();
			}
		}
}

?>
