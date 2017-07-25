<?php
include("config.php");
include("class.php");
session_start();
if(!isset($_SESSION['username'])){
	header("Location:viewer.php");
}
if($_SESSION['username']=='admin'){
	header("Location:admin.php");
}

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
</head>
<body>
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
           <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
            </div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="welcome.php">write</a>
                    </li>
                    <li>
                         <a href="home.php?x=1">Logout</a>
                    </li>
                </ul>
            </div>
           
        </div>
        
    </nav>
    <header class="intro-header" style="background-image: url('img/uhome-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Welcome</h1>
                        <hr class="small">
                        <?php
                        echo '<span class="subheading">'.$_SESSION['username'].'</span>';
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php
if(!isset($_GET['x'])){
  $_GET['x']=0;
}
if($_GET['x']==1){
    session_destroy();
	header("Location:viewer.php");
}
$username=$_SESSION['username'];
$blogger=new blogger($connect);
$array=$blogger->get_blogs($username);
$x=$blogger->get_blogsrow($username);
if($array==0){
	echo "<center><font size='5'><p class='text-danger'>No blogs to show</p></font></center>"; 
}
else{
for($j=1;$j<=$x;$j++){

$id=$array[$j][6];
$image=$blogger->rimage($id);
   echo'<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                        <h2 class="post-title">
                            '.html_entity_decode($array[$j][1]).'
                        </h2>
                        <h3 class="post-subtitle">
                            '.html_entity_decode($array[$j][2]).'
                        </h3>
                    <p class="post-meta">Posted by '. html_entity_decode($array[$j][4]). '</a> on '. html_entity_decode($array[$j][5]).' </p>
                    <small><span class="glyphicon glyphicon-edit"></span><a href="edit.php?x='. $id . '""> edit</a></small><br><br>';
                    if($image==0)
                  {       
                  echo ' <p class="post-meta">'.html_entity_decode($array[$j][3]).'</p>';
                  } 
                else{
                echo ' <p class="post-meta">'.substr(html_entity_decode($array[$j][3]),0,251).'</p>';
               echo'<center><img class="img-responsive" src="'.$image[1].'" width="500px" height="500px" alt=""></center><br>';
               echo ' <p class="post-meta">'.substr(html_entity_decode($array[$j][3]),251).'</p>';
                  }
                   
                echo'</div>
                <hr>
              </div>
            </div> 
            </div>';
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