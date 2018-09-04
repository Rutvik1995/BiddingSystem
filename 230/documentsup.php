<?php
include "auth.php";
if(empty($_SESSION['login'])){
    func_header_location("login.php");
}
$insert=array('BidderId' => $_POST['userid'],'SolicitationId' => $_POST['solid']);
//echo "<pre>";print_r($insert);
func_array2insert('prebid',$insert);

$allowedExtensions = array('jpg','gif','bmp','png', 'docx', 'doc','pdf','sql');
$maxSize = 2097152;
$storageDir = 'documents/documents_'.$_POST['solid'].'_'.$_POST['userid'];

// Result arrays
$errors = $output = array();

if (!empty($_FILES['file_source'])){

    // Validation loop
    foreach($_FILES['file_source']['name'] as $i=> $value){
        if(!empty($_FILES['file_source']['name'][$i])){
            $fileName = $_FILES['file_source']['name'][$i];
            $fileSize = $_FILES['file_source']['size'][$i];
            $fileErr = $_FILES['file_source']['error'][$i];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validate extension
            if (!in_array($fileExt, $allowedExtensions)) {
                $errors[$fileName][] = "Format $fileExt in file $fileName is not accepted";
            }

            // Validate size
            if ($fileSize > $maxSize) {
                $errors[$fileName][] = "$fileName excedes the maximum file size of $maxSize bytes";
            }

            // Check errors
            if ($fileErr) {
                $errors[$fileName][] = "$fileName uploaded with error code $fileErr";
            }
        }
    }

// Handle validation errors here
    if (count($errors) > 0) {
        die("Errors validating uploads: ".print_r($errors, TRUE));
    }

// Create the storage directory if it doesn't exist
    if (!is_dir($storageDir)) {
        if (!mkdir($storageDir, 0755, TRUE)) {
            die("Unable to create storage directory $storageDir");
        }
    }
    $names = array_keys($_FILES['file_source']['name']);

// File move loop
    foreach($_FILES['file_source']['name'] as $i=> $array_value){
        if(!empty($_FILES['file_source']['name'][$i])){
            // Get base info
            $fileBase = basename($_FILES['file_source']['name'][$i]);
            $fileName = pathinfo($fileBase, PATHINFO_FILENAME);
            $fileExt = pathinfo($fileBase, PATHINFO_EXTENSION);
            $fileTmp = $_FILES['file_source']['tmp_name'][$i];
            // Construct destination path
            $name = ltrim(rtrim($i,"'"),"'");
            $fileDst = $storageDir.'/'.$name.'.'.$fileExt;
            for ($j = 1; file_exists($fileDst); $j++) {
                $fileDst = "$storageDir/$name-$j.$fileExt";
            }

            // Move the file
            if (move_uploaded_file($fileTmp, $fileDst)) {
                $output[$fileBase] = "Stored in $fileDst OK";
                /*$sql=mysql_query("INSERT INTO uploaded_files (pid, file_path,file_type)
                       Values ('$_POST[pid]','$fileDst','$fileExt')")
                       or die ("Unable to issue query sql: ".mysql_error());*/
            } else {
                $output[$fileBase] = "Failure while uploading $fileBase!";
                $errors[$fileBase][] = "Failure: Can't move uploaded file $fileBase!";
            }
        }
    }
    // Handle file move errors here
    if (count($errors) > 0) {
        die("Errors moving uploaded files: ".print_r($errors, TRUE));
    } }
func_header_location("documentupload.php?id=".$_POST['solid']);
?>