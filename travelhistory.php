<?php
	require_once('auth.php');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/basestyle.css">
		<link rel="stylesheet" type="text/css" href="style/pure.css">
		<link rel="stylesheet" type="text/css" href="style/signup.css">
		<title>FimenDell Booking History </title>
	</head>
	<body>
		<div class="header" align=center>
		<div class="pure-g-r homebody">
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=left><h2><a href="home.php">Home Page</a></h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h1>Booking History</h1></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2>Welcome <?php echo $_SESSION['NAME']; ?></h2></div></div>
				
				<div class="pure-u-1-3"></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=center><h2>Warehouse- where you've booked your storage at</h2></div></div>
				<div class="pure-u-1-3"><div class="pure-u-1-1" align=right><h2><a href="logout2.php">Logout</a></h2></div></div>			
			</div>	
		</div>
		
		<div class="pure-g-r hotelbody">

<!-- query to be executed
mysql> select
     cityname, hotelname as "place of stay", staystart, stayend, (h.price*(stayend-staystart)) as cost, imageurl
     from
     travelinfo t join city c join hotel h
     where c.cityid=t.cityvisitid and h.hotelid=t.hotelid and t.hotelid is not null
     union
     select
     cityname, concat(trim(name),"'s") as "place of stay", staystart, stayend, (h.price*(stayend-staystart)) as cost, imageurl
     from
     travelinfo t join city c join home h join customer u
     where
     c.cityid=t.cityvisitid and h.homeid=t.homeid and h.ownerid=u.userid and t.homeid is not null;
	 
	 we will be using userid which will be added to both where clauses
	 we will be displaying image(obtained from imageurl), cityname, place of stay, staystart, stayend and cost
-->		
		<?php
		
		$con=mysql_connect("localhost","root","");

		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("roadcnb",$con);
		$query="select cityname, hotelname as \"place_of_stay\", staystart, stayend, (h.price*(stayend-staystart)) as cost, imgurl
     from travelinfo t join city c join hotel h where c.cityid=t.cityvisitid and h.hotelid=t.hotelid and t.hotelid is not null and t.userid=".$_SESSION['ID'].
	 " union select cityname, concat(trim(name),\"'s\") as \"place_of_stay\", staystart, stayend, (h.price*(stayend-staystart)) as cost, imgurl
     from travelinfo t join city c join home h join customer u where c.cityid=t.cityvisitid and h.homeid=t.homeid
	 and h.ownerid=u.userid and t.homeid is not null and t.userid=".$_SESSION['ID']."";
		
		$result=mysql_query($query) or die(mysql_error());	
		while($row = mysql_fetch_assoc($result)){			
			echo '
				<div class="pure-g-r homebody">
					<div class="pure-u-1-1 white">
						<div class="pure-u-1-2 white">
							<div class="pure-u-1-1 white"><img class="hotelimg" src="'.$row['imgurl'].'"/></div>
						</div>
						<div class="pure-u-1-2 white">
							<div class="pure-u-1-2 white"><h1><div class="white" align=center>CITY: '.$row['cityname'].'</div></h1></div>
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>PLACE OF STORAGE: '.$row['place_of_stay'].'</div></h2></div>
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>FROM: '.$row['staystart'].'</div></h2></div>
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>TO: '.$row['stayend'].'</div></h2></div>
							<div class="pure-u-1-2 white"><h2><div class="white" align=center>COST: '.$row['cost'].'</div></h2></div>
						</div>
					</div>
				</div><br/><br/>
				'; 
		}
		?>
		</div>
	</body>
</html>