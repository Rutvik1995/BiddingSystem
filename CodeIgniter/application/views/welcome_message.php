<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <title>view solisitation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <style>



    </style>


</head>
<div class="topnav">
    <a class="active" href="#home">CalPERS</a>
</div>





<div class="container">
    <div class="row pull-right" style="margin-top: 30px; margin-right:-10px;">
        <div class="col-sm-2">
            <div class="text-center">

                <a href="http://localhost/codeigniter/index.php/welcome/addsolisitation">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit"></span> Add Solisitation
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>
<body>

<div class="container">
    <h1 align="center" style="color:#24495C">Solicitation List</h1>
    <br />
    <br/>
    <br>
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered">
            <thead>
            <tr>

                <td>Preview</td>
                <td>Solicitation Number</td>
                <td>Title</td>
                <td>Status</td>
                <td>Type</td>
                <td>Category</td>



            </tr>
            </thead>
            <?php if(count($posts)):?>
                <?php foreach($posts as $post):?>
                    <tr>

                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                <a id="step5buttonmodel"  style="background-color:#1898DD; color:white;" class="btn  btn-xs"  ><span class="glyphicon glyphicon-file"></span></a></p>
                        </td>
                        <td><?php echo $post->id;?></td>
                        <td><?php echo $post->title;?></td>

                        <?php if($post->status=="New"):?>
                            <td class="text-warning"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Under Review"):?>
                            <td class="text-primary "> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Approved"):?>
                            <td class="text-success"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Rejected"):?>
                            <td class="text-success"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Awarded"):?>
                            <td class="text-success"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Archived"):?>
                            <td class="text-danger"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Published"):?>
                            <td class="text-info"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Cancelled"):?>
                            <td class="text-danger"> <?php echo $post->status;?></td>
                        <?php endif;?>
                        </b>
                        <td><?php echo $post->type;?></td>
                        <td><?php echo $post->category;?></td>




                    </tr>
                <?php endforeach;?>
            <?php else: ?>
                <tr><td>No records found</td></tr>
            <?php endif;?>
        </table>
    </div>
</div>
<br/>
<br/>
<br/>
</div>





<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Bid Preview</h4>
            </div>
            <div class="modal-body" >


                <div class="form-group" id="txtHint" >










                </div>
            </div>
            <br>
            <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>




</body>
</html>
<script>
    $(document).ready(function()
    {
        $('#employee_data').DataTable();
    });
</script>






<script>
    $(document).ready(function()
    {
        $("#step3buttonmodel").click(function()
        {
            alert("hello");
            $("#myModal1").modal('show');

        });
    });



    function hello()
    {



        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","http://localhost:8888/codeigniter/index.php/welcome/preview3",true);
        xmlhttp.send();
        alert(str);



    }

</script>


<script>
    $(document).ready(function()
    {
        $("#step4buttonmodel").click(function()
        {
            alert("hello2");
            $("#myModal1").modal('show');

        });
    });

</script>


<script>
    $(document).ready(function()
    {
        $("#step5buttonmodel").click(function()
        {
            alert("hello3");
            $("#myModal1").modal('show');

        });
    });

</script>














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


