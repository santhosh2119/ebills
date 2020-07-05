<?php require_once('Connections/ebils.php'); ?>
<?php
session_start();
 
if(!isset($_SESSION['usr_id'])){
    header('Location: login.php');
    exit;
} else {
    // Show users the page!
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
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset1 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = "SELECT * FROM pestcontrol WHERE ownerid = $colname_Recordset1 ORDER BY invoiceno DESC";
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset2 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset2 = sprintf("SELECT * FROM busers WHERE id = $colname_Recordset2", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $ebils) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_SESSION['usr_id'])) {
  $colname_Recordset3 = $_SESSION['usr_id'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset3 = sprintf("SELECT * FROM pestpamount WHERE ownerid = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $ebils) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>


    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
	width:100%;
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
		#d-wrapper	div > * {
		margin: 0 40px;
	}

#d-wrapper	.zig-zag-bottom{
		margin: 32px 0;
		margin-top: 0;
		background: #1ba1e2;
	}

#d-wrapper	.zig-zag-top{
		margin: 32px 0;
		margin-bottom: 0;
		background: #1ba1e2;
	}

#d-wrapper	.zig-zag-bottom,
#d-wrapper	.zig-zag-top{
			  padding: 32px 0;
	}
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

<script src='jquery.js'></script>
	<script src="jQuery.print.js"></script>
	<script>
		// here we will write our custom code for printing our div
		$(function(){
			$('#print').on('click', function() {
                //Print ele2 with default options
                $.print(".print_div");
            });
		});
	</script>



<style>
div#load_screen{
	background: #000;
	opacity: 1;
	position: fixed;
    z-index:10;
	top: 0px;
	width: 100%;
	height: 1600px;
}
div#load_screen > div#loading{
	color:#FFF;
	width:120px;
	height:24px;
	margin: 300px auto;
}
</style>
<script>
window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>
</head>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Paper Kit by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../assets/css/demo.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
      
</head>
<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="http://www.creative-tim.com">
           <div class="logo-container">
                <div class="logo">
                    <img src="assets/paper_img/new_logo.png" alt="Creative Tim Logo">
                </div>
                <div class="brand">
                    Creative Tim
                </div>
            </div>
      </a>
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="components.html" class="btn btn-danger btn-simple">Components</a>
          </li>
          <li>
            <a href="tutorial.html" class="btn btn-danger btn-simple">Tutorial</a>
          </li>
          <li>
            <a href="http://www.creative-tim.com/product/paper-kit" target="_blank" class="btn btn-danger btn-fill">Download</a>
          </li>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>         

         
<div id="load_screen"><div id="loading" align="center"><img src=images/load.gif> </div></div>
    <div class="invoice-box" class="print_div">


<table cellpadding="0" cellspacing="0" >
<tr class="header">

        <td width="20%"  align="center"> <img src="images/only bb.png"  style="width:80%; max-width:60px;"  ></td>
        <td>
                                <strong>Invoice #:<?php echo $row_Recordset1['invoiceno']; ?>  </Strong><br>
                                Date: <?php echo $row_Recordset1['date']; ?><br>
                                Time:<?php echo $row_Recordset1['time']; ?>
                            </td>

       
      </tr>


                </table>
<hr>
           

               <table cellpadding="0" cellspacing="0">
                   
                         <tr class="information">
                            <td>
From:<br>
                               <strong> <?php echo $row_Recordset2['businessname']; ?>.</strong> <br>
                               <?php echo $row_Recordset2['city']; ?>, <?php echo $row_Recordset2['district']; ?>,<?php echo $row_Recordset2['state']; ?>,<?php echo $row_Recordset2['pincode']; ?> <br>
                             <?php echo $row_Recordset2['mobile']; ?> 
                            </td>
                            
                           <td>
                              To:<br>
                               <strong><?php echo $row_Recordset1['cname']; ?></strong> <br>
                             
                               <?php echo $row_Recordset1['mobile']; ?>
                            </td>
                        </tr>
                    
                </td>
            </tr>


            </table>
<br>
<table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr>
            </table>


<table cellpadding="0" cellspacing="0" >
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Service
                </td>
                
                <td><?php echo $row_Recordset1['services']; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
          Contract Period Starts
                </td>
                
                <td>
                  <?php echo $row_Recordset2['city']; ?>
                   <?php echo $row_Recordset1['cps']; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                  Contract Period Ends
                </td>
                
                <td>
                   <?php echo $row_Recordset1['cpe']; ?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: <?php echo $row_Recordset1['tamount']; ?>/-
                </td>
            </tr>
        </table> 
<hr>
    <table>

<div content align="center">
 <img src ="images/ss.jpg"   width="10%" > 
<h6>Payment Process</h6>
</div>
      
<hr>
<table cellpadding="0" cellspacing="0" >
            <tr class="heading">
                <td>Payment Done On 
                </td>
                
                <td>
                   Paid
                </td>
            </tr>
            
            <tr class="item">
                <?php do { ?>
                <td>
                    <?php echo $row_Recordset3['date']; ?><br><?php echo $row_Recordset3['time']; ?>
                    
                  </td>
                  
                  <td>
                    <?php echo $row_Recordset3['pamount']; ?>/-
                  </td>
                  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
            </tr>
            
            
            
             <tr class="item">
                <td>Total Bill</td>
                
                <td>
                  <strong> <?php echo $row_Recordset1['tamount']; ?>/-</strong>
                </td>
            </tr>

            
         <tr class="item">
                <td>
                   Due
                </td>
                
                <td>
                <strong> <?php echo $row_Recordset1['tamount']-$row_Recordset1['pamount']; ?>/-<strong>
                </td>
            </tr>
<tr>

<td></td>

                <td>
                   Powered By <img src ="images/only bb.png" width="1.8%"> 	&copy;<?php echo date("Y") ?>
                </td>
            </tr>
</table>
</div> 
   <div> 
<center><button id='print' style='margin-top: 10px; padding: 10px; border: none; text-align: center; background: black; border-radius: 4px; color: #fff; font-weight: bold; cursor: pointer;'>PRINT ABOVE DIV</button></center>
      </div>              
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
