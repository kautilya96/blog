<?php
session_start();
include("config.php");
include("class.php");
if(!isset($_SESSION['username'])){
	header("Location:viewer.php");
}
if($_SESSION['username']=='admin'){
	header("Location:admin.php");
}
if(!isset($_GET['x'])){
    header("Location:home.php");
}
else{
$id=$_GET['x'];
settype($id,"integer");
}
$username=$_SESSION['username'];
$blogger= new blogger($connect);
$array=$blogger->retrive($id,$username);
$image=$blogger->rimage($id);
$a=$blogger->active($username);
if($image==0){
$flag=0;
}
else{ 
$i=$image[1];
$bid=$image[2];
$flag=1;
}
if(isset($_POST['submit'])){
 if($_POST['title']==NULL || $_POST['content']==NULL || $_POST['category']==NULL){
         echo "<center><font size='5'><p class='text-danger'>Please enter all the mandatory details</p></font></center>";       
        }

else if($a==0){
 echo "<center><font size='5'><p class='text-danger'>Sorry you currently have no rights of posting on blog</p></font></center>";   
}       
 else{        
$title=htmlspecialchars($_POST['title'],ENT_QUOTES);
$category=htmlspecialchars($_POST['category'],ENT_QUOTES);
$content=htmlspecialchars($_POST['content'],ENT_QUOTES);    
$blogger=new blogger($connect);
$blogger->edit($id,$title,$category,$content);
if(!empty($_FILES['image']['tmp_name'])){
       echo "hi";
       $path="images/".$_FILES['image']['name'];
       echo $path;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $blogger=new blogger($connect);
        if($flag==1){
         unlink($i);   
        $blogger->eimage($bid,$id,$path);
      }
      else{
        $blogger->image($id,$path);
      }
  }
      header("Location:home.php");

}
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
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                         <a href="home.php?x=1">Logout</a>
                    </li>
                </ul>
            </div>
           
        </div>
        
    </nav>
    <header class="intro-header" style="background-image: url('img/edit-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Edit</h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php
$username=$_SESSION['username'];
$blogger=new blogger($connect);
$a=$blogger->active($username);
//echo '<font size="6" align="left" class="glyphicon glyphicon-user"> <b>'.$username.' </b> </font><br><br>';
if($a==0){
    echo "<b><font size='3' align='left'>Status:<mark>Unactive</mark></font></b>";
}
else
{
    echo "<b><font size='3' align='left'>Status:<mark>Active</mark></font></b>";
}
?>
<?php
$image=$blogger->rimage($id);
$i=$image[1];
$bid=$image[2];
echo'
<center><img class="img-responsive" src="'.$image[1].'" width="500px" height="500px" alt=""></center><br>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
<center><label for="title">Title<span style="color:red;">*</span></label></center>
<div class="container">
<input type="text" class="form-control" name="title" value="'.htmlspecialchars_decode($array[1][1]).'">
</div>
<center><label for="title">Category<span style="color:red;">*</span></label></center>
<div class="container">
<input type="text" class="form-control" name="category" value="'.htmlspecialchars_decode($array[1][2]).'">
</div>
</div>
<div class="form-group">
<center><label for="content">Content<span style="color:red;">*</span></label></center>
<div class="container">
<textarea class="form-control" rows="15" cols="50" name="content">'.htmlspecialchars_decode($array[1][3]).'</textarea>
</div>
<div class="container">
<input type="file" name="image">
</div>
</div>	
<br><br><br>
<center>
<button type="submit" name="submit" class="btn btn-default">Edit</button>
</center>
</form>
';
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