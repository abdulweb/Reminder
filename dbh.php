<?php
/**
* 
*/
class dbh
{
	private $servername;
	private $username;
	private $password;
	private $dbname;
	public function connect(){
		$this->servername ='localhost';
		$this->username ='root';
		$this->password ='';
		$this->dbname ='cies';

		$conn = new mysqli($this->servername,$this->username, $this->password,$this->dbname );
		return $conn;
	}

	public function cookies($cookie_name,$cookie_value)
	{
		return setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}

}
$object = new dbh();
