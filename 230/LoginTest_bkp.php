<?php
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","xseed");
	$result = mysqli_query($conn,"SELECT * FROM admin WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
	}
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
	
	</head>
	
<style>
    .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
    }

    .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #2196F3;
        color: white;
    }

    .topnav input[type=text] {
        float: right;
        padding: 6px;
        margin-top: 8px;
        margin-right: 16px;
        border: none;
        font-size: 17px;
    }

    @media screen and (max-width: 600px) {
        .topnav a, .topnav input[type=text] {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }
        .topnav input[type=text] {
            border: 1px solid #ccc;
        }
    }
    </style>


	
<body>
<div class="topnav">
    <a class="active" href="#home">CalPERS</a>
</div>
<br /><br />
<div class="container">

<form name="login" method="post" action="" class="form-signin">
<h2 class="form-signin-heading">Log In</h2>
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
			<tr class="tablerow">
			<td>
			<input align="center" type="text" name="email" placeholder="Email" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="login-input"></td>
			</tr>
			<tr>
			<td>
			<div class="checkbox">
            <label><input type="checkbox" value="remember-me"> Remember me </label>
            </div>
		    </td>
			</tr>
			<tr class="tableheader">
			<td>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</tr>
		</table>
</form>
</body>
</html>