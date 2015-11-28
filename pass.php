<html>
<body>

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

//FOR MEMBERS WHO ARE SIGNING UP

$opass=clean($_POST['password_old']);
$pass1=clean($_POST['password1']);
$retype=clean($_POST['password2']);
$query="SELECT password FROM customer WHERE (userid=".$_SESSION['ID'].") ";
$result=mysql_query($query); 
$done=mysql_fetch_array($result);
$newpass=md5($pass1);
if($retype!=$pass1)
echo "passwords don't match";
else if(md5($opass)!=$done['password'])
echo "Wrong Password";
else
{
  $sql="UPDATE customer SET password=".md5($newpass)." WHERE userid=".$_SESSION['ID']."";  
if(!mysql_query($sql,$con))
{
 die('error'.mysql_error());
}

  header( 'Location: home.php' );
  exit();



mysql_close($con);
}

?>

</body>
</html>