<?php
include "auth.php";
if(empty($_SESSION['login'])){
	func_header_location("login.php");
}
$connect = mysqli_connect("localhost", "root", "", "xseed");
$query ="SELECT * FROM Solicitation where status='Published' or status='Approved'";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>

<html>
<head>
    <title>Solicitations</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
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
	<?php if(!empty($_SESSION['login'])){?>
	<a class="pull-right" href="login.php?mode=logout">Logout</a>
	<a class="pull-right" href="updateprofile.php?id=<?php echo $_SESSION['login_id'];?>">Edit Profile</a>
	<a class="pull-right" href="#">Hello <?php echo $_SESSION['login'];?></a>	
	<a class="pull-right" href="login.php?mode=logout">Applied Solicitations</a>
	<?php }else{ ?>
	<a class="pull-right" href="register.php">Register</a>
	<?php } ?>
</div>
<br /><br />
<div class="container">
    <h3 align="center">Solicitations List</h3>
    <br/>
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Due</td>
				<td>Action</td>
			</tr>
            </thead>
            <?php
            while($row = mysqli_fetch_array($result))
            { ?>
                <tr>  
				<td><a class="solicitate" style="cursor:pointer;"><?php echo $row["id"];?></a></td>  
				<td><?php echo $row["title"];?></td>  
				<td><?php echo $row["due"];?>
				
				</td> 
				<td><?php $date = date('Y-m-d');?><a href="documentupload.php?id=<?php echo $row["id"];?>">
				<button class="btn btn-lg btn-primary btn-block <?php if(strtotime($date) > strtotime($row["due"])){echo "disabled";}?>" type="button">
				<?php 
				
				$sid = $row['id'];$uid = $_SESSION["login_id"];
				$res = func_query("SELECT * FROM prebid WHERE SolicitationId = '$sid' AND BidderId = '$uid'");
				$res1 = func_query("SELECT * FROM biddocuments WHERE SolicitationId = '$sid' AND BidderId = '$uid'");
				if(!empty($res[0]['SolicitationId']) || !empty($res1[0]['BidderId'])){			
				?>
				Update
				<?php }else{ ?>
				Apply
				<?php } ?>
				</button></a></td>
				</tr>
           <?php }
            ?>
        </table>
    </div>
</div>
</body>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="popup_content_title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p id="popup_content">Loading...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>
<script>
    $(document).ready(function(){
		
        $('#employee_data').DataTable();
		$(".solicitate").click(function(){
			var id = $(this).html(); 
			$.ajax({
				url : 'ajaxdetails.php?id='+id,
				method : 'post',
				success : function(response)
				{
					console.log(response);
					$('#popup_content_title').html(id);
					$('#popup_content').html(response);
					// put your html response in the popup div

					$('#myModal').modal();
				}
			});
		});
    });
</script>