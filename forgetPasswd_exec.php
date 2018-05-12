<?php
	//Start session
	session_start();
 
	//Include database connection details
//	require_once('file:///Macintosh HD/Applications/MAMP/htdocs/php_test/connection.php');
 
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
	
    $email  = $_POST['username'];
   $password = $_POST['password'];
  $confirmpwd = $_POST['confirmpwd'];
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
if($confirmpwd == '') {
		$errmsg_arr[] = 'Confirm Password missing';
		$errflag = true;
	}
if($confirmpwd != $password) {
    $errmsg_arr[] = ' Password & Confirm Password do not match';
		$errflag = true;
}

	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		include("forgetPasswd.php");
		exit();
	}
     $db = new mysqli("localhost","root","root","foodfinder");
 
		// create query
		$query = "UPDATE user SET password='$password' where email_id='$email';";
 
		// execute query
		$sql = $db->prepare($query);
        $sql->execute();
	
	if($sql->affected_rows > 0) {
			$errmsg_arr[] = 'Updation Successfull.Goto Login';
            include("login.php");
		}else {
			$errmsg_arr[] = "Registration unsuccessful";
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("forgetPasswd.php");
				exit();
			}
		}
?>
