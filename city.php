<?php
	require_once('auth.php');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/basestyle.css">
		<link rel="stylesheet" type="text/css" href="style/pure.css">
		<link rel="stylesheet" type="text/css" href="style/signup.css">
		<title> Cities </title>
	</head>
	<body>
		<div class="header" align=center>
			<div class="pure-g-r homebody">
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=left><h2><a href="home.php">Home Page</a></h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h1>Which city would you like to book in?</h1></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2>Welcome <?php echo $_SESSION['NAME']; ?></h2></div></div>

				<div class="pure-u-1-3"></div>			
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h2>Click a city to view available <!--hotels and--> Warehouse and homes</h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2><a href="logout2.php">Logout</a></h2></div></div>			
			</div>
		</div>
		<div class='pure-g-r citybody'>
		<?php
		$con=mysql_connect("localhost","root","");
		if (!$con)
		  die('Could not connect: ' . mysql_error());
		mysql_select_db("roadcnb",$con);
		$query="SELECT * FROM city";
		$result=mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
			echo "<div class='pure-u-1-3'>
				<div class='pure-u-1-1 cityname white' align=center>".$row['cityname']."</div>
				<div class='pure-u-1-1'><a href='travel.php?id=".$row['cityid']."&name=".$row['cityname']."'><img class='cityimg' src='images/city/".strtolower($row['cityname']).".jpg'/></a></div>
			</div>";
		} 			
		?>
		</div>
	</body>
</html>