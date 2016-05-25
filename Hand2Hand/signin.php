<?php
	include "connectioncreation.php";
?>	

<?php
session_start();															//starts the user session

function sanitize($data)
	{
		return mysql_real_escape_string($data);
	}
function user_id_from_email($eid)
{
	$eid=sanitize($eid);
	return mysql_result(mysql_query("select `uid` from `register` where `email`='$eid'"), 0, 'uid');
}

?>

<?php
$eid = $_POST['email'];
$passwd = $_POST['pwd'];

if ($eid&&$passwd)
{
	$query = mysql_query("SELECT * FROM `register` where email='$eid'");	//looks for the user with the given id in the database
	$numrows = mysql_num_rows($query);										//finds the number of rows related to the query
	
	if($numrows!=0)															//if there are related rows then the login code will be executed
	{
		while ($row = mysql_fetch_assoc($query))							//fetches the entire row as an array
		{
			$dbemail = $row['email'];										//store the email and password fromm database into variables
			$dbpwd = $row['password'];
			$dbuser = $row['user_name'];
		}
		
		//checking if they match
		
		if($eid==$dbemail&&$passwd==$dbpwd)
		{
			echo "Congratulations. You are logged in!<br>";
			$uid = user_id_from_email($eid);
			$_SESSION['uid']=$uid;
			$_SESSION['user_id']=$dbuser;
			//echo $_SESSION['uid'];
			//echo "welcome!" .$_SESSION['user_id'].". <a href='logout.php'>click here</a> to log out!";
			header("location:useraccount.html");
		}
		else
			echo "oops!! invalid user credentials!";
	}
	else
		die("there are no users with the given email");
}
else
	die("enter username and password");
?>