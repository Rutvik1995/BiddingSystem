<?php
$message="";
	$conn = mysqli_connect("localhost","root","","xseed");
	$result = mysqli_query($conn,"SELECT * FROM admin WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'") or die("Invalid Credentials");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "<font color=red>Invalid Username or Password!</font>";
	} else {
		$message = "<font color=green>You are successfully authenticated!</font>";
		$_SESSION['loggedin'] = TRUE;
	}
?>