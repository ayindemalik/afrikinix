<?php
 //database variables
 require "constants.php";

 //database connection var
 $conn = new MySQLi(HOST,USER,PASSWORD,DATABASE_NAME);
 if($conn -> connect_error){
   die("Database connection error". $conn->connect_error);
 }
 else{
   // echo "DB connection successful";
 }

$pdoConnect = new PDO('mysql:host='.HOST.'; dbname='.DATABASE_NAME, USER, PASSWORD);

//PDO
Class Database{
	private $server = "mysql:host=".HOST."; dbname=".DATABASE_NAME."; charset=utf8";
	private $username = USER;
	private $password = PASSWORD;
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
														PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
														PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
	protected $conn;

	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
			$this->conn->exec("SET NAMES 'utf8';");
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
    }
	public function close(){
   		$this->conn = null;
 	}
}

$pdo = new Database();
?>
