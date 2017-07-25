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
$viewer=new viewer($connect);
if(!isset($_GET['x'])){
    header("Location:viewer.php");
}
else{
$id=$_GET['x'];
settype($id,"integer");
$viewer->deletep($id);
}
header("Location:adminhome.php");
?>