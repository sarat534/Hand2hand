<?php
	include "connectioncreation.php";
	
	function output_errors($errors)
	{
		return '<ul><li>' . implode('</li><li>', $errors). '</li></ul>';
	}
?>

<?php
$errors=array();
$user=$_POST['u_name'];
$nwpd=$_POST['new_pwd'];
$query=mysql_query("SELECT * FROM `register` where user_name='$user'");					//looks for the user with the given id in the database
$numrows = mysql_num_rows($query);														//finds the number of rows related to the query
	
if($numrows!=0)																			//if there are related rows then the login code will be executed
{
	while ($row = mysql_fetch_assoc($query))											//fetches the entire row as an array
	{
		$dbuname = $row['user_name'];													//store the email and password fromm database into variables
		$dbpwd = $row['password'];
	}
}

if(empty($_POST)==false)
{
	$reqd_fields=array('u_name','cur_pwd','new_pwd','re_new_pwd');
	foreach($_POST as $key=>$value)
	{
		if(empty($value) && in_array($key, $reqd_fields) == true)
		{
			$errors[]='The Marked Fields are Mandatory';
			break 1;
		}
		if(strlen($_POST['new_pwd']) < 6 || strlen($_POST['new_pwd']) > 20)
		{
			$errors[]='Your password must contain a minimum of 6 and a maximum of 20 characters';
		}
		if($_POST['new_pwd'] != $_POST['re_new_pwd'])
		{
			$errors[]='Oops! The re-entered password does not match your new password.';
		}
	}
	
}

if(empty($_POST) == false && empty($errors) == true)
{
	if($_POST['u_name'] == $dbuname && $_POST['cur_pwd'] == $dbpwd)
	{
		$query1=mysql_query("UPDATE `register` SET password='$nwpd' WHERE user_name='$user'");
		if(!$query1)
			die(mysql_error());
		else
			echo"password has been changed successfully";
	}
	else
		echo "you have entered invalid username or password";
}
else
{
	echo output_errors($errors);
}
?>