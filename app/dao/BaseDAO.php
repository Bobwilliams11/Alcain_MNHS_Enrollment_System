<?php

class BaseDAO {
	
	protected $user = "root";
	protected $password = "";
	protected $dbname = "Alcain_Enrollment_System";
	protected $dbh = null;

	function openConn(){
		$this->dbh = new PDO("mysql:host=localhost;dbname=" . $this->dbname, $this->user, $this->password);
	}

	function closeConn(){
		$this->dbh = null;
	}

}

?>
