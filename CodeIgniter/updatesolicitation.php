<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update Solicitation</title>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/mdb.css'?>">
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
    <script src="<?php echo base_url().'assets/js/mdb.js'?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/addsolicitationcss.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'?>" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>" type="text/javascript"></script>
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
     <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.loader.min.css'?>">
    <script src="<?php echo base_url().'assets/js/jquery.loader.min.js'?>" type="text/javascript"></script>

   
</head>
<body>



<div class="container " >

    <div class="row">
        <section>
            <div class="wizard ">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Create Solisitation">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil" style="margin-top: 15px"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Upload Documents">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-cloud-upload" style="margin-top: 17px"></i>
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Preview">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-eye-open" style="margin-top: 15px"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-send" style="margin-top: 15px"></i>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <form role="form">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">


                            <h2 align="center">Add Solicitation</h2>


                            <div class="jumbotron z-depth-2">
                                <div class="container" style="margin-top: 20px">
                                    <form method="post" id="sform">
                                        <div class="row">

                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="sid"><b>Solicitation Number</b></label>
                                                    <div class=" hoverable">
                                                    <input type="text" class="form-control " id="sid" style="font-size: 17px; font-weight: 490; color: #4b78c1; " value= "<?php echo $posts[0]->id;?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label for="title"><b>Title</b></label>
                                                    <div class="hoverable">
                                                    <input type="text" class="form-control" id="title" style="font-size: 17px; font-weight: 490; color: #4b78c1; " value= "<?php echo $posts[0]->title;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="finalfilingdate"><b>Final Filing Date/Time</b></label>
                                                    <div class="hoverable">
                                                    <input type="input-append date form_datetime" class="form-control" id="finalfilingdatetime" style="font-size: 17px; font-weight: 490; color: #4b78c1; " value= "<?php echo $posts[0]->due;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="type"><b>Type</b></label>
                                                    <div class="hoverable">
                                                    <input type="text" class="form-control" id="title1" placeholder="Solicitation" style="font-size: 17px; font-weight: 490; color: #4b78c1; " value= "<?php echo $posts[0]->type;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="category" ><b>Category</b></label>
                                                    <div class="hoverable">
                                                    <input type="text" class="form-control" id="title2" placeholder="IT" style="font-size: 17px; font-weight: 490; color: #4b78c1; " value= "<?php echo $posts[0]->category;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
    <div class="form-group">
        <label for="description"><b>Description</b></label>
        <div class="hoverable">
        <textarea class="form-control" rows="5" id="description"><?php echo $posts[0]->description;?></textarea>
    </div>
    </div>
</div>

                                        <br>
                                </div>
                            </div>

                </form>



                <ul class="list-inline pull-right">
                    <li><button type="button" class="btn btn-success next-step" id="snext">Save and continue</button></li>
                </ul>
            </div>
            <div class="tab-pane" role="tabpane2" id="step2">
                <div class="container">
                    <h2>View uploaded Documents</h2>
                    </br>
                    <button type="button" class="btn btn-primary btn-mini" id="viewdocs">
                        View Doc
                    </button>
                    </br>
                    <h2>Upload Documents</h2>
                    </br>

                    <h4><label for="exampleInputFile">Select One or More File</label></h4>

                   
                    <p>The maximum file size is 10 MB (or 30 MB all file uploadd at same time).Only file with following extension will be allowed:.doc,.docx,.xls,.xlsx,.ppt,.ptx and .pdf.</p>


                    <!-- <button type="button" id="upload"    class="btn btn-primary">Upload</button>  -->


                    </br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-mini" id="uploaddoc">
                        Upload Doc
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Enter Details</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">

                                <div style="position:relative;">
                                    <a class="btn btn-default" href='javascript:;'>
                                        Choose File...
                                        <input type="file" id="sortpicture" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                    </a>
                                    &nbsp;
                                    <span class='label label-info' id="upload-file-info"></span>
                                </div>

                            </div>

                        </div>

                    </div>

                    
                
                    <br>
                                        <label for="doctitle">SubHeading </label>
                                        <select class="form-control" id="subheading">
                                        <option> Solicitation Document </option>
                                        <option> Addenda </option>
                                        <option> Required Attachments </option>
                                        <option> Exhibits </option>
                                        <option> Award Notice </option>
                                            </select>
                                            
                                            <br>
                                        
                                        <label for="doctitle">Document Title</label>
                                        <input type="text" class="form-control" id="doctitle"  style="font-size: 17px; font-weight: 490; color: #4b78c1; "  placeholder="Enter Document Title">
                                        <br>
                                        <label for="posteddate">Posted Date</label>
                                        <input type="text" class="form-control" id="posteddate"  style="font-size: 17px; font-weight: 490; color: #4b78c1; " placeholder="Enter Posted Date">
                                        <br>
                                        <label for="duedate">Due Date</label>
                                        <input type="text" class="form-control" id="duedate"  style="font-size: 17px; font-weight: 490; color: #4b78c1; " placeholder="Enter Due Data">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" id="upload"  class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>





                    <br>
                    <br>

                    </form>

                    <div id="adiv">
                    </div>

                </div>














                <ul class="list-inline pull-right">
                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                    <li><button type="button" class="btn btn-success next-step">Save and continue</button></li>
                </ul>
            </div>



            <div class="tab-pane" role="tabpanel" id="step3">
                <h3><b>Preview</b></h3>
                <p>Same preview will be shown on bidder's dashboard</p>

                <br>
                <br>



                <button type="button" class="btn btn-primary btn-block" onclick="hello();" id="step3buttonmodel" >Preview</button>




                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Bid Preview</h4>
                            </div>
                            <div class="modal-body" >


                                <div class="form-group" id="txtHint" >










                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <br>
                <br>
                <br>


                







