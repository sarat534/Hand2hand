<?php
	include "connectioncreation.php";
?>	
<?php
if(isset($_REQUEST['signupsub']))
{
	$n=$_REQUEST['uname'];
	$pno=$_REQUEST['pno'];
	$pwd=$_REQUEST['pwd'];
	$em=$_REQUEST['email'];
	$phno=$_REQUEST['phone'];
	$sx=$_REQUEST['sex'];
	$dobirth=$_REQUEST['date'];
	$addr=$_REQUEST['address'];
	$q="insert into register values ('$n','$pno','$pwd','$em','$phno','$sx','$dobirth','$addr')";
	$q1=mysql_query($q);
	if(!$q1)
		die(mysql_error());
	else
		echo"inserted";
	header("location:login.html");
}
?>
