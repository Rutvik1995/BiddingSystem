<?php
include "auth.php";
if(empty($_SESSION['login'])) {
    func_header_location("login.php");
}
$conn = mysqli_connect("localhost", "root", "root", "xseed");

//$delete=array('BidderId' => $_POST['bidderid'],'SolicitationId' => $_POST['solid']);
//echo "DELETE FROM prebid WHERE BidderId=".$_POST['bidderid']." AND SolicitationId =".$_POST['solid'];
// mysqli_query($conn,"DELETE FROM prebid WHERE BidderId='".$_POST['bidderid']."' AND SolicitationId ='".$_POST['solid']."'");
// mysqli_query($conn,"DELETE FROM biddocdir WHERE BidderId='".$_POST['bidderid']."' AND SolicitationId ='".$_POST['solid']."'");
$docid=$_POST['result'];
//print_r($docid[0]);
//print_r($_POST['result']);
//echo $docid[0];

$insert=array('BidderId' => $_POST['bidderid'],'SolicitationId' => $_POST['solid'],'DocPath' => $_POST['docpath'],'UploadedOn' => date("Y-m-d"));
// echo $_POST['docpath'];
 $dir = new DirectoryIterator($_POST['docpath']);
//$dir = "http://localhost:8888/230/".$_POST['docpath'];
// echo $dir;exit;
$mydir = $_POST['docpath'];
$i=0;
// echo "<pre>";print_r($insert);exit;
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        //echo "Test";
        $curFileName = $fileinfo->getFilename();

        $absfilepath = $mydir."/".$curFileName;

        //echo  $absfilepath;

            // $insert=array('BidderId' => $_POST['bidderid'],'SolicitationId' => $_POST['solid'],'DocPath' => $absfilepath,'UploadedOn' => date("Y-m-d"));
        $uploadedoncol = date("Y-m-d");

        $query = "INSERT INTO BIDDOCUMENTS(`DocId`,`DocPath`,`UploadedOn`,`BidderId`,`SolicitationId`)values('".$docid[$i]."','".$absfilepath."','".$uploadedoncol."','".$_POST['bidderid']."','".$_POST['solid']."')";
                $i++;
        mysqli_query($conn, $query);

    }
}
// exit;
// echo "<pre>";print_r($insert);exit;

$query = "INSERT INTO `bid` (`SolicitationId`, `BidderId`, `Lastname`, `Title`, `FirstEvalStatus`, `SecondEvalStatus`, `score`, `fee`,`relativefeescore`, `published`, `ackid`) VALUES ";

$query .= implode(',',$insert);
mysqli_query($conn,$query);

// echo "<pre>";print_r($insert);exit;

func_array2insert('biddocdir',$insert);

$pid = $_POST['solid'];
$res = func_query("SELECT * FROM Solicitation WHERE id = '$pid'");
$solicitation_data = $res[0];

// echo "<pre>";print_r($insert);exit;

$uid = $_POST['bidderid'];

$res1 = func_query("SELECT * FROM bidder WHERE id = '$uid'");
// echo "<pre>";print_r($res1);
$user_data = $res1[0];
$res2 = func_query("SELECT * FROM bid WHERE BidderId = '$uid' AND SolicitationId = '$pid'");

// exit;
// echo "<pre>";print_r($insert);exit;

$ack_data = $res2[0];

if(empty($res2)){

    $insert1=array('BidderId' => $_POST['bidderid'],
        'SolicitationId' => $_POST['solid'],
        'Lastname' => $user_data['lastname'],
        'Title' => $solicitation_data['title'],
        'ackid' => $_POST['solid']."-".date("Y-m-d H:i:s.u",time()));

    func_array2insert('bid',$insert1);
    $ack_data = $insert1;
// echo "<pre>";print_r($ack_data);
}
// echo "End of Line";exit;
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acknowledgement</title>

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
<div>
    <h2 align=center> Acknowledgement </h2>
    <br>
</div>

<div>
    <h3 align=center> Dear User Thank you for your interest. <br/><br/>Please use the below acknowledgement number for further communications.
    </h3>
</div>
<br /><br />
<div>
    <div><center>
            <div>
                <h3>
                    <b>Acknowledgement Number :</b>
                </h3>
            </div>
            &nbsp;
            <div>
                <h3>
                    <?php echo $ack_data['ackid'];?>
                </h3>
            </div>
        </center>
    </div>
</div>
</body>
</html>