<?php
	include "connectioncreation.php";
?>	
<?php
if(isset($_REQUEST['signinsub']))
{
	$email=$_REQUEST['email'];
	
	$pwd=$_REQUEST['pwd'];
	echo "entered";
	
	$q="select password from register where email='$email'";
	$q1=mysql_query($q);
$q2=mysql_fetch_array($q1);
echo $q5[3];
if($q5[3]==$pwd)
{
	echo"authenticated user";
	header("location:catalogue.html");
}
else
{
	echo"not an authenticated user";
	header("location:register.html");
}
}
?>