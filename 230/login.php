<?php
include "header.php";

if(!empty($_POST))
{
	$saved_data = $_POST;
	$username = $saved_data['email'];
	$password = $saved_data['password'];
	$res = func_query("SELECT * FROM bidder WHERE email = '$username' AND password = '$password'");
	// echo "<pre>";print_r($res);exit;
	if(empty($res))
	{
		func_header_location("login.php?msg=Invalid username or password");
	}
	else
	{
		$_SESSION['login'] = $res[0]['firstname'];
		$_SESSION['login_id'] = $res[0]['id'];
		func_header_location("Dashboard.php");
	}
}
if(isset($_GET) && !empty($_GET['mode']))
if($_GET['mode'] == 'logout')
{
	//session_unset();
	$_SESSION['login'] = '';
	$login = '';
	mysqli_query("DELETE FROM sessions_user WHERE sessid='$sid'");
	func_header_location("login.php");
}
?>
<div class="topnav">
    <a class="active" href="index.php">CalPERS</a>
	<?php if(!empty($_SESSION['login'])){?>
	<a class="pull-right" href="#">Hello <?php echo $_SESSION['login'];?></a>
	<a class="pull-right" href="login.php?mode=logout">Logout</a>
		
	<?php }else{ ?>
	<a class="pull-right" href="register.php">Register</a>
	<?php } ?>
</div>
<br /><br />
<div class="container">

<form name="login" method="post" action="login.php" class="form-signin">
<h2 class="form-signin-heading">Log In</h2>
		<div class="message" style="color:red"><?php if(!empty($_GET['msg'])) { echo $_GET['msg']; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="300" align="center" class="tblLogin">
			<tr class="tablerow">
			<td>
			<input align="center" type="email" name="email" placeholder="Email" class="form-control"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="form-control"></td>
			</tr>
			<tr>
			<td>
			<div class="checkbox">
            <label><input type="checkbox" value="remember-me"> Remember me </label>
            </div>
		    </td>
			</tr>
			<tr>
			<td>
			<button class="btn btn-lg btn-primary btn-block" type="submit" value="Authenticate">Sign in</button>
			</tr>
		</table>
		
</form>
</div>
<?php include "bottom.php"; ?>