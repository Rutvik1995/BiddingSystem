<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en" xmlns:text-align="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Php grid</title>

    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
<div id="container">

    <div class="container text-center" >

    <div id="body">
        <?php echo $grid_html;?>
    </div>
    </div>

</div>
</body>
</html>