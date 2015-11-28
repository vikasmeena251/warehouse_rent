<?php

//Start session
	session_start();
	

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
$con=mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("roadcnb",$con);

//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

$uname=clean($_POST['username']);
$pass=clean($_POST['password']);
//Input Validations
	if($uname == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($pass == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	
}
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: signin.html");
		exit();
	}
$query="SELECT * FROM customer WHERE email='$uname' AND password='".md5($_POST['password'])."'";
$result=mysql_query($query) or die(mysql_error());
//echo $query;
	
$count=mysql_numrows($result);
if($count==1)
{
	//Login Successful
			session_regenerate_id();
			$customer = mysql_fetch_assoc($result);
			$_SESSION['ID'] = $customer['userid'];
			$_SESSION['NAME'] = $customer['name'];
			session_write_close();
			header("location:home.php");
			exit();
}
else
{
			header("location:resignin.html");
			exit();
}

die(mysql_error());

?>