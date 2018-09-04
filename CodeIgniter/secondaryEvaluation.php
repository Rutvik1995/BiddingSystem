<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bidders details for the solicitation</title>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />-->
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

    .topnav input[type=text] {
        float: right;
        padding: 6px;
        margin-top: 8px;
        margin-right: 16px;
        border: none;
        font-size: 17px;
    }

    .file {
        visibility: hidden;
        position: absolute;
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

<form method="post" action="update"  enctype="multipart/form-data">
<div class="container">
    <br/>
    <h3 align="center">Bidders list for all solicitations</h3>
    <br />
    <table id="employee_data" class="table table-hover table-responsive-md table-fixed table-stripped">
        <thead class="blue-grey lighten-4">
        <tr>
            <td>id</td>
            <td>Name</td>
            <td>Solicitation ID</td>
            <td>Solicitation</td>
            <td>Second Evaluation Status</td>
            <td>Score</td>
        </tr>
        </thead>


        <?php if(count($docs)):?>
            <?php foreach($docs as $doc):?>
                <tr>

                    <td><input name="BidderId" hidden="true" value="<?php echo $doc->BidderId;?>"/><?php echo $doc->BidderId;?></td>
                    <td><?php echo $doc->Lastname;?></td>
                    <td name="solicitationid"><?php echo $doc->SolicitationId;?></td>
                    <td><?php echo $doc->Title;?></td>

                    <td>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "root", "xseed");
                        $query ="SELECT title FROM status";
                        $result = mysqli_query($connect, $query);

                        echo "<select class='form-control' name='secEval'>";
                        while($row = mysqli_fetch_array($result)) {
                            echo "<option value='".$row['title']."'>".$row['title']."</option>";
                        }
                        echo "</select>";

                        ?></td>
                    <td><input class="form-control" type="text" name=score style ="width:45px;" value="<?php echo $doc->score; ?>"/></td>

                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr><td>No records found</td></tr>
        <?php endif;?>

    </table>

    <br/>
    <div class="form-group">
        <label class="col-sm-3 col-form-label">Select Evaluation Sheet: </label>
        <input type="file" name="file" id="file" class="file">
        <div class="input-group col-xs-12">
            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
            <input name="doc" type="text" class="form-control input-lg" disabled placeholder="Upload File">
            <span class="input-group-btn">
        <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
      </span>
        </div>
    </div>
</div>
<div align="middle">
    <a href="BiddersSolicitation" class="btn btn-default">Back</a>
    <input type="submit" class="btn btn-primary" value="Submit"/>
</div>
<br/>

</form>

</body>
</html>
<script>
    $(document).ready(function(){
        $('#employee_data').DataTable();
    });
    $(document).on('click', '.browse', function(){
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>