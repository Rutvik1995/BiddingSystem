<?php
include "header.php"; 

if(empty($login))
	func_header_location("login.php");
else
	func_header_location("Dashboard.php");
?>