<?php
include "connectioncreation.php";
session_start();


if(isset($_REQUEST['vi']))
{
	$uname=$_REQUEST['email'];
	$uname1=$_REQUEST['comment'];

	$q3="INSERT INTO `review` (`mail`, `comment`) VALUES ('$uname', '$uname1')";
	$q4=mysql_query($q3);
	if(!$q4)
		die(mysql_error());
		
}
?>
<html>
<head>
	<title>Hand2Hand</title>
	<link rel="icon" type="image/jpg" href="logo.jpg">
</head>
<body bgcolor="azure">
<form method="post" action="">



  Email: <input type='text' name='email' id='email' /><br />


  Comment:<br />
  <textarea name='comment' id='comment'></textarea><br />

  

  <input type='submit'  name="vi"value='Submit' />  

<div>


<table>
<tr> <th>user id</th><th>user name</th></tr>
<?php
$q3="SELECT * FROM `review` ";
	$q4=mysql_query($q3);
	if(!$q4)
		die(mysql_error());
	
	while($q5=mysql_fetch_array($q4))
		{ 
?>

              <tr>
            <td><?php echo $q5[0];?></td>
            <td><?php echo $q5[1];?></td>
	<?php	}
	
	
	?>
</table>
</div>


	</form>
	
</body>
</html>
	