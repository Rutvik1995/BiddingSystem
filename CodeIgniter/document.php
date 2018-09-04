<!DOCTYPE html>

<html lang="en">

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    
    
  
  
</head>
<style>
    
</style>

<body>

    <div class="container">
       
        <h2>Document</h2>





              <br>
              <br>

        <h4><label for="exampleInputFile">Select One or More File</label></h4>
        
        <div class="panel panel-default">
        <div class="panel-body">   
        <div class="form-group">
            
                <div style="position:relative;">
                        <a class="btn btn-default" href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>
                
            </div>
            
        </div>
       
        </div>
        <p>The maximum file size is 10 MB (or 30 MB all file uploadd at same time).Only file with following extension will be allowed:.doc,.docx,.xls,.xlsx,.ppt,.ptx and .pdf.</p>
        <button type="button" class="btn btn-primary">Upload</button>



        <br>
        <br>
        <br>

        <br/>

        <br>
        <br>
        <table  class="table table-striped table-bordered m-5 pb-5 " >
          <thead class="">
            <tr>
              <th scope="col">Number</th>
              <th scope="col">Document Title</th>
              <th scope="col">Posted Date</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Document 1</td>
              <td>03/03/18</td>

            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Document 2</td>
              <td>03/03/18</td>

            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Document 3</td>
              <td>03/03/18</td>

            </tr>
          </tbody>
        </table>

      </div>


     

      
         </form>







<br>
<br>
<br>


         



                 



                    
</body>


</html>