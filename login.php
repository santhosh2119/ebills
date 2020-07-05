<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: btype.php");
}

include_once '../connections/dbconnect.php';

//check if form is submitted
if (isset ($_POST["login"])) {
	
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM busers WHERE  mobile = '" .$mobile. "' and password = '" . $password . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: btype.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/paper_img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Paper Kit by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="../assets/css/demo.css" rel="stylesheet" /> 
    <link href="../assets/css/examples.css" rel="stylesheet" /> 
        
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
                            <h2 class="text-center">Business Login</h2>
<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                           <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="loginform">
       <div class="row">

                                    <div class="col-md-6">
                                        <label>Mobile</label>
                                        <input class="form-control" placeholder="Mobile" pattern="[0-9]{10}"  type=" number" maxlength="10" name="mobile" required/>
                                    </div>

                              
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input class="form-control" placeholder="Password" type="password" name="password"  required/>
                                    </div>
                                </div>
                              <br>
                                    <div class="col-md-4 col-md-offset-4">
<button type="submit" class="btn btn-danger btn-block btn-lg btn-fill" name="login">Login</button>
                                           </div>

                                </div>

                            </form>
                        </div>
 <div class="forgot" align="center">
<br>

                                    <a href="#" class="btn btn-simple btn-danger" >Forgot password?</a>
                                </div>
                    </div>
                    
                </div>
            </div>
        </div>     
    </div>
    
    <footer class="footer-demo section-dark">
        <div class="container">
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

<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="../assets/js/ct-paper-checkbox.js"></script>
<script src="../assets/js/ct-paper-radio.js"></script>
<script src="../assets/js/bootstrap-select.js"></script>
<script src="../assets/js/bootstrap-datepicker.js"></script>

<script src="../assets/js/ct-paper.js"></script>
    
</html>