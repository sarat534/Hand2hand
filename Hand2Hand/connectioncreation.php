<?php
	$con=mysql_connect("localhost","root","") or die ("could not connect to the server");
	$db=mysql_select_db("hand2hand",$con) or die ("could not find the database");
?>	