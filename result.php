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
  $colname_Recordset1 = $_GET['ownerid'];
}
mysql_select_db($database_ebils, $ebils);
$query_Recordset1 = sprintf("SELECT * FROM pestcontrol WHERE ownerid = 1 ORDER BY date desc ,time desc ", GetSQLValueString($colname_Recordset1, "int"));
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
                    <form class="contact-form">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Inovice Number (or) Mobile</label>
                          <input class="form-control" placeholder="Inovice Number or Mobile"   type=" number"  name="mobile" required/>
                        </div>
                        <div class="col-md-6">
                          <button class="btn btn-danger btn-block btn-lg btn-fill">Search</button>
                        </div>
                      </div>
                      <br>
                      </div>
                    </form>
                    <?php do { ?>
                      <div id="my-tab-content" class="tab-content" align="center">
                      <div class="tab-pane active" id="follows">
                        <div class="row">
                          <div class="col-md-8 col-md-offset- "  >
                            <ul class="list-unstyled follows  "  >
                              <li>
                                <div class="row"  >
                                  <div class="col-md-2 col-md-offset-0 col-xs-3 col-xs-offset-0" align="left" > <img src="assets/paper_img/flume.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive" > </div>
                                  <div class="col-md-7 col-xs-4" align="left">
                                    <h6><?php echo $row_Recordset1['cname']; ?><br />
                                      <small><?php echo $row_Recordset1['mobile']; ?></small><br />
                                      <small><?php echo $row_Recordset1['tamount']; ?></small><br />
                                      <small><?php echo $row_Recordset1['pamount']; ?></small><br />
                                    </h6>
                                  </div>
                                  <div class="col-md-3 col-xs-2">
                                    <div class="unfollow" rel="tooltip" title="Unfollow">
                                      <label class="checkbox" for="checkbox1" >
                                        <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox" checked>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                    <table style="width:80%" border="1" align="center">
                      <tr>
                        <td><strong># Invoice :</strong> 25615</td>
                        <td><strong>Date:</strong> 1 January 2019</td>
                      </tr>
                      <tr>
                        <td><strong>Coustmer Name :</strong> Santhosh</td>
                        <td><strong>Time :</strong> 06:50:23</td>
                      </tr>
                      <tr>
                        <td><strong>Coustmer Name :</strong> Santhosh</td>
                        <td><strong>Time :</strong> 06:50:23</td>
                      </tr>
                    </table>
                    <hr>
                    <table style="width:80%" border="0" align="center">
                      <tr>
                        <td><strong># Invoice :</strong> 25615</td>
                        <td><strong>Date:</strong> 1 January 2019</td>
                      </tr>
                      <tr>
                        <td><strong>Amount :</strong> 50000/-</td>
                        <td ><strong> time:</strong> 06:50:23
                          <button class="btn btn-danger btn-xs btn-fill">Veiw</button></td>
                      </tr>
                    </table>
                    <hr>
                    <table style="width:80%" border="0" align="center">
                      <tr>
                        <td><strong># Invoice :</strong> 25615</td>
                        <td><strong>Date:</strong> 1 January 2019</td>
                      </tr>
                      <tr>
                        <td><strong>Coustmer Name :</strong> Santhosh</td>
                        <td><strong>Time :</strong> 06:50:23</td>
                      </tr>
                      <tr>
                        <td><strong>Amount :</strong> 50000/-</td>
                        <td align="right"><button class="btn btn-danger btn-xs btn-fill">Veiw</button></td>
                      </tr>
                    </table>
                    <hr>
                  </div>
                </div>
            </div>
            </div>
        </div>     
    </div>
    

           <div class="row" >
        <div class="col-md-8 col-md-offset-2" >

           
              </div>
   
          </div>  </div>
   
          </div>  
            </div>
   
          </div>
    <footer class="footer-demo section-dark">
        <div class="container" >
            <nav class="pull-left">
                <ul>
    
                    <li>
                        <a href="http://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                           Blog
                        </a>
                    </li>
                    <li>
                        <a href="http://www.creative-tim.com/product/rubik">
                            Licenses 
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2015, made with <i class="fa fa-heart heart"></i> by Creative Tim
            </div>
        </div>
    </footer>

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
