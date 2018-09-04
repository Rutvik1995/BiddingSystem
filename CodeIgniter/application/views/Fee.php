<?php
/**
 * Created by PhpStorm.
 * User: Priyanka
 * Date: 4/5/2018
 * Time: 2:21 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Preliminary Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/mdb.css'?>">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'assets/js/mdb.js'?>" type="text/javascript"></script>
    <script src="http://rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .button {
        background-color: cornflowerblue;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }


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
    td a:hover{
        cursor: pointer;
    }
    td a{
        color: cornflowerblue !important;
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

<nav class="navbar navbar-dark primary-color">
    <a class="navbar-brand" href="#">
        CaLPERS
    </a>
</nav>
<br/>
<div class="row">
    <div class="col-sm-12 col-md-12"><h1 align="center">Fee Document Analysis</h1></div>
</div>
<br/>
<div class="container">
    <table id="fee_data" class="table table-hover table-responsive-md table-fixed table-stripped">
        <thead class="blue-grey lighten-4">
        <tr>
            <td>Document</td>
            <td>Description</td>
            <td>Proposed Fee</td>
            <td>Comments</td>
        </tr>
        </thead>
        <?php if(count($biddocs)):?>
            <?php foreach($biddocs as $doc):?>
                <tr>
                    <td><a onclick="eModal.iframe('http://localhost:8888/230/<?php echo $doc->DocPath;?>', ' ');"><?php echo $doc->dtitle;?></a></td>
                    <td><?php echo $doc->subheading;?></td>
                    <td><input class="form-control" type="text" id="feeInDoc" value="<?php echo $feeData[0]->fee;?>"></td>
                    <td><input class="form-control" type="text" id="comments" value="<?php echo $feeData[0]->FeeComment;?>"></td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr><td>No records found</td></tr>
        <?php endif;?>
    </table>
</div>
<div align="middle">
    <a href="EvaluationHome" class="btn btn-default">Back</a>
    <a href="#" class="btn btn-secondary" onclick="updateFee();">Update</a>
    <input type="hidden" id="bidderId" value="<?php echo $_GET['id']; ?>">
    <input type="hidden" id="solicitationId" value="<?php echo $_GET['sid']; ?>">
</div>

</body>
</html>
<script>
    $(document).ready(function() {
        $('#fee_data').DataTable();
    });
    function updateFee()
    {
        var fee = $('#feeInDoc').val();
        var solicitationid = $('#solicitationId').val();
        var bidderid = $('#bidderId').val();
        var comment = $('#comments').val();
        //alert(fee + solicitationid + bidderid + comment);
        $.ajax({
            type: "POST",
            url: "http://localhost:8888/codeigniter/index.php/welcome/updateFee",
            dataType: 'text',
            data: {fee: fee, comments: comment, solicitationid : solicitationid, bidderid: bidderid } ,
            success: function(){
                eModal.alert('Updated Successfully!',' ');
            },
            error:function(){
                //alert('error');
            }
        });
    }
</script>

