<?php 
	class Connection
	{
		var $conn;
		function __construct()
		{
			$config = include 'config.php';

			$host = $config['host'];
			$user = $config['user'];
			$password = $config['password'];
			$database = 'company_db';

			// Create connection
			$this->conn = new mysqli($servername, $username, $password, $dbname);
			$this->conn->set_charset("utf8");
			// Check connection
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $this->conn->connect_error);
			} 

		}
	}
 ?>