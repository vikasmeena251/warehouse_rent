<?php
	require_once('auth.php');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/basestyle.css">
		<link rel="stylesheet" type="text/css" href="style/pure.css">
		<link rel="stylesheet" type="text/css" href="style/signup.css">
		<title> FimenDell Home Page </title>
	</head>
	<body>
		<div class="header" align=center>
			<div class="pure-g-r homebody">
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=left><h2><a href="home.php">Home Page</a></h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h1>Welcome to FimenDell - Find Your Warehouse</h1></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2>Welcome <a href="change.html"><?php echo $_SESSION['NAME']; ?></a></h2></div></div>
				
				<div class="pure-u-1-3"></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h2>So what do you want to do today?</h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2><a href="logout2.php">Logout</a></h2></div></div>			
			</div>
		</div>
		<div class="pure-g-r homebody">
			<div class="pure-u-1-2"><div class="pure-u-1-1"><a href="city.php"><img class="cityimg" src="images/homepage/plantrip.jpg"/></a></div></div>
			<div class="pure-u-1-2"><div class="pure-u-1-1"><a href="listhome.php"><img class="cityimg" src="images/homepage/listhome.jpg"/></a></div></div>
			<div class="pure-u-1-2"><div class="pure-u-1-1"><a href="income.php"><img class="cityimg" src="images/homepage/viewincome.jpg"/></a></div></div>
			<div class="pure-u-1-2"><div class="pure-u-1-1"><a href="travelhistory.php"><img class="cityimg" src="images/homepage/viewhistory.jpg"/></a></div></div>
		</div>
		<div align=center class="footer white"><h2><div class="white"> Copyright &copy FimenDell - 2015 - Developed by Vikas Meena and Prabhat Bhattarai</div></h2></div>
	</body>
</html>