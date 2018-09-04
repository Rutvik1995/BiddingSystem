<?php
include "auth.php";

if(empty($_SESSION['login'])){
    func_header_location("login.php");
}
if(isset($_GET) && !empty($_GET['id']))
    if($_GET['id'])
    {
        $pid = $_GET["id"];
        $mand_documents = func_query("SELECT * FROM document WHERE SolicitationId = '$pid'");
        // echo "<pre>";print_r($mand_documents);exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Documents Upload</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
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


</head>

<body>
<div class="topnav">
    <a class="active" href="#home">CalPERS</a>
    <?php if(!empty($_SESSION['login'])){?>
        <a class="pull-right" href="login.php?mode=logout">Logout</a>
        <a class="pull-right" href="Dashboard.php">Dashboard</a>
        <a class="pull-right" href="updateprofile.php?id=<?php echo $_SESSION['login_id'];?>">Edit Profile</a>
        <a class="pull-right" href="#">Hello <?php echo $_SESSION['login'];?></a>
    <?php }else{ ?>
        <a class="pull-right" href="register.php">Register</a>
    <?php } ?>
</div>
<br /><br />

<div class="container">
    <h2>Documents Upload for <?php echo $_GET["id"];?></h2>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#">Edit</a></li>
        <li><a href="#">View</a></li>
    </ul>
    <form name="login" method="post" action="documentsup.php" enctype="multipart/form-data">
        <input type="hidden" name="solid" value="<?php echo $_GET["id"];?>"/>
        <input type="hidden" name="userid" value="<?php echo $_SESSION["login_id"];?>"/>
        <div class="panel panel-default">
            <div class="panel-body">
                <table  class="table table-striped table-bordered pb-5 ">
                    <thead class="">
                    <tr>
                        <th scope="col">Subheading</th>
                        <th scope="col">Document Title</th>
                        <th scope="col">File</th>
                        <th scope="col">Uploaded On</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $biddocdir = func_query("SELECT * FROM biddocdir WHERE BidderId='".$_SESSION["login_id"]."' AND SolicitationId ='".$_GET['id']."'");
                    // echo "<pre>";print_r($biddocdir);exit;
                     $docid=Array();
                        $i=0;
                    $upload_count = 0;
                    $mandupload_count = count($mand_documents);
                    if(!empty($mand_documents)){

                        foreach($mand_documents as $key=>$val){
                            ?>
                            <tr>
                                <th scope="row"><?php $p = $key+1; echo $p; ?></th>
                                <td id="document_name<?php echo $p;?>"><?php echo $val['dtitle'];  $docid[$i]=$val['id']; $i++;?></td>
                                <td>
                                    <?php
                                    if(is_dir('documents/documents_'.$_GET["id"].'_'.$_SESSION['login_id'])) {
                                        $files = scandir('documents/documents_'.$_GET["id"].'_'.$_SESSION['login_id']);
                                        foreach($files as $key=>$v){
                                            if($v != "." && $v != ".."){
                                                if(strpos($v, $val['dtitle']) !== false){
                                                    echo "<span style='color:green;font-weight:bold;'>Uploaded this document(".$v.")</span>";
                                                    $upload_count++;
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <!--<a class="btn btn-default" href='javascript:;'>-->
                                    <input type="file" name="file_source['<?php echo $val['dtitle'];?>']" size="40" id="<?php echo $p;?>">
                                    <!--</a>-->
                                    &nbsp;
                                    <span class='label label-info' id="upload-file-info"></span>
                                </td>
                                <td><?php if(!empty($biddocdir)){ echo $biddocdir[0]['UploadedOn'];}?></td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
                <h4><label for="exampleInputFile">Upload Optional Files</label></h4>
                <div class="form-group">
                    <div style="position:relative;">
                        <input type="file" name="file_source['other']" size="40">
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>
                </div>
                <p>The maximum file size for each file is 10 MB. Only file with the following extensions will be allowed:.doc,.docx and .pdf.</p>
                <button type="submit" class="btn btn-primary">Upload Documents</button>
    </form>
    <br><br>
    <form name="login" method="post" action="acknowledgement.php">
        <input type="hidden" name="solid" value="<?php echo $_GET["id"];?>"/>
        <input type="hidden" name="bidderid" value="<?php echo $_SESSION["login_id"];?>"/>
        <input type="hidden" name="docpath" value="documents/documents_<?php echo $_GET["id"].'_'.$_SESSION['login_id'];?>"/>
        <input type="hidden" name="docid" value="<?php echo $mandupload_count;?>"/>
        <?php foreach($docid as $value)
        {
        echo '<input type="hidden" name="result[]" value="'. $value. '">';
        }?>
        <button type="submit" class="btn btn-primary <?php if($upload_count != $mandupload_count || $upload_count == 0){echo "disabled";}?>">Submit</button>
    </form>
</div>
</div>
</div>
<br>   <br>   <br>
</body>
</html>