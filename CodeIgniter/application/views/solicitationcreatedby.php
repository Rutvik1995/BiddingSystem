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
                        <span class="glyphicon glyphicon-edit"></span> Add Solisitation
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>
<div>

    <div class="container">

        <div class="card ">
            <div class="card-body">
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
                                    <?php

                                    echo '<td><button type="button" class="btn btn-lg btn-danger" onclick="preview1(\''.$post->id.'\');"  id="step3buttonmodel"      >View</button> </td>';    // took us 2 days hah
                                    ?>
                                    <td id="sid"><?php echo $post->id;?></td>
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







