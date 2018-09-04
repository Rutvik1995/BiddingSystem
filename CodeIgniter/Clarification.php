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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css" rel="stylesheet" />
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
        color: cornflowerblue;
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

<!--<div >
    <div class="col-sm-12 col-md-12"><h1 align="center">Send Clarification</h1></div>
</div>-->
<br/>
<div class="container">
    <div class="row form-group">
        <div class="col-sm-2  col-md-2">
            <label>Subject: </label>
        </div>
        <div class="col-sm-4  col-md-4">
            <input id="subject" type="text" class="form-control">
        </div>
    </div>
    <br/>
    <div class="row form-group">
        <div class="col-sm-2">
            <label>Body: </label>
        </div>
        <div class="col-sm-4">
            <textarea id="msgbody" class="form-control textarea-body"></textarea>
        </div>
    </div>
</div>
<br/>
<div align="middle">
    <a href="#" class="button closemodall" type="button" onclick="modalClose();">Cancel</a>
    <a href="#" class="button" onclick="Send();">Send</a>
    <input type="hidden" id="bidderId" value="<?php echo $_GET['id']; ?>">
    <input type="hidden" id="solicitationId" value="<?php echo $_GET['sid']; ?>">
</div>

</body>
</html>
<script>
function modalClose() {
    $('.close').trigger('click');
}
function Send() {
    var subject=$('#subject').val();
    var body=$('#msgbody').val();
    var solicitationid = $('#solicitationId').val();
    var bidderid = $('#bidderId').val();
    $.ajax({
        type: "POST",
        url: "http://localhost:8888/codeigniter/index.php/welcome/SaveMessage",
        dataType: 'text',
        data: {subject: subject, body: body, solicitationId: solicitationid, bidderId: bidderid},
        success: function(){
            alert('success');
            $(document).on("hide.bs.modal", ".modal", function(){ _hideModal(); });
        },
        error:function(){
            alert('error');
        }
    });
    return false;
}
</script>

