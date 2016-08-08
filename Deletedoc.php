<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
*Include connection class that connect with database, 
*and collection class that cotain the method to apply on documents
**/
require"MongoConnection.php";
require"Collection.php";
 	
 	/**
 	*Create instance from MongoConnection class 
 	**/
 	$connection =new MongoConnection();

 	/**
 	*Call the method connect from the MongoConnection class
 	**/
 	$mongoConnection = $connection->conncet(); 

 	/**
 	*Create instanse from Collection class to call 'deletUser' mthod that
 	**/
 	$collection= new Collection($mongoConnection);

	if(isset($_GET['del']))
	{	
		$id = $_GET['del'];
		$collection->deleteUser($id);
		header("location:Display.php");
	}

?>