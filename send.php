<?php require_once('../Connections/ebils.php'); ?>

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
if (isset($_POST['sendinvoice'])) {
	$ownerid = mysqli_real_escape_string($con, $_POST['ownerid']);
	$invoiceno = mysqli_real_escape_string($con, $_POST['invoiceno']);
	$businessname = mysqli_real_escape_string($con, $_POST['businessname']);
    $businesstpye = mysqli_real_escape_string($con, $_POST['businesstpye']);
    $cc_id = $ownerid . '' . $invoiceno;
    $business=$businesstpye/$businesstpyebills.php;
    $id_no = preg_replace('/[^0-9]/', '', $cc_id);
	$date = mysqli_real_escape_string($con, $_POST['date']);
	$time = mysqli_real_escape_string($con, $_POST['time']);
    $cc = 91;
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$cc_mobile = $cc . '' . $mobile;
    $mobile_no = preg_replace('/[^0-9]/', '', $cc_mobile);
	$msg = mysqli_real_escape_string($con, $_POST['msg']);
$colname_Recordset2 = "-1";
if (isset($_POST["view"])) {
  $colname_Recordset2 = $_POST['ownerid'];
  $coln = $_POST['invoiceno'];
}

mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = "SELECT * FROM busers WHERE id = $colname_Recordset2";
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_POST["view"])) {
  $colname_Recordset3 = $_POST['ownerid'];
	 $coln = $_POST['invoiceno'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset3 = sprintf("SELECT * FROM paidamount WHERE (ownerid = %s AND invoiceno=  $coln)", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $ebils) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_POST["view"])) {
  $colname_Recordset4 = $_POST['ownerid'];
	 $coln = $_POST['invoiceno'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset4 = sprintf("SELECT sum(pamount) FROM paidamount WHERE(ownerid = %s AND invoiceno=   $coln )", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysql_query($query_Recordset4, $ebils) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

$colname_Recordset1 = "-1";
if (isset($_POST['view'])) {
  $colname_Recordset1 = $_POST['ownerid'];
	$coln = $_POST['invoiceno'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM pestcontrol WHERE (ownerid = %s AND invoiceno = $coln )", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


?>