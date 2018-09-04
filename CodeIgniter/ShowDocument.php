<!DOCTYPE html>

<html lang="en">

<head>


    <title>DocumentPage</title>


</head>

<body>
<?php

$con=mysqli_connect("localhost","root","root","");

$db=mysqli_select_db($con,"xseed");

$this->load->library('session');
$sid = $this->session->userdata('sid');

$result = mysqli_query($con,"SELECT * FROM `document` WHERE solicitationid = '".$sid."'");




echo '<div class="card">
    <div class="card-body"> 
    <table  class="table table-hover table-responsive-md table-fixed" id="datadocs" >
        <thead class="text-primary">
          <tr>
            <th scope="col"><h4>Title</h4></th>
            <th scope="col"><h4>Sub heading</h4></th>
            <th scope="col"><h4>Due Date</h4></th>
             <th scope="col"><h4>Edit</h4></th>
          </tr>
        </thead>
        <tbody>';

while($row=mysqli_fetch_row($result))
{
    echo'<tr>';

    echo '<td><h4>'.$row[1].'</h4></td>';
    echo ' <td><h4>'.$row[5].'</h4></td>';
    echo '<td><h4>',$row[7].'</h4></td>';

    echo '<td><button type="button" class="btn btn-lg btn-danger"  onclick="deletedoc('.$row[0].');">Delete</button> </td>';
    echo ' </tr>';

}
echo '</tbody>';
echo '</table> </div> </div>';

?>

</body>

</html>
