
<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bidder status for all solicitation</title>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.bootstrap4.min.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/mdb.css'?>">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'assets/js/mdb.js'?>" type="text/javascript"></script>
    <script src="http://rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.bootstrap4.min.css" />

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

    .disabled {
        pointer-events: none;
        cursor: default;
        color : black;

    }

    .enabled {

    }
    .topnav input[type=text] {
        float: right;
        padding: 6px;
        margin-top: 8px;
        margin-right: 16px;
        border: none;
        font-size: 17px;
    }
    td a.disabled {
        pointer-events: none;
        cursor: default;
        color : black !important;
    }

    td a.enabled {
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
<div class="container">
    <br/>
    <h3 align="center">Bidder status for all solicitation</h3>
    <br />
    <table id="employee_data" class="table table-hover table-responsive-md table-fixed table-stripped">
        <thead class="blue-grey lighten-4">
        <tr>
            <td></td>
            <td>id</td>
            <td>Name</td>
            <td>Solicitation ID</td>
            <td>Solicitation</td>
            <td>First Evaluation Status</td>
            <td>Second Evaluation Status</td>
            <td>Score</td>
            <td>View Fee</td>
            <td>Relative Fee score</td>
        </tr>
        </thead>


        <?php if(count($docs)):?>
            <?php foreach($docs as $doc):?>
                <tr>
                    <td></td>
                    <td><?php echo $doc->BidderId;?></td>
                    <td><?php echo $doc->Lastname;?></td>
                    <td><?php echo $doc->SolicitationId;?></td>
                    <td><?php echo $doc->Title;?></td>
                    <td><a class="enabled" href = 'http://localhost:8888/codeigniter/index.php/welcome/preview?id=<?php echo $doc->BidderId;?>&sid=<?php echo $doc->SolicitationId;?>&fname=<?php echo $doc->firstname;?>&lname=<?php echo $doc->Lastname;?>' readonly="true"><?php echo $doc->FirstEvalStatus?></a></td>
                    <td>
                        <a href = "secondaryEvaluation?id='<?php echo $doc->BidderId;?>'" class='<?php $status = $doc->FirstEvalStatus; if($status=="Approved") {echo "enabled";} else { echo "disabled";} ?>'><?php echo $doc->SecondEvalStatus;?></a>
                    </td>
                    <td><?php echo $doc->score;?></td>
                    <td><a title = "Click to see the fee submitted by the bidder" href = "http://localhost:8888/codeigniter/index.php/welcome/fee?id=<?php echo $doc->BidderId;?>&sid=<?php echo $doc->SolicitationId;?>" class='<?php $status1 = $doc->FirstEvalStatus; $status2 = $doc->SecondEvalStatus; if($status=="Approved" && $status2=="Approved") {echo "enabled";} else { echo "disabled";} ?>'>Fee</a></td>
                    <td><input type="text" class="form-control" style ="width:45px;" readonly/><?php echo $doc->relativefeescore;?></td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr><td>No records found</td></tr>
        <?php endif;?>

    </table>
</div>
<div align="middle">
    <a href="BiddersSolicitation" class="btn btn-default">Back</a>
    <a href="EvaluationHome" class="btn btn-success">Evaluation Status</a>
</div>

<script>
    function myFunction() {
        alert("Are you sure you want to publish? Click OK");
    }
</script>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#employee_data').DataTable({
            columnDefs: [ {
                orderable: false,
                className: 'select-checkbox',
                targets:   0
            } ],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },
            order: [[ 1, 'asc' ]]
        } );
    });

</script>


