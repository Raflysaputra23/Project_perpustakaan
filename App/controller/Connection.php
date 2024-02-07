<?php  


class Connection {
	protected $localhost = "localhost",
			$username = "root",
			$password = "",
			$db_name = "db_perpustakaan",
			$conn;


	public function __construct() {
		$this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->db_name);
		if (!$this->conn) {
			echo "ERROR" .$conn->error;
		} 
	}

}






