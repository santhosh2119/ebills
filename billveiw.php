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
if (isset($_GET['msgid'])) {
  $colname_Recordset1 = $_GET['msgid'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM sms WHERE msgid = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
                <a href="busines/login.phps" class="btn btn-simple">Business</a>
            </li>
            <li>
                <a href="user/login.php" class="btn btn-simple">User</a>
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

         
                  
                        
							<div class="list-unstyled follows"  >
  <div class="card-header" style="padding-top:1em;" >
	 <div class="row" align="center">
</div>
  
    <table width="100%" border="0" >
  <tr >

			  <td  width="20%" align="center">
                                        <div   align="center"  >

                                               
                                                    <img src="images/user logo.png" alt="Circle Image" style="max-width: 20%;" class="img-circle img-no-padding img-responsive">
       </td>                                         </div>
  </tr>
    			  </table>
<hr>

<div align="center" style="padding-left: 1em; padding-right: 1em;"> 
<table width="80%" align="center">
  <tbody>
    <tr>
      <td><h6>Inovice No :</h6></td>
    
      <td><?php echo $row_Recordset1['invoiceno']; ?></td>
    </tr>
	  <tr>
      <td><h6>Shop Name :</h6></td>
    
      <td><?php echo $row_Recordset1['businessname']; ?></td>
    </tr><tr>
      <td><h6>Total Amount :</h6></td>
    
      <td><?php echo $row_Recordset1['invoiceno']; ?></td>
    </tr><tr>
      <td><h6>Date :</h6></td>
    
      <td><?php echo $row_Recordset1['date']; ?></td>
    </tr><tr>
      <td><h6>Time :</h6></td>
    
      <td><?php echo $row_Recordset1['time']; ?></td>
    </tr>
  </tbody>
</table>


				


	</div>								<hr>
							   <div class="row" style="padding-left: 1em; padding-right: 1em;">	
                                    <div class="col-md-4 col-md-offset-4">
				<form action="view/<?php echo $row_Recordset1['businesstpye']; ?>previewbill.php" method="POST">
  <input type="hidden" name="ownerid" value="<?php echo $row_Recordset1['ownerid']; ?>">
  <input type="hidden" name="invoiceno" value="<?php echo $row_Recordset1['invoiceno']; ?>">
<input type="hidden" name="businesstpye" value="<?php echo $row_Recordset1['businesstpye']; ?>">
										
										
						   <button class="btn btn-danger btn-block btn-lg btn-fill" type="submit" name="view">View Bill</button>	<br>	</div></div>
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
?>
