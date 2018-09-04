<?php
require_once("../conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Datagrid - Apply Filter Method</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

$dg->set_col_width("orderNumber",'200');
$dg->set_col_width("requiredDate",'300');

$dg->set_query_filter("status='Shipped'");
$dg->set_query_filter("YEAR(shippedDate) = 2003");

// - OR - 
// $dg->set_query_filter("status='Shipped' AND YEAR(shippedDate) = 2003");

$dg -> display();
?>

</body>
</html>