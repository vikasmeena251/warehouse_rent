<html>
<body>

<?php
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

//FOR MEMBERS WHO ARE SIGNING UP

$fname=clean($_POST['first_name']);
$lname=clean($_POST['last_name']);
$user=$fname.' '.$lname;
$pass=clean($_POST['password1']);
$eid=clean($_POST['email']);
$retype=clean($_POST['password2']);
$bug=clean($_POST['budget']);
$nat=clean($_POST['nat']);
$contact=clean($_POST['contact']);
$query="SELECT * FROM customer WHERE (email='$eid') ";
$result=mysql_query($query); 
if($retype!=$pass)
echo "passwords don't match";
else if(mysql_numrows($result)!=0)
echo "User already exists";
else
{
  $sql="INSERT INTO customer(name,email,password,nationality,budget,contact) VALUES('$user ' , '$eid'  , '".md5($_POST['password2'])."' , '$nat','$bug', '$contact')";

if(!mysql_query($sql,$con))
{
 die('error'.mysql_error());
}

  header( 'Location: register-success.html' );
  exit();



mysql_close($con);
}

?>

</body>
</html>