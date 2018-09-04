<?php
require_once("../conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customizing Edit Control Width & Height</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders"); 

// enable edit
$dg -> enable_edit("FORM", "CRUD"); 

$dg->set_col_edit_dimension("status", 40);
$dg->set_col_edit_dimension("comments", 40, 10);
$dg->set_col_edit_dimension("customerNumber", 10);

$dg->enable_debug(false);
$dg -> display();
?>

</body>
</html>