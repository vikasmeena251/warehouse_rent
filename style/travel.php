<?php
	require_once('auth.php');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/basestyle.css">
		<link rel="stylesheet" type="text/css" href="style/pure.css">
		<link rel="stylesheet" type="text/css" href="style/signup.css">
		<title><?php echo $_GET['name']; ?> &raquo; Hotels and Homes </title>
	</head>
	<body>
		<div class="header" align=center>
		<div class="pure-g-r homebody">
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=left><h2><a href="home.php">Home Page</a></h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h1>Available hotels and homes in <?php echo $_GET['name']; ?></h1></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2>Welcome <?php echo $_SESSION['NAME']; ?></h2></div></div>
				
				<div class="pure-u-1-3"></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h2>Please choose the place you want to stay at</h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2><a href="logout2.php">Logout</a></h2></div></div>			
			</div>	
		</div>
		
		<h1><div class="white">Hotels</div></h1>
		<div class="pure-g-r hotelbody">
		<?php
		
		$con=mysql_connect("localhost","root","");

		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("roadcnb",$con);
		$cid=$_GET['id'];
		$query="SELECT * FROM hotel WHERE cityid=".$cid."";
		
		$result=mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){			
			echo '<div class="pure-u-1-2 hotelname">
				<div class="pure-u-1-1 white"><img class="hotelimg" src="images/hotel/'.$row['hotelid'].'.jpg"/></div>
				<div class="pure-u-1-2 white"><h1> '.$row['hotelname'].'</h1></div><div class="pure-u-1-2 white"><h2>CHAIN: '.$row['chain'].'</h2></div>
				<div class="pure-u-1-2 white"><div style="color:#00b0ff !important; display:inline-block !important; line-height:24px !important; font-size: 24px; font-weight: bold;">&#8377;'.$row['price'].' </div> <div style="font-size:18px;">Per Night</div></div><div class="pure-u-1-2 white"><div class="rating-star-'.$row['rating'].'"></div></div>
				<div class="pure-u-1-1 white" style="margin-left:184px !important;"><a href="book.php?$type=hotel&$hid='.$row['hotelid'].'&$cityid='.$cid.'"><input type="button" value="Yes this is where I want to stay" /></a></div>		
			</div>'; 
			
		}
		?>
		</div>	
		
			<br>
			<hr>
		<h1><div class="white">Homes</div></h1>
		<div class="pure-g-r homebody">
			<?php
		
		$con=mysql_connect("localhost","root","");

		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("roadcnb",$con);
		$cid=$_GET['id'];
		$query="SELECT * FROM home WHERE cityid=".$cid."";
		$result=mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_assoc($result))
		{
			echo '<div class="pure-u-1-2 homename">
				<div class="pure-u-1-1 white"><img class="homeimg" src="images/home/'.$row['homeid'].'.jpg"/></div>
				<div class="pure-u-1-1 white"><h2>DESCRIPTION:     	 '.$row['description'].'<h2></div>
				<div class="pure-u-1-2 white"><div style="color:#00b0ff !important; display:inline-block !important; line-height:24px !important; font-size: 24px; font-weight: bold;">&#8377;'.$row['price'].' </div><div style="font-size:18px;">Per Night</div> </div>
				<div class="pure-u-1-1" style="margin-left:184px;"><a href="book.php?$type=home&$hid='.$row['homeid'].'&$cityid='.$cid.'"><input type="button" value="Yes this is where I want to stay" /></a></div>				
				<br/>
			</div>';
		}
		?>	
		</div>
	</body>
</html>