<?php
	//Start session
	session_start();
 
	//Include database connection details
//	require_once('connection.php');
 
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
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		include("login.php");
		exit();
	}
     $db = new mysqli("localhost","root","root","foodfinder");
 
		// create query
		$query = "SELECT * FROM user WHERE email_id='".$_POST['username']."' AND password='".$_POST['password']."'";
 
		// execute query
		$sql = $db->query($query);
		// num_rows will count the affected rows base on your sql query. so $n will return a number base on your query
		$n = $sql->num_rows;
	
	if($sql) {
		if($n > 0) {
			//Login Successful
			session_id("login");
			$member = mysqli_fetch_assoc($sql);
			$_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['user_fname'];
			$_SESSION['SESS_LAST_NAME'] = $member['password'];
            $_SESSION['SESS_EMAIL_ID'] = $member['email_id'];
            $_SESSION['SESS_DOB'] = $member['dob'];
            $_SESSION['SESS_ROLE'] = $member['role'];
            

			session_write_close();
            if ( $member['role'] == "admin") {
                    include("home_user.php");
            }
            else{
			include("home.php");
            }
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'user name and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("login.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>