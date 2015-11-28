<?php
	require_once('auth.php');
	if(isset($_SESSION['ID']))
	{
	header("location: home.php");
		exit();
	}
	else
	{header("location: signin.html");
		exit();
	}
?>