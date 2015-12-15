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
	if(!$q1)
		die(mysql_error());
while($q2=mysql_fetch_array($q1))
{
	echo "entered";
	if($q2[2]==$pwd)
		echo $q2[0];
		echo $q2[1];
		echo $q2[2];
}
}
?>