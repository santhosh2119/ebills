<?php require_once('Connections/ebils.php'); ?>
<?php

include_once 'connections/dbconnect.php';

//check if form is submitted
if (isset ($_POST["check"])) {
	
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$cmobile = mysqli_real_escape_string($con, $_POST['cmobile']);
	$redirect = mysqli_real_escape_string($con, $_POST['redirect']);
	

	if ($mobile == $cmobile) {
		
		header("Location: $redirect");
	} else {
		$errormsg = "Please Enter Correct Mobile Number!!!";
	}
}
?>
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
if (isset($_GET['msgid'])) {
  $colname_Recordset1 = $_GET['msgid'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM sms WHERE msgid = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['msgid'])) {
  $colname_Recordset2 = $row_Recordset1['ownerid'];
 $coln =$row_Recordset1['invoiceno'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = sprintf("SELECT * FROM custbill WHERE ownerid = %s AND invoiceno =%s", GetSQLValueString($colname_Recordset2, "text"),
GetSQLValueString($coln, "text"));
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);



?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Paper Kit by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
     <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
</head>
<body>
    
    <nav  class="navbar navbar-default  navbar-fixed-top"   id="demo-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="www.ebils.in">Ebils</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="btn btn-simple">Business</a>
            </li>
            <li>
                <a href="#" class="btn btn-simple">User</a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-facebook"></i></a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>         
            </div>
            
            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" >

         
                  
                        
							
</div>
  
   


			 
                                        <div   align="center"  >

                                               
                                                    <img src="images/user logo.png" alt="Circle Image" style="max-width: 20%;" class="img-circle img-no-padding img-responsive">
                                         </div>
  
<hr>


	  <?php

$phone = "$row_Recordset2[mobile]";
$result = substr($phone, 0, 2);
$result .= "******";
$result .= substr($phone, 8,2 );
?>
	 
	         
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" >
                          

                                <div class="row">
                       
                               
<form class="contact-form"    role="form" action="ebils.in/bill.php?msgid=<?php echo $colname_Recordset1 ?>" method="POST" name="loginform">
   	 <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

	  <h6 align="center">Please Enter Your Mobile No Given For Billing Combo Of</h6>
   <h4 align="center"><?php echo $result; ?></h4>
	  
      <td><?php echo $colname_Recordset1 ?></td>  
                               
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" placeholder="<?php echo $result; ?>"    name="mobile"  required/>
                                    </div>
<input type="text" name="cmobile" value="<?php echo $row_Recordset2['mobile']; ?>">
 <input type="text" name="redirect" value="ebils.in/billveiw.php?msgid=<?php echo $colname_Recordset1 ?>">
                             
                                    <div class="col-md-6">
                                    
                                      <button class="btn btn-danger btn-block btn-lg btn-fill" type="submit" name ="check">Submit</button>
                                    </div>
</div></form>
  </tbody>
</table>


				


	</div>							
 </form>

	 
	  <br>

  </div>
</div>
                    
                        </div>

                    </div>
   
          </div>


</body>

<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="assets/js/ct-paper-checkbox.js"></script>
<script src="assets/js/ct-paper-radio.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>

<script src="assets/js/ct-paper.js"></script>

</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
