
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
if (isset($_GET['ownerid'])) {
  $colname_Recordset1 = 1;
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM pestcontrol WHERE ownerid = %s ORDER BY invoiceno DESC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $ebils) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
   
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
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
        
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
                               <strong> Ebils.</strong> <br>
                               Nagaram, warangal 506371<br>
                               9000953970
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
                    Website design
                </td>
                
                <td>
                    300.00/-
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Hosting (3 months)
                </td>
                
                <td>
                    75.00/-
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Domain name (1 year)
                </td>
                
                <td>
                    10.00/-
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: 385.00/-
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
                <td>
                   November,21,2019
<Br>
Time: 02:00
                </td>
                
                <td>
                    300.00/-
                </td>
            </tr>
            
            
            
             <tr class="item">
                <td></td>
                
                <td>
                  <strong> Total: 385.00/-</strong>
                </td>
            </tr>

            
         <tr class="item">
                <td>
                   Due
                </td>
                
                <td>
                   85/-
                </td>
            </tr>
<tr>

<td></td>

                <td>
                   Powered By <img src ="images/only bb.png" width="1.8%"> 	&copy; <script>document.write(new Date().getFullYear())</script>
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
?>
