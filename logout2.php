<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['ID']);
	unset($_SESSION['NAME']);
?>

<!DOCTYPE html><html lang="en" class="default">
<head>

<script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<title>FimenDell &raquo; Beta Testing On The Fly</title>

<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" /><meta name="x-deployment-id" content="" /><meta name="x-deployment-node" content="fe3.as.RoadCnBapp.com" /><link rel="shortcut icon" href="https://d3qktfj96j46kx.cloudfront.net/osage78/img/favicon.ico"><link rel="apple-touch-icon-precomposed" href="https://d3qktfj96j46kx.cloudfront.net/osage78/img/icon-152.png" /><link href="style/signup.css" rel="stylesheet" type="text/css" /></head>

<body class='' style="background:url('images/background.jpg') !important"> 
<h2 style="color:white !important; text-align:center !important;">You are Logged Out!</h1>

<div class='container-fluid'><div class="content nohead grid">
<a href="/" title="RoadCnB Home"><div id="brandlarge">
<h1>FimenDell</h1><p></p></div></a><!-- Modal Container --><div class="modalcontainer thinbase login"><div class="modalcontainer-header">
<h3>Login to FimenDell</h3></div><div class="modalcontainer-body">
<form action='check.php' method='post'>
<div style='display:none'>

<input type='hidden' name='csrfmiddlewaretoken' value='6b336f6784444d49630b348f761d7ca6' /></div><fieldset><!-- Field --><div class="clearfix ">
<input id="id_username" class="required span5" type="name" autocorrect="off" autocapitalize="off" maxlength="75" name="username" placeholder="Email"></div><!-- /row --><!-- Field -->
<div class="clearfix " style="margin-bottom:0">
<input id="id_password" type="password" name="password" placeholder="Password" class="span5"></div><!-- /row --></fieldset><div class="pull-right"><input type='submit' class='btn primary wide' value='Login &raquo;' /></div><div class="linkalign">Don't have an account? <a href="signup.html">Sign Up &raquo;</a></div></form></div><!-- /modalcontainer-body --></div><!-- /modalcontainer --><div class="center">
    </div></div></div>
    
    <script   type="text/javascript" src="js/sign.js" charset="utf-8"></script>
	</body></html>