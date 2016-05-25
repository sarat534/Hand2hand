<?php
	include "connectioncreation.php";
?>
<?php
if(isset($_REQUEST['issue_submit']))
{
	$u_name=$_REQUEST['uname'];
	$iss_category=$_REQUEST['category'];
	$issue=$_REQUEST['issue_desc'];
	$query=mysql_query("insert into `report_issue` (`user_name`,`issue_category`,`issue`) VALUES ('$u_name','$iss_category','$issue')");
	if(!$query)
	{
		die(mysql_error());
	}
	else
		echo "<html>
				<head>
					<title>Hand2Hand</title>
				</head>
				<body>
					<section>
						<article align='center' bgcolor='aquamarine'>
							<header>
								<h1>Report Successful</h1>
							</header>
							<p>Thank You! The issues have been submitted successfully.</p>
							<p>Thw support team will try to fix the issues as soon as possible.</p>
						</article>
					</section>
				</body>
			</html>";
}
?>
