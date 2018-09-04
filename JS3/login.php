<?php


$a=$_POST["txtUser"];
$b=$_POST["txtPassword"];
$count=0;

$con=mysqli_connect("localhost","root","root","");


$db=mysqli_select_db($con,"xseed");


$sql="SELECT * FROM ADMIN WHERE email = '$a' and password = '$b'" ;


$sql1="SELECT * FROM ADMIN WHERE email = '$a' and password = '$b'";
$result1=mysqli_query($con,$sql1);


if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount);
  mysqli_free_result($result);
  $count++;
  }

  if($count==1)
{

    $sql2="SELECT role FROM ADMIN WHERE email = '$a' and password = '$b'" ;
    $result2=mysqli_query($con,$sql2);
    while($row=mysqli_fetch_row($result2))
    {
       // echo $sql2;
       // echo $row[0];
       // echo strcmp("Hello world!","Hello world!");
        //echo "<br>";
        //echo "<br>";
        $x= strcmp($row[0],"creator");

        $y= strcmp($row[0],"evaluator");
        $z= strcmp($row[0],"admin");
        if($x==0)
        {
            header('Location: http://localhost:8888/Admin%20DashBroad/AdminDashbroad.html?id1=');
        }
       elseif($y==0)
        {
            header('Location: http://localhost:8888/Admin%20DashBroad/EvaluatorDashbroad.html');
        }

        elseif($z==0)
        {
            header('Location: http://localhost:8888/Admin%20DashBroad/AdminDashbroad2.html?id1=');
        }
        
        else
        {
            
            $x2= strcmp($row[0],"reviewer");
            if($x2==0)
            {
                //echo "gg";
                header('Location: http://localhost:8888/Admin%20DashBroad/ReviewerDashbroad.html');
            }
            else
            {

            }


        }        



   

}
}
else
{
echo "\n Wrong username and password";
}

?>