<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body" style="font-size:20px; color:#4277f4;font-weight: 500;">
        Are You Sure That You Want to Cancel ?
       <br>
       <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a type="button" href="http://localhost:8888/Admin%20DashBroad/AdminDashbroad.html" class="btn btn-primary " onclick="call();" >Yes</a>
      </div>
    </div>
  </div>
</div>









                <ul class="list-inline pull-right">
                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                    
     <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
 Cancel
    </button></li>
<li><button type="button"  onclick="statusupdate();" class="btn btn-success btn-info-full next-step"    >Send to Reviewer</button></li>
                </ul>
 


            </div>
            <div class="tab-pane" role="tabpanel" id="complete">
                <blockquote class="blockquote bq-success hoverable">
                    <p class="bq-title">Successfully Updated</p>
                    <p>Solicitation is sent to reviewer</p>
                </blockquote>
            
            <div class="clearfix"></div>
    </div>
    
</div>
</section>
</div>
</div>



</body>

<script>
   
function statusupdate()
{
   // alert("re");
  //  alert("f");  
 xmlhttp =new XMLHttpRequest();




xmlhttp.onreadystatechange= function()
{
    if(xmlhttp.readyState==4 && xmlhttp.status == 200)
    {
        //document.getElementById("demo").innerHTML = xmlhttp.responseText;
        //document.getElementById("adiv").innerHTML = xmlhttp.responseText;

    }
}

xmlhttp.open('GET','http://localhost:8888/codeigniter/index.php/welcome/changestatus',true);

xmlhttp.send();

//alert("finished2");   



}


   function call()
{

//alert("How are u");

xmlhttp =new XMLHttpRequest();




xmlhttp.onreadystatechange= function()
{
    if(xmlhttp.readyState==4 && xmlhttp.status == 200)
    {
        //document.getElementById("demo").innerHTML = xmlhttp.responseText;
        //document.getElementById("adiv").innerHTML = xmlhttp.responseText;

    }
}

xmlhttp.open('GET','http://localhost:8888/codeigniter/index.php/welcome/cancelsol',true);


xmlhttp.send();

//alert("finished");
call2();
}



function call2()
{
  //  alert("f");  
 xmlhttp =new XMLHttpRequest();




xmlhttp.onreadystatechange= function()
{
    if(xmlhttp.readyState==4 && xmlhttp.status == 200)
    {
        //document.getElementById("demo").innerHTML = xmlhttp.responseText;
        //document.getElementById("adiv").innerHTML = xmlhttp.responseText;

    }
}

xmlhttp.open('GET','http://localhost:88888/codeigniter/index.php/welcome/canceldoc',true);

xmlhttp.send();

//alert("finished2");   

call3();

}


</script>

<br/>

<br/>

<script>
    $('#description').summernote({
        placeholder: 'Hi',
        tabsize: 5,
        height: 150,
        focus: true
    });
</script>
<script type="text/javascript">
    $("#finalfilingdatetime").datetimepicker({
        format: "dd-mm-yyyy  HH:mm P",
        autoclose: true,
        todayBtn: true,
        todayHighlight: true,
        showMeridian: true
    
    });
  
    $("#duedate").datetimepicker({
        format: "mm-dd-yyyy  HH:mm P",
        autoclose: true,
        todayBtn: true,
        todayHighlight: true,
        showMeridian: true
        
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){


        $("#snext").click(function()
        {

            $.ajax({
                url: 'http://localhost:8888/codeigniter/index.php/welcome/exam_grade',
                data: {
                    id: $("#sid").val(),
                    title: $("#title").val(),
                    due: $("#finalfilingdatetime").val(),
                    type: $("#title1").val(),
                    category: $("#title2").val(),
                    description: $("#description").val(),
                },
                async: 'true',
                cache: 'false',
                type: 'post',
                success: function (data) {
                    //jQuery("#attendence_report_holder").html(response);
                  //  alert("Data successfully added");
                },
                error:function(data){
                   // alert("error happend");
                }
            });
        });

    });

