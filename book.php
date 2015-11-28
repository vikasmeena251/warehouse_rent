<?php
require_once('auth.php');
if(!isset($_POST['submit']))
{
session_regenerate_id();
$_SESSION['type']=$_GET['type'];
$_SESSION['hid']=$_GET['hid'];
$_SESSION['cid']=$_GET['cityid'];
session_write_close();
}
?>
<?php

if(isset($_POST['submit'])) 
{

	$con=mysql_connect("localhost","root","");

		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("roadcnb",$con);
$uid=$_SESSION['ID'];

$date1=$_POST["demo1"]; 
$date2=$_POST['demo2'];

$type=$_SESSION['type'];
$cid=$_SESSION['cid'];
$hid=$_SESSION['hid'];
$d1=explode("-",$date1);
$d2=explode("-",$date2);
$flag=0;


switch($d1[1])
{
	case "Jan":$d1[1]=01;break;
	case "Feb":$d1[1]=02;break;
	case "Mar":$d1[1]=03;break;
	case "Apr":$d1[1]=04;break;
	case "May":$d1[1]=05;break;
	case "Jun":$d1[1]=06;break;
	case "Jul":$d1[1]=07;break;
	case "Aug":$d1[1]=08;break;
	case "Sep":$d1[1]=09;break;
	case "Oct":$d1[1]=10;break;
	case "Nov":$d1[1]=11;break;
	case "Dec":$d1[1]=12;break;
}

switch($d2[1])
{
	case "Jan":$d2[1]=01;break;
	case "Feb":$d2[1]=02;break;
	case "Mar":$d2[1]=03;break;
	case "Apr":$d2[1]=04;break;
	case "May":$d2[1]=05;break;
	case "Jun":$d2[1]=06;break;
	case "Jul":$d2[1]=07;break;
	case "Aug":$d2[1]=08;break;
	case "Sep":$d2[1]=09;break;
	case "Oct":$d2[1]=10;break;
	case "Nov":$d2[1]=11;break;
	case "Dec":$d2[1]=12;break;
}

$inp1=$d1[2]."-".$d1[1]."-".$d1[0];


$inp2=$d2[2]."-".$d2[1]."-".$d2[0];


if(($d2[0]<=$d1[0])&&($d2[1]>$d1[1]))
{
	
	
}
else
if(($d1[1]==$d2[1])&&($d1[0]<=$d2[0]))
{
	
}
else
if($d1[1]<$d2[1])
{
	
}
else
if($d1[2]<$d2[2])
{
	
}
else
{
$flag=1;
$err="ERROR";

		header("location: book.php?success=0&type=".$_SESSION['type']."&cityid=".$_SESSION['cid']."&hid=".$_SESSION['hid']."");
		exit();
		
}
if($flag==0&&$_GET['success']==1)
{

if($type=='hotel')
{
$sql="INSERT INTO travelinfo(userid,cityvisitid,hotelid,homeid,staystart,stayend) VALUES('$uid','$cid','$hid','NULL','$inp1','$inp2')";
mysql_query($sql,$con);
}
else
if($type=='home')
{
$sql="INSERT INTO travelinfo(userid,cityvisitid,hotelid,homeid,staystart,stayend) VALUES('$uid','$cid','NULL','$hid','$inp1','$inp2')";
mysql_query($sql,$con);
			
}
header("location: booking-success.html");
			exit();
}
}
?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="style/basestyle.css">
		<link rel="stylesheet" type="text/css" href="style/pure.css">
		<link rel="stylesheet" type="text/css" href="style/signup.css">
				<link href="style/popup.css" rel="stylesheet" type="text/css" media="all" />
				<script type="text/javascript" src="js/popup.js"> </script>
		<script type="text/javascript" src="js/script.js"></script>
		<title>Booking &raquo; Hotels and Homes </title>
	

<script language="javascript" type="text/javascript" src="js/datetimepicker.js">

</script>

</head>
<body>
<div class='container-fluid'><div class="content nohead grid">
<a href="/" title="RoadCnB Home"><div id="brandlarge">
<h1>RoadCnB</h1><p></p></div></a><!-- Modal Container --><div class="modalcontainer thinbase login"><div class="modalcontainer-header">
<h3>Choose the Dates and Book</h3></div><div class="modalcontainer-body">
<form action="<?php echo $_SERVER['PHP_SELF'].'?success=1'	; ?>" method='post'>
<div style='display:none'>

<input type='hidden' name='csrfmiddlewaretoken' value='6b336f6784444d49630b348f761d7ca6' /></div><fieldset><!-- Field --><div class="clearfix ">
<input name="demo1" type="Text" id="demo1" maxlength="25" size="25"class="required span5" autocorrect="off" autocapitalize="off" maxlength="75" name="username" placeholder="Check-in Date"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br>
	  		<span class="descriptions">pick a date..</span></div><!-- /row --><!-- Field -->
<div class="clearfix " style="margin-bottom:0">
<input name="demo2" type="Text" id="demo2" maxlength="25" size="25"class="required span5" autocorrect="off" autocapitalize="off" maxlength="75" name="username" placeholder="Check-out Date"><a href="javascript:NewCal('demo2','ddmmmyyyy',true,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br>
	  		<span class="descriptions">pick a date..</span></div><!-- /row --><!-- Field -->
<div class="clearfix " style="margin-bottom:0">
<br>
<input type="submit" value="Book" name="submit">
</div><!-- /row --></fieldset><!-- /modalcontainer --><div class="center">
    </div></form></div></div>
	<?php if($_GET['success']==0)
	echo '<div id="topopup1">
        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content"> <!--your content start-->
					<h1 align="center">SELECT CORRECT DATES | <a href="travel.php">GO BACK TO CHANGE YOUR PLANS</a></h1>
        </div> <!--your content end-->
    </div> <!--toPopup end-->

	<div class="loader"></div>
   	<div id="backgroundPopup"></div>';
	?>
</body>
    <script   type="text/javascript" src="js/sign.js" charset="utf-8"></script>
	  		
	  	


</body>
</html>
