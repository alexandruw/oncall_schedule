<?php

class dbConnection {
	
	public $connection;
	//Constructor function
   public function __construct() {    
		
		$this->connection = new mysqli('localhost', 'root', '', 'on_call');
			
		
		//Error Handling
		
		if($this->connection->connect_errno) {
	    	printf("There was a connection probelm to the database: " . $connection->connect_error);
		}
	}
	public function getConnection () {
	
		return $this->connection;
	}
		
}

?>


