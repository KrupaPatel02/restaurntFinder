<?php
	//Start session
    session_id("login");
$member =  $_SESSION['SESS_ROLE'];
    session_start();
$rest_ID = $_GET["restid"];
$userid = $_GET["userid"];
 
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
	$user_name = $_POST['user_name']; // get name value
    $user_email = $_POST['user_email'];
    $subject  = $_POST['subject'];
    $comment = $_POST['message']; // get name value
   
 
	//Input Validations
	if($user_name == '') {
		$errmsg_arr[] = 'Name missing';
		$errflag = true;
	}
	if($user_email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
if($subject == '') {
		$errmsg_arr[] = 'Restaurant name missing';
		$errflag = true;
	}
if($comment == '') {
		$errmsg_arr[] = 'Comment missing';
		$errflag = true;
	}

	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		include("review.php");
		exit();
	}
     $db = new mysqli("localhost:3306","root","root","foodfinder");
 $date = date("Y-m-d");
		// create query
	$query = "INSERT INTO review(user_name,review_subject,review_email,comment,rest_ID,user_id,date) VALUES('$user_name', '$subject','$user_email','$comment','$rest_ID','$userid','$date')"; 
		// execute query
		$sql = $db->prepare($query);
        $sql->execute();
	
	if($sql->affected_rows > 0) {
			//Login Successful
			$errmsg_arr[] = 'Review Successfull';    
            session_id("review");
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['SESS_USER_NAME'] = $row["user_name"];
            $_SESSION['SESS_REVIEW_SUB'] = $row["review_subject"];
            $_SESSION['SESS_REVIEW_EMAIL'] = $row["review_email"];
            $_SESSION['SESS_COMMENT'] = $row["comment"];
            $_SESSION['SESS_REST_ID'] = $row["rest_ID"];
             $_SESSION['SESS_USER_ID'] = $row["user_id"];
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
			$errmsg_arr[] = "Review unsuccessful";
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("review.php");
				exit();
			}
		}

?>
