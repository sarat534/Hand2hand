<?php
	include "connectioncreation.php";
	
	function sanitize($data)
	{
		return mysql_real_escape_string($data);
	}
	
	function user_exists($u_name)
	{
		$su_name=sanitize($u_name);
		$query=mysql_query("SELECT COUNT(`uid`) FROM `register` WHERE `user_name`='$u_name'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function email_exists($email)
	{
		$semail=sanitize($email);
		$query=mysql_query("SELECT COUNT(`uid`) FROM `register` WHERE `email`='$semail'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function output_errors($errors)
	{
		return '<ul><li>' . implode('</li><li>', $errors). '</li></ul>';
	}
?>	
<?php
/*
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
*/
$errors=array();
if(empty($_POST)==false)
{
	$u_name=$_POST['user_name'];
	$pno=$_POST['p_number'];
	$email=$_POST['email'];
	$pwd=$_POST['password'];
	$phno=$_POST['phone'];
	$sx=$_POST['sex'];
	$dob=$_POST['birthday'];
	$addr=$_POST['address'];
	$reqd_fields=array('user_name','p_number','email','password','cpwd','phone');
	foreach($_POST as $key=>$value)
	{
		if(empty($value) && in_array($key, $reqd_fields) == true)
		{
			$errors[]='The Marked Fields are Mandatory';
			break 1;
		}	
	}
	if(empty($errors)==true)
	{
		if(user_exists($u_name)==true)						//too much time consuming due to some errors
		{
			$errors[]='sorry, the username \'' . $u_name . '\' is already taken';
		}
		if(preg_match("/\\s/", $u_name)==true)
		{
			$errors[]='Your username should not contain any spaces';
		}
		if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 20)
		{
			$errors[]='password must contain a minimum of 6 and a maximum of 20 characters';
		}
		if($_POST['password'] != $_POST['cpwd'])
		{
			$errors[]='Oops! Looks like your passwords do not match';
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL)===false)
		{
			$errors[]='Enter a valid email address';
		}
		if(email_exists($email)==true)
		{
			$errors[]='sorry, the email \'' . $email . '\' is already in use';
		}
	}
}

if(empty($_POST) == false && empty($errors) == true)
{
	//register the user
	$q=mysql_query("INSERT INTO `register` (`user_name`, `p_number`, `email`, `password`, `phone`, `sex`, `birthday`, `address`) VALUES ('$u_name','$pno','$email','$pwd','$phno','$sx','$dob','$addr')");
	if(!$q)
		die(mysql_error());
	else
		echo"inserted";
	header("location:login.html");
}
else
{
	//print the errors
	echo output_errors($errors);
}
?>
