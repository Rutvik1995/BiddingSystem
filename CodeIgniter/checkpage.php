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



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="http://rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

</head>


<body>

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
  


<br>
<br>
<br>

<div class="topnav" style="margin-top: -70px;">
    <a class="active" href="#home">CalPERS</a>
</div>

<br>
<br>



<div class="container">


<table  class="table  m-5 pb-5 " >

<tr class="p-3 mb-2 bg-primary text-white">

<th  style="font-size: 130%;" scope="col">Solicitation Number:  <?php echo $result[0]->id;?></th>
<th style="font-size: 100%;" scope="col"></th>


</tr>
    

</table>    
<br>



    <table class="table table-striped"  >
  
    <tr >
      <th scope="col" style="font-size: 120%; " >Solicitation Title:</th>
      <th scope="col" style="font-size: 120%; " > <?php echo $result[0]->title;?></th>
     
      
    </tr>
  
  
    <tr>
      <th scope="row" style="font-size: 120%; ">Type:</th>
      <th  scope="row" style="font-size: 120%; "><?php echo $result[0]->type;?></td>
      
     
    </tr>
    <tr>
      <th scope="row" style="font-size: 120%; "> Created Date:</th>
      <th style="font-size: 120%; "><?php echo $result[0]->lastupdated;?></th>
      
      
    </tr>
    
    <tr>
      <th scope="row" style="font-size: 120%; ">Final Filling Date:</th>
      <th style="font-size: 120%; "><?php echo $result[0]->due;?></th>
      
      
    </tr>
    

        <tr>
      <th scope="row" style="font-size: 120%; ">Category:</th>
      <th style="font-size: 120%; "><?php  echo $result[0]->category;?></th>      
    </tr>

      <tr>
      <th scope="row" style="font-size: 120%; ">Description:</th>
      <th style="font-size: 120%; "><?php  echo $result[0]->description;?></th>
    </tr>

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


<?php foreach($result as $r):?>
<?php
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
                <th style="font-size: 100%;" scope="col">Posted Date</th>
                <th style="font-size: 100%;" scope="col">Due Date</th>

            </tr>


                <tr>
                <th style="font-size: 100%;" ><u><a onclick="eModal.iframe('<?php echo $r->path; ?>');"><strong style="color:#42b6f4;" ><?php  echo $r->dtitle;  ?><strong></a></u></th>
                <th style="font-size: 100%;"><?php echo $r->duedate;?></th>
                <th style="font-size: 100%;"><?php echo $r->posteddate;?></th>
                </tr>    

 <?php else:?>


<tr>
                <th style="font-size: 100%;" ><u><a onclick="eModal.iframe('<?php echo $r->path; ?>');"><strong style="color:#42b6f4;" ><?php  echo $r->dtitle;  ?><strong></a></u></th>
                <th style="font-size: 100%;"><?php echo $r->duedate;?></th>
                <th style="font-size: 100%;"><?php echo $r->posteddate;?></th>
                </tr>   
                <?php endif;?>                

 </table>    



<?php endforeach;
// var_dump($heading);
?>


<ul class="list-inline pull-right">
                    
     <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
  Reject
</button></li>
                    <li><button type="button" data-toggle="modal"  data-target="#exampleModalLong2"  class="btn btn-success">Accept</button></li>
                </ul>


</div>


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Are You Sure You want to reject ?</h4>
        
        </button>
      </div>
      
      <div class="modal-footer">

               
        <a type="submit"  href="http://localhost:8888/codeigniter/index.php/welcome/reviewerpage3" class="btn btn-danger"   onclick="reject();"  >Yes</a>
      
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>

      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Are You Sure You want to Approve ?</h4>
       
           
        </button>
      </div>
      
      <div class="modal-footer">


     <a type="button" href="http://localhost:8888/codeigniter/index.php/welcome/reviewerpage3"   class="btn btn-danger"  onclick="accept();"   >Yes</a>

        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>


</body>


<br>
<br>
<br>

</html>




<script>
   

    function accept()
    {
        //alert("Hello");


        xmlhttp =new XMLHttpRequest();




xmlhttp.onreadystatechange= function()
{
    if(xmlhttp.readyState==4 && xmlhttp.status == 200)
    {
        //document.getElementById("demo").innerHTML = xmlhttp.responseText;
        document.getElementById("adiv").innerHTML = xmlhttp.responseText;

    }
}

xmlhttp.open('GET','http://localhost:8888/codeigniter/index.php/welcome/acceptstatus?id1=<?php echo $result[0]->id;?>',true);
//alert("Hello2");
xmlhttp.send();


    }



    function reject()
    {
       
        xmlhttp =new XMLHttpRequest();




xmlhttp.onreadystatechange= function()
{
    if(xmlhttp.readyState==4 && xmlhttp.status == 200)
    {
        //document.getElementById("demo").innerHTML = xmlhttp.responseText;
        document.getElementById("adiv").innerHTML = xmlhttp.responseText;

    }
}

xmlhttp.open('GET','http://localhost:8888/codeigniter/index.php/welcome/acceptstatus2?id1=<?php echo $result[0]->id;?>',true);
//alert("Hello2");
xmlhttp.send();
    }



</script>

<script>
    $(document).ready(function() {
        //var url = "www.pdf995.com/samples/pdf.pdf";
        //eModal.ajax("www.pdf995.com/samples/pdf.pdf");
        //eModal.alert('chewh','Hello');
        //eModal.iframe('Documents/doc1.pdf');

        //eModal.iframe('http://www.pdf995.com/samples/pdf.pdf');

    });

</script>
