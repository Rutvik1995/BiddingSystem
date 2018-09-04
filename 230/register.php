<?php
include "header.php"; 


if(!empty($_POST))
{
	$saved_data = $_POST;
	
	$insert=array('email' => $_POST['email'],
				  'password' => $_POST['password'],				  
				  'firstname' => $_POST['firstname'],
				  'lastname' => $_POST['lastname'],
				  'dob' => $_POST['dob'],
				  'address' => $_POST['address'],
				  'city' => $_POST['city'],
				  'state' => $_POST['state'],
				  'zip' => $_POST['zip'],
				  'phone' => $_POST['phone'],
				  'fax' => $_POST['fax'],
				  'lastupdated' => time());
	//echo "<pre>";print_r($insert);
	func_array2insert('bidder',$insert);
	//exit;
	//if(empty($res))
	//{
		func_header_location("login.php?msg=Registered Succuessfully!!!");	
	/*}
	else
	{
		$_SESSION['login'] = $res['firstname'];
		func_header_location("Dashboard.php");	
	}*/
}
if(isset($_GET) && !empty($_GET['mode']))
if($_GET['mode'] == 'logout')
{
	//session_unset();
	$_SESSION['login'] = '';
	$login = '';
	mysql_query("DELETE FROM sessions_user WHERE sessid='$sid'");
	func_header_location("login.php");
}
?>
<div class="topnav">
    <a class="active" href="index.php">CalPERS</a>
	<?php if(!empty($_SESSION['login'])){?>
	<a class="pull-right" href="login.php?mode=logout">Logout</a>
	<a class="pull-right" href="#">Hello <?php echo $_SESSION['login'];?></a>	
	<?php }else{ ?>
	<a class="pull-right" href="login.php">Login</a>
	<?php } ?>
</div>
<br /><br />
<div class="container">

<form name="login" method="post" action="register.php" class="form-signin">
<h2 class="form-signin-heading">Register</h2>
		<div class="message" style="color:red"><?php if(!empty($_GET['msg'])) { echo $_GET['msg']; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="300" align="center" class="tblLogin">
			<tr class="tablerow">
			<td>
			<input align="center" type="email" name="email" placeholder="Email" class="form-control" required></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="form-control" required></td>
			</tr>
			<tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="firstname" placeholder="First Name" class="form-control" required></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="lastname" placeholder="Last Name" class="form-control"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input placeholder="Date of Birth" class="form-control" type="text" onfocus="(this.type='date')"  id="date">
			</tr>
			<tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="address" placeholder="Address" class="form-control"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="city" placeholder="City" class="form-control"></td>
			</tr>
			<tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="state" placeholder="State" class="form-control"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="zip" placeholder="Zip" class="form-control"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="phone" placeholder="Phone" class="form-control"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="fax" placeholder="Fax" class="form-control"></td>
			</tr>
			<tr>
			<td>
			<br>
		    </td>
			</tr>			
			<tr>
			<td>
			<button class="btn btn-lg btn-primary btn-block" type="submit" value="Authenticate">Submit</button>
			</tr>
		</table>
		
</form>
</div>
<?php include "bottom.php"; ?>