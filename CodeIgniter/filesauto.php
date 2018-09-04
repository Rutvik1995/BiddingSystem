<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Autocomplete</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
</head>
<body>
   <div class="container">
    <div class="row">
        <h2>Search</h2>
    </div>
    <div class="row">
        <input type="text" class="form-control" id="title" placeholder="Solicitation"">
    </div>
</div>
 
    <?php $arr_result?>
<style>
    .ui-autocomplete
    {
        position:absolute;
        cursor:default;
        z-index:1001 !important
    }
</style>
    <script>
    $(document).ready(function(){
        $( "#title" ).autocomplete({
            source: "http://localhost:8888/codeigniter/index.php/welcome/get_autocomplete",
        });
    });
</script>
 
</body>
</html>