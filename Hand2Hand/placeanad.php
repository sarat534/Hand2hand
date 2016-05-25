<?php
	include "connectioncreation.php";
?>
<?php
if(isset($_REQUEST['ad_submit']))
{
	$u_name=$_REQUEST['uname'];
	$pro_category=$_REQUEST['category'];
	$p_name=$_REQUEST['pro_name'];
	$p_desc=$_REQUEST['pro_desc'];
	$query=mysql_query("insert into `place_an_ad` (`sub_user`,`prod_cat`,`prod_name`,`prod_desc`) VALUES ('$u_name','$pro_category','$p_name','$p_desc')");
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
								<h1>Ad Successful</h1>
							</header>
							<p>Thank You! Your Ad has been successfully submitted into the database.</p>
							<p>The submitted Ad will be reviewed and posted onto the website within 24 hrs.</p>
						</article>
					</section>
				</body>
			</html>";
}
?>
