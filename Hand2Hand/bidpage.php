<?php
	include "connectioncreation.php";
?>
<?php
if(isset($_REQUEST['bid_submit']))
{
	$u_name=$_REQUEST['uname'];
	$pro_category=$_REQUEST['category'];
	$p_id=$_REQUEST['pro_id'];
	$p_name=$_REQUEST['pro_name'];
	$bid=$_REQUEST['bid_amount'];
	$query=mysql_query("insert into `place_a_bid` (`user_name`,`prod_cat`,`prod_id`,`prod_name`,`bid_amount`) VALUES ('$u_name','$pro_category','$p_id','$p_name','$bid')");
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
								<h1>Bid Successful</h1>
							</header>
							<p>Thank You! Your Bid has been placed successfully.</p>
							<p>The bid results will be announced by the site admin shortly after the completion of deadline.</p>
						</article>
					</section>
				</body>
			</html>";
}
?>
