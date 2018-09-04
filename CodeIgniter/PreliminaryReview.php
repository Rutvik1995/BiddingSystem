<?php
/*/*defined('BASEPATH') OR exit('No direct script access allowed');*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
    <title>Preliminary Review</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/mdb.css'?>">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="http://rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'assets/js/mdb.js'?>" type="text/javascript"></script>
    <script src="http://rawgit.com/saribe/eModal/master/dist/eModal.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

</head>
<style>
    /*.modal-xl
    {
        width:50% !important
    }*/

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
    }*/
    /*.button {
        !*background-color: cornflowerblue;*!
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }*/
    /*.button:hover
    {
        background-color: #286090;
    }*/
    td a:hover{
        cursor: pointer;
    }
    td a{
        color: cornflowerblue !important;
    }
    td a .isdisabled{
        cursor: not-allowed;

        opacity: 0.5;

        color: currentColor;

        display: inline-block;

        pointer-events: none;

        text-decoration: none;
    }
    /*table.table td{
        font-size: medium !important;
    }*/
    </style>
<body>
<!--<div class="topnav">
    <a class="active" href="#home">CaLPERS</a>
</div>
-->
<nav class="navbar navbar-dark primary-color">
    <a class="navbar-brand" href="#">
        CaLPERS
    </a>
</nav>
<div class="container">
    <br/>
    <div class="row">
        <div class="col-sm-12 col-md-12"><h1 align="center">Submitted Documents</h1></div>
    </div>
    <br/>

    <div class="row form-group">
        <div class="col-sm-2 col-md-2">
            <label>Name: </label>
        </div>
        <div class="col-sm-4 col-md-4">
            <input type="text"  class="name form-control" value= "<?php echo $fname; echo ' '; echo $lname; ?>"  disabled/>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-sm-2 col-md-2">
            <label>Solicitation: </label>
        </div>
        <div class="col-sm-4 col-md-4">
            <input type="text" class="sid form-control" value= "<?php echo $solicitationId; ?>" disabled></input>
            <!--<input type="text" class="sid" value= "<?php /*echo $solicitationId[0]->SolicitationId */?>" class="form-control" disabled></input>-->
            <!--$docs[0]->SolicitationId;-->
        </div>
    </div>

        <table id="document_data" class="table table-hover table-responsive-md table-fixed table-stripped">
            <thead class="blue-grey lighten-4">
            <tr>
                <!--<td>No.</td>-->
                <td>Document Title</td>
                <td>Description</td>
                <td>Submission Date</td>
                <td>Status</td>
            </tr>
            </thead>
            <?php if(count($biddocs)):?>
                <?php foreach($biddocs as $doc):?>
                    <tr>
                        <!-- <td><?php /*echo $doc->id;*/?></td>-->
                        <td><a class="emodal_open" onclick="eModal.iframe('http://localhost:8888/230/<?php echo $doc->DocPath;?>', ' ');"><?php echo $doc->dtitle;?></a></td>
                        <td><?php echo $doc->subheading;?></td>
                        <td>01/01/2018</td>
                        <td><input type="checkbox" class="chk" value="<?php echo $doc->id;?>" id="cbk_<?php echo $doc->id;?>" <?php if($doc->Status):?> checked <?php endif; ?>></td>
                    </tr>
                <?php endforeach;?>
            <?php else: ?>
                <tr><td><h5>No records found</h5></td></tr>
            <?php endif;?>
        </table>

    <br/>
    <div class="row form-group">
        <label for="firstEval" class="col-sm-3 col-form-label">First Evaluation Status*: </label>
        <div class="col-sm-4">
            <?php
            $connect = mysqli_connect("localhost", "root", "root", "xseed");
            $query ="SELECT title FROM status where FirstEval = 1";
            $result = mysqli_query($connect, $query);

            echo "<select class='form-control' name='firstEval' id='firstEval'>";
            echo "<option value='Please Select'>Please Select</option>";
            while($row = mysqli_fetch_array($result)) {
                echo "<option value='".$row['title']."'>".$row['title']."</option>";
            }
            echo "</select>";
            ?>
        </div>
    </div>
</div>
<div align="middle" class="form-group">
    <input type="hidden" id="bidderId" value="<?php echo $_GET['id']; ?>">
    <a href="BiddersSolicitation" class="btn btn-default">Back</a>
    <a href="#" onclick="checkAllDocs();" class="btn btn-primary">Submit</a>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Send Clarification</button>
</div>
<br/><br/><br/><br/><br/><br/>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="subject-name" class="col-form-label">Subject:</label>
                        <input type="text" class="form-control" id="subject-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="Send();">Send message</button>
            </div>
            <br/>
        </div>
    </div>
</div>

</body>
</html>
<script>
    $(document).ready(function() {
        $('#document_data').DataTable();

        $('.chk').change(function(){
            updateDocStatus($(this).val());
        });

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = $('.name').val();// Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-title').text('Message to ' + recipient)
            modal.find('#recipient-name').val(recipient)
        });
    });

    function Send() 
    {
        
        //alert("gg");
    var subject=$('#subject-name').val();
    var body=$('#message-text').val();
    var bidderid = $('#bidderId').val();
    var solicitationid = $('.sid').val();
    $.ajax({
        type: "POST",
        url: "http://localhost:8888/codeigniter/index.php/welcome/SaveMessage",
        dataType: 'text',
        data: {subject: subject, body: body, solicitationId: solicitationid, bidderId: bidderid},
        success: function()
        {
            //alert("gg");
            $('#exampleModal').modal('hide'); 
        },
        error:function()
        {
           // alert("jjj");
        }
    });
    return false;
    }

    function updateChecked(docid)
    {
        $.ajax({
            type: "POST",
            url: "http://localhost:8888/codeigniter/index.php/welcome/SaveCheckedPreliminaryResponse",
            dataType: 'text',
            data: {data: docid},
            success: function(){
            },
            error:function(){
            }
        });
        return false;
    }
    function updateUnchecked(docid)
    {
        $.ajax({
            type: "POST",
            url: "http://localhost:8888/codeigniter/index.php/welcome/SaveUncheckedPreliminaryResponse",
            dataType: 'text',
            data: {data: docid},
            success: function(){
                //alert('success');
            },
            error:function(){
                //alert('error');
            }
        });
        return false;
    }
    function checkAllDocs() {
        var flag = true;
        if($('#firstEval').val() == 'Please Select')
        {
            eModal.alert("Please select First Evaluation Status!",' ');
        }
        else if ($('.chk').length != $('.chk:checked').length && $('#firstEval').val() == 'Approved')
            eModal.alert("Please verify all documents to approve!",' ');
        else {
            updateEvalStatus($('#firstEval').val());
        }
    }
    function updateEvalStatus(status)
    {
        var solicitationid = $('.sid').val();
        var bidderid = $('#bidderId').val();
        //alert(solicitationid+""+bidderid);
            $.ajax({
                type: "POST",
                url: "http://localhost:8888/codeigniter/index.php/welcome/UpdateFirstEvaluationStatus",
                dataType: 'text',
                data: {status : status, solicitationid : solicitationid, bidderid: bidderid } ,
                success: function(){
                    //alert('success');
                    window.location.href="http://localhost:8888/codeigniter/index.php/welcome/BiddersSolicitation";
                },
                error:function(e){
                }
            });
    }
</script>
: