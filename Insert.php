<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
*Include connection class that connect with database, 
*and collection class that cotain the method to apply on documents
**/
require 'MongoConnection.php';
require 'Collection.php';

	/**
 	*Create instance from MongoConnection class 
 	**/
 	$connection =new MongoConnection();
	
	/**
 	*Call the method connect from the MongoConnection class
 	**/
	$mongoConnection = $connection->conncet();

	/**
 	*Create instanse from Collection class to call 'insertUser' mthod 
 	**/
	$collection = new Collection($mongoConnection);

	

	if(isset($_POST['submitbtn']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$comment=$_POST['comment'];
		$collection->insertUser($name,$email,$comment);
		header("location:Display.php");
	}

?>
<!DOCTYPE HTML>

<html>
<head>
<title>MongoDB Delete </title>

<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html" charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<style>
.emailForm{
	
	border:1px solid grey;
	border-radius:10px;
	margin-top:20px;
}
#txtComment{
	height:120px;
}
form{
	padding-bottom:20px;
}
#sendbutton{
	
	width:100%;
	font-size:160%;
}
</style>

</head>



<body>
<div class="container">
<div class="row">

<div class="col-md-6 col-md-offset-3 emailForm">
<center><h1> Email Form</h1></center>

<form method="post">
<div class="form-group">
<label for="name">Your Name</label>
<input type="text" name="name" class="form-control" placeholder="Name" value=""/>

</div>

<div class="form-group">
<label for="email">Your E-mail</label>
<input type="email" name="email" class="form-control" placeholder="Email" value=""/>

</div>

<div class="form-group">
<label for="comment">Your Comment</label>
<textarea id="txtComment" name="comment" class="form-control"  ></textarea>
</div>
<center><input type="submit" name="submitbtn" class="btn btn-primary btn-lg" value="Submit ! " id="sendbutton" /></center>
</form>
</div>
</div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
</script>



</body>
</html>

