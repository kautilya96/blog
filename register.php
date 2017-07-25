<?php
include("config.php");
include("class.php");

?>
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
    <style type="text/css">
    
    </style>
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
                        <a href="signin.php">Login</a>
                    </li>
                </ul>
            </div>
           
        </div>
        
    </nav>
<header class="intro-header" style="background-image: url('img/register-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Register</h1>
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
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" >
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
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

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <center><button type="submit" name="submit" class="btn btn-default">Register</button></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
if(isset($_GET["submit"])){
if ($_GET['username']=='' || $_GET['email']=='' || $_GET['password']=='' || $_GET['confirm_password']=='') {
    echo "<center><font size='5'><p class='text-danger'>Please fill details in the form</p></font></center>";
  } 
else if($_GET['password']!=$_GET['confirm_password']){
  echo "<center><font size='5'><p class='text-danger'>passwords does not match</p></font></center>";
}  
else{ 
$username=$_GET["username"];
$password=$_GET["password"];
$blogger=new blogger($connect);
if($blogger->signup($username,$password)){
$_SESSION['username']=$username;
header("Location:welcome.php");
}
else{
echo "<center><font size='5'><p class='text-danger'>Username is not available</p></font></center>"; 
}
}
}
?>
    <hr>
    
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