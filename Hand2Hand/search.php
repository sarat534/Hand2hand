<?php
include "connectioncreation.php";
session_start();
?>
<html>
<head>
	<title>Hand2Hand</title>
	<link rel="icon" type="image/jpg" href="logo.jpg">
</head>
<body bgcolor="azure">
<h1 align="center">Your Search Has Returned The Following Results</h1>
<form method="post" action="accsettings.php">
<table align="center" >
<tr> <th>Product ID</th><th>Product Name</th><th>Description</th><th>Price</th></tr>
<?php
if(isset($_REQUEST['su']))
{
	$searchword=$_REQUEST['zz'];

	$q3="SELECT * FROM `search` WHERE `pname`='$searchword'";
	$q4=mysql_query($q3);
	if(!$q4)
		die(mysql_error());
	
	while($q5=mysql_fetch_array($q4))
		{ 
	?>    
	
              <tr>
            <td><?php echo $q5[0];?></td>
            <td><?php echo $q5[1];?></td>
            <td><?php echo $q5[2];?></td>
			<td><?php echo $q5[3];?></td>
          </tr>
           
           
<?php }  }?>
</table>
	</form>
	
</body>
</html>
	

