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
<?php
include("config.php");
include("class.php");
?>
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
                        <a href="viewer.php">Home</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="signin.php">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                </ul>
            </div>
           
        </div>
        
    </nav>
    <header class="intro-header" style="background-image: url('img/detail-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Life in a Bloom</h1>
                        <hr class="small">
                        <span class="subheading">A Place where you can write your mind</span>
                    </div>
                </div>
            </div>
        </div>
    </header>	

<!--<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Life in a Bloom</a>
      </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="active" href="contact.php">Contact-us</a></li>
      <li ><a class="active" href="signin.php">Login</a></li>
      <li><a class="active" href="register.php">Register</a></li>
    </ul>
  </div>
</nav>-->
<?php
$x=$_GET['x'];
$viewer=new viewer($connect);
$array=$viewer->blogsdetail($x);

if($array==0){
	echo "<center><font size='5'><p class='text-danger'>No blogs to show</p></font></center>"; 
}
else{

$id=$array[1][7];
$id1=$array[1][6];
$x=strlen(html_entity_decode($array[1][3]));
$m=$x/2;
$blogger=new blogger($connect);
$image=$blogger->rimage($id1);
  echo'<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <a href="detail.php?x='.$array[1][6].'">
                        <h2 class="post-title">
                            '.html_entity_decode($array[1][1]).'
                        </h2>
                        <h3 class="post-subtitle">
                            '.html_entity_decode($array[1][2]).'
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="author.php?x='. $id . '""> '. html_entity_decode($array[1][4]). '</a> on '. html_entity_decode($array[1][5]).' </p>
                    ';
                    if($image!=0){
                    echo'<p class="post-meta">'.substr(html_entity_decode($array[1][3]),0,$m).'</p>
                
                        <center><img class="img-responsive" src="'.$image[1].'" alt=""></center><br>
                    
                    <p class="post-meta">'.substr(html_entity_decode($array[1][3]),$m+1).'</p>';
                }
                else
                {
                    echo '<p class="post-meta">'.html_entity_decode($array[1][3]).'</p>';    
                }
                echo'</div>
                <hr>
              </div>
            </div> 
            </div>';
    
/*echo "<div class='page-header'><b><h1>".html_entity_decode($array[$j][1])."</h1></b>";
echo "<small>Category : ".html_entity_decode($array[$j][2])."</small><br>";
$id=$array[$j][7];
echo "<small>Created by :<a href='author.php?x=". $id . "'> ". html_entity_decode($array[$j][4]). "</a> on ". html_entity_decode($array[$j][5]). " </small><br><br><br>";
echo "<b><font size='4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . html_entity_decode($array[$j][3]). "</b></font></div>";
*/
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
