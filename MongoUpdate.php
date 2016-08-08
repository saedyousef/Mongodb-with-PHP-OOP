<?php 

	/**
  	*Include connection class that connect with database, 
  	*and collection class that cotain the method to apply on documents
  	**/
	require 'MongoConnection.php';
	require 'Collection.php';
   	
   	/**
 	*Create instance from MongoConnection class 
 	**/
	$mongoConnection = new MongoConnection();

	/**
 	*Call the method connect from the MongoConnection class
 	**/
	$connection = $mongoConnection->conncet();

	/**
 	*Create instanse from Collection class to call 'updateUser' mthod 
 	**/
    $collection =new Collection($connection);



	  if (isset($_GET['getid']))
  	 	{

    		$id = $_GET['getid'];
			$users = $collection->getUser($id);
			if(isset($_POST['submitbtn']))
				{ 

				  $name = $_POST['namem'];
 	  			  $email = $_POST['emailm'];
	  			  $comment = $_POST['commentm'];
 	     		  $collection->updateUser($name,$email,$comment,$id);
   	  			  header("location:Display.php");
  	
				}


 		 }

?>
<!DOCTYPE HTML>

<html>
<head>
<title>MongoDB Update </title>

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
<center><h1> Update to MongoDB </h1></center>

<form method="post">
<div class="form-group">
<label for="name">Your Name</label>
<input type="text" name="namem" class="form-control" placeholder="Name" value="<?php echo $users['name']; ?>"/>

</div>

<div class="form-group">
<label for="email">Your E-mail</label>
<input type="email" name="emailm" class="form-control" placeholder="Email" value="<?php echo $users['email']; ?>"/>

</div>

<div class="form-group">
<label for="comment">Your Comment</label>
<textarea id="txtComment" name="commentm" class="form-control"  ><?php echo $users['comment']; ?></textarea>
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

