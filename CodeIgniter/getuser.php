<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DocumentPage</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/mdb.css'?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


</head>
<body onload="myFunction();" >


<div class="card ">
    <div class="card-body">
        <div class="modal-body">





            <h4> <div class="p-3 mb-2 bg-primary text-white">Solicitation No : <?php echo $result[0]->id;?></div></h4>
            <br>

            <div class="form-group">

                <table  class="table table-hover table-responsive-md table-fixed" >

                    <tbody>
                    <tr>
                        <th style="font-size: 120%; "scope="row">Final Filling Date</th>
                        <th style="font-size: 120%;"><?php echo $result[0]->due;?></td>


                    </tr>
                    <tr>
                        <th  style="font-size: 120%;" scope="row">Name</th>
                        <th style="font-size: 120%;" ><?php echo $result[0]->title;?></td>


                    </tr>

                    <tr>
                        <th style="font-size: 120%;" scope="row">Type</th>
                        <th style="font-size: 120%;"><?php echo $result[0]->type;?></td>


                    </tr>

                    <tr>
                        <th  style="font-size: 120%;" scope="row">Description</th>
                        <th  style="font-size: 120%;" id="desc">
                        <?php echo $result[0]->description;?></td>
                    </tr>
                    </tbody>
                </table>


                <hr style="width: 100%; color: black; height: 3px; background-color:#1aa3ff" />


                
                <br>
                <br>
                <?php
                $i=0;
                $cl=0;
                $heading= array("");
                $name="hi";
                ?>
                <?php foreach($result as $r):

                if($name==$r->subheading){
                   $cl=0;
                }else{
                    $cl=1;
                    $name=$r->subheading;
                }

                ?>

                <table  class="table  m-5 pb-5 " >
                    <?php if($cl==1):?>
                        <h4 ><?php echo $r->subheading;?></h4>


                        <tr class="p-3 mb-2 bg-primary text-white">
                            <th  style="font-size: 100%;" scope="col">Document</th>
                            <th style="font-size: 100%;" scope="col">Due Date</th>
                            <th style="font-size: 100%;" scope="col">Posted Date</th>

                        </tr>
                        <?php

                        ?>
                        <tbody>
                        <tr>
                            <th style="font-size: 100%;" ><?php echo $r->dtitle;?></th>
                            <th style="font-size: 100%;"><?php echo $r->duedate;?></th>
                            <th style="font-size: 100%;"><?php echo $r->posteddate;?></th>
                        </tr>

                    <?php else:?>

                        <tbody>
                        <tr">
                        <th style="font-size: 100%;" ><?php echo $r->dtitle;?></th>
                        <th style="font-size: 100%;"><?php echo $r->duedate;?></th>
                        <th style="font-size: 100%;"><?php echo $r->posteddate;?></th>

                        </tr>
                        </tbody>
                    <?php endif;?>
            </div>

        </div>
    </div>
</div>
</table>




<?php endforeach;
// var_dump($heading);
?>



</body>
</html>
<script>

    function myFunction()
    {

    }


    //  $('#desc').summernote('code');

</script>