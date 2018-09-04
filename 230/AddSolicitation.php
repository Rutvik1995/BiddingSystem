<?php

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Solicitation</title>

    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
	
	</head>
<div>
</div>

<div class="container" style="margin-top: 130px">
   <div class="row">
       <div class="col-sm-5">
    <div class="form-group">
        <label for="sid"><b>Solisitation Number*</b></label>
        <input type="number" class="form-control" id="sid">
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
                <input type="datetime-local" class="form-control" id="finalfilingdatetime">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="type"><b>Type</b></label>
                <select class="form-control" id="type">
                    <option>type1</option>
                    <option>type2</option>
                    <option>type3</option>
                    <option>type4</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="category" ><b>Category</b></label>
                <select class="form-control" id="category">
                    <option>IT</option>
                    <option>EEE </option>
                    <option>CS</option>
                    <option>Wts</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="finalfilingdate"><b>Description</b></label>
            <textarea class="form-control" rows="5" id="description"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="text-center">
                <button class="btn btn-primary" id="singlebutton"><b>Send To Reviewer</b></button>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="text-center">
                <button class="btn btn-primary" id="singlebutton"><b>Send</b></button>
            </div>
        </div>
    </div>
</div>


</body>
</html>