<?php

  /**
  *Include connection class that connect with database, 
  *and collection class that cotain the method to apply on documents
  **/
  require"MongoConnection.php";
  require"Collection.php";

  /**
  *Create instance from MongoConnection class 
  **/
  $mongoConnection =new MongoConnection();

  /**
  *Call the method connect from the MongoConnection class
  **/
  $connection =$mongoConnection->conncet();

  /**
  *Create instanse from Collection class to call 'getUsers' method 
  **/
  $collection =new Collection($connection);

  /**
  *call the method 'getUsers' and asign it to '$users' 
  **/
  $users =$collection->getUsers();



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MongoDB </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Users from database</h2>
  <p>Add ,delete,and udate users on MongoDB</p>
  <table class="table table-striped">
    <thead>
      <tr>
          <th><h2>ID</h2></th>
          <th><h2> Name </h2></th>
          <th><h2>Email</h2></th>
          <th><h2>Comment</h2></th>
          <th><h2>Update</h2></th>
          <th><h2>Delete</h2></th>
     
      </tr>
    </thead>
    <tbody>
      <?php    foreach ($users as $value) {
        ?>
        <tr>
             <td> <?php echo $value['_id'];    ?> </td>
             <td> <?php echo $value['name'];   ?> </td>
             <td> <?php echo $value['email'];  ?> </td>         
             <td> <?php echo $value['comment'];?> </td>
     
         <td><a href="MongoUpdate.php?getid=<?php echo $value['_id']; ?>"class="btn btn-success btn-lg active" role="button">Update</a></td>

         <td><a href="Deletedoc.php?del=<?php echo $value['_id']; ?>"class="btn btn-danger btn-lg active" role="button">Delete</a></td>
         
      </tr>
      <?php 
    }
    ?>
        
       
    </tbody>
  </table>
   <a href="Insert.php"class="btn btn-primary btn-lg active pull-right" role="button">Add User</a>
</div>

</body>
</html>