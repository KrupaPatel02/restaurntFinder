<?php
	//Start session
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
	$user_name = $_POST['name']; // get name value
    $user_email = $_POST['email'];
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

$to = $user_email;
$headers  =  "From : ".$user_name;

if ( mail($to,$subject,$comment,$headers)){
    
     $db = new mysqli("localhost","root","root","foodfinder");
// create query
    $query = "INSERT INTO `contact`( `name`, `email`, `subject`, `message`, `rest_ID`, `user_id`) VALUES('$user_name','$user_email','$subject','$comment','$rest_ID','$userid')"; 
		// execute query
		$sql = $db->prepare($query);
        $sql->execute();
        $n = $sql->affected_rows;
	
	if($n > 0) {
			//Login Successful
			$errmsg_arr[] = 'Email Send Successfull';    
    
			include("home.php");
            exit();
            }

		else {
			//Login failed
			$errmsg_arr[] = "Email Send unsuccessful";
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("sendInvite.php");
				exit();
			}
		}
}

?>
