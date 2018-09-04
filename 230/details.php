<?php
include "auth.php";

if(isset($_GET) && !empty($_GET['id']))
if($_GET['id'])
{
	$pid = $_GET["id"];
	$res = func_query("SELECT * FROM Solicitation WHERE id = '$pid'");
	$solicitation_data = $res[0];
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DocumentPage</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

  
</head>

<body>
<div class="topnav">
    <a class="active" href="#home">CalPERS</a>
	<?php if(!empty($_SESSION['login'])){?>
	<a class="pull-right" href="login.php?mode=logout">Logout</a>
	<a class="pull-right" href="Dashboard.php">Dashboard</a>
	<a class="pull-right" href="updateprofile.php?id=<?php echo $_SESSION['login_id'];?>">Edit Profile</a>
	<a class="pull-right" href="#">Hello <?php echo $_SESSION['login'];?></a>	
	<?php }else{ ?>
	<a class="pull-right" href="register.php">Register</a>
	<?php } ?>
</div>
<br /><br />
<div>
	<h2 align=center> Solicitation Details </h2>
</div>

<div class="container" style="margin-top: 130px">
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label for="sid"><b>Solisitation Number :</b></label>
				<input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['id'];?>" readonly>
                
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['title'];?>" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="finalfilingdate"><b>Final Filing Date/Time</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['due'];?>" readonly>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="type"><b>Type</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['type'];?>" readonly>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="category" ><b>Category</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['category'];?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="finalfilingdate"><b>Description</b></label>
            <textarea class="form-control" rows="5" id="description" value="" readonly><?php echo $solicitation_data['description'];?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>


</body>
</html>