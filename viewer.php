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
    <script>
    function check()
    {
        str=document.getElementById("search1").value;
        
        if (str!="") 
        {
            showResult(str);
        }
    }
   function showResult(str) {

    var e = document.getElementById("search_param");
    var sel_value = e.options[e.selectedIndex].value;
   if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","search.php?q="+str+"&p="+sel_value,true);
  xmlhttp.send();
}
</script>
<?php
include("config.php");
include("class.php");
?>

<style type="text/css">
    .input-group{
        margin-top: 15px;
    }
    #search_param{
        font-size: 10px;
        height: 50px !important;
    }
   #search1{
        height: 50px !important;  
        width: 300px !important;  
        font-family: FontAwesome;
   
   }
</style>
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
               
                <ul class="nav navbar-nav navbar-left">
                    <li>
                    <!--<form>
                    <input type="text" size="30" onkeyup="showResult(this.value)">
                    </form>-->
                    <form action="#" method="get" id="searchForm" class="input-group">
                    
                    <div class="input-group-btn search-panel" id="search">
                        <select name="search_param" id="search_param" class="btn btn-default dropdown-toggle" data-toggle="dropdown" onchange="check()">
                            <option value="all">All</option>
                            <option value="blog_title">Title</option>
                            <option value="blog_category">Category</option>
                            <option value="blog_desc">Description</option>
                            <option value="blog_author">Author</option>
                            <option value="files">Files</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="x" placeholder="&#xf002; Search..." id="search1" onkeyup="showResult(this.value)">
                    </form>
                    <!--
              <div class="container">
          <div class="row">    
         <div class="col-xs-8 col-xs-offset-2">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Contains</a></li>
                      <li><a href="#its_equal">It's equal</a></li>
                      <li><a href="#greather_than">Greather than ></a></li>
                      <li><a href="#less_than">Less than < </a></li>
                      <li class="divider"></li>
                      <li><a href="#all">Anything</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
</div> -->

                    </li>
                    </ul>
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
    <header class="intro-header" style="background-image: url('img/home1-bg.jpg')">
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
<div id="livesearch">

<?php
$viewer=new viewer($connect);
$array=$viewer->blogs();
$x=$viewer->blogs_rows();
if($array==0){
	echo "<center><font size='5'><p class='text-danger'>No blogs to show</p></font></center>"; 
}
else{
for($j=1;$j<=$x;$j++){
$id=$array[$j][7];
  echo'<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <a href="detail.php?x='.$array[$j][6].'">
                        <h2 class="post-title">
                            '.html_entity_decode($array[$j][1]).'
                        </h2>
                        <h3 class="post-subtitle">
                            '.html_entity_decode($array[$j][2]).'
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="author.php?x='. $id . '""> '. html_entity_decode($array[$j][4]). '</a> on '. html_entity_decode($array[$j][5]).' </p>
                    <p class="post-meta">'.substr(html_entity_decode($array[$j][3]),0,400).'</p>
                </div>
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
}
?>
</div>
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
