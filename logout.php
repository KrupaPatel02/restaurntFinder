<?php
session_id("login");
session_start();
$username = $_SESSION['SESS_FIRST_NAME'];
session_destroy();
setcookie($username, "", time()-3600);
header("Location: login.php");
exit;
?>