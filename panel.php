<?php
   include('session.php');
?>

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
   <style>
   body{
	    background-color: transparent;
    background-image: url('Screenshot (1).png');
    background-repeat: none
    background-attachment: scroll;
	     height: 100%; 
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
   }
   
   </style>

</head>
   <body>
   
   
   
   

   <form>
 <div class="col-md-2"style="margin-top:55px;margin-left:-25px; ">
<div class="list-group">
  <a href="panel.php?d=1" class="list-group-item list-group-item-success">dashboard</a>
  <a href="panel.php?d=2" class="list-group-item list-group-item-info">add product</a>
  <a href="panel.php?d=3" class="list-group-item list-group-item-warning">view product</a> 
 
  <a href="panel.php?d=6" class="list-group-item list-group-item-info">Change password </a>
  <a href="?d=7" class="list-group-item list-group-item-danger">Logout</a>
   
</div>
</div>
</form>
<div class="col-md-10" style="margin-top:55px;margin-left:-25px; ">
<?php 
$dd=0;
if(isset($_GET['d'])){
$dd=$_GET['d'];	
}
switch($dd){
	
	case 1:
	include'';
	break;
	
	case 2:
	include'addproduct.php';
	break;
	
	case 3:
	include'view.php';
	break;
	
	
	
	
	case 6:
	include'changepass.php';
	break;
	
	
	
	
	
	
	case 7:
	
	$_SESSION = array();
//if (ini_get("session.use_cookies")) {
   // $params = session_get_cookie_params();
    //setcookie(session_name(), '', time() - 42000,
      //  $params["path"], $params["domain"],
       // $params["secure"], $params["httponly"]
    //);
//}
session_destroy();
header("Refresh:0");
//header("Location: Login_Villageofficer.php");
	
	/*$_SESSION = array();
	session_unset();
	session_destroy();
	 unset($_SESSION['adm']);
	header("Location: Login_Villageofficer.php");*/
	exit; 
	
	break;
	
	
	case 1000:
	$id=123456789;
	if(isset($_GET['m'])){
	$id=$_GET['m'];	
		}
	
	include'delete_evak.php?id=$id';
	break;
	
}
?>

