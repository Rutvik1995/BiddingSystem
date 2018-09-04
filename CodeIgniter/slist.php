<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"><h1>Bid list</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container" style="margin-top: 20px">
    <h3>List of bids</h3>
    <table class="table table-hover" style="margin-top: 10px">
        <thead>
        <tr>
            <th scope="col">SNumber</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Final/Filing date</th>
            <th scope="col">Type</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>


        </tr>
        </thead>
        <tbody>
        <?php if(count($posts)):?>
            <?php foreach($posts as $post):?>
                <tr>
                    <th scope="row"><?php echo $post->Sno;?></th>
                    <td><?php echo $post->title;?></td>
                    <td><?php echo $post->status;?></td>
                    <td><?php echo $post->filingdatetime;?></td>
                    <td><?php echo $post->type;?></td>
                    <td><?php echo $post->category;?></td>
                    <td><?php echo $post->description;?></td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr><td>No records found</td></tr>
        <?php endif;?>
        </tbody>

    </table>
</div>
</body>
</html>