</script>

<script>
    $(document).ready(function(){
        $("#uploaddoc").click(function(){
            $("#myModal").modal('hide');
          //  $fileName= $('#sortpicture').prop("files")[0]['name'];
            //document.getElementById('filename').value = $fileName;
            document.getElementById('subheading').value = "";
            document.getElementById('duedate').value = "";
            document.getElementById('doctitle').value = "";
            document.getElementById('posteddate').value = formatDate();

            $("#myModal").modal('show');
        });
    });
</script>









</html>
  <script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>


<style>

</style>


 <script>
    $(document).ready(function(){

        $( "#title1" ).autocomplete({
            source: "http://localhost:8888/codeigniter/index.php/welcome/type_autocomplete",
        });
    });
    $(document).ready(function(){

        $( "#title2" ).autocomplete({
            source: "http://localhost:8888/codeigniter/index.php/welcome/get_autocomplete",
        });
    });
</script>



<script>












    function datasend()
    {


        $.ajax({

            url: 'http://localhost:8888/codeigniter/index.php/welcome/adddocdata', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: {
                filename: "",
                subheading: $("#subheading").val(),
                posteddate: $("#posteddate").val(),
                doctitle: $("#doctitle").val(),
                duedate: $("#duedate").val(),
            },
            type: 'post',
            async: 'true',
            cache: 'false',
            success: function(php_script_response)
            {

               // alert(php_script_response); // display response from the PHP script, if any
                load();
            }
            ,
            error : function(php_script_response) {
               // alert(php_script_response);

            }
        });
    }


    function usethis() {

        $.ajax({
            url: 'http://localhost:8888/codeigniter/index.php/welcome/adddocdata',
            data: {
                filename: " ",
                subheading: $("#subheading").val(),
                posteddate: $("#posteddate").val(),
                doctitle: $("#doctitle").val(),
                duedate: $("#duedate").val(),
            },
            async: 'true',
            cache: 'false',
            type: 'post',
            success: function (data) {
                //jQuery("#attendence_report_holder").html(response);
                load();
            },
            error:function(data){
             //   alert("error happend");
            }
        });
    }


    function load()
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

        xmlhttp.open('GET','http://localhost:8888/codeigniter/index.php/welcome/fordocumenttable',true);

        xmlhttp.send();


    }



</script>
<script>

    $(document).ready(function()
    {


        $('#upload').on('click', function()
        {
            $('#myModal').modal('hide')


            var file_data = $('#sortpicture').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({

                url: 'http://localhost:8888/codeigniter/index.php/welcome/uploaddoc', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data:form_data,
                type: 'post',

                success: function(php_script_response)
                {

                 //   alert(php_script_response); // display response from the PHP script, if any
                    usethis();
                }
            });
        });

    });

</script>

<script>

    $(document).ready(function()
    {


        $('#viewdocs').on('click', function()
        {

            $('#viewdocs').loader('show');
       load();
            $('#viewdocs').loader('hide');
        });

    });

</script>

<script>
    $(document).ready(function()
    {
        $("#step3buttonmodel").click(function()
        {
            $("#myModal1").modal('show');

            $.ajax({

                url: 'http://localhost:8888/codeigniter/index.php/welcome/uploaddoc', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data:form_data,
                type: 'post',

                success: function(php_script_response)
                {

                  //  alert(php_script_response); // display response from the PHP script, if any
                    usethis();
                }
            });

        });
    });
</script>



<script>




    function hello()
    {



        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","http://localhost:8888/codeigniter/index.php/welcome/preview2",true);
        xmlhttp.send();
        //alert(str);



    }

</script>

<script>
    function deletedoc(document_id)
    {
        //alert(document_id);

        $.ajax({
            url: 'http://localhost:8888/codeigniter/index.php/welcome/deletedoc',
            data: {
                docid: document_id,
            },
            async: 'true',
            cache: 'false',
            type: 'post',
            success: function (data) {
                //jQuery("#attendence_report_holder").html(response);
                load();
            },
            error:function(data){
                //alert("error happend");
            }
        });
    }



 
</script>


<script>
    function formatDate() {
    var newDate = new Date();

    var sMonth = padValue(newDate.getMonth() + 1);
    var sDay = padValue(newDate.getDate());
    var sYear = newDate.getFullYear();
    var sHour = newDate.getHours();
    var sMinute = padValue(newDate.getMinutes());
    var sAMPM = "AM";

    var iHourCheck = parseInt(sHour);

    if (iHourCheck > 12) {
        sAMPM = "PM";
        sHour = iHourCheck - 12;
    }
    else if (iHourCheck === 0) {
        sHour = "12";
    }

    sHour = padValue(sHour);

    return sMonth + "-" + sDay + "-" + sYear + " " + sHour + ":" + sMinute + " " + sAMPM;
}

function padValue(value) {
    return (value < 10) ? "0" + value : value;
}
</script>