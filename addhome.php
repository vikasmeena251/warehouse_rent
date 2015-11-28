
<?php
require_once('auth.php');
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

$price1=$_POST['price'];
$rooms=$_POST['rooms'];
$des=$_POST['desc'];
$oid=$_SESSION['ID'];
$cid=$_POST['cityid'];
$maxi=mysql_query("SELECT MAX(homeid) FROM home");
$max1=mysql_fetch_assoc($maxi);
$fn=$max1['MAX(homeid)']+1;
$name = $_FILES["homepic"]["name"];
$ext = end(explode(".", $name));
 //$info = pathinfo($_FILES['homepic']['name']);
 //$ext = $info['extension']; // get the extension of the file
 //$path_parts['extension'];
 $newname = $fn.'.'.$ext; 
 echo $newname;
 $target = 'images/home/'.$newname;
 move_uploaded_file( $_FILES['homepic']['tmp_name'], $target);


$s2="INSERT INTO home(ownerid,price,description,capacity,cityid,imgurl) VALUES('$oid','$price1','$des','$rooms','$cid','$target')";
//FOR MEMBERS WHO ARE SIGNING UP
if(!mysql_query($s2,$con))
{
 die('error'.mysql_error());
}
	echo "DONE";
	header( 'Location: home.php?comm=added' );
  //exit();

mysql_close($con);

?>
