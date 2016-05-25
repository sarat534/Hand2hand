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
<h1 align="center">My Order History</h1>
<h3 align="center">View Your Previous Order History Here</h3>
<table align=center style="cellpadding:10;cellspacing:10">
<tr> <th>Order Id</th><th>User Name</th><th>Product</th><th>Price</th></tr>
<?php

$uname=$_SESSION['user_id'];
	$q3="SELECT * FROM `order` WHERE `name`='$uname'";
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
           
           
<?php  }?>
</table>

	
</body>
</html>
	

