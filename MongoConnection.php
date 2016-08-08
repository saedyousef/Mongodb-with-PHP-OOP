<?php
  /**
  * connection class to make a connect with mongodb  
  **/

  class MongoConnection

  {

  	

     public function conncet()
     {
     	$connection =new MongoClient();
     	
     	$db =$connection->Database;

     	return $db;


     }

  }



?>