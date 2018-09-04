<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Solicitation</title>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
      <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>" type="text/javascript"></script>
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">

</head>
<body>

<div class="container">
    <form role="form">
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="step1">
                <h2 align="center">Add Solicitation</h2>
                <div class="jumbotron">
                    <div class="container" style="margin-top: 20px">
                        <form method="post" id="sform">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="sid"><b>Solicitation Number*</b></label>
                                        <input type="text" class="form-control" id="sid" >
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="title"><b>Title</b></label>
                                        <input type="text" class="form-control" id="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="finalfilingdate"><b>Final Filing Date/Time</b></label>
                                        <input type="input-append date form_datetime" class="form-control" id="finalfilingdatetime">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="type"><b>Type</b></label>
                                        <input type="text" class="form-control" id="title1" placeholder="Solicitation"">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="category" ><b>Category</b></label>
                                        <input type="text" class="form-control" id="title2" placeholder="IT"">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="finalfilingdate"><b>Description</b></label>
                                    <textarea class="form-control" rows="5" id="description"></textarea>
                                </div>
                            </div>


                            <br>
                    </div>
                </div>

                <div class="text-center">
                    <a class="btn btn-primary" href="http://www.google.com" role="button" id="snext"><b>Save and continue</b></a>
                </div>
    </form>
</div>


</body>

<script>
    $('#description').summernote({
        placeholder: 'Hi',
        tabsize: 5,
        height: 150,
        focus: true
    });
</script>

<br/>

<br/>

<script type="text/javascript">
    $("#finalfilingdatetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        todayHighlight: true,
        showMeridian:true
    });
    $("#posteddate").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left",
        todayHighlight: true,
        showMeridian:true
    });
    $("#duedate").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left",
        todayHighlight: true,
        showMeridian:true
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){


        $("#snext").click(function()
        {

            $.ajax({
                url: 'http://localhost:8888/codeigniter/index.php/createsolicitation/add_s_details',
                data: {
                    id: $("#sid").val(),
                    title: $("#title").val(),
                    due: $("#finalfilingdatetime").val(),
                    type: $("#title1").val(),
                    category: $("#title2").val(),
                    description: $("#description").val(),
                },
                async: 'true',
                cache: 'false',
                type: 'post',
                success: function (data) {
                    //jQuery("#attendence_report_holder").html(response);
                    alert("Data successfully added");
                },
                error:function(data){
                    alert("error happend");
                }
            });
        });

    });

</script>

<script>
    $(document).ready(function(){
        $("#uploaddoc").click(function(){
            $("#myModal").modal('hide');
            $fileName= $('#sortpicture').prop("files")[0]['name'];
            document.getElementById('filename').value = $fileName;
            $("#myModal").modal('show');
        });
    });
</script>

<style>

</style>


 <script>
    $(document).ready(function(){

        $( "#title1" ).autocomplete({
            source: "http://localhost:8888/codeigniter/index.php/createsolicitation/type_autocomplete",
        });
    });
    $(document).ready(function(){

        $( "#title2" ).autocomplete({
            source: "http://localhost:8888/codeigniter/index.php/createsolicitation/get_autocomplete",
        });
    });
</script>
