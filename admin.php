<?php
include("config.php");
include("class.php");
session_start();
if (!isset($_SESSION['username'])) {
header("Location:viewer.php");
}
$username=$_SESSION['username'];
if($username!="admin"){
header("Location:viewer.php");	
}
$admin=new admin($connect);
$array=$admin->blog_ger();
    $i=1;
    $x=$admin->row($i);

if(isset($_POST['submit'])){
for($j=1;$j<=$i;$j++){
    
    if(isset($_POST[$j])){
        $username=$array[$j][2];
        $k=0;
        $admin->accept($username,$k);
    }
}
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
                        <a href="adminhome.php">Home</a>
                    </li>
                    
                    <li>
                        <a href="req.php">Requests</a>
                    </li>
                    <li>
                        <a href="admin.php?x=1">Logout</a>
                    </li>
                </ul>
            </div>
           
        </div>
        </nav>

<!--<form method="get" align="right">
<div class="btn-group">
<input type="submit" name="req" class="btn btn-primary" value="REQUESTS">
<input type="submit" class="btn btn-primary" name="viewer" value="BLOG">
<input type="submit" name="button" class="btn btn-primary" value="LOGOUT">
</div>
</form>
<form method="get">

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Life in a Bloom</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
     <li><input type="submit" class="btn btn-link" name="req" value="Requets"></li>
     <li><input type="submit" name="button" class="btn btn-link" value="Logout"></li>
     </ul>
  </div>
</nav>
</form>-->

    <header class="intro-header" style="background-image: url('img/admin-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Welcome</h1>
                        <hr class="small">
                        <span class="subheading">Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <center><h1>Active Users :</h1></center><br><br>  
<?php
$admin=new admin($connect);
$array=$admin->blog_ger();
    $i=1;
    $x=$admin->row($i);
    if($array==0){
    	echo "<center><font size='5'><p class='text-danger'>No Bloggers to show</p></font></center>";
    }
    else{
        echo'<center>
<table class="table" width="200px">
    <thead>
      <tr>
        <th>Blogger ID</th>
        <th>Username</th>
        <th>Creation date</th>
        <th>Active Status</th>
        <th>Disable status</th>
      </tr>
    </thead>
    <tbody>
    ';

    	echo "<form method='post'>";
for($i=1;$i<=$x;$i++){
	   if($array[$i][4]==0){
         $k="Unactive";
	   }
	   else{
	   	$k="Active";
	   }
	    echo "<tr>
        <td><b>".$array[$i][1]."</b></td>
        <td><b>".$array[$i][2]."</b></td>

		<td><b>".$array[$i][3]."</b></td>
		<td><b>".$k."</b></td>
		<td><input type='checkbox' name='" .$i."'></td>
		</tr>";

}

echo "</tbody>
</table></center>";
echo '<br><br><br><br><br><center><div class="f">
<input type="submit" name="submit" class="btn btn-default" value="Save changes">
</center></form></div>';


}
if(!isset($_GET['x'])){
$_GET['x']=0;  
}
if($_GET['x']==1){
session_destroy();
header('Location:viewer.php');	
}
/*if (isset($_GET["viewer"])) {
header('Location:viewer.php');
}*/

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
