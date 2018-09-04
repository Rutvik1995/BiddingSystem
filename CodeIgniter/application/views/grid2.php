<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <title>view solisitation</title>
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/mdb.css'?>">
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
    <script src="<?php echo base_url().'assets/js/mdb.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'?>" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>


<div class="container">
    <div class="row pull-right" style="margin-top: 30px; margin-right:-10px;">
        <div class="col-sm-2">
            <div class="text-center">

                <a href="http://localhost:8888/codeigniter/index.php/welcome/addsolisitation">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil"></span> Add Solisitation
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>
<div>
    <div class="card ">
        <div class="card-body">
<div class="container">



    <h1 align="center" style="color:#24495C">Solicitation List</h1>
    <br />
    <br/>
    <br>

    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered">
            <thead>
            <tr>

                <td style="font-size: 110%;">Preview</td>
                <td style="font-size: 110%;">Update</td>
                <td style="font-size: 110%;">Solicitation Number</td>
                <td style="font-size: 110%;">Title</td>
                <td style="font-size: 110%;">Status</td>
                <td style="font-size: 110%;">Type</td>
                <td style="font-size: 110%;">Category</td>



            </tr>
            </thead>
            <?php if(count($posts)):?>
                <?php foreach($posts as $post):?>
                    <tr>
<?php

                      //  echo '<td><h5><button type="button" class="btn btn-lg btn-danger" onclick="preview1(\''.$post->id.'\');"  id="step3buttonmodel"      >View</button></h5> </td>';

                        echo'<th>
<p  data-placement="top" data-toggle="tooltip" title="Preview">
<a    onclick="preview1(\''.$post->id.'\');"   style="background-color:#1898DD; color:white;" class="btn  btn-xs"  ><span style="width: 40px;" class="glyphicon glyphicon-file"></span></a></p>

</th>';

                        // took us 2 days hah
?>


<th>
<p  data-placement="top" data-toggle="tooltip" title="Preview">
<a  href="http://localhost:8888/codeigniter/index.php/welcome/updatesolicitation?id=<?php echo $post->id ?>"  style="background-color:#1898DD; color:white;" class="btn  btn-xs"  ><span style="width: 40px;" class="glyphicon glyphicon-edit"></span></a></p>
</th>


                        <td id="sid" style="font-size: 100%;"><?php echo $post->id;?></td>
                        <td style="font-size: 100%;" ><?php echo $post->title;?></td>
                        <td style="font-size: 100%;" ><?php echo $post->status; ?></td>

                        <?php if($post->status=="New"):?>
                            <td  style="font-size: 17px; font-weight: 490; " class="text-warning"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Under Review"):?>
                            <td  class="text-primary "> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Approved"):?>
                            <td  class="text-success"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Rejected"):?>
                            <td style="font-size: 100%;"  class="text-danger"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Awarded"):?>
                            <td style="font-size: 100%;" class="text-success"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Archived"):?>
                            <td style="font-size: 100%;" class="text-danger"> <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Published"):?>
                        <td  style="font-size: 100%;"   class="text-info" > <?php echo $post->status;?></td>
                        <?php elseif($post->status=="Incomplete"):?>
                            <td  style="font-size: 100%;"  style="font-size: 17px; font-weight: bolder; " class="text-danger"> <b><?php echo $post->status;?><b></td>
                        <?php endif;?>
                        </b>
                        <td style="font-size: 100%;" ><?php echo $post->type;?></td>
                        <td style="font-size: 100%;" ><?php echo $post->category;?></td>




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
</div>
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




</script>




<script>
    $(document).ready(function()
    {
        $('#employee_data').DataTable();
    });
</script>
<script>





    function preview1(s)
    {


        $("#myModal1").modal('show');
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
        xmlhttp.open("GET","http://localhost:8888/codeigniter/index.php/welcome/previewmain?id="+s.toString(),true);
        xmlhttp.send();

        //alert(s.toString());

    }



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


