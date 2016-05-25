<html>
<head>
</head>
<body bgcolor="azure">
<?php
session_start();
if(isset($_SESSION['user_id']))
{
	echo 'logged in';
}
else
{
	echo 'not logged in';
}
?>
</body>
</html>