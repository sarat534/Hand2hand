<?php
include "connectioncreation.php";
session_start();
?>
<?php
if (logged_in() == true)
{
	$session_user_id = $_SESSION['uid'];
	$user_data=user_data($session_user_id);
}
function logged_in()
{
	return (isset($_SESSION['uid'])) ? true : false;
}

function user_data($uid)
{
	
	$qry="select * from register where uid = $uid";
	//echo $uid;
	$qry1=mysql_query($qry);
	//echo $qry1;
	if(!$qry1)
	{
		die(mysql_error());
	}
	$qry2=mysql_fetch_array($qry1);
	
	//echo "entered";
	//echo $qry2[0];
?>

<html>
<head>
	<title>Hand2Hand</title>
	<link rel="icon" type="image/jpg" href="logo.jpg">
</head>
<body bgcolor="azure">
<article>
	<header>
		<h3 align="center">Account Settings</h3>
	</header>
	<h4 align="center">Update Your Profile Information Here</h4>
	<div align="center">
				<form method="post" action="accsettings.php">
					<ul style="list-style-type:none;">
						<li style="padding:5px">
							Username<br>
							<input type="text" name="uname" value="<?php echo $qry2[1];?>" autofocus>
						</li>
						<li style="padding:5px">
							Email<br>
							<input type="text" name="email" value="<?php echo $qry2[3];?>">
						</li>
						<li style="padding:5px">
							Phone<br>
							<input type="text" name="phno" value="<?php echo $qry2[5];?>">
						</li>
						<li style="padding:5px">
							Address<br>
							<input type="text" name="addr" value="<?php echo $qry2[8];?>">
						</li>
						<li style="padding:5px">
							<input type="submit" name="set_submit" value="update">
						</li>
					</ul>
				</form>
	</div>
</article>
</body>
</html>
<?php
}

if(isset($_REQUEST['set_submit']))
{
	$uname=$_REQUEST['uname'];
	$email=$_REQUEST['email'];
	$phno=$_REQUEST['phno'];
	$addr=$_REQUEST['addr'];
	$query1="UPDATE `register` SET `user_name`='$uname',`email`='$email',`phone`='$phno',`address`='$addr' WHERE `uid`='$session_user_id'";
	//echo $query1;
	$query=mysql_query($query1);
	if(!$query)
	{
		die(mysql_error());
	}
	else
	{
		echo "entered";
		header("Refresh:0");
	}
}
?>