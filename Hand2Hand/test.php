<?php
session_start();
?>
<?php
if(isset($_SESSION['user_id']))
	echo 'logged in';
else
	echo 'not logged in';
?>