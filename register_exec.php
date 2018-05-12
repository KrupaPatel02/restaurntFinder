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
	$firstname = $_POST['firstname']; // get name value
    $lastname = $_POST['lastname'];
    $email  = $_POST['username'];
    $dob = $_POST['dob']; // get name value
   $password = $_POST['password'];
  $confirmpwd = $_POST['confirmpwd'];
$role = $_POST['role'];
 
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
if($firstname == '') {
		$errmsg_arr[] = 'Firstname missing';
		$errflag = true;
	}
if($lastname == '') {
		$errmsg_arr[] = 'Lastname missing';
		$errflag = true;
	}
if($dob == '') {
		$errmsg_arr[] = 'Date of Birth missing';
		$errflag = true;
	} 
if($confirmpwd == '') {
		$errmsg_arr[] = 'Confirm Password missing';
		$errflag = true;
	}

if($confirmpwd != $password){
    $errmsg_arr[] = ' Password & Confirm Password do not match';
		$errflag = true;
}
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		include("register.php");
		exit();
	}
     $db = new mysqli("localhost","root","root","foodfinder");
 
		// create query
		$query = "INSERT INTO user(email_id, user_fname, user_lname,dob,password,role) VALUES('$email', '$firstname', '$lastname', '$dob', '$password','$role')";
 
		// execute query
		$sql = $db->prepare($query);
        $sql->execute();
	
	if($sql->affected_rows > 0) {
			//Login Successful
			$errmsg_arr[] = 'Registration Successfull.Goto Login';
            include("login.php");
		}else {
			//Login failed
			$errmsg_arr[] = "Registration unsuccessful";
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("register.php");
				exit();
			}
		}
?>
