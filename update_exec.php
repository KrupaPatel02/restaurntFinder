<?php
	//Start session
   session_id("login");
	session_start();
$id=$_SESSION['SESS_MEMBER_ID'];

if(isset($_POST[delete_profile])){
                    $db = new mysqli("localhost","root","root","foodfinder");
        $query = "DELETE from user where user_id = '$id'";
		$sql = $db->prepare($query);
        $sql->execute();
	
	if($sql->affected_rows > 0) {
			//Login Successful
			$errmsg_arr[] = 'Updation Successfull';
            include("index.php");
		}else {
				session_write_close();
				include("updateProfile.php");
				exit();
			}
                  }
    else {
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
 
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
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

	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		include("updateProfile.php");
		exit();
	}
     $db = new mysqli("localhost","root","root","foodfinder");
 
		// create query
//		$query = "INSERT INTO user(email_id, user_fname, user_lname,dob,password,role) VALUES('$email', '$firstname', '$lastname', '$dob', '$password','$role')";
        $query = "UPDATE user SET email_id='$email',user_fname='$firstname',user_lname='$lastname',dob='$dob' WHERE user_id=$id";
		// execute query
		$sql = $db->prepare($query);
        $sql->execute();
	
	if($sql->affected_rows > 0) {
         if( $_SESSION['SESS_ROLE'] = admin){
             include("home_user.php");
         }
			//Login Successful
			$errmsg_arr[] = 'Updation Successfull';
            include("home.php");
		}else {
			//Login failed
			$errmsg_arr[] = "Updation unsuccessful";
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				include("updateProfile.php");
				exit();
			}
		}
    }
?>
