<?php
include "connectioncreation.php";
?>
<?php

session_start();
session_destroy();
echo "you have been logged out. <a href='login.html' target='displayFrame'> Click here</a> to login";
?>