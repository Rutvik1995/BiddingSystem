<?php
include "header.php"; 
if(empty($_SESSION['login'])){
	func_header_location("login.php");
}

if(!empty($_POST))
{
	$pid = $_POST["pid"];
	
	$insert=array('firstname' => $_POST['firstname'],
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
	func_array2update('bidder',$insert,"id = '$pid'");
	//exit;
	//if(empty($res))
	//{
		func_header_location("Dashboard.php");	
	/*}
	else
	{
		$_SESSION['login'] = $res['firstname'];
		func_header_location("Dashboard.php");	
	}*/
}
if(isset($_GET) && !empty($_GET['id']))
if($_GET['id'])
{
	$pid = $_GET["id"];
	$res = func_query("SELECT * FROM bidder WHERE id = '$pid'");
	$user_data = $res[0];
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

<form name="login" method="post" action="updateprofile.php" class="form-signin">
<h2 class="form-signin-heading">Update Profile</h2>
		<div class="message" style="color:red"><?php if(!empty($_GET['msg'])) { echo $_GET['msg']; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="300" align="center" class="tblLogin">
			<!--<tr class="tablerow">
			<td>
			<input align="center" type="email" name="email" placeholder="Email" class="form-control" required value="<?php echo $user_data["email"];?>" read-only></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="form-control" required></td>
			</tr>-->
			<tr>
			<tr class="tablerow">
			<td>
			<input type="hidden" name="pid" value="<?php echo $_GET["id"];?>"></td>
			<input type="text" name="firstname" placeholder="First Name" class="form-control" required value="<?php echo $user_data["firstname"];?>"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<?php echo $user_data["lastname"];?>"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="date" name="dob" placeholder="Date of Birth" class="form-control" value="<?php echo $user_data["dob"];?>"></td>
			</tr>
			<tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo $user_data["address"];?>"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="city" placeholder="City" class="form-control" value="<?php echo $user_data["city"];?>"></td>
			</tr>
			<tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="state" placeholder="State" class="form-control" value="<?php echo $user_data["state"];?>"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="zip" placeholder="Zip" class="form-control" value="<?php echo $user_data["zip"];?>"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="phone" placeholder="Phone" class="form-control" value="<?php echo $user_data["phone"];?>"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="fax" placeholder="Fax" class="form-control" value="<?php echo $user_data["fax"];?>"></td>
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
<?php
include "bottom.php"; 
?>