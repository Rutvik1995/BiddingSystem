<?php
include "auth.php";
$connect = mysqli_connect("localhost", "root", "", "xseed");
$uid = $_SESSION["login_id"];
$query ="SELECT SolicitationId,Title,SecondEvalStatus,AckId FROM bid WHERE BidderId = '$uid'";
$result = mysqli_query($connect, $query);
// echo "<pre>";print_r($result);exit;
/*
while($row = mysqli_fetch_assoc($result)){
    foreach($row as $cname => $cvalue){
        print "$cname: $cvalue\t";
    }
    print "\r\n";
}
exit;
*/
?>
<!DOCTYPE html>

<html>
<head>
    <title>Solicitations Staus</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
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
</div>
<br /><br />
<div class="container">
    <h3 align="center">Solicitations Status</h3>
    <br/>
    <div class="table-responsive">
        <table id="bidder_data" class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>SolicitationId</td>
                <td>Title</td>
                <td>Status</td>
				<td>AcknowledgementId</td>
			</tr>
            </thead>
            <?php
            while($row = mysqli_fetch_array($result))
            {
                echo '  
                               <tr>  
                                    <td>'.$row["SolicitationId"].'</td>  
                                    <td>'.$row["Title"].'</td>  
                                    <td>'.$row["SecondEvalStatus"].'</td> 
									<td>'.$row["AckId"].'</td>
                               </tr>  
                     ';
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#bidder_data').DataTable();
    });
</script>