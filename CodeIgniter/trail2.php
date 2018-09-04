<!DOCTYPE html>
<html>
<head>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=3rtj0v8nk7n36ofo02i4dv808l11ovot2qo9vwqsi2y6j8hy"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
  <textarea>Next, start a free trial!</textarea>


<button   onclick="hello();">   </button>



</body>
</html>


<script>

function hello()
{
  alert("re");
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

  </script>