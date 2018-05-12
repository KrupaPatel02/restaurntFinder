<?php
	//Start session
session_id('restDetail');
session_start();

$id =  $_GET["restid"];
 
	if(isset($_POST['delete_rest'])){
        $db = new mysqli("localhost","root","root","foodfinder");
        $query = "DELETE FROM restaurant WHERE rest_ID = '$id'";
		$sql = $db->query($query);
        
	
	if($sql->affected_rows > 0) {
			$errmsg_arr[] = ' Successfull Removal';
            include("home_user.php");
		}else {
				session_write_close();
				include("restList.php");
				exit();
			}
                  }
else{
 
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
	$rest_name = $_POST['rest_name']; // get name value
    $rest_url = $_POST['rest_url'];
    $rest_opentime  = $_POST['rest_opentime'];
    $rest_closetime = $_POST['rest_closetime']; // get name value
   $rest_shopNo = $_POST['rest_shopNo'];
  $rest_street = $_POST['rest_street'];
$rest_city = $_POST['rest_city']; // get name value
    $rest_state = $_POST['rest_state'];
    $rest_zip  = $_POST['rest_zip'];
    $rest_phone = $_POST['rest_phone']; // get name value
  $rest_description = $_POST['rest_description'];
$cuisine = $_POST['cuisine'];

 
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

	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		include("restaurantDetails.php");
		exit();
	}
     $db = new mysqli("localhost:3306","root","root","foodfinder");
 if ($db->connect_error) {
               die("Connection failed: " . $db->connect_error);
            } 
else{
  
//		$query = "UPDATE restaurant SET rest_Name='$rest_name',rest_ShopNo='$rest_shopNo',rest_Street='$rest_street',rest_City='$rest_city',rest_State='$rest_state',rest_zip='$rest_zip',rest_Phone='$rest_phone',rest_Description='$rest_description',rest_URL='$rest_url',open_Time='$rest_opentime',close_Time='$rest_closetime',cuisine='$cuisine' WHERE rest_ID='$id'";
    
        $query = "UPDATE restaurant SET rest_Name='$rest_name',rest_ShopNo='$rest_shopNo',rest_Street='$rest_street',rest_City='$rest_city',rest_State='$rest_state',rest_zip='$rest_zip',rest_Phone='$rest_phone',rest_Description='$rest_description',rest_URL='$rest_url',open_Time='$rest_opentime',close_Time='$rest_closetime',cuisine='$cuisine' WHERE rest_ID='$id'";
 
		// execute query
		$sql = $db->prepare($query);
        $sql->execute();
	
	if($sql->affected_rows > 0) {
			$errmsg_arr[] = 'Update Successfull.';
            include("home_user.php");
		}else {
			$errmsg_arr[] = "Update unsuccessful";
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("updateRestDetails.php");
				exit();
			}
		}
}
}
?>
