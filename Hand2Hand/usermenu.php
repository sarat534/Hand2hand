<?php
include "connectioncreation.php";
session_start();
?>

<html>
<head>
	<title>Hand2Hand</title>
</head>
<body bgcolor="azure">
<?php
$user=$_SESSION['user_id'];
echo "<h3 align='center'>Welcome!! $user</h3>";
?>
<nav>
<ul style="list-style-type:none">
<li><a href="changepwd.html" target="accountFrame">Change Password</a></li>
<li><a href="accsettings.php" target="accountFrame">Account Settings</a></li>
<li><a href="catalogue.html" target="accountFrame">View Menu Bar</a></li>
<li><a href="placeanad.html" target="accountFrame">Place an Ad</a></li>
<li><a href="bidpage.html" target="accountFrame">Place a Bid</a></li>
<li><a href="order.php" target="accountFrame">My Order History</a></li>
<li><a href="issueform.html" target="accountFrame">Report a Problem</a></li>
<li><a href="logout.php" target="displayFrame">Log out</a></li>
</ul>
</nav>
</body>
</html>