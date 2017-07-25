
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    
</head>
<body>
<nav class="navbar navbar-default navbar-custom">
        <div class="container-fluid">
           <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
            </div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="viewer.php">Home</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                </ul>
            </div>
           
        </div>
        
    </nav>
<header class="intro-header" style="background-image: url('img/login-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Login</h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>   
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <form method="get">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" >
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <center><button type="submit" name="submit" class="btn btn-default">Login</button></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
<?php

include("class.php");
session_start();
if(isset($_SESSION['username'])){
	header('Location:home.php');
}
if(isset($_GET['submit'])){

$username=$_GET["username"];
$password=$_GET["password"];	
if($username=="admin"){
$admin=new admin($connect);
if($admin->asignin($username,$password)){
$_SESSION['username']=$username;	
header("Location:adminhome.php");
}
else{
echo "<center><font size='5'><p class='text-danger'>Sorry username or password is incorrect</p></font></center>";	
}
}
else{
	$blogger=new blogger($connect);
	if($blogger->signin($username,$password)==true){
		$_SESSION['username']=$username;
		header('Location:home.php');
	}
		else{
      echo "<center><font size='5'><p class='text-danger'>Sorry username or password is incorrect</p></font></center>";	
     }
	}
}


?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>  
                        <a href="https://twitter.com/kra8536">
                                <span class="fa-stack fa-lg">
                                    <i class="fa">&#xf099;</i>
                                   
                                </span>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/kra8536">
                                <span class="fa-stack fa-lg">
                                    <i class="fa">&#xf09a;</i>
                                    
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/kra8536">
                                <span class="fa-stack fa-lg">
                                    <i class="fa">&#xf09b;</i>
                                    
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Life in a Bloom 2016</p>
                </div>
            </div>
        </div>
    </footer>
 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/clean-blog.min.js"></script>   
</body>
</html>