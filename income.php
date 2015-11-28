<?php
	require_once('auth.php');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/basestyle.css">
		<link rel="stylesheet" type="text/css" href="style/pure.css">
		<link rel="stylesheet" type="text/css" href="style/signup.css">
		<title>HomeStop User Income </title>
	</head>
	<body>
		<div class="header" align=center>
		<div class="pure-g-r homebody">
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=left><h2><a href="home.php">Home Page</a></h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h1>User Income</h1></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2>Welcome <?php echo $_SESSION['NAME']; ?></h2></div></div>
				
				<div class="pure-u-1-3"></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h2>Income brought by each rented warehouse</h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2><a href="logout2.php">Logout</a></h2></div></div>			
			</div>	
		</div>
		
		<div class="pure-g-r hotelbody">

<!-- query to be executed
mysql> select * from
(select distinct(t.userid), name as guest from customer c, travelinfo t where c.userid=t.userid) as name1
NATURAL JOIN
(select t.userid, c.userid as lord, staystart, stayend, price*(stayend-staystart) as income
from travelinfo t, home h, customer c where h.homeid=t.homeid and h.ownerid=c.userid and t.homeid is not null) as name2;

	 
	 we will be using c.userid which will be added to both where clauses
	 we will be displaying image(obtained from imgurl), staystart, stayend and income
-->		
		<?php
		
		$con=mysql_connect("localhost","root","");

		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("roadcnb",$con);
		$query="select guest, staystart, stayend, income, imgurl
		from (select distinct(t.userid), name as guest from customer c, travelinfo t where c.userid=t.userid) as name1
		NATURAL JOIN
		(select t.userid, c.userid as lord, staystart, stayend, price*(stayend-staystart) as income, imgurl
     from travelinfo t, home h, customer c where h.homeid=t.homeid and h.ownerid=c.userid and t.homeid is not null and c.userid=".$_SESSION['ID'].") as name2";
		$total=0;
		$result=mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){			
			$total=$total+$row['income'];
		}
		echo '<div class="pure-u-1-2 white"><h1 align="left" ><div class="white">Total Income = '.$total.'</div></h1></div><br/><br/>';
		$result=mysql_query($query) or die(mysql_error());	
		while($row = mysql_fetch_assoc($result)){			
			echo '<br/>
				<div class="pure-g-r homebody">
					<div class="pure-u-1-1 white">
						<div class="pure-u-1-2 white">
							<div class="pure-u-1-1 white"><img class="hotelimg" src="'.$row['imgurl'].'"/></div>
						</div>
						<div class="pure-u-1-2 white">
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>GUEST: '.$row['guest'].'</div></h2></div>
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>FROM: '.$row['staystart'].'</div></h2></div>
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>TO: '.$row['stayend'].'</div></h2></div>
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>INCOME: '.$row['income'].'</div></h2></div>
						</div>
					</div>
				</div>
				'; 
		}
				
		
		?>
		</div>
	</body>
</html>