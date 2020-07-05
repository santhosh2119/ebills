<?php require_once('Connections/ebils.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_POST['submit'])) {
  $colname_Recordset1 = $_POST['date'];
	$coln = $_POST['sessionid'];
	$colns = $_POST['exdate'];

}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM pestcontrol WHERE date BETWEEN '".$_POST["date"]."' AND '".$_POST["exdate"]."'
", GetSQLValueString($colname_Recordset1, "text"),
						   GetSQLValueString($colns, "text"),
						   GetSQLValueString($coln, "text"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php echo date("d.M.Y") ?><br>
<?php do { ?>
	
  <?php echo $row_Recordset1['invoiceno']; ?><?php echo $row_Recordset1['cname']; ?><?php echo $row_Recordset1['date']; ?><br>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
	<form action="last month.php" method="POST">
	<input type="text" name="sessionid" value="1">
	<input type="text" name="date" value="06.Feb.2020">
	<input type="text" name="exdate" value="06.Feb.2020">
	<button type="submit" name="submit">
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
