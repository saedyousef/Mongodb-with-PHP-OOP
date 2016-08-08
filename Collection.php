<?php


/**
*Collection class handeling the operation on "Users" collection in mongodb "Database"
**/
class Collection {
	/**
	*variable selct the database
	**/
	public $connnection;

	/**
	*variable selct the collection in the mongodb "Database"
	**/
	public $collection;

	/**
	*Constructor of class Collection
	*@param : $con ti initlize the connection at call time
	**/
	function __construct($connnection)
	{ 

		$this->collection = $connnection->Model;
	}

	/**
	*Method insert data into "Model" Collection
	*@param takes three paramters consider the documents in collections
	**/
	public function insertUser($name,$email,$comment)
	{
	  
  	   $this->collection->insert
	  (
	  	[
	  	"name"=>$name,
	  	"email"=>$email,
	  	"comment"=>$comment
	  	]

	  );

	}

	/**
	*Method to retrive all documetns from the collecton
	**/
	public function getUsers()
	{
		$documetn=array();

		$documents= $this->collection->find($documetn);
		return $documents;
	}

	/**
	* This method update the documents that already added in collection
	*
	* @param $name 
	* @param $email
	* @param $comment
	*
	**/
	public function updateUser($name,$email,$comment,$id)
	{

		$this->collection->update
		(

			['_id' => new MongoId($id)],

				[
					'name'=>$name,
					'email'=>$email,
					'comment'=>$comment
				]

		);


	}

	/**
	*
	* Method to get a single document at a time 
	* @param $id
	*
	**/
	public function getUser( $id)
	{
	
		$user=$this->collection->findOne(array('_id'=> new MongoId($id)));

		return $user;
	}

	/**
	*
	* Mthod to delete document by it's ID
	* @param $id
	*
	*/
	public function deleteUser($id)
	{

		$this->collection->remove(['_id'=> new MongoId($id)]);
	}

}

?>