<?php
include "auth.php";

if(isset($_GET) && !empty($_GET['id']))
if($_GET['id'])
{
	$pid = $_GET["id"];
	$res = func_query("SELECT * FROM Solicitation WHERE id = '$pid'");
	$solicitation_data = $res[0];
}
?>
<div>
	<h2 align=center> Solicitation Details </h2>
</div>

<div class="">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="sid"><b>Solisitation Number :</b></label>
				<input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['id'];?>" readonly>
                
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['title'];?>" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="finalfilingdate"><b>Final Filing Date/Time</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['due'];?>" readonly>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="type"><b>Type</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['type'];?>" readonly>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="category" ><b>Category</b></label>
                <input type="text" class="form-control" id="title" value="<?php echo $solicitation_data['category'];?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="finalfilingdate"><b>Description</b></label>
            <textarea class="form-control" rows="5" id="description" value="" readonly><?php echo $solicitation_data['description'];?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>